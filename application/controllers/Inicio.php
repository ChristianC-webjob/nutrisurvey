<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	 public function __construct()
 	{
 		parent::__construct();
		if (!$this->ion_auth->logged_in()) { redirect('auth/login'); }
 	}

	public function index()
	{
		$encuestas_lib = new encuestas();
		$data['indicaciones1'] = $encuestas_lib->indicaciones1();
		$data['indicaciones2'] = $encuestas_lib->indicaciones2();

		$this->_inicio_output((object)array('output' => '' , 'data' => $data , 'js_files' => array() , 'css_files' => array()));
	}

	public function _inicio_output($output = null)
	{
		// Header
		$this->load->view('common/header', $output);
		// Container
		$this->load->view('inicio');
		// Footer
		$this->load->view('common/footer');
	}

}
