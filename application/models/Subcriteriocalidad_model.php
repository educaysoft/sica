<?php
class Subcriteriocalidad_model extends CI_model {

	function lista_subcriteriocalidads(){
		 $subcriteriocalidad= $this->db->get('subcriteriocalidad0');
		 return $subcriteriocalidad;
	}

	function lista_subcriteriocalidadsA(){
		 $subcriteriocalidad= $this->db->get('subcriteriocalidad1');
		 return $subcriteriocalidad;
	}




 	function subcriteriocalidad( $id){
 		$subcriteriocalidad = $this->db->query('select * from subcriteriocalidad0 where idsubcriteriocalidad="'. $id.'"');
 		return $subcriteriocalidad;
 	}

 	function save($array)
 	{
		$condition = "idsubcriteriocalidad =" . "'" . $array['idsubcriteriocalidad'] . "'";
		$this->db->select('*');
		$this->db->from('subcriteriocalidad');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
		   $this->db->insert("subcriteriocalidad", $array);
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
 		$this->db->where('idsubcriteriocalidad',$id);
 		$this->db->update('subcriteriocalidad',$array_item);
	}
 

 	 function delete($id)
	{
 		$this->db->where('idsubcriteriocalidad',$id);
		$this->db->delete('subcriteriocalidad');
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
		$this->db->from('subcriteriocalidad0');
 		$this->db->where('idsubcriteriocalidad',$id);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() != 0) {
	 	  	$this->db->where('idsubcriteriocalidad',$id);
			$this->db->update('subcriteriocalidad', array('eliminado'=>1));
			$result=true;
        }else{
            $result=false;
        }
		return $result;
 	}






	function elprimero()
	{
		$query=$this->db->order_by("idsubcriteriocalidad")->get('subcriteriocalidad');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idsubcriteriocalidad")->get('subcriteriocalidad');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$subcriteriocalidad = $this->db->select("idsubcriteriocalidad")->order_by("idsubcriteriocalidad")->get('subcriteriocalidad')->result_array();
		$arr=array("idsubcriteriocalidad"=>$id);
		$clave=array_search($arr,$subcriteriocalidad);
	   if(array_key_exists($clave+1,$subcriteriocalidad))
		 {

 		$subcriteriocalidad = $this->db->query('select * from subcriteriocalidad where idsubcriteriocalidad="'. $subcriteriocalidad[$clave+1]["idsubcriteriocalidad"].'"');
		 }else{

 		$subcriteriocalidad = $this->db->query('select * from subcriteriocalidad where idsubcriteriocalidad="'. $id.'"');
		 }
		 	
 		return $subcriteriocalidad;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$subcriteriocalidad = $this->db->select("idsubcriteriocalidad")->order_by("idsubcriteriocalidad")->get('subcriteriocalidad')->result_array();
		$arr=array("idsubcriteriocalidad"=>$id);
		$clave=array_search($arr,$subcriteriocalidad);
	   if(array_key_exists($clave-1,$subcriteriocalidad))
		 {

 		$subcriteriocalidad = $this->db->query('select * from subcriteriocalidad where idsubcriteriocalidad="'. $subcriteriocalidad[$clave-1]["idsubcriteriocalidad"].'"');
		 }else{

 		$subcriteriocalidad = $this->db->query('select * from subcriteriocalidad where idsubcriteriocalidad="'. $id.'"');
		 }
		 	
 		return $subcriteriocalidad;
 	}








}
