<section class="panel">
<header class="panel-heading">
Shopproductphoto Details
</header>
<div class="panel-body">
<form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/editshopproductphotosubmit");?>' enctype= 'multipart/form-data'>
<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
<div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">User</label>
<div class="col-sm-4">
<?php echo form_dropdown("user",$user,set_value('user',$before->user),"class='chzn-select form-control'");?>
</div>
</div>
<div class=" form-group">
				<label class="col-sm-2 control-label" for="normal-field">Photo</label>
				<div class="col-sm-4">
					<input type="file" id="normal-field" class="form-control" name="photo" value="<?php echo set_value('photo',$before->photo);?>">
					<?php if($before->photo == "") { } else { ?>
					<img src="<?php echo base_url('uploads')." / ".$before->photo; ?>" width="140px" height="140px">
					<?php } ?>
				</div>
			</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
<div class="col-sm-4">
<button type="submit" class="btn btn-primary">Save</button>
<a href='<?php echo site_url("site/viewpage"); ?>' class='btn btn-secondary'>Cancel</a>
</div>
</div>
</form>
</div>
</section>
