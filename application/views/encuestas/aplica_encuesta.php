<?php
  $titulo = $data['titulo'];
  $subtitulo = $data['subtitulo'];
  $nav = $data['nav'];
?>
  <br/>
  <div class="container gc-container" style="width: 100%;">
    <div class="success-message hidden"></div>
    <div class="row">
      <div class="col-md-12 table-section">
        <div class="table-label">
            <div style="align-content: center;"><?php echo $titulo.': '.$subtitulo ?></div>
            <div class="clear"></div>
        </div>
        <br/>
        <div class="table-container" style="width: 100%;">
        <!-- AREA DE IMPLEMENTACIÓN DE APLICACION DE ENCUESTAS -->
          <?php
            if ('' !== $nav) {
              // echo form_hidden('navegacion_encuesta', $nav);
              include(__DIR__."/".$nav.".php");
            }
          ?>
        <!-- FIN AREA -->
    	  </div>
      </div>
    </div>
  </div>
