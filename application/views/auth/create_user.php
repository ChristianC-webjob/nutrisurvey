
  <br/>
  <div class="container gc-container" style="width: 100%;">
    <div class="success-message hidden"></div>
    <div class="row">
      <div class="col-md-12 table-section">
        <div class="form-container table-container" style="width: 100%;">
          <div class="table-label">
              <div class="floatL l5"><?php echo lang('create_user_heading');?></div>
              <div class="clear"></div>
          </div>
          <div id="infoMessage"><?php echo $message;?></div>
          <?php echo form_open("auth/create_user");?>
          <table class="encuesta" style="width: 100%;">
						<tr>
							<td class="encuesta_der" width="20%">
                <?php echo lang('create_user_fname_label', 'first_name');?>
              </td>
              <td class="encuesta_izq">
                <?php echo form_input($first_name);?>
              </td>
            </tr>
            <tr>
              <td class="encuesta_der">
                <?php echo lang('create_user_lname_label', 'last_name');?>
              </td>
              <td class="encuesta_izq">
                <?php echo form_input($last_name);?>
              </td>
            </tr>

            <?php
            if($identity_column!=='email') {
                echo '<p>';
                echo lang('create_user_identity_label', 'identity');
                echo '<br />';
                echo form_error('identity');
                echo form_input($identity);
                echo '</p>';
            }
            ?>
            <tr>
              <td class="encuesta_der">
                <?php echo lang('create_user_company_label', 'company');?>
              </td>
              <td class="encuesta_izq">
                <?php echo form_input($company);?>
              </td>
            </tr>
            <tr>
              <td class="encuesta_der">
                <?php echo lang('create_user_email_label', 'email');?>
              </td>
              <td class="encuesta_izq">
                <?php echo form_input($email);?>
              </td>
            </tr>
            <tr>
              <td class="encuesta_der">
                <?php echo lang('create_user_phone_label', 'phone');?>
              </td>
              <td class="encuesta_izq">
                <?php echo form_input($phone);?>
              </td>
            </tr>
            <tr>
              <td class="encuesta_der">
                <?php echo lang('create_user_password_label', 'password');?>
              </td>
              <td class="encuesta_izq">
                <?php echo form_input($password);?>
              </td>
            </tr>
            <tr>
              <td class="encuesta_der">
                <?php echo lang('create_user_password_confirm_label', 'password_confirm');?>
              </td>
              <td class="encuesta_izq">
                <?php echo form_input($password_confirm);?>
              </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
							<td>
                <?php echo form_submit('submit', lang('create_user_submit_btn'));?>
              </td>
            </tr>
          </table>
          <?php echo form_close();?>
        </div>
      </div>
    </div>
  </div>
