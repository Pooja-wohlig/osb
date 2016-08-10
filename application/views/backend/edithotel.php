<div class="row" style="padding:1% 0">
	<div class="col-md-12">
		<div class="pull-right">
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				Hotel
			</header>
			<div class="panel-body">
				<form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/edithotelsubmit");?>' enctype='multipart/form-data'>
				<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
					<div class="panel-body">
            <div class=" form-group">
              <label class="col-sm-2 control-label" for="normal-field">User</label>
              <div class="col-sm-4">
                <?php echo form_dropdown( "user",$user,set_value( 'user',$before->user),"class='chzn-select form-control'");?>
              </div>
            </div>
						<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Country</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="country" value="<?php echo set_value('country',$before->country);?>">
				  </div>
				</div>
        <div class="form-group">
      <label class="col-sm-2 control-label" for="normal-field">City</label>
      <div class="col-sm-4">
      <input type="text" id="normal-field" class="form-control" name="city" value="<?php echo set_value('city',$before->city);?>">
      </div>
    </div>
    <div class="form-group">
  <label class="col-sm-2 control-label" for="normal-field">Hotel Name</label>
  <div class="col-sm-4">
  <input type="text" id="normal-field" class="form-control" name="hotelname" value="<?php echo set_value('hotelname',$before->hotelname);?>">
  </div>
</div>
    <div class="form-group">
  <label class="col-sm-2 control-label" for="normal-field">Check In</label>
  <div class="col-sm-4">
  <input type="text" id="normal-field" class="form-control" name="checkin" value="<?php echo set_value('checkin',$before->checkin);?>">
  </div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">Check Out</label>
<div class="col-sm-4">
<input type="text" id="normal-field" class="form-control" name="checkout" value="<?php echo set_value('checkout',$before->checkout);?>">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">No of Rooms</label>
<div class="col-sm-4">
<input type="text" id="normal-field" class="form-control" name="room" value="<?php echo set_value('room',$before->room);?>">
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">No of Adults</label>
<div class="col-sm-4">
<input type="text" id="normal-field" class="form-control" name="adult" value="<?php echo set_value('adult',$before->adult);?>">
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">No of Children</label>
<div class="col-sm-4">
<input type="text" id="normal-field" class="form-control" name="children" value="<?php echo set_value('children',$before->children);?>">
</div>
</div>

						<div class="form-group" >
				  <label class="col-sm-2 control-label" for="normal-field">timestamp</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" readonly="true" class="form-control" name="timestamp" value="<?php echo set_value('timestamp',$before->timestamp);?>">
				  </div>
				</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
							<div class="col-sm-4">
								<!-- <button type="submit" class="btn btn-primary">Save</button> -->
								<a href="<?php echo site_url("site/viewhotel"); ?>" class="btn btn-secondary">Back</a>
							</div>
						</div>
				</form>
				</div>
		</section>
		</div>
	</div>
