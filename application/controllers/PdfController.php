<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class PdfController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PdfModel');
        $this->load->library('pdf');
    }

    public function index()
    {
        $data['customer_data'] = $this->PdfModel->showRecord();
        $this->load->view('htmltopdf', $data);
    }

    public function details()
    {
        if($this->uri->segment(3))
        {
            $customer_id = $this->uri->segment(3);
            $data['customer_details'] = $this->PdfModel->show_single_details($customer_id);
            $this->load->view('htmltopdf', $data);
        }
    }

    public function pdfdetails()
    {
        if($this->uri->segment(3))
        {
            $customer_id = $this->uri->segment(3);
            $html_content = '<h3 align="center">Generate PDF using Dompdf</h3>';
            $html_content .= $this->PdfModel->show_single_details($customer_id);
            $this->dompdf->loadHtml($html_content);
            $this->dompdf->set_option('isRemoteEnabled', TRUE);
            $this->dompdf->render();
            $this->dompdf->stream("".$customer_id.".pdf", array("Attachment"=>0));
        }
    }
}
?>