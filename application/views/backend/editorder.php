<?php error_reporting(E_ALL);
ini_set('display_errors', 1);?>
    <section class="panel">
        <header class="panel-heading">
            Order Details
        </header>
        <div class="panel-body">
            <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/editordersubmit');?>">
                <div class="amount-message alert alert-danger" style="display:none;"></div>
                <input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before['order']->id);?>" style="display:none;">
                <div class="row">
                    <div class="col-md-6">
                        <!--                        //user from-->
                        <p class="text-center">Buyer</p>
                        <!-- <div class="col-sm-12 text-center">
                            <div class=""><span>Name :- </span><?php echo $userto->name?></div>
                            <div class=""><span>Shop Name :- </span><?php echo $userto->shopname?></div>
                            <div class=""><span>Email :- </span><?php echo $userto->email?></div>
                            <div class=""><span>Membership No :-</span> <?php echo $userto->membershipno?></div>
                            <div class=""><span>Address :- </span><?php echo $userto->billingaddress?><br><?php echo $userto->billingcity?><br><?php echo $userto->billingstate?><br><?php echo $userto->billingcountry?><br><?php echo $userto->billingpincode?></div>
                        </div> -->
                        <table class="text-left" style="width: 70%; margin: 0 auto;">
                          <tr>
                            <td style="font-weight: bold;">Name</td>
                            <td><?php echo $userto->name?></td>
                          </tr>
                          <tr>
                            <td style="font-weight: bold;">Shop Name</td>
                            <td><?php echo $userto->shopname?></td>
                          </tr>
                          <tr>
                            <td style="font-weight: bold;">Email</td>
                            <td><?php echo $userto->shopemail?></td>
                          </tr>
                          <tr>
                            <td style="font-weight: bold;">Mobile no</td>
                            <td><?php echo $userto->shopcontact1?></td>
                          </tr>
                          <tr>
                            <td style="font-weight: bold;">Membership No</td>
                            <td><?php echo $userto->membershipno?></td>
                          </tr>
                          <tr>
                            <td style="font-weight: bold;">Address</td>
                            <td><?php echo $userto->billingaddress?><br><?php echo $userto->billingcity?><br><?php echo $userto->billingstate?><br><?php echo $userto->billingcountry?><br><?php echo $userto->billingpincode?></td>
                          </tr>
                        </table>
                    </div>
                    <div>
                        <!--                        //user from-->
                        <div class="col-md-6">
                          <p class="text-center">Seller</p>
                          <!-- <div class="col-sm-12 text-center">
                              <div class=""><span>Name :- </span><?php echo $userfrom->name?></div>
                              <div class=""><span>Shop Name :- </span><?php echo $userfrom->shopname?></div>
                              <div class=""><span>Email :- </span><?php echo $userfrom->email?></div>
                              <div class=""><span>Membership No :-</span> <?php echo $userfrom->membershipno?></div>
                              <div class=""><span>Address :- </span><?php echo $userfrom->billingaddress?><br><?php echo $userfrom->billingcity?><br><?php echo $userfrom->billingstate?><br><?php echo $userfrom->billingcountry?><br><?php echo $userfrom->billingpincode?></div>
                          </div> -->
                          <table class="text-left" style="width: 70%; margin: 0 auto;">
                            <tr>
                              <td style="font-weight: bold;">Name</td>
                              <td><?php echo $userfrom->name?></td>
                            </tr>
                            <tr>
                              <td style="font-weight: bold;">Shop Name</td>
                              <td><?php echo $userfrom->shopname?></td>
                            </tr>
                            <tr>
                              <td style="font-weight: bold;">Email</td>
                              <td><?php echo $userfrom->shopemail?></td>
                            </tr>
                            <tr>
                              <td style="font-weight: bold;">Mobile no</td>
                              <td><?php echo $userfrom->shopcontact1?></td>
                            </tr>
                            <tr>
                              <td style="font-weight: bold;">Membership No</td>
                              <td><?php echo $userfrom->membershipno?></td>
                            </tr>
                            <tr>
                              <td style="font-weight: bold;">Address</td>
                              <td><?php echo $userfrom->billingaddress?><br><?php echo $userfrom->billingcity?><br><?php echo $userfrom->billingstate?><br><?php echo $userfrom->billingcountry?><br><?php echo $userfrom->billingpincode?></td>
                            </tr>
                          </table>
                        </div>
                    </div>
                    <div>

                </div>


                <!--
					<div class="form-group">
						<label class="col-sm-2 control-label">User</label>
						<div class="col-sm-4">
						  <?php echo form_dropdown('user',$user,set_value('user',$before['order']->user),'class="chzn-select form-control user  populate placeholder select2-offscreen" id="select3" 	'); ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Name</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="firstname" value="<?php echo set_value('firstname',$before['order']->name);?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Email</label>
						<div class="col-sm-4">
						  <input type="email" id="" name="email" class="form-control" value="<?php echo set_value('email',$before['order']->email); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Contact No</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="contactno" value="<?php echo set_value('contactno',$before['order']->contactno);?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Billing Address</label>
						<div class="col-sm-4">
						  <textarea name="billingaddress" class="form-control"><?php echo set_value('billingcity',$before['order']->billingaddress); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Billing City</label>
						<div class="col-sm-4">
						  <input type="text" id="" name="billingcity" class="form-control" value="<?php echo set_value('billingcity',$before['order']->billingcity); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Billing State</label>
						<div class="col-sm-4">
						  <input type="text" id="" name="billingstate" class="form-control" value="<?php echo set_value('billingstate',$before['order']->billingstate); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Billing Country</label>
						<div class="col-sm-4">
						   <?php 	 echo form_dropdown('billingcountry',$country,set_value('billingcountry',$before['order']->billingcountry),'id="select1" class="chzn-select form-control" 	data-placeholder="Choose a country..."');
						?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Shipping Address</label>
						<div class="col-sm-4">
						  <textarea name="shippingaddress" class="form-control"><?php
                                if($before['order']->shippingaddress=="")
                                {
                                        echo set_value('shippingaddress',$before['order']->billingaddress);
                                }
                                else
                                {
                                    echo set_value('shippingaddress',$before['order']->shippingaddress);
                                }

                              ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Shipping City</label>
						<div class="col-sm-4">
						  <input type="text" id="" name="shippingcity" class="form-control" value="<?php
                            if($before['order']->shippingcity=="")
                                echo set_value('shippingcity',$before['order']->billingcity);
                            else
                                echo set_value('shippingcity',$before['order']->shippingcity);
                            ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Shipping State</label>
						<div class="col-sm-4">
						  <input type="text" id="" name="shippingstate" class="form-control" value="<?php
                            if($before['order']->shippingstate=="")
                                echo set_value('shippingstate',$before['order']->billingstate);
                            else
                                echo set_value('shippingstate',$before['order']->shippingstate);
                            ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Shipping Country</label>
						<div class="col-sm-4">
						<?php
                                if($before['order']->shippingcountry=="")
                                {
                                    echo form_dropdown('shippingcountry',$country,set_value('shippingcountry',$before['order']->billingcountry),'id="select2" class="chzn-select form-control" 	data-placeholder="Choose a country..."');
                                }
                                else
                                {
                                    echo form_dropdown('shippingcountry',$country,set_value('shippingcountry',$before['order']->shippingcountry),'id="select2" class="chzn-select form-control" 	data-placeholder="Choose a country..."');
                                }

                              ?>

						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Shipping Pincode</label>
						<div class="col-sm-4">
                            <input type="text" id="" name="shippingpincode" class="form-control" value="<?php echo set_value('shippingpincode',$before['order']->shippingpincode); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Trackingcode</label>
						<div class="col-sm-4">
						  <input type="text" id="" name="trackingcode" class="form-control" value="<?php echo set_value('trackingcode',$before['order']->trackingcode); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Logistic Charge</label>
						<div class="col-sm-4">
						  <input type="text" id="" name="logisticcharge" class="form-control" value="<?php echo set_value('logisticcharge',$before['order']->logisticcharge); ?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Transaction Id</label>
						<div class="col-sm-4">
						  <input type="text" id="" name="transactionid" class="form-control" value="<?php echo set_value('transactionid',$before['order']->transactionid); ?>">
						</div>
					</div>
-->
<!--
                <div class="row">
                    <div class="col-md-offset-1 col-md-4">
                        <div class="form-group">
                            <label class="col-sm-6 control-label" style="margin-right: -131px;">Status</label>
                            <div class="col-sm-6">
                                <?php echo form_dropdown('orderstatus',$orderstatus,set_value('orderstatus',$before['order']->orderstatus),'class="chzn-select orderstatus form-control"'); ?>
                            </div>
                        </div>
                    </div>
                </div>
-->
                <div class="form-group">
						<label class="col-sm-12 text-center">Status</label>
                    <div class="row">
                    <div class="col-md-offset-5 col-md-2">
                         <?php echo form_dropdown('orderstatus',$orderstatus,set_value('orderstatus',$before['order']->orderstatus),'class="chzn-select orderstatus form-control"'); ?>
                        </div>
                    </div>
<!--
						<div class="col-sm-3">
						    <?php echo form_dropdown('orderstatus',$orderstatus,set_value('orderstatus',$before['order']->orderstatus),'class="chzn-select orderstatus form-control"'); ?>
						</div>
-->
					</div>

                <div class="form-group">
                    <div class="col-sm-12 text-center">
                        <button type="submit" class="btn btn-info finalsubmit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

<!--
    <div class="row" style="padding:1% 0">
        <div class="col-md-12">
            <a class="btn btn-primary pull-right" href="<?php echo site_url(" site/createorderitem "); ?>"><i class="icon-plus"></i>Create </a> &nbsp;
        </div>

    </div>
-->
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
