
  <br/>
  <div class="container gc-container" style="width: 100%;">
    <div class="success-message hidden"></div>
    <div class="row">
      <div class="col-md-12 table-section">
        <div class="form-container table-container" style="width: 100%;">
          <div class="table-label">
              <div class="floatL l5"><?php echo lang('deactivate_heading');?>: <?php echo sprintf(lang('deactivate_subheading'), $user->username);?></div>
              <div class="clear"></div>
          </div>
          
          <?php echo form_open("auth/deactivate/".$user->id);?>

          <table class="encuesta" style="width: 100%;">
            <tr>
              <td class="encuesta_der">
                <?php echo lang('deactivate_confirm_y_label', 'confirm');?>
                <input type="radio" name="confirm" value="yes" checked="checked" />
              </td>
              <td class="encuesta_izq">
                <?php echo lang('deactivate_confirm_n_label', 'confirm');?>
                <input type="radio" name="confirm" value="no" />
              </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
							<td>
                <?php echo form_submit('submit', lang('deactivate_submit_btn'));?>
              </td>
            </tr>
          </table>
          <?php echo form_hidden($csrf); ?>
          <?php echo form_hidden(['id' => $user->id]); ?>
          <?php echo form_close();?>
        </div>
      </div>
    </div>
  </div>
