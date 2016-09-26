	    <section class="panel">
		    <header class="panel-heading">
				 product Details
			</header>
			<div class="panel-body">
			  <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/editproductimagessubmit');?>" enctype= "multipart/form-data">
				<input type="text" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$beforeproductimages->id);?>" style="display:none;">

				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">image</label>
				  <div class="col-sm-4">
					<input type="file" id="normal-field" class="form-control" name="image" value="<?php echo set_value('image',$beforeproductimages->image);?>">
					<?php if($beforeproductimages->image == "")
						 { }
						 else
						 { ?>
							<img src="<?php echo base_url('uploads')."/".$beforeproductimages->image; ?>" width="140px" height="140px">
						<?php }
					?>
				  </div>
				</div>

				<div class="form-group" style="display:none;">
				  <label class="col-sm-2 control-label" for="normal-field">Order</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="order" value="<?php echo set_value('order',$beforeproductimages->order);?>">
				  </div>
				</div>

				<div class="form-group" style="display:none;">
				  <label class="col-sm-2 control-label" for="normal-field">productid</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="product" value="<?php echo $product;?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label">&nbsp;</label>
				  <div class="col-sm-4">
				  <button type="submit" class="btn btn-primary">Save</button>
				  <a href= "javascript:history.go(-1)" class="btn btn-secondary">Cancel</a>
				  <!-- <a href="<?php echo site_url('site/viewproduct'); ?>" "javascript:history.go(-1)" class="btn btn-secondary">Cancel</a> -->
				</div>
				</div>
			  </form>
			</div>
		</section>
