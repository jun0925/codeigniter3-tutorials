<?php 
class StudentPagination_Model extends CI_Model
{
    // 데이터(열) 수 조회
    public function get_count()
    {
        return $this->db->count_all('student');
    }

    // 한 페이지에 표시할 데이터 가져오기
    public function get_students($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get('student');
        return $query->result();
    }
}
?>