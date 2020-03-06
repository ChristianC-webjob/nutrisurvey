<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/login");?>
<table class="login">
  <tr><td class="encuesta_cen" colspan="2">
    <h1><?php echo lang('login_heading');?></h1>
    <p><?php echo lang('login_subheading');?></p>
  </td></tr>

  <tr>
    <td class="encuesta_der"><?php echo lang('login_identity_label', 'identity');?></td>
    <td class="encuesta_izq"><?php echo form_input($identity);?></td>
  </tr>

  <tr>
    <td class="encuesta_der"><?php echo lang('login_password_label', 'password');?></td>
    <td class="encuesta_izq"><?php echo form_input($password);?></td>
  </tr>

  <tr><td class="encuesta_cen" colspan="2">
      <?php echo lang('login_remember_label', 'remember');?>
      <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
  </td></tr>

  <tr><td class="encuesta_cen" colspan="2">
    <?php
      $data = array(
              'name'    => 'btn_login',
              'id'      => 'login',
              'value'   => 'login',
              'type'    => 'submit',
              'content' => lang('login_submit_btn'),
              'class'   => 'login'
      );
      echo form_button($data);
    ?>
  </td></tr>
</table>
<?php echo form_close();?>

<p align="center"><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
