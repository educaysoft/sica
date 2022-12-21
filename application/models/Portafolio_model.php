<?php
class Portafolio_model extends CI_model {

	function lista_portafolios(){
		 $portafolio= $this->db->get('portafolio');
		 return $portafolio;
	}


	function lista_portafoliosA(){
		 $portafolio= $this->db->get('portafolio1');
		 return $portafolio;
	}



 	function portafolio( $id){
 		$portafolio = $this->db->query('select * from portafolio where idportafolio="'. $id.'"');
 		return $portafolio;
 	}


 	function portafoliospersona( $id){
 		$portafolio = $this->db->query('select * from portafolio where idpersona="'. $id.'"');
 		return $portafolio;
 	}



 	function save($array)
 	{
		$this->db->insert("portafolio", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idportafolio',$id);
 		$this->db->update('portafolio',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idportafolio',$id);
		$this->db->delete('portafolio');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idportafolio")->get('portafolio');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idportafolio")->get('portafolio');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$portafolio = $this->db->select("idportafolio")->order_by("idportafolio")->get('portafolio')->result_array();
		$arr=array("idportafolio"=>$id);
		$clave=array_search($arr,$portafolio);
	   if(array_key_exists($clave+1,$portafolio))
		 {

 		$portafolio = $this->db->query('select * from portafolio where idportafolio="'. $portafolio[$clave+1]["idportafolio"].'"');
		 }else{

 		$portafolio = $this->db->query('select * from portafolio where idportafolio="'. $id.'"');
		 }
		 	
 		return $portafolio;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$portafolio = $this->db->select("idportafolio")->order_by("idportafolio")->get('portafolio')->result_array();
		$arr=array("idportafolio"=>$id);
		$clave=array_search($arr,$portafolio);
	   if(array_key_exists($clave-1,$portafolio))
		 {

 		$portafolio = $this->db->query('select * from portafolio where idportafolio="'. $portafolio[$clave-1]["idportafolio"].'"');
		 }else{

 		$portafolio = $this->db->query('select * from portafolio where idportafolio="'. $id.'"');
		 }
		 	
 		return $portafolio;
 	}






}
