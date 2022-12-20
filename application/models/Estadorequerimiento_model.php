<?php
class Estadorequerimiento_model extends CI_model {

	function lista_estadorequerimiento(){
		 $estadorequerimiento= $this->db->get('estadorequerimiento');
		 return $estadorequerimiento;
	}

 	function estadorequerimiento( $id){
 		$estadorequerimiento = $this->db->query('select * from estadorequerimiento where idestadorequerimiento="'. $id.'"');
		 
 		return $estadorequerimiento;
 	}

 	function save($array)
 	{
		$this->db->insert("estadorequerimiento", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idestadorequerimiento',$id);
 		$this->db->update('estadorequerimiento',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idestadorequerimiento',$id);
		$this->db->delete('estadorequerimiento');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


public function get_estadorequerimiento($id){
	$condition = "idestadorequerimiento =" .  $id ;
	$this->db->select('*');
	$this->db->from('estadorequerimiento');
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
		$query=$this->db->order_by("idestadorequerimiento")->get('estadorequerimiento');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idestadorequerimiento")->get('estadorequerimiento');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$estadorequerimiento = $this->db->select("idestadorequerimiento")->order_by("idestadorequerimiento")->get('estadorequerimiento')->result_array();
		$arr=array("idestadorequerimiento"=>$id);
		$clave=array_search($arr,$estadorequerimiento);
	   if(array_key_exists($clave+1,$estadorequerimiento))
		 {

 		$estadorequerimiento = $this->db->query('select * from estadorequerimiento where idestadorequerimiento="'. $estadorequerimiento[$clave+1]["idestadorequerimiento"].'"');
		 }else{

 		$estadorequerimiento = $this->db->query('select * from estadorequerimiento where idestadorequerimiento="'. $id.'"');
		 }
		 	
 		return $estadorequerimiento;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$estadorequerimiento = $this->db->select("idestadorequerimiento")->order_by("idestadorequerimiento")->get('estadorequerimiento')->result_array();
		$arr=array("idestadorequerimiento"=>$id);
		$clave=array_search($arr,$estadorequerimiento);
	   if(array_key_exists($clave-1,$estadorequerimiento))
		 {

 		$estadorequerimiento = $this->db->query('select * from estadorequerimiento where idestadorequerimiento="'. $estadorequerimiento[$clave-1]["idestadorequerimiento"].'"');
		 }else{

 		$estadorequerimiento = $this->db->query('select * from estadorequerimiento where idestadorequerimiento="'. $id.'"');
		 }
		 	
 		return $estadorequerimiento;
 	}



	function lista_estadorequerimientoes_con_inscripciones(){
		 $this->db->select('estadorequerimiento.*');
		 $this->db->from('estadorequerimiento,evento');
		 $this->db->where('evento.idestadorequerimiento=estadorequerimiento.idestadorequerimiento and evento.idevento_estado=2');
		 $estadorequerimiento= $this->db->get();
		 return $estadorequerimiento;
	}




}
