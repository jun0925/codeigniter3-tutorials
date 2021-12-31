<?php defined('BASEPATH') OR exit('No direct script access allowed');

class StudentPagination extends CI_Controller
{
    public function __construct()
    {
        // CodeIgniter의 기본 생성자 호출
        parent::__construct();
        // 데이터베이스 라이브러리를 수동으로 로드
        $this->load->database();
        // url, form 헬퍼 호출
        $this->load->helper('url','form');
        // pagination 라이브러리 호출
        $this->load->library('pagination');
        // StudentPagination_Model 호출
        $this->load->model('StudentPagination_Model');
    }

    public function index()
    {
        $config = array();
        // base_url 페이지네이션에 포함될 컨트롤러/함수 전체의 url입니다.
        $config["base_url"] = base_url() . "StudentPagination/index";
        // 페이지네이션할 전체 레코드의 수입니다. 통상적으로 데이터베이스 쿼리에서 리턴되는 전체 열 수 입니다.
        $config["total_rows"] = $this->StudentPagination_Model->get_count();
        // 한 페이지에 보여질 데이터(열)수 입니다. 한 페이지에 10개의 데이터가 보여질 예정입니다.
        $config["per_page"] = 10;
        // 페이지 번호를 URI 새그먼트의 어느부분에 포함시킬지 자동으로 결정합니다.
        $config["uri_segment"] = 3;
        // 선택된 페이지번호 좌우로 몇개의 "숫자"링크를 보여줄지 설정합니다.
        // $config["num_links"] = 5;

        // 페이지네이션 초기화
        $this->pagination->initialize($config);

        // 특정 세그먼트 값을 추출해 냅니다.(3번째 세그먼트 값을 추출해서 있으면 그 값을 없으면 0을 $page에 담음)
        // http://example.com/index.php?class=test&method=page&per_page=20 이므로 세그먼트 3번째입니다.
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        // 페이지 이동할 링크를 생성하는 메서드입니다.
        $data["links"] = $this->pagination->create_links();
        // 한 페이지에 표시할 데이터 가져오기
        $data["student"] = $this->StudentPagination_Model->get_students($config["per_page"], $page);

        $this->load->view('pagination', $data);
    }
}
?>