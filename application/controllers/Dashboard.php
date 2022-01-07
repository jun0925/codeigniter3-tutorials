<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function center_details()
    {
        $this->form_validation->set_rules('Name[]', 'Name', 'required');
        $this->form_validation->set_rules('Depmt[]', 'Department', 'required');
        $this->form_validation->set_rules('course[]', 'Course', 'required');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('admin/center_emp_details');
        }
        else
        {
            $post = $this->input->post();
            for($i=0; $i<count($post['Name']); $i++)
            {
                $data = array(
                    'name' => $post['Name'][$i],
                    'department' => $post['Depmt'][$i],
                    'course' => $post['course'][$i]
                );
                // 실행결과 : INSERT INTO salary(name,department,course) VALUES('$post['Name'][$i]','$post['Dempt'][$i]',''course' => $post['course'][$i]')
                $this->db->insert('salary', $data);
            }
        }
    }
}
?>