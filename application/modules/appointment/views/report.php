<script type="text/javascript" charset="utf-8">
	$(window).load(function() {
		$("#app_date").datetimepicker({
			timepicker:false,
			format: '<?=$def_dateformate;?>'
		});
    });
</script>
<?php

$level = $this->session->userdata('category');
?>
<div id="page-inner">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<?php echo $this->lang->line('appointment')." ".$this->lang->line('report');?>
				</div>
				<div class="panel-body">
					<?php echo form_open('appointment/appointment_report'); ?>
					<div class="col-md-3">
						<?php echo $this->lang->line('date');?>
						<input type="text" name="app_date" id="app_date" class="form-control" value="<?=date($def_dateformate,strtotime($app_date));?>" />
					</div>
					<div class="col-md-3" <?php if($level == 'Doctor'){ echo 'style = display:none;';} ?>>
						<?php echo $this->lang->line('doctor');?>
						<select name="doctor" class="form-control">
							<option></option>
							<?php foreach ($doctors as $doctor) {?>
								<option value="<?php echo $doctor['userid'] ?>" <?php if($doctor['userid'] == $doctor_id){echo "selected='selected'";} ?>><?= $doctor['name'];?></option>
							<?php } ?>
							<input type="hidden" name="doctor_id" id="doctor_id" value="" />
						</select>
					</div>
					<div class="col-md-3">
						<button type="submit" name="submit" class="btn btn-primary"><?php echo $this->lang->line('go');?></button>
					</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>	
		
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover" id="attendance_table" >
							<thead>
								<tr>
									<th width="100px;"><?php echo $this->lang->line('patient')." ".$this->lang->line('name');?></th>
									<th width="100px;"><?php echo $this->lang->line('appointment')." ".$this->lang->line('time');?></th>
									<th><?php echo $this->lang->line('waiting')." ".$this->lang->line('time');?></th>
									<th><?php echo $this->lang->line('waiting')." ".$this->lang->line('duration');?></th>
									<th><?php echo $this->lang->line('consultation');?></th>
									<th><?php echo $this->lang->line('consultation')." ".$this->lang->line('duration');?></th>
									<!--th><?php echo $this->lang->line('bill')." ".$this->lang->line('amount');?></th-->
								</tr>
							</thead>
							<?php if ($app_reports) {?>
							<tbody>
								<?php $i=1; ?>
								<?php foreach ($app_reports as $report):  ?>
									<tr <?php if ($i%2 == 0) { echo "class='even'"; }else{ echo "class='odd'"; } ?> >
										<td><?= $report['patient_name'];?></td>                
										<td><?=$report['appointment_time']; ?></td>
										<td><?=$report['waiting_in']; ?></td>
										<?php if($report['waiting_duration'] == NULL) { ?>
										<td> -- </td>
										<?php } else { ?>
										<td>
										<?php
											$duration = $report['waiting_duration'];
											$hours = floor($duration / 3600);
											$minutes = floor(($duration / 60) % 60);
											$seconds = $duration % 60;

											echo "$hours:$minutes:$seconds";
										?>
										</td>
										<?php }  ?>
										<td><?=$report['consultation_in'];?></td>
										<?php if($report['consultation_duration'] == NULL) { ?>
										<td> -- </td>
										<?php } else { ?>
										<td>
										<?php
											$duration = $report['consultation_duration'];
											$hours = floor($duration / 3600);
											$minutes = floor(($duration / 60) % 60);
											$seconds = $duration % 60;

											echo "$hours:$minutes:$seconds";
										?>
										</td>
										<?php }  ?>
										<!--td class="right"><?php echo currency_format($report['collection_amount']);if($currency_postfix) echo $currency_postfix['currency_postfix']; ?></td-->
									</tr>
								
								<?php $i++; ?>
								<?php endforeach ?>
							</tbody>
							<?php } else { ?>
							<tbody>
								<tr>
									<td colspan="8"><?php echo $this->lang->line('norecfound');?></td>
								</tr>
							</tbody>
							<?php } ?>
						</table>
					</div>
				</div>
			</div>
		
	</div>
</div>
