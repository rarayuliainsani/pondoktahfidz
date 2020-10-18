<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_hafalan extends CI_Controller {

  //   function __autoload($class) {
  //   DOMPDF_autoload($class);

  // }
    public function __construct()
    {
        parent::__construct();
      //require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';
        $this->load->model('lap_hafalan_model');
        $model = $this->load->model('santri_model');

        //$this->load->model('anggota_model');
    }
    public function index()
    {
         $data = array(
            'title' => 'Laporan Hafalan',
            'isi'    => 'pengajar/laporan/lap_hafalan',
            'santri' => $this->santri_model->listing()
        );
        $data['idsantri'] ='' ;
        //$data['bulan'] = '';
      //  $data['kelas'] = ''; 
        $this->load->view('pengajar/layout/wrapper', $data, FALSE);
    }

    public function filter_date()
    {
        $this->load->library('dompdf_gen');
     $idsantri = $this->input->post('kode_santri');
     // $bulan = $this->input->post('bulan');
       // $kelas= $this->input->post('kelas');
        
        $data = array(
            'isi'    => 'pengajar/laporan/lap_hafalan'
        );
   

        $data['detail'] = $this->lap_hafalan_model->getDetailHafalan($idsantri);
        $file = 'pengajar/laporan/cetak_hafalan';
        $this->load->view($file, $data);

        $paper_size ='A4';
        $orientation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size,$orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan_hafalan.pdf", array('Attachment' => 0));
        $this->load->view('pengajar/layout/wrapper', $data, FALSE);

    }

 public function cetak()
    {
        $this->load->library('dompdf_gen');


      $data['detail'] = $this->lap_hafalan_model->getCetak();
        $file = 'pengajar/laporan/cetak_hafalan';
        $this->load->view($file, $data);

        $paper_size ='A4';
        $orientation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size,$orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan_hafalan.pdf", array('Attachment' => 0));
        $this->load->view('pengajar/layout/wrapper', $data, FALSE);

    }

}
