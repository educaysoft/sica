<?php
class Foto_model extends CI_model {

	function lista_fotoes(){
		 $foto= $this->db->get('foto');
		 return $foto;
	}

 	function foto( $id){
 		$foto = $this->db->query('select * from foto where idfoto="'. $id.'"');
 		return $foto;
 	}

 	function save($array)
 	{
		$this->db->insert("foto", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idfoto',$id);
 		$this->db->update('foto',$array_item);
	}


 	public function delete($id)
	{
 		$this->db->where('idfoto',$id);
		$this->db->delete('foto');
    if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idfoto")->get('foto');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idfoto")->get('foto');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$foto = $this->db->select("idfoto")->order_by("idfoto")->get('foto')->result_array();
		$arr=array("idfoto"=>$id);
		$clave=array_search($arr,$foto);
	   if(array_key_exists($clave+1,$foto))
		 {

 		$foto = $this->db->query('select * from foto where idfoto="'. $foto[$clave+1]["idfoto"].'"');
		 }else{

 		$foto = $this->db->query('select * from foto where idfoto="'. $id.'"');
		 }
		 	
 		return $foto;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$foto = $this->db->select("idfoto")->order_by("idfoto")->get('foto')->result_array();
		$arr=array("idfoto"=>$id);
		$clave=array_search($arr,$foto);
	   if(array_key_exists($clave-1,$foto))
		 {

 		$foto = $this->db->query('select * from foto where idfoto="'. $foto[$clave-1]["idfoto"].'"');
		 }else{

 		$foto = $this->db->query('select * from foto where idfoto="'. $id.'"');
		 }
		 	
 		return $foto;
 	}






 

}
