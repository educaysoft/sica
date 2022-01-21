<?php
class Portafolioestudiante_model extends CI_model {

	function lista_portafolioestudiantes(){
		 $portafolioestudiante= $this->db->get('portafolioestudiante');
		 return $portafolioestudiante;
	}


	function lista_portafolioestudiantesA(){
		 $portafolioestudiante= $this->db->get('portafolioestudiante1');
		 return $portafolioestudiante;
	}



 	function portafolioestudiante( $id){
 		$portafolioestudiante = $this->db->query('select * from portafolioestudiante where idportafolioestudiante="'. $id.'"');
 		return $portafolioestudiante;
 	}


 	function portafolioestudiantespersona( $id){
 		$portafolioestudiante = $this->db->query('select * from portafolioestudiante where idpersona="'. $id.'"');
 		return $portafolioestudiante;
 	}



 	function save($array)
 	{
		$this->db->insert("portafolioestudiante", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idportafolioestudiante',$id);
 		$this->db->update('portafolioestudiante',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idportafolioestudiante',$id);
		$this->db->delete('portafolioestudiante');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idportafolioestudiante")->get('portafolioestudiante');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idportafolioestudiante")->get('portafolioestudiante');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$portafolioestudiante = $this->db->select("idportafolioestudiante")->order_by("idportafolioestudiante")->get('portafolioestudiante')->result_array();
		$arr=array("idportafolioestudiante"=>$id);
		$clave=array_search($arr,$portafolioestudiante);
	   if(array_key_exists($clave+1,$portafolioestudiante))
		 {

 		$portafolioestudiante = $this->db->query('select * from portafolioestudiante where idportafolioestudiante="'. $portafolioestudiante[$clave+1]["idportafolioestudiante"].'"');
		 }else{

 		$portafolioestudiante = $this->db->query('select * from portafolioestudiante where idportafolioestudiante="'. $id.'"');
		 }
		 	
 		return $portafolioestudiante;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$portafolioestudiante = $this->db->select("idportafolioestudiante")->order_by("idportafolioestudiante")->get('portafolioestudiante')->result_array();
		$arr=array("idportafolioestudiante"=>$id);
		$clave=array_search($arr,$portafolioestudiante);
	   if(array_key_exists($clave-1,$portafolioestudiante))
		 {

 		$portafolioestudiante = $this->db->query('select * from portafolioestudiante where idportafolioestudiante="'. $portafolioestudiante[$clave-1]["idportafolioestudiante"].'"');
		 }else{

 		$portafolioestudiante = $this->db->query('select * from portafolioestudiante where idportafolioestudiante="'. $id.'"');
		 }
		 	
 		return $portafolioestudiante;
 	}






}
