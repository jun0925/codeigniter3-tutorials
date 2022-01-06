<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class ExportController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->helper('url');
        $this->load->model('ExportModel');
    }

    public function index()
    {
        $data = array();
        $data['usersData'] = $this->ExportModel->getUserDetails();
        $this->load->view('export_view', $data);
    }

    // CSV 형식으로 데이터 내보내기
    public function exportCSV()
    {
        // CSV 파일 이름
        $filename = 'users_'.date('Ymd').'.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv");

        // 데이터 가져오기
        $usersData = $this->ExportModel->getUserDetails();

        // 파일 만들기
        $file = fopen('php://output', 'w');

        $header = array("No", "이름", "모바일", "이메일");
        fputcsv($file, $header);

        foreach($usersData as $line)
        {
            fputcsv($file, $line);
        }

        fclose($file);
        exit;
    }
}
?>