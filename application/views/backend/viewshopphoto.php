<div class="row" style="padding:1% 0">
<div class="col-md-12">
<a class="btn btn-primary pull-right"  href="<?php echo site_url("site/createshopphoto?id=").$this->input->get('id'); ?>"><i class="icon-plus"></i>Create </a> &nbsp; 
</div>
</div>																				
<div class="row">
<div class="col-lg-12">
<section class="panel">
<header class="panel-heading">
Shopphoto Details
</header>
<div class="drawchintantable">
<?php $this->chintantable->createsearch("shopphoto List");?>
<table class="table table-striped table-hover" id="" cellpadding="0" cellspacing="0" >
<thead>
<tr>
<th data-field="id">ID</th>
<th data-field="user">User</th>
<th data-field="photo">Photo</th>
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
return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.user + "</td><td>" + resultrow.photo + "</td><td><a class='btn btn-primary btn-xs' href='<?php echo site_url('site/editshopphoto?id=');?>" + resultrow.user + "&shopid="+resultrow.id+"'><i class='icon-pencil'></i></a><a class='btn btn-danger btn-xs' onclick=\"return confirm('Are you sure you want to delete?');\" href='<?php echo site_url('site/deleteshopphoto?id=');?>" + resultrow.user + "&shopid="+resultrow.id+"'><i class='icon-trash '></i></a></td></tr>";	
}
generatejquery("<?php echo $base_url;?>");
</script>
</div>
</div>
