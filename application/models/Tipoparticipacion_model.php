<?php
class Tipoparticipacion_model extends CI_model {

	function lista_tipoparticipacions(){
		 $tipoparticipacion= $this->db->get('tipoparticipacion');
		 return $tipoparticipacion;
	}

 	function tipoparticipacion( $id){
 		$tipoparticipacion = $this->db->query('select * from tipoparticipacion where idtipoparticipacion="'. $id.'"');
		 
 		return $tipoparticipacion;
 	}

 	function save($array)
 	{
		$this->db->insert("tipoparticipacion", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idtipoparticipacion',$id);
 		$this->db->update('tipoparticipacion',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idtipoparticipacion',$id);
		$this->db->delete('tipoparticipacion');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


public function get_tipoparticipacion($id){
	$condition = "idtipoparticipacion =" .  $id ;
	$this->db->select('*');
	$this->db->from('tipoparticipacion');
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
		$query=$this->db->order_by("idtipoparticipacion")->get('tipoparticipacion');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idtipoparticipacion")->get('tipoparticipacion');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$tipoparticipacion = $this->db->select("idtipoparticipacion")->order_by("idtipoparticipacion")->get('tipoparticipacion')->result_array();
		$arr=array("idtipoparticipacion"=>$id);
		$clave=array_search($arr,$tipoparticipacion);
	   if(array_key_exists($clave+1,$tipoparticipacion))
		 {

 		$tipoparticipacion = $this->db->query('select * from tipoparticipacion where idtipoparticipacion="'. $tipoparticipacion[$clave+1]["idtipoparticipacion"].'"');
		 }else{

 		$tipoparticipacion = $this->db->query('select * from tipoparticipacion where idtipoparticipacion="'. $id.'"');
		 }
		 	
 		return $tipoparticipacion;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$tipoparticipacion = $this->db->select("idtipoparticipacion")->order_by("idtipoparticipacion")->get('tipoparticipacion')->result_array();
		$arr=array("idtipoparticipacion"=>$id);
		$clave=array_search($arr,$tipoparticipacion);
	   if(array_key_exists($clave-1,$tipoparticipacion))
		 {

 		$tipoparticipacion = $this->db->query('select * from tipoparticipacion where idtipoparticipacion="'. $tipoparticipacion[$clave-1]["idtipoparticipacion"].'"');
		 }else{

 		$tipoparticipacion = $this->db->query('select * from tipoparticipacion where idtipoparticipacion="'. $id.'"');
		 }
		 	
 		return $tipoparticipacion;
 	}



	function lista_tipoparticipaciones_con_inscripciones(){
		 $this->db->select('tipoparticipacion.*');
		 $this->db->from('tipoparticipacion,evento');
		 $this->db->where('evento.idtipoparticipacion=tipoparticipacion.idtipoparticipacion and evento.idevento_estado=2');
		 $tipoparticipacion= $this->db->get();
		 return $tipoparticipacion;
	}




}
