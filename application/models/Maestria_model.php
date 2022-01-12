<?php
class Maestria_model extends CI_model {

	function lista_maestria(){
		 $maestria= $this->db->get('maestria');
		 return $maestria;
	}

 	function maestria( $id){
 		$maestria = $this->db->query('select * from maestria where idmaestria="'. $id.'"');
 		return $maestria;
 	}

 	function save($array)
 	{
		$this->db->insert("maestria", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idmaestria',$id);
 		$this->db->update('maestria',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idmaestria',$id);
		$this->db->delete('maestria');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idmaestria")->get('maestria');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idmaestria")->get('maestria');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$maestria = $this->db->select("idmaestria")->order_by("idmaestria")->get('maestria')->result_array();
		$arr=array("idmaestria"=>$id);
		$clave=array_search($arr,$maestria);
	   if(array_key_exists($clave+1,$maestria))
		 {

 		$maestria = $this->db->query('select * from maestria where idmaestria="'. $maestria[$clave+1]["idmaestria"].'"');
		 }else{

 		$maestria = $this->db->query('select * from maestria where idmaestria="'. $id.'"');
		 }
		 	
 		return $maestria;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$maestria = $this->db->select("idmaestria")->order_by("idmaestria")->get('maestria')->result_array();
		$arr=array("idmaestria"=>$id);
		$clave=array_search($arr,$maestria);
	   if(array_key_exists($clave-1,$maestria))
		 {

 		$maestria = $this->db->query('select * from maestria where idmaestria="'. $maestria[$clave-1]["idmaestria"].'"');
		 }else{

 		$maestria = $this->db->query('select * from maestria where idmaestria="'. $id.'"');
		 }
		 	
 		return $maestria;
 	}






}
