<?php
class Nivelacceso_model extends CI_model {

	function lista_nivelaccesos(){
		 $nivelacceso= $this->db->get('nivelacceso');
		 return $nivelacceso;
	}

 	function nivelacceso($id){
 		$nivelacceso = $this->db->query('select * from nivelacceso where idnivelacceso="'. $id.'"');
 		return $nivelacceso;
 	}

 	function save($array)
 	{
		$this->db->insert("nivelacceso", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idnivelacceso',$id);
 		$this->db->update('nivelacceso',$array_item);
	}


 	public function delete($id)
	{
 		$this->db->where('idnivelacceso',$id);
		$this->db->delete('nivelacceso');
    if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idnivelacceso")->get('nivelacceso');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idnivelacceso")->get('nivelacceso');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$nivelacceso = $this->db->select("idnivelacceso")->order_by("idnivelacceso")->get('nivelacceso')->result_array();
		$arr=array("idnivelacceso"=>$id);
		$clave=array_search($arr,$nivelacceso);
	   if(array_key_exists($clave+1,$nivelacceso))
		 {

 		$nivelacceso = $this->db->query('select * from nivelacceso where idnivelacceso="'. $nivelacceso[$clave+1]["idnivelacceso"].'"');
		 }else{

 		$nivelacceso = $this->db->query('select * from nivelacceso where idnivelacceso="'. $id.'"');
		 }
		 	
 		return $nivelacceso;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$nivelacceso = $this->db->select("idnivelacceso")->order_by("idnivelacceso")->get('nivelacceso')->result_array();
		$arr=array("idnivelacceso"=>$id);
		$clave=array_search($arr,$nivelacceso);
	   if(array_key_exists($clave-1,$nivelacceso))
		 {

 		$nivelacceso = $this->db->query('select * from nivelacceso where idnivelacceso="'. $nivelacceso[$clave-1]["idnivelacceso"].'"');
		 }else{

 		$nivelacceso = $this->db->query('select * from nivelacceso where idnivelacceso="'. $id.'"');
		 }
		 	
 		return $nivelacceso;
 	}






 

}
