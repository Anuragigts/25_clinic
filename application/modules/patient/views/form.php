<script type="text/javascript">
function readURL(input) {
	if (input.files && input.files[0]) {//Check if input has files.
		var reader = new FileReader(); //Initialize FileReader.

		reader.onload = function (e) {
		$('#PreviewImage').attr('src', e.target.result);
		$("#PreviewImage").resizable({ aspectRatio: true, maxHeight: 300 });
		};
		reader.readAsDataURL(input.files[0]);
	}else {
		$('#PreviewImage').attr('src', "#");
	}
}
$(window).load(function(){
	$('#dob').datetimepicker({
		timepicker:false,
		format: '<?=$def_dateformate;?>',
	}); 
}); 
</script>
<?php $today = date($def_dateformate); ?>
<div id="page-inner">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<?php echo $this->lang->line('patient');?>
				</div>
				<div class="panel-body">
					<?php echo form_open_multipart('patient/edit/' . $patient_id) ?>
					<?php if(isset($error)) {echo "<div class='alert alert-danger'>".$error."</div>";} ?>
					<?php if (isset($patient_id)) {?>
					<input type="hidden" name="contact_id" class="inline" value="<?= $contacts['contact_id']; ?>"/>
					<input type="hidden" name="patient_id" class="inline" value="<?= $patient_id; ?>"/>
					<?php }?>
					<div class="col-md-12">
						<div class="col-md-3">
							<label for="first_name"><?php echo $this->lang->line('name');?></label> 
						</div>
						<div class="col-md-3">
							<input type="input" name="first_name" class="form-control" value="<?php echo $contacts['first_name'] ?>"/>
							<?php echo form_error('first_name','<div class="alert alert-danger">','</div>'); ?>
						</div>
						<div class="col-md-3">
							<input type="input" name="middle_name" class="form-control" value="<?php echo $contacts['middle_name'] ?>"/>						
							<?php echo form_error('middle_name','<div class="alert alert-danger">','</div>'); ?>
						</div>
						<div class="col-md-3">
							<input type="input" name="last_name" class="form-control" value="<?php echo $contacts['last_name'] ?>"/>
							<?php echo form_error('last_name','<div class="alert alert-danger">','</div>'); ?>
						</div>
					</div>
					<div class="col-md-12">
						<p></p>
					</div>
					<div class="col-md-12">
						<div class="col-md-6">
							<div class="form-group">
								<label for="display_id"><?php echo $this->lang->line('patient_id');?></label>
								<input type="input" name="display_id" class="form-control" value="<?php echo $patient['display_id']; ?>"/>
								<?php echo form_error('display_id','<div class="alert alert-danger">','</div>'); ?>
							</div>
							<div class="form-group">
								<label for="display_name"><?php echo $this->lang->line('display_name');?></label>
								<input type="input" name="display_name" class="form-control" value="<?php echo $contacts['display_name']; ?>"/>
								<?php echo form_error('display_name','<div class="alert alert-danger">','</div>'); ?>
							</div>
							<div class="form-group">
								<label for="reference_by">Reference By</label>
								<input type="input" name="reference_by" class="form-control" value="<?php echo $patient['reference_by']; ?>"/>
								<?php echo form_error('reference_by','<div class="alert alert-danger">','</div>'); ?>
							</div>
							<div class="form-group">
								<label for="phone_number"><?php echo $this->lang->line('phone_number');?></label>
								<input type="input" name="phone_number" class="form-control" value="<?php echo $contacts['phone_number']; ?>"/><br/>
								<?php echo form_error('phone_number','<div class="alert alert-danger">','</div>'); ?>
							</div>
							<div class="form-group">
								<label for="email"><?php echo $this->lang->line('email');?></label>
								<input type="input" name="email" class="form-control" value="<?php  echo $contacts['email']; ?>"/><br/>
								<?php echo form_error('email','<div class="alert alert-danger">','</div>'); ?>
							</div>
							<div class="form-group">
								<label for="dob">Date of Birth</label>
								<input id="dob" class="form-control" type="text" value="<?= ($patient['dob'])?$patient['dob']:$today;?>" name="dob"><br/>
								<?php echo form_error('dob','<div class="alert alert-danger">','</div>'); ?>
							</div>
							<div class="form-group">
								<button class="btn btn-primary" type="submit" name="submit" /><?php echo $this->lang->line('save');?></button>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<?php if($contacts['contact_image']!=""){ ?>
								<img id="PreviewImage" src="<?php echo base_url().$contacts['contact_image']; ?>" alt="Profile Image"  height="100" width="100" />
								<?php }else{ ?>
								<img id="PreviewImage" src="<?php echo base_url()."images/Profile.png"; ?>" alt="Profile Image"  height="100" width="100" />
								<?php } ?>
								<input type="file" id="userfile" name="userfile" class="form-control" size="20" onchange="readURL(this);" />
								<input type="hidden" id="src" name="src" value="<?php echo $contacts['contact_image']; ?>" />
								<?php echo form_error('userfile','<div class="alert alert-danger">','</div>'); ?>
							</div>
							<div class="form-group">
								<label for="type"><?php echo $this->lang->line('addresstype');?></label> 
								<select name="type" class="form-control">
									<option></option>
									<option value="Home" <?php if ($contacts['type'] == "Home") { echo "selected"; } ?>><?php echo $this->lang->line('home');?></option>
									<option value="Office" <?php if ($contacts['type'] == "Office") { echo "selected"; } ?>><?php echo $this->lang->line('office');?></option>
								</select>
								<?php echo form_error('type','<div class="alert alert-danger">','</div>'); ?>
							</div>
							<div class="form-group">
								<label for="type"><?php echo $this->lang->line('address') . " " . $this->lang->line('line1');?></label> 
								<input type="input"  class="form-control" name="address_line_1" value="<?php echo $contacts['address_line_1']; ?>"/>
								<?php echo form_error('address_line_1','<div class="alert alert-danger">','</div>'); ?>
							</div>
							<div class="form-group">
								<label for="type"><?php $this->lang->line('address') . " " . $this->lang->line('line2');?></label> 
								<input type="input" class="form-control" name="address_line_2" value="<?php echo $contacts['address_line_2']; ?>"/>
								<?php echo form_error('address_line_2','<div class="alert alert-danger">','</div>'); ?>
							</div>
							<div class="form-group">
								<label for="city"><?php echo $this->lang->line('city');?></label> 
								<input type="input" class="form-control" name="city" value="<?php echo $contacts['city']; ?>"/>
								<?php echo form_error('city','<div class="alert alert-danger">','</div>'); ?>
							</div>
							<div class="form-group">
								<label for="state"><?php echo $this->lang->line('state');?></label> 
								<input type="input" class="form-control" name="state" value="<?php echo $contacts['state']; ?>"/>
								<?php echo form_error('state','<div class="alert alert-danger">','</div>'); ?>
							</div>
							<div class="form-group">
								<label for="postal_code"><?php echo $this->lang->line('postal_code');?></label> 
								<input type="input" class="form-control" name="postal_code" value="<?php echo $contacts['postal_code']; ?>"/>
								<?php echo form_error('postal_code','<div class="alert alert-danger">','</div>'); ?>
							</div>
							<div class="form-group">
								<label for="country"><?php echo $this->lang->line('country');?></label> 
								<input type="input" class="form-control" name="country" value="<?php echo $contacts['country']; ?>"/>
								<?php echo form_error('country','<div class="alert alert-danger">','</div>'); ?>
							</div>    
						</div>
					</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</div>