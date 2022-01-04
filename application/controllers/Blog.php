<?php 
class Blog extends CI_Controller
{
    public function __construct()
    {
        // CodeIgniter 기본 생성자 호출
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('Blog_Model');
    }

    public function createTable()
    {
        $query = "create table blog(
            id int not null primary key auto_increment,
            title varchar(50) not null,
            contents text not null,
            created_at timestamp not null default current_timestamp
        )";
        $result = $this->db->query($query);

        echo $result ? "테이블이 생성되었습니다." : "테이블 생성에 실패했습니다.";
    }

    public function deleteTable(){
        $result = $this->Blog_Model->deleteTable();
        $query = "drop table blog";
        $result = $this->db->query($query);

        echo $result ? "테이블이 삭제되었습니다." : "테이블 삭제에 실패했습니다.";
    }

    public function index()
    {
        $query = $this->db->query('select * from blog');
        $this->load->view('blog', array("data"=>$query->result()));
    }

    public function create()
    {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('contents', 'Contents', 'required');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('blog_create');
        }
        else
        {
            $title = $this->input->post('title');
            $contents = $this->input->post('contents');

            $query = "INSERT INTO blog(title, contents) VALUES(".$this->db->escape($title).",".$this->db->escape($contents).")";
            $result = $this->db->query($query);
            if($result)
            {
                redirect('Blog');
            }
            else
            {
                echo "등록에 실패했습니다. " . anchor('Blog','리스트 페이지로 이동하기');
            }
        }
    }

    public function update($id)
    {
        $this->form_validation->set_rules('title','Title','required');
        $this->form_validation->set_rules('contents','Contents','required');

        if($this->form_validation->run() == FALSE)
        {
            $query = $this->db->query('select * from blog where id ='.$id);
            $result['data'] = $query->row_array();
            $this->load->view('blog_update', $result);
        }
        else
        {
            $title = $this->input->post('title');
            $contents = $this->input->post('contents');
            $query = "UPDATE blog SET title = ".$this->db->escape($title).",contents = ".$this->db->escape($contents)." WHERE id = {$id}";
            $result = $this->db->query($query);
            if($result)
            {
                redirect('Blog');
            }
            else
            {
                echo "수정에 실패했습니다. " . anchor('Blog', '리스트 페이지로 이동하기');
            }
        }
    }

    public function delete($id)
    {
        $result = $this->db->query('delete from blog where id ='.$id);
        if($result)
        {
            redirect('Blog');
        }
        else
        {
            echo "삭제에 실패했습니다. " . anchor('Blog', '리스트 페이지로 이동하기');
        }
    }
}
?>