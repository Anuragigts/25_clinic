<script type="text/javascript">
 
    $(document).ready(function(){
 
        $(".slidingDiv").hide();
        $(".show_hide").show();
 
        $('.show_hide').click(function(){
            $(".slidingDiv").slideToggle();
        });
 
    });
 
</script>
<style>
    .slidingDiv {
        /*        height:300px;*/
        padding:20px;
        margin-top:10px;
        /*        border-bottom:5px solid #3399FF;*/
    }

    .show_hide {
        display:none;
    }


</style>
<script type="text/javascript" charset="utf-8">
    $(function() {
        $( "#followup_date" ).datepicker({
            dateFormat: "dd-mm-yy",
            showButtonPanel: true,
            changeMonth: true,
            changeYear: true
        });
    });
</script>
<?php
	
$y = date('Y');
$m = date('n');
$d = date('j');
//$timezone = $this->settings_model->get_time_zone();
$timezone = "Asia/Calcutta";

if (function_exists('date_default_timezone_set'))
{
	date_default_timezone_set($timezone);
}
$t = date('H:i');
$time = explode(":", $t);
?>
<div id="page-inner">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
			<div class="panel-heading">
					<?php echo $this->lang->line("follow_up");?>
			</div>
			<div class="panel-body">
			<div class="form-group">        
				<a class="btn btn-primary" href='<?=base_url() . "index.php/appointment/add/" . $y . "/" . $m . "/" . $d . "/" . $time[0] . "/" . $time[1] . "/Appointments/" . $patient_id ?>' ><?php echo $this->lang->line("add")." ".$this->lang->line("appointment");?></a>
				<a class="btn btn-primary" href="<?php echo base_url() . 'index.php/patient/dismiss_followup/' . $patient_id ?> "><?php echo $this->lang->line("dismissed")." ".$this->lang->line("follow_up");?></a>
				<a class="btn btn-primary" href="<?php echo base_url() . 'index.php/patient/edit/' . $patient_id ?> "><?php echo $this->lang->line("edit")." ".$this->lang->line("patient");?></a>
			</div>
			<?php 
			$followup=$followup_date;
			if ($followup!="0000-00-00"){
				$follow_up = date('Y-m-d', strtotime($followup));    
			}else{
				$follow_up ="";
			}
			?>
			<?php echo form_open('patient/change_followup_date/' . $patient_id) ?>
			<div class="form-group">
				<label for="patient_name"><?php echo $this->lang->line("patient")." ".$this->lang->line("name");?></label>
				<input readonly='readonly' type="text" name="patient_name" id="patient_name" class="form-control" value="<?php echo $patient['first_name'] . ' ' . $patient['middle_name']. ' ' . $patient['last_name']; ?>"/>
			</div>
			<div class="form-group">
				<label for="phone_number"><?php echo $this->lang->line("phone_number");?></label>
				<input readonly='readonly' type="text" name="phone_number" id="phone_number" class="form-control" value="<?php echo $patient['phone_number']; ?>"/>
			</div>
			<div class="form-group">
				<label for="followup_date"><?php echo $this->lang->line("follow_up")." ".$this->lang->line("date");?></label>
				<input type="date" name="followup_date" id="followup_date" class="form-control" value="<?php echo $follow_up; ?>"/>
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit" name="submit" /><?php echo $this->lang->line("save");?></button>
			</div>
			</div>
			</div>
		</div>
	</div>
</div>