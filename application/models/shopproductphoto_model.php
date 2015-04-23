<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class shopproductphoto_model extends CI_Model
{
public function create($user,$photo)
{
$data=array("user" => $user,"photo" => $photo);
$query=$this->db->insert( "osb_shopproductphoto", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("osb_shopproductphoto")->row();
return $query;
}
function getsingleshopproductphoto($id){
$this->db->where("id",$id);
$query=$this->db->get("osb_shopproductphoto")->row();
return $query;
}
public function edit($id,$user,$photo)
{
$data=array("user" => $user,"photo" => $photo);
$this->db->where( "id", $id );
$query=$this->db->update( "osb_shopproductphoto", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `osb_shopproductphoto` WHERE `id`='$id'");
return $query;
}
	 public function getuserdropdown()
	{
		$query=$this->db->query("SELECT * FROM `user`  ORDER BY `id` ASC")->result();
		$return=array(
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
}
?>
