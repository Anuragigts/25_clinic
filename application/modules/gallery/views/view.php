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
</script>
<script type="text/javascript">
    function chkcontrol(j) {
        var total=0;
        for(var i=0; i < document.image_gallery.patient_image.length; i++){
            if(document.image_gallery.patient_image[i].checked){
                total =total +1;
            }
            if(total > 2){
                alert("Please Select only Two") 
                document.image_gallery.patient_image[j].checked = false ;
                return false;
            }
        }
    } 
//   $("input:checkbox").click(function() {
//
//  var bol = $("input:checkbox:checked").length >= 4;     
//  $("input:checkbox").not(":checked").attr("disabled",bol);	
</script>
<style>
	.gallery_image{
		width:100%;
		margin:0;
		height:auto;
	}
	.gallery_image_container{
		line-height:150px;
		vertical-align:middle;
		overflow:hidden;
	}
</style>
<div id="page-inner">
	<div class="row">
		<div class="col-md-12">
			
			<div class="panel panel-primary">
				<div class="panel-heading">
					<?php echo $patient['first_name'] . " " . $patient['last_name']; ?>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<a href="<?php echo base_url()."/index.php/patient/visit/" . $patient_id; ?>" class="btn btn-primary btn-sm square-btn-adjust"><?php echo $this->lang->line('back_to_visit');?></a>
					</div>
					<?php
					if ($error){
						?>
						<div class="alert alert-danger"><?= $error;?></div>
						<?php
					}
					?>	
					<?php echo form_open('gallery/add_image/', array('enctype' => 'multipart/form-data')); ?>	
						<div class="form-group">
							<img id="PreviewImage" src="<?php echo base_url()."images/Profile.png"; ?>" alt="Profile Image"  height="100" width="100" />
							<input type="file" id="userfile" name="userfile" value="" class="form-control" onchange="readURL(this);" />
						</div>
						<div class="form-group">
							<input type="submit" value="upload" name="upload" class="btn btn-primary btn-sm"/>
							<input type="hidden" name="patient_id" value="<?=$patient_id; ?>" />
							<input type="hidden" name="visit_id" value="<?php echo $visit_id; ?>" />
							<input type="hidden" name="display_id" value="<?php echo $patient->display_id; ?>" />    
						</div>
					<?php echo form_close(); ?>
				</div>
			</div>
			<div class="panel panel-primary">
				<div class="panel-heading">
					Gallery
				</div>
				<div class="panel-body">
					<form name="image_gallery" id="image_gallery" action="<?php echo site_url('gallery/image_compare') ?>" method="post">        
						<div class="img_wrapper">        
							<?php $i = 0;
							foreach ($images as $image) {
							?>
								<div class="col-md-3">
									<div class="panel panel-primary text-center no-boder bg-color-blue">
										<div class="panel-heading">
											<?= $image['img_name']; ?>
										</div>
										<div class="panel-body gallery_image_container">
											<a href="<?php echo base_url() . $image['visit_img_path']; ?>" data-lightbox="<?=$patient_id; ?>" title="<?= $image['img_name']; ?>">
												<img class="gallery_image" src="<?php echo base_url() . $image['visit_img_path']; ?>" />
											</a>
										</div>
										<div class="panel-footer back-footer-blue">
											<input class="form-control" type="checkbox" name="patient_image[]" value="<?php echo base_url() . $image['visit_img_path']. " ". $image['img_name']; ?>" />
                                        </div>
									</div> 	
								</div>
							<?php 
							$i++;
							} ?>         
						</div>
						<input type="hidden" name="patient_id" value="<?php echo $patient_id; ?>" />
						<input type="hidden" name="visit_id" value="<?php echo $visit_id; ?>" />
						<input type="hidden" name="patient_name" value="<?php echo $patient->first_name . " " . $patient->last_name; ?>" />               
						<div class="button_link">
							<button type="submit" name="submit" class="btn btn-primary"><?php echo $this->lang->line('compare');?></button>
						</div>                
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

			