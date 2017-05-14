<?php 

/**
* 
*/
class AdminModel extends CI_Model
{
	

	public function check_login($info) {

		$info  = $this->input->post();

		$info['user_type'] = 'superadmin';
	
		$this->load->library('form_validation');

		$output = array();
		
		$output['status'] = "";
		
		$output['msg']    = "";
				

		if ($this->form_validation->run('login_form_validation')==FALSE) {
				
			$output['status'] = "false";
			$output['msg']    = "Email/password did not matched !";

		} else {

		
			$info['password'] = md5($info['password']);
			
			$result = $this->db->where($info)->get('users');

			if ($result->num_rows()) {
					
				$admin  = $result->row();
				$data = array(
					'admin_id'=>$admin->id,
					'admin_email'=>$admin->email,
					'role'=>$admin->user_type,
					'is_logged_in'=>true
					);
				$this->session->set_userdata($data);
				
				$output['status'] = "true";
				
				$output['msg']    = "success";

			} else {

				$output['status'] = "false";
				
				$output['msg']          = "Admin not found";
				
			}


		}

		return $output;

	}

	public function all_category() {

		$q = $this->db->select('id,name,parent_id')->from('categories')->get();

		return $q->result();
	}



	// find child category

// 	public function get_categories() {

// 		$categories = $this->all_category();

// 		$sub_category = array();
// 		foreach ($categories as $category) {
				
// 				$sub_category[] = $this->get_subcat($category->id);
// 				// $sub_category[] = $this->get_subcat($category->id,$category->parent_id);

// 			}	
// }


// 	public function get_subcat($cat_id) {

// 		$q = $this->db->where(['parent_id'=>$cat_id])->get('categories');
// 		return $q->result();
// 	}


	public function create_category() {

		$info  = $this->input->post();

		
	
		$this->load->library('form_validation');

			$output = array();
		
			$output['status']  = "";
			$output['name']    = "";
			$output['parent']  = "";
			$output['desc']    = "";
					

		if ($this->form_validation->run('category_form_validation')==FALSE) {
			
			$this->form_validation->set_error_delimiters('', '');
			$output['status']  = "false";
			$output['name']    = form_error('name');
			$output['parent']  = form_error('parent_id');
			$output['desc']    = form_error('description');
			$output['msg']     = 'error occured';

		} else {


			$this->db->insert('categories',$info);

			if ($this->db->affected_rows()) {
					
				
				$output['status'] = "true";	
				

			} else {

				$output['status'] = "false";
				
				$output['msg']   = "Category could not be created, please try later";
				
			}

				$output['name']    = '';
				$output['parent']  = '';
				$output['desc']    = '';


		}

		return $output;


	}



	public function upload_image() {
          
			$config['upload_path']   = './uploads';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['encrypt_name']  = TRUE;
			$config['remove_spaces'] = TRUE;

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
				$this->db->insert('product_images',['name'=>$data['file_name'],'user_id'=>$this->session->userdata('admin_id')]);
            }
	}


	public function add_product() {

		$info  = $this->input->post();
	
		$this->load->library('form_validation');

			$output = array();
			$output['status']  			 = '';
			$output["product_name     "] = '';
			$output["product_desc     "] = '';
			$output["product_price    "] = '';
			$output["product_compare  "] = '';
			$output["product_status   "] = '';
			$output["product_sku      "] = '';
			$output["product_shipping "] = '';

		if ($this->form_validation->run('product_upload_validation')==FALSE) {
		
			$output['status']            = 'false';
			$output["product_name     "] = form_error('name');
			$output["product_desc     "] = form_error('description');
			$output["product_price    "] = form_error('price');
			$output["product_compare  "] = form_error('compare_price');
			$output["product_status   "] = form_error('product_status');
			$output["product_sku      "] = form_error('sku');
			$output["product_shipping "] = form_error('shipping');
			$output['msg']				 = '';
	
		} else {



			$this->db->insert($info,'products');

			if ($this->db->affected_rows()) {
				

				$output['status']            = 'true';
				$output['msg']				 = 'Success';
			

			} else {

				$output['status']            = 'false';
				$output['msg']				 = 'There was an error please try later !';

			}

			return $output;

		}

	}



}