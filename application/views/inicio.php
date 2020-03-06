<?php
	$indicaciones1 = $data['indicaciones1'];
	$indicaciones2 = $data['indicaciones2'];
?>

	<div id="body">
		<br>
		<table class="encuesta">
			<tr>
				<td colspan="2">
					<?php
			      if ('' !== $indicaciones1) {
			        echo $indicaciones1;
			      }
			    ?>
				</td>
			</tr>
			<tr>
				<td>
					<?php
			      if ('' !== $indicaciones2) {
			        echo $indicaciones2;
			      }
			    ?>
				</td>
				<td>
					<?php echo '<img width="400" src="'.base_url().'imagenes/sistema/encuesta2.jpg">' ?>
				</td>
			</tr>
		</table>

	</div>
