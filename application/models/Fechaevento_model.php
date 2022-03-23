<?php
class Fechaevento_model extends CI_model {

	function listar_fechaevento(){
		 $fechaevento= $this->db->get('fechaevento');
		 return $fechaevento;
	}

	function listar_fechaevento1(){
		 $fechaevento= $this->db->get('fechaevento1');
		 return $fechaevento;
	}

 	function fechaevento( $id){
 		$fechaevento = $this->db->query('select * from fechaevento where idfechaevento="'. $id.'"');
 		return $fechaevento;
 	}



 	function fechaeventos( $id){
 		$fechaevento = $this->db->query('select * from fechaevento where idevento="'. $id.'"');
 		return $fechaevento;
 	}

 	function save($array)
 	{
		$this->db->insert("fechaevento", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idfechaevento',$id);
 		$this->db->update('fechaevento',$array_item);
	}
 



  public function delete($id)
	{
 		$this->db->where('idfechaevento',$id);
		$this->db->delete('fechaevento');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idfechaevento")->get('fechaevento');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idfechaevento")->get('fechaevento');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$fechaevento = $this->db->select("idfechaevento")->order_by("idfechaevento")->get('fechaevento')->result_array();
		$arr=array("idfechaevento"=>$id);
		$clave=array_search($arr,$fechaevento);
	   if(array_key_exists($clave+1,$fechaevento))
		 {

 		$fechaevento = $this->db->query('select * from fechaevento where idfechaevento="'. $fechaevento[$clave+1]["idfechaevento"].'"');
		 }else{

 		$fechaevento = $this->db->query('select * from fechaevento where idfechaevento="'. $id.'"');
		 }
		 	
 		return $fechaevento;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$fechaevento = $this->db->select("idfechaevento")->order_by("idfechaevento")->get('fechaevento')->result_array();
		$arr=array("idfechaevento"=>$id);
		$clave=array_search($arr,$fechaevento);
	   if(array_key_exists($clave-1,$fechaevento))
		 {

 		$fechaevento = $this->db->query('select * from fechaevento where idfechaevento="'. $fechaevento[$clave-1]["idfechaevento"].'"');
		 }else{

 		$fechaevento = $this->db->query('select * from fechaevento where idfechaevento="'. $id.'"');
		 }
		 	
 		return $fechaevento;
 	}














}
