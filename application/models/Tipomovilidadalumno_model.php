<?php
class Tipomovilidadalumno_model extends CI_model {

	function lista_tipomovilidadalumnos(){
		 $tipomovilidadalumno= $this->db->get('tipomovilidadalumno');
		 return $tipomovilidadalumno;
	}

 	function tipomovilidadalumno( $id){
 		$tipomovilidadalumno = $this->db->query('select * from tipomovilidadalumno where idtipomovilidadalumno="'. $id.'"');
 		return $tipomovilidadalumno;
 	}

 	function save($array)
 	{
		$this->db->insert("tipomovilidadalumno", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idtipomovilidadalumno',$id);
 		$this->db->update('tipomovilidadalumno',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idtipomovilidadalumno',$id);
		$this->db->delete('tipomovilidadalumno');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idtipomovilidadalumno")->get('tipomovilidadalumno');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idtipomovilidadalumno")->get('tipomovilidadalumno');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$tipomovilidadalumno = $this->db->select("idtipomovilidadalumno")->order_by("idtipomovilidadalumno")->get('tipomovilidadalumno')->result_array();
		$arr=array("idtipomovilidadalumno"=>$id);
		$clave=array_search($arr,$tipomovilidadalumno);
	   if(array_key_exists($clave+1,$tipomovilidadalumno))
		 {

 		$tipomovilidadalumno = $this->db->query('select * from tipomovilidadalumno where idtipomovilidadalumno="'. $tipomovilidadalumno[$clave+1]["idtipomovilidadalumno"].'"');
		 }else{

 		$tipomovilidadalumno = $this->db->query('select * from tipomovilidadalumno where idtipomovilidadalumno="'. $id.'"');
		 }
		 	
 		return $tipomovilidadalumno;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$tipomovilidadalumno = $this->db->select("idtipomovilidadalumno")->order_by("idtipomovilidadalumno")->get('tipomovilidadalumno')->result_array();
		$arr=array("idtipomovilidadalumno"=>$id);
		$clave=array_search($arr,$tipomovilidadalumno);
	   if(array_key_exists($clave-1,$tipomovilidadalumno))
		 {

 		$tipomovilidadalumno = $this->db->query('select * from tipomovilidadalumno where idtipomovilidadalumno="'. $tipomovilidadalumno[$clave-1]["idtipomovilidadalumno"].'"');
		 }else{

 		$tipomovilidadalumno = $this->db->query('select * from tipomovilidadalumno where idtipomovilidadalumno="'. $id.'"');
		 }
		 	
 		return $tipomovilidadalumno;
 	}






}
