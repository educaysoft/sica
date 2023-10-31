<?php
class Contabilidad_model extends CI_model {

	function lista_contabilidads(){
		 $contabilidad= $this->db->get('contabilidad');
		 return $contabilidad;
	}


	function lista_contabilidadsA(){
		 $contabilidad= $this->db->get('contabilidad1');
		 return $contabilidad;
	}



 	function contabilidad( $id){
 		$contabilidad = $this->db->query('select * from contabilidad where idcontabilidad="'. $id.'"');
 		return $contabilidad;
 	}


 	function contabilidadspersona( $id){
 		$contabilidad = $this->db->query('select * from contabilidad where idpersona="'. $id.'"');
 		return $contabilidad;
 	}



 	function save($array)
 	{
		$this->db->insert("contabilidad", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idcontabilidad',$id);
 		$this->db->update('contabilidad',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idcontabilidad',$id);
		$this->db->delete('contabilidad');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idcontabilidad")->get('contabilidad');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idcontabilidad")->get('contabilidad');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$contabilidad = $this->db->select("idcontabilidad")->order_by("idcontabilidad")->get('contabilidad')->result_array();
		$arr=array("idcontabilidad"=>$id);
		$clave=array_search($arr,$contabilidad);
	   if(array_key_exists($clave+1,$contabilidad))
		 {

 		$contabilidad = $this->db->query('select * from contabilidad where idcontabilidad="'. $contabilidad[$clave+1]["idcontabilidad"].'"');
		 }else{

 		$contabilidad = $this->db->query('select * from contabilidad where idcontabilidad="'. $id.'"');
		 }
		 	
 		return $contabilidad;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$contabilidad = $this->db->select("idcontabilidad")->order_by("idcontabilidad")->get('contabilidad')->result_array();
		$arr=array("idcontabilidad"=>$id);
		$clave=array_search($arr,$contabilidad);
	   if(array_key_exists($clave-1,$contabilidad))
		 {

 		$contabilidad = $this->db->query('select * from contabilidad where idcontabilidad="'. $contabilidad[$clave-1]["idcontabilidad"].'"');
		 }else{

 		$contabilidad = $this->db->query('select * from contabilidad where idcontabilidad="'. $id.'"');
		 }
		 	
 		return $contabilidad;
 	}






}
