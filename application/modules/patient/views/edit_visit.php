<!--display on click of edit of patients visit -->
<div id="page-inner">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
			<div class="panel-heading">
					<?php echo $this->lang->line("edit")." ".$this->lang->line("visit");?>
			</div>
			<span class="err"><?php echo validation_errors(); ?></span>
			<div class="panel-body">
			<?php echo form_open('patient/edit_visit/'. $visit['visit_id'] . "/" . $follow_up['patient_id']) ?>
			<div class="form-group">
				<label for="visit_doctor"><?php echo $this->lang->line("doctor");?></label>
				<select name="visit_doctor" id="visit_doctor" class="form-control">
					<option></option>
					<?php foreach ($doctors as $doc) { ?>
					<option value="<?php echo $doc['userid'] ?>" <?php if($doc['name'] == $doctor['name']){echo "selected";} ?>><?= $doc['name']; ?></option>
					<?php }	?>
				</select>
				<?php echo form_error('visit_doctor','<div class="alert alert-danger">','</div>'); ?>
			</div>
			<div class="form-group">
				<label for="visit_date"><?php echo $this->lang->line("visit")." ".$this->lang->line("date");?></label>
				<input type="date" name="visit_date" id="visit_date" class="form-control" value="<?= date('Y-m-d', strtotime($visit['visit_date'])) ?>" />
				<?php echo form_error('visit_date','<div class="alert alert-danger">','</div>'); ?>
			</div>
			<div class="form-group">
				<label for="visit_time"><?php echo $this->lang->line("visit")." ".$this->lang->line("time");?></label>
				<input type="time" name="visit_time" id="visit_time" class="form-control" value="<?= date('H:i:s', strtotime($visit['visit_time'])) ?>" />
				<?php echo form_error('visit_time','<div class="alert alert-danger">','</div>'); ?>
			</div>
			<div class="form-group">
				<label for="type"><?php echo $this->lang->line("type");?></label>
				<select name="type" class="form-control">
					<option <?php if ($visit['type'] == "New Visit") {echo 'selected = "selected"';} ?> value="New Visit"><?php echo $this->lang->line('new')." ".$this->lang->line('visit');?></option>
					<option <?php if ($visit['type'] == "Established Patient") {echo 'selected = "selected"';} ?> value="Established Patient"><?php echo $this->lang->line('established_patient');?></option>
				</select>
				<?php echo form_error('type','<div class="alert alert-danger">','</div>'); ?>
			</div>
			<div class="form-group">
				 <label for="notes"><?php echo $this->lang->line("notes");?></label> 
				<textarea class="form-control" name="notes" rows=7><?= $visit['notes'] ?></textarea>
				<?php echo form_error('notes','<div class="alert alert-danger">','</div>'); ?>
			</div>
			<div class="form-group">
				 <label for="notes"><?php echo $this->lang->line("prescription");?></label> 
				<textarea class="form-control" name="prescription" rows=7><?= $visit['prescription'] ?></textarea>
				<?php echo form_error('prescription','<div class="alert alert-danger">','</div>'); ?>
			</div>
			
			<?php if (in_array("treatment", $active_modules)) { ?>
			<div class="form-group">
				 <label for="visit_treatment" ><?php echo $this->lang->line("treatment");?></label>
				<select id="treatment" class="form-control" multiple="multiple" style="width:350px;" tabindex="4" name="treatment[]">
					<option value=""></option> 
					<?php            
					foreach ($treatments as $treatment) { 
					?>
						<option value="<?php echo $treatment['id'] . "/" . $treatment['treatment'] . "/" . $treatment['price'] ?>" 
							<?php 
								foreach ($visit_treatments as $visit_treatment) { 
									if($visit_treatment['particular'] == $treatment['treatment']) 
									{   
										echo 'selected=\'selected\'';                                
									}
								}
							?>
						>
						<?= $treatment['treatment']; ?></option>
					<?php 
					}
					?>
				</select>
				<?php echo form_error('notes','<div class="alert alert-danger">','</div>'); ?>
				<script>jQuery('#treatment').chosen();</script>
			</div>
			<?php } ?>
			<script src="<?= base_url() ?>js/chosen.jquery.js" type="text/javascript"></script>
			<script type="text/javascript"> 
				var config = {
					'.chzn-select'           : {},
					'.chzn-select-deselect'  : {allow_single_deselect:true},
					'.chzn-select-no-single' : {disable_search_threshold:10},
					'.chzn-select-no-results': {no_results_text:'Oops, nothing found!'},
					'.chzn-select-width'     : {width:"95%"}
				}
				for (var selector in config) {
					$(selector).chosen(config[selector]);
				}
			</script>
			<div class="form-group">
				<button class="btn btn-primary" type="submit" name="submit" /><?php echo $this->lang->line("edit");?></button>
				<a class="btn btn-primary" href="<?php echo base_url()."index.php/appointment/change_status_visit/".$visit['visit_id']?>"><?php echo $this->lang->line("complete");?></a>
				<a class="btn btn-primary" href="<?php echo base_url() . "index.php/patient/visit/" . $follow_up['patient_id']; ?>"><?php echo $this->lang->line("cancel");?></a>
			</div>
			</div>
		</div>
	</div>
</div>