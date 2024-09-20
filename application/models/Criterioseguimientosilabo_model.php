<?php
class Criterioseguimientosilabo_model extends CI_model {

	function lista_criterioseguimientosilabos(){
		 $criterioseguimientosilabo= $this->db->get('criterioseguimientosilabo0');
		 return $criterioseguimientosilabo;
	}

	function lista_criterioseguimientosilabosA(){
		 $criterioseguimientosilabo= $this->db->get('criterioseguimientosilabo1');
		 return $criterioseguimientosilabo;
	}




 	function criterioseguimientosilabo( $id){
 		$criterioseguimientosilabo = $this->db->query('select * from criterioseguimientosilabo0 where idcriterioseguimientosilabo="'. $id.'"');
 		return $criterioseguimientosilabo;
 	}

 	function save($array)
 	{
		$condition = "idcriterioseguimientosilabo =" . "'" . $array['idcriterioseguimientosilabo'] . "'";
		$this->db->select('*');
		$this->db->from('criterioseguimientosilabo');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
		   $this->db->insert("criterioseguimientosilabo", $array);
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
 		$this->db->where('idcriterioseguimientosilabo',$id);
 		$this->db->update('criterioseguimientosilabo',$array_item);
	}
 

 	 function delete($id)
	{
 		$this->db->where('idcriterioseguimientosilabo',$id);
		$this->db->delete('criterioseguimientosilabo');
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
		$this->db->from('criterioseguimientosilabo0');
 		$this->db->where('idcriterioseguimientosilabo',$id);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() != 0) {
	 	  	$this->db->where('idcriterioseguimientosilabo',$id);
			$this->db->update('criterioseguimientosilabo', array('eliminado'=>1));
			$result=true;
        }else{
            $result=false;
        }
		return $result;
 	}






	function elprimero()
	{
		$query=$this->db->order_by("idcriterioseguimientosilabo")->get('criterioseguimientosilabo');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idcriterioseguimientosilabo")->get('criterioseguimientosilabo');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$criterioseguimientosilabo = $this->db->select("idcriterioseguimientosilabo")->order_by("idcriterioseguimientosilabo")->get('criterioseguimientosilabo')->result_array();
		$arr=array("idcriterioseguimientosilabo"=>$id);
		$clave=array_search($arr,$criterioseguimientosilabo);
	   if(array_key_exists($clave+1,$criterioseguimientosilabo))
		 {

 		$criterioseguimientosilabo = $this->db->query('select * from criterioseguimientosilabo where idcriterioseguimientosilabo="'. $criterioseguimientosilabo[$clave+1]["idcriterioseguimientosilabo"].'"');
		 }else{

 		$criterioseguimientosilabo = $this->db->query('select * from criterioseguimientosilabo where idcriterioseguimientosilabo="'. $id.'"');
		 }
		 	
 		return $criterioseguimientosilabo;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$criterioseguimientosilabo = $this->db->select("idcriterioseguimientosilabo")->order_by("idcriterioseguimientosilabo")->get('criterioseguimientosilabo')->result_array();
		$arr=array("idcriterioseguimientosilabo"=>$id);
		$clave=array_search($arr,$criterioseguimientosilabo);
	   if(array_key_exists($clave-1,$criterioseguimientosilabo))
		 {

 		$criterioseguimientosilabo = $this->db->query('select * from criterioseguimientosilabo where idcriterioseguimientosilabo="'. $criterioseguimientosilabo[$clave-1]["idcriterioseguimientosilabo"].'"');
		 }else{

 		$criterioseguimientosilabo = $this->db->query('select * from criterioseguimientosilabo where idcriterioseguimientosilabo="'. $id.'"');
		 }
		 	
 		return $criterioseguimientosilabo;
 	}








}
