<?php
class Identidad_model extends CI_model {

	function lista_identidads(){
		 $identidad= $this->db->get('identidad');
		 return $identidad;
	}


	function lista_identidads1($idpersona){

 		$this->db->where('idpersona',$idpersona);
		 $identidad= $this->db->get('identidad1');
		 return $identidad;
	}




	function lista_identidadsA(){
		 $identidad= $this->db->get('identidad1');
		 return $identidad;
	}



 	function identidad( $id){
 		$identidad = $this->db->query('select * from identidad where ididentidad="'. $id.'"');
 		return $identidad;
 	}



 	function identidads( $idpersona){
 		$identidad = $this->db->query('select * from identidad1 where idpersona="'. $idpersona.'"');
 		return $identidad;
 	}


 	function identidadspersona( $id){
 		$identidad = $this->db->query('select * from identidad where idpersona="'. $id.'"');
 		return $identidad;
 	}



 	function save($array)
 	{
		$this->db->insert("identidad", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('ididentidad',$id);
 		$this->db->update('identidad',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('ididentidad',$id);
		$this->db->delete('identidad');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("ididentidad")->get('identidad');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("ididentidad")->get('identidad');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$identidad = $this->db->select("ididentidad")->order_by("ididentidad")->get('identidad')->result_array();
		$arr=array("ididentidad"=>$id);
		$clave=array_search($arr,$identidad);
	   if(array_key_exists($clave+1,$identidad))
		 {

 		$identidad = $this->db->query('select * from identidad where ididentidad="'. $identidad[$clave+1]["ididentidad"].'"');
		 }else{

 		$identidad = $this->db->query('select * from identidad where ididentidad="'. $id.'"');
		 }
		 	
 		return $identidad;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$identidad = $this->db->select("ididentidad")->order_by("ididentidad")->get('identidad')->result_array();
		$arr=array("ididentidad"=>$id);
		$clave=array_search($arr,$identidad);
	   if(array_key_exists($clave-1,$identidad))
		 {

 		$identidad = $this->db->query('select * from identidad where ididentidad="'. $identidad[$clave-1]["ididentidad"].'"');
		 }else{

 		$identidad = $this->db->query('select * from identidad where ididentidad="'. $id.'"');
		 }
		 	
 		return $identidad;
 	}






}
