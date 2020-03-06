<table align="center" border="1" width="80%">
  <?php echo form_open('aplicacionEncuestas/aplicar_encuesta/preguntas'); ?>

  <tr>
    <td class="encuesta" colspan="2" rowspan="2"><h4>Datos Encuestado</h4></td>
    <td class="encuesta" colspan="2">CÓDIGO ENCUESTADO</td>
  </tr>
  <tr>
    <td class="encuesta" colspan="2"><?php echo nbs(1); ?></td>
  </tr>
  <tr>
    <td class="encuesta">NOMBRE</td>
    <td class="encuesta">APELLIDO PATERNO</td>
    <td class="encuesta" colspan="2">APELLIDO MATERNO</td>
  </tr>
  <tr>
    <td class="encuesta"><?php echo form_label($,'valor nombre'); ?></td>
    <td class="encuesta"><?php echo form_input('paterno','valor paterno'); ?></td>
    <td class="encuesta" colspan="2"><?php echo form_input('materno','valor materno'); ?></td>
  </tr>
  <tr>
    <td class="encuesta" colspan="2">DIRECCION</td>
    <td class="encuesta" width="18%">CELULAR</td>
    <td class="encuesta" width="18%">FONO</td>
  </tr>
  <tr>
    <td class="encuesta" colspan="2"><?php echo form_input('direccion','valor direccion'); ?></td>
    <td class="encuesta"><?php echo form_input('celular','valor celular'); ?></td>
    <td class="encuesta"><?php echo form_input('fono','valor fono'); ?></td>
  </tr>
  <tr>
    <td class="encuesta">REGION</td>
    <td class="encuesta">COMUNA</td>
    <td class="encuesta" colspan="2">RURALIDAD</td>
  </tr>
  <tr>
    <td class="encuesta"><?php echo form_input('region','valor region'); ?></td>
    <td class="encuesta"><?php echo form_input('comuna','valor comuna'); ?></td>
    <td class="encuesta" colspan="2"><?php echo nbs(1); ?></td>
  </tr>
  <tr>
    <td class="encuesta">RUT</td>
    <td class="encuesta">FECHA DE NACIMIENTO</td>
    <td class="encuesta" colspan="2">MAIL</td>
  </tr>
  <tr>
    <td class="encuesta"><?php echo form_input('rut','valor rut'); ?></td>
    <td class="encuesta"><?php echo form_input('fecnac','valor fecnac'); ?></td>
    <td class="encuesta" colspan="2"><?php echo form_input('mail','valor mail'); ?></td>
  </tr>
  <!-- FOOTER -->
  <tr><td colspan="4" class="encuesta"><hr color="#4682B4"></td></tr>
  <tr><td class="encuesta" colspan="4">
    <?php
      $data = array(
              'name'          => 'btn_siguiente',
              'id'            => 'encuestado',
              'value'         => 'next',
              'type'          => 'submit',
              'content'       => 'Datos del Encuestado'
      );
      echo form_button($data);
    ?>
  </td></tr>
</table>
