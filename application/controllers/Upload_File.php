<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Upload_File extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        // file 모델을 호출합니다.
        $this->load->model('file');
    }

    public function index()
    {
        $data = array();

        // 데이터베이스에서 파일 데이터 가져오기
        $data['files'] = $this->file->getRows();

        // view 파일에 데이터를 전달합니다.
        $this->load->view('image', $data);
    }

    public function dragDropUpload()
    {
        // 파일 업로드 구성
        $config['max_size'] = 1024;
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = '*';

        // 업로드 라이브러리 로드 및 초기화
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        // 서버에 파일 업로드
        if($this->upload->do_upload('file'))
        {
            $fileData = $this->upload->data();
            $uploadData['file_name'] = $fileData['file_name'];
            $uploadData['uploaded_on'] = date("Y-m-d H:i:s");

            // 데이터베이스 파일 정보 삽입 =
            $insert = $this->file->insert($uploadData);
        }
    }
}
?>