<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class requeststatus_model extends CI_Model
{
public function create($name)
{
$data=array("name" => $name);
$query=$this->db->insert( "osb_requeststatus", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("osb_requeststatus")->row();
return $query;
}
function getsinglerequeststatus($id){
$this->db->where("id",$id);
$query=$this->db->get("osb_requeststatus")->row();
return $query;
}
public function edit($id,$name)
{
$data=array("name" => $name);
$this->db->where( "id", $id );
$query=$this->db->update( "osb_requeststatus", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `osb_requeststatus` WHERE `id`='$id'");
return $query;
}
public function getrequeststatusdropdown()
{
$query=$this->db->query("SELECT * FROM `osb_requeststatus`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
}
}
?>
