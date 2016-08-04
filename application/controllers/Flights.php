 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Flights extends CI_Controller {
		
		
		function __construct() {
		parent::__construct();		
		$this->data[]="";
		$this->data['url'] = base_url();	
		$this->load->model('admin/Flight_model');
		}
	
	public function display($template_file)
	{
		$this->parser->parse('admin/Header',$this->data);
		$this->load->view($template_file, $this->data);
		$this->parser->parse('admin/Footer',$this->data);
	}
	
	public function getplaceID()
	{
		$app=$this->input->get('app');
		if($this->input->post())
		{
			$placekey=$this->input->post('placekey');
			
			$jsonData = json_decode(file_get_contents("http://partners.api.skyscanner.net/apiservices/autosuggest/v1.0/IN/INR/en-GB/?query=$placekey&apiKey=se768816655086949164281628418167"),true);

			if(!empty($jsonData['Places'])){
				if($app==true){
					echo json_encode($jsonData['Places']);exit;
				}else{
					//echo"<select class=\"fromID\">";
					foreach($jsonData['Places'] as $place)
					{ 
						$placeID='';$placeName='';
						$placeID=$place['PlaceId'];$placeName=$place['PlaceName'];
						echo "<option   value=\"$placeID\">$placeName</option> ";
					}
					//echo"</select>";
				}
			}else{
				if($app==true){
					$arrblank=array();
					echo json_encode($arrblank);exit;
				}
			}
		}
	}
	
	public function index ()
	{
		$this->display('admin/Viewfight', $this->data);
	}

}