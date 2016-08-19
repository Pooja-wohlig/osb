<!-- <div class="row">
<div class="col s12">
<h4 class="pad-left-15 capitalize">Create city</h4>
</div>
<form class='col s12' method='post' action='<?php echo site_url("site/createcitysubmit");?>' enctype= 'multipart/form-data'>
<div class=" row">
<div class=" input-field col s6">
<?php echo form_dropdown("state",$state,set_value('state'));?>
<label>State</label>
</div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="Name">Name</label>
<input type="text" id="Name" name="name" value='<?php echo set_value('name');?>'>
</div>
</div>
<div class="row">
<div class="col s12 m6">
<button type="submit" class="btn btn-primary waves-effect waves-light blue darken-4">Save</button>
<a href="<?php echo site_url("site/viewcity"); ?>" class="btn btn-secondary waves-effect waves-light red">Cancel</a>
</div>
</div>
</form>
</div> -->

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
City Details
</header>
<div class="panel-body">
<form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/createcitysubmit");?>' enctype= 'multipart/form-data'>
<div class="panel-body">
<div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">State</label>
<div class="col-sm-4">
<?php echo form_dropdown("state",$state,set_value('state'),"class='chzn-select form-control'");?>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">Name</label>
<div class="col-sm-4">
<input type="text" id="normal-field" class="form-control" name="name" value='<?php echo set_value('name');?>'>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
<div class="col-sm-4">
<button type="submit" class="btn btn-primary">Save</button>
<a href="<?php echo site_url("site/viewcity"); ?>" class="btn btn-secondary">Cancel</a>
</div>
</div>
</form>
</div>
</section>
</div>
</div>
