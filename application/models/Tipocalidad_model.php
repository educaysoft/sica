<?php
class Tipocalidad_model extends CI_model {

	function lista_tipocalidads(){
		 $tipocalidad= $this->db->get('tipocalidad0');
		 return $tipocalidad;
	}

	function lista_tipocalidadsA(){
		 $tipocalidad= $this->db->get('tipocalidad1');
		 return $tipocalidad;
	}




 	function tipocalidad( $id){
 		$tipocalidad = $this->db->query('select * from tipocalidad0 where idtipocalidad="'. $id.'"');
 		return $tipocalidad;
 	}

 	function save($array)
 	{
		$condition = "idtipocalidad =" . "'" . $array['idtipocalidad'] . "'";
		$this->db->select('*');
		$this->db->from('tipocalidad');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
		   $this->db->insert("tipocalidad", $array);
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
 		$this->db->where('idtipocalidad',$id);
 		$this->db->update('tipocalidad',$array_item);
	}
 

 	 function delete($id)
	{
 		$this->db->where('idtipocalidad',$id);
		$this->db->delete('tipocalidad');
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
		$this->db->from('tipocalidad0');
 		$this->db->where('idtipocalidad',$id);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() != 0) {
	 	  	$this->db->where('idtipocalidad',$id);
			$this->db->update('tipocalidad', array('eliminado'=>1));
			$result=true;
        }else{
            $result=false;
        }
		return $result;
 	}






	function elprimero()
	{
		$query=$this->db->order_by("idtipocalidad")->get('tipocalidad');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idtipocalidad")->get('tipocalidad');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$tipocalidad = $this->db->select("idtipocalidad")->order_by("idtipocalidad")->get('tipocalidad')->result_array();
		$arr=array("idtipocalidad"=>$id);
		$clave=array_search($arr,$tipocalidad);
	   if(array_key_exists($clave+1,$tipocalidad))
		 {

 		$tipocalidad = $this->db->query('select * from tipocalidad where idtipocalidad="'. $tipocalidad[$clave+1]["idtipocalidad"].'"');
		 }else{

 		$tipocalidad = $this->db->query('select * from tipocalidad where idtipocalidad="'. $id.'"');
		 }
		 	
 		return $tipocalidad;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$tipocalidad = $this->db->select("idtipocalidad")->order_by("idtipocalidad")->get('tipocalidad')->result_array();
		$arr=array("idtipocalidad"=>$id);
		$clave=array_search($arr,$tipocalidad);
	   if(array_key_exists($clave-1,$tipocalidad))
		 {

 		$tipocalidad = $this->db->query('select * from tipocalidad where idtipocalidad="'. $tipocalidad[$clave-1]["idtipocalidad"].'"');
		 }else{

 		$tipocalidad = $this->db->query('select * from tipocalidad where idtipocalidad="'. $id.'"');
		 }
		 	
 		return $tipocalidad;
 	}








}
