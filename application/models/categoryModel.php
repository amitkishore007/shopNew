<?php 



/**
* 
*/
class CategoryModel extends CI_Model
{




	public function allCategory() {


		$q = $this->db->select('id,name,parent_id')->from('categories')->get();

		if ($q->num_rows()) {
			
			return $q->result();
		}

	}

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









}
