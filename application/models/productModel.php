<?php 



/**
* 
*/
class ProductModel extends CI_Model
{
	



	public function add_product() {

		$info  = $this->input->post();
		// return $info;
	
		$this->load->library('form_validation');

			$output = array();
			$output['status']            = '';
			$output["product_name     "] = '';
			$output["product_desc     "] = '';
			$output["product_price    "] = '';
			$output["product_qty  "    ] = '';
			$output["product_status   "] = '';
			$output["product_sku      "] = '';
			$output["product_shipping "] = '';
			$output["product_thumb "]    = '';
			$output['msg']               = '';
		if ($this->form_validation->run('product_upload_validation')==FALSE) {
		
			$output['status']            = 'false';
			$output["product_name"]      = form_error('title');
			$output["product_desc"]      = form_error('description');
			$output["product_price"]     = form_error('price');
			$output["product_status"]    = form_error('status');
			$output["product_sku"]       = form_error('sku');
			$output["product_qty"]       = form_error('quantity');
			$output["product_shipping "] = form_error('shipping');
			$output["product_thumb"]     = form_error('thumbnail');
			$output["category"]          = form_error('category_id');
			$output['msg']               = '';
			
		} else {


			$info['user_id'] = $this->session->userdata('admin_id');
			$this->db->insert('products',$info);

			if ($this->db->affected_rows()) {
				

				$output['status']            = 'true';
				$output['msg']				 = 'Success';
			

			} else {

				$output['status']            = 'false';
				$output['msg']				 = 'There was an error please try later !';

			}


		}
		// return $info;
			return $output;

	}


	public function edit_product() {

		$info       = $this->input->post();
		$product_id = $this->input->post('product_id');
		// return $info;
		unset($info['product_id']);
		$this->load->library('form_validation');

			$output = array();
			$output['status']            = '';
			$output["product_name     "] = '';
			$output["product_desc     "] = '';
			$output["product_price    "] = '';
			$output["product_qty  "    ] = '';
			$output["product_status   "] = '';
			$output["product_sku      "] = '';
			$output["product_shipping "] = '';
			$output["product_thumb "]    = '';
			$output['msg']               = '';
		if ($this->form_validation->run('product_upload_validation')==FALSE) {
		
			$output['status']            = 'false';
			$output["product_name"]      = form_error('title');
			$output["product_desc"]      = form_error('description');
			$output["product_price"]     = form_error('price');
			$output["product_status"]    = form_error('status');
			$output["product_sku"]       = form_error('sku');
			$output["product_qty"]       = form_error('quantity');
			$output["product_shipping "] = form_error('shipping');
			$output["product_thumb"]     = form_error('thumbnail');
			$output["category"]          = form_error('category_id');
			$output['msg']               = '';
			
		} else {


			$user_id = $this->session->userdata('admin_id');

			// return $info;

			$q = $this->db->where(['user_id'=>$user_id,'id'=>$product_id])->get('products');
			
			if ($this->session->userdata('role')=='superadmin' || $q->num_rows()) {

				
				//perform the update
				$this->db->where(['id'=>$product_id])->update('products',$info);


				if ($this->db->affected_rows()>=0) {
					

					$output['status']            = 'true';
					$output['msg']				 = 'Success';
				

				} else {

					$output['status']            = 'false';
					$output['msg']				 = 'There was an error please try later !';

				}

				

			} else {

				//abort the update
					$output['status']            = 'false';
					$output['msg']				 = 'You do not have permission to !';

					
			}

			// $this->db->insert('products',$info);


		}
		// return $info;
			return $output;

	}





	public function all_products(){

		$this->db->select('products.id as product_id,products.user_id as user_id,products.title,products.price,products.thumbnail,products.created_at,products.status,users.username');
		$this->db->from('products');
		$this->db->join('users', 'products.user_id = users.id');
		$this->db->order_by('created_at','DESC');
		$query = $this->db->get();
		return $query->result();

	}


	public function find_product($id) {

	$q = $this->db->where(['id'=>$id,'user_id'=>$this->session->userdata('admin_id')])->get('products');

		if ($q->num_rows()) {
			
			return $q->row();
		}
	}


	public function deleteProduct() {

		$id = (int) $this->input->post('product_id');

		$output = array('status'=>'false','msg'=>'');

		$q = $this->db->where(['id'=>$id])->get('products');
		
		if ($q->num_rows()==1) {
			
			$this->db->where(['id'=>$id])->delete('products');

			if ($this->db->affected_rows()==1) {
				
				$output['status'] = 'true';
				$output['msg'] = 'Successfuly deleted';
			}
		}

		return $output;

	}


	public function find_hot_sale() {

		$q = $this->db->where(['hot_sale'=>1])->get('products');
		
		if ($q->num_rows()) {
			
			return $q->result();
		}
	}


}