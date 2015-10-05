<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Test_Contenedor extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('contenedor');
	}
	
	public function index(){
		
	}
	
	public function test_set_contenedor(){
		try{
			$this->contenedor->set_contenedor(array(
				'peso' => 26770,
				'volumen' => 67,
				'pies' => 40,
				'tipo' => 'standar',
				'inside_width' => 12,
				'inside_height' => 2.3,
				'inside_lenght' => 2.3,
				'door_width' => 2.3,
				'door_height' => 2.2,
				'tare' => 3700
			));
			echo "Inserción realizada";
		}catch(Exception $e){
			echo "Error: ". $e->getCode();
		}
	}
	
	/**
	 * Test del método "get_contenedor_by_id" del módelo: contenedor
	 */
	 public function test_get_contenedor_by_id(){
	 	try{
	 		$result = $this->contenedor->get_contenedor_by_id(1);
			var_dump($result);
	 	}catch(Exception $e){
	 		echo "Error: " . $e->getCode();
	 	}
	 }
	
	
	/**
	 * Test del método "get_contenedores()" del modelo: contenedor
	 */
	public function test_get_contenedores(){
		try{
			$result = $this->contenedor->get_contenedores();
			echo "Resultados";
			var_dump($result);
		}catch(Exception $e){
			echo "Error: " . $e->getCode();
		}
	}
	
	
	/**
	 * Test del método "update_contenedor()" del modelo: contenedor
	 */
	public function test_update_contenedor(){
		try{
			$this->contenedor->update_contenedor(array(
				'idcontenedor' => 1,
				'peso' => 5555555,//26770,
				'volumen' => 55,//67,
				'pies' => 55,//40,
				'tipo' => 'demo',//'standar',
				'inside_width' => 55,//12,
				'inside_height' => 55,//2.3,
				'inside_lenght' => 55,//2.3,
				'door_width' => 55,//2.3,
				'door_height' => 55,//2.2,
				'tare' => 55,//3700
			));
			echo "Actualización realizada";			
		}catch(Exception $e){
			echo "Error: " . $e->getCode();
		}
	}
	
	/**
	 * Test del método "delete_contenedor()" del modelo: contenedor
	 */
	public function test_delete_contenedor(){
		try{
			$this->contenedor->delete_contenedor(1);
			echo "Se realizo la eliminación";
		}catch(Exception $e){
			echo "Error: " . $e->getCode();
		}
	}
}

	