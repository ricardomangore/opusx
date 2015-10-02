<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Test_Puerto extends CI_Controller{
	
	
	public function __construct(){
		parent::__construct();
		$this->load->model('puerto');
	}
	
	public function index(){
		
		echo "test puerto";
	}
	
	
	/**
	 * Test de la insercion de puertos
	 */
	public function test_set_puerto(){
		
		$puerto = array(
			'locode' => 'tst02',
			'puerto' => 'Puerto Test 02'
		
		);
		try{
			$this->puerto->set_puerto($puerto);
			echo "El puerto fue ingresado";
		}catch(Exception $e){
			echo "Error: " . $e->getCode;
		}
	}
	
	/**
	 * Test de la actualizacion de puertos
	 */
	 public function test_update_puerto(){
	 	$puerto = array(
	 		'idpuerto' => 2,
			'locode' => 'tst044 ',
			'puerto' => 'update: Puerto Test 44'		
		);
		try{
			$this->puerto->update_puerto($puerto);
			echo "El puerto fue actualizado";
		}catch(Exception $e){
			echo "Error: " . $e->getCode();
		}
	 }
	 
	 
	 /**
	  * Test Delete puertos
	  */
	  public function test_delete_puerto(){
	 	$puerto = array(
	 		'idpuerto' => 2,
			'locode' => 'tst044 ',
			'puerto' => 'update: Puerto Test 44'		
		);
		try{
			$this->puerto->delete_puerto($puerto);
			echo "El puerto fue eliminado";
		}catch(Exception $e){
			echo "Error: " . $e->getCode();
		}	  	
	  }
	
	
}