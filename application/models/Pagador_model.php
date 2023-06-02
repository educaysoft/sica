<?php
class Pagador_model extends CI_model {

	function listar_pagadores(){
		 $pagador= $this->db->get('pagador');
		 return $pagador;
	}

	function listar_pagador1(){
		 $pagador= $this->db->get('pagador1');
		 return $pagador;
	}



 	function pagador( $id){
 		$pagador = $this->db->query('select * from pagador where idpagador="'. $id.'"');
 		return $pagador;
 	}

 	function save($array)
 	{
		$this->db->insert("pagador", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idpagador',$id);
		 $query= $this->db->get('pagador');
		if($query->num_rows()>0)
		{
 			$this->db->where('idpagador',$id);
 			$this->db->update('pagador',$array_item);
			return true;
		}else{
	        	return false;
		}

	}
 

  public function delete($id)
	{
 		$this->db->where('idpagador',$id);
		$this->db->delete('pagador');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idpagador")->get('pagador');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idpagador")->get('pagador');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$pagador = $this->db->select("idpagador")->order_by("idpagador")->get('pagador')->result_array();
		$arr=array("idpagador"=>$id);
		$clave=array_search($arr,$pagador);
	   if(array_key_exists($clave+1,$pagador))
		 {

 		$pagador = $this->db->query('select * from pagador where idpagador="'. $pagador[$clave+1]["idpagador"].'"');
		 }else{

 		$pagador = $this->db->query('select * from pagador where idpagador="'. $id.'"');
		 }
		 	
 		return $pagador;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$pagador = $this->db->select("idpagador")->order_by("idpagador")->get('pagador')->result_array();
		$arr=array("idpagador"=>$id);
		$clave=array_search($arr,$pagador);
	   if(array_key_exists($clave-1,$pagador))
		 {

 		$pagador = $this->db->query('select * from pagador where idpagador="'. $pagador[$clave-1]["idpagador"].'"');
		 }else{

 		$pagador = $this->db->query('select * from pagador where idpagador="'. $id.'"');
		 }
		 	
 		return $pagador;
 	}


}
