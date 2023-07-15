<?php
class Metodologiasasignatura_model extends CI_model {

	function lista_metodologiasasignaturas(){
		 $metodologiasasignatura= $this->db->get('metodologiasasignatura');
		 return $metodologiasasignatura;
	}


	function lista_metodologiasasignaturasA(){
		 $metodologiasasignatura= $this->db->get('metodologiasasignatura1');
		 return $metodologiasasignatura;
	}



 	function metodologiasasignatura( $id){
 		$metodologiasasignatura = $this->db->query('select * from metodologiasasignatura where idmetodologiasasignatura="'. $id.'"');
 		return $metodologiasasignatura;
 	}


 	function metodologiasasignaturasA( $idasignatura){
 		$metodologiasasignatura = $this->db->query('select * from metodologiasasignatura1 where idasignatura="'. $idasignatura.'"');
 		return $metodologiasasignatura;
 	}



 	function save($array)
 	{
		$this->db->insert("metodologiasasignatura", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idmetodologiasasignatura',$id);
 		$this->db->update('metodologiasasignatura',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idmetodologiasasignatura',$id);
		$this->db->delete('metodologiasasignatura');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idmetodologiasasignatura")->get('metodologiasasignatura');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idmetodologiasasignatura")->get('metodologiasasignatura');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$metodologiasasignatura = $this->db->select("idmetodologiasasignatura")->order_by("idmetodologiasasignatura")->get('metodologiasasignatura')->result_array();
		$arr=array("idmetodologiasasignatura"=>$id);
		$clave=array_search($arr,$metodologiasasignatura);
	   if(array_key_exists($clave+1,$metodologiasasignatura))
		 {

 		$metodologiasasignatura = $this->db->query('select * from metodologiasasignatura where idmetodologiasasignatura="'. $metodologiasasignatura[$clave+1]["idmetodologiasasignatura"].'"');
		 }else{

 		$metodologiasasignatura = $this->db->query('select * from metodologiasasignatura where idmetodologiasasignatura="'. $id.'"');
		 }
		 	
 		return $metodologiasasignatura;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$metodologiasasignatura = $this->db->select("idmetodologiasasignatura")->order_by("idmetodologiasasignatura")->get('metodologiasasignatura')->result_array();
		$arr=array("idmetodologiasasignatura"=>$id);
		$clave=array_search($arr,$metodologiasasignatura);
	   if(array_key_exists($clave-1,$metodologiasasignatura))
		 {

 		$metodologiasasignatura = $this->db->query('select * from metodologiasasignatura where idmetodologiasasignatura="'. $metodologiasasignatura[$clave-1]["idmetodologiasasignatura"].'"');
		 }else{

 		$metodologiasasignatura = $this->db->query('select * from metodologiasasignatura where idmetodologiasasignatura="'. $id.'"');
		 }
		 	
 		return $metodologiasasignatura;
 	}






}
