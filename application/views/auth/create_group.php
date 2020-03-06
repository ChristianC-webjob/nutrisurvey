
  <br/>
  <div class="container gc-container" style="width: 100%;">
    <div class="success-message hidden"></div>
    <div class="row">
      <div class="col-md-12 table-section">
        <div class="form-container table-container" style="width: 100%;">
          <div class="table-label">
              <div class="floatL l5"><?php echo lang('create_group_heading');?></div>
              <div class="clear"></div>
          </div>
          <div id="infoMessage"><?php echo $message;?></div>
          <?php echo form_open("auth/create_group");?>

          <table class="encuesta" style="width: 100%;">
            <tr>
              <td class="encuesta_der">
                <?php echo lang('create_group_name_label', 'group_name');?> <br />
              </td>
              <td class="encuesta_izq">
                <?php echo form_input($group_name);?>
              </td>
            </tr>
            <tr>
              <td class="encuesta_der">
                  <?php echo lang('create_group_desc_label', 'description');?>
              </td>
              <td class="encuesta_izq">
                <?php echo form_input($description);?>
              </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
							<td>
                <?php echo form_submit('submit', lang('create_group_submit_btn'));?>
              </td>
            </tr>
          </table>
          <?php echo form_close();?>
        </div>
      </div>
    </div>
  </div>
