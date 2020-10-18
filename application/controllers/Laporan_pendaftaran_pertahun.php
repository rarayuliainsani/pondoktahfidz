<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_pendaftaran_pertahun extends CI_Controller {

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
            'title' => 'Laporan Pendaftaran Pertahun',
            'isi'    => 'admin/laporan/lap_pendaftaran_pertahun'
        );
        $data['tahun'] = '';
      //  $data['kelas'] = ''; 
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function filter_date()
    {
        $this->load->library('dompdf_gen');
     $tahun = $this->input->post('tahun');
       // $kelas= $this->input->post('kelas');
        
        $data = array(
            'isi'    => 'admin/laporan/lap_pendaftaran_pertahun'
        );
      $data['tahun'] = $tahun;
       // $data['kelas'] = $kelas;

        $data['detail'] = $this->lap_pendaftaran_model->getDetailPendaftaranTahun($tahun);
        $file = 'admin/laporan/cetak_pendaftaran_pertahun';
        $this->load->view($file, $data);

        $paper_size ='A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size,$orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan_pendaftaran_pertahun.pdf", array('Attachment' => 0));
        $this->load->view('admin/layout/wrapper', $data, FALSE);

    }


}
