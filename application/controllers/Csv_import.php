<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Csv_import extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // csv_import_model 호출
        $this->load->model('csv_import_model');

        // CSVReader 라이브러리 호출
        $this->load->library('CSVReader');
    }

    public function index()
    {
        $this->load->view('csv_import');
    }

    public function display_data()
    {
        $result = $this->csv_import_model->select();
        $output = '
            <h3 align="center">CSV에서 가져온 사용자 세부 정보</h3>
                <div class="table table-bordered">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>No</th>
                            <th>이름</th>
                            <th>이메일</th>
                            <th>모바일</th>
                        </tr>
        ';
        $count = 0;
        if($result->num_rows() > 0)
        {
            foreach($result->result() as $row)
            {
                $count = $count + 1;
                $output .= '
                    <tr>
                        <td>'.$count.'</td>
                        <td>'.$row->name.'</td>
                        <td>'.$row->email.'</td>
                        <td>'.$row->phone.'</td>
                    </tr>';
            }
        }
        else
        {
            $output .= '
                <tr>
                    <td colspan="5" align="center">사용가능한 데이터가 없습니다.</td>
                </tr>
            ';
        }
        $output .= '</table></div>';
        echo $output;
    }

    public function import_csv()
    {
        $file_data = $this->csvreader->parse_csv($_FILES["csv_file"]["tmp_name"]);
        foreach($file_data as $row)
        {
            $data[] = array(
                'name' => $row['name'],
                'phone' => $row['phone'],
                'email' => $row['email']
            );
        }
        $this->csv_import_model->insert($data);
    }
}
?>