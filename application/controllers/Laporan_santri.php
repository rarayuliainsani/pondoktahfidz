<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_santri extends CI_Controller {

  //   function __autoload($class) {
  //   DOMPDF_autoload($class);

  // }
    public function __construct()
    {
        parent::__construct();
      //require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';
        $this->load->model('lap_santri_model');
        //$this->load->model('anggota_model');
    }
    public function index()
    {
         $data = array(
            'title' => 'Laporan Santri',
            'isi'    => 'admin/laporan/lap_santri'
        );
        $data['kategori_kelompok'] = '';
   
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function filter_date()
    {
        $this->load->library('dompdf_gen');
        
      $kategori_kelompok = $this->input->post('kategori_kelompok');
      $data = array(
            'isi'    => 'admin/laporan/lap_santri'
        );
      $data['kategori_kelompok'] = $kategori_kelompok;
        $data['detail'] = $this->lap_santri_model->getDetailSantri($kategori_kelompok);
        $file = 'admin/laporan/cetak_santri';
        $this->load->view($file, $data);

        $paper_size ='A4';


        $orientation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size,$orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan_santri.pdf", array('Attachment' => 0));
        $this->load->view('admin/layout/wrapper', $data, FALSE);

    }


}
