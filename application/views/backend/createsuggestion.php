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
				Suggestion Details
			</header>
			<div class="panel-body">
				<form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/createsuggestionsubmit");?>' enctype='multipart/form-data'>
					<div class="panel-body">
						<div class="form-group">
							<label class="col-sm-2 control-label" for="normal-field">User</label>
							<div class="col-sm-4">
								<?php echo form_dropdown( "user",$user,set_value( 'user'), "class='chzn-select form-control'");?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="normal-field">Message</label>
							<div class="col-sm-4">
								<textarea rows="4" cols="50" id="normal-field" class="form-control" name="message" value='<?php echo set_value(' message ');?>'></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
							<div class="col-sm-4">
								<button type="submit" class="btn btn-primary">Save</button>
								<a href="<?php echo site_url(" site/viewsuggestion "); ?>" class="btn btn-secondary">Cancel</a>
							</div>
						</div>
				</form>
				</div>
		</section>
		</div>
	</div>