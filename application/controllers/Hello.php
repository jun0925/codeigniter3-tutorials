<?php 
    class Hello extends CI_Controller
    {
        public function __construct()
        {
            // CodeIgniter의 기본 생성자 호출
            parent::__construct();

            // 데이터베이스 라이브러리를 수동으로 로드 (auto_load를 사용하지 않는 방법)
            $this->load->database();

            // 모델 로드
            $this->load->model('Hello_Model');
        }

        public function savedata()
        {
            // 등록 보기 양식 로드
            $this->load->view('registration');

            // 제출 버튼 확인
            if($this->input->post('save'))
            {
                // 폼 데이터를 가져와서 로컬 변수에 저장
                $n = $this->input->post('name');
                $e = $this->input->post('email');
                $m = $this->input->post("mobile");

                // Hello_Model의 saverecord 메소드를 호출하고 변수를 매개변수로 전달
                $this->Hello_Model->saverecords($n, $e, $m);
                echo "레코드를 저장하였습니다.";
            }
        }
    }
?>