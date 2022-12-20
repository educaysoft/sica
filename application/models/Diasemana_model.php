<?php
class Diasemana_model extends CI_model {

	function lista_diasemanas(){
		 $diasemana= $this->db->get('diasemana');
		 return $diasemana;
	}

 	function diasemana( $id){
 		$diasemana = $this->db->query('select * from diasemana where iddiasemana="'. $id.'"');
 		return $diasemana;
 	}

 	function save($array)
 	{
		$this->db->insert("diasemana", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('iddiasemana',$id);
 		$this->db->update('diasemana',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('iddiasemana',$id);
		$this->db->delete('diasemana');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("iddiasemana")->get('diasemana');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("iddiasemana")->get('diasemana');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$diasemana = $this->db->select("iddiasemana")->order_by("iddiasemana")->get('diasemana')->result_array();
		$arr=array("iddiasemana"=>$id);
		$clave=array_search($arr,$diasemana);
	   if(array_key_exists($clave+1,$diasemana))
		 {

 		$diasemana = $this->db->query('select * from diasemana where iddiasemana="'. $diasemana[$clave+1]["iddiasemana"].'"');
		 }else{

 		$diasemana = $this->db->query('select * from diasemana where iddiasemana="'. $id.'"');
		 }
		 	
 		return $diasemana;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$diasemana = $this->db->select("iddiasemana")->order_by("iddiasemana")->get('diasemana')->result_array();
		$arr=array("iddiasemana"=>$id);
		$clave=array_search($arr,$diasemana);
	   if(array_key_exists($clave-1,$diasemana))
		 {

 		$diasemana = $this->db->query('select * from diasemana where iddiasemana="'. $diasemana[$clave-1]["iddiasemana"].'"');
		 }else{

 		$diasemana = $this->db->query('select * from diasemana where iddiasemana="'. $id.'"');
		 }
		 	
 		return $diasemana;
 	}






}
