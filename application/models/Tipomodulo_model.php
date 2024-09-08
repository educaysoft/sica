<?php
class Tipomodulo_model extends CI_model {

	function lista_tipomodulos(){
		 $tipomodulo= $this->db->get('tipomodulo0');
		 return $tipomodulo;
	}

	function lista_tipomodulosA(){
		 $tipomodulo= $this->db->get('tipomodulo1');
		 return $tipomodulo;
	}




 	function tipomodulo( $id){
 		$tipomodulo = $this->db->query('select * from tipomodulo0 where idtipomodulo="'. $id.'"');
 		return $tipomodulo;
 	}

 	function save($array)
 	{
		$condition = "idtipomodulo =" . "'" . $array['idtipomodulo'] . "'";
		$this->db->select('*');
		$this->db->from('tipomodulo');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
		   $this->db->insert("tipomodulo", $array);
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
 		$this->db->where('idtipomodulo',$id);
 		$this->db->update('tipomodulo',$array_item);
	}
 

 	 function delete($id)
	{
 		$this->db->where('idtipomodulo',$id);
		$this->db->delete('tipomodulo');
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
		$this->db->from('tipomodulo0');
 		$this->db->where('idtipomodulo',$id);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() != 0) {
	 	  	$this->db->where('idtipomodulo',$id);
			$this->db->update('tipomodulo', array('eliminado'=>1));
			$result=true;
        }else{
            $result=false;
        }
		return $result;
 	}






	function elprimero()
	{
		$query=$this->db->order_by("idtipomodulo")->get('tipomodulo');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idtipomodulo")->get('tipomodulo');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$tipomodulo = $this->db->select("idtipomodulo")->order_by("idtipomodulo")->get('tipomodulo')->result_array();
		$arr=array("idtipomodulo"=>$id);
		$clave=array_search($arr,$tipomodulo);
	   if(array_key_exists($clave+1,$tipomodulo))
		 {

 		$tipomodulo = $this->db->query('select * from tipomodulo where idtipomodulo="'. $tipomodulo[$clave+1]["idtipomodulo"].'"');
		 }else{

 		$tipomodulo = $this->db->query('select * from tipomodulo where idtipomodulo="'. $id.'"');
		 }
		 	
 		return $tipomodulo;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$tipomodulo = $this->db->select("idtipomodulo")->order_by("idtipomodulo")->get('tipomodulo')->result_array();
		$arr=array("idtipomodulo"=>$id);
		$clave=array_search($arr,$tipomodulo);
	   if(array_key_exists($clave-1,$tipomodulo))
		 {

 		$tipomodulo = $this->db->query('select * from tipomodulo where idtipomodulo="'. $tipomodulo[$clave-1]["idtipomodulo"].'"');
		 }else{

 		$tipomodulo = $this->db->query('select * from tipomodulo where idtipomodulo="'. $id.'"');
		 }
		 	
 		return $tipomodulo;
 	}








}
