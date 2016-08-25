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
        if (strlen($pass) < 30) {
            $pass = md5($email . $pass);
        }

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
            $query = $this->db->get_where('clientes', array('status >=' => 0));
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
            $user['email'] = strtolower($this->input->post('email'));
            $user['first_name'] = strtolower($this->input->post('first_name'));
            $user['last_name'] = strtolower($this->input->post('last_name'));
            $user['nacionality'] = $this->input->post('nacionality');
            $user['tipo'] = $this->input->post('tipo');
            $user['id_number'] = $this->input->post('id_number');
            $user['sex'] = $this->input->post('sex');
            $user['status'] = 1;
            $user['pass'] = md5($user['email'] . $this->input->post('pass'));

            $cuerpo = '<table style="background-image: url(http://www.assetsfactoring.com/panel_public/images/correo_bienvenida/09.jpg); background-position: 50% 0%; font-size: 16px; background-color: rgb(239, 239, 239);" data-width="550" dir="ltr" data-mobile="true" border="0" cellpadding="0" cellspacing="0" align="center" width="100%">
    <tbody><tr>
            <td style="margin:0;padding:0;" align="center" valign="top" width="100%">
                <table style="width: 550px;" class="wrapper" border="0" cellpadding="0" cellspacing="0" align="center" width="550">
                    <tbody>
                        <tr>
                            <td style="margin:0;padding:0;" align="left" valign="middle" width="100%">
                                <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%">
                                    <tbody><tr>
                                            <td align="left" valign="top">
                                                <table data-editable="image" data-mobile-width="1" style="margin-right: 0px;" border="0" cellpadding="0" cellspacing="0" align="left" width="100%">
                                                    <tbody><tr>
                                                            <td style="margin: 0px; padding: 0px;" align="left" valign="top"><a href="">
                                                                    <img style="border-width: 0px; border-style: none; border-color: transparent; display: block; width: 100%; max-width: 100% ! important;" data-src="http://www.assetsfactoring.com/panel_public/images/correo_bienvenida/11.png" data-origsrc="http://www.assetsfactoring.com/panel_public/images/correo_bienvenida/11.png" src="http://www.assetsfactoring.com/panel_public/images/correo_bienvenida/11.png" alt="" border="0" width="550">
                                                                </a></td>
                                                        </tr></tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody></table>
                            </td>
                        </tr>
                        <tr>
                            <td style="margin:0;padding:38px 0 34px 44px;" bgcolor="#ffffff">
                                <table border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff" width="100%"><tbody>
                                        <tr data-columns="yes">
                                            <td axis="col" style="margin: 0px; padding: 0px;" align="left" width="34%">
                                                <table data-editable="image" data-mobile-width="0" style="margin: 0px; padding: 0px;" border="0" cellpadding="0" cellspacing="0" align="left" width="168">
                                                    <tbody><tr>
                                                            <td style="padding: 0px 0px 0px 2px; margin: 0px; background-color: rgb(255, 255, 255); background-image: none; border-radius: 0px;" align="left" valign="top"><img style="border-width: 0px; border-style: none; border-color: transparent; display: block;" data-origsrc="http://www.assetsfactoring.com/panel_public/images/correo_bienvenida/logo_correo.png" data-src="http://www.assetsfactoring.com/panel_public/images/correo_bienvenida/logo_correo.png" src="http://www.assetsfactoring.com/panel_public/images/correo_bienvenida/logo_correo.png" height="66" width="168"></td>
                                                        </tr>
                                                    </tbody></table>
                                            </td>
                                            <td axis="col" style="margin: 0px; padding: 0px;" align="left" width="66%">
                                                <table style="margin-right: auto; margin-left: auto;" data-editable="text" border="0" cellpadding="0" cellspacing="0" align="center">
                                                    <tbody><tr>
                                                            <td style="margin: 0px; padding: 0px 39px 0px 5px; background-color: rgb(255, 255, 255); font-family: Helvetica,sans-serif; color: rgb(70, 70, 70);" align="left" valign="top">
                                                                <span style="font-family:Helvetica,sans-serif;color:#464646;font-weight:bold;font-size:34px;">
                                                                    <font style="font-size:34px;" size="34"><br></font></span>
                                                            </td>
                                                        </tr>
                                                    </tbody></table>
                                            </td>
                                        </tr>
                                    </tbody></table>
                            </td>
                        </tr>
                        <tr>
                            <td style="margin:0;padding:0;" align="left">
                                <table style="margin-right: auto; margin-left: auto;" data-editable="text" border="0" cellpadding="0" cellspacing="0" align="center" width="100%">
                                    <tbody><tr>
                                            <td style="margin: 0px; padding: 0px 49px 11px; background-color: rgb(255, 255, 255); font-family: Helvetica,sans-serif; color: rgb(38, 38, 38); line-height: 140%;" align="left" valign="top">
                                                <span style="font-family:Helvetica,sans-serif;color:#262626;font-weight:bold;font-size:17px;line-height:140%;">
                                                </span><span style="font-weight: bold;"><span style="font-family: Helvetica,sans-serif; color: rgb(38, 38, 38); font-size: 17px; line-height: 140%;">Hola, Sr(a) ' . $user['first_name'] . ' ' . $user['last_name'] . ', Assets Factoring, INC. le da la bienvenida, muchas gracias por registrarse, le recordamos que para empezar hacer operaciones con nosotros debe llenar la planilla de registro dentro de su panel de cliente.</span></span><span style="font-family:Helvetica,sans-serif;color:#262626;font-weight:bold;font-size:17px;line-height:140%;"> <br></span>
                                            </td>
                                        </tr>
                                    </tbody></table>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:0 0 22px 0;margin:0;" align="center" bgcolor="#ffffff" valign="top">
                                <table style="margin: 0px; padding: 0px;" border="0" cellpadding="0" cellspacing="0" align="center" width="100%">
                                    <tbody><tr>
                                            <td style="color: rgb(255, 255, 255); font-family: Helvetica,sans-serif; font-size: 26px; font-weight: bold; padding: 0px;" align="center" bgcolor="#ffffff" valign="middle">
                                                <div data-box="button" style="width: 100%; margin-top: 0px; margin-bottom: 0px"><table style="margin: 0px auto;" data-editable="button" border="0" cellpadding="0" cellspacing="0" align="center">
                                                        <tbody><tr>
                                                                <td style="border-radius: 4px; border: 1px solid rgb(29, 176, 233); padding: 12px 35px; margin: 0px; background-color: rgb(33, 88, 25); background-image: url(http://www.assetsfactoring.com/panel_public/images/correo_bienvenida/13.jpg); background-position: 0% 0%;" align="center" valign="middle"><a title="Ingresar" href="http://assetsfactoring.com/" style="font-family:Helvetica,sans-serif;color:#ffffff;font-size:26px;text-decoration:none;">
                                                                        Ingresar
                                                                    </a></td>
                                                            </tr>
                                                        </tbody></table></div>
                                            </td>
                                        </tr>
                                    </tbody></table>
                            </td>
                        </tr>
                        <tr>
                            <td style="margin:0;padding:0;" align="left" valign="middle" width="66%">
                                <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%">
                                    <tbody><tr>
                                            <td align="left" valign="top">
                                                <table data-editable="image" data-mobile-width="1" style="margin-right: 0px;" border="0" cellpadding="0" cellspacing="0" align="left" width="100%">
                                                    <tbody><tr>
                                                            <td style="margin: 0px; padding: 0px;" align="left" valign="top"><a href="">
                                                                    <img style="border-width: 0px; border-style: none; border-color: transparent; display: block; width: 100%; max-width: 100% ! important;" data-src="http://www.assetsfactoring.com/panel_public/images/correo_bienvenida/12.png" data-origsrc="http://www.assetsfactoring.com/panel_public/images/correo_bienvenida/12.png" src="http://www.assetsfactoring.com/panel_public/images/correo_bienvenida/12.png" alt="" border="0" width="550">
                                                                </a></td>
                                                        </tr></tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody></table>
                            </td>
                        </tr></tbody>
                </table>
            </td>
        </tr>
    </tbody></table>';
            $this->db->insert('clientes', $user);
  
            //Envio el Correo de Bienvenida
            $correo= $user['email'];
            $asunto='Assets Factoring, INC. te da la Bienvenida';
            
            $this->load->library('email');
            $this->email->from('admin@assetsfactoring.com', 'Assets Factoring, INC');
            $this->email->to($correo);
  //        $this->email->cc($correo); 
            $this->email->bcc('rhonalejandro@gmail.com', 'Rhonald A Brito Q');
            $this->email->subject($asunto);
            $this->email->message($cuerpo);

            $this->email->send();

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

    public function cambia_password($email, $new_pass) {
        $this->db->where('email', $email);
        $this->db->update('clientes', array('pass' => $new_pass));
    }

}

/* End of file clientes_model.php */
/* Location: ./application/models/clientes_model.php */
