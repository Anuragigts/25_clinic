<!--display on Click of Appointment page -->

<script type="text/javascript">
 
    $(window).load(function(){
 
		var searcharrpatient=[<?php $i = 0;
		foreach ($patients as $patient) {
			if ($i > 0) { echo ",";}
			echo '{value:"' . $patient['first_name'] . " " . $patient['middle_name'] . " " . $patient['last_name'] . '",id:"' . $patient['patient_id'] . '",display:"' . $patient['display_id'] . '",num:"' . $patient['phone_number'] . '"}';
			$i++;
		}?>];
		$("#patient_name").autocomplete({
			autoFocus: true,
			source: searcharrpatient,
			minLength: 1,//search after one characters
			
			select: function(event,ui){
				//do something
				$("#patient_id").val(ui.item ? ui.item.id : '');
				$("#phone_number").val(ui.item ? ui.item.num : '');
				$("#display_id").val(ui.item ? ui.item.display : '');
				
			},
			change: function(event, ui) {
				 if (ui.item == null) {
					$("#patient_id").val('');
					$("#phone_number").val('');
					$("#display_id").val('');
					$("#patient_name").val('');
					}
			},
			response: function(event, ui) {
				if (ui.content.length === 0) 
				{
					$("#patient_id").val('');
					$("#phone_number").val('');
					$("#display_id").val('');
					$("#patient_name").val('');
				}
			}
		});   
		var searcharrdispname=[<?php $i = 0;
		foreach ($patients as $patient) {
			if ($i > 0) {
				echo ",";
			}
				echo '{value:"' . $patient['display_id'] . '",id:"' . $patient['patient_id'] . '",num:"' . $patient['phone_number'] . '",patient:"' . $patient['first_name'] . " " . $patient['middle_name'] . " " . $patient['last_name'] . '"}';
			$i++;
		}?>];
		$("#display_id").autocomplete({
			autoFocus: true,
			source: searcharrdispname,
			minLength: 1,//search after one characters
			select: function(event,ui)
			{
				//do something
			   $("#patient_id").val(ui.item ? ui.item.id : '');
			   $("#patient_name").val(ui.item ? ui.item.patient : '');
			   $("#phone_number").val(ui.item ? ui.item.num : '');
			},
			change: function(event, ui) 
			{
				if (ui.item == null) {
					$("#patient_id").val('');
					$("#phone_number").val('');
					$("#display_id").val('');
					$("#patient_name").val('');
				}
			},
			response: function(event, ui) 
			{
				if (ui.content.length === 0) 
				{
					$("#patient_id").val('');
					$("#phone_number").val('');
					$("#display_id").val('');
					$("#patient_name").val('');
				}
			}
		});   
		var searcharrmob=[<?php $i = 0;
		foreach ($patients as $patient) {
			if ($i > 0) {
				echo ",";
			}
				echo '{value:"' . $patient['phone_number'] . '",id:"' . $patient['patient_id'] . '",display:"' . $patient['display_id'] . '",patient:"' . $patient['first_name'] . " " . $patient['middle_name'] . " " . $patient['last_name'] . '"}';
			$i++;
		}?>];
		$("#phone_number").autocomplete({
			autoFocus: true,
			source: searcharrmob,
			minLength: 1,//search after one characters
			select: function(event,ui){
				//do something
				$("#patient_id").val(ui.item ? ui.item.id : '');
				$("#patient_name").val(ui.item ? ui.item.patient : '');
				$("#display_id").val(ui.item ? ui.item.display : '');
			},
			change: function(event, ui) {
				if (ui.item == null) {
					$("#patient_id").val('');
					$("#phone_number").val('');
					$("#display_id").val('');
					$("#patient_name").val('');
				}
			},
			response: function(event, ui) {
				if (ui.content.length === 0) 
				{
					$("#patient_id").val('');
					$("#phone_number").val('');
					$("#display_id").val('');
					$("#patient_name").val('');
				}
			}
		});  
		$('#appointment_date').datetimepicker({
			timepicker:false,
			format: '<?=$def_dateformate; ?>',
		}); 
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
	if(isset($doctor)){
		$doctor_name = $doctor['name'];
		$doctor_id = $doctor['userid'];
	}
	if(isset($appointment)){
		//Edit Appointment
		$header = $this->lang->line("edit")." ".$this->lang->line("appointment");
		$patient_name = $patient['first_name'] . " " . $patient['middle_name'] . " " . $patient['last_name'];
		$title = $appointment['title'];
		$appointment_id = $appointment['appointment_id'];
		$start_time = $appointment['start_time'];
		$end_time = $appointment['end_time'];
		$appointment_date = $appointment['appointment_date'];
		$status = $appointment['status'];
		$appointment_id = $appointment['appointment_id'];
	}else{
		//Add Appointment
		$header = $this->lang->line("new")." ".$this->lang->line("appointment");
		$patient_name = "";
		$title = "";
		$time_interval =  $time_interval*60;
		$start_time = date($def_timeformate, strtotime($appointment_time));
		$end_time = date($def_timeformate, strtotime("+$time_interval minutes", strtotime($appointment_time))); 
		
		$appointment_date = $appointment_date;
		$status = "Appointments";
	}
?>
<div id="page-inner">
	<div class="row">
		<div class="col-md-12">
			<?php if(!isset($appointment) && !isset($curr_patient)){ ?>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<?php echo $this->lang->line('add')." ".$this->lang->line('patient');?>
				</div>
				<div class="panel-body">
					<?php $s_time = date('H:i',strtotime($start_time));?>
					<?php $time = explode(":", $s_time); ?>
					<?php echo form_open('appointment/insert_patient_add_appointment' . "/" . $time[0] . "/" . $time[1] . "/" . $appointment_date . "/" . $status . "/" . $selected_doctor_id."/0/".$id) ?>    	
						<div class="col-md-3">
							<div class="form-group">
								<label for="first_name"><?php echo $this->lang->line('first')." ".$this->lang->line('name');?></label>
								<input type="text" name="first_name" value="" class="form-control"/>
								<?php echo form_error('first_name','<div class="alert alert-danger">','</div>'); ?>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="middle_name"><?php echo $this->lang->line('middle')." ".$this->lang->line('name');?></label>
								<input type="text" name="middle_name" value=""  class="form-control"/>
								<?php echo form_error('middle_name','<div class="alert alert-danger">','</div>'); ?>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="last_name"><?php echo $this->lang->line('last')." ".$this->lang->line('name');?></label>
								<input type="text" name="last_name" value="" class="form-control"/>
								<?php echo form_error('last_name','<div class="alert alert-danger">','</div>'); ?>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="reference_by"><?php echo $this->lang->line('reference_by')?></label>
								<input type="text" name="reference_by" value="" class="form-control"/>
								<?php echo form_error('reference_by','<div class="alert alert-danger">','</div>'); ?>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<button class="btn btn-primary" type="submit" name="submit" /><?php echo $this->lang->line('add')." ".$this->lang->line('patient');?></button>
							</div>
						</div>
					<?php echo form_close(); ?>
				</div>
			</div>
			<?php } ?>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<?=$header;?>
				</div>
				<div class="panel-body">
					<?php $timezone = $this->settings_model->get_time_zone();
						if (function_exists('date_default_timezone_set'))
							date_default_timezone_set($timezone);
						$appointment_date = date($def_dateformate,strtotime($appointment_date)); ?>
					<?php if(isset($appointment)){ ?>
					<?php echo form_open('appointment/edit_appointment/'.$appointment['appointment_id']) ?>
					<?php }else{ ?>
					<?php echo form_open('appointment/add/'.$year.'/'.$month.'/'.$day.'/'.$hour.'/'.$min.'/'.$status.'/'.$patient_id) ?>
					<?php } ?>
					<input type="hidden" name="appointment_id" value="<?= $appointment_id; ?>"/>
					<input type="hidden" name="patient_id" id="patient_id" value="<?php if(isset($curr_patient)){echo $curr_patient['patient_id']; } ?>"/>
					<div class="panel panel-success">
						<div class="panel-heading">
							<?= $this->lang->line('search')." ".$this->lang->line('patient');?>
						</div>
						<div class="panel-body">
							<input type="hidden" name="title" id="title" value="<?= $title; ?>" class="form-control"/>
							<div class="col-md-3">
								<label for="display_id"><?php echo $this->lang->line('patient_id');?></label>
								<input type="text" name="display_id" id="display_id" value="<?php if(isset($curr_patient)){echo $curr_patient['display_id']; } ?>" class="form-control"/>
							</div>
							<div class="col-md-3">
								<label for="patient"><?php echo $this->lang->line('patient');?></label>
								<input type="text" name="patient_name" id="patient_name" value="<?php if(isset($curr_patient)){echo $curr_patient['first_name']." " .$curr_patient['middle_name'].$curr_patient['last_name']; } ?>" class="form-control"/>
								<?php echo form_error('patient_name','<div class="alert alert-danger">','</div>'); ?>
							</div>

							<div class="col-md-3">
								<label for="phone"><?php echo $this->lang->line('mobile');?></label>
								<input type="text" name="phone_number" id="phone_number" value="<?php if(isset($curr_patient)){echo $curr_patient['phone_number']; } ?>" class="form-control"/>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="doctor"><?php echo $this->lang->line('doctor')." ".$this->lang->line('name');?></label>
							<?php 
								$doctor_detail = array();
								foreach ($doctor as $doctor_list){
									$doctor_detail[$doctor_list['userid']] = $doctor_list['name'];
								}
							?>
							<?php echo form_dropdown('doctor_id', $doctor_detail, $selected_doctor_id,'class="form-control"'); ?>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="appointment_date"><?php echo $this->lang->line('date');?></label>
							<input type="text" name="appointment_date" id="appointment_date" value="<?= $appointment_date; ?>" class="form-control"/>
							<?php echo form_error('appointment_date','<div class="alert alert-danger">','</div>'); ?>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="start_time"><?php echo $this->lang->line('start_time');?></label>
							<input type="text" name="start_time" id="start_time" value="<?= $start_time; ?>" class="form-control"/>
							<?php echo form_error('start_time','<div class="alert alert-danger">','</div>'); ?>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="end_time"><?=$this->lang->line('end_time');?></label>
							<input type="text" name="end_time" id="end_time" value="<?= $end_time; ?>" class="form-control"/>
							<?php echo form_error('end_time','<div class="alert alert-danger">','</div>'); ?>
						</div>
					</div>
					<br/>
					<div class="col-md-12">
						<div class="form-group">
							<button class="btn btn-primary" type="submit" name="submit" /><?php echo $this->lang->line('save');?></button>
						</div>
					</div>
					<br/>
					<div class="col-md-12">
						<div class="form-group">
					<?php if(isset($appointment)){ ?>
						<?php if ($status != 'Appointment') { ?>
							<a class="btn btn-primary" href="<?=base_url() . "index.php/appointment/change_status/" . $appointment_id . "/Appointment";?>" ><?php echo $this->lang->line('appointment');?></a>
						<?php } ?>
						<?php if ($status != 'Cancel') { ?>
							<a class="btn btn-primary" href="<?=base_url() . "index.php/appointment/change_status/" . $appointment_id . "/Cancel";?>" ><?php echo $this->lang->line('cancel')." ".$this->lang->line('appointment');?></a>
						<?php } ?>
						<?php if ($status != 'Waiting') { ?>
							<a class="btn btn-primary" href="<?=base_url() . "index.php/appointment/change_status/" . $appointment_id . "/Waiting";?>"><?php echo $this->lang->line('waiting');?></a>
						<?php } ?>
						<?php if ($status != 'Consultation') { ?>
							<a class="btn btn-primary" href="<?=base_url() . "index.php/appointment/change_status/" . $appointment_id . "/Consultation";?>">Consultation</a>
						<?php } ?>
					<?php } ?>
					<a class="btn btn-primary" href="<?=base_url() . "index.php/appointment/index/";?>"><?=$this->lang->line('back_to_app');?></a>
						</div>
					</div>
					<?php echo form_close() ?>
				</div>
			</div>
		</div>
	</div>
</div>