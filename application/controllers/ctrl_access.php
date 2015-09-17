<?php if(!defined('BASEPATH'))	exit('No direct script access allowed');
	
class CTRL_Access extends OPX_Controller{
	
	/**
	 * login()
	 */
	public function login(){
		$username = xss_clean($this->input->post('username'));
		$password = do_hash(xss_clean($this->input->post('password')), 'md5');
		$this->form_validation->set_rules('username', 'User Name', 'required', array('required' => $this->lang->line('error_required_username')));
		$this->form_validation->set_rules('password', 'Password', 'required', array('required' => $this->lang->line('error_required_password')));
		if($this->form_validation->run() == FALSE){
			echo "error";
			self::$system_messages = array('message' => 'error');
			
			redirect('index');
		}else{
			echo "exito";
		}
	}
}