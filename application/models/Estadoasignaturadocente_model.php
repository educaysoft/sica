<?php
class Estadoasignaturadocente_model extends CI_model {

	function lista_estadoasignaturadocentes(){
		 $estadoasignaturadocente= $this->db->get('estadoasignaturadocente');
		 return $estadoasignaturadocente;
	}

 	function estadoasignaturadocente( $id){
 		$estadoasignaturadocente = $this->db->query('select * from estadoasignaturadocente where idestadoasignaturadocente="'. $id.'"');
 		return $estadoasignaturadocente;
 	}

 	function save($array)
 	{
		$this->db->insert("estadoasignaturadocente", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idestadoasignaturadocente',$id);
 		$this->db->update('estadoasignaturadocente',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idestadoasignaturadocente',$id);
		$this->db->delete('estadoasignaturadocente');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idestadoasignaturadocente")->get('estadoasignaturadocente');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idestadoasignaturadocente")->get('estadoasignaturadocente');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$estadoasignaturadocente = $this->db->select("idestadoasignaturadocente")->order_by("idestadoasignaturadocente")->get('estadoasignaturadocente')->result_array();
		$arr=array("idestadoasignaturadocente"=>$id);
		$clave=array_search($arr,$estadoasignaturadocente);
	   if(array_key_exists($clave+1,$estadoasignaturadocente))
		 {

 		$estadoasignaturadocente = $this->db->query('select * from estadoasignaturadocente where idestadoasignaturadocente="'. $estadoasignaturadocente[$clave+1]["idestadoasignaturadocente"].'"');
		 }else{

 		$estadoasignaturadocente = $this->db->query('select * from estadoasignaturadocente where idestadoasignaturadocente="'. $id.'"');
		 }
		 	
 		return $estadoasignaturadocente;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$estadoasignaturadocente = $this->db->select("idestadoasignaturadocente")->order_by("idestadoasignaturadocente")->get('estadoasignaturadocente')->result_array();
		$arr=array("idestadoasignaturadocente"=>$id);
		$clave=array_search($arr,$estadoasignaturadocente);
	   if(array_key_exists($clave-1,$estadoasignaturadocente))
		 {

 		$estadoasignaturadocente = $this->db->query('select * from estadoasignaturadocente where idestadoasignaturadocente="'. $estadoasignaturadocente[$clave-1]["idestadoasignaturadocente"].'"');
		 }else{

 		$estadoasignaturadocente = $this->db->query('select * from estadoasignaturadocente where idestadoasignaturadocente="'. $id.'"');
		 }
		 	
 		return $estadoasignaturadocente;
 	}






}
