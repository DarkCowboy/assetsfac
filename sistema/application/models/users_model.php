<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users_model extends CI_Model {

    public $default_pass = 'admin';
    public $user_data = null;
    public $error_message = '';

    public function __construct() {
        $this->load->database();

        # Si la tabla no existe es creada
        if (!$this->db->table_exists('users')) {
            $this->create_table();
        }
        if (!$this->db->table_exists('restricciones')) {
            $this->create_table_restricciones();
        }
        if (!$this->db->table_exists('roles')) {
            $this->create_table_roles();
        }
    }

    public function create_table() {
        $this->db->query("
                        CREATE TABLE `users` (
                                `id_user` int(11) NOT NULL auto_increment,
                                `id_number` int(11) NOT NULL,
                                `id_rol` int(11) NOT NULL,
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
                                UNIQUE KEY `email` (`email`),
                                KEY `pass` (`pass`)
                        ) DEFAULT CHARSET=utf8;");

        $this->db->query('ALTER TABLE `users` ENGINE = InnoDB');

        $user = array(
            'id_number' => 'max_attemps',
            'id_rol' => '10',
            'sex' => 'm',
            'first_name' => 'Rhonald',
            'last_name' => 'Brito',
            'email' => 'admin',
            'pass' => md5('admin' . $this->default_pass)
        );
        $this->db->insert('users', $user);
    }

    public function create_table_restricciones() {
        $this->db->query("
                        CREATE TABLE `restricciones` (
                                `id_restriccion` int(11) NOT NULL auto_increment,
                                `id_user` int(11) NOT NULL,
                                `id_controlador` enum('v','e') NOT NULL default 'v',
                                `id_metodo` enum('f','m') NOT NULL default 'm',
                                `permisos` varchar(255) NOT NULL,
                                `status` tinyint(4) NOT NULL default '1',
                                `access` timestamp NULL default NULL,
                                PRIMARY KEY  (`id_restriccion`)
                        ) DEFAULT CHARSET=utf8;");

        $this->db->query('ALTER TABLE `restricciones` ENGINE = InnoDB');
    }

    public function create_table_roles() {
        $this->db->query("
                        CREATE TABLE `roles` (
                                `id_rol` int(11) NOT NULL,
                                `nombre_rol` text NOT NULL,
                                `Descripcion_rol` text NOT NULL,
                                `status` tinyint(4) NOT NULL default '1'
                        ) DEFAULT CHARSET=utf8;");

        $this->db->query('ALTER TABLE `roles` ENGINE = InnoDB');

        $roles = array(array(
                'id_rol' => '10',
                'nombre_rol' => 'Superadmin',
                'Descripcion_rol' => 'Administrador - Desarrollador del Sistema - no posee Limitacion alguna',
                'status' => '1'),
            array(
                'id_rol' => '0',
                'nombre_rol' => 'Administrador',
                'Descripcion_rol' => 'Administrador - no posee Limitaciones en los procesos',
                'status' => '1'),
            array(
                'id_rol' => '1',
                'nombre_rol' => 'Dep. Administracion',
                'Descripcion_rol' => 'Administrador - posee Limitaciones en modulos que solo el Rol de Administrador puede ver',
                'status' => '1'),
            array(
                'id_rol' => '2',
                'nombre_rol' => 'Asistente',
                'Descripcion_rol' => 'Posee Limitaciones Estrictas, solo puede finalizar procesos ya comenzados por administradores, este tiene limitacion en los Menus del sistema',
                'status' => '1'),
            array(
                'id_rol' => '3',
                'nombre_rol' => 'Invitado',
                'Descripcion_rol' => 'No puede ver nada',
                'status' => '1')
        );
        foreach ($roles as $row) {
            $this->db->insert('roles', $row);
        }
    }

    public function get_rols() {
        return $this->db->get_where('roles', array('status >' => 0))->result_array();
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

    public function edita_usr_sin_pass($form) {
        $code = $form['code'];
        unset($form['code']);
        $valida = $this->db->get_where('users', array('pass' => $code))->row_array();
        if ($valida) {
            $this->db->where('pass', $code);
            $this->db->update('users', $form);
            return true;
        }
        return false;
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

    public function habilitar($code) {
        $cursor = $this->db->query("SELECT id_user FROM users WHERE MD5(id_user)='$code'")->row_array();
        $this->db->query("UPDATE `users` SET `status` = 1 WHERE id_user ={$cursor['id_user']}");
        return $this->db->affected_rows();
    }

    public function inabilitar($code) {
        $cursor = $this->db->query("SELECT id_user FROM users WHERE MD5(id_user)='$code'")->row_array();
        $this->db->query("UPDATE `users` SET `status` = 0 WHERE id_user ={$cursor['id_user']}");
        return $this->db->affected_rows();
    }

    public function eliminar($code) {
        $cursor = $this->db->query("SELECT id_user FROM users WHERE MD5(id_user)='$code'")->row_array();
        $this->db->query("UPDATE `users` SET `status` = -1 WHERE id_user ={$cursor['id_user']}");
        return $this->db->affected_rows();
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

    public function forgot_pass($email) {
        $this->datos = $this->db->get_where('clientes', array('email' => $email), 1);
        $exist = $this->datos->num_rows() > 0;
        if ($exist) {
            $user['reset'] = md5(microtime());
            $this->db->where('email', $email);
            $this->db->update('clientes', $user);
            return($user['reset']);
        } else {
            return (false);
        }
    }

    public function valid_reset($reset) {
        $this->datos = $this->db->get_where('clientes', array('reset' => $reset), 1);
        $exist = $this->datos->num_rows() > 0;
        if ($exist) {
            $user['reset'] = md5(microtime());
            return($this->datos->row_array());
        }
        return (false);
    }

    public function edit_pass() {
        $this->datos = $this->db->get_where('clientes', array('reset' => $this->input->post('reset')), 1);
        $exist = $this->datos->num_rows() > 0;
        if ($exist) {
            $persona = $this->datos->row_array();
            $user['pass'] = md5($persona['email'] . $this->input->post('pass'));
            $user['reset'] = '';


            $this->db->where('email', $persona['email']);
            $this->db->update('clientes', $user);
            return(true);
        } else {
            return(false);
        }
    }

    public function cambia_password() {
        $code = $this->input->post('code');
        $valida = $this->db->get_where('users', array('pass' => $code))->row_array();
        if ($valida) {
            $new_pass = md5($valida['email'] . $this->input->post('pass'));
            $this->db->where('pass', $code);
            $this->db->update('users', array('pass' => $new_pass));
            return true;
        }
        return false;
    }

    public function get_by_code($code) {
        return $this->db->get_where('users', array('pass' => $code))->row_array();
    }

    public function crear_nuevo() {
        $valida_email = $this->get_user_by_email($this->input->post('email'));
        if (!$valida_email) {
            $user['email'] = $this->input->post('email');
            $user['first_name'] = strtolower($this->input->post('first_name'));
            $user['last_name'] = strtolower($this->input->post('last_name'));
            $user['id_rol'] = $this->input->post('id_rol');
            $user['pass'] = md5($user['email'] . $this->input->post('pass'));
            $this->db->insert('users', $user);
            return true;
        }
        return false;
    }

}

/* End of file users_model.php */
/* Location: ./application/models/users_model.php */
