<?php 
class Hello_Model extends CI_Model
{
    function saverecords($name, $email, $mobile)
    {
        $query = "INSERT INTO users values('','$name','$email','$mobile')";
        $this->db->query($query);
    }
}
?>