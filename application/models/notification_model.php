<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class notification_model extends CI_Model
{
public function create($user,$type,$message,$status)
{
$data=array("user" => $user,"type" => $type,"message" => $message,"status" => $status);
$query=$this->db->insert( "notification", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("notification")->row();
return $query;
}
function getsinglenotification($id){
$this->db->where("id",$id);
$query=$this->db->get("notification")->row();
return $query;
}
public function edit($id,$user,$type,$timestamp,$message,$status)
{
$data=array("user" => $user,"type" => $type,"timestamp" => $timestamp,"message" => $message,"status" => $status);
$this->db->where( "id", $id );
$query=$this->db->update( "notification", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `notification` WHERE `id`='$id'");
return $query;
}
   public function gettypedropdown()
	{
	$type= array(
			 "1" => "offer",
			 "2" => "transaction"
			);
		return $type;
	}
    function exportnotificationcsv()
	{
		$this->load->dbutil();
		$query=$this->db->query("SELECT `notification`.`id`, `user`.`name` as `username`, `notification`.`timestamp`, `notification`.`message` FROM `notification` LEFT OUTER JOIN `user` ON `user`.`id`=`notification`.`user` WHERE 1");

       $content= $this->dbutil->csv_from_result($query);
        //$data = 'Some file data';
$timestamp=new DateTime();
        $timestamp=$timestamp->format('Y-m-d_H.i.s');
        if ( ! write_file("./uploads/notification_$timestamp.csv", $content))
        {
             echo 'Unable to write the file';
        }
        else
        {
            redirect(base_url("uploads/notification_$timestamp.csv"), 'refresh');
             echo 'File written!';
        }
	}
  public function getstatusdropdown()
  {
    $onlinestatus= array(
       "1" => "Read",
      "2" => "Unread"
      );
    return $onlinestatus;
  }
}
?>
