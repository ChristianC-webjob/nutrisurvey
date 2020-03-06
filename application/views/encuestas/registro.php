<?php
  $folio = $data['folio'];
  $script_exec = array('onSubmit' => 'return checkform_registro()');
  echo form_open('aplicacionEncuestas/aplicar_encuesta/exclusion', $script_exec);
?>
<table class="encuesta">
  <!-- <tr><td colspan="2"><h4>now(): <?php echo now(); ?></h4></td></tr>
  <tr><td colspan="2"><h4>mdate(MYSQL_DATE_FORMAT, now()): <?php echo mdate(MYSQL_DATE_FORMAT, now()); ?></h4></td></tr>
  <tr><td colspan="2"><h4>mdate(VIEWS_DATE_FORMAT, now()): <?php echo mdate(VIEWS_DATE_FORMAT, now()); ?></h4></td></tr>
  <tr><td colspan="2"><h4>unix to human: <?php echo unix_to_human(now()); ?></h4></td></tr>
  <tr><td colspan="2"><h4>human_to_unix: <?php echo human_to_unix(mdate(MYSQL_DATE_FORMAT, now())); ?></h4></td></tr> -->
  <tr>
	<td class="encuesta_izq"><h4>Folio: <?php echo form_input('folio',$folio,'readonly'); ?></h4></td>
	<td class="encuesta_der">Fecha encuesta: <?php echo form_input('fecha',mdate(VIEWS_DATE_FORMAT, now()),'readonly'); ?></td>
  </tr>
  <tr><td colspan="2"><hr class="encuesta_solid"></td></tr>
  <tr><td class="encuesta_izq" colspan="2"><h4>Datos de la encuesta</h4></td></tr>
  <tr>
    <td class="encuesta" colspan="2">
      <?php
      if ('' !== $encuestas) {
        echo '<select id="respuesta1" name="encuesta">';
        echo '<option value="0">Seleccione una encuesta</option>';
          foreach ($encuestas->result() as $row) {
            echo '<option selected value="'.$row->id_encuesta.'">'.$row->nombre.'</option>';
          }
        echo '</select>';
      }
      ?>
    </td>
  </tr>
  <tr><td class="encuesta" colspan="2"><?php echo nbs(1) ?></td></tr>
  <tr><td class="encuesta" colspan="2"><hr class="encuesta_solid"></td></tr>
  <tr><td class="encuesta" colspan="2"><h4>Antecedentes Generales</h4></td></tr>
  <tr>
    <td class="encuesta_cen">Encuestador</td>
    <!-- <td class="encuesta_cen">CODIGO SUPERVISOR</td> -->
    <td class="encuesta_cen" colspan="2">ID Encuestado</td>
  </tr>
  <tr>
    <td class="encuesta_cen">
      <?php
        $user = $this->ion_auth->user()->row();
        $data = array(
    		  'name'  	  => 'encuestador',
    		  'id'    	  => 'respuesta2',
    		  'type'  	  => 'text',
          'value'         => '('.$user->id.') '.$user->first_name.' '.$user->last_name,
          // 'size'          => '50',
          // 'style'         => 'width:50%'
          'readonly'
    		);
		    echo form_input($data);
        echo form_hidden('encuestadores', $user->id);
       ?>
    </td>
    <td class="encuesta_cen">
      <?php
		$data = array(
		  'name'  	  => 'encuestados',
		  'id'    	  => 'respuesta3',
		  'type'  	  => 'number',
      'autofocus' => 'autofocus'
		);
		echo form_input($data);
      // if ('' !== $encuestados) {
        // echo '<select name="encuestados">';
        // echo '<option value="0">Seleccione un encuestado</option>';
          // foreach ($encuestados->result() as $row) {
            // echo '<option value="'.$row->codigo_ns.'">'.$row->codigo_ns.'</option>';
          // }
        // echo '</select>';
      // }
      ?>
    </td>
  </tr>
  <!-- FOOTER -->
  <tr><td class="encuesta" colspan="2"><hr class="encuesta_solid"></td></tr>
  <tr><td class="encuesta_der" colspan="2">
    <?php
      $data = array(
              'name'          => 'btn_registro',
              'id'            => 'registro',
              'value'         => 'next',
              'type'          => 'submit',
              'content'       => 'Continuar',
              'class'         => 'encuesta'
      );
      echo form_button($data);
    ?>
  </td></tr>
</table>
<?php echo form_close(); ?>
