<?php
class Ordenador_model extends CI_model {

	function lista_ordenadores(){
		 $ordenador= $this->db->get('ordenador');
		 return $ordenador;
	}

 	function ordenador( $id){
 		$ordenador = $this->db->query('select * from ordenador where idordenador="'. $id.'"');
 		return $ordenador;
 	}

 	function save($array)
 	{
		$this->db->insert("ordenador", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idordenador',$id);
 		$this->db->update('ordenador',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idordenador',$id);
		$this->db->delete('ordenador');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idordenador")->get('ordenador');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idordenador")->get('ordenador');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$ordenador = $this->db->select("idordenador")->order_by("idordenador")->get('ordenador')->result_array();
		$arr=array("idordenador"=>$id);
		$clave=array_search($arr,$ordenador);
	   if(array_key_exists($clave+1,$ordenador))
		 {

 		$ordenador = $this->db->query('select * from ordenador where idordenador="'. $ordenador[$clave+1]["idordenador"].'"');
		 }else{

 		$ordenador = $this->db->query('select * from ordenador where idordenador="'. $id.'"');
		 }
		 	
 		return $ordenador;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$ordenador = $this->db->select("idordenador")->order_by("idordenador")->get('ordenador')->result_array();
		$arr=array("idordenador"=>$id);
		$clave=array_search($arr,$ordenador);
	   if(array_key_exists($clave-1,$ordenador))
		 {

 		$ordenador = $this->db->query('select * from ordenador where idordenador="'. $ordenador[$clave-1]["idordenador"].'"');
		 }else{

 		$ordenador = $this->db->query('select * from ordenador where idordenador="'. $id.'"');
		 }
		 	
 		return $ordenador;
 	}






}
