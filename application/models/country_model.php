<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class country_model extends CI_Model
{
public function create($name)
{
$data=array("name" => $name);
$query=$this->db->insert( "osb_country", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("osb_country")->row();
return $query;
}
function getsinglecountry($id){
$this->db->where("id",$id);
$query=$this->db->get("osb_country")->row();
return $query;
}
public function edit($id,$name)
{
$data=array("name" => $name);
$this->db->where( "id", $id );
$query=$this->db->update( "osb_country", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `osb_country` WHERE `id`='$id'");
return $query;
}
public function getimagebyid($id)
{
$query=$this->db->query("SELECT `image` FROM `osb_country` WHERE `id`='$id'")->row();
return $query;
}
public function getdropdown()
{
$query=$this->db->query("SELECT * FROM `osb_country` ORDER BY `id`
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
