<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class suggestion_model extends CI_Model
{
public function create($user,$message)
{
$data=array("user" => $user,"message" => $message);
$query=$this->db->insert( "suggestion", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("suggestion")->row();
return $query;
}
function getsinglesuggestion($id){
$this->db->where("id",$id);
$query=$this->db->get("suggestion")->row();
return $query;
}
public function edit($id,$user,$timestamp,$message)
{
$data=array("user" => $user,"timestamp" => $timestamp,"message" => $message);
$this->db->where( "id", $id );
$query=$this->db->update( "suggestion", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `suggestion` WHERE `id`='$id'");
return $query;
}
    function exportsuggestioncsv()
	{
		$this->load->dbutil();
		$query=$this->db->query("SELECT `suggestion`.`id`, `user`.`name` as `username`, `suggestion`.`message`, `suggestion`.`timestamp` FROM `suggestion` LEFT OUTER JOIN `user` ON `user`.`id`=`suggestion`.`user` WHERE 1");

       $content= $this->dbutil->csv_from_result($query);
        //$data = 'Some file data';
$timestamp=new DateTime();
        $timestamp=$timestamp->format('Y-m-d_H.i.s');
        if ( ! write_file("./uploads/suggestion_$timestamp.csv", $content))
        {
             echo 'Unable to write the file';
        }
        else
        {
            redirect(base_url("uploads/suggestion_$timestamp.csv"), 'refresh');
             echo 'File written!';
        }
	}
}
?>
