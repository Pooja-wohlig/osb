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
	public function adminaccept($amount,$userto,$userfrom,$requestid,$requeststatus){
		$newrequeststatus=$requeststatus;
		$checkrequeststatus=$this->db->query("SELECT * FROM `osb_request` WHERE  `id`= '$requestid'" )->row();
		$oldrequeststatus=$checkrequeststatus->requeststatus;

			if( $oldrequeststatus==1 && $newrequeststatus==2)
			{
				// update amount in transaction
				$query=$this->db->query("SELECT `percentpayment` FROM `user` WHERE `id`= '$userto'" )->row();
				$x=$query->percentpayment;
				$y=100;
				$m=$x/$y;
				$checkifadded=$this->db->query("SELECT * FROM `osb_transaction` WHERE  `userto`= '$userto' AND `userfrom`=1 AND `payableamount`='$amount' AND `transactiondone`=0 AND `amount`='$amount*$m'" );
				if($checkifadded->num_rows >0 || $checkifadded->num_rows ==0 )
				{
					$data=array("userto" => $userto,"userfrom" => $userfrom,"payableamount" => $amount,"requestid"=> $requestid);
					$query=$this->db->insert( "osb_transaction", $data );
					$id=$this->db->insert_id();

					$query1=$this->db->query("UPDATE `osb_transaction` SET `amount`=$amount*$m,`transactiondone`=1 WHERE `id`='$id'");
					//notification
					$this->user_model->sendnotification("Your request is accepted by admin of amount:$amount",$userto);
					$message="Your request is accepted by admin of amount".$amount;
					$this->user_model->addnotificationtodb($message,$userto);

					//User PB and SB change
					$query=$this->db->query("UPDATE `user` SET `user`.`salesbalance`=`user`.`salesbalance`+$amount,`user`.`purchasebalance`=`user`.`purchasebalance`+$amount WHERE `user`.`id`= '$userto'" );
				}


			}
			else if(($oldrequeststatus==2 && $newrequeststatus==1) || ($oldrequeststatus==2 && $newrequeststatus==3)){
				// update amount in transaction
				$query=$this->db->query("SELECT `percentpayment` FROM `user` WHERE `id`= '$userto'" )->row();
				$x=$query->percentpayment;
				$y=100;
				$m=$x/$y;
				$checkifadded=$this->db->query("SELECT * FROM `osb_transaction` WHERE  `userto`= '$userto' AND `userfrom`=1 AND `payableamount`='$amount' AND `transactiondone`=1 AND `amount`='$amount*$m'" );
					if($checkifadded->num_rows >0 || $checkifadded->num_rows ==0 )
					{
							$query=$this->db->query("UPDATE `osb_transaction` SET `amount`=$amount-$m WHERE `userto`= '$userto' AND `userfrom`=1 AND `payableamount`='$amount' AND `transactiondone`=-1");

							$query=$this->db->query("UPDATE `user` SET `user`.`salesbalance`=`user`.`salesbalance`-$amount,`user`.`purchasebalance`=`user`.`purchasebalance`-$amount WHERE `user`.`id`= '$userto'" );
					}
			}


			return $userto;
	}
}
?>
