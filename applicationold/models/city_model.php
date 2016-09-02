<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class city_model extends CI_Model
{
public function create($state,$name)
{
$data=array("state" => $state,"name" => $name);
$query=$this->db->insert( "osb_city", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("osb_city")->row();
return $query;
}
function getsinglecity($id){
$this->db->where("id",$id);
$query=$this->db->get("osb_city")->row();
return $query;
}
public function edit($id,$state,$name)
{
$data=array("state" => $state,"name" => $name);
$this->db->where( "id", $id );
$query=$this->db->update( "osb_city", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `osb_city` WHERE `id`='$id'");
return $query;
}
public function getimagebyid($id)
{
$query=$this->db->query("SELECT `image` FROM `osb_city` WHERE `id`='$id'")->row();
return $query;
}
public function getdropdown()
{
$query=$this->db->query("SELECT * FROM `osb_city` ORDER BY `id`
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
