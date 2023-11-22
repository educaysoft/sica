<?php
class Estapamovilidadalumno_model extends CI_model {

	function lista_estapamovilidadalumnos(){
		 $estapamovilidadalumno= $this->db->get('estapamovilidadalumno');
		 return $estapamovilidadalumno;
	}


	function lista_estapamovilidadalumnos1($idalumno){

 		$this->db->where('idalumno',$idalumno);
		 $estapamovilidadalumno= $this->db->get('estapamovilidadalumno1');
		 return $estapamovilidadalumno;
	}




	function lista_estapamovilidadalumnosA(){
		 $estapamovilidadalumno= $this->db->get('estapamovilidadalumno1');
		 return $estapamovilidadalumno;
	}



 	function estapamovilidadalumno( $id){
 		$estapamovilidadalumno = $this->db->query('select * from estapamovilidadalumno where idestapamovilidadalumno="'. $id.'"');
 		return $estapamovilidadalumno;
 	}



 	function estapamovilidadalumnos( $idpersona){
 		$estapamovilidadalumno = $this->db->query('select * from estapamovilidadalumno1 where idpersona="'. $idpersona.'"');
 		return $estapamovilidadalumno;
 	}


 	function estapamovilidadalumnospersona( $id){
 		$estapamovilidadalumno = $this->db->query('select * from estapamovilidadalumno where idpersona="'. $id.'"');
 		return $estapamovilidadalumno;
 	}



 	function save($array)
 	{
		$this->db->insert("estapamovilidadalumno", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idestapamovilidadalumno',$id);
 		$this->db->update('estapamovilidadalumno',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idestapamovilidadalumno',$id);
		$this->db->delete('estapamovilidadalumno');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idestapamovilidadalumno")->get('estapamovilidadalumno');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idestapamovilidadalumno")->get('estapamovilidadalumno');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$estapamovilidadalumno = $this->db->select("idestapamovilidadalumno")->order_by("idestapamovilidadalumno")->get('estapamovilidadalumno')->result_array();
		$arr=array("idestapamovilidadalumno"=>$id);
		$clave=array_search($arr,$estapamovilidadalumno);
	   if(array_key_exists($clave+1,$estapamovilidadalumno))
		 {

 		$estapamovilidadalumno = $this->db->query('select * from estapamovilidadalumno where idestapamovilidadalumno="'. $estapamovilidadalumno[$clave+1]["idestapamovilidadalumno"].'"');
		 }else{

 		$estapamovilidadalumno = $this->db->query('select * from estapamovilidadalumno where idestapamovilidadalumno="'. $id.'"');
		 }
		 	
 		return $estapamovilidadalumno;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$estapamovilidadalumno = $this->db->select("idestapamovilidadalumno")->order_by("idestapamovilidadalumno")->get('estapamovilidadalumno')->result_array();
		$arr=array("idestapamovilidadalumno"=>$id);
		$clave=array_search($arr,$estapamovilidadalumno);
	   if(array_key_exists($clave-1,$estapamovilidadalumno))
		 {

 		$estapamovilidadalumno = $this->db->query('select * from estapamovilidadalumno where idestapamovilidadalumno="'. $estapamovilidadalumno[$clave-1]["idestapamovilidadalumno"].'"');
		 }else{

 		$estapamovilidadalumno = $this->db->query('select * from estapamovilidadalumno where idestapamovilidadalumno="'. $id.'"');
		 }
		 	
 		return $estapamovilidadalumno;
 	}






}
