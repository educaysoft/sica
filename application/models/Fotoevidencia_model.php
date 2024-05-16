<?php
class Fotoevidencia_model extends CI_model {

	function lista_fotoevidencias(){
		 $fotoevidencia= $this->db->get('fotoevidencia');
		 return $fotoevidencia;
	}


	function lista_fotoevidenciasA(){
		 $fotoevidencia= $this->db->get('fotoevidencia1');
		 return $fotoevidencia;
	}




 	function fotoevidencia( $id){
 		$fotoevidencia = $this->db->query('select * from fotoevidencia where idfotoevidencia="'. $id.'"');
 		return $fotoevidencia;
 	}

 	function fotoevidenciaA( $id){
 		$fotoevidencia = $this->db->query('select * from fotoevidencia1 where idinstitucion="'. $id.'"');
 		return $fotoevidencia;
 	}




 	function save($array)
 	{
		$this->db->insert("fotoevidencia", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idfotoevidencia',$id);
 		$this->db->update('fotoevidencia',$array_item);
	}


 	public function delete($id)
	{
 		$this->db->where('idfotoevidencia',$id);
		$this->db->delete('fotoevidencia');
    if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idfotoevidencia")->get('fotoevidencia');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idfotoevidencia")->get('fotoevidencia');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$fotoevidencia = $this->db->select("idfotoevidencia")->order_by("idfotoevidencia")->get('fotoevidencia')->result_array();
		$arr=array("idfotoevidencia"=>$id);
		$clave=array_search($arr,$fotoevidencia);
	   if(array_key_exists($clave+1,$fotoevidencia))
		 {

 		$fotoevidencia = $this->db->query('select * from fotoevidencia where idfotoevidencia="'. $fotoevidencia[$clave+1]["idfotoevidencia"].'"');
		 }else{

 		$fotoevidencia = $this->db->query('select * from fotoevidencia where idfotoevidencia="'. $id.'"');
		 }
		 	
 		return $fotoevidencia;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$fotoevidencia = $this->db->select("idfotoevidencia")->order_by("idfotoevidencia")->get('fotoevidencia')->result_array();
		$arr=array("idfotoevidencia"=>$id);
		$clave=array_search($arr,$fotoevidencia);
	   if(array_key_exists($clave-1,$fotoevidencia))
		 {

 		$fotoevidencia = $this->db->query('select * from fotoevidencia where idfotoevidencia="'. $fotoevidencia[$clave-1]["idfotoevidencia"].'"');
		 }else{

 		$fotoevidencia = $this->db->query('select * from fotoevidencia where idfotoevidencia="'. $id.'"');
		 }
		 	
 		return $fotoevidencia;
 	}






 

}
