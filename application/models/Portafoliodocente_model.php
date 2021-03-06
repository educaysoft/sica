<?php
class Portafoliodocente_model extends CI_model {

	function lista_portafoliodocentes(){
		 $portafoliodocente= $this->db->get('portafoliodocente');
		 return $portafoliodocente;
	}


	function lista_portafoliodocentesA(){
		 $portafoliodocente= $this->db->get('portafoliodocente1');
		 return $portafoliodocente;
	}



 	function portafoliodocente( $id){
 		$portafoliodocente = $this->db->query('select * from portafoliodocente where idportafoliodocente="'. $id.'"');
 		return $portafoliodocente;
 	}


 	function portafoliodocentespersona( $id){
 		$portafoliodocente = $this->db->query('select * from portafoliodocente where idpersona="'. $id.'"');
 		return $portafoliodocente;
 	}



 	function save($array)
 	{
		$this->db->insert("portafoliodocente", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idportafoliodocente',$id);
 		$this->db->update('portafoliodocente',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idportafoliodocente',$id);
		$this->db->delete('portafoliodocente');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idportafoliodocente")->get('portafoliodocente');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idportafoliodocente")->get('portafoliodocente');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$portafoliodocente = $this->db->select("idportafoliodocente")->order_by("idportafoliodocente")->get('portafoliodocente')->result_array();
		$arr=array("idportafoliodocente"=>$id);
		$clave=array_search($arr,$portafoliodocente);
	   if(array_key_exists($clave+1,$portafoliodocente))
		 {

 		$portafoliodocente = $this->db->query('select * from portafoliodocente where idportafoliodocente="'. $portafoliodocente[$clave+1]["idportafoliodocente"].'"');
		 }else{

 		$portafoliodocente = $this->db->query('select * from portafoliodocente where idportafoliodocente="'. $id.'"');
		 }
		 	
 		return $portafoliodocente;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$portafoliodocente = $this->db->select("idportafoliodocente")->order_by("idportafoliodocente")->get('portafoliodocente')->result_array();
		$arr=array("idportafoliodocente"=>$id);
		$clave=array_search($arr,$portafoliodocente);
	   if(array_key_exists($clave-1,$portafoliodocente))
		 {

 		$portafoliodocente = $this->db->query('select * from portafoliodocente where idportafoliodocente="'. $portafoliodocente[$clave-1]["idportafoliodocente"].'"');
		 }else{

 		$portafoliodocente = $this->db->query('select * from portafoliodocente where idportafoliodocente="'. $id.'"');
		 }
		 	
 		return $portafoliodocente;
 	}






}
