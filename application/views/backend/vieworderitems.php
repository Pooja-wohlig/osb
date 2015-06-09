
	    <section class="panel">
		    <header class="panel-heading">
				 Order Items Details
			</header>
			<div class="panel-body">
          <?php
$order=$this->input->get('id');
//echo "<br>";
//print_r($table);
?>
           <div class=" pull-right createbtn" ><a class="btn btn-primary" href="<?php echo site_url('site/createorderitems?id='.$this->input->get('id')); ?>"><i class="icon-plus"></i>Create </a></div>
            <div>
                <table class="table table-striped table-hover border-top " cellpadding="0" cellspacing="0" >
			<thead>
				<tr>
					<!--<th>Id</th>-->
					<th>id</th>
					<th>order</th>
					<th>product</th>
<!--					<th>Image</th>-->
                    <th>product SKU</th>
					<th>quantity</th>
					<th> price </th>
<!--					<th>discount</th>-->
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
<!--						<td><img class="img" height="100px" width="100px"src="http://www.lylaloves.co.uk/showimage?size=300&amp;image=<?php echo $row->image; ?>"></td>-->
                        <td><?php echo $row->sku; ?></td>
						<td><?php echo $row->quantity; ?></td>
						<td><?php echo $row->price; ?></td>
<!--						<td><?php echo $row->discount; ?></td>-->
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
			  