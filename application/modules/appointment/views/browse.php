<script type="text/javascript" charset="utf-8">	
	$(window).load(function(){
		$('.confirmCancel').click(function(){
			return confirm("<?=$this->lang->line('areyousure') . " " . $this->lang->line('cancel') . " " . $this->lang->line('appointment') . "?";?>");
		});
		
		$(".todo").change(function() {
			var element = $(this);
			var id = $(this).val();
			if($(this).is(':checked')){
				
				$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>index.php/appointment/todos_done/1/" + id,
					success: function(){
						element.parent().addClass("done");
					}
				});
			}else{
				$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>index.php/appointment/todos_done/0/" + id,
					success: function(){
						element.parent().removeClass("done");
					}
				});
			}
		});
		
		
	});
</script>
<?php
global $time_intervals;
//Converts Integer to Time. e.g. 9 -> 9:00 , 9.5 -> 9:30
function inttotime12($tm,$time_format) {
    //if ($tm >= 13) {  $tm = $tm - 12; }
    $hr = intval($tm);
    $min = ($tm - intval($tm)) * 60;
    $format = '%02d:%02d';
	$time = sprintf($format, $hr, $min); //H:i
	$time = date($time_format, strtotime($time));
    return $time;
}
//Convert Time to integer.e.g. 09:00 -> 9, 09:30 -> 9.5
function timetoint12($time)
{
	$hours = idate('H', strtotime($time));
	$minutes = idate('i', strtotime($time));
	
	return $hours + ($minutes/60);
}

function inttotime($tm) {
    $hr = intval($tm);
    $min = ($tm - intval($tm)) * 60;
    $format = '%02d:%02d';
    return sprintf($format, $hr, $min);
}
function timetoint($time) {
    $hrcorrection = 0;
    if (strpos($time, 'PM') > 0){  $hrcorrection = 12;}
    list($hours, $mins) = explode(':', $time);
    $mins = str_replace('AM', '', $mins);
    $mins = str_replace('PM', '', $mins);
    return $hours + $hrcorrection + ($mins / 60);
}
function nearest_timeinterval($time){
	global $time_intervals;
	
	$prev_interval = 0;
	$next_interval = 0;
	foreach($time_intervals as $intervals){
		if($next_interval == 0 && $prev_interval !=0 ){
			$next_interval = $intervals;
		}
		if($prev_interval == 0){
			$prev_interval = $intervals;
		}
		if($time >= $prev_interval && $time < $next_interval){
			//Find Median
			$median = ($prev_interval + $next_interval)/2;
			if ($time < $median){
				return $prev_interval;
			}else{
				return $next_interval;
			}
		}else{
			$prev_interval = $next_interval;
			$next_interval = $intervals;
		}
	}
}
?>
<div id="page-inner">
    <div class="row">
		<div class="col-md-12">
			<div class="col-md-4">
				<!----------------------------  Display Calendar ------------------------------->
				<div class="panel panel-primary">
                    <div class="panel-heading"><?=$this->lang->line('calendar');?></div>
                    <div class="panel-body" style="padding:0;">
						<div class="calendar">
						<?php
							for ($i = 1; $i <= 31; $i++) {
								$data[$i] = base_url() . 'index.php/appointment/index/' . $year . '/' . $month . '/' . $i;
							}
							echo $this->calendar->generate($year, $month, $data);
						?>
						</div>
					</div>
				</div>
				<!----------------------------  Display Calendar ------------------------------->
				<!--------------------------- Display Follow-Up  ------------------------------->
				<div class="panel panel-primary">
                    <div class="panel-heading"><?=$this->lang->line('follow_ups');?></div>
					<div class="panel-body"  style="overflow:scroll;height:250px;padding:0;">
						<?php if ($followups) { ?>
							<table class="table table-condensed table-striped table-bordered table-hover dataTable no-footer" id="followup_table">
								<thead>
									<th><?= $this->lang->line('follow_up') .' '. $this->lang->line('date');?></th>
									<th><?= $this->lang->line('patient');?></th>
								</thead>
								<tbody>
								<?php
									$i = 0;
									foreach ($followups as $followup) {
										foreach ($patients as $patient) {
											if ($followup['patient_id'] == $patient['patient_id']) { 
												$followup_data['followup_date'] = $followup['followup_date'];
												$followup_data['patient_name'] = $patient['first_name'] . " " . $patient['middle_name'] . " " . $patient['last_name'];
												?>
												<tr>
													<td> <?= date('d.m.y', strtotime($followup_data['followup_date']));?></td>
													<td><a href='<?= base_url() . "index.php/patient/followup/" . $patient['patient_id'] ;?>' ><?=$followup_data['patient_name'];?></a></td>
												</tr>
												<?php break; 
											}
										}
									} ?>
								</tbody>	
							</table>
						<?php }	?>
					</div>
				</div>
				<!--------------------------- Display Follow-Up  ------------------------------->
				<div class="panel panel-primary">
					<div class="panel-heading">Today Birthdays</div>
					<div class="panel-body">
						<table class="table table-condensed table-striped table-bordered table-hover dataTable no-footer">
							<tr>
								<th>Name</th><th>Mobile No.</th>
							</tr>
                        </div>
					<?php foreach ($todos as $todo) { ?>
							<tr>
								<td><?= $todo->first_name." ". $todo->last_name;?></td><td><?=$todo->phone_number;?></td>
							</tr>
					<?php } ?>
						</table>
					</div>
				</div>
				<!--------------------------- Display To Do  ------------------------------->
			</div>
			<div class="col-md-8">
				<!--------------------------- Display Appointments  ------------------------------->
				<div class="panel panel-primary">
                    <div class="panel-heading">
						<?=date('d F Y, l', strtotime($day . "-" . $month . "-" . $year));?>   
						<?php $day = date('l', strtotime($day . "-" . $month . "-" . $year));?>  
						<?php $day_date=date('d', strtotime($day . "-" . $month . "-" . $year)); ?> 						
                    </div>
                    <div class="panel-body">
					<?php 
						$level = $this->session->userdata('category'); 
						//Clinic Start Time and Clinic End Time
						$start_time = timetoint($start_time);
						$end_time = timetoint($end_time);
						
					?>
						<!--------------------------- Display Doctor's Screen  ------------------------------->
					<?php if ($level == 'Doctor') {?>
						<div class="table-responsive"  style='position:relative;'>
							<table class="table table-condensed table-striped table-bordered table-hover dataTable no-footer"  >
								<thead>
									<tr>
										<th><?=$this->lang->line('time');?></th>
										<th><?=$this->lang->line('appointments');?></th>
										<th><?=$this->lang->line('waiting');?></th>
										<th><?=$this->lang->line('consultation');?></th>
										<th><?=$this->lang->line('complete');?></th>
										<th><?=$this->lang->line('cancel');?></th>
									</tr>
								</thead>
								<tbody>
								<?php
									//Doctor ID
									$userid = $this->session->userdata('id');
									global $time_intervals;
									$time_intervals = array();
									for ($i = $start_time; $i < $end_time; $i = $i + $time_interval) {
										$time = explode(":",inttotime($i));                    
										$time_intervals[] = $i*100;
										//echo $time;
										?>
										<tr>
											<th><?=inttotime12( $i ,$time_format);?></th><!-- Display the Time -->
											<td id="app<?=$i*100;?>" class="appointments"><a href='<?=base_url() . "index.php/appointment/add/" . $year . "/" . $month . "/" . $day_date . "/" . $time[0] . "/" . $time[1] . "/Appointments" ?>' class="add_appointment"></a></div></td>
											<td id="wai<?=$i*100;?>" class="waiting"><a href='<?=base_url() . "index.php/appointment/add/" . $year . "/" . $month . "/" . $day . "/" . $day_date . "/" . $time[0] . "/" . $time[1] . "/Waiting" ?>' class="add_appointment" ></a></div></td>
											<td id="con<?=$i*100;?>" class="consultation"><a href='<?=base_url() . "index.php/appointment/add/" . $year . "/" . $month . "/" . $day . "/" . $day_date . "/" . $time[0] . "/" . $time[1] . "/Consultation" ?>' class="add_appointment" ></a></div></td>
											<td id="com<?=$i*100;?>" class="complete"></td>
											<td id="can<?=$i*100;?>" class="cancel"></td>
										</tr>
							<?php }
								
								foreach ($appointments as $appointment) {
									$patient_id = $appointment['patient_id'];
										
									$appointment_id = $appointment['appointment_id'];
									if (strlen($appointment['title'])>12){ 
										$appointment_title = substr($appointment['title'],0,9)."..." ;
									}else{
										$appointment_title = $appointment['title'];
									}
									//Check if there are any more appointments of same time
									
									
									$start_position =  timetoint($appointment['start_time'])*100;
									$start_position = round($start_position);
									$start_position = nearest_timeinterval($start_position);
									
									$end_position =  timetoint($appointment['end_time'])*100;
									$end_position = round($end_position);
									$end_position = nearest_timeinterval($end_position);
									
									$appointment_column = 0;
									for($column = 1;$column <= 10;$column = $column + 1){
										$cell_available = FALSE;
										//Check if cell is empty
										if(!($cell[$doctor_id][$start_position][$column] > 0)){
											for($row = $start_position;$row<$end_position;$row = $row + ($time_interval * 100)){
												if(!($cell[$doctor_id][$row][$column] > 0)){
													$cell[$doctor_id][$row][$column] = $appointment_id;	
													$appointment_column = $column;
													$cell_available = TRUE;
												}else{
													//Clear the incorrect data
													for($r = $start_position;$r<$row;$r = $r + ($time_interval * 100)){
														$cell[$doctor_id][$r][$column] = 0;		
													}
													$cell_available = FALSE;
													break;	
												}
											}
											if($cell_available){ 
												break;
											}
										}
									}
									$nxt=false;
									$ca=false;
									switch($appointment['status']){
										case 'Appointments':
											$class = "btn-primary";
											$start_position = "app".$start_position;
											$end_position = "app".$end_position;
											$href = base_url() . "index.php/appointment/edit_appointment/" . $appointment_id ;
											$nxt=true;
											$nextstatus= base_url() ."index.php/appointment/change_status/". $appointment_id."/Waiting";
											$ca=true;
											$cancelapp= base_url() ."index.php/appointment/change_status/". $appointment_id."/Cancel";
											break;
										case 'Consultation':
											$class = "btn-danger";
											$start_position = "con".$start_position;
											$end_position = "con".$end_position;
											$href = base_url() . "index.php/patient/visit/" . $patient_id ."/" . $appointment_id ;
											$nxt=false;
											$ca=false;
											break;
										case 'Complete':
											$class = "btn btn-success";
											$start_position = "com".$start_position;
											$end_position = "com".$end_position;
											$href = base_url() . "index.php/patient/visit/" . $patient_id ."/" . $appointment_id ;
											$nxt=false;
											$ca=false;
											break;
										case 'Cancel':
											$class = "btn btn-info";
											$start_position = "can".$start_position;
											$end_position = "can".$end_position;
											$href = base_url() . "index.php/appointment/edit_appointment/" . $appointment_id ;
											$nxt=false;
											$ca=false;
											break;
										case 'Waiting':
											$class = "btn-warning";
											$start_position = "wai".$start_position;
											$end_position = "wai".$end_position;
											$href = base_url() . "index.php/appointment/edit_appointment/" . $appointment_id ;
											$nxt=true;
											$nextstatus= base_url() ."index.php/appointment/change_status/". $appointment_id."/Consultation";
											$ca=true;
											$cancelapp= base_url() ."index.php/appointment/change_status/". $appointment_id."/Cancel";
											break;
										default:
											break;
									}
						?>
									
									<div id="<?=$appointment_id;?>" start_position="<?=$start_position;?>" end_position="<?=$end_position;?>" appointment_column="<?=$appointment_column;?>"  style="display:none;" >
										<a href='<?=$href;?>' title="<?=$appointment['title'];?>" class="btn square-btn-adjust <?=$class;?> " style="height:100%;" ><?= $appointment_title;?></a><?php if ($nxt){?><a href='<?=$nextstatus;?>' class="btn square-btn-adjust <?=$class;?> " style="height:100%;"><i class="fa fa-arrow-circle-right"></i></a><?php } ?><?php if($ca){ ?><a href='<?=$cancelapp;?>'class="btn square-btn-adjust <?=$class;?>" style="height:100%;"><i class="fa fa-times"></i></a><?php } ?>
									</div>
									<script>
										$(window).load(function() {
											var start_position = $("#<?=$appointment_id;?>").attr( "start_position" );
											var end_position = $("#<?=$appointment_id;?>").attr( "end_position" );
											var s_position = $( "#" + start_position ).position();
											var e_position = $( "#" + end_position ).position();
											var height = e_position.top - s_position.top - 2;
											
											var appointment_column = $("#<?=$appointment_id;?>").attr( "appointment_column" ) - 1;
											var width = 100;
											width = width + 2;
											var element_left = s_position.left + ( appointment_column * width );
											$("#<?=$appointment_id;?>").attr("style","position:absolute;top:"+ s_position.top +"px;left:" + element_left +"px;height:"+height+"px");
											$("#<?=$appointment_id;?>").show();
										});
									</script>
									<?php 
									} 
									
									?>       
								</tbody>
							</table>
						</div>
					<?php
					} else {
					?><!--------------------------- Display Administration's Screen / Staff Scrren  ------------------------------->	
					<div style="position:relative;">
						<table class="table table-condensed table-striped table-bordered table-hover dataTable no-footer"  >
							<thead>
								<tr>
									<th><?=$this->lang->line('time');?></th>
									<?php 
									foreach ($doctors as $doctor) { ?>
									<th><?=$doctor['name'];?></th>
									<?php } ?>
								</tr>
							</thead>	
							<tbody>
								<?php
								global $time_intervals;
								$time_intervals = array();
								for ($i = $start_time; $i < $end_time; $i = $i + $time_interval){
									$time = explode(":",inttotime($i));
									$time_intervals[] = $i*100;
									?>
										<tr>
										<th><?=inttotime12( $i ,$time_format);?></th><!-- Display the Time -->
									<?php
										foreach ($doctors as $doctor) {
											$doctor_is_available = TRUE;												
																							
											if($doctor_active){
												foreach ($inavailability as $doctor_inavailability){
													if ($doctor_inavailability['userid']==$doctor['userid']){
														if ($i>=timetoint($doctor_inavailability['start_time']) && $i<timetoint($doctor_inavailability['end_time'])){
															//Doctor is not available
															$doctor_is_available = FALSE;
														}
													}
												}
												if ($doctor_is_available){
													foreach ($doctors_data as $doctor_data){
														foreach ($drschedules as $drschedules_inavailability){														
															if($drschedules_inavailability['doctor_id']==$doctor_data['doctor_id']){
																if ($doctor_data['userid']==$doctor['userid']){	
																	$schedule_day = $drschedules_inavailability['schedule_day'];
																	if (strpos($schedule_day,$day) !== false) {																	
																		if ($i>= timetoint($drschedules_inavailability['from_time']) && $i<= timetoint($drschedules_inavailability['to_time']) ){
																			//Doctor is not available
																			$doctor_is_available = TRUE;
																			break;
																		}else{
																			$doctor_is_available = FALSE;
																		}
																	}
																	else{
																		$doctor_is_available = FALSE;
																		break;
																	}
																}
															}
														}
													}
												}
											}
											if ($doctor_is_available){
												?><td id="<?=$doctor['userid'];?>_<?=$i*100;?>"><a href='<?=base_url() . "index.php/appointment/add/" . $year . "/" . $month . "/" . $day_date . "/" . $time[0] . "/" . $time[1] . "/Appointments/0/".$doctor['userid'] ?>' class="add_appointment"></a></td>	<?php
											}else{
												?><td id="<?=$doctor['userid'];?>_<?=$i*10;?>" bgcolor="gray"></td><?php
											}
											
										} ?>
										</tr>
								<?php }
									$cell = array();
									foreach ($appointments as $appointment) {
										$patient_id = $appointment['patient_id'];
										$appointment_id = $appointment['appointment_id'];
										$doctor_id = $appointment['userid'];
										if (strlen($appointment['title'])>12){ 
											$appointment_title = substr($appointment['title'],0,9)."..." ;
										}else{
											$appointment_title = $appointment['title'];
										}
										$start_position = timetoint($appointment['start_time'])*100;
										$start_position = round($start_position);
										$start_position = nearest_timeinterval($start_position);
										
										$end_position =  timetoint($appointment['end_time'])*100;
										$end_position = round($end_position);
										$end_position = nearest_timeinterval($end_position);
										
										$appointment_column = 0;
										for($column = 1;$column <= 10;$column = $column + 1){
											$cell_available = FALSE;
											//Check if cell is empty
											if(!($cell[$doctor_id][$start_position][$column] > 0)){
												for($row = $start_position;$row<$end_position;$row = $row + ($time_interval * 100)){
													if(!($cell[$doctor_id][$row][$column] > 0)){
														$cell[$doctor_id][$row][$column] = $appointment_id;	
														$appointment_column = $column;
														$cell_available = TRUE;
													}else{
														//Clear the incorrect data
														for($r = $start_position;$r<$row;$r = $r + ($time_interval * 100)){
															$cell[$doctor_id][$r][$column] = 0;		
														}
														$cell_available = FALSE;
														break;	
													}
												}
												if($cell_available){ 
													break;
												}
											}
										}
										switch($appointment['status']){
											case 'Appointments':
												$class = "btn-primary";
												$href = base_url() . "index.php/appointment/edit_appointment/" . $appointment_id ;
												break;
											case 'Consultation':
												$class = "btn-danger";
												$href = base_url() . "index.php/patient/visit/" . $patient_id."/".$appointment_id ;
												break;
											case 'Complete':
												$class = "btn-success";
												$href = "#";
												break;
											case 'Cancel':
												$class = "btn-info";
												$href = base_url() . "index.php/appointment/edit_appointment/" . $appointment_id ;
												break;
											case 'Waiting':
												$class = "btn-warning";
												$href = base_url() . "index.php/appointment/edit_appointment/" . $appointment_id ;
												break;
											default:
												$class = "btn-primary";
												$href = base_url() . "index.php/appointment/edit_appointment/" . $appointment_id ;
												break;
										}
										
										$start_position = $appointment['userid']."_".$start_position;
										$end_position = $appointment['userid']."_".$end_position;
								?>
									<div id="<?=$appointment_id;?>" start_position="<?=$start_position;?>" end_position="<?=$end_position;?>" appointment_column="<?=$appointment_column;?>"  style="display:none;" >
										<a href='<?=$href;?>' title="<?=$appointment['title'];?>" class="btn square-btn-adjust <?=$class;?> " style="height:100%;">
											<?= $appointment_title;?>
										</a>
									</div>
									<script>
										$(window).load(function() {
											var start_position = $("#<?=$appointment_id;?>").attr( "start_position" );
											var end_position = $("#<?=$appointment_id;?>").attr( "end_position" );
											var s_position = $( "#" + start_position ).position();
											var e_position = $( "#" + end_position ).position();
											var height = e_position.top - s_position.top - 2;
											
											var appointment_column = $("#<?=$appointment_id;?>").attr( "appointment_column" ) - 1;
											var width = 100;
											width = width + 2;
											var element_left = s_position.left + ( appointment_column * width );
											$("#<?=$appointment_id;?>").attr("style","position:absolute;top:"+ s_position.top +"px;left:" + element_left +"px;height:"+height+"px");
											$("#<?=$appointment_id;?>").show();
										});
									</script>
									<?php 
									}
									?>   
							</tbody>
						</table>
					</div>
                    <?php
                }
            
			echo "</tbody></table>";
			?>
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="col-md-6">
					<span class="btn square-btn-adjust btn-primary"><?=$this->lang->line('appointment');?></span>
				</div>
				<div class="col-md-6">
					<span class="btn square-btn-adjust btn-danger"><?=$this->lang->line('consultation');?></span>
				</div>
				<div class="col-md-6">
					<span class="btn square-btn-adjust btn-success"><?=$this->lang->line('complete') .' '. $this->lang->line('appointment');?></span>
				</div>
				<div class="col-md-6">
					<span class="btn square-btn-adjust btn-info"><?=$this->lang->line('cancelled') .' '. $this->lang->line('appointment');?></span>
				</div>
				<div class="col-md-6">
					<span class="btn square-btn-adjust btn-warning"><?=$this->lang->line('waiting');?></span>
				</div>
				<div class="col-md-6">
					<span class="btn square-btn-adjust btn-grey"><?=$this->lang->line('not_available');?></span>
				</div>
            </div>
			<?php
			echo "</div></br>";
			?>
			</div>
			
		</div>
	</div>
</div>
