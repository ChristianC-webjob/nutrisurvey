<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    if (!$this->ion_auth->logged_in()) { redirect('auth/login'); }
  }

  public function index()
  {
    $this->load->view('imagenes/subir_imagen', array('error' => ' ' ));
  }

  public function do_upload()
  {
    $config['upload_path']          = './imagenes/alimentos/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 1000;
    $config['max_width']            = 1200;
    $config['max_height']           = 1200;

    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload('userfile')) {
      $error = array('error' => $this->upload->display_errors());
      $this->load->view('imagenes/subir_imagen', $error);
    } else {
      $data = array('upload_data' => $this->upload->data());
      $this->load->view('imagenes/carga_exitosa', $data);
    }
  }

}
