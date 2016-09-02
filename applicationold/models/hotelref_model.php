<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class hotelref_model extends CI_Model
{
public function create($city,$name)
{
$data=array("city" => $city,"name" => $name);
$query=$this->db->insert( "osb_hotelref", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("osb_hotelref")->row();
return $query;
}
function getsinglehotelref($id){
$this->db->where("id",$id);
$query=$this->db->get("osb_hotelref")->row();
return $query;
}
public function edit($id,$city,$name)
{
$data=array("city" => $city,"name" => $name);
$this->db->where( "id", $id );
$query=$this->db->update( "osb_hotelref", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `osb_hotelref` WHERE `id`='$id'");
return $query;
}
public function getimagebyid($id)
{
$query=$this->db->query("SELECT `image` FROM `osb_hotelref` WHERE `id`='$id'")->row();
return $query;
}
public function getdropdown()
{
$query=$this->db->query("SELECT * FROM `osb_hotelref` ORDER BY `id`
                    ASC")->result();
$return=array(
"" => "Select Option"
);
foreach($query as $row)
{
$return[$row->id]=$row->name;
}
return $return;
}
}
?>
