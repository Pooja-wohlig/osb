<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class transaction_model extends CI_Model
{
public function create($userto,$userfrom,$reason,$amount,$payableamount,$timestamp)
{  
$data=array("userto" => $userto,"userfrom" => $userfrom,"amount" => $amount,"reason" => $reason,"payableamount" => $payableamount);
$query=$this->db->insert( "osb_transaction", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("osb_transaction")->row();
return $query;
}
function getsingletransaction($id){
$this->db->where("id",$id);
$query=$this->db->get("osb_transaction")->row();
return $query;
}
public function edit($id,$userto,$userfrom,$amount,$reason,$payableamount,$timestamp)
{
$data=array("userto" => $userto,"userfrom" => $userfrom,"amount" => $amount,"reason" => $reason,"payableamount" => $payableamount,"timestamp" => $timestamp);
$this->db->where( "id", $id );
$query=$this->db->update( "osb_transaction", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `osb_transaction` WHERE `id`='$id'");
return $query;
}
	public function adminaccept($amount,$userto,$userfrom,$requestid){
			$query=$this->db->query("UPDATE `user` SET `user`.`salesbalance`=`user`.`salesbalance`+$amount,`user`.`purchasebalance`=`user`.`purchasebalance`+$amount WHERE `user`.`id`= '$userto'" );
	$data=array("userto" => $userto,"userfrom" => $userfrom,"payableamount" => $amount,"requestid"=> $requestid);
$query=$this->db->insert( "osb_transaction", $data );
$id=$this->db->insert_id();
$query=$this->db->query("SELECT `percentpayment` FROM `user` WHERE `id`= '$userto'" )->row();
	$x=$query->percentpayment;
		$y=100;
	    $m=$x/$y;
		$query=$this->db->query("UPDATE `osb_transaction` SET `amount`=$amount*$m WHERE `userto`= '$userto' AND `userfrom`=1 AND `payableamount`='$amount'");
		return $userto;
	}
}
?>