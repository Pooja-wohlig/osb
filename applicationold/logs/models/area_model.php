<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class area_model extends CI_Model
{
public function create($order,$status,$name)
{
$data=array("order" => $order,"status" => $status,"name" => $name);
$query=$this->db->insert( "osb_area", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("osb_area")->row();
return $query;
}
function getsinglearea($id){
$this->db->where("id",$id);
$query=$this->db->get("osb_area")->row();
return $query;
}
public function edit($id,$order,$status,$name)
{
$data=array("order" => $order,"status" => $status,"name" => $name);
$this->db->where( "id", $id );
$query=$this->db->update( "osb_area", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `osb_area` WHERE `id`='$id'");
return $query;
}
   public function getareadropdown()
	{
		$query=$this->db->query("SELECT * FROM `osb_area`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
     function exportareacsv()
	{
		$this->load->dbutil();
		$query=$this->db->query("SELECT `id`,  `name` FROM `osb_area` WHERE 1");

       $content= $this->dbutil->csv_from_result($query);
        //$data = 'Some file data';
$timestamp=new DateTime();
        $timestamp=$timestamp->format('Y-m-d_H.i.s');
        if ( ! write_file("./uploads/area_$timestamp.csv", $content))
        {
             echo 'Unable to write the file';
        }
        else
        {
            redirect(base_url("uploads/area_$timestamp.csv"), 'refresh');
             echo 'File written!';
        }
	}
}
?>
