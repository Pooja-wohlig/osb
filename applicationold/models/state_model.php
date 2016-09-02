<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class state_model extends CI_Model
{
public function create($country,$name)
{
$data=array("country" => $country,"name" => $name);
$query=$this->db->insert( "osb_state", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("osb_state")->row();
return $query;
}
function getsinglestate($id){
$this->db->where("id",$id);
$query=$this->db->get("osb_state")->row();
return $query;
}
public function edit($id,$country,$name)
{
$data=array("country" => $country,"name" => $name);
$this->db->where( "id", $id );
$query=$this->db->update( "osb_state", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `osb_state` WHERE `id`='$id'");
return $query;
}
public function getimagebyid($id)
{
$query=$this->db->query("SELECT `image` FROM `osb_state` WHERE `id`='$id'")->row();
return $query;
}
public function getdropdown()
{
$query=$this->db->query("SELECT * FROM `osb_state` ORDER BY `id`
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
