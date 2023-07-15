<?php
class Tipometodologiasasignatura_model extends CI_model {

	function lista_tipometodologiasasignaturas(){
		 $tipometodologiasasignatura= $this->db->get('tipometodologiasasignatura');
		 return $tipometodologiasasignatura;
	}

 	function tipometodologiasasignatura( $id){
 		$tipometodologiasasignatura = $this->db->query('select * from tipometodologiasasignatura where idtipometodologiasasignatura="'. $id.'"');
 		return $tipometodologiasasignatura;
 	}

 	function save($array)
 	{
		$this->db->insert("tipometodologiasasignatura", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idtipometodologiasasignatura',$id);
 		$this->db->update('tipometodologiasasignatura',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idtipometodologiasasignatura',$id);
		$this->db->delete('tipometodologiasasignatura');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idtipometodologiasasignatura")->get('tipometodologiasasignatura');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idtipometodologiasasignatura")->get('tipometodologiasasignatura');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$tipometodologiasasignatura = $this->db->select("idtipometodologiasasignatura")->order_by("idtipometodologiasasignatura")->get('tipometodologiasasignatura')->result_array();
		$arr=array("idtipometodologiasasignatura"=>$id);
		$clave=array_search($arr,$tipometodologiasasignatura);
	   if(array_key_exists($clave+1,$tipometodologiasasignatura))
		 {

 		$tipometodologiasasignatura = $this->db->query('select * from tipometodologiasasignatura where idtipometodologiasasignatura="'. $tipometodologiasasignatura[$clave+1]["idtipometodologiasasignatura"].'"');
		 }else{

 		$tipometodologiasasignatura = $this->db->query('select * from tipometodologiasasignatura where idtipometodologiasasignatura="'. $id.'"');
		 }
		 	
 		return $tipometodologiasasignatura;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$tipometodologiasasignatura = $this->db->select("idtipometodologiasasignatura")->order_by("idtipometodologiasasignatura")->get('tipometodologiasasignatura')->result_array();
		$arr=array("idtipometodologiasasignatura"=>$id);
		$clave=array_search($arr,$tipometodologiasasignatura);
	   if(array_key_exists($clave-1,$tipometodologiasasignatura))
		 {

 		$tipometodologiasasignatura = $this->db->query('select * from tipometodologiasasignatura where idtipometodologiasasignatura="'. $tipometodologiasasignatura[$clave-1]["idtipometodologiasasignatura"].'"');
		 }else{

 		$tipometodologiasasignatura = $this->db->query('select * from tipometodologiasasignatura where idtipometodologiasasignatura="'. $id.'"');
		 }
		 	
 		return $tipometodologiasasignatura;
 	}






}
