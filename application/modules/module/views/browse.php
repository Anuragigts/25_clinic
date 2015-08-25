<script type="text/javascript" charset="utf-8">
$(window).load(function() {
    $('.confirmDeactivate').click(function(){
		return confirm("<?=$this->lang->line('areyousure_deactivate');?>");
	});	
	$('.confirmClearData').click(function(){
		return confirm("<?=$this->lang->line('areyousure_cleardata');?>");
	});	
} )
</script>
<div id="page-inner">
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-12">
				<h3>Extensions</h3>
				<a href="<?=base_url() . "index.php/module/upload/";?>" class="btn btn-success square-btn-adjust"><?=$this->lang->line('upload_extension');?></a>
			</div>
			<?php foreach($modules as $module) { ?>
				<div class="col-md-3 col-sm-6 col-xs-6">           
					<div class="panel panel-back noti-box">
						<div class="text-box">
							<p class="main-text"><?=$module['module_display_name'] ;?></p>
							<p class="text-muted"><?=$module['module_description'] ;?></p>
							<?php //Check if folder exists ?>
							<?php $dir_name =  './application/modules/'.$module['module_name']; ?>
							<?php if (file_exists($dir_name) && is_dir($dir_name)) { ?>
								<?php if($module['module_status']==1) { ?>
									<a href="<?=base_url() . "index.php/module/deactivate_module/" . $module['module_name'];?>" class="btn btn-danger square-btn-adjust confirmDeactivate"><?=$this->lang->line('deactivate');?></a>
								<?php } else { ?>
									<a href="<?=base_url() . "index.php/module/activate_module/" . $module['module_name'];?>" class="btn btn-success square-btn-adjust"><?=$this->lang->line('activate');?></a><br/><br/>
									<a href="<?=base_url() . "index.php/module/clear_data/" . $module['module_name'];?>" class="btn btn-warning square-btn-adjust confirmClearData"><?=$this->lang->line('clear_data');?></a>
								<?php }  ?>
							<?php }else{  ?>
								<a href="#" class="btn btn-default square-btn-adjust"><?=$this->lang->line('file_missing');?></a>		
							<?php }  ?>
						</div>
					 </div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>