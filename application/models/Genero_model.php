<?php
class Genero_model extends CI_model {

	function lista_generos(){
		 $genero= $this->db->get('genero');
		 return $genero;
	}

 	function genero( $id){
 		$genero = $this->db->query('select * from genero where idgenero="'. $id.'"');
 		return $genero;
 	}

 	function save($array)
 	{
		$this->db->insert("genero", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idgenero',$id);
 		$this->db->update('genero',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idgenero',$id);
		$this->db->delete('genero');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idgenero")->get('genero');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idgenero")->get('genero');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$genero = $this->db->select("idgenero")->order_by("idgenero")->get('genero')->result_array();
		$arr=array("idgenero"=>$id);
		$clave=array_search($arr,$genero);
	   if(array_key_exists($clave+1,$genero))
		 {

 		$genero = $this->db->query('select * from genero where idgenero="'. $genero[$clave+1]["idgenero"].'"');
		 }else{

 		$genero = $this->db->query('select * from genero where idgenero="'. $id.'"');
		 }
		 	
 		return $genero;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$genero = $this->db->select("idgenero")->order_by("idgenero")->get('genero')->result_array();
		$arr=array("idgenero"=>$id);
		$clave=array_search($arr,$genero);
	   if(array_key_exists($clave-1,$genero))
		 {

 		$genero = $this->db->query('select * from genero where idgenero="'. $genero[$clave-1]["idgenero"].'"');
		 }else{

 		$genero = $this->db->query('select * from genero where idgenero="'. $id.'"');
		 }
		 	
 		return $genero;
 	}






}
