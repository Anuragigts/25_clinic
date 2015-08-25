<script type="text/javascript" charset="utf-8">
$(window).load(function() {
    $('#patient_table').dataTable();
	
	$('.confirmDelete').click(function(){
		return confirm("<?=$this->lang->line('areyousure_delete');?>");
	});	
} )
</script>
<div id="page-inner">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<?php echo $this->lang->line('add_new_user');?>
				</div>
				<?php $level = $this->input->post('level'); ?>
				<div class="panel-body">
					<?php if($message != ""){ ?>
					<div class="alert alert-success"><?php echo $message;?></div>
					<?php } ?>
					<?php echo form_open('admin/users') ?>
						<div class="form-group">
							<label for="level"><?=$this->lang->line('category');?></label>
							<select name="level" class="form-control">  <option></option>
									<?php  foreach ($categories as $category) { ?>
									<option value="<?php echo $category['category_name'];?>" ><?= $category['category_name']; ?> </option>
									<?php } ?>
							</select>
							<?php echo form_error('level','<div class="alert alert-danger">','</div>'); ?>
						</div>
						<div class="form-group">						
							<label for="name"><?php echo $this->lang->line('name');?></label> 
							<input type="text" name="name" id="name" class="form-control"/>
							<?php echo form_error('name','<div class="alert alert-danger">','</div>'); ?>
						</div>
						<div class="form-group">					
							<label for="username"><?php echo $this->lang->line('username');?></label> 
							<input type="text" name="username" id="username"  class="form-control"/>
							<?php echo form_error('username','<div class="alert alert-danger">','</div>'); ?>
						</div>
						<div class="form-group">						
							<label for="password"><?php echo $this->lang->line('password');?></label> 
							<input type="password" name="password" id="password" value="" class="form-control"/>
							<?php echo form_error('password','<div class="alert alert-danger">','</div>'); ?>
						</div>
						<div class="form-group">						
							<label for="passconf"><?php echo $this->lang->line('confirm_password');?></label> 
							<input type="password" name="passconf" id="passconf" value="" class="form-control"/>
							<?php echo form_error('passconf','<div class="alert alert-danger">','</div>'); ?>
						</div>
						<div class="form-group">
							<button type="submit" name="submit" class="btn btn-primary" /><?php echo $this->lang->line('add_user');?></button>
						</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>

<?php
$demo = $this->config->item('demo');
if($user){
?>
<div class="panel panel-default">	
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover" id="patient_table">
			<thead>
				<tr>
					<th><?php echo $this->lang->line('name');?></th>
					<th><?php echo $this->lang->line('username');?></th>
					<th><?php echo $this->lang->line('category');?></th>
					<th><?php echo $this->lang->line('is_active');?></th>
					<th><?php echo $this->lang->line('edit');?></th>
					<th><?php echo $this->lang->line('delete');?></th>
				</tr>									
			</thead>
			<tbody>
			<?php $i=1; ?>
			<?php foreach ($user as $u):  ?>
			<tr <?php if ($i%2 == 0) { echo "class='alt'"; } ?> >
				<td><?php echo $u['name']; ?></td>
				<td><?php echo $u['username']; ?></td>        
				<td><?php echo $u['level']; ?></td>
				<td><?php if($u['is_active']) {echo "Yes";}else {echo "No";} ?></td>
				<td><a <?php if ($demo == 1 && $u['level'] == 'Administrator') echo 'style="display:none;"' ?> class="btn btn-primary btn-sm" title="Visit" href="<?php echo site_url("admin/edit_user/" . $u['userid']); ?>"><?php echo $this->lang->line('edit_user');?></a></td>
				<td><a <?php if ($u['level'] == 'Administrator') echo 'style="display:none;"' ?> class="btn btn-danger btn-sm confirmDelete" title="<?php echo $this->lang->line('delete_user')." : " . $u['username'] ?>" href="<?php echo site_url("admin/delete/" . $u['userid']); ?>"><?php echo $this->lang->line('delete_user');?></a></td>
			</tr>
			<?php $i++; ?>
			<?php endforeach ?>
			</tbody>
			</div>		
	</div>
</div>
</div>
<?php } ?>