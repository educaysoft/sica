<?php
class Referenciasasignatura_model extends CI_model {

	function lista_referenciasasignaturas(){
		 $referenciasasignatura= $this->db->get('referenciasasignatura');
		 return $referenciasasignatura;
	}


	function lista_referenciasasignaturasA(){
		 $referenciasasignatura= $this->db->get('referenciasasignatura1');
		 return $referenciasasignatura;
	}



 	function referenciasasignatura( $id){
 		$referenciasasignatura = $this->db->query('select * from referenciasasignatura where idreferenciasasignatura="'. $id.'"');
 		return $referenciasasignatura;
 	}


 	function referenciasasignaturasA( $idasignatura){
 		$referenciasasignatura = $this->db->query('select * from referenciasasignatura1 where idasignatura="'. $idasignatura.'"');
 		return $referenciasasignatura;
 	}



 	function save($array)
 	{
		$this->db->insert("referenciasasignatura", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idreferenciasasignatura',$id);
 		$this->db->update('referenciasasignatura',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idreferenciasasignatura',$id);
		$this->db->delete('referenciasasignatura');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idreferenciasasignatura")->get('referenciasasignatura');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idreferenciasasignatura")->get('referenciasasignatura');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$referenciasasignatura = $this->db->select("idreferenciasasignatura")->order_by("idreferenciasasignatura")->get('referenciasasignatura')->result_array();
		$arr=array("idreferenciasasignatura"=>$id);
		$clave=array_search($arr,$referenciasasignatura);
	   if(array_key_exists($clave+1,$referenciasasignatura))
		 {

 		$referenciasasignatura = $this->db->query('select * from referenciasasignatura where idreferenciasasignatura="'. $referenciasasignatura[$clave+1]["idreferenciasasignatura"].'"');
		 }else{

 		$referenciasasignatura = $this->db->query('select * from referenciasasignatura where idreferenciasasignatura="'. $id.'"');
		 }
		 	
 		return $referenciasasignatura;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$referenciasasignatura = $this->db->select("idreferenciasasignatura")->order_by("idreferenciasasignatura")->get('referenciasasignatura')->result_array();
		$arr=array("idreferenciasasignatura"=>$id);
		$clave=array_search($arr,$referenciasasignatura);
	   if(array_key_exists($clave-1,$referenciasasignatura))
		 {

 		$referenciasasignatura = $this->db->query('select * from referenciasasignatura where idreferenciasasignatura="'. $referenciasasignatura[$clave-1]["idreferenciasasignatura"].'"');
		 }else{

 		$referenciasasignatura = $this->db->query('select * from referenciasasignatura where idreferenciasasignatura="'. $id.'"');
		 }
		 	
 		return $referenciasasignatura;
 	}






}
