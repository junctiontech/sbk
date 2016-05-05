<?php
 
class Welcome extends CI_Controller {
 
	function __construct() {
		parent::__construct();		
		$this->data[]="";
		$this->data['url'] = base_url();
		$timezone = "Asia/Calcutta";
		if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
		$this->userinfo=$this->session->userdata('searchb4kharch');
		$this->load->model('frontend/Landingpage_model');
		$this->load->library('zend');
		$this->zend->load('Zend/Search/Lucene');
		$this->search_index = APPPATH . 'search/index';
	}
 
	
	function create()
{
	$index = Zend_Search_Lucene::create(APPPATH . 'search/index');
	$doc = Zend_Search_Lucene_Document_Html::loadHTMLFile('http://junctiontech.in');
	$index->addDocument($doc);
	echo '<p>Index created</p>';
}

function index()
{

}

function result()
{
	$data['results'] = array();
	
	$index = Zend_Search_Lucene::open($this->search_index);
	$data['results'] = $index->find('
airnet_usb_for_samsung_galaxy_s4_car_charger');
	
	/* 
	$index = Zend_Search_Lucene::open(APPPATH . 'search/index');
	$data['results'] = $index->find('php');*/
	$this->load->view('search_result_view', $data);       

}

function reindex()
{
	$index = Zend_Search_Lucene::create($this->search_index);
	$query = $this->Landingpage_model->get_products();
	foreach ($query as $article)
	{
		
	$doc = new Zend_Search_Lucene_Document();
		$doc->addField(Zend_Search_Lucene_Field::Text('productName', $article->productName));
		$doc->addField(Zend_Search_Lucene_Field::Text('categoriesUrlKey',$article->categoriesUrlKey));
		$doc->addField(Zend_Search_Lucene_Field::Text('productDescription',$article->productDescription));
		$doc->addField(Zend_Search_Lucene_Field::Text('productsUrlKey',$article->productsUrlKey));
		$doc->addField(Zend_Search_Lucene_Field::Text('productAttributeLable',$article->productAttributeLable));
		$doc->addField(Zend_Search_Lucene_Field::Text('productAttributeValue',$article->productAttributeValue));
		$doc->addField(Zend_Search_Lucene_Field::Text('imageName',$article->imageName));
		$doc->addField(Zend_Search_Lucene_Field::Text('productImageTitle',$article->productImageTitle));
		$doc->addField(Zend_Search_Lucene_Field::Text('productImageAltTag',$article->productImageAltTag));
		$doc->addField(Zend_Search_Lucene_Field::Text('productPrice',$article->productPrice));
		$doc->addField(Zend_Search_Lucene_Field::Text('productShopUrl',$article->productShopUrl));
		$doc->addField(Zend_Search_Lucene_Field::UnStored('content', $article->productName . $article->categoriesUrlKey));
		$index->addDocument($doc);
	echo 'Added ' . $article->productName . ' to index.<br />';
	}
	$index->optimize();
}
function optimize()
{
	$index = Zend_Search_Lucene::open($this->search_index);
	$index->optimize();
	echo '<p>Index optimized.</p>';
}
}

	

?>