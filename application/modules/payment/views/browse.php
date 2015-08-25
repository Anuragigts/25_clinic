<div id="page-inner">
	<div class="row">
		<div class="col-md-12">
			<!-- Advanced Tables -->
			<div class="panel panel-primary">
				<div class="panel-heading">
					Payments
				</div>
				<div class="panel-body">
					<a 	title="<?php echo $this->lang->line("add")." ".$this->lang->line("payment");?>" 
						href="<?php echo base_url()."index.php/payment/insert/0/payment" ?>" 
						class="btn btn-primary square-btn-adjust"
					>
							<?php echo $this->lang->line("add")." ".$this->lang->line("payment");?>
					</a>	
					<p></p>
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover" id="patient_table">
							<thead>
								<tr>
									<th><?php echo $this->lang->line("id");?></th>
									<th><?php echo $this->lang->line("date");?></th>
									<th><?php echo $this->lang->line("bill")." #";?></th>
									<th><?php echo $this->lang->line("patient");?></th>
									<th><?php echo $this->lang->line("amount");?></th>
									<th><?php echo $this->lang->line("payment_mode");?></th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1; ?>
								<?php foreach ($payments as $payment):  ?>
								<?php if(isset($payment['pay_date']) && $payment['pay_date'] != '0000-00-00'){?>
								<?php $payment_date = $payment['pay_date']; ?>
								<?php $payment_date = date('d-m-Y',strtotime($payment['pay_date'])); ?>
								<?php }else{ ?>
								<?php $payment_date = "--"; ?>
								<?php } ?>
								<tr <?php if ($i%2 == 0) { echo "class='even'"; } else { echo "class='odd'"; }?> >
									<td><?php echo $payment['payment_id']; ?></td>
									<td><?php echo $payment_date; ?></td>
									<td><?php echo $payment['bill_id']; ?></td>
									<td><?php echo $payment['first_name'] . ' ' . $payment['middle_name'] . ' ' . $payment['last_name']; ?></td>
									<td><?php echo currency_format($payment['pay_amount']); ?><?php if($currency_postfix) echo $currency_postfix['currency_postfix']; ?></td>
									<td><?php echo ucfirst($payment['pay_mode']); ?></td>
								</tr>
								<?php $i++; ?>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!--End Advanced Tables -->
		</div>
	</div>
</div>

