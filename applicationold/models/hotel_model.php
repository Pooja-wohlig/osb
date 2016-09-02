<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class hotel_model extends CI_Model
{
public function create($user,$country,$city,$hotelname,$checkin,$checkout,$room,$adult,$children)
{
$data=array("user" => $user,"country" => $country,"city" => $city,"hotelname" => $hotelname,"checkin" => $checkin,"checkout" => $checkout,"room" => $room,"adult" => $adult,"children" => $children);
$query=$this->db->insert( "hotel", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("hotel")->row();
return $query;
}
function getsinglehotel($id){
$this->db->where("id",$id);
$query=$this->db->get("hotel")->row();
return $query;
}
public function edit($id,$user,$country,$city,$hotelname,$checkin,$checkout,$room,$adult,$children,$timestamp)
{
$data=array("user" => $user,"country" => $country,"city" => $city,"hotelname" => $hotelname,"checkin" => $checkin,"checkout" => $checkout,"room" => $room,"adult" => $adult,"children" => $children,"timestamp" => $timestamp);
$this->db->where( "id", $id );
$query=$this->db->update( "hotel", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `hotel` WHERE `id`='$id'");
return $query;
}

}
?>
