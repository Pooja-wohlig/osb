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
				Broadcast
			</header>
			<div class="panel-body">
				<form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/editbroadcastsubmit");?>' enctype='multipart/form-data'>
				<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
					<div class="panel-body">
						<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Name</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="name" value="<?php echo set_value('name',$before->name);?>">
				  </div>
				</div>	
						<div class="form-group">
							<label class="col-sm-2 control-label" for="normal-field">Message</label>
							<div class="col-sm-4">
								<textarea rows="4" cols="50" id="normal-field" class="form-control" name="message" value='<?php echo set_value(' message',$before->message);?>'><?php echo set_value(' message',$before->message);?></textarea>
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
								<button type="submit" class="btn btn-primary">Save</button>
								<a href="<?php echo site_url("site/viewbroadcast"); ?>" class="btn btn-secondary">Cancel</a>
							</div>
						</div>
				</form>
				</div>
		</section>
		</div>
	</div>