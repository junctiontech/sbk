<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Controller for User Functionality */
class User extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->data[]="";
		$timezone = "Asia/Calcutta";
		if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
		if($this->input->get('app')!=true){
		if (!$this->session->userdata('searchb4kharch')){ $this->session->set_flashdata('category_error_login', " Your Session Is Expired!! Please Login Again. "); redirect("Login");}}
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
		$app=$this->input->get('app');
		$user_id=$this->input->post('user_id');
		if(!empty($user_id)){
			$userID=$user_id;	
		}else{
			$userID=$this->userinfos['userID'];	
		}	
		if((!empty($productID) && !empty($userID)) || ($app==true && !empty($userID))){
			$data=array('userID'=>$userID,'productID'=>$productID,'Status'=>'Active');
			$this->User_model->addwishlist('s4k_user_wishlist',$data);
			$message='success';
		}else{
			$message='error';
		}
		if($app ==true){
			echo json_encode(array('message'=>$message));exit;
		}else{
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
	}
	public function Mywishlist ()
	{
		$user_id=$this->input->post('user_id');
		if(!empty($user_id)){
			$userID=$user_id;	
		}else{
			$userID=$this->userinfos['userID'];	
		}		
		$this->data['userwishlist'] =$userwishlist= $this->User_model->getuserwishlist($userID);
		if(!empty($user_id)){
				echo json_encode($userwishlist);
			}else{
				if($this->input->get('app')!=true){
				$this->parser->parse('frontend/Header',$this->data);		
				$this->parser->parse('frontend/Leftheader',$this->data);
				$this->parser->parse('frontend/Mywishlist', $this->data);
				$this->parser->parse('frontend/Footer',$this->data);
				}
			}
	}
	public function delete_wishlist($userWishListID=false)
	{
		$app=$this->input->get('app');
		$table = 's4k_user_wishlist';
		$this->User_model->delete($table,array('userWishListID' =>$userWishListID));
		if($app==true){
			echo json_encode(array('message'=>'success'));
		}else{
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("User") . "You've successfully deleted product from your wishlist.");
		redirect ('User/Mywishlist');
		}
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
				if($this->input->get('app')!=true){
				$this->parser->parse('frontend/Header',$this->data);		
				$this->parser->parse('frontend/Leftheader',$this->data);
				$this->parser->parse('frontend/PersonalInformation', $this->data);
				$this->parser->parse('frontend/Footer',$this->data);
				}
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
									 $originalPath='uploads/images/userProfileImage/'.$oldvalue;							
										{ 
											unlink($originalPath);				
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
					$this->session->set_flashdata('message', $this->config->item("User") . "Congratulations!! Your password is changed successfully.");
					redirect ('User/Changepassword');
				}
				else
				{
					$this->session->set_flashdata('message_type', 'error');
					$this->session->set_flashdata('message', $this->config->item("User") . "You've enter an invalid password, please try again.");
					redirect ('User/Changepassword');
				}
		}
	}
	public function DeactiveteAccount ()
	{
		$userID=$this->userinfos['userID'];		 
		$this->User_model->delete('s4k_user',array ('userID' => $userID));
		$this->User_model->delete('s4k_notify',array ('userID' => $userID));
		$this->session->unset_userdata('searchb4kharch');
        $this->session->sess_destroy();
		$this->session->set_flashdata('message_type', 'error');
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("index") . "Logout Successfully!! Thank You..");
		redirect("Login");

	}	
	public function Notify()
	{
		$userID=$this->userinfos['userID'];
		//print_r($userID);die;
		$notify=$this->data['usernotify']=$this->User_model->get_notify($userID);
		//	print_r($notify);die;
		$this->parser->parse('frontend/Header',$this->data);		
		$this->parser->parse('frontend/Leftheader',$this->data);
		$this->parser->parse('frontend/Notify', $this->data);
		$this->parser->parse('frontend/Footer',$this->data);		
	}
	public function Delect_usernotify($notifyID=false)
	{
		$this->User_model->delete('s4k_notify', array ('notifyID' =>$notifyID));	
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("User") . "You've successfully deleted Notify from your Notify.");
		redirect ('User/Mywishlist');
	}
	
}