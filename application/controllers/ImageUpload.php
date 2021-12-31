<?php 
class ImageUpload extends CI_Controller
{
    public function __construct()
    {
        // CodeIgniter의 기본 생성자 호출
        parent::__construct();
        // url과 form에 대한 helper를 호출합니다.
        $this->load->helper('url', 'form');
        // form 유효성검사에 사용할 라이브러리를 호출합니다.
        $this->load->library('form_validation');
    }

    public function index()
    {
        // imageupload_form view 파일을 호출합니다.
        $this->load->view('imageupload_form');
    }

    // upload 처리 메서드
    public function upload()
    {
        // 업로드에 필요한 설정을 지정합니다.
        // 업로드할 파일 위치
        $config['upload_path'] = './upload/';
        // 업로드에 허용할 이미지 확장자
        $config['allowed_types'] = 'gif|jpg|png';
        // 업로드 용량 제한
        $config['max_size'] = 2000;
        // 업로드 가로폭 제한
        $config['max_width'] = 1500;
        // 업로드 세로폭 제한
        $config['max_height'] = 1500;

        // 업로드에 필요한 설정을 전달하여 업로드 라이브러리를 호출합니다.
        $this->load->library('upload', $config);

        // file 타입의 input name값을 가져옵니다. name="profile_pic"에 값이 없는 경우 error 메시지를 출력합니다.
        if(!$this->upload->do_upload('profile_pic'))
        {
            $error = array('error' => $this->upload->display_errors());

            // error가 발생한 경우 erorr 내용을 imageupload_form view 파일에 전달하여 호출합니다.
            $this->load->view('imageupload_form', $error);
        }
        else
        {
            // 파일정보를 data 변수에 대입합니다.
            $data = array('image_metadata' => $this->upload->data());
            
            $this->load->view('imageupload_success', $data);
        }
    }
}
?>