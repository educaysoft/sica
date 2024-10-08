<?php
class Fechacalendaria_model extends CI_model {

	function lista_fechacalendarias(){
		 $fechacalendaria= $this->db->get('fechacalendaria');
		 return $fechacalendaria;
	}


	function lista_fechacalendarias1(){
		 $fechacalendaria= $this->db->get('fechacalendaria1');
		 return $fechacalendaria;
	}




function lista_fechacalendarias1($idperiodoacademico){
	if($idperiodoacademico>0)
	{
	$this->db->where('idperiodoacademico='.$idperiodoacademico);
	}
	$query=$this->db->order_by("idperiodoacademico","idfechacalendaria")->get('fechacalendaria1');
	 return $query;
	}



 	function fechacalendarias( $idperiodoacademico){
 		$fechacalendaria = $this->db->query('select * from fechacalendaria where idperiodoacademico="'. $idperiodoacademico.'" order by fechaimpartida');
 		return $fechacalendaria;
 	}


 	function fechacalendaria( $id){
 		$fechacalendaria = $this->db->query('select * from fechacalendaria where idfechacalendaria="'. $id.'"');
 		return $fechacalendaria;
 	}

 	function save($array)
 	{
		$this->db->insert("fechacalendaria", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idfechacalendaria',$id);
 		$this->db->update('fechacalendaria',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idfechacalendaria',$id);
		$this->db->delete('fechacalendaria');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


public function get_fechacalendaria($id){
	$condition = "idfechacalendaria =" .  $id ;
	$this->db->select('*');
	$this->db->from('fechacalendaria');
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
		$query=$this->db->order_by("idfechacalendaria")->get('fechacalendaria');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idfechacalendaria")->get('fechacalendaria');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$fechacalendaria = $this->db->select("idfechacalendaria")->order_by("idfechacalendaria")->get('fechacalendaria')->result_array();
		$arr=array("idfechacalendaria"=>$id);
		$clave=array_search($arr,$fechacalendaria);
	   if(array_key_exists($clave+1,$fechacalendaria))
		 {

 		$fechacalendaria = $this->db->query('select * from fechacalendaria where idfechacalendaria="'. $fechacalendaria[$clave+1]["idfechacalendaria"].'"');
		 }else{

 		$fechacalendaria = $this->db->query('select * from fechacalendaria where idfechacalendaria="'. $id.'"');
		 }
		 	
 		return $fechacalendaria;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$fechacalendaria = $this->db->select("idfechacalendaria")->order_by("idfechacalendaria")->get('fechacalendaria')->result_array();
		$arr=array("idfechacalendaria"=>$id);
		$clave=array_search($arr,$fechacalendaria);
	   if(array_key_exists($clave-1,$fechacalendaria))
		 {

 		$fechacalendaria = $this->db->query('select * from fechacalendaria where idfechacalendaria="'. $fechacalendaria[$clave-1]["idfechacalendaria"].'"');
		 }else{

 		$fechacalendaria = $this->db->query('select * from fechacalendaria where idfechacalendaria="'. $id.'"');
		 }
		 	
 		return $fechacalendaria;
 	}



	function lista_fechacalendariaes_con_inscripciones(){
		 $this->db->select('fechacalendaria.*');
		 $this->db->from('fechacalendaria,evento');
		 $this->db->where('evento.idfechacalendaria=fechacalendaria.idfechacalendaria and evento.idevento_estado=2');
		 $fechacalendaria= $this->db->get();
		 return $fechacalendaria;
	}




}
