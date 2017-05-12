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

	}


	public function create() {

		$data['main_content'] = 'admin/add_product';

		$this->load->view('admin_includes/template',$data);

	}

	public function add_product() {

		if ($this->input->post('add_product')) {
			
			$result = $this->productModel->add_product();

			echo json_encode($result);

		} else {

			$this->index();
		}
	}

	public function delete(){


	}

	public function edit(){


		$data['main_content'] = 'admin/edit_product';

		$this->load->view('admin_includes/template',$data);


	}

	public function index() {


		$data['main_content'] = 'admin/product_list';

		$this->load->view('admin_includes/template',$data);


	}

	public function upload_image() {
          
				$config['upload_path']   = './uploads/product/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['encrypt_name']  = TRUE;
				$config['remove_spaces'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file')) {

                $data = $this->upload->data();

				$config['image_library']  = 'gd2';
				$config['source_image']   = './uploads/product'.$data['file_name'];
				$config['new_image']      = './uploads/product/';
				$config['maintain_ratio'] = TRUE;
				$config['width']          = 400;
				$config['height']         = 400;
				$config['overwrite']      = TRUE;
				
				$this->load->library('image_lib', $config); 
				if (!$this->image_lib->resize()) {
				    return 'There was en error with image uploading, try later!';
				}

				// return $data['file_name'];
				$this->db->insert('product_images',['name'=>$data['file_name'],'user_id'=>$this->session->userdata('admin_id')]);
            }
	}


	



}