<?php
class Departamentoalumno_model extends CI_model {

	function lista_departamentoalumnos(){
		 $departamentoalumno= $this->db->get('departamentoalumno');
		 return $departamentoalumno;
	}


	function lista_departamentoalumnos1($idalumno){

 		$this->db->where('idalumno',$idalumno);
		 $departamentoalumno= $this->db->get('departamentoalumno1');
		 return $departamentoalumno;
	}




	function lista_departamentoalumnosA(){
		 $departamentoalumno= $this->db->get('departamentoalumno1');
		 return $departamentoalumno;
	}



 	function departamentoalumno( $id){
 		$departamentoalumno = $this->db->query('select * from departamentoalumno where iddepartamentoalumno="'. $id.'"');
 		return $departamentoalumno;
 	}



 	function departamentoalumnos( $idpersona){
 		$departamentoalumno = $this->db->query('select * from departamentoalumno1 where idpersona="'. $idpersona.'"');
 		return $departamentoalumno;
 	}


 	function departamentoalumnospersona( $id){
 		$departamentoalumno = $this->db->query('select * from departamentoalumno where idpersona="'. $id.'"');
 		return $departamentoalumno;
 	}



 	function save($array)
 	{
		$this->db->insert("departamentoalumno", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('iddepartamentoalumno',$id);
 		$this->db->update('departamentoalumno',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('iddepartamentoalumno',$id);
		$this->db->delete('departamentoalumno');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("iddepartamentoalumno")->get('departamentoalumno');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("iddepartamentoalumno")->get('departamentoalumno');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$departamentoalumno = $this->db->select("iddepartamentoalumno")->order_by("iddepartamentoalumno")->get('departamentoalumno')->result_array();
		$arr=array("iddepartamentoalumno"=>$id);
		$clave=array_search($arr,$departamentoalumno);
	   if(array_key_exists($clave+1,$departamentoalumno))
		 {

 		$departamentoalumno = $this->db->query('select * from departamentoalumno where iddepartamentoalumno="'. $departamentoalumno[$clave+1]["iddepartamentoalumno"].'"');
		 }else{

 		$departamentoalumno = $this->db->query('select * from departamentoalumno where iddepartamentoalumno="'. $id.'"');
		 }
		 	
 		return $departamentoalumno;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$departamentoalumno = $this->db->select("iddepartamentoalumno")->order_by("iddepartamentoalumno")->get('departamentoalumno')->result_array();
		$arr=array("iddepartamentoalumno"=>$id);
		$clave=array_search($arr,$departamentoalumno);
	   if(array_key_exists($clave-1,$departamentoalumno))
		 {

 		$departamentoalumno = $this->db->query('select * from departamentoalumno where iddepartamentoalumno="'. $departamentoalumno[$clave-1]["iddepartamentoalumno"].'"');
		 }else{

 		$departamentoalumno = $this->db->query('select * from departamentoalumno where iddepartamentoalumno="'. $id.'"');
		 }
		 	
 		return $departamentoalumno;
 	}






}
