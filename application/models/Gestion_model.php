<?php
class Gestion_model extends CI_model {

	function lista_gestiones(){
		 $gestion= $this->db->get('gestion');
		 return $gestion;
	}

 	function gestion( $id){
 		$gestion = $this->db->query('select * from gestion where idgestion="'. $id.'"');
		 
 		return $gestion;
 	}

 	function save($array)
 	{
		$this->db->insert("gestion", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idgestion',$id);
 		$this->db->update('gestion',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idgestion',$id);
		$this->db->delete('gestion');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


public function get_gestion($id){
	$condition = "idgestion =" .  $id ;
	$this->db->select('*');
	$this->db->from('gestion');
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
		$query=$this->db->order_by("idgestion")->get('gestion');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idgestion")->get('gestion');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$gestion = $this->db->select("idgestion")->order_by("idgestion")->get('gestion')->result_array();
		$arr=array("idgestion"=>$id);
		$clave=array_search($arr,$gestion);
	   if(array_key_exists($clave+1,$gestion))
		 {

 		$gestion = $this->db->query('select * from gestion where idgestion="'. $gestion[$clave+1]["idgestion"].'"');
		 }else{

 		$gestion = $this->db->query('select * from gestion where idgestion="'. $id.'"');
		 }
		 	
 		return $gestion;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$gestion = $this->db->select("idgestion")->order_by("idgestion")->get('gestion')->result_array();
		$arr=array("idgestion"=>$id);
		$clave=array_search($arr,$gestion);
	   if(array_key_exists($clave-1,$gestion))
		 {

 		$gestion = $this->db->query('select * from gestion where idgestion="'. $gestion[$clave-1]["idgestion"].'"');
		 }else{

 		$gestion = $this->db->query('select * from gestion where idgestion="'. $id.'"');
		 }
		 	
 		return $gestion;
 	}



	function lista_gestiones_con_inscripciones(){
		 $this->db->select('gestion.*');
		 $this->db->from('gestion,evento');
		 $this->db->where('evento.idgestion=gestion.idgestion and evento.idevento_estado=2');
		 $gestion= $this->db->get();
		 return $gestion;
	}




}
