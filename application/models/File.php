<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class File extends CI_Model
{
    function __construct()
    {
        $this->tableName = 'files';
    }

    /**
     * 데이터베이스에서 파일 데이터 가져오기
     * @param id 지정된 경우 단일 레코드를 반환하고 그렇지 않으면 모든 레코드를 반환합니다.
     */
    public function getRows($id = '')
    {
        $this->db->select('id, file_name, uploaded_on');
        $this->db->from('files');
        if($id)
        {
            $this->db->where('id', $id);
            $query = $this->db->get();
            $result = $query->row_array();
        }
        else
        {
            $this->db->order_by('uploaded_on', 'desc');
            $query = $this->db->get();
            $result = $query->result_array();
        }

        return !empty($result) ? $result : false;
    }

    /**
     * 데이터베이스에 파일 데이터 삽입
     * @param array 테이블에 삽입하기 위한 데이터 배열
     */
    public function insert($data = array())
    {
        $insert = $this->db->insert('files', $data);
        return $insert ? true : false;
    }
}
?>