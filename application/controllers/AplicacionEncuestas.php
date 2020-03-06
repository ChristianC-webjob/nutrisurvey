<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AplicacionEncuestas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in()) { redirect('auth/login'); }
	}

	public function index()
	{
		$this->_aplicacion_encuestas_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()), '0');
	}

	public function _aplicacion_encuestas_output($output = null, $destino = null)
	{
		// Header
		$this->load->view('common/header', $output);
		// Container
		if ($destino == '0') {
			redirect('Inicio');
		}elseif ($destino == '1') {
			$this->load->view('encuestas/aplica_encuesta');
		}elseif ($destino == '2') {
			$this->load->view('common/crudcontainer');
		}
		// Footer
		$this->load->view('common/footer');
	}

	public function registro_encuestados()
	{
		try{
			$crud = new grocery_CRUD();
			$crud->unset_clone();
			$crud->set_table('ns_encuestados');
			$crud->set_subject('Encuestado', 'Gestión | Registro de Encuestados');
			$crud->columns('codigo_ns','nombre','paterno','materno','fecha_nacimiento','mail');
			$crud->display_as('codigo_ns','ID');
			$crud->display_as('paterno','Apellido paterno');
			$crud->display_as('materno','Apellido materno');
			$crud->display_as('region','Región');
			$crud->display_as('direccion','Dirección');
			$crud->display_as('fecha_nacimiento','Fecha de nacimiento');
			$crud->display_as('tipo_area','Tipo de área');
			$crud->display_as('telefono','Teléfono');
			$crud->display_as('referencia1_nombre','Referencia');
			$crud->display_as('referencia1_numero','Número');
			$crud->display_as('referencia2_nombre','Referencia');
			$crud->display_as('referencia2_numero','Número');
			$crud->display_as('usuario_creacion','Usuario creación');
			$crud->display_as('fecha_creacion','Fecha creación');
			$crud->display_as('usuario_modificacion','Usuario modificación');
			$crud->display_as('fecha_modificacion','Fecha modificación');
			$crud->add_fields('codigo_ns','nombre', 'paterno', 'materno', 'fecha_nacimiento', 'direccion', 'region', 'comuna', 'tipo_area', 'mail', 'celular', 'telefono', 'referencia1_nombre', 'referencia1_numero', 'referencia2_nombre', 'referencia2_numero', 'usuario_creacion', 'fecha_creacion');
		  $crud->edit_fields('codigo_ns','nombre', 'paterno', 'materno', 'fecha_nacimiento', 'direccion', 'region', 'comuna', 'tipo_area', 'mail', 'celular', 'telefono', 'referencia1_nombre', 'referencia1_numero', 'referencia2_nombre', 'referencia2_numero', 'usuario_modificacion', 'fecha_modificacion');
			$crud->set_relation('usuario_creacion','ns_users','{first_name} {last_name}');
			$crud->set_relation('usuario_modificacion','ns_users','{first_name} {last_name}');
			$crud->set_relation('region','ns_regiones','nombre',null,'orden ASC');
			$crud->set_relation('comuna','ns_comunas','nombre');
			$crud->set_relation('tipo_area','ns_parametros','label',array('tipo' => 22));
			$crud->order_by('ns_encuestados.codigo_ns');
			$crud->required_fields('codigo_ns');
			$crud->unique_fields('codigo_ns');

			$state = $crud->getState();
	    if($state == 'edit') {
				$crud->callback_edit_field('usuario_modificacion',array($this,'set_usuario_modificacion'));
				$crud->callback_edit_field('fecha_modificacion',array($this,'set_fecha_modificacion'));
				$crud->field_type('codigo_ns', 'readonly');
			}elseif ($state == 'add') {
				$crud->callback_add_field('usuario_creacion',array($this,'set_usuario_creacion'));
				$crud->callback_add_field('fecha_creacion',array($this,'set_fecha_creacion'));
			}

			$output = $crud->render();
			$this->_aplicacion_encuestas_output($output, '2');

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function registro_encuestas()
	{
		try{
			$crud = new grocery_CRUD();
			$crud->unset_add()->unset_clone()->unset_delete()->unset_edit()->unset_read();
			$crud->set_table('ns_registro_encuestas');
			$crud->set_subject('Encuesta', 'Registro de Encuestas');
			$crud->required_fields('folio');
			$crud->display_as('id_encuesta','Encuesta');
			// $crud->display_as('codigo_supervisor','Supervisor');
			$crud->display_as('codigo_encuestador','Encuestador');
			$crud->display_as('codigo_encuestado','ID Encuestado');
			$crud->display_as('fecha_aplicacion','Fecha Aplicación');
			$crud->display_as('fecha_termino','Fecha Término');
			$crud->display_as('usuario_termino','Enc. Término');
			$crud->set_relation('id_encuesta','ns_encuestas','nombre');
			// $crud->set_relation('codigo_supervisor','ns_users','{first_name} {last_name} ({username})');
			$crud->set_relation('codigo_encuestador','ns_users','{first_name} {last_name} ({username})');
			$crud->set_relation('usuario_termino','ns_users','username');
			$crud->columns('folio','id_encuesta','codigo_encuestador','codigo_encuestado','fecha_aplicacion','fecha_termino','usuario_termino');

			$group = array('Administrador', 'Supervisor');
			if (!$this->ion_auth->in_group($group)) {
				$crud->columns('folio','id_encuesta','codigo_encuestador','codigo_encuestado','fecha_aplicacion','fecha_termino');
				$crud->where('usuario_aplicacion',$this->ion_auth->get_user_id());
			}

			$crud->order_by('ns_registro_encuestas.folio','DESC');

			$output = $crud->render();
			$this->_aplicacion_encuestas_output($output, '2');

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function aplicar_encuesta($nav = null, $pagina = null)
	{
		try{
			$encuestas_lib = new encuestas();

			if ($nav == '') {
				redirect('Inicio');
			}elseif ($nav == 'indicaciones') {
				$indicaciones = $encuestas_lib->indicaciones();
				$data['titulo'] = 'Información e Indicaciones';
				$data['subtitulo'] = 'Encuesta Digital de Cuantificación de Consumo Alimentario (EDTCC)';
				$data['nav'] = $nav;
				$data['indicaciones'] = $indicaciones;

				$crud = new grocery_CRUD();
				$crud->set_table('ns_groups');
				$output = $crud->render();
				$this->_aplicacion_encuestas_output((object)array('data' => $data , 'css_files' => $output->css_files, 'js_files' => $output->js_files), '1');
			}elseif ($nav == 'registro') {
				$this->limpiar_variables();
				$encuestas = $encuestas_lib->encuestas_list();

				$data['titulo'] = 'Registro de la encuesta';
				$data['subtitulo'] = 'Ingreso de datos';
				$data['nav'] = $nav;
				$data['folio'] = $encuestas_lib->folio();

				$crud = new grocery_CRUD();
				$crud->set_table('ns_groups');
				$output = $crud->render();
				$this->_aplicacion_encuestas_output((object)array('data' => $data , 'encuestas' => $encuestas , 'css_files' => $output->css_files, 'js_files' => $output->js_files), '1');
			}elseif ($nav == 'exclusion') {
				/* inserta registro inicial de la encuesta */
				$insertdata['id_encuesta'] = $this->input->post('encuesta');
				$insertdata['folio'] = $this->input->post('folio');
				$insertdata['codigo_encuestador'] = $this->ion_auth->get_user_id();
				$insertdata['codigo_encuestado'] = $this->input->post('encuestados');
				$insertdata['usuario_aplicacion'] = $this->ion_auth->get_user_id();
				$insertdata['fecha_aplicacion'] = mdate(MYSQL_DATE_FORMAT, now());

				$inserto = $encuestas_lib->registro_encuesta($insertdata);
				// if ($this->ion_auth->is_admin()) {echo $inserto;}

					/* cargo lista de grupos de exclusión */
				$data['titulo'] = 'Exclusión de alimentos';
				$data['subtitulo'] = 'Selección de grupos de alimentos a excluir de la encuesta';
				$data['nav'] = $nav;
				$data['exclusiones'] = $encuestas_lib->exclusiones_list();;

				$crud = new grocery_CRUD();
				$crud->set_table('ns_groups');
				$output = $crud->render();
				$this->_aplicacion_encuestas_output((object)array('data' => $data , 'css_files' => $output->css_files, 'js_files' => $output->js_files), '1');
			}elseif (($nav == 'preguntas') or ($nav == 'termino')) {
				if ($pagina == 1) {
					/* recupera listasdo de preguntas post exclusión y configura variables de inicio de encuesta */
					$exclusion[] = 55;
					if (!empty($this->input->post('exclusion'))) {
						foreach ($this->input->post('exclusion') as $topkey => $input) {
							if(intval($this->input->post('exclusion['.$topkey.']'))>0) {
								$exclusion[] = intval($this->input->post('exclusion['.$topkey.']'));
							}
						}
					}
					// if ($this->ion_auth->is_admin()) {echo var_dump($exclusion);}
					$this->session->paginas_list = $encuestas_lib->paginas_list($exclusion);
					$this->session->total_paginas = count($this->session->paginas_list);
					$this->session->indice_pagina = 0;

					$inserto=TRUE;
				}elseif ((($nav == 'preguntas') and ($pagina > 1)) or ($nav == 'termino')) {	/* inserta respuestas de la encuesta */
					$continuar = RESPUESTA_SI;
					if (null!==$this->input->post('respuesta')) {
						foreach ($this->input->post('respuesta') as $topkey => $input) {
							if (($continuar)!=RESPUESTA_NO){
								$insertdata['id_encuesta_pregunta_alimento'] = intval($this->input->post('respuesta['.$topkey.'][ID]'));
								$insertdata['tipo'] = intval($this->input->post('respuesta['.$topkey.'][TIPO]'));
								if ($this->input->post('respuesta['.$topkey.'][TIPO]')==TIPO_RESPUESTA_SIONO){
									$continuar = $this->input->post('respuesta['.$topkey.'][SIONO]');
									$insertdata['respuesta'] = intval($continuar);
								}elseif ($this->input->post('respuesta['.$topkey.'][TIPO]')==TIPO_RESPUESTA_CONSUMO){
									$dias_al_mes = intval($this->input->post('respuesta['.$topkey.'][CONSUMO]')?:0);
									$insertdata['respuesta'] = $this->input->post('respuesta['.$topkey.'][CONSUMO]')?:0;
								}elseif ($this->input->post('respuesta['.$topkey.'][TIPO]')==TIPO_RESPUESTA_IMAGEN){
									$porcion = (floatval($this->input->post('respuesta['.$topkey.'][UNIDAD]'))?:0) * (floatval($this->input->post('respuesta['.$topkey.'][IMAGEN]'))?:0);
									$insertdata['respuesta'] = ($this->input->post('respuesta['.$topkey.'][UNIDAD]')?:0).' porciones de '.($this->input->post('respuesta['.$topkey.'][IMAGEN]')?:0);
									$insertdata['consumo_diario'] = floatval(($dias_al_mes * $porcion) / 30);
									// echo('dias al mes: '.$dias_al_mes.br(1).'porcion: '.$porcion.br(1).'consumo diario: '.floatval(($dias_al_mes * $porcion) / 30));
								}elseif ($this->input->post('respuesta['.$topkey.'][TIPO]')==TIPO_RESPUESTA_CUCHARADA){
									$porcion = (floatval($this->input->post('respuesta['.$topkey.'][UNIDAD]'))?:0) * (floatval($this->input->post('respuesta['.$topkey.'][CUCHARA]'))?:0);
									$insertdata['respuesta'] = ($this->input->post('respuesta['.$topkey.'][UNIDAD]')?:0).' porciones de '.($this->input->post('respuesta['.$topkey.'][CUCHARA]')?:0);
									$insertdata['consumo_diario'] = floatval(($dias_al_mes * $porcion) / 30);
									// echo('dias al mes: '.$dias_al_mes.br(1).'porcion: '.$porcion.br(1).'consumo diario: '.floatval(($dias_al_mes * $porcion) / 30));
								}elseif ($this->input->post('respuesta['.$topkey.'][TIPO]')==TIPO_RESPUESTA_CUCHARON){
									$porcion = (floatval($this->input->post('respuesta['.$topkey.'][UNIDAD]'))?:0) * (floatval($this->input->post('respuesta['.$topkey.'][CUCHARON]'))?:0);
									$insertdata['respuesta'] = ($this->input->post('respuesta['.$topkey.'][UNIDAD]')?:0).' porciones de '.($this->input->post('respuesta['.$topkey.'][CUCHARON]')?:0);
									$insertdata['consumo_diario'] = floatval(($dias_al_mes * $porcion) / 30);
									// echo('dias al mes: '.$dias_al_mes.br(1).'porcion: '.$porcion.br(1).'consumo diario: '.floatval(($dias_al_mes * $porcion) / 30));
								}elseif ($this->input->post('respuesta['.$topkey.'][TIPO]')==TIPO_RESPUESTA_DOSIFICADOR){
									$porcion = (floatval($this->input->post('respuesta['.$topkey.'][UNIDAD]'))?:0) * (floatval($this->input->post('respuesta['.$topkey.'][DOSIFICADOR]'))?:0);
									$insertdata['respuesta'] = ($this->input->post('respuesta['.$topkey.'][UNIDAD]')?:0).' porciones de '.($this->input->post('respuesta['.$topkey.'][DOSIFICADOR]')?:0);
									$insertdata['consumo_diario'] = floatval(($dias_al_mes * $porcion) / 30);
									// echo('dias al mes: '.$dias_al_mes.br(1).'porcion: '.$porcion.br(1).'consumo diario: '.floatval(($dias_al_mes * $porcion) / 30));
								}elseif ($this->input->post('respuesta['.$topkey.'][TIPO]')==TIPO_RESPUESTA_TAZA){
									$porcion = (floatval($this->input->post('respuesta['.$topkey.'][UNIDAD]'))?:0) * (floatval($this->input->post('respuesta['.$topkey.'][TAZA]'))?:0);
									$insertdata['respuesta'] = ($this->input->post('respuesta['.$topkey.'][UNIDAD]')?:0).' porciones de '.($this->input->post('respuesta['.$topkey.'][TAZA]')?:0);
									$insertdata['consumo_diario'] = floatval(($dias_al_mes * $porcion) / 30);
									// echo('dias al mes: '.$dias_al_mes.br(1).'porcion: '.$porcion.br(1).'consumo diario: '.floatval(($dias_al_mes * $porcion) / 30));
								}elseif ($this->input->post('respuesta['.$topkey.'][TIPO]')==TIPO_RESPUESTA_VASO){
									$porcion = (floatval($this->input->post('respuesta['.$topkey.'][UNIDAD]'))?:0) * (floatval($this->input->post('respuesta['.$topkey.'][VASO]'))?:0);
									$insertdata['respuesta'] = ($this->input->post('respuesta['.$topkey.'][UNIDAD]')?:0).' porciones de '.($this->input->post('respuesta['.$topkey.'][VASO]')?:0);
									$insertdata['consumo_diario'] = floatval(($dias_al_mes * $porcion) / 30);
									// echo('dias al mes: '.$dias_al_mes.br(1).'porcion: '.$porcion.br(1).'consumo diario: '.floatval(($dias_al_mes * $porcion) / 30));
								}elseif ($this->input->post('respuesta['.$topkey.'][TIPO]')==TIPO_RESPUESTA_VASO_TCO){
									$porcion = (floatval($this->input->post('respuesta['.$topkey.'][UNIDAD]'))?:0) * (floatval($this->input->post('respuesta['.$topkey.'][VASO_TCO]'))?:0);
									$insertdata['respuesta'] = ($this->input->post('respuesta['.$topkey.'][UNIDAD]')?:0).' porciones de '.($this->input->post('respuesta['.$topkey.'][VASO_TCO]')?:0);
									$insertdata['consumo_diario'] = floatval(($dias_al_mes * $porcion) / 30);
									// echo('dias al mes: '.$dias_al_mes.br(1).'porcion: '.$porcion.br(1).'consumo diario: '.floatval(($dias_al_mes * $porcion) / 30));
								}elseif ($this->input->post('respuesta['.$topkey.'][TIPO]')==TIPO_RESPUESTA_VASO_PCO){
									$porcion = (floatval($this->input->post('respuesta['.$topkey.'][UNIDAD]'))?:0) * (floatval($this->input->post('respuesta['.$topkey.'][VASO_PCO]'))?:0);
									$insertdata['respuesta'] = ($this->input->post('respuesta['.$topkey.'][UNIDAD]')?:0).' porciones de '.($this->input->post('respuesta['.$topkey.'][VASO_PCO]')?:0);
									$insertdata['consumo_diario'] = floatval(($dias_al_mes * $porcion) / 30);
									// echo('dias al mes: '.$dias_al_mes.br(1).'porcion: '.$porcion.br(1).'consumo diario: '.floatval(($dias_al_mes * $porcion) / 30));
								}elseif ($this->input->post('respuesta['.$topkey.'][TIPO]')==TIPO_RESPUESTA_COPA){
									$porcion = (floatval($this->input->post('respuesta['.$topkey.'][UNIDAD]'))?:0) * (floatval($this->input->post('respuesta['.$topkey.'][COPA]'))?:0);
									$insertdata['respuesta'] = ($this->input->post('respuesta['.$topkey.'][UNIDAD]')?:0).' porciones de '.($this->input->post('respuesta['.$topkey.'][COPA]')?:0);
									$insertdata['consumo_diario'] = floatval(($dias_al_mes * $porcion) / 30);
									// echo('dias al mes: '.$dias_al_mes.br(1).'porcion: '.$porcion.br(1).'consumo diario: '.floatval(($dias_al_mes * $porcion) / 30));
								}elseif ($this->input->post('respuesta['.$topkey.'][TIPO]')==TIPO_RESPUESTA_ISOTONICOS){
									$porcion = (floatval($this->input->post('respuesta['.$topkey.'][UNIDAD]'))?:0) * (floatval($this->input->post('respuesta['.$topkey.'][ISOTONICO]'))?:0);
									$insertdata['respuesta'] = ($this->input->post('respuesta['.$topkey.'][UNIDAD]')?:0).' porciones de '.($this->input->post('respuesta['.$topkey.'][ISOTONICO]')?:0);
									$insertdata['consumo_diario'] = floatval(($dias_al_mes * $porcion) / 30);
									// echo('dias al mes: '.$dias_al_mes.br(1).'porcion: '.$porcion.br(1).'consumo diario: '.floatval(($dias_al_mes * $porcion) / 30));
								}elseif ($this->input->post('respuesta['.$topkey.'][TIPO]')==TIPO_RESPUESTA_BOTELLAS){
									$porcion = (floatval($this->input->post('respuesta['.$topkey.'][UNIDAD]'))?:0) * (floatval($this->input->post('respuesta['.$topkey.'][BOTELLA]'))?:0);
									$insertdata['respuesta'] = ($this->input->post('respuesta['.$topkey.'][UNIDAD]')?:0).' porciones de '.($this->input->post('respuesta['.$topkey.'][BOTELLA]')?:0);
									$insertdata['consumo_diario'] = floatval(($dias_al_mes * $porcion) / 30);
									// echo('dias al mes: '.$dias_al_mes.br(1).'porcion: '.$porcion.br(1).'consumo diario: '.floatval(($dias_al_mes * $porcion) / 30));
								}elseif ($this->input->post('respuesta['.$topkey.'][TIPO]')==TIPO_RESPUESTA_MINERALES){
									$porcion = (floatval($this->input->post('respuesta['.$topkey.'][UNIDAD]'))?:0) * (floatval($this->input->post('respuesta['.$topkey.'][MINERAL]'))?:0);
									$insertdata['respuesta'] = ($this->input->post('respuesta['.$topkey.'][UNIDAD]')?:0).' porciones de '.($this->input->post('respuesta['.$topkey.'][MINERAL]')?:0);
									$insertdata['consumo_diario'] = floatval(($dias_al_mes * $porcion) / 30);
									// echo('dias al mes: '.$dias_al_mes.br(1).'porcion: '.$porcion.br(1).'consumo diario: '.floatval(($dias_al_mes * $porcion) / 30));
								}elseif ($this->input->post('respuesta['.$topkey.'][TIPO]')==TIPO_RESPUESTA_LATAS){
									$porcion = (floatval($this->input->post('respuesta['.$topkey.'][UNIDAD]'))?:0) * (floatval($this->input->post('respuesta['.$topkey.'][LATA]'))?:0);
									$insertdata['respuesta'] = ($this->input->post('respuesta['.$topkey.'][UNIDAD]')?:0).' porciones de '.($this->input->post('respuesta['.$topkey.'][LATA]')?:0);
									$insertdata['consumo_diario'] = floatval(($dias_al_mes * $porcion) / 30);
									// echo('dias al mes: '.$dias_al_mes.br(1).'porcion: '.$porcion.br(1).'consumo diario: '.floatval(($dias_al_mes * $porcion) / 30));
								}elseif ($this->input->post('respuesta['.$topkey.'][TIPO]')==TIPO_RESPUESTA_JUGOS){
									$porcion = (floatval($this->input->post('respuesta['.$topkey.'][UNIDAD]'))?:0) * (floatval($this->input->post('respuesta['.$topkey.'][JUGO]'))?:0);
									$insertdata['respuesta'] = ($this->input->post('respuesta['.$topkey.'][UNIDAD]')?:0).' porciones de '.($this->input->post('respuesta['.$topkey.'][JUGO]')?:0);
									$insertdata['consumo_diario'] = floatval(($dias_al_mes * $porcion) / 30);
									// echo('dias al mes: '.$dias_al_mes.br(1).'porcion: '.$porcion.br(1).'consumo diario: '.floatval(($dias_al_mes * $porcion) / 30));
								}elseif ($this->input->post('respuesta['.$topkey.'][TIPO]')==TIPO_RESPUESTA_YOGURT){
									$porcion = (floatval($this->input->post('respuesta['.$topkey.'][UNIDAD]'))?:0) * (floatval($this->input->post('respuesta['.$topkey.'][YOGURT]'))?:0);
									$insertdata['respuesta'] = ($this->input->post('respuesta['.$topkey.'][UNIDAD]')?:0).' porciones de '.($this->input->post('respuesta['.$topkey.'][YOGURT]')?:0);
									$insertdata['consumo_diario'] = floatval(($dias_al_mes * $porcion) / 30);
									// echo('dias al mes: '.$dias_al_mes.br(1).'porcion: '.$porcion.br(1).'consumo diario: '.floatval(($dias_al_mes * $porcion) / 30));
								}elseif ($this->input->post('respuesta['.$topkey.'][TIPO]')==TIPO_RESPUESTA_SHOTS){
									$porcion = (floatval($this->input->post('respuesta['.$topkey.'][UNIDAD]'))?:0) * (floatval($this->input->post('respuesta['.$topkey.'][SHOT]'))?:0);
									$insertdata['respuesta'] = ($this->input->post('respuesta['.$topkey.'][UNIDAD]')?:0).' porciones de '.($this->input->post('respuesta['.$topkey.'][SHOT]')?:0);
									$insertdata['consumo_diario'] = floatval(($dias_al_mes * $porcion) / 30);
									// echo('dias al mes: '.$dias_al_mes.br(1).'porcion: '.$porcion.br(1).'consumo diario: '.floatval(($dias_al_mes * $porcion) / 30));
								}elseif ($this->input->post('respuesta['.$topkey.'][TIPO]')==TIPO_RESPUESTA_FRUTA){
									$continuar = $this->input->post('respuesta['.$topkey.'][FRUTA]');
									$insertdata['respuesta'] = $this->input->post('respuesta['.$topkey.'][FRUTA]');
								}elseif ($this->input->post('respuesta['.$topkey.'][TIPO]')==TIPO_RESPUESTA_TAMANO){
									$insertdata['respuesta'] = $this->input->post('respuesta['.$topkey.'][TAMANO]');
								}elseif ($this->input->post('respuesta['.$topkey.'][TIPO]')==TIPO_RESPUESTA_MATERIAGRASA){
									$insertdata['respuesta'] = $this->input->post('respuesta['.$topkey.'][MATERIAGRASA]');
								}elseif ($this->input->post('respuesta['.$topkey.'][TIPO]')==TIPO_RESPUESTA_TIPOLECHE){
									$insertdata['respuesta'] = $this->input->post('respuesta['.$topkey.'][TIPOLECHE]');
								}elseif ($this->input->post('respuesta['.$topkey.'][TIPO]')==TIPO_RESPUESTA_LACTOSA){
									$insertdata['respuesta'] = $this->input->post('respuesta['.$topkey.'][LACTOSA]');
								}elseif ($this->input->post('respuesta['.$topkey.'][TIPO]')==TIPO_RESPUESTA_TIPOYOGURT){
									$insertdata['respuesta'] = $this->input->post('respuesta['.$topkey.'][TIPOYOGURT]');
								}elseif ($this->input->post('respuesta['.$topkey.'][TIPO]')==TIPO_RESPUESTA_TIPOSEMILLAS){
									$insertdata['respuesta'] = $this->input->post('respuesta['.$topkey.'][TIPOSEMILLAS]');
								}elseif ($this->input->post('respuesta['.$topkey.'][TIPO]')==TIPO_RESPUESTA_TIPOGALLETAS){
									$insertdata['respuesta'] = $this->input->post('respuesta['.$topkey.'][TIPOGALLETAS]');
								}elseif ($this->input->post('respuesta['.$topkey.'][TIPO]')==TIPO_RESPUESTA_CERELACNESTUM){
									$insertdata['respuesta'] = $this->input->post('respuesta['.$topkey.'][CERELACNESTUM]');
								}elseif ($this->input->post('respuesta['.$topkey.'][TIPO]')==TIPO_RESPUESTA_LACTEOS){
									$insertdata['respuesta'] = $this->input->post('respuesta['.$topkey.'][LACTEOS]');
								}elseif ($this->input->post('respuesta['.$topkey.'][TIPO]')==TIPO_RESPUESTA_MARCAPROD){
									$insertdata['respuesta'] = $this->input->post('respuesta['.$topkey.'][MARCAPROD]');
								}elseif ($this->input->post('respuesta['.$topkey.'][TIPO]')==TIPO_RESPUESTA_INTERIORES){
									$insertdata['respuesta'] = $this->input->post('respuesta['.$topkey.'][INTERIORES]');
								}elseif ($this->input->post('respuesta['.$topkey.'][TIPO]')==TIPO_RESPUESTA_CARNEOS){
									$insertdata['respuesta'] = $this->input->post('respuesta['.$topkey.'][CARNEOS]');
								}elseif ($this->input->post('respuesta['.$topkey.'][TIPO]')==TIPO_RESPUESTA_NOMBREPROD){
									$insertdata['respuesta'] = $this->input->post('respuesta['.$topkey.'][NOMBREPROD]');
								}elseif ($this->input->post('respuesta['.$topkey.'][TIPO]')==TIPO_RESPUESTA_TIEMPOCONSUMO){
									$insertdata['respuesta'] = $this->input->post('respuesta['.$topkey.'][TIEMPOCONSUMO]');
								}elseif ($this->input->post('respuesta['.$topkey.'][TIPO]')==TIPO_RESPUESTA_MOTIVOCONSUMO){
									$insertdata['respuesta'] = $this->input->post('respuesta['.$topkey.'][MOTIVOCONSUMO]');
								}elseif ($this->input->post('respuesta['.$topkey.'][TIPO]')==TIPO_RESPUESTA_ESPECIFICAR){
									$insertdata['respuesta'] = $this->input->post('respuesta['.$topkey.'][ESPECIFICAR]');
								}
								$inserto = $encuestas_lib->registro_pregunta($insertdata);
								unset($insertdata);
								// if ($this->ion_auth->is_admin()) {echo $inserto;}

							}
						}
					}
				}

				$inserto=isset($inserto)?TRUE:FALSE;
				if($inserto){
					if ($nav == 'preguntas') {
						/* si el ingreso de respuestas es correcto paso cargar datos de la siguiente pregunta */
						$preguntas = $encuestas_lib->preguntas($this->session->paginas_list[$this->session->indice_pagina]['pagina']);
						foreach ($preguntas->result() as $row) {
							// INPUT TIPO DROPDOWN
							if($row->tipo == TIPO_RESPUESTA_CONSUMO){
								$listado['diasalmes'] = $encuestas_lib->parametros_list(TIPO_RESPUESTA_DIASALMES);
							}elseif($row->tipo == TIPO_RESPUESTA_IMAGEN){
								$listado['imagen'] = $encuestas_lib->img_alimentos($row->id_alimento);
							}elseif($row->tipo == TIPO_RESPUESTA_CUCHARADA){
								$listado['cucharas'] = $encuestas_lib->parametros_list($row->tipo);
								$listado['tazas'] = $encuestas_lib->parametros_list(TIPO_RESPUESTA_TAZA);
							}elseif($row->tipo == TIPO_RESPUESTA_CUCHARON){
								$listado['cucharones'] = $encuestas_lib->parametros_list($row->tipo);
							}elseif($row->tipo == TIPO_RESPUESTA_DOSIFICADOR){
								$listado['dosificadores'] = $encuestas_lib->parametros_list($row->tipo);
							}elseif($row->tipo == TIPO_RESPUESTA_TAZA){
								$listado['tazas'] = $encuestas_lib->parametros_list($row->tipo);
							}elseif($row->tipo == TIPO_RESPUESTA_VASO){
								$listado['vasos'] = $encuestas_lib->parametros_list($row->tipo);
							}elseif($row->tipo == TIPO_RESPUESTA_COPA){
								$listado['copas'] = $encuestas_lib->parametros_list($row->tipo);
							}elseif($row->tipo == TIPO_RESPUESTA_ISOTONICOS){
								$listado['isotonicos'] = $encuestas_lib->parametros_list($row->tipo);
							}elseif($row->tipo == TIPO_RESPUESTA_BOTELLAS){
								$listado['botellas'] = $encuestas_lib->parametros_list($row->tipo);
							}elseif($row->tipo == TIPO_RESPUESTA_LATAS){
								$listado['latas'] = $encuestas_lib->parametros_list($row->tipo);
							}elseif($row->tipo == TIPO_RESPUESTA_JUGOS){
								$listado['jugos'] = $encuestas_lib->parametros_list($row->tipo);
							}elseif($row->tipo == TIPO_RESPUESTA_FRUTA){
								$listado['fruta'] = $encuestas_lib->parametros_list($row->tipo);
							}elseif($row->tipo == TIPO_RESPUESTA_TAMANO){
								$listado['tamano'] = $encuestas_lib->parametros_list($row->tipo);
							}elseif($row->tipo == TIPO_RESPUESTA_MATERIAGRASA){
								$listado['materiagrasa'] = $encuestas_lib->parametros_list($row->tipo);
							}elseif($row->tipo == TIPO_RESPUESTA_TIPOLECHE){
								$listado['tipoleche'] = $encuestas_lib->parametros_list($row->tipo);
							}elseif($row->tipo == TIPO_RESPUESTA_LACTOSA){
								$listado['lactosa'] = $encuestas_lib->parametros_list($row->tipo);
							}elseif($row->tipo == TIPO_RESPUESTA_TIPOYOGURT){
								$listado['tipoyogurt'] = $encuestas_lib->parametros_list($row->tipo);
							}elseif($row->tipo == TIPO_RESPUESTA_TIPOSEMILLAS){
								$listado['tiposemillas'] = $encuestas_lib->parametros_list($row->tipo);
							}elseif($row->tipo == TIPO_RESPUESTA_TIPOGALLETAS){
								$listado['tipogalletas'] = $encuestas_lib->parametros_list($row->tipo);
							}elseif($row->tipo == TIPO_RESPUESTA_CERELACNESTUM){
								$listado['cerelacnestum'] = $encuestas_lib->parametros_list($row->tipo);
							}elseif($row->tipo == TIPO_RESPUESTA_LACTEOS){
								$listado['lacteos'] = $encuestas_lib->parametros_list($row->tipo);
							}elseif($row->tipo == TIPO_RESPUESTA_INTERIORES){
								$listado['interiores'] = $encuestas_lib->parametros_list($row->tipo);
							}elseif($row->tipo == TIPO_RESPUESTA_CARNEOS){
								$listado['carneos'] = $encuestas_lib->parametros_list($row->tipo);
							}elseif($row->tipo == TIPO_RESPUESTA_VASO_TCO){
								$listado['vasos_tcos'] = $encuestas_lib->parametros_list($row->tipo);
							}elseif($row->tipo == TIPO_RESPUESTA_VASO_PCO){
								$listado['vasos_pcos'] = $encuestas_lib->parametros_list($row->tipo);
							}elseif($row->tipo == TIPO_RESPUESTA_MINERALES){
								$listado['minerales'] = $encuestas_lib->parametros_list($row->tipo);
							}elseif($row->tipo == TIPO_RESPUESTA_YOGURT){
								$listado['yogurt'] = $encuestas_lib->parametros_list($row->tipo);
							}elseif($row->tipo == TIPO_RESPUESTA_SHOTS){
								$listado['shots'] = $encuestas_lib->parametros_list($row->tipo);
							}
							if(!isset($listado)){
								$listado = array();
							}
						}

						$data['titulo'] = 'Aplicación de la encuesta';
						$data['subtitulo'] = $this->session->encuesta.' (página: '.strval(intval($this->session->indice_pagina)+1).' de '.$this->session->total_paginas.')';
						$data['nav'] = $nav;
						$data['pagina'] = $this->session->paginas_list[$this->session->indice_pagina]['pagina'];
						$data['modulo'] = $preguntas->row(0)->modulo?:'';
						$data['alimento'] = $preguntas->row(0)->alimento?:'';

						$crud = new grocery_CRUD();
						$crud->set_table('ns_groups');
						$output = $crud->render();
						$this->_aplicacion_encuestas_output((object)array('data' => $data, 'listado' => $listado, 'preguntas' => $preguntas , 'css_files' => $output->css_files, 'js_files' => $output->js_files), '1');
					}elseif ($nav == 'termino') {
						/* inserto la última respuesta */
						$fin = $encuestas_lib->finaliza_encuesta();
						$termino = $encuestas_lib->termino();
						$resumen = $encuestas_lib->resumen_ultima_encuesta();
						$this->limpiar_variables();

						$data['titulo'] = 'Finalización de la encuesta';
						$data['subtitulo'] = 'despedida y entrega de información final';
						$data['nav'] = 'termino';
						$data['termino'] = $termino.br(2).$resumen;
						$data['modulo'] = '';
						$data['alimento'] = '';

						$crud = new grocery_CRUD();
						$crud->set_table('ns_groups');
						$output = $crud->render();
						$this->_aplicacion_encuestas_output((object)array('data' => $data , 'css_files' => $output->css_files, 'js_files' => $output->js_files), '1');
					}
				}
			}
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	function set_usuario_modificacion() {
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

	public function ordenar_preguntas()
	{
		try{
			$encuestas_lib = new encuestas();
			$ordenar = $encuestas_lib->ordenar_preguntas();
			$data['titulo'] = 'ejecutado ordenar_preguntas: retorno('.$ordenar.')';

			$crud = new grocery_CRUD();
			$crud->set_table('ns_groups');
			$output = $crud->render();
			$this->_aplicacion_encuestas_output((object)array('data' => $data , 'css_files' => $output->css_files, 'js_files' => $output->js_files), '0');

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	function img_alimentos($id_alimento)
	{
		if (is_null($id_alimento)) {return cancel;}
		$encuestas = new encuestas();
		$query = $encuestas->img_alimentos($id_alimento);
		return $query;
	}

	function limpiar_variables()
	{
		$limpiar_variables = array('paginas_list', 'total_paginas', 'folio', 'encuesta', 'id_encuesta','indice_pagina');
		$this->session->unset_userdata($limpiar_variables);
	}
}
