<div class="row" style="padding:1% 0">
<div class="col-md-12">
<a class="btn btn-primary pull-right"  href="<?php echo site_url("site/createnotification"); ?>"><i class="icon-plus"></i>Create </a> &nbsp; 
</div>
    <div><a class="btn btn-primary" href="<?php echo site_url('site/exportnotificationcsv'); ?>"target="_blank"><i class="icon-plus"></i>Export to CSV </a></div> 
    <div class="col-md-12">
<a class="btn btn-primary pull-right"  href="<?php echo site_url("site/viewbroadcast"); ?>">Go to Broadcast </a> &nbsp; 
</div> 
</div>
<div class="row">
<div class="col-lg-12">
<section class="panel">
<header class="panel-heading">
Notification Details
</header>
<div class="drawchintantable">
<?php $this->chintantable->createsearch("Notification List");?>
<table class="table table-striped table-hover" id="" cellpadding="0" cellspacing="0" >
<thead>
<tr>
<th data-field="id">ID</th>
<th data-field="user">User</th>
<th data-field="type">Type</th>
<th data-field="timestamp">Timestamp</th>
<!--<th data-field="message">Message</th>-->
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
	if(resultrow.type=="1"){
	resultrow.type="offer";
	}
	if(resultrow.type=="2"){
	resultrow.type="transaction";
	}
return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.user + "</td><td>" + resultrow.type + "</td><td>" + resultrow.timestamp + "</td><td><a class='btn btn-primary btn-xs' href='<?php echo site_url('site/editnotification?id=');?>"+resultrow.id+"'><i class='icon-pencil'></i></a><a class='btn btn-danger btn-xs' onclick=\"return confirm('Are you sure you want to delete?');\" href='<?php echo site_url('site/deletenotification?id='); ?>"+resultrow.id+"'><i class='icon-trash '></i></a></td></tr>";
}
generatejquery("<?php echo $base_url;?>");
</script>
</div>
</div>
