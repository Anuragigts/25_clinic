<?php
$total = ($particular_total + $fees_total + $treatment_total + $item_total) - ((-1)*($balance));
?>
<html>
    <head>
        <title></title>
        <script type="text/javascript" language="javascript" src="<?= base_url() ?>js/jquery.dropdownPlain.js"></script>
        <link rel="stylesheet" href='<?= base_url() ?>assets/css/style.css' type="text/css"/>
    </head>
    <body>
        <div class="receipt">
            <div class="header">
                <h1><?= $clinic['clinic_name'] ?></h1>
                <h2><?= $clinic['tag_line'] ?></h2>
                <br/>
                <span style="clinic_address"><?= $clinic['clinic_address'] ?></span>
                <span class="contact"><strong><?php echo $this->lang->line('landline');?> : </strong><?= $clinic['landline'] ?>
                    <strong><?php echo $this->lang->line('mobile');?> : </strong><?= $clinic['mobile'] ?>
                    <strong><?php echo $this->lang->line('email');?> : </strong> <?= $clinic['email'] ?>
				</span>
                <hr/>
            </div>
            <h3><?php echo $this->lang->line('receipt');?></h3>
            <span class="bill_date"><strong><?php echo $this->lang->line('date');?> : </strong><?= date('d/m/Y h:i A', strtotime($bill['bill_date'])) ?></span>
            <span class="bill_no"><strong><?php echo $this->lang->line('receipt')." ".$this->lang->line('number');?> : </strong><?= $invoice['static_prefix'] . sprintf("%0" . $invoice['left_pad'] . "d", $bill['bill_id']) ?></span>
			<span class="patient_name"><strong><?php echo $this->lang->line('patient_name');?>: </strong><?php echo $patient['first_name'] . " " . $patient['middle_name'] . " " . $patient['last_name']; ?></span>
            <hr/>
            <span><?php echo $this->lang->line('receive_fee');?>:</span>
            <table>
                <tr>
                    <th class="particular"><?php echo $this->lang->line('particular');?></th>
					<th><?php echo $this->lang->line("quantity");?></th>
					<th><?php echo $this->lang->line("mrp");?></th>
                    <th class="amount"><?php echo $this->lang->line('amount');?></th>
					
                </tr>
				<?php foreach ($bill_details as $bill_detail){
                        if($bill_detail['type'] == 'particular'){
                 ?>                 
                <tr>
                    <td class="particular"><?php echo $bill_detail['particular']; ?></td>
					<td style="text-align:right;"><?php echo $bill_detail['quantity'] ?></td>                   
					<td style="text-align:right;"><?php echo currency_format($bill_detail['mrp']);if($currency_postfix) echo $currency_postfix['currency_postfix']; ?></td>
                    <td class="amount"><?php echo currency_format($bill_detail['amount']);if($currency_postfix) echo $currency_postfix['currency_postfix']; ?></td>
                </tr>
                <?php }
                } ?>
                <tr>                    
                    <th class="particular" colspan="3"><p style="text-align: left"><?=$this->lang->line('sub_total') . " - "  .$this->lang->line('particular') ;?></p></th>
                    <th class="amount"><?php echo currency_format($particular_total);if($currency_postfix) echo $currency_postfix['currency_postfix']; ?></th>
                </tr>
				<?php
					if (in_array("stock", $active_modules)) {
					foreach ($bill_details as $bill_detail){
                        if($bill_detail['type'] == 'item'){
                 ?>                 
                <tr>
                    <td class="particular"><?php echo $bill_detail['particular']; ?></td>
					<td style="text-align:right;"><?php echo $bill_detail['quantity'] ?></td>                   
					<td style="text-align:right;"><?php echo currency_format($bill_detail['mrp']);if($currency_postfix) echo $currency_postfix['currency_postfix']; ?></td>
                    <td class="amount"><?php echo currency_format($bill_detail['amount']);if($currency_postfix) echo $currency_postfix['currency_postfix']; ?></td>
                </tr>
                <?php }
                } ?>
                <tr>                    
                    <th class="particular" colspan="3"><p style="text-align: left"><?=$this->lang->line('sub_total') . " - "  .$this->lang->line('item') ;?></p></th>
                    <th class="amount"><?php echo currency_format($item_total);if($currency_postfix) echo $currency_postfix['currency_postfix']; ?></th>
                </tr>
				<?php } ?>
				<?php
					if (in_array("doctor", $active_modules)) {
					foreach ($bill_details as $bill_detail){
                        if($bill_detail['type'] == 'fees'){
                 ?>                 
                <tr>
                    <td class="particular"><?php echo $bill_detail['particular']; ?></td>
					<td style="text-align:right;"><?php echo $bill_detail['quantity'] ?></td>                   
					<td style="text-align:right;"><?php echo currency_format($bill_detail['mrp']);if($currency_postfix) echo $currency_postfix['currency_postfix']; ?></td>
                    <td class="amount"><?php echo currency_format($bill_detail['amount']);if($currency_postfix) echo $currency_postfix['currency_postfix']; ?></td>
                </tr>
                <?php }
                } ?>
                <tr>                    
                    <th class="particular" colspan="3"><p style="text-align: left"><?=$this->lang->line('sub_total') . " - "  .$this->lang->line('fees') ;?></p></th>
                    <th class="amount"><?php echo currency_format($fees_total);if($currency_postfix) echo $currency_postfix['currency_postfix']; ?></th>
                </tr>
				<?php } ?>
				<?php
					if (in_array("treatment", $active_modules)) {
					foreach ($bill_details as $bill_detail){
                        if($bill_detail['type'] == 'treatment'){
                 ?>                 
                <tr>
                    <td class="particular"><?php echo $bill_detail['particular']; ?></td>
					<td style="text-align:right;"><?php echo $bill_detail['quantity'] ?></td>                   
					<td style="text-align:right;"><?php echo currency_format($bill_detail['mrp']);if($currency_postfix) echo $currency_postfix['currency_postfix']; ?></td>
                    <td class="amount"><?php echo currency_format($bill_detail['amount']);if($currency_postfix) echo $currency_postfix['currency_postfix']; ?></td>
                </tr>
                <?php }
                } ?>
                <tr>                    
                    <th class="particular" colspan="3"><p style="text-align: left"><?=$this->lang->line('sub_total') . " - "  .$this->lang->line('treatment') ;?></p></th>
                    <th class="amount"><?php echo currency_format($treatment_total);if($currency_postfix) echo $currency_postfix['currency_postfix']; ?></th>
                </tr>
				<?php } ?>
                <tr>
                    <th class="particular" colspan="3">
					<?php if($balance < 0){ ?><p style="text-align: left"><?php echo $this->lang->line('prev_bal');?></p> <?php }else{ ?><p style="text-align: left"><?php echo $this->lang->line('prev_due');?></p><?php } ?>
					</th>
                    <?php if($balance < 0){ ?>
                    <th class="amount"><?php echo currency_format((-1)*$balance);if($currency_postfix) echo $currency_postfix['currency_postfix']; ?></th>
                    <?php }else{ ?>
                    <th class="amount"><?php echo currency_format((-1)*$balance);if($currency_postfix) echo $currency_postfix['currency_postfix']; ?></th>
                    <?php } ?>
                </tr>
                <tr>
                    <th class="particular" colspan="3"><?php echo $this->lang->line('total');?></th>
                    <th class="amount"><?= currency_format(number_format((float)$total, 2, '.', ''));if($currency_postfix) echo $currency_postfix['currency_postfix']; ?></th>
                </tr>
                <tr>
                    <th class="particular" colspan="3"><?php echo $this->lang->line('paid')." ".$this->lang->line('amount');?></th>
                    <th class="amount"><?= currency_format($paid_amount);if($currency_postfix) echo $currency_postfix['currency_postfix']; ?></th>
                </tr>
            </table>
            <span class="alignleft"><?php echo $this->lang->line('thanks');?></span>
            <span class="alignright"><?php echo $this->lang->line('for');?> <?= $clinic['clinic_name'] ?></span>
            <br/><br/><br/><br/>
            <span class="alignright"><?php echo $this->lang->line('signature');?></span>
			<input type="button" value="Print" id="print_button" onclick="window.print()">
			<style>
				@media print{
					#print_button{
						display:none;
					}
					
				}
			</style>
        </div>
    </div>
</body>
</html>