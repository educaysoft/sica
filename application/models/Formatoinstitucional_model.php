<?php
class Formatoinstitucional_model extends CI_model {

	function lista_formatoinstitucionals(){
		 $formatoinstitucional= $this->db->get('formatoinstitucional');
		 return $formatoinstitucional;
	}


	function lista_formatoinstitucionalsA(){

$this->db->order_by('idproceso', 'asc');
$this->db->order_by('orden', 'asc');

$query = $this->db->get('formatoinstitucional1');



		 return $query;
	}




 	function formatoinstitucional( $id){
 		$formatoinstitucional = $this->db->query('select * from formatoinstitucional where idformatoinstitucional="'. $id.'"');
 		return $formatoinstitucional;
 	}

 	function formatoinstitucionalA( $id){
 		$formatoinstitucional = $this->db->query('select * from formatoinstitucional1 where idinstitucion="'. $id.'" order by idproceso,orden');
 		return $formatoinstitucional;
 	}




 	function save($array)
 	{
		$this->db->insert("formatoinstitucional", $array);
		   if( $this->db->affected_rows()>0){
			    return true;
		   }else{
			    return false;
		   }

 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idformatoinstitucional',$id);
 		$this->db->update('formatoinstitucional',$array_item);
	}


 	public function delete($id)
	{
 		$this->db->where('idformatoinstitucional',$id);
		$this->db->delete('formatoinstitucional');
    if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idformatoinstitucional")->get('formatoinstitucional');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idformatoinstitucional")->get('formatoinstitucional');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$formatoinstitucional = $this->db->select("idformatoinstitucional")->order_by("idformatoinstitucional")->get('formatoinstitucional')->result_array();
		$arr=array("idformatoinstitucional"=>$id);
		$clave=array_search($arr,$formatoinstitucional);
	   if(array_key_exists($clave+1,$formatoinstitucional))
		 {

 		$formatoinstitucional = $this->db->query('select * from formatoinstitucional where idformatoinstitucional="'. $formatoinstitucional[$clave+1]["idformatoinstitucional"].'"');
		 }else{

 		$formatoinstitucional = $this->db->query('select * from formatoinstitucional where idformatoinstitucional="'. $id.'"');
		 }
		 	
 		return $formatoinstitucional;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$formatoinstitucional = $this->db->select("idformatoinstitucional")->order_by("idformatoinstitucional")->get('formatoinstitucional')->result_array();
		$arr=array("idformatoinstitucional"=>$id);
		$clave=array_search($arr,$formatoinstitucional);
	   if(array_key_exists($clave-1,$formatoinstitucional))
		 {

 		$formatoinstitucional = $this->db->query('select * from formatoinstitucional where idformatoinstitucional="'. $formatoinstitucional[$clave-1]["idformatoinstitucional"].'"');
		 }else{

 		$formatoinstitucional = $this->db->query('select * from formatoinstitucional where idformatoinstitucional="'. $id.'"');
		 }
		 	
 		return $formatoinstitucional;
 	}






 

}
