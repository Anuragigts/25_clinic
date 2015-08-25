<?php

$full_path = $file_upload['full_path'];
$file_path = $file_upload['file_path'];
$file_name = $file_upload['file_name'];
$raw_name =  $file_upload['raw_name'];

?>
<div id="page-inner">
	<div class="row">
		<div class="col-md-12">
			<?php if ($error){
				echo "<div class='alert alert-danger'>$error</div>";
			}else{
			?>
			<div class="alert alert-success">
				Extracting <?php echo $file_name; ?>...<br/>
				<?php
					$return_code = unzip($full_path,$file_path);
					if($return_code === TRUE){
						?><a href="<?=base_url() . "index.php/module/activate_module/" . $raw_name;?>" class="btn btn-primary square-btn-adjust">Activate</a><?php
					}else{
						?>
						<div class="alert alert-success">
						<?php echo $return_code; ?>
						</div>
						<?php
					}
				?>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
