<div id="page-inner">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
			<div class="panel-heading">
					<?php echo $this->lang->line('edit_clinic');?>
			</div>
			<div class="panel-body">
			<?php 
				echo form_open('settings/edit_clinic/'.$vc['clinic_id']); ?>
					<div class="form-group">
						 <label for="static_prefix"><?php echo $this->lang->line('clinicname');?></label> 
						<input type="input" name="clinic_name" value="<?= $vc['clinic_name']; ?>" class="form-control"/>
						<?php echo form_error('clinic_name','<div class="alert alert-danger">','</div>'); ?>
					</div>
					<div class="form-group">
						<button type="submit" name="submit" class="btn btn-primary" /><?php echo $this->lang->line('save');?></button>
					</div>
			<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>