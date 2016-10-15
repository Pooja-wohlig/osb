<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <title>ACCESS LABLE</title>
  <style>
  body{
    font-size: 20px;
  }
  .mar{
    margin-top: 100px;
  }
    .arr1 {
      display: inline-block;
    }

    .arr {
      display: inline-block;
    }
    p{
      margin:0px;
    }

  </style>
</head>

<body>
  <div class="container">
    <!-- style="width:595px;height:842px;background: yellow;" -->
    <div class="row">
      <div>
        <div class="arr" style="padding-left:5px">
          <p><strong>Buyer,</strong></p>
          <p><strong><?php echo $before['order']->firstname." ".$before['order']->lastname;?></strong></p>
          <p><strong><?php echo $before['order']->billingaddress;?></strong></p>
          <p><strong><?php echo $before['order']->city." ".$before['order']->billingstate." ".$before['order']->billingcountry;?></strong></p>
          <p><strong><?php echo $before['order']->billingpincode;?></strong></p>
        </div>
      </div>
    </div>
    <div class="row mar">
        <div class="arr pull-right">
          <p><strong>From,</strong></p>
          <p><strong class="text-uppercase">Access</strong></p>
          <p><strong>601 Aditya Arcade 6th Floor,</strong></p>
          <p><strong>Old Topiwala Lane,Nr. Dreamland Cinema,</strong></p>
          <p><strong>Grant Road(E),Mumbai-400007.</strong></p>
          <p><strong>Tel.No.- 022-23840789 /23840809</strong></p>
        </div>

    </div>
  </div>
</body>
</html>
