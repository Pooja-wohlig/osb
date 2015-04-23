<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class shopphoto_model extends CI_Model
{
public function create($user,$photo)
{
$data=array("user" => $user,"photo" => $photo);
$query=$this->db->insert( "osb_shopphoto", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("osb_shopphoto")->row();
return $query;
}
function getsingleshopphoto($id){
$this->db->where("id",$id);
$query=$this->db->get("osb_shopphoto")->row();
return $query;
}
public function edit($id,$user,$photo)
{
$data=array("user" => $user,"photo" => $photo);
$this->db->where( "id", $id );
$query=$this->db->update( "osb_shopphoto", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `osb_shopphoto` WHERE `id`='$id'");
return $query;
}
	public function getshopphotobyid($id)
	{
		$query=$this->db->query("SELECT `photo` FROM `osb_shopphoto` WHERE `id`='$id'")->row();
		return $query;
	}
}
?>
