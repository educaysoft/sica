<?php
class Calidadcarrera_model extends CI_model {

	function lista_calidadcarreras(){
		 $calidadcarrera= $this->db->get('calidadcarrera');
		 return $calidadcarrera;
	}


	function lista_calidadcarrerasA(){

$this->db->order_by('idcalidadcarrera', 'asc');
$this->db->order_by('codigo', 'asc');

$query = $this->db->get('calidadcarrera1');



		 return $query;
	}




 	function calidadcarrera( $id){
 		$calidadcarrera = $this->db->query('select * from calidadcarrera where idcalidadcarrera="'. $id.'"');
 		return $calidadcarrera;
 	}

 	function calidadcarreraA( $id){
 		$calidadcarrera = $this->db->query('select * from calidadcarrera1 where iddepartamento="'. $id.'" order by idcalidadcarrera,codigo');
 		return $calidadcarrera;
 	}




 	function save($array)
 	{
		$this->db->insert("calidadcarrera", $array);
		   if( $this->db->affected_rows()>0){
			    return true;
		   }else{
			    return false;
		   }

 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idcalidadcarrera',$id);
 		$this->db->update('calidadcarrera',$array_item);
	}


 	public function delete($id)
	{
 		$this->db->where('idcalidadcarrera',$id);
		$this->db->delete('calidadcarrera');
    if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idcalidadcarrera")->get('calidadcarrera');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idcalidadcarrera")->get('calidadcarrera');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$calidadcarrera = $this->db->select("idcalidadcarrera")->order_by("idcalidadcarrera")->get('calidadcarrera')->result_array();
		$arr=array("idcalidadcarrera"=>$id);
		$clave=array_search($arr,$calidadcarrera);
	   if(array_key_exists($clave+1,$calidadcarrera))
		 {

 		$calidadcarrera = $this->db->query('select * from calidadcarrera where idcalidadcarrera="'. $calidadcarrera[$clave+1]["idcalidadcarrera"].'"');
		 }else{

 		$calidadcarrera = $this->db->query('select * from calidadcarrera where idcalidadcarrera="'. $id.'"');
		 }
		 	
 		return $calidadcarrera;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$calidadcarrera = $this->db->select("idcalidadcarrera")->order_by("idcalidadcarrera")->get('calidadcarrera')->result_array();
		$arr=array("idcalidadcarrera"=>$id);
		$clave=array_search($arr,$calidadcarrera);
	   if(array_key_exists($clave-1,$calidadcarrera))
		 {

 		$calidadcarrera = $this->db->query('select * from calidadcarrera where idcalidadcarrera="'. $calidadcarrera[$clave-1]["idcalidadcarrera"].'"');
		 }else{

 		$calidadcarrera = $this->db->query('select * from calidadcarrera where idcalidadcarrera="'. $id.'"');
		 }
		 	
 		return $calidadcarrera;
 	}






 

}
