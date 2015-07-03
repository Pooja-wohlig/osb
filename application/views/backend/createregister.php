<div class="row" style="padding:1% 0">
	<div class="col-md-12">
		<div class="pull-right">
			<a href="<?php echo site_url('site/viewregister'); ?>" class="btn btn-primary pull-right"><i class="icon-long-arrow-left"></i>&nbsp;Back</a>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 Register Details
			</header>
			<div class="panel-body">
			  <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/createregistersubmit');?>" enctype= "multipart/form-data">
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Name</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="name" value="<?php echo set_value('name');?>">
				  </div>
				</div>				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Email</label>
				  <div class="col-sm-4">
					<input type="email" id="normal-field" class="form-control" name="email" value="<?php echo set_value('email');?>">
				  </div>
				</div>
			<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Message</label>
				  <div class="col-sm-4">
					  <textarea rows="4" cols="50" id="normal-field" class="form-control" name="message" value="<?php echo set_value('message');?>"></textarea>
				  </div>
				</div>
			<div class=" form-group">
 				<label class="col-sm-2 control-label" for="normal-field">Personal Contact</label>
				<div class="col-sm-4">
					<input type="text" id="normal-field" maxlength="10" class="form-control" name="personalcontact" value="<?php echo set_value('personalcontact');?>">
				</div>
			</div>
				
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label">Status</label>
				  <div class="col-sm-4">
					<?php
						
						echo form_dropdown('status',$status,set_value('status'),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
					?>
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
	</div>
</div>
