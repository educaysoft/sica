<?php
class Matricula_model extends CI_model {

	function lista_matriculas(){
		 $matricula= $this->db->get('matricula');
		 return $matricula;
	}


	function lista_matriculas1($idestudiante){

 		$this->db->where('idestudiante',$idestudiante);
		 $matricula= $this->db->get('matricula1');
		 return $matricula;
	}




	function lista_matriculasA(){
		 $matricula= $this->db->get('matricula1');
		 return $matricula;
	}



 	function matricula( $id){
 		$matricula = $this->db->query('select * from matricula where idmatricula="'. $id.'"');
 		return $matricula;
 	}



 	function matriculas( $idpersona){
 		$matricula = $this->db->query('select * from matricula1 where idpersona="'. $idpersona.'"');
 		return $matricula;
 	}


 	function matriculaspersona( $id){
 		$matricula = $this->db->query('select * from matricula where idpersona="'. $id.'"');
 		return $matricula;
 	}



 	function matriculaxperiodo( $idperiodoacademico){
 		$matricula = $this->db->query('select * from matricula1 where idperiodoacademico="'. $idperiodoacademico.'"');
 		return $matricula;
 	}



 	function save($array)
 	{
		$this->db->insert("matricula", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idmatricula',$id);
 		$this->db->update('matricula',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idmatricula',$id);
		$this->db->delete('matricula');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idmatricula")->get('matricula');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idmatricula")->get('matricula');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$matricula = $this->db->select("idmatricula")->order_by("idmatricula")->get('matricula')->result_array();
		$arr=array("idmatricula"=>$id);
		$clave=array_search($arr,$matricula);
	   if(array_key_exists($clave+1,$matricula))
		 {

 		$matricula = $this->db->query('select * from matricula where idmatricula="'. $matricula[$clave+1]["idmatricula"].'"');
		 }else{

 		$matricula = $this->db->query('select * from matricula where idmatricula="'. $id.'"');
		 }
		 	
 		return $matricula;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$matricula = $this->db->select("idmatricula")->order_by("idmatricula")->get('matricula')->result_array();
		$arr=array("idmatricula"=>$id);
		$clave=array_search($arr,$matricula);
	   if(array_key_exists($clave-1,$matricula))
		 {

 		$matricula = $this->db->query('select * from matricula where idmatricula="'. $matricula[$clave-1]["idmatricula"].'"');
		 }else{

 		$matricula = $this->db->query('select * from matricula where idmatricula="'. $id.'"');
		 }
		 	
 		return $matricula;
 	}






}
