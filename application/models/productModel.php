<?php 



/**
* 
*/
class ProductModel extends CI_Model
{
	



	public function add_product() {

		$info  = $this->input->post();
	
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
			$output["product_thumb "] = '';

		if ($this->form_validation->run('product_upload_validation')==FALSE) {
		
			$output['status']            = 'false';
			$output["product_name     "] = form_error('name');
			$output["product_desc     "] = form_error('description');
			$output["product_price    "] = form_error('price');
			$output["product_status   "] = form_error('product_status');
			$output["product_sku      "] = form_error('sku');
			$output["product_qty"]       = form_error('quantity');
			$output["product_shipping "] = form_error('shipping');
			$output["product_thumb "]    = form_error('thumbnail');
			$output['msg']               = '';
			
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