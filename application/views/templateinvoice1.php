<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <title>SWAAP BILL</title>
  <style>
    body {
      font-size: 12px;
    }

    .size {
      font-size: 10px;
    }

    .size1 {
      font-size: 9px;
    }

    .bor {
      border: 1px solid #000;
    }

    .bor1 {
      border: 1px solid #000;
      height: 45px;
    }

    .bor2 {
      border: 1px solid #000;
      height: 90px;
    }

    .padd {
      padding: 0px;
    }

    .padd1 {
      padding: 5px;
    }

    .mar {
      margin: 0px;
      margin-bottom: -1px;
    }

    .arr p {
      margin: 0;
      font-size: 13px;
    }

    .arr1 p {
      margin: 0;
      font-size: 13px;
    }

    th {
      border: 1px solid #000;
      text-align: center;
      font-weight: normal;
      vertical-align: top;
    }

    tfoot {
      border: 1px solid #000;
      border-bottom: none;
    }
    .b-width{
      border-width:2px;
    }
    tfoot td {
      padding: 5px;
    }

    .arr1 {
      display: inline-block;
    }

    .arr {
      display: inline-block;
    }

    tbody tr td {
      padding: 0 5px 0 5px;
    }
  </style>
</head>

<body>
  <div class="container">
    <!-- style="width:595px;height:842px" -->
    <div>
      <h4 class="text-center" style="margin:0px"><b>SWAAP ORDER SUMMARY</b></h4>
    </div>
    <div class="row bor b-width" style="border-bottom: none;">
      <div class="col-xs-12 mar">
        <div class="row">
          <div class="col-xs-6 padd">
            <div class="bor1" style="border-bottom:none;">
              <div class="arr" style="padding-left:20px">
                <p>Order ID.</p>
                <p style="margin-top:8px"><b><?php echo $id;?></b></p>
              </div>
            </div>
          </div>
          <div class="col-xs-6 padd">
            <div class="bor1" style="border-bottom:none;border-left:none">
              <div class="arr" style="padding-left:20px">
                <p>Dated</p>
                <p style="margin-top:8px"><b><?php echo $invoicedate;?></b></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-6 bor" style="padding-top: 3px;border-bottom: none;">
        <div class="col-xs-12" style="padding:0px 10px 0px 10px;">
          <div class="arr1">
            <p style="font-size:16"><strong class="text-uppercase">Buyer</strong></p>
            <p><?php echo $userto->name; ?></p>
            <p><?php echo $userto->address; ?></p>
            <p><?php echo $userto->city; ?></p>
            <p><?php echo $userto->state; ?></p>
          </div>
        </div>
      </div>
      <div class="col-xs-6 bor" style="border-left:none;padding-top:3px;height:170px;border-bottom: none;">
        <div class="arr" style="padding-left:5px">
          <p style="font-size: 15px;"><strong  class="text-uppercase">Seller</strong></p>
          <p style="font-size:16"><strong><?php echo $userfrom->name; ?></strong></p>
          <p><?php echo $userfrom->name; ?></p>
            <p><?php echo $userfrom->address; ?></p>
            <p><?php echo $userfrom->city; ?></p>
            <p><?php echo $userfrom->state; ?></p>
        </div>
      </div>

    </div>
    <div class="row bor b-width" style="border-top: none;border-bottom: none;">
      <table style="border-collapse: collapse;width : 100%;font-size:12">
        <col span="7" style="border: 1px solid #000;border-bottom: none">
        <tr>
     
          <th>Description of Goods</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Total Amount</th>
        </tr>
        <tfoot>
          <tr>
            <td align="left"><?php echo $product->name; ?></td>
            <td align="left"><b><?php echo $product->quantity; ?></b></td>
            <td align="left"><b><?php echo $product->price; ?></b></td>
            <td align="left"><b><?php echo $product->finalprice; ?></b></td>
          </tr>
        </tfoot>
   
      </table>
    </div>
    <div class="row bor b-width" style="border-top: none;border-bottom: none;">
      <div class="row bor" style="border-bottom:none;margin:0px">
        <div class="col-xs-8 size" style="padding:0px 0px 0px 5px">Amount Chargeable (in words)
          <br>
          <b class="text-uppercase"> <?php echo $rupees; ?></b></div>
      
      </div>
    </div>
    <div class="row bor padd b-width" style="border-top:none;">
      <div class="col-xs-6 size1" style="margin: 0px;padding: 0px">
        <div class="bor" style="height: 85px;border-top: none;border-right: none;">
        </div>
      </div>
      <div class="col-xs-6 padd " style="font-size:12;border-top: none; border-left: none;">
        <div style="margin-top: -10px;">
          </div>
        </div>
      </div>
    </div>
    <div>
    </div>
  </div>
</body>

</html>
