<?php
class Etapamovilidad_model extends CI_model {

	function lista_etapamovilidads(){
		 $etapamovilidad= $this->db->get('etapamovilidad');
		 return $etapamovilidad;
	}

 	function etapamovilidad( $id){
 		$etapamovilidad = $this->db->query('select * from etapamovilidad where idetapamovilidad="'. $id.'"');
 		return $etapamovilidad;
 	}

 	function save($array)
 	{
		$this->db->insert("etapamovilidad", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idetapamovilidad',$id);
 		$this->db->update('etapamovilidad',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idetapamovilidad',$id);
		$this->db->delete('etapamovilidad');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idetapamovilidad")->get('etapamovilidad');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idetapamovilidad")->get('etapamovilidad');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$etapamovilidad = $this->db->select("idetapamovilidad")->order_by("idetapamovilidad")->get('etapamovilidad')->result_array();
		$arr=array("idetapamovilidad"=>$id);
		$clave=array_search($arr,$etapamovilidad);
	   if(array_key_exists($clave+1,$etapamovilidad))
		 {

 		$etapamovilidad = $this->db->query('select * from etapamovilidad where idetapamovilidad="'. $etapamovilidad[$clave+1]["idetapamovilidad"].'"');
		 }else{

 		$etapamovilidad = $this->db->query('select * from etapamovilidad where idetapamovilidad="'. $id.'"');
		 }
		 	
 		return $etapamovilidad;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$etapamovilidad = $this->db->select("idetapamovilidad")->order_by("idetapamovilidad")->get('etapamovilidad')->result_array();
		$arr=array("idetapamovilidad"=>$id);
		$clave=array_search($arr,$etapamovilidad);
	   if(array_key_exists($clave-1,$etapamovilidad))
		 {

 		$etapamovilidad = $this->db->query('select * from etapamovilidad where idetapamovilidad="'. $etapamovilidad[$clave-1]["idetapamovilidad"].'"');
		 }else{

 		$etapamovilidad = $this->db->query('select * from etapamovilidad where idetapamovilidad="'. $id.'"');
		 }
		 	
 		return $etapamovilidad;
 	}






}
