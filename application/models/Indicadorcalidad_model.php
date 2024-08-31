<?php
class Indicadorcalidad_model extends CI_model {

	function lista_indicadorcalidads(){
		 $indicadorcalidad= $this->db->get('indicadorcalidad0');
		 return $indicadorcalidad;
	}

	function lista_indicadorcalidadsA(){
		 $indicadorcalidad= $this->db->get('indicadorcalidad1');
		 return $indicadorcalidad;
	}




 	function indicadorcalidad( $id){
 		$indicadorcalidad = $this->db->query('select * from indicadorcalidad0 where idindicadorcalidad="'. $id.'"');
 		return $indicadorcalidad;
 	}

 	function save($array)
 	{
		$condition = "idindicadorcalidad =" . "'" . $array['idindicadorcalidad'] . "'";
		$this->db->select('*');
		$this->db->from('indicadorcalidad');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
		   $this->db->insert("indicadorcalidad", $array);
		   if( $this->db->affected_rows()>0){
			    return true;
		   }else{
			    return false;
		   }
	   }else{
		    return false;
		   }
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idindicadorcalidad',$id);
 		$this->db->update('indicadorcalidad',$array_item);
	}
 

 	 function delete($id)
	{
 		$this->db->where('idindicadorcalidad',$id);
		$this->db->delete('indicadorcalidad');
    	if($this->db->affected_rows()==1){
			$result=true;
        }else{
			$result=false;
    }
		return $result;
 	}



 	function quitar($id)
	{

        $this->db->select('*');
		$this->db->from('indicadorcalidad0');
 		$this->db->where('idindicadorcalidad',$id);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() != 0) {
	 	  	$this->db->where('idindicadorcalidad',$id);
			$this->db->update('indicadorcalidad', array('eliminado'=>1));
			$result=true;
        }else{
            $result=false;
        }
		return $result;
 	}






	function elprimero()
	{
		$query=$this->db->order_by("idindicadorcalidad")->get('indicadorcalidad');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idindicadorcalidad")->get('indicadorcalidad');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$indicadorcalidad = $this->db->select("idindicadorcalidad")->order_by("idindicadorcalidad")->get('indicadorcalidad')->result_array();
		$arr=array("idindicadorcalidad"=>$id);
		$clave=array_search($arr,$indicadorcalidad);
	   if(array_key_exists($clave+1,$indicadorcalidad))
		 {

 		$indicadorcalidad = $this->db->query('select * from indicadorcalidad where idindicadorcalidad="'. $indicadorcalidad[$clave+1]["idindicadorcalidad"].'"');
		 }else{

 		$indicadorcalidad = $this->db->query('select * from indicadorcalidad where idindicadorcalidad="'. $id.'"');
		 }
		 	
 		return $indicadorcalidad;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$indicadorcalidad = $this->db->select("idindicadorcalidad")->order_by("idindicadorcalidad")->get('indicadorcalidad')->result_array();
		$arr=array("idindicadorcalidad"=>$id);
		$clave=array_search($arr,$indicadorcalidad);
	   if(array_key_exists($clave-1,$indicadorcalidad))
		 {

 		$indicadorcalidad = $this->db->query('select * from indicadorcalidad where idindicadorcalidad="'. $indicadorcalidad[$clave-1]["idindicadorcalidad"].'"');
		 }else{

 		$indicadorcalidad = $this->db->query('select * from indicadorcalidad where idindicadorcalidad="'. $id.'"');
		 }
		 	
 		return $indicadorcalidad;
 	}








}
