<script>
	$(window).load(function() {    
	
		$('.confirmRestore').click(function(){
			return confirm("This is a irreversible process. This may cause loss in data.Are you really really sure you want to restore the database?");
		});
	});
</script>
<div class="panel panel-primary">	
	<div class="panel-heading">
		Take Backup
	</div>
	<div class="panel-body">
		<a class="btn btn-success square-btn-adjust" title="Take Backup" href="<?php echo site_url("settings/take_backup/"); ?>"><?php echo $this->lang->line('take_backup');?></a>
		<br/><br/>
		<?php if(isset($error)){?>
			<div class="alert alert-danger">
				<?=$error;?>
			</div>
		<?php } ?>
	</div>
</div>
<div class="panel panel-primary">	
	<div class="panel-heading">
		Restore Backup
	</div>
	<div class="panel-body">
		<?php echo form_open_multipart('settings/restore_backup/'); ?>
			<div class="alert alert-danger">
				This is a irreversible process.
				It may cause loss of data. Be really really sure before restoring data.
			</div>
			<div class="form-group">
				<input type="file" id="backup" name="backup" class="form-control" size="20" />
			</div>
			<div class="form-group">
				<button class="btn btn-primary btn-sm square-btn-adjust confirmRestore" type="submit" name="submit" /><?php echo $this->lang->line('restore');?></button>
			</div>
		<?php echo form_close(); ?>
	</div>
</div>