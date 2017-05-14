<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
* 
*/
class Category extends CI_Controller
{
	
	
	public function __construct() {

		parent::__construct();
		
		if (!$this->session->userdata('is_logged_in')) {
			return redirect('admin_login');
		}
		

		//$this->load->model('categoryModel');

	}


	public function create() {

		$data['main_content'] = 'admin/create_category';

		$this->load->view('admin_includes/template',$data);

	}

	public function delete(){


	}

	public function edit(){


		$data['main_content'] = 'admin/edit_category';

		$this->load->view('admin_includes/template',$data);


	}

	public function index() {


		$data['main_content'] = 'admin/category_list';

		$this->load->view('admin_includes/template',$data);


	}




}