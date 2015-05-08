<section class="panel">
<header class="panel-heading">
request Details
</header>
<div class="panel-body">
<form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/editrequestsubmit");?>' enctype= 'multipart/form-data'>
<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
<div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">User From</label>
<div class="col-sm-4">
<?php echo form_dropdown("userfrom",$userfrom,set_value('userfrom',$before->userfrom),"class='chzn-select form-control'");?>
</div>
</div>
<div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">User to</label>
<div class="col-sm-4">
<?php echo form_dropdown("userto",$userto,set_value('userto',$before->userto),"class='chzn-select form-control'");?>
</div>
</div>
<div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">Request Status</label>
<div class="col-sm-4">
<?php echo form_dropdown("requeststatus",$requeststatus,set_value('requeststatus',$before->requeststatus),"class='chzn-select form-control'");?>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">Amount</label>
<div class="col-sm-4">
<input type="text" id="normal-field" class="form-control" name="amount" value='<?php echo set_value('amount',$before->amount);?>'>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">Approval Reason</label>
<div class="col-sm-4">
<input type="text" id="normal-field" class="form-control" name="approvalreason" value='<?php echo set_value('approvalreason',$before->approvalreason);?>'>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">Time stamp</label>
<div class="col-sm-4">
<input type="text" id="normal-field" class="form-control" name="timestamp" value='<?php echo set_value('timestamp',$before->timestamp);?>'>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
<div class="col-sm-4">
<button type="submit" class="btn btn-primary">Save</button>
<a href='<?php echo site_url("site/viewpage"); ?>' class='btn btn-secondary'>Cancel</a>
</div>
</div>
</form>
</div>
</section>
