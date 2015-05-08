<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class request_model extends CI_Model
{
public function create($userfrom,$userto,$requeststatus,$amount,$reason,$approvalreason)
{
$data=array("userfrom" => $userfrom,"userto" => $userto,"requeststatus" => $requeststatus,"amount" => $amount,"reason" => $reason,"approvalreason" => $approvalreason);
$query=$this->db->insert( "osb_request", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("osb_request")->row();
return $query;
}
function getsinglerequest($id){
$this->db->where("id",$id);
$query=$this->db->get("osb_request")->row();
return $query;
}
public function edit($id,$userfrom,$userto,$requeststatus,$amount,$reason,$approvalreason,$timestamp)
{
$data=array("userfrom" => $userfrom,"userto" => $userto,"requeststatus" => $requeststatus,"amount" => $amount,"reason" => $reason,"approvalreason" => $approvalreason,"timestamp" => $timestamp);
$this->db->where( "id", $id );
$query=$this->db->update( "osb_request", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `osb_request` WHERE `id`='$id'");
return $query;
}
}
?>
