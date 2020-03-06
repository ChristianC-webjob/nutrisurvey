<?php $termino = $data['termino']; ?>
<table class="encuesta">
  <tr><td class="encuesta">
  <?php
    if ('' !== $termino) {
      echo $termino;
    }
  ?>
  </td></tr>
  <tr><td><hr class="encuesta_solid"></td></tr>
  <tr><td class="encuesta_der">
  <?php
    echo form_open('inicio');
    $data = array(
            'name'          => 'btn_finalizar',
            'id'            => 'finalizar',
            'value'         => 'end',
            'type'          => 'submit',
            'content'       => 'Inicio',
            'class'         => 'encuesta'
    );
    echo form_button($data);
    echo form_close();
  ?>
</td></tr>
</table>
