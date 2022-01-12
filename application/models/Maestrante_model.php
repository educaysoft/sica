<?php
class Maestrante_model extends CI_model {

	function lista_maestrantes(){
		 $maestrante= $this->db->get('maestrante');
		 return $maestrante;
	}


	function lista_maestrantes1(){
		 $maestrante= $this->db->get('maestrante1');
		 return $maestrante;
	}

	function lista_estados($idmte){
		 $this->db->where('idmaestrante',$idmte);
		 $maestrante= $this->db->get('vitacora_maestrante_estado1');
		 return $maestrante;
	}


 	function maestrante( $id){
 		$maestrante = $this->db->query('select * from maestrante1 where idmaestrante="'. $id.'"');
 		return $maestrante;
 	}

 	function save($array)
 	{
		$this->db->insert("maestrante", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idmaestrante',$id);
 		$this->db->update('maestrante',$array_item);
	}
 

 	public function delete($id)
	{
 		$this->db->where('idmaestrante',$id);
		$this->db->delete('maestrante');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}





  // Para ir al primero

	function elprimero()
	{
		$query=$this->db->order_by("idmaestrante")->get('maestrante1');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}

// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idmaestrante")->get('maestrante1');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$maestrante = $this->db->select("idmaestrante")->order_by("idmaestrante")->get('maestrante1')->result_array();
		$arr=array("idmaestrante"=>$id);
		$clave=array_search($arr,$maestrante);
	   if(array_key_exists($clave+1,$maestrante))
		 {

 		$maestrante = $this->db->query('select * from maestrante1 where idmaestrante="'. $maestrante[$clave+1]["idmaestrante"].'"');
		 }else{

 		$maestrante = $this->db->query('select * from maestrante1 where idmaestrante="'. $id.'"');
		 }
		 	
 		return $maestrante;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$maestrante = $this->db->select("idmaestrante")->order_by("idmaestrante")->get('maestrante1')->result_array();
		$arr=array("idmaestrante"=>$id);
		$clave=array_search($arr,$maestrante);
	   if(array_key_exists($clave-1,$maestrante))
		 {

 		$maestrante = $this->db->query('select * from maestrante1 where idmaestrante="'. $maestrante[$clave-1]["idmaestrante"].'"');
		 }else{

 		$maestrante = $this->db->query('select * from maestrante1 where idmaestrante="'. $id.'"');
		 }
		 	
 		return $maestrante;
 	}






}
