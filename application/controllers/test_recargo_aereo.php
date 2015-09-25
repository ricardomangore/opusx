<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Test_Recargo_Aereo extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('recargo_aereo');
	}
	
	public function index(){
		
	}
	
	public function test_set_recargo_aereo(){
		$data = array(
			'clave' => 'NEW',
			'descripcion' => 'Nueva descripcion',
			'costo' => '234.00',
			'idaerolinea' => '2'
		);
		try{
			$this->recargo_aereo->set_recargo_aereo($data);
			echo "Listo";
		}catch(Exception $e){
			echo $e->getMessage();
		}
	}
	
	public function test_get_recargos_aereos(){
		try{
			$result =  $this->recargo_aereo->get_recargos_aereos();
			var_dump($result);
		}catch(Exception $e){
			echo $e->getMessage();
		}
	}
	
	public function test_get_recargo_aereo_by_id(){
		try{
			$result =  $this->recargo_aereo->get_recargo_aereo_by_id(1);
			var_dump($result);
		}catch(Exception $e){
			echo $e->getMessage();
		}
	}
	
	public function test_update_recargo_aereo(){
		try{
			$data = array(
				'idrecargo_aereo' => '1',
				'clave' => 'CLF',
				'costo' => '234.4',
				'descripcion' => 'Descripcion modificada',
				'idaerolinea' => '4'
			);
			$this->recargo_aereo->update_recargo_aereo($data);
			echo "Modificado";
		}catch(Exception $e){
			echo $e->getMessage();
		}
	}

public function test_delete_recargo_aereo(){
	try{
		$data = array('idrecargo_aereo' => '1');
		$this->recargo_aereo->delete_recargo_aereo($data);
		echo "Borrado";
	}catch(Exception $e){
		echo $e->getMessage();
	}
}	
	
}