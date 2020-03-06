<?php
/**
 * PHP grocery CRUD
 *
 * LICENSE
 *
 * Grocery CRUD is released with dual licensing, using the GPL v3 (license-gpl3.txt) and the MIT license (license-mit.txt).
 * You don't have to do anything special to choose one license or the other and you don't have to notify anyone which license you are using.
 * Please see the corresponding license file for details of these licenses.
 * You are free to use, modify and distribute this software, but all copyright information must remain.
 *
 * @package    	grocery CRUD
 * @copyright  	Copyright (c) 2010 through 2012, John Skoumbourdis
 * @license    	https://github.com/scoumbourdis/grocery-crud/blob/master/license-grocery-crud.txt
 * @version    	1.4.2
 * @author     	John Skoumbourdis <scoumbourdisj@gmail.com>
 */

// ------------------------------------------------------------------------

/**
 * Grocery CRUD Model
 *
 *
 * @package    	grocery CRUD
 * @author     	John Skoumbourdis <scoumbourdisj@gmail.com>
 * @version    	1.5.6
 * @link		http://www.grocerycrud.com/documentation
 */
class Encuestas_model  extends CI_Model  {

	protected $primary_key = null;
	protected $table_name = null;
	protected $relation = array();
	protected $relation_n_n = array();
	protected $primary_keys = array();

	// NEW
	protected $add_values = array();

  function __construct()
  {
    parent::__construct();
  }

  public function get_datos_encuesta($id_encuesta)
  {
    $this->db->select('nombre, descripcion');
    $this->db->from('ns_encuestas');
    $this->db->where('id_encuesta', $id_encuesta);
    $query = $this->db->get();
  	return $query;
  }

  public function get_datos_registro_encuesta($folio)
  {
    $this->db->select('folio, id_encuesta, codigo_zona, codigo_supevisor, codigo_encuestador, codigo_encuestado');
    $this->db->from('ns_registro_encuestas');
    $this->db->where('folio', $folio);
    $query = $this->db->get();
  	return $query;
  }

  public function get_encuesta_2($id_encuesta)
  {
    $this->db->select('epa.orden, m.nombre modulo, p.codigo_pregunta, p.label_pregunta, a.nombre alimento, p.tipo_respuesta');
    $this->db->from('ns_encuestas_preguntas_alimentos epa');
    $this->db->join('ns_encuestas e', 'e.id_encuesta = epa.id_encuesta', 'LEFT');
    $this->db->join('ns_preguntas p', 'p.id_pregunta = epa.id_pregunta', 'LEFT');
    $this->db->join('ns_alimentos a', 'a.id_alimento = epa.id_alimento', 'LEFT');
    $this->db->join('ns_modulos m', 'm.id_modulo = a.id_modulo', 'LEFT');
    $this->db->where('epa.id_encuesta', $id_encuesta);
    $this->db->order_by('epa.orden');
    $query = $this->db->get();
  	return $query;
  }

public function get_img_alimentos($id_alimento)
	{
		$this->db->select('vw_modulo_alimento.modulo, vw_modulo_alimento.alimento, pos_catalogo, descripcion_catalogo, vw_tipo_medida.label, url_foto1, valor_foto1, url_foto2, valor_foto2, url_foto3, valor_foto3, ');
		$this->db->from('ns_relacion_alimento_foto');
		$this->db->join('vw_modulo_alimento', 'vw_modulo_alimento.id_alimento = ns_relacion_alimento_foto.id_alimento');
		$this->db->join('ns_alimentos', 'ns_alimentos.id_alimento = ns_relacion_alimento_foto.id_alimento');
		$this->db->join('vw_tipo_medida', 'vw_tipo_medida.valor = ns_alimentos.tipo_medida');
		$this->db->where('ns_relacion_alimento_foto.id_alimento',$id_alimento);
		$query = $this->db->get();
    return $query;
  }

	public function db()
	{
		return $this->db;
	}

	public function get_encuestas_list()
	{
		$this->db->select('id_encuesta, nombre, descripcion');
    $this->db->from('ns_encuestas');
    $this->db->order_by('id_encuesta');
    $query = $this->db->get();
    return $query;
	}

	public function get_encuestadores_list()
  {
		$this->db->select("id, concat(first_name,' ',last_name) as nombre");
    $this->db->from('vw_get_encuestadores');
    $this->db->order_by('id');
    $query = $this->db->get();
  	return $query;
  }

	public function get_supervisores_list()
  {
		$this->db->select("id, concat(first_name,' ',last_name) as nombre");
    $this->db->from('vw_get_supervisores');
    $this->db->order_by('id');
    $query = $this->db->get();
  	return $query;
  }

	public function get_encuestados_list()
  {
    $this->db->select("codigo_ns, concat(nombre,' ',paterno,' ',materno) as nombre");
    $this->db->from('ns_encuestados');
    $this->db->order_by('codigo_ns');
    $query = $this->db->get();
  	return $query;
  }

	public function get_folio()
	{
		$this->db->select('folio');
    $this->db->from('vw_get_folio');
    $query = $this->db->get()->row()->folio;
    return $query;
	}

	public function get_encuesta($id_encuesta)
	{
		$this->db->select('nombre');
    $this->db->from('ns_encuestas');
		$this->db->where('id_encuesta',$id_encuesta);
    $nombre = $this->db->get()->row()->nombre;
    return $nombre;
	}

	public function get_orden($pagina)
	{
		$query = $this->db->query('select max(orden)+1 as orden from ns_encuestas_preguntas_alimentos where pagina = '.$pagina);
		$row = $query->row();
		$orden = $row->orden;
		$query->free_result();
    return $orden;
	}

	public function get_preguntas($pagina)
	{
		$this->db->select('id_encuesta_pregunta_alimento, pagina, orden, id_encuesta, encuesta, id_pregunta, codigo, pregunta, id_modulo, modulo, id_alimento, alimento, tipo_medida, medida, tipo, respuesta, url_foto1, valor_foto1, url_foto2, valor_foto2, url_foto3, valor_foto3');
    $this->db->from('vw_get_preguntas');
		$this->db->where('id_encuesta', $this->session->id_encuesta);
		$this->db->where('pagina', $pagina);
		$this->db->order_by('orden');
    $query = $this->db->get();
    return $query;
	}

	public function set_registro_encuesta($insertdata)
	{
		$this->session->encuesta = $this->get_encuesta($insertdata['id_encuesta']);
		$this->session->id_encuesta = $insertdata['id_encuesta'];
		$this->session->folio = $insertdata['folio'];
		$str = $this->db->set($insertdata)->get_compiled_insert('ns_registro_encuestas');
		$res = $this->db->query($str);
    return $str;
	}

	public function set_registro_pregunta($insertdata)
	{
		$insertdata['folio'] = $this->session->folio;
		$insertdata['usuario_creacion'] = $this->ion_auth->get_user_id();
		$str = $this->db->insert_string('ns_registro_encuestas', $insertdata);
		$str = $this->db->set($insertdata)->get_compiled_insert('ns_respuestas');
		$res = $this->db->query($str);
    return $str;
	}

	public function set_finaliza_encuesta()
	{
		$fin = $this->db->query('update ns_registro_encuestas set fecha_termino = "'.mdate(MYSQL_DATE_FORMAT, now()).'", usuario_termino = '.$this->ion_auth->get_user_id().' where folio = '.$this->session->folio);
    return $fin;
	}

	// SOLO USO EXTERNO PARA FINES DE ORDENAMIENTO
	public function ordenar_preguntas()
	{
		$orden = 0;
		$pagina_tmp = null;
		$query = $this->db->query('select id_encuesta_pregunta_alimento, pagina from vw_get_preguntas group by id_encuesta_pregunta_alimento, pagina order by pagina, id_pregunta');
		foreach ($query->result_array() as $row)
		{
			$pagina = $row['pagina'];
			if ($pagina_tmp == $pagina){
				$orden++;
			}else{
				$orden = 1;
			}
			$update = $this->db->query('update ns_encuestas_preguntas_alimentos set orden = '.$orden.' where id_encuesta_pregunta_alimento = '.$row['id_encuesta_pregunta_alimento']);
			$pagina_tmp = $pagina;
		}
		$query->free_result();
	}

	public function get_parametros_list($tipo)
  {
    $this->db->select("id_param, tipo, nombre, valor, label");
    $this->db->from('ns_parametros');
    $this->db->where('tipo',$tipo);
		$this->db->order_by('valor');
    $query = $this->db->get();
  	return $query;
  }

	public function get_exclusiones_list()
  {
		$this->db->select("id_exclusion, descripcion");
    $this->db->from('ns_exclusiones');
		$this->db->where_not_in('id_exclusion', GRUPO_EXCLUSION);
    $this->db->order_by('id_exclusion');
    $query = $this->db->get();
  	return $query;
  }

	public function get_paginas_list($exclusiones)
  {
		$this->db->select('ns_encuestas_preguntas_alimentos.pagina');
    $this->db->from('ns_encuestas_preguntas_alimentos');
		$this->db->join('ns_alimentos', 'ns_alimentos.id_alimento = ns_encuestas_preguntas_alimentos.id_alimento','LEFT');
		$this->db->where_not_in('ns_alimentos.grupo_exclusion', $exclusiones);
		$this->db->or_where('ns_alimentos.grupo_exclusion is null');
		$this->db->group_by('ns_encuestas_preguntas_alimentos.pagina');
    $this->db->order_by('ns_encuestas_preguntas_alimentos.pagina');
    $query = $this->db->get();
  	return $query->result_array();
  }

	public function get_resumen_ultima_encuesta()
	{
		$this->db->select('count(*) as contador');
		$this->db->from('ns_respuestas');
		$this->db->where('usuario_creacion', $this->ion_auth->get_user_id());
		$this->db->where('folio',$this->session->folio);
		$contador = $this->db->get()->row()->contador;

		$this->db->select('TIMESTAMPDIFF(MINUTE, fecha_aplicacion, fecha_termino) as minutos');
    $this->db->from('ns_registro_encuestas');
		$this->db->where('usuario_aplicacion', $this->ion_auth->get_user_id());
		$this->db->where('folio',$this->session->folio);
		$minutos = $this->db->get()->row()->minutos;

  	return 'En la encuesta (folio: '.$this->session->folio.')  se aplicaron y respondieron un total de '.$contador.' preguntas, en un lapso de '.$minutos.' minutos.';
	}

}
