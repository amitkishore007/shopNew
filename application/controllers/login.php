<?php 


/**
* 
*/
class Login extends CI_Controller
{
	

	
	public function login() {

		if ($this->input->post('submit')) {
			

			unset($_POST['submit']);

			
			$admin = $this->adminModel->check_login($this->input->post());
			  
			echo json_encode($admin);

				
		} else {

			 return json_encode($this->set_message(TRUE,'no direct access'));
		}

	}
}