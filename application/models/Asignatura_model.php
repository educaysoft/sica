<?php
class Asignatura_model extends CI_model {

	function lista_asignaturas(){
		 $asignatura= $this->db->get('asignatura');
		 return $asignatura;
	}


	function lista_asignaturasA(){
		 $asignatura= $this->db->get('asignatura1');
		 return $asignatura;
	}




 	function asignatura( $id){
 		$asignatura = $this->db->query('select * from asignatura where idasignatura="'. $id.'"');
 		return $asignatura;
 	}

 	function save($array)
 	{
		$this->db->insert("asignatura", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idasignatura',$id);
 		$this->db->update('asignatura',$array_item);
	}


 	public function delete($id)
	{
 		$this->db->where('idasignatura',$id);
		$this->db->delete('asignatura');
    if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idasignatura")->get('asignatura');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idasignatura")->get('asignatura');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$asignatura = $this->db->select("idasignatura")->order_by("idasignatura")->get('asignatura')->result_array();
		$arr=array("idasignatura"=>$id);
		$clave=array_search($arr,$asignatura);
	   if(array_key_exists($clave+1,$asignatura))
		 {

 		$asignatura = $this->db->query('select * from asignatura where idasignatura="'. $asignatura[$clave+1]["idasignatura"].'"');
		 }else{

 		$asignatura = $this->db->query('select * from asignatura where idasignatura="'. $id.'"');
		 }
		 	
 		return $asignatura;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$asignatura = $this->db->select("idasignatura")->order_by("idasignatura")->get('asignatura')->result_array();
		$arr=array("idasignatura"=>$id);
		$clave=array_search($arr,$asignatura);
	   if(array_key_exists($clave-1,$asignatura))
		 {

 		$asignatura = $this->db->query('select * from asignatura where idasignatura="'. $asignatura[$clave-1]["idasignatura"].'"');
		 }else{

 		$asignatura = $this->db->query('select * from asignatura where idasignatura="'. $id.'"');
		 }
		 	
 		return $asignatura;
 	}






 

}
