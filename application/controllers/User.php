<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Controller for User Functionality */
class User extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->data[]="";
		$timezone = "Asia/Calcutta";
		if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
		if (!$this->session->userdata('searchb4kharch')){ $this->session->set_flashdata('category_error_login', " Your Session Is Expired!! Please Login Again. "); redirect("Login");}
		$this->userinfos=$this->data['userinfos']=$this->session->userdata('searchb4kharch');
		$this->load->model('frontend/Login_model');
		$this->load->model('frontend/User_model');
		$this->load->model('frontend/Landingpage_model');
		$this->load->library('form_validation');
		$this->data['base_url']=base_url();
		$this->data['categories']=$categories=$this->Landingpage_model->get_categories();
			$this->data['topbrands']=$topbrand=$this->Landingpage_model->get_topbrand();
			$this->data['dealsgategorys']=$dealsgategorys=$this->Landingpage_model->get_dealsgategory();
		$wishlist=$this->User_model->get_wishlistcount('s4k_user_wishlist',array('userID'=>$this->userinfos['userID'],'Status'=>'Active'));
		$this->data['whislist']=count($wishlist);
		foreach($wishlist as $wishlists){
		$this->data['whislistproduct'][]=$wishlists->productID;
		}
	}
	
	public function display($template_file){
		$this->parser->parse('frontend/Header',$this->data);
		$this->load->view($template_file, $this->data);
		$this->parser->parse('frontend/Footer',$this->data);
	}
	
	public function dashboard()
	{	
		$this->parser->parse('frontend/Header',$this->data);
		$this->parser->parse('frontend/Leftheader',$this->data);
		$this->parser->parse('frontend/Dashboard',$this->data);
		$this->parser->parse('frontend/Footer',$this->data);
	}
	public function personal_info($id=false)
	{	
		$data=$this->data['userdata']=$this->Login_model->fetch($id);
		$this->parser->parse('frontend/Header',$this->data);
		$this->parser->parse('frontend/Leftheader',$this->data);
		$this->parser->parse('frontend/info',$this->data);
		$this->parser->parse('frontend/Footer',$this->data);
	}
	
	public function AddToWishList($productID=false)
	{	
		if(!empty($productID) && !empty($this->userinfos['userID'])){
			$data=array('userID'=>$this->userinfos['userID'],'productID'=>$productID,'Status'=>'Active');
			$this->User_model->addwishlist('s4k_user_wishlist',$data);
		}
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
	public function Mywishlist ()
	{
		$userID=$this->userinfos['userID'];		
		$this->data['userwishlist'] = $this->User_model->getuserwishlist($userID);		
		$this->parser->parse('frontend/Header',$this->data);		
		$this->parser->parse('frontend/Leftheader',$this->data);
		$this->parser->parse('frontend/Mywishlist', $this->data);
		$this->parser->parse('frontend/Footer',$this->data);		
	}
	public function delete_wishlist($userWishListID=false)
	{
		$table = 's4k_user_wishlist';
		$this->User_model->delete_wishlist($table, $userWishListID);
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("User") . " You Have Successfully Delete Wishlist this Record!!");
		redirect ('User/Mywishlist');
	}	
	public function PersonalInformation()
	{
		$user_id=$this->input->post('user_id');
		if(!empty($user_id)){
			$userID=$user_id;	
		}else{
			$userID=$this->userinfos['userID'];	
		}
			
				$this->data['personal']=$personal=$this->User_model->PersonalInformation($userID);
			if(!empty($user_id)){
				echo json_encode($personal);
			}else{				
				$this->parser->parse('frontend/Header',$this->data);		
				$this->parser->parse('frontend/Leftheader',$this->data);
				$this->parser->parse('frontend/PersonalInformation', $this->data);
				$this->parser->parse('frontend/Footer',$this->data);
			}
	}
	public function userprofileupdate ()
	{		
		$userID = $this->input->post('userID');
		$oldvalue = $this->input->post('oldvalue');	
			if($_FILES['userProfileImage']['name']!='')
					{
						$data['image_z1']= $_FILES['userProfileImage']['name'];   
						$userProfileImage=sha1($_FILES['userProfileImage']['name']).time().rand(0, 9);
						if(!empty($_FILES['userProfileImage']['name']))
							{
								$config =  array(
												'upload_path'	  => './uploads/images/userProfileImage/',
												'file_name'       => $userProfileImage,
												'allowed_types'   => "gif|jpg|png|jpeg|JPG|JPEG|PNG|JPG",
												'overwrite'       => true,
												);
								
								$this->upload->initialize($config);
								$this->load->library('upload');
   
									if($this->upload->do_upload("userProfileImage"))
										{
											$upload_data = $this->upload->data();
											$userProfileImage=$upload_data['file_name'];
   				
										}
									else
										{
											$this->upload->display_errors()."file upload failed";
											$image    ="";
										}
						}
					}
		
		$data = array(
						'userFirstName' => $this->input->post('userFirstName'),
						'userLastName' => $this->input->post('userLastName'),
						'userEmail' => $this->input->post('userEmail'),
						'userGender' => $this->input->post('userGender'),
						'userDOB' => $this->input->post('userDOB'),
						'userMobileNo' => $this->input->post('userMobileNo'),
						'userAddress' => $this->input->post('userAddress'),
					 );
		$table = 's4k_user';
		if (!empty($userID))
			{
				if (!empty($userProfileImage))								
							{ 
								($data['userProfileImage'] = $userProfileImage);
									 $originalPath=base_url().'uploads/images/userProfileImage/'.$oldvalue;	 	
										if (file_exists ($originalPath )) 
										{ 	
											unlink ($originalPath );				
										}	
							}
				
				$this->User_model->userprofileupdate($table,$data, $userID);
				$this->session->set_flashdata('message_type', 'success');
				$this->session->set_flashdata('message', $this->config->item("User") . "Successfully Update Profile Details!!");
				redirect ('User/PersonalInformation');
			}
	}
	public function Changepassword()
	{
		$this->parser->parse('frontend/Header',$this->data);		
		$this->parser->parse('frontend/Leftheader',$this->data);
		$this->parser->parse('frontend/Changepassword', $this->data);
		$this->parser->parse('frontend/Footer',$this->data);
	}
	public function updatepssword ()
	{
		$userID=$this->userinfos['userID'];
		$pass = $this->input->post('pass');
		$password = $this->input->post('password');
		$pass2 = md5($pass);

		$pass3 = $this->User_model->getpassword($userID);
		if (!empty($pass3[0]->userPassword)){

			if($pass3[0]->userPassword == $pass2)
				{
					$data=array('userPassword'=>md5($password));
					$table='s4k_user';
					$this->User_model->updatepssword($table,$data,$userID);
					$this->session->set_flashdata('message_type', 'success');
					$this->session->set_flashdata('message', $this->config->item("User") . "Successfully Change Password!!");
					redirect ('User/Changepassword');
				}
				else
				{
					$this->session->set_flashdata('message_type', 'error');
					$this->session->set_flashdata('message', $this->config->item("User") . " Invalid Old Password!! Please Try Again.!!");
					redirect ('User/Changepassword');
				}
		}
	}
	public function DeactiveteAccount ()
	{
		$userID=$this->userinfos['userID'];
		$data= array ('Status'=>'Inactive');
		$this->User_model->DeactiveteAccount($data, $userID);
		$this->session->unset_userdata('searchb4kharch');
        $this->session->sess_destroy();
		$this->session->set_flashdata('message_type', 'error');
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("index") . " Logout Successfully!! Thank You.. ");
		redirect("Login");

	}
	
	
}