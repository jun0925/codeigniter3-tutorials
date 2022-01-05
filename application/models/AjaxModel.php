<?php 
class AjaxModel extends CI_Model
{
    public function saveData($data)
    {
        if($this->db->insert('student', $data))
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }

    public function checkuser($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('student');
        if($query->num_rows()>0)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
}
?>