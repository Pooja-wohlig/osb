<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class User_model extends CI_Model
{
	protected $id,$username ,$password;
	public function validate($username,$password )
	{

		$password=md5($password);
		$query ="SELECT `user`.`id`,`user`.`name` as `name`,`email`,`user`.`accesslevel`,`accesslevel`.`name` as `access` FROM `user`
		INNER JOIN `accesslevel` ON `user`.`accesslevel` = `accesslevel`.`id`
		WHERE `email` LIKE '$username' AND `password` LIKE '$password' AND `accesslevel` IN (1,2) ";
		$row =$this->db->query( $query );
		if ( $row->num_rows() > 0 ) {
			$row=$row->row();
			$this->id = $row->id;
			$this->name = $row->name;
			$this->email = $row->email;
			$newdata        = array(
				'id' => $this->id,
				'email' => $this->email,
				'name' => $this->name ,
				'accesslevel' => $row->accesslevel ,
				'logged_in' => 'true',
			);
			$this->session->set_userdata( $newdata );
			return true;
		} //count( $row_array ) == 1
		else
			return false;
	}


	public function create($termsaccept,$name,$email,$message,$personalcontact,$password,$accesslevel,$status,$socialid,$logintype,$image,$json,$shopname,$membershipno,$address,$description,$website,$shopcontact1,$shopcontact2,$shopemail,$purchasebalance,$salesbalance,$area,$shoplogo,$percentpayment,$billingaddress,$billingcity,$billingstate,$billingcountry,$billingpincode,$shippingaddress,$shippingcity,$shippingcountry,$shippingstate,$shippingpincode,$onlinestatus,$shopstatus)
	{
		$data  = array(
			'termsaccept' => $termsaccept,
			'name' => $name,
			'email' => $email,
			'message' => $message,
			'personalcontact' => $personalcontact,
			'password' =>md5($password),
			'accesslevel' => $accesslevel,
			'status' => $status,
            'socialid'=> $socialid,
            'image'=> $image,
            'json'=> $json,
			'logintype' => $logintype,
			'area' => $area,
			'shopname' => $shopname,
			'membershipno' => $membershipno,
			'address' => $address,
			'description' => $description,
			'website' => $website,
			'shopcontact1' => $shopcontact1,
			'shopcontact2' => $shopcontact2,
			'shopemail' => $shopemail,
			'purchasebalance' => $purchasebalance,
			'salesbalance' => $salesbalance,
			'shoplogo' => $shoplogo,
			'percentpayment' => $percentpayment,
			'billingaddress' => $billingaddress,
			'billingcity' => $billingcity,
			'billingstate' => $billingstate,
			'billingcountry' => $billingcountry,
			'billingpincode' => $billingpincode,
			'shippingaddress' => $shippingaddress,
			'shippingcity' => $shippingcity,
			'shippingcountry' => $shippingcountry,
			'shippingstate' => $shippingstate,
			'shippingpincode' => $shippingpincode,
			'onlinestatus' => $onlinestatus,
			'shopstatus' => $shopstatus
		);
		$query=$this->db->insert( 'user', $data );
		$id=$this->db->insert_id();

		if(!$query)
			return  0;
		else
			return  1;
	}
     function get_random_password()
    {
		 $chars_min=6;
		 $chars_max=8;
		 $include_numbers=false;
			$use_upper_case=false;
		 $include_special_chars=false;
        $length = rand($chars_min, $chars_max);
        $selection = 'aeuoyibcdfghjklmnpqrstvwxz';
        if($include_numbers) {
            $selection .= "1234567890";
        }
        if($include_special_chars) {
            $selection .= "!@\"#$%&[]{}?|";
        }

        $password = "";
        for($i=0; $i<$length; $i++) {
            $current_letter = $use_upper_case ? (rand(0,1) ? strtoupper($selection[(rand() % strlen($selection))]) : $selection[(rand() % strlen($selection))]) : $selection[(rand() % strlen($selection))];
            $password .=  $current_letter;
        }

      return $password;
    }
	function viewusers($startfrom,$totallength)
	{
		$user = $this->session->userdata('accesslevel');
		$query="SELECT DISTINCT `user`.`id` as `id`,`user`.`firstname` as `firstname`,`user`.`lastname` as `lastname`,`accesslevel`.`name` as `accesslevel`	,`user`.`email` as `email`,`user`.`contact` as `contact`,`user`.`status` as `status`,`user`.`accesslevel` as `access`
		FROM `user`
	   INNER JOIN `accesslevel` ON `user`.`accesslevel`=`accesslevel`.`id`  ";
	   $accesslevel=$this->session->userdata('accesslevel');
	   if($accesslevel==1)
		{
			$query .= " ";
		}
		else if($accesslevel==2)
		{
			$query .= " WHERE `user`.`accesslevel`> '$accesslevel' ";
		}

	   $query.=" ORDER BY `user`.`id` ASC LIMIT $startfrom,$totallength";
		$query=$this->db->query($query)->result();

        $return=new stdClass();
        $return->query=$query;
        $return->totalcount=$this->db->query("SELECT count(*) as `totalcount` FROM `user`
	   INNER JOIN `accesslevel` ON `user`.`accesslevel`=`accesslevel`.`id`  ")->row();
        $return->totalcount=$return->totalcount->totalcount;
		return $return;
	}
	public function beforeedit( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'user' )->row();
		return $query;
	}
    public function getmembershipno($id)
	{
		$query=$this->db->query("SELECT `membershipno` FROM `user` WHERE `id`='$id'")->row();
        $membershipno=$query->membershipno;
		return $membershipno;
	}
    public function getname($id)
	{
		$query=$this->db->query("SELECT `name` FROM `user` WHERE `id`='$id'")->row();
        $name=$query->name;
		return $name;
	}

	public function edit($termsaccept,$id,$name,$email,$message,$personalcontact,$password,$accesslevel,$status,$socialid,$logintype,$image,$json,$shopname,$membershipno,$address,$description,$website,$shopcontact1,$shopcontact2,$shopemail,$purchasebalance,$salesbalance,$area,$shoplogo,$percentpayment,$billingaddress,$billingcity,$billingstate,$billingcountry,$billingpincode,$shippingaddress,$shippingcity,$shippingcountry,$shippingstate,$shippingpincode,$onlinestatus,$shopstatus)
	{
		$data  = array(
			'termsaccept' => $termsaccept,
			'name' => $name,
			'email' => $email,
			'message' => $message,
			'personalcontact' => $personalcontact,
			'accesslevel' => $accesslevel,
			'status' => $status,
            'socialid'=> $socialid,
            'image'=> $image,
            'json'=> $json,
			'logintype' => $logintype,
			'shopname' => $shopname,
			'area' => $area,
			'membershipno' => $membershipno,
			'address' => $address,
			'description' => $description,
			'website' => $website,
			'shopcontact1' => $shopcontact1,
			'shopcontact2' => $shopcontact2,
			'shopemail' => $shopemail,
			'purchasebalance' => $purchasebalance,
			'salesbalance' => $salesbalance,
			'shoplogo' => $shoplogo,
			'percentpayment' => $percentpayment,
			'billingaddress' => $billingaddress,
			'billingcity' => $billingcity,
			'billingstate' => $billingstate,
			'billingcountry' => $billingcountry,
			'billingpincode' => $billingpincode,
			'shippingaddress' => $shippingaddress,
			'shippingcity' => $shippingcity,
			'shippingcountry' => $shippingcountry,
			'shippingstate' => $shippingstate,
			'shippingpincode' => $shippingpincode,
			'onlinestatus' => $onlinestatus,
			'shopstatus' => $shopstatus
		);
		if($password != "")
			$data['password'] =md5($password);
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'user', $data );

		return 1;
	}

	public function getuserimagebyid($id)
	{
		$query=$this->db->query("SELECT `image` FROM `user` WHERE `id`='$id'")->row();
		return $query;
	}
	function deleteuser($id)
	{
		$query=$this->db->query("DELETE FROM `user` WHERE `id`='$id'");
	}
	function changepassword($id,$password)
	{
		$data  = array(
			'password' =>md5($password),
		);
		$this->db->where('id',$id);
		$query=$this->db->update( 'user', $data );
		if(!$query)
			return  0;
		else
			return  1;
	}

    public function getuserdropdown()
	{
		$query=$this->db->query("SELECT * FROM `user`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}

		return $return;
	}

	public function getaccesslevels()
	{
		$return=array();
		$query=$this->db->query("SELECT * FROM `accesslevel` ORDER BY `id` ASC")->result();
		$accesslevel=$this->session->userdata('accesslevel');
			foreach($query as $row)
			{
				if($accesslevel==1)
				{
					$return[$row->id]=$row->name;
				}
				else if($accesslevel==2)
				{
					if($row->id > $accesslevel)
					{
						$return[$row->id]=$row->name;
					}
				}
				else if($accesslevel==3)
				{
					if($row->id > $accesslevel)
					{
						$return[$row->id]=$row->name;
					}
				}
				else if($accesslevel==4)
				{
					if($row->id == $accesslevel)
					{
						$return[$row->id]=$row->name;
					}
				}
			}

		return $return;
	}
    public function getstatusdropdown()
	{
		$query=$this->db->query("SELECT * FROM `statuses`  ORDER BY `id` ASC")->result();
		$return=array(
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}

		return $return;
	}
	public function sendemail($email,$membershipno,$password){
	$this->load->library('email');
$this->email->from('dhavalwohlig@gmail.com', 'Dhaval');
$this->email->to($email);
$this->email->subject('Auto generated Password');
		$this->email->message("Your OSB Account Information is as follows : <br/>Membership Id : ".$membershipno." <br/>Password : ".$password);

$this->email->send();

//echo $this->email->print_debugger();
	}

	function changestatus($id)
	{
		$query=$this->db->query("SELECT `status` FROM `user` WHERE `id`='$id'")->row();
		$status=$query->status;
		if($status==1)
		{
			$status=0;
		}
		else if($status==0)
		{
			$status=1;
		}
		$data  = array(
			'status' =>$status,
		);
		$this->db->where('id',$id);
		$query=$this->db->update( 'user', $data );
		if(!$query)
			return  0;
		else
			return  1;
	}
	function editaddress($id,$address,$city,$pincode)
	{
		$data  = array(
			'address' => $address,
			'city' => $city,
			'pincode' => $pincode,
		);

		$this->db->where( 'id', $id );
		$query=$this->db->update( 'user', $data );
		if($query)
		{
			$this->saveuserlog($id,'User Address Edited');
		}
		return 1;
	}

	function saveuserlog($id,$status)
	{
//		$fromuser = $this->session->userdata('id');
		$data2  = array(
			'onuser' => $id,
			'status' => $status
		);
		$query2=$this->db->insert( 'userlog', $data2 );
        $query=$this->db->query("UPDATE `user` SET `status`='$status' WHERE `id`='$user'");
	}
    function signup($email,$password)
    {
         $password=md5($password);
        $query=$this->db->query("SELECT `id` FROM `user` WHERE `email`='$email' ");
        if($query->num_rows == 0)
        {
            $this->db->query("INSERT INTO `user` (`id`, `firstname`, `lastname`, `password`, `email`, `website`, `description`, `eventinfo`, `contact`, `address`, `city`, `pincode`, `dob`, `accesslevel`, `timestamp`, `facebookuserid`, `newsletterstatus`, `status`,`logo`,`showwebsite`,`eventsheld`,`topeventlocation`) VALUES (NULL, NULL, NULL, '$password', '$email', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, CURRENT_TIMESTAMP, NULL, NULL, NULL,NULL, NULL, NULL,NULL);");
            $user=$this->db->insert_id();
            $newdata = array(
                'email'     => $email,
                'password' => $password,
                'logged_in' => true,
                'id'=> $user
            );

            $this->session->set_userdata($newdata);

          //  $queryorganizer=$this->db->query("INSERT INTO `organizer`(`name`, `description`, `email`, `info`, `website`, `contact`, `user`) VALUES(NULL,NULL,NULL,NULL,NULL,NULL,'$user')");


           return $user;
        }
        else
         return false;


    }
    function login($membershipno,$password,$token,$os)
    {
		$query1=$this->db->query("SELECT `token` FROM `user` WHERE `membershipno`='$membershipno'")->row();

        $password=md5($password);
        $query=$this->db->query("SELECT `id` FROM `user` WHERE `membershipno`='$membershipno' AND `password`= '$password'");
        if($query->num_rows > 0)
        {
            $user=$query->row();
            $user=$user->id;
			$query2=$this->db->query("UPDATE `user` SET `token`='$token',`os`='$os' WHERE `id`='$user'");
            $newdata = array(
                'membershipno' => $membershipno,
                'password' => $password,
                'logged_in' => true,
                'id'=> $user
            );

            $this->session->set_userdata($newdata);
            //print_r($newdata);
			if ($query1->token == "0" || $query1->token == null)
			{
				return $user;
			}
			else
			{
				return -1;
			}
        }
        else {
        		return false;
		}

    }

    function authenticate() {
        $is_logged_in = $this->session->userdata( 'logged_in' );
        //print_r($is_logged_in);
        if ( $is_logged_in !== 'true' || !isset( $is_logged_in ) ) {
            return false;
        } //$is_logged_in !== 'true' || !isset( $is_logged_in )
        else {
            $userid = $this->session->userdata( 'id' );
         return $userid;
        }
    }

    function frontendauthenticate($email,$password)
    {
        $query=$this->db->query("SELECT `id`, `name`, `email`, `accesslevel`, `timestamp`, `status`, `image`, `username`, `socialid`, `logintype`, `json` FROM `user` WHERE `email` LIKE '$email' AND `password`='$password' LIMIT 0,1");
        if ($query->num_rows() > 0)
        {
        	$query=$query->row();
            $data['user']=$query;
            $id=$query->id;
            $status=$query->status;
            if($status==3)
            {
//                $updatequery=$this->db->query("UPDATE `user` SET `status`=4 WHERE `id`='$id'");
                $status=4;
//                if($updatequery)
//                {
                    $this->saveuserlog($id,$status);
//                }
            }
            else if($status==1)
            {
                $status=2;
//                $updatequery=$this->db->query("UPDATE `user` SET `status`=2 WHERE `id`='$id'");
//                if($updatequery)
//                {
                    $this->saveuserlog($id,$status);
//                }
            }

        $query2=$this->db->query("SELECT `id`, `name`, `email`, `accesslevel`, `timestamp`, `status`, `image`, `username`, `socialid`, `logintype`, `json` FROM `user` WHERE `id`='$id' LIMIT 0,1")->row();

        $newdata        = array(
				'id' => $query2->id,
				'email' => $query2->email,
				'name' => $query2->name ,
				'accesslevel' => $query2->accesslevel ,
				'status' => $query2->status ,
				'logged_in' => 'true',
			);
			$this->session->set_userdata( $newdata );


            $accesslevel=$query->accesslevel;
            if($accesslevel==2)
            {
            $data['category']=$this->db->query("SELECT `id`,`categoryid`,`operatorid` FROM `operatorcategory` WHERE `operatorid`='$id'")->result();
            }
        	return $data;
        }
        else
        {
        	return false;
        }
    }

    function frontendregister($name,$email,$password,$socialid,$logintype,$json)
    {
        $data  = array(
			'name' => $name,
			'email' => $email,
			'password' =>md5($password),
			'accesslevel' => 3,
			'status' => 2,
            'socialid'=> $socialid,
            'json'=> $json,
			'logintype' => $logintype
		);
		$query=$this->db->insert( 'user', $data );
		$id=$this->db->insert_id();
        $queryselect=$this->db->query("SELECT * FROM `user` WHERE `id` LIKE '$id' LIMIT 0,1")->row();

        $accesslevel=$queryselect->accesslevel;
//        $queryselect=$query;
        $data1['user']=$queryselect;
        if($accesslevel==2)
        {
            $data1['category']=$this->db->query("SELECT `id`,`categoryid`,`operatorid` FROM `operatorcategory` WHERE `operatorid`='$id'")->result();
        }
        return $data1;
    }

	function getallinfoofuser($id)
	{
		$user = $this->session->userdata('accesslevel');
		$query="SELECT DISTINCT `user`.`id` as `id`,`user`.`firstname` as `firstname`,`user`.`lastname` as `lastname`,`accesslevel`.`name` as `accesslevel`	,`user`.`email` as `email`,`user`.`contact` as `contact`,`user`.`status` as `status`,`user`.`accesslevel` as `access`
		FROM `user`
	   INNER JOIN `accesslevel` ON `user`.`accesslevel`=`accesslevel`.`id`
       WHERE `user`.`id`='$id'";
		$query=$this->db->query($query)->row();
		return $query;
	}

	public function getlogintypedropdown()
	{
		$query=$this->db->query("SELECT * FROM `logintype`  ORDER BY `id` ASC")->result();
		$return=array(
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}

		return $return;
	}

	public function frontendlogout($user)
	{
        $query=$this->db->query("SELECT `id`, `name`, `email`, `accesslevel`, `timestamp`, `status`, `image`, `username`, `socialid`, `logintype`, `json` FROM `user` WHERE `id`='$user' LIMIT 0,1")->row();
        $status=$query->status;
        if($status==4)
        {
            $status=3;
//            $updatequery=$this->db->query("UPDATE `user` SET `status`=3 WHERE `id`='$user'");
//            if($updatequery)
//            {
                $this->saveuserlog($id,$status);
//            }
        }
        else if($status==2)
        {
            $status=1;
//            $updatequery=$this->db->query("UPDATE `user` SET `status`=1 WHERE `id`='$user'");
//            if($updatequery)
//            {
                $this->saveuserlog($id,$status);
//            }
        }
//        $updatequery=$this->db->query("UPDATE `user` SET `status`=5 WHERE `id`='$user'");

//        if(!$updatequery)
//            return 0;
//        else
//        {

		$this->session->sess_destroy();
            return 1;
//        }
	}

	public function pwCall($method, $data) {
		$url = 'https://cp.pushwoosh.com/json/1.3/' . $method;
		$request = json_encode(['request' => $data]);

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
		curl_setopt($ch, CURLOPT_HEADER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $request);

		$response = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);

//				if (true) {
//						print "[PW] request: $request\n";
//						print "[PW] response: $response\n";
//						print "[PW] info: " . print_r($info, true);
//				}

	}
public function sendnotificationold($content, $user) {
	$device=$this->db->query("SELECT `token` FROM `user` WHERE `id`='$user'")->row();
	$device=$device->token;
		$this->pwCall('createMessage', array(
      'application' => "750D7-714E7",
      'auth' => "a0uodqwhBT4RyJwkpunWhMtQ3WkGWVuBVIt35pmMtlWVnNc0rRSFW0fEWHjdZK5bNnnK1IHgmm8IthKE9AhT",
      'notifications' => array(
              array(
                  'send_date' => 'now',
                  'content' => $content,
                  'data' => array('custom' => 'json data'),
                  "devices" =>  array($device)
              )
          )
      )
   );

	}
    public function sendnotification($content, $user) {

	$gettoken=$this->db->query("SELECT `token`,`os` FROM `user` WHERE `id`='$user'")->row();

            $token=$gettoken->token;
            $os=$gettoken->os;
        if($os=="Android")
        {

            define('API_ACCESS_KEY', 'AIzaSyByFozf9MqBMNVVsqvVygA9_10IzHDIzns');
        $registrationIds = array($token);
        // prep the bundle
        $msg = array(
            'message' => $content,
            'title' => 'SWAAP'
        );

        $fields = array(
            'registration_ids' => $registrationIds,
            'data' => $msg,
        );
        $headers = array(
            'Authorization: key='.API_ACCESS_KEY,
            'Content-Type: application/json',
        );
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://android.googleapis.com/gcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        curl_close($ch);
        }
        else
            {
                $pemfile='./uploads/key.pem';
                $certi= './uploads/entrust_2048_ca.cer';
                      // Put your device token here (without spaces):
                $deviceToken = $token;

                // Put your private key's passphrase here:
                $passphrase = '1234';

                // Put your alert message here:
                $message = $content;
                echo $passphrase."         ";
                echo $pemfile;
                ////////////////////////////////////////////////////////////////////////////////

                $ctx = stream_context_create();
                stream_context_set_option($ctx, 'ssl', 'local_cert',$pemfile);
                stream_context_set_option($ctx, 'ssl', 'local_cert',$certi);
                stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

                // Open a connection to the APNS server
                $fp = stream_socket_client(
                    'ssl://gateway.sandbox.push.apple.com:2195', $err,
                    $errstr, 60, STREAM_CLIENT_CONNECT | STREAM_CLIENT_PERSISTENT, $ctx);

//                if (!$fp) {
//                    exit("Failed to connect: $err $errstr".PHP_EOL);
//                }

                //echo 'Connected to APNS' . PHP_EOL;

                // Create the payload body
                $body['aps'] = array(
                    'alert' => $message,
                    'sound' => 'default',
                    );
                print_r($body);
            echo "             ";
                // Encode the payload as JSON
                $payload = json_encode($body);
                print_r($payload);
                // Build the binary notification
                $msg = chr(0).pack('n', 32).pack('H*', $deviceToken).pack('n', strlen($payload)).$payload;

                // Send it to the server
                $result = fwrite($fp, $msg, strlen($msg));
            print_r($result);
            echo $result;
                if (!$result)
    echo 'Message not delivered' . PHP_EOL;
else
    echo 'Message successfully delivered amar'.$message. PHP_EOL;
                // Close the connection to the server
                fclose($fp);

            }


	}

	function addnotificationtodb($message,$userto) {
			$query=$this->db->query("INSERT INTO `notification` (`id`, `user`,`type`, `message`) VALUES (NULL, '$userto',2, '$message')");
	}
	function changeuserimage($user,$imagename) {
			$query=$this->db->query("UPDATE `user` SET `shoplogo`='$imagename' WHERE `id`='$user'" );
			return $imagename;
	}
	function changeshopimage($user,$imagename,$id) {
		if($id=="")
		{
			$query=$this->db->query("INSERT INTO `osb_shopphoto` (`id`, `user`, `photo`) VALUES (NULL, '$user', '$imagename')" );
		}
		else {
			$query=$this->db->query("UPDATE `osb_shopphoto` SET `photo` = '$imagename' WHERE `id` = '$id'" );
		}
		return $imagename;
	}
	function changeproductimage($user,$imagename,$id) {
		if($id=="")
		{
			$query=$this->db->query("INSERT INTO `osb_shopproductphoto` (`id`, `user`, `photo`) VALUES (NULL, '$user', '$imagename')" );
		}
		else {
			$query=$this->db->query("UPDATE `osb_shopproductphoto` SET `photo` = '$imagename' WHERE `id` = '$id'" );
		}
		return $imagename;
	}



    function sociallogin($user_profile,$provider,$os)
    {
        $query=$this->db->query("SELECT * FROM `user` WHERE `user`.`socialid`='$user_profile->identifier'");
        if($query->num_rows == 0)
        {

					$googleid="";
					$facebookid="";
					$twitterid="";
					switch($provider)
					{
						case "Google":
						$googleid=$user_profile->identifier;
						break;
						case "Facebook":
						$facebookid=$user_profile->identifier;
						break;
						case "Twitter":
						$twitterid=$user_profile->identifier;
						break;
					}

            $query2=$this->db->query("INSERT INTO `user` (`id`, `name`, `password`, `email`, `accesslevel`, `timestamp`, `status`, `image`, `username`, `socialid`, `logintype`, `json`, `dob`, `street`, `address`, `city`, `state`, `country`, `pincode`, `facebook`, `google`, `twitter`) VALUES (NULL, '$user_profile->displayName', '', '$user_profile->email', '3', CURRENT_TIMESTAMP, '1', '$user_profile->photoURL', '', '$user_profile->identifier', '$provider', '', '$user_profile->birthYear-$user_profile->birthMonth-$user_profile->birthDay', '', '$user_profile->address,$user_profile->region', '$user_profile->city', '', '$user_profile->country', '', '$facebookid', '$googleid', '$twitterid')");
            $id=$this->db->insert_id();
            $newdata = array(
                'email'     => $user_profile->email,
                'password' => "",
                'logged_in' => true,
                'id'=> $id,
                'name'=> $user_profile->displayName,
                'image'=> $user_profile->photoURL,
                'logintype'=>$provider
            );

            $this->session->set_userdata($newdata);

            return $newdata;

        }
        else
        {
            $query=$query->row();
            $newdata = array(
                'email' => $user_profile->email,
                'password' => "",
                'logged_in' => true,
                'id'=> $query->id,
                'name'=> $user_profile->displayName,
                'image'=> $user_profile->photoURL,
                'logintype'=>$provider
            );

            $this->session->set_userdata($newdata);

            return $newdata;
        }
    }
	public function getonlinestatusdropdown()
	{
		$onlinestatus= array(
			 "1" => "Yes",
			"0" => "No"
			);
		return $onlinestatus;
	}
    public function getmoderateddropdown()
	{
		$moderated= array(
			 "1" => "Accepted",
			 "0" => "Pending",
                         "2" => "Rejected"
			);
		return $moderated;
	}
	public function getshopstatusdropdown()
	{
		$shopstatus= array(
			 "0" => "Online",
			 "1" => "Offline",
			 "2" => "Both"
			);
		return $shopstatus;
	}

	function getidbyemail($useremail)
	{
		$query = $this->db->query("SELECT `id` FROM `user`
		WHERE `email`='$useremail'")->row();
        $userid=$query->id;
		return $userid;
	}


    function forgotpasswordsubmit($password,$userid)
    {
        $password=md5($password);
        $query=$this->db->query("UPDATE `user` SET `password`='$password' WHERE `id`='$userid'");

		if(!$query)
			return  0;
		else
			return  1;
    }
	function exportexcelreport($sd,$ed)
		{

		    $where="";
			if($sd!="" && $ed!="")
			{
			$where.=" AND `osb_transaction`.`timestamp` BETWEEN '$sd' AND '$ed'";
			}
			$this->load->dbutil();
			$query=$this->db->query("SELECT `osb_transaction`.`id` AS `id` , `tab1`.`name` AS `Buyer` , `tab2`.`name` AS `Seller` , `osb_transaction`.`amount` AS `amount` , `osb_transaction`.`payableamount` AS `payableamount` , `osb_transaction`.`timestamp` AS `timestamp` FROM `osb_transaction` LEFT OUTER JOIN `user` as `tab1` ON `tab1`.`id`=`osb_transaction`.`userto` LEFT OUTER JOIN `user` as `tab2` ON `tab2`.`id`=`osb_transaction`.`userfrom` WHERE `osb_transaction`.`userfrom`=1 $where");

		   $content= $this->dbutil->csv_from_result($query);
			$timestamp=new DateTime();
			$timestamp=$timestamp->format('Y-m-d_H.i.s');
			//$data = 'Some file data';

			if ( ! write_file("./uploads/transactionreport_$timestamp.csv", $content))
			{
				 echo 'Unable to write the file';
			}
			else
			{
				redirect(base_url("uploads/transactionreport_$timestamp.csv"), 'refresh');
				 echo 'File written!';
			}
	//        file_put_contents("gs://toykraftdealer/retailerfilefromdashboard_$timestamp.csv", $content);
	//		redirect("http://admin.toy-kraft.com/servepublic?name=retailerfilefromdashboard_$timestamp.csv", 'refresh');
		}
	function exportexcelreport1($sd,$ed)
		{
		    $where="";
			if($sd!="" && $ed!="")
			{
			$where.=" AND `osb_transaction`.`timestamp` BETWEEN '$sd' AND '$ed'";
			}
			$this->load->dbutil();
			$query=$this->db->query("SELECT `osb_transaction`.`id` AS `id` , `tab1`.`name` AS `Seller` , `tab2`.`name` AS `Buyer` , `osb_transaction`.`amount` AS `Barter Amount` , `osb_transaction`.`timestamp` AS `timestamp` FROM `osb_transaction` LEFT OUTER JOIN `user` as `tab1` ON `tab1`.`id`=`osb_transaction`.`userto` LEFT OUTER JOIN `user` as `tab2` ON `tab2`.`id`=`osb_transaction`.`userfrom` WHERE `osb_transaction`.`userfrom`!=1 $where");

		   $content= $this->dbutil->csv_from_result($query);
			$timestamp=new DateTime();
			$timestamp=$timestamp->format('Y-m-d_H.i.s');
			//$data = 'Some file data';

			if ( ! write_file("./uploads/transactionreport_$timestamp.csv", $content))
			{
				 echo 'Unable to write the file';
			}
			else
			{
				redirect(base_url("uploads/transactionreport_$timestamp.csv"), 'refresh');
				 echo 'File written!';
			}
	//        file_put_contents("gs://toykraftdealer/retailerfilefromdashboard_$timestamp.csv", $content);
	//		redirect("http://admin.toy-kraft.com/servepublic?name=retailerfilefromdashboard_$timestamp.csv", 'refresh');
		}

    function exportusercsv()
	{
		$this->load->dbutil();
		$query=$this->db->query("SELECT `id`, `name` as `Name`, `email` as `Email`, `personalcontact` as `Contact`, `timestamp` as `Timestamp`, `shopname` AS `Shop Name`, `membershipno` as `Membership No.`, `address` as `Shop Address`, `website` as `Website`, `shopcontact1` as `Contact1`, `shopcontact2` as `Contact2`, `shopemail` as `Shop Email`, `purchasebalance` as `Purchase Balance`, `salesbalance` AS `Sales Balance`, `billingaddress` as `Address`, `billingcity` as `City`, `billingstate`as `State`, `billingcountry` as `Country`, `billingpincode` as `Pincode` FROM `user` WHERE 1");

       $content= $this->dbutil->csv_from_result($query);
        //$data = 'Some file data';
$timestamp=new DateTime();
        $timestamp=$timestamp->format('Y-m-d_H.i.s');
        if ( ! write_file("./uploads/user_$timestamp.csv", $content))
        {
             echo 'Unable to write the file';
        }
        else
        {
            redirect(base_url("uploads/user_$timestamp.csv"), 'refresh');
             echo 'File written!';
        }
	}
}
?>
