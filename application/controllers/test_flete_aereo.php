<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Test_Flete_Aereo extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('flete_aereo');
	}
	
	public function index(){
		
	}
	
	public function test_set_flete_aereo(){
		$flete_aereo = array(
			'aol' => 1,
			'aod' => 9,
			'idregion' => 1,
			'idaerolinea' => 1,
			'vigencia' => '2015-09-15',
			'minimo' => 4.3,
			'normal' => 234.5,
			'has_via' => TRUE,
			'vias' => array(4,5,6,7),
			'intervalos' => array(
				array(
					'min' => 40,
					'max' => 100,
					'precio' => 345.5
				)
			),
			'has_recargos' => TRUE,
			'recargos' => array(2,3,4)
			
		);
		try{
			$this->flete_aereo->set_flete_aereo($flete_aereo);
		}catch(Exception $e){
			echo $e->getCode();
		}
	}
	
	public function test_get_fletes_aereos(){
		$fletes_aereos = $this->flete_aereo->get_fletes_aereos();
		foreach($fletes_aereos as $flete_aereo){
			print_r($flete_aereo);
			echo "<br/>";
		}
	}
}