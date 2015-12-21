<?php
echo getconfig("projectname");
?>

    <div class="row state-overview">
        <div class="col-lg-3 col-sm-3">
            <section class="panel">
                <div class="symbol terques">
                    <i class="icon-building"></i>
                </div>
                <div class="value">
                    <p>Pending Requests To Admin </p>
                    <h1><?php  echo 1; ?></h1>

                </div>

            </section>
        </div>

        <div class="col-lg-3 col-sm-3">
            <section class="panel">
                <div class="symbol terques">
                    <i class="icon-book"></i>
                </div>
                <div class="value">
                    <p>Products </p>
                    <h1><?php  echo 2; ?></h1>

                </div>

            </section>
        </div>
        <div class="col-lg-3 col-sm-3">
            <section class="panel">
                <div class="symbol terques">
                    <i class="icon-book"></i>
                </div>
                <div class="value">
                    <p>Pending Orders Count </p>
                    <h1 class="totalstudentsfilter"><?php  echo 3; ?></h1>

                </div>

            </section>
        </div>
    </div>