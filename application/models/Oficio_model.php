<?php
class Oficio_model extends CI_model {

	function lista_oficioes(){
		 $oficio= $this->db->get('oficio');
		 return $oficio;
	}

 	function oficio( $id){
 		$oficio = $this->db->query('select * from oficio where idoficio="'. $id.'"');
 		return $oficio;
 	}

 	function save($array)
 	{
		$this->db->insert("oficio", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idoficio',$id);
 		$this->db->update('oficio',$array_item);
	}


 	public function delete($id)
	{
 		$this->db->where('idoficio',$id);
		$this->db->delete('oficio');
    if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idoficio")->get('oficio');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idoficio")->get('oficio');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$oficio = $this->db->select("idoficio")->order_by("idoficio")->get('oficio')->result_array();
		$arr=array("idoficio"=>$id);
		$clave=array_search($arr,$oficio);
	   if(array_key_exists($clave+1,$oficio))
		 {

 		$oficio = $this->db->query('select * from oficio where idoficio="'. $oficio[$clave+1]["idoficio"].'"');
		 }else{

 		$oficio = $this->db->query('select * from oficio where idoficio="'. $id.'"');
		 }
		 	
 		return $oficio;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$oficio = $this->db->select("idoficio")->order_by("idoficio")->get('oficio')->result_array();
		$arr=array("idoficio"=>$id);
		$clave=array_search($arr,$oficio);
	   if(array_key_exists($clave-1,$oficio))
		 {

 		$oficio = $this->db->query('select * from oficio where idoficio="'. $oficio[$clave-1]["idoficio"].'"');
		 }else{

 		$oficio = $this->db->query('select * from oficio where idoficio="'. $id.'"');
		 }
		 	
 		return $oficio;
 	}






 

}
