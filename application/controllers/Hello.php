<?php 
    class Hello extends CI_Controller
    {
        public function __construct()
        {
            // CodeIgniter의 기본 생성자 호출
            parent::__construct();
            // 데이터베이스 라이브러리를 수동으로 로드 (auto_load를 사용하지 않는 방법)
            $this->load->database();
            // url 헬퍼 호출. helper란 특정영역에 해당하는 함수들의 모음입니다.
            $this->load->helper('url');
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
                redirect("Hello/dispdata");
            }
        }

        public function dispdata()
        {
            // 화면에 표시할 데이터를 모델에 있는 메서드로 받아와서 $result['data']에 넣음
            $result['data'] = $this->Hello_Model->displayrecords();
            // view()메서드 2번째 인자에 배열로 값을 전달하면 View에서 사용할수 있다. View에서 표시할 데이터를 전달.
            $this->load->view('display_records', $result);
        }

        public function deletedata()
        {
            // id값을 get타입으로 받아옵니다.
            $id = $this->input->get('id');
            // Hello_Model에 있는 deleterecords 메서드 호출
            $this->Hello_Model->deleterecords($id);
            // url을 Hello/dispdate로 이동시킴
            redirect("Hello/dispdata");
        }
    }
?>