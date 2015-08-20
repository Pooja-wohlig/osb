<div class="row" style="padding:1% 0">
    <div class="col-md-12">
        <a class="btn btn-primary pull-right" href="<?php echo site_url("site/createproduct"); ?>"><i class="icon-plus"></i>Create </a> &nbsp;
    </div>
    <span class="pendingclass"><b>Total no of pending requests: <?php echo $count?></b></span>
    
</div>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Product Details
            </header>
            <div class="drawchintantable">
                <?php $this->chintantable->createsearch("");?>
                <table class="table table-striped table-hover" id="" cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <th data-field="id">ID</th>
                            <th data-field="name">name</th>
<!--                            <th data-field="sku">sku</th>-->
                            <th data-field="price">price</th>
<!--                            <th data-field="description">description</th>-->
                            <th data-field="status">Status</th>
                            <th data-field="moderated">Moderated</th>
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
                if(resultrow.status==1)
                {
                    resultrow.status="Enabled";
                }
                else
                {
                    resultrow.status="Disabled";
                }
                if(resultrow.moderated==1)
                {
                    resultrow.moderated="Yes";
                }
                else
                {
                    resultrow.moderated="No";
                    var classvalue = 'highlight';
                }
                return "<tr id='maintable' class='"+ classvalue +"'><td>" + resultrow.id + "</td><td>" + resultrow.name + "</td><td>" + resultrow.price + "</td><td>" + resultrow.status + "</td><td>" + resultrow.moderated + "</td><td><a class='btn btn-primary btn-xs' href='<?php echo site_url('site/editproduct?id=');?>" + resultrow.id + "'><i class='icon-pencil'></i></a><a class='btn btn-danger btn-xs' onclick=\"return confirm('Are you sure you want to delete?');\" href='<?php echo site_url('site/deleteproduct?id='); ?>" + resultrow.id + "'><i class='icon-trash '></i></a></td></tr>";
            }
            generatejquery("<?php echo $base_url;?>");
        </script>
    </div>
</div>
