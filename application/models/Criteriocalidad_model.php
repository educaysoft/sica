<?php
class Criteriocalidad_model extends CI_model {

	function lista_criteriocalidads(){
		 $criteriocalidad= $this->db->get('criteriocalidad0');
		 return $criteriocalidad;
	}

	function lista_criteriocalidadsA(){
		 $criteriocalidad= $this->db->get('criteriocalidad1');
		 return $criteriocalidad;
	}




 	function criteriocalidad( $id){
 		$criteriocalidad = $this->db->query('select * from criteriocalidad0 where idcriteriocalidad="'. $id.'"');
 		return $criteriocalidad;
 	}

 	function save($array)
 	{
		$condition = "idcriteriocalidad =" . "'" . $array['idcriteriocalidad'] . "'";
		$this->db->select('*');
		$this->db->from('criteriocalidad');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
		   $this->db->insert("criteriocalidad", $array);
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
 		$this->db->where('idcriteriocalidad',$id);
 		$this->db->update('criteriocalidad',$array_item);
	}
 

 	 function delete($id)
	{
 		$this->db->where('idcriteriocalidad',$id);
		$this->db->delete('criteriocalidad');
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
		$this->db->from('criteriocalidad0');
 		$this->db->where('idcriteriocalidad',$id);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() != 0) {
	 	  	$this->db->where('idcriteriocalidad',$id);
			$this->db->update('criteriocalidad', array('eliminado'=>1));
			$result=true;
        }else{
            $result=false;
        }
		return $result;
 	}






	function elprimero()
	{
		$query=$this->db->order_by("idcriteriocalidad")->get('criteriocalidad');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idcriteriocalidad")->get('criteriocalidad');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$criteriocalidad = $this->db->select("idcriteriocalidad")->order_by("idcriteriocalidad")->get('criteriocalidad')->result_array();
		$arr=array("idcriteriocalidad"=>$id);
		$clave=array_search($arr,$criteriocalidad);
	   if(array_key_exists($clave+1,$criteriocalidad))
		 {

 		$criteriocalidad = $this->db->query('select * from criteriocalidad where idcriteriocalidad="'. $criteriocalidad[$clave+1]["idcriteriocalidad"].'"');
		 }else{

 		$criteriocalidad = $this->db->query('select * from criteriocalidad where idcriteriocalidad="'. $id.'"');
		 }
		 	
 		return $criteriocalidad;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$criteriocalidad = $this->db->select("idcriteriocalidad")->order_by("idcriteriocalidad")->get('criteriocalidad')->result_array();
		$arr=array("idcriteriocalidad"=>$id);
		$clave=array_search($arr,$criteriocalidad);
	   if(array_key_exists($clave-1,$criteriocalidad))
		 {

 		$criteriocalidad = $this->db->query('select * from criteriocalidad where idcriteriocalidad="'. $criteriocalidad[$clave-1]["idcriteriocalidad"].'"');
		 }else{

 		$criteriocalidad = $this->db->query('select * from criteriocalidad where idcriteriocalidad="'. $id.'"');
		 }
		 	
 		return $criteriocalidad;
 	}








}
