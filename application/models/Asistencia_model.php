<?php
class Asistencia_model extends CI_model {

	function listar_asistencia(){
		 $asistencia= $this->db->get('asistencia');
		 return $asistencia;
	}

	function listar_asistencia1(){
		 $this->db->order_by("idevento","fecha");
		 $asistencia= $this->db->get('asistencia1');
		 return $asistencia;
	}

 	function asistencia( $id){
 		$asistencia = $this->db->query('select * from asistencia where idasistencia="'. $id.'"');
 		return $asistencia;
 	}



 	function asistencias( $id){
 		$asistencia = $this->db->query('select * from asistencia1 where idevento="'. $id.'"');
 		return $asistencia;
 	}

 	function save($array)
 	{
 		$this->db->where('idevento',$array['idevento']);
 		$this->db->where('idpersona',$array['idpersona']);
 		$this->db->where('fecha',$array['fecha']);
		$query=$this->db->get('asistencia');
		if($query->num_rows()==0){
			$this->db->insert("asistencia", $array);
		}
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idasistencia',$id);
 		$this->db->update('asistencia',$array_item);
	}
 



  public function delete($id)
	{
 		$this->db->where('idasistencia',$id);
		$this->db->delete('asistencia');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idasistencia")->get('asistencia');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idasistencia")->get('asistencia');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$asistencia = $this->db->select("idasistencia")->order_by("idasistencia")->get('asistencia')->result_array();
		$arr=array("idasistencia"=>$id);
		$clave=array_search($arr,$asistencia);
	   if(array_key_exists($clave+1,$asistencia))
		 {

 		$asistencia = $this->db->query('select * from asistencia where idasistencia="'. $asistencia[$clave+1]["idasistencia"].'"');
		 }else{

 		$asistencia = $this->db->query('select * from asistencia where idasistencia="'. $id.'"');
		 }
		 	
 		return $asistencia;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$asistencia = $this->db->select("idasistencia")->order_by("idasistencia")->get('asistencia')->result_array();
		$arr=array("idasistencia"=>$id);
		$clave=array_search($arr,$asistencia);
	   if(array_key_exists($clave-1,$asistencia))
		 {

 		$asistencia = $this->db->query('select * from asistencia where idasistencia="'. $asistencia[$clave-1]["idasistencia"].'"');
		 }else{

 		$asistencia = $this->db->query('select * from asistencia where idasistencia="'. $id.'"');
		 }
		 	
 		return $asistencia;
 	}














}
