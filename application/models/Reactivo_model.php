<?php
class Reactivo_model extends CI_model {

	function lista_reactivos(){
		 $reactivo= $this->db->get('reactivo');
		 return $reactivo;
	}

 	function reactivo( $id){
 		$reactivo = $this->db->query('select * from reactivo where idreactivo="'. $id.'"');
 		return $reactivo;
 	}

 	function save($array)
 	{
		$this->db->insert("reactivo", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idreactivo',$id);
 		$this->db->update('reactivo',$array_item);
	}


 	public function delete($id)
	{
 		$this->db->where('idreactivo',$id);
		$this->db->delete('reactivo');
    if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idreactivo")->get('reactivo');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idreactivo")->get('reactivo');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$reactivo = $this->db->select("idreactivo")->order_by("idreactivo")->get('reactivo')->result_array();
		$arr=array("idreactivo"=>$id);
		$clave=array_search($arr,$reactivo);
	   if(array_key_exists($clave+1,$reactivo))
		 {

 		$reactivo = $this->db->query('select * from reactivo where idreactivo="'. $reactivo[$clave+1]["idreactivo"].'"');
		 }else{

 		$reactivo = $this->db->query('select * from reactivo where idreactivo="'. $id.'"');
		 }
		 	
 		return $reactivo;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$reactivo = $this->db->select("idreactivo")->order_by("idreactivo")->get('reactivo')->result_array();
		$arr=array("idreactivo"=>$id);
		$clave=array_search($arr,$reactivo);
	   if(array_key_exists($clave-1,$reactivo))
		 {

 		$reactivo = $this->db->query('select * from reactivo where idreactivo="'. $reactivo[$clave-1]["idreactivo"].'"');
		 }else{

 		$reactivo = $this->db->query('select * from reactivo where idreactivo="'. $id.'"');
		 }
		 	
 		return $reactivo;
 	}






 

}
