<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class notification_model extends CI_Model
{
public function create($user,$type,$message)
{
$data=array("user" => $user,"type" => $type,"message" => $message);
$query=$this->db->insert( "notification", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("notification")->row();
return $query;
}
function getsinglenotification($id){
$this->db->where("id",$id);
$query=$this->db->get("notification")->row();
return $query;
}
public function edit($id,$user,$type,$timestamp,$message)
{
$data=array("user" => $user,"type" => $type,"timestamp" => $timestamp,"message" => $message);
$this->db->where( "id", $id );
$query=$this->db->update( "notification", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `notification` WHERE `id`='$id'");
return $query;
}
   public function gettypedropdown()
	{
	$type= array(
			 "1" => "offer",
			 "2" => "transaction"
			);
		return $type;
	}
}
?>
