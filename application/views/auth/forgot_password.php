
  <br/>
  <div class="container gc-container" style="width: 100%;">
    <div class="success-message hidden"></div>
    <div class="row">
      <div class="col-md-12 table-section">
        <div class="form-container table-container" style="width: 100%;">
          <div class="table-label">
              <div class="floatL l5"><?php echo lang('forgot_password_heading');?></div>
              <div class="clear"></div>
          </div>
          <div id="infoMessage"><?php echo $message;?></div>
          <?php echo form_open("auth/forgot_password");?>

          <table class="encuesta" style="width: 100%;">
            <tr>
              <td class="encuesta_izq">
                <label for="identity"><?php echo (($type=='email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label));?></label>
              </td>
            </tr>
            <tr>
              <td class="encuesta_izq">
                <?php echo form_input($identity);?>
              </td>
            </tr>
            <tr>
							<td class="encuesta_izq">
                <?php echo form_submit('submit', lang('forgot_password_submit_btn'));?>
              </td>
            </tr>
          </table>
          <?php echo form_close();?>
        </div>
      </div>
    </div>
  </div>
