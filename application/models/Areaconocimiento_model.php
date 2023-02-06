<?php
class Areaconocimiento_model extends CI_model {

	function lista_areaconocimientos(){
		 $areaconocimiento= $this->db->get('areaconocimiento');
		 return $areaconocimiento;
	}


	function lista_areaconocimientos1(){
		 $areaconocimiento= $this->db->get('areaconocimiento1');
		 return $areaconocimiento;
	}


 	function areaconocimiento( $id){
 		$areaconocimiento = $this->db->query('select * from areaconocimiento where idareaconocimiento="'. $id.'"');
 		return $areaconocimiento;
 	}

 	function save($array)
 	{
		$this->db->insert("areaconocimiento", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idareaconocimiento',$id);
 		$this->db->update('areaconocimiento',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idareaconocimiento',$id);
		$this->db->delete('areaconocimiento');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idareaconocimiento")->get('areaconocimiento');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idareaconocimiento")->get('areaconocimiento');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$areaconocimiento = $this->db->select("idareaconocimiento")->order_by("idareaconocimiento")->get('areaconocimiento')->result_array();
		$arr=array("idareaconocimiento"=>$id);
		$clave=array_search($arr,$areaconocimiento);
	   if(array_key_exists($clave+1,$areaconocimiento))
		 {

 		$areaconocimiento = $this->db->query('select * from areaconocimiento where idareaconocimiento="'. $areaconocimiento[$clave+1]["idareaconocimiento"].'"');
		 }else{

 		$areaconocimiento = $this->db->query('select * from areaconocimiento where idareaconocimiento="'. $id.'"');
		 }
		 	
 		return $areaconocimiento;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$areaconocimiento = $this->db->select("idareaconocimiento")->order_by("idareaconocimiento")->get('areaconocimiento')->result_array();
		$arr=array("idareaconocimiento"=>$id);
		$clave=array_search($arr,$areaconocimiento);
	   if(array_key_exists($clave-1,$areaconocimiento))
		 {

 		$areaconocimiento = $this->db->query('select * from areaconocimiento where idareaconocimiento="'. $areaconocimiento[$clave-1]["idareaconocimiento"].'"');
		 }else{

 		$areaconocimiento = $this->db->query('select * from areaconocimiento where idareaconocimiento="'. $id.'"');
		 }
		 	
 		return $areaconocimiento;
 	}






}
