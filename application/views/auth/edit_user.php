
  <br/>
  <div class="container gc-container" style="width: 100%;">
    <div class="success-message hidden"></div>
    <div class="row">
      <div class="col-md-12 table-section">
        <div class="form-container table-container" style="width: 100%;">
          <div class="table-label">
              <div class="floatL l5"><?php echo lang('edit_user_heading');?></div>
              <div class="clear"></div>
          </div>
          <div id="infoMessage"><?php echo $message;?></div>
          <?php echo form_open(uri_string());?>
          <table class="encuesta" style="width: 100%;">
						<tr>
							<td class="encuesta_der" width="20%">
                <?php echo lang('edit_user_fname_label', 'first_name');?>
              </td>
              <td class="encuesta_izq">
                <?php echo form_input($first_name);?>
              </td>
            </tr>
            <tr>
              <td class="encuesta_der">
                <?php echo lang('edit_user_lname_label', 'last_name');?>
              </td>
              <td class="encuesta_izq">
                <?php echo form_input($last_name);?>
              </td>
            </tr>
            <tr>
              <td class="encuesta_der">
                <?php echo lang('edit_user_company_label', 'company');?>
              </td>
              <td class="encuesta_izq">
                <?php echo form_input($company);?>
              </td>
            </tr>
            <tr>
              <td class="encuesta_der">
                <?php echo lang('edit_user_phone_label', 'phone');?>
              </td>
              <td class="encuesta_izq">
                <?php echo form_input($phone);?>
              </td>
            </tr>
            <tr>
              <td class="encuesta_der">
                <?php echo lang('edit_user_password_label', 'password');?>
              </td>
              <td class="encuesta_izq">
                <?php echo form_input($password);?>
              </td>
            </tr>
            <tr>
              <td class="encuesta_der">
                <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?>
              </td>
              <td class="encuesta_izq">
                <?php echo form_input($password_confirm);?>
              </td>
            </tr>
            <?php if ($this->ion_auth->is_admin()): ?>
            <tr>
              <td>&nbsp;</td>
              <td class="encuesta_izq">
                <h2><?php echo lang('edit_user_groups_heading');?></h2>
                <?php foreach ($groups as $group):?>
                  <label class="checkbox">
                  <?php
                      $gID=$group['id'];
                      $checked = null;
                      $item = null;
                      foreach($currentGroups as $grp) {
                          if ($gID == $grp->id) {
                              $checked= ' checked="checked"';
                          break;
                          }
                      }
                  ?>
                  <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
                  <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
                  </label>
                <?php endforeach?>
              </td>
            </tr>
            <?php endif ?>
            <tr>
              <td>&nbsp;</td>
							<td>
                <?php echo form_submit('submit', lang('edit_user_submit_btn'));?>
              </td>
            </tr>
          </table>
          <?php echo form_hidden('id', $user->id);?>
          <?php echo form_hidden($csrf); ?>
          <?php echo form_close();?>
        </div>
      </div>
    </div>
  </div>
