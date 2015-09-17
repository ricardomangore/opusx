<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');


class CTRL_Dashboard extends OPX_Controller{
	
	public function index(){
		$data_header['menu'] = $this->load->view('system/menu',NULL,TRUE);
		$data['header']   = $this->load->view('system/header',$data_header,TRUE);
		$data_dashboard['sidebar'] = $this->load->view('system/sidebar',NULL,TRUE);
		$data_dashboard['content_dashboard'] = $this->load->view('system/content_dashboard',NULL,TRUE); 
		$data['content'] = $this->load->view('system/dashboard',$data_dashboard,TRUE);
		$this->load->view('system/layout',$data);
	}
	
}