
  <br/>
  <div class="container gc-container" style="width: 100%;">
    <div class="success-message hidden"></div>
    <div class="row">
      <div class="col-md-12 table-section">
        <div class="table-label">
            <div style="align-content: center;">Tamaños de porción para: <?php echo nbs(1).$header['alimento'].' ('.$header['modulo'].')' ?></div>
        </div>
        <br/>
        <div class="table-container" style="width: 100%;">
      		<?php
      		echo '<table  class="encuesta">'; //align="center"
      		if ('' !== $resultado) {
      			$cant = $resultado->num_rows();
      			foreach ($resultado->result() as $row)
      			{
      				echo '<tr>';
      				if (isset($row->valor_foto1)) {echo '<td class="encuesta_cen">Cantidad equivalente: <strong>'.$row->valor_foto1.' '.$row->label.'</strong></td>';}
      				if (isset($row->valor_foto2)) {echo '<td class="encuesta_cen">Cantidad equivalente: <strong>'.$row->valor_foto2.' '.$row->label.'</strong></td>';}
      				if (isset($row->valor_foto3)) {echo '<td class="encuesta_cen">Cantidad equivalente: <strong>'.$row->valor_foto3.' '.$row->label.'</strong></td>';}
      				echo '</tr><tr>';
      				if (isset($row->valor_foto1)) {echo '<td class="encuesta_cen">'.anchor_popup(base_url().'imagenes/alimentos/'.$row->url_foto1, '<img width="300" src="'.base_url().'imagenes/alimentos/'.$row->url_foto1.'">', $header['set_atts']).'</td>';}
      				if (isset($row->valor_foto2)) {echo '<td class="encuesta_cen">'.anchor_popup(base_url().'imagenes/alimentos/'.$row->url_foto2, '<img width="300" src="'.base_url().'imagenes/alimentos/'.$row->url_foto2.'">', $header['set_atts']).'</td>';}
      				if (isset($row->valor_foto3)) {echo '<td class="encuesta_cen">'.anchor_popup(base_url().'imagenes/alimentos/'.$row->url_foto3, '<img width="300" src="'.base_url().'imagenes/alimentos/'.$row->url_foto3.'">', $header['set_atts']).'</td>';}
      				echo '</tr>';
      			}
      		}
      		echo '</table>';
      		?>
    	  </div>
      </div>
    </div>
  </div>
