<?php
class Estadotrabajointegracioncurricular_model extends CI_model {

	function lista_estadotrabajointegracioncurriculars(){
		 $estadotrabajointegracioncurricular= $this->db->get('estadotrabajointegracioncurricular');
		 return $estadotrabajointegracioncurricular;
	}

 	function estadotrabajointegracioncurricular( $id){
 		$estadotrabajointegracioncurricular = $this->db->query('select * from estadotrabajointegracioncurricular where idestadotrabajointegracioncurricular="'. $id.'"');
 		return $estadotrabajointegracioncurricular;
 	}

 	function save($array)
 	{
		$this->db->insert("estadotrabajointegracioncurricular", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idestadotrabajointegracioncurricular',$id);
 		$this->db->update('estadotrabajointegracioncurricular',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idestadotrabajointegracioncurricular',$id);
		$this->db->delete('estadotrabajointegracioncurricular');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idestadotrabajointegracioncurricular")->get('estadotrabajointegracioncurricular');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idestadotrabajointegracioncurricular")->get('estadotrabajointegracioncurricular');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$estadotrabajointegracioncurricular = $this->db->select("idestadotrabajointegracioncurricular")->order_by("idestadotrabajointegracioncurricular")->get('estadotrabajointegracioncurricular')->result_array();
		$arr=array("idestadotrabajointegracioncurricular"=>$id);
		$clave=array_search($arr,$estadotrabajointegracioncurricular);
	   if(array_key_exists($clave+1,$estadotrabajointegracioncurricular))
		 {

 		$estadotrabajointegracioncurricular = $this->db->query('select * from estadotrabajointegracioncurricular where idestadotrabajointegracioncurricular="'. $estadotrabajointegracioncurricular[$clave+1]["idestadotrabajointegracioncurricular"].'"');
		 }else{

 		$estadotrabajointegracioncurricular = $this->db->query('select * from estadotrabajointegracioncurricular where idestadotrabajointegracioncurricular="'. $id.'"');
		 }
		 	
 		return $estadotrabajointegracioncurricular;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$estadotrabajointegracioncurricular = $this->db->select("idestadotrabajointegracioncurricular")->order_by("idestadotrabajointegracioncurricular")->get('estadotrabajointegracioncurricular')->result_array();
		$arr=array("idestadotrabajointegracioncurricular"=>$id);
		$clave=array_search($arr,$estadotrabajointegracioncurricular);
	   if(array_key_exists($clave-1,$estadotrabajointegracioncurricular))
		 {

 		$estadotrabajointegracioncurricular = $this->db->query('select * from estadotrabajointegracioncurricular where idestadotrabajointegracioncurricular="'. $estadotrabajointegracioncurricular[$clave-1]["idestadotrabajointegracioncurricular"].'"');
		 }else{

 		$estadotrabajointegracioncurricular = $this->db->query('select * from estadotrabajointegracioncurricular where idestadotrabajointegracioncurricular="'. $id.'"');
		 }
		 	
 		return $estadotrabajointegracioncurricular;
 	}






}
