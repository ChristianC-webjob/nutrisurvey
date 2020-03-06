
  <br/>
  <div class="container gc-container" style="width: 100%;">
    <div class="success-message hidden"></div>
    <div class="row">
      <div class="col-md-12 table-section">
        <div class="form-container table-container" style="width: 100%;">
          <div class="table-label">
              <div class="floatL l5"><?php echo lang('reset_password_heading');?></div>
              <div class="clear"></div>
          </div>
          <div id="infoMessage"><?php echo $message;?></div>
          <?php echo form_open('auth/reset_password/' . $code);?>

          <table class="encuesta" style="width: 100%;">
						<tr>
              <td class="encuesta_der">
                <label for="new_password"><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length);?></label>
              </td>
              <td class="encuesta_izq">
                <?php echo form_input($new_password);?>
              </td>
            </tr>
						<tr>
              <td class="encuesta_der">
                <?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm');?>
              </td>
              <td class="encuesta_izq">
                <?php echo form_input($new_password_confirm);?>
              </td>
            </tr>
            <tr>
							<td class="encuesta_izq">
                <?php echo form_submit('submit', lang('reset_password_submit_btn'));?>
              </td>
            </tr>
          </table>
					<?php echo form_input($user_id);?>
					<?php echo form_hidden($csrf); ?>
					<?php echo form_close();?>
        </div>
      </div>
    </div>
  </div>
