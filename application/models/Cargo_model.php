<?php
class Cargo_model extends CI_model {

	function lista_cargoes(){
		 $cargo= $this->db->get('cargo');
		 return $cargo;
	}

 	function cargo( $id){
 		$cargo = $this->db->query('select * from cargo where idcargo="'. $id.'"');
 		return $cargo;
 	}

 	function save($array)
 	{
		$this->db->insert("cargo", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idcargo',$id);
 		$this->db->update('cargo',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idcargo',$id);
		$this->db->delete('cargo');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idcargo")->get('cargo');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idcargo")->get('cargo');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$cargo = $this->db->select("idcargo")->order_by("idcargo")->get('cargo')->result_array();
		$arr=array("idcargo"=>$id);
		$clave=array_search($arr,$cargo);
	   if(array_key_exists($clave+1,$cargo))
		 {

 		$cargo = $this->db->query('select * from cargo where idcargo="'. $cargo[$clave+1]["idcargo"].'"');
		 }else{

 		$cargo = $this->db->query('select * from cargo where idcargo="'. $id.'"');
		 }
		 	
 		return $cargo;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$cargo = $this->db->select("idcargo")->order_by("idcargo")->get('cargo')->result_array();
		$arr=array("idcargo"=>$id);
		$clave=array_search($arr,$cargo);
	   if(array_key_exists($clave-1,$cargo))
		 {

 		$cargo = $this->db->query('select * from cargo where idcargo="'. $cargo[$clave-1]["idcargo"].'"');
		 }else{

 		$cargo = $this->db->query('select * from cargo where idcargo="'. $id.'"');
		 }
		 	
 		return $cargo;
 	}






}
