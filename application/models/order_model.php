<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Order_model extends CI_Model
{
    function placelimited($name,$email,$address)
    {
        $query=$this->db->query("SELECT `id` FROM `limitedstock` WHERE `email`='$email'");
        if($query->num_rows == 0)
        {
            $this->db->query("INSERT INTO `newsletterusers`(`email`, `status`) VALUES ('$email','0')");
            $query=$this->db->query("INSERT INTO `limitedstock`(`name`, `email`, `address`) VALUES ('$name','$email','$address')");
            return true;
        }else{
            return false;
        }
    }
	function getorderstatus1($orderstatus)
	{
		$query="SELECT `name` FROM `orderstatus` WHERE `id`='$orderstatus'";   
		$query=$this->db->query($query)->row();
		return $query;
	}
    // pwerpoint page 2
    function bestsellingalltime()
	{
		$query="SELECT count(product) as `prodcount`,`orderitems`.`product`,`product`.* FROM `orderitems` INNER JOIN `product` ON `orderitems`.`product`=`product`.`id` group by `product`  order by count(product) desc LIMIT 10";   
		$query=$this->db->query($query)->result();
		return $query;
	}
      function bestsellingcmonth()
	{
		$query="SELECT count(product) as `prodcount` ,`order`.`timestamp` as `timestamp`,`product`.* FROM `orderitems` INNER JOIN `order` ON 
`orderitems`.`order`=`order`.`id` INNER JOIN `product` ON `product`.`id`=`orderitems`.`product` Where MONTH
(timestamp)=MONTH(CURDATE()) group by `product` order by count(product) desc LIMIT 10";   
		$query=$this->db->query($query)->result();
		return $query;
	} 
    function viewbyyear()
	{
		$query="SELECT count(couponcode) as `couponyear`,`couponcode`,YEAR(enddate) as `enddate`  FROM `discountcoupon` Where YEAR(enddate)=YEAR(CURDATE()) group by `couponcode` order by count(couponcode) desc limit 1";   
		$query=$this->db->query($query)->result();
		return $query;
	} 
        
   function viewbymonth()
	{
		$query="SELECT count(couponcode) as `couponmonth`,`couponcode`,MONTH(enddate) as `enddate`  FROM `discountcoupon` Where MONTH(enddate)=MONTH
(CURDATE()) group by `couponcode` order by count(couponcode) desc limit 1";   
		$query=$this->db->query($query)->result();
		return $query;
	}
    function searchlogalltime()
	{
		$query="SELECT count(product) as `totalprouct`,product,`product`.* from `productsearchlog` LEFT OUTER JOIN `product` ON `product`.`id`=`productsearchlog`.`product` group by `product` order by count(product) desc LIMIT 10";   
		$query=$this->db->query($query)->result();
		return $query;
	} 
    function searchlogbymonth()
	{
		$query="SELECT count(product) as `totalprouct`,product,`product`.* from `productsearchlog` LEFT OUTER JOIN `product` ON `product`.`id`=`productsearchlog`.`product` Where Month(timestamp)=Month(CURDATE()) group by 
        `product` order by count(product) desc LIMIT 10";   
		$query=$this->db->query($query)->result();
		return $query;
	}
    function viewlogbymonth()
	{
		$query="SELECT count(product) as `totalprouct`,product,`product`.* from `productviewlog` LEFT OUTER JOIN `product` ON `product`.`id`=`productviewlog`.`product`Where Month(timestamp)=Month(CURDATE())  group by `product` order by count(product) desc limit 10";   
		$query=$this->db->query($query)->result();
		return $query;
	}
    function viewlogalltime()
	{
		$query="SELECT count(product) as `totalprouct`,product,`product`.*  from `productviewlog` LEFT OUTER JOIN `product` ON `product`.`id`=`productviewlog`.`product` group by `product` order by count(product) desc 
        LIMIT 10";   
		$query=$this->db->query($query)->result();
		return $query;
	} 

	function vieworder()
	{
		$query="SELECT `order`.`id` as `id`,`order`.`firstname` as `firstname`,`order`.`lastname` as `lastname`,`order`.`user` as `user`,`order`.`orderstatus` as `orderstatusid`,`orderstatus`.`name` as `orderstatus`,`order`.`totalamount`,`order`.`discountamount`,`order`.`finalamount`,`order`.`trackingcode`,`order`.`timestamp` FROM `order` 	
		LEFT OUTER JOIN  `user` ON `user`.`id`=`order`.`user`
		LEFT OUTER JOIN `orderstatus` ON `orderstatus`.`id`=`order`.`orderstatus`
		LEFT OUTER JOIN `currency` ON `currency`.`id`=`order`.`currency`
        WHERE `order`.`orderstatus` <> 1
		ORDER BY `order`.`timestamp` DESC";   
		$query=$this->db->query($query)->result();
		return $query;
	}
	function viewpendingorder()
	{
		$query="SELECT `order`.`id` as `id`,`order`.`firstname` as `firstname`,`order`.`lastname` as `lastname`,`order`.`user` as `user`,`order`.`orderstatus` as `orderstatusid`,`orderstatus`.`name` as `orderstatus`,`order`.`totalamount`,`order`.`discountamount`,`order`.`finalamount`,`order`.`trackingcode`,`order`.`timestamp` FROM `order` 	
		LEFT OUTER JOIN  `user` ON `user`.`id`=`order`.`user`
		LEFT OUTER JOIN `orderstatus` ON `orderstatus`.`id`=`order`.`orderstatus`
		LEFT OUTER JOIN `currency` ON `currency`.`id`=`order`.`currency`
        WHERE `order`.`orderstatus` ='1'
		ORDER BY `order`.`timestamp` DESC";   
		$query=$this->db->query($query)->result();
		return $query;
	}
    function viewprocessingorder()
	{
		$query="SELECT `order`.`id` as `id`,`order`.`firstname` as `firstname`,`order`.`lastname` as `lastname`,`order`.`user` as `user`,`order`.`orderstatus` as `orderstatusid`,`orderstatus`.`name` as `orderstatus`,`order`.`totalamount`,`order`.`discountamount`,`order`.`finalamount`,`order`.`trackingcode`,`order`.`timestamp` FROM `order` 	
		LEFT OUTER JOIN  `user` ON `user`.`id`=`order`.`user`
		LEFT OUTER JOIN `orderstatus` ON `orderstatus`.`id`=`order`.`orderstatus`
		LEFT OUTER JOIN `currency` ON `currency`.`id`=`order`.`currency`
        WHERE `order`.`orderstatus` ='2'
		ORDER BY `order`.`timestamp` DESC";   
		$query=$this->db->query($query)->result();
		return $query;
	} 
    function viewabandondorder()
	{
		$query="SELECT `usercart`.`user`, `usercart`.`product`, `usercart`.`quantity`, `usercart`.`status`, `usercart`.`timestamp`,`user`.`name` AS `username`,`product`.`name` AS `productname` FROM `usercart` LEFT OUTER JOIN `user` ON `user`.`id`=`usercart`.`user` LEFT OUTER JOIN `product` ON `product`.`id`=`usercart`.`product`";   
		$query=$this->db->query($query)->result();
		return $query;
	} 
    function viewabandondorderold()
	{
		$query="SELECT `order`.`id` as `id`,`order`.`firstname` as `firstname`,`order`.`lastname` as `lastname`,`order`.`user` as `user`,`order`.`orderstatus` as `orderstatusid`,`orderstatus`.`name` as `orderstatus`,`order`.`totalamount`,`order`.`discountamount`,`order`.`finalamount`,`order`.`trackingcode`,`order`.`timestamp` FROM `order` 	
		LEFT OUTER JOIN  `user` ON `user`.`id`=`order`.`user`
		LEFT OUTER JOIN `orderstatus` ON `orderstatus`.`id`=`order`.`orderstatus`
		LEFT OUTER JOIN `currency` ON `currency`.`id`=`order`.`currency`
        WHERE `order`.`orderstatus` ='5'
		ORDER BY `order`.`timestamp` DESC";   
		$query=$this->db->query($query)->result();
		return $query;
	}
    function viewfailedorder()
	{
		$query="SELECT `order`.`id` as `id`,`order`.`firstname` as `firstname`,`order`.`lastname` as `lastname`,`order`.`user` as `user`,`order`.`orderstatus` as `orderstatusid`,`orderstatus`.`name` as `orderstatus`,`order`.`totalamount`,`order`.`discountamount`,`order`.`finalamount`,`order`.`trackingcode`,`order`.`timestamp` FROM `order` 	
		LEFT OUTER JOIN  `user` ON `user`.`id`=`order`.`user`
		LEFT OUTER JOIN `orderstatus` ON `orderstatus`.`id`=`order`.`orderstatus`
		LEFT OUTER JOIN `currency` ON `currency`.`id`=`order`.`currency`
        WHERE `order`.`orderstatus` ='5'
		ORDER BY `order`.`timestamp` DESC";   
		$query=$this->db->query($query)->result();
		return $query;
	}
    
	function getusercart($user)
	{
		$query="SELECT `product`.`name`,`product`.`price`, `product`.`wholesaleprice`,`product`.`firstsaleprice`,`usercart`.`user`,`usercart`.`product`,`usercart`.`quantity`,`product`.`id` FROM `product` LEFT JOIN `usercart` ON `product`.`id`=`usercart`.`product` WHERE `usercart`.`user`='$user'";   
		$query=$this->db->query($query)->result();
		return $query;
	}
    function addtocart($user,$product,$quantity)
    {
        $query=$this->db->query("SELECT `user`, `product`, `quantity`, `status`, `timestamp` FROM `usercart` WHERE `user`='$user' AND `product`='$product'");
        if($query->num_rows > 0)
        {
            $query=$this->db->query("UPDATE `usercart` SET `quantity`='$quantity' WHERE '$user'");
        }
        else
        {
            $query=$this->db->query("INSERT INTO `usercart`(`user`, `product`, `quantity`) VALUES ('$user','$product','$quantity')");
        }
    }
    function placeorder($user,$firstname,$lastname,$email,$billingaddress,$billingcity,$billingstate,$billingcountry,$shippingaddress,$shippingcity,$shippingcountry,$shippingstate,$shippingpincode,$billingpincode,$phone,$status,$company,$fax,$carts,$finalamount,$shippingmethod)
	{
        
        $mysession=$this->session->all_userdata();
        
        $query=$this->db->query("INSERT INTO `order`(`user`, `firstname`, `lastname`, `email`, `billingaddress`, `billingcity`, `billingstate`, `billingcountry`, `shippingaddress`, `shippingcity`, `shippingcountry`, `shippingstate`, `shippingpincode`, `finalamount`, `billingpincode`,`shippingmethod`,`orderstatus`) VALUES ('$user','$firstname','$lastname','$email','$billingaddress','$billingcity','$billingstate','$billingcountry','$shippingaddress','$shippingcity','$shippingcountry','$shippingstate','$shippingpincode','$finalamount','$billingpincode','$shippingmethod','1')");
        
        
        $order=$this->db->insert_id();
        $mysession["orderid"]=$order;
        $this->session->set_userdata($mysession);
        foreach($carts as $cart)
        {
            
            
            $querycart=$this->db->query("INSERT INTO `orderitems`(`order`, `product`, `quantity`, `price`, `finalprice`) VALUES ('$order','".$cart['id']."','".$cart['qty']."','".$cart['price']."','".$cart['subtotal']."')");
            $quantity=intval($cart['qty']);
            $productid=$cart['id'];
            $this->db->query("UPDATE `product` SET `product`.`quantity`=`product`.`quantity`-$quantity WHERE `product`.`id`='$productid'");
            
            
        }
        
        $userquery=$this->db->query("UPDATE `user` SET `firstname`='$firstname',`lastname`='$lastname',`phone`='$phone',`status`='$status',`billingaddress`='$billingaddress',`billingcity`='$billingcity',`billingstate`='$billingstate',`billingcountry`='$billingcountry',`shippingaddress`='$shippingaddress',`shippingcity`='$shippingcity',`shippingcountry`='$shippingcountry',`shippingstate`='$shippingstate',`shippingpincode`='$shippingpincode',`companyname`='$company',`fax`='$fax' WHERE `id`='$user'");
		return $order;
	}
	
	/*function placeorder($user,$firstname,$lastname,$email,$billingaddress,$billingcity,$billingstate,$billingcountry,$shippingaddress,$shippingcity,$shippingcountry,$shippingstate,$shippingpincode,$billingpincode,$phone,$status,$company,$fax,$carts)
	{
		$query=$this->db->query("INSERT INTO `order`(`user`, `firstname`, `lastname`, `email`, `billingaddress`, `billingcity`, `billingstate`, `billingcountry`, `shippingaddress`, `shippingcity`, `shippingcountry`, `shippingstate`, `shippingpincode`, `billingpincode`) VALUES ('$user','$firstname','$lastname','$email','$billingaddress','$billingcity','$billingstate','$billingcountry','$shippingaddress','$shippingcity','$shippingcountry','$shippingstate','$shippingpincode','$billingpincode')");
        
       
        $userquery=$this->db->query("UPDATE `user` SET `firstname`='$firstname',`lastname`='$lastname',`phone`='$phone',`status`='$status',`billingaddress`='$billingaddress',`billingcity`='$billingcity',`billingstate`='$billingstate',`billingcountry`='$billingcountry',`shippingaddress`='$shippingaddress',`shippingcity`='$shippingcity',`shippingcountry`='$shippingcountry',`shippingstate`='$shippingstate',`shippingpincode`='$shippingpincode',`companyname`='$company',`fax`='$fax' WHERE `id`='$user'");
		return $order;
	}*/
	
	public function beforeedit( $id )
	{
		$this->db->where( 'id', $id );
		$query['order']=$this->db->get( 'order' )->row();
		$query['orderitems']=$this->db->query("SELECT `orderitems`.`quantity`,`orderitems`.`price`,`product`.`name` as `productname`,`product`.`id` as `product`,`productcategory`.`category`,`orderitems`.`product`,`orderitems`.`finalprice`,`orderitems`.`discount`,`osb_category`.`name` as `categoryname` FROM `orderitems`
		INNER JOIN `product` ON `orderitems`.`product`=`product`.`id` AND `orderitems`.`order`='$id'
		INNER JOIN `productcategory` ON `productcategory`.`product`=`product`.`id`
		INNER JOIN `osb_category` ON `productcategory`.`category`=`osb_category`.`id`
		")->result();
		return $query;
	}
	public function beforeedititem( $id )
	{
		$query['orderitems']=$this->db->query("SELECT * FROM `orderitems` WHERE `orderitems`.`id`='$id'")->result();
		return $query;
	}
	
	public function edit($id,$user,$firstname,$email,$contactno,$billingaddress,$billingcity,$billingstate,$billingcountry,$shippingaddress,$shippingcity,$shippingstate,$shippingcountry,$shippingpincode,$orderstatus,$trackingcode,$transactionid,$logisticcharge)
	{
		
		$data  = array(
			'user' => $user,
			'name' => $firstname,
			'email' => $email,
			'contactno' => $contactno,
			'billingaddress' => $billingaddress,
			'billingcity' => $billingcity,
			'billingstate' => $billingstate,
			'billingcountry' => $billingcountry,
			'shippingaddress' => $shippingaddress,
			'shippingcity' => $shippingcity,
			'shippingstate' => $shippingstate,
			'shippingcountry' => $shippingcountry,
			'shippingpincode' => $shippingpincode,
			'orderstatus' =>$orderstatus,
			'trackingcode' => $trackingcode,
			'transactionid' => $transactionid,
			'logisticcharge' => $logisticcharge
		);
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'order', $data );
		
//		if($query)
//		{
//			$user = $this->session->userdata('id');
//			$action ="Order Address Updated";
//			$data2  = array(
//				'user' => $user,
//				'order' => $id,
//				'action' => $action,
//			);
//			$query2=$this->db->insert( 'orderlog', $data2 );
//		}
		//$this->db->query("DELETE FROM `orderitems` WHERE `order`='$id'");
		/*foreach($product as $key => $productid)
		{
			$productetail=$this->db->query("SELECT * FROM `product` WHERE `id`='$productid'")->row();
			$productdata = array(
				'order' => $id,
				'product' => $productid,
				'quantity' => $quantity[$key],
				'price' => $productprice[$key],
			);
			$this->db->insert( 'orderitems', $productdata );
		}*/
		return 1;
	}
    public function updateorderitem($id,$order,$product,$price,$quantity,$discount,$finalprice)
	{
		
		$data  = array(
			'order' => $order,
			'product' => $product,
			'price' => $price,
			'quantity' => $quantity,
			'discount' => $discount,
			'finalprice' => $finalprice
		);
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'orderitems', $data );
    }
    
    
    public function createorder($user,$firstname,$email,$contactno,$billingaddress,$billingcity,$billingstate,$billingcountry,$shippingaddress,$shippingcity,$shippingstate,$shippingcountry,$shippingpincode,$orderstatus,$trackingcode,$transactionid,$logisticcharge)
	{
		
		$data  = array(
			'user' => $user,
			'name' => $firstname,
			'email' => $email,
			'contactno' => $contactno,
			'billingaddress' => $billingaddress,
			'billingcity' => $billingcity,
			'billingstate' => $billingstate,
			'billingcountry' => $billingcountry,
			'shippingaddress' => $shippingaddress,
			'shippingcity' => $shippingcity,
			'shippingstate' => $shippingstate,
			'shippingcountry' => $shippingcountry,
			'shippingpincode' => $shippingpincode,
			'orderstatus' =>$orderstatus,
			'trackingcode' => $trackingcode,
			'transactionid' => $transactionid,
			'logisticcharge' => $logisticcharge
		);
		$query=$this->db->insert( 'order', $data );
		
//		if($query)
//		{
//			$user = $this->session->userdata('id');
//			$action ="Order Address Updated";
//			$data2  = array(
//				'user' => $user,
//				'action' => $action,
//			);
//			$query2=$this->db->insert( 'orderlog', $data2 );
//		}
		//$this->db->query("DELETE FROM `orderitems` WHERE `order`='$id'");
		/*foreach($product as $key => $productid)
		{
			$productetail=$this->db->query("SELECT * FROM `product` WHERE `id`='$productid'")->row();
			$productdata = array(
				'order' => $id,
				'product' => $productid,
				'quantity' => $quantity[$key],
				'price' => $productprice[$key],
			);
			$this->db->insert( 'orderitems', $productdata );
		}*/
		return 1;
	}
    public function createorderitems($order,$product,$price,$quantity,$discount,$finalprice)
	{
		
		$data  = array(
			'order' => $order,
			'product' => $product,
			'price' => $price,
			'quantity' => $quantity,
			'discount' => $discount,
			'finalprice' => $finalprice
		);
		$query=$this->db->insert( 'orderitems', $data );
		return 1;
	}
	
    function deleteorderitem($id)
	{
		$query=$this->db->query("DELETE FROM `orderitems` WHERE `id`='$id'");
	}
    function getPendingOrderCount()
	{
		$query=$this->db->query("SELECT COUNT(*) as `ordercount` FROM `order` WHERE `orderstatus`=1")->row();
        $queryorder=$query->ordercount;
        return $queryorder;
	}
    
	public function getuser()
	{
		$query=$this->db->query("SELECT * FROM `user` ORDER BY `name` ASC" )->result();
		$return=array(
		
		);
		
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		return $return;
	}
	public function getorderstatus()
	{
		$query=$this->db->query("SELECT * FROM `orderstatus` ORDER BY `name` ASC" )->result();
		$return=array(
		
		);
		
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		return $return;
	}
	function getproductbycategory($category)
	{
		$query=$this->db->query("SELECT `product`.`id`,`product`.`name` FROM `product`
		INNER JOIN `productcategory` ON `product`.`id`=`productcategory`.`product` AND `productcategory`.`category`='$category'
		ORDER BY `name` ASC" )->result();
		
		return $query;
	}
	function getproductdetails($category,$product)
	{
		$query=$this->db->query("SELECT `product`.`id`,`product`.`name`,`category`.`name` as `categoryname`,`product`.`price`,`product`.`wholesaleprice`,`product`.`firstsaleprice`,`product`.`secondsaleprice`,`product`.`specialpricefrom`,`product`.`specialpriceto` FROM `product`
		INNER JOIN `productcategory` ON `product`.`id`=`productcategory`.`product` 
		INNER JOIN `category` ON `category`.`id`=`productcategory`.`category` 
		AND `category`.`id`='$category'
		ORDER BY `name` ASC" )->row();
		
		return $query;
	}
    
	function getorderitem($id)
	{
//        echo $id;
        $query=$this->db->query("SELECT `orderitems`.`id`,`order`.`name`,`orderitems`.`order`,`orderitems`.`product`,`product`.`name` AS `productname`,`product`.`sku`, `orderitems`.`quantity`,`orderitems`.`price`,`orderitems`.`discount`,`orderitems`.`finalprice` ,`productimage`.`image`
        
        FROM `orderitems`
		LEFT OUTER JOIN `order` ON `order`.`id`=`orderitems`.`order` 
		LEFT OUTER JOIN `product` ON `product`.`id`=`orderitems`.`product`
		LEFT OUTER JOIN `productimage` ON `productimage`.`product`=`orderitems`.`product`
        WHERE `orderitems`.`order`='$id'
        " )->result();
		
		return $query;
	}
    
    
	public function getorderdropdown()
	{
		$query=$this->db->query("SELECT * FROM `order`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->firstname." ".$row->lastname;
		}
		
		return $return;
	}
    
//    function exportordercsv()
//	{
//		$this->load->dbutil();
//		$query=$this->db->query("SELECT `order`.`id` as `id`,`order`.`firstname` as `firstname`,`order`.`lastname` as `lastname`,`order`.`user` as `user`,`order`.`orderstatus` as `orderstatusid`,`orderstatus`.`name` as `orderstatus`,`order`.`totalamount`,`order`.`discountamount`,`order`.`finalamount`,`order`.`trackingcode`,`order`.`timestamp` FROM `order` 	
//		LEFT OUTER JOIN  `user` ON `user`.`id`=`order`.`user`
//		LEFT OUTER JOIN `orderstatus` ON `orderstatus`.`id`=`order`.`orderstatus`
//		LEFT OUTER JOIN `currency` ON `currency`.`id`=`order`.`currency`
//		ORDER BY `order`.`timestamp` DESC");
//
//       $content= $this->dbutil->csv_from_result($query);
//        //$data = 'Some file data';
//
//        if ( ! write_file('./csvgenerated/orderfile.csv', $content))
//        {
//             echo 'Unable to write the file';
//        }
//        else
//        {
//            redirect(base_url('csvgenerated/orderfile.csv'), 'refresh');
//             echo 'File written!';
//        }
//	}
    function exportorderitemcsv()
	{
		$this->load->dbutil();
		$query=$this->db->query("SELECT `order`.`id` AS `Order ID`,`order`.`timestamp` AS `Date`,'Completed' AS `Order status`,'0' AS `Shipping`,'0' AS `Shipping Tax`,'0' AS `OrderDiscount`,`product`.`id` AS `ProductID`,`product`.`name` AS `Item Name`,`product`.`price` AS `Item Amount`,`product`.`quantity`AS`Quantity`, `order`.`email` AS `Email`
        FROM `orderitems`
		INNER JOIN `order` ON `order`.`id`=`orderitems`.`order` 
		INNER JOIN `product` ON `product`.`id`=`orderitems`.`product`");

       $content= $this->dbutil->csv_from_result($query);
        //$data = 'Some file data';

        if ( ! write_file('./csvgenerated/orderitemfile.csv', $content))
        {
             echo 'Unable to write the file';
        }
        else
        {
            redirect(base_url('csvgenerated/orderitemfile.csv'), 'refresh');
             echo 'File written!';
        }
	}
    
//	function getorderitemforchange($id)
//	{
//        $query=$this->db->query("SELECT `order`.`id` AS `Order ID`,`order`.`timestamp` AS `Date`,'Completed' AS `Order status`,'0' AS `Shipping`,'0' AS `Shipping Tax`,'0' AS `OrderDiscount`,`product`.`id` AS `ProductID`,`product`.`name` AS `Item Name`,`product`.`price` AS `Item Amount`,`product`.`quantity`AS`Quantity`, `order`.`email` AS `Email`
//        FROM `orderitems`
//		INNER JOIN `order` ON `order`.`id`=`orderitems`.`order` 
//		INNER JOIN `product` ON `product`.`id`=`orderitems`.`product`
//        " )->result();
//		
//		return $query;
//	}
    
    function emailcustomerdiscount()
    {
        $date = new DateTime('7 days ago');
        $date=$date->format('Y-m-d');
        $query=$this->db->query("SELECT `order`.`id` as `id`,`order`.`firstname` as `firstname`,`order`.`lastname` as `lastname`,`order`.`email` as `email`,`order`.`user` as `user`,`order`.`orderstatus` as `orderstatusid`,`orderstatus`.`name` as `orderstatus`,`order`.`totalamount`,`order`.`discountamount`,`order`.`finalamount`,`order`.`trackingcode`,DATE(`order`.`timestamp`) AS `timestamp` FROM `order` 	
		LEFT OUTER JOIN  `user` ON `user`.`id`=`order`.`user`
		LEFT OUTER JOIN `orderstatus` ON `orderstatus`.`id`=`order`.`orderstatus`
		LEFT OUTER JOIN `currency` ON `currency`.`id`=`order`.`currency`
WHERE DATE(`order`.`timestamp`) = '$date'")->result();
        foreach($query as $row)
        {
            $email=$row->email;
        $email = explode(",", $email);
//            $email=$this->input->get('email');
//            $orderid=$this->input->get('orderid');
            $this->load->library('email');
            $this->email->from('lyla@lylaloves.co.uk', 'Lyla');
            $this->email->to($email);

            $this->email->subject('Lyla');
            $this->email->message('Thank You.<br><img src="http://zibacollection.co.uk/lylalovecouk/img/orderlyla.jpg" width="560px" height="398px">');
          // $this->email->html('<b>hello</b>');

            $this->email->send();

            $data["message"]=$this->email->print_debugger();
            $this->load->view("json",$data);
        
        }
        
        
    }
    
         function particularorders($id)
         {
           $query=$this->db->query("SELECT `order`.`id` as `id`,`order`.`firstname` as `firstname`,`order`.`lastname` as `lastname`,`order`.`user` as `user`,`order`.`orderstatus` as `orderstatusid`,`orderstatus`.`name` as `orderstatus`,`order`.`totalamount`,`order`.`discountamount`,`order`.`finalamount`,`order`.`trackingcode`,`order`.`timestamp` FROM `order` 	
		LEFT OUTER JOIN  `user` ON `user`.`id`=`order`.`user`
		LEFT OUTER JOIN `orderstatus` ON `orderstatus`.`id`=`order`.`orderstatus`
		LEFT OUTER JOIN `currency` ON `currency`.`id`=`order`.`currency`
        WHERE `order`.`user`='$id'
		ORDER BY `order`.`timestamp` DESC")->result();
           return $query;
         }
    
	function getuserorders($id)
	{
        $query=$this->db->query("SELECT `order`.`id` AS `id` , `product`.`name` AS `productname` , DATE(`order`.`timestamp`) AS `date` , `product`.`sku` AS `sku` , `orderitems`.`quantity` AS `quantity` , `orderitems`.`price` AS `price` , `order`.`orderstatus` AS `status` , `orderstatus`.`name` AS `orderstatusname` , 1 
        FROM `orderitems` 
        INNER JOIN `order` ON `order`.`id`=`orderitems`.`order` 
        INNER JOIN `product` ON `product`.`id`=`orderitems`.`product` 
        LEFT OUTER JOIN `orderstatus` ON `orderstatus`.`id`=`order`.`orderstatus` 
        WHERE `order`.`user`='$id' 
        ORDER BY `order`.`id` DESC")->result();
//		if(!$query)
//			return  0;
//		else
			return  $query;
	}
    
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
	public function getcountry()
	{
		$query=$this->db->query("SELECT * FROM `country`  ORDER BY `name` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
            $return[$row->name]=$row->name;
		}

		return $return;
	}
    function exportordercsv()
	{
		$this->load->dbutil();
		$query=$this->db->query("SELECT `order`.`id`, `user`.`name` as `username`, `order`.`name`, `order`.`email`, `order`.`contactno`, `order`.`billingaddress`, `order`.`billingcity`, `order`.`billingstate`, `order`.`billingcountry`, `order`.`billingpincode`, `order`.`timestamp`,`product`.`name` as `Product Name`, `orderitems`.`quantity`, `orderitems`.`price`, `orderitems`.`finalprice` FROM `order` LEFT OUTER JOIN `user` ON `user`.`id`=`order`.`user` LEFT OUTER JOIN `orderitems` ON `orderitems`.`order`=`order`.`id` LEFT OUTER JOIN `product` ON `product`.`id`=`orderitems`.`product` WHERE 1");

       $content= $this->dbutil->csv_from_result($query);
        //$data = 'Some file data';
$timestamp=new DateTime();
        $timestamp=$timestamp->format('Y-m-d_H.i.s');
        if ( ! write_file("./uploads/order_$timestamp.csv", $content))
        {
             echo 'Unable to write the file';
        }
        else
        {
            redirect(base_url("uploads/order_$timestamp.csv"), 'refresh');
             echo 'File written!';
        }
	}
}
?>