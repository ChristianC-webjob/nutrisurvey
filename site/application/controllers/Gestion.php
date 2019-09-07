<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gestion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

	public function _gestion_output($output = null, $destino = null)
	{
		if ($destino == '1') {
			$this->load->view('gestion.php',(array)$output);
		}elseif ($destino == '2') {
			$this->load->view('common/crudcontainer.php',(array)$output);
		}

	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->_gestion_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()), '1');
	}

	public function entrevistado_lst()
	{
		try{
			$crud = new grocery_CRUD();

			//$crud->set_theme('tablestrap');
			$crud->set_table('ns_entrevistados');
			$crud->set_subject('Entrevistado');
			$crud->required_fields('rut');
			$crud->columns('rut','nombre','paterno','materno','fecha_nacimiento','codigo_encuestado');

			$output = $crud->render();

			$this->_gestion_output($output, '2');

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function registro_encuestas()
	{
		try{
			$crud = new grocery_CRUD();

			//$crud->set_theme('tablestrap');
			$crud->set_table('ns_registro_encuestas');
			$crud->set_subject('Encuesta');
			$crud->required_fields('folio');
			$crud->columns('folio','codigo_zona','codigo_supervisor','codigo_encuestador','codigo_encuestado');

			$output = $crud->render();

			$this->_gestion_output($output, '2');

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}


}
