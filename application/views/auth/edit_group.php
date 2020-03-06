
  <br/>
  <div class="container gc-container" style="width: 100%;">
    <div class="success-message hidden"></div>
    <div class="row">
      <div class="col-md-12 table-section">
        <div class="form-container table-container" style="width: 100%;">
          <div class="table-label">
              <div class="floatL l5"><?php echo lang('edit_group_heading');?></div>
              <div class="clear"></div>
          </div>
          <div id="infoMessage"><?php echo $message;?></div>
          <?php echo form_open("auth/edit_group");?>

          <table class="encuesta" style="width: 100%;">
            <tr>
              <td class="encuesta_der">
                <?php echo lang('edit_group_name_label', 'group_name');?> <br />
              </td>
              <td class="encuesta_izq">
                <?php echo form_input($group_name);?>
              </td>
            </tr>
            <tr>
              <td class="encuesta_der">
                <?php echo lang('edit_group_desc_label', 'description');?> <br />
              </td>
              <td class="encuesta_izq">
                <?php echo form_input($group_description);?>
              </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
							<td class="encuesta_izq">
                <?php echo form_submit('submit', lang('edit_group_submit_btn'));?>
              </td>
            </tr>
          </table>
          <?php echo form_close();?>
        </div>
      </div>
    </div>
  </div>
