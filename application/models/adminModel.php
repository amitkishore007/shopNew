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


	


}