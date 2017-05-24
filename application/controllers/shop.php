<?php 
defined('BASEPATH') OR exit('No direct script access allowed');



/**
* Shop controller for ecommerce 
*/
class Shop extends CI_Controller
{
	

	public function __construct(){

		parent::__construct();

		$this->load->model('categoryModel');
		$this->load->model('productModel');
		$this->load->model('sliderModel');
		$this->load->model('bannerModel');
	}
	
	public function index() {

		$data['main_content']         = 'public/home';
		
		$data['category_search_left'] = $this->categoryModel->fetchCategoryTree_frontend();
		
		$data['categories']           =  $this->categoryModel->allCategory_array();
		
		$data['slides']               = $this->sliderModel->getAll();
		
		$data['banners']              = $this->bannerModel->getAll();
		
		$data['hot_sale']             = $this->productModel->find_hot_sale();
		
		
		$this->load->view('includes/template',$data);

	}



	



}
