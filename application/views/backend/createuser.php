<div class="row" style="padding:1% 0">
	<div class="col-md-12">
		<div class="pull-right">
			<a href="<?php echo site_url('site/viewusers'); ?>" class="btn btn-primary pull-right"><i class="icon-long-arrow-left"></i>&nbsp;Back</a>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 User Details
			</header>
			<div class="panel-body">
			  <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/createusersubmit');?>" enctype= "multipart/form-data">
					<div class=" form-group">
						<label class="col-sm-3 control-label" for="normal-field">Vendor no *</label>
						<div class="col-sm-4">
						<input type="text" id="normal-field" class="form-control" name="membershipno" value="<?php echo set_value('membershipno');?>">
						</div>
					</div>

				<div class="form-group">
				  <label class="col-sm-3 control-label" for="normal-field">Owners Name *</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="name" value="<?php echo set_value('name');?>">
				  </div>
				</div>

				<div class=" form-group">
					<label class="col-sm-3 control-label" for="normal-field">Company's Name *</label>
					<div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="shopname" value="<?php echo set_value('shopname');?>">
					</div>
				</div>
<!--
				<div class=" form-group">
				  <label class="col-sm-3 control-label" for="normal-field">Username</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="username" value="<?php echo set_value('username');?>">
				  </div>
				</div>
-->
<div class=" form-group">
<label class="col-sm-3 control-label" for="normal-field">Contact no. / Mobile no. *</label>
<div class="col-sm-4">
<input type="text" id="normal-field" maxlength="10" class="form-control" name="shopcontact1" value="<?php echo set_value('shopcontact1');?>">
</div>
</div>
<div class=" form-group">
<label class="col-sm-3 control-label" for="normal-field">Landline.</label>
<div class="col-sm-4">
<input type="text" id="normal-field" maxlength="10" class="form-control" name="shopcontact2" value="<?php echo set_value('shopcontact2');?>">
</div>
</div>
<div class=" form-group">
	<label class="col-sm-3 control-label" for="normal-field">Official email id *</label>
	<div class="col-sm-4">
	<input type="email" id="normal-field" class="form-control" name="shopemail" value="<?php echo set_value('shopemail');?>">
	</div>
</div>
				<div class=" form-group" style="display:none">
				  <label class="col-sm-3 control-label" for="normal-field">Admin Email</label>
				  <div class="col-sm-4">
					<input type="email" id="normal-field" class="form-control" name="email" value="<?php echo set_value('email');?>">
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
					<textarea rows="4" cols="50" id="normal-field" class="form-control" name="address" value="<?php echo set_value('address');?>"></textarea>
					</div>
				</div>
				<div class=" form-group">
				<label class="col-sm-3 control-label" for="normal-field">Area *</label>
				<div class="col-sm-4">
				<input type="text" id="normal-field" class="form-control" name="city" value="<?php echo set_value('city');?>">
				</div>
			</div>
				<div class=" form-group">
				<label class="col-sm-3 control-label" for="normal-field">State</label>
				<div class="col-sm-4">
				<!-- <input type="text" id="normal-field" class="form-control" name="state" value="<?php echo set_value('state');?>"> -->
						<select name=state>
							<option value="">------------Select State------------</option>
							<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
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
							<option value="Maharashtra">Maharashtra</option>
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
				<label class="col-sm-3 control-label">City *</label>
				<div class="col-sm-4">
				<!-- <?php

					// echo form_dropdown('area',$area,set_value('area'),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
				?> -->
					<input type="text" id="normal-field" class="form-control" name="area" value="<?php echo set_value('area');?>">
				</div>
			</div>
				<div class=" form-group">
					<label class="col-sm-3 control-label" for="normal-field">Company / Product Description *</label>
					<div class="col-sm-4">
					<textarea rows="4" cols="50" id="normal-field" class="form-control" name="description" value="<?php echo set_value('description');?>"></textarea>
					</div>
				</div>
				<div class=" form-group">
				<label class="col-sm-3 control-label" for="normal-field">Website</label>
				<div class="col-sm-4">
				<input type="text" id="normal-field" class="form-control" name="website" value="<?php echo set_value('website');?>">
				</div>
			</div>
			<div class=" form-group">
			<label class="col-sm-3 control-label" for="normal-field">Company Pancard no.</label>
			<div class="col-sm-4">
			<input type="text" id="normal-field" class="form-control" name="pan" value="<?php echo set_value('pan');?>">
			</div>
		</div>
		<div class=" form-group">
			<label class="col-sm-3 control-label" for="normal-field">Company's Image / Logo</label>
			<div class="col-sm-4">
			<input type="file" id="normal-field" class="form-control" name="shoplogo" value="<?php echo set_value('shoplogo');?>">
			</div>
		</div>
		<div class=" form-group">
			<label class="col-sm-3 control-label">Is New user? *</label>
			<div class="col-sm-4">
			<?php

				echo form_dropdown('onlinestatus',$onlinestatus,set_value('onlinestatus'),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
			?>
			</div>
		</div>
		<div class=" form-group">
			<label class="col-sm-3 control-label">Status *</label>
			<div class="col-sm-4">
			<?php

				echo form_dropdown('status',$status,set_value('status'),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
			?>
			</div>
		</div>
		<div class=" form-group">
			<label class="col-sm-3 control-label">Company Status *</label>
			<div class="col-sm-4">
			<?php

				echo form_dropdown('shopstatus',$shopstatus,set_value('shopstatus'),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
			?>
			</div>
		</div>
		<div class=" form-group">
			<label class="col-sm-3 control-label">Select Accesslevel *</label>
			<div class="col-sm-4">
			<?php 	 echo form_dropdown('accesslevel',$accesslevel,set_value('accesslevel'),'id="accesslevelid" onchange="operatorcategories()" class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
			?>
			</div>
		</div>

			<div class=" form-group">
			<label class="col-sm-3 control-label" for="normal-field">Purchase Balance *</label>
			<div class="col-sm-4">
			<input type="text" id="normal-field" class="form-control" name="purchasebalance" value="<?php echo set_value('purchasebalance');?>">
			</div>
		</div>
		<div class=" form-group">
			<label class="col-sm-3 control-label" for="normal-field">Sales Balance *</label>
			<div class="col-sm-4">
			<input type="text" id="normal-field" class="form-control" name="salesbalance" value="<?php echo set_value('salesbalance');?>">
			</div>
		</div>
			<div class=" form-group">
				<label class="col-sm-3 control-label" for="normal-field">Barter Percentage (in %) *</label>
				<div class="col-sm-4">
				<input type="number" id="normal-field" min="0" max="100" class="form-control" name="percentpayment" value="<?php echo set_value('percentpayment');?>">
				</div>
			</div>

			<div class=" form-group">
				<label class="col-sm-3 control-label" for="normal-field">Billing Address *</label>
				<div class="col-sm-4">
					<textarea rows="4" cols="50" id="normal-field" id="billingaddress" class="form-control" name="billingaddress" value="<?php echo set_value('billingaddress');?>"></textarea>
				</div>
			</div>

			<div class=" form-group">
				<label class="col-sm-3 control-label" for="normal-field">Billing City *</label>
				<div class="col-sm-4">
				<input type="text" id="normal-field" class="form-control" name="billingcity" id="billingcity" value="<?php echo set_value('billingcity');?>">
				</div>
			</div>

			<div class=" form-group">
				<label class="col-sm-3 control-label" for="normal-field">Billing State *</label>
				<div class="col-sm-4">
				<input type="text" id="normal-field" class="form-control" onkeypress="" name="billingstate" id="billingstate" value="<?php echo set_value('billingstate');?>">
				</div>
			</div>

			<div class=" form-group">
				<label class="col-sm-3 control-label" for="normal-field">Billing Country *</label>
				<div class="col-sm-4">
				<input type="text" id="normal-field" class="form-control" name="billingcountry" id="billingcountry" value="<?php echo set_value('billingcountry');?>">
				</div>
			</div>


			<div class=" form-group">
				<label class="col-sm-3 control-label" for="normal-field">Billing Pincode *</label>
				<div class="col-sm-4">
				<input type="text" id="normal-field" maxlength="6" class="form-control" id="billingpincode" name="billingpincode" value="<?php echo set_value('billingpincode');?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="normal-field">Shipping same as billing</label>
				<div class="col-sm-4">
				<input type="checkbox" name="sameasbilling" value="Bike" onclick='handleClick(this);'>
				</div>
			</div>

			<div class=" form-group">
				<label class="col-sm-3 control-label" for="normal-field">Shipping Address *</label>
				<div class="col-sm-4">
					<textarea rows="4" cols="50" id="normal-field" class="form-control" name="shippingaddress" id="shippingaddress" value="<?php echo set_value('shippingaddress');?>"></textarea>
				</div>
			</div>

			<div class=" form-group">
				<label class="col-sm-3 control-label" for="normal-field">Shipping City *</label>
				<div class="col-sm-4">
				<input type="text" id="normal-field" class="form-control" name="shippingcity" id="shippingcity" value="<?php echo set_value('shippingcity');?>">
				</div>
			</div>

			<div class=" form-group">
				<label class="col-sm-3 control-label" for="normal-field">shippingcountry *</label>
				<div class="col-sm-4">
				<input type="text" id="normal-field" class="form-control" name="shippingcountry" id="shippingcountry" value="<?php echo set_value('shippingcountry');?>">
				</div>
			</div>

			<div class=" form-group">
				<label class="col-sm-3 control-label" for="normal-field">Shipping State *</label>
				<div class="col-sm-4">
				<input type="text" id="normal-field" class="form-control" name="shippingstate" id="shippingstate" value="<?php echo set_value('shippingstate');?>">
				</div>
			</div>

			<div class=" form-group">
				<label class="col-sm-3 control-label" for="normal-field">Shipping Pincode *</label>
				<div class="col-sm-4">
				<input type="text" id="normal-field" maxlength="6" class="form-control" name="shippingpincode" id="shippingpincode" value="<?php echo set_value('shippingpincode');?>">
				</div>
			</div>




			<div class=" form-group">
				<label class="col-sm-3 control-label">Terms *</label>
				<div class="col-sm-4">
			<select class="chzn-select form-control" name="termsaccept">
				<option value="0">No</option>
				<option value="1">Yes</option>
			</select>
				</div>
			</div>

			<div class=" form-group" style="display:none">
				  <label class="col-sm-3 control-label" for="normal-field">Message *</label>
				  <div class="col-sm-4">
					  <textarea rows="4" cols="50" id="normal-field" class="form-control" name="message" value="<?php echo set_value('message');?>"></textarea>
				  </div>
				</div>
			<!-- <div class=" form-group">
 				<label class="col-sm-3 control-label" for="normal-field">Personal Contact *</label>
				<div class="col-sm-4">
					<input type="text" id="normal-field" maxlength="10" class="form-control" name="personalcontact" value="<?php echo set_value('personalcontact');?>">
				</div>
			</div> -->
<!--
				<div class=" form-group">
				  <label class="col-sm-3 control-label" for="normal-field">SocialId</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="socialid" value="<?php echo set_value('socialid');?>">
				  </div>
				</div>
-->

<!--
				<div class=" form-group">
				  <label class="col-sm-3 control-label">logintype</label>
				  <div class="col-sm-4">
					<?php

						echo form_dropdown('logintype',$logintype,set_value('logintype'),'class="chzn-select form-control" 	data-placeholder="Choose a Logintype..."');
					?>
				  </div>
				</div>
-->



				<!-- <div class=" form-group">
				  <label class="col-sm-3 control-label" for="normal-field">Image *</label>
				  <div class="col-sm-4">
					<input type="file" id="normal-field" class="form-control" name="image" value="<?php echo set_value('image');?>" required>
				  </div>
				</div> -->



<!--
				<div class=" form-group categoryclass" style="display:none;">
				  <label class="col-sm-3 control-label">Category</label>
				  <div class="col-sm-4">
					<?php

						echo form_dropdown('category[]',$category,set_value('category'),'id="select10" class="chzn-select form-control" 	data-placeholder="Choose a category..." multiple');
					?>
				  </div>
				</div>
-->

<!--
				<div class=" form-group">
				  <label class="col-sm-3 control-label" for="normal-field">json</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="json" value="<?php echo set_value('json');?>">
				  </div>
				</div>
-->





<!--
				<textarea rows="4" cols="50">
At w3schools.com you will learn how to make a website. We offer free tutorials in all web development technologies.
</textarea>
-->






<!--			shipping and billing-->



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
	</div>
</div>
<script type="text/javascript">
function handleClick(cb) {
if(cb.checked==true){
var billingaddress=document.getElementsByName('billingaddress')[0].value;
var billingcity=document.getElementsByName('billingcity')[0].value;
var billingstate=document.getElementsByName('billingstate')[0].value;
var billingcountry=document.getElementsByName('billingcountry')[0].value;
var billingpincode=document.getElementsByName('billingpincode')[0].value;
document.getElementsByName('shippingaddress')[0].value=billingaddress;
document.getElementsByName('shippingcity')[0].value=billingcity;
document.getElementsByName('shippingstate')[0].value=billingstate;
document.getElementsByName('shippingcountry')[0].value=billingcountry;
document.getElementsByName('shippingpincode')[0].value=billingpincode;


}
else{

}
}
    function operatorcategories() {
        console.log($('#accesslevelid').val());
        if($('#accesslevelid').val()==2)
        {
            $( ".categoryclass" ).show();
        }

        else
        {
            $( ".categoryclass" ).hide();
        }

    }
</script>
