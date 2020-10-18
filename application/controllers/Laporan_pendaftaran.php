<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_pendaftaran extends CI_Controller {

  //   function __autoload($class) {
  //   DOMPDF_autoload($class);

  // }
    public function __construct()
    {
        parent::__construct();
      //require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';
        $this->load->model('lap_pendaftaran_model');
        //$this->load->model('anggota_model');
    }
    public function index()
    {
         $data = array(
            'title' => 'Laporan Pendafataran',
            'isi'    => 'admin/laporan/lap_pendaftaran'
        );
        $data['tahun'] = '';
        $data['bulan'] = '';
      //  $data['kelas'] = ''; 
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function filter_date()
    {
        $this->load->library('dompdf_gen');
     $tahun = $this->input->post('tahun');
      $bulan = $this->input->post('bulan');
       // $kelas= $this->input->post('kelas');
        
        $data = array(
            'isi'    => 'admin/laporan/lap_pendaftaran'
        );
      $data['tahun'] = $tahun;
      $data['bulan'] = $bulan;
       // $data['kelas'] = $kelas;

        $data['detail'] = $this->lap_pendaftaran_model->getDetailPendaftaran($tahun,$bulan);
        $file = 'admin/laporan/cetak_pendaftaran';
        $this->load->view($file, $data);

        $paper_size ='A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size,$orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan_pendaftaran.pdf", array('Attachment' => 0));
        $this->load->view('admin/layout/wrapper', $data, FALSE);

    }


}
