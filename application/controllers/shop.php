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
	}
	
	public function index() {

		$data['main_content'] = 'public/home';
		
		$data['category_search_left'] = $this->categoryModel->fetchCategoryTree_frontend();
		
		$data['categories'] =  $this->categoryModel->allCategory_array();
		
		$data['hot_sale']	 = $this->productModel->find_hot_sale();

		
		$this->load->view('includes/template',$data);

	}



	



}
