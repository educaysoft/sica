<?php
class Plantillacorreo_model extends CI_model {

	function lista_plantillacorreos(){
		 $plantillacorreo= $this->db->get('plantillacorreo');
		 return $plantillacorreo;
	}

	function lista_plantillacorreos1(){
		 $plantillacorreo= $this->db->get('plantillacorreo1');
		 return $plantillacorreo;
	}





 	function plantillacorreo( $id){
 		$plantillacorreo = $this->db->query('select * from plantillacorreo where idplantillacorreo="'. $id.'"');
 		return $plantillacorreo;
 	}

 	function save($array)
 	{
		$this->db->insert("plantillacorreo", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idplantillacorreo',$id);
 		$this->db->update('plantillacorreo',$array_item);
	}


 	public function delete($id)
	{
 		$this->db->where('idplantillacorreo',$id);
		$this->db->delete('plantillacorreo');
    if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idplantillacorreo")->get('plantillacorreo');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idplantillacorreo")->get('plantillacorreo');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$plantillacorreo = $this->db->select("idplantillacorreo")->order_by("idplantillacorreo")->get('plantillacorreo')->result_array();
		$arr=array("idplantillacorreo"=>$id);
		$clave=array_search($arr,$plantillacorreo);
	   if(array_key_exists($clave+1,$plantillacorreo))
		 {

 		$plantillacorreo = $this->db->query('select * from plantillacorreo where idplantillacorreo="'. $plantillacorreo[$clave+1]["idplantillacorreo"].'"');
		 }else{

 		$plantillacorreo = $this->db->query('select * from plantillacorreo where idplantillacorreo="'. $id.'"');
		 }
		 	
 		return $plantillacorreo;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$plantillacorreo = $this->db->select("idplantillacorreo")->order_by("idplantillacorreo")->get('plantillacorreo')->result_array();
		$arr=array("idplantillacorreo"=>$id);
		$clave=array_search($arr,$plantillacorreo);
	   if(array_key_exists($clave-1,$plantillacorreo))
		 {

 		$plantillacorreo = $this->db->query('select * from plantillacorreo where idplantillacorreo="'. $plantillacorreo[$clave-1]["idplantillacorreo"].'"');
		 }else{

 		$plantillacorreo = $this->db->query('select * from plantillacorreo where idplantillacorreo="'. $id.'"');
		 }
		 	
 		return $plantillacorreo;
 	}






 

}
