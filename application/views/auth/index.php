
  <br/>
  <div class="container gc-container" style="width: 100%;">
    <div class="success-message hidden"></div>
    <div class="row">
      <div class="col-md-12 table-section">
        <div class="table-label">
            <div style="align-content: center;">
							<?php echo lang('index_heading');?>
						</div>
        </div>
        <br/>
        <div class="table-container" style="width: 100%;">
					<div>
        		<div>
	            <a class="btn btn-default" href="<?php echo site_url('/auth/create_user');?>"><i class="fa fa-plus"></i> &nbsp; <?php echo lang('index_create_user_link'); ?></a>
							<a class="btn btn-default" href="<?php echo site_url('/auth/create_group');?>"><i class="fa fa-plus"></i> &nbsp; <?php echo lang('index_create_group_link'); ?></a>
            </div>
						<div class="clear"></div>
          </div>
					<div id="infoMessage"><?php echo $message;?></div>
					</br>
					<table class="table table-bordered grocery-crud-table table-hover encuesta">
						<tr>
							<th class="column-with-ordering"><?php echo lang('index_action_th');?></th>
							<th class="column-with-ordering"><?php echo lang('index_fname_th');?></th>
							<th class="column-with-ordering"><?php echo lang('index_lname_th');?></th>
							<th class="column-with-ordering"><?php echo lang('index_email_th');?></th>
							<th class="column-with-ordering"><?php echo lang('index_groups_th');?></th>
							<th class="column-with-ordering"><?php echo lang('index_status_th');?></th>
						</tr>
						<?php foreach ($users as $user):?>
							<tr>
								<td class="encuesta"><a class="btn btn-default " href="<?php echo site_url();?>/auth/edit_user/<?php echo $user->id;?>"><i class="fa fa-pencil"></i> Editar</a></td>
		            <td class="encuesta"><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
		            <td class="encuesta"><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
		            <td class="encuesta"><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
								<td class="encuesta">
									<?php foreach ($user->groups as $group):?>
										<?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')); ?> <br />
                    <!--  -->
					        <?php endforeach; ?>
								</td>
								<td class="encuesta"><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
							</tr>
						<?php endforeach; ?>
					</table>
    	  </div>
      </div>
    </div>
  </div>
