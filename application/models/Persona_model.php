<?php
class Persona_model extends CI_model {

	function lista_persona(){
		 $persona= $this->db->get('persona');
		 return $persona;
	}


	function persona2(){
		 $persona= $this->db->get('persona2');
		 return $persona;
	}




	function persona( $id){
		$persona = $this->db->query('select * from persona where idpersona="'. $id.'"');
		return $persona;
	}

	function save($array)
	{
	   $this->db->insert("persona", $array);
	}

	function update($id,$array_item)
	{
		$this->db->where('idpersona',$id);
		$this->db->update('persona',$array_item);
   }

	function getCSV() {
    $sql = "SELECT * FROM persona";
    return $this->db->query($sql);
	}




 	public function delete($id)
	{
 		$this->db->where('idpersona',$id);
		$this->db->delete('persona');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}











	function elprimero()
	{
		$query=$this->db->order_by("idpersona")->get('persona');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idpersona")->get('persona');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$persona = $this->db->select("idpersona")->order_by("idpersona")->get('persona')->result_array();
		$arr=array("idpersona"=>$id);
		$clave=array_search($arr,$persona);
	   if(array_key_exists($clave+1,$persona))
		 {

 		$persona = $this->db->query('select * from persona where idpersona="'. $persona[$clave+1]["idpersona"].'"');
		 }else{

 		$persona = $this->db->query('select * from persona where idpersona="'. $id.'"');
		 }
		 	
 		return $persona;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$persona = $this->db->select("idpersona")->order_by("idpersona")->get('persona')->result_array();
		$arr=array("idpersona"=>$id);
		$clave=array_search($arr,$persona);
	   if(array_key_exists($clave-1,$persona))
		 {

 		$persona = $this->db->query('select * from persona where idpersona="'. $persona[$clave-1]["idpersona"].'"');
		 }else{

 		$persona = $this->db->query('select * from persona where idpersona="'. $id.'"');
		 }
		 	
 		return $persona;
 	}










}
