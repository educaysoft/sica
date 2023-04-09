<?php
class Nivelparticipante_model extends CI_model {

	function lista_nivelparticipantes(){
		 $nivelparticipante= $this->db->get('nivelparticipante');
		 return $nivelparticipante;
	}

 	function nivelparticipante( $id){
 		$nivelparticipante = $this->db->query('select * from nivelparticipante where idnivelparticipante="'. $id.'"');
 		return $nivelparticipante;
 	}

 	function save($array)
 	{
		$this->db->insert("nivelparticipante", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idnivelparticipante',$id);
 		$this->db->update('nivelparticipante',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idnivelparticipante',$id);
		$this->db->delete('nivelparticipante');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idnivelparticipante")->get('nivelparticipante');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idnivelparticipante")->get('nivelparticipante');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$nivelparticipante = $this->db->select("idnivelparticipante")->order_by("idnivelparticipante")->get('nivelparticipante')->result_array();
		$arr=array("idnivelparticipante"=>$id);
		$clave=array_search($arr,$nivelparticipante);
	   if(array_key_exists($clave+1,$nivelparticipante))
		 {

 		$nivelparticipante = $this->db->query('select * from nivelparticipante where idnivelparticipante="'. $nivelparticipante[$clave+1]["idnivelparticipante"].'"');
		 }else{

 		$nivelparticipante = $this->db->query('select * from nivelparticipante where idnivelparticipante="'. $id.'"');
		 }
		 	
 		return $nivelparticipante;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$nivelparticipante = $this->db->select("idnivelparticipante")->order_by("idnivelparticipante")->get('nivelparticipante')->result_array();
		$arr=array("idnivelparticipante"=>$id);
		$clave=array_search($arr,$nivelparticipante);
	   if(array_key_exists($clave-1,$nivelparticipante))
		 {

 		$nivelparticipante = $this->db->query('select * from nivelparticipante where idnivelparticipante="'. $nivelparticipante[$clave-1]["idnivelparticipante"].'"');
		 }else{

 		$nivelparticipante = $this->db->query('select * from nivelparticipante where idnivelparticipante="'. $id.'"');
		 }
		 	
 		return $nivelparticipante;
 	}






}
