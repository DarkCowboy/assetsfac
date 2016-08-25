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
        $this->mpdf = new mPDF('l');
        $this->mpdf = new mPDF('', // mode - default ''
                        'Legal', // format - A4, for example, default ''
                        0, // font size - default 0
                        'Arial', // default font family
                        26, // margin_left
                        25, // margin right
                        35, // margin top
                        95, // margin bottom
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
        $html = $this->load->view($vista, $data, true);
        $htmlss = $this->load->view('planillas/mandato_custodia', $data, true);
        $this->mpdf = new mPDF();
        $this->stylesheet = file_get_contents('css/style_ficha_pn.css');
        $this->mpdf->displayDefaultOrientation = false;
        $this->mpdf->AddPage('P', // L - landscape, P - portrait
                '', '', '', '',
                30, // margin_left
                30, // margin right
                30, // margin top
                30, // margin bottom
                18, // margin header
                12); // margin footer
// $orientation [, string $type [, string $resetpagenum [, string $pagenumstyle [, string $suppress 
        $this->mpdf->WriteHTML($htmlss);
        $this->mpdf->AddPage('L', // L - landscape, P - portrait
                '', '', '', '',
                10, // margin_left
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
        $this->mpdf = new mPDF();
        $this->stylesheet = file_get_contents('css/style_ficha_pn.css');
        $this->mpdf->AddPage('P', // L - landscape, P - portrait
                '', '', '', '',
                30, // margin_left
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

}