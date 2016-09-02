<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class category_model extends CI_Model
{
public function create($order,$status,$name,$parent)
{
$data=array("order" => $order,"status" => $status,"name" => $name,"parent" => $parent);
$query=$this->db->insert( "osb_category", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("osb_category")->row();
return $query;
}
function getsinglecategory($id){
$this->db->where("id",$id);
$query=$this->db->get("osb_category")->row();
return $query;
}
public function edit($id,$order,$status,$name,$parent)
{
$data=array("order" => $order,"status" => $status,"name" => $name,"parent" => $parent);
$this->db->where( "id", $id );
$query=$this->db->update( "osb_category", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `osb_category` WHERE `id`='$id'");
return $query;
}	
 public function getparentdropdown()
	{
		$query=$this->db->query("SELECT * FROM `osb_category`  ORDER BY `id` ASC")->result();
		$return=array(
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
     function exportcategorycsv()
	{
		$this->load->dbutil();
		$query=$this->db->query("SELECT `id`,`name` FROM `osb_category` WHERE 1");

       $content= $this->dbutil->csv_from_result($query);
        //$data = 'Some file data';
$timestamp=new DateTime();
        $timestamp=$timestamp->format('Y-m-d_H.i.s');
        if ( ! write_file("./uploads/category_$timestamp.csv", $content))
        {
             echo 'Unable to write the file';
        }
        else
        {
            redirect(base_url("uploads/category_$timestamp.csv"), 'refresh');
             echo 'File written!';
        }
	}
}
?>
