<?php
class Nivelestudio_model extends CI_model {

	function lista_nivelestudios(){
		 $nivelestudio= $this->db->get('nivelestudio');
		 return $nivelestudio;
	}

 	function nivelestudio( $id){
 		$nivelestudio = $this->db->query('select * from nivelestudio where idnivelestudio="'. $id.'"');
 		return $nivelestudio;
 	}

 	function save($array)
 	{
		$this->db->insert("nivelestudio", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idnivelestudio',$id);
 		$this->db->update('nivelestudio',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idnivelestudio',$id);
		$this->db->delete('nivelestudio');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idnivelestudio")->get('nivelestudio');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idnivelestudio")->get('nivelestudio');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$nivelestudio = $this->db->select("idnivelestudio")->order_by("idnivelestudio")->get('nivelestudio')->result_array();
		$arr=array("idnivelestudio"=>$id);
		$clave=array_search($arr,$nivelestudio);
	   if(array_key_exists($clave+1,$nivelestudio))
		 {

 		$nivelestudio = $this->db->query('select * from nivelestudio where idnivelestudio="'. $nivelestudio[$clave+1]["idnivelestudio"].'"');
		 }else{

 		$nivelestudio = $this->db->query('select * from nivelestudio where idnivelestudio="'. $id.'"');
		 }
		 	
 		return $nivelestudio;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$nivelestudio = $this->db->select("idnivelestudio")->order_by("idnivelestudio")->get('nivelestudio')->result_array();
		$arr=array("idnivelestudio"=>$id);
		$clave=array_search($arr,$nivelestudio);
	   if(array_key_exists($clave-1,$nivelestudio))
		 {

 		$nivelestudio = $this->db->query('select * from nivelestudio where idnivelestudio="'. $nivelestudio[$clave-1]["idnivelestudio"].'"');
		 }else{

 		$nivelestudio = $this->db->query('select * from nivelestudio where idnivelestudio="'. $id.'"');
		 }
		 	
 		return $nivelestudio;
 	}






}
