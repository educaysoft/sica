<?php
class Documento_estado_model extends CI_model {

	function lista_documento_estado(){
		 $documento_estado= $this->db->get('documento_estado');
		 return $documento_estado;
	}

 	function documento_estado( $id){
 		$documento_estado = $this->db->query('select * from documento_estado where iddocumento_estado="'. $id.'"');
 		return $documento_estado;
 	}

 	function save($array)
 	{
		$this->db->insert("documento_estado", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('iddocumento_estado',$id);
 		$this->db->update('documento_estado',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('iddocumento_estado',$id);
		$this->db->delete('documento_estado');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("iddocumento_estado")->get('documento_estado');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("iddocumento_estado")->get('documento_estado');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$documento_estado = $this->db->select("iddocumento_estado")->order_by("iddocumento_estado")->get('documento_estado')->result_array();
		$arr=array("iddocumento_estado"=>$id);
		$clave=array_search($arr,$documento_estado);
	   if(array_key_exists($clave+1,$documento_estado))
		 {

 		$documento_estado = $this->db->query('select * from documento_estado where iddocumento_estado="'. $documento_estado[$clave+1]["iddocumento_estado"].'"');
		 }else{

 		$documento_estado = $this->db->query('select * from documento_estado where iddocumento_estado="'. $id.'"');
		 }
		 	
 		return $documento_estado;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$documento_estado = $this->db->select("iddocumento_estado")->order_by("iddocumento_estado")->get('documento_estado')->result_array();
		$arr=array("iddocumento_estado"=>$id);
		$clave=array_search($arr,$documento_estado);
	   if(array_key_exists($clave-1,$documento_estado))
		 {

 		$documento_estado = $this->db->query('select * from documento_estado where iddocumento_estado="'. $documento_estado[$clave-1]["iddocumento_estado"].'"');
		 }else{

 		$documento_estado = $this->db->query('select * from documento_estado where iddocumento_estado="'. $id.'"');
		 }
		 	
 		return $documento_estado;
 	}






}
