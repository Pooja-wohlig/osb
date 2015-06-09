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
    public function searchresult($area, $category) {
        if ($area != "0" && $area != "") {
            $areaquery = "`user`.`area`='$area'";
        } else {
            $areaquery = " 1 ";
        }
        if ($category != "0" && $category != "") {
            $categoryquery = "`usercategory`.`category`='$category'";
        } else {
            $categoryquery = " 1 ";
        }
        //print_r("SELECT `user`.`id`,`user`.`shopname` as `name`,`user`.`salesbalance` as `sellbalance` FROM `user` LEFT OUTER JOIN `usercategory` ON `usercategory`.`user`=`user`.`id` LEFT OUTER JOIN `osb_category` ON `osb_category`.`id`=`usercategory`.`category` WHERE $areaquery AND $categoryquery");
        $query = $this->db->query("SELECT `user`.`id`,`user`.`shopname` as `name`,`user`.`salesbalance` as `sellbalance` FROM `user` LEFT OUTER JOIN `usercategory` ON `usercategory`.`user`=`user`.`id` LEFT OUTER JOIN `osb_category` ON `osb_category`.`id`=`usercategory`.`category` WHERE $areaquery AND $categoryquery AND `user`.`salesbalance` > 0 ORDER BY `user`.`salesbalance` DESC")->result();
        return $query;
    }
    //	 public function searchresult1($membershipno){
    //  $query['searchresult1']=$this->db->query("SELECT `shopname`,`salesbalance` FROM `user` WHERE `membershipno`='$membershipno'")->row();
    //	  return $query;
    //  }
    public function shopprofile($user) {
        $query = $this->db->query("SELECT `user`.`shoplogo`,`user`.`purchasebalance`,`user`.`salesbalance`, `user`.`id`,`user`.`shopname`,`user`.`address`,`user`.`description`,`user`.`website`,`user`.`shopcontact1`,`user`.`shopcontact2`,`user`.`shopemail`,`user`.`area` as `areaid`,`osb_area`.`name` as `area`,`osb_shopphoto`.`photo` as `shopphoto`,`osb_shopproductphoto`.`photo` as `productphoto`,`osb_category`.`id` as `categoryid`,`osb_category`.`name` as `category` FROM `user` LEFT OUTER JOIN `osb_shopphoto` ON `osb_shopphoto`.`user`=`user`.`id` LEFT OUTER JOIN `osb_shopproductphoto` ON `osb_shopproductphoto`.`user`=`user`.`id` LEFT OUTER JOIN `usercategory` ON `usercategory`.`user`=`user`.`id` LEFT OUTER JOIN `osb_area` ON `osb_area`.`id`=`user`.`area` LEFT OUTER JOIN `osb_category` ON `osb_category`.`id`=`usercategory`.`category` WHERE `user`.`id`='$user' GROUP BY `user`.`id`")->row();
        return $query;
    }
    public function shopprofilemem($mem) {
        $query = $this->db->query("SELECT `id` FROM `user` WHERE `membershipno`='$mem'")->row();
        return $query;
    }
    public function yourbalance($user) {
        $query['yourbalance'] = $this->db->query("SELECT `purchasebalance`,`salesbalance` FROM `user` WHERE `id`='$user'")->row();
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
        $query['purchased'] = $this->db->query("SELECT `user`.`shoplogo`,`user`.`purchasebalance`,`user`.`shopname`,`osb_transaction`.`amount`,`osb_transaction`.`id`,DATE(`osb_transaction`.`timestamp`) AS `date`,DATE_FORMAT(STR_TO_DATE(`osb_transaction`.`timestamp`, '%Y-%m-%d %H:%i:%s'), '%H:%i:%s') as `time` FROM `user` LEFT OUTER JOIN `osb_transaction` ON `osb_transaction`.`userfrom`=`user`.`id` WHERE `osb_transaction`.`userfrom`!=1 AND `osb_transaction`.`userto`='$user'")->result();
        $query['sales'] = $this->db->query("SELECT `user`.`shoplogo`,`user`.`salesbalance`,`osb_transaction`.`id`,`user`.`shopname`,`osb_transaction`.`amount`,DATE(`osb_transaction`.`timestamp`) AS `date`,DATE_FORMAT(STR_TO_DATE(`osb_transaction`.`timestamp`, '%Y-%m-%d %H:%i:%s'), '%H:%i:%s') as `time` FROM `user` LEFT OUTER JOIN `osb_transaction` ON `osb_transaction`.`userto`=`user`.`id` WHERE `osb_transaction`.`userto`!=1 AND `osb_transaction`.`userfrom`='$user'")->result();
        $query['admin'] = $this->db->query("SELECT `osb_transaction`.`id`,`osb_transaction`. `userto`,`osb_transaction`. `userfrom`,`osb_transaction`. `reason`,`osb_transaction`. `amount`,`osb_transaction`. `payableamount`,DATE(`osb_transaction`.`timestamp`) AS `date`,DATE_FORMAT(STR_TO_DATE(`osb_transaction`.`timestamp`, '%Y-%m-%d %H:%i:%s'), '%H:%i:%s') as `time`,`osb_transaction`. `requestid` ,`osb_request`.`approvalreason` FROM `osb_transaction` LEFT OUTER JOIN `osb_request` ON `osb_transaction`.`requestid`=`osb_request`.`id` WHERE `osb_transaction`.`userfrom`=1 AND `osb_transaction`.`userto`='$user'")->result();
        $query['transaction'] = $this->db->query("SELECT `osb_transaction`.`id`, `osb_transaction`.`userto`,SUM(`osb_transaction`.`payableamount`) AS `totaltransaction`
FROM `osb_transaction` 
WHERE `osb_transaction`.`userfrom`=1 AND `osb_transaction`.`userto`='$user'")->row();
        return $query;
    }
    public function sellingapproval($user) {

        $query['sellingapproval'] = $this->db->query("SELECT `user`.`shoplogo`,`osb_request`.`id`,`osb_request`.`amount`,`osb_request`.`reason` 
		FROM `osb_request` 
		INNER JOIN `user` ON `osb_request`.`userfrom`=`user`.`id` WHERE `osb_request`.`requeststatus`='1' AND `osb_request`.`userto`='$user'")->result();
        return $query;
    }
    public function accepted($id, $reason, $status) {
        if ($status == "1") {
            $data = array('approvalreason' => $reason, 'requeststatus' => 2);
            $this->db->where('id', $id);
            $this->db->update('osb_request', $data);
            $query = $this->db->query("SELECT `userfrom`,`userto`,`amount`,`reason` FROM `osb_request` WHERE id='$id'")->row();
            $userfrom = $query->userfrom;
            $userto = $query->userto;
            $amount = $query->amount;
            $data = array("userfrom" => $userfrom, "userto" => $userto, "amount" => $amount);
            $query = $this->db->insert("osb_transaction", $data);
            $id = $this->db->insert_id();
            $query=$this->db->query("UPDATE `user` SET `user`.`purchasebalance`=`user`.`purchasebalance`-$amount WHERE `user`.`id`= '$userfrom'" );
            $query=$this->db->query("UPDATE `user` SET `user`.`salesbalance`=`user`.`salesbalance`-$amount WHERE `user`.`id`= '$userto'" );
            $this->user_model->sendnotification("Your Purchase Request for Amount: $amount is accepted",$userfrom);
			if($query->salesbalance<1000){
			  $this->user_model->sendnotification("Your Sell balance is too low please recharge your Account!!!",$userfrom);
			}
            return $id;
        } else if ($status == "2") {
          $query = $this->db->query("SELECT `userfrom`,`userto`,`amount`,`reason` FROM `osb_request` WHERE id='$id'")->row();
          $userfrom = $query->userfrom;
          $userto = $query->userto;
          $amount = $query->amount;
          $this->user_model->sendnotification("Your Purchase Request for Amount: $amount is declined",$userfrom);

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
                return 1;
            }
        } else {
            echo "New password and old password do not match!!!";
        }
    }
    public function getareacategory($area, $category) {
        $query['area'] = $this->db->query("SELECT `name` FROM `osb_area` WHERE `id`='$area'")->row();
        $query['category'] = $this->db->query("SELECT `name` FROM `osb_category` WHERE `id`='$category'")->row();
        return $query;
    }
    public function purchaserequest($userfrom, $userto, $amount, $reason) {

        $data = array("userfrom" => $userfrom, "userto" => $userto, "amount" => $amount, "reason" => $reason, "requeststatus" => 1);
        $query = $this->db->insert("osb_request", $data);
        $id = $this->db->insert_id();
        $this->user_model->sendnotification("You have a new Purchase Request for Amount: $amount",$userto);
        if (!$query) return 0;
        else return $id;
    }
    public function updateprofile($id, $shopname, $address, $description, $shopcontact1, $shopcontact2, $shopemail, $website) {
        $query = $this->db->query("UPDATE `user` SET `shopname`='$shopname',`address`='$address',`description`='$description',`shopcontact1`='$shopcontact1',`shopcontact2`='$shopcontact2',`shopemail`='$shopemail',`website`='$website' WHERE `id`='$id'");
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
	$data = array('user' => $userid,'category' =>$catid);
        $this->db->where('user', $userid);
        $this->db->update('usercategory', $data);
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
	public function createproduct($name,$sku,$price,$description,$status){
	$data=array("name" => $name,"sku" => $sku,"price" => $price,"description" => $description,"status" => $status);
$query=$this->db->insert( "product", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
	}
	public function editproduct($id,$name,$sku,$price,$description,$status){
	 $data = array("name" => $name,"sku" => $sku,"price" => $price,"description" => $description,"status" => $status);
        $this->db->where('id', $id);
        $this->db->update('product', $data);
	}
//	public function viewallproducts(){
//$query=$this->db->query("SELECT `id`, `name`, `sku`, `price`, `description`, `status` FROM `product`")->result();
//		return $query;
// }
		public function getsingleproduct($id){
$query=$this->db->query("SELECT `id`, `name`, `sku`, `price`, `description`, `status` FROM `product` WHERE `id`='$id'")->result();
		return $query;
 }
}
?>