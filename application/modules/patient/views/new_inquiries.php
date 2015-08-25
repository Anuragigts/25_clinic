<div id="page-inner">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<?php echo $this->lang->line("new_inquires");?>
				</div>
			</div>
			<div class="panel-body">
				<?php if ($patients_detail) { ?>
				<table class="table table-striped table-bordered table-hover dataTable no-footer" id="new_inquires" >
                    <tr>
						<th><?php echo $this->lang->line("patient")." ".$this->lang->line("name");?></th>
						<th><?php echo $this->lang->line("phone_number");?></th>
						<th><?php echo $this->lang->line("visit");?></th>
					</tr>
                    <?php foreach ($patients_detail as $patient_detail) { ?>
                        <tr>
                            <td><?php echo $patient_detail['patient_name']; ?></td>
                            <td><?php echo $patient_detail['phone_number']; ?></td>
                            <td><?php echo $patient_detail['count']; ?></td>
                        </tr>                    
                    <?php
                    }
                    ?>            
				</table>
				<?php }else{ ?>
					<?php echo $this->lang->line("no") . " " .$this->lang->line("new_inquires") . " " . $this->lang->line("found");?>	
				<?php } ?>
				
        </div>
    </body>
</html>