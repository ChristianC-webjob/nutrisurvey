<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gestion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in()) { redirect('auth/login'); }
	}

	public function index()
	{
		$this->_gestion_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()), '1');
	}

	public function _gestion_output($output = null, $destino = null)
	{
		// Header
		$this->load->view('common/header', $output);
		// Container
		if ($destino == '1') {
			redirect('Inicio');
		}elseif ($destino == '2') {
			$this->load->view('common/crudcontainer', $output);
		}
		// Footer
		$this->load->view('common/footer', $output);

	}

	public function registro_respuestas()
	{
		try{
			$crud = new grocery_CRUD();
			$crud->unset_add()->unset_clone()->unset_delete()->unset_edit()->unset_read();
			$crud->set_table('vw_respuestas');
			$crud->set_primary_key('id_respuesta', 'vw_respuestas');
			$crud->set_subject('Respuestas', 'Resultados de Encuestas');
			$crud->display_as('id_respuesta','Id Respuesta');
			$crud->display_as('consumo_diario','Consumo Diario');
			$crud->display_as('tipo_respuesta','Tipo Respuesta');
			$crud->display_as('fecha_creacion','Fecha Respuesta');
			$crud->columns('folio', 'encuesta', 'pregunta', 'alimento', 'tipo_respuesta', 'respuesta', 'consumo_diario', 'medida');

			$output = $crud->render();
			$this->_gestion_output($output, '2');

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

}
