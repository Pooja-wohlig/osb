<section class="panel">
	<header class="panel-heading">
		Suggestion Details
	</header>
	<div class="panel-body">
		<form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/editsuggestionsubmit");?>' enctype='multipart/form-data'>
			<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
			<div class="form-group">
				<label class="col-sm-2 control-label" for="normal-field">Email</label>
				<div class="col-sm-4">
					<!-- <?php echo form_dropdown( "user",$user,set_value( 'user',$before->user),"class='chzn-select form-control'");?> -->
						<input type="text" id="normal-field" class="form-control" name="user" value='<?php echo set_value(' user ',$before->user);?>'>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="normal-field">Timestamp</label>
				<div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="timestamp" value='<?php echo set_value(' timestamp ',$before->timestamp);?>'>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="normal-field">Message</label>
				<div class="col-sm-4">
					<textarea rows="4" cols="50" id="normal-field" class="form-control" name="message" value='<?php echo set_value(' message ',$before->message);?>'><?php echo set_value( 'message',$before->message);?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
				<div class="col-sm-4">
<!--					<button type="submit" class="btn btn-primary">Save</button>-->
					<a href='<?php echo site_url("site/viewsuggestion"); ?>' class='btn btn-secondary'>Cancel</a>
				</div>
			</div>
		</form>
	</div>
</section>
