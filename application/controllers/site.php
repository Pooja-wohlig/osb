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
        $data['activemenu'] = 'dashboard';
        $data['order']=$this->order_model->getPendingOrderCount();
        $data['product']=$this->product_model->getPendingProductCount();
        $data['paymentstatuscount']=$this->product_model->getPaymentStatusCount();
        $data['adminrequest']=$this->request_model->getPendingAdminRequestCount();
		$data[ 'title' ] = 'Welcome';
		$this->load->view( 'template', $data );
	}
	public function createuser()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$data['accesslevel']=$this->user_model->getaccesslevels();
		$data[ 'status' ] =$this->user_model->getstatusdropdown();
		$data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
		$data[ 'area' ] =$this->area_model->getareadropdown();
		$data[ 'onlinestatus' ] =$this->user_model->getonlinestatusdropdown();
		$data[ 'shopstatus' ] =$this->user_model->getshopstatusdropdown();
//        $data['category']=$this->category_model->getcategorydropdown();
		$data[ 'page' ] = 'createuser';
		$data[ 'title' ] = 'Create User';
		$this->load->view( 'template', $data );
	}
	function createusersubmit()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required|max_length[30]');
		$this->form_validation->set_rules('email','Email','trim');
		$this->form_validation->set_rules('password','Password','trim|required|max_length[6]');
			// $this->form_validation->set_rules('personalcontact','Personal Contact','trim|required|max_length[10]');
		$this->form_validation->set_rules('confirmpassword','Confirm Password','trim|required|matches[password]');
		$this->form_validation->set_rules('accesslevel','Accesslevel','trim|required');
		$this->form_validation->set_rules('status','status','trim|required');
		$this->form_validation->set_rules('area','area','trim|required');
		$this->form_validation->set_rules('shopname','shopname','trim|required');
		$this->form_validation->set_rules('membershipno','Membershipno','trim|required');
		$this->form_validation->set_rules('address','address','trim|required');
		$this->form_validation->set_rules('description','description','trim|required');
		$this->form_validation->set_rules('website','website','trim');
		$this->form_validation->set_rules('shopcontact1','shopcontact1','trim|required');
		$this->form_validation->set_rules('shopcontact2','shopcontact2','trim');
		$this->form_validation->set_rules('shopemail','shopemail','trim|required');
		$this->form_validation->set_rules('purchasebalance','purchasebalance','trim|required');
		$this->form_validation->set_rules('salesbalance','salesbalance','trim|required');
		$this->form_validation->set_rules('percentpayment','Percent Payment','trim|required');
		$this->form_validation->set_rules('billingaddress','Billing Address','trim|required');
		$this->form_validation->set_rules('billingcity','Billing City','trim|required');
		$this->form_validation->set_rules('billingstate','Billing State','trim|required');
		$this->form_validation->set_rules('billingcountry','Billing Country','trim|required');
		$this->form_validation->set_rules('billingpincode','Billing Pincode','trim|required|max_length[6]');
		$this->form_validation->set_rules('shippingaddress','Shipping Address','trim|required');
		$this->form_validation->set_rules('shippingcity','Shipping City','trim|required');
		$this->form_validation->set_rules('shippingstate','Shipping State','trim|required');
		$this->form_validation->set_rules('shippingcountry','Shippingcountry','trim|required');
		$this->form_validation->set_rules('shippingpincode','Shipping Pincode','trim|required|max_length[6]');
		$this->form_validation->set_rules('onlinestatus','Is New User','trim|required');
		$this->form_validation->set_rules('shopstatus','Shop Status','trim|required');
		$this->form_validation->set_rules('termsaccept','Terms Accepted','trim|required');
		$this->form_validation->set_rules('city','City','trim|required');

		if($this->form_validation->run() == FALSE)
		{
			$data['alerterror'] = validation_errors();
			$data['accesslevel']=$this->user_model->getaccesslevels();
            $data[ 'status' ] =$this->user_model->getstatusdropdown();
            $data[ 'area' ] =$this->area_model->getareadropdown();
			$data[ 'onlinestatus' ] =$this->user_model->getonlinestatusdropdown();
            $data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
			$data[ 'shopstatus' ] =$this->user_model->getshopstatusdropdown();

//            $data['category']=$this->category_model->getcategorydropdown();
            $data[ 'page' ] = 'createuser';
            $data[ 'title' ] = 'Create User';
            $this->load->view( 'template', $data );
		}
		else
		{
            $name=$this->input->post('name');
            $email=$this->input->post('email');
            $message=$this->input->post('message');
            $personalcontact=$this->input->post('personalcontact');
            $password=$this->input->post('password');
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
            $percentpayment=$this->input->post('percentpayment');
			$billingaddress=$this->input->post('billingaddress');
			$billingcity=$this->input->post('billingcity');
			$billingstate=$this->input->post('billingstate');
			$billingcountry=$this->input->post('billingcountry');
			$billingpincode=$this->input->post('billingpincode');
			$shippingaddress=$this->input->post('shippingaddress');
			$shippingcity=$this->input->post('shippingcity');
			$shippingcountry=$this->input->post('shippingcountry');
			$shippingstate=$this->input->post('shippingstate');
			$shippingpincode=$this->input->post('shippingpincode');
			$onlinestatus=$this->input->post('onlinestatus');
			$shopstatus=$this->input->post('shopstatus');
			$termsaccept=$this->input->post('termsaccept');
			$pan=$this->input->post('pan');
			$city=$this->input->post('city');
//            $category=$this->input->post('category');




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

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="shoplogo";
			$shoplogo="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$shoplogo=$uploaddata['file_name'];

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
                    $shoplogo=$this->image_lib->dest_image;
                    //return false;
                }

			}
					if(preg_match('/^\d{10}$/',$shopcontact1) && preg_match('/^\d{6}$/',$billingpincode) && preg_match('/^\d{6}$/',$shippingpincode)) // phone number is valid
						{
							$shopcontact1=$shopcontact1;
							if($this->user_model->create($termsaccept,$name,$email,$message,$personalcontact,$password,$accesslevel,$status,$socialid,$logintype,$image,$json,$shopname,$membershipno,$address,$description,$website,$shopcontact1,$shopcontact2,$shopemail,$purchasebalance,$salesbalance,$area,$shoplogo,$percentpayment,$billingaddress,$billingcity,$billingstate,$billingcountry,$billingpincode,$shippingaddress,$shippingcity,$shippingcountry,$shippingstate,$shippingpincode,$onlinestatus,$shopstatus,$pan,$city)==0)
							$data['alerterror']="New user could not be created.";
							else
							$data['alertsuccess']="User created Successfully.";
							$data['redirect']="site/viewusers";
							$this->load->view("redirect",$data);
						}else{
						$data['alerterror'] = "Contact no. / Mobile no. should be 10 digits and Pincode should be 6 digits";
							$data['accesslevel']=$this->user_model->getaccesslevels();
				            $data[ 'status' ] =$this->user_model->getstatusdropdown();
				            $data[ 'area' ] =$this->area_model->getareadropdown();
							$data[ 'onlinestatus' ] =$this->user_model->getonlinestatusdropdown();
				            $data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
							$data[ 'shopstatus' ] =$this->user_model->getshopstatusdropdown();

				//            $data['category']=$this->category_model->getcategorydropdown();
				            $data[ 'page' ] = 'createuser';
				            $data[ 'title' ] = 'Create User';
				            $this->load->view( 'template', $data );
						}

		   }
		   }
    function viewusers()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$data['page']='viewusers';
        $data['base_url'] = site_url("site/viewusersjson");
        $data['activemenu'] = 'users';
		$data['title']='View Users';
		$this->load->view('template',$data);
	}
    function viewusersjson()
	{
		$access = array("1","2");
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
        $elements[2]->field="`user`.`shopemail`";
        $elements[2]->sort="1";
        $elements[2]->header="Email";
        $elements[2]->alias="email";

        $elements[3]=new stdClass();
        $elements[3]->field="`user`.`accesslevel`";
        $elements[3]->sort="1";
        $elements[3]->header="Accesslevel";
        $elements[3]->alias="accesslevel";

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
		$access = array("1","2");
		$this->checkaccess($access);
		$data["page2"]="block/userblock";
		$data[ 'status' ] =$this->user_model->getstatusdropdown();
		$data['accesslevel']=$this->user_model->getaccesslevels();
		$data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
		 $data[ 'area' ] =$this->area_model->getareadropdown();
		$data[ 'onlinestatus' ] =$this->user_model->getonlinestatusdropdown();
		$data[ 'shopstatus' ] =$this->user_model->getshopstatusdropdown();
		$data['before']=$this->user_model->beforeedit($this->input->get('id'));
		$data['page']='edituser';
		$data['title']='Edit User';
		$this->load->view('templatewith2',$data);
	}
	function editusersubmit()
	{
		$access = array("1","2");
		$this->checkaccess($access);

		$this->form_validation->set_rules('name','Name','trim|required|max_length[30]');
		$this->form_validation->set_rules('email','Email','trim');
		$this->form_validation->set_rules('password','Password','trim');
			// $this->form_validation->set_rules('personalcontact','Personal Contact','trim|required|max_length[10]');
		$this->form_validation->set_rules('confirmpassword','Confirm Password','trim|matches[password]');
		$this->form_validation->set_rules('accesslevel','Accesslevel','trim');
		$this->form_validation->set_rules('status','status','trim|required');
		$this->form_validation->set_rules('area','area','trim|required');
		$this->form_validation->set_rules('shopname','shopname','trim|required');
		$this->form_validation->set_rules('membershipno','Membershipno','trim|required');
		$this->form_validation->set_rules('address','address','trim|required');
		$this->form_validation->set_rules('description','description','trim|required');
		$this->form_validation->set_rules('website','website','trim');
		$this->form_validation->set_rules('shopcontact1','shopcontact1','trim|required');
		$this->form_validation->set_rules('shopcontact2','shopcontact2','trim');
		$this->form_validation->set_rules('shopemail','shopemail','trim|required');
		$this->form_validation->set_rules('purchasebalance','purchasebalance','trim|required');
		$this->form_validation->set_rules('salesbalance','salesbalance','trim|required');
		$this->form_validation->set_rules('percentpayment','Percent Payment','trim|required');
		$this->form_validation->set_rules('billingaddress','Billing Address','trim|required');
		$this->form_validation->set_rules('billingcity','Billing City','trim|required');
		$this->form_validation->set_rules('billingstate','Billing State','trim|required');
		$this->form_validation->set_rules('billingcountry','Billing Country','trim|required');
		$this->form_validation->set_rules('billingpincode','Billing Pincode','trim|required|max_length[6]');
		$this->form_validation->set_rules('shippingaddress','Shipping Address','trim|required');
		$this->form_validation->set_rules('shippingcity','Shipping City','trim|required');
		$this->form_validation->set_rules('shippingstate','Shipping State','trim|required');
		$this->form_validation->set_rules('shippingcountry','Shippingcountry','trim|required');
		$this->form_validation->set_rules('shippingpincode','Shipping Pincode','trim|required|max_length[6]');
		$this->form_validation->set_rules('onlinestatus','Is New User','trim|required');
		$this->form_validation->set_rules('shopstatus','Shop Status','trim|required');
		$this->form_validation->set_rules('termsaccept','Terms Accepted','trim|required');
		$this->form_validation->set_rules('city','City','trim|required');
		if($this->form_validation->run() == FALSE)
		{
			$data['alerterror'] = validation_errors();
			$data[ 'status' ] =$this->user_model->getstatusdropdown();
			$data['accesslevel']=$this->user_model->getaccesslevels();
            $data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
			 $data[ 'area' ] =$this->area_model->getareadropdown();
			$data[ 'onlinestatus' ] =$this->user_model->getonlinestatusdropdown();
			$data[ 'shopstatus' ] =$this->user_model->getshopstatusdropdown();
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
            $message=$this->input->get_post('message');
            $personalcontact=$this->input->get_post('personalcontact');
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
            $percentpayment=$this->input->post('percentpayment');
			$billingaddress=$this->input->post('billingaddress');
			$billingcity=$this->input->post('billingcity');
			$billingstate=$this->input->post('billingstate');
			$billingcountry=$this->input->post('billingcountry');
			$billingpincode=$this->input->post('billingpincode');
			$shippingaddress=$this->input->post('shippingaddress');
			$shippingcity=$this->input->post('shippingcity');
			$shippingcountry=$this->input->post('shippingcountry');
			$shippingstate=$this->input->post('shippingstate');
			$shippingpincode=$this->input->post('shippingpincode');
			$onlinestatus=$this->input->post('onlinestatus');
			$shopstatus=$this->input->post('shopstatus');
				$termsaccept=$this->input->post('termsaccept');
				$pan=$this->input->post('pan');
				$city=$this->input->post('city');


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
//

			 $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="shoplogo";
			$shoplogo="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$shoplogo=$uploaddata['file_name'];

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

            if($shoplogo=="")
            {
            $shoplogo=$this->user_model->getuserimagebyid($id);
               // print_r($image);
                $shoplogo=$shoplogo->image;
            }
						if(preg_match('/^\d{10}$/',$shopcontact1) && preg_match('/^\d{6}$/',$billingpincode) && preg_match('/^\d{6}$/',$shippingpincode)) // phone number is valid
							{
								$shopcontact1 =$shopcontact1;
								if($this->user_model->edit($termsaccept,$id,$name,$email,$message,$personalcontact,$password,$accesslevel,$status,$socialid,$logintype,$image,$json,$shopname,$membershipno,$address,$description,$website,$shopcontact1,$shopcontact2,$shopemail,$purchasebalance,$salesbalance,$area,$shoplogo,$percentpayment,$billingaddress,$billingcity,$billingstate,$billingcountry,$billingpincode,$shippingaddress,$shippingcity,$shippingcountry,$shippingstate,$shippingpincode,$onlinestatus,$shopstatus,$pan,$city)==0)
								$data['alerterror']="User Editing was unsuccesful";
								else
								$data['alertsuccess']="User edited Successfully.";

								$data['redirect']="site/viewusers";
								//$data['other']="template=$template";
								$this->load->view("redirect",$data);

								// your other code here
							}
							else // phone number is not valid
							{
										$data['alerterror'] = "Contact no. / Mobile no. should be 10 digits and Pincode should be 6 digits";
										$data[ 'status' ] =$this->user_model->getstatusdropdown();
										$data['accesslevel']=$this->user_model->getaccesslevels();
													$data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
										 $data[ 'area' ] =$this->area_model->getareadropdown();
										$data[ 'onlinestatus' ] =$this->user_model->getonlinestatusdropdown();
										$data[ 'shopstatus' ] =$this->user_model->getshopstatusdropdown();
										$data['before']=$this->user_model->beforeedit($this->input->post('id'));
										$data['page']='edituser';
							//			$data['page2']='block/userblock';
										$data['title']='Edit User';
										$this->load->view('template',$data);
							}


		}
	}

	function deleteuser()
	{
		$access = array("1","2");
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
		$access = array("1","2");
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
$access=array("1","2");
$this->checkaccess($access);
$data["page"]="viewshopproductphoto";
$data["userid"]=$this->input->get('id');
$userid=$this->input->get('id');
$data["base_url"]=site_url("site/viewshopproductphotojson?id=".$userid);
$data["title"]="View shopproductphoto";
$this->load->view("template",$data);
}
function viewshopproductphotojson()
{
$userid=$this->input->get('id');
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
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `osb_shopproductphoto` LEFT OUTER JOIN `user` ON `user`.`id`=`osb_shopproductphoto`.`user`","WHERE `osb_shopproductphoto`.`user`='$userid'");
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
$access=array("1","2");
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
if($this->shopproductphoto_model->create($user,$photo)==0)
$data["alerterror"]="New shopproductphoto could not be created.";
else
$data["alertsuccess"]="shopproductphoto created Successfully.";
	$userid=$this->input->get('id');
$data["redirect"]="site/viewshopproductphoto?id=".$userid;
$this->load->view("redirect2",$data);
}
}
public function editshopproductphoto()
{
	$access=array("1","2");
$this->checkaccess($access);
$data["page"]="editshopproductphoto";
$data['user']=$this->shopproductphoto_model->getuserdropdown();
$data['userid']=$this->input->get('id');
$data['prodid']=$this->input->get('prodid');
$data["title"]="Edit shopproductphoto";
$data["before"]=$this->shopproductphoto_model->beforeedit($this->input->get("prodid"));
$this->load->view("template",$data);
}
public function editshopproductphotosubmit()
{
$access=array("1","2");
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
 $data['userid']=$this->input->post('user');
 $data['prodid']=$this->input->post('id');
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
if($this->shopproductphoto_model->edit($id,$user,$photo)==0)
$data["alerterror"]="New shopproductphoto could not be Updated.";
else
$data["alertsuccess"]="shopproductphoto Updated Successfully.";
$data["redirect"]="site/viewshopproductphoto?id=".$user;
$this->load->view("redirect2",$data);

}
}
public function deleteshopproductphoto()
{
$access=array("1","2");
$this->checkaccess($access);
$this->shopproductphoto_model->delete($this->input->get("prodid"));
$data["redirect"]="site/viewshopproductphoto?id=".$this->input->get('id');
$this->load->view("redirect2",$data);
}

public function viewshopphoto()
{
$access=array("1","2");
$this->checkaccess($access);
$data["page"]="viewshopphoto";
$data['userid']=$this->input->get('id');
$data['before']=$this->user_model->beforeedit($this->input->get('id'));
$userid=$this->input->get('id');
//	echo $userid;
$data["base_url"]=site_url("site/viewshopphotojson?id=".$userid);
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
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `osb_shopphoto` LEFT OUTER JOIN `user` ON `user`.`id`=`osb_shopphoto`.`user`","WHERE `osb_shopphoto`.`user`='$userid'");
$this->load->view("json",$data);
}
//
public function createshopphoto()
{
$access=array("1","2");
$this->checkaccess($access);
$data["page"]="createshopphoto";
$data['user']=$this->shopproductphoto_model->getuserdropdown();
//$data['userid']=$this->input->get('id');
$data["title"]="Create shopphoto";
$this->load->view("template",$data);
}
public function createshopphotosubmit()
{
$access=array("1","2");
$this->checkaccess($access);
$this->form_validation->set_rules("user","User","trim");
//$this->form_validation->set_rules("photo","Photo","trim");
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
//	echo $user;
//	echo $photo;
if($this->shopphoto_model->create($user,$photo)==0)
$data["alerterror"]="New shopphoto could not be created.";
else
$data["alertsuccess"]="shopphoto created Successfully.";
	$userid=$this->input->get('id');
$data["redirect"]="site/viewshopphoto?id=".$userid;
$this->load->view("redirect2",$data);
}
}

public function editshopphoto()
{
$access=array("1","2");
$this->checkaccess($access);
$data["page"]="editshopphoto";
$data['user']=$this->shopproductphoto_model->getuserdropdown();
$data['userid']=$this->input->get('id');
$data['shopid']=$this->input->get('shopid');
$data["title"]="Edit shopphoto";
$data["before"]=$this->shopphoto_model->beforeedit($this->input->get("shopid"));
$this->load->view("template",$data);
}
public function editshopphotosubmit()
{
$access=array("1","2");
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
   $data['userid']=$this->input->post('user');
 $data['shopid']=$this->input->post('id');
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
$this->load->view("redirect2",$data);
}
}
public function deleteshopphoto()
{
$access=array("1","2");
$this->checkaccess($access);
//		   $data['userid']=$this->input->get('id');
//        $data['shopphotoid']=$this->input->get('shopphotoid');
$this->shopphoto_model->delete($this->input->get("shopid"));
$data["redirect"]="site/viewshopphoto?id=".$this->input->get('id');
$this->load->view("redirect2",$data);
}

//	user_category-------------------------------------------------------------------------------------------------------------------------

	public function viewusercategory()
{
$access=array("1","2");
$this->checkaccess($access);
$data["page"]="viewusercategory";
$data['userid']=$this->input->get('id');
$data['before']=$this->user_model->beforeedit($this->input->get('id'));
$userid=$this->input->get('id');
$data['activemenu'] = 'user category';
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
$elements[1]->field="`user`.`name`";
$elements[1]->sort="1";
$elements[1]->header="User";
$elements[1]->alias="user";
$elements[2]=new stdClass();
$elements[2]->field="`osb_category`.`name`";
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
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `usercategory` LEFT OUTER JOIN `user` ON `usercategory`.`user`=`user`.`id` LEFT OUTER JOIN `osb_category` ON `usercategory`.`category`=`osb_category`.`id`","WHERE `usercategory`.`user` ='$userid'");
$this->load->view("json",$data);
}

public function createusercategory()
{
$access=array("1","2");
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
$access=array("1","2");
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
$data["redirect"]="site/viewusercategory?id=".$user;
$this->load->view("redirect2",$data);
}
}

public function editusercategory()
{
$access=array("1","2");
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
$access=array("1","2");
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
$access=array("1","2");
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
$access=array("1","2");
$this->checkaccess($access);
$data["page"]="viewcategory";
$data['activemenu'] = 'category';
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
$elements[2]->field="`statuses`.`name`";
$elements[2]->sort="1";
$elements[2]->header="Status";
$elements[2]->alias="status";
$elements[3]=new stdClass();
$elements[3]->field="`osb_category`.`name`";
$elements[3]->sort="1";
$elements[3]->header="Name";
$elements[3]->alias="name";
$elements[4]=new stdClass();
$elements[4]->field="`tab1`.`name`";
$elements[4]->sort="1";
$elements[4]->header="Parent";
$elements[4]->alias="parent";
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
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `osb_category` LEFT OUTER JOIN `osb_category` as `tab1` ON `osb_category`.`parent`=`tab1`.`id`  LEFT OUTER JOIN `statuses` ON `osb_category`.`status`=`statuses`.`id`");

//	SELECT a.column_name, b.column_name...
//FROM table1 a, table1 b
//WHERE a.common_field = b.common_field;
$this->load->view("json",$data);
}

public function createcategory()
{
$access=array("1","2");
$this->checkaccess($access);
$data["page"]="createcategory";
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data[ 'parent' ] =$this->category_model->getparentdropdown();
$data["title"]="Create category";
$this->load->view("template",$data);
}
public function createcategorysubmit()
{
$access=array("1","2");
$this->checkaccess($access);
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("name","Name","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data[ 'status' ] =$this->user_model->getstatusdropdown();
	$data[ 'parent' ] =$this->category_model->getparentdropdown();
$data["page"]="createcategory";
$data["title"]="Create category";
$this->load->view("template",$data);
}
else
{
$order=$this->input->get_post("order");
$status=$this->input->get_post("status");
$name=$this->input->get_post("name");
$parent=$this->input->get_post("parent");
if($this->category_model->create($order,$status,$name,$parent)==0)
$data["alerterror"]="New category could not be created.";
else
$data["alertsuccess"]="category created Successfully.";
$data["redirect"]="site/viewcategory";
$this->load->view("redirect",$data);
}
}
public function editcategory()
{
$access=array("1","2");
$this->checkaccess($access);
$data["page"]="editcategory";
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data[ 'parent' ] =$this->category_model->getparentdropdown();
$data["title"]="Edit category";
$data["before"]=$this->category_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editcategorysubmit()
{
$access=array("1","2");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("name","Name","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data[ 'parent' ] =$this->category_model->getparentdropdown();
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
$parent=$this->input->get_post("parent");
if($this->category_model->edit($id,$order,$status,$name,$parent)==0)
$data["alerterror"]="New category could not be Updated.";
else
$data["alertsuccess"]="category Updated Successfully.";
$data["redirect"]="site/viewcategory";
$this->load->view("redirect",$data);
}
}
public function deletecategory()
{
$access=array("1","2");
$this->checkaccess($access);
$this->category_model->delete($this->input->get("id"));
$data["redirect"]="site/viewcategory";
$this->load->view("redirect",$data);
}

public function viewarea()
{
$access=array("1","2");
$this->checkaccess($access);
$data["page"]="viewarea";
$data['activemenu'] = 'area';
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
$elements[2]->field="`statuses`.`name`";
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
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `osb_area` LEFT OUTER JOIN `statuses` ON `osb_area`.`status`=`statuses`.`id` ");
$this->load->view("json",$data);
}

public function createarea()
{
$access=array("1","2");
$this->checkaccess($access);
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["page"]="createarea";
$data["title"]="Create area";
$this->load->view("template",$data);
}
public function createareasubmit()
{
$access=array("1","2");
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
$access=array("1","2");
$this->checkaccess($access);
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["page"]="editarea";
$data["title"]="Edit area";
$data["before"]=$this->area_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editareasubmit()
{
$access=array("1","2");
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
$access=array("1","2");
$this->checkaccess($access);
$this->area_model->delete($this->input->get("id"));
$data["redirect"]="site/viewarea";
$this->load->view("redirect",$data);
}
	////////////////////////////////////////////////////////////////////////////////////////////////////////////

	//ADMIN REQUESTS

	public function viewrequestadmin()
{
$access=array("1","2");
$this->checkaccess($access);
$data['isadmin']=1;
$data['activemenu'] = 'admin requests';
$data['requeststatus']=$this->requeststatus_model->getrequeststatusdropdown();
$data['userto']=$this->user_model->getuserdropdown();
$data['userfrom']=$this->user_model->getuserdropdown();
$data["page"]="viewrequest";
$data["base_url"]=site_url("site/viewrequestadminjson");
$data["title"]="View request";
$this->load->view("template",$data);
}
function viewrequestadminjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`osb_request`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements[1]=new stdClass();
$elements[1]->field="`tab2`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Seller";
$elements[1]->alias="userfrom";

$elements[2]=new stdClass();
$elements[2]->field="`tab1`.`shopname`";
$elements[2]->sort="1";
$elements[2]->header="Buyer";
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
$elements[5]->field="ADDTIME(`osb_request`.`timestamp`,'0 05:30:00')";
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
$orderorder="DESC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `osb_request` LEFT OUTER JOIN `user` as `tab1` ON `tab1`.`id`=`osb_request`.`userto` LEFT OUTER JOIN `user` as `tab2` ON `tab2`.`id`=`osb_request`.`userfrom`","WHERE `osb_request`.`userfrom`=1 ");
$this->load->view("json",$data);
}



	//ADMIN REQUESTS END
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function viewrequest()
{
$access=array("1","2");
$this->checkaccess($access);
$data['isadmin']=2;
$data['requeststatus']=$this->requeststatus_model->getrequeststatusdropdown();
$data['userto']=$this->user_model->getuserdropdown();
$data['userfrom']=$this->user_model->getuserdropdown();
$data["page"]="viewrequest";
$data['activemenu'] = 'user requests';
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
$elements[1]->field="`tab2`.`shopname`";
$elements[1]->sort="1";
$elements[1]->header="Buyer";
$elements[1]->alias="userfrom";
$elements[2]=new stdClass();
$elements[2]->field="`tab1`.`shopname`";
$elements[2]->sort="1";
$elements[2]->header="Seller";
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
$elements[5]->field="`osb_request`.`reason`";
$elements[5]->sort="1";
$elements[5]->header="Reason";
$elements[5]->alias="reason";
$elements[6]=new stdClass();
$elements[6]->field="ADDTIME(`osb_request`.`timestamp`,'0 05:30:00')";
$elements[6]->sort="1";
$elements[6]->header="Time stamp";
$elements[6]->alias="timestamp";
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
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `osb_request` LEFT OUTER JOIN `user` as `tab1` ON `tab1`.`id`=`osb_request`.`userto` LEFT OUTER JOIN `user` as `tab2` ON `tab2`.`id`=`osb_request`.`userfrom`","WHERE `osb_request`.`userfrom`<>1  ");
$this->load->view("json",$data);
}

public function createrequest()
{
$access=array("1","2");
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
$access=array("1","2");
$this->checkaccess($access);
$this->form_validation->set_rules("userfrom","User From","trim");
$this->form_validation->set_rules("userto","User to","trim");
$this->form_validation->set_rules("requeststatus","Request Status","trim");
$this->form_validation->set_rules("amount","Amount","trim");
$this->form_validation->set_rules("reason","Reason","trim");
$this->form_validation->set_rules("approvalreason","Approval Reason","trim");
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
$reason=$this->input->get_post("reason");
$approvalreason=$this->input->get_post("approvalreason");
$timestamp=$this->input->get_post("timestamp");
if($this->request_model->create($userfrom,$userto,$requeststatus,$amount,$reason,$approvalreason,$timestamp)==0)
$data["alerterror"]="New request could not be created.";
else
$data["alertsuccess"]="request created Successfully.";
$data["redirect"]="site/viewrequest";
$this->load->view("redirect",$data);
}
}
public function editrequest()
{
$access=array("1","2");
$this->checkaccess($access);
$data["page"]="editrequest";
$data['requeststatus']=$this->requeststatus_model->getrequeststatusdropdown();
    $data['paymentstatus']=$this->requeststatus_model->getpaymentstatusdropdown();
$data["title"]="Edit request";
$data["before"]=$this->request_model->beforeedit($this->input->get("id"));
$data['userto']=$this->user_model->getuserdropdown();
$data['userfrom']=$this->user_model->getuserdropdown();
    $userfromid=$data['before']->userfrom;
    $usertoid=$data['before']->userto;
        $data['usertoname']=$this->user_model->getname($usertoid);
        $data['userfromname']=$this->user_model->getname($userfromid);

$this->load->view("template",$data);
}
public function editrequestsubmit()
{
$access=array("1","2");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("userfrom","User From","trim");
$this->form_validation->set_rules("userto","User to","trim");
$this->form_validation->set_rules("requeststatus","Request Status","trim");
$this->form_validation->set_rules("amount","Amount","trim");
$this->form_validation->set_rules("reason","Reason","trim");
$this->form_validation->set_rules("approvalreason","Approval Reason","trim");
$this->form_validation->set_rules("timestamp","Time stamp","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data['requeststatus']=$this->requeststatus_model->getrequeststatusdropdown();
$data['paymentstatus']=$this->requeststatus_model->getpaymentstatusdropdown();
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
$reason=$this->input->get_post("reason");
$approvalreason=$this->input->get_post("approvalreason");
$paymentstatus=$this->input->get_post("paymentstatus");
$timestamp=$this->input->get_post("timestamp");
//    print_r($_POST);
	if($requeststatus=="3" && $userfrom=="1"){
	$this->user_model->sendnotification("Your request is rejected by admin of amount:$amount",$userto);
	$message="Your request is rejected by admin of amount".$amount;
    $this->user_model->addnotificationtodb($message,$userto);
	}
	if($requeststatus=="2" && $userfrom=="1"){
	$this->transaction_model->adminaccept($amount,$userto,$userfrom,$id);
	}
if($this->request_model->edit($id,$userfrom,$userto,$requeststatus,$amount,$reason,$approvalreason,$timestamp,$paymentstatus)==0)
$data["alerterror"]="New request could not be Updated.";
else
$data["alertsuccess"]="request Updated Successfully.";
$data["redirect"]="site/viewrequest";
$this->load->view("redirect",$data);

}
}
public function deleterequest()
{
$access=array("1","2");
$this->checkaccess($access);
$this->request_model->delete($this->input->get("id"));
$data["redirect"]="site/viewrequest";
$this->load->view("redirect",$data);
}
public function viewrequeststatus()
{
$access=array("1","2");
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
$access=array("1","2");
$this->checkaccess($access);
$data["page"]="createrequeststatus";
$data["title"]="Create requeststatus";
$this->load->view("template",$data);
}
public function createrequeststatussubmit()
{
$access=array("1","2");
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
$access=array("1","2");
$this->checkaccess($access);
$data["page"]="editrequeststatus";
$data["title"]="Edit requeststatus";
$data["before"]=$this->requeststatus_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editrequeststatussubmit()
{
$access=array("1","2");
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
$access=array("1","2");
$this->checkaccess($access);
$this->requeststatus_model->delete($this->input->get("id"));
$data["redirect"]="site/viewrequeststatus";
$this->load->view("redirect",$data);
}
public function viewtransaction()
{
$access=array("1","2");
$this->checkaccess($access);
$data["page"]="viewtransactionuser";
$sd=$this->input->get_post("sd");
$ed=$this->input->get_post("ed");
    $data['activemenu'] = 'user transactions';
	$data['sd']=$sd;
	$data['ed']=$ed;
$data["base_url"]=site_url("site/viewtransactionjson?sd=".$sd."&ed=".$ed);
$data["title"]="View transaction user";
$this->load->view("template",$data);
}
function viewtransactionjson()
{
	$sd=$this->input->get_post("sd");
    $ed=$this->input->get_post("ed");
	$where="";
	if($sd!="" && $ed!="")
	{
	$where.=" AND `osb_transaction`.`timestamp` BETWEEN '$sd' AND '$ed'";
	}
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="CONCAT(LPAD(`osb_transaction`.`id`,6,0))";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements[1]=new stdClass();
$elements[1]->field="`tab1`.`shopname`";
$elements[1]->sort="1";
$elements[1]->header="Seller";
$elements[1]->alias="userto";

$elements[2]=new stdClass();
$elements[2]->field="`tab2`.`shopname`";
$elements[2]->sort="1";
$elements[2]->header="Buyer";
$elements[2]->alias="userfrom";

//$elements[3]=new stdClass();
//$elements[3]->field="`osb_transactionstatus`.`name`";
//$elements[3]->sort="1";
//$elements[3]->header="Transaction Status";
//$elements[3]->alias="transactionstatus";

$elements[3]=new stdClass();
$elements[3]->field="`osb_transaction`.`reason`";
$elements[3]->sort="1";
$elements[3]->header="Reason";
$elements[3]->alias="reason";

$elements[4]=new stdClass();
$elements[4]->field="`osb_transaction`.`amount`";
$elements[4]->sort="1";
$elements[4]->header="Barter Amount";
$elements[4]->alias="amount";

$elements[5]=new stdClass();
$elements[5]->field="`osb_transaction`.`payableamount`";
$elements[5]->sort="1";
$elements[5]->header="Barter Amount";
$elements[5]->alias="payableamount";

$elements[6]=new stdClass();
$elements[6]->field="ADDTIME(`osb_transaction`.`timestamp`,'0 05:30:00')";
$elements[6]->sort="1";
$elements[6]->header="Time stamp";
$elements[6]->alias="timestamp";
//$elements[6]=new stdClass();
//$elements[6]->field="`user`.`name`";
//$elements[6]->sort="1";
//$elements[6]->header="Name";
//$elements[6]->alias="userfrom";
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
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `osb_transaction` LEFT OUTER JOIN `user` as `tab1` ON `tab1`.`id`=`osb_transaction`.`userto` LEFT OUTER JOIN `user` as `tab2` ON `tab2`.`id`=`osb_transaction`.`userfrom`","WHERE `osb_transaction`.`userfrom`!=1 $where");
$this->load->view("json",$data);
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


	//ADMIN TRANSACTIONS

	public function viewtransactionadmin()
{
$access=array("1","2");
$this->checkaccess($access);
$data["page"]="viewtransaction";
$sd=$this->input->get_post("sd");
$ed=$this->input->get_post("ed");
$data['sd']=$sd;
$data['ed']=$ed;
$data['activemenu'] = 'admin transactions';
$data["base_url"]=site_url("site/viewtransactionadminjson?sd=".$sd."&ed=".$ed);
$data["title"]="View transaction";
$this->load->view("template",$data);
}
function viewtransactionadminjson()
{
$sd=$this->input->get_post("sd");
$ed=$this->input->get_post("ed");
$where="";
	if($sd!="" && $ed!="")
	{
	$where.=" AND `osb_transaction`.`timestamp` BETWEEN '$sd' AND '$ed'";
	}
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="CONCAT(LPAD(`osb_transaction`.`id`,6,0))";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements[1]=new stdClass();
$elements[1]->field="`tab1`.`membershipno`";
$elements[1]->sort="1";
$elements[1]->header="Buyer";
$elements[1]->alias="userto";

$elements[2]=new stdClass();
$elements[2]->field="`tab2`.`name`";
$elements[2]->sort="1";
$elements[2]->header="Seller";
$elements[2]->alias="userfrom";

//$elements[3]=new stdClass();
//$elements[3]->field="`osb_transactionstatus`.`name`";
//$elements[3]->sort="1";
//$elements[3]->header="Transaction Status";
//$elements[3]->alias="transactionstatus";

$elements[3]=new stdClass();
$elements[3]->field="`osb_transaction`.`reason`";
$elements[3]->sort="1";
$elements[3]->header="Reason";
$elements[3]->alias="reason";

$elements[4]=new stdClass();
$elements[4]->field="`osb_transaction`.`amount`";
$elements[4]->sort="1";
$elements[4]->header="Cash Amount";
$elements[4]->alias="amount";

$elements[5]=new stdClass();
$elements[5]->field="`osb_transaction`.`payableamount`";
$elements[5]->sort="1";
$elements[5]->header="Barter Amount";
$elements[5]->alias="payableamount";

$elements[6]=new stdClass();
$elements[6]->field="ADDTIME(`osb_transaction`.`timestamp`,'0 05:30:00')";
$elements[6]->sort="1";
$elements[6]->header="Time stamp";
$elements[6]->alias="timestamp";
//$elements[6]=new stdClass();
//$elements[6]->field="`user`.`name`";
//$elements[6]->sort="1";
//$elements[6]->header="Name";
//$elements[6]->alias="userfrom";
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
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `osb_transaction` LEFT OUTER JOIN `user` as `tab1` ON `tab1`.`id`=`osb_transaction`.`userto` LEFT OUTER JOIN `user` as `tab2` ON `tab2`.`id`=`osb_transaction`.`userfrom`","WHERE `osb_transaction`.`userfrom`=1 $where");
$this->load->view("json",$data);
}

	//ADMIN TRANSACTIONS END

	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function createtransaction()
{
$access=array("1","2");
$this->checkaccess($access);
$data["page"]="createtransaction";
$data['userto']=$this->user_model->getuserdropdown();
$data['userfrom']=$this->user_model->getuserdropdown();
//$data['transactionstatus']=$this->transactionstatus_model->gettransactionstatusdropdown();
$data["title"]="Create transaction";
$this->load->view("template",$data);
}
public function createtransactionsubmit()
{
$access=array("1","2");
$this->checkaccess($access);
$this->form_validation->set_rules("userto","User to","trim");
$this->form_validation->set_rules("userfrom","User From","trim");
//$this->form_validation->set_rules("transactionstatus","Transaction Status","trim");
$this->form_validation->set_rules("amount","Amount","trim");
$this->form_validation->set_rules("reason","Reason","trim");
$this->form_validation->set_rules("payableamount","Payable Amount","trim");
//$this->form_validation->set_rules("timestamp","Time stamp","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data['userto']=$this->user_model->getuserdropdown();
$data['userfrom']=$this->user_model->getuserdropdown();
//$data['transactionstatus']=$this->transactionstatus_model->gettransactionstatusdropdown();
$data["page"]="createtransaction";
$data["title"]="Create transaction";
$this->load->view("template",$data);
}
else
{
$userto=$this->input->get_post("userto");
$userfrom=$this->input->get_post("userfrom");
//$transactionstatus=$this->input->get_post("transactionstatus");
$amount=$this->input->get_post("amount");
$reason=$this->input->get_post("reason");
$payableamount=$this->input->get_post("payableamount");
$timestamp=$this->input->get_post("timestamp");
if($this->transaction_model->create($userto,$userfrom,$reason,$amount,$payableamount,$timestamp)==0)
$data["alerterror"]="New transaction could not be created.";
else
$data["alertsuccess"]="transaction created Successfully.";
$data["redirect"]="site/viewtransaction";
$this->load->view("redirect",$data);
}
}
public function edittransaction()
{
$access=array("1","2");
$this->checkaccess($access);
$data["page"]="edittransaction";
//$data['userfrom']=$this->user_model->getuserdropdown();
//$data['transactionstatus']=$this->transactionstatus_model->gettransactionstatusdropdown();
    $data['userto']=$this->user_model->getuserdropdown();
$data['userfrom']=$this->user_model->getuserdropdown();

$data["title"]="Edit transaction";
$data["before"]=$this->transaction_model->beforeedit($this->input->get("id"));
     $userfromid=$data['before']->userfrom;
    $usertoid=$data['before']->userto;
        $data['usertoname']=$this->user_model->getname($usertoid);
        $data['userfromname']=$this->user_model->getname($userfromid);
//$userto=$data["before"]->userto;
//   // if admin
//  $userfrom=$data["before"]->userfrom;
//    if($userfrom==1)
//    {
//         $data['userto']=$this->user_model->getmembershipno($userto);
//    }
//    else
//    {
//        $data['userto']=$this->user_model->getuserdropdown();
//    }
$this->load->view("template",$data);
}
public function edittransactionsubmit()
{
$access=array("1","2");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("userto","User to","trim");
$this->form_validation->set_rules("userfrom","User From","trim");
//$this->form_validation->set_rules("transactionstatus","Transaction Status","trim");
$this->form_validation->set_rules("amount","Amount","trim");
$this->form_validation->set_rules("reason","Reason","trim");
$this->form_validation->set_rules("payableamount","Payable Amount","trim");
$this->form_validation->set_rules("timestamp","Time stamp","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data['userto']=$this->user_model->getuserdropdown();
$data['userfrom']=$this->user_model->getuserdropdown();
//$data['transactionstatus']=$this->transactionstatus_model->gettransactionstatusdropdown();
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
//$transactionstatus=$this->input->get_post("transactionstatus");
$amount=$this->input->get_post("amount");
$reason=$this->input->get_post("reason");
$payableamount=$this->input->get_post("payableamount");
$timestamp=$this->input->get_post("timestamp");
if($this->transaction_model->edit($id,$userto,$userfrom,$amount,$reason,$payableamount,$timestamp)==0)
$data["alerterror"]="New transaction could not be Updated.";
else
$data["alertsuccess"]="transaction Updated Successfully.";
$data["redirect"]="site/viewtransaction";
$this->load->view("redirect",$data);
}
}
public function deletetransaction()
{
$access=array("1","2");
$this->checkaccess($access);
$this->transaction_model->delete($this->input->get("id"));
$data["redirect"]="site/viewtransaction";
$this->load->view("redirect",$data);
}
public function viewtransactionstatus()
{
$access=array("1","2");
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
$access=array("1","2");
$this->checkaccess($access);
$data["page"]="createtransactionstatus";
$data["title"]="Create transactionstatus";
$this->load->view("template",$data);
}
public function createtransactionstatussubmit()
{
$access=array("1","2");
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
$access=array("1","2");
$this->checkaccess($access);
$data["page"]="edittransactionstatus";
$data["title"]="Edit transactionstatus";
$data["before"]=$this->transactionstatus_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function edittransactionstatussubmit()
{
$access=array("1","2");
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
$access=array("1","2");
$this->checkaccess($access);
$this->transactionstatus_model->delete($this->input->get("id"));
$data["redirect"]="site/viewtransactionstatus";
$this->load->view("redirect",$data);
}




    //Changes By Avinash
    //product
    public function viewproduct()
    {
        $access=array("1","2");
        $this->checkaccess($access);
        $data['count']=$this->product_model->getcount();
        $data["page"]="viewproduct";
        $data['activemenu'] = 'user product';
        $data["base_url"]=site_url("site/viewproductjson");
        $data["title"]="View product";
        $this->load->view("template",$data);
    }
    function viewproductjson()
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

        $elements[6]=new stdClass();
        $elements[6]->field="`product`.`moderated`";
        $elements[6]->sort="1";
        $elements[6]->header="Moderated";
        $elements[6]->alias="moderated";

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
            $orderorder="DESC";
        }
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `product`");
        $this->load->view("json",$data);
    }

	public function createproduct()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$data[ 'status' ] =$this->product_model->getstatusdropdown();
		$data[ 'user' ] =$this->user_model->getuserdropdown();
		$data['category']=$this->product_model->getcategorydropdown();
		$data[ 'onlinestatus' ] =$this->user_model->getonlinestatusdropdown();
		$data[ 'moderated' ] =$this->user_model->getmoderateddropdown();
		$data[ 'page' ] = 'createproduct';
		$data[ 'title' ] = 'Create product';
		$this->load->view( 'template', $data );
	}
	function createproductsubmit()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('sku','sku','trim|');
		$this->form_validation->set_rules('status','status','trim|');
		$this->form_validation->set_rules('description','description','trim|');
		$this->form_validation->set_rules('price','price','trim|');
		$this->form_validation->set_rules('quantity','quantity','trim|');
		if($this->form_validation->run() == FALSE)
		{
			$data['alerterror'] = validation_errors();
			$data[ 'status' ] =$this->product_model->getstatusdropdown();
			$data['category']=$this->product_model->getcategorydropdown();
			$data[ 'onlinestatus' ] =$this->user_model->getonlinestatusdropdown();
            $data[ 'user' ] =$this->user_model->getuserdropdown();
            $data[ 'moderated' ] =$this->user_model->getmoderateddropdown();
			$data[ 'page' ] = 'createproduct';
			$data[ 'title' ] = 'Create product';
			$this->load->view('template',$data);
		}
		else
		{
			$name=$this->input->post('name');
			$sku=$this->input->post('sku');
			$status=$this->input->post('status');
			$description=$this->input->post('description');
			$price=$this->input->post('price');
			$category=$this->input->post('category');
			$user=$this->input->post('user');
			$quantity=$this->input->post('quantity');
			$onlinestatus=$this->input->post('onlinestatus');
			$moderated=$this->input->post('moderated');

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

			$productid=$this->product_model->createproduct($name,$sku,$description,$price,$status,$category,$user,$quantity,$image,$onlinestatus,$moderated);
            if($productid==0)
			$data['alerterror']="New product could not be created.";
			else
			$data['alertsuccess']="product  created Successfully.";
			$data['redirect']="site/viewproduct";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}

//	function viewproduct()
//	{
//		$access = array("1","2");
//		$this->checkaccess($access);
//        $data['table']=$this->product_model->viewproduct();
//		$data['page']='viewproduct';
//		$data['title']='View product';
//        $this->load->view('template',$data);
//	}

	function editproduct()
	{
		$access = array("2","1");
		$this->checkaccess($access);
		$data[ 'user' ] =$this->user_model->getuserdropdown();
		$data['before']=$this->product_model->beforeeditproduct($this->input->get('id'));
		$data[ 'status' ] =$this->product_model->getstatusdropdown();
		$data['category']=$this->product_model->getcategorydropdown();
		$data[ 'onlinestatus' ] =$this->user_model->getonlinestatusdropdown();
        $data[ 'moderated' ] =$this->user_model->getmoderateddropdown();
		$data['page']='editproduct';
		$data['page2']='block/productblock';
		$data['title']='Edit product';
		$this->load->view('templatewith2',$data);
	}
	function editproductsubmit()
	{
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('sku','sku','trim|');
		$this->form_validation->set_rules('status','status','trim|');
		$this->form_validation->set_rules('description','description','trim|');
		$this->form_validation->set_rules('price','price','trim|');
		$this->form_validation->set_rules('quantity','quantity','trim|');

		if($this->form_validation->run() == FALSE)
		{
			$data['alerterror'] = validation_errors();
			$data[ 'status' ] =$this->product_model->getstatusdropdown();
			$data['category']=$this->product_model->getcategorydropdown();
            $data[ 'user' ] =$this->user_model->getuserdropdown();
            $data[ 'moderated' ] =$this->user_model->getmoderateddropdown();
			$data[ 'onlinestatus' ] =$this->user_model->getonlinestatusdropdown();
			$data['before']=$this->product_model->beforeeditproduct($this->input->post('id'));
			$data['page']='editproduct';
			$data['page2']='block/productblock';
			$data['title']='Edit product';
			$this->load->view('templatewith2',$data);
		}
		else
		{
			$id=$this->input->post('id');
			$name=$this->input->post('name');
			$sku=$this->input->post('sku');
			$status=$this->input->post('status');
			$description=$this->input->post('description');
			$price=$this->input->post('price');
			$category=$this->input->post('category');
			$user=$this->input->post('user');
			$quantity=$this->input->post('quantity');
			$onlinestatus=$this->input->post('onlinestatus');
			$moderated=$this->input->post('moderated');
            //send notification
            $newprice=$price*$quantity;
            if($moderated==2){
    $this->product_model->getsalesbalance($id,$name,$sku,$description,$price,$status,$category,$user,$quantity,$image,$onlinestatus,$moderated);
            }
            else if($moderated==1){
                 $this->product_model->approveproduct($id,$name,$sku,$description,$price,$status,$category,$user,$quantity,$image,$onlinestatus,$moderated);
            }
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
            $image=$this->product_model->getproductimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }
//

			if($this->product_model->editproduct($id,$name,$sku,$description,$price,$status,$category,$user,$quantity,$image,$onlinestatus,$moderated)==0)
			$data['alerterror']="product Editing was unsuccesful";
			else
			$data['alertsuccess']="product edited Successfully.";

//			$data['redirect']="site/editproduct?id=".$id;
			$data['redirect']="site/viewproduct";
//			$this->load->view("redirect2",$data);
			$this->load->view("redirect",$data);
		}
	}
	function deleteproduct()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$this->product_model->deleteproduct($this->input->get('id'));
		$data['table']=$this->product_model->viewproduct();
		$data['alertsuccess']="product Deleted Successfully";
		$data['redirect']="site/viewproduct";
        //$data['other']="template=$template";
        $this->load->view("redirect",$data);
	}



    //productimages

	function viewproductimages()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$data['table']=$this->product_model->viewproductimages($this->input->get('id'));
//		$data['before']=$this->product_model->beforeedit($this->input->get('id'));
		$data['before']=$this->product_model->beforeeditproduct($this->input->get('id'));
		$data['page']='viewproductimages';
		$data['page2']='block/productblock';
		$data['title']='View Product Images';
		$this->load->view('templatewith2',$data);
	}

	public function createproductimages()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$data['product']=$this->input->get('id');
//        $data['before']=$this->product_model->beforeedit($this->input->get('id'));
		$data['before']=$this->product_model->beforeeditproduct($this->input->get('id'));
//		$data['page']='viewproductimages';
		$data[ 'page' ] = 'createproductimages';
		$data['page2']='block/productblock';
		$data[ 'title' ] = 'Create productimage';
		$this->load->view( 'templatewith2', $data );
	}

	function createproductimagessubmit()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$this->form_validation->set_rules('order','order','trim');

		if($this->form_validation->run() == FALSE)
		{
			$data['alerterror'] = validation_errors();
			$access = array("1","2");
            $this->checkaccess($access);
            $data['product']=$this->input->get('id');
            $data['before']=$this->product_model->beforeeditproduct($this->input->get_post('id'));
            $data[ 'page' ] = 'createproductimages';
            $data[ 'title' ] = 'Create productimage';
            $this->load->view( 'template', $data );
		}
		else
		{
            $order=$this->input->post('order');
            $product=$this->input->post('product');

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
			}
            //echo $image;
			if($this->product_model->createproductimages($product,$order,$image)==0)
			$data['alerterror']="New Image could not be created.";
			else
			$data['alertsuccess']="Image created Successfully.";

			$data['table']=$this->product_model->viewproductimages($product);
            $data['redirect']="site/viewproductimages?id=".$product;
			$this->load->view("redirect2",$data);
		}
	}

	public function editproductimages()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$data['product']=$this->input->get('productid');
//        $data['before']=$this->product_model->beforeedit($this->input->get('productid'));
        $data['before']=$this->product_model->beforeeditproduct($this->input->get_post('id'));
        $data['beforeproductimages']=$this->product_model->beforeeditproductimages($this->input->get('id'));
//		$data['page']='viewproductimages';
		$data[ 'page' ] = 'editproductimages';
		$data['page2']='block/productblock';
		$data[ 'title' ] = 'Create productimage';
		$this->load->view( 'templatewith2', $data );
	}

	function editproductimagessubmit()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$this->form_validation->set_rules('order','order','trim');

		if($this->form_validation->run() == FALSE)
		{
			$data['alerterror'] = validation_errors();
			$data['product']=$this->input->get('productid');
            $data['before']=$this->product_model->beforeedit($this->input->get('productid'));
            $data['beforeproductimages']=$this->product_model->beforeeditproductimages($this->input->get('id'));
    //		$data['page']='viewproductimages';
            $data[ 'page' ] = 'editproductimages';
            $data['page2']='block/productblock';
            $data[ 'title' ] = 'Create productimage';
            $this->load->view( 'templatewith2', $data );
		}
		else
		{
			$id=$this->input->post('id');
//            echo $id;
            $order=$this->input->post('order');
            $product=$this->input->post('product');
//            echo $product;

            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
			}

            if($image=="")
            {
            $image=$this->product_model->getproductimagesbyid($id);
            $image=$image->image;
            }
//            echo $image;
			if($this->product_model->editproductimages($id,$order,$image,$product)==0)
			$data['alerterror']="Image Editing was unsuccesful";
			else
			$data['alertsuccess']="Image edited Successfully.";

			$data['table']=$this->product_model->viewproductimages($product);
            $data['redirect']="site/viewproductimages?id=".$product;
			$this->load->view("redirect2",$data);

		}
	}

	function deleteproductimages()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$this->product_model->deleteproductimages($this->input->get('id'));
        $product=$this->input->get('productid');
        $data['alerterror']="Image Deleted Successfully.";
		$data['table']=$this->product_model->viewproductimages($product);
        $data['redirect']="site/viewproductimages?id=".$product;
        $this->load->view("redirect2",$data);
	}



    //Order


//	function vieworder()
//	{
//        $access = array("1");
//		$this->checkaccess($access);
//		$data['table']=$this->order_model->vieworder();
//		$data['page']='vieworder';
//		$data['title']='View order';
//		$this->load->view('template',$data);
//	}

    public function vieworder()
    {
        $access=array("1","2");
        $this->checkaccess($access);
        $data["page"]="vieworder";
        $data['activemenu'] = 'user order';
        $data["base_url"]=site_url("site/vieworderjson");
        $data["title"]="View order";
        $this->load->view("template",$data);
    }
    function vieworderjson()
    {
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
        $elements[6]->field="`order`.`timestamp`";
        $elements[6]->sort="1";
        $elements[6]->header="Timestamp";
        $elements[6]->alias="timestamp";

        $elements[7]=new stdClass();
        $elements[7]->field="`orderstatus`.`name`";
        $elements[7]->sort="1";
        $elements[7]->header="Status";
        $elements[7]->alias="orderstatusname";

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
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `order` INNER JOIN `orderstatus` ON `orderstatus`.`id`=`order`.`orderstatus`");
        $this->load->view("json",$data);
    }

    function createorder()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		//$data[ 'category' ] =$this->order_model->getcategorydropdown();
		$data[ 'user' ] =$this->order_model->getuser();
		$data[ 'country' ] =$this->order_model->getcountry();
		$data[ 'orderstatus' ] =$this->order_model->getorderstatus();
		$data['before']=$this->order_model->beforeedit($this->input->get('id'));
		$data['page']='createorder';
		//$data['page2']='block/orderblock';
		$data['title']='Create order';
		$this->load->view('template',$data);
	}
	function createordersubmit()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$this->form_validation->set_rules('orderstatus','orderstatus','trim|');
		$this->form_validation->set_rules('firstname','Firstname','trim');
//		$this->form_validation->set_rules('lastname','Lastname','trim|required');
		$this->form_validation->set_rules('email','Email','trim|valid_email');
		$this->form_validation->set_rules('contactno','contactno','trim');
		$this->form_validation->set_rules('billingaddress','billingaddress','trim');
		$this->form_validation->set_rules('billingcity','billingcity','trim');
		$this->form_validation->set_rules('billingstate','billingstate','trim');
		$this->form_validation->set_rules('billingcountry','billingcountry','trim');
		$this->form_validation->set_rules('shippingaddress','shippingaddress','trim');
		$this->form_validation->set_rules('shippingcity','shippingcity','trim');
		$this->form_validation->set_rules('shippingstate','shippingstate','trim');
		$this->form_validation->set_rules('shippingcountry','shippingcountry','trim');
		$this->form_validation->set_rules('shippingpincode','shippingpincode','trim');
		$this->form_validation->set_rules('transactionid','transactionid','trim');
		$this->form_validation->set_rules('logisticcharge','logisticcharge','trim');
//		$this->form_validation->set_rules('currency','currency','trim');
		if($this->form_validation->run() == FALSE)
		{
			$data['alerterror'] = validation_errors();
			$data[ 'user' ] =$this->order_model->getuser();
			$data[ 'country' ] =$this->user_model->getcountry();
			$data[ 'orderstatus' ] =$this->order_model->getorderstatus();
			$data[ 'currency' ] =$this->currency_model->getcurrencydropdown();
			$data['before']=$this->order_model->beforeedit($this->input->get('id'));
			$data['page']='createorder';
			$data['page2']='block/orderblock';
			$data['title']='Edit order';
			$this->load->view('template',$data);
		}
		else
		{
			$user=$this->input->post('user');
			$firstname=$this->input->post('firstname');
//			$lastname=$this->input->post('lastname');
			$email=$this->input->post('email');
			$contactno=$this->input->post('contactno');
			$billingaddress=$this->input->post('billingaddress');
			$billingcity=$this->input->post('billingcity');
			$billingstate=$this->input->post('billingstate');
			$billingcountry=$this->input->post('billingcountry');
			$shippingaddress=$this->input->post('shippingaddress');
			$shippingcity=$this->input->post('shippingcity');
			$shippingstate=$this->input->post('shippingstate');
			$shippingcountry=$this->input->post('shippingcountry');
			$shippingpincode=$this->input->post('shippingpincode');
//			$currency=$this->input->post('currency');
			$orderstatus=$this->input->post('orderstatus');
			$trackingcode=$this->input->post('trackingcode');
			$transactionid=$this->input->post('transactionid');
			$logisticcharge=$this->input->post('logisticcharge');
			if(($this->order_model->createorder($user,$firstname,$email,$contactno,$billingaddress,$billingcity,$billingstate,$billingcountry,$shippingaddress,$shippingcity,$shippingstate,$shippingcountry,$shippingpincode,$orderstatus,$trackingcode,$transactionid,$logisticcharge))==0)
				$data['alerterror']="Order could not be Created.";
			else
				$data['alertsuccess']="Order  edited Successfully.";
			$data['redirect']="site/vieworder";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}

	}

	function editorder()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$data[ 'country' ] =$this->order_model->getcountry();
		$data[ 'orderstatus' ] =$this->order_model->getorderstatus();
		$data['before']=$this->order_model->beforeedit($this->input->get('id'));
        $data[ 'userfrom' ] =$this->order_model->getuserfrom($this->input->get('id'));
        $data[ 'userto' ] =$this->order_model->getuserto($this->input->get('id'));
        $data["base_url"]=site_url("site/vieworderitemsjson?id=".$this->input->get('id'));
         $data['id']=$this->input->get('id');
		$data['page']='editorder';
		$data['page2']='block/orderblock';
		$data['title']='Edit order';
		$this->load->view('template',$data);
	}
	function editordersubmit()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$this->form_validation->set_rules('orderstatus','orderstatus','trim|');
		$this->form_validation->set_rules('firstname','Firstname','trim');
//		$this->form_validation->set_rules('lastname','Lastname','trim|required');
		$this->form_validation->set_rules('email','Email','trim|valid_email');
		$this->form_validation->set_rules('contactno','contactno','trim');
		$this->form_validation->set_rules('billingaddress','billingaddress','trim');
		$this->form_validation->set_rules('billingcity','billingcity','trim');
		$this->form_validation->set_rules('billingstate','billingstate','trim');
		$this->form_validation->set_rules('billingcountry','billingcountry','trim');
		$this->form_validation->set_rules('shippingaddress','shippingaddress','trim');
		$this->form_validation->set_rules('shippingcity','shippingcity','trim');
		$this->form_validation->set_rules('shippingstate','shippingstate','trim');
		$this->form_validation->set_rules('shippingcountry','shippingcountry','trim');
		$this->form_validation->set_rules('shippingpincode','shippingpincode','trim');
		$this->form_validation->set_rules('transactionid','transactionid','trim');
		$this->form_validation->set_rules('logisticcharge','logisticcharge','trim');
		if($this->form_validation->run() == FALSE)
		{
			$data['alerterror'] = validation_errors();
			$data[ 'user' ] =$this->order_model->getuser();
			$data[ 'country' ] =$this->order_model->getcountry();
			$data[ 'orderstatus' ] =$this->order_model->getorderstatus();
			$data[ 'currency' ] =$this->currency_model->getcurrencydropdown();
			$data['before']=$this->order_model->beforeedit($this->input->get('id'));
			$data['page']='editorder';
			$data['page2']='block/orderblock';
			$data['title']='Edit order';
			$this->load->view('template',$data);
		}
		else
		{

			$id=$this->input->post('id');
			$user=$this->input->post('user');
			$firstname=$this->input->post('firstname');
//			$lastname=$this->input->post('lastname');
			$email=$this->input->post('email');
			$contactno=$this->input->post('contactno');
			$billingaddress=$this->input->post('billingaddress');
			$billingcity=$this->input->post('billingcity');
			$billingstate=$this->input->post('billingstate');
			$billingcountry=$this->input->post('billingcountry');
			$shippingaddress=$this->input->post('shippingaddress');
			$shippingcity=$this->input->post('shippingcity');
			$shippingstate=$this->input->post('shippingstate');
			$shippingcountry=$this->input->post('shippingcountry');
			$shippingpincode=$this->input->post('shippingpincode');
//			$currency=$this->input->post('currency');
			$orderstatus=$this->input->post('orderstatus');
			$trackingcode=$this->input->post('trackingcode');
			$transactionid=$this->input->post('transactionid');
			$logisticcharge=$this->input->post('logisticcharge');
			// print_r($_POST);
			if(($this->order_model->edit($id,$user,$firstname,$email,$contactno,$billingaddress,$billingcity,$billingstate,$billingcountry,$shippingaddress,$shippingcity,$shippingstate,$shippingcountry,$shippingpincode,$orderstatus,$trackingcode,$transactionid,$logisticcharge))==0)
				$data['alerterror']="Order could not be edited.";
			else
            {
				$data['alertsuccess']="Order  edited Successfully.";

            }
			$data['redirect']="site/vieworder";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}

	}


	function vieworderitems()
	{
          $access=array("1","2");
        $this->checkaccess($access);
        $data["page"]="vieworderitems";
        $id=$this->input->get('id');
        $data["base_url"]=site_url("site/vieworderitemsjson");
        $data["title"]="View order";
        $this->load->view("template",$data);
	}

     function vieworderitemsjson()
    {
         $id=$this->input->get('id');
        $elements=array();
        $elements[0]=new stdClass();
        $elements[0]->field="`orderitems`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";

        $elements[1]=new stdClass();
        $elements[1]->field="`orderitems`.`order`";
        $elements[1]->sort="1";
        $elements[1]->header="order";
        $elements[1]->alias="order";

        $elements[2]=new stdClass();
        $elements[2]->field="`product`.`name`";
        $elements[2]->sort="1";
        $elements[2]->header="product";
        $elements[2]->alias="product";

        $elements[3]=new stdClass();
        $elements[3]->field="`orderitems`.`quantity`";
        $elements[3]->sort="1";
        $elements[3]->header="quantity";
        $elements[3]->alias="quantity";

        $elements[4]=new stdClass();
        $elements[4]->field="`orderitems`.`price`";
        $elements[4]->sort="1";
        $elements[4]->header="price";
        $elements[4]->alias="price";

        $elements[5]=new stdClass();
        $elements[5]->field="`orderitems`.`discount`";
        $elements[5]->sort="1";
        $elements[5]->header="discount";
        $elements[5]->alias="discount";

        $elements[6]=new stdClass();
        $elements[6]->field="`orderitems`.`finalprice`";
        $elements[6]->sort="1";
        $elements[6]->header="finalprice";
        $elements[6]->alias="finalprice";

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
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `orderitems` LEFT OUTER JOIN `product` ON `product`.`id`=`orderitems`.`product`","WHERE `orderitems`.`order`='$id'");
        $this->load->view("json",$data);
    }


    public function createorderitems()
	{
		$access = array("1","2");
		$this->checkaccess($access);
        $id=$this->input->get('id');
		$data['order']=$this->order_model->getorderitem($this->input->get('id'));
		$data['before']=$this->order_model->beforeedit($this->input->get('id'));
		$data[ 'product' ] =$this->product_model->getproductdropdown();
//		$data[ 'category' ] =$this->category_model->getcategorydropdown();
		$data[ 'page' ] = 'createorderitem';
		$data['page2']='block/orderblock';
		$data[ 'title' ] = 'Create Orderitem';
		$this->load->view( 'template', $data );
	}
    function createorderitemsubmit()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$this->form_validation->set_rules('product','Product','trim|');
		$this->form_validation->set_rules('price','Price','trim');
		$this->form_validation->set_rules('quantity','Lastname','trim');
		$this->form_validation->set_rules('discount','Discount','trim');
		$this->form_validation->set_rules('finalprice','Finalprice','trim');
		if($this->form_validation->run() == FALSE)
		{
			$data['alerterror'] = validation_errors();
        $id=$this->input->get('id');
		$data['order']=$this->order_model->getorderitem($this->input->get_post('id'));
		$data['before']=$this->order_model->beforeedit($this->input->get_post('id'));
		$data[ 'product' ] =$this->product_model->getproductdropdown();
//		$data[ 'category' ] =$this->category_model->getcategorydropdown();
			$data['page']='createorderitems';
			$data['page2']='block/orderblock';
			$data['title']='Create order';
			$this->load->view('template',$data);
		}
		else
		{

			$order=$this->input->get_post('id');
			$product=$this->input->post('product');
			$price=$this->input->post('price');
			$quantity=$this->input->post('quantity');
			$discount=$this->input->post('discount');
			$finalprice=$this->input->post('finalprice');
//			echo $order;
//			echo $product;
//			echo $price;
//			echo $quantity;
//			echo $finalprice;
			if(($this->order_model->createorderitems($order,$product,$price,$quantity,$discount,$finalprice))==0)
				$data['alerterror']="Orderitem could not be Created.";
			else
				$data['alertsuccess']="Orderitem  edited Successfully.";
			$data['redirect']="site/vieworderitems?id=".$order;
			//$data['other']="template=$template";
			$this->load->view("redirect2",$data);
		}

	}

    function editorderitem()
	{
		$access = array("1","2");
		$this->checkaccess($access);
        $id=$this->input->get('id');
		$data['order']=$this->order_model->getorderitem($this->input->get('order'));
		$data['before']=$this->order_model->beforeedititem($this->input->get('id'));
		$data[ 'product' ] =$this->product_model->getproductdropdown();
//		$data[ 'category' ] =$this->category_model->getcategorydropdown();
		$data[ 'table' ] =$this->order_model->getorderitem($this->input->get('id'));
		$data['page']='editorderitem';
		$data['page2']='block/orderblock';
		$data['title']='Edit order item';
		$this->load->view('template',$data);
	}
    function editorderitemsubmit()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$this->form_validation->set_rules('product','Product','trim|');
		$this->form_validation->set_rules('price','Price','trim');
		$this->form_validation->set_rules('quantity','Lastname','trim');
		$this->form_validation->set_rules('discount','Discount','trim');
		$this->form_validation->set_rules('finalprice','Finalprice','trim');
		if($this->form_validation->run() == FALSE)
		{
			$data['alerterror'] = validation_errors();
        $id=$this->input->get('id');
		$data['order']=$this->order_model->getorderitem();
		$data['before']=$this->order_model->beforeedititem($this->input->get('id'));
		$data[ 'product' ] =$this->product_model->getproductdropdown();
//		$data[ 'category' ] =$this->category_model->getcategorydropdown();
		$data[ 'table' ] =$this->order_model->getorderitem();
		$data['page']='editorderitems';
		$data['page2']='block/orderblock';
		$data['title']='Edit order item';
		$this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->get_post('id');
			//$order=$this->input->get_post('id');
			$product=$this->input->post('product');
			$order=$this->input->get_post('order');
			$price=$this->input->post('price');
			$quantity=$this->input->post('quantity');
			$discount=$this->input->post('discount');
			$finalprice=$this->input->post('finalprice');
            //echo $order;

			if(($this->order_model->updateorderitem($id,$order,$product,$price,$quantity,$discount,$finalprice))==0)
				$data['alerterror']="Orderitem could not be Updated.";
			else
				$data['alertsuccess']="Orderitem  edited Successfully.";
			$data['redirect']="site/vieworderitems?id=".$order;
//			$data['order']="id=$order";
			$this->load->view("redirect2",$data);
		}

	}


    function deleteorderitem()
	{
		$access = array("1","2");
		$this->checkaccess($access);
        $order=$this->input->get('order');
		$this->order_model->deleteorderitem($this->input->get('id'));
		$data[ 'table' ] =$this->order_model->getorderitem($order);
		$data['alertsuccess']="Orderitem Deleted Successfully";
		$data['redirect']="site/vieworderitems?id=".$order;
//			$data['order']="id=$order";
        $this->load->view("redirect2",$data);
	}

//notification starts

	public function viewnotification()
    {
        $access=array("1","2");
        $this->checkaccess($access);
        $data["page"]="viewnotification";
        $data[ 'user' ] =$this->user_model->getuserdropdown();
        $data[ 'type' ] =$this->notification_model->gettypedropdown();
        $data["base_url"]=site_url("site/viewnotificationjson");
        $data['activemenu'] = 'user notification';
        $data["title"]="View notification";
        $this->load->view("template",$data);
    }
    function viewnotificationjson()
    {
        $elements=array();
        $elements[0]=new stdClass();
        $elements[0]->field="`notification`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        $elements[1]=new stdClass();
        $elements[1]->field="`user`.`shopname`";
        $elements[1]->sort="1";
        $elements[1]->header="User";
        $elements[1]->alias="user";
        $elements[2]=new stdClass();
        $elements[2]->field="ADDTIME(`notification`.`timestamp`,'0 05:30:00')";
        $elements[2]->sort="1";
        $elements[2]->header="Timestamp";
        $elements[2]->alias="timestamp";
        $elements[3]=new stdClass();
        $elements[3]->field="`notification`.`message`";
        $elements[3]->sort="1";
        $elements[3]->header="Message";
        $elements[3]->alias="message";
        $elements[4]=new stdClass();
        $elements[4]->field="`notification`.`type`";
        $elements[4]->sort="1";
        $elements[4]->header="Type";
        $elements[4]->alias="type";
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
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `notification` LEFT OUTER JOIN `user` ON `notification`.`user`=`user`.`id` ");
        $this->load->view("json",$data);
    }

    public function createnotification()
    {
        $access=array("1","2");
        $this->checkaccess($access);
        $data[ 'user' ] =$this->user_model->getuserdropdown();
        $data[ 'type' ] =$this->notification_model->gettypedropdown();
        $data["page"]="createnotification";
        $data["title"]="Create Notification";
        $this->load->view("template",$data);
    }
    public function createnotificationsubmit()
    {
        $access=array("1","2");
        $this->checkaccess($access);
        $this->form_validation->set_rules("type","Type","trim");
        $this->form_validation->set_rules("message","Message","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data[ 'user' ] =$this->user_model->getuserdropdown();
            $data[ 'type' ] =$this->notification_model->gettypedropdown();
            $data["page"]="createnotiication";
            $data["title"]="Create Notification";
            $this->load->view("template",$data);
        }
        else
        {
            $user=$this->input->get_post("user");
            $type=$this->input->get_post("type");
            $message=$this->input->get_post("message");
            if($this->notification_model->create($user,$type,$message)==0)
            $data["alerterror"]="New notification could not be created.";
            else
            $data["alertsuccess"]="notification created Successfully.";
            $data["redirect"]="site/viewnotification";
            $this->load->view("redirect",$data);
        }
    }
    public function editnotification()
    {
        $access=array("1","2");
        $this->checkaccess($access);
        $data[ 'user' ] =$this->user_model->getuserdropdown();
        $data[ 'type' ] =$this->notification_model->gettypedropdown();
        $data["page"]="editnotification";
        $data["title"]="Edit Notification";
        $data["before"]=$this->notification_model->beforeedit($this->input->get("id"));
        $this->load->view("template",$data);
    }
    public function editnotificationsubmit()
    {
        $access=array("1","2");
        $this->checkaccess($access);
        $this->form_validation->set_rules("id","ID","trim");
        $this->form_validation->set_rules("type","Type","trim");
        $this->form_validation->set_rules("message","Message","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data[ 'user' ] =$this->user_model->getuserdropdown();
            $data[ 'type' ] =$this->notification_model->gettypedropdown();
            $data["page"]="editnotification";
            $data["title"]="Edit Notification";
            $data["before"]=$this->notification_model->beforeedit($this->input->get("id"));
            $this->load->view("template",$data);
        }
        else
        {
            $id=$this->input->get_post("id");
            $user=$this->input->get_post("user");
            $type=$this->input->get_post("type");
            $message=$this->input->get_post("message");
            $timestamp=$this->input->get_post("timestamp");
            if($this->notification_model->edit($id,$user,$type,$timestamp,$message)==0)
            $data["alerterror"]="New notification could not be Updated.";
            else
            $data["alertsuccess"]="notification Updated Successfully.";
            $data["redirect"]="site/viewnotification";
            $this->load->view("redirect",$data);
        }
    }
    public function deletenotification()
    {
        $access=array("1","2");
        $this->checkaccess($access);
        $this->notification_model->delete($this->input->get("id"));
        $data["redirect"]="site/viewnotification";
        $this->load->view("redirect",$data);
    }
//	notification ends


	// NEW REGISTER

	public function createregister()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$data[ 'status' ] =$this->register_model->getregisterdropdown();
		$data[ 'page' ] = 'createregister';
		$data[ 'title' ] = 'Create Register';
		$this->load->view( 'template', $data );
	}
	function createregistersubmit()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required|max_length[30]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[user.email]');
//		$this->form_validation->set_rules('password','Password','trim|required|min_length[6]|max_length[30]');
	    $this->form_validation->set_rules('personalcontact','Personal Contact','trim|required|max_length[10]');
		$this->form_validation->set_rules('status','status','trim|');
		if($this->form_validation->run() == FALSE)
		{
			$data['alerterror'] = validation_errors();
            $data[ 'status' ] =$this->register_model->getregisterdropdown();
//            $data['category']=$this->category_model->getcategorydropdown();
            $data[ 'page' ] = 'createregister';
            $data[ 'title' ] = 'Create Register';
            $this->load->view( 'template', $data );
		}
		else
		{
            $name=$this->input->post('name');
            $email=$this->input->post('email');
            $message=$this->input->post('message');
            $personalcontact=$this->input->post('personalcontact');
            $status=$this->input->post('status');
			if($this->register_model->create($name,$email,$message,$personalcontact,$status)==0)
		$data['alerterror']="New Register could not be created.";
			else
			$data['alertsuccess']="Register created Successfully.";
			$data['redirect']="site/viewregister";
			$this->load->view("redirect",$data);
		   }
		   }

//	if($this->request_model->create($userfrom,$userto,$requeststatus,$amount,$reason,$approvalreason,$timestamp)==0)
//$data["alerterror"]="New request could not be created.";
//else
//$data["alertsuccess"]="request created Successfully.";
//$data["redirect"]="site/viewrequest";
//$this->load->view("redirect",$data);
//}

    function viewregister()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$data['page']='viewregister';
        $data['base_url'] = site_url("site/viewregisterjson");
        $data['activemenu'] = 'register';
		$data['title']='View Register';
		$this->load->view('template',$data);
	}
    function viewregisterjson()
	{
		$access = array("1","2");
		$this->checkaccess($access);


        $elements=array();
        $elements[0]=new stdClass();
        $elements[0]->field="`register`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";


        $elements[1]=new stdClass();
        $elements[1]->field="`register`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";

        $elements[2]=new stdClass();
        $elements[2]->field="`register`.`email`";
        $elements[2]->sort="1";
        $elements[2]->header="Email";
        $elements[2]->alias="email";

        $elements[3]=new stdClass();
        $elements[3]->field="`register`.`personalcontact`";
        $elements[3]->sort="1";
        $elements[3]->header="Personal Contact";
        $elements[3]->alias="personalcontact";

		$elements[4]=new stdClass();
        $elements[4]->field="`register`.`status`";
        $elements[4]->sort="1";
        $elements[4]->header="Status";
        $elements[4]->alias="status";

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

        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `register`");

		$this->load->view("json",$data);
	}


	function editregister()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$data["page2"]="block/userblock";
		$data[ 'status' ] =$this->register_model->getregisterdropdown();
		$data['before']=$this->register_model->beforeedit($this->input->get('id'));
		$data['page']='editregister';
		$data['title']='Edit Register';
		$this->load->view('template',$data);
	}
	function editregistersubmit()
	{
		$access = array("1","2");
		$this->checkaccess($access);

		$this->form_validation->set_rules('name','Name','trim|required|max_length[30]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('status','status','trim|');
		if($this->form_validation->run() == FALSE)
		{
			$data['alerterror'] = validation_errors();
			$data[ 'status' ] =$this->register_model->getregisterdropdown();
			$data['before']=$this->register_model->beforeedit($this->input->post('id'));
			$data['page']='editregister';
//			$data['page2']='block/userblock';
			$data['title']='Edit Register';
			$this->load->view('template',$data);
		}
		else
		{

            $id=$this->input->get_post('id');
            $name=$this->input->get_post('name');
            $email=$this->input->get_post('email');
            $message=$this->input->get_post('message');
            $personalcontact=$this->input->get_post('personalcontact');
            $status=$this->input->get_post('status');
			if($this->register_model->edit($id,$name,$email,$message,$personalcontact,$status)==0)
			$data['alerterror']="New register editing was unsuccesful";
			else
			$data['alertsuccess']="New register edited Successfully.";

			$data['redirect']="site/viewregister";
			$this->load->view("redirect",$data);

		}
	}

	function deleteregister()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$this->register_model->deleteregister($this->input->get('id'));
//		$data['table']=$this->user_model->viewusers();
		$data['alertsuccess']="Register Deleted Successfully";
		$data['redirect']="site/viewregister";
		$this->load->view("redirect",$data);
	}
	// SUGGESTIONS STARTS
	public function viewsuggestion()
    {
        $access=array("1","2");
        $this->checkaccess($access);
        $data["page"]="viewsuggestion";
        $data[ 'user' ] =$this->user_model->getuserdropdown();
        $data["base_url"]=site_url("site/viewsuggestionjson");
        $data["title"]="View suggestion";
        $data['activemenu'] = 'suggestion';
        $this->load->view("template",$data);
    }
    function viewsuggestionjson()
    {
        $elements=array();
        $elements[0]=new stdClass();
        $elements[0]->field="`suggestion`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";

        $elements[1]=new stdClass();
        $elements[1]->field="`user`.`shopname`";
        $elements[1]->sort="1";
        $elements[1]->header="Shopname";
        $elements[1]->alias="userid";

				$elements[3]=new stdClass();
				$elements[3]->field="`suggestion`.`user`";
				$elements[3]->sort="1";
				$elements[3]->header="Email";
				$elements[3]->alias="user";

		$elements[2]=new stdClass();
        $elements[2]->field="ADDTIME(`suggestion`.`timestamp`,'0 05:30:00')";
        $elements[2]->sort="1";
        $elements[2]->header="Timestamp";
        $elements[2]->alias="timestamp";

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
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `suggestion` LEFT OUTER JOIN `user` ON `suggestion`.`userid`=`user`.`id` ");
        $this->load->view("json",$data);
    }

    public function createsuggestion()
    {
        $access=array("1","2");
        $this->checkaccess($access);
        $data[ 'user' ] =$this->user_model->getuserdropdown();
        $data["page"]="createsuggestion";
        $data["title"]="Create suggestion";
        $this->load->view("template",$data);
    }
    public function createsuggestionsubmit()
    {
        $access=array("1","2");
        $this->checkaccess($access);
        $this->form_validation->set_rules("message","Message","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data[ 'user' ] =$this->user_model->getuserdropdown();
            $data["page"]="createsuggestion";
            $data["title"]="Create suggestion";
            $this->load->view("template",$data);
        }
        else
        {
            $user=$this->input->get_post("user");
            $message=$this->input->get_post("message");
            if($this->suggestion_model->create($user,$message)==0)
            $data["alerterror"]="New suggestion could not be created.";
            else
            $data["alertsuccess"]="Suggestion created Successfully.";
            $data["redirect"]="site/viewsuggestion";
            $this->load->view("redirect",$data);
        }
    }
    public function editsuggestion()
    {
        $access=array("1","2");
        $this->checkaccess($access);
        $data[ 'user' ] =$this->user_model->getuserdropdown();
        $data["page"]="editsuggestion";
        $data["title"]="Edit Suggestion";
        $data["before"]=$this->suggestion_model->beforeedit($this->input->get("id"));
        $this->load->view("template",$data);
    }
    public function editsuggestionsubmit()
    {
        $access=array("1","2");
        $this->checkaccess($access);
        $this->form_validation->set_rules("id","ID","trim");
        $this->form_validation->set_rules("message","Message","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data[ 'user' ] =$this->user_model->getuserdropdown();
            $data["page"]="editsuggestion";
            $data["title"]="Edit suggestion";
            $data["before"]=$this->suggestion_model->beforeedit($this->input->get("id"));
            $this->load->view("template",$data);
        }
        else
        {
            $id=$this->input->get_post("id");
            $user=$this->input->get_post("user");
            $message=$this->input->get_post("message");
            $timestamp=$this->input->get_post("timestamp");
            if($this->suggestion_model->edit($id,$user,$timestamp,$message)==0)
            $data["alerterror"]="New suggestion could not be Updated.";
            else
            $data["alertsuccess"]="suggestion Updated Successfully.";
            $data["redirect"]="site/viewsuggestion";
            $this->load->view("redirect",$data);
        }
    }
    public function deletesuggestion()
    {
        $access=array("1","2");
        $this->checkaccess($access);
        $this->suggestion_model->delete($this->input->get("id"));
        $data["redirect"]="site/viewsuggestion";
        $this->load->view("redirect",$data);
    }
    public function exportexcelreport()
    {
		$sd=$this->input->get_post("sd");
        $ed=$this->input->get_post("ed");
		$this->user_model->exportexcelreport($sd,$ed);

    }
	    public function exportexcelreport1()
    {
		$sd=$this->input->get_post("sd");
        $ed=$this->input->get_post("ed");
		$this->user_model->exportexcelreport1($sd,$ed);

    }
    	public function exportusercsv()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->user_model->exportusercsv();
        $data['redirect']="site/viewusers";
        $this->load->view("redirect",$data);
	}
    public function exportareacsv()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->area_model->exportareacsv();
        $data['redirect']="site/viewarea";
        $this->load->view("redirect",$data);
	}
    public function exportcategorycsv()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->category_model->exportcategorycsv();
        $data['redirect']="site/viewcategory";
        $this->load->view("redirect",$data);
	}
    public function exportusercategorycsv()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->usercategory_model->exportusercategorycsv();
        $data['redirect']="site/viewusercategory";
        $this->load->view("redirect",$data);
	}
    public function exportproductcsv()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->product_model->exportproductcsv();
        $data['redirect']="site/viewproduct";
        $this->load->view("redirect",$data);
	}
    public function exportregistercsv()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->register_model->exportregistercsv();
        $data['redirect']="site/viewregister";
        $this->load->view("redirect",$data);
	}
    public function exportordercsv()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->order_model->exportordercsv();
        $data['redirect']="site/vieworder";
        $this->load->view("redirect",$data);
	}
    public function exportnotificationcsv()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->notification_model->exportnotificationcsv();
        $data['redirect']="site/viewnotification";
        $this->load->view("redirect",$data);
	}
    public function exportsuggestioncsv()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->suggestion_model->exportsuggestioncsv();
        $data['redirect']="site/viewsuggestion";
        $this->load->view("redirect",$data);
	}
    public function exportrequestcsv()
	{
		$access = array("1");
		$this->checkaccess($access);
        $checkadmin=$this->input->get('id');
		$this->request_model->exportrequestcsv($checkadmin);
        $data['redirect']="site/viewrequest";
        $this->load->view("redirect",$data);
	}


    // broadcast


    public function viewbroadcast()
    {
        $access=array("1","2");
        $this->checkaccess($access);
        $data["page"]="viewbroadcast";
        $data[ 'user' ] =$this->user_model->getuserdropdown();
        $data["base_url"]=site_url("site/viewbroadcastjson");
        $data["title"]="View broadcast";
        $data['activemenu'] = 'broadcast';
        $this->load->view("template",$data);
    }
    function viewbroadcastjson()
    {
        $elements=array();
        $elements[0]=new stdClass();
        $elements[0]->field="`broadcast`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";

        $elements[1]=new stdClass();
        $elements[1]->field="`broadcast`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";

		$elements[2]=new stdClass();
        $elements[2]->field="ADDTIME(`broadcast`.`timestamp`,'0 05:30:00')";
        $elements[2]->sort="1";
        $elements[2]->header="Timestamp";
        $elements[2]->alias="timestamp";

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
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `broadcast`");
        $this->load->view("json",$data);
    }

    public function createbroadcast()
    {
        $access=array("1","2");
        $this->checkaccess($access);
        $data[ 'user' ] =$this->user_model->getuserdropdown();
        $data["page"]="createbroadcast";
        $data["title"]="Create broadcast";
        $this->load->view("template",$data);
    }
    public function createbroadcastsubmit()
    {
        $access=array("1","2");
        $this->checkaccess($access);
        $this->form_validation->set_rules("message","Message","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data[ 'user' ] =$this->user_model->getuserdropdown();
            $data["page"]="createbroadcast";
            $data["title"]="Create broadcast";
            $this->load->view("template",$data);
        }
        else
        {
            $name=$this->input->get_post("name");
            $message=$this->input->get_post("message");
            if($this->broadcast_model->create($name,$message)==0)
            $data["alerterror"]="New broadcast could not be created.";
            else
            $data["alertsuccess"]="broadcast created Successfully.";
            $data["redirect"]="site/viewbroadcast";
            $this->load->view("redirect",$data);
        }
    }
    public function editbroadcast()
    {
        $access=array("1","2");
        $this->checkaccess($access);
        $data[ 'user' ] =$this->user_model->getuserdropdown();
        $data["page"]="editbroadcast";
        $data["title"]="Edit broadcast";
        $data["before"]=$this->broadcast_model->beforeedit($this->input->get("id"));
        $this->load->view("template",$data);
    }
    public function editbroadcastsubmit()
    {
        $access=array("1","2");
        $this->checkaccess($access);
        $this->form_validation->set_rules("id","ID","trim");
        $this->form_validation->set_rules("message","Message","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data[ 'user' ] =$this->user_model->getuserdropdown();
            $data["page"]="editbroadcast";
            $data["title"]="Edit broadcast";
            $data["before"]=$this->broadcast_model->beforeedit($this->input->get("id"));
            $this->load->view("template",$data);
        }
        else
        {
            $id=$this->input->get_post("id");
            $name=$this->input->get_post("name");
            $message=$this->input->get_post("message");
            $timestamp=$this->input->get_post("timestamp");
            if($this->broadcast_model->edit($id,$name,$timestamp,$message)==0)
            $data["alerterror"]="New broadcast could not be Updated.";
            else
            $data["alertsuccess"]="broadcast Updated Successfully.";
            $data["redirect"]="site/viewbroadcast";
            $this->load->view("redirect",$data);
        }
    }
    public function deletebroadcast()
    {
        $access=array("1","2");
        $this->checkaccess($access);
        $this->broadcast_model->delete($this->input->get("id"));
        $data["redirect"]="site/viewbroadcast";
        $this->load->view("redirect",$data);
    }

    public function sendmessagetoall()
    {
        $access=array("1","2");
        $id=$this->input->get("id");
        $query=$this->db->query("SELECT * FROM `user` WHERE `accesslevel`=3")->result();
        $notification=$this->db->query("SELECT * FROM `broadcast` WHERE `id`='$id'")->row();
        $title=$notification->name;
        $message=$notification->message;
        foreach($query as $row)
        {
            $this->user_model->sendnotification($message,$row->id);
        }
        $data["redirect"]="site/viewbroadcast";
        $this->load->view("redirect",$data);
    }
    public function cleartoken(){
        $id=$this->input->get('id');
        // clear token
        $cleartoken=$this->db->query("UPDATE `user` SET `token`='0' WHERE `id`='$id'");
         $data["redirect"]="site/viewusers";
        $this->load->view("redirect",$data);

    }



		// hotel


		public function viewhotel()
		{
				$access=array("1","2");
				$this->checkaccess($access);
				$data["page"]="viewhotel";
				$data[ 'user' ] =$this->user_model->getuserdropdown();
				$data["base_url"]=site_url("site/viewhoteljson");
				$data["title"]="View hotel";
				$data['activemenu'] = 'hotel';
				$this->load->view("template",$data);
		}
		function viewhoteljson()
		{
				$elements=array();
				$elements[0]=new stdClass();
				$elements[0]->field="`hotel`.`id`";
				$elements[0]->sort="1";
				$elements[0]->header="ID";
				$elements[0]->alias="id";

				$elements[1]=new stdClass();
				$elements[1]->field="`hotel`.`hotelname`";
				$elements[1]->sort="1";
				$elements[1]->header="Hotel Name";
				$elements[1]->alias="hotelname";

				$elements[2]=new stdClass();
				$elements[2]->field="`hotel`.`timestamp`";
				$elements[2]->sort="1";
				$elements[2]->header="Timestamp";
				$elements[2]->alias="timestamp";


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
				$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `hotel`");
				$this->load->view("json",$data);
		}

		public function createhotel()
		{
				$access=array("1","2");
				$this->checkaccess($access);
				$data[ 'user' ] =$this->user_model->getuserdropdown();
				$data["page"]="createhotel";
				$data["title"]="Create hotel";
				$this->load->view("template",$data);
		}
		public function createhotelsubmit()
		{
				$access=array("1","2");
				$this->checkaccess($access);
				$this->form_validation->set_rules("message","Message","trim");
				if($this->form_validation->run()==FALSE)
				{
						$data["alerterror"]=validation_errors();
						$data[ 'user' ] =$this->user_model->getuserdropdown();
						$data["page"]="createhotel";
						$data["title"]="Create hotel";
						$this->load->view("template",$data);
				}
				else
				{
					$country=$this->input->get_post("country");
					$user=$this->input->get_post("user");
					$city=$this->input->get_post("city");
					$hotelname=$this->input->get_post("hotelname");
					$checkin=$this->input->get_post("checkin");
					$checkout=$this->input->get_post("checkout");
					$room=$this->input->get_post("room");
					$adult=$this->input->get_post("adult");
					$children=$this->input->get_post("children");
						if($this->hotel_model->create($user,$country,$city,$hotelname,$checkin,$checkout,$room,$adult,$children)==0)
						$data["alerterror"]="New hotel could not be created.";
						else
						$data["alertsuccess"]="hotel created Successfully.";
						$data["redirect"]="site/viewhotel";
						$this->load->view("redirect",$data);
				}
		}
		public function edithotel()
		{
				$access=array("1","2");
				$this->checkaccess($access);
				$data[ 'user' ] =$this->user_model->getuserdropdown();
				$data["page"]="edithotel";
				$data["title"]="Edit hotel";
				$data["before"]=$this->hotel_model->beforeedit($this->input->get("id"));
				$this->load->view("template",$data);
		}
		public function edithotelsubmit()
		{
				$access=array("1","2");
				$this->checkaccess($access);
				$this->form_validation->set_rules("id","ID","trim");
				$this->form_validation->set_rules("message","Message","trim");
				if($this->form_validation->run()==FALSE)
				{
						$data["alerterror"]=validation_errors();
						$data[ 'user' ] =$this->user_model->getuserdropdown();
						$data["page"]="edithotel";
						$data["title"]="Edit hotel";
						$data["before"]=$this->hotel_model->beforeedit($this->input->get("id"));
						$this->load->view("template",$data);
				}
				else
				{
						$id=$this->input->get_post("id");
						$country=$this->input->get_post("country");
						$user=$this->input->get_post("user");
						$city=$this->input->get_post("city");
						$hotelname=$this->input->get_post("hotelname");
						$checkin=$this->input->get_post("checkin");
						$checkout=$this->input->get_post("checkout");
						$room=$this->input->get_post("room");
						$adult=$this->input->get_post("adult");
						$children=$this->input->get_post("children");
						$timestamp=$this->input->get_post("timestamp");
						if($this->hotel_model->edit($id,$user,$country,$city,$hotelname,$checkin,$checkout,$room,$adult,$children,$timestamp)==0)
						$data["alerterror"]="New hotel could not be Updated.";
						else
						$data["alertsuccess"]="hotel Updated Successfully.";
						$data["redirect"]="site/viewhotel";
						$this->load->view("redirect",$data);
				}
		}
		public function deletehotel()
		{
				$access=array("1","2");
				$this->checkaccess($access);
				$this->hotel_model->delete($this->input->get("id"));
				$data["redirect"]="site/viewhotel";
				$this->load->view("redirect",$data);
		}

}
?>
