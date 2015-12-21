<section class="panel">
	<header class="panel-heading">
		User Details
	</header>
	<div class="panel-body">
		<form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/editusersubmit');?>" enctype="multipart/form-data">
			<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
			<div class="form-group">
				<label class="col-sm-2 control-label" for="normal-field">Email</label>
				<div class="col-sm-4">
					<?php echo $before->email; ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="normal-field">Name</label>
				<div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="name" value="<?php echo set_value('name',$before->name);?>">
				</div>
			</div>
			
			<div class=" form-group">
				<label class="col-sm-2 control-label" for="normal-field">Email</label>
				<div class="col-sm-4">
					<input type="email" id="normal-field" class="form-control" name="email" value="<?php echo set_value('email',$before->email);?>">
				</div>
			</div>
			<div class=" form-group">
				<label class="col-sm-2 control-label" for="description-field">Password</label>
				<div class="col-sm-4">
					<input type="password" id="description-field" class="form-control" name="password" value="">
				</div>
			</div>
			<div class=" form-group">
				<label class="col-sm-2 control-label" for="description-field">Confirm Password</label>
				<div class="col-sm-4">
					<input type="password" id="description-field" class="form-control" name="confirmpassword" value="">
				</div>
			</div>
			<div class=" form-group" style="display:none">
				  <label class="col-sm-2 control-label" for="normal-field">Message</label>
				  <div class="col-sm-4">
					  <textarea rows="4" cols="50" id="normal-field" class="form-control" name="message" value="<?php echo set_value('message',$before->message);?>"><?php echo set_value('message',$before->message);?></textarea>
				  </div>
				</div>
				<div class=" form-group">
				<label class="col-sm-2 control-label" for="normal-field">Personal Contact</label>
				<div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="personalcontact" value="<?php echo set_value('personalcontact',$before->personalcontact);?>">
				</div>
			</div>
<!--
			<div class=" form-group">
				<label class="col-sm-2 control-label" for="normal-field">SocialId</label>
				<div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="socialid" value="<?php echo set_value('socialid',$before->socialid);?>">
				</div>
			</div>
-->

<!--
			<div class=" form-group">
				<label class="col-sm-2 control-label">logintype</label>
				<div class="col-sm-4">
					<?php echo form_dropdown( 'logintype',$logintype,set_value( 'logintype',$before->logintype),'class="chzn-select form-control" data-placeholder="Choose a Logintype..."'); ?>
				</div>
			</div>
-->

			<div class=" form-group">
				<label class="col-sm-2 control-label">Status</label>
				<div class="col-sm-4">
					<?php echo form_dropdown( 'status',$status,set_value( 'status',$before->status),'class="chzn-select form-control" data-placeholder="Choose a Accesslevel..."'); ?>
				</div>
			</div>

			<div class=" form-group">
				<label class="col-sm-2 control-label">Select Accesslevel</label>
				<div class="col-sm-4">
					<?php echo form_dropdown( 'accesslevel',$accesslevel,set_value( 'accesslevel',$before->accesslevel),'onchange="operatorcategories()"class="chzn-select form-control" data-placeholder="Choose a Accesslevel..."'); ?>
				</div>
			</div>

			<div class=" form-group">
				<label class="col-sm-2 control-label" for="normal-field">Image</label>
				<div class="col-sm-4">
					<input type="file" id="normal-field" class="form-control" name="image" value="<?php echo set_value('image',$before->image);?>">
					<?php if($before->image == "") { } else { ?>
					<img src="<?php echo base_url('uploads')." / ".$before->image; ?>" width="140px" height="140px">
					<?php } ?>
				</div>
			</div>

<!--
			<div class=" form-group">
				<label class="col-sm-2 control-label" for="normal-field">json</label>
				<div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="json" value="<?php echo set_value('json',$before->json);?>">
				</div>
			</div>
-->
			<div class=" form-group">
				<label class="col-sm-2 control-label" for="normal-field">Shopname</label>
				<div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="shopname" value="<?php echo set_value('shopname',$before->shopname);?>">
				</div>
			</div>
			<div class=" form-group">
				<label class="col-sm-2 control-label" for="normal-field">Membership no</label>
				<div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="membershipno" value="<?php echo set_value('membershipno',$before->membershipno);?>">
				</div>
			</div>
			<div class=" form-group">
				<label class="col-sm-2 control-label" for="normal-field">Address</label>
				<div class="col-sm-4">
					<textarea type="text" id="normal-field" class="form-control" name="address" value="<?php echo set_value('address',$before->address);?>"><?php echo set_value('address',$before->address);?></textarea>
				</div>
			</div>
			<div class=" form-group">
				  <label class="col-sm-2 control-label">Area</label>
				  <div class="col-sm-4">
					<?php
						
						echo form_dropdown('area',$area,set_value('area',$before->area),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
					?>
				  </div>
				</div>
			<div class=" form-group">
				<label class="col-sm-2 control-label" for="normal-field">Description</label>
				<div class="col-sm-4">
					<textarea rows="4" cols="50" id="normal-field" class="form-control" name="description" value="<?php echo set_value('description',$before->description);?>"><?php echo set_value('description',$before->description);?></textarea>
				</div>
			</div>
			<div class=" form-group">
				<label class="col-sm-2 control-label" for="normal-field">Website</label>
				<div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="website" value="<?php echo set_value('website',$before->website);?>">
				</div>
			</div>
			<div class=" form-group">
				<label class="col-sm-2 control-label" for="normal-field">Shop contact1</label>
				<div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="shopcontact1" value="<?php echo set_value('shopcontact1',$before->shopcontact1);?>">
				</div>
			</div>
			<div class=" form-group">
				<label class="col-sm-2 control-label" for="normal-field">Shop contact2</label>
				<div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="shopcontact2" value="<?php echo set_value('shopcontact2',$before->shopcontact2);?>">
				</div>
			</div>
			<div class=" form-group">
				<label class="col-sm-2 control-label" for="normal-field">Shop Email</label>
				<div class="col-sm-4">
					<input type="email" id="normal-field" class="form-control" name="shopemail" value="<?php echo set_value('shopemail',$before->shopemail);?>">
				</div>
			</div>
			<?php
					$accesslevel=$this->session->userdata('accesslevel');
				  if($accesslevel==1)
				  {
				  ?>
			<div class=" form-group" style="display:none">
				<label class="col-sm-2 control-label" for="normal-field">Purchase Balance</label>
				<div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="purchasebalance" value="<?php echo set_value('purchasebalance',$before->purchasebalance);?>">
				</div>
			</div>
			<div class=" form-group" style="display:none">
				<label class="col-sm-2 control-label" for="normal-field">Sales Balance</label>
				<div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="salesbalance" value="<?php echo set_value('salesbalance',$before->salesbalance);?>">
				</div>
			</div>
			<?php }
				  ?>
			<div class=" form-group">
				<label class="col-sm-2 control-label" for="normal-field">Barter Percentage (in %)</label>
				<div class="col-sm-4">
					<input type="text" id="normal-field" maxlength="3" class="form-control" name="percentpayment" value="<?php echo set_value('percentpayment',$before->percentpayment);?>">
				</div>
			</div>
			<div class=" form-group">
				<label class="col-sm-2 control-label" for="normal-field">Shop Logo</label>
				<div class="col-sm-4">
					<input type="file" id="normal-field" class="form-control" name="shoplogo" value="<?php echo set_value('shoplogo',$before->shoplogo);?>">
					<?php if($before->shoplogo == "") { } else { ?>
					<img src="<?php echo base_url('uploads')." / ".$before->shoplogo; ?>" width="140px" height="140px">
					<?php } ?>
				</div>
			</div>
			
			<!--			shipping and billing-->
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Billing Address</label>
				  <div class="col-sm-4">
					  <textarea rows="4" cols="50" id="normal-field" class="form-control" name="billingaddress" value="<?php echo set_value('billingaddress',$before->billingaddress);?>"><?php echo set_value('billingaddress',$before->billingaddress);?></textarea>
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Billing City</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="billingcity" value="<?php echo set_value('billingcity',$before->billingcity);?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Billing State</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="billingstate" value="<?php echo set_value('billingstate',$before->billingstate);?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Billing Country</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="billingcountry" value="<?php echo set_value('billingcountry',$before->billingcountry);?>">
				  </div>
				</div>
				
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Billing Pincode</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="billingpincode" value="<?php echo set_value('billingpincode',$before->billingpincode);?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Shipping Address</label>
				  <div class="col-sm-4">
					  <textarea rows="4" cols="50" id="normal-field" class="form-control" name="shippingaddress" value="<?php echo set_value('shippingaddress',$before->shippingaddress);?>"><?php echo set_value('shippingaddress',$before->shippingaddress);?></textarea>
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Shipping City</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="shippingcity" value="<?php echo set_value('shippingcity',$before->shippingcity);?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">shippingcountry</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="shippingcountry" value="<?php echo set_value('shippingcountry',$before->shippingcountry);?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Shipping State</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="shippingstate" value="<?php echo set_value('shippingstate',$before->shippingstate);?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Shipping Pincode</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="shippingpincode" value="<?php echo set_value('shippingpincode',$before->shippingpincode);?>">
				  </div>
				</div>
				
<!--
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Online Status</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="onlinestatus" value="<?php echo set_value('onlinestatus',$before->onlinestatus);?>">
				  </div>
				</div>
-->
			<div class=" form-group">
				  <label class="col-sm-2 control-label">Is New User</label>
				  <div class="col-sm-4">
					<?php
						
						echo form_dropdown('onlinestatus',$onlinestatus,set_value('onlinestatus',$before->onlinestatus),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
					?>
				  </div>
				</div>
			<div class=" form-group">
				  <label class="col-sm-2 control-label">Shop Status</label>
				  <div class="col-sm-4">
					<?php
						
						echo form_dropdown('shopstatus',$shopstatus,set_value('shopstatus',$before->shopstatus),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
					?>
				  </div>
				</div>
			<div class=" form-group">
				<label class="col-sm-2 control-label">&nbsp;</label>
				<div class="col-sm-4">
					<button type="submit" class="btn btn-primary">Save</button>
					<a href="<?php echo site_url('site/viewusers'); ?>" class="btn btn-secondary">Cancel</a>
				</div>
			</div>
		</form>
	</div>
</section>
<script type="text/javascript">
	function operatorcategories() {
		console.log($('#accesslevelid').val());
		if ($('#accesslevelid').val() == 2) {
			$(".categoryclass").show();
		} else {
			$(".categoryclass").hide();
		}

	}
</script>