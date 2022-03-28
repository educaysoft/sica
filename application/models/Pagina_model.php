<?php
class Pagina_model extends CI_model {

	function lista_paginas(){
		 $pagina= $this->db->get('pagina');
		 return $pagina;
	}

 	function pagina( $id){
 		$pagina = $this->db->query('select * from pagina where idpagina="'. $id.'"');
		 
 		return $pagina;
 	}

 	function save($array)
 	{
		$this->db->insert("pagina", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idpagina',$id);
 		$this->db->update('pagina',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idpagina',$id);
		$this->db->delete('pagina');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


public function get_pagina($id){
	$condition = "idpagina =" .  $id ;
	$this->db->select('*');
	$this->db->from('pagina');
	$this->db->where($condition);
	$this->db->limit(1);
	$query = $this->db->get();

	if ($query->num_rows() == 1) {
		return $query->result();
	} else {
		return false;
	}

}





	function elprimero()
	{
		$query=$this->db->order_by("idpagina")->get('pagina');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idpagina")->get('pagina');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$pagina = $this->db->select("idpagina")->order_by("idpagina")->get('pagina')->result_array();
		$arr=array("idpagina"=>$id);
		$clave=array_search($arr,$pagina);
	   if(array_key_exists($clave+1,$pagina))
		 {

 		$pagina = $this->db->query('select * from pagina where idpagina="'. $pagina[$clave+1]["idpagina"].'"');
		 }else{

 		$pagina = $this->db->query('select * from pagina where idpagina="'. $id.'"');
		 }
		 	
 		return $pagina;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$pagina = $this->db->select("idpagina")->order_by("idpagina")->get('pagina')->result_array();
		$arr=array("idpagina"=>$id);
		$clave=array_search($arr,$pagina);
	   if(array_key_exists($clave-1,$pagina))
		 {

 		$pagina = $this->db->query('select * from pagina where idpagina="'. $pagina[$clave-1]["idpagina"].'"');
		 }else{

 		$pagina = $this->db->query('select * from pagina where idpagina="'. $id.'"');
		 }
		 	
 		return $pagina;
 	}



	function lista_paginaes_con_inscripciones(){
		 $this->db->select('pagina.*');
		 $this->db->from('pagina,evento');
		 $this->db->where('evento.idpagina=pagina.idpagina and evento.idevento_estado=2');
		 $pagina= $this->db->get();
		 return $pagina;
	}




}
