<section class="panel">
	<header class="panel-heading">
		User Details
	</header>
	<div class="panel-body">
		<form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/editusersubmit');?>" enctype="multipart/form-data">
			<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
			<!-- <div class="form-group">
				<label class="col-sm-3 control-label" for="normal-field">Email</label>
				<div class="col-sm-4">
					<?php echo $before->email; ?>
				</div>
			</div> -->
			<div class=" form-group">
				<label class="col-sm-3 control-label" for="normal-field">Membership no *</label>
				<div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="membershipno" value="<?php echo set_value('membershipno',$before->membershipno);?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="normal-field">Owner Name *</label>
				<div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="name" value="<?php echo set_value('name',$before->name);?>">
				</div>
			</div>
			<div class=" form-group">
				<label class="col-sm-3 control-label" for="normal-field">Company's Name *</label>
				<div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="shopname" value="<?php echo set_value('shopname',$before->shopname);?>">
				</div>
			</div>

			<div class=" form-group" style="display:none">
				<label class="col-sm-3 control-label" for="normal-field">Admin Email</label>
				<div class="col-sm-4">
					<input type="email" id="normal-field" class="form-control" name="email" value="<?php echo set_value('email',$before->email);?>">
				</div>
			</div>
			<div class=" form-group" style="display:none">
				  <label class="col-sm-3 control-label" for="normal-field">Message *</label>
				  <div class="col-sm-4">
					  <textarea rows="4" cols="50" id="normal-field" class="form-control" name="message" value="<?php echo set_value('message',$before->message);?>"><?php echo set_value('message',$before->message);?></textarea>
				  </div>
				</div>

<!--
			<div class=" form-group">
				<label class="col-sm-3 control-label" for="normal-field">SocialId</label>
				<div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="socialid" value="<?php echo set_value('socialid',$before->socialid);?>">
				</div>
			</div>
-->

<!--
			<div class=" form-group">
				<label class="col-sm-3 control-label">logintype</label>
				<div class="col-sm-4">
					<?php echo form_dropdown( 'logintype',$logintype,set_value( 'logintype',$before->logintype),'class="chzn-select form-control" data-placeholder="Choose a Logintype..."'); ?>
				</div>
			</div>
-->





			<!-- <div class=" form-group">
				<label class="col-sm-3 control-label" for="normal-field">Image *</label>
				<div class="col-sm-4">
					<input type="file" id="normal-field" class="form-control" name="image" value="<?php echo set_value('image',$before->image);?>" required>
					<?php if($before->image == "") { } else { ?>
					<img src="<?php echo base_url('uploads')."/".$before->image; ?>" width="140px" height="140px">
					<?php } ?>
				</div>
			</div> -->

<!--
			<div class=" form-group">
				<label class="col-sm-3 control-label" for="normal-field">json</label>
				<div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="json" value="<?php echo set_value('json',$before->json);?>">
				</div>
			</div>
-->



			<div class=" form-group">
				<label class="col-sm-3 control-label" for="normal-field">Contact no. / Mobile no. *</label>
				<div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="shopcontact1" value="<?php echo set_value('shopcontact1',$before->shopcontact1);?>">
				</div>
			</div>
			<div class=" form-group">
				<label class="col-sm-3 control-label" for="normal-field">Landline.</label>
				<div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="shopcontact2" value="<?php echo set_value('shopcontact2',$before->shopcontact2);?>">
				</div>
			</div>
			<div class=" form-group">
				<label class="col-sm-3 control-label" for="normal-field">Official Email ID *</label>
				<div class="col-sm-4">
					<input type="email" id="normal-field" class="form-control" name="shopemail" value="<?php echo set_value('shopemail',$before->shopemail);?>">
				</div>
			</div>
			<div class=" form-group">
				<label class="col-sm-3 control-label" for="description-field">Password *</label>
				<div class="col-sm-4">
					<input type="password" id="description-field" class="form-control" name="password" value="">
				</div>
			</div>
			<div class=" form-group">
				<label class="col-sm-3 control-label" for="description-field">Confirm Password *</label>
				<div class="col-sm-4">
					<input type="password" id="description-field" class="form-control" name="confirmpassword" value="">
				</div>
			</div>
			<div class=" form-group">
				<label class="col-sm-3 control-label" for="normal-field">Registered Address *</label>
				<div class="col-sm-4">
					<textarea type="text" id="normal-field" class="form-control" name="address" value="<?php echo set_value('address',$before->address);?>"><?php echo set_value('address',$before->address);?></textarea>
				</div>
			</div>
			<div class=" form-group">
				<label class="col-sm-3 control-label" for="normal-field">City *</label>
				<div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="city" value="<?php echo set_value('city',$before->city);?>">
				</div>
			</div>
			<div class=" form-group">
				<label class="col-sm-3 control-label" for="normal-field">State</label>
				<div class="col-sm-4">

					<select name=state value="<?php echo $before->state;?>" class="stateSel">

						<option value="Andaman and Nicobar Islands"  >Andaman and Nicobar Islands</option>
						<option value="Andhra Pradesh">Andhra Pradesh</option>
						<option value="Arunachal Pradesh">Arunachal Pradesh</option>
						<option value="Assam">Assam</option>
						<option value="Bihar">Bihar</option>
						<option value="Chandigarh">Chandigarh</option>
						<option value="Chhattisgarh">Chhattisgarh</option>
						<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
						<option value="Daman and Diu">Daman and Diu</option>
						<option value="Delhi">Delhi</option>
						<option value="Goa">Goa</option>
						<option value="Gujarat">Gujarat</option>
						<option value="Haryana">Haryana</option>
						<option value="Himachal Pradesh">Himachal Pradesh</option>
						<option value="Jammu and Kashmir">Jammu and Kashmir</option>
						<option value="Jharkhand">Jharkhand</option>
						<option value="Karnataka">Karnataka</option>
						<option value="Kerala">Kerala</option>
						<option value="Lakshadweep">Lakshadweep</option>
						<option value="Madhya Pradesh">Madhya Pradesh</option>
						<option value="Maharashtra" >Maharashtra</option>
						<option value="Manipur">Manipur</option>
						<option value="Meghalaya">Meghalaya</option>
						<option value="Mizoram">Mizoram</option>
						<option value="Nagaland">Nagaland</option>
						<option value="Orissa">Orissa</option>
						<option value="Pondicherry">Pondicherry</option>
						<option value="Punjab">Punjab</option>
						<option value="Rajasthan">Rajasthan</option>
						<option value="Sikkim">Sikkim</option>
						<option value="Tamil Nadu">Tamil Nadu</option>
						<option value="Tripura">Tripura</option>
						<option value="Uttaranchal">Uttaranchal</option>
						<option value="Uttar Pradesh">Uttar Pradesh</option>
						<option value="West Bengal">West Bengal</option>
					</select>
				</div>
			</div>
			<div class=" form-group">
					<label class="col-sm-3 control-label">Area *</label>
					<div class="col-sm-4">
							<input type="text" id="normal-field" class="form-control" name="area" value="<?php echo set_value('area',$before->area);?>">
					</div>
				</div>
			<div class=" form-group">
				<label class="col-sm-3 control-label" for="normal-field">Company / Product Description *</label>
				<div class="col-sm-4">
					<textarea rows="4" cols="50" id="normal-field" class="form-control" name="description" value="<?php echo set_value('description',$before->description);?>"><?php echo set_value('description',$before->description);?></textarea>
				</div>
			</div>
			<div class=" form-group">
				<label class="col-sm-3 control-label" for="normal-field">Website</label>
				<div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="website" value="<?php echo set_value('website',$before->website);?>">
				</div>
			</div>
			<div class=" form-group">
				<label class="col-sm-3 control-label" for="normal-field"> Company Pan Card no.</label>
				<div class="col-sm-4">
				<input type="text" id="normal-field" class="form-control" name="pan" value="<?php echo set_value('pan',$before->pan);?>">
				</div>
			</div>
			<!-- <div class=" form-group">
				<label class="col-sm-3 control-label" for="normal-field">Company's Image / Logo *</label>
				<div class="col-sm-4">
					<input type="file" id="normal-field" class="form-control" name="shoplogo" value="<?php echo set_value('shoplogo',$before->shoplogo);?>">
					<?php if($before->shoplogo == "") { } else { ?>
					<img src="<?php echo base_url('uploads')."/".$before->shoplogo; ?>" width="140px" height="140px">
					<?php } ?>
				</div>
			</div> -->
			<div class="form-group">
				<label class="col-sm-2 control-label">Company's Image / Logo *</label>
				<div class="col-sm-4">
					<input type="file" id="normal-field" class="form-control" name="shoplogo" value="<?php echo set_value('shoplogo',$before->shoplogo);?>">
					<?php if($before->shoplogo != "")
					{	?>
						<br>
						<img src="<?php echo base_url('uploads')."/".$before->shoplogo; ?>" width="100px" height="100px">
				<?php	}
					?>
				</div>
			</div>
			<div class=" form-group">
					<label class="col-sm-3 control-label">Is New User *</label>
					<div class="col-sm-4">
					<?php

						echo form_dropdown('onlinestatus',$onlinestatus,set_value('onlinestatus',$before->onlinestatus),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
					?>
					</div>
				</div>
				<div class=" form-group">
					<label class="col-sm-3 control-label">Status *</label>
					<div class="col-sm-4">
						<?php echo form_dropdown( 'status',$status,set_value( 'status',$before->status),'class="chzn-select form-control" data-placeholder="Choose a Accesslevel..."'); ?>
					</div>
				</div>
				<div class=" form-group">
						<label class="col-sm-3 control-label">Company Status *</label>
						<div class="col-sm-4">
						<?php

							echo form_dropdown('shopstatus',$shopstatus,set_value('shopstatus',$before->shopstatus),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
						?>
						</div>
					</div>
					<?php
							$accesslevel=$this->session->userdata('accesslevel');
							if($accesslevel==1)
							{
							?>
					<div class=" form-group">
						<label class="col-sm-3 control-label" for="normal-field">Purchase Balance *</label>
						<div class="col-sm-4">
							<input type="text" id="normal-field" class="form-control" name="purchasebalance" value="<?php echo set_value('purchasebalance',$before->purchasebalance);?>">
						</div>
					</div>
					<div class=" form-group">
						<label class="col-sm-3 control-label" for="normal-field">Sales Balance *</label>
						<div class="col-sm-4">
							<input type="text" id="normal-field" class="form-control" name="salesbalance" value="<?php echo set_value('salesbalance',$before->salesbalance);?>">
						</div>
					</div>
					<?php }
							?>

			<div class=" form-group">
				<label class="col-sm-3 control-label" for="normal-field">Barter Percentage (in %) *</label>
				<div class="col-sm-4">
					<input type="number" id="normal-field" min="0" max="100" class="form-control" name="percentpayment" value="<?php echo set_value('percentpayment',$before->percentpayment);?>">
				</div>
			</div>


			<!--			shipping and billing-->
				<div class=" form-group">
				  <label class="col-sm-3 control-label" for="normal-field">Billing Address *</label>
				  <div class="col-sm-4">
					  <textarea rows="4" cols="50" id="normal-field" class="form-control" name="billingaddress" value="<?php echo set_value('billingaddress',$before->billingaddress);?>"><?php echo set_value('billingaddress',$before->billingaddress);?></textarea>
				  </div>
				</div>

				<div class=" form-group">
				  <label class="col-sm-3 control-label" for="normal-field">Billing City *</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="billingcity" value="<?php echo set_value('billingcity',$before->billingcity);?>">
				  </div>
				</div>

				<div class=" form-group">
				  <label class="col-sm-3 control-label" for="normal-field">Billing State *</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="billingstate" value="<?php echo set_value('billingstate',$before->billingstate);?>">
				  </div>
				</div>

				<div class=" form-group">
				  <label class="col-sm-3 control-label" for="normal-field">Billing Country *</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="billingcountry" value="<?php echo set_value('billingcountry',$before->billingcountry);?>">
				  </div>
				</div>


				<div class=" form-group">
				  <label class="col-sm-3 control-label" for="normal-field">Billing Pincode *</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="billingpincode" value="<?php echo set_value('billingpincode',$before->billingpincode);?>">
				  </div>
				</div>

				<div class=" form-group">
				  <label class="col-sm-3 control-label" for="normal-field">Shipping Address *</label>
				  <div class="col-sm-4">
					  <textarea rows="4" cols="50" id="normal-field" class="form-control" name="shippingaddress" value="<?php echo set_value('shippingaddress',$before->shippingaddress);?>"><?php echo set_value('shippingaddress',$before->shippingaddress);?></textarea>
				  </div>
				</div>

				<div class=" form-group">
				  <label class="col-sm-3 control-label" for="normal-field">Shipping City *</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="shippingcity" value="<?php echo set_value('shippingcity',$before->shippingcity);?>">
				  </div>
				</div>

				<div class=" form-group">
				  <label class="col-sm-3 control-label" for="normal-field">shippingcountry *</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="shippingcountry" value="<?php echo set_value('shippingcountry',$before->shippingcountry);?>">
				  </div>
				</div>

				<div class=" form-group">
				  <label class="col-sm-3 control-label" for="normal-field">Shipping State *</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="shippingstate" value="<?php echo set_value('shippingstate',$before->shippingstate);?>">
				  </div>
				</div>

				<div class=" form-group">
				  <label class="col-sm-3 control-label" for="normal-field">Shipping Pincode *</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="shippingpincode" value="<?php echo set_value('shippingpincode',$before->shippingpincode);?>">
				  </div>
				</div>


<!--
				<div class=" form-group">
				  <label class="col-sm-3 control-label" for="normal-field">Online Status</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="onlinestatus" value="<?php echo set_value('onlinestatus',$before->onlinestatus);?>">
				  </div>
				</div>
-->



				<div class=" form-group">
					<label class="col-sm-3 control-label">Terms *</label>
					<div class="col-sm-4">
				<select class="chzn-select form-control" name="termsaccept">
					<?php

						if($before->termsaccept== 1)
						{
							echo'		<option value="1">Yes</option>
							<option value="0">No</option>'
							;
						}
						else {
							echo'	<option value="0">No</option>
								<option value="1">Yes</option>';
						}

										?>

				</select>
					</div>
				</div>
				<!-- <div class=" form-group">
				<label class="col-sm-3 control-label" for="normal-field">Personal Contact *</label>
				<div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="personalcontact" value="<?php echo set_value('personalcontact',$before->personalcontact);?>">
				</div>
			</div> -->




			<div class=" form-group">
				<label class="col-sm-3 control-label">&nbsp;</label>
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

var StateVal = "<?php echo $before->state;?>";
	$(document).ready(function() {
		var $opt= $(".stateSel option");
		for(var i=0;i<$opt.length;i++)
		{
				var value = $opt.eq(i).attr("value");
				if(value==StateVal)
				{
					$opt.eq(i).attr("selected","selected");
				}
		};
	});
</script>
