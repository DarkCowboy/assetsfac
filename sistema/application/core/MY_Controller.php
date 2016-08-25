<?php

class MY_Controller extends CI_Controller {

    private $data = array();
    private $model_base;
    public $controlador;
    public $centinela;
    public $rol;
    public $id_user;
    public $rol_number;

    /* Variables Para Excel */
    var $FileName = "export"; #Nombre del archivo
    var $xls = "";       #Contenido del archivo
    var $row = 1;        #Fila
    var $col = 1;        #Columna 

    /* Fin Variables Excel */

    public function __construct($models = null, $rol = null) {
        parent::__construct();


        $this->controlador['name'] = $this->router->fetch_class();
        $this->metodo['name'] = $this->router->fetch_method();

        $valida = $this->valida_usuario();
//        debug($valida);
        if ($valida == true) {
            $this->centinela = true;
        } else {
            $this->centinela = false;
        }


        if (is_string($models)) {
            $models = array($models);
        }

        if (count($models) > 0) {
            $this->model_base = $models[0];
            foreach ($models as $_model) {
                $this->load->model($_model);
            }
        }
        $this->user_data($rol);
        $datos = $this->session->userdata('user_data_cliente');
        $this->rol_number = $datos['id_rol'];
        $this->id_user = $datos['id_user'];
//        debug($datos);
        ;
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

    public function user_data($rol) {
        $datos = $this->session->userdata('user_data_cliente');
        $data['id_user'] = $datos['id_user'];
        $data['nombre_usuario'] = $datos['first_name'] . ' ' . $datos['last_name'];
        $data['email'] = $datos['email'];
        $data['rol'] = $datos['id_rol'];
        foreach ($rol as $row) {
            if ($row == (int) $data['rol']) {
                $this->rol = true;
                break;
            } else {
                $this->rol = false;
            }
        }
    }

    public function log_crear($id_instruccion) {
        $log['creada'] = 1;
        $log['id_user'] = $this->id_user;
        $log['id_instruccion'] = $id_instruccion;
        $this->log_model->registro_log($log);
    }

    public function log_edita($id_instruccion) {
        $log['editada'] = 1;
        $log['id_user'] = $this->id_user;
        $log['id_instruccion'] = $id_instruccion;
        $this->log_model->registro_log($log);
    }

    public function log_elimina($id_instruccion) {
        $log['eliminada'] = 1;
        $log['id_user'] = $this->id_user;
        $log['id_instruccion'] = $id_instruccion;
        $this->log_model->registro_log($log);
    }

    public function log_procesa($id_instruccion) {
        $log['procesada'] = 1;
        $log['id_user'] = $this->id_user;
        $log['id_instruccion'] = $id_instruccion;
        $this->log_model->registro_log($log);
    }

    public function valida_usuario($cliente = false) {
        if ($cliente) {
            $valid = $this->users_model->validate($cliente['email'], $cliente['pass']);
            if ($valid) {

                $this->session->set_userdata('user_data_cliente', $this->users_model->user_data->result_array[0]);
                $this->session->set_userdata('logged_in_cliente', TRUE);
            } else {
                $this->data['error_message'] = $this->users_model->error_message;
            }
        }

        $this->load->model('users_model');
        if ($this->input->post('email') && $this->input->post('pass')) {


            $valid = $this->users_model->validate($this->input->post('email'), $this->input->post('pass'));

            if ($valid) {

                $this->session->set_userdata('user_data_cliente', $this->users_model->user_data->result_array[0]);
                $this->session->set_userdata('logged_in_cliente', TRUE);
            } else {
                $this->data['error_message'] = $this->users_model->error_message;
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
        $this->mpdf = new mPDF('l');
        $this->mpdf = new mPDF('', // mode - default ''
                        'letter', // format - A4, for example, default ''
                        0, // font size - default 0
                        '', // default font family
                        30, // margin_left
                        20, // margin right
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

    public function descarga_cheque($vista, $data, $nombre_archivo) {
        $html = $this->load->view($vista, $data, true);
        $this->mpdf->AddPage('L', // L - landscape, P - portrait
                'letter', // format - A4, for example, default ''
                0, // font size - default 0
                '', // default font family
                0, // margin_left
                5, // margin right
                0, // margin top
                149, // margin bottom
                0, // margin header
                0 // margin footer
        ); // L - landscape, P - portrait
        $this->stylesheet = file_get_contents('css/style_ficha_pn.css');
        $this->mpdf->SetDisplayMode('fullpage');
        $this->mpdf->WriteHTML($html);
        //para forzar descarga
//        $this->mpdf->Output($nombre_archivo, 'D');
        //para ver directamente desde el explorador
        $this->mpdf->Output($nombre_archivo, 'I');
    }

    public function descarga_reporte($vista, $data, $nombre_archivo) {
        $html = $this->load->view($vista, $data, true);
        $this->mpdf = new mPDF();
        $this->stylesheet = file_get_contents('css/style_ficha_pn.css');
        $this->mpdf->AddPage('L', // L - landscape, P - portrait
                '', '', '', '', 30, // margin_left
                30, // margin right
                30, // margin top
                30, // margin bottom
                18, // margin header
                12); // margin footer
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
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
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

    function email($correo, $asunto, $cuerpo) {
        $this->load->library('email');
        $this->email->from('kbrown@bluenumberssecurities.com', 'Karina Brown - Blue Number Securities INC');
        $this->email->to($correo);
        $this->email->cc($correo);
        $this->email->bcc($correo);
        $this->email->subject($asunto);
        $this->email->message($cuerpo);

        $this->email->send();

        // echo $this->email->print_debugger();
    }

    /* Funciones para Convertir a excel */

    public function Export2ExcelClass($file_name = "export") {
        //Inicio de clase
        $this->FileName = $file_name;
    }

    private function Head($file_name = "") {
        //Escribe cabeceras
        $this->FileName = ($file_name == "") ? $this->FileName : $file_name;
        $f = $this->FileName;
        header("Pragma: public");
        header("Author: MS-Factoring" ); 
        header("Last-Modified: " . gmdate( 'D, d M Y H:i:s' ) . " GMT" ); 
        header("Cache-Control: no-cache, must-revalidate");
        header("Pragma: no-cache");
        header("Content-type: application/x-msexcel");
        header("Content-Disposition: attachment; filename=$f.xls");
        header("Content-Description: PHP/INTERBASE Generated Data");
        header("Expires: 0");
    }

    private function BOF() {
        //Inicio de archivo
        return pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
    }

    private function EOF() {
        //Fin de archivo
        return pack("ss", 0x0A, 0x00);
    }

    public function Number($Row, $Col, $Value) {
        //Escribe un número (double) en la $Row/$Col
        $this->xls .= pack("sssss", 0x203, 14, $Row, $Col, 0x0);
        $this->xls .= pack("d", $Value);
    }

    public function Text($Row, $Col, $Value) {
        //Escribe texto en $Row/$Col (UTF8)
        $Value2UTF8 = utf8_decode($Value);
        $L = strlen($Value2UTF8);
        $this->xls .= pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
        $this->xls .= $Value2UTF8;
    }

    public function Write($Row, $Col, $Value) {
        //Escribir texto o numeros en $Row/$Col
        if (is_numeric($Value))
            $this->Number($Row, $Col, $Value);
        else
            $this->Text($Row, $Col, $Value);
    }

    public function WriteMatriz($Matriz) {
        //Convierte una matriz en una planilla
        //NOTA: Elimina el contenido que haya hasta ahora almacenado!
        /*
         * Ejemplo:
         * $Matriz = array(
         *      array('Nombre', 'Apellido', 'Edad'),
         *      array('Luciana', 'Camila', 1),
         *      array('Eduardo, 'Cuomo', 24),
         *      array('Vanesa', 'Chavez', 21)
         * );
         *
         * Devuelve un EXCEL como:
         * _| A     | B      | C  |
         * 1|Nombre |Apellido|Edad|
         * 2|Luciana|Camila  |1   |
         * 3|Eduardo|Cuomo   |24  |
         * 4|Vanesa |Chavez  |21  |
         *
         */
        $this->xls = "";
        $nRow = 0;
        $nCol = 0;
        foreach ($Matriz as $Row) {
            foreach ($Row as $Value) {
                $this->Write($nRow, $nCol, $Value);
                $nCol++;
            }
            $nCol = 0;
            $nRow++;
        }
    }

    public function Download($file_name = "") {
        //Escribe el archivo y agrega las cabeceras para generar la descarga
        $this->Head($file_name);
        echo $this->BOF();
        echo $this->xls;
        echo $this->EOF();
    }

    public function Archivo($loc_file) {
        //Crea archivo, borrando el que existe si ya existia
        //$loc_file : Ruta del archivo. Ej: "./downloads/archivo.xls"
        $f = fopen($loc_file, 'w');
        fwrite($f, $this->BOF());
        fwrite($f, $this->xls);
        fwrite($f, $this->EOF());
        fclose($f);
    }

    /* Fin Funciones para Convertir Excel */
}