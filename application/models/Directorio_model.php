<?php
class Directorio_model extends CI_model {

	function lista_directorios(){
		 $directorio= $this->db->get('directorio');
		 return $directorio;
	}

	function lista_directoriosxordenador($idordenador){
		 $this->db->where(array('idordenador'=>$idordenador));
		 $directorio= $this->db->get('directorio');
		 return $directorio;
	}




	function lista_directoriosA(){
		 $directorio= $this->db->get('directorio1');
		 return $directorio;
	}




public function get_directorio($id){
	$condition = "iddirectorio =" .  $id ;
	$this->db->select('*');
	$this->db->from('directorio');
	$this->db->where($condition);
	$this->db->limit(1);
	$query = $this->db->get();

	if ($query->num_rows() == 1) {
		return $query->result();
	} else {
		return false;
	}

}



 	function directorio( $id){
 		$directorio = $this->db->query('select * from directorio where iddirectorio="'. $id.'"');
 		return $directorio;
 	}

 	function save($array)
 	{
		$this->db->insert("directorio", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('iddirectorio',$id);
 		$this->db->update('directorio',$array_item);
	}


 	public function delete($id)
	{
 		$this->db->where('iddirectorio',$id);
		$this->db->delete('directorio');
    if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("iddirectorio")->get('directorio');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("iddirectorio")->get('directorio');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$directorio = $this->db->select("iddirectorio")->order_by("iddirectorio")->get('directorio')->result_array();
		$arr=array("iddirectorio"=>$id);
		$clave=array_search($arr,$directorio);
	   if(array_key_exists($clave+1,$directorio))
		 {

 		$directorio = $this->db->query('select * from directorio where iddirectorio="'. $directorio[$clave+1]["iddirectorio"].'"');
		 }else{

 		$directorio = $this->db->query('select * from directorio where iddirectorio="'. $id.'"');
		 }
		 	
 		return $directorio;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$directorio = $this->db->select("iddirectorio")->order_by("iddirectorio")->get('directorio')->result_array();
		$arr=array("iddirectorio"=>$id);
		$clave=array_search($arr,$directorio);
	   if(array_key_exists($clave-1,$directorio))
		 {

 		$directorio = $this->db->query('select * from directorio where iddirectorio="'. $directorio[$clave-1]["iddirectorio"].'"');
		 }else{

 		$directorio = $this->db->query('select * from directorio where iddirectorio="'. $id.'"');
		 }
		 	
 		return $directorio;
 	}






 

}
