<script type="text/javascript" charset="utf-8">
    $(window).load(function() {
		$(".expand-collapse-header").click(function () {
			if($(this).find("i").hasClass("fa-arrow-circle-down"))
			{
				$(this).find("i").removeClass("fa-arrow-circle-down");
				$(this).find("i").addClass("fa-arrow-circle-up");
			}else{
				$(this).find("i").removeClass("fa-arrow-circle-up");
				$(this).find("i").addClass("fa-arrow-circle-down");
			}
			
			$content = $(this).next('.expand-collapse-content');
			$content.slideToggle(500);

		});
		$('#visit_date').datetimepicker({
			timepicker:false,
			format: '<?=$def_dateformate; ?>',
		}); 
		$('#visit_time').datetimepicker({
			datepicker:false,
			format: '<?=$def_timeformate; ?>',
			formatTime:'<?=$def_timeformate; ?>'
		}); 
		$('#followup_date').datetimepicker({
			timepicker:false,
			format: '<?=$def_dateformate; ?>',
		}); 
		
    });
</script>
<style>
	.collapsed{
		display:none;
	}
</style>

<div id="page-inner">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading expand-collapse-header"><i class="fa fa-arrow-circle-down"></i>
					Patient Details (Click to toggle display)
				</div>
				<div class="panel-body expand-collapse-content collapsed">
					<div class="col-md-9">
						<div class="col-md-4">
							<div class="form-group">
								<label><?php echo $this->lang->line('id');?> :</label>
								<span><?php echo $patient['display_id']; ?></span>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label><?php echo $this->lang->line('name');?> :</label>
								<span><?php echo $patient['first_name'] . " " . $patient['middle_name'] . " " . $patient['last_name']; ?></span>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label><?php echo $this->lang->line('display_name');?>:</label>
								<span><?php echo $patient['display_name']; ?></span>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label><?php echo $this->lang->line('reference_by');?> :</label>
								<span><?php echo $patient['reference_by']; ?></span>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label><?php echo $this->lang->line('mobile');?> :</label>
								<span><?= $patient['phone_number']; ?></span>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label><?php echo $this->lang->line('email');?> :</label>
								<span><?= $addresses['email']; ?></span>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label style="display:table-cell;"><?php echo $this->lang->line('address');?> :</label>
								<span><strong>(<?=$addresses['type']; ?>)</strong><br/>
									   <?=$addresses['address_line_1'];?><br/>
									   <?=$addresses['address_line_2'];?><br/>
									   <?=$addresses['city'] . "," . $addresses['state'] . "," . $addresses['postal_code'] . "," . $addresses['country']; ?>
								</span>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<?php if(isset($addresses['contact_image']) && $addresses['contact_image'] != ""){ ?>
								<img src="<?php echo base_url() . $addresses['contact_image']; ?>" height="150" width="150"/>	
							<?php }else{ ?>
								<img src="<?php echo base_url() . "images/Profile.png" ?>" height="150" width="150"/>	
							<?php } ?>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<a class="btn btn-primary" title="Edit" href="<?php echo site_url("patient/edit/" . $patient['patient_id']); ?>">Edit</a>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-primary">
				<div class="panel-heading expand-collapse-header">
					<i class="fa fa-arrow-circle-up"></i>
					<?php echo $this->lang->line('new')." ".$this->lang->line('visit'). " " . $this->lang->line('toggle_display');?>
				</div>
				<div class="panel-body expand-collapse-content">
					<?php echo form_open_multipart('patient/visit/' . $patient_id); ?>
					<div class="col-md-12">	
						<input type="hidden" name="patient_id" value="<?= $patient_id; ?>"/>
						<div class="col-md-12">
							<div class="col-md-4">
								<div class="form-group">
									<label for="visit_doctor"><?=$this->lang->line('doctor');?></label>
									<?php 
										$level = $this->session->userdata('category');
										if ($this->session->userdata('category') == 'Doctor') {
											$userid = $this->session->userdata('id');
											$doctor_name = $doctors['name'];
											?><input type="text" name="doctor_name" class="form-control" readonly="readonly" value="<?=$doctor_name;?>"/>
											<input type="hidden" name="doctor" value="<?=$userid;?>"/><?php
										}else{
											$userid = 0;
											?>
											<select name="doctor" class="form-control">
												<option></option>
												<?php foreach ($doctors as $doctor) { ?>
												<option value="<?php echo $doctor['userid'] ?>" <?php if($appointment_doctor == $doctor['userid']) echo "selected";?>><?= $doctor['name']; ?></option>
												<?php }	?>
											</select>
										<?php } ?>
								</div>
							</div>
						</div>
						<div class="col-md-12">	
							<div class="col-md-4">	
								<div class="form-group">
									<label for="visit_date"><?=$this->lang->line('visit')." ".$this->lang->line('date');?></label>
									<input type="text" name="visit_date" id="visit_date" value="<?php echo $curr_date; ?>" class="form-control"/>
								</div>
							</div>
							<div class="col-md-4">	
								<div class="form-group">
									<label for="visit_time"><?php echo $this->lang->line('time');?></label>	
									<input type="text" name="visit_time" id="visit_time" value="<?php echo $curr_time; ?>" class="form-control"/>
								</div>
							</div>
						</div>
						<div class="col-md-12">	
							<div class="col-md-4">	
								<div class="form-group">
									<label for="type"><?php echo $this->lang->line('type');?></label> 
									<select name="type" class="form-control">
										<option value="New Visit"><?php echo $this->lang->line('new')." ".$this->lang->line('visit');?></option>
										<option <?php if ($visits) {echo 'selected = "selected"';} ?> value="Established Patient"><?php echo $this->lang->line('established_patient');?></option>
									</select>
								</div>
							</div>
							
						</div>
						<div class="col-md-12">	
							<div class="col-md-12">	
								<div class="form-group">
									<label for="notes"><?php echo $this->lang->line('notes');?></label> 
									<textarea rows="4" cols="100" class="form-control" name="notes"></textarea>
									<?php echo form_error('notes','<div class="alert alert-danger">','</div>'); ?>
								</div>
							</div>
						</div>
						<div class="col-md-12">	
							<div class="col-md-12">	
								<div class="form-group">
									<label for="notes"><?php echo $this->lang->line('prescription');?></label> 
									<textarea rows="4" cols="100" class="form-control" name="prescription"></textarea>
									<?php echo form_error('prescription','<div class="alert alert-danger">','</div>'); ?>
								</div>
							</div>
						</div>
						<?php if (in_array("treatment", $active_modules)) { ?>
						<div class="col-md-12">	
							<div class="col-md-4">	
								<label for="visit_treatment" style="display:block;text-align:left;"><?php echo $this->lang->line('treatment');?></label>
								<select id="treatment" class="form-control" multiple="multiple" style="width:350px;" tabindex="4" name="treatment[]">
									<?php foreach ($treatments as $treatment) { ?>
										<option value="<?php echo $treatment['id'] . "/" . $treatment['treatment'] . "/" . $treatment['price'] ?>"><?= $treatment['treatment']; ?></option>
									<?php } ?>
								</select>
								<script>jQuery('#treatment').chosen();</script>
							</div>
						</div>
						<?php } ?>
						<div class="col-md-12">	
							<div class="col-md-4">	
								<div class="form-group">
									<label for="followup_date"><?php echo $this->lang->line('next_follow_date');?></label>
									<input type="text" class="form-control" name="followup_date" id="followup_date" value="<?php echo date('d-m-Y', strtotime('+' . $next_followup_days['next_followup_days'] . ' days', time())); ?>"/>
								</div>
							</div>
							<div class="col-md-4">	
								<div class="form-group">
									<label for="visit_image">Image</label>
									<input type="file" class="form-control" name="userfile" id="visit_image" />
								</div>
							</div>
						</div>
						<div class="col-md-12">	
							<div class="col-md-4">	
								<div class="form-group">
									<button class="btn btn-primary btn-sm square-btn-adjust" type="submit" name="submit" /><?php echo $this->lang->line('save');?></button>
								</div>
							</div>
							<div class="col-md-4">	
								<input type="hidden" name="appointment_id" value="<?=$appointment_id;?>"/>
								<?php if ($appointment_id != NULL) { 
									$time = explode(":", $start_time); ?>
									<div class="form-group">
										<a class="btn btn-primary btn-sm square-btn-adjust" href='<?=base_url() . "index.php/appointment/change_status/" . $appointment_id . "/Complete";?>'>Complete</a>
									</div>
								<?php } ?>
							</div>
						</div>
						
					</div>
					<?php echo form_close(); ?>
				</div>
			</div>
			
			<div class="panel panel-primary">
				<div class="panel-heading expand-collapse-header">
					<i class="fa fa-arrow-circle-up"></i>
					<?php echo $this->lang->line('visits');?> <?php echo $this->lang->line('toggle_display');?>
				</div>	
				<div class="panel-body expand-collapse-content">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover" id="visit_table">			
						<thead>
							<tr>
								<th width="100px;"><?php echo $this->lang->line('date');?></th>
								<th width="100px;"><?php echo $this->lang->line('time');?></th>
								<th width="100px;"><?php echo $this->lang->line('type');?></th>
								<th><?php echo $this->lang->line('notes');?></th>
								<th><?php echo $this->lang->line('prescription');?></th>
								<th>Image</th>
								<?php if (in_array("gallery",$active_modules)) {?>
								<th><?php echo $this->lang->line('progress');?></th>
								<?php }?>
								<?php if (in_array("marking",$active_modules)) {?>
								<th><?php echo $this->lang->line('marking');?></th>
								<?php }?>
								<th><?php echo $this->lang->line('bill');?></th>
								<th><?php echo $this->lang->line('edit');?></th>
							</tr>
						</thead>
						<?php $i = 1; ?>        
						<tbody>
						<?php if ($visits) { ?>
						<?php foreach ($visits as $visit) {
						?>
							<tr>
								<td><?= date("d-m-Y", strtotime($visit['visit_date'])); ?></td>
								<td><?= $visit['visit_time']; ?></td>
								<td><?= $visit['type']; ?></td>
								<td><?= $visit['notes']; ?><br />
								<?php
								$flag = FALSE;
								foreach ($visit_treatments as $visit_treatment) {
									if ($visit_treatment['visit_id'] == $visit['visit_id'] && $visit_treatment['type'] == 'treatment') {
										if ($flag == FALSE) {                    
											echo $visit_treatment['particular'];
											$flag = TRUE;
										} else {
											echo " ," . $visit_treatment['particular'];
										}
									}
								}
								?>
								</td>
								<td><?php echo $visit['prescription']; ?></td>
								<td><img src="<?php echo base_url()."skin_picture/".$visit['visit_image']; ?>" width="50px" height='50px' alt="N/A"/></td>
								<?php if (in_array("gallery",$active_modules)) {?>
								<td>
									<a class="btn btn-primary btn-sm square-btn-adjust" href="<?= site_url('gallery/index') ."/". $visit['patient_id'] ."/". $visit['visit_id']; ?>"><?php echo $this->lang->line('gallery');?></a>
								</td>
								<?php }?>
								<?php if (in_array("marking",$active_modules)) {?>
								<td>
									<a class="btn btn-primary btn-sm square-btn-adjust" href="<?= site_url('marking/index') ."/". $visit['patient_id'] ."/". $visit['visit_id']; ?>"><?php echo $this->lang->line('marking');?></a>
								</td>
								<?php }?>
								<td><center><a class="btn btn-primary btn-sm square-btn-adjust" href="<?= site_url('patient/bill') . "/" . $visit['visit_id'] . "/" . $visit['patient_id']; ?>"><?php echo $this->lang->line('bill');?></a></center></td>
								<td><center><a class="btn btn-primary btn-sm square-btn-adjust" href="<?= site_url('patient/edit_visit') . "/" . $visit['visit_id'] . "/" . $visit['patient_id']; ?>"><?php echo $this->lang->line('edit');?></a></center></td>
							</tr>
							<?php $i++; ?>
							<?php } ?>
							<script>
								$(window).load(function() {
									$('#visit_table').dataTable();
								});
							</script>
							
							<?php }else{ ?>
								<tr>
									<td colspan="9"><?php echo $this->lang->line('no_visits');?></td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>