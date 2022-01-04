<?php 
class EmailController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // autoload에서 호출중이므로 주석처리
        // $this->load->helper('url');
    }

    public function index()
    {
        $this->load->view('email');
    }

    public function send()
    {
        // config폴더에있는 email.php 파일 호출
        $this->load->config('email');
        // email 라이브러리 호출
        $this->load->library('email');

        $from = $this->config->item('stmp_user');
        $to = $this->input->post('to');
        $subject = $this->input->post('subject');
        $message = $this->input->post('message');

        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        if($this->email->send())
        {
            echo 'Email has been sent successfully';
        }
        else
        {
            show_error($this->email->print_debugger());
        }
    }
}
?>