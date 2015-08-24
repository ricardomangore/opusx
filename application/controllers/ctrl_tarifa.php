<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');
	
class CTRL_Tarifa extends OPX_Controller{
	
		function index(){
			
			$this->load->model('tarifa_model');
			
			if($this->opx_auth->is_auth()){
				$data_menu['menu_items'] = $this->opx_user->get_menu_items('admin');
				$data['main_menu'] = $this->load->view('menu',$data_menu,TRUE);
				$data['main_content'] = '<div class="container"><div class="row"><div class="col-md-12">' .$this->tarifa_model->get_tarifas() .'</div></div></div>';
			}
			else{
				$data['main_menu'] = $this->load->view('menu',NULL,TRUE);
				$data['main_content'] = $this->load->view('login',NULL,TRUE);
			}
			$data['main_footer'] = $this->load->view('footer',NULL,TRUE);
			$this->load->view('layout', $data);
		}
	
}