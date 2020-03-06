<?php
/**
 * Name:    Encuestas
 * Author:  Christian Carreño
 *           webjob@comadreja.cl
 *
 * Created:  19.11.2019
 *
 * Description:  Librería de funcionalidades para aplicación de encuestas.
 *
 * Requirements: PHP5.6 or above
 *
 * @package    CodeIgniter-NutriSurvey
 * @author     Christian Carreño
 * @link       http://github.com/
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Encuestas
 */
class Encuestas
{

	protected $CI;

	/**
	 *
	 * Constructor
	 *
	 * @access	public
	 */
	public function __construct()
	{
		$this->CI =& get_instance();
	}

/**
	 * recupera_datos_encuesta
	 * @param int $id_encuesta
	 * @return object
	 * @author webjob
	 */
	public function recupera_datos_encuesta($id_encuesta)
	{
		$encuesta = $this->ion_auth_model->recupera_datos_encuesta($id_encuesta);

		if (!is_object($user))
		{
			$this->set_error('password_change_unsuccessful');
			return FALSE;
		}
		else
		{
			if ($this->config->item('forgot_password_expiration', 'ion_auth') > 0)
			{
				//Make sure it isn't expired
				$expiration = $this->config->item('forgot_password_expiration', 'ion_auth');
				if (time() - $user->forgotten_password_time > $expiration)
				{
					//it has expired
					$identity = $user->{$this->config->item('identity', 'ion_auth')};
					$this->ion_auth_model->clear_forgotten_password_code($identity);
					$this->set_error('password_change_unsuccessful');
					return FALSE;
				}
			}
			return $user;
		}
	}

	/**
	 * img_alimentos
	 * @param int $id_alimento
	 *
	 * @return object
	 * @author webjob
	 */
	public function img_alimentos($id_alimento)
	{
		$imagenes = $this->CI->encuestas_model->get_img_alimentos($id_alimento);
		return $imagenes;
	}

	public function encuestas_list()
	{
		$encuestas = $this->CI->encuestas_model->get_encuestas_list();
		return $encuestas;
	}

	public function indicaciones1()
	{
		$indicaciones1 = '<strong>Bienvenidos a Nutrisurvey 1.0</strong>';
		$indicaciones1 .= '<hr color="#4682B4">';
		$indicaciones1 .= '<p>El objetivo de esta herramienta es cuantificar los gramos de nutrientes que consumió un individuo en los últimos 30 días, basado en la mundialmente aplicada “Encuesta de Tendencia de Consumo Alimentario” (ETCC) y los alimentos encuestados en la “Encuesta Nacional de Consumo Alimentario ENCA 2010” por el INTA – U. de Chile el año 2010.</p>';
		$indicaciones1 .= '<p>Esta aplicación está orientada a aplicar de forma eficiente una encuesta alimentaria en Chile.</p>';
		$indicaciones1 .= '<p>Sólo puede ser aplicada por Nutricionistas universitarios y estudiantes internos de la carrera de Nutrición y Dietética.</p>';
		$indicaciones1 .= '<p>Cada Nutricionista encuestadora tendrá un código único, que será asociada a una cuenta de usuario asignada para ingresar al sistema de EDTCC.</p>';
		return $indicaciones1;
	}

	public function indicaciones2()
	{
		$indicaciones2 = '<p>Para mejorar la validez y confiabilidad de la herramienta, las respuestas no se pueden corregir una vez que pase a la siguiente pregunta.</p>';
		$indicaciones2 .= '<p>En el caso que el encuestado recuerde posteriormente algun alimento que sí consumió pero ya fue preguntado durante el transcurso de la encuesta, deberá ser registrado en el formulario de “Constatación de corrección de encuesta digital de tendencia de consumo alimentario (EDTCC)”, firmado por el encuestado y por usted, y entregado a la supervisora de la encuesta.</p>';
		$indicaciones2 .= '<hr color="#4682B4">';
		return $indicaciones2;
	}

	public function termino()
	{
		$termino = '<strong>Gracias por confiar y utilizar Nutrisurvey 1.0</strong>';
		$termino .= '<hr color="#4682B4">';
		$termino .= 'Recuerde entergar Fe de Erratas u observaciones a Nutricionista supervisora'; // Esperamos romperla con esta chuchá.
		return $termino;
	}

	public function supervisores_list()
	{
		$supervisores = $this->CI->encuestas_model->get_supervisores_list();
		return $supervisores;
	}

	public function encuestadores_list()
	{
		$encuestadores = $this->CI->encuestas_model->get_encuestadores_list();
		return $encuestadores;
	}

	public function encuestados_list()
	{
		$encuestados = $this->CI->encuestas_model->get_encuestados_list();
		return $encuestados;
	}

	public function folio()
	{
		$folio = $this->CI->encuestas_model->get_folio();
		return $folio;
	}

	public function orden($pagina)
	{
		$orden = $this->CI->encuestas_model->get_orden($pagina);
		return $orden;
	}

	public function preguntas($pagina)
	{
		$pregunta = $this->CI->encuestas_model->get_preguntas($pagina);
		return $pregunta;
	}

	public function registro_encuesta($insertdata)
	{
		$resultado = $this->CI->encuestas_model->set_registro_encuesta($insertdata);
		return $resultado;
	}

	public function registro_pregunta($insertdata)
	{
		$resultado = $this->CI->encuestas_model->set_registro_pregunta($insertdata);
		return $resultado;
	}

	public function finaliza_encuesta()
	{
		$resultado = $this->CI->encuestas_model->set_finaliza_encuesta();
		return $resultado;
	}

	public function ordenar_preguntas()
	{
		$ordenar = $this->CI->encuestas_model->ordenar_preguntas();
		return $ordenar;
	}

	public function parametros_list($tipo)
	{
		$parametros = $this->CI->encuestas_model->get_parametros_list($tipo);
		return $parametros;
	}

	public function exclusiones_list()
	{
		$exclusiones = $this->CI->encuestas_model->get_exclusiones_list();
		return $exclusiones;
	}

	public function paginas_list($exclusiones)
	{
		$paginas_list = $this->CI->encuestas_model->get_paginas_list($exclusiones);
		return $paginas_list;
	}

	public function resumen_ultima_encuesta()
	{
		$resumen = $this->CI->encuestas_model->get_resumen_ultima_encuesta();
		return $resumen;
	}

}
