<?php
class Estudiante_model extends CI_model {

	function lista_estudiantes(){
		 $estudiante= $this->db->get('estudiante');
		 return $estudiante;
	}


	function lista_estudiantesA(){
		 $this->db->order_by("elestudiante","asc");
		 $estudiante= $this->db->get('estudiante1');
		 return $estudiante;
	}

	function lista_estudiantesB(){
		 $this->db->order_by("elestudiante","asc");
		 $estudiante= $this->db->get('estudiante2');
		 return $estudiante;
	}


 	function estudiante( $id){
 		$estudiante = $this->db->query('select * from estudiante where idestudiante="'. $id.'"');
 		return $estudiante;
 	}


 	function estudiantespersona( $id){
 		$estudiante = $this->db->query('select * from estudiante where idpersona="'. $id.'"');
 		return $estudiante;
 	}



 	function save($array)
 	{
		$this->db->insert("estudiante", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idestudiante',$id);
 		$this->db->update('estudiante',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idestudiante',$id);
		$this->db->delete('estudiante');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idestudiante")->get('estudiante1');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idestudiante")->get('estudiante1');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$estudiante = $this->db->select("idestudiante")->order_by("idestudiante")->get('estudiante1')->result_array();
		$arr=array("idestudiante"=>$id);
		$clave=array_search($arr,$estudiante);
	   if(array_key_exists($clave+1,$estudiante))
		 {

 		$estudiante = $this->db->query('select * from estudiante where idestudiante="'. $estudiante[$clave+1]["idestudiante"].'"');
		 }else{

 		$estudiante = $this->db->query('select * from estudiante where idestudiante="'. $id.'"');
		 }
		 	
 		return $estudiante;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$estudiante = $this->db->select("idestudiante")->order_by("idestudiante")->get('estudiante1')->result_array();
		$arr=array("idestudiante"=>$id);
		$clave=array_search($arr,$estudiante);
	   if(array_key_exists($clave-1,$estudiante))
		 {

 		$estudiante = $this->db->query('select * from estudiante1 where idestudiante="'. $estudiante[$clave-1]["idestudiante"].'"');
		 }else{

 		$estudiante = $this->db->query('select * from estudiante1 where idestudiante="'. $id.'"');
		 }
		 	
 		return $estudiante;
 	}






}
