<?php
class Ascenso_model extends CI_model {

	function lista_ascensos(){
		 $ascenso= $this->db->get('ascenso');
		 return $ascenso;
	}


	function lista_ascensosA(){
		 $ascenso= $this->db->get('ascenso1');
		 return $ascenso;
	}



 	function ascenso( $id){
 		$ascenso = $this->db->query('select * from ascenso where idascenso="'. $id.'"');
 		return $ascenso;
 	}


 	function get_usuario($id){
 		//$ascenso = $this->db->query('select * from ascenso where idusuario="'. $id.'"');
 		$ascenso = $this->db->where('idusuario',$id)->get('ascenso');
 		return $ascenso->result();
 	}



 	function save($array)
 	{
		$this->db->insert("ascenso", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idascenso',$id);
 		$this->db->update('ascenso',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idascenso',$id);
		$this->db->delete('ascenso');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idascenso")->get('ascenso');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idascenso")->get('ascenso');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$ascenso = $this->db->select("idascenso")->order_by("idascenso")->get('ascenso')->result_array();
		$arr=array("idascenso"=>$id);
		$clave=array_search($arr,$ascenso);
	   if(array_key_exists($clave+1,$ascenso))
		 {

 		$ascenso = $this->db->query('select * from ascenso where idascenso="'. $ascenso[$clave+1]["idascenso"].'"');
		 }else{

 		$ascenso = $this->db->query('select * from ascenso where idascenso="'. $id.'"');
		 }
		 	
 		return $ascenso;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$ascenso = $this->db->select("idascenso")->order_by("idascenso")->get('ascenso')->result_array();
		$arr=array("idascenso"=>$id);
		$clave=array_search($arr,$ascenso);
	   if(array_key_exists($clave-1,$ascenso))
		 {

 		$ascenso = $this->db->query('select * from ascenso where idascenso="'. $ascenso[$clave-1]["idascenso"].'"');
		 }else{

 		$ascenso = $this->db->query('select * from ascenso where idascenso="'. $id.'"');
		 }
		 	
 		return $ascenso;
 	}






}
