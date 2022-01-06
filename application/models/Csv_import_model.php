<?php 
class Csv_import_model extends CI_Model
{
    public function select()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('tbl_user');
        return $query;
    }

    public function insert($data)
    {
        $this->db->insert_batch('tbl_user', $data);
    }
}
?>