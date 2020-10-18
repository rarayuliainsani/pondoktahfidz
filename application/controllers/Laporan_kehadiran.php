<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_kehadiran extends CI_Controller {

  //   function __autoload($class) {
  //   DOMPDF_autoload($class);

  // }
    public function __construct()
    {
        parent::__construct();
      //require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';
        $this->load->model('lap_kehadiran_model');
        //$this->load->model('anggota_model');
    }
    public function index()
    {
         $data = array(
            'title' => 'Laporan Kehadiran',
            'isi'    => 'pengajar/laporan/lap_kehadiran'
        );
        $data['tahun'] = '';
        $data['bulan'] = '';
      //  $data['kelas'] = ''; 
        $this->load->view('pengajar/layout/wrapper', $data, FALSE);
    }

    public function filter_date()
    {
        $this->load->library('dompdf_gen');
     $tahun = $this->input->post('tahun');
      $bulan = $this->input->post('bulan');
       // $kelas= $this->input->post('kelas');
        
        $data = array(
            'isi'    => 'pengajar/laporan/lap_kehadiran'
        );
      $data['tahun'] = $tahun;
      $data['bulan'] = $bulan;
       // $data['kelas'] = $kelas;

        $data['detail'] = $this->lap_kehadiran_model->getDetailKehadiran($tahun,$bulan);
        

        $file = 'pengajar/laporan/cetak_kehadiran';
        $this->load->view($file, $data);

        $paper_size ='A4';
        $orientation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size,$orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan_kehadiran.pdf", array('Attachment' => 0));
        $this->load->view('pengajar/layout/wrapper', $data, FALSE);

    }


}
