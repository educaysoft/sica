<?php
class Tipopublicacion_model extends CI_model {

	function lista_tipopublicacions(){
		 $tipopublicacion= $this->db->get('tipopublicacion');
		 return $tipopublicacion;
	}

 	function tipopublicacion( $id){
 		$tipopublicacion = $this->db->query('select * from tipopublicacion where idtipopublicacion="'. $id.'"');
 		return $tipopublicacion;
 	}

 	function save($array)
 	{
		$this->db->insert("tipopublicacion", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idtipopublicacion',$id);
 		$this->db->update('tipopublicacion',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idtipopublicacion',$id);
		$this->db->delete('tipopublicacion');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idtipopublicacion")->get('tipopublicacion');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idtipopublicacion")->get('tipopublicacion');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$tipopublicacion = $this->db->select("idtipopublicacion")->order_by("idtipopublicacion")->get('tipopublicacion')->result_array();
		$arr=array("idtipopublicacion"=>$id);
		$clave=array_search($arr,$tipopublicacion);
	   if(array_key_exists($clave+1,$tipopublicacion))
		 {

 		$tipopublicacion = $this->db->query('select * from tipopublicacion where idtipopublicacion="'. $tipopublicacion[$clave+1]["idtipopublicacion"].'"');
		 }else{

 		$tipopublicacion = $this->db->query('select * from tipopublicacion where idtipopublicacion="'. $id.'"');
		 }
		 	
 		return $tipopublicacion;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$tipopublicacion = $this->db->select("idtipopublicacion")->order_by("idtipopublicacion")->get('tipopublicacion')->result_array();
		$arr=array("idtipopublicacion"=>$id);
		$clave=array_search($arr,$tipopublicacion);
	   if(array_key_exists($clave-1,$tipopublicacion))
		 {

 		$tipopublicacion = $this->db->query('select * from tipopublicacion where idtipopublicacion="'. $tipopublicacion[$clave-1]["idtipopublicacion"].'"');
		 }else{

 		$tipopublicacion = $this->db->query('select * from tipopublicacion where idtipopublicacion="'. $id.'"');
		 }
		 	
 		return $tipopublicacion;
 	}






}
