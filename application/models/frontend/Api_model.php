<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api_model extends CI_Model {
	
	public function __construct(){
		parent::__construct();
		
		$this->load->database();
	}
	
	public function insert_category($categoryarray=false,$key=false){
		$this->db->insert('s4k_categories',$categoryarray);
		if($this->db->insert_id()){
			$key=explode('_',$key);
			$key=implode(' ',$key);
		$categorydetails=array('categoriesID'=>$this->db->insert_id(),'languageID'=>1,'categoryName'=>ucwords($key));
		$this->db->insert('s4k_category_details',$categorydetails);
		}
	}
	
	
	
}

?>