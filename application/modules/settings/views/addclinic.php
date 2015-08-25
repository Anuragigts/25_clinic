<script type="text/javascript" charset="utf-8">
$(window).load(function() {
    $('#patient_table').dataTable();
});
?>
</script>
<div id="page-inner">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
			<div class="panel-heading">
					<?php echo $this->lang->line('addclinic');?>
			</div>
			<div class="panel-body">
			<?php echo form_open('settings/clinics') ?>
					<div class="form-group">
						 <label for="static_prefix"><?php echo $this->lang->line('clinicname');?></label> 
						<input type="input" name="clinic_name" value="<?= $clinic_name; ?>" class="form-control"/>
						<?php echo form_error('clinic_name','<div class="alert alert-danger">','</div>'); ?>
					</div>
					<div class="form-group">
						<button type="submit" name="submit" class="btn btn-primary" /><?php echo $this->lang->line('addclinic');?></button>
					</div>
			<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<?php 
$demo = $this->config->item('demo');
if($view){
	?>
	<div class="panel panel-default">	
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-hover" id="patient_table">
					<thead>
						<tr>
							<th><?php echo $this->lang->line('clinicname');?></th>
							<th><?php echo $this->lang->line('edit');?></th>
						</tr>									
					</thead>
					<tbody>
						<?php $i=1; ?>
						<?php foreach ($view as $u):  ?>
						<tr <?php if ($i%2 == 0) { echo "class='alt'"; } ?> >
							<td><?php echo $u['clinic_name']; ?></td>
							<td><a <?php if ($demo == 1 && $u['level'] == 'Administrator') echo 'style="display:none;"' ?> class="btn btn-primary btn-sm" title="Visit" href="<?php echo site_url("settings/edit_clinic/" . $u['clinic_id']); ?>"><?php echo $this->lang->line('edit_clinic');?></a></td>
							
						</tr>
						<?php $i++; ?>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>		
		</div>
	</div>
	<?php
}?>