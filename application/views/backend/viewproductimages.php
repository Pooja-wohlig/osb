<div class=" row" style="padding:1% 0;">
	<!-- <div class="col-md-11">

		<a class="btn btn-primary pull-right"  href="<?php echo site_url('site/createproductimages?id=').$this->input->get('id'); ?>"><i class="icon-plus"></i>Create </a> &nbsp;
	</div> -->

</div>
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
                product Image Details of "<?php echo $before['product']->name;?>" product
            </header>
			<table class="table table-striped table-hover fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
			<thead>
				<tr>
					<!--<th>Id</th>-->
					<th>Images</th>
					<!-- <th>Order</th> -->
					<th> Actions </th>
				</tr>
			</thead>
			<tbody>
			   <?php foreach($table as $row) { ?>
					<tr>
						<!--<td><?php echo $row->id;?></td>-->
						<td><img src="<?php echo base_url('uploads')."/".$row->image; ?>" width="70px" height="auto"></td>
						<!-- <td><?php echo $row->order;?></td> -->

						<td>
							<a href="<?php echo site_url('site/editproductimages?id=').$row->id.'&productid='.$row->product;?>" class="btn btn-primary btn-xs">
								<i class="icon-pencil"></i>
							</a>
							<a href="<?php echo site_url('site/deleteproductimages?id=').$row->id.'&productid='.$row->product; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this item?');">
								<i class="icon-trash "></i>
							</a>

						</td>
					</tr>
					<?php } ?>
			</tbody>
			</table>
		</section>
	</div>
</div>
