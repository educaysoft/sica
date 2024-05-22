<?php
class Afinidadtitulo_model extends CI_model {

	function lista_afinidadtitulos(){
		 $afinidadtitulo= $this->db->get('afinidadtitulo0');
		 return $afinidadtitulo;
	}

	function lista_afinidadtitulosA(){
		 $afinidadtitulo= $this->db->get('afinidadtitulo1');
		 return $afinidadtitulo;
	}




 	function afinidadtitulo( $id){
 		$afinidadtitulo = $this->db->query('select * from afinidadtitulo0 where idafinidadtitulo="'. $id.'"');
 		return $afinidadtitulo;
 	}

 	function save($array)
 	{
		$condition = "idafinidadtitulo =" . "'" . $array['idafinidadtitulo'] . "'";
		$this->db->select('*');
		$this->db->from('afinidadtitulo');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
		   $this->db->insert("afinidadtitulo", $array);
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
 		$this->db->where('idafinidadtitulo',$id);
 		$this->db->update('afinidadtitulo',$array_item);
	}
 

 	 function delete($id)
	{
 		$this->db->where('idafinidadtitulo',$id);
		$this->db->delete('afinidadtitulo');
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
		$this->db->from('afinidadtitulo0');
 		$this->db->where('idafinidadtitulo',$id);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() != 0) {
	 	  	$this->db->where('idafinidadtitulo',$id);
			$this->db->update('afinidadtitulo', array('eliminado'=>1));
			$result=true;
        }else{
            $result=false;
        }
		return $result;
 	}






	function elprimero()
	{
		$query=$this->db->order_by("idafinidadtitulo")->get('afinidadtitulo');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idafinidadtitulo")->get('afinidadtitulo');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$afinidadtitulo = $this->db->select("idafinidadtitulo")->order_by("idafinidadtitulo")->get('afinidadtitulo')->result_array();
		$arr=array("idafinidadtitulo"=>$id);
		$clave=array_search($arr,$afinidadtitulo);
	   if(array_key_exists($clave+1,$afinidadtitulo))
		 {

 		$afinidadtitulo = $this->db->query('select * from afinidadtitulo where idafinidadtitulo="'. $afinidadtitulo[$clave+1]["idafinidadtitulo"].'"');
		 }else{

 		$afinidadtitulo = $this->db->query('select * from afinidadtitulo where idafinidadtitulo="'. $id.'"');
		 }
		 	
 		return $afinidadtitulo;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$afinidadtitulo = $this->db->select("idafinidadtitulo")->order_by("idafinidadtitulo")->get('afinidadtitulo')->result_array();
		$arr=array("idafinidadtitulo"=>$id);
		$clave=array_search($arr,$afinidadtitulo);
	   if(array_key_exists($clave-1,$afinidadtitulo))
		 {

 		$afinidadtitulo = $this->db->query('select * from afinidadtitulo where idafinidadtitulo="'. $afinidadtitulo[$clave-1]["idafinidadtitulo"].'"');
		 }else{

 		$afinidadtitulo = $this->db->query('select * from afinidadtitulo where idafinidadtitulo="'. $id.'"');
		 }
		 	
 		return $afinidadtitulo;
 	}








}
