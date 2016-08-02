<div class="row" style="padding:1% 0">
	<!-- <div class="col-md-12">
		<a class="btn btn-primary pull-right" href="<?php echo site_url("site/createhotel"); ?>"><i class="icon-plus"></i>Create </a> &nbsp;
	</div> -->

</div>
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<div class="drawchintantable">
				<?php $this->chintantable->createsearch("Hotel List");?>
				<table class="table table-striped table-hover" id="" cellpadding="0" cellspacing="0">
					<thead>
						<tr>
							<th data-field="id">ID</th>
							<th data-field="hotelname">Name</th>
							<th data-field="timestamp">Timestamp</th>
<!--							<th data-field="view">View</th>-->
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
				return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.hotelname + "</td><td>" + resultrow.timestamp + "</td><td><a class='btn btn-primary btn-xs' href='<?php echo site_url('site/edithotel?id=');?>" + resultrow.id + "'><i class='icon-pencil'></i></a><a class='btn btn-danger btn-xs' onclick=\"return confirm('Are you sure you want to delete?');\" href='<?php echo site_url('site/deletehotel?id='); ?>"+resultrow.id+"'><i class='icon-trash '></i></a><a class='btn btn-primary btn-xs' href='<?php echo site_url('site/sendmessagetoall?id=');?>" + resultrow.id + "'><i class='icon-share-sign'></i></a></td></tr>";
			}
			generatejquery("<?php echo $base_url;?>");
		</script>
	</div>
</div>
