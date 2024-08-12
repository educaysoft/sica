<?php
class Reunion_model extends CI_model {

	function lista_reunions(){
		 $reunion= $this->db->get('reunion');
		 return $reunion;
	}


	function lista_reunionsA(){

$this->db->order_by('orden', 'asc');

$query = $this->db->get('reunion1');



		 return $query;
	}




 	function reunion( $id){
 		$reunion = $this->db->query('select * from reunion where idreunion="'. $id.'"');
 		return $reunion;
 	}

 	function reunionA( $id){
 		$reunion = $this->db->query('select * from reunion1 where idinstitucion="'. $id.'" order by orden');
 		return $reunion;
 	}




 	function save($array)
 	{
		$this->db->insert("reunion", $array);
		   if( $this->db->affected_rows()>0){
			    return true;
		   }else{
			    return false;
		   }

 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idreunion',$id);
 		$this->db->update('reunion',$array_item);
	}


 	public function delete($id)
	{
 		$this->db->where('idreunion',$id);
		$this->db->delete('reunion');
    if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idreunion")->get('reunion');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idreunion")->get('reunion');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$reunion = $this->db->select("idreunion")->order_by("idreunion")->get('reunion')->result_array();
		$arr=array("idreunion"=>$id);
		$clave=array_search($arr,$reunion);
	   if(array_key_exists($clave+1,$reunion))
		 {

 		$reunion = $this->db->query('select * from reunion where idreunion="'. $reunion[$clave+1]["idreunion"].'"');
		 }else{

 		$reunion = $this->db->query('select * from reunion where idreunion="'. $id.'"');
		 }
		 	
 		return $reunion;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$reunion = $this->db->select("idreunion")->order_by("idreunion")->get('reunion')->result_array();
		$arr=array("idreunion"=>$id);
		$clave=array_search($arr,$reunion);
	   if(array_key_exists($clave-1,$reunion))
		 {

 		$reunion = $this->db->query('select * from reunion where idreunion="'. $reunion[$clave-1]["idreunion"].'"');
		 }else{

 		$reunion = $this->db->query('select * from reunion where idreunion="'. $id.'"');
		 }
		 	
 		return $reunion;
 	}






 

}
