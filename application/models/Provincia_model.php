<?php
class Provincia_model extends CI_model {

	function lista_provincias(){
		 $provincia= $this->db->get('provincia');
		 return $provincia;
	}

	function lista_provinciasA(){
		 $provincia= $this->db->get('provincia1');
		 return $provincia;
	}




 	function provincia( $id){
 		$provincia = $this->db->query('select * from provincia where idprovincia="'. $id.'"');
 		return $provincia;
 	}

 	function save($array)
 	{
		$this->db->insert("provincia", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idprovincia',$id);
 		$this->db->update('provincia',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idprovincia',$id);
		$this->db->delete('provincia');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idprovincia")->get('provincia');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idprovincia")->get('provincia');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$provincia = $this->db->select("idprovincia")->order_by("idprovincia")->get('provincia')->result_array();
		$arr=array("idprovincia"=>$id);
		$clave=array_search($arr,$provincia);
	   if(array_key_exists($clave+1,$provincia))
		 {

 		$provincia = $this->db->query('select * from provincia where idprovincia="'. $provincia[$clave+1]["idprovincia"].'"');
		 }else{

 		$provincia = $this->db->query('select * from provincia where idprovincia="'. $id.'"');
		 }
		 	
 		return $provincia;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$provincia = $this->db->select("idprovincia")->order_by("idprovincia")->get('provincia')->result_array();
		$arr=array("idprovincia"=>$id);
		$clave=array_search($arr,$provincia);
	   if(array_key_exists($clave-1,$provincia))
		 {

 		$provincia = $this->db->query('select * from provincia where idprovincia="'. $provincia[$clave-1]["idprovincia"].'"');
		 }else{

 		$provincia = $this->db->query('select * from provincia where idprovincia="'. $id.'"');
		 }
		 	
 		return $provincia;
 	}








}
