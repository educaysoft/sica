<?php
class Acceso_model extends CI_model {

	function lista_accesos(){
		 $acceso= $this->db->get('acceso');
		 return $acceso;
	}


	function lista_accesosA($id){
		 if($id>0){
		 $this->db->where('idusuario',$id);
		 }
		 $acceso= $this->db->get('acceso1');
		 return $acceso;
	}



 	function acceso( $id){
 		$acceso = $this->db->query('select * from acceso where idacceso="'. $id.'"');
 		return $acceso;
 	}


 	function usuario($id){
 		$acceso = $this->db->where('idusuario',$id)->get('acceso');
 		return $acceso;
 	}


 	function get_usuario($id){
 		$acceso = $this->db->where('idusuario',$id)->get('acceso');
 		return $acceso->result();
 	}


 	function save($array)
 	{
		$this->db->insert("acceso", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idacceso',$id);
 		$this->db->update('acceso',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idacceso',$id);
		$this->db->delete('acceso');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idacceso")->get('acceso');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idacceso")->get('acceso');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$acceso = $this->db->select("idacceso")->order_by("idacceso")->get('acceso')->result_array();
		$arr=array("idacceso"=>$id);
		$clave=array_search($arr,$acceso);
	   if(array_key_exists($clave+1,$acceso))
		 {

 		$acceso = $this->db->query('select * from acceso where idacceso="'. $acceso[$clave+1]["idacceso"].'"');
		 }else{

 		$acceso = $this->db->query('select * from acceso where idacceso="'. $id.'"');
		 }
		 	
 		return $acceso;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$acceso = $this->db->select("idacceso")->order_by("idacceso")->get('acceso')->result_array();
		$arr=array("idacceso"=>$id);
		$clave=array_search($arr,$acceso);
	   if(array_key_exists($clave-1,$acceso))
		 {

 		$acceso = $this->db->query('select * from acceso where idacceso="'. $acceso[$clave-1]["idacceso"].'"');
		 }else{

 		$acceso = $this->db->query('select * from acceso where idacceso="'. $id.'"');
		 }
		 	
 		return $acceso;
 	}






}
