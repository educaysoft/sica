<?php
class Portafolioestado_model extends CI_model {

	function lista_portafolioestado(){
		 $portafolioestado= $this->db->get('portafolioestado');
		 return $portafolioestado;
	}

 	function portafolioestado( $id){
 		$portafolioestado = $this->db->query('select * from portafolioestado where idportafolioestado="'. $id.'"');
 		return $portafolioestado;
 	}

 	function save($array)
 	{
		$this->db->insert("portafolioestado", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idportafolioestado',$id);
 		$this->db->update('portafolioestado',$array_item);
	}


 	public function delete($id)
	{
 		$this->db->where('idportafolioestado',$id);
		$this->db->delete('portafolioestado');
    if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idportafolioestado")->get('portafolioestado');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idportafolioestado")->get('portafolioestado');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$portafolioestado = $this->db->select("idportafolioestado")->order_by("idportafolioestado")->get('portafolioestado')->result_array();
		$arr=array("idportafolioestado"=>$id);
		$clave=array_search($arr,$portafolioestado);
	   if(array_key_exists($clave+1,$portafolioestado))
		 {

 		$portafolioestado = $this->db->query('select * from portafolioestado where idportafolioestado="'. $portafolioestado[$clave+1]["idportafolioestado"].'"');
		 }else{

 		$portafolioestado = $this->db->query('select * from portafolioestado where idportafolioestado="'. $id.'"');
		 }
		 	
 		return $portafolioestado;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$portafolioestado = $this->db->select("idportafolioestado")->order_by("idportafolioestado")->get('portafolioestado')->result_array();
		$arr=array("idportafolioestado"=>$id);
		$clave=array_search($arr,$portafolioestado);
	   if(array_key_exists($clave-1,$portafolioestado))
		 {

 		$portafolioestado = $this->db->query('select * from portafolioestado where idportafolioestado="'. $portafolioestado[$clave-1]["idportafolioestado"].'"');
		 }else{

 		$portafolioestado = $this->db->query('select * from portafolioestado where idportafolioestado="'. $id.'"');
		 }
		 	
 		return $portafolioestado;
 	}






 

}
