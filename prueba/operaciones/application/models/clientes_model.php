<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Clientes_model extends CI_Model {

    public $default_pass = 'abcd1234';
    public $user_data = null;
    public $error_message = '';

    public function __construct() {
        $this->load->database();

        # Si la tabla no existe es creada
        if (!$this->db->table_exists('clientes')) {
            $this->create_table();
        }
    }

    public function exist($id_cliente) {
        $result = $this->db->get_where('clientes', array('id_cliente' => $id_cliente), 1)->num_rows;
        return ($result > 0);
    }

    public function get_user_by_email($email) {
        $this->user_data = $this->db->get_where('clientes', array('email' => $email), 1);
        return ($this->user_data->num_rows() > 0);
    }

    public function get_user_by_id_number($id_number) {
        $this->user_data = $this->db->get_where('clientes', array('id_number' => $id_number), 1);
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
                $this->db->where('id_cliente', $result['id_cliente']);
                $this->db->update('clientes');
                return TRUE;
            } else {
                # Usuario activo y contraseña incorrecta
                $result['attemps'] = $result['attemps'] + 1;
                $this->db->update('clientes', array('attemps' => $result['attemps']), array('id_cliente' => $result['id_cliente']));

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

    public function get_clientes($id_cliente = FALSE) {
        if ($id_cliente === FALSE) {
            $query = $this->db->get_where('clientes', array('status >=' => 0, 'id_cliente >' => 1));
            return $query->result_array();
        }

        $query = $this->db->get_where('clientes', array('status >=' => 0, 'id_cliente' => $id_cliente));
        return $query->row_array();
    }

    public function update($id_cliente) {
        # TODO: Tomar el usuario de la sesion
        $user['email'] = $this->input->post('email');
        $user['first_name'] = strtolower($this->input->post('first_name'));
        $user['last_name'] = strtolower($this->input->post('last_name'));
        $user['nacionality'] = $this->input->post('nacionality');
        $user['tipo'] = $this->input->post('tipo');
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
            $this->db->where('id_cliente', $id_cliente);
            $this->db->update('clientes', $user);
        }
    }

    public function reset($id_cliente) {
        if (!is_numeric($id_cliente))
            return FALSE;

        $user = $this->get_clientes($id_cliente);

        if (count($user) === 0)
            return FALSE;

        $this->db->where('id_cliente', $id_cliente);
        $this->db->update('clientes', array('pass' => md5($user['email'] . $this->default_pass)));
    }

    public function status($id_cliente, $status) {
        $this->db->where('id_cliente', $id_cliente);
        $this->db->update('clientes', array('status' => $status));
    }

    public function save() {

        $valida = $this->db->get_where('clientes', array('email' => $this->input->post('email')))->row_array();
        if (count($valida) > 0) {
            return false;
        } else {
            $user['email'] = $this->input->post('email');
            $user['first_name'] = strtolower($this->input->post('first_name'));
            $user['last_name'] = strtolower($this->input->post('last_name'));
            $user['nacionality'] = $this->input->post('nacionality');
            $user['tipo'] = $this->input->post('tipo');
            $user['id_number'] = $this->input->post('id_number');
            $user['sex'] = $this->input->post('sex');
            $user['status'] = 1;
            $user['pass'] = md5($user['email'] . $this->input->post('pass'));
            $this->db->insert('clientes', $user);
            return true;
        }
    }

    /**
     * Crea la tabla 'clientes' para el manejo de los usuarios
     */
    public function create_table() {
        $this->db->query("
					CREATE TABLE `clientes` (
						`id_cliente` int(11) NOT NULL auto_increment,
						`id_number` int(11) NOT NULL,
						`nacionality` enum('v','e') NOT NULL default 'v',
						`sex` enum('f','m') NOT NULL default 'm',
						`first_name` varchar(255) NOT NULL,
						`last_name` varchar(255) NOT NULL,
						`email` varchar(255) NOT NULL,
						`pass` varchar(32) NOT NULL,
						`attemps` tinyint(4) NOT NULL default '0',
						`tipo` tinyint(4) NOT NULL default '1',
                                                `reset` varchar(32),
						`status` tinyint(4) NOT NULL default '1',
						`access` timestamp NULL default NULL,
						PRIMARY KEY  (`id_cliente`),
						UNIQUE KEY `email` (`email`),
						KEY `pass` (`pass`)
					) DEFAULT CHARSET=utf8;");

        $this->db->query('ALTER TABLE `clientes` ENGINE = InnoDB');

        $user = array(
            'id_number' => 'max_attemps',
            'sex' => 'm',
            'first_name' => 'admin',
            'last_name' => 'admin',
            'email' => 'admin@localhost.com',
            'pass' => md5('admin@localhost.com' . $this->default_pass)
        );
        $this->db->insert('clientes', $user);
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
    
    public function get_clientes_datos(){
        
        return $this->db->query("            
        select clientes.id_cliente,
               clientes.first_name, 
               clientes.last_name, 
               clientes.email, 
               clientes.tipo,
               inscripcion_pn.nom_apell_pn as nombre_razon_social_pn_pj,
               inscripcion_pn.cedula_pn as rif_cedula_pn_pj,
               inscripcion_pn.email_pn as email_pn_pj,
               inscripcion_pn.telefono_pn as telefono_pn_pj from clientes  
        join inscripcion_pn using(id_cliente) where tipo = 0 and id_cliente > 1
        union
        select clientes.id_cliente,
               clientes.first_name, 
               clientes.last_name, 
               clientes.email, 
               clientes.tipo,
               personas_juridicas.nom_rz_pj as nombre_razon_social_pn_pj,
               personas_juridicas.rif_pj as rif_cedula_pn_pj,
               personas_juridicas.email_pj as email_pn_pj, 
               personas_juridicas.telefono_pj as telefono_pn_pj from clientes  
        join personas_juridicas using(id_cliente) where tipo = 1 and id_cliente > 1")->result_array();
    }
    
    public function num_clientes(){
        return $this->db->query("select count(id_cliente) as num_clientes from clientes where id_cliente >1")->row_array();
    }
                


}

/* End of file clientes_model.php */
/* Location: ./application/models/clientes_model.php */
