<script type="text/javascript" charset="utf-8">
$(document).ready(function() { 
	$('.confirmDelete').click(function(){
		return confirm(<?=$this->lang->line("areyousure_delete");?>);
	});
	
	var list_fees=[<?php $i = 0;
		foreach ($fees as $fee) {
			if ($i > 0) { echo ",";}
			echo '{value:"' . $fee['detail'] . '",amount:"' . $fee['fees'] . '"}';
			$i++;
		}?>];
	$("#fees_detail").autocomplete({
		autoFocus: true,
		source: list_fees,
		minLength: 1,//search after one characters
		
		select: function(event,ui){
			//do something
			$("#fees_amount").val(ui.item ? ui.item.amount : '');
			
		},
		change: function(event, ui) {
			 if (ui.item == null) {
				$("#fees_amount").val('');
				$("#fees_detail").val('');
			}
		},
		response: function(event, ui) {
			if (ui.content.length === 0) 
			{
				$("#fees_amount").val('');
				$("#fees_detail").val('');
			}
		}
	});   
	
	
});
</script>
<?php
	$total = ($particular_total + $fees_total + $treatment_total + $item_total) - ((-1)*($balance));
?>
<div id="page-inner">
	<div class="row">
		<div class="col-md-12">		
			<div class="panel panel-primary">
			<div class="panel-heading">
					<?=$this->lang->line("new")." ".$this->lang->line("bill");?>
			</div>
			<div class="panel-body">
				<div class="form-group">
					<a class="btn btn-primary" href="<?php echo base_url() . "index.php/patient/visit/" . $patient_id; ?>"><?php echo $this->lang->line("back_to_visit");?></a>
					<a class="btn btn-primary" title="<?php echo $this->lang->line("print");?>" target="_blank" href="<?php echo site_url("patient/print_receipt/" . $visit_id.'/'.$this->uri->segment(4)); ?>"><?php echo $this->lang->line("print")." ".$this->lang->line("receipt");?></a>
						<a class="btn btn-primary" title="<?php echo $this->lang->line("payment");?>" href="<?php echo site_url("payment/insert/" . $bill_id . "/bill"); ?>"><?php echo $this->lang->line("bill")." ".$this->lang->line("payment");?></a>
					<span class="alert-danger"><?php echo validation_errors(); ?></span>
				</div>		
				<div>
					<div class="form-group">
						<input type="hidden" name="visit_id" value="<?=$visit_id?>"/>
						<input type="hidden" name="patient_id" value="<?=$patient_id?>"/>
						<input type="hidden" name="bill_id" value="<?=$bill_id?>"/>
						<label for="bill_number">Bill Number : <?php echo $bill_id;?></label><br/>
						<label for="doctor_name">Doctor Name : <?php echo $doctor_name;?></label><br/>
						<label for="patient"><?php echo $this->lang->line("patient");?> : <?=$patient['first_name'] . " " . $patient['middle_name']. " " . $patient['last_name'];?></label><br/>
						<label for="bill_date"><?php echo $this->lang->line("date");?> : <?php echo $visit_date; ?></label>
					</div>
					<div class="panel panel-primary">
						<div class="panel-heading">
							<?php echo $this->lang->line("bill");?>
						</div>
						<div class="panel-body">
							<?php echo form_open('patient/bill/' . $visit_id . '/' . $patient_id) ?>
								<div class="form-group">
									<div class="col-md-12">
										<div class="col-md-3">
											<?php echo $this->lang->line("particular");?>
										</div>
										<div class="col-md-3">
											Quantity
										</div>
										<div class="col-md-3">
											<?php echo $this->lang->line("amount");?>
										</div>
										<div class="col-md-3">
											
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12">
										<div class="col-md-3">
											<input type="hidden" name="action" value="particular">
											<input name="particular" id="particular" class="form-control" value=""/>
										</div>
										<div class="col-md-3">
											<input type="text" name="item_quantity" class="form-control" id=""/>
										</div>
										<div class="col-md-3">
											<input type="text" name="particular_amount" class="form-control" id="amount"/>
										</div>
										<div class="col-md-3">
											<button class="btn btn-primary" type="submit" name="submit" value="particular" /><?php echo $this->lang->line("add");?></button>
										</div>
									</div>						
								</div>
								<?php if (in_array("stock",$active_modules)) { ?>
								<script>
									$(window).load(function() {
										var items_list=[<?php $i = 0;
										foreach ($items as $item) {
											if ($i > 0) { echo ",";}
											echo '{value:"' . $item['item_name'] . '",amount:"' . $item['mrp'] . '",available_quantity:"'.$item['available_quantity'].'",item_id:"'.$item['item_id'].'"}';
											$i++;
										}?>];
										$("#item_name").autocomplete({
											autoFocus: true,
											source: items_list,
											minLength: 1,//search after one characters
											
											select: function(event,ui){
												//do something
												$("#item_amount").val(ui.item ? ui.item.amount : '');
												$("#available_quantity").val(ui.item ? ui.item.available_quantity : '');
												$("#item_id").val(ui.item ? ui.item.item_id : '');
												$("#item_quantity").val(1);
												
											},
											change: function(event, ui) {
												 if (ui.item == null) {
													$("#item_id").val('');
													$("#item_amount").val('');
													$("#item_name").val('');
													$("#available_quantity").val('');
												}
											},
											response: function(event, ui) {
												if (ui.content.length === 0) 
												{
													$("#item_id").val('');
													$("#item_amount").val('');
													$("#item_name").val('');
													$("#available_quantity").val('');
												}
											}
										});
									});
								</script>
								<div class="form-group">
									<div class="col-md-12">
										<div class="col-md-3">
											<?php echo $this->lang->line("item");?>
										</div>
										<div class="col-md-2">
											<?php echo $this->lang->line("quantity");?>
										</div>
										<div class="col-md-2">
											<?php echo $this->lang->line("available");?>
										</div>
										<div class="col-md-2">
											<?php echo $this->lang->line("amount");?>
										</div>
										<div class="col-md-3">
											
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12">
										<div class="col-md-3">
											<input type="hidden" name="action" value="item">
											<input type="hidden" name="item_id" id="item_id" value="">
											<input name="item_name" id="item_name" class="form-control" value=""/>
										</div>
										<div class="col-md-2">
											<input type="text" name="item_quantity" id="item_quantity" class="form-control" />
										</div>
										<div class="col-md-2">
											<input type="text" name="available_quantity" id="available_quantity" class="form-control" readonly="readonly" />
										</div>
										<div class="col-md-2">
											<input type="text" name="item_amount" id="item_amount" class="form-control" />
										</div>
										<div class="col-md-3">
											<button class="btn btn-primary" type="submit" name="submit" value="item" /><?php echo $this->lang->line("add");?></button>
										</div>
									</div>						
								</div>
								<?php }?>
								<?php if (in_array("doctor",$active_modules)) {?>
									<script type="text/javascript" charset="utf-8">
									$(window).load(function() { 
										var list_fees=[<?php $i = 0;
											foreach ($fees as $fee) {
												if ($i > 0) { echo ",";}
												echo '{value:"' . $fee['detail'] . '",amount:"' . $fee['fees'] . '"}';
												$i++;
											}?>];
										$("#fees_detail").autocomplete({
											autoFocus: true,
											source: list_fees,
											minLength: 1,//search after one characters
											
											select: function(event,ui){
												//do something
												$("#fees_amount").val(ui.item ? ui.item.amount : '');
												
											},
											change: function(event, ui) {
												 if (ui.item == null) {
													$("#fees_amount").val('');
													$("#fees_detail").val('');
												}
											},
											response: function(event, ui) {
												if (ui.content.length === 0) 
												{
													$("#fees_amount").val('');
													$("#fees_detail").val('');
												}
											}
										});   
									});
									</script>
								<div class="form-group">
									<div class="col-md-12">
										<div class="col-md-3">
											<?php echo $this->lang->line("fees");?>
										</div>
										<div class="col-md-3">
											<?php echo $this->lang->line("amount");?>
										</div>
										<div class="col-md-3">
											
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12">
										<div class="col-md-3">
											<input type="hidden" name="action" value="fees">
											<input name="fees_detail" id="fees_detail" class="form-control" value=""/>
										</div>
										<div class="col-md-3">
											<input type="text" name="fees_amount" id="fees_amount" class="form-control" id="amount"/>
										</div>
										<div class="col-md-3">
											<button class="btn btn-primary" type="submit" name="submit" value="fees" /><?php echo $this->lang->line("add");?></button>
										</div>
									</div>						
								</div>
								<?php }?>
								<?php if (in_array("treatment",$active_modules)) {
								?>
									<script type="text/javascript" charset="utf-8">
									$(window).load(function() { 
										var list_fees=[<?php $i = 0;
											foreach ($treatments as $treatment) {
												if ($i > 0) { echo ",";}
												echo '{value:"' . $treatment['treatment'] . '",amount:"' . $treatment['price'] . '"}';
												$i++;
											}?>];
										$("#treatment").autocomplete({
											autoFocus: true,
											source: list_fees,
											minLength: 1,//search after one characters
											
											select: function(event,ui){
												//do something
												$("#treatment_price").val(ui.item ? ui.item.amount : '');
												
											},
											change: function(event, ui) {
												 if (ui.item == null) {
													$("#treatment_price").val('');
													$("#treatment").val('');
												}
											},
											response: function(event, ui) {
												if (ui.content.length === 0) 
												{
													$("#treatment_price").val('');
													$("#treatment").val('');
												}
											}
										});   
									});
									</script>
								<div class="form-group">
									<div class="col-md-12">
										<div class="col-md-3">
											<?php echo $this->lang->line("treatment");?>
										</div>
										<div class="col-md-3">
											<?php echo $this->lang->line("amount");?>
										</div>
										<div class="col-md-3">
											
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12">
										<div class="col-md-3">
											<input type="hidden" name="action" value="treatment">
											<input name="treatment" id="treatment" class="form-control" value=""/>
										</div>
										<div class="col-md-3">
											<input type="text" name="treatment_price" id="treatment_price" class="form-control" id="amount"/>
										</div>
										<div class="col-md-3">
											<button class="btn btn-primary" type="submit" name="submit" value="treatment" /><?php echo $this->lang->line("add");?></button>
										</div>
									</div>						
								</div>
								<?php }?>
							<?php echo form_close(); ?>
						</div>
					</div>
					<div class="panel panel-primary">
						<div class="panel-heading">
							<?php echo $this->lang->line("bill");?>
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover" id="bill_table">
									<thead>
										<tr>
											<th><span style="color:black;"><?php echo $this->lang->line("particular");?></span></th>
											<th><?php echo $this->lang->line("quantity");?></th>
											<th><?php echo $this->lang->line("mrp");?></th>
											<th><?php echo $this->lang->line("amount");?></th>
											<th>Action</th>
										</tr>									
									</thead>
									<tbody>
									
										<?php if ($bill_details != NULL) {                 
												$i=1;
												$current_type='';
												foreach ($bill_details as $bill_detail) {                     
													if ($current_type=='') {
														$current_type=$bill_detail['type'];                            
													}elseif($current_type <> $bill_detail['type']){ 
														?>
														<tr>
															<th style="text-align:left;" colspan="3"><?php echo $this->lang->line('sub_total');?> - <?php echo $this->lang->line($current_type);?></th>
															<?php if($current_type == "fees"){ ?>
																<th style="text-align:right;"><?=currency_format($fees_total);if($currency_postfix) echo $currency_postfix['currency_postfix']; ?></th>
															<?php }elseif($current_type == "item"){ ?>
																<th style="text-align:right;"><?=currency_format($item_total);if($currency_postfix) echo $currency_postfix['currency_postfix']; ?></th>
															<?php }elseif($current_type == "particular"){ ?>
																<th style="text-align:right;"><?=currency_format($particular_total);if($currency_postfix) echo $currency_postfix['currency_postfix']; ?></th>
															<?php }elseif($current_type == "treatment"){ ?>
																<th style="text-align:right;"><?=currency_format($treatment_total);if($currency_postfix) echo $currency_postfix['currency_postfix']; ?></th>
															<?php } ?>
															<td>&nbsp;</td>
														</tr>	
														<?php
														$current_type=$bill_detail['type'];
													}
												?>
												<tr <?php if ($i % 2 == 0) { echo "class='alt'";} ?> >
													<td><?php echo $bill_detail['particular'] ?></td>						
													<td style="text-align:right;"><?php echo $bill_detail['quantity'] ?></td>
													<td style="text-align:right;"><?php echo currency_format($bill_detail['mrp']);if($currency_postfix) echo $currency_postfix['currency_postfix']; ?></td>
													<td style="text-align:right;"><?php echo currency_format($bill_detail['amount']);if($currency_postfix) echo $currency_postfix['currency_postfix']; ?></td>
													<td><a class=" btn btn-primary confirmClick"  title="<?php echo "Delete : " . $bill_detail['particular'] ?>" href="<?php echo site_url("patient/delete_bill_detail/" . $bill_detail['bill_detail_id'] . "/" . $bill_id . "/" . $visit_id . "/" . $patient_id); ?>"><?php echo $this->lang->line("delete");?></a></td>
												</tr>
											<?php $i++; ?>
											<?php } ?>
											<tr>
												<th style="text-align:left;" colspan="3"><?php echo $this->lang->line('sub_total');?> - <?php echo $this->lang->line($current_type);?></th>
												<?php if($current_type == "fees"){ ?>
													<th style="text-align:right;"><?=currency_format($fees_total);if($currency_postfix) echo $currency_postfix['currency_postfix']; ?></th>
												<?php }elseif($current_type == "item"){ ?>
													<th style="text-align:right;"><?=currency_format($item_total);if($currency_postfix) echo $currency_postfix['currency_postfix']; ?></th>
												<?php }elseif($current_type == "particular"){ ?>
													<th style="text-align:right;"><?=currency_format($particular_total);if($currency_postfix) echo $currency_postfix['currency_postfix']; ?></th>
												<?php }elseif($current_type == "treatment"){ ?>
													<th style="text-align:right;"><?=currency_format($treatment_total);if($currency_postfix) echo $currency_postfix['currency_postfix']; ?></th>
												<?php } ?>
												<td>&nbsp;</td>
											</tr>	
											 <tr>
												<?php if($balance < 0) { ?>
												<th style="text-align:left;" colspan="3"><?php echo $this->lang->line("prev_bal");?></th>
												<?php } else { ?>
												<th style="text-align:left;" colspan="3"><?php echo $this->lang->line("prev_due");?></th>
												<?php } ?>
												<th style="text-align:right;"><?= currency_format((-1)*$balance);if($currency_postfix) echo $currency_postfix['currency_postfix']; ?> </th>
												<td>&nbsp;</td>
											</tr>
											<tr class='total'>
												<th style="text-align:left;" colspan="3" ><?php echo $this->lang->line("total");?></th>
												<th style="text-align:right;"><?= currency_format($total);if($currency_postfix) echo $currency_postfix['currency_postfix']; ?></th>
												<td>&nbsp;</td>
											</tr>
											<tr>
												<th style="text-align: left;" colspan="3" >Amount Paid</th>
												<th style="text-align: right;"><?= currency_format($paid_amount);if($currency_postfix) echo $currency_postfix['currency_postfix']; ?></th>
												<td>&nbsp;</td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>