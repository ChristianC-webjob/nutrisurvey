<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Encuestas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

	public function _encuestas_output($output = null, $destino = null)
	{
		if ($destino == '1') {
			$this->load->view('encuestas.php',(array)$output);
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
		$this->_encuestas_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()), '1');
	}

	public function definir_preguntas()
	{
		try{
			$crud = new grocery_CRUD();

			//$crud->set_theme('tablestrap');
			$crud->set_table('ns_preguntas');
			$crud->set_subject('Pregunta');
			$crud->required_fields('id_pregunta');
			$crud->columns('id_pregunta','id_modulo','codigo_pregunta','label_pregunta', 'tipo_respuesta','tipo_detalle_respuesta');

			$output = $crud->render();

			$this->_encuestas_output($output, '2');

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function definir_modulos()
	{
		try{
			$crud = new grocery_CRUD();

			//$crud->set_theme('tablestrap');
			$crud->set_table('ns_modulos');
			$crud->set_subject('Módulo');
			$crud->required_fields('id_modulo');
			$crud->columns('id_modulo','modulo','descripcion');

			$output = $crud->render();

			$this->_encuestas_output($output, '2');

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function definir_alimentos()
	{
		try{
			$crud = new grocery_CRUD();

			//$crud->set_theme('tablestrap');
			$crud->set_table('ns_alimentos');
			$crud->set_subject('Alimento');
			$crud->required_fields('id_alimento');
			$crud->columns('id_alimento','id_modulo','nombre','tipo_unidad');

			$output = $crud->render();

			$this->_encuestas_output($output, '2');

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function definir_unidades()
	{
		try{
			$crud = new grocery_CRUD();

			//$crud->set_theme('tablestrap');
			$crud->set_table('ns_unidades');
			$crud->set_subject('Unidad');
			$crud->required_fields('id_unidad');
			//$crud->columns('id_pregunta','id_modulo','codigo_pregunta','label_pregunta', 'tipo_respuesta','tipo_detalle_respuesta');

			$output = $crud->render();

			$this->_encuestas_output($output, '2');

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

}
