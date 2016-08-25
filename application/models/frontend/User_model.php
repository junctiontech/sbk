<?php
class User_model extends CI_Model
{
	
	public function get_wishlistcount($table,$where){
		$this->db->select('productID');
		$this->db->from($table);
		$this->db->where($where);
		$query=$this->db->get();
		return $query->result();
	}
	
	public function addwishlist($table,$data){
		$this->db->insert($table,$data);
	}
	public function getuserwishlist($userID)
	{ 
		$this->db->select('t1.productID,t1.userWishListID, t2.imageName,t3.productName, t4.productPrice,productShopUrl, t5.shopName');
		$this->db->from('s4k_user_wishlist t1');
		$this->db->join('s4k_product_images_map t2','t1.productID=t2.productsID','left');
		$this->db->join('s4k_products_map t3','t1.productID=t3.productsID','left');
		$this->db->join('s4k_product_price_map t4','t1.productID=t4.productsID','left');
		$this->db->join('s4k_shops t5','t4.shopID=t5.shopID','left');
		$this->db->where('userID',$userID);
		$userwishlist=$this->db->get();
		return $userwishlist->result();
	}  
	public function delete ($table, $where)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function PersonalInformation($userID)
	{
		$this->db->where('userID', $userID);
		$personal=$this->db->get('s4k_user');
		return $personal->result();
	}
	public function userprofileupdate($table,$data, $userID)
	{ 
		$this->db->where('userID',$userID);
		$this->db->update($table, $data);
	}
	public function getpassword ($userID)
	{
		$this->db->select('userPassword');
		$this->db->from('s4k_user');
		$this->db->where('userID',$userID);
		$pass = $this->db->get();
		return $pass->result();
	}
	public function updatepssword($table, $data, $userID)
	{
		$this->db->where('userID',$userID);
		$this->db->update($table, $data);
	}
	public function DeactiveteAccount($data=false, $userID=false)
	{
		$this->db->where('userID',$userID);
		$this->db->update('s4k_user', $data);
	}
	public function get_notify($where=false)
	{
		$this->db->where(array ('userID'=>$where));
		$query=$this->db->get('s4k_notify');	
		return $query->result();
	}
	
}