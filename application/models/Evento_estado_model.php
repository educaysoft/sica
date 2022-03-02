<?php
class Evento_estado_model extends CI_model {

	function lista_evento_estados(){
		 $evento_estado= $this->db->get('evento_estado');
		 return $evento_estado;
	}

 	function evento_estado( $id){
 		$evento_estado = $this->db->query('select * from evento_estado where idevento_estado="'. $id.'"');
 		return $evento_estado;
 	}

 	function save($array)
 	{
		$this->db->insert("evento_estado", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idevento_estado',$id);
 		$this->db->update('evento_estado',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idevento_estado',$id);
		$this->db->delete('evento_estado');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idevento_estado")->get('evento_estado');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idevento_estado")->get('evento_estado');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$evento_estado = $this->db->select("idevento_estado")->order_by("idevento_estado")->get('evento_estado')->result_array();
		$arr=array("idevento_estado"=>$id);
		$clave=array_search($arr,$evento_estado);
	   if(array_key_exists($clave+1,$evento_estado))
		 {

 		$evento_estado = $this->db->query('select * from evento_estado where idevento_estado="'. $evento_estado[$clave+1]["idevento_estado"].'"');
		 }else{

 		$evento_estado = $this->db->query('select * from evento_estado where idevento_estado="'. $id.'"');
		 }
		 	
 		return $evento_estado;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$evento_estado = $this->db->select("idevento_estado")->order_by("idevento_estado")->get('evento_estado')->result_array();
		$arr=array("idevento_estado"=>$id);
		$clave=array_search($arr,$evento_estado);
	   if(array_key_exists($clave-1,$evento_estado))
		 {

 		$evento_estado = $this->db->query('select * from evento_estado where idevento_estado="'. $evento_estado[$clave-1]["idevento_estado"].'"');
		 }else{

 		$evento_estado = $this->db->query('select * from evento_estado where idevento_estado="'. $id.'"');
		 }
		 	
 		return $evento_estado;
 	}






}
