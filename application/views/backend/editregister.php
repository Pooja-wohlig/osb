<section class="panel">
	<header class="panel-heading">
		Vendor Details
	</header>
	<div class="panel-body">
		<form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/editregistersubmit');?>" enctype="multipart/form-data">
			<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
<!--
			<div class="form-group">
				<label class="col-sm-2 control-label" for="normal-field">Email</label>
				<div class="col-sm-4">
					<?php echo $before->email; ?>
				</div>
			</div>
-->
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
				  <label class="col-sm-2 control-label" for="normal-field">Message</label>
				  <div class="col-sm-4">
					  <textarea rows="4" cols="50" id="normal-field" class="form-control" name="message" value="<?php echo set_value('message',$before->message);?>"><?php echo set_value('message',$before->message);?></textarea>
				  </div>
				</div>
				<div class=" form-group">
				<label class="col-sm-2 control-label" for="normal-field">Personal Contact</label>
				<div class="col-sm-4">
					<input type="text" id="normal-field" maxlength="10" class="form-control" name="personalcontact" value="<?php echo set_value('personalcontact',$before->personalcontact);?>">
				</div>
			</div>
			<div class=" form-group">
				<label class="col-sm-2 control-label">Status</label>
				<div class="col-sm-4">
					<?php echo form_dropdown( 'status',$status,set_value( 'status',$before->status),'class="chzn-select form-control" data-placeholder="Choose a Accesslevel..."'); ?>
				</div>
			</div>


			<div class=" form-group">
				<label class="col-sm-2 control-label">&nbsp;</label>
				<div class="col-sm-4">
					<button type="submit" class="btn btn-primary">Save</button>
					<a href="<?php echo site_url('site/viewregister'); ?>" class="btn btn-secondary">Cancel</a>
				</div>
			</div>
		</form>
	</div>
</section>
