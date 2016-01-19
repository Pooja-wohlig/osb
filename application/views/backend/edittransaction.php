<section class="panel">
<header class="panel-heading">
Transaction Details
</header>
<div class="panel-body">
<form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/edittransactionsubmit");?>' enctype= 'multipart/form-data'>
<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
<!--
<div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">Buyer</label>
<div class="col-sm-4">
<?php echo form_dropdown("userto",$userto,set_value('userto',$userto),"class='chzn-select form-control'");?>
</div>
</div>
-->
    <?php if($before->userfrom==1){?>
     <div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">Buyer</label>
<div class="col-sm-4">
<input type="text" id="normal-field" readonly=true class="form-control" name="userto" value='<?php echo set_value('userto',$userto);?>'>
</div>
</div>
    <?php }
    else {?>
    <div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">Seller</label>
<div class="col-sm-4">
<?php echo form_dropdown("userto",$userto,set_value('userto',$before->userto),"class='chzn-select form-control'");?>
</div>
</div>
   <?php }?>
    
    <?php if($before->userfrom==1){?>
<div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">Seller</label>
<div class="col-sm-4">
<?php echo form_dropdown("userfrom",$userfrom,set_value('userfrom',$before->userfrom),"class='chzn-select form-control'");?>
</div>
</div>
      <?php }
    else {?>
    <div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">Buyer</label>
<div class="col-sm-4">
<?php echo form_dropdown("userfrom",$userfrom,set_value('userfrom',$before->userfrom),"class='chzn-select form-control'");?>
</div>
</div>
     <?php }?>
<!--
<div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">Transaction Status</label>
<div class="col-sm-4">
<?php echo form_dropdown("transactionstatus",$transactionstatus,set_value('transactionstatus',$before->transactionstatus),"class='chzn-select form-control'");?>
</div>
</div>
-->
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">Reason</label>
<div class="col-sm-4">
<input type="text" id="normal-field" class="form-control"  name="reason" value='<?php echo set_value('reason',$before->reason);?>'>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">Amount</label>
<div class="col-sm-4">
<input type="text" id="normal-field" class="form-control"  name="amount" value='<?php echo set_value('amount',$before->amount);?>'>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">Payable Amount</label>
<div class="col-sm-4">
<input type="text" id="normal-field" class="form-control" readonly=true name="payableamount" value='<?php echo set_value('payableamount',$before->payableamount);?>'>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">Time stamp</label>
<div class="col-sm-4">
<input type="text" id="normal-field" class="form-control" readonly=true name="timestamp" value='<?php echo set_value('timestamp',$before->timestamp);?>'>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
<div class="col-sm-4">
<button type="submit" class="btn btn-primary">Save</button>
<a href='<?php echo site_url("site/viewtransaction"); ?>' class='btn btn-secondary'>Cancel</a>
</div>
</div>
</form>
</div>
</section>
