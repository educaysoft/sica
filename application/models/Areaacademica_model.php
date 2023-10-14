<?php
class Areaacademica_model extends CI_model {

	function lista_areaacademicas(){
		 $areaacademica= $this->db->get('areaacademica');
		 return $areaacademica;
	}

	function lista_areaacademicasA($idareaacademica){
		if($idareaacademica>0){
 		$this->db->where('idareaacademica',$idareaacademica);
		}
		 $areaacademica= $this->db->get('areaacademica1');
		 return $areaacademica;
	}




 	function areaacademica( $id){
 		$areaacademica = $this->db->query('select * from areaacademica where idareaacademica="'. $id.'"');
 		return $areaacademica;
 	}

 	function save($array)
 	{
		$this->db->insert("areaacademica", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idareaacademica',$id);
 		$this->db->update('areaacademica',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idareaacademica',$id);
		$this->db->delete('areaacademica');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idareaacademica")->get('areaacademica');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idareaacademica")->get('areaacademica');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$areaacademica = $this->db->select("idareaacademica")->order_by("idareaacademica")->get('areaacademica')->result_array();
		$arr=array("idareaacademica"=>$id);
		$clave=array_search($arr,$areaacademica);
	   if(array_key_exists($clave+1,$areaacademica))
		 {

 		$areaacademica = $this->db->query('select * from areaacademica where idareaacademica="'. $areaacademica[$clave+1]["idareaacademica"].'"');
		 }else{

 		$areaacademica = $this->db->query('select * from areaacademica where idareaacademica="'. $id.'"');
		 }
		 	
 		return $areaacademica;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$areaacademica = $this->db->select("idareaacademica")->order_by("idareaacademica")->get('areaacademica')->result_array();
		$arr=array("idareaacademica"=>$id);
		$clave=array_search($arr,$areaacademica);
	   if(array_key_exists($clave-1,$areaacademica))
		 {

 		$areaacademica = $this->db->query('select * from areaacademica where idareaacademica="'. $areaacademica[$clave-1]["idareaacademica"].'"');
		 }else{

 		$areaacademica = $this->db->query('select * from areaacademica where idareaacademica="'. $id.'"');
		 }
		 	
 		return $areaacademica;
 	}








}
