<?php
class Horasasignatura_model extends CI_model {

	function lista_horasasignaturas(){
		 $horasasignatura= $this->db->get('horasasignatura');
		 return $horasasignatura;
	}


	function lista_horasasignaturasA(){
		 $horasasignatura= $this->db->get('horasasignatura1');
		 return $horasasignatura;
	}



 	function horasasignatura( $id){
 		$horasasignatura = $this->db->query('select * from horasasignatura where idhorasasignatura="'. $id.'"');
 		return $horasasignatura;
 	}


 	function horasasignaturaspersona( $id){
 		$horasasignatura = $this->db->query('select * from horasasignatura where idpersona="'. $id.'"');
 		return $horasasignatura;
 	}



 	function save($array)
 	{
		$this->db->insert("horasasignatura", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idhorasasignatura',$id);
 		$this->db->update('horasasignatura',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idhorasasignatura',$id);
		$this->db->delete('horasasignatura');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idhorasasignatura")->get('horasasignatura');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idhorasasignatura")->get('horasasignatura');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$horasasignatura = $this->db->select("idhorasasignatura")->order_by("idhorasasignatura")->get('horasasignatura')->result_array();
		$arr=array("idhorasasignatura"=>$id);
		$clave=array_search($arr,$horasasignatura);
	   if(array_key_exists($clave+1,$horasasignatura))
		 {

 		$horasasignatura = $this->db->query('select * from horasasignatura where idhorasasignatura="'. $horasasignatura[$clave+1]["idhorasasignatura"].'"');
		 }else{

 		$horasasignatura = $this->db->query('select * from horasasignatura where idhorasasignatura="'. $id.'"');
		 }
		 	
 		return $horasasignatura;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$horasasignatura = $this->db->select("idhorasasignatura")->order_by("idhorasasignatura")->get('horasasignatura')->result_array();
		$arr=array("idhorasasignatura"=>$id);
		$clave=array_search($arr,$horasasignatura);
	   if(array_key_exists($clave-1,$horasasignatura))
		 {

 		$horasasignatura = $this->db->query('select * from horasasignatura where idhorasasignatura="'. $horasasignatura[$clave-1]["idhorasasignatura"].'"');
		 }else{

 		$horasasignatura = $this->db->query('select * from horasasignatura where idhorasasignatura="'. $id.'"');
		 }
		 	
 		return $horasasignatura;
 	}






}
