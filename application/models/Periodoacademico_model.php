<?php
class Periodoacademico_model extends CI_model {

	function lista_periodoacademicos(){
		 $periodoacademico= $this->db->get('periodoacademico');
		 return $periodoacademico;
	}


	function lista_periodoacademicos1(){
		 $periodoacademico= $this->db->get('periodoacademico1');
		 return $periodoacademico;
	}




 	function periodoacademico( $id){
 		$periodoacademico = $this->db->query('select * from periodoacademico where idperiodoacademico="'. $id.'"');
		 
 		return $periodoacademico;
 	}

 	function save($array)
 	{
		$this->db->insert("periodoacademico", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idperiodoacademico',$id);
 		$this->db->update('periodoacademico',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idperiodoacademico',$id);
		$this->db->delete('periodoacademico');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


public function get_periodoacademico($id){
	$condition = "idperiodoacademico =" .  $id ;
	$this->db->select('*');
	$this->db->from('periodoacademico');
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
		$query=$this->db->order_by("idperiodoacademico")->get('periodoacademico');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idperiodoacademico")->get('periodoacademico');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$periodoacademico = $this->db->select("idperiodoacademico")->order_by("idperiodoacademico")->get('periodoacademico')->result_array();
		$arr=array("idperiodoacademico"=>$id);
		$clave=array_search($arr,$periodoacademico);
	   if(array_key_exists($clave+1,$periodoacademico))
		 {

 		$periodoacademico = $this->db->query('select * from periodoacademico where idperiodoacademico="'. $periodoacademico[$clave+1]["idperiodoacademico"].'"');
		 }else{

 		$periodoacademico = $this->db->query('select * from periodoacademico where idperiodoacademico="'. $id.'"');
		 }
		 	
 		return $periodoacademico;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$periodoacademico = $this->db->select("idperiodoacademico")->order_by("idperiodoacademico")->get('periodoacademico')->result_array();
		$arr=array("idperiodoacademico"=>$id);
		$clave=array_search($arr,$periodoacademico);
	   if(array_key_exists($clave-1,$periodoacademico))
		 {

 		$periodoacademico = $this->db->query('select * from periodoacademico where idperiodoacademico="'. $periodoacademico[$clave-1]["idperiodoacademico"].'"');
		 }else{

 		$periodoacademico = $this->db->query('select * from periodoacademico where idperiodoacademico="'. $id.'"');
		 }
		 	
 		return $periodoacademico;
 	}



	function lista_periodoacademicoes_con_inscripciones(){
		 $this->db->select('periodoacademico.*');
		 $this->db->from('periodoacademico,evento');
		 $this->db->where('evento.idperiodoacademico=periodoacademico.idperiodoacademico and evento.idevento_estado=2');
		 $periodoacademico= $this->db->get();
		 return $periodoacademico;
	}




}
