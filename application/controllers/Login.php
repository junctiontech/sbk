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
				//'userProfileImage'=>$userProfile['picture']
				);	
			
			if(!empty($userProfile['picture']))
			{
				$url = $userProfile['picture'];
				$name = basename($url);
				$userProfileImage=sha1($name).time().rand(0, 9);			
				file_put_contents("uploads/images/userProfileImage/$userProfileImage", file_get_contents($url));
				$data['userProfileImage'] = $userProfileImage;
			}			
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
				//'userProfileImage'=>$userProfile['picture']['data']['url']
				);			
			if(!empty($userProfile['picture']['data']['url']))			
			{
				$url = $userProfile['picture']['data']['url'];
				$name = basename($url);
				$userProfileImage=sha1($name).time().rand(0, 9);			
				file_put_contents("uploads/images/userProfileImage/$userProfileImage", file_get_contents($url));
				$data['userProfileImage'] = $userProfileImage;
			}				 
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
				$where=array('userEmail'=>$useremail,'userPassword'=>md5($password));
				$userinfo=$this->Login_model->get_login('s4k_user',$where);
				if(!empty($userinfo)){
					$userstatus=$this->Login_model->check_status('s4k_user',$where);
				
					if(!empty($userstatus[0]->Status =='Active'))
					{	//print_r($userstatus[0]->Status);die;
					$sbk = array(
					'userID' => $userinfo[0]->userID,
					'userTypeID' => $userinfo[0]->userTypeID,
					'userFirstName' => $userinfo[0]->userFirstName,
					'userProfileImage' => $userinfo[0]->userProfileImage
				);
				$this->session->set_userdata('searchb4kharch', $sbk);				
				$this->session->set_flashdata('message_type', 'success');
				$this->session->set_flashdata('message', $this->config->item("index") . "You've Logged in successfully. ");
				redirect('User/Dashboard');
					}
					else{					
						$this->session->set_flashdata('category_error_login', "Your email is not verified, please verify your email.");
					}
				}else{
					
					$this->session->set_flashdata('category_error_login', "Username Or Password is invalid, please try again.");
				}
		
		}else{
				$this->session->set_flashdata('category_error_login', "Username Or Password is invalid, please try again.");
			}
		}else{
				$this->session->set_flashdata('category_error_login', "Username Or Password is invalid, please try again.");
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
		$app=$this->input->get('app');
		if($this->input->post('submit') || $app==true){
			$userFirstName=$this->input->post('userFirstName');
			$userLastName=$this->input->post('userLastName');
			$userEmail=$this->input->post('userEmail');
			$userPassword=$this->input->post('userPassword');
			$userGender=$this->input->post('userGender');
			$userDOB=$this->input->post('userDOB');
			$userMobileNo=$this->input->post('userMobileNo');
			if(!empty($userFirstName) && !empty($userLastName) && !empty($userEmail) && !empty($userPassword) && !empty($userGender) && !empty($userMobileNo)){
				if($app !=true){
					 if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
						$secret = '6LfQWiYTAAAAAJ1oMY7rK6fJFu8tP8_bFc7Gezli';
						$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
						$responseData = json_decode($verifyResponse);
						if($responseData->success)
						{
							
						}else{
							$this->session->set_flashdata('category_error_login', " Robot verification failed, please try again!!. ");
							redirect('Login/signup');
						}
					 }else{
						$this->session->set_flashdata('category_error_login', " Please checked captcha!!. ");
						redirect('Login/signup');
					 }
				}
				$data=array(
				'userFirstName'=>$userFirstName,
				'userLastName'=>$userLastName,
				'userEmail'=>$userEmail,
				'userPassword'=>md5($userPassword),
				'userGender'=>$userGender,
				'userDOB'=>$userDOB,
				'Status'=>'Inactive',
				'userMobileNo'=>$userMobileNo
				);
				$id=$this->Login_model->insert('s4k_user',$data);
				$encry = base64_encode($id);
				$name = md5($userMobileNo);
				$name1 = md5($userFirstName);
				$base=base_url ();				
				$subject="searchb4kharch:- Rest Password ";
				$message= "<html><body><h3>Hello: $userFirstName </h3><p>Please click in below link and activated your Account....<br>  Your activated Account link is {$base}Login/Activetedaccount/$name1/$encry/&&$name.html/ <br><br> if any query so please contact to info@searchb4kharch.com!!</h3></p><br> </p></body></html>";
				$name='Searchb4kharch.com';
				date_default_timezone_set('Etc/UTC');
				require 'PHPMailer/PHPMailerAutoload.php';
				//Create a new PHPMailer instance
				$mail = new PHPMailer;			
				//Tell PHPMailer to use SMTP
				$mail->isSMTP();			
				//Enable SMTP debugging
				// 0 = off (for production use)
				// 1 = client messages
				// 2 = client and server messages
				$mail->SMTPDebug = 0;			
				//Ask for HTML-friendly debug output
				$mail->Debugoutput = 'html';
			
				//Set the hostname of the mail server
				$mail->Host = 'smtp.gmail.com';
			
				//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
				$mail->Port = 587;
			
				//Set the encryption system to use - ssl (deprecated) or tls
				$mail->SMTPSecure = 'tls';
			
				//Whether to use SMTP authentication
				$mail->SMTPAuth = true;
			
				//Username to use for SMTP authentication - use full email address for gmail
				$mail->Username = 'searchkharch@gmail.com';
			
				//Password to use for SMTP authentication
				$mail->Password = 'navrang99';
			
				//Set who the message is to be sent from
				$mail->setFrom($userEmail,$name);
			
				//Set an alternative reply-to address
				$mail->addReplyTo('searchkharch@gmail.com', $name);
			
				//Set who the message is to be sent to
				$mail->addAddress($userEmail);
			
				//Set the subject line
				$mail->Subject = $subject;
			
				//Read an HTML message body from an external file, convert referenced images to embedded,
				//convert HTML into a basic plain-text alternative body
				$mail->msgHTML($message);
			
				//Replace the plain text body with one created manually
				$mail->AltBody = 'This is a plain-text message body';
			
				//Attach an image file
				//$mail->addAttachment($uploadfile,$filename);
			
				//send the message, check for errors
			
			
				if (!$mail->send())
				{
					print "We encountered an error sending your mail";
					
				}
				else
				{
					if($app==true){
					echo json_encode(array('code'=>300,'message'=>'Signup Successfully!! Kindly check your email for activated your account !!!! '));
						exit;
				}
					else{
						?><script> alert('Signup Successfully!! Kindly check your email for activated your account !!!! ');</script><?php
						redirect($_SERVER['HTTP_REFERER'],"refresh");
					}
				}
			/*if(!empty($id)){
				if($app==true){
					echo json_encode(array('code'=>200,'message'=>'Signup Successfully!!','user_id'=>$id));
				}else{
				$where=array('userID'=>$id,'Status'=>'Active');
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
				$this->session->set_flashdata('message', $this->config->item("index") . " Congratulations!! now you've become Searcheela.");
				redirect('User/Dashboard');
				
			}else{
				if($app==true){
					echo json_encode(array('code'=>500,'message'=>'Technical error!! Please Try After Some Time.'));
				}else{
				$this->session->set_flashdata('category_error_login', " Technical error!! Please Try After Some Time. ");
				redirect('Login/signup');
				}
			} 
				}
		}* 
				else{
				if($app==true){
					echo json_encode(array('code'=>500,'message'=>'Technical error!! Please Try After Some Time.'));
				}
				else{
				$this->session->set_flashdata('category_error_login', " Technical error!! Please Try After Some Time. ");
				redirect('Login/signup');
				}
			} */
		}
			else{
				if($app==true){
					echo json_encode(array('code'=>500,'message'=>'All fields are mandatory!! Please Try Again.'));
				}else{
				$this->session->set_flashdata('category_error_login', " All fields are mandatory!! Please Try Again. ");
				redirect('Login/signup');}
			} 
		}else{
			if($app==true){
					echo json_encode(array('code'=>500,'message'=>'Invalid request!! Please Try Again.'));
				}
			else{
			$this->session->set_flashdata('category_error_login', " Invalid request!! Please Try Again. ");
			redirect('Login/signup');
				}
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

	public function app_login()
	{ 
		$sb4k_login_info=$this->input->post('sb4k_login_info');
		if($sb4k_login_info){
			$sb4k_login_info=json_decode($sb4k_login_info,true);
			$useremail=$sb4k_login_info['emailId'];
			$password=$sb4k_login_info['password'];
			if(!empty($useremail) && !empty($password)){
				$where=array('userEmail'=>$useremail,'userPassword'=>md5($password));
				$userinfo=$this->Login_model->get_login('s4k_user',$where);
				if(!empty($userinfo)){
					$userstatus=$this->Login_model->check_status('s4k_user',$where);				
					if(!empty($userstatus[0]->Status =='Active'))
					{
						$sbk = array(					
							'userID' => $userinfo[0]->userID,					
							'userTypeID' => $userinfo[0]->userTypeID,					
							'userFirstName' => $userinfo[0]->userFirstName,					
							'userProfileImage' => $userinfo[0]->userProfileImage
						);					
						echo json_encode(array('code'=>200,'message'=>'Successfully login','user_id'=>$userinfo[0]->userID));					
					}
					else
					{					
						echo json_encode(array('code'=>300,'message'=>'Your email is not verified, please verify your email'));
					}
				}else{
					echo json_encode(array('code'=>500,'message'=>'Invalid username or password!!'));
				}
		}else{
				echo json_encode(array('code'=>500,'message'=>'All fields are mendatory!!'));
			}
		}else{
				echo json_encode(array('code'=>500,'message'=>'Invalid request!!'));
		}
	}	
	public function app_forgetpassword()
	{ 
		$sb4k_forgot_info=$this->input->post('sb4k_forgot_info');
		if($sb4k_forgot_info){
			$sb4k_forgot_info=json_decode($sb4k_forgot_info,true);
			$useremail=$sb4k_forgot_info['emailId'];
			if(!empty($useremail)){
				$where=array('userEmail'=>$useremail,'Status'=>'Active');
				$userinfo=$this->Login_model->get_login('s4k_user',$where);
				if(!empty($userinfo)){

					echo json_encode(array('code'=>200,'message'=>'Password reset link is send to your email'));
				}else{
					echo json_encode(array('code'=>500,'message'=>'Invalid emailId not found'));
				}
		}else{
				echo json_encode(array('code'=>500,'message'=>'All fields are mendatory!!'));
			}
		}else{
				echo json_encode(array('code'=>500,'message'=>'Invalid request!!'));
		}
	}
	public function forgetpassword()
	{
		$this->parser->parse('frontend/Header',$this->data);
		$this->parser->parse('frontend/Forgotpassword',$this->data);
		$this->parser->parse('frontend/Footer',$this->data);
	}
	public function reset_password ()
	{ 
		$useremail = $this->input->post('email');
		$pass = $this->input->post('password');
		$password = $this->input->post('password2');
		$pass2 = md5($password);
		if($pass2)
		{
			$data=array('userPassword'=>$pass2);
			$table='s4k_user';
			$this->Login_model->reset_pass($table,$data,$useremail); 
			if(!empty($useremail) && !empty($pass2)){
			//	print_r($_POST); die;
				$where=array('userEmail'=>$useremail,'userPassword'=>$pass2,'Status'=>'Active');
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
				$this->session->set_flashdata('message', $this->config->item("index") . "Congratulations!! Your password is reset successfully");
				redirect('User/Dashboard');
				
				}else{
					
					$this->session->set_flashdata('category_error_login', "Username Or Password is invalid, please try again.");
				}
		
		}else{
				$this->session->set_flashdata('category_error_login', "Username Or Password is invalid, please try again.");
			}
		 
				redirect("Login");
		}
		 	
	}
	public function Activetedaccount($name1=false,$data=false)
	{
		$id=base64_decode($data);	 
		if(!empty($id)){
			$data=array('Status'=>'Active');
			$this->Login_model->updateStatus($data, $id);
		
		}
		if(!empty($id)){
				if($app==true){
					echo json_encode(array('code'=>200,'message'=>'Signup Successfully!!','user_id'=>$id));
				}else{
				$where=array('userID'=>$id,'Status'=>'Active');
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
				$this->session->set_flashdata('message', $this->config->item("index") . " Congratulations!! now you've become Searcheela.");
				redirect('User/Dashboard');				
			}else{
				if($app==true){
					echo json_encode(array('code'=>500,'message'=>'Technical error!! Please Try After Some Time.'));
				}else{
				$this->session->set_flashdata('category_error_login', " Technical error!! Please Try After Some Time. ");
				redirect('Login/signup');
				}
			} 
				}
		} 
				else{
				if($app==true){
					echo json_encode(array('code'=>500,'message'=>'Technical error!! Please Try After Some Time.'));
				}
				else{
				$this->session->set_flashdata('category_error_login', " Technical error!! Please Try After Some Time. ");
				redirect('Login/signup');
				}
			}
	}
	
}