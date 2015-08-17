<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Product_model extends CI_Model
{
	public function createproduct($name,$sku,$description,$price,$status,$category,$user,$quantity,$image,$onlinestatus,$moderated)
	{
		$data  = array(
			'name' => $name,
			'sku' => $sku,
			'description' => $description,
			'price' => $price,
			'quantity' => $quantity,
			'user' => $user,
			'image' => $image,
			'status' => $status,
			'onlinestatus' => $onlinestatus,
			'moderated' => $moderated
		);
//        print_r($data);
		$query=$this->db->insert( 'product', $data );
		$id=$this->db->insert_id();

        if(!empty($category))
		{
			foreach($category as $key => $cat)
			{
				$data1  = array(
					'product' => $id,
					'category' => $cat,
				);
				$query=$this->db->insert( 'productcategory', $data1 );
			}
		}
		return  $id;
	}
	function viewproduct()
	{
	$query=$this->db->query("SELECT `product`.`id`,`product`.`name`,`product`.`user`,`product`.`sku`,`product`.`price`,`product`.`quantity` FROM `product`
		ORDER BY `product`.`id` ASC")->result();
		return $query;
	}
    
	public function beforeeditproduct( $id )
	{
		$this->db->where( 'id', $id );
		$query['product']=$this->db->get( 'product' )->row();
		$product_category=$this->db->query("SELECT `category` FROM `productcategory` WHERE `productcategory`.`product`='$id'")->result();
		$query['product_category']=array();
		foreach($product_category as $cat)
		{
			$query['product_category'][]=$cat->category;
		}
//		$related_product=$this->db->query("SELECT `relatedproduct` FROM `relatedproduct` WHERE `relatedproduct`.`product`='$id'")->result();
//		$query['related_product']=array();
//		foreach($related_product as $pro)
//		{
//			$query['related_product'][]=$pro->relatedproduct;
//		}
		return $query;
	}

	public function editproduct( $id,$name,$sku,$description,$price,$status,$category,$user,$quantity,$image,$onlinestatus,$moderated)
	{
		$data = array(
			'name' => $name,
			'sku' => $sku,
			'description' => $description,
			'price' => $price,
			'quantity' => $quantity,
			'user' => $user,
			'image' => $image,
			'status' => $status,
			'onlinestatus' => $onlinestatus,
			'moderated' => $moderated
		);
		$this->db->where( 'id', $id );
		$q=$this->db->update( 'product', $data );
		$this->db->query("DELETE FROM `productcategory` WHERE `product`='$id'");
		if(!empty($category))
		{
			foreach($category as $key => $cat)
			{
				$data1  = array(
					'product' => $id,
					'category' => $cat,
				);
				$query=$this->db->insert( 'productcategory', $data1 );
			}
		}
//		if($q)
//		{
//			$this->saveproductlog($id,"Product Details Edited");
//		}

		return 1;
	}
	function deleteproduct($id)
	{
		$query=$this->db->query("DELETE FROM `product` WHERE `id`='$id'");
		$this->db->query("DELETE FROM `productcategory` WHERE `product`='$id'");
	}
    
	public function getcategorydropdown()
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
	public function getproductdropdown()
	{
		$query=$this->db->query("SELECT * FROM `product`  ORDER BY `id` ASC")->result();
		$return=array(

		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}

		return $return;
	}

	public function getstatusdropdown()
	{
		$status= array(
			 "1" => "Enabled",
			 "0" => "Disabled",
			);
		return $status;
	}
	
	function viewallimages($id)
	{
		$query=$this->db->query(" SELECT `productimage`.`id` as `id`, `productimage`.`image` as `productimage`,`productimage`.`product` as `productid`,`productimage`.`is_default` as `is_default`,`productimage`.`order` as `order`  FROM `productimage` WHERE `productimage`.`product`='$id' ORDER BY `productimage`.`order` ")->result();
		return $query;
	}
	
	function deleteimage($productimageid,$id)
	{
		$query=$this->db->query("DELETE FROM `productimage` WHERE `product`='$id' AND `id`='$productimageid'");
		if($query)
		{
			$this->saveproductlog($id,"Product Image Deleted");
		}
	}
	
	function changeorder($productimageid,$order,$product)
	{
		$query=$this->db->query("UPDATE `productimage` SET `order`='$order' WHERE `id`='$productimageid' ");
		if($query)
		{
			$this->saveproductlog($product,"Product Image Order Edited");
		}
	}
    
    
	function viewproductimages($id)
	{
		$query="SELECT `id`, `product`, `image`, `order`
        FROM `productimage` 
        WHERE `product`='$id'";
	   
		$query=$this->db->query($query)->result();
		return $query;
	}
	
    public function createproductimages($product,$order,$image)
	{
		$data  = array(
			'product' => $product,
			'image' => $image,
			'order' => $order
		);
		$query=$this->db->insert( 'productimage', $data );
		if(!$query)
			return  0;
		else
			return  1;
	}
    
	public function beforeeditproductimages( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'productimage' )->row();
		return $query;
	}
    
	public function getproductimagesbyid($id)
	{
		$query=$this->db->query("SELECT `image` FROM `productimage` WHERE `id`='$id'")->row();
		return $query;
	}
     
	public function editproductimages($id,$order,$image,$product)
	{
		$data  = array(
			'product' => $product,
			'image' => $image,
			'order' => $order
		);
		
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'productimage', $data );
        
		return 1;
	}
    
	function deleteproductimages($id)
	{
		$query=$this->db->query("DELETE FROM `productimage` WHERE `id`='$id'");
	}
    
	public function getproductimagebyid($id)
	{
		$query=$this->db->query("SELECT `image` FROM `product` WHERE `id`='$id'")->row();
		return $query;
	}
    public function getsalesbalance($id,$name,$sku,$description,$price,$status,$category,$user,$quantity,$image,$onlinestatus,$moderated){
    $query=$this->db->query("SELECT `salesbalance` FROM `user` WHERE `id`='$user'")->row();
        $salesbalance=$query->salesbalance;
        $newprice=$price*$quantity;
        $newfinalprice=$newprice+$salesbalance;
        $query1=$this->db->query("UPDATE `user` SET `salesbalance`='$newfinalprice' WHERE `id`='$user'");
        $this->user_model->sendnotification("Your Product named as:".$name."<br>price: ".$price."<br> quantity ".$quantity." is rejected AND ".$newprice." is added to your sales balance",$user);
        if($query1)
            return 1;
        else 
            return 0;
    }
    public function approveproduct($id,$name,$sku,$description,$price,$status,$category,$user,$quantity,$image,$onlinestatus,$moderated){
     $query=$this->db->query("SELECT `salesbalance` FROM `user` WHERE `id`='$user'")->row();
        $salesbalance=$query->salesbalance;
        $newprice=$price*$quantity;
        $newfinalprice=$salesbalance-$newprice;
        $query1=$this->db->query("UPDATE `user` SET `salesbalance`='$newfinalprice' WHERE `id`='$user'");
        $this->user_model->sendnotification("Your Product named as: ".$name."<br>price: ".$price."<br>quantity ".$quantity." is approved AND ".$newprice." is deducted from your sales balance",$user);
        
        if($query1)
            return 1;
        else 
            return 0;
    }
}
?>
