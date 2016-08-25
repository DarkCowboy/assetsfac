<?

class Prueba extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        $config['smtp_port'] = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user'] = 'rbrito@msfactoring.com.ve';
        $config['smtp_pass'] = 'r.16706510';
        $config['charset'] = 'utf-8'; 
        $config['newline'] = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not      

        $this->load->library('email');

        $correo = 'lhernandez@mercosur.com.ve';
        $asunto = 'epale luis ';
        $cuerpo = 'prueba';

        $this->email->from('rbrito@msfactoring.com.ve', 'Ms Factoring C.A.');
        $this->email->reply_to('rbrito@msfactoring.com.ve', 'Ms Factoring C.A.');
        $this->email->to($correo);
        $this->email->subject($asunto);
        $this->email->message($cuerpo);

        $this->email->send();
        echo 'enviado';

        // echo $this->email->print_debugger();
    }

}