<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Users_model extends CI_Model {

	public $default_pass = 'abcd1234';
	public $user_data = null;
	public $error_message = '';

	public function __construct() {
		$this->load->database();

		# Si la tabla no existe es creada
		if (!$this->db->table_exists('users')) {
			$this->create_table();
		}
	}

	public function exist($id_user) {
		$result = $this->db->get_where('users', array('id_user' => $id_user), 1)->num_rows;
		return ($result > 0);
	}

	public function get_user_by_email($email) {
		$this->user_data = $this->db->get_where('users', array('email' => $email), 1);
		return ($this->user_data->num_rows() > 0);
	}

	public function get_user_by_id_number($id_number) {
		$this->user_data = $this->db->get_where('users', array('id_number' => $id_number), 1);
		return ($this->user_data->num_rows() > 0);
	}

	public function validate($email, $pass) {
		$email = strtolower($email);
		$pass = md5($email . $pass);

		$exist = $this->get_user_by_email($email);

		if ($exist) {
			$result = $this->user_data->result_array();
			$result = $result[0];

			$max_attemps = $this->config_model->get_parameter('max_attemps');

			if ($result['attemps'] > $max_attemps) {
				# Usuario bloqueado por superar el limite de intentos fallidos
				$this->error_message = '¡Usuario bloqueado por superar el limite de intentos fallidos!';
				return FALSE;
			} else if ($result['status'] != 1) {
				# Usuario bloqueado por el administrador
				$this->error_message = '¡Usuario bloqueado por el administrador!';
				return FALSE;
			} else if ($result['pass'] == $pass) {
				# Usuario activo y contraseña correcta;
				$this->error_message = 'Usuario valido';
				if ($result['attemps'] != 0) {
					$this->db->set('attemps', 0);
				}
				$this->db->set('access', 'NOW()', FALSE);
				$this->db->where('id_user', $result['id_user']);
				$this->db->update('users');
				return TRUE;
			} else {
				# Usuario activo y contraseña incorrecta
				$result['attemps'] = $result['attemps'] + 1;
				$this->db->update('users', array('attemps' => $result['attemps']), array('id_user' => $result['id_user']));

				if ($result['attemps'] > $max_attemps) {
					# Usuario bloqueado por superar el limite de intentos fallidos
					$this->error_message = '¡Usuario bloqueado por superar el limite de intentos fallidos!';
					return FALSE;
				} else {
					# Usuario activo y contraseña incorrecta
					$this->error_message = 'Usuario o contraseña invalida';
					return FALSE;
				}
			}
		} else {
			# Usuario no existe
			$this->error_message = 'Usuario o contraseña invalida';
			return FALSE;
		}
	}

	public function get_users($id_user = FALSE) {

		if ($id_user === FALSE) {
			$query = $this->db->get_where('users', array('status >=' => 0));
			return $query->result_array();
		}

		$query = $this->db->get_where('users', array('status >=' => 0, 'id_user' => $id_user));
		return $query->row_array();
	}

	public function update($id_user) {
		# TODO: Tomar el usuario de la sesion
		$user['email'] = $this->input->post('email');
		$user['first_name'] = strtolower($this->input->post('first_name'));
		$user['last_name'] = strtolower($this->input->post('last_name'));
		$user['nacionality'] = $this->input->post('nacionality');
		$user['id_number'] = $this->input->post('id_number');
		$user['sex'] = $this->input->post('sex');

		$isEmpty = FALSE;
		foreach ($user as &$items) {
			if (empty($items)) {
				$isEmpty = TRUE;
				continue;
			}
			$items = mb_strtolower($items, 'UTF-8');
		}
		unset($items);
		if (!$isEmpty) {
			$this->db->where('id_user', $id_user);
			$this->db->update('users', $user);
		}
	}

	public function reset($id_user) {
		if (!is_numeric($id_user))
			return FALSE;

		$user = $this->get_users($id_user);

		if (count($user) === 0)
			return FALSE;

		$this->db->where('id_user', $id_user);
		$this->db->update('users', array('pass' => md5($user['email'] . $this->default_pass)));
	}

	public function status($id_user, $status) {
		$this->db->where('id_user', $id_user);
		$this->db->update('users', array('status' => $status));
	}

	public function save() {
		$user['email'] = $this->input->post('email');
		$user['first_name'] = strtolower($this->input->post('first_name'));
		$user['last_name'] = strtolower($this->input->post('last_name'));
		$user['nacionality'] = $this->input->post('nacionality');
		$user['id_number'] = $this->input->post('id_number');
		$user['sex'] = $this->input->post('sex');
		$user['status'] = 1;
		$user['pass'] = md5($user['email'] . $this->default_pass);
		$this->db->insert('users', $user);
	}

	/**
	 * Crea la tabla 'users' para el manejo de los usuarios
	 */
	public function create_table() {
		$this->db->query("
					CREATE TABLE `users` (
						`id_user` int(11) NOT NULL auto_increment,
						`id_number` int(11) NOT NULL,
						`nacionality` enum('v','e') NOT NULL default 'v',
						`sex` enum('f','m') NOT NULL default 'm',
						`first_name` varchar(255) NOT NULL,
						`last_name` varchar(255) NOT NULL,
						`email` varchar(255) NOT NULL,
						`pass` varchar(32) NOT NULL,
						`attemps` tinyint(4) NOT NULL default '0',
						`status` tinyint(4) NOT NULL default '1',
						`access` timestamp NULL default NULL,
						PRIMARY KEY  (`id_user`),
						UNIQUE KEY `id_number` (`id_number`),
						UNIQUE KEY `email` (`email`),
						KEY `pass` (`pass`)
					) DEFAULT CHARSET=utf8;");

		$this->db->query('ALTER TABLE `users` ENGINE = InnoDB');

		$user = array(
				'id_number' => 'max_attemps',
				'sex' => 'm',
				'first_name' => 'admin',
				'last_name' => 'admin',
				'email' => 'admin@localhost.com',
				'pass' => md5('admin@localhost.com' . $this->default_pass)
		);
		$this->db->insert('users', $user);
	}

}

/* End of file users_model.php */
/* Location: ./application/models/users_model.php */
