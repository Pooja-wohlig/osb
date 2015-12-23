<?php
echo getconfig("projectname");
?>

    <div class="row state-overview">
        <div class="col-lg-3 col-sm-3">
            <section class="panel">
                <div class="symbol terques">
                    <i class="icon-user"></i>
                </div>
                <div class="value">
                    <p>Pending Requests To Admin </p>
                    <h1><?php  echo $adminrequest; ?></h1>

                </div>

            </section>
        </div>

        <div class="col-lg-3 col-sm-3">
            <section class="panel">
                <div class="symbol terques">
                    <i class="icon-shopping-cart"></i>
                </div>
                <div class="value">
                    <p>Products </p>
                    <h1><?php  echo $product; ?></h1>

                </div>

            </section>
        </div>
        <div class="col-lg-3 col-sm-3">
            <section class="panel">
                <div class="symbol terques">
                    <i class="icon-list"></i>
                </div>
                <div class="value">
                    <p>Pending Orders Count </p>
                    <h1 class="totalstudentsfilter"><?php  echo $order; ?></h1>

                </div>

            </section>
        </div>
    </div>