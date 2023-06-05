<?php
class Tiporeferenciasasignatura_model extends CI_model {

	function lista_tiporeferenciasasignaturas(){
		 $tiporeferenciasasignatura= $this->db->get('tiporeferenciasasignatura');
		 return $tiporeferenciasasignatura;
	}

 	function tiporeferenciasasignatura( $id){
 		$tiporeferenciasasignatura = $this->db->query('select * from tiporeferenciasasignatura where idtiporeferenciasasignatura="'. $id.'"');
 		return $tiporeferenciasasignatura;
 	}

 	function save($array)
 	{
		$this->db->insert("tiporeferenciasasignatura", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idtiporeferenciasasignatura',$id);
 		$this->db->update('tiporeferenciasasignatura',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idtiporeferenciasasignatura',$id);
		$this->db->delete('tiporeferenciasasignatura');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idtiporeferenciasasignatura")->get('tiporeferenciasasignatura');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idtiporeferenciasasignatura")->get('tiporeferenciasasignatura');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$tiporeferenciasasignatura = $this->db->select("idtiporeferenciasasignatura")->order_by("idtiporeferenciasasignatura")->get('tiporeferenciasasignatura')->result_array();
		$arr=array("idtiporeferenciasasignatura"=>$id);
		$clave=array_search($arr,$tiporeferenciasasignatura);
	   if(array_key_exists($clave+1,$tiporeferenciasasignatura))
		 {

 		$tiporeferenciasasignatura = $this->db->query('select * from tiporeferenciasasignatura where idtiporeferenciasasignatura="'. $tiporeferenciasasignatura[$clave+1]["idtiporeferenciasasignatura"].'"');
		 }else{

 		$tiporeferenciasasignatura = $this->db->query('select * from tiporeferenciasasignatura where idtiporeferenciasasignatura="'. $id.'"');
		 }
		 	
 		return $tiporeferenciasasignatura;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$tiporeferenciasasignatura = $this->db->select("idtiporeferenciasasignatura")->order_by("idtiporeferenciasasignatura")->get('tiporeferenciasasignatura')->result_array();
		$arr=array("idtiporeferenciasasignatura"=>$id);
		$clave=array_search($arr,$tiporeferenciasasignatura);
	   if(array_key_exists($clave-1,$tiporeferenciasasignatura))
		 {

 		$tiporeferenciasasignatura = $this->db->query('select * from tiporeferenciasasignatura where idtiporeferenciasasignatura="'. $tiporeferenciasasignatura[$clave-1]["idtiporeferenciasasignatura"].'"');
		 }else{

 		$tiporeferenciasasignatura = $this->db->query('select * from tiporeferenciasasignatura where idtiporeferenciasasignatura="'. $id.'"');
		 }
		 	
 		return $tiporeferenciasasignatura;
 	}






}
