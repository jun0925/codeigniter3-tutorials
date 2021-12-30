<?php 
class User extends CI_Controller
{
    public function __construct()
    {
        // CodeIgniter의 기본 생성자 호출
        parent::__construct();
        // 데이터베이스 라이브러리르 수동으로 로드
        $this->load->database();
        // url 헬퍼 호출
        $this->load->helper('url');
    }

    public function index()
    {
        // name값이 register인 input 태그의 value값을 가져옴
        if($this->input->post('register'))
        {
            // post값을 호출함
            $n = $this->input->post('name');
            $e = $this->input->post('email');
            $p = $this->input->post('pass');
            $m = $this->input->post('mobile');
            $c = $this->input->post('course');

            // Model을 따로 만들지 않고 Controller에서 데이터베이스 쿼리를 처리
            $query = $this->db->query("select * from student where email='".$e."'");
            $row = $query->num_rows();
            if($row)
            {
                $data['error'] = '<h3 style="color:red">This user already exists</h3>';
            }
            else
            {
                $query = $this->db->query("insert into student values('','$n','$e','$p','$m','$c')");
                $data['error'] = '<h3 style="color:blue">Your account created successfully</h3>';
            }
        }

        // student_registration view파일에 $data 값을 전달해서 호출
        $this->load->view('student_registration', @$data);
    }
}
?>