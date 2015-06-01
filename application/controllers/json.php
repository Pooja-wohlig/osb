<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");
class Json extends CI_Controller
{function getallshopproductphoto()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`osb_shopproductphoto`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`osb_shopproductphoto`.`user`";
$elements[1]->sort="1";
$elements[1]->header="User";
$elements[1]->alias="user";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`osb_shopproductphoto`.`photo`";
$elements[2]->sort="1";
$elements[2]->header="Photo";
$elements[2]->alias="photo";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `osb_shopproductphoto`");
$this->load->view("json",$data);
}
public function getsingleshopproductphoto()
{
$id=$this->input->get_post("id");
$data["message"]=$this->shopproductphoto_model->getsingleshopproductphoto($id);
$this->load->view("json",$data);
}
function getallshopphoto()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`osb_shopphoto`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`osb_shopphoto`.`user`";
$elements[1]->sort="1";
$elements[1]->header="User";
$elements[1]->alias="user";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`osb_shopphoto`.`photo`";
$elements[2]->sort="1";
$elements[2]->header="Photo";
$elements[2]->alias="photo";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `osb_shopphoto`");
$this->load->view("json",$data);
}
public function getsingleshopphoto()
{
$id=$this->input->get_post("id");
$data["message"]=$this->shopphoto_model->getsingleshopphoto($id);
$this->load->view("json",$data);
}
function getallcategory()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`osb_category`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`osb_category`.`order`";
$elements[1]->sort="1";
$elements[1]->header="Order";
$elements[1]->alias="order";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`osb_category`.`status`";
$elements[2]->sort="1";
$elements[2]->header="Status";
$elements[2]->alias="status";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`osb_category`.`name`";
$elements[3]->sort="1";
$elements[3]->header="Name";
$elements[3]->alias="name";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `osb_category`");
$this->load->view("json",$data);
}
public function getsinglecategory()
{
$id=$this->input->get_post("id");
$data["message"]=$this->category_model->getsinglecategory($id);
$this->load->view("json",$data);
}
function getallarea()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`osb_area`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`osb_area`.`order`";
$elements[1]->sort="1";
$elements[1]->header="Order";
$elements[1]->alias="order";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`osb_area`.`status`";
$elements[2]->sort="1";
$elements[2]->header="Status";
$elements[2]->alias="status";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`osb_area`.`name`";
$elements[3]->sort="1";
$elements[3]->header="Name";
$elements[3]->alias="name";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `osb_area`");
$this->load->view("json",$data);
}
public function getsinglearea()
{
$id=$this->input->get_post("id");
$data["message"]=$this->area_model->getsinglearea($id);
$this->load->view("json",$data);
}
function getallrequest()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`osb_request`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`osb_request`.`userfrom`";
$elements[1]->sort="1";
$elements[1]->header="User From";
$elements[1]->alias="userfrom";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`osb_request`.`userto`";
$elements[2]->sort="1";
$elements[2]->header="User to";
$elements[2]->alias="userto";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`osb_request`.`requeststatus`";
$elements[3]->sort="1";
$elements[3]->header="Request Status";
$elements[3]->alias="requeststatus";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`osb_request`.`amount`";
$elements[4]->sort="1";
$elements[4]->header="Amount";
$elements[4]->alias="amount";

$elements=array();
$elements[5]=new stdClass();
$elements[5]->field="`osb_request`.`timestamp`";
$elements[5]->sort="1";
$elements[5]->header="Time stamp";
$elements[5]->alias="timestamp";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `osb_request`");
$this->load->view("json",$data);
}
public function getsinglerequest()
{
$id=$this->input->get_post("id");
$data["message"]=$this->request_model->getsinglerequest($id);
$this->load->view("json",$data);
}
function getallrequeststatus()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`osb_requeststatus`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`osb_requeststatus`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Name";
$elements[1]->alias="name";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `osb_requeststatus`");
$this->load->view("json",$data);
}
public function getsinglerequeststatus()
{
$id=$this->input->get_post("id");
$data["message"]=$this->requeststatus_model->getsinglerequeststatus($id);
$this->load->view("json",$data);
}
function getalltransaction()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`osb_transaction`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`osb_transaction`.`userto`";
$elements[1]->sort="1";
$elements[1]->header="User to";
$elements[1]->alias="userto";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`osb_transaction`.`userfrom`";
$elements[2]->sort="1";
$elements[2]->header="User From";
$elements[2]->alias="userfrom";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`osb_transaction`.`transactionstatus`";
$elements[3]->sort="1";
$elements[3]->header="Transaction Status";
$elements[3]->alias="transactionstatus";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`osb_transaction`.`amount`";
$elements[4]->sort="1";
$elements[4]->header="Amount";
$elements[4]->alias="amount";

$elements=array();
$elements[5]=new stdClass();
$elements[5]->field="`osb_transaction`.`timestamp`";
$elements[5]->sort="1";
$elements[5]->header="Time stamp";
$elements[5]->alias="timestamp";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `osb_transaction`");
$this->load->view("json",$data);
}
public function getsingletransaction()
{
$id=$this->input->get_post("id");
$data["message"]=$this->transaction_model->getsingletransaction($id);
$this->load->view("json",$data);
}
function getalltransactionstatus()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`osb_transactionstatus`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`osb_transactionstatus`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Name";
$elements[1]->alias="name";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `osb_transactionstatus`");
$this->load->view("json",$data);
}
public function getsingletransactionstatus()
{
$id=$this->input->get_post("id");
$data["message"]=$this->transactionstatus_model->getsingletransactionstatus($id);
$this->load->view("json",$data);
}
 public function login(){
  $membershipno=$this->input->get("membershipno");
        $password=$this->input->get("password");
        $token=$this->input->get("token");
        $data['message']=$this->user_model->login($membershipno,$password,$token);
        $this->load->view('json',$data);
 }


 public function test() {

$this->user_model->sendnotification('test','296fbeb76f8709ce');

 }

    public function logout()
    {
        $this->session->sess_destroy();

		$this->load->view('json',true);
    }
 public function home()
 {
$user=$this->input->get('user');
$data['message']=$this->restapi_model->home($user);
$this->load->view('json',$data);
 }
  public function searchresult()
 {
$area=$this->input->get('area');
$category=$this->input->get('category');
$data['message']=$this->restapi_model->searchresult($area,$category);
$this->load->view('json',$data);
 }
 public function shopprofile()
 {
$user=$this->input->get('user');
$data['message']=$this->restapi_model->shopprofile($user);
$this->load->view('json',$data);
 }

   public function yourbalance()
 {
$user=$this->input->get('user');
$data['message']=$this->restapi_model->yourbalance($user);
$this->load->view('json',$data);
 }
   public function addbalance()
 {
$user=$this->input->get('user');
$amount=$this->input->get('amount');
$reason=$this->input->get('reason');
$data['message']=$this->restapi_model->addbalance($user,$amount,$reason);
$this->load->view('json',$data);
 }
 public function transaction(){
 $user=$this->input->get('user');
$data['message']=$this->restapi_model->transaction($user);
$this->load->view('json',$data);
 }
  public function sellingapproval(){
 $user=$this->input->get('user');
$data['message']=$this->restapi_model->sellingapproval($user);
$this->load->view('json',$data);
 }
   public function decline(){
 $id=$this->input->get('id');
$data['message']=$this->restapi_model->decline($id);
$this->load->view('json',$data);
 }
 public function accepted(){
	 $id=$this->input->get('id');
	 $reason=$this->input->get('reason');
	 $status=$this->input->get('status');
$data['message']=$this->restapi_model->accepted($id,$reason,$status);
$this->load->view('json',$data);
 }
    public function changepassword() {
        $id=$this->input->get("id");
        $oldpassword=$this->input->get("oldpassword");
        $newpassword=$this->input->get("newpassword");
        $confirmpassword=$this->input->get("confirmpassword");
        $data["message"] = $this->restapi_model->changepassword($id,$oldpassword,$newpassword,$confirmpassword);
        $this->load->view("json", $data);
    }
public function getareacategory(){
$area=$this->input->get("area");
$category=$this->input->get("category");
$data["message"] = $this->restapi_model->getareacategory($area,$category);
   $this->load->view("json", $data);
}
 public function purchaserequest(){
 $userfrom=$this->input->get('userfrom');
 $userto=$this->input->get('userto');
 $amount=$this->input->get('amount');
$reason=$this->input->get('reason');
$data['message']=$this->restapi_model->purchaserequest($userfrom,$userto,$amount,$reason);
$this->load->view('json',$data);
 }
 public function updateprofile(){
$data = json_decode(file_get_contents('php://input'), true);
$id=$data['id'];
$shopname=$data['shopname'];
$address=$data['address'];
$description=$data['description'];
$shopcontact1=$data['shopcontact1'];
$shopcontact2=$data['shopcontact2'];
$shopemail=$data['shopemail'];
$website=$data['website'];
	 print_r($data);
$data['message']=$this->restapi_model->updateprofile($id,$shopname,$address,$description,$shopcontact1,$shopcontact2,$shopemail,$website);
$this->load->view('json',$data);
 }
public function acceptreason(){
$id=$this->input->get('id');
$reason=$this->input->get('reason');
$data['message']=$this->restapi_model->acceptreason($id,$reason);
$this->load->view('json',$data);
}
 public function declinereason(){
$id=$this->input->get('id');
$reason=$this->input->get('reason');
$data['message']=$this->restapi_model->declinereason($id,$reason);
$this->load->view('json',$data);
}
 public function acceptstatus(){
 $id=$this->input->get('id');
$data['message']=$this->restapi_model->acceptstatus($id);
	 $this->load->view('json',$data);
 }
 public function shopphoto(){
 $id=$this->input->get('id');
$data['message']=$this->restapi_model->shopphoto($id);
	 $this->load->view('json',$data);
 }
 public function shopproductphoto(){
 $id=$this->input->get('id');
$data['message']=$this->restapi_model->shopproductphoto($id);
	 $this->load->view('json',$data);
 }
public function allshop(){
$data['message']=$this->restapi_model->allshop();
	 $this->load->view('json',$data);
}
 public function shopprofilemem(){
  $mem=$this->input->get('mem');
$data['message']=$this->restapi_model->shopprofilemem($mem);
	 $this->load->view('json',$data);
 }
 public function getallcategory1(){
 $data['message']=$this->restapi_model->getallcategory1();
	 $this->load->view('json',$data);
 }
 public function updatecat(){
  $userid=$this->input->get('user');
  $catid=$this->input->get('id');
$data['message']=$this->restapi_model->updatecat($userid,$catid);
	 $this->load->view('json',$data);
 }
 public function getarea(){
 $data['message']=$this->restapi_model->getarea();
	 $this->load->view('json',$data);
 }
 public function updatearea(){
  $userid=$this->input->get('user');
  $areaid=$this->input->get('id');
$data['message']=$this->restapi_model->updatearea($userid,$areaid);
	 $this->load->view('json',$data);
 }

 public function imageuploadprofile() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        $image="file";
        $user=$this->input->get_post("user");
        if (  $this->upload->do_upload($image))
        {
            $uploaddata = $this->upload->data();
            $image=$uploaddata['file_name'];
            $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
            $config_r['maintain_ratio'] = TRUE;
            $config_t['create_thumb'] = FALSE;///add this
            $config_r['width']   = 800;
            $config_r['height'] = 800;
            $config_r['quality']    = 100;
            //end of configs

            $this->load->library('image_lib', $config_r);
            $this->image_lib->initialize($config_r);
            if(!$this->image_lib->resize())
            {
                echo "Failed." . $this->image_lib->display_errors();
            }
            else
            {
                $image=$this->image_lib->dest_image;
            }


        }
        $obj = new stdClass();
        $obj->value=$this->user_model->changeuserimage($user,$this->image_lib->dest_image);
        $data["message"]=$obj;


        $this->load->view("json",$data);
    }

    public function imageuploadshop() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        $image="file";
        $user=$this->input->get_post("user");
        $id=$this->input->get_post("id");
        if (  $this->upload->do_upload($image))
        {
            $uploaddata = $this->upload->data();
            $image=$uploaddata['file_name'];
            $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
            $config_r['maintain_ratio'] = TRUE;
            $config_t['create_thumb'] = FALSE;///add this
            $config_r['width']   = 800;
            $config_r['height'] = 800;
            $config_r['quality']    = 100;
            //end of configs

            $this->load->library('image_lib', $config_r);
            $this->image_lib->initialize($config_r);
            if(!$this->image_lib->resize())
            {
                echo "Failed." . $this->image_lib->display_errors();
            }
            else
            {
                $image=$this->image_lib->dest_image;
            }


        }

        $obj = new stdClass();
        $obj->value=$this->user_model->changeshopimage($user,$this->image_lib->dest_image,$id);
        $data["message"]=$obj;


        $this->load->view("json",$data);
    }

    public function imageuploadproduct() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        $image="file";
        $user=$this->input->get_post("user");
        $id=$this->input->get_post("id");
        if (  $this->upload->do_upload($image))
        {
            $uploaddata = $this->upload->data();
            $image=$uploaddata['file_name'];
            $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
            $config_r['maintain_ratio'] = TRUE;
            $config_t['create_thumb'] = FALSE;///add this
            $config_r['width']   = 800;
            $config_r['height'] = 800;
            $config_r['quality']    = 100;
            //end of configs

            $this->load->library('image_lib', $config_r);
            $this->image_lib->initialize($config_r);
            if(!$this->image_lib->resize())
            {
                echo "Failed." . $this->image_lib->display_errors();
            }
            else
            {
                $image=$this->image_lib->dest_image;
            }


        }

        $obj = new stdClass();
        $obj->value=$this->user_model->changeproductimage($user,$this->image_lib->dest_image,$id);
        $data["message"]=$obj;

        $this->load->view("json",$data);
    }


} ?>