<?php
  echo form_open('aplicacionEncuestas/aplicar_encuesta/preguntas/1');
  // echo form_hidden('alert_abandona_encuesta', TRUE);
  $exclusiones = $data['exclusiones'];
?>
<table class="encuesta">
  <tr><td colspan="2"><strong>Durante los últimos 30 días, ¿consumió usted...?</strong></td></tr>
    <?php
    if ('' !== $exclusiones) {
      foreach ($exclusiones->result() as $row) {
        echo '<tr><td colspan="2"><hr class="encuesta_dashed"></td></tr>';
        echo '<tr>';
        echo '  <td class="encuesta_der" style="width: 30%;">';
        $data = array(
                'name'          => 'exclusion['.$row->id_exclusion.']',
                'id'            => 'exclusion'.$row->id_exclusion.'[SI]',
                'value'         => null
        );
        echo form_radio($data).form_label('Si','exclusion'.$row->id_exclusion.'[SI]').nbs(2);
        $data = array(
                'name'          => 'exclusion['.$row->id_exclusion.']',
                'id'            => 'exclusion'.$row->id_exclusion.'[NO]',
                'value'         => $row->id_exclusion,
                'checked'       => TRUE
        );
        echo form_radio($data).form_label('No','exclusion'.$row->id_exclusion.'[NO]');
        echo '  </td>';
        echo '  <td class="encuesta_izq">';
        echo $row->descripcion;
        echo '  </td>';
        echo '</tr>';
      }
    }
    ?>
  <!-- FOOTER -->
  <tr><td class="encuesta" colspan="2"><hr class="encuesta_solid"></td></tr>
  <tr><td class="encuesta_der" colspan="2">
    <?php
      $data = array(
              'name'          => 'btn_comenzar',
              'id'            => 'preguntas',
              'value'         => 'next',
              'type'          => 'submit',
              'content'       => 'Iniciar encuesta',
              'class'         => 'encuesta'
      );
      echo form_button($data);
    ?>
  </td></tr>
</table>
<?php echo form_close(); ?>
