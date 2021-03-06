<?php
class Tipoasistencia_model extends CI_model {

	function lista_tipoasistencias(){
		 $tipoasistencia= $this->db->get('tipoasistencia');
		 return $tipoasistencia;
	}

 	function tipoasistencia( $id){
 		$tipoasistencia = $this->db->query('select * from tipoasistencia where idtipoasistencia="'. $id.'"');
		 
 		return $tipoasistencia;
 	}

 	function save($array)
 	{
		$this->db->insert("tipoasistencia", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idtipoasistencia',$id);
 		$this->db->update('tipoasistencia',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idtipoasistencia',$id);
		$this->db->delete('tipoasistencia');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


public function get_tipoasistencia($id){
	$condition = "idtipoasistencia =" .  $id ;
	$this->db->select('*');
	$this->db->from('tipoasistencia');
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
		$query=$this->db->order_by("idtipoasistencia")->get('tipoasistencia');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idtipoasistencia")->get('tipoasistencia');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$tipoasistencia = $this->db->select("idtipoasistencia")->order_by("idtipoasistencia")->get('tipoasistencia')->result_array();
		$arr=array("idtipoasistencia"=>$id);
		$clave=array_search($arr,$tipoasistencia);
	   if(array_key_exists($clave+1,$tipoasistencia))
		 {

 		$tipoasistencia = $this->db->query('select * from tipoasistencia where idtipoasistencia="'. $tipoasistencia[$clave+1]["idtipoasistencia"].'"');
		 }else{

 		$tipoasistencia = $this->db->query('select * from tipoasistencia where idtipoasistencia="'. $id.'"');
		 }
		 	
 		return $tipoasistencia;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$tipoasistencia = $this->db->select("idtipoasistencia")->order_by("idtipoasistencia")->get('tipoasistencia')->result_array();
		$arr=array("idtipoasistencia"=>$id);
		$clave=array_search($arr,$tipoasistencia);
	   if(array_key_exists($clave-1,$tipoasistencia))
		 {

 		$tipoasistencia = $this->db->query('select * from tipoasistencia where idtipoasistencia="'. $tipoasistencia[$clave-1]["idtipoasistencia"].'"');
		 }else{

 		$tipoasistencia = $this->db->query('select * from tipoasistencia where idtipoasistencia="'. $id.'"');
		 }
		 	
 		return $tipoasistencia;
 	}



	function lista_tipoasistenciaes_con_inscripciones(){
		 $this->db->select('tipoasistencia.*');
		 $this->db->from('tipoasistencia,evento');
		 $this->db->where('evento.idtipoasistencia=tipoasistencia.idtipoasistencia and evento.idevento_estado=2');
		 $tipoasistencia= $this->db->get();
		 return $tipoasistencia;
	}




}
