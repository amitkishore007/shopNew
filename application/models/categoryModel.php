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

		// return $this->fetchCategoryTree();

	}

	public function allCategory_array() {


		$q = $this->db->select('id,name,parent_id')->from('categories')->get();

		if ($q->num_rows()) {
			
			return $q->result_array();
		}

		// return $this->fetchCategoryTree();

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

		}

		return $output;


	}


		public function edit_category() {

		

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

			$data = array();
			$cat_id 			 = (int) $this->input->post('cat_id');
			$data['name']        = $this->input->post('name');
			$data['parent_id']   = $this->input->post('parent_id');
			$data['description'] = $this->input->post('description');

			// $this->db->insert('categories',$info);

			$this->db->where(['id'=>$cat_id])->update('categories',$data);

			if ($this->db->affected_rows()>=0) {
					
				
				$output['status'] = "true";	
				

			} else {

				$output['status'] = "false";
				
				$output['msg']   = "Category could not be updated, please try later";
				
			}

				$output['name']    = '';
				$output['parent']  = '';
				$output['desc']    = '';


		}

		return $output;


	}

	function fetchCategoryTree($parent_id = 0, $spacing='',$user_tree_array = '') {
 
		  if (!is_array($user_tree_array))
		    $user_tree_array = array();
		 
		 $q = $this->db->query("SELECT id, name, parent_id FROM categories WHERE 1 AND parent_id = ".$parent_id." ORDER BY name ASC");
		
		 
		  if ($q->num_rows()) {
		   
		  	$user_tree_array[] = "<ul>";
		  	foreach ($q->result() as $row) {
		  	
		  	  $user_tree_array[] = "<li id='row_{$row->id}'>".$spacing.$row->name."<span class='cat-action'><a href='".base_url()."category/edit/{$row->id}' class='btn btn-sm btn-primary'>Edit</a> <a href='javascript:void(0);' data-id='{$row->id}' class='btn btn-sm btn-danger delete-category'>Delete</a></span></li>";
		      $user_tree_array = $this->fetchCategoryTree($row->id,$spacing."-" ,$user_tree_array);
		   
		  	}
		 	$user_tree_array[] = "</ul>";
		
		  }
		
		  return $user_tree_array;
		
		}


	function fetchCategoryTree_frontend($parent_id = 0, $spacing='',$user_tree_array = '') {
 
		  if (!is_array($user_tree_array))
		    $user_tree_array = array();
		 
		 $q = $this->db->query("SELECT id, name, parent_id FROM categories WHERE 1 AND parent_id = ".$parent_id." ORDER BY name ASC");
		
		 
		  if ($q->num_rows()) {
		   
		  	
		  	foreach ($q->result() as $row) {
		  	
		  	  $user_tree_array[] = "<option value='{$row->id}'>".$spacing.ucwords($row->name)."</option>";
		      $user_tree_array = $this->fetchCategoryTree_frontend($row->id,$spacing."&nbsp;&nbsp;" ,$user_tree_array);
		   
		  	}
		 	
		
		  }
		
		  return $user_tree_array;
		
	}





	public function find_category($id) {

		$q = $this->db->where(['id'=>$id])->get('categories');

		if ($q->num_rows()) {
			
			return $q->row();
		}

	}


	public function deleteCategory() {

		$id = (int) $this->input->post('category_id');

		$output = array('status'=>'false','msg'=>'');

		$q = $this->db->where(['id'=>$id])->get('categories');
		
		if ($q->num_rows()==1) {
			
			$this->db->where(['id'=>$id])->delete('categories');

			if ($this->db->affected_rows()==1) {
				
				$output['status'] = 'true';
				$output['msg'] = 'Successfuly deleted';
			}
		}

		return $output;

	}


	public function buildTree(array &$elements, $parentId = 0) {

	    $branch = array();    
	    foreach ($elements as $element) {
	        if ($element['parent_id'] == $parentId) {
	            $children = $this->buildTree($elements, $element['id']);
	            if ($children) {
	                $element['children'] = $children;
	            }
	            $branch[$element['id']] = $element;
	        }
	    }
	    return $branch;
	}



}			


														


