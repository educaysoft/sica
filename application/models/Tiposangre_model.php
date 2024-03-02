<?php
class Tiposangre_model extends CI_model {

	function lista_tiposangres(){
		 $tiposangre= $this->db->get('tiposangre');
		 return $tiposangre;
	}

	function lista_tiposangresA(){
		 $tiposangre= $this->db->get('tiposangre1');
		 return $tiposangre;
	}




 	function tiposangre( $id){
 		$tiposangre = $this->db->query('select * from tiposangre where idtiposangre="'. $id.'"');
 		return $tiposangre;
 	}

 	function save($array)
 	{
		$this->db->insert("tiposangre", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idtiposangre',$id);
 		$this->db->update('tiposangre',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idtiposangre',$id);
		$this->db->delete('tiposangre');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idtiposangre")->get('tiposangre');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idtiposangre")->get('tiposangre');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$tiposangre = $this->db->select("idtiposangre")->order_by("idtiposangre")->get('tiposangre')->result_array();
		$arr=array("idtiposangre"=>$id);
		$clave=array_search($arr,$tiposangre);
	   if(array_key_exists($clave+1,$tiposangre))
		 {

 		$tiposangre = $this->db->query('select * from tiposangre where idtiposangre="'. $tiposangre[$clave+1]["idtiposangre"].'"');
		 }else{

 		$tiposangre = $this->db->query('select * from tiposangre where idtiposangre="'. $id.'"');
		 }
		 	
 		return $tiposangre;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$tiposangre = $this->db->select("idtiposangre")->order_by("idtiposangre")->get('tiposangre')->result_array();
		$arr=array("idtiposangre"=>$id);
		$clave=array_search($arr,$tiposangre);
	   if(array_key_exists($clave-1,$tiposangre))
		 {

 		$tiposangre = $this->db->query('select * from tiposangre where idtiposangre="'. $tiposangre[$clave-1]["idtiposangre"].'"');
		 }else{

 		$tiposangre = $this->db->query('select * from tiposangre where idtiposangre="'. $id.'"');
		 }
		 	
 		return $tiposangre;
 	}








}
