<?php

class Clientes extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array('clientes_model'));
    }

    public function index() {
        
    }

    public function registrarse() {

        $this->load->view('clientes/registro_tipo', $this->data);
    }

    public function registro($tipo = null) {

        switch ($tipo) {
            case 'natural':
                $tipo = (int) 0;
                break;
            case 'juridica':
                $tipo = (int) 1;
                break;
            case null:
                $tipo = 'no existe';
                break;
            default:
                $tipo = 'no existe';
                break;
        }

        $this->data['tipo'] = $tipo;

        $this->load->view('clientes/formulario_registro', $this->data);
    }

    public function agregar() {
        $result = $this->clientes_model->save();
        if ($result == false) {
            $this->data['mensaje'] = 'El correo ingresado ya se encuentra asociado a un cliente';
            $this->data['error'] = 1;
        } else {
            $this->data['mensaje'] = 'Usted se ha registrado correctamente';
        }
        $this->load->view('clientes/resultado_registro', $this->data);
    }

    public function logout() {
        $this->session->set_userdata('logged_in_cliente', FALSE);
        $this->load->view('redirect', array('destino' => base_url()));
    }

    public function olvide_pass() {
        if ($this->input->post()) {
            $existe = $this->clientes_model->forgot_pass($this->input->post("email"));
            if ($existe != false) {

                $emisor = 'soporte MS Factoring <admin@msfactoring.com.ve>';
                $receptores = $this->input->post("email");
                $asunto = "Cambio de password MS Factoring C.A.";
                $error = 0;
                $email = $receptores;

                @$message .= '
                <div><p style="font-family: verdana; font-size: 23px; text-align: center;">
                    usted ha solicitado un cambio de password haga click en el siguiente link e introduzca su nueva password.</p><br/>
                    <a href="http://www.msfactoring.com.ve/panel_public/clientes/reset_pass/' . $existe . '">
                        http://www.msfactoring.com.ve/panel_public/clientes/reset_pass/' . $existe . '</a>
                </p></div>';
                //se manda al correo tioven
                $message = stripslashes($message);
                @$headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/html; charset=\"utf-8\"; \r\n";
                $headers .= "To:" . $receptores . "\r\n";
                $headers .= "From:" .$emisor. "\r\n";
                $headers .= "Repaly-to:" .$emisor. "\r\n";
                $headers .= "X-Priority: 3n";
                $headers .= "X-MSMail-Priority: Normaln";
                $headers .= "X-Mailer: PHP". phpversion() ."\r\n";
                mail($receptores, $asunto, $message, $headers);
                ;
                $this->data['msg'] = 3;
                $this->load->view('sesion/recordar_pass', $this->data);
            } else {
                $this->data['msg'] = 2;
                $this->load->view('sesion/recordar_pass', $this->data);
            }
        } else {
            $this->load->view('sesion/recordar_pass');
        }
    }

    public function reset_pass($reset) {

        $valida_reset = $this->clientes_model->valid_reset($reset);
        if (count($valida_reset) > 1) {
            $existe = $valida_reset;
            if ($existe != false) {
                $this->data['persona'] = $existe;
                $this->load->view('sesion/password', $this->data);
            }
        } else {
            $this->data['msg'] = 1;
            $this->load->view('sesion/recordar_pass', $this->data);
        }
    }

    public function cambio_pass() {
        if ($this->input->post()) {
            $valida_reset = $this->clientes_model->valid_reset($this->input->post('reset'));
            if (count($valida_reset) > 1) {
                $existe = $valida_reset;
                if ($existe != false) {
                    $edicion = $this->clientes_model->edit_pass();

                    if ($edicion == true) {
                        $this->data['msg'] = 1;
                        $this->load->view('sesion/resultado', $this->data);
                    }
                } else {
                    $this->data['msg'] = 1;
                    $this->load->view('sesion/recordar_pass', $this->data);
                }
            }
        } else {
            $this->load->view('sesion/recordar_pass', $this->data);
        }
    }
    
    public function consulta_rif($rif){
        $datos_rif = $this->setRif($rif);
        $this->data['rif'] = $datos_rif['seniat'];
        $nombre = explode('(', $datos_rif['seniat']['nombre']);
        echo $nombre[0];
    }
    


}
