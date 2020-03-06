<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- PARA CUALQUIER NAVEGADOR -->
		<link rel="icon" href="<?php echo base_url(); ?>imagenes/sistema/encuesta.png" type="image/png" sizes="128x128">
		<!-- Ipad Retina con iOS 7 o superior -->
		<link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>imagenes/sistema/encuesta.png" type="image/png" sizes="152x152">
		<!-- Ipad Retina con iOS 6 o inferior -->
		<link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>imagenes/sistema/encuesta.png" type="image/png" sizes="120x120">
		<!-- Ipad Mini o primeras generaciones con iOS 7 o superior -->
		<link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>imagenes/sistema/encuesta.png" type="image/png" sizes="76x76">
		<!-- Ipad Mini o primeras generaciones con iOS 6 o inferior -->
		<link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>imagenes/sistema/encuesta.png" type="image/png" sizes="72x72">

		<meta charset="utf-8">
		<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
		<meta name="viewport" content="width=500, initial-scale=1">
		<title>NutriSurvey 1.0</title>

		<?php foreach($css_files as $file): ?>
			<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
		<?php endforeach; ?>
		<?php echo link_tag('assets/comun/css/comun.css'); ?>

	</head>
	<body onKeyDown="javascript:VerificarF5()">

		<?php include(__DIR__."/menu.php"); ?>

		<div id="container" class="container">
