<?php
class Informacioncarrera_model extends CI_model {

	function lista_informacioncarreras(){
		 $informacioncarrera= $this->db->get('informacioncarrera');
		 return $informacioncarrera;
	}


	function lista_informacioncarrerasA(){

$this->db->order_by('solicitante', 'asc');

$query = $this->db->get('informacioncarrera1');



		 return $query;
	}




 	function informacioncarrera( $id){
 		$informacioncarrera = $this->db->query('select * from informacioncarrera where idinformacioncarrera="'. $id.'"');
 		return $informacioncarrera;
 	}

 	function informacioncarreraA( $id){
 		$informacioncarrera = $this->db->query('select * from informacioncarrera1 where iddepartamento="'. $id.'" order by solicitante');
 		return $informacioncarrera;
 	}




 	function save($array)
 	{
		$this->db->insert("informacioncarrera", $array);
		   if( $this->db->affected_rows()>0){
			    return true;
		   }else{
			    return false;
		   }

 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idinformacioncarrera',$id);
 		$this->db->update('informacioncarrera',$array_item);
	}


 	public function delete($id)
	{
 		$this->db->where('idinformacioncarrera',$id);
		$this->db->delete('informacioncarrera');
    if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idinformacioncarrera")->get('informacioncarrera');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idinformacioncarrera")->get('informacioncarrera');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$informacioncarrera = $this->db->select("idinformacioncarrera")->order_by("idinformacioncarrera")->get('informacioncarrera')->result_array();
		$arr=array("idinformacioncarrera"=>$id);
		$clave=array_search($arr,$informacioncarrera);
	   if(array_key_exists($clave+1,$informacioncarrera))
		 {

 		$informacioncarrera = $this->db->query('select * from informacioncarrera where idinformacioncarrera="'. $informacioncarrera[$clave+1]["idinformacioncarrera"].'"');
		 }else{

 		$informacioncarrera = $this->db->query('select * from informacioncarrera where idinformacioncarrera="'. $id.'"');
		 }
		 	
 		return $informacioncarrera;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$informacioncarrera = $this->db->select("idinformacioncarrera")->order_by("idinformacioncarrera")->get('informacioncarrera')->result_array();
		$arr=array("idinformacioncarrera"=>$id);
		$clave=array_search($arr,$informacioncarrera);
	   if(array_key_exists($clave-1,$informacioncarrera))
		 {

 		$informacioncarrera = $this->db->query('select * from informacioncarrera where idinformacioncarrera="'. $informacioncarrera[$clave-1]["idinformacioncarrera"].'"');
		 }else{

 		$informacioncarrera = $this->db->query('select * from informacioncarrera where idinformacioncarrera="'. $id.'"');
		 }
		 	
 		return $informacioncarrera;
 	}






 

}
