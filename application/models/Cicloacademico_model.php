<?php
class Cicloacademico_model extends CI_model {

	function lista_cicloacademicos(){
		 $cicloacademico= $this->db->get('cicloacademico');
		 return $cicloacademico;
	}

 	function cicloacademico( $id){
 		$cicloacademico = $this->db->query('select * from cicloacademico where idcicloacademico="'. $id.'"');
 		return $cicloacademico;
 	}

 	function save($array)
 	{
		$this->db->insert("cicloacademico", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idcicloacademico',$id);
 		$this->db->update('cicloacademico',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idcicloacademico',$id);
		$this->db->delete('cicloacademico');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idcicloacademico")->get('cicloacademico');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idcicloacademico")->get('cicloacademico');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$cicloacademico = $this->db->select("idcicloacademico")->order_by("idcicloacademico")->get('cicloacademico')->result_array();
		$arr=array("idcicloacademico"=>$id);
		$clave=array_search($arr,$cicloacademico);
	   if(array_key_exists($clave+1,$cicloacademico))
		 {

 		$cicloacademico = $this->db->query('select * from cicloacademico where idcicloacademico="'. $cicloacademico[$clave+1]["idcicloacademico"].'"');
		 }else{

 		$cicloacademico = $this->db->query('select * from cicloacademico where idcicloacademico="'. $id.'"');
		 }
		 	
 		return $cicloacademico;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$cicloacademico = $this->db->select("idcicloacademico")->order_by("idcicloacademico")->get('cicloacademico')->result_array();
		$arr=array("idcicloacademico"=>$id);
		$clave=array_search($arr,$cicloacademico);
	   if(array_key_exists($clave-1,$cicloacademico))
		 {

 		$cicloacademico = $this->db->query('select * from cicloacademico where idcicloacademico="'. $cicloacademico[$clave-1]["idcicloacademico"].'"');
		 }else{

 		$cicloacademico = $this->db->query('select * from cicloacademico where idcicloacademico="'. $id.'"');
		 }
		 	
 		return $cicloacademico;
 	}






}
