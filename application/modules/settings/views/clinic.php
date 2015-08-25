
<script type="text/javascript" charset="utf-8">
$( window ).load(function() {
    $('#start_time').datetimepicker({
		datepicker:false,
		format: '<?=$def_timeformate; ?>',
		formatTime:'<?=$def_timeformate; ?>'
    });    
    $('#end_time').datetimepicker({
		datepicker:false,
		format: '<?=$def_timeformate; ?>',
		formatTime:'<?=$def_timeformate; ?>'
    });    
});
</script>
<?php
    if (!$clinic)
    {
        $clinic_name = '';
        $tag_line = '';
        $start_time = '';
        $end_time = '';
        $time_interval = '';
        $next_followup_days = '';
        $clinic_address = '';
        $clinic_landline = '';
        $clinic_mobile = '';
        $clinic_email = '';
		$facebook = '';
		$twitter = '';
		$google_plus = '';
    }
    else
    {
        $clinic_name = $clinic['clinic_name'];
        $tag_line = $clinic['tag_line'];
        $start_time = $clinic['start_time'];
		$start_time = date($def_timeformate,strtotime($start_time));
        $end_time = $clinic['end_time'];
		$end_time = date($def_timeformate,strtotime($end_time));
        $time_interval = $clinic['time_interval'];
        $next_followup_days = $clinic['next_followup_days'];
        $clinic_address = $clinic['clinic_address'];
        $clinic_landline = $clinic['landline'];
        $clinic_mobile = $clinic['mobile'];
        $clinic_email = $clinic['email'];
		$facebook = $clinic['facebook'];
		$twitter = $clinic['twitter'];
		$google_plus = $clinic['google_plus'];
    }
?>
<div id="page-inner">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<?php echo $this->lang->line('clinic_details');?>
				</div>
				<div class="panel-body">
					<?php echo form_open_multipart('settings/clinic') ?>
					<div class="col-md-8">	
						<div class="form-group">
							<label for="clinic_name"><?php echo $this->lang->line('clinic_name');?></label> 
							<input type="input" name="clinic_name" value="<?=$clinic_name; ?>" class="form-control"/>
							<?php echo form_error('clinic_name','<div class="alert alert-danger">','</div>'); ?>
						</div>
					</div>
					<div class="col-md-8">	
						<div class="form-group">
							<label for="tag_line"><?php echo $this->lang->line('tag_line');?></label> 
							<input type="input" name="tag_line" style="width:500px;" value="<?=$tag_line; ?>" class="form-control"/>
							<?php echo form_error('tag_line','<div class="alert alert-danger">','</div>'); ?>
						</div>
					</div>
					<div class="col-md-6">	
						<div class="form-group">	
							<label for="clinic_address"><?php echo $this->lang->line('clinic_address');?></label> 
							<textarea rows="5" name="clinic_address" class="form-control"><?=$clinic_address; ?></textarea>
							<?php echo form_error('clinic_address','<div class="alert alert-danger">','</div>'); ?>
						</div>
					</div>
					<div class="col-md-6">	
						<div class="form-group">
							<label for="landline"><?php echo $this->lang->line('clinic_landline');?></label> 
							<input type="input" name="landline" class="form-control" value="<?=$clinic_landline; ?>"/>
							<?php echo form_error('landline','<div class="alert alert-danger">','</div>'); ?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="mobile"><?php echo $this->lang->line('mobile');?></label> 
							<input type="input" name="mobile" value="<?=$clinic_mobile; ?>" class="form-control"/>
							<?php echo form_error('mobile','<div class="alert alert-danger">','</div>'); ?>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="email"><?php echo $this->lang->line('email');?></label> 
							<input type="input" name="email" value="<?=$clinic_email; ?>" class="form-control"/>
							<?php echo form_error('email','<div class="alert alert-danger">','</div>'); ?>
						</div>
					</div>
				
					<div class="col-md-4">
						<div class="form-group">
							<label for="start_time"><?php echo $this->lang->line('start_time');?></label> 
							<input type="input" name="start_time" id="start_time" value="<?=$start_time; ?>" class="form-control"/>
							<?php echo form_error('start_time','<div class="alert alert-danger">','</div>'); ?>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="end_time"><?php echo $this->lang->line('end_time');?></label> 
							<input type="input" name="end_time" id="end_time" value="<?=$end_time; ?>" class="form-control"/>
							<?php echo form_error('end_time','<div class="alert alert-danger">','</div>'); ?>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="time_interval"><?php echo $this->lang->line('time_interval');?></label> 
							<select name="time_interval" class="form-control">
								<option <?php if($time_interval == 0.25){echo 'selected = "selected"';}  ?> value="0.25"><?php echo $this->lang->line('15min');?></option>
								<option <?php if($time_interval == 0.50){echo 'selected = "selected"';}  ?> value="0.50"><?php echo $this->lang->line('30min');?></option>
								<option <?php if($time_interval == 1.00){echo 'selected = "selected"';}  ?> value="1.00"><?php echo $this->lang->line('1hr');?></option>
							</select>
							<?php echo form_error('time_interval','<div class="alert alert-danger">','</div>'); ?>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="next_followup_days"><?php echo $this->lang->line('next_follow_up');?></label> 
							<input type="input" class="form-control" name="next_followup_days" id="next_followup_days" value="<?=$next_followup_days; ?>"/>    <?php echo $this->lang->line('days');?>
							<?php echo form_error('next_followup_days','<div class="alert alert-danger">','</div>'); ?>	
						</div>
					</div>
					
					<div class="col-md-12">
						<div class="form-group">
							<button type="submit" name="submit" class="btn btn-primary" /><?php echo $this->lang->line('save');?></button>
						</div>
					</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</div>