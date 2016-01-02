<div class="row" style="padding:1% 0">
    <div class="col-md-12">
        <a class="btn btn-primary pull-right" href="<?php echo site_url("site/createorderitem"); ?>"><i class="icon-plus"></i>Create </a> &nbsp;
    </div>
   
</div>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Ordered Items
            </header>
            <div class="drawchintantable">
                <?php $this->chintantable->createsearch("");?>
                <table class="table table-striped table-hover" id="" cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <th data-field="id">ID</th>
                            <th data-field="product">product</th>
                            <th data-field="quantity">quantity</th>
                            <th data-field="price">price</th>
                            <th data-field="finalprice">finalprice</th>
                            <th data-field="Action">Action</th>
                      
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
                return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.product + "</td><td>" + resultrow.quantity + "</td><td>" + resultrow.price + "</td><td>" + resultrow.finalprice + "</td><td><a class='btn btn-primary btn-xs' href='<?php echo site_url('site/editorderitem?id=');?>" + resultrow.id + "'><i class='icon-pencil'></i></a></td></tr>";
            }
            generatejquery("<?php echo $base_url;?>");
        </script>
    </div>
</div>

<!--

	    <section class="panel">
		    <header class="panel-heading">
				 Order Items Details
			</header>
			<div class="panel-body">
          <?php
$order=$this->input->get('id');
           <div class=" pull-right createbtn" ><a class="btn btn-primary" href="<?php echo site_url('site/createorderitems?id='.$this->input->get('id')); ?>"><i class="icon-plus"></i>Create </a></div>
            <div>
                <table class="table table-striped table-hover border-top " cellpadding="0" cellspacing="0" >
			<thead>
				<tr>
					<th>id</th>
					<th>order</th>
					<th>product</th>
                    <th>product SKU</th>
					<th>quantity</th>
					<th> price </th>
					<th> finalprice </th>
					<th> Actions </th>
				</tr>
			</thead>
			<tbody>
			   <?php foreach($table as $row) { ?>
					<tr >
						<td class="id"><?php echo $row->id; ?></td>
						<td><?php echo $row->name; ?></td>
						<td><?php echo $row->productname; ?></td>
                        <td><?php echo $row->sku; ?></td>
						<td><?php echo $row->quantity; ?></td>
						<td><?php echo $row->price; ?></td>
						<td><?php echo $row->finalprice; ?></td>
						<td> <a class="btn btn-primary btn-xs" href="<?php echo site_url('site/editorderitem?id=').$row->id.'&order='.$order;?>"><i class="icon-pencil"></i></a>
						<a href="<?php echo site_url('site/deleteorderitem?id=').$row->id.'&order='.$order; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this item?');">
								<i class="icon-trash "></i>
							</a> 
					  </td>
					</tr>
					<?php } ?>
			</tbody>
			</table>
               <br></br>
                
            </div>
</section>
			  -->
