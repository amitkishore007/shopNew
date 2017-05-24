<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


/**
* 
*/
class Product extends CI_Controller
{
	
	public function __construct() {

		parent::__construct();
		
		if (!$this->session->userdata('is_logged_in')) {
			return redirect('admin_login');
		}
		

		$this->load->model('productModel');
		$this->load->model('categoryModel');

	}


	public function create() {

		$data['main_content'] = 'admin/product/add_product';
		$data['categories'] = $this->categoryModel->allCategory();


		$this->load->view('admin_includes/template',$data);

	}

	public function add_product() {

		if ($this->input->post('add_product')) {
			
			unset($_POST['add_product']);

// echo json_encode($_POST);
			$result = $this->productModel->add_product();
//
			echo json_encode($result);

		} else {

			$this->index();
		}
	}

	public function edit_product() {

		if ($this->input->post('edit_product')) {
			
			unset($_POST['edit_product']);


			$result = $this->productModel->edit_product();

			echo json_encode($result);

		} else {

			$this->index();
		}
	}

	public function delete(){

		if ($this->input->post()) {
			
			$output = $this->productModel->deleteProduct();

			echo json_encode($output);


		} else {

			return redirect('index');
		}


	}

	public function edit($id){


		if (!isset($id)) {
			
			return redirect('product');

		} else {

			$id = (int) $id;

			$data['main_content'] = 'admin/product/edit_product';
			$data['categories'] = $this->categoryModel->allCategory();
			$data['product'] = $this->productModel->find_product($id);
			if ($data['product']) {
  							
				$this->load->view('admin_includes/template',$data);
			
			} else {

				return redirect('product');
			}
			
		}



	}

	public function index() {


		$data['main_content'] = 'admin/product/product_list';
		$data['products'] = $this->productModel->all_products();

		$this->load->view('admin_includes/template',$data);


	}

	public function upload_image() {
          
				$config['upload_path']   = './uploads';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['encrypt_name']  = TRUE;
				$config['remove_spaces'] = TRUE;
				$output = array('status'=>false,'name'=>'','error'=>'');


            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file')) {

                $data = $this->upload->data();

				$config['image_library']  = 'gd2';
				$config['source_image']   = './uploads/'.$data['file_name'];
				$config['new_image']      = './uploads/';
				$config['maintain_ratio'] = TRUE;
				$config['width']          = 400;
				$config['height']         = 400;
				$config['overwrite']      = TRUE;
				
				$this->load->library('image_lib', $config); 
				if (!$this->image_lib->resize()) {
				    return 'There was en error with image uploading, try later!';
				}

				// return $data['file_name'];
				// $this->db->insert('product_images',['name'=>$data['file_name'],'user_id'=>$this->session->userdata('admin_id')]);
				$output['status'] = true;
				$output['name']   = $data['file_name'];
				
				
            } else {
				$output['error'] = 'could not upload image, try later';

            }
            echo json_encode($output);
	}


	public function set_hot_sale() {

		if ($this->input->post()) {
			
			$status = $this->productModel->set_hote_sale();

			echo $status;

		} else {

			return redirect('product');
		}
	}

	public function change_status() {

		if ($this->input->post()) {
		
			$status = $this->productModel->set_status();

			echo $status;

		} else {

			return redirect('product');
		}
	}


	



}