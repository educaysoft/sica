<?php
class Pais_model extends CI_model {

	function lista_paises(){
		 $pais= $this->db->get('pais');
		 return $pais;
	}

	function lista_paisesA(){
		 $pais= $this->db->get('pais1');
		 return $pais;
	}




 	function pais( $id){
 		$pais = $this->db->query('select * from pais where idpais="'. $id.'"');
 		return $pais;
 	}

 	function save($array)
 	{
		$this->db->insert("pais", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idpais',$id);
 		$this->db->update('pais',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idpais',$id);
		$this->db->delete('pais');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idpais")->get('pais');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idpais")->get('pais');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$pais = $this->db->select("idpais")->order_by("idpais")->get('pais')->result_array();
		$arr=array("idpais"=>$id);
		$clave=array_search($arr,$pais);
	   if(array_key_exists($clave+1,$pais))
		 {

 		$pais = $this->db->query('select * from pais where idpais="'. $pais[$clave+1]["idpais"].'"');
		 }else{

 		$pais = $this->db->query('select * from pais where idpais="'. $id.'"');
		 }
		 	
 		return $pais;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$pais = $this->db->select("idpais")->order_by("idpais")->get('pais')->result_array();
		$arr=array("idpais"=>$id);
		$clave=array_search($arr,$pais);
	   if(array_key_exists($clave-1,$pais))
		 {

 		$pais = $this->db->query('select * from pais where idpais="'. $pais[$clave-1]["idpais"].'"');
		 }else{

 		$pais = $this->db->query('select * from pais where idpais="'. $id.'"');
		 }
		 	
 		return $pais;
 	}








}
