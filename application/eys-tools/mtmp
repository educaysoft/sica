<?php
class Telefono_model extends CI_model {

	function lista_telefonos(){
		 $telefono= $this->db->get('telefono');
		 return $telefono;
	}


	function lista_telefonosA(){
		 $telefono= $this->db->get('telefono1');
		 return $telefono;
	}



 	function telefono( $id){
 		$telefono = $this->db->query('select * from telefono where idtelefono="'. $id.'"');
 		return $telefono;
 	}


 	function telefonospersona( $id){
 		$telefono = $this->db->query('select * from telefono where idpersona="'. $id.'"');
 		return $telefono;
 	}



 	function save($array)
 	{
		$this->db->insert("telefono", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idtelefono',$id);
 		$this->db->update('telefono',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idtelefono',$id);
		$this->db->delete('telefono');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idtelefono")->get('telefono');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idtelefono")->get('telefono');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$telefono = $this->db->select("idtelefono")->order_by("idtelefono")->get('telefono')->result_array();
		$arr=array("idtelefono"=>$id);
		$clave=array_search($arr,$telefono);
	   if(array_key_exists($clave+1,$telefono))
		 {

 		$telefono = $this->db->query('select * from telefono where idtelefono="'. $telefono[$clave+1]["idtelefono"].'"');
		 }else{

 		$telefono = $this->db->query('select * from telefono where idtelefono="'. $id.'"');
		 }
		 	
 		return $telefono;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$telefono = $this->db->select("idtelefono")->order_by("idtelefono")->get('telefono')->result_array();
		$arr=array("idtelefono"=>$id);
		$clave=array_search($arr,$telefono);
	   if(array_key_exists($clave-1,$telefono))
		 {

 		$telefono = $this->db->query('select * from telefono where idtelefono="'. $telefono[$clave-1]["idtelefono"].'"');
		 }else{

 		$telefono = $this->db->query('select * from telefono where idtelefono="'. $id.'"');
		 }
		 	
 		return $telefono;
 	}






}
