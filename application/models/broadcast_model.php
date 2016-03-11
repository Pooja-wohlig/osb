<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class broadcast_model extends CI_Model
{
public function create($name,$message)
{
$data=array("name" => $name,"message" => $message);
$query=$this->db->insert( "broadcast", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("broadcast")->row();
return $query;
}
function getsinglebroadcast($id){
$this->db->where("id",$id);
$query=$this->db->get("broadcast")->row();
return $query;
}
public function edit($id,$name,$timestamp,$message)
{
$data=array("name" => $name,"timestamp" => $timestamp,"message" => $message);
$this->db->where( "id", $id );
$query=$this->db->update( "broadcast", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `broadcast` WHERE `id`='$id'");
return $query;
}
 
}
?>
