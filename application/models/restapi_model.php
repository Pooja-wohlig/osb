<?php
if (!defined("BASEPATH")) exit("No direct script access allowed");
class restapi_model extends CI_Model {
    public function home($user) {
        $query['userdetails'] = $this->db->query("SELECT `id`,`percentpayment`,`name`,`password`,`email`,`accesslevel`,`timestamp`,`status`,`image`,`username`,`socialid`,`logintype`,`json`,`shopname`,`membershipno`,`address`,`description`,`website`,`shopcontact1`,`shopcontact2`,`shopemail`,`purchasebalance`,`salesbalance` FROM `user` WHERE `id`='$user'")->row();
        //		find shops
        $query['area'] = $this->db->query("SELECT `name`,`id` FROM `osb_area`")->result();
        $query['category'] = $this->db->query("SELECT `name`,`id` FROM `osb_category`")->result();
        return $query;
    }
    //	 public function searchresult1($membershipno){
    //  $query['searchresult1']=$this->db->query("SELECT `shopname`,`salesbalance` FROM `user` WHERE `membershipno`='$membershipno'")->row();
    //	  return $query;
    //  }
    public function shopprofile($user) {
        $query = $this->db->query("SELECT `user`.`shoplogo`,`user`.`purchasebalance`,`user`.`salesbalance`,`user`.`membershipno`,`user`.`percentpayment`, `user`.`id`,`user`.`shopname`,`user`.`billingaddress`,`user`.`description`,`user`.`website`,`user`.`shopcontact1`,`user`.`shopcontact2`,`user`.`shopemail`,`user`.`area` as `areaid`,`user`.`termsaccept`,`osb_area`.`name` as `area`,`osb_shopphoto`.`photo` as `shopphoto`,`osb_shopproductphoto`.`photo` as `productphoto`,`user`.`billingcity`,`user`.`billingstate`,`user`.`billingpincode` ,GROUP_CONCAT(DISTINCT(`osb_category`.`id`)) as `categoryid` ,GROUP_CONCAT(DISTINCT(`osb_category`.`name`) SEPARATOR ', ') as `category`
FROM `user`
LEFT OUTER JOIN `osb_shopphoto` ON `osb_shopphoto`.`user`=`user`.`id`
LEFT OUTER JOIN `osb_shopproductphoto` ON `osb_shopproductphoto`.`user`=`user`.`id`
LEFT OUTER JOIN `usercategory` ON `usercategory`.`user`=`user`.`id`
LEFT OUTER JOIN `osb_area` ON `osb_area`.`id`=`user`.`area`
LEFT OUTER JOIN `osb_category` ON `osb_category`.`id`=`usercategory`.`category`
WHERE `user`.`id`='$user' GROUP BY `user`.`id`, `usercategory`.`user`")->row();
        return $query;
    }
    public function shopprofilemem($mem) {
        $query = $this->db->query("SELECT `id` FROM `user` WHERE `membershipno`='$mem' AND `shopstatus`!=0")->row();
        return $query;
    }
    public function yourbalance($user) {
        $query['yourbalance'] = $this->db->query("SELECT `purchasebalance`,`salesbalance` FROM `user` WHERE `id`='$user'")->row();
        return $query;
    }
    public function getAllSlider() {
        $query = $this->db->query("SELECT * FROM `slider` ORDER BY `order` DESC")->result();
        return $query;
    }
    public function addbalance($user, $amount,$reason) {
        $data = array("userfrom" => 1, "userto" => $user, "amount" => $amount, "requeststatus" => 1,"reason" => $reason);
        $query = $this->db->insert("osb_request", $data);
        $id = $this->db->insert_id();
        if (!$query) return 0;
        else return $id;
    }
    public function transaction($user) {
		$query1= $this->db->query("SELECT `userto` from `osb_transaction` WHERE `userto`='$user'")->row();
		$purchaseid=$query1->userto;
		    $query['totalpurchase'] = $this->db->query("SELECT `purchasebalance` FROM `user` WHERE `id`='$purchaseid'")->row();

		$query2= $this->db->query("SELECT `userfrom` from `osb_transaction` WHERE `userfrom`='$user'")->row();
		$saleid=$query2->userfrom;
		    $query['totalsales'] = $this->db->query("SELECT `salesbalance` FROM `user` WHERE `id`='$saleid'")->row();


		// this is sale

//
//         $query['purchased'] = $this->db->query("SELECT `user`.`shoplogo`,`user`.`purchasebalance`,`user`.`shopname`,`osb_transaction`.`amount`,`osb_transaction`.`reason`,`osb_transaction`.`id`,DATE(ADDTIME(`osb_transaction`.`timestamp`,'0 05:30:00')) AS `date`,DATE_FORMAT(STR_TO_DATE(ADDTIME(`osb_transaction`.`timestamp`,'0 05:30:00'), '%Y-%m-%d %H:%i:%s'), '%H:%i:%s') as `time`,`order`.`name`,`user`.`shopemail` as `email1`,`orderitems`.`product`,`orderitems`.`quantity`,`orderitems`.`price`,`orderitems`.`finalprice`,`product`.`name`,`product`.`image`,`user`.`shopcontact1` as `personalcontact`,`user`.`billingaddress` as `address`,DATE(ADDTIME(`order`.`timestamp`,'0 05:30:00')) AS `orderdate`,DATE_FORMAT(STR_TO_DATE(ADDTIME(`order`.`timestamp`,'0 05:30:00'), '%Y-%m-%d %H:%i:%s'), '%H:%i:%s') as `ordertime`,ADDTIME(`osb_transaction`.`timestamp`,'0 05:30:00') as `timestamp` FROM `user`
// LEFT OUTER JOIN `osb_transaction` ON `osb_transaction`.`userfrom`=`user`.`id`
// LEFT OUTER JOIN `order` ON `order`.`id`=`osb_transaction`.`orderid`
// LEFT OUTER JOIN `orderitems` ON `orderitems`.`order`=`order`.`id`
// LEFT OUTER JOIN `product` ON `product`.`id`=`orderitems`.`product`
// WHERE `osb_transaction`.`userfrom`!=1 AND `osb_transaction`.`userto`='$user'
// ORDER BY `osb_transaction`.`id` DESC")->result();


        $query['purchased'] = $this->db->query("SELECT `user`.`shoplogo`,`user`.`purchasebalance`,`user`.`shopname`,`osb_transaction`.`amount`,`osb_transaction`.`reason`,`osb_transaction`.`id`,DATE(`osb_transaction`.`timestamp`) AS `date`,DATE_FORMAT(STR_TO_DATE(`osb_transaction`.`timestamp`, '%Y-%m-%d %H:%i:%s'), '%H:%i:%s') as `time`,`order`.`name`,`user`.`shopemail` as `email1`,`orderitems`.`product`,`orderitems`.`quantity`,`orderitems`.`price`,`orderitems`.`finalprice`,`product`.`name`,`product`.`image`,`user`.`shopcontact1` as `personalcontact`,`user`.`billingaddress` as `address`,DATE(`order`.`timestamp`) AS `orderdate`,DATE_FORMAT(STR_TO_DATE(`order`.`timestamp`, '%Y-%m-%d %H:%i:%s'), '%H:%i:%s') as `ordertime`,`osb_transaction`.`timestamp` as `timestamp` FROM `user`
LEFT OUTER JOIN `osb_transaction` ON `osb_transaction`.`userfrom`=`user`.`id`
LEFT OUTER JOIN `order` ON `order`.`id`=`osb_transaction`.`orderid`
LEFT OUTER JOIN `orderitems` ON `orderitems`.`order`=`order`.`id`
LEFT OUTER JOIN `product` ON `product`.`id`=`orderitems`.`product`
WHERE `osb_transaction`.`userfrom`!=1 AND `osb_transaction`.`userto`='$user'
ORDER BY `osb_transaction`.`id` DESC")->result();


		// this is purchase





        //  $query['sales'] = $this->db->query("SELECT `user`.`shoplogo`,`user`.`salesbalance`,`osb_transaction`.`id`,`user`.`shopname`,`osb_transaction`.`amount`,`osb_transaction`.`reason`,DATE(ADDTIME(`osb_transaction`.`timestamp`,'0 05:30:00')) AS `date`,DATE_FORMAT(STR_TO_DATE(ADDTIME(`osb_transaction`.`timestamp`,'0 05:30:00'), '%Y-%m-%d %H:%i:%s'), '%H:%i:%s') as `time`,`order`.`name`,`order`.`email`,`orderitems`.`product`,`orderitems`.`quantity`,`orderitems`.`price`,`orderitems`.`finalprice`,`product`.`name`,`product`.`image`,`user`.`shopcontact1` as `personalcontact`,`user`.`billingaddress` as `address`,`user`.`shopemail` as `email1`,DATE_FORMAT(STR_TO_DATE(ADDTIME(`order`.`timestamp`,'0 05:30:00'), '%Y-%m-%d %H:%i:%s'), '%H:%i:%s') as `ordertime`,DATE(ADDTIME(`order`.`timestamp`,'0 05:30:00')) AS `orderdate`,ADDTIME(`osb_transaction`.`timestamp`,'0 05:30:00') as `timestamp` FROM `user`
        // LEFT OUTER JOIN `osb_transaction` ON `osb_transaction`.`userto`=`user`.`id`
        // LEFT OUTER JOIN `order` ON `order`.`id`=`osb_transaction`.`orderid`
        // LEFT OUTER JOIN `orderitems` ON `orderitems`.`order`=`order`.`id`
        // LEFT OUTER JOIN `product` ON `product`.`id`=`orderitems`.`product`
        // WHERE `osb_transaction`.`userto`!=1 AND `osb_transaction`.`userfrom`='$user'
        // ORDER BY `osb_transaction`.`id` DESC")->result();


         $query['sales'] = $this->db->query("SELECT `user`.`shoplogo`,`user`.`salesbalance`,`osb_transaction`.`id`,`user`.`shopname`,`osb_transaction`.`amount`,`osb_transaction`.`reason`,DATE(`osb_transaction`.`timestamp`) AS `date`,DATE_FORMAT(STR_TO_DATE(`osb_transaction`.`timestamp`, '%Y-%m-%d %H:%i:%s'), '%H:%i:%s') as `time`,`order`.`name`,`order`.`email`,`orderitems`.`product`,`orderitems`.`quantity`,`orderitems`.`price`,`orderitems`.`finalprice`,`product`.`name`,`product`.`image`,`user`.`shopcontact1` as `personalcontact`,`user`.`billingaddress` as `address`,`user`.`shopemail` as `email1`,DATE_FORMAT(STR_TO_DATE(`order`.`timestamp`, '%Y-%m-%d %H:%i:%s'), '%H:%i:%s') as `ordertime`,DATE(`order`.`timestamp`) AS `orderdate`,`osb_transaction`.`timestamp` as `timestamp` FROM `user`
        LEFT OUTER JOIN `osb_transaction` ON `osb_transaction`.`userto`=`user`.`id`
        LEFT OUTER JOIN `order` ON `order`.`id`=`osb_transaction`.`orderid`
        LEFT OUTER JOIN `orderitems` ON `orderitems`.`order`=`order`.`id`
        LEFT OUTER JOIN `product` ON `product`.`id`=`orderitems`.`product`
        WHERE `osb_transaction`.`userto`!=1 AND `osb_transaction`.`userfrom`='$user'
        ORDER BY `osb_transaction`.`id` DESC")->result();

          $query['admin'] = $this->db->query("SELECT `osb_transaction`.`id`,`osb_transaction`. `userto`,`osb_transaction`. `userfrom`,`osb_transaction`. `reason`,`osb_transaction`. `amount`,`osb_transaction`. `payableamount`,DATE(ADDTIME(`osb_transaction`.`timestamp`,'0 05:30:00')) AS `date`,DATE_FORMAT(STR_TO_DATE(ADDTIME(`osb_transaction`.`timestamp`,'0 05:30:00'), '%Y-%m-%d %H:%i:%s'), '%H:%i:%s') as `time`,`osb_transaction`. `requestid` ,`osb_request`.`approvalreason`,ADDTIME(`osb_transaction`.`timestamp`,'0 05:30:00') as `timestamp` FROM `osb_transaction` LEFT OUTER JOIN `osb_request` ON `osb_transaction`.`requestid`=`osb_request`.`id` WHERE `osb_transaction`.`userfrom`=1 AND `osb_transaction`.`userto`='$user' ORDER BY `osb_transaction`.`id` DESC")->result();


        $query['transaction'] = $this->db->query("SELECT `osb_transaction`.`id`, `osb_transaction`.`userto`,SUM(`osb_transaction`.`payableamount`) AS `totaltransaction`
FROM `osb_transaction`
WHERE `osb_transaction`.`userfrom`=1 AND `osb_transaction`.`userto`='$user'")->row();
        return $query;
    }

public function sellingapproval($user) {

        $query['sellingapproval'] = $this->db->query("SELECT `user`.`shoplogo`,`user`.`purchasebalance`,`user`.`shopname`,`osb_request`.`id`,`osb_request`.`amount`,`osb_request`.`reason` FROM `osb_request` INNER JOIN `user` ON `osb_request`.`userfrom`=`user`.`id` WHERE `osb_request`.`requeststatus`='1' AND `osb_request`.`userfrom`!='1' AND `osb_request`.`userto`='$user'")->result();
        return $query;
    }
    public function accepted($id, $reason, $status) {
    if ($status == "1") {

                //UPDATE REQUESTS
// $q="SELECT * FROM osb_transaction where id='$id' and reason='$reason' and timestamp BETWEEN DATE_SUB(NOW() , INTERVAL 10 MINUTE) AND NOW() ORDER BY timestamp DESC";
          $q="SELECT * FROM osb_transaction where requestid='$id' and reason='$reason' and timestamp BETWEEN DATE_SUB(NOW() , INTERVAL 1 MINUTE) AND NOW() ORDER BY timestamp DESC";
//echo $q;
                // $query = $this->db->query($q)->row();
          $query = $this->db->query($q);
          if ($query->num_rows() > 0) {
              // print_r($query);
              return false;
          }

          else
          {
            //update query for osb_request
            $data = array('approvalreason' => $reason, 'requeststatus' => 2);
            $this->db->where('id', $id);
            $this->db->update('osb_request', $data);

            //slect query from osb_request
             $query = $this->db->query("SELECT `userfrom`,`userto`,`amount`,`reason` FROM `osb_request` WHERE id='$id'")->row();
             $userfrom = $query->userfrom;
             $userto = $query->userto;
             $amount = $query->amount;

            //insert query osb_transaction
              $data = array("userfrom" => $userfrom, "userto" => $userto, "amount" => $amount, "reason" =>$reason,"requestid" =>$id);
              $query = $this->db->insert("osb_transaction", $data);
              $id = $this->db->insert_id();
              $transid = $this->db->insert_id();
              $transid = str_pad($transid, 6, "0", STR_PAD_LEFT);

            //update user balance
              $query=$this->db->query("UPDATE `user` SET `user`.`purchasebalance`=`user`.`purchasebalance`-$amount WHERE `user`.`id`= '$userfrom'" );
              $query=$this->db->query("UPDATE `user` SET `user`.`salesbalance`=`user`.`salesbalance`-$amount WHERE `user`.`id`= '$userto'" );

                $this->user_model->sendnotification("Your Purchase Request for Amount : Rs. ".$amount." is accepted. Transaction Id : ".$transid ,$userfrom);
                $query1=$this->db->query("SELECT `salesbalance` FROM `user` WHERE id='$userto'" )->row();
                $salesbalance=$query1->salesbalance;
                $message="Your Purchase Request for Amount : Rs. " .$amount. " is accepted. Transaction Id : ".$transid;
                $this->user_model->addnotificationtodb($message,$userfrom);
                if($salesbalance<1000){
                     $this->user_model->sendnotification("Your Sell balance is too low please recharge your Account!!!",$userfrom);
                     $message="Your Sell balance is too low please recharge your Account!!!";
                     $this->user_model->addnotificationtodb($message,$userfrom);
                }
                return $id;
              }
        }
         else if ($status == "2") {
          $query = $this->db->query("SELECT `userfrom`,`userto`,`amount`,`reason` FROM `osb_request` WHERE id='$id'")->row();
          $userfrom = $query->userfrom;
          $userto = $query->userto;
          $amount = $query->amount;
          $this->user_model->sendnotification("Your Purchase Request for Amount: $amount is declined",$userfrom);
			 $message="Your Purchase Request for Amount: ".$amount." is declined";
		     $this->user_model->addnotificationtodb($message,$userfrom);
            $data = array('requeststatus' => 3, 'approvalreason' => $reason);
            $this->db->where('id', $id);
            $this->db->update('osb_request', $data);
            return $id;
        }
    }
    public function decline($id) {
        $data = array('requeststatus' => 3);
        $this->db->where('userfrom', $id);
        $this->db->update('osb_request', $data);
        return $id;
    }
    public function changepassword($id, $oldpassword, $newpassword, $confirmpassword) {
        $oldpassword = md5($oldpassword);
        $newpassword = md5($newpassword);
        $confirmpassword = md5($confirmpassword);
        if ($newpassword == $confirmpassword) {
            $useridquery = $this->db->query("SELECT `id` FROM `user` WHERE `password`='$oldpassword'");
            if ($useridquery->num_rows() == 0) {
                return 0;
            } else {
                $query = $useridquery->row();
                $userid = $query->id;
                $updatequery = $this->db->query("UPDATE `user` SET `password`='$newpassword' WHERE `id`='$userid'");
                $updatequery = $this->db->query("UPDATE `user` SET `onlinestatus`=0 WHERE `id`='$id'");
                return 1;
            }
        } else {
//            echo "New password and confirm password do not match!!!";
			          return -1;
        }
    }
    public function getareacategory($area, $category) {
        $query['area'] = $this->db->query("SELECT `name` FROM `osb_area` WHERE `id`='$area'")->row();
        $query['category'] = $this->db->query("SELECT `name` FROM `osb_category` WHERE `id`='$category'")->row();
        return $query;
    }
    public function purchaserequestold($userfrom, $userto, $amount, $reason) {

        $data = array("userfrom" => $userfrom, "userto" => $userto, "amount" => $amount, "reason" => $reason, "requeststatus" => 1);
        $query = $this->db->insert("osb_request", $data);
        $id = $this->db->insert_id();
        $this->user_model->sendnotification("You have a new Purchase Request for Amount: $amount",$userto);
        if (!$query) return 0;
        else return $id;
    }
    public function hotelSubmit($user,$country,$city,$hotelname,$checkin,$checkout,$room,$adult,$children) {

        $data = array("user" => $user, "country" => $country, "city" => $city, "hotelname" => $hotelname, "checkin" => $checkin, "checkout" => $checkout, "room" => $room, "adult" => $adult, "children" => $children);
        $query = $this->db->insert("hotel", $data);
        $id = $this->db->insert_id();

        $data['hotel']= $this->db->query("SELECT `hotel`.`id`, `hotel`.`country`, `hotel`.`city`, `hotel`.`hotelname`,DATE_FORMAT(`hotel`.`checkin`,'%d-%m-%Y') as `checkin`,DATE_FORMAT(`hotel`.`checkout`,'%d-%m-%Y') as `checkout`, `hotel`.`room`, `hotel`.`adult`, `hotel`.`children`, `hotel`.`timestamp`, `hotel`.`user` ,`user`.`membershipno`,`user`.`shopname` FROM `hotel`
          INNER JOIN `user` ON `user`.`id`=`hotel`.`user`
          WHERE `hotel`.`id`='$id'")->row();

        if (!$query) {
             $object = new stdClass();
             $object->data = 'Problem';
             $object->value = false;
        }
        else {
            $htmltext = $this->load->view('emailers/hotelinfo', $data, true);
            $this->email_model->emailer($htmltext,'Hotel Form Submission','swaapindia@gmail.com',"Sir/Madam");
            $object = new stdClass();
            $object->data = 'Inserted';
            $object->value = true;
        }
        return $object;
    }
    public function purchaserequest($userfrom, $userto, $amount, $reason) {

        $data = array(
			"userfrom" => $userfrom,
			"userto" => $userto,
			"amount" => $amount,
			"reason" => $reason,
			"requeststatus" => 1
		);
        $query = $this->db->insert("osb_request", $data);
        $id = $this->db->insert_id();
        $this->user_model->sendnotification("You have a new Purchase Request for Amount: $amount",$userto);
		$message="You have a new Purchase Request for Amount: ".$amount;
		$this->user_model->addnotificationtodb($message,$userto);
        if (!$query) return 0;
        else return $id;
    }
    public function updateprofile($id, $shopname, $address, $description, $shopcontact1, $shopcontact2, $shopemail, $website,$shoplogo,$billingcity,$billingstate,$billingpincode) {




        $query = $this->db->query("UPDATE `user` SET `shopname`='$shopname',`billingaddress`='$address',`description`='$description',`shopcontact1`='$shopcontact1',`shopcontact2`='$shopcontact2',`shopemail`='$shopemail',`website`='$website',`billingcity`='$billingcity',`billingstate`='$billingstate',`billingpincode`='$billingpincode' WHERE `id`='$id'");
		 if(!$query)
            return  0;
            else
            return  $id;
    }


    public function updateterms($id, $termsaccept) {
        $query = $this->db->query("UPDATE `user` SET `termsaccept`='$termsaccept' WHERE `id`='$id'");
     if(!$query)
            return  0;
            else
            return  $id;
    }
    public function removeProfileImage($user) {
        $query = $this->db->query("UPDATE `user` SET `shoplogo`='' WHERE `id`='$user'");
            if(!$query)
            return  0;
            else
            return  true;
    }
    public function deleteShopPhoto($id) {
        $query = $this->db->query("DELETE FROM `osb_shopphoto` WHERE `id`='$id'");
            if(!$query)
            return  0;
            else
            return  true;
    }
    public function deleteProductsPhoto($id) {
        $query = $this->db->query("DELETE FROM `osb_shopproductphoto` WHERE `id`='$id'");
            if(!$query)
            return  0;
            else
            return  true;
    }


    public function acceptreason($id, $reason) {
        $data = array('reason' => $reason);
        $this->db->where('id', $id);
        $this->db->update('osb_transaction', $data);
    }
    public function declinereason($id, $reason) {
        $data = array('reason' => $reason);
        $this->db->where('userfrom', $id);
        $this->db->update('osb_request', $data);
    }
    public function acceptstatus($id) {
        $data = array('requeststatus' => 2);
        $this->db->where('userfrom', $id);
        $this->db->update('osb_request', $data);
    }
    public function shopphoto($id) {
        $query = $this->db->query("SELECT `id`,`user`,`photo` FROM `osb_shopphoto` WHERE `user`='$id'")->result();
        return $query;
    }
    public function shopproductphoto($id) {
        $query = $this->db->query("SELECT `id`,`user`,`photo` FROM `osb_shopproductphoto` WHERE `user`='$id'")->result();
        return $query;
    }
    public function allshop() {
        $query = $this->db->query("SELECT `shopname`,`sellbalance`,`photo` FROM `osb_shopphoto` WHERE `user`='$id'")->result();
        return $query;
    }
	 public function getallcategory1() {
        $query = $this->db->query("SELECT `id`,`name` FROM `osb_category`")->result();
        return $query;
    }
	public function updatecat($userid,$catid){

    $catarray=explode(",",$catid);
    $querydelete=$this->db->query("DELETE FROM `usercategory` WHERE `user`='$userid'");

    foreach($catarray as $row){
      $data1  = array(
          'user' => $userid,
          'category' => $row
      );
      $query1=$this->db->insert( 'usercategory', $data1 );
    }
	// $data = array('user' => $userid,'category' =>$catid);
  //       $this->db->where('user', $userid);
  //       $this->db->update('usercategory', $data);
		return $userid;
	}
	 public function getarea() {
        $query = $this->db->query("SELECT `id`,`name` FROM `osb_area`")->result();
        return $query;
    }
	public function updatearea($userid,$areaid){
	$data = array('area' =>$areaid);
        $this->db->where('id', $userid);
        $this->db->update('user', $data);
		return $userid;
	}
	public function logout($loginid){
	$data  = array(
			'token' =>0,
		);
		$this->db->where('id',$loginid);
		$query=$this->db->update( 'user', $data );
		if(!$query)
			return  0;
		else
			return  1;

	}

	public function updateorderstatusafterpayment($orderid)
    {
        $query=$this->db->query("UPDATE `osb_request` SET `requeststatus`=2 , `approvalreason`='Paid Through Payment Gateway' WHERE `id`='$orderid'");
        return $query;
	}

	public function checkorderstatus($orderid)
    {
        $query=$this->db->query("SELECT `requeststatus` FROM `osb_request` WHERE `id`='$orderid'")->row();
        $status=$query->requeststatus;
        if($status==2)
        {
            return 1;
        }
        else
        {
            return 0;
        }
//        return $query;
	}
//	public function viewallproducts(){
//$query=$this->db->query("SELECT `id`, `name`, `sku`, `price`, `description`, `status` FROM `product`")->result();
//		return $query;
// }
		public function getsingleproduct($id){
$query=$this->db->query("SELECT `product`.`id`, `product`.`name`, `product`.`sku`, `product`.`price`, `product`.`description`, `product`.`status`, `product`.`user`, `product`.`quantity`, `product`.`image`,`productcategory`.`category` as `category`,`osb_category`.`name` as `categoryname`,`user`.`shopname` FROM `product` LEFT OUTER JOIN `productcategory` ON `productcategory`.`product`=`product`.`id` LEFT OUTER JOIN `osb_category` ON `productcategory`.`category`=`osb_category`.`id` LEFT OUTER JOIN `user` ON `user`.`id`=`product`.`user` WHERE `product`.`id`='$id'")->row();
		return $query;
 }


	public function buyproduct($userid,$productid,$quantity,$name,$email,$contactno,$billingaddress,$billingcity,$billingstate,$billingcountry,$billingpincode,$shippingaddress,$shippingcity,$shippingcountry,$shippingstate,$shippingpincode)
    {
        $getproductdetails=$this->db->query("SELECT * FROM `product` WHERE `id`='$productid'")->row();
    		$user=$getproductdetails->user;
    		$productname=$getproductdetails->name;
        $price=$getproductdetails->price;
        $oldquantity=$getproductdetails->quantity;
        $finalprice=$price*$quantity;
        $newproductquantity=$oldquantity-$quantity;

        $getuserdetails=$this->db->query("SELECT * FROM `user` WHERE `id`='$userid'")->row();
        $purchasebalance=$getuserdetails->purchasebalance;
        $shopname=$getuserdetails->shopname;
        $newpurchasebalance=$purchasebalance - $finalprice;

        if($quantity > $oldquantity)
        {
            return -1;
        }
        else if($purchasebalance < $finalprice)
        {
            return -2;
        }
        else
        {
            $querycreateorder=$this->db->query("INSERT INTO `order`( `user`, `name`, `email`,`contactno`, `billingaddress`, `billingcity`, `billingstate`, `billingcountry`, `billingpincode`, `shippingaddress`, `shippingcity`, `shippingcountry`, `shippingstate`,`shippingpincode`,`orderstatus`) VALUES ('$userid','$name','$email','$contactno','$billingaddress','$billingcity','$billingstate','$billingcountry','$billingpincode','$shippingaddress','$shippingcity','$shippingcountry','$shippingstate','$shippingpincode','1')");
            $order=$this->db->insert_id();
            $data  = array(
                'order' => $order,
                'product' => $productid,
                'price' => $price,
                'quantity' => $quantity,
                'finalprice' => $finalprice
            );
            $query=$this->db->insert( 'orderitems', $data );
			// TRANSACTION

			 $data1  = array(
                'userfrom' => $userid,
                'userto' => $user,
                'reason' => "ORDER ID: ".$order,
                'amount' => $finalprice,
                'orderid' => $order
            );
            $query=$this->db->insert( 'osb_transaction', $data1 );

            $updateuserpurchasebalance=$this->db->query("UPDATE `user` SET `purchasebalance`='$newpurchasebalance' WHERE `id`='$userid'");
            $updateproductquantity=$this->db->query("UPDATE `product` SET `quantity`='$newproductquantity' WHERE `id`='$productid'");
			 //send notification for buying product
			$this->user_model->sendnotification("Your Product ".$productname." is purchased by ".$shopname." Quantity : ".$quantity." Order Id : ".$order,$user);
			 $message="Your Product ".$productname." is purchased by ".$shopname." Quantity : ".$quantity." Order Id : ".$order;
		     $this->user_model->addnotificationtodb($message,$user);

    //        $id=$this->db->insert_id();
            if(!$query)
                return  0;
            else
                return  $order;
        }
	}

	public function viewsingleorder($orderid,$userid)
    {
        $query=$this->db->query("SELECT  `order`.`id`  AS `id` ,  `order`.`name`  AS `name` ,  `order`.`email`  AS `email` ,  `order`.`transactionid`  AS `transactionid` ,  `order`.`trackingcode`  AS `trackingcode` ,  `order`.`orderstatus`  AS `orderstatus` ,  `order`.`timestamp`  AS `timestamp`,`order`. `billingaddress`,`order`. `billingcity`,`order`. `billingstate`,`order`. `billingcountry`,`order`. `billingpincode`,`order`. `shippingaddress`,`order`. `shippingcity`,`order`. `shippingcountry`,`order`. `shippingstate`,`order`. `shippingpincode` ,  `orderstatus`.`name`  AS `orderstatusname` ,  `orderitems`.`product`  AS `productid` ,  `orderitems`.`quantity`  AS `quantity` ,  `orderitems`.`price`  AS `price` ,  `orderitems`.`finalprice`  AS `finalprice` ,  `product`.`name`  AS `productname` ,  `product`.`sku`  AS `productsku`
        FROM `orderitems`
        LEFT OUTER JOIN `order` ON `orderitems`.`order`=`order`.`id`
        LEFT OUTER JOIN `orderstatus` ON `orderstatus`.`id`=`order`.`orderstatus`
        LEFT OUTER JOIN `product` ON `orderitems`.`product`=`product`.`id`
        WHERE `order`.`user`='$userid' AND `order`.`id`='$orderid'")->row();

        if(!$query)
        return  0;
        else
        return  $query;
	}
	public function viewsingleordernew($orderid,$userid)
    {
		$query=$this->db->query("SELECT `order`.`id`,`order`. `user`,`order`. `name`,`order`. `email`,`order`. `billingaddress`,`order`. `billingcity`,`order`. `billingstate`,`order`. `billingcountry`,`order`. `billingpincode`,`order`. `shippingaddress`,`order`. `shippingcity`,`order`. `shippingcountry`,`order`. `shippingstate`,`order`. `shippingpincode`,`order`. `transactionid`,`order`. `trackingcode`,`order`. `orderstatus`,`order`. `timestamp` ,`user`.`name` AS `username`
FROM `order`
LEFT OUTER JOIN `user` ON `order`.`user`=`user`.`id`
WHERE `order`.`id`='$orderid'")->row();
		$query->orderitems=$this->db->query("SELECT `orderitems`.`id`,`orderitems`. `order`,`product`.`name` AS `productname`,`orderitems`. `product`,`orderitems`. `quantity`,`orderitems`. `price`,`orderitems`. `discount`,`orderitems`. `finalprice`
FROM `orderitems`
INNER JOIN `order` ON `order`.`id`=`orderitems`.`order`
INNER JOIN `product` ON `product`.`id`=`orderitems`.`product`
WHERE `orderitems`.`order`='$orderid'")->result();
        if(!$query)
        return  0;
        else
        return  $query;
	}

	public function createproduct($name,$price,$description,$status,$user,$quantity,$category,$image)
    {
        $data=array(
            "name" => $name,
//            "sku" => $sku,
            "price" => $price,
            "description" => $description,
            "user" => $user,
            "quantity" => $quantity,
            "status" => $status,
			"image" => $image
        );
        $userdetails=$this->db->query("SELECT * FROM `user` WHERE `id`='$user'")->row();
        $salesbalance=$userdetails->salesbalance;
        $finalprice=$price*$quantity;
        if($salesbalance < $finalprice)
        {
            return -1;
        }
        else
        {
            $query=$this->db->insert( "product", $data );
            $id=$this->db->insert_id();
			$querycategory=$this->db->query("INSERT INTO `productcategory`(`product`, `category`) VALUES ('$id','$category')");
            if($status==1)
            {
                $changedsalesbalance=$salesbalance-$finalprice;
                $queryupdatesalesbalance=$this->db->query("UPDATE `user` SET `salesbalance`='$changedsalesbalance' WHERE `id`='$user'");
            }
            if(!$query)
            return  0;
            else
            return  $id;
        }
	}
    public function editproduct($id,$name,$price,$description,$status,$user,$quantity,$category,$image)
    {

        $productdetails=$this->db->query("SELECT `product`.`id` AS `productid`,`product`.`price`,`product`.`quantity`,`product`.`user`,`product`.`status`,`user`.`salesbalance` FROM `product` INNER JOIN `user` ON `user`.`id`=`product`.`user` WHERE `product`.`id`='$id'")->row();
        $olduser=$productdetails->user;
        $oldprice=$productdetails->price;
        $oldquantity=$productdetails->quantity;
        $oldsalesbalance=$productdetails->salesbalance;
        $oldstatus=$productdetails->status;
        $oldfinalprice=$oldprice*$oldquantity;

        $changedsalesbalance=$oldsalesbalance+$oldfinalprice;
        $receivedfinalprice= $price * $quantity;

        if($changedsalesbalance < $receivedfinalprice)
        {
            return 0;
        }
        else
        {
            if($status==0 && $oldstatus==0)
            {
              $data1 = array(
                  "name" => $name,
      //            "sku" => $sku,
                  "price" => $price,
                  "description" => $description,
                  "quantity" => $quantity,
                  "status" => $status,
                  "image" => $image
              );
                $this->db->where('id', $id);
                $this->db->update('product', $data1);
                $query=$this->db->query("UPDATE `productcategory` SET `category`='$category' WHERE `product`='$id'");
            }
            else if($status==1 && $oldstatus==1)
            {
              $data2 = array(
                  "name" => $name,
      //            "sku" => $sku,
                  "price" => $price,
                  "description" => $description,
                  "quantity" => $quantity,
                  "status" => $status,
                  "image" => $image
              );
                $this->db->where('id', $id);
                $this->db->update('product', $data2);
                $query=$this->db->query("UPDATE `productcategory` SET `category`='$category' WHERE `product`='$id'");

                $lastsalesbalance=$changedsalesbalance-$receivedfinalprice;
                $queryupdatesalesbalance=$this->db->query("UPDATE `user` SET `salesbalance`='$lastsalesbalance' WHERE `id`='$user'");
            }
            else if($status==0 && $oldstatus==1)
            {
              //disabled product add balance

                $lastsalesbalance=$oldsalesbalance+$oldfinalprice;
                $queryupdatesalesbalance=$this->db->query("UPDATE `user` SET `salesbalance`='$lastsalesbalance' WHERE `id`='$user'");
                $data3 = array(
                    "name" => $name,
        //            "sku" => $sku,
                    "price" => $price,
                    "description" => $description,
                    "quantity" => $quantity,
                    "status" => $status,
                    "image" => $image
                );
                  $this->db->where('id', $id);
                  $this->db->update('product', $data3);
                $query=$this->db->query("UPDATE `productcategory` SET `category`='$category' WHERE `product`='$id'");
            }
            else if($status==1 && $oldstatus==0)
            {
              $data4 = array(
                  "name" => $name,
      //            "sku" => $sku,
                  "price" => $price,
                  "description" => $description,
                  "quantity" => $quantity,
                  "status" => $status,
                  "image" => $image
              );
                $this->db->where('id', $id);
                $this->db->update('product', $data4);
                //enable product add balance

                $query=$this->db->query("UPDATE `productcategory` SET `category`='$category' WHERE `product`='$id'");

                $productdetails=$this->db->query("SELECT `product`.`id` AS `productid`,`product`.`price`,`product`.`quantity`,`product`.`user`,`product`.`status`,`user`.`salesbalance` FROM `product` INNER JOIN `user` ON `user`.`id`=`product`.`user` WHERE `product`.`id`='$id'")->row();
                $olduser=$productdetails->user;
                $oldprice=$productdetails->price;
                $oldquantity=$productdetails->quantity;
                $oldsalesbalance=$productdetails->salesbalance;
                $oldstatus=$productdetails->status;
                $oldfinalprice=$oldprice*$oldquantity;

                $changedsalesbalance=$oldsalesbalance-$oldfinalprice;
                if($changedsalesbalance <0){
                  $data5 = array(
                      "status" => 0
                  );
                    $this->db->where('id', $id);
                    $this->db->update('product', $data5);
                  return 0;
                }
                else{
                    $queryupdatesalesbalance=$this->db->query("UPDATE `user` SET `salesbalance`='$changedsalesbalance' WHERE `id`='$user'");
                }
//                $receivedfinalprice= $price * $quantity;
//
//                $lastsalesbalance=$changedsalesbalance-$receivedfinalprice;

            }

            return 1;
        }


	}
	public function editproductold($id,$name,$price,$description,$status,$user,$quantity,$category,$image)
    {
        $data = array(
            "name" => $name,
//            "sku" => $sku,
            "price" => $price,
            "description" => $description,
            "quantity" => $quantity,
            "status" => $status,
            "image" => $image
        );
        $productdetails=$this->db->query("SELECT `product`.`id` AS `productid`,`product`.`price`,`product`.`quantity`,`product`.`user`,`product`.`status`,`user`.`salesbalance` FROM `product` INNER JOIN `user` ON `user`.`id`=`product`.`user` WHERE `product`.`id`='$id'")->row();
        $olduser=$productdetails->user;
        $oldprice=$productdetails->price;
        $oldquantity=$productdetails->quantity;
        $oldsalesbalance=$productdetails->salesbalance;
        $oldstatus=$productdetails->status;
        $oldfinalprice=$oldprice*$oldquantity;

        $changedsalesbalance=$oldsalesbalance+$oldfinalprice;
        $receivedfinalprice= $price * $quantity;

        if($changedsalesbalance < $receivedfinalprice)
        {
            return 0;
        }
        else
        {
            $this->db->where('id', $id);
            $this->db->update('product', $data);
            $query=$this->db->query("UPDATE `productcategory` SET `category`='$category' WHERE `product`='$id'");


            $lastsalesbalance=$changedsalesbalance-$receivedfinalprice;
            $queryupdatesalesbalance=$this->db->query("UPDATE `user` SET `salesbalance`='$lastsalesbalance' WHERE `id`='$user'");
            return 1;
        }
//        }
//            echo "in all same if";
//            return 1;
//        }


//        if($price != $oldprice || $quantity != $oldquantity)
//        {
//            $newfinalprice=$price*$quantity;
//            if($newfinalprice<$oldfinalprice)
//            {
//                $difference=$oldfinalprice-$newfinalprice;
//                $lastsalesbalance=$oldsalesbalance-$difference;
//                $insertedsalesbalance=$oldsalesbalance+$lastsalesbalance;
//            }
//            else if($newfinalprice>$oldfinalprice)
//            {
//                $difference=$newfinalprice-$oldfinalprice;
//                $lastsalesbalance=$oldsalesbalance+$difference;
//                $insertedsalesbalance=$oldsalesbalance-$lastsalesbalance;
//            }
//            $queryupdatesalesbalance=$this->db->query("UPDATE `user` SET `salesbalance`='$insertedsalesbalance' WHERE `id`='$user'");
//
//
//            $this->db->where('id', $id);
//            $this->db->update('product', $data);
//			$this->db->query("UPDATE `productcategory` SET `category`='$category' WHERE `product`='$id'");
////            echo "in different if";
//            return 1;
////            if($status == $oldstatus)
////            {
////                no change in user
////            }
////            else if($status<$oldstatus)
////            {
////                userchange with - value
////            }
////            else if($status > $oldstatus)
////            {
////                userchange with + value
////            }
//
//        }
//        if($query)
//            return 1;
//        else
//            return 0;



	}
	public function deleteproduct($productid,$user)
    {
        $productdetails=$this->db->query("SELECT * FROM `product` WHERE `id`='$productid'")->row();
        $productprice=$productdetails->price;
        $productquantity=$productdetails->quantity;
        $productfinalamount=$productprice * $productquantity;
        $userdetails=$this->db->query("SELECT * FROM `user` WHERE `id`='$user'")->row();
        $salesbalance=$userdetails->salesbalance;
        $lastsalesbalance=$salesbalance + $productfinalamount;

        $querydelete=$this->db->query("DELETE FROM `product` WHERE `id`='$productid' AND `user`='$user'");
        $querydelete=$this->db->query("DELETE FROM `productcategory` WHERE `product`='$productid'");
        $querydelete=$this->db->query("DELETE FROM `productimage` WHERE `product`='$productid'");
        if($querydelete)
        {
            $updateuser=$this->db->query("UPDATE `user` SET `salesbalance`='$lastsalesbalance' WHERE `id`='$user'");
            return 1;
        }
        else
        {
            return -1;
        }
	}

    public function searchresult($area,$category,$online,$offline)
    {
        if ($area != "0" && $area != "")
        {
            $areaquery = "`user`.`area`='$area'";
        }
        else
        {
            $areaquery = " 1 ";
        }

        if ($category != "0" && $category != "")
        {
            $categoryquery = "`usercategory`.`category`='$category'";
        }
        else
        {
            $categoryquery = " 1 ";
        }

        if ($online == "0")
        {
            if($offline=="0")
            {
                $onlinequery = " 1 ";
            }
            else
            {
                $onlinequery = "`user`.`onlinestatus`='2'";
            }
        }
        else if($online=="1")
        {
            if($offline=="0")
            {
                $onlinequery = "`user`.`onlinestatus`='1'";
            }
            else
            {
                $onlinequery = " (`user`.`onlinestatus`='3' OR `user`.`onlinestatus`='2' OR `user`.`onlinestatus`='1') ";
            }
        }


        //print_r("SELECT `user`.`id`,`user`.`shopname` as `name`,`user`.`salesbalance` as `sellbalance` FROM `user` LEFT OUTER JOIN `usercategory` ON `usercategory`.`user`=`user`.`id` LEFT OUTER JOIN `osb_category` ON `osb_category`.`id`=`usercategory`.`category` WHERE $areaquery AND $categoryquery");
        $query = $this->db->query("SELECT DISTINCT(`user`.`id`),`user`.`shopname` as `name`,`user`.`salesbalance` as `sellbalance`,`user`.`onlinestatus` as `onlinestatus`
        FROM `user`
        LEFT OUTER JOIN `usercategory` ON `usercategory`.`user`=`user`.`id`
        LEFT OUTER JOIN `osb_category` ON `osb_category`.`id`=`usercategory`.`category`
        WHERE $areaquery AND $categoryquery AND $onlinequery AND `user`.`shopstatus`!=0 AND `user`.`salesbalance` > 0 ORDER BY `user`.`salesbalance` DESC")->result();

        return $query;
    }


	public function editprofile($userid,$name,$email,$message,$image,$username,$shopname,$membershipnumber,$address,$description,$website,$shopcontact1,$shopcontact2,$shopemail,$area,$shoplogo,$billingaddress,$billingcity,$billingstate,$billingcountry,$billingpincode,$shippingaddress,$shippingcity,$shippingcountry,$shippingstate,$shippingpincode,$onlinestatus,$password)
    {

		$data  = array(
			'name' => $name,
			'email' => $email,
			'message' => $message,
            'image'=> $image,
			'shopname' => $shopname,
			'area' => $area,
			'membershipno' => $membershipnumber,
			'address' => $address,
			'description' => $description,
			'website' => $website,
			'shopcontact1' => $shopcontact1,
			'shopcontact2' => $shopcontact2,
			'shopemail' => $shopemail,
			'purchasebalance' => $purchasebalance,
			'salesbalance' => $salesbalance,
			'shoplogo' => $shoplogo,
			'percentpayment' => $percentpayment,
			'billingaddress' => $billingaddress,
			'billingcity' => $billingcity,
			'billingstate' => $billingstate,
			'billingcountry' => $billingcountry,
			'billingpincode' => $billingpincode,
			'shippingaddress' => $shippingaddress,
			'shippingcity' => $shippingcity,
			'shippingcountry' => $shippingcountry,
			'shippingstate' => $shippingstate,
			'shippingpincode' => $shippingpincode,
			'onlinestatus' => $onlinestatus
		);
		if($password != "")
			$data['password'] =md5($password);
        $this->db->where('id', $id);
        $this->db->update('user', $data);
	}


	public function viewmysingleorder($orderid,$userid)
    {
        $query=$this->db->query("SELECT  `order`.`id`  AS `id` ,  `order`.`name`  AS `name` ,  `order`.`email`  AS `email` ,  `order`.`transactionid`  AS `transactionid` ,  `order`.`trackingcode`  AS `trackingcode` ,  `order`.`orderstatus`  AS `orderstatus` ,  `order`.`timestamp`  AS `timestamp`,`order`. `billingaddress`,`order`. `billingcity`,`order`. `billingstate`,`order`. `billingcountry`,`order`. `billingpincode`,`order`. `shippingaddress`,`order`. `shippingcity`,`order`. `shippingcountry`,`order`. `shippingstate`,`order`. `shippingpincode` ,  `orderstatus`.`name`  AS `orderstatusname` ,  `orderitems`.`product`  AS `productid` ,  `orderitems`.`quantity`  AS `quantity` ,  `orderitems`.`price`  AS `price` ,  `orderitems`.`finalprice`  AS `finalprice` ,  `product`.`name`  AS `productname` ,  `product`.`sku`  AS `productsku`
        FROM `orderitems`
        LEFT OUTER JOIN `order` ON `orderitems`.`order`=`order`.`id`
        LEFT OUTER JOIN `orderstatus` ON `orderstatus`.`id`=`order`.`orderstatus`
        LEFT OUTER JOIN `product` ON `orderitems`.`product`=`product`.`id`
        WHERE `order`.`user`='$userid' AND `order`.`id`='$orderid'")->row();

        if(!$query)
        return  0;
        else
        return  $query;
	}
	public function changeproductstatus($productid,$status)
    {
        $productdetails=$this->db->query("SELECT `product`.`id` AS `productid`,`product`.`price`,`product`.`quantity`,`product`.`user`,`product`.`status`,`user`.`salesbalance` FROM `product` INNER JOIN `user` ON `user`.`id`=`product`.`user` WHERE `product`.`id`='$productid'")->row();

        $user=$productdetails->user;
        $price=floatval($productdetails->price);
        $quantity=floatval($productdetails->quantity);
        $salesbalance=floatval($productdetails->salesbalance);
        $oldstatus=$productdetails->status;
        $finalprice=$price*$quantity;
		$status=intval($status);
		$oldstatus=intval($oldstatus);
       $echo.= $status;
$echo.= $oldstatus;

if($status==0 && $oldstatus==1)
        {
            $newsalesbalanceafter=$salesbalance+$finalprice;
$echo.=".$newsalesbalanceafter.";
            $queryupdatesalesbalance=$this->db->query("UPDATE `user` SET `salesbalance`='$newsalesbalanceafter' WHERE `id`='$user'");
$echo.= "Done";
        }
        else if($status==1 && $oldstatus==0)
        {

            $newsalesbalanceafter=$salesbalance-$finalprice;
$echo.=".$newsalesbalanceafter.";
            $queryupdatesalesbalance=$this->db->query("UPDATE `user` SET `salesbalance`='$newsalesbalanceafter' WHERE `id`='$user'");
$echo.= "done2";
        }
        $query=$this->db->query("UPDATE `product` SET `status`='$status' WHERE `id`='$productid'");

        if(!$query)
        return  $echo;
        else
        return  $echo;
	}
	public function becomeamember($name,$email,$number,$message,$os)
  {
        $data=array("name" => $name,"email" => $email,"personalcontact" => $number,"message" => $message,"status"=>2);
        $query=$this->db->insert( "register", $data );
        $id=$this->db->insert_id();
        // if($id)
        // {
        //   $this->load->helper('url');
        //   $mainurl=$this->config->base_url();
        //   $username=$name;
        //   $text = "Dear ".$username." ,Welcome to Swaap";
        //   $text = urlencode ( $text );
        //   $exactpath="http://api-alerts.solutionsinfini.com/v3/?method=sms&api_key=A8f9d0962570b73f21b888dba919045d5&to=9594390024&sender=SwaapI&message=$text&format=php&custom=1,2&flash=0";
        //   $return = file_get_contents($exactpath);
        // }
      if(!$query)
      return  0;
      else
      return  $id;
 }
	public function viewmyproducts($user){
	 $query=$this->db->query("SELECT `id`, `name`, `sku`, `price`, `description`, `status`, `user`, `quantity`, `image`,`moderated` FROM `product` WHERE `user`='$user' ORDER BY `id` DESC")->result();
        if(!$query)
        return  0;
        else
        return  $query;
	}
	public function editproductimage($id,$imagename) {
			$query=$this->db->query("UPDATE `product` SET `image`='$imagename' WHERE `id`='$id'" );
			return $imagename;
	}
	public function searchproductold($product,$membershipno,$category){
	$query=$this->db->query("SELECT `product`.`id` as `productid`, `product`.`name`, `product`.`sku`, `product`.`price`, `product`.`description`, `product`.`status`, `product`.`user`, `product`.`quantity`, `product`.`image`,`productcategory`.`category` ,`osb_category`.`name` as `categoryname` FROM `product` LEFT OUTER JOIN `productcategory` ON `productcategory`.`product`=`product`.`id` LEFT OUTER JOIN `osb_category` ON `productcategory`.`category`=`osb_category`.`id` LEFT OUTER JOIN `user` ON `user`.`id`=`product`.`user` WHERE `product`.`name` LIKE '%$product%' OR `user`.`membershipno`='$membershipno' OR `productcategory`.`category`='$category'")->result();
		return $query;
	}

    public function searchproduct($product,$membershipno,$category,$priceorder)
    {
		    $wherequery="";
        $orderclause="";

		if ($membershipno != "0" && $membershipno != "")
		{
            $getproductids=$this->db->query("SELECT `id` FROM `product` WHERE `user` IN (SELECT `id` FROM `user` WHERE `shopname` LIKE '%$membershipno%')")->result();
             $productids="(";
            foreach($getproductids as $key=>$value){
//            $catid=$row->id;
                if($key==0)
                {
                    $productids.=$value->id;
                }
                else
                {
                    $productids.=",".$value->id;
                }
            }
            $productids.=")";
            if($productids=="()"){
             $productids="(0)";
            }
            $wherequery.=" AND `product`.`id` IN $productids";

		}
		else
		{
			if ($product != "0" && $product != "")
			{
				$wherequery .= " AND (`product`.`name` LIKE '%$product%' OR `product`.`description` LIKE '%$product%')";
			}
			if ($category != "0" && $category != "")
			{
				$wherequery .= " AND `productcategory`.`category`='$category'";
			}
		}
        if($priceorder==0)
        {
            $orderclause .=" ORDER BY `product`.`price` ASC ";
        }
        else
        {
            $orderclause .=" ORDER BY `product`.`price` DESC ";
        }
        $query = $this->db->query("SELECT `product`.`id` as `productid`, `product`.`name`, `product`.`sku`, `product`.`price`, `product`.`description`, `product`.`status`, `product`.`user`, `product`.`quantity`, `product`.`image`,`productcategory`.`category` ,`osb_category`.`name` as `categoryname` FROM `product` LEFT OUTER JOIN `productcategory` ON `productcategory`.`product`=`product`.`id` LEFT OUTER JOIN `osb_category` ON `productcategory`.`category`=`osb_category`.`id` LEFT OUTER JOIN `user` ON `user`.`id`=`product`.`user` WHERE `product`.`quantity` > 0 AND `product`.`status`=1 AND `product`.`moderated`=1  $wherequery GROUP BY `product`.`id` $orderclause ")->result();
        return $query;
    }

	public function getuserdetails($user){
		$query=$this->db->query("SELECT `id`, `name`, `email`, `message`, `personalcontact`, `accesslevel`, `timestamp`, `status`, `image`, `username`, `socialid`, `logintype`, `json`, `shopname`, `membershipno`, `address`, `description`, `website`, `shopcontact1`, `shopcontact2`, `shopemail`, `purchasebalance`, `salesbalance`, `area`, `shoplogo`, `percentpayment`, `token`, `billingaddress`, `billingcity`, `billingstate`, `billingcountry`, `billingpincode`, `shippingaddress`, `shippingcity`, `shippingcountry`, `shippingstate`, `shippingpincode`, `onlinestatus` FROM `user` WHERE `id`='$user'")->result();
		return $query;
	}
	public function getnotification($user){
		$query=$this->db->query("SELECT `id`, `user`, `type`, DATE(`timestamp`) as `date`,DATE_FORMAT(STR_TO_DATE(`notification`.`timestamp`, '%Y-%m-%d %H:%i:%s'), '%H:%i') as `time`, `message` FROM `notification` WHERE `user`='$user' ORDER BY `id` DESC ")->result();
		return $query;
	}
	public function addproductimage($id,$imagename) {
		$query=$this->db->query("UPDATE `product` SET `image`='$imagename' WHERE `id`='$id'" );
			return $imagename;

	}
	public function isnewuser($user){
	$query=$this->db->query("SELECT `onlinestatus` FROM `user` WHERE `id`='$user'")->row();
		return $query;
	}
	public function makeNotificationread($id){
	// $query=$this->db->query("UPDATE `notification` SET `status`='1' WHERE `id`='$id'" );
  $query=$this->db->query("DELETE FROM `notification` WHERE `id`='$id'");
  if($query)
		return true;
  else
    return false;


	}
	public function isnewuserchangestatus($user){
	$query=$this->db->query("UPDATE `user` SET `onlinestatus`=0 WHERE `id`='$user'" );
		return 1;
	}
	public function submitsuggestion($user,$message,$userid){
	$data=array("user" => $user,"message" => $message,"userid" => $userid);
  $query=$this->db->insert( "suggestion", $data );
  $id=$this->db->insert_id();


  $data['suggestion']= $this->db->query("SELECT `suggestion`.`id`, `suggestion`.`message`, `suggestion`.`user`,`user`.`membershipno`,`user`.`shopname` FROM `suggestion`
INNER JOIN `user` ON `user`.`id`=`suggestion`.`userid`
WHERE `suggestion`.`id`='$id'")->row();
  $obj= new stdClass();

    if(!$query){
      $obj->data="Not Inserted";
      $obj->value=false;
    }
    else{
      $htmltext = $this->load->view('emailers/faqinfo', $data, true);
      $this->email_model->emailer($htmltext,'Faq Form Submission','swaapindia@gmail.com',"Sir/Madam");
      $obj->data="Inserted";
      $obj->value=true;
    }
    return $obj;

	}
    public function sendNotificationIos($title)
    {
        $query = $this->db->query('SELECT * FROM `config` WHERE `id`=13')->row();
        $passphase = $query->description;
        $pem = $query->image;
        $query1 = $this->db->query("SELECT * FROM `notificationtoken` WHERE `os`='iOS'")->result();
        foreach ($query1 as $row) {
            $token = $row->token;
            $this->chintantable->sendApns($pem, $passphase, $token, $title);
        }
    }

    public function responseCheck($response)
    {
        $transid = $response['MerchantRefNo'];
        $amount = $response['DeliveryPostalCode'];
        if($response['ResponseMessage'] == "Transaction Successful" || $response['ResponseCode'] == 0){
            $query1 = $this->db->query("UPDATE `osb_request` SET `requeststatus` = 2, `paymentstatus` = 1 WHERE `id` = $transid");
            $userid = $this->db->query("SELECT `userto` FROM `osb_request` WHERE `id` = $transid")->row();
            $updateid = $userid->userto;
            $updatebal = $this->db->query("UPDATE `user` SET `purchasebalance` = `purchasebalance` + '$amount', `salesbalance` = `salesbalance` + '$amount' WHERE `id` = '$updateid'");
            $this->load->model('transaction_model');
            $this->transaction_model->adminaccept($amount,$updateid,1,$transid);
        } else {
            $query2 = $this->db->query("UPDATE `osb_request` SET `paymentstatus` = 2 WHERE `id` = $transid")->row();
        }
        return true;
    }
    public function getTransactionStatus($id)
    {
        $query = $this->db->query("SELECT `paymentstatus` FROM `osb_request` WHERE `id` = $id")->row();
        return $query;
    }
    public function againtest($cat)
    {
      $catarray=explode(",",$cat);
      print_r($catarray);
      foreach ($catarray as $row) {
        echo $row;
        # code...
      }
    }
    public function getNotificationUnreadCount($user)
    {
      $query = $this->db->query("SELECT COUNT(*) as `notificationCount` FROM `notification` WHERE `status` = 2 AND `user`='$user'")->row();
      return $query;
    }
    public function makeAllNotificationread($user)
    {
      $query = $this->db->query("UPDATE `notification` SET `status` = 1 WHERE `user` = '$user'");
      return true;
    }
}
?>
