<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class PasswordController extends CI_Controller
{
    public function __construct()
    {
        // CodeIgniter 기본 생성자
        parent::__construct();
        // session 라이브러리를 호출합니다.
        $this->load->library('session');
    }

    public function index()
    {
        // 배열을 이용한 검증 규칙 설정 : 여러 검사 규칙을 한번에 처리할 수 있습니다.(배열의 키 이름은 반드시 아래와 같아야 합니다.)
        $rules = array(
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required' // 필수
            ],
            [
                'field' => 'new_password',
                'label' => 'New Password',
                'rules' => 'callback_valid_password' // 콜백함수 기능
            ],
            [
                'field' => 'confirm_password',
                'label' => 'Confirm Password',
                'rules' => 'matches[new_password]' // new_password랑 일치하는지 확인
            ]
        );

        // 검사 규칙을 설정하기 위해서 set_rules 함수를 사용합니다.
        $this->form_validation->set_rules($rules);

        // run() 함수를 호출하면 검증규칙파일을 자동으로 로드합니다.
        if($this->form_validation->run() == FALSE)
        {
            // 폼 데이터를 전송받지 않은 경우
            $this->load->view('PasswordValidation');
        }
        else
        {
            // 폼 데이터를 전송받은 경우
            $this->session->set_flashdata('success','축하합니다.');
            // PasswordController/index 페이지로 리다이렉트합니다.
            redirect(base_url('PasswordController/index'));
        }
    }

    // Create strong password 
    // 위에서 new_password로 콜백 지정한 함수
    public function valid_password($password = "")
    {
        // 좌우 여백 제거
        $password = trim($password);

        // 정규표현식
        $regex_lowercase = '/[a-z]/';
        $regex_uppercase = '/[A-Z]/';
        $regex_number = '/[0-9]/';
        $regex_special = '/[!@#$%^&*()\-_=+{};:,<.>ยง~]/';

        // 비밀번호가 빈 값일때
        if(empty($password))
        {
            // 에러메시지 설정('rule', 'Error Message')
            $this->form_validation->set_message('valid_password', '{field} 필드는 필수입니다.');
            return FALSE;
        }

        // 비밀번호에 대문자가 하나도 없는 경우
        if(preg_match_all($regex_lowercase, $password) < 1)
        {
            $this->form_validation->set_message('valid_password', '{field} 필드는 하나 이상의 소문자가 있어야 합니다.');
            return FALSE;
        }

        // 비밀번호에 소문자가 하나도 없는 경우
        if(preg_match_all($regex_uppercase, $password) < 1)
        {
            $this->form_validation->set_message('valid_password', '{field} 필드는 하나 이상의 대문자가 있어야 합니다.');
            return FALSE;
        }

        // 비밀번호에 숫자가 하나도 없는 경우
        if(preg_match_all($regex_number, $password) < 1)
        {
            $this->form_validation->set_message('valid_password', '{field} 필드는 하나 이상의 숫자가 있어야 합니다.');
            return FALSE;
        }

        // 비밀번호에 특수문자가 하나도 없는 경우
        if(preg_match_all($regex_special, $password) < 1)
        {
            $this->form_validation->set_message('valid_password', '{field} 필드는 하나 이상의 특수문자가 있어야 합니다..' . ' ' . htmlentities('!@#$%^&*()\-_=+{};:,<.>ยง~'));
            return FALSE;
        }

        // 비밀번호가 5자리 미만인 경우
        if(strlen($password) < 5)
        {
            $this->form_validation->set_message('valid_password', '{field} 필드의 길이는 5자 이상이어야 합니다.');
            return FALSE;
        }

        // 비밀번호가 32자 초과하는 경우
        if(strlen($password) > 32)
        {
            $this->form_validation->set_message('valid_password', '{field} 필드의 길이는 32자를 초과할 수 없습니다.');
            return FALSE;
        }

        return TRUE;
    }
    // storong password end
}
?>