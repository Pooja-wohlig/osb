<section class="panel">
<header class="panel-heading">
Request Details
</header>
<div class="panel-body">
<form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/editrequestsubmit");?>' enctype= 'multipart/form-data'>
<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
 
    <?php if($before->userfrom==1){?>
<div class=" form-group" >
<label class="col-sm-2 control-label" for="normal-field">Seller</label>
<div class="col-sm-4"  >
<!--<?php echo form_dropdown("userfrom",$userfrom,set_value('userfrom',$userfrom),"class='chzn-select form-control'");?>-->
    <input type="text" id="normal-field" class="form-control" readonly="true" name="userfrom" value='<?php echo set_value('userfrom',$userfrom);?>'>
</div>
</div>
    <div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">Buyer</label>
<div class="col-sm-4">
<!--<?php echo form_dropdown("userto",$userto,set_value('userto',$userto),"class='chzn-select form-control' ");?>-->
      <input type="text" id="normal-field" class="form-control" readonly="true" name="userto" value='<?php echo set_value('userto',$userto);?>'>
</div>
</div>
    <?php } else {?>
    <div class=" form-group" >
<label class="col-sm-2 control-label" for="normal-field">Buyer</label>
<div class="col-sm-4"  >
<!--<?php echo form_dropdown("userfrom",$userfrom,set_value('userfrom',$userfrom),"class='chzn-select form-control'");?>-->
 <input type="text" id="normal-field" class="form-control" name="userfrom" readonly="true" value='<?php echo set_value('userfrom',$userfrom);?>'>
        </div>
</div>
    <div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">Seller</label>
<div class="col-sm-4">
<!--<?php echo form_dropdown("userto",$userto,set_value('userto',$userto),"class='chzn-select form-control' ");?>-->
      <input type="text" id="normal-field" class="form-control" name="userto" readonly="true" value='<?php echo set_value('userto',$userto);?>'>

</div>
</div>
    <?php }?>
    
    


<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">Amount</label>
<div class="col-sm-4">
<input type="text" id="normal-field" class="form-control" readonly="true" name="amount" value='<?php echo set_value('amount',$before->amount);?>'>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">Reason</label>
<div class="col-sm-4">
<input type="text" id="normal-field" class="form-control" readonly="true" name="reason" value='<?php echo set_value('reason',$before->reason);?>'>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">Approval Reason</label>
<div class="col-sm-4">
<input type="text" id="normal-field" class="form-control" name="approvalreason" value='<?php echo set_value('approvalreason',$before->approvalreason);?>'>
</div>
</div>
<div class="form-group" >
<label class="col-sm-2 control-label" for="normal-field">Time stamp</label>
<div class="col-sm-4">
<input type="text" id="normal-field" class="form-control" readonly="true" name="timestamp" value='<?php echo set_value('timestamp',$before->timestamp);?>'>
</div>
</div>
    <div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">Request Status</label>
<div class="col-sm-4">
<?php echo form_dropdown("requeststatus",$requeststatus,set_value('requeststatus',$before->requeststatus),"class='chzn-select form-control'");?>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
<div class="col-sm-4">
<button type="submit" class="btn btn-primary">Save</button>
<a href='<?php echo site_url("site/viewrequest"); ?>' class='btn btn-secondary'>Cancel</a>
</div>
</div>
</form>
</div>
</section>
<script>
$('#cf_1268591').attr("disabled", true); 
</script>
