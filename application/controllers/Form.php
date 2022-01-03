<?php 
class Form extends CI_Controller
{
    public function __construct()
    {
        // CodeIgniter의 기본 생성자 호출
        parent::__construct();

        // autoload를 사용하면 아래와 같이 생성자에서 선언할 필요가 없습니다.
        // $this->load->helper(array('form'));
        // $this->load->library(array('form_validation'));

    }

    public function form()
    {
        // 검사 규칙을 정하기 위해서 set_rules 함수를 사용합니다.
        // 인수1: 필드이름
        // 인수2: 에러 메시지에 삽입될 이름
        // 인수3: 폼에 필요한 검사규칙들 
        // 인수4: 현재 필드의 어떤 룰에 대한 커스텀 에러메시지. 설정하지 않으면 기본 에러메세지가 출력됩니다.
        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('email','Email','required');

        // 검증규칙파일은 run() 함수를 호출하면 자동으로 로드되어 적용됩니다.
        // 규칙그룹 이름이 클래스/함수 이름과 완전히 동일하다면 run() 함수만 호출해도 자동으로 적용됩니다.
        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('form');
        }
        else
        {
            $this->load->view('success');
        }
    }
}
?>