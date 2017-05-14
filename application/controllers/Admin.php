<?php 
defined('BASEPATH') OR exit('No direct script access allowed');



/**
* Admin controller to perform the operation
*/
class Admin extends CI_Controller
{
	

	public function __construct() {

		parent::__construct();
		
		if (!$this->session->userdata('is_logged_in')) {
			return redirect('admin_login');
		}
		

		$this->load->model('adminModel');

	}

	

	public function index() {

		 $this->dashboard();		
	}

	public function dashboard() {

		$data['main_content'] = 'admin/dashboard_view';

		$this->load->view('admin_includes/template',$data);
		
		
	}

	public function create_category() {

		$data['main_content'] = 'admin/create_category';
		$data['categories']	 = $this->adminModel->all_category();
	

		$this->load->view('admin_includes/template',$data);			

	}

	public function store_category() {


		if ($this->input->post('category')) {


			unset($_POST['category']);

			// print_r($_POST);
			$result = $this->adminModel->create_category();

			echo json_encode($result);

			
		} else {

			$this->dashboard();
		}

	}



	public function products() {

		$data['main_content'] = 'admin/product_list';

		$this->load->view('admin_includes/template',$data); 
	}

	public function upload_image() {


		echo $this->adminModel->upload_image();

	}


	public function add_product() {

		if ($this->input->post('add_product')) {
			
			$result = $this->adminModel->add_product();

			echo json_encode($result);

		} else {

			$this->index();
		}
	}
}