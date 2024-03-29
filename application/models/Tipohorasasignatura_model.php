<?php
class Tipohorasasignatura_model extends CI_model {

	function lista_tipohorasasignaturas(){
		 $tipohorasasignatura= $this->db->get('tipohorasasignatura');
		 return $tipohorasasignatura;
	}

 	function tipohorasasignatura( $id){
 		$tipohorasasignatura = $this->db->query('select * from tipohorasasignatura where idtipohorasasignatura="'. $id.'"');
 		return $tipohorasasignatura;
 	}

 	function save($array)
 	{
		$this->db->insert("tipohorasasignatura", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idtipohorasasignatura',$id);
 		$this->db->update('tipohorasasignatura',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idtipohorasasignatura',$id);
		$this->db->delete('tipohorasasignatura');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idtipohorasasignatura")->get('tipohorasasignatura');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idtipohorasasignatura")->get('tipohorasasignatura');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$tipohorasasignatura = $this->db->select("idtipohorasasignatura")->order_by("idtipohorasasignatura")->get('tipohorasasignatura')->result_array();
		$arr=array("idtipohorasasignatura"=>$id);
		$clave=array_search($arr,$tipohorasasignatura);
	   if(array_key_exists($clave+1,$tipohorasasignatura))
		 {

 		$tipohorasasignatura = $this->db->query('select * from tipohorasasignatura where idtipohorasasignatura="'. $tipohorasasignatura[$clave+1]["idtipohorasasignatura"].'"');
		 }else{

 		$tipohorasasignatura = $this->db->query('select * from tipohorasasignatura where idtipohorasasignatura="'. $id.'"');
		 }
		 	
 		return $tipohorasasignatura;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$tipohorasasignatura = $this->db->select("idtipohorasasignatura")->order_by("idtipohorasasignatura")->get('tipohorasasignatura')->result_array();
		$arr=array("idtipohorasasignatura"=>$id);
		$clave=array_search($arr,$tipohorasasignatura);
	   if(array_key_exists($clave-1,$tipohorasasignatura))
		 {

 		$tipohorasasignatura = $this->db->query('select * from tipohorasasignatura where idtipohorasasignatura="'. $tipohorasasignatura[$clave-1]["idtipohorasasignatura"].'"');
		 }else{

 		$tipohorasasignatura = $this->db->query('select * from tipohorasasignatura where idtipohorasasignatura="'. $id.'"');
		 }
		 	
 		return $tipohorasasignatura;
 	}






}
