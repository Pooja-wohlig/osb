<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class register_model extends CI_Model
{
	public function create($name,$email,$message,$personalcontact,$status)
	{
		$data  = array(
			'name' => $name,
			'email' => $email,
			'message' => $message,
			'personalcontact' => $personalcontact,
			'status' => $status
		);
		$query=$this->db->insert( 'register', $data );
		$id=$this->db->insert_id();

		if(!$query)
			return  0;
		else
			return  1;
	}
   
	public function beforeedit( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'register' )->row();
		return $query;
	}

	public function edit($id,$name,$email,$message,$personalcontact,$status)
	{
		$data  = array(
			'name' => $name,
			'email' => $email,
			'message' => $message,
			'personalcontact' => $personalcontact,
			'status' => $status
		);
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'register', $data );

		return 1;
	}
	public function getregisterdropdown()
	{
		$status= array(
			 "1" => "View",
			 "2" => "Unview"
			);
		return $status;
	}
	public function deleteregister($id)
{
$query=$this->db->query("DELETE FROM `register` WHERE `id`='$id'");
return $query;
}
}
?>
