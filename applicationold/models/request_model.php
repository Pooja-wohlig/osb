<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class request_model extends CI_Model
{
public function create($userfrom,$userto,$requeststatus,$amount,$reason,$approvalreason)
{
$data=array("userfrom" => $userfrom,"userto" => $userto,"requeststatus" => $requeststatus,"amount" => $amount,"reason" => $reason,"approvalreason" => $approvalreason);
$query=$this->db->insert( "osb_request", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("osb_request")->row();
return $query;
}
function getsinglerequest($id){
$this->db->where("id",$id);
$query=$this->db->get("osb_request")->row();
return $query;
}
public function edit($id,$userfrom,$userto,$requeststatus,$amount,$reason,$approvalreason,$timestamp,$paymentstatus)
{
$data=array("userfrom" => $userfrom,"userto" => $userto,"requeststatus" => $requeststatus,"amount" => $amount,"reason" => $reason,"approvalreason" => $approvalreason,"timestamp" => $timestamp,"paymentstatus" => $paymentstatus);
$this->db->where( "id", $id );
$query=$this->db->update( "osb_request", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `osb_request` WHERE `id`='$id'");
return $query;
}
    public function getPendingAdminRequestCount()
{
    $query=$this->db->query("SELECT COUNT(*) as `pendingrequest` FROM `osb_request` WHERE `userfrom`=1 AND `requeststatus`=1")->row();
    $pendingrequest=$query->pendingrequest;
    return $pendingrequest;
}
    
        function exportrequestcsv($checkadmin)
	{
            
		$this->load->dbutil();
            if($checkadmin==1){
                
$query=$this->db->query("SELECT `osb_request`.`id`, `tab2`.`name` as `Seller`, `tab1`.`name` as `Buyer`, `osb_requeststatus`.`name`, `osb_request`.`amount`, `osb_request`.`reason`, `osb_request`.`approvalreason`, `osb_request`.`timestamp` FROM `osb_request` LEFT OUTER JOIN `user` as `tab1` ON `tab1`.`id`=`osb_request`.`userto` LEFT OUTER JOIN `user` as `tab2` ON `tab2`.`id`=`osb_request`.`userfrom` LEFT OUTER JOIN `osb_requeststatus` ON `osb_requeststatus`.`id`=`osb_request`.`requeststatus` WHERE `osb_request`.`userfrom`=1");
            }
            else if($checkadmin==2){
		$query=$this->db->query("SELECT `osb_request`.`id`, `tab2`.`name` as `Seller`, `tab1`.`name` as `Buyer`, `osb_requeststatus`.`name`, `osb_request`.`amount`, `osb_request`.`reason`, `osb_request`.`approvalreason`, `osb_request`.`timestamp` FROM `osb_request` LEFT OUTER JOIN `user` as `tab1` ON `tab1`.`id`=`osb_request`.`userto` LEFT OUTER JOIN `user` as `tab2` ON `tab2`.`id`=`osb_request`.`userfrom` LEFT OUTER JOIN `osb_requeststatus` ON `osb_requeststatus`.`id`=`osb_request`.`requeststatus` WHERE `osb_request`.`userfrom`<>1");
                }

       $content= $this->dbutil->csv_from_result($query);
        
        //$data = 'Some file data';
$timestamp=new DateTime();
        $timestamp=$timestamp->format('Y-m-d_H.i.s');
        if ( ! write_file("./uploads/request_$timestamp.csv", $content))
        {
             echo 'Unable to write the file';
        }
        else
        {
            redirect(base_url("uploads/request_$timestamp.csv"), 'refresh');
             echo 'File written!';
        }
	}
}
?>
