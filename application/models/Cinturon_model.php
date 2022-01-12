<?php
class Cinturon_model extends CI_model {

	function lista_cinturones(){
		 $cinturon= $this->db->get('cinturon');
		 return $cinturon;
	}

	function lista_cinturonesA(){
		 $cinturon= $this->db->get('cinturon1');
		 return $cinturon;
	}




 	function cinturon( $id){
 		$cinturon = $this->db->query('select * from cinturon where idcinturon="'. $id.'"');
 		return $cinturon;
 	}

 	function save($array)
 	{
		$this->db->insert("cinturon", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idcinturon',$id);
 		$this->db->update('cinturon',$array_item);
	}



 	public function delete($id)
	{
 		$this->db->where('idcinturon',$id);
		$this->db->delete('cinturon');
    if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idcinturon")->get('cinturon');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idcinturon")->get('cinturon');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$cinturon = $this->db->select("idcinturon")->order_by("idcinturon")->get('cinturon')->result_array();
		$arr=array("idcinturon"=>$id);
		$clave=array_search($arr,$cinturon);
	   if(array_key_exists($clave+1,$cinturon))
		 {

 		$cinturon = $this->db->query('select * from cinturon where idcinturon="'. $cinturon[$clave+1]["idcinturon"].'"');
		 }else{

 		$cinturon = $this->db->query('select * from cinturon where idcinturon="'. $id.'"');
		 }
		 	
 		return $cinturon;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$cinturon = $this->db->select("idcinturon")->order_by("idcinturon")->get('cinturon')->result_array();
		$arr=array("idcinturon"=>$id);
		$clave=array_search($arr,$cinturon);
	   if(array_key_exists($clave-1,$cinturon))
		 {

 		$cinturon = $this->db->query('select * from cinturon where idcinturon="'. $cinturon[$clave-1]["idcinturon"].'"');
		 }else{

 		$cinturon = $this->db->query('select * from cinturon where idcinturon="'. $id.'"');
		 }
		 	
 		return $cinturon;
 	}








}
