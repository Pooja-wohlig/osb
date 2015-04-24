<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Site extends CI_Controller 
{
	public function __construct( )
	{
		parent::__construct();
		
		$this->is_logged_in();
	}
	function is_logged_in( )
	{
		$is_logged_in = $this->session->userdata( 'logged_in' );
		if ( $is_logged_in !== 'true' || !isset( $is_logged_in ) ) {
			redirect( base_url() . 'index.php/login', 'refresh' );
		} //$is_logged_in !== 'true' || !isset( $is_logged_in )
	}
	function checkaccess($access)
	{
		$accesslevel=$this->session->userdata('accesslevel');
		if(!in_array($accesslevel,$access))
			redirect( base_url() . 'index.php/site?alerterror=You do not have access to this page. ', 'refresh' );
	}
	public function index()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$data[ 'page' ] = 'dashboard';
		$data[ 'title' ] = 'Welcome';
		$this->load->view( 'template', $data );	
	}
	public function createuser()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['accesslevel']=$this->user_model->getaccesslevels();
		$data[ 'status' ] =$this->user_model->getstatusdropdown();
		$data[ 'logintype' ] =$this->user_model->getlogintypedropdown();	
		$data[ 'area' ] =$this->area_model->getareadropdown();	
//        $data['category']=$this->category_model->getcategorydropdown();
		$data[ 'page' ] = 'createuser';
		$data[ 'title' ] = 'Create User';
		$this->load->view( 'template', $data );	
	}
	function createusersubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required|max_length[30]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[user.email]');
//		$this->form_validation->set_rules('password','Password','trim|required|min_length[6]|max_length[30]');
//		$this->form_validation->set_rules('confirmpassword','Confirm Password','trim|required|matches[password]');
		$this->form_validation->set_rules('accessslevel','Accessslevel','trim');
		$this->form_validation->set_rules('status','status','trim|');
		$this->form_validation->set_rules('socialid','Socialid','trim');
		$this->form_validation->set_rules('area','area','trim');
		$this->form_validation->set_rules('logintype','logintype','trim');
		$this->form_validation->set_rules('json','json','trim');
		$this->form_validation->set_rules('shopname','shopname','trim');
		$this->form_validation->set_rules('membershipno','membershipno','trim');
		$this->form_validation->set_rules('address','address','trim');
		$this->form_validation->set_rules('description','description','trim');
		$this->form_validation->set_rules('website','website','trim');
		$this->form_validation->set_rules('shopcontact1','shopcontact1','trim');
		$this->form_validation->set_rules('shopcontact2','shopcontact2','trim');
		$this->form_validation->set_rules('shopemail','shopemail','trim');
		$this->form_validation->set_rules('purchasebalance','purchasebalance','trim');
		$this->form_validation->set_rules('salesbalance','salesbalance','trim');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['accesslevel']=$this->user_model->getaccesslevels();
            $data[ 'status' ] =$this->user_model->getstatusdropdown();
            $data[ 'area' ] =$this->area_model->getareadropdown();
            $data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
            
//            $data['category']=$this->category_model->getcategorydropdown();
            $data[ 'page' ] = 'createuser';
            $data[ 'title' ] = 'Create User';
            $this->load->view( 'template', $data );	
		}
		else
		{
            $name=$this->input->post('name');
            $email=$this->input->post('email');
//            $password=$this->input->post('password');
            $accesslevel=$this->input->post('accesslevel');
            $status=$this->input->post('status');
            $socialid=$this->input->post('socialid');
            $logintype=$this->input->post('logintype');
            $json=$this->input->post('json');
            $area=$this->input->post('area');
            $shopname=$this->input->post('shopname');
            $membershipno=$this->input->post('membershipno');
            $address=$this->input->post('address');
            $description=$this->input->post('description');
            $website=$this->input->post('website');
            $shopcontact1=$this->input->post('shopcontact1');
            $shopcontact2=$this->input->post('shopcontact2');
            $shopemail=$this->input->post('shopemail');
            $purchasebalance=$this->input->post('purchasebalance');
            $salesbalance=$this->input->post('salesbalance');
//            $category=$this->input->post('category');
 			$data[ 'password' ] =$this->user_model->get_random_password();
			$password=$data[ 'password' ];
//			echo $password;
//			$this->user_model->sendemail($email,$membershipno,$password);
//   
//
//
//            $config['upload_path'] = './uploads/';
//			$config['allowed_types'] = 'gif|jpg|png|jpeg';
//			$this->load->library('upload', $config);
//			$filename="image";
//			$image="";
//			if (  $this->upload->do_upload($filename))
//			{
//				$uploaddata = $this->upload->data();
//				$image=$uploaddata['file_name'];
//                
//                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
//                $config_r['maintain_ratio'] = TRUE;
//                $config_t['create_thumb'] = FALSE;///add this
//                $config_r['width']   = 800;
//                $config_r['height'] = 800;
//                $config_r['quality']    = 100;
//                //end of configs
//
//                $this->load->library('image_lib', $config_r); 
//                $this->image_lib->initialize($config_r);
//                if(!$this->image_lib->resize())
//                {
//                    echo "Failed." . $this->image_lib->display_errors();
//                    //return false;
//                }  
//                else
//                {
//                    //print_r($this->image_lib->dest_image);
//                    //dest_image
//                    $image=$this->image_lib->dest_image;
//                    //return false;
//                }
//                
//			}
//            
//		if($this->user_model->create($name,$email,$password,$accesslevel,$status,$socialid,$logintype,$image,$json,$shopname,$membershipno,$address,$description,$website,$shopcontact1,$shopcontact2,$shopemail,$purchasebalance,$salesbalance,$area)==0)
//		$data['alerterror']="New user could not be created.";
//			else
//			$data['alertsuccess']="User created Successfully.";
//			$data['redirect']="site/viewusers";
//			$this->load->view("redirect",$data);
		}
	}
    function viewusers()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['page']='viewusers';
        $data['base_url'] = site_url("site/viewusersjson");
        
		$data['title']='View Users';
		$this->load->view('template',$data);
	} 
    function viewusersjson()
	{
		$access = array("1");
		$this->checkaccess($access);
        
        
        $elements=array();
        $elements[0]=new stdClass();
        $elements[0]->field="`user`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        
        $elements[1]=new stdClass();
        $elements[1]->field="`user`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`user`.`email`";
        $elements[2]->sort="1";
        $elements[2]->header="Email";
        $elements[2]->alias="email";
        
        $elements[3]=new stdClass();
        $elements[3]->field="`user`.`socialid`";
        $elements[3]->sort="1";
        $elements[3]->header="SocialId";
        $elements[3]->alias="socialid";
        
        $elements[4]=new stdClass();
        $elements[4]->field="`logintype`.`name`";
        $elements[4]->sort="1";
        $elements[4]->header="Logintype";
        $elements[4]->alias="logintype";
        
        $elements[5]=new stdClass();
        $elements[5]->field="`user`.`json`";
        $elements[5]->sort="1";
        $elements[5]->header="Json";
        $elements[5]->alias="json";
		
		$elements[6]=new stdClass();
        $elements[6]->field="`user`.`shopname`";
        $elements[6]->sort="1";
        $elements[6]->header="Shopname";
        $elements[6]->alias="shopname";
		
		$elements[7]=new stdClass();
        $elements[7]->field="`user`.`membershipno`";
        $elements[7]->sort="1";
        $elements[7]->header="Membershipno";
        $elements[7]->alias="membershipno";
		
		$elements[8]=new stdClass();
        $elements[8]->field="`user`.`address`";
        $elements[8]->sort="1";
        $elements[8]->header="Address";
        $elements[8]->alias="address";
		
		$elements[9]=new stdClass();
        $elements[9]->field="`user`.`description`";
        $elements[9]->sort="1";
        $elements[9]->header="Description";
        $elements[9]->alias="description";
		
		$elements[10]=new stdClass();
        $elements[10]->field="`user`.`website`";
        $elements[10]->sort="1";
        $elements[10]->header="Website";
        $elements[10]->alias="website";
		
		$elements[11]=new stdClass();
        $elements[11]->field="`user`.`shopcontact1`";
        $elements[11]->sort="1";
        $elements[11]->header="Shopcontact1";
        $elements[11]->alias="shopcontact1";
		
		$elements[12]=new stdClass();
        $elements[12]->field="`user`.`shopcontact2`";
        $elements[12]->sort="1";
        $elements[12]->header="Shopcontact2";
        $elements[12]->alias="shopcontact2";
		
		$elements[13]=new stdClass();
        $elements[13]->field="`user`.`shopemail`";
        $elements[13]->sort="1";
        $elements[13]->header="Shopemail";
        $elements[13]->alias="shopemail";
		
		$elements[14]=new stdClass();
        $elements[14]->field="`user`.`purchasebalance`";
        $elements[14]->sort="1";
        $elements[14]->header="Purchasebalance";
        $elements[14]->alias="purchasebalance";
		
		$elements[15]=new stdClass();
        $elements[15]->field="`user`.`salesbalance`";
        $elements[15]->sort="1";
        $elements[15]->header="Salesbalance";
        $elements[15]->alias="salesbalance";
		
       
        $elements[16]=new stdClass();
        $elements[16]->field="`accesslevel`.`name`";
        $elements[16]->sort="1";
        $elements[16]->header="Accesslevel";
        $elements[16]->alias="accesslevelname";
       
        $elements[17]=new stdClass();
        $elements[17]->field="`statuses`.`name`";
        $elements[17]->sort="1";
        $elements[17]->header="Status";
        $elements[17]->alias="status";
       
        $elements[18]=new stdClass();
        $elements[18]->field="`osb_area`.`name`";
        $elements[18]->sort="1";
        $elements[18]->header="Name";
        $elements[18]->alias="areaname";
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
       
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `user` LEFT OUTER JOIN `logintype` ON `logintype`.`id`=`user`.`logintype` LEFT OUTER JOIN `accesslevel` ON `accesslevel`.`id`=`user`.`accesslevel` LEFT OUTER JOIN `statuses` ON `statuses`.`id`=`user`.`status` LEFT OUTER JOIN `osb_area` ON `osb_area`.`id`=`user`.`area`");
        
		$this->load->view("json",$data);
	} 
    
    
	function edituser()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data["page2"]="block/userblock";
		$data[ 'status' ] =$this->user_model->getstatusdropdown();
		$data['accesslevel']=$this->user_model->getaccesslevels();
		$data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
		 $data[ 'area' ] =$this->area_model->getareadropdown();
		$data['before']=$this->user_model->beforeedit($this->input->get('id'));
		$data['page']='edituser';
		$data['title']='Edit User';
		$this->load->view('templatewith2',$data);
	}
	function editusersubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		
		$this->form_validation->set_rules('name','Name','trim|required|max_length[30]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|min_length[6]|max_length[30]');
		$this->form_validation->set_rules('confirmpassword','Confirm Password','trim|matches[password]');
		$this->form_validation->set_rules('accessslevel','Accessslevel','trim');
		$this->form_validation->set_rules('status','status','trim|');
		$this->form_validation->set_rules('socialid','Socialid','trim');
		$this->form_validation->set_rules('logintype','logintype','trim');
		$this->form_validation->set_rules('json','json','trim');
		$this->form_validation->set_rules('area','area','trim');
		$this->form_validation->set_rules('shopname','shopname','trim');
		$this->form_validation->set_rules('membershipno','membershipno','trim');
		$this->form_validation->set_rules('address','address','trim');
		$this->form_validation->set_rules('description','description','trim');
		$this->form_validation->set_rules('website','website','trim');
		$this->form_validation->set_rules('shopcontact1','shopcontact1','trim');
		$this->form_validation->set_rules('shopcontact2','shopcontact2','trim');
		$this->form_validation->set_rules('shopemail','shopemail','trim');
		$this->form_validation->set_rules('purchasebalance','purchasebalance','trim');
		$this->form_validation->set_rules('salesbalance','salesbalance','trim');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'status' ] =$this->user_model->getstatusdropdown();
			$data['accesslevel']=$this->user_model->getaccesslevels();
            $data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
			 $data[ 'area' ] =$this->area_model->getareadropdown();
			$data['before']=$this->user_model->beforeedit($this->input->post('id'));
			$data['page']='edituser';
//			$data['page2']='block/userblock';
			$data['title']='Edit User';
			$this->load->view('template',$data);
		}
		else
		{
            
            $id=$this->input->get_post('id');
            $name=$this->input->get_post('name');
            $email=$this->input->get_post('email');
            $password=$this->input->get_post('password');
            $accesslevel=$this->input->get_post('accesslevel');
            $status=$this->input->get_post('status');
            $socialid=$this->input->get_post('socialid');
            $logintype=$this->input->get_post('logintype');
            $json=$this->input->get_post('json');
            $area=$this->input->get_post('area');
			$shopname=$this->input->post('shopname');
            $membershipno=$this->input->post('membershipno');
            $address=$this->input->post('address');
            $description=$this->input->post('description');
            $website=$this->input->post('website');
            $shopcontact1=$this->input->post('shopcontact1');
            $shopcontact2=$this->input->post('shopcontact2');
            $shopemail=$this->input->post('shopemail');
            $purchasebalance=$this->input->post('purchasebalance');
            $salesbalance=$this->input->post('salesbalance');
//            $category=$this->input->get_post('category');
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
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
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
            if($image=="")
            {
            $image=$this->user_model->getuserimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }
            
			if($this->user_model->edit($id,$name,$email,$password,$accesslevel,$status,$socialid,$logintype,$image,$json,$shopname,$membershipno,$address,$description,$website,$shopcontact1,$shopcontact2,$shopemail,$purchasebalance,$salesbalance,$area)==0)
			$data['alerterror']="User Editing was unsuccesful";
			else
			$data['alertsuccess']="User edited Successfully.";
			
			$data['redirect']="site/viewusers";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
			
		}
	}
	
	function deleteuser()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->user_model->deleteuser($this->input->get('id'));
//		$data['table']=$this->user_model->viewusers();
		$data['alertsuccess']="User Deleted Successfully";
		$data['redirect']="site/viewusers";
			//$data['other']="template=$template";
		$this->load->view("redirect",$data);
	}
	function changeuserstatus()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->user_model->changestatus($this->input->get('id'));
		$data['table']=$this->user_model->viewusers();
		$data['alertsuccess']="Status Changed Successfully";
		$data['redirect']="site/viewusers";
        $data['other']="template=$template";
        $this->load->view("redirect",$data);
	}
    
    
    
    public function viewshopproductphoto()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewshopproductphoto";
$data["base_url"]=site_url("site/viewshopproductphotojson");
$data["title"]="View shopproductphoto";
$this->load->view("template",$data);
}
function viewshopproductphotojson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`osb_shopproductphoto`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`osb_shopproductphoto`.`user`";
$elements[1]->sort="1";
$elements[1]->header="User";
$elements[1]->alias="user";
//$elements[2]=new stdClass();
//$elements[2]->field="`osb_shopproductphoto`.`photo`";
//$elements[2]->sort="1";
//$elements[2]->header="Photo";
//$elements[2]->alias="photo";
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
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `osb_shopproductphoto`");
$this->load->view("json",$data);
}

public function createshopproductphoto()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createshopproductphoto";
$data['user']=$this->shopproductphoto_model->getuserdropdown();
$data["title"]="Create shopproductphoto";
$this->load->view("template",$data);
}
public function createshopproductphotosubmit() 
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("user","User","trim");
//$this->form_validation->set_rules("photo","Photo","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createshopproductphoto";
$data['user']=$this->shopproductphoto_model->getuserdropdown();
$data["title"]="Create shopproductphoto";
$this->load->view("template",$data);
}
else
{
$user=$this->input->get_post("user");
$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="photo";
			$photo="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$photo=$uploaddata['file_name'];
                
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
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $photo=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
//$photo=$this->input->get_post("photo");
if($this->shopproductphoto_model->create($user,$photo)==0)
$data["alerterror"]="New shopproductphoto could not be created.";
else
$data["alertsuccess"]="shopproductphoto created Successfully.";
$data["redirect"]="site/viewshopproductphoto";
$this->load->view("redirect",$data);
}
}
public function editshopproductphoto()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="editshopproductphoto";
$data['user']=$this->shopproductphoto_model->getuserdropdown();
$data["title"]="Edit shopproductphoto";
$data["before"]=$this->shopproductphoto_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editshopproductphotosubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("user","User","trim");
//$this->form_validation->set_rules("photo","Photo","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editshopproductphoto";
$data['user']=$this->shopproductphoto_model->getuserdropdown();
$data["title"]="Edit shopproductphoto";
$data["before"]=$this->shopproductphoto_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$user=$this->input->get_post("user");
	$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="photo";
			$photo="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$photo=$uploaddata['file_name'];
                
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
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $photo=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
            if($photo=="")
            {
            $photo=$this->shopphoto_model->getshopphotobyid($id);
               // print_r($image);
                $photo=$photo->photo;
            }
//$photo=$this->input->get_post("photo");
if($this->shopproductphoto_model->edit($id,$user,$photo)==0)
$data["alerterror"]="New shopproductphoto could not be Updated.";
else
$data["alertsuccess"]="shopproductphoto Updated Successfully.";
$data["redirect"]="site/viewshopproductphoto";
$this->load->view("redirect",$data);
}
}
public function deleteshopproductphoto()
{
$access=array("1");
$this->checkaccess($access);
$this->shopproductphoto_model->delete($this->input->get("id"));
$data["redirect"]="site/viewshopproductphoto";
$this->load->view("redirect",$data);
}

public function viewshopphoto()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewshopphoto";
$data['userid']=$this->input->get('id');
$data['before']=$this->user_model->beforeedit($this->input->get('id'));
$userid=$this->input->get('id');
$data["base_url"]=site_url("site/viewshopphotojson");
$data["title"]="View shopphoto";
$this->load->view("template",$data);
}
function viewshopphotojson()
{
	$userid=$this->input->get('id');
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`osb_shopphoto`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`osb_shopphoto`.`user`";
$elements[1]->sort="1";
$elements[1]->header="User";
$elements[1]->alias="user";
//$elements[2]=new stdClass();
//$elements[2]->field="`osb_shopphoto`.`photo`";
//$elements[2]->sort="1";
//$elements[2]->header="Photo";
//$elements[2]->alias="photo";
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
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `osb_shopphoto`");
$this->load->view("json",$data);
}

public function createshopphoto()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createshopphoto";
$data['user']=$this->shopproductphoto_model->getuserdropdown();
//$data['userid']=$this->input->get('id');	 
$data["title"]="Create shopphoto";
$this->load->view("template",$data);
}
public function createshopphotosubmit() 
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("user","User","trim");
$this->form_validation->set_rules("photo","Photo","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data['user']=$this->shopproductphoto_model->getuserdropdown();
//$data['userid']=$this->input->post('user');	
$data["page"]="createshopphoto";
$data["title"]="Create shopphoto";
$this->load->view("template",$data);
}
else
{
$user=$this->input->get_post("user");
//$photo=$this->input->get_post("photo");
$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="photo";
			$photo="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$photo=$uploaddata['file_name'];
                
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
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $photo=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
if($this->shopphoto_model->create($user,$photo)==0)
$data["alerterror"]="New shopphoto could not be created.";
else
$data["alertsuccess"]="shopphoto created Successfully.";
$data["redirect"]="site/viewshopphoto";
$this->load->view("redirect",$data);
}
}

public function editshopphoto()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="editshopphoto";
$data['user']=$this->shopproductphoto_model->getuserdropdown();
//$data['userid']=$this->input->get('id');
//$data['shopphotoid']=$this->input->get('shopphotoid');			
$data["title"]="Edit shopphoto";
$data["before"]=$this->shopphoto_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editshopphotosubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("user","User","trim");
//$this->form_validation->set_rules("photo","Photo","trim");
$data['user']=$this->shopproductphoto_model->getuserdropdown();
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editshopphoto";
$data["title"]="Edit shopphoto";
//   $data['userid']=$this->input->post('user');
// $data['shopphotoid']=$this->input->post('id');
$data["before"]=$this->shopphoto_model->beforeedit($this->input->get("id"));
	
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$user=$this->input->get_post("user");
//$photo=$this->input->get_post("photo");
$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="photo";
			$photo="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$photo=$uploaddata['file_name'];
                
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
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $photo=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
            if($photo=="")
            {
            $photo=$this->shopphoto_model->getshopphotobyid($id);
               // print_r($image);
                $photo=$photo->photo;
            }
            
if($this->shopphoto_model->edit($id,$user,$photo)==0)
$data["alerterror"]="New shopphoto could not be Updated.";
else
$data["alertsuccess"]="shopphoto Updated Successfully.";
$data["redirect"]="site/viewshopphoto?id=".$user;
$this->load->view("redirect",$data);
}
}
public function deleteshopphoto()
{
$access=array("1");
$this->checkaccess($access);
//		   $data['userid']=$this->input->get('id');
//        $data['shopphotoid']=$this->input->get('shopphotoid');
$this->shopphoto_model->delete($this->input->get("id"));
$data["redirect"]="site/viewshopphoto?id=".$this->input->get('id');
$this->load->view("redirect",$data);
}
	
//	user_category-------------------------------------------------------------------------------------------------------------------------
	
	public function viewusercategory()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewusercategory";
$data['userid']=$this->input->get('id');
$data['before']=$this->user_model->beforeedit($this->input->get('id'));
$userid=$this->input->get('id');
$data["base_url"]=site_url("site/viewusercategoryjson");
$data["title"]="View usercategory";
$this->load->view("template",$data);
}
function viewusercategoryjson()
{
	$userid=$this->input->get('id');
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`usercategory`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`usercategory`.`user`";
$elements[1]->sort="1";
$elements[1]->header="User";
$elements[1]->alias="user";
$elements[2]=new stdClass();
$elements[2]->field="`usercategory`.`category`";
$elements[2]->sort="1";
$elements[2]->header="Category";
$elements[2]->alias="category";
$elements[3]=new stdClass();
$elements[3]->field="`user`.`name`";
$elements[3]->sort="1";
$elements[3]->header="Name";
$elements[3]->alias="name";	
$elements[4]=new stdClass();
$elements[4]->field="`osb_category`.`name`";
$elements[4]->sort="1";
$elements[4]->header="Name";
$elements[4]->alias="name";	
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
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `usercategory` LEFT OUTER JOIN `user` ON `usercategory`.`user`=`user`.`id` LEFT OUTER JOIN `osb_category` ON `usercategory`.`category`=`osb_category`.`id`");
$this->load->view("json",$data);
}

public function createusercategory()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createusercategory";
$data['user']=$this->shopproductphoto_model->getuserdropdown();
$data['category']=$this->usercategory_model->getcategorydropdown();
//$data['userid']=$this->input->get('id');	 
$data["title"]="Create usercategory";
$this->load->view("template",$data);
}
public function createusercategorysubmit() 
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("user","User","trim");
$this->form_validation->set_rules("category","Category","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data['user']=$this->shopproductphoto_model->getuserdropdown();
$data['category']=$this->usercategory_model->getcategorydropdown();
//$data['userid']=$this->input->post('user');	
$data["page"]="createusercategory";
$data["title"]="Create usercategory";
$this->load->view("template",$data);
}
else
{
$user=$this->input->get_post("user");
$category=$this->input->get_post("category");
if($this->usercategory_model->create($user,$category)==0)
$data["alerterror"]="New usercategory could not be created.";
else
$data["alertsuccess"]="usercategory created Successfully.";
$data["redirect"]="site/viewusercategory";
$this->load->view("redirect",$data);
}
}

public function editusercategory()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="editusercategory";
$data['user']=$this->shopproductphoto_model->getuserdropdown();
$data['category']=$this->usercategory_model->getcategorydropdown();
//$data['userid']=$this->input->get('id');
//$data['shopphotoid']=$this->input->get('shopphotoid');			
$data["title"]="Edit usercategory";
$data["before"]=$this->usercategory_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editusercategorysubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("user","User","trim");
$this->form_validation->set_rules("category","Category","trim");
$data['user']=$this->shopproductphoto_model->getuserdropdown();
$data['category']=$this->usercategory_model->getcategorydropdown();
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editusercategory";
$data["title"]="Edit usercategory";
//   $data['userid']=$this->input->post('user');
// $data['shopphotoid']=$this->input->post('id');
$data["before"]=$this->usercategory_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$user=$this->input->get_post("user");
$category=$this->input->get_post("category");
if($this->usercategory_model->edit($id,$user,$category)==0)
$data["alerterror"]="New usercategory could not be Updated.";
else
$data["alertsuccess"]="usercategory Updated Successfully.";
$data["redirect"]="site/viewusercategory?id=".$user;
$this->load->view("redirect",$data);
}
}
public function deleteusercategory()
{
$access=array("1");
$this->checkaccess($access);
//		   $data['userid']=$this->input->get('id');
//        $data['shopphotoid']=$this->input->get('shopphotoid');
$this->usercategory_model->delete($this->input->get("id"));
$data["redirect"]="site/viewusercategory?id=".$this->input->get('id');
$this->load->view("redirect",$data);
}
//	user_category ends------------------------------------------------------------------------------------------------------------------
public function viewcategory()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewcategory";
$data["base_url"]=site_url("site/viewcategoryjson");
$data["title"]="View category";
$this->load->view("template",$data);
}
function viewcategoryjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`osb_category`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`osb_category`.`order`";
$elements[1]->sort="1";
$elements[1]->header="Order";
$elements[1]->alias="order";
$elements[2]=new stdClass();
$elements[2]->field="`osb_category`.`status`";
$elements[2]->sort="1";
$elements[2]->header="Status";
$elements[2]->alias="status";
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
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `osb_category`");
$this->load->view("json",$data);
}

public function createcategory()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createcategory";
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["title"]="Create category";
$this->load->view("template",$data);
}
public function createcategorysubmit() 
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("name","Name","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["page"]="createcategory";
$data["title"]="Create category";
$this->load->view("template",$data);
}
else
{
$order=$this->input->get_post("order");
$status=$this->input->get_post("status");
$name=$this->input->get_post("name");
if($this->category_model->create($order,$status,$name)==0)
$data["alerterror"]="New category could not be created.";
else
$data["alertsuccess"]="category created Successfully.";
$data["redirect"]="site/viewcategory";
$this->load->view("redirect",$data);
}
}
public function editcategory()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="editcategory";
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["title"]="Edit category";
$data["before"]=$this->category_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editcategorysubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("name","Name","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["page"]="editcategory";
$data["title"]="Edit category";
$data["before"]=$this->category_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$order=$this->input->get_post("order");
$status=$this->input->get_post("status");
$name=$this->input->get_post("name");
if($this->category_model->edit($id,$order,$status,$name)==0)
$data["alerterror"]="New category could not be Updated.";
else
$data["alertsuccess"]="category Updated Successfully.";
$data["redirect"]="site/viewcategory";
$this->load->view("redirect",$data);
}
}
public function deletecategory()
{
$access=array("1");
$this->checkaccess($access);
$this->category_model->delete($this->input->get("id"));
$data["redirect"]="site/viewcategory";
$this->load->view("redirect",$data);
}
	
public function viewarea()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewarea";
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["base_url"]=site_url("site/viewareajson");
$data["title"]="View area";
$this->load->view("template",$data);
}
function viewareajson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`osb_area`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`osb_area`.`order`";
$elements[1]->sort="1";
$elements[1]->header="Order";
$elements[1]->alias="order";
$elements[2]=new stdClass();
$elements[2]->field="`osb_area`.`status`";
$elements[2]->sort="1";
$elements[2]->header="Status";
$elements[2]->alias="status";
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
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `osb_area`");
$this->load->view("json",$data);
}

public function createarea()
{
$access=array("1");
$this->checkaccess($access);
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["page"]="createarea";
$data["title"]="Create area";
$this->load->view("template",$data);
}
public function createareasubmit() 
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("name","Name","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["page"]="createarea";
$data["title"]="Create area";
$this->load->view("template",$data);
}
else
{
$order=$this->input->get_post("order");
$status=$this->input->get_post("status");
$name=$this->input->get_post("name");
if($this->area_model->create($order,$status,$name)==0)
$data["alerterror"]="New area could not be created.";
else
$data["alertsuccess"]="area created Successfully.";
$data["redirect"]="site/viewarea";
$this->load->view("redirect",$data);
}
}
public function editarea()
{
$access=array("1");
$this->checkaccess($access);
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["page"]="editarea";
$data["title"]="Edit area";
$data["before"]=$this->area_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editareasubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("name","Name","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["page"]="editarea";
$data["title"]="Edit area";
$data["before"]=$this->area_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$order=$this->input->get_post("order");
$status=$this->input->get_post("status");
$name=$this->input->get_post("name");
if($this->area_model->edit($id,$order,$status,$name)==0)
$data["alerterror"]="New area could not be Updated.";
else
$data["alertsuccess"]="area Updated Successfully.";
$data["redirect"]="site/viewarea";
$this->load->view("redirect",$data);
}
}
public function deletearea()
{
$access=array("1");
$this->checkaccess($access);
$this->area_model->delete($this->input->get("id"));
$data["redirect"]="site/viewarea";
$this->load->view("redirect",$data);
}
public function viewrequest()
{
$access=array("1");
$this->checkaccess($access);
$data['requeststatus']=$this->requeststatus_model->getrequeststatusdropdown();
$data['userto']=$this->user_model->getuserdropdown();
$data['userfrom']=$this->user_model->getuserdropdown();
$data["page"]="viewrequest";
$data["base_url"]=site_url("site/viewrequestjson");
$data["title"]="View request";
$this->load->view("template",$data);
}
function viewrequestjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`osb_request`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`osb_request`.`userfrom`";
$elements[1]->sort="1";
$elements[1]->header="User From";
$elements[1]->alias="userfrom";
$elements[2]=new stdClass();
$elements[2]->field="`osb_request`.`userto`";
$elements[2]->sort="1";
$elements[2]->header="User to";
$elements[2]->alias="userto";
$elements[3]=new stdClass();
$elements[3]->field="`osb_request`.`requeststatus`";
$elements[3]->sort="1";
$elements[3]->header="Request Status";
$elements[3]->alias="requeststatus";
$elements[4]=new stdClass();
$elements[4]->field="`osb_request`.`amount`";
$elements[4]->sort="1";
$elements[4]->header="Amount";
$elements[4]->alias="amount";
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
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `osb_request`");
$this->load->view("json",$data);
}

public function createrequest()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createrequest";
$data['requeststatus']=$this->requeststatus_model->getrequeststatusdropdown();
$data['userto']=$this->user_model->getuserdropdown();
$data['userfrom']=$this->user_model->getuserdropdown();
$data["title"]="Create request";
$this->load->view("template",$data);
}
public function createrequestsubmit() 
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("userfrom","User From","trim");
$this->form_validation->set_rules("userto","User to","trim");
$this->form_validation->set_rules("requeststatus","Request Status","trim");
$this->form_validation->set_rules("amount","Amount","trim");
$this->form_validation->set_rules("timestamp","Time stamp","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data['requeststatus']=$this->requeststatus_model->getrequeststatusdropdown();
$data['userto']=$this->user_model->getuserdropdown();
$data['userfrom']=$this->user_model->getuserdropdown();
$data["page"]="createrequest";
$data["title"]="Create request";
$this->load->view("template",$data);
}
else
{
$userfrom=$this->input->get_post("userfrom");
$userto=$this->input->get_post("userto");
$requeststatus=$this->input->get_post("requeststatus");
$amount=$this->input->get_post("amount");
$timestamp=$this->input->get_post("timestamp");
if($this->request_model->create($userfrom,$userto,$requeststatus,$amount,$timestamp)==0)
$data["alerterror"]="New request could not be created.";
else
$data["alertsuccess"]="request created Successfully.";
$data["redirect"]="site/viewrequest";
$this->load->view("redirect",$data);
}
}
public function editrequest()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="editrequest";
$data['requeststatus']=$this->requeststatus_model->getrequeststatusdropdown();
$data['userto']=$this->user_model->getuserdropdown();
$data['userfrom']=$this->user_model->getuserdropdown();
$data["title"]="Edit request";
$data["before"]=$this->request_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editrequestsubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("userfrom","User From","trim");
$this->form_validation->set_rules("userto","User to","trim");
$this->form_validation->set_rules("requeststatus","Request Status","trim");
$this->form_validation->set_rules("amount","Amount","trim");
$this->form_validation->set_rules("timestamp","Time stamp","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data['requeststatus']=$this->requeststatus_model->getrequeststatusdropdown();
$data['userto']=$this->user_model->getuserdropdown();
$data['userfrom']=$this->user_model->getuserdropdown();
$data["page"]="editrequest";
$data["title"]="Edit request";
$data["before"]=$this->request_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$userfrom=$this->input->get_post("userfrom");
$userto=$this->input->get_post("userto");
$requeststatus=$this->input->get_post("requeststatus");
$amount=$this->input->get_post("amount");
$timestamp=$this->input->get_post("timestamp");
if($this->request_model->edit($id,$userfrom,$userto,$requeststatus,$amount,$timestamp)==0)
$data["alerterror"]="New request could not be Updated.";
else
$data["alertsuccess"]="request Updated Successfully.";
$data["redirect"]="site/viewrequest";
$this->load->view("redirect",$data);
}
}
public function deleterequest()
{
$access=array("1");
$this->checkaccess($access);
$this->request_model->delete($this->input->get("id"));
$data["redirect"]="site/viewrequest";
$this->load->view("redirect",$data);
}
public function viewrequeststatus()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewrequeststatus";
$data["base_url"]=site_url("site/viewrequeststatusjson");
$data["title"]="View requeststatus";
$this->load->view("template",$data);
}
function viewrequeststatusjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`osb_requeststatus`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
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
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `osb_requeststatus`");
$this->load->view("json",$data);
}

public function createrequeststatus()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createrequeststatus";
$data["title"]="Create requeststatus";
$this->load->view("template",$data);
}
public function createrequeststatussubmit() 
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("name","Name","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createrequeststatus";
$data["title"]="Create requeststatus";
$this->load->view("template",$data);
}
else
{
$name=$this->input->get_post("name");
if($this->requeststatus_model->create($name)==0)
$data["alerterror"]="New requeststatus could not be created.";
else
$data["alertsuccess"]="requeststatus created Successfully.";
$data["redirect"]="site/viewrequeststatus";
$this->load->view("redirect",$data);
}
}
public function editrequeststatus()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="editrequeststatus";
$data["title"]="Edit requeststatus";
$data["before"]=$this->requeststatus_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editrequeststatussubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("name","Name","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editrequeststatus";
$data["title"]="Edit requeststatus";
$data["before"]=$this->requeststatus_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$name=$this->input->get_post("name");
if($this->requeststatus_model->edit($id,$name)==0)
$data["alerterror"]="New requeststatus could not be Updated.";
else
$data["alertsuccess"]="requeststatus Updated Successfully.";
$data["redirect"]="site/viewrequeststatus";
$this->load->view("redirect",$data);
}
}
public function deleterequeststatus()
{
$access=array("1");
$this->checkaccess($access);
$this->requeststatus_model->delete($this->input->get("id"));
$data["redirect"]="site/viewrequeststatus";
$this->load->view("redirect",$data);
}
public function viewtransaction()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewtransaction";
$data["base_url"]=site_url("site/viewtransactionjson");
$data["title"]="View transaction";
$this->load->view("template",$data);
}
function viewtransactionjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`osb_transaction`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`osb_transaction`.`userto`";
$elements[1]->sort="1";
$elements[1]->header="User to";
$elements[1]->alias="userto";
$elements[2]=new stdClass();
$elements[2]->field="`osb_transaction`.`userfrom`";
$elements[2]->sort="1";
$elements[2]->header="User From";
$elements[2]->alias="userfrom";
$elements[3]=new stdClass();
$elements[3]->field="`osb_transaction`.`transactionstatus`";
$elements[3]->sort="1";
$elements[3]->header="Transaction Status";
$elements[3]->alias="transactionstatus";
$elements[4]=new stdClass();
$elements[4]->field="`osb_transaction`.`amount`";
$elements[4]->sort="1";
$elements[4]->header="Amount";
$elements[4]->alias="amount";
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
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `osb_transaction`");
$this->load->view("json",$data);
}

public function createtransaction()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createtransaction";
$data['userto']=$this->user_model->getuserdropdown();
$data['userfrom']=$this->user_model->getuserdropdown();
$data['transactionstatus']=$this->transactionstatus_model->gettransactionstatusdropdown();
$data["title"]="Create transaction";
$this->load->view("template",$data);
}
public function createtransactionsubmit() 
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("userto","User to","trim");
$this->form_validation->set_rules("userfrom","User From","trim");
$this->form_validation->set_rules("transactionstatus","Transaction Status","trim");
$this->form_validation->set_rules("amount","Amount","trim");
$this->form_validation->set_rules("timestamp","Time stamp","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data['userto']=$this->user_model->getuserdropdown();
$data['userfrom']=$this->user_model->getuserdropdown();
$data['transactionstatus']=$this->transactionstatus_model->gettransactionstatusdropdown();
$data["page"]="createtransaction";
$data["title"]="Create transaction";
$this->load->view("template",$data);
}
else
{
$userto=$this->input->get_post("userto");
$userfrom=$this->input->get_post("userfrom");
$transactionstatus=$this->input->get_post("transactionstatus");
$amount=$this->input->get_post("amount");
$timestamp=$this->input->get_post("timestamp");
if($this->transaction_model->create($userto,$userfrom,$transactionstatus,$amount,$timestamp)==0)
$data["alerterror"]="New transaction could not be created.";
else
$data["alertsuccess"]="transaction created Successfully.";
$data["redirect"]="site/viewtransaction";
$this->load->view("redirect",$data);
}
}
public function edittransaction()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="edittransaction";
$data['userto']=$this->user_model->getuserdropdown();
$data['userfrom']=$this->user_model->getuserdropdown();
$data['transactionstatus']=$this->transactionstatus_model->gettransactionstatusdropdown();
$data["title"]="Edit transaction";
$data["before"]=$this->transaction_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function edittransactionsubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("userto","User to","trim");
$this->form_validation->set_rules("userfrom","User From","trim");
$this->form_validation->set_rules("transactionstatus","Transaction Status","trim");
$this->form_validation->set_rules("amount","Amount","trim");
$this->form_validation->set_rules("timestamp","Time stamp","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data['userto']=$this->user_model->getuserdropdown();
$data['userfrom']=$this->user_model->getuserdropdown();
$data['transactionstatus']=$this->transactionstatus_model->gettransactionstatusdropdown();
$data["page"]="edittransaction";
$data["title"]="Edit transaction";
$data["before"]=$this->transaction_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$userto=$this->input->get_post("userto");
$userfrom=$this->input->get_post("userfrom");
$transactionstatus=$this->input->get_post("transactionstatus");
$amount=$this->input->get_post("amount");
$timestamp=$this->input->get_post("timestamp");
if($this->transaction_model->edit($id,$userto,$userfrom,$transactionstatus,$amount,$timestamp)==0)
$data["alerterror"]="New transaction could not be Updated.";
else
$data["alertsuccess"]="transaction Updated Successfully.";
$data["redirect"]="site/viewtransaction";
$this->load->view("redirect",$data);
}
}
public function deletetransaction()
{
$access=array("1");
$this->checkaccess($access);
$this->transaction_model->delete($this->input->get("id"));
$data["redirect"]="site/viewtransaction";
$this->load->view("redirect",$data);
}
public function viewtransactionstatus()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewtransactionstatus";
$data["base_url"]=site_url("site/viewtransactionstatusjson");
$data["title"]="View transactionstatus";
$this->load->view("template",$data);
}
function viewtransactionstatusjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`osb_transactionstatus`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
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
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `osb_transactionstatus`");
$this->load->view("json",$data);
}

public function createtransactionstatus()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createtransactionstatus";
$data["title"]="Create transactionstatus";
$this->load->view("template",$data);
}
public function createtransactionstatussubmit() 
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("name","Name","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createtransactionstatus";
$data["title"]="Create transactionstatus";
$this->load->view("template",$data);
}
else
{
$name=$this->input->get_post("name");
if($this->transactionstatus_model->create($name)==0)
$data["alerterror"]="New transactionstatus could not be created.";
else
$data["alertsuccess"]="transactionstatus created Successfully.";
$data["redirect"]="site/viewtransactionstatus";
$this->load->view("redirect",$data);
}
}
public function edittransactionstatus()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="edittransactionstatus";
$data["title"]="Edit transactionstatus";
$data["before"]=$this->transactionstatus_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function edittransactionstatussubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("name","Name","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="edittransactionstatus";
$data["title"]="Edit transactionstatus";
$data["before"]=$this->transactionstatus_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$name=$this->input->get_post("name");
if($this->transactionstatus_model->edit($id,$name)==0)
$data["alerterror"]="New transactionstatus could not be Updated.";
else
$data["alertsuccess"]="transactionstatus Updated Successfully.";
$data["redirect"]="site/viewtransactionstatus";
$this->load->view("redirect",$data);
}
}
public function deletetransactionstatus()
{
$access=array("1");
$this->checkaccess($access);
$this->transactionstatus_model->delete($this->input->get("id"));
$data["redirect"]="site/viewtransactionstatus";
$this->load->view("redirect",$data);
}

}
?>
