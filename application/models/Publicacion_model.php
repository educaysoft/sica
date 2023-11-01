<?php
class Publicacion_model extends CI_model {

	function lista_publicacions(){
		 $publicacion= $this->db->get('publicacion');
		 return $publicacion;
	}


	function lista_publicacionsA(){
		 $publicacion= $this->db->get('publicacion1');
		 return $publicacion;
	}



 	function publicacion( $id){
 		$publicacion = $this->db->query('select * from publicacion where idpublicacion="'. $id.'"');
 		return $publicacion;
 	}


 	function publicacionsA( $id){
		if($id>0)
		{
 			$publicacion = $this->db->query('select * from publicacion1 where idpublicacion="'. $id.'"');
		}else{
 			$publicacion = $this->db->query('select * from publicacion1 ');
		}
 		return $publicacion;
 	}



 	function save($array)
 	{
		$this->db->insert("publicacion", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idpublicacion',$id);
 		$this->db->update('publicacion',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idpublicacion',$id);
		$this->db->delete('publicacion');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idpublicacion")->get('publicacion');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idpublicacion")->get('publicacion');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$publicacion = $this->db->select("idpublicacion")->order_by("idpublicacion")->get('publicacion')->result_array();
		$arr=array("idpublicacion"=>$id);
		$clave=array_search($arr,$publicacion);
	   if(array_key_exists($clave+1,$publicacion))
		 {

 		$publicacion = $this->db->query('select * from publicacion where idpublicacion="'. $publicacion[$clave+1]["idpublicacion"].'"');
		 }else{

 		$publicacion = $this->db->query('select * from publicacion where idpublicacion="'. $id.'"');
		 }
		 	
 		return $publicacion;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$publicacion = $this->db->select("idpublicacion")->order_by("idpublicacion")->get('publicacion')->result_array();
		$arr=array("idpublicacion"=>$id);
		$clave=array_search($arr,$publicacion);
	   if(array_key_exists($clave-1,$publicacion))
		 {

 		$publicacion = $this->db->query('select * from publicacion where idpublicacion="'. $publicacion[$clave-1]["idpublicacion"].'"');
		 }else{

 		$publicacion = $this->db->query('select * from publicacion where idpublicacion="'. $id.'"');
		 }
		 	
 		return $publicacion;
 	}






}
