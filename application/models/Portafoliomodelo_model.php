<?php
class Portafoliomodelo_model extends CI_model {

	function lista_portafoliomodelos(){
		 $portafoliomodelo= $this->db->get('portafoliomodelo');
		 return $portafoliomodelo;
	}

 	function portafoliomodelo( $id){
 		$portafoliomodelo = $this->db->query('select * from portafoliomodelo where idportafoliomodelo="'. $id.'"');
 		return $portafoliomodelo;
 	}

 	function save($array)
 	{
		$this->db->insert("portafoliomodelo", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idportafoliomodelo',$id);
 		$this->db->update('portafoliomodelo',$array_item);
	}


 	public function delete($id)
	{
 		$this->db->where('idportafoliomodelo',$id);
		$this->db->delete('portafoliomodelo');
    if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idportafoliomodelo")->get('portafoliomodelo');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idportafoliomodelo")->get('portafoliomodelo');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$portafoliomodelo = $this->db->select("idportafoliomodelo")->order_by("idportafoliomodelo")->get('portafoliomodelo')->result_array();
		$arr=array("idportafoliomodelo"=>$id);
		$clave=array_search($arr,$portafoliomodelo);
	   if(array_key_exists($clave+1,$portafoliomodelo))
		 {

 		$portafoliomodelo = $this->db->query('select * from portafoliomodelo where idportafoliomodelo="'. $portafoliomodelo[$clave+1]["idportafoliomodelo"].'"');
		 }else{

 		$portafoliomodelo = $this->db->query('select * from portafoliomodelo where idportafoliomodelo="'. $id.'"');
		 }
		 	
 		return $portafoliomodelo;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$portafoliomodelo = $this->db->select("idportafoliomodelo")->order_by("idportafoliomodelo")->get('portafoliomodelo')->result_array();
		$arr=array("idportafoliomodelo"=>$id);
		$clave=array_search($arr,$portafoliomodelo);
	   if(array_key_exists($clave-1,$portafoliomodelo))
		 {

 		$portafoliomodelo = $this->db->query('select * from portafoliomodelo where idportafoliomodelo="'. $portafoliomodelo[$clave-1]["idportafoliomodelo"].'"');
		 }else{

 		$portafoliomodelo = $this->db->query('select * from portafoliomodelo where idportafoliomodelo="'. $id.'"');
		 }
		 	
 		return $portafoliomodelo;
 	}






 

}
