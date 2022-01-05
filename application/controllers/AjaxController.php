<?php 
class AjaxController extends CI_Controller
{
    public function index()
    {
        $this->load->view('Ajaxform');
    }

    public function savedata()
    {
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'course' => $this->input->post('course')
        );

        $this->load->model('AjaxModel');
        $result = $this->AjaxModel->saveData($data);
        if($result)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }

    public function checkUser()
    {
        $email = $this->input->post('email');
        $this->load->model('AjaxModel');
        $result = $this->AjaxModel->checkuser($email);
        if($result)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }
}
?>