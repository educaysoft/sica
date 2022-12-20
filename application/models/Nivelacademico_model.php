<?php
class Nivelacademico_model extends CI_model {

	function lista_nivelacademicos(){
		 $nivelacademico= $this->db->get('nivelacademico');
		 return $nivelacademico;
	}

 	function nivelacademico( $id){
 		$nivelacademico = $this->db->query('select * from nivelacademico where idnivelacademico="'. $id.'"');
 		return $nivelacademico;
 	}

 	function save($array)
 	{
		$this->db->insert("nivelacademico", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idnivelacademico',$id);
 		$this->db->update('nivelacademico',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idnivelacademico',$id);
		$this->db->delete('nivelacademico');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idnivelacademico")->get('nivelacademico');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idnivelacademico")->get('nivelacademico');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$nivelacademico = $this->db->select("idnivelacademico")->order_by("idnivelacademico")->get('nivelacademico')->result_array();
		$arr=array("idnivelacademico"=>$id);
		$clave=array_search($arr,$nivelacademico);
	   if(array_key_exists($clave+1,$nivelacademico))
		 {

 		$nivelacademico = $this->db->query('select * from nivelacademico where idnivelacademico="'. $nivelacademico[$clave+1]["idnivelacademico"].'"');
		 }else{

 		$nivelacademico = $this->db->query('select * from nivelacademico where idnivelacademico="'. $id.'"');
		 }
		 	
 		return $nivelacademico;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$nivelacademico = $this->db->select("idnivelacademico")->order_by("idnivelacademico")->get('nivelacademico')->result_array();
		$arr=array("idnivelacademico"=>$id);
		$clave=array_search($arr,$nivelacademico);
	   if(array_key_exists($clave-1,$nivelacademico))
		 {

 		$nivelacademico = $this->db->query('select * from nivelacademico where idnivelacademico="'. $nivelacademico[$clave-1]["idnivelacademico"].'"');
		 }else{

 		$nivelacademico = $this->db->query('select * from nivelacademico where idnivelacademico="'. $id.'"');
		 }
		 	
 		return $nivelacademico;
 	}






}
