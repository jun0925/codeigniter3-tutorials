<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class PdfModel extends CI_Model
{
    public function showRecord()
    {
        return $this->db->get('tbl_users');
    }

    public function show_single_details($customer_id)
    {
        $this->db->where('UserID', $customer_id);
        $data = $this->db->get('tbl_users');
        $output = '<table width="100%" cellspacing="5" cellpadding="5">';
        foreach($data->result() as $row)
        {
            $output .= '
            <tr>
                <td width="25%"><img src="'.base_url().'images/'.$row->images.'" /></td>
                <td width="75%">
                    <p><b>Name: </b>'.$row->Name.'</p>
                    <p><b>Address: </b>'.$row->Address.'</p>
                    <p><b>City: </b>'.$row->City.'</p>
                    <p><b>Postal Code: </b>'.$row->PostalCode.'</p>
                    <p><b>Country: </b>'.$row->Country.'</p>
                </td>
            </tr>
            ';
        }
        $output .= '</table>';
        return $output;
    }
}
?>