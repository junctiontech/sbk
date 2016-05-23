<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	function __construct() {
		parent::__construct();		
		$this->data[]="";
		$this->load->library('session');
		$timezone = "Asia/Calcutta";
		if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
		$this->userinfo=$this->session->userdata('searchb4kharchadmin');
		$this->load->model('admin/Admin_model');
	}
	
	public function display($template_file){
		$this->load->view($template_file, $this->data);
	}
	
	public function index($url=false)
	{
		if(!empty($this->userinfo)){
			redirect('Dashboard');
		}else{
		$this->display ('admin/Adminlogin');
		}
	}
	
	public function Login($url=false)
	{
		if($this->input->post('submit')){
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			if(!empty($username) && !empty($password)){
				$where=array('userEmail'=>$username,'userPassword'=>md5($password),'Status'=>'Active');
				$userinfo=$this->Admin_model->get_login('s4k_user',$where);
				if(!empty($userinfo)){
					$sbk = array(
					'userID' => $userinfo[0]->userID,
					'userTypeID' => $userinfo[0]->userTypeID,
					'userFirstName' => $userinfo[0]->userFirstName,
					'userProfileImage' => $userinfo[0]->userProfileImage
				);

				$this->session->set_userdata('searchb4kharchadmin', $sbk);
				
				$this->session->set_flashdata('message_type', 'success');
				$this->session->set_flashdata('message', $this->config->item("index") . " Login Successfully!!");
				redirect('Dashboard');
				}else{
					
					$this->session->set_flashdata('category_error_login', " Invalid Username Or Password!! Please Try Again. ");
				}
		
		}else{
				$this->session->set_flashdata('category_error_login', " Invalid Username Or Password!! Please Try Again. ");
			}
		}else{
				$this->session->set_flashdata('category_error_login', " Invalid Username Or Password!! Please Try Again. ");
		}
				redirect("Admin");
	}
	/* Login Authentication End............................................................................................................. */

	/* Logout function start................................................................................... */

	function Logout() {
		session_destroy();
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("index") . " Logout Successfully!! Thank You.. ");
		redirect("Admin");
	}

	/* Logout function start................................................................................... */

	
}
