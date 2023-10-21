<?php
class Tipoactividadacademica_model extends CI_model {

	function lista_tipoactividadacademicas(){
		 $tipoactividadacademica= $this->db->get('tipoactividadacademica');
		 return $tipoactividadacademica;
	}

 	function tipoactividadacademica( $id){
 		$tipoactividadacademica = $this->db->query('select * from tipoactividadacademica where idtipoactividadacademica="'. $id.'"');
 		return $tipoactividadacademica;
 	}

 	function save($array)
 	{
		$this->db->insert("tipoactividadacademica", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idtipoactividadacademica',$id);
 		$this->db->update('tipoactividadacademica',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idtipoactividadacademica',$id);
		$this->db->delete('tipoactividadacademica');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idtipoactividadacademica")->get('tipoactividadacademica');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idtipoactividadacademica")->get('tipoactividadacademica');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$tipoactividadacademica = $this->db->select("idtipoactividadacademica")->order_by("idtipoactividadacademica")->get('tipoactividadacademica')->result_array();
		$arr=array("idtipoactividadacademica"=>$id);
		$clave=array_search($arr,$tipoactividadacademica);
	   if(array_key_exists($clave+1,$tipoactividadacademica))
		 {

 		$tipoactividadacademica = $this->db->query('select * from tipoactividadacademica where idtipoactividadacademica="'. $tipoactividadacademica[$clave+1]["idtipoactividadacademica"].'"');
		 }else{

 		$tipoactividadacademica = $this->db->query('select * from tipoactividadacademica where idtipoactividadacademica="'. $id.'"');
		 }
		 	
 		return $tipoactividadacademica;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$tipoactividadacademica = $this->db->select("idtipoactividadacademica")->order_by("idtipoactividadacademica")->get('tipoactividadacademica')->result_array();
		$arr=array("idtipoactividadacademica"=>$id);
		$clave=array_search($arr,$tipoactividadacademica);
	   if(array_key_exists($clave-1,$tipoactividadacademica))
		 {

 		$tipoactividadacademica = $this->db->query('select * from tipoactividadacademica where idtipoactividadacademica="'. $tipoactividadacademica[$clave-1]["idtipoactividadacademica"].'"');
		 }else{

 		$tipoactividadacademica = $this->db->query('select * from tipoactividadacademica where idtipoactividadacademica="'. $id.'"');
		 }
		 	
 		return $tipoactividadacademica;
 	}






}
