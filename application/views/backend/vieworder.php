<div class="row" style="padding:1% 0">
    <div class="col-md-12">
        <a class="btn btn-primary pull-right" href="<?php echo site_url("site/createorder"); ?>"><i class="icon-plus"></i>Create </a> &nbsp;
    </div>
    <div><a class="btn btn-primary" href="<?php echo site_url('site/exportordercsv'); ?>"target="_blank"><i class="icon-plus"></i>Export to CSV </a></div>
</div>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Order Details
            </header>
            <div class="drawchintantable">
                <?php $this->chintantable->createsearch("");?>
                <table class="table table-striped table-hover" id="" cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <th data-field="id">ID</th>
                            <th data-field="name">name</th>
                            <th data-field="email">email</th>
                            <th data-field="orderstatusname">Status</th>
                            <th data-field="Action">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <?php $this->chintantable->createpagination();?>
            </div>
        </section>
        <script>
            function drawtable(resultrow) {
                return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.name + "</td><td>" + resultrow.email + "</td><td>" + resultrow.orderstatusname + "</td><td><a class='btn btn-primary btn-xs' href='<?php echo site_url('site/editorder?id=');?>" + resultrow.id + "'><i class='icon-pencil'></i></a></td><td><a class='btn btn-primary btn-xs' href='<?php echo site_url('site/printorderinvoice?id=');?>" + resultrow.id + "'><i class='icon-print'></i></a></td></tr>";
            }
            generatejquery("<?php echo $base_url;?>");
        </script>
    </div>
</div>
