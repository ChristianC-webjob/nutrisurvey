<?php
  // if (!($data['pagina']==1)) {
    $this->session->indice_pagina=$this->session->indice_pagina+1;
  // }
  $modulo =  $data['modulo'];
  $alimento =  $data['alimento'];
  $image_atts = array(
    'width'       => 800,
    'height'      => 520,
    'status'      => 'no',
    'menubar'   	=> 'no',
    'toolbar'   	=> 'no',
    'resizable'		=> 'no',
    'scrollbars'  => 'no',
    'window_name' => 'imagencompleta',
    'title'       => 'Click para agrandar imagen...',
    'alt' 			  => 'Click para agrandar imagen...',
    'screeny'     => 100,
    'screenx'     => 20
  );

  if ($this->session->total_paginas == $this->session->indice_pagina){
    echo form_open('aplicacionEncuestas/aplicar_encuesta/termino');
    $label_button = 'Finalizar';
  }else {
    $siguiente = $this->session->paginas_list[$this->session->indice_pagina]['pagina'];
    $script_exec = array('onSubmit' => 'return checkform_preguntas()');
    echo form_open('aplicacionEncuestas/aplicar_encuesta/preguntas/'.$siguiente, $script_exec);
    $label_button = 'Siguiente';
  }
  echo form_hidden('alert_abandona_encuesta', TRUE);
?>
<div id='div_preguntas'>
  <table class="encuesta">
    <tr>
      <td class="encuesta_izq" width="30%"><h3>Módulo: <strong><?php echo $modulo ?><strong></h4></td>
      <td class="encuesta_izq" width="50%"><h3>Alimento: <strong><?php echo $alimento ?><strong></h4></td>
      <td class="encuesta_der" width="20%"><button type="submit" name="btn_siguiente" class="encuesta" autofocus><?php echo $label_button;?></button></td>
    </tr>
    <tr><td colspan="3"><hr class="encuesta_solid"></td></tr>
  </table>
  <table class="encuesta">
    <tr>
      <td class="encuesta_izq" width="10%">Código</td>
      <td class="encuesta_izq" width="70%">Pregunta</td>
      <td class="encuesta_izq" width="20%">Respuesta</td>
    </tr>
    <?php
      if ('' !== $preguntas) {
        $fila = 0;
        foreach ($preguntas->result() as $row) {
          $fila++;
          echo form_hidden('respuesta['.$fila.'][ID]', $row->id_encuesta_pregunta_alimento);
          echo form_hidden('respuesta['.$fila.'][TIPO]', $row->tipo);
          echo '<tr><td colspan="3"><hr class="encuesta_dashed"></td></tr>';
          echo '<tr>';
          echo '<td class="encuesta_izq">'.$row->codigo.'</td>';
          echo '<td class="encuesta_izq">'.$row->pregunta.' '.$alimento.'?</td>';
          echo '<td class="encuesta_izq">';
          if($row->tipo == TIPO_RESPUESTA_SIONO){
            $data = array(
                    'name'          => 'respuesta['.$fila.'][SIONO]',
                    'id'            => 'respuesta[SI]',
                    'value'         => RESPUESTA_SI,
                    'onclick'       => 'habilita(this)'
            );
            echo form_radio($data).form_label('Si','respuestasi').nbs(2);
            $data = array(
                    'name'          => 'respuesta['.$fila.'][SIONO]',
                    'id'            => 'respuesta[NO]',
                    'value'         => RESPUESTA_NO,
                    'checked'       => TRUE,
                    'onclick'      => 'habilita(this)'
            );
            echo form_radio($data).form_label('No','respuestano');
          }elseif($row->tipo  == TIPO_RESPUESTA_CONSUMO){
            echo form_label('Día(s)','respuesta_consumo').br(1);
            echo '<select name="respuesta['.$fila.'][CONSUMO]" id="respuesta_consumo" disabled="true">';
            echo '<option value="-1">Seleccione una opción</option>';
              foreach ($listado['diasalmes']->result() as $item) {
                echo '<option value="'.$item->valor.'">'.$item->label.'</option>';
              }
            echo '</select>';
          }elseif($row->tipo  == TIPO_RESPUESTA_IMAGEN){
            echo '</td></tr><tr><td colspan="3" class="encuesta_cen">';
            echo '<table class="encuesta"><tr>';

            $cant_fotos = 0;
            if (isset($row->valor_foto1)) {$cant_fotos++;}
            if (isset($row->valor_foto2)) {$cant_fotos++;}
            if (isset($row->valor_foto3)) {$cant_fotos++;}
            if ($cant_fotos==1) {$ancho='width="50%"';}
            if ($cant_fotos==2) {$ancho='width="66%"';}
            if ($cant_fotos==3) {$ancho='width="100%"';}

            if (isset($row->valor_foto1)||isset($row->valor_foto2)||isset($row->valor_foto3)) {
              echo '<td class="encuesta_cen" colspan="3">Seleccione la cantidad correspondiente a su consumo</td></tr><tr>';
            }
            $data1 = array(
                    'name'          => 'respuesta['.$fila.'][IMAGEN]',
                    'id'            => 'respuesta_cantidad1',
                    'value'         => $row->valor_foto1,
                    'disabled'      => true
            );
            $data2 = array(
                    'name'          => 'respuesta['.$fila.'][IMAGEN]',
                    'id'            => 'respuesta_cantidad2',
                    'value'         => $row->valor_foto2,
                    'disabled'      => true
            );
            $data3 = array(
                    'name'          => 'respuesta['.$fila.'][IMAGEN]',
                    'id'            => 'respuesta_cantidad3',
                    'value'         => $row->valor_foto3,
                    'disabled'      => true
            );

            if (isset($row->valor_foto1)) {echo '<td class="encuesta_cen">'.anchor_popup(base_url().'imagenes/alimentos/'.$row->url_foto1, '<img '.$ancho.' src="'.base_url().'imagenes/alimentos/'.$row->url_foto1.'">', $image_atts).'</td>';}
            if (isset($row->valor_foto2)) {echo '<td class="encuesta_cen">'.anchor_popup(base_url().'imagenes/alimentos/'.$row->url_foto2, '<img '.$ancho.' src="'.base_url().'imagenes/alimentos/'.$row->url_foto2.'">', $image_atts).'</td>';}
            if (isset($row->valor_foto3)) {echo '<td class="encuesta_cen">'.anchor_popup(base_url().'imagenes/alimentos/'.$row->url_foto3, '<img '.$ancho.' src="'.base_url().'imagenes/alimentos/'.$row->url_foto3.'">', $image_atts).'</td>';}
            echo '</tr><tr>';
            if (isset($row->valor_foto1)) {echo '<td class="encuesta_cen">'.nbs(1).form_radio($data1).'<strong>Cantidad: '.$row->valor_foto1.nbs(1).$row->medida.'</strong></td>';}
            if (isset($row->valor_foto2)) {echo '<td class="encuesta_cen">'.nbs(1).form_radio($data2).'<strong>Cantidad: '.$row->valor_foto2.nbs(1).$row->medida.'</strong></td>';}
            if (isset($row->valor_foto3)) {echo '<td class="encuesta_cen">'.nbs(1).form_radio($data3).'<strong>Cantidad: '.$row->valor_foto3.nbs(1).$row->medida.'</strong></td>';}

            echo '</table></td></tr><tr><td class="encuesta_izq">'.nbs(1).'</td><td class="encuesta_izq">¿Cuántas porciones consumió cada día?</td><td class="encuesta_izq">';
            $data = array(
                    'name'          => 'respuesta['.$fila.'][UNIDAD]',
                    'onkeypress'    => 'return checkFloat(event)',
                    'id'            => 'respuesta_unidad',
                    'size'          => '20',
                    'disabled'      => true
            );
            echo form_label('Unidad(es)','respuesta_unidad').br(1).form_input($data);
            echo '</td></tr>';
          }elseif($row->tipo  == TIPO_RESPUESTA_CUCHARADA){
            echo '</td></tr><tr><td class="encuesta_cen" colspan="3"><table class="encuesta"><tr>';
            echo '<td class="encuesta_cen" colspan="4">Seleccione la cantidad correspondiente a su consumo</td>';
            echo '</tr><tr>';
            echo '<td class="encuesta_cen" colspan="4">'.anchor_popup(base_url().'imagenes/alimentos/10.jpg', '<img width="90%" src="'.base_url().'imagenes/alimentos/10.jpg">', $image_atts).'</td>';
            echo '</tr><tr>';
            $col=0;
            foreach ($listado['cucharas']->result() as $item) {
              $col++;
              if($col==5){
                $col=1;
                echo '</tr><tr>';
              }
              $data1 = array(
                      'name'          => 'respuesta['.$fila.'][CUCHARA]',
                      'id'            => 'respuesta_cuchara',
                      'value'         => $item->valor,
                      'disabled'      => true
              );
              echo '<td class="encuesta_izq">'.nbs(1).form_radio($data1).'<strong>'.$item->label.': '.$item->valor.nbs(1).'ml</strong></td>';
            }
            echo '</tr><tr>';
            echo '<td class="encuesta_cen" colspan="4">'.anchor_popup(base_url().'imagenes/alimentos/9.jpg', '<img width="90%" src="'.base_url().'imagenes/alimentos/9.jpg">', $image_atts).'</td>';
            echo '</tr><tr>';
            $col=0;
            foreach ($listado['tazas']->result() as $item) {
              $col++;
              if($col==5){
                $col=1;
                echo '</tr><tr>';
              }
              $data1 = array(
                      'name'          => 'respuesta['.$fila.'][CUCHARA]',
                      'id'            => 'respuesta_cuchara',
                      'value'         => $item->valor,
                      'disabled'      => true
              );
              echo '<td class="encuesta_cen">'.nbs(1).form_radio($data1).'<strong>'.$item->label.': '.$item->valor.nbs(1).'ml</strong></td>';
            }
            echo '</tr></table></td></tr><tr><td class="encuesta_izq">'.nbs(1).'</td><td class="encuesta_izq">¿Cuántas porciones consumió cada día?</td><td class="encuesta_izq">';
            $data = array(
                    'name'          => 'respuesta['.$fila.'][UNIDAD]',
                    'onkeypress'    => 'return checkFloat(event)',
                    'id'            => 'respuesta_unidad',
                    'size'          => '20',
                    'disabled'      => true
            );
            echo form_label('Unidad(es)','respuesta_unidad').br(1).form_input($data);
            echo '</td></tr><tr>';
          }elseif($row->tipo  == TIPO_RESPUESTA_CUCHARON){
            echo '</td></tr><tr><td class="encuesta_cen" colspan="3"><table class="encuesta"><tr>';
            echo '<td class="encuesta_cen" colspan="4">Seleccione la cantidad correspondiente a su consumo</td>';
            echo '</tr><tr>';
            echo '<td class="encuesta_cen" colspan="4">'.anchor_popup(base_url().'imagenes/alimentos/11.jpg', '<img width="90%" src="'.base_url().'imagenes/alimentos/11.jpg">', $image_atts).'</td>';
            echo '</tr><tr>';
            $col=0;
            foreach ($listado['cucharones']->result() as $item) {
              $col++;
              if($col==5){
                $col=1;
                echo '</tr><tr>';
              }
              $data1 = array(
                      'name'          => 'respuesta['.$fila.'][CUCHARON]',
                      'id'            => 'respuesta_cucharon',
                      'value'         => $item->valor,
                      'disabled'      => true
              );
              echo '<td class="encuesta_izq">'.nbs(1).form_radio($data1).'<strong>'.$item->label.': '.$item->valor.nbs(1).'ml</strong></td>';
            }
            echo '</tr></table></td></tr><tr><td class="encuesta_izq">'.nbs(1).'</td><td class="encuesta_izq">¿Cuántas porciones consumió cada día?</td><td class="encuesta_izq">';
            $data = array(
                    'name'          => 'respuesta['.$fila.'][UNIDAD]',
                    'onkeypress'    => 'return checkFloat(event)',
                    'id'            => 'respuesta_unidad',
                    'size'          => '20',
                    'disabled'      => true
            );
            echo form_label('Unidad(es)','respuesta_unidad').br(1).form_input($data);
            echo '</td></tr><tr>';
          }elseif($row->tipo  == TIPO_RESPUESTA_DOSIFICADOR){
            echo '</td></tr><tr><td class="encuesta_cen" colspan="3"><table class="encuesta"><tr>';
            echo '<td class="encuesta_cen" colspan="7">Seleccione la cantidad correspondiente a su consumo</td>';
            echo '</tr><tr>';
            echo '<td class="encuesta_cen" colspan="7">'.anchor_popup(base_url().'imagenes/alimentos/12.jpg', '<img width="90%" src="'.base_url().'imagenes/alimentos/12.jpg">', $image_atts).'</td>';
            echo '</tr><tr>';
            $col=0;
            foreach ($listado['dosificadores']->result() as $item) {
              $col++;
              if($col==5){
                $col=1;
                echo '</tr><tr>';
              }
              $data1 = array(
                      'name'          => 'respuesta['.$fila.'][DOSIFICADOR]',
                      'id'            => 'respuesta_cucharon',
                      'value'         => $item->valor,
                      'disabled'      => true
              );
              echo '<td class="encuesta_izq">'.nbs(1).form_radio($data1).'<strong>'.$item->label.': '.$item->valor.nbs(1).'ml</strong></td>';
            }
            echo '</tr></table></td></tr><tr><td class="encuesta_izq">'.nbs(1).'</td><td class="encuesta_izq">¿Cuántas porciones consumió cada día?</td><td class="encuesta_izq">';
            $data = array(
                    'name'          => 'respuesta['.$fila.'][UNIDAD]',
                    'onkeypress'    => 'return checkFloat(event)',
                    'id'            => 'respuesta_unidad',
                    'size'          => '20',
                    'disabled'      => true
            );
            echo form_label('Unidad(es)','respuesta_unidad').br(1).form_input($data);
            echo '</td></tr><tr>';
          }elseif($row->tipo  == TIPO_RESPUESTA_TAZA){
            echo '</td></tr><tr><td class="encuesta_cen" colspan="3"><table class="encuesta"><tr>';
            echo '<td class="encuesta_cen" colspan="4">Seleccione la cantidad correspondiente a su consumo</td>';
            echo '</tr><tr>';
            echo '<td class="encuesta_cen" colspan="4">'.anchor_popup(base_url().'imagenes/alimentos/9.jpg', '<img width="90%" src="'.base_url().'imagenes/alimentos/9.jpg">', $image_atts).'</td>';
            echo '</tr><tr>';
            $col=0;
            foreach ($listado['tazas']->result() as $item) {
              $col++;
              if($col==5){
                $col=1;
                echo '</tr><tr>';
              }
              $data1 = array(
                      'name'          => 'respuesta['.$fila.'][TAZA]',
                      'id'            => 'respuesta_taza',
                      'value'         => $item->valor,
                      'disabled'      => true
              );
              echo '<td class="encuesta_izq">'.nbs(1).form_radio($data1).'<strong>'.$item->label.': '.$item->valor.nbs(1).'ml</strong></td>';
            }
            echo '</tr></table></td></tr><tr><td class="encuesta_izq">'.nbs(1).'</td><td class="encuesta_izq">¿Cuántas porciones consumió cada día?</td><td class="encuesta_izq">';
            $data = array(
                    'name'          => 'respuesta['.$fila.'][UNIDAD]',
                    'onkeypress'    => 'return checkFloat(event)',
                    'id'            => 'respuesta_unidad',
                    'size'          => '20',
                    'disabled'      => true
            );
            echo form_label('Unidad(es)','respuesta_unidad').br(1).form_input($data);
            echo '</td></tr><tr>';
          }elseif($row->tipo  == TIPO_RESPUESTA_VASO){
            echo '</td></tr><tr><td class="encuesta_cen" colspan="3"><table class="encuesta"><tr>';
            echo '<td class="encuesta_cen" colspan="6">Seleccione la cantidad correspondiente a su consumo</td>';
            echo '</tr><tr>';
            echo '<td class="encuesta_cen" colspan="6">'.anchor_popup(base_url().'imagenes/alimentos/8.jpg', '<img width="90%" src="'.base_url().'imagenes/alimentos/8.jpg">', $image_atts).'</td>';
            echo '</tr><tr>';
            $col=0;
            foreach ($listado['vasos']->result() as $item) {
              $col++;
              if($col==7){
                $col=1;
                echo '</tr><tr>';
              }
              $data1 = array(
                      'name'          => 'respuesta['.$fila.'][VASO]',
                      'id'            => 'respuesta_vaso',
                      'value'         => $item->valor,
                      'disabled'      => true
              );
              echo '<td class="encuesta_izq">'.nbs(1).form_radio($data1).'<strong>'.$item->label.': '.$item->valor.nbs(1).'ml</strong></td>';
            }
            echo '</tr></table></td></tr><tr><td class="encuesta_izq">'.nbs(1).'</td><td class="encuesta_izq">¿Cuántas porciones consumió cada día?</td><td class="encuesta_izq">';
            $data = array(
                    'name'          => 'respuesta['.$fila.'][UNIDAD]',
                    'onkeypress'    => 'return checkFloat(event)',
                    'id'            => 'respuesta_unidad',
                    'size'          => '20',
                    'disabled'      => true
            );
            echo form_label('Unidad(es)','respuesta_unidad').br(1).form_input($data);
            echo '</td></tr><tr>';
          }elseif($row->tipo  == TIPO_RESPUESTA_VASO_TCO){
            echo '</td></tr><tr><td class="encuesta_cen" colspan="3"><table class="encuesta"><tr>';
            echo '<td class="encuesta_cen" colspan="3">Seleccione la cantidad correspondiente a su consumo</td>';
            echo '</tr><tr>';
            echo '<td class="encuesta_cen" colspan="3">'.anchor_popup(base_url().'imagenes/alimentos/13.jpg', '<img width="90%" src="'.base_url().'imagenes/alimentos/13.jpg">', $image_atts).'</td>';
            echo '</tr><tr>';
            $col=0;
            foreach ($listado['vasos_tcos']->result() as $item) {
              $col++;
              if($col==4){
                $col=1;
                echo '</tr><tr>';
              }
              $data1 = array(
                      'name'          => 'respuesta['.$fila.'][VASO_TCO]',
                      'id'            => 'respuesta_vaso_tco',
                      'value'         => $item->valor,
                      'disabled'      => true
              );
              echo '<td class="encuesta_izq">'.nbs(1).form_radio($data1).'<strong>'.$item->label.': '.$item->valor.nbs(1).'ml</strong></td>';
            }
            // echo '</tr></table></td></tr>';
            echo '</tr></table></td></tr><tr><td class="encuesta_izq">'.nbs(1).'</td><td class="encuesta_izq">¿Cuántas porciones consumió cada día?</td><td class="encuesta_izq">';
            $data = array(
                    'name'          => 'respuesta['.$fila.'][UNIDAD]',
                    'onkeypress'    => 'return checkFloat(event)',
                    'id'            => 'respuesta_unidad',
                    'size'          => '20',
                    'disabled'      => true
            );
            echo form_label('Unidad(es)','respuesta_unidad').br(1).form_input($data);
            echo '</td></tr><tr>';
          }elseif($row->tipo  == TIPO_RESPUESTA_VASO_PCO){
            echo '</td></tr><tr><td class="encuesta_cen" colspan="3"><table class="encuesta"><tr>';
            echo '<td class="encuesta_cen" colspan="3">Seleccione la cantidad correspondiente a su consumo</td>';
            echo '</tr><tr>';
            echo '<td class="encuesta_cen" colspan="3">'.anchor_popup(base_url().'imagenes/alimentos/14.jpg', '<img width="90%" src="'.base_url().'imagenes/alimentos/14.jpg">', $image_atts).'</td>';
            echo '</tr><tr>';
            $col=0;
            foreach ($listado['vasos_pcos']->result() as $item) {
              $col++;
              if($col==4){
                $col=1;
                echo '</tr><tr>';
              }
              $data1 = array(
                      'name'          => 'respuesta['.$fila.'][VASO_PCO]',
                      'id'            => 'respuesta_vaso_pco',
                      'value'         => $item->valor,
                      'disabled'      => true
              );
              echo '<td class="encuesta_izq">'.nbs(1).form_radio($data1).'<strong>'.$item->label.': '.$item->valor.nbs(1).'ml</strong></td>';
            }
            echo '</tr></table></td></tr><tr><td class="encuesta_izq">'.nbs(1).'</td><td class="encuesta_izq">¿Cuántas porciones consumió cada día?</td><td class="encuesta_izq">';
            $data = array(
                    'name'          => 'respuesta['.$fila.'][UNIDAD]',
                    'onkeypress'    => 'return checkFloat(event)',
                    'id'            => 'respuesta_unidad',
                    'size'          => '20',
                    'disabled'      => true
            );
            echo form_label('Unidad(es)','respuesta_unidad').br(1).form_input($data);
            echo '</td></tr><tr>';
          }elseif($row->tipo  == TIPO_RESPUESTA_COPA){
            echo '</td></tr><tr><td class="encuesta_cen" colspan="3"><table class="encuesta"><tr>';
            echo '<td class="encuesta_cen" colspan="6">Seleccione la cantidad correspondiente a su consumo</td>';
            echo '</tr><tr>';
            echo '<td class="encuesta_cen" colspan="6">'.anchor_popup(base_url().'imagenes/alimentos/7.jpg', '<img width="700" src="'.base_url().'imagenes/alimentos/7.jpg">', $image_atts).'</td>';
            echo '</tr><tr>';
            $col=0;
            foreach ($listado['copas']->result() as $item) {
              $col++;
              if($col==7){
                $col=1;
                echo '</tr><tr>';
              }
              $data1 = array(
                      'name'          => 'respuesta['.$fila.'][COPA]',
                      'id'            => 'respuesta_copa',
                      'value'         => $item->valor,
                      // 'disabled'      => true
              );
              echo '<td class="encuesta_izq">'.nbs(1).form_radio($data1).'<strong>'.$item->label.': '.$item->valor.nbs(1).'ml</strong></td>';
            }
            echo '</tr></table></td></tr><tr><td class="encuesta_izq">'.nbs(1).'</td><td class="encuesta_izq">¿Cuántas porciones consumió cada día?</td><td class="encuesta_izq">';
            $data = array(
                    'name'          => 'respuesta['.$fila.'][UNIDAD]',
                    'onkeypress'    => 'return checkFloat(event)',
                    'id'            => 'respuesta_unidad',
                    'size'          => '20',
                    'disabled'      => true
            );
            echo form_label('Unidad(es)','respuesta_unidad').br(1).form_input($data);
            echo '</td></tr><tr>';
          }elseif($row->tipo  == TIPO_RESPUESTA_ISOTONICOS){
            echo '</td></tr><tr><td class="encuesta_cen" colspan="3"><table class="encuesta"><tr>';
            echo '<td class="encuesta_cen" colspan="7">Seleccione la cantidad correspondiente a su consumo</td>';
            echo '</tr><tr>';
            echo '<td class="encuesta_cen" colspan="7">'.anchor_popup(base_url().'imagenes/alimentos/123.jpg', '<img width="90%" src="'.base_url().'imagenes/alimentos/123.jpg">', $image_atts).'</td>';
            echo '</tr><tr>';
            $col=0;
            foreach ($listado['isotonicos']->result() as $item) {
              $col++;
              if($col==5){
                $col=1;
                echo '</tr><tr>';
              }
              $data1 = array(
                      'name'          => 'respuesta['.$fila.'][ISOTONICO]',
                      'id'            => 'respuesta_isotonico',
                      'value'         => $item->valor,
                      'disabled'      => true
              );
              echo '<td class="encuesta_izq">'.nbs(1).form_radio($data1).'<strong>'.$item->label.': '.$item->valor.nbs(1).'ml</strong></td>';
            }
            echo '</tr></table></td></tr><tr><td class="encuesta_izq">'.nbs(1).'</td><td class="encuesta_izq">¿Cuántas porciones consumió cada día?</td><td class="encuesta_izq">';
            $data = array(
                    'name'          => 'respuesta['.$fila.'][UNIDAD]',
                    'onkeypress'    => 'return checkFloat(event)',
                    'id'            => 'respuesta_unidad',
                    'size'          => '20',
                    'disabled'      => true
            );
            echo form_label('Unidad(es)','respuesta_unidad').br(1).form_input($data);
            echo '</td></tr><tr>';
          }elseif($row->tipo  == TIPO_RESPUESTA_BOTELLAS){
            echo '</td></tr><tr><td class="encuesta_cen" colspan="3"><table class="encuesta"><tr>';
            echo '<td class="encuesta_cen" colspan="7">Seleccione la cantidad correspondiente a su consumo</td>';
            echo '</tr><tr>';
            echo '<td class="encuesta_cen" colspan="7">'.anchor_popup(base_url().'imagenes/alimentos/124.jpg', '<img width="90%" src="'.base_url().'imagenes/alimentos/124.jpg">', $image_atts).'</td>';
            echo '</tr><tr>';
            $col=0;
            foreach ($listado['botellas']->result() as $item) {
              $col++;
              if($col==5){
                $col=1;
                echo '</tr><tr>';
              }
              $data1 = array(
                      'name'          => 'respuesta['.$fila.'][BOTELLA]',
                      'id'            => 'respuesta_botella',
                      'value'         => $item->valor,
                      'disabled'      => true
              );
              echo '<td class="encuesta_izq">'.nbs(1).form_radio($data1).'<strong>'.$item->label.': '.$item->valor.nbs(1).'ml</strong></td>';
            }
            echo '</tr></table></td></tr><tr><td class="encuesta_izq">'.nbs(1).'</td><td class="encuesta_izq">¿Cuántas porciones consumió cada día?</td><td class="encuesta_izq">';
            $data = array(
                    'name'          => 'respuesta['.$fila.'][UNIDAD]',
                    'onkeypress'    => 'return checkFloat(event)',
                    'id'            => 'respuesta_unidad',
                    'size'          => '20',
                    'disabled'      => true
            );
            echo form_label('Unidad(es)','respuesta_unidad').br(1).form_input($data);
            echo '</td></tr><tr>';
          }elseif($row->tipo  == TIPO_RESPUESTA_MINERALES){
            echo '</td></tr><tr><td class="encuesta_cen" colspan="3"><table class="encuesta"><tr>';
            echo '<td class="encuesta_cen" colspan="7">Seleccione la cantidad correspondiente a su consumo</td>';
            echo '</tr><tr>';
            echo '<td class="encuesta_cen" colspan="7">'.anchor_popup(base_url().'imagenes/alimentos/15.jpg', '<img width="90%" src="'.base_url().'imagenes/alimentos/15.jpg">', $image_atts).'</td>';
            echo '</tr><tr>';
            $col=0;
            foreach ($listado['minerales']->result() as $item) {
              $col++;
              if($col==5){
                $col=1;
                echo '</tr><tr>';
              }
              $data1 = array(
                      'name'          => 'respuesta['.$fila.'][MINERAL]',
                      'id'            => 'respuesta_mineral',
                      'value'         => $item->valor,
                      'disabled'      => true
              );
              echo '<td class="encuesta_izq">'.nbs(1).form_radio($data1).'<strong>'.$item->label.': '.$item->valor.nbs(1).'ml</strong></td>';
            }
            echo '</tr></table></td></tr><tr><td class="encuesta_izq">'.nbs(1).'</td><td class="encuesta_izq">¿Cuántas porciones consumió cada día?</td><td class="encuesta_izq">';
            $data = array(
                    'name'          => 'respuesta['.$fila.'][UNIDAD]',
                    'onkeypress'    => 'return checkFloat(event)',
                    'id'            => 'respuesta_unidad',
                    'size'          => '20',
                    'disabled'      => true
            );
            echo form_label('Unidad(es)','respuesta_unidad').br(1).form_input($data);
            echo '</td></tr><tr>';
          }elseif($row->tipo  == TIPO_RESPUESTA_LATAS){
            echo '</td></tr><tr><td class="encuesta_cen" colspan="3"><table class="encuesta"><tr>';
            echo '<td class="encuesta_cen" colspan="7">Seleccione la cantidad correspondiente a su consumo</td>';
            echo '</tr><tr>';
            echo '<td class="encuesta_cen" colspan="7">'.anchor_popup(base_url().'imagenes/alimentos/125.jpg', '<img width="90%" src="'.base_url().'imagenes/alimentos/125.jpg">', $image_atts).'</td>';
            echo '</tr><tr>';
            $col=0;
            foreach ($listado['latas']->result() as $item) {
              $col++;
              if($col==5){
                $col=1;
                echo '</tr><tr>';
              }
              $data1 = array(
                      'name'          => 'respuesta['.$fila.'][LATA]',
                      'id'            => 'respuesta_lata',
                      'value'         => $item->valor,
                      'disabled'      => true
              );
              echo '<td class="encuesta_izq">'.nbs(1).form_radio($data1).'<strong>'.$item->label.': '.$item->valor.nbs(1).'ml</strong></td>';
            }
            echo '</tr></table></td></tr><tr><td class="encuesta_izq">'.nbs(1).'</td><td class="encuesta_izq">¿Cuántas porciones consumió cada día?</td><td class="encuesta_izq">';
            $data = array(
                    'name'          => 'respuesta['.$fila.'][UNIDAD]',
                    'onkeypress'    => 'return checkFloat(event)',
                    'id'            => 'respuesta_unidad',
                    'size'          => '20',
                    'disabled'      => true
            );
            echo form_label('Unidad(es)','respuesta_unidad').br(1).form_input($data);
            echo '</td></tr><tr>';
          }elseif($row->tipo  == TIPO_RESPUESTA_JUGOS){
            echo '</td></tr><tr><td class="encuesta_cen" colspan="3"><table class="encuesta"><tr>';
            echo '<td class="encuesta_cen" colspan="7">Seleccione la cantidad correspondiente a su consumo</td>';
            echo '</tr><tr>';
            echo '<td class="encuesta_cen" colspan="7">'.anchor_popup(base_url().'imagenes/alimentos/126.jpg', '<img width="90%" src="'.base_url().'imagenes/alimentos/126.jpg">', $image_atts).'</td>';
            echo '</tr><tr>';
            $col=0;
            foreach ($listado['jugos']->result() as $item) {
              $col++;
              if($col==5){
                $col=1;
                echo '</tr><tr>';
              }
              $data1 = array(
                      'name'          => 'respuesta['.$fila.'][JUGO]',
                      'id'            => 'respuesta_jugo',
                      'value'         => $item->valor,
                      'disabled'      => true
              );
              echo '<td class="encuesta_izq">'.nbs(1).form_radio($data1).'<strong>'.$item->label.': '.$item->valor.nbs(1).'ml</strong></td>';
            }
            echo '</tr></table></td></tr><tr><td class="encuesta_izq">'.nbs(1).'</td><td class="encuesta_izq">¿Cuántas porciones consumió cada día?</td><td class="encuesta_izq">';
            $data = array(
                    'name'          => 'respuesta['.$fila.'][UNIDAD]',
                    'onkeypress'    => 'return checkFloat(event)',
                    'id'            => 'respuesta_unidad',
                    'size'          => '20',
                    'disabled'      => true
            );
            echo form_label('Unidad(es)','respuesta_unidad').br(1).form_input($data);
            echo '</td></tr><tr>';
          }elseif($row->tipo  == TIPO_RESPUESTA_YOGURT){
            echo '</td></tr><tr><td class="encuesta_cen" colspan="3"><table class="encuesta"><tr>';
            echo '<td class="encuesta_cen" colspan="5">Seleccione la cantidad correspondiente a su consumo</td>';
            echo '</tr><tr>';
            echo '<td class="encuesta_cen" colspan="5">'.anchor_popup(base_url().'imagenes/alimentos/74.jpg', '<img width="90%" src="'.base_url().'imagenes/alimentos/74.jpg">', $image_atts).'</td>';
            echo '</tr><tr>';
            foreach ($listado['yogurt']->result() as $item) {
              $data1 = array(
                      'name'          => 'respuesta['.$fila.'][YOGURT]',
                      'id'            => 'respuesta_yogurt',
                      'value'         => $item->valor,
                      'disabled'      => true
              );
              echo '<td class="encuesta_izq">'.nbs(1).form_radio($data1).'<strong>'.$item->label.': '.$item->valor.nbs(1).'ml</strong></td>';
            }
            echo '</tr></table></td></tr><tr><td class="encuesta_izq">'.nbs(1).'</td><td class="encuesta_izq">¿Cuántas porciones consumió cada día?</td><td class="encuesta_izq">';
            $data = array(
                    'name'          => 'respuesta['.$fila.'][UNIDAD]',
                    'onkeypress'    => 'return checkFloat(event)',
                    'id'            => 'respuesta_unidad',
                    'size'          => '20',
                    'disabled'      => true
            );
            echo form_label('Unidad(es)','respuesta_unidad').br(1).form_input($data);
            echo '</td></tr><tr>';
          }elseif($row->tipo  == TIPO_RESPUESTA_SHOTS){
            echo '</td></tr><tr><td class="encuesta_cen" colspan="3"><table class="encuesta"><tr>';
            echo '<td class="encuesta_cen" colspan="4">Seleccione la cantidad correspondiente a su consumo</td>';
            echo '</tr><tr>';
            echo '<td class="encuesta_cen" colspan="4">'.anchor_popup(base_url().'imagenes/alimentos/75.jpg', '<img width="90%" src="'.base_url().'imagenes/alimentos/75.jpg">', $image_atts).'</td>';
            echo '</tr><tr>';
            foreach ($listado['shots']->result() as $item) {
              $data1 = array(
                      'name'          => 'respuesta['.$fila.'][SHOT]',
                      'id'            => 'respuesta_shot',
                      'value'         => $item->valor,
                      'disabled'      => true
              );
              echo '<td class="encuesta_izq">'.nbs(1).form_radio($data1).'<strong>'.$item->label.': '.$item->valor.nbs(1).'ml</strong></td>';
            }
            echo '</tr></table></td></tr><tr><td class="encuesta_izq">'.nbs(1).'</td><td class="encuesta_izq">¿Cuántas porciones consumió cada día?</td><td class="encuesta_izq">';
            $data = array(
                    'name'          => 'respuesta['.$fila.'][UNIDAD]',
                    'onkeypress'    => 'return checkFloat(event)',
                    'id'            => 'respuesta_unidad',
                    'size'          => '20',
                    'disabled'      => true
            );
            echo form_label('Unidad(es)','respuesta_unidad').br(1).form_input($data);
            echo '</td></tr><tr>';
          }elseif($row->tipo  == TIPO_RESPUESTA_FRUTA){
            echo form_label('Tipo de fruta','respuesta_fruta').br(1);
            echo '<select name="respuesta['.$fila.'][FRUTA]" id="respuesta_fruta" onchange="habilita(this)">';
            echo '<option value="-1">No consume</option>';
              foreach ($listado['fruta']->result() as $item) {
                echo '<option value="'.$item->valor.'">'.$item->label.'</option>';
              }
            echo '</select>';
          }elseif($row->tipo  == TIPO_RESPUESTA_TAMANO){
            echo form_label('Tamaño','respuesta_tamano').br(1);
            echo '<select name="respuesta['.$fila.'][TAMANO]" id="respuesta_tamano">';
            echo '<option value="-1">Seleccione una opción</option>';
              foreach ($listado['tamano']->result() as $item) {
                echo '<option value="'.$item->valor.'">'.$item->label.'</option>';
              }
            echo '</select>';
          }elseif($row->tipo  == TIPO_RESPUESTA_MATERIAGRASA){
            echo form_label('Materia grasa','respuesta_materiagrasa').br(1);
            echo '<select name="respuesta['.$fila.'][MATERIAGRASA]" id="respuesta_materiagrasa">';
            echo '<option value="-1">Seleccione una opción</option>';
              foreach ($listado['materiagrasa']->result() as $item) {
                echo '<option value="'.$item->valor.'">'.$item->label.'</option>';
              }
            echo '</select>';
          }elseif($row->tipo  == TIPO_RESPUESTA_TIPOLECHE){
            echo form_label('Tipo de leche','respuesta_tipoleche').br(1);
            echo '<select name="respuesta['.$fila.'][TIPOLECHE]" id="respuesta_tipoleche">';
            echo '<option value="-1">Seleccione una opción</option>';
              foreach ($listado['tipoleche']->result() as $item) {
                echo '<option value="'.$item->valor.'">'.$item->label.'</option>';
              }
            echo '</select>';
          }elseif($row->tipo  == TIPO_RESPUESTA_LACTOSA){
            echo form_label('Lactosa','respuesta_lactosa').br(1);
            echo '<select name="respuesta['.$fila.'][LACTOSA]" id="respuesta_lactosa">';
            echo '<option value="-1">Seleccione una opción</option>';
              foreach ($listado['lactosa']->result() as $item) {
                echo '<option value="'.$item->valor.'">'.$item->label.'</option>';
              }
            echo '</select>';
          }elseif($row->tipo  == TIPO_RESPUESTA_TIPOYOGURT){
            echo form_label('Tipo de yogurt','respuesta_tipoyogurt').br(1);
            echo '<select name="respuesta['.$fila.'][TIPOYOGURT]" id="respuesta_tipoyogurt">';
            echo '<option value="-1">Seleccione una opción</option>';
              foreach ($listado['tipoyogurt']->result() as $item) {
                echo '<option value="'.$item->valor.'">'.$item->label.'</option>';
              }
            echo '</select>';
          }elseif($row->tipo  == TIPO_RESPUESTA_TIPOSEMILLAS){
            echo form_label('Tipo de semillas','respuesta_tiposemillas').br(1);
            echo '<select name="respuesta['.$fila.'][TIPOSEMILLAS]" id="respuesta_tiposemillas">';
            echo '<option value="-1">Seleccione una opción</option>';
              foreach ($listado['tiposemillas']->result() as $item) {
                echo '<option value="'.$item->valor.'">'.$item->label.'</option>';
              }
            echo '</select>';
          }elseif($row->tipo  == TIPO_RESPUESTA_TIPOGALLETAS){
            echo form_label('Tipo de galletas','respuesta_tipogalletas').br(1);
            echo '<select name="respuesta['.$fila.'][TIPOGALLETAS]" id="respuesta_tipogalletas">';
            echo '<option value="-1">Seleccione una opción</option>';
              foreach ($listado['tipogalletas']->result() as $item) {
                echo '<option value="'.$item->valor.'">'.$item->label.'</option>';
              }
            echo '</select>';
          }elseif($row->tipo  == TIPO_RESPUESTA_CERELACNESTUM){
            echo form_label('Tipo de cereales','respuesta_cerelacnestum').br(1);
            echo '<select name="respuesta['.$fila.'][CERELACNESTUM]" id="respuesta_cerelacnestum">';
            echo '<option value="-1">Seleccione una opción</option>';
              foreach ($listado['cerelacnestum']->result() as $item) {
                echo '<option value="'.$item->valor.'">'.$item->label.'</option>';
              }
            echo '</select>';
          }elseif($row->tipo  == TIPO_RESPUESTA_LACTEOS){
            echo form_label('Otros lácteos','respuesta_lacteos').br(1);
            echo '<select name="respuesta['.$fila.'][LACTEOS]" id="respuesta_lacteos">';
            echo '<option value="-1">Seleccione una opción</option>';
              foreach ($listado['lacteos']->result() as $item) {
                echo '<option value="'.$item->valor.'">'.$item->label.'</option>';
              }
            echo '</select>';
          }elseif($row->tipo  == TIPO_RESPUESTA_INTERIORES){
            echo form_label('Tipo de interiores','respuesta_interiores').br(1);
            echo '<select name="respuesta['.$fila.'][INTERIORES]" id="respuesta_interiores">';
            echo '<option value="-1">Seleccione una opción</option>';
              foreach ($listado['interiores']->result() as $item) {
                echo '<option value="'.$item->valor.'">'.$item->label.'</option>';
              }
            echo '</select>';
          }elseif($row->tipo  == TIPO_RESPUESTA_CARNEOS){
            echo form_label('Otros cárneos','respuesta_carneos').br(1);
            echo '<select name="respuesta['.$fila.'][CARNEOS]" id="respuesta_carneos">';
            echo '<option value="-1">Seleccione una opción</option>';
              foreach ($listado['carneos']->result() as $item) {
                echo '<option value="'.$item->valor.'">'.$item->label.'</option>';
              }
            echo '</select>';
          }elseif($row->tipo  == TIPO_RESPUESTA_MARCAPROD){
            $data = array(
                    'name'          => 'respuesta['.$fila.'][MARCAPROD]',
                    'id'            => 'respuesta_marcaprod',
                    'size'          => '20',
                    'disabled'      => true
            );
            echo form_label('Marca del producto','respuesta_marcaprod').br(1).form_input($data);
          }elseif($row->tipo  == TIPO_RESPUESTA_NOMBREPROD){
            $data = array(
                    'name'          => 'respuesta['.$fila.'][NOMBREPROD]',
                    'id'            => 'respuesta_nombreprod',
                    'size'          => '20',
                    'disabled'      => true
            );
            echo form_label('Nombre del producto','respuesta_nombreprod').br(1).form_input($data);
          }elseif($row->tipo  == TIPO_RESPUESTA_TIEMPOCONSUMO){
            $data = array(
                    'name'          => 'respuesta['.$fila.'][TIEMPOCONSUMO]',
                    'id'            => 'respuesta_tiempoconsumo',
                    'size'          => '20',
                    'disabled'      => true
            );
            echo form_label('Tiempo de consumo','respuesta_tiempoconsumo').br(1).form_input($data);
          }elseif($row->tipo  == TIPO_RESPUESTA_MOTIVOCONSUMO){
            $data = array(
                    'name'          => 'respuesta['.$fila.'][MOTIVOCONSUMO]',
                    'id'            => 'respuesta_motivoconsumo',
                    'size'          => '20',
                    'disabled'      => true
            );
            echo form_label('Motivo de consumo','respuesta_motivoconsumo').br(1).form_input($data);
          }elseif($row->tipo  == TIPO_RESPUESTA_ESPECIFICAR){
            $data = array(
                    'name'          => 'respuesta['.$fila.'][ESPECIFICAR]',
                    'id'            => 'respuesta_especificar',
                    'size'          => '20',
                    'disabled'      => true
            );
            echo form_label('Especificar','respuesta_especificar').br(1).form_input($data);
          }
          echo '</td></tr>';
        }
      }
    ?>
    <!-- FOOTER -->
    <tr><td colspan="3"><hr class="encuesta_solid"></td></tr>
    <tr><td class="encuesta_der" colspan="3">
      <button type="submit" name="btn_siguiente" class="encuesta" autofocus><?php echo $label_button;?></button>
    </td></tr>
  </table>
</div>
