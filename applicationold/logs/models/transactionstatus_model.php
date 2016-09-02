<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class transactionstatus_model extends CI_Model
{
public function create($name)
{
$data=array("name" => $name);
$query=$this->db->insert( "osb_transactionstatus", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("osb_transactionstatus")->row();
return $query;
}
function getsingletransactionstatus($id){
$this->db->where("id",$id);
$query=$this->db->get("osb_transactionstatus")->row();
return $query;
}
public function edit($id,$name)
{
$data=array("name" => $name);
$this->db->where( "id", $id );
$query=$this->db->update( "osb_transactionstatus", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `osb_transactionstatus` WHERE `id`='$id'");
return $query;
}

 function gettransactionstatusdropdown()
{
$query=$this->db->query("SELECT * FROM `osb_transactionstatus`  ORDER BY `id` ASC")->result();
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
