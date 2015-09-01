<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Opusx extends OPX_Controller{
		
		function __construct(){
			parent::__construct();
		}
		
		function index($msm = ''){
			$data['id_content'] = 'opx_login';
			$data_login['message'] = $msm;
			if($this->opx_auth->is_auth()){
				/*$data_menu['menu_items'] = $this->opx_user->get_menu_items('admin');
				$data['main_menu'] = $this->load->view('menu',$data_menu,TRUE);
				$data['main_content'] = $this->load->view('admin_catalogos',NULL,TRUE);*/
				header('Location: '. base_url() .'index.php/ctrl_flete_aereo/index');
			}
			else{
				$data['main_menu'] = $this->load->view('menu',NULL,TRUE);
				$data['main_content'] = $this->load->view('login',$data_login,TRUE);
			}
			$data['main_footer'] = $this->load->view('footer',NULL,TRUE);
			$this->load->view('layout', $data);
		}
		
		
		/**
		 * Controla el procesos de login mediante con asistencia de los métodos de la clase OPX_Auth
		 */
		function login(){
			$user = $this->input->post('username');
			$password = $this->input->post('password');
			if(!$this->opx_auth->login($user, $password))
				$this->index('El nombre de usuario o contraseña no son validos');
			else	
				header('Location: index');
		}
		
		
		/**
		 * Controla el procesos de logout mediante con la asistencia de los métodos de la clase OPX_Auth
		 */
		function logout(){
			$this->opx_auth->logout();
			header('Location: index');
		}
	}