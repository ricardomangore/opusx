<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Recargo_Maritimo extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	
	/**
	 * set_recargo_maritimo
	 * 
	 * Inserta un nuevo registro recargo en la tabla recargo_maritimo
	 * 
	 * @param $recargo array	Arreglo con valores para cada uno de los campos recargo
	 * 							'idnaviera'		Identificador de la aerolinea que ejerce el recargo
	 * 							'clave'				Clave alfanumerica del recargo
	 * 							'descripcion'		Descripción del recargo
	 * 							'costo'				Costo del recargo
	 */
	public function set_recargo_maritimo( $recargo ){
		$data = array(
			'clave' 	  => $recargo['clave'],
			'descripcion' => $recargo['descripcion'],
			'costo'		  => (float)$recargo['costo']
		);
		$this->db->trans_start();
			$this->db->insert('recargo', $data );
			$recargo_maritimo = array(
				'idnaviera'	=> $recargo['idnaviera'],
				'idrecargo'		=> $this->db->insert_id()
			);
			$this->db->insert('recargo_maritimo', $recargo_maritimo);
		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return FALSE;
		}else{
			$this->db->trans_commit();
			return TRUE;
		}
	}
	
	/*
	 * get_recargos_maritmos()
	 * 
	 * Regresa una lista de recargos aéreos
	 * 
	 */
	public function get_recargos_maritimos(){
		$this->db->select('*');
		$this->db->from('recargo_maritimo');
		$this->db->join('recargo', 'recargo.idrecargo = recargo_maritimo.idrecargo','left');
		$this->db->join('naviera','naviera.idnaviera = recargo_maritimo.idnaviera', 'left');
		$query  =$this->db->get();
		return $query->result_array();
	}
	
	/**
	 * get_recargo_maritimo()
	 * 
	 * Retorna el un registro de un recargo aereo dado un ID de la tabla recargo_maritimo
	 * 
	 * @param	INT		Identificador del recargo maritimo
	 */
	public function get_recargo_maritimo($id_recargo_maritimo){
		$this->db->select('*');
		$this->db->from('recargo_maritimo');
		$this->db->join('recargo','recargo.idrecargo = recargo_maritimo.idrecargo','left');
		$this->db->join('naviera', 'naviera.idnaviera = recargo_maritimo.idnaviera', 'left');
		$this->db->where('recargo_maritimo.idrecargo_maritimo = ' . $id_recargo_maritimo);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	/**
	 * update_recargo_maritimo
	 * 
	 * Actualiza un registro de recargo maritimo y de la tabla recargo
	 * 
	 * @param array		params    Arreglo que contienen lo snuevo svalores de los campos a actulizar 
	 */
	public function update_recargo_maritimo($params){
		$data_recargo = array(
			'clave'			=> $params['clave'],
			'descripcion'	=> $params['descripcion'],
			'costo'			=> $params['costo']
		);
		$data_recargo_maritimo = array(
			'idnaviera'	=> $params['idnaviera']
		);
		$this->db->trans_start();
			$this->db->set($data_recargo);
			$this->db->where('idrecargo',$params['idrecargo']);
			$this->db->update('recargo');
			
			$this->db->set($data_recargo_maritimo);
			$this->db->where('idrecargo_maritimo',$params['idrecargo_maritimo']);
			$this->db->update('recargo_maritimo');
		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return FALSE;
		}else{
			$this->db->trans_commit();
			return TRUE;
		}	
	}
}