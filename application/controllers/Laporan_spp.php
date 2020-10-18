<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_spp extends CI_Controller {

  //   function __autoload($class) {
  //   DOMPDF_autoload($class);

  // }
    public function __construct()
    {
        parent::__construct();
      //require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';
        $this->load->model('lap_spp_model');
        $model = $this->load->model('santri_model');
    }
    public function index()
    {
         $data = array(
            'title' => 'Laporan SPP',
            'isi'    => 'bendahara/laporan/lap_spp',
            'santri' => $this->santri_model->listing()
        );
         $data['idsantri'] ='' ;
  
        $this->load->view('bendahara/layout/wrapper', $data, FALSE);
    }

    public function filter_date()
    {
        $this->load->library('dompdf_gen');
        $idsantri = $this->input->post('kode_santri');    
        $data = array(
            'isi'    => 'bendahara/laporan/lap_spp'
        );
 
        $data['detail'] = $this->lap_spp_model->getDetailSpp($idsantri);
        $file = 'bendahara/laporan/cetak_spp';
        $this->load->view($file, $data);

        $paper_size ='A4';
        $orientation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size,$orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan_spp.pdf", array('Attachment' => 0));
        $this->load->view('bendahara/layout/wrapper', $data, FALSE);

    }


}
