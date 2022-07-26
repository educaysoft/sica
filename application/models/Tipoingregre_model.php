<?php
class Tipoingregre_model extends CI_model {

	function lista_tipoingregre(){
		 $tipoingregre= $this->db->get('tipoingregre');
		 return $tipoingregre;
	}

 	function tipoingregre( $id){
 		$tipoingregre = $this->db->query('select * from tipoingregre where idtipoingregre="'. $id.'"');
		 
 		return $tipoingregre;
 	}

 	function save($array)
 	{
		$this->db->insert("tipoingregre", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idtipoingregre',$id);
 		$this->db->update('tipoingregre',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idtipoingregre',$id);
		$this->db->delete('tipoingregre');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


public function get_tipoingregre($id){
	$condition = "idtipoingregre =" .  $id ;
	$this->db->select('*');
	$this->db->from('tipoingregre');
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
		$query=$this->db->order_by("idtipoingregre")->get('tipoingregre');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idtipoingregre")->get('tipoingregre');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$tipoingregre = $this->db->select("idtipoingregre")->order_by("idtipoingregre")->get('tipoingregre')->result_array();
		$arr=array("idtipoingregre"=>$id);
		$clave=array_search($arr,$tipoingregre);
	   if(array_key_exists($clave+1,$tipoingregre))
		 {

 		$tipoingregre = $this->db->query('select * from tipoingregre where idtipoingregre="'. $tipoingregre[$clave+1]["idtipoingregre"].'"');
		 }else{

 		$tipoingregre = $this->db->query('select * from tipoingregre where idtipoingregre="'. $id.'"');
		 }
		 	
 		return $tipoingregre;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$tipoingregre = $this->db->select("idtipoingregre")->order_by("idtipoingregre")->get('tipoingregre')->result_array();
		$arr=array("idtipoingregre"=>$id);
		$clave=array_search($arr,$tipoingregre);
	   if(array_key_exists($clave-1,$tipoingregre))
		 {

 		$tipoingregre = $this->db->query('select * from tipoingregre where idtipoingregre="'. $tipoingregre[$clave-1]["idtipoingregre"].'"');
		 }else{

 		$tipoingregre = $this->db->query('select * from tipoingregre where idtipoingregre="'. $id.'"');
		 }
		 	
 		return $tipoingregre;
 	}



	function lista_tipoingregrees_con_inscripciones(){
		 $this->db->select('tipoingregre.*');
		 $this->db->from('tipoingregre,evento');
		 $this->db->where('evento.idtipoingregre=tipoingregre.idtipoingregre and evento.idevento_estado=2');
		 $tipoingregre= $this->db->get();
		 return $tipoingregre;
	}




}
