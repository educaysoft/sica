<?php
class Uniforme_model extends CI_model {

	function lista_uniformees(){
		 $uniforme= $this->db->get('uniforme');
		 return $uniforme;
	}

	function lista_uniformeesA(){
		 $uniforme= $this->db->get('uniforme1');
		 return $uniforme;
	}




 	function uniforme( $id){
 		$uniforme = $this->db->query('select * from uniforme where iduniforme="'. $id.'"');
 		return $uniforme;
 	}

 	function save($array)
 	{
		$this->db->insert("uniforme", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('iduniforme',$id);
 		$this->db->update('uniforme',$array_item);
	}



 	public function delete($id)
	{
 		$this->db->where('iduniforme',$id);
		$this->db->delete('uniforme');
    if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("iduniforme")->get('uniforme');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("iduniforme")->get('uniforme');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$uniforme = $this->db->select("iduniforme")->order_by("iduniforme")->get('uniforme')->result_array();
		$arr=array("iduniforme"=>$id);
		$clave=array_search($arr,$uniforme);
	   if(array_key_exists($clave+1,$uniforme))
		 {

 		$uniforme = $this->db->query('select * from uniforme where iduniforme="'. $uniforme[$clave+1]["iduniforme"].'"');
		 }else{

 		$uniforme = $this->db->query('select * from uniforme where iduniforme="'. $id.'"');
		 }
		 	
 		return $uniforme;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$uniforme = $this->db->select("iduniforme")->order_by("iduniforme")->get('uniforme')->result_array();
		$arr=array("iduniforme"=>$id);
		$clave=array_search($arr,$uniforme);
	   if(array_key_exists($clave-1,$uniforme))
		 {

 		$uniforme = $this->db->query('select * from uniforme where iduniforme="'. $uniforme[$clave-1]["iduniforme"].'"');
		 }else{

 		$uniforme = $this->db->query('select * from uniforme where iduniforme="'. $id.'"');
		 }
		 	
 		return $uniforme;
 	}








}
