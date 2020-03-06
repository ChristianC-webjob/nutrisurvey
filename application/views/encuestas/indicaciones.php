<?php
  $indicaciones = $data['indicaciones'];
?>
<table class="encuesta">
  <tr><td>
    <?php
      if ('' !== $indicaciones) {
        echo $indicaciones;
      }
    ?>
  </td></tr>
  <tr><td><hr class="encuesta_solid"></td></tr>
  <tr><td class="encuesta_der">
    <?php
      echo form_open('aplicacionEncuestas/aplicar_encuesta/registro');
      $data = array(
              'name'          => 'btn_siguiente',
              'id'            => 'registro',
              'value'         => 'registro',
              'type'          => 'submit',
              'content'       => 'Registro',
              'class'         => 'encuesta'
      );
      echo form_button($data);
    ?>
  </td></tr>
</table>
<?php echo form_close(); ?>
