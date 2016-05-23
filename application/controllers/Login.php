<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Controller for login Functionality */
class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->data[]="";
		$this->data['user_data']="";
		$this->data['url'] = base_url();

		$this->load->library('parser');
		$this->load->helper('url');
		$this->load->model('frontend/Login_model');
		$this->load->library('form_validation');
		$this->data['base_url']=base_url();
		$this->load->library('session');
		
		$this->load->library('email');
	}
	
	public function index()
	{
		
		$this->parser->parse('frontend/Header',$this->data);
		$this->parser->parse('frontend/Login',$this->data);
		$this->parser->parse('frontend/Footer',$this->data);
	}
	
	public function signup()
	{
		$this->parser->parse('frontend/Header',$this->data);
		$this->parser->parse('frontend/Signup',$this->data);
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
	{	$data=$this->data['userdata']=$this->Login_model->fetch($id);
	
		$this->parser->parse('frontend/Header',$this->data);
		$this->parser->parse('frontend/Leftheader',$this->data);
		$this->parser->parse('frontend/info',$this->data);
		$this->parser->parse('frontend/Footer',$this->data);
	}
	public function insert_user_info()
	{
			
			$data=array(
			'userFirstName'=>$this->input->post('userFirstName'),
			'userLastName'=>$this->input->post('userLastName'),
			'userEmail'=>$this->input->post('userEmail'),
			'userPassword'=>$this->input->post('userPassword'),
			'userGender'=>$this->input->post('userGender'),
			'userDOB'=>$this->input->post('userDOB'),
			'userMobileNo'=>$this->input->post('userMobileNo')
			   );
			
			$id=$this->Login_model->insert('s4k_user',$data);
			
			redirect('Login/dashboard');   
	}
	
}