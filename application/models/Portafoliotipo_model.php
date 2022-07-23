<?php
class Portafoliotipo_model extends CI_model {

	function lista_portafoliotipos(){
		 $portafoliotipo= $this->db->get('portafoliotipo');
		 return $portafoliotipo;
	}

 	function portafoliotipo( $id){
 		$portafoliotipo = $this->db->query('select * from portafoliotipo where idportafoliotipo="'. $id.'"');
 		return $portafoliotipo;
 	}

 	function save($array)
 	{
		$this->db->insert("portafoliotipo", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idportafoliotipo',$id);
 		$this->db->update('portafoliotipo',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idportafoliotipo',$id);
		$this->db->delete('portafoliotipo');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idportafoliotipo")->get('portafoliotipo');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idportafoliotipo")->get('portafoliotipo');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$portafoliotipo = $this->db->select("idportafoliotipo")->order_by("idportafoliotipo")->get('portafoliotipo')->result_array();
		$arr=array("idportafoliotipo"=>$id);
		$clave=array_search($arr,$portafoliotipo);
	   if(array_key_exists($clave+1,$portafoliotipo))
		 {

 		$portafoliotipo = $this->db->query('select * from portafoliotipo where idportafoliotipo="'. $portafoliotipo[$clave+1]["idportafoliotipo"].'"');
		 }else{

 		$portafoliotipo = $this->db->query('select * from portafoliotipo where idportafoliotipo="'. $id.'"');
		 }
		 	
 		return $portafoliotipo;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$portafoliotipo = $this->db->select("idportafoliotipo")->order_by("idportafoliotipo")->get('portafoliotipo')->result_array();
		$arr=array("idportafoliotipo"=>$id);
		$clave=array_search($arr,$portafoliotipo);
	   if(array_key_exists($clave-1,$portafoliotipo))
		 {

 		$portafoliotipo = $this->db->query('select * from portafoliotipo where idportafoliotipo="'. $portafoliotipo[$clave-1]["idportafoliotipo"].'"');
		 }else{

 		$portafoliotipo = $this->db->query('select * from portafoliotipo where idportafoliotipo="'. $id.'"');
		 }
		 	
 		return $portafoliotipo;
 	}






}
