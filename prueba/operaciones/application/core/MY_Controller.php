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

    public function valida_usuario() {
        $this->load->model('users_model');
        if ($this->input->post('email') && $this->input->post('pass')) {

            $valid = $this->users_model->validate($this->input->post('email'), $this->input->post('pass'));

            if ($valid) {
                $this->session->set_userdata('user_data', $this->users_model->user_data->result_array[0]);
                $this->session->set_userdata('logged_in', TRUE);
            } else {
                $this->data['error_message'] = $this->users_model->error_message;
            }
        }

        if (!$this->session->userdata('logged_in')) {
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
                5, // margin bottom
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

    public function descarga_contrato($vista, $data, $nombre_archivo) {
        $html = $this->load->view($vista, $data, true);
        $html = iconv("UTF-8", "UTF-8//IGNORE", $html);
        $this->mpdf = new mPDF('l');
        $this->mpdf = new mPDF('', // mode - default ''
                'Legal', // format - A4, for example, default ''
                0, // font size - default 0
                'Arial', // default font family
                30, // margin_left
                30, // margin right
                30, // margin top
                50, // margin bottom
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

    public function descarga_giro($vista, $data, $nombre_archivo) {
//        $html = $this->load->view($vista, $data, true);
//        cambio de giro a pagare en panama para las ventas de facturas
//        debug($data['planilla']['monto_solicitud_aprobado'],false);
        $data['planilla']['monto_solicitud_aprobado'] = $data['planilla']['monto_solicitud_aprobado'] + ($data['planilla']['monto_solicitud_aprobado'] * 0.20);
//        debug($data['planilla']['monto_solicitud_aprobado']);
//        $solicitud['monto_solicitud_aprobado'] + ($solicitud['monto_solicitud_aprobado'] * 0.20);
        $html = $this->load->view('planillas/pagare_pj', $data, true);
//        fin


        $html = iconv("UTF-8", "UTF-8//IGNORE", $html);
        $htmlss = $this->load->view('planillas/mandato_custodia', $data, true);
        $htmlss = iconv("UTF-8", "UTF-8//IGNORE", $htmlss);
        $this->mpdf = new mPDF();
        $this->stylesheet = file_get_contents('css/style_ficha_pn.css');
        $this->mpdf->displayDefaultOrientation = false;
        $this->mpdf->AddPage('P', // L - landscape, P - portrait
                '', '', '', '', 20, // margin_left
                20, // margin right
                20, // margin top
                20, // margin bottom
                18, // margin header
                12); // margin footer
// $orientation [, string $type [, string $resetpagenum [, string $pagenumstyle [, string $suppress 


        $this->mpdf->WriteHTML($htmlss);

//        hoja para pagare
        $this->mpdf->AddPage('P', // L - landscape, P - portrait
                '', '', '', '', 30, // margin_left
                30, // margin right
                35, // margin top
                30, // margin bottom
                18, // margin header
                12); // margin footer
//        Hoja para Giro
//        $this->mpdf->AddPage('L', // L - landscape, P - portrait
//                '', '', '', '', 10, // margin_left
//                10, // margin right
//                10, // margin top
//                10, // margin bottom
//                18, // margin header
//                12); // margin footer
// $orientation [, string $type [, string $resetpagenum [, string $pagenumstyle [, string $suppress 
        $this->mpdf->WriteHTML($html);
        //para forzar descarga
//        $this->mpdf->Output($nombre_archivo, 'D');
        //para ver directamente desde el explorador
        $this->mpdf->Output($nombre_archivo, 'I');
    }

    public function descarga_giro_prestamo($vista, $data, $nombre_archivo) {
        $html = $this->load->view($vista, $data, true);
        $htmlss = $this->load->view('planillas/doc_prestamo', $data, true);
        $html = iconv("UTF-8", "UTF-8//IGNORE", $html);
        $htmlss = iconv("UTF-8", "UTF-8//IGNORE", $htmlss);
        $this->mpdf = new mPDF();
        $this->stylesheet = file_get_contents('css/style_ficha_pn.css');
        $this->mpdf->displayDefaultOrientation = false;
        $this->mpdf->AddPage('P', // L - landscape, P - portrait
                '', '', '', '', 15, // margin_left
                15, // margin right
                15, // margin top
                15, // margin bottom
                15, // margin header
                12); // margin footer
// $orientation [, string $type [, string $resetpagenum [, string $pagenumstyle [, string $suppress 
        $this->mpdf->WriteHTML($htmlss);
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

    public function descarga_giro_prestamo_pn($vista, $data, $nombre_archivo) {
        $html = $this->load->view($vista, $data, true);
        $htmlss = $this->load->view('planillas/doc_prestamo_pn', $data, true);
        $html = iconv("UTF-8", "UTF-8//IGNORE", $html);
        $htmlss = iconv("UTF-8", "UTF-8//IGNORE", $htmlss);
        $this->mpdf = new mPDF();
        $this->stylesheet = file_get_contents('css/style_ficha_pn.css');
        $this->mpdf->displayDefaultOrientation = false;
        $this->mpdf->AddPage('P', // L - landscape, P - portrait
                '', '', '', '', 15, // margin_left
                15, // margin right
                15, // margin top
                15, // margin bottom
                15, // margin header
                12); // margin footer
// $orientation [, string $type [, string $resetpagenum [, string $pagenumstyle [, string $suppress 
        $this->mpdf->WriteHTML($htmlss);
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

    public function descarga_pagare($vista, $data, $nombre_archivo) {
        $html = $this->load->view($vista, $data, true);
        $htmlss = $this->load->view('planillas/mandato_custodia', $data, true);
        $html = iconv("UTF-8", "UTF-8//IGNORE", $html);
        $htmlss = iconv("UTF-8", "UTF-8//IGNORE", $htmlss);
        $this->mpdf = new mPDF();
        $this->stylesheet = file_get_contents('css/style_ficha_pn.css');
        $this->mpdf->AddPage('P', // L - landscape, P - portrait
                '', '', '', '', 30, // margin_left
                30, // margin right
                35, // margin top
                30, // margin bottom
                18, // margin header
                12); // margin footer
        $this->mpdf->WriteHTML($html);
        //para forzar descarga
//        $this->mpdf->Output($nombre_archivo, 'D');
        //para ver directamente desde el explorador
        $this->mpdf->Output($nombre_archivo, 'I');
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

    public function enviar_pagare($vista, $data, $nombre_archivo) {
        $html = $this->load->view($vista, $data, true);
        $html = iconv("UTF-8", "UTF-8//IGNORE", $html);
        $this->mpdf = new mPDF();
        $this->mpdf->AddPage('P', // L - landscape, P - portrait
                '', '', '', '', 30, // margin_left
                30, // margin right
                35, // margin top
                30, // margin bottom
                18, // margin header
                12); // margin footer

        if ($data['tipo'] == 0) {
            $mailto = $data['planilla']['email_pn'];
        } else {
            $mailto = $data['planilla']['email_pj'];
        }
        $this->mpdf->WriteHTML($html);

        $content = $this->mpdf->Output($nombre_archivo, 'S');

        $content = chunk_split(base64_encode($content));

        $from_name = 'Assets Factoring Administracion';
        $from_mail = 'info@assetsfactoring.com';
        $replyto = 'info@assetsfactoring.com';
        $uid = md5(uniqid(time()));
        $subject = 'Solicitud de Pagare aprobada';
        $message = 'Su solicitud de pagare ha sido aprobada adjunto documentacion para su revision';
        $filename = $nombre_archivo;

        // header
        $header = "From: " . $from_name . " <" . $from_mail . ">\r\n";
        $header .= "Reply-To: " . $replyto . "\r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-Type: multipart/mixed; boundary=\"" . $uid . "\"\r\n\r\n";

// message & attachment
        $nmessage = "--" . $uid . "\r\n";
        $nmessage .= "Content-type:text/plain; charset=iso-8859-1\r\n";
        $nmessage .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
        $nmessage .= $message . "\r\n\r\n";
        $nmessage .= "--" . $uid . "\r\n";
        $nmessage .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"\r\n";
        $nmessage .= "Content-Transfer-Encoding: base64\r\n";
        $nmessage .= "Content-Disposition: attachment; filename=\"" . $filename . "\"\r\n\r\n";
        $nmessage .= $content . "\r\n\r\n";
        $nmessage .= "--" . $uid . "--";

        if (mail($mailto, $subject, $nmessage, $header)) {
            return true; // Or do something here
        } else {
            return false;
        }
    }

    public function enviar_prestamo($vista, $data, $nombre_archivo) {

        $html = $this->load->view($vista, $data, true);
        $htmlss = $this->load->view('planillas/doc_prestamo', $data, true);
        $html = iconv("UTF-8", "UTF-8//IGNORE", $html);
        $htmlss = iconv("UTF-8", "UTF-8//IGNORE", $htmlss);
        $this->mpdf = new mPDF();
        $this->stylesheet = file_get_contents('css/style_ficha_pn.css');
        $this->mpdf->displayDefaultOrientation = false;
        $this->mpdf->AddPage('P', // L - landscape, P - portrait
                '', '', '', '', 15, // margin_left
                15, // margin right
                15, // margin top
                15, // margin bottom
                15, // margin header
                12); // margin footer
// $orientation [, string $type [, string $resetpagenum [, string $pagenumstyle [, string $suppress 
        $this->mpdf->WriteHTML($htmlss);
        $this->mpdf->AddPage('L', // L - landscape, P - portrait
                '', '', '', '', 10, // margin_left
                10, // margin right
                10, // margin top
                10, // margin bottom
                18, // margin header
                12); // margin footer
// $orientation [, string $type [, string $resetpagenum [, string $pagenumstyle [, string $suppress 
        $this->mpdf->WriteHTML($html);


        if ($data['tipo'] == 0) {
            $mailto = $data['planilla']['email_pn'];
        } else {
            $mailto = $data['planilla']['email_pj'];
        }

        $mailto = $data['data_empresa']['email_pj'];

        $content = $this->mpdf->Output($nombre_archivo, 'S');
        $content = chunk_split(base64_encode($content));
        $from_name = 'Assets Factoring Administracion';
        $from_mail = 'info@assetsfactoring.com';
        $replyto = 'info@assetsfactoring.com';
        $uid = md5(uniqid(time()));
        $subject = 'Prestamo Assets Factoring';
        $message = 'Adjunto se le ha enviado el Documento de Prestamo por favor firmelo y envielo a nuestra Oficina';
        $filename = $nombre_archivo;

        // header
        $header = "From: " . $from_name . " <" . $from_mail . ">\r\n";
        $header .= "Reply-To: " . $replyto . "\r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-Type: multipart/mixed; boundary=\"" . $uid . "\"\r\n\r\n";

// message & attachment
        $nmessage = "--" . $uid . "\r\n";
        $nmessage .= "Content-type:text/plain; charset=iso-8859-1\r\n";
        $nmessage .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
        $nmessage .= $message . "\r\n\r\n";
        $nmessage .= "--" . $uid . "\r\n";
        $nmessage .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"\r\n";
        $nmessage .= "Content-Transfer-Encoding: base64\r\n";
        $nmessage .= "Content-Disposition: attachment; filename=\"" . $filename . "\"\r\n\r\n";
        $nmessage .= $content . "\r\n\r\n";
        $nmessage .= "--" . $uid . "--";

        if (mail($mailto, $subject, $nmessage, $header)) {
            return true; // Or do something here
        } else {
            return false;
        }
    }

    public function enviar_prestamo_pn($vista, $data, $nombre_archivo) {

        $html = $this->load->view($vista, $data, true);
        $htmlss = $this->load->view('planillas/doc_prestamo_pn', $data, true);
        $html = iconv("UTF-8", "UTF-8//IGNORE", $html);
        $htmlss = iconv("UTF-8", "UTF-8//IGNORE", $htmlss);
        $this->mpdf = new mPDF();
        $this->stylesheet = file_get_contents('css/style_ficha_pn.css');
        $this->mpdf->displayDefaultOrientation = false;
        $this->mpdf->AddPage('P', '', '', '', '', 15, // margin_left
                15, // margin right
                15, // margin top
                15, // margin bottom
                15, // margin header
                12); // margin footer

        $this->mpdf->WriteHTML($htmlss);
        $this->mpdf->AddPage('L', // L - landscape, P - portrait
                '', '', '', '', 10, // margin_left
                10, // margin right
                10, // margin top
                10, // margin bottom
                18, // margin header
                12); // margin footer

        $this->mpdf->WriteHTML($html);
        if ($data['tipo'] == 0) {
            $mailto = $data['planilla']['email_pn'];
        } else {
            $mailto = $data['planilla']['email_pj'];
        }

        $content = $this->mpdf->Output($nombre_archivo, 'S');
        $content = chunk_split(base64_encode($content));
        $from_name = 'Assets Factoring Administracion';
        $from_mail = 'info@assetsfactoring.com';
        $replyto = 'info@assetsfactoring.com';
        $uid = md5(uniqid(time()));
        $subject = 'Prestamo Assets Factoring';
        $message = 'Adjunto se le ha enviado el Documento de Prestamo por favor firmelo y envielo a nuestra Oficina';
        $filename = $nombre_archivo;

        // header
        $header = "From: " . $from_name . " <" . $from_mail . ">\r\n";
        $header .= "Reply-To: " . $replyto . "\r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-Type: multipart/mixed; boundary=\"" . $uid . "\"\r\n\r\n";

// message & attachment
        $nmessage = "--" . $uid . "\r\n";
        $nmessage .= "Content-type:text/plain; charset=iso-8859-1\r\n";
        $nmessage .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
        $nmessage .= $message . "\r\n\r\n";
        $nmessage .= "--" . $uid . "\r\n";
        $nmessage .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"\r\n";
        $nmessage .= "Content-Transfer-Encoding: base64\r\n";
        $nmessage .= "Content-Disposition: attachment; filename=\"" . $filename . "\"\r\n\r\n";
        $nmessage .= $content . "\r\n\r\n";
        $nmessage .= "--" . $uid . "--";

        if (mail($mailto, $subject, $nmessage, $header)) {
            return true; // Or do something here
        } else {
            return false;
        }
    }

    public function enviar_convenio($vista, $data, $nombre_archivo) {

        $mailto = $data['solicitud']['email_pj'];
        $data['planilla']['monto_solicitud_aprobado'] = $data['planilla']['monto_solicitud_aprobado'] + ($data['planilla']['monto_solicitud_aprobado'] * 0.20);
//        debug($data['planilla']['monto_solicitud_aprobado']);
        $html = $this->load->view($vista, $data, true);
        $html = iconv("UTF-8", "UTF-8//IGNORE", $html);
        $htmlss = $this->load->view('planillas/mandato_custodia', $data, true);
        $htmlss = iconv("UTF-8", "UTF-8//IGNORE", $htmlss);
        $this->mpdf = new mPDF();
        $this->stylesheet = file_get_contents('css/style_ficha_pn.css');
        $this->mpdf->displayDefaultOrientation = false;
        $this->mpdf->AddPage('P', // L - landscape, P - portrait
                '', '', '', '', 30, // margin_left
                30, // margin right
                30, // margin top
                30, // margin bottom
                18, // margin header
                12); // margin footer
// $orientation [, string $type [, string $resetpagenum [, string $pagenumstyle [, string $suppress 
        $this->mpdf->WriteHTML($htmlss);
        $this->mpdf->AddPage('P', // L - landscape, P - portrait
                '', '', '', '', 30, // margin_left
                30, // margin right
                35, // margin top
                30, // margin bottom
                18, // margin header
                12); // margin footer
// $orientation [, string $type [, string $resetpagenum [, string $pagenumstyle [, string $suppress 
        $this->mpdf->WriteHTML($html);

        $content = $this->mpdf->Output($nombre_archivo, 'S');

        $content = chunk_split(base64_encode($content));

        $from_name = 'Assets Factoring Administracion';
        $from_mail = 'info@assetsfactoring.com';
        $replyto = 'info@assetsfactoring.com';
        $uid = md5(uniqid(time()));
        $subject = 'Solicitud de Venta aprobada';
        $message = 'Su solicitud de Venta ha sido aprobada adjunto documentacion para su revision';
        $filename = $nombre_archivo;

        // header
        $header = "From: " . $from_name . " <" . $from_mail . ">\r\n";
        $header .= "Reply-To: " . $replyto . "\r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-Type: multipart/mixed; boundary=\"" . $uid . "\"\r\n\r\n";

// message & attachment
        $nmessage = "--" . $uid . "\r\n";
        $nmessage .= "Content-type:text/plain; charset=iso-8859-1\r\n";
        $nmessage .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
        $nmessage .= $message . "\r\n\r\n";
        $nmessage .= "--" . $uid . "\r\n";
        $nmessage .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"\r\n";
        $nmessage .= "Content-Transfer-Encoding: base64\r\n";
        $nmessage .= "Content-Disposition: attachment; filename=\"" . $filename . "\"\r\n\r\n";
        $nmessage .= $content . "\r\n\r\n";
        $nmessage .= "--" . $uid . "--";

        if (mail($mailto, $subject, $nmessage, $header)) {
            return true; // Or do something here
        } else {
            return false;
        }
    }

    public function enviar_contrato($vista, $data, $nombre_archivo) {
        $html = $this->load->view($vista, $data, true);
        $html = iconv("UTF-8", "UTF-8//IGNORE", $html);
        $this->mpdf = new mPDF('l');
        $this->mpdf = new mPDF('', // mode - default ''
                'Legal', // format - A4, for example, default ''
                0, // font size - default 0
                'Arial', // default font family
                30, // margin_left
                30, // margin right
                30, // margin top
                50, // margin bottom
                9, // margin header
                9, // margin footer
                'L'); // L - landscape, P - portrait
        $this->stylesheet = file_get_contents('css/style_ficha_pn.css');
        $this->mpdf->SetDisplayMode('fullpage');

        $this->mpdf->WriteHTML($html);

        $content = $this->mpdf->Output($nombre_archivo, 'S');

        $content = chunk_split(base64_encode($content));

        $from_name = 'Assets Factoring Administracion';
        $from_mail = 'info@assetsfactoring.com';
        $replyto = 'info@assetsfactoring.com';
        $uid = md5(uniqid(time()));
        $subject = 'Solicitud de Cupo aprobada';
        $message = 'Su solicitud de Cupo ha sido aprobada adjunto documentacion para su revision';
        $filename = $nombre_archivo;

        // header
        $header = "From: " . $from_name . " <" . $from_mail . ">\r\n";
        $header .= "Reply-To: " . $replyto . "\r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-Type: multipart/mixed; boundary=\"" . $uid . "\"\r\n\r\n";

// message & attachment
        $nmessage = "--" . $uid . "\r\n";
        $nmessage .= "Content-type:text/plain; charset=iso-8859-1\r\n";
        $nmessage .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
        $nmessage .= $message . "\r\n\r\n";
        $nmessage .= "--" . $uid . "\r\n";
        $nmessage .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"\r\n";
        $nmessage .= "Content-Transfer-Encoding: base64\r\n";
        $nmessage .= "Content-Disposition: attachment; filename=\"" . $filename . "\"\r\n\r\n";
        $nmessage .= $content . "\r\n\r\n";
        $nmessage .= "--" . $uid . "--";

        if (mail($mailto, $subject, $nmessage, $header)) {
            return true; // Or do something here
        } else {
            return false;
        }
    }

    function email($correo, $asunto, $cuerpo) {
        $this->load->library('email');

        $this->email->from('admin@assetsfactoring.com', 'Assets Factoring, INC.');
        $this->email->to($correo);
        $this->email->cc('willyra2003@yahoo.com');
        $this->email->bcc('willyra2003@yahoo.com');
        $this->email->subject($asunto);
        $this->email->message($cuerpo);
// debug($this->email);
        $this->email->send();

        // echo $this->email->print_debugger();
    }

}
