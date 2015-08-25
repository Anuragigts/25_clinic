<style>
	.gallery_image{
		width:100%;
		margin:0;
		height:auto;
	}
	.gallery_image_container{
		line-height:400px;
		height:400px;
		vertical-align:middle;
		overflow:hidden;
	}
</style>
<div id="page-inner">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<?php echo $patient['first_name'] ." ". $patient['last_name']; ?>
				</div>
				<div class="panel-body">
					<?php foreach($images as $image){ ?>
					<div class="col-md-6">
						<div class="panel panel-primary">
							<?php $img = explode(" ", $image); ?>
							<div class="panel-heading">
								<?php echo $img[1]; ?>
							</div>
							<div class="panel-body gallery_image_container">
								<img class="gallery_image" src="<?php echo $img[0]; ?>" />
							</div>
						</div>
					</div>
					<?php } ?>
					<div class="col-md-12">	
						<a class="btn btn-primary" href="<?php echo base_url()."/index.php/gallery/index/" . $this->input->post('patient_id') . "/" . $this->input->post('visit_id')  ?>"><?php echo $this->lang->line('gallery');?></a>
					</div>
				</div>
			</div> 
		</div>   
	</div>
</div>