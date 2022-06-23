<?php
class Periodoacademio_model extends CI_model {

	function lista_periodoacademioes(){
		 $periodoacademio= $this->db->get('periodoacademio');
		 return $periodoacademio;
	}

 	function periodoacademio( $id){
 		$periodoacademio = $this->db->query('select * from periodoacademio where idperiodoacademio="'. $id.'"');
		 
 		return $periodoacademio;
 	}

 	function save($array)
 	{
		$this->db->insert("periodoacademio", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idperiodoacademio',$id);
 		$this->db->update('periodoacademio',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idperiodoacademio',$id);
		$this->db->delete('periodoacademio');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


public function get_periodoacademio($id){
	$condition = "idperiodoacademio =" .  $id ;
	$this->db->select('*');
	$this->db->from('periodoacademio');
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
		$query=$this->db->order_by("idperiodoacademio")->get('periodoacademio');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idperiodoacademio")->get('periodoacademio');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$periodoacademio = $this->db->select("idperiodoacademio")->order_by("idperiodoacademio")->get('periodoacademio')->result_array();
		$arr=array("idperiodoacademio"=>$id);
		$clave=array_search($arr,$periodoacademio);
	   if(array_key_exists($clave+1,$periodoacademio))
		 {

 		$periodoacademio = $this->db->query('select * from periodoacademio where idperiodoacademio="'. $periodoacademio[$clave+1]["idperiodoacademio"].'"');
		 }else{

 		$periodoacademio = $this->db->query('select * from periodoacademio where idperiodoacademio="'. $id.'"');
		 }
		 	
 		return $periodoacademio;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$periodoacademio = $this->db->select("idperiodoacademio")->order_by("idperiodoacademio")->get('periodoacademio')->result_array();
		$arr=array("idperiodoacademio"=>$id);
		$clave=array_search($arr,$periodoacademio);
	   if(array_key_exists($clave-1,$periodoacademio))
		 {

 		$periodoacademio = $this->db->query('select * from periodoacademio where idperiodoacademio="'. $periodoacademio[$clave-1]["idperiodoacademio"].'"');
		 }else{

 		$periodoacademio = $this->db->query('select * from periodoacademio where idperiodoacademio="'. $id.'"');
		 }
		 	
 		return $periodoacademio;
 	}



	function lista_periodoacademioes_con_inscripciones(){
		 $this->db->select('periodoacademio.*');
		 $this->db->from('periodoacademio,evento');
		 $this->db->where('evento.idperiodoacademio=periodoacademio.idperiodoacademio and evento.idevento_estado=2');
		 $periodoacademio= $this->db->get();
		 return $periodoacademio;
	}




}
