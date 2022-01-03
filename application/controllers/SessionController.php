<?php 
class SessionController extends CI_Controller
{
    public function __construct()
    {
        // CodeIgniter의 기본 생성자 호출
        parent::__construct();

        // autoload에서 url helper를 호출했으므로 주석처리함
        // $this->load->helper('url');
        // session library 호출
        $this->load->library('session');
    }

    // 하나의 값을 세션에 넣기
    public function ex1()
    {
        $this->session->set_userdata('name', 'junsu');
        echo $this->session->userdata('name');
    }

    // 여러개의 값을 세션에 넣기
    public function ex2()
    {
        $data = array(
            'name' => 'junsu',
            'email' => 'junsu@mail.com'
        );
        $this->session->set_userdata($data);

        echo $this->session->userdata('name') . " / " . $this->session->userdata('email');
    }

    // 하나의 세션 값 지우기
    public function ex3()
    {
        $this->session->unset_userdata('name');
        echo $this->session->userdata('name');
    }

    // 여러개의 세션 값 지우기
    public function ex4()
    {
        $data = array('name', 'email');
        $this->session->unset_userdata($data);
        echo $this->session->userdata('name') . " / " . $this->session->userdata('email');
    }

    // 플래시 데이터 만들기
    public function ex5()
    {
        $this->session->set_flashdata('item1', 'value1');
        echo $this->session->userdata('item1');
    }

    // 일반 세션 데이터 만들기
    public function ex6()
    {
        $this->session->set_userdata('item2', 'value2');
        echo $this->session->userdata('item2');
    }
    
    // 플래시 데이터와 일반 세션데이터 호출하기
    public function ex7()
    {
        echo $this->session->userdata('itme1');
        echo $this->session->userdata('item2');
    }

    public function index()
    {
        $this->load->view('session');
    }

    public function flash()
    {
        $this->session->set_flashdata('sess', 'session message');
        redirect(base_url('Session/index'));
    }
}
?>