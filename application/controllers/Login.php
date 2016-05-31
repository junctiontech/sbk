<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Controller for login Functionality */
class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->data[]="";
		$this->data['url'] = base_url();
		$timezone = "Asia/Calcutta";
		if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
		$this->userinfos=$this->session->userdata('searchb4kharch');
		$this->load->model('frontend/Login_model');
		$this->load->model('frontend/Landingpage_model');
		$this->load->library('form_validation');
		$this->data['base_url']=base_url();
		$this->data['categories']=$categories=$this->Landingpage_model->get_categories();
		$this->data['topbrands']=$topbrand=$this->Landingpage_model->get_topbrand();
		$this->data['dealsgategorys']=$dealsgategorys=$this->Landingpage_model->get_dealsgategory();
		// Include the google api php libraries
		include_once APPPATH."libraries/google-api-php-client/Google_Client.php";
		include_once APPPATH."libraries/google-api-php-client/contrib/Google_Oauth2Service.php";
		include_once APPPATH."libraries/facebook-api-php-codexworld/facebook.php";
	}
	
	public function display($template_file){
		$this->parser->parse('frontend/Header',$this->data);
		$this->load->view($template_file, $this->data);
		$this->parser->parse('frontend/Footer',$this->data);
	}
	
	public function index()
	{
		if(!empty($this->userinfos)){
			redirect('User/Dashboard');
		}else{
		
		$where=array('apiName'=>'google+','Status'=>'Active');
		$googleapiinfo=$this->Login_model->get_data('sbk_other_api_info',$where);
		if(!empty($googleapiinfo)){
			// Google Project API Credentials
		$clientId = $googleapiinfo[0]->appID;
        $clientSecret = $googleapiinfo[0]->appSecreatID;
        $redirectUrl = base_url().'Login/apiLoging';
		// Google Client Configuration
        $gClient = new Google_Client();
        $gClient->setApplicationName('sbk');
        $gClient->setClientId($clientId);
        $gClient->setClientSecret($clientSecret);
        $gClient->setRedirectUri($redirectUrl);
        $google_oauthV2 = new Google_Oauth2Service($gClient);
		
		if ($gClient->getAccessToken()) {
            
        } else {
            $this->data['googleauthUrl'] = $gClient->createAuthUrl();
        }
			
		}
		
		$facebookwhere=array('apiName'=>'facebook','Status'=>'Active');
		$facebookapiinfo=$this->Login_model->get_data('sbk_other_api_info',$facebookwhere);
		if(!empty($facebookapiinfo)){
			// Google Project API Credentials
		$appId = $facebookapiinfo[0]->appID;
        $appSecret = $facebookapiinfo[0]->appSecreatID;
        $redirectUrl = base_url().'Login/facebookLoging';
		$fbPermissions = 'email';
		
		$facebook = new Facebook(array(
		  'appId'  => $appId,
		  'secret' => $appSecret
		
		));
		$fbuser = $facebook->getUser();
		
		if ($fbuser) {
           
        } else {
            $this->data['facebookauthUrl'] = $facebook->getLoginUrl(array('redirect_uri'=>$redirectUrl,'scope'=>$fbPermissions));
        }
			
		}
		
			$this->display ('frontend/Login');
		}
		
	}
	
	function apiLoging() {
		
		$where=array('apiName'=>'google+','Status'=>'Active');
		$googleapiinfo=$this->Login_model->get_data('sbk_other_api_info',$where);
		if(!empty($googleapiinfo)){
			// Google Project API Credentials
		$clientId = $googleapiinfo[0]->appID;
        $clientSecret = $googleapiinfo[0]->appSecreatID;
        $redirectUrl = base_url().'Login/apiLoging';
		// Google Client Configuration
        $gClient = new Google_Client();
        $gClient->setApplicationName('sbk');
        $gClient->setClientId($clientId);
        $gClient->setClientSecret($clientSecret);
        $gClient->setRedirectUri($redirectUrl);
        $google_oauthV2 = new Google_Oauth2Service($gClient);
		
		
		 if (isset($_REQUEST['code'])) {
            $gClient->authenticate();
            
        if ($gClient->getAccessToken()) {
            $userProfile = $google_oauthV2->userinfo->get();
			$data=array(
				'userGoogle'=>$userProfile['id'],
				'userFirstName'=>$userProfile['given_name'],
				'userLastName'=>$userProfile['family_name'],
				'userEmail'=>$userProfile['email'],
				'userPassword'=>'',
				'userGender'=>isset($userProfile['gender'])?$userProfile['gender']:'',
				'userDOB'=>'',
				'userMobileNo'=>'',
				'userProfileImage'=>$userProfile['picture']
				);
			$email=$userProfile['email'];	
			$where1=array('userEmail'=>$email,'userGoogle'=>$userProfile['id']);
			$update=array('userGoogle'=>$userProfile['id']);			
			$userID=$this->Login_model->insert_login('s4k_user',$data,$where1,$email,$update);
			if(!empty($userID)){
				$where=array('userID'=>$userID);
				$userinfo=$this->Login_model->get_login('s4k_user',$where);
				if(!empty($userinfo)){
					$sbk = array(
					'userID' => $userinfo[0]->userID,
					'userTypeID' => $userinfo[0]->userTypeID,
					'userFirstName' => $userinfo[0]->userFirstName,
					'userProfileImage' => $userinfo[0]->userProfileImage
				);

				$this->session->set_userdata('searchb4kharch', $sbk);
				
				$this->session->set_flashdata('message_type', 'success');
				$this->session->set_flashdata('message', $this->config->item("index") . " Login Successfully!!");
				redirect('User/Dashboard');
				
			}else{
			$this->session->set_flashdata('message_type', 'error');
			$this->session->set_flashdata('message', $this->config->item("index") . " Technical error. please try again!! ");
			redirect('Login');
		}
		}else{
			$this->session->set_flashdata('message_type', 'error');
			$this->session->set_flashdata('message', $this->config->item("index") . " Technical error. please try again!! ");
			redirect('Login');
		}
			
		}else{
			$this->session->set_flashdata('message_type', 'error');
			$this->session->set_flashdata('message', $this->config->item("index") . " Technical error. please try again!! ");
			redirect('Login');
		}	
        }else{
			$this->session->set_flashdata('message_type', 'error');
			$this->session->set_flashdata('message', $this->config->item("index") . " User Deny Login.. ");
			redirect('Login');
		}
		}
	}
	
	function facebookLoging() {
		
		$facebookwhere=array('apiName'=>'facebook','Status'=>'Active');
		$facebookapiinfo=$this->Login_model->get_data('sbk_other_api_info',$facebookwhere);
		if(!empty($facebookapiinfo)){
			// Google Project API Credentials
		$appId = $facebookapiinfo[0]->appID;
        $appSecret = $facebookapiinfo[0]->appSecreatID;
        $redirectUrl = base_url().'Login/facebookLoging';
		$fbPermissions = 'email';
		
		$facebook = new Facebook(array(
		  'appId'  => $appId,
		  'secret' => $appSecret
		
		));
		$fbuser = $facebook->getUser();
		
		if ($fbuser) {
            $userProfile = $facebook->api('/me?fields=id,first_name,last_name,email,gender,locale,picture');
			$data=array(
				'userFacebook'=>$userProfile['id'],
				'userFirstName'=>$userProfile['first_name'],
				'userLastName'=>$userProfile['last_name'],
				'userEmail'=>$userProfile['email'],
				'userPassword'=>'',
				'userGender'=>$userProfile['gender'],
				'userDOB'=>'',
				'userMobileNo'=>'',
				'userProfileImage'=>$userProfile['picture']['data']['url']
				);
			$email=$userProfile['email'];	
			$where1=array('userEmail'=>$email,'userGoogle'=>$userProfile['id']);
			$update=array('userFacebook'=>$userProfile['id']);
			$userID=$this->Login_model->insert_login('s4k_user',$data,$where1,$email,$update);
			if(!empty($userID)){
				$where=array('userID'=>$userID);
				$userinfo=$this->Login_model->get_login('s4k_user',$where);
				if(!empty($userinfo)){
					$sbk = array(
					'userID' => $userinfo[0]->userID,
					'userTypeID' => $userinfo[0]->userTypeID,
					'userFirstName' => $userinfo[0]->userFirstName,
					'userProfileImage' => $userinfo[0]->userProfileImage
				);

				$this->session->set_userdata('searchb4kharch', $sbk);
				
				$this->session->set_flashdata('message_type', 'success');
				$this->session->set_flashdata('message', $this->config->item("index") . " Login Successfully!!");
				redirect('User/Dashboard');
				
			}else{
			$this->session->set_flashdata('message_type', 'error');
			$this->session->set_flashdata('message', $this->config->item("index") . " Technical error. please try again!! ");
			redirect('Login');
		}
		}else{
			$this->session->set_flashdata('message_type', 'error');
			$this->session->set_flashdata('message', $this->config->item("index") . " Technical error. please try again!! ");
			redirect('Login');
		}
			
		}else{
			$this->session->set_flashdata('message_type', 'error');
			$this->session->set_flashdata('message', $this->config->item("index") . " Technical error. please try again!! ");
			redirect('Login');
		}	
        
		}
	}
	
	public function Checked_login($url=false)
	{ 
		if($this->input->post('submit')){
			$useremail=$this->input->post('useremail');
			$password=$this->input->post('password');
			if(!empty($useremail) && !empty($password)){
				$where=array('userEmail'=>$useremail,'userPassword'=>md5($password),'Status'=>'Active');
				$userinfo=$this->Login_model->get_login('s4k_user',$where);
				if(!empty($userinfo)){
					$sbk = array(
					'userID' => $userinfo[0]->userID,
					'userTypeID' => $userinfo[0]->userTypeID,
					'userFirstName' => $userinfo[0]->userFirstName,
					'userProfileImage' => $userinfo[0]->userProfileImage
				);

				$this->session->set_userdata('searchb4kharch', $sbk);
				
				$this->session->set_flashdata('message_type', 'success');
				$this->session->set_flashdata('message', $this->config->item("index") . " Login Successfully!!");
				redirect('User/Dashboard');
				
				}else{
					
					$this->session->set_flashdata('category_error_login', " Invalid Username Or Password!! Please Try Again. ");
				}
		
		}else{
				$this->session->set_flashdata('category_error_login', " Invalid Username Or Password!! Please Try Again. ");
			}
		}else{
				$this->session->set_flashdata('category_error_login', " Invalid Username Or Password!! Please Try Again. ");
		}
				redirect("Login");
	}
	/* Login Authentication End............................................................................................................. */
	
	public function signup()
	{
		$this->display ('frontend/Signup');
	}
	
	public function insert_user_info()
	{
		if($this->input->post('submit')){
			$userFirstName=$this->input->post('userFirstName');
			$userLastName=$this->input->post('userLastName');
			$userEmail=$this->input->post('userEmail');
			$userPassword=$this->input->post('userPassword');
			$userGender=$this->input->post('userGender');
			$userDOB=$this->input->post('userDOB');
			$userMobileNo=$this->input->post('userMobileNo');
			if(!empty($userFirstName) && !empty($userLastName) && !empty($userEmail) && !empty($userPassword) && !empty($userGender) && !empty($userMobileNo)){
				$data=array(
				'userFirstName'=>$userFirstName,
				'userLastName'=>$userLastName,
				'userEmail'=>$userEmail,
				'userPassword'=>md5($userPassword),
				'userGender'=>$userGender,
				'userDOB'=>$userDOB,
				'userMobileNo'=>$userMobileNo
				);
			$id=$this->Login_model->insert('s4k_user',$data);
			if(!empty($id)){
				$where=array('userID'=>$id);
				$userinfo=$this->Login_model->get_login('s4k_user',$where);
				if(!empty($userinfo)){
					$sbk = array(
					'userID' => $userinfo[0]->userID,
					'userTypeID' => $userinfo[0]->userTypeID,
					'userFirstName' => $userinfo[0]->userFirstName,
					'userProfileImage' => $userinfo[0]->userProfileImage
				);

				$this->session->set_userdata('searchb4kharch', $sbk);
				
				$this->session->set_flashdata('message_type', 'success');
				$this->session->set_flashdata('message', $this->config->item("index") . " Signup Successfully!!");
				redirect('User/Dashboard');
				
			}else{
				$this->session->set_flashdata('category_error_login', " Technical error!! Please Try After Some Time. ");
				redirect('Login/signup');
			} 
			
		}else{
				$this->session->set_flashdata('category_error_login', " Technical error!! Please Try After Some Time. ");
				redirect('Login/signup');
			} 
		}else{
				$this->session->set_flashdata('category_error_login', " All fields are mandatory!! Please Try Again. ");
				redirect('Login/signup');
			}
		}else{
			$this->session->set_flashdata('category_error_login', " Invalid request!! Please Try Again. ");
			redirect('Login/signup');
		}
	}	
	/* Logout function start................................................................................... */

	function Logout() {
		$this->session->unset_userdata('searchb4kharch');
        $this->session->sess_destroy();
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("index") . " Logout Successfully!! Thank You.. ");
		redirect("Login");
	}

	/* Logout function start................................................................................... */

}