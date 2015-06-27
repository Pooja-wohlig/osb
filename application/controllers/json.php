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
		$loginid=$this->input->get("loginid");
		$data['message']=$this->restapi_model->logout($loginid);
        $this->session->sess_destroy();

		$this->load->view('json',true);
    }
 public function home()
 {
$user=$this->input->get('user');
$data['message']=$this->restapi_model->home($user);
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
                $this->image_lib->display_errors();
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
              $this->image_lib->display_errors();
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
                $this->image_lib->display_errors();
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
 public function payumoneysuccess()
 {
     $orderid=$this->input->get('orderid');
     $data['message']=$this->restapi_model->updateorderstatusafterpayment($orderid);
	 $this->load->view('json',$data);
 }
 public function checkorderstatus()
 {
     $orderid=$this->input->get('orderid');
     $data['message']=$this->restapi_model->checkorderstatus($orderid);
	 $this->load->view('json',$data);
 }
 
 //
    public function getsingleproduct()
    {
        $id=$this->input->get('id');
        $data['message']=$this->restapi_model->getsingleproduct($id);
        $this->load->view('json',$data);
    }
 
 
    public function buyproduct()
    {
        $data = json_decode(file_get_contents('php://input'), true);	
        $userid=$data['userid'];
        $productid=$data['productid'];
        $quantity=$data['quantity'];
        $name=$data['name'];
        $email=$data['email'];
        $contactno=$data['contactno'];
        $billingaddress=$data['billingaddress'];
        $billingcity=$data['billingcity'];
        $billingstate=$data['billingstate'];
        $billingcountry=$data['billingcountry'];
        $billingpincode=$data['billingpincode'];
        $shippingaddress=$data['shippingaddress'];
        $shippingcity=$data['shippingcity'];
        $shippingcountry=$data['shippingcountry'];
        $shippingstate=$data['shippingstate'];
        $shippingpincode=$data['shippingpincode'];
        $logisticcharge=$data['logisticcharge'];
        $sameas=$data['sameas'];
		if(empty($data))
		{
		$data['message']=0;
		}
		else
		{
        $data['message']=$this->restapi_model->buyproduct($userid,$productid,$quantity,$name,$email,$contactno,$billingaddress,$billingcity,$billingstate,$billingcountry,$billingpincode,$shippingaddress,$shippingcity,$shippingcountry,$shippingstate,$shippingpincode,$logisticcharge,$sameas);
		}
        $this->load->view('json',$data);
    }
 
 function viewallorders()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $userid=$data['userid'];
     
        $elements=array();
        
        $elements[0]=new stdClass();
        $elements[0]->field="`order`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        $elements[1]=new stdClass();
        $elements[1]->field="`order`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="User Name";
        $elements[1]->alias="name";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`order`.`email`";
        $elements[2]->sort="1";
        $elements[2]->header="Email";
        $elements[2]->alias="email";
        
        $elements[3]=new stdClass();
        $elements[3]->field="`order`.`transactionid`";
        $elements[3]->sort="1";
        $elements[3]->header="Transaction Id";
        $elements[3]->alias="transactionid";
        
        $elements[4]=new stdClass();
        $elements[4]->field="`order`.`trackingcode`";
        $elements[4]->sort="1";
        $elements[4]->header="Tracking Code";
        $elements[4]->alias="trackingcode";
        
        $elements[5]=new stdClass();
        $elements[5]->field="`order`.`orderstatus`";
        $elements[5]->sort="1";
        $elements[5]->header="Order Status id";
        $elements[5]->alias="orderstatus";
        
        $elements[6]=new stdClass();
        $elements[6]->field="DATE(`order`.`timestamp`)";
        $elements[6]->sort="1";
        $elements[6]->header="Timestamp";
        $elements[6]->alias="timestamp";
        
        $elements[7]=new stdClass();
        $elements[7]->field="`orderstatus`.`name`";
        $elements[7]->sort="1";
        $elements[7]->header="Status";
        $elements[7]->alias="orderstatusname";
        
        $elements[8]=new stdClass();
        $elements[8]->field="`orderitems`.`product`";
        $elements[8]->sort="1";
        $elements[8]->header="Productid";
        $elements[8]->alias="productid";
        
        $elements[9]=new stdClass();
        $elements[9]->field="`orderitems`.`quantity`";
        $elements[9]->sort="1";
        $elements[9]->header="Quantity";
        $elements[9]->alias="quantity";
        
        $elements[10]=new stdClass();
        $elements[10]->field="`orderitems`.`price`";
        $elements[10]->sort="1";
        $elements[10]->header="Price";
        $elements[10]->alias="price";
        
        $elements[11]=new stdClass();
        $elements[11]->field="`orderitems`.`finalprice`";
        $elements[11]->sort="1";
        $elements[11]->header="Final Price";
        $elements[11]->alias="finalprice";
        
        $elements[12]=new stdClass();
        $elements[12]->field="`product`.`name`";
        $elements[12]->sort="1";
        $elements[12]->header="Product name";
        $elements[12]->alias="productname";
        
        $elements[13]=new stdClass();
        $elements[13]->field="`product`.`sku`";
        $elements[13]->sort="1";
        $elements[13]->header="Product SKU";
        $elements[13]->alias="productsku";
	    
	    $elements[14]=new stdClass();
        $elements[14]->field="`product`.`image`";
        $elements[14]->sort="1";
        $elements[14]->header="Product Image";
        $elements[14]->alias="productimage";
        
        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        
        if($maxrow=="")
        {
            $maxrow=20;
        }
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `orderitems` LEFT OUTER JOIN `order` ON `orderitems`.`order`=`order`.`id` LEFT OUTER JOIN `orderstatus` ON `orderstatus`.`id`=`order`.`orderstatus` LEFT OUTER JOIN `product` ON `orderitems`.`product`=`product`.`id`","WHERE `order`.`user`='$userid'");
        $this->load->view("json",$data);
    }

    function viewsingleorder()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $orderid=$data['orderid'];
        $userid=$data['userid'];
        $data['message']=$this->restapi_model->viewsingleordernew($orderid,$userid);
        $this->load->view("json",$data);
    }

    public function createproduct()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $name=$data['name'];
//        $sku=$data['sku'];
        $price=$data['price'];
        $description=$data['description'];
        $status=$data['status'];
        $user=$data['user'];
        $quantity=$data['quantity'];
        $category=$data['category'];
        $image=$data['image'];
		if(empty($data)){
		$data['message']=0;
		}
		else{
        $data['message']=$this->restapi_model->createproduct($name,$price,$description,$status,$user,$quantity,$category,$image);
		}
        $this->load->view('json',$data);
    }
 
    public function editproduct()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $id=$data['id'];
        $name=$data['name'];
//        $sku=$data['sku'];
        $price=$data['price'];
        $description=$data['description'];
        $status=$data['status'];
        $user=$data['user'];
        $quantity=$data['quantity'];
        $category=$data['category'];
        $image=$data['image'];
		if(empty($data)){
		$data['message']=0;
		}
		else{
        $data['message']=$this->restapi_model->editproduct($id,$name,$price,$description,$status,$user,$quantity,$category,$image);
		}
        $this->load->view('json',$data);
    }
    public function viewallproducts()
    {
        $elements=array();
        $elements[0]=new stdClass();
        $elements[0]->field="`product`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";

        $elements[1]=new stdClass();
        $elements[1]->field="`product`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";

        $elements[2]=new stdClass();
        $elements[2]->field="`product`.`sku`";
        $elements[2]->sort="1";
        $elements[2]->header="Sku";
        $elements[2]->alias="sku";

        $elements[3]=new stdClass();
        $elements[3]->field="`product`.`price`";
        $elements[3]->sort="1";
        $elements[3]->header="Price";
        $elements[3]->alias="price";

        $elements[4]=new stdClass();
        $elements[4]->field="`product`.`description`";
        $elements[4]->sort="1";
        $elements[4]->header="Description";
        $elements[4]->alias="description";

        $elements[5]=new stdClass();
        $elements[5]->field="`product`.`status`";
        $elements[5]->sort="1";
        $elements[5]->header="Status";
        $elements[5]->alias="status";

        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");

        if($maxrow=="")
        {
              $maxrow=20;
        }
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `product`","WHERE `product`.`status`=1");
        $this->load->view("json",$data);
    }
 
    public function deleteproduct()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $productid=$data['productid'];
        $user=$data['user'];
		if(empty($data))
		{
			$data['message']=0;
		}
		else
		{
        	$data['message']=$this->restapi_model->deleteproduct($productid,$user);
		}
        	$this->load->view('json',$data);
		
    }

 
    public function searchresult()
    {
        $area=$this->input->get('area');
        $category=$this->input->get('category');
        $online=$this->input->get('online');
        $offline=$this->input->get('offline');
        $data['message']=$this->restapi_model->searchresult($area,$category,$online,$offline);
        $this->load->view('json',$data);
    }
 
 
    public function editprofilesubmit()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $userid=$data['userid'];
        $name=$data['name'];
        $password=$data['password'];
        $email=$data['email'];
        $message=$data['message'];
        $image=$data['image'];
        $username=$data['username'];
        $shopname=$data['shopname'];
        $membershipnumber=$data['membershipnumber'];
        $address=$data['address'];
        $description=$data['description'];
        $website=$data['website'];
        $shopcontact1=$data['shopcontact1'];
        $shopcontact2=$data['shopcontact2'];
        $shopemail=$data['shopemail'];
        $area=$data['area'];
        $shoplogo=$data['shoplogo'];
        $billingaddress=$data['billingaddress'];
        $billingcity=$data['billingcity'];
        $billingstate=$data['billingstate'];
        $billingcountry=$data['billingcountry'];
        $billingpincode=$data['billingpincode'];
        $shippingaddress=$data['shippingaddress'];
        $shippingcity=$data['shippingcity'];
        $shippingcountry=$data['shippingcountry'];
        $shippingstate=$data['shippingstate'];
        $shippingpincode=$data['shippingpincode'];
        $onlinestatus=$data['onlinestatus'];
        $data['message']=$this->restapi_model->editprofile($userid,$name,$email,$message,$image,$username,$shopname,$membershipnumber,$address,$description,$website,$shopcontact1,$shopcontact2,$shopemail,$area,$shoplogo,$billingaddress,$billingcity,$billingstate,$billingcountry,$billingpincode,$shippingaddress,$shippingcity,$shippingcountry,$shippingstate,$shippingpincode,$onlinestatus,$password);
        $this->load->view('json',$data);
    }
 
 
 function viewmyproductorders()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $userid=$data['userid'];
        
        $products=$this->db->query("SELECT * FROM `product` WHERE `user`='$userid'")->result();
//        print_r($products);
     if(empty($products))
     {
         $productid="(0)";
     }
     else
     {
         $productid="(";
         foreach ($products as $key=>$product)
         {
             if($key==0)
             {
                $productid.=$product->id;
             }
             else
             {
                $productid.=",".$product->id;
             }
         }
     $productid.=")";
     }
//     echo $productid;
        $elements=array();
        
        $elements[0]=new stdClass();
        $elements[0]->field="`order`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        $elements[1]=new stdClass();
        $elements[1]->field="`order`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="User Name";
        $elements[1]->alias="name";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`order`.`email`";
        $elements[2]->sort="1";
        $elements[2]->header="Email";
        $elements[2]->alias="email";
        
        $elements[3]=new stdClass();
        $elements[3]->field="`order`.`transactionid`";
        $elements[3]->sort="1";
        $elements[3]->header="Transaction Id";
        $elements[3]->alias="transactionid";
        
        $elements[4]=new stdClass();
        $elements[4]->field="`order`.`trackingcode`";
        $elements[4]->sort="1";
        $elements[4]->header="Tracking Code";
        $elements[4]->alias="trackingcode";
        
        $elements[5]=new stdClass();
        $elements[5]->field="`order`.`orderstatus`";
        $elements[5]->sort="1";
        $elements[5]->header="Order Status id";
        $elements[5]->alias="orderstatus";
        
        $elements[6]=new stdClass();
        $elements[6]->field="DATE(`order`.`timestamp`)";
        $elements[6]->sort="1";
        $elements[6]->header="Timestamp";
        $elements[6]->alias="timestamp";
        
        $elements[7]=new stdClass();
        $elements[7]->field="`orderstatus`.`name`";
        $elements[7]->sort="1";
        $elements[7]->header="Status";
        $elements[7]->alias="orderstatusname";
        
        $elements[8]=new stdClass();
        $elements[8]->field="`orderitems`.`product`";
        $elements[8]->sort="1";
        $elements[8]->header="Productid";
        $elements[8]->alias="productid";
        
        $elements[9]=new stdClass();
        $elements[9]->field="`orderitems`.`quantity`";
        $elements[9]->sort="1";
        $elements[9]->header="Quantity";
        $elements[9]->alias="quantity";
        
        $elements[10]=new stdClass();
        $elements[10]->field="`orderitems`.`price`";
        $elements[10]->sort="1";
        $elements[10]->header="Price";
        $elements[10]->alias="price";
        
        $elements[11]=new stdClass();
        $elements[11]->field="`orderitems`.`finalprice`";
        $elements[11]->sort="1";
        $elements[11]->header="Final Price";
        $elements[11]->alias="finalprice";
        
        $elements[12]=new stdClass();
        $elements[12]->field="`product`.`name`";
        $elements[12]->sort="1";
        $elements[12]->header="Product name";
        $elements[12]->alias="productname";
        
        $elements[13]=new stdClass();
        $elements[13]->field="`product`.`sku`";
        $elements[13]->sort="1";
        $elements[13]->header="Product SKU";
        $elements[13]->alias="productsku";
        
	    $elements[14]=new stdClass();
        $elements[14]->field="`product`.`image`";
        $elements[14]->sort="1";
        $elements[14]->header="Product Image";
        $elements[14]->alias="productimage";
	 
        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        
        if($maxrow=="")
        {
            $maxrow=20;
        }
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `orderitems` LEFT OUTER JOIN `order` ON `orderitems`.`order`=`order`.`id` LEFT OUTER JOIN `orderstatus` ON `orderstatus`.`id`=`order`.`orderstatus` LEFT OUTER JOIN `product` ON `orderitems`.`product`=`product`.`id`","WHERE `orderitems`.`product` IN $productid");
        $this->load->view("json",$data);
    }
 
    function viewmysingleorder()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $orderid=$data['orderid'];
        $userid=$data['userid'];
        $data['message']=$this->restapi_model->viewmysingleorder($orderid,$userid);
        $this->load->view("json",$data);
    }

    function changeproductstatus()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $productid=$data['productid'];
        $status=$data['status'];
        $data['message']=$this->restapi_model->changeproductstatus($productid,$status);
        $this->load->view("json",$data);
    }
 public function becomeamember(){
		$data = json_decode(file_get_contents('php://input'), true);
		$name=$data['name'];
		$email=$data['email'];
		$number=$data['number'];
		$message=$data['message'];
		$data['message']=$this->restapi_model->becomeamember($name,$email,$number,$message);
		$this->load->view('json',$data);
 }
 public function viewmyproducts(){
  $user=$this->input->get('user');
     $data['message']=$this->restapi_model->viewmyproducts($user);
	 $this->load->view('json',$data);
 }
 public function editproductimage(){
	    $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        $image="file";
//	    $id=$this->input->get_post('id');
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
                $this->image_lib->display_errors();
            }
            else
            {
                $image=$this->image_lib->dest_image;
            }
        }
	 			$obj = new stdClass();
	 			$obj->value=$this->image_lib->dest_image;
	 			$data["message"]=$obj;
                $this->load->view("json",$data);
//        $obj = new stdClass();
//        $obj->value=$this->restapi_model->editproductimage($id,$this->image_lib->dest_image);
//        $data["message"]=$obj;
//        $this->load->view("json",$data);
 }

public function searchproduct(){
$product=$this->input->get_post('product');
$membershipno=$this->input->get_post('membershipno');
$category=$this->input->get_post('category');
$sort=$this->input->get_post('sortid');
	 $data['message']=$this->restapi_model->searchproduct($product,$membershipno,$category,$sort);
	 $this->load->view('json',$data);
}
 
     public function getalluserproducts()
     {
         $data = json_decode(file_get_contents('php://input'), true);
         $userid=$data['userid'];
         
        $elements=array();
        
        $elements[0]=new stdClass();
        $elements[0]->field="`product`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        $elements[1]=new stdClass();
        $elements[1]->field="`product`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`product`.`sku`";
        $elements[2]->sort="1";
        $elements[2]->header="Sku";
        $elements[2]->alias="sku";
        
        $elements[3]=new stdClass();
        $elements[3]->field="`product`.`price`";
        $elements[3]->sort="1";
        $elements[3]->header="Price";
        $elements[3]->alias="price";
        
        $elements[4]=new stdClass();
        $elements[4]->field="`product`.`description`";
        $elements[4]->sort="1";
        $elements[4]->header="Description";
        $elements[4]->alias="description";
        
        $elements[5]=new stdClass();
        $elements[5]->field="`product`.`status`";
        $elements[5]->sort="1";
        $elements[5]->header="Status";
        $elements[5]->alias="status";
        
        $elements[6]=new stdClass();
        $elements[6]->field="`product`.`quantity`";
        $elements[6]->sort="1";
        $elements[6]->header="Quantity";
        $elements[6]->alias="quantity";
        
        $elements[7]=new stdClass();
        $elements[7]->field="`product`.`image`";
        $elements[7]->sort="1";
        $elements[7]->header="Image";
        $elements[7]->alias="image";
		 
		$elements[8]=new stdClass();
        $elements[8]->field="`user`.`shopname`";
        $elements[8]->sort="1";
        $elements[8]->header="Shopname";
        $elements[8]->alias="shopname";
        
        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        
        if($maxrow=="")
        {
            $maxrow=20;
        }
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `product` LEFT OUTER JOIN `user` ON `user`.`id`=`product`.`user`","WHERE `product`.`user`='$userid'");
        $this->load->view("json",$data);

     }
  public function getuserdetails(){
		$data = json_decode(file_get_contents('php://input'), true);
		$user=$data['userid'];
		$data['message']=$this->restapi_model->getuserdetails($user);
		$this->load->view('json',$data);
 }
  public function getnotification(){
		$user=$this->input->get(userid);
		$data['message']=$this->restapi_model->getnotification($user);
		$this->load->view('json',$data);
 }
 public function addproductimage(){
// $id=$this->input->get_post('id');
	   $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        $image="file";
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
                $this->image_lib->display_errors();
            }
            else
            {
                $image=$this->image_lib->dest_image;
            }
        }
        $obj = new stdClass();
        $obj->value=$this->image_lib->dest_image;
        $data["message"]=$obj;
        $this->load->view("json",$data);
 }
} ?>