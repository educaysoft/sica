<?php
class Pregunta_model extends CI_model {

	function lista_pregunta(){
		 $pregunta= $this->db->get('pregunta');
		 return $pregunta;
	}

 	function pregunta( $id){
 		$pregunta = $this->db->query('select * from pregunta where idpregunta="'. $id.'"');
 		return $pregunta;
 	}

 	function preguntasxevaluacion( $id){
 		$pregunta = $this->db->query('select * from pregunta where idreactivo="'. $id.'"');
 		return $pregunta;
 	}




 	function save($array)
 	{
		$this->db->insert("pregunta", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idpregunta',$id);
 		$this->db->update('pregunta',$array_item);
	}



 	public function delete($id)
	{
 		$this->db->where('idpregunta',$id);
		$this->db->delete('pregunta');
    if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idpregunta")->get('pregunta');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idpregunta")->get('pregunta');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$pregunta = $this->db->select("idpregunta")->order_by("idpregunta")->get('pregunta')->result_array();
		$arr=array("idpregunta"=>$id);
		$clave=array_search($arr,$pregunta);
	   if(array_key_exists($clave+1,$pregunta))
		 {

 		$pregunta = $this->db->query('select * from pregunta where idpregunta="'. $pregunta[$clave+1]["idpregunta"].'"');
		 }else{

 		$pregunta = $this->db->query('select * from pregunta where idpregunta="'. $id.'"');
		 }
		 	
 		return $pregunta;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$pregunta = $this->db->select("idpregunta")->order_by("idpregunta")->get('pregunta')->result_array();
		$arr=array("idpregunta"=>$id);
		$clave=array_search($arr,$pregunta);
	   if(array_key_exists($clave-1,$pregunta))
		 {

 		$pregunta = $this->db->query('select * from pregunta where idpregunta="'. $pregunta[$clave-1]["idpregunta"].'"');
		 }else{

 		$pregunta = $this->db->query('select * from pregunta where idpregunta="'. $id.'"');
		 }
		 	
 		return $pregunta;
 	}








}
