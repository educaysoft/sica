<?php
class Etapamovilidadalumno_model extends CI_model {

	function lista_etapamovilidadalumnos(){
		 $etapamovilidadalumno= $this->db->get('etapamovilidadalumno');
		 return $etapamovilidadalumno;
	}


	function lista_etapamovilidadalumnos1($idmovilidadalumno){

 		$this->db->where('idmovilidadalumno',$idmovilidadalumno);
		 $etapamovilidadalumno= $this->db->get('etapamovilidadalumno1');
		 return $etapamovilidadalumno;
	}




	function lista_etapamovilidadalumnosA(){
		 $etapamovilidadalumno= $this->db->get('etapamovilidadalumno1');
		 return $etapamovilidadalumno;
	}



 	function etapamovilidadalumno( $id){
 		$etapamovilidadalumno = $this->db->query('select * from etapamovilidadalumno where idetapamovilidadalumno="'. $id.'"');
 		return $etapamovilidadalumno;
 	}



 	function etapamovilidadalumnos( $idpersona){
 		$etapamovilidadalumno = $this->db->query('select * from etapamovilidadalumno1 where idpersona="'. $idpersona.'"');
 		return $etapamovilidadalumno;
 	}


 	function etapamovilidadalumnospersona( $id){
 		$etapamovilidadalumno = $this->db->query('select * from etapamovilidadalumno where idpersona="'. $id.'"');
 		return $etapamovilidadalumno;
 	}



 	function save($array)
 	{
		$this->db->insert("etapamovilidadalumno", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idetapamovilidadalumno',$id);
 		$this->db->update('etapamovilidadalumno',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idetapamovilidadalumno',$id);
		$this->db->delete('etapamovilidadalumno');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idetapamovilidadalumno")->get('etapamovilidadalumno');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idetapamovilidadalumno")->get('etapamovilidadalumno');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$etapamovilidadalumno = $this->db->select("idetapamovilidadalumno")->order_by("idetapamovilidadalumno")->get('etapamovilidadalumno')->result_array();
		$arr=array("idetapamovilidadalumno"=>$id);
		$clave=array_search($arr,$etapamovilidadalumno);
	   if(array_key_exists($clave+1,$etapamovilidadalumno))
		 {

 		$etapamovilidadalumno = $this->db->query('select * from etapamovilidadalumno where idetapamovilidadalumno="'. $etapamovilidadalumno[$clave+1]["idetapamovilidadalumno"].'"');
		 }else{

 		$etapamovilidadalumno = $this->db->query('select * from etapamovilidadalumno where idetapamovilidadalumno="'. $id.'"');
		 }
		 	
 		return $etapamovilidadalumno;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$etapamovilidadalumno = $this->db->select("idetapamovilidadalumno")->order_by("idetapamovilidadalumno")->get('etapamovilidadalumno')->result_array();
		$arr=array("idetapamovilidadalumno"=>$id);
		$clave=array_search($arr,$etapamovilidadalumno);
	   if(array_key_exists($clave-1,$etapamovilidadalumno))
		 {

 		$etapamovilidadalumno = $this->db->query('select * from etapamovilidadalumno where idetapamovilidadalumno="'. $etapamovilidadalumno[$clave-1]["idetapamovilidadalumno"].'"');
		 }else{

 		$etapamovilidadalumno = $this->db->query('select * from etapamovilidadalumno where idetapamovilidadalumno="'. $id.'"');
		 }
		 	
 		return $etapamovilidadalumno;
 	}






}
