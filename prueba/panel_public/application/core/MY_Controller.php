<?php

class MY_Controller extends CI_Controller {

    private $data = array();
    private $model_base;
    public $controller;

    public function __construct($models = null) {
        parent::__construct();


        if (is_string($models)) {
            $models = array($models);
        }

        if (count($models) > 0) {
            $this->model_base = $models[0];
            foreach ($models as $_model) {
                $this->load->model($_model);
            }
        }
    }

    function _remap($method) {
        $param_offset = 2;
        if (!method_exists($this, $method)) {
            $param_offset = 1;
            $method = 'index';
        }
        $params = array_slice($this->uri->rsegment_array(), $param_offset);
        call_user_func_array(array($this, $method), $params);
    }

    public function valida_usuario($cliente = false) {
        if ($cliente) {
            $valid = $this->clientes_model->validate($cliente['email'], $cliente['pass']);
            if ($valid) {

                $this->session->set_userdata('user_data_cliente', $this->clientes_model->user_data->result_array[0]);
                $this->session->set_userdata('logged_in_cliente', TRUE);
            } else {
                $this->data['error_message'] = $this->clientes_model->error_message;
            }
        }

        $this->load->model('clientes_model');
        if ($this->input->post('email') && $this->input->post('pass')) {


            $valid = $this->clientes_model->validate($this->input->post('email'), $this->input->post('pass'));

            if ($valid) {

                $this->session->set_userdata('user_data_cliente', $this->clientes_model->user_data->result_array[0]);
                $this->session->set_userdata('logged_in_cliente', TRUE);
            } else {
                $this->data['error_message'] = $this->clientes_model->error_message;
            }
        }

        if (!$this->session->userdata('logged_in_cliente')) {
            $this->data['title'] = 'Iniciar Sesi&oacute;n';
            $this->data['page'] = 'login';
            $this->load->view('login', $this->data);
            return false;
        } else {
            return true;
        }
    }

    public function descarga($vista, $data, $nombre_archivo) {
        $html = $this->load->view($vista, $data, true);
        $html = iconv("UTF-8", "UTF-8//IGNORE", $html);
        $this->mpdf = new mPDF('l');
        $this->mpdf = new mPDF('', // mode - default ''
                '', // format - A4, for example, default ''
                0, // font size - default 0
                '', // default font family
                15, // margin_left
                15, // margin right
                10, // margin top
                10, // margin bottom
                9, // margin header
                9, // margin footer
                'L'); // L - landscape, P - portrait
        $this->stylesheet = file_get_contents('css/style_ficha_pn.css');
        $this->mpdf->SetDisplayMode('fullpage');
        $this->mpdf->WriteHTML($html);
        //para forzar descarga
//        $this->mpdf->Output($nombre_archivo, 'D');
        //para ver directamente desde el explorador
        $this->mpdf->Output($nombre_archivo, 'I');
    }

    function enviar_pdf() {
        $mpdf = new mPDF();

        $mpdf->WriteHTML($html);
        

        $content = $mpdf->Output('', 'S');

        $content = chunk_split(base64_encode($content));
        $mailto = 'recipient@domain.com';
        $from_name = 'Your name';
        $from_mail = 'sender@domain.com';
        $replyto = 'sender@domain.com';
        $uid = md5(uniqid(time()));
        $subject = 'Your e-mail subject here';
        $message = 'Your e-mail message here';
        $filename = 'filename.pdf';

        $header = "From: " . $from_name . " <" . $from_mail . ">\r\n";
        $header .= "Reply-To: " . $replyto . "\r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-Type: multipart/mixed; boundary=\"" . $uid . "\"\r\n\r\n";
        $header .= "This is a multi-part message in MIME format.\r\n";
        $header .= "--" . $uid . "\r\n";
        $header .= "Content-type:text/plain; charset=iso-8859-1\r\n";
        $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
        $header .= $message . "\r\n\r\n";
        $header .= "--" . $uid . "\r\n";
        $header .= "Content-Type: application/pdf; name=\"" . $filename . "\"\r\n";
        $header .= "Content-Transfer-Encoding: base64\r\n";
        $header .= "Content-Disposition: attachment; filename=\"" . $filename . "\"\r\n\r\n";
        $header .= $content . "\r\n\r\n";
        $header .= "--" . $uid . "--";
        $is_sent = @mail($mailto, $subject, "", $header);

        $mpdf->Output();
        exit;
    }

    public function setRif($rif) {
        $rif = str_replace('-', '', strtoupper($rif));
        return $this->getInfo($rif);
    }

    public function getInfo($rif) {
        if ($this->validar($rif)) {
            if (function_exists('curl_init')) {
                $url = 'http://contribuyente.seniat.gob.ve/getContribuyente/getrif?rif=' . $rif;
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_TIMEOUT, 30);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($ch);

                if ($result) {
                    try {
                        if (substr($result, 0, 1) != '<') {
                            throw new Exception($result);
                        }

                        $xml = simplexml_load_string($result);

                        if (!is_bool($xml)) {
                            $elements = $xml->children('rif');
                            $seniat = array();
                            $this->data['code_result'] = 1;


                            foreach ($elements as $key => $node) {
                                $index = strtolower($node->getName());
                                $seniat[$index] = (string) $node;
                            }
                            $this->data['seniat'] = $seniat;
                        }
                    } catch (Exception $e) {
                        $exception = explode(' ', $result, 2);
                        $this->data['code_result'] = (int) $exception[0];
                    }
                } else {
                    // No hay conexiÃ³n a internet
                    $this->data['code_result'] = 0;
                }
            } else {
                // No hay soporte CURL
                $this->data['code_result'] = -1;
            }
        } else {
            // Formato de RIF invÃ¡lido
            $this->data['code_result'] = -2;
        }
        return ($this->data);
    }

    public function validar($rif) {
        $retorno = preg_match("/^([VEJPG]{1})([0-9]{9}$)/", $rif);
        if ($retorno) {
            $digitos = str_split($rif);

            $digitos[8] *= 2;
            $digitos[7] *= 3;
            $digitos[6] *= 4;
            $digitos[5] *= 5;
            $digitos[4] *= 6;
            $digitos[3] *= 7;
            $digitos[2] *= 2;
            $digitos[1] *= 3;

            switch ($digitos[0]) {
                case 'V':
                    $digitoEspecial = 1;
                    break;
                case 'E':
                    $digitoEspecial = 2;
                    break;
                case 'J':
                    $digitoEspecial = 3;
                    break;
                case 'P':
                    $digitoEspecial = 4;
                    break;
                case 'G':
                    $digitoEspecial = 5;
                    break;
            }

            $suma = (array_sum($digitos) - $digitos[9]) + ($digitoEspecial * 4);
            $residuo = $suma % 11;
            $resta = 11 - $residuo;

            $digitoVerificador = ($resta >= 10) ? 0 : $resta;

            if ($digitoVerificador != $digitos[9]) {
                $retorno = false;
            }
        }

        return $retorno;
    }

    public function descarga_reporte($vista, $data, $nombre_archivo) {
        $html = $this->load->view($vista, $data, true);
        $html = iconv("UTF-8", "UTF-8//IGNORE", $html);
        $this->mpdf->AddPage('L', // L - landscape, P - portrait
                '', '', '', '', 10, // margin_left
                10, // margin right
                10, // margin top
                10, // margin bottom
                18, // margin header
                12); // margin footer
// $orientation [, string $type [, string $resetpagenum [, string $pagenumstyle [, string $suppress 
        $this->mpdf->WriteHTML($html);
        //para forzar descarga
//        $this->mpdf->Output($nombre_archivo, 'D');
        //para ver directamente desde el explorador
        $this->mpdf->Output($nombre_archivo, 'I');
    }

    function email($correo, $asunto, $cuerpo) {
        $this->load->library('email');

        $this->email->from('admin@assetsfactoring.com', 'Assets Factoring, INC');
        $this->email->to($correo);
//        $this->email->cc($correo); 
        $this->email->bcc('rhonalejandro@gmail.com', 'willyra2003@yahoo.com');
        $this->email->subject($asunto);
        $this->email->message($cuerpo);

        $this->email->send();

        // echo $this->email->print_debugger();
    }

}
