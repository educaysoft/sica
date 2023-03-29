<?php
class Malla_model extends CI_model {

	function lista_mallas(){
		 $malla= $this->db->get('malla');
		 return $malla;
	}

	function lista_mallas1(){
		 $malla= $this->db->get('malla1');
		 return $malla;
	}




 	function malla( $id){
 		$malla = $this->db->query('select * from malla where idmalla="'. $id.'"');
		 
 		return $malla;
 	}

 	function save($array)
 	{
		$this->db->insert("malla", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idmalla',$id);
 		$this->db->update('malla',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idmalla',$id);
		$this->db->delete('malla');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


public function get_malla($id){
	$condition = "idmalla =" .  $id ;
	$this->db->select('*');
	$this->db->from('malla');
	$this->db->where($condition);
	$this->db->limit(1);
	$query = $this->db->get();

	if ($query->num_rows() == 1) {
		return $query->result();
	} else {
		return false;
	}

}





	function elprimero()
	{
		$query=$this->db->order_by("idmalla")->get('malla');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idmalla")->get('malla');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$malla = $this->db->select("idmalla")->order_by("idmalla")->get('malla')->result_array();
		$arr=array("idmalla"=>$id);
		$clave=array_search($arr,$malla);
	   if(array_key_exists($clave+1,$malla))
		 {

 		$malla = $this->db->query('select * from malla where idmalla="'. $malla[$clave+1]["idmalla"].'"');
		 }else{

 		$malla = $this->db->query('select * from malla where idmalla="'. $id.'"');
		 }
		 	
 		return $malla;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$malla = $this->db->select("idmalla")->order_by("idmalla")->get('malla')->result_array();
		$arr=array("idmalla"=>$id);
		$clave=array_search($arr,$malla);
	   if(array_key_exists($clave-1,$malla))
		 {

 		$malla = $this->db->query('select * from malla where idmalla="'. $malla[$clave-1]["idmalla"].'"');
		 }else{

 		$malla = $this->db->query('select * from malla where idmalla="'. $id.'"');
		 }
		 	
 		return $malla;
 	}



	function lista_mallaes_con_inscripciones(){
		 $this->db->select('malla.*');
		 $this->db->from('malla,evento');
		 $this->db->where('evento.idmalla=malla.idmalla and evento.idevento_estado=2');
		 $malla= $this->db->get();
		 return $malla;
	}




}
