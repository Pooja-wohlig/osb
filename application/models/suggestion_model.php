<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class suggestion_model extends CI_Model
{
public function create($user,$message)
{
$data=array("user" => $user,"message" => $message);
$query=$this->db->insert( "suggestion", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("suggestion")->row();
return $query;
}
function getsinglesuggestion($id){
$this->db->where("id",$id);
$query=$this->db->get("suggestion")->row();
return $query;
}
public function edit($id,$user,$timestamp,$message)
{
$data=array("user" => $user,"timestamp" => $timestamp,"message" => $message);
$this->db->where( "id", $id );
$query=$this->db->update( "suggestion", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `suggestion` WHERE `id`='$id'");
return $query;
}
}
?>
