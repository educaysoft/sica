<?php
class Paralelo_model extends CI_model {

	function lista_paralelos(){
		 $paralelo= $this->db->get('paralelo');
		 return $paralelo;
	}

 	function paralelo( $id){
 		$paralelo = $this->db->query('select * from paralelo where idparalelo="'. $id.'"');
 		return $paralelo;
 	}

 	function save($array)
 	{
		$this->db->insert("paralelo", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idparalelo',$id);
 		$this->db->update('paralelo',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idparalelo',$id);
		$this->db->delete('paralelo');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idparalelo")->get('paralelo');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idparalelo")->get('paralelo');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$paralelo = $this->db->select("idparalelo")->order_by("idparalelo")->get('paralelo')->result_array();
		$arr=array("idparalelo"=>$id);
		$clave=array_search($arr,$paralelo);
	   if(array_key_exists($clave+1,$paralelo))
		 {

 		$paralelo = $this->db->query('select * from paralelo where idparalelo="'. $paralelo[$clave+1]["idparalelo"].'"');
		 }else{

 		$paralelo = $this->db->query('select * from paralelo where idparalelo="'. $id.'"');
		 }
		 	
 		return $paralelo;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$paralelo = $this->db->select("idparalelo")->order_by("idparalelo")->get('paralelo')->result_array();
		$arr=array("idparalelo"=>$id);
		$clave=array_search($arr,$paralelo);
	   if(array_key_exists($clave-1,$paralelo))
		 {

 		$paralelo = $this->db->query('select * from paralelo where idparalelo="'. $paralelo[$clave-1]["idparalelo"].'"');
		 }else{

 		$paralelo = $this->db->query('select * from paralelo where idparalelo="'. $id.'"');
		 }
		 	
 		return $paralelo;
 	}






}
