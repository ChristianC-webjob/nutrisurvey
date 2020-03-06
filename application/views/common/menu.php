  <!-- Menu principal -->
  <?php
    if (isset($_SERVER['HTTP_REFERER'])){$volver = $_SERVER['HTTP_REFERER'];}
    $user = $this->ion_auth->user()->row();
  ?>
  <div id ="topMenu" class="menu">
    <ul class="topnav">
      <li><a id = "1" href="<?php echo base_url() ?>">Inicio</a></li>
      <?php
      if ($this->ion_auth->logged_in()) {
        if ($this->ion_auth->is_admin()) { ?>
        <li class="dropdown">
          <a href="javascript:void(0)" class="dropbtn">Configuración</a>
          <div class="dropdown-content">
            <a href="<?php echo site_url('configuracion/definir_modulos') ?>">Definir Módulos</a>
            <a href="<?php echo site_url('configuracion/definir_alimentos') ?>">Definir Alimentos</a>
            <a href="<?php echo site_url('configuracion/rel_alimento_fotos') ?>">Definir Relación Alimentos > Imagenes</a>
            <hr color="#4682B4">
            <a href="<?php echo site_url('configuracion/definir_encuestas') ?>">Definir Encuestas</a>
            <a href="<?php echo site_url('configuracion/definir_preguntas') ?>">Definir Preguntas</a>
            <a href="<?php echo site_url('configuracion/definir_encuestas_preguntas_alimentos') ?>">Definir Relación Encuesta > Pregunta > Alimento</a>
            <a href="<?php echo site_url('configuracion/definir_exclusiones') ?>">Definir Exclusiones</a>
            <hr color="#4682B4">
            <a href="<?php echo site_url('auth') ?>">Definir Usuarios</a>
            <hr color="#4682B4">
            <a href="<?php echo site_url('configuracion/definir_parametros') ?>">Definir Parámetros</a>
          </div>
        </li>
      <?php }
      $group = array('Administrador', 'Supervisor');
      if ($this->ion_auth->in_group($group)) { ?>
        <li class="dropdown">
          <a href="javascript:void(0)" class="dropbtn">Gestión</a>
          <div class="dropdown-content">
            <a href="<?php echo site_url('gestion/registro_respuestas') ?>">Resultados Encuestas</a>
          </div>
        </li>
      <?php }
      $group = 'Encuestador';
      if ($this->ion_auth->in_group($group)) { ?>
        <li class="dropdown">
          <a href="javascript:void(0)" class="dropbtn">Encuestas</a>
          <div class="dropdown-content">
            <a href="<?php echo site_url('aplicacionEncuestas/aplicar_encuesta/registro') ?>">Aplicar Encuesta</a>
            <a href="<?php echo site_url('aplicacionEncuestas/registro_encuestas') ?>">Registro Encuestas</a>
            <!-- <a href="<?php echo site_url('aplicacionEncuestas/registro_encuestados') ?>">Registro Encuestados</a> -->
          </div>
        </li>
      <?php }
      if ($this->ion_auth->logged_in())
      { echo '<li class="right"><a id="8" href="'.site_url('auth/logout').'" title="Cerrar sesión" alt="Cerrar sesión">Usuario: '.$user->username.'</a></li>';
      } ?>
      <!-- <li class="right"><a id="9" href="<?php if (isset($volver)){echo $volver;} ?>">Volver</a></li> -->
      <?php } ?>
    </ul>
  </div>
