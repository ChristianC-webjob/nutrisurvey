<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuracion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in()) { redirect('auth/login'); }
	}

	public function index()
	{
		$this->_configuracion_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()), '1');
	}

	public function _configuracion_output($output = null, $destino = null)
	{
		// Header
		$this->load->view('common/header', $output);
		// Container
		if ($destino == '1') {
			redirect('Inicio');
		}elseif ($destino == '2') {
			$this->load->view('common/crudcontainer', $output);
		}elseif ($destino == '3') {
			$this->load->view('imagenes/img_alimentos', $output);
		}
		// Footer
		$this->load->view('common/footer', $output);
	}

	public function definir_modulos()
	{
		try{
			$crud = new grocery_CRUD();
			// $crud->unset_clone();
			$crud->set_table('ns_modulos');
			$crud->set_subject('Módulo', 'Definir Módulos');
			$crud->required_fields('nombre');
			$crud->columns(['nombre','descripcion']);
			$crud->order_by('id_modulo');

			$crud->add_fields('nombre','descripcion','usuario_creacion','fecha_creacion');
			$crud->edit_fields('nombre','descripcion','usuario_modificacion','fecha_modificacion');
			$crud->set_relation('usuario_creacion','ns_users','{first_name} {last_name}');
			$crud->set_relation('usuario_modificacion','ns_users','{first_name} {last_name}');

			$state = $crud->getState();
	    // $state_info = $crud->getStateInfo();
	    if($state == 'edit') {
				$crud->callback_edit_field('usuario_modificacion',array($this,'set_usuario_modificacion'));
				$crud->callback_edit_field('fecha_modificacion',array($this,'set_fecha_modificacion'));
			}elseif ($state == 'add') {
				// Valores iniciales
				$crud->callback_add_field('usuario_creacion',array($this,'set_usuario_creacion'));
				$crud->callback_add_field('fecha_creacion',array($this,'set_fecha_creacion'));
				// $model = $crud->getModel();
				// $model->set_add_value('usuario_creacion', '1'); /* $this->session->userdata('user_id') */
				// $model->set_add_value('fecha_creacion', mdate(MYSQL_DATE_FORMAT, now()));
			}

			$output = $crud->render();
			$this->_configuracion_output($output, '2');
			// $this->_configuracion_output((object)array('output' => $output, 'state_info' => $state_info, 'css_files' => $output->css_files, 'js_files' => $output->js_files), '2');
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function definir_alimentos()
	{
		try{
			$crud = new grocery_CRUD();
			//$crud->set_theme('bootstrap');
			// $crud->unset_clone();
			$crud->set_table('ns_alimentos');
			$crud->set_subject('Alimento','Definir Alimentos');
			$crud->required_fields('id_alimento');
			$crud->columns('id_modulo','nombre','tipo_medida','grupo_exclusion');
			$crud->display_as('id_modulo','Módulo');
			$crud->display_as('grupo_exclusion','Grupo Exclusión');
			$crud->set_relation('id_modulo','ns_modulos','nombre');
			$crud->set_primary_key('valor','vw_tipo_medida');
			$crud->set_relation('tipo_medida','vw_tipo_medida','label');
			$crud->set_relation('grupo_exclusion','ns_exclusiones','descripcion');
			$crud->set_relation('usuario_creacion','ns_users','{first_name} {last_name}');
			$crud->set_relation('usuario_modificacion','ns_users','{first_name} {last_name}');
			$crud->add_action('Imágenes', '', 'configuracion/img_alimentos','fa-picture-o');  /*tablestrap & bootstrap*/
			$crud->add_fields('id_modulo','nombre','tipo_medida','grupo_exclusion','usuario_creacion','fecha_creacion');
			$crud->edit_fields('id_modulo','nombre','tipo_medida','grupo_exclusion','usuario_modificacion','fecha_modificacion');

			$crud->order_by('ns_alimentos.id_modulo, ns_alimentos.id_alimento');

			$state = $crud->getState();
	    if($state == 'edit') {
				$crud->callback_edit_field('usuario_modificacion',array($this,'set_usuario_modificacion'));
				$crud->callback_edit_field('fecha_modificacion',array($this,'set_fecha_modificacion'));
			}elseif ($state == 'add') {
				$crud->callback_add_field('usuario_creacion',array($this,'set_usuario_creacion'));
				$crud->callback_add_field('fecha_creacion',array($this,'set_fecha_creacion'));
			}

			$output = $crud->render();
			$this->_configuracion_output($output, '2');

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	function img_alimentos($id_alimento)
	{
		if (is_null($id_alimento)) {return cancel;}

		$encuestas = new encuestas();
		$query = $encuestas->img_alimentos($id_alimento);
		$filas = $query->num_rows();
		if ($filas > 0) {
			$header['alimento'] = $query->row(0)->alimento;
			$header['modulo'] = $query->row(0)->modulo;
			$header['set_atts'] = array(
							'width'       => 800,
							'height'      => 520,
							'status'      => 'no',
							'menubar'   	=> 'no',
							'toolbar'   	=> 'no',
							'resizable'		=> 'no',
							'scrollbars'  => 'no',
							'window_name' => 'imagencompleta',
							'title'       => 'Click para agrandar imagen...',
							'alt' 			  => 'Click para agrandar imagen...',
							'screeny'     => 100,
							'screenx'     => 20
			);

			$crud = new grocery_CRUD();
			$crud->set_table('ns_relacion_alimento_foto');
			$output = $crud->render();
			$this->_configuracion_output((object)array('resultado' => $query , 'header' => $header , 'id_alimento' => $id_alimento , 'css_files' => $output->css_files, 'js_files' => $output->js_files), '3');
		}else{
			$header['alimento'] = 'No existen imágenes para este alimento.';
			$header['modulo'] = '';
			$crud = new grocery_CRUD();
			$crud->set_table('ns_relacion_alimento_foto');
			$output = $crud->render();
			$this->_configuracion_output((object)array('resultado' => '' , 'header' => $header , 'id_alimento' => $id_alimento , 'css_files' => $output->css_files, 'js_files' => $output->js_files), '3');

		}
	}

	public function rel_alimento_fotos()
	{
		try{
			$crud = new grocery_CRUD();
			$crud->set_table('ns_relacion_alimento_foto');
			$crud->set_subject('Relación Alimento Fotos', 'Definir Relación Alimento > Fotos del Catálogo');
			$crud->display_as('id_alimento', 'Alimento');
			$crud->display_as('pos_catalogo','Código Catálogo');
			$crud->display_as('descripcion_catalogo','Descripción');
			$crud->display_as('url_foto1','Foto 1');
			$crud->display_as('url_foto2','Foto 2');
			$crud->display_as('url_foto3','Foto 3');
			$crud->display_as('valor_foto1','Valor 1');
			$crud->display_as('valor_foto2','Valor 2');
			$crud->display_as('valor_foto3','Valor 3');
			$crud->columns('id_alimento','pos_catalogo','descripcion_catalogo','url_foto1','valor_foto1','url_foto2','valor_foto2','url_foto3','valor_foto3');
			$crud->order_by('id_alimento');

			$crud->set_primary_key('id_alimento', 'vw_modulo_alimento');
			$crud->set_relation('id_alimento', 'vw_modulo_alimento', '{alimento} - {modulo}');

			$crud->add_fields('id_alimento','pos_catalogo','descripcion_catalogo','url_foto1','valor_foto1','url_foto2','valor_foto2','url_foto3','valor_foto3','usuario_creacion','fecha_creacion');
			$crud->edit_fields('id_alimento','pos_catalogo','descripcion_catalogo','url_foto1','valor_foto1','url_foto2','valor_foto2','url_foto3','valor_foto3','usuario_modificacion','fecha_modificacion');
			$crud->set_relation('usuario_creacion','ns_users','{first_name} {last_name}');
			$crud->set_relation('usuario_modificacion','ns_users','{first_name} {last_name}');

			$state = $crud->getState();
	    if($state == 'edit') {
				$crud->callback_edit_field('usuario_modificacion',array($this,'set_usuario_modificacion'));
				$crud->callback_edit_field('fecha_modificacion',array($this,'set_fecha_modificacion'));
			}elseif ($state == 'add') {
				$crud->callback_add_field('usuario_creacion',array($this,'set_usuario_creacion'));
				$crud->callback_add_field('fecha_creacion',array($this,'set_fecha_creacion'));
			}

			$output = $crud->render();
			$this->_configuracion_output($output, '2');

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function definir_parametros()
	{
		try{
			$crud = new grocery_CRUD();
			$crud->unset_clone();
			$crud->set_table('ns_parametros');
			$crud->set_subject('Parámetro', 'Definir Parámetros');
			$crud->columns('tipo', 'agrupar', 'nombre', 'label', 'tipo_dato', 'valor');
			$crud->add_fields('tipo', 'agrupar', 'nombre', 'label', 'tipo_dato', 'valor','usuario_creacion','fecha_creacion');
			$crud->edit_fields('tipo', 'agrupar', 'nombre', 'label', 'tipo_dato', 'valor','usuario_modificacion','fecha_modificacion');
			$crud->set_relation('usuario_creacion','ns_users','{first_name} {last_name}');
			$crud->set_relation('usuario_modificacion','ns_users','{first_name} {last_name}');
			$crud->order_by('id_param');

			$state = $crud->getState();
	    if($state == 'edit') {
				$crud->callback_edit_field('usuario_modificacion',array($this,'set_usuario_modificacion'));
				$crud->callback_edit_field('fecha_modificacion',array($this,'set_fecha_modificacion'));
			}elseif ($state == 'add') {
				$crud->callback_add_field('usuario_creacion',array($this,'set_usuario_creacion'));
				$crud->callback_add_field('fecha_creacion',array($this,'set_fecha_creacion'));
			}

			$output = $crud->render();
			$this->_configuracion_output($output, '2');

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function definir_preguntas()
	{
		try{
			$crud = new grocery_CRUD();
			$crud->unset_clone();
			$crud->set_table('ns_preguntas');
			$crud->set_subject('Pregunta', 'Definir Preguntas');
			$crud->display_as('id_modulo','Módulo');
			$crud->display_as('id_pregunta','ID');
			$crud->display_as('codigo_pregunta','Código');
			$crud->display_as('label_pregunta','Pregunta');
			$crud->required_fields('id_modulo','id_pregunta','codigo_pregunta','label_pregunta','tipo');
			$crud->columns('id_modulo','codigo_pregunta','label_pregunta', 'tipo');
			$crud->set_relation('id_modulo','ns_modulos','nombre');
			$crud->set_primary_key('valor','vw_tipo_respuesta');
			$crud->set_relation('tipo','vw_tipo_respuesta','label',null,'valor ASC');
			$crud->order_by('id_pregunta');

			$crud->add_fields('id_modulo','codigo_pregunta','label_pregunta', 'tipo', 'usuario_creacion','fecha_creacion');
			$crud->edit_fields('id_modulo','codigo_pregunta','label_pregunta', 'tipo', 'usuario_modificacion','fecha_modificacion');
			$crud->set_relation('usuario_creacion','ns_users','{first_name} {last_name}');
			$crud->set_relation('usuario_modificacion','ns_users','{first_name} {last_name}');

			$state = $crud->getState();
	    if($state == 'edit') {
				$crud->callback_edit_field('usuario_modificacion',array($this,'set_usuario_modificacion'));
				$crud->callback_edit_field('fecha_modificacion',array($this,'set_fecha_modificacion'));
			}elseif ($state == 'add') {
				$crud->callback_add_field('usuario_creacion',array($this,'set_usuario_creacion'));
				$crud->callback_add_field('fecha_creacion',array($this,'set_fecha_creacion'));
			}

			$output = $crud->render();
			$this->_configuracion_output($output, '2');

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function definir_encuestas()
	{
		try{
			$crud = new grocery_CRUD();
			$crud->unset_clone();
			$crud->set_table('ns_encuestas');
			$crud->set_subject('Encuesta', 'Definir Encuestas');
			$crud->display_as('folio','Registro Encuesta');
			$crud->display_as('descripcion','Descripción');
			$crud->columns('nombre', 'descripcion');

			$crud->display_as('usuario_creacion','Usuario Creación');
			$crud->display_as('fecha_creacion','Fecha Creación');
			$crud->display_as('usuario_modificacion','Usuario Modificación');
			$crud->display_as('fecha_modificacion','Fecha Modificación');
			$crud->add_fields('nombre', 'descripcion', 'usuario_creacion','fecha_creacion');
			$crud->edit_fields('nombre', 'descripcion', 'usuario_modificacion','fecha_modificacion');
			$crud->set_relation('usuario_creacion','ns_users','{first_name} {last_name}');
			$crud->set_relation('usuario_modificacion','ns_users','{first_name} {last_name}');

			$state = $crud->getState();
	    if($state == 'edit') {
				$crud->callback_edit_field('usuario_modificacion',array($this,'set_usuario_modificacion'));
				$crud->callback_edit_field('fecha_modificacion',array($this,'set_fecha_modificacion'));
			}elseif ($state == 'add') {
				$crud->callback_add_field('usuario_creacion',array($this,'set_usuario_creacion'));
				$crud->callback_add_field('fecha_creacion',array($this,'set_fecha_creacion'));
			}

			$output = $crud->render();
			$this->_configuracion_output($output, '2');

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function definir_encuestas_preguntas_alimentos()
	{
		try{
			$crud = new grocery_CRUD();
			$crud->unset_clone();
			$crud->set_table('ns_encuestas_preguntas_alimentos');
			$crud->set_subject('Relación Encuesta > Pregunta > Alimento', 'Definir Relación Encuesta > Pregunta > Alimento');
			$crud->display_as('id_encuesta','Encuesta');
			$crud->display_as('id_pregunta','Pregunta');
			$crud->display_as('id_alimento','Alimento');
			$crud->display_as('pagina','Página');
			$crud->columns('id_encuesta', 'id_pregunta', 'id_alimento', 'pagina', 'orden');
			// $crud->fields('id_encuesta_pregunta_alimento', 'id_encuesta', 'id_pregunta', 'id_alimento', 'pagina', 'orden');
			$crud->set_relation('id_encuesta','ns_encuestas','nombre');
			$crud->set_relation('id_pregunta','ns_preguntas','codigo_pregunta');
			$crud->set_relation('id_alimento','ns_alimentos','nombre');

			$crud->display_as('usuario_creacion','Usuario Creación');
			$crud->display_as('fecha_creacion','Fecha Creación');
			$crud->display_as('usuario_modificacion','Usuario Modificación');
			$crud->display_as('fecha_modificacion','Fecha Modificación');
			$crud->add_fields('id_encuesta', 'id_pregunta', 'id_alimento', 'pagina', 'usuario_creacion', 'fecha_creacion');
			$crud->edit_fields('id_encuesta', 'id_pregunta', 'id_alimento', 'pagina', 'orden', 'usuario_modificacion', 'fecha_modificacion');
			$crud->set_relation('usuario_creacion','ns_users','{first_name} {last_name}');
			$crud->set_relation('usuario_modificacion','ns_users','{first_name} {last_name}');

			$crud->order_by('ns_encuestas_preguntas_alimentos.pagina, ns_encuestas_preguntas_alimentos.orden');

			$state = $crud->getState();
	    if(($state == 'edit')||($state == 'update')) {
				$crud->callback_edit_field('usuario_modificacion',array($this,'set_usuario_modificacion'));
				$crud->callback_edit_field('fecha_modificacion',array($this,'set_fecha_modificacion'));
			}elseif (($state == 'add')||($state == 'insert')) {
				$crud->callback_add_field('usuario_creacion',array($this,'set_usuario_creacion'));
				$crud->callback_add_field('fecha_creacion',array($this,'set_fecha_creacion'));
			}

			$crud->callback_insert(array($this,'get_orden_and_insert_callback'));

			$output = $crud->render();
			$this->_configuracion_output($output, '2');

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	function set_usuario_modificacion() {
		// echo "<script>alert('callback_edit_field 1')</script>";
		return "<input type='text' class='form-control' readonly name='usuario_modificacion' name='field-usuario_modificacion' value='".$this->ion_auth->get_user_id()."' />";
	}

	function set_fecha_modificacion() {
		$fecha = mdate(MYSQL_DATE_FORMAT, now());
		return "<input type='text' class='form-control' readonly name='fecha_modificacion' name='field-fecha_modificacion' value='$fecha' />";
	}

	function set_usuario_creacion() {
		return "<input type='text' class='form-control' readonly name='usuario_creacion' name='field-usuario_creacion' value='".$this->ion_auth->get_user_id()."' />";
	}

	function set_fecha_creacion() {
		$fecha = mdate(MYSQL_DATE_FORMAT, now());
		return "<input type='text' class='form-control' readonly name='fecha_creacion' name='field-fecha_creacion' value='$fecha' />";
	}

	function get_orden_and_insert_callback($post_array) {
		$encuestas_lib = new encuestas();
	  $post_array['orden'] = $encuestas_lib->orden($post_array['pagina']);

	  return $this->db->insert('ns_encuestas_preguntas_alimentos',$post_array);
	}

	public function definir_exclusiones()
	{
		try{
			$crud = new grocery_CRUD();
			$crud->unset_clone();
			$crud->set_table('ns_exclusiones');
			$crud->set_subject('Grupo de exclusión', 'Definir grupos de exclusión');
			$crud->columns('descripcion');
			$crud->display_as('descripcion','Descripción');
			$crud->display_as('usuario_creacion','Usuario Creación');
			$crud->display_as('fecha_creacion','Fecha Creación');
			$crud->display_as('usuario_modificacion','Usuario Modificación');
			$crud->display_as('fecha_modificacion','Fecha Modificación');
			$crud->add_fields('descripcion', 'usuario_creacion', 'fecha_creacion');
			$crud->edit_fields('descripcion', 'usuario_modificacion', 'fecha_modificacion');
			$crud->set_relation('usuario_creacion','ns_users','{first_name} {last_name}');
			$crud->set_relation('usuario_modificacion','ns_users','{first_name} {last_name}');
			$crud->order_by('ns_exclusiones.id_exclusion');

			$state = $crud->getState();
	    if($state == 'edit') {
				$crud->callback_edit_field('usuario_modificacion',array($this,'set_usuario_modificacion'));
				$crud->callback_edit_field('fecha_modificacion',array($this,'set_fecha_modificacion'));
			}elseif ($state == 'add') {
				$crud->callback_add_field('usuario_creacion',array($this,'set_usuario_creacion'));
				$crud->callback_add_field('fecha_creacion',array($this,'set_fecha_creacion'));
			}

			$output = $crud->render();
			$this->_configuracion_output($output, '2');

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

}
