<?php
class Direccion_model extends CI_model {

	function lista_direccions(){
		 $direccion= $this->db->get('direccion');
		 return $direccion;
	}


	function lista_direccionsA(){
		 $direccion= $this->db->get('direccion1');
		 return $direccion;
	}



 	function direccion( $id){
 		$direccion = $this->db->query('select * from direccion where iddireccion="'. $id.'"');
 		return $direccion;
 	}


 	function direccionspersona( $id){
 		$direccion = $this->db->query('select * from direccion where idpersona="'. $id.'"');
 		return $direccion;
 	}



 	function save($array)
 	{
		$this->db->insert("direccion", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('iddireccion',$id);
 		$this->db->update('direccion',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('iddireccion',$id);
		$this->db->delete('direccion');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("iddireccion")->get('direccion');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("iddireccion")->get('direccion');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$direccion = $this->db->select("iddireccion")->order_by("iddireccion")->get('direccion')->result_array();
		$arr=array("iddireccion"=>$id);
		$clave=array_search($arr,$direccion);
	   if(array_key_exists($clave+1,$direccion))
		 {

 		$direccion = $this->db->query('select * from direccion where iddireccion="'. $direccion[$clave+1]["iddireccion"].'"');
		 }else{

 		$direccion = $this->db->query('select * from direccion where iddireccion="'. $id.'"');
		 }
		 	
 		return $direccion;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$direccion = $this->db->select("iddireccion")->order_by("iddireccion")->get('direccion')->result_array();
		$arr=array("iddireccion"=>$id);
		$clave=array_search($arr,$direccion);
	   if(array_key_exists($clave-1,$direccion))
		 {

 		$direccion = $this->db->query('select * from direccion where iddireccion="'. $direccion[$clave-1]["iddireccion"].'"');
		 }else{

 		$direccion = $this->db->query('select * from direccion where iddireccion="'. $id.'"');
		 }
		 	
 		return $direccion;
 	}






}
