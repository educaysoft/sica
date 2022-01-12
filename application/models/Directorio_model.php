<?php
class Directorio_model extends CI_model {

	function lista_directorio(){
		 $directorio= $this->db->get('directorio');
		 return $directorio;
	}

 	function directorio( $id){
 		$directorio = $this->db->query('select * from directorio where iddirectorio="'. $id.'"');
 		return $directorio;
 	}

 	function save($array)
 	{
		$this->db->insert("directorio", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('iddirectorio',$id);
 		$this->db->update('directorio',$array_item);
	}
 


 	function siguiente($id){
 		$directorio = $this->db->select("iddirectorio")->get('directorio')->result_array();
		$arr=array("iddirectorio"=>$id);
		$clave=array_search($arr,$directorio);
	   if(array_key_exists($clave+1,$directorio))
		 {

 		$directorio = $this->db->query('select * from directorio where iddirectorio="'. $directorio[$clave+1]["iddirectorio"].'"');
		 }else{

 		$directorio = $this->db->query('select * from directorio where iddirectorio="'. $id.'"');
		 }
		 	
 		return $directorio;
 	}


 	function anterior($id){
 		$directorio = $this->db->select("iddirectorio")->get('directorio')->result_array();
		$arr=array("iddirectorio"=>$id);
		$clave=array_search($arr,$directorio);
	   if(array_key_exists($clave-1,$directorio))
		 {

 		$directorio = $this->db->query('select * from directorio where iddirectorio="'. $directorio[$clave-1]["iddirectorio"].'"');
		 }else{

 		$directorio = $this->db->query('select * from directorio where iddirectorio="'. $id.'"');
		 }
		 	
 		return $directorio;
 	}




}
