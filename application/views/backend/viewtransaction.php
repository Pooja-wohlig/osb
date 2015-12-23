<div class="row" style="padding:1% 0">
<!--
<div class="col-md-12">
<a class="btn btn-primary pull-right"  href="<?php echo site_url("site/createtransaction"); ?>"><i class="icon-plus"></i>Create </a> &nbsp; 
</div>
-->
</div>
<div class="row">
<div class="col-lg-12">
<section class="panel">
<header class="panel-heading">
Transaction Details
</header>

 <form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/viewtransactionadmin");?>' enctype= 'multipart/form-data'>
  <div class="form-group">
	  <label class="col-sm-2 control-label" for="normal-field"><strong>Start Date</strong></label>
   <div class="col-sm-4">
    <input type="date" id="normal-field" class="form-control" name="sd" value='<?php echo set_value(' sd ',$sd);?>'>
      </div>
          </div><?php echo $sd;?>
    <div class="form-group">
   <label class="col-sm-2 control-label" for="normal-field"><strong>End Date</strong></label>
   <div class="col-sm-4">
   <input type="date" id="normal-field" class="form-control" name="ed" value='<?php echo set_value(' ed ',$ed);?>'>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    
	</form>
<a class="btn btn-default btn-labeled fa fa-plus margined pull-right" href="<?php echo site_url("site/exportexcelreport?sd=".$sd."&ed=".$ed); ?>"target="_blank">Export CSV</a>

<div class="drawchintantable">
<?php $this->chintantable->createsearch("Transaction List");?>
<table class="table table-striped table-hover" id="" cellpadding="0" cellspacing="0" >
<thead>
<tr>
<th data-field="id">ID</th>
<th data-field="userto">User to</th>
<th data-field="userfrom">User From</th>
<!--<th data-field="transactionstatus">Transaction Status</th>-->
<!--<th data-field="reason">Reason</th>-->
<th data-field="amount">Amount</th>
<th data-field="payableamount">Payable Amount</th>
<th data-field="timestamp">Time stamp</th>
<th data-field="action">Actions</th>
</tr>
</thead>
<tbody>
</tbody>
</table>
<?php $this->chintantable->createpagination();?>
</div>
</section>
<script>
function drawtable(resultrow) {
return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.userto + "</td><td>" + resultrow.userfrom + "</td><td>" + resultrow.amount + "</td><td>" + resultrow.payableamount + "</td><td>" + resultrow.timestamp + "</td><td><a class='btn btn-primary btn-xs' href='<?php echo site_url('site/edittransaction?id=');?>"+resultrow.id+"'><i class='icon-pencil'></i></a></td></tr>";
}
generatejquery("<?php echo $base_url;?>");
</script>
</div>
</div>
