<?php
class Fechacalendario_model extends CI_model {

	function lista_fechacalendarios(){
		 $fechacalendario= $this->db->get('fechacalendario');
		 return $fechacalendario;
	}


function lista_fechacalendarios1($idperiodoacademico){
	if($idperiodoacademico>0)
	{
	$this->db->where('idperiodoacademico='.$idperiodoacademico);
	}
	$query=$this->db->order_by("idperiodoacademico","idfechacalendario")->get('fechacalendario1');
	 return $query;
	}



 	function fechacalendarios( $idperiodoacademico){
 		$fechacalendario = $this->db->query('select * from fechacalendario where idperiodoacademico="'. $idperiodoacademico.'" order by fechaimpartida');
 		return $fechacalendario;
 	}


 	function fechacalendario( $id){
 		$fechacalendario = $this->db->query('select * from fechacalendario where idfechacalendario="'. $id.'"');
 		return $fechacalendario;
 	}

 	function save($array)
 	{
		$this->db->insert("fechacalendario", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idfechacalendario',$id);
 		$this->db->update('fechacalendario',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idfechacalendario',$id);
		$this->db->delete('fechacalendario');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


public function get_fechacalendario($id){
	$condition = "idfechacalendario =" .  $id ;
	$this->db->select('*');
	$this->db->from('fechacalendario');
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
		$query=$this->db->order_by("idfechacalendario")->get('fechacalendario');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idfechacalendario")->get('fechacalendario');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$fechacalendario = $this->db->select("idfechacalendario")->order_by("idfechacalendario")->get('fechacalendario')->result_array();
		$arr=array("idfechacalendario"=>$id);
		$clave=array_search($arr,$fechacalendario);
	   if(array_key_exists($clave+1,$fechacalendario))
		 {

 		$fechacalendario = $this->db->query('select * from fechacalendario where idfechacalendario="'. $fechacalendario[$clave+1]["idfechacalendario"].'"');
		 }else{

 		$fechacalendario = $this->db->query('select * from fechacalendario where idfechacalendario="'. $id.'"');
		 }
		 	
 		return $fechacalendario;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$fechacalendario = $this->db->select("idfechacalendario")->order_by("idfechacalendario")->get('fechacalendario')->result_array();
		$arr=array("idfechacalendario"=>$id);
		$clave=array_search($arr,$fechacalendario);
	   if(array_key_exists($clave-1,$fechacalendario))
		 {

 		$fechacalendario = $this->db->query('select * from fechacalendario where idfechacalendario="'. $fechacalendario[$clave-1]["idfechacalendario"].'"');
		 }else{

 		$fechacalendario = $this->db->query('select * from fechacalendario where idfechacalendario="'. $id.'"');
		 }
		 	
 		return $fechacalendario;
 	}



	function lista_fechacalendarioes_con_inscripciones(){
		 $this->db->select('fechacalendario.*');
		 $this->db->from('fechacalendario,evento');
		 $this->db->where('evento.idfechacalendario=fechacalendario.idfechacalendario and evento.idevento_estado=2');
		 $fechacalendario= $this->db->get();
		 return $fechacalendario;
	}




}
