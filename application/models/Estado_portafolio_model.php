<?php
class Estado_portafolio_model extends CI_model {

	function lista_estado_portafolio(){
		 $estado_portafolio= $this->db->get('estado_portafolio');
		 return $estado_portafolio;
	}

 	function estado_portafolio( $id){
 		$estado_portafolio = $this->db->query('select * from estado_portafolio where idestado_portafolio="'. $id.'"');
 		return $estado_portafolio;
 	}

 	function save($array)
 	{
		$this->db->insert("estado_portafolio", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idestado_portafolio',$id);
 		$this->db->update('estado_portafolio',$array_item);
	}


 	public function delete($id)
	{
 		$this->db->where('idestado_portafolio',$id);
		$this->db->delete('estado_portafolio');
    if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idestado_portafolio")->get('estado_portafolio');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idestado_portafolio")->get('estado_portafolio');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$estado_portafolio = $this->db->select("idestado_portafolio")->order_by("idestado_portafolio")->get('estado_portafolio')->result_array();
		$arr=array("idestado_portafolio"=>$id);
		$clave=array_search($arr,$estado_portafolio);
	   if(array_key_exists($clave+1,$estado_portafolio))
		 {

 		$estado_portafolio = $this->db->query('select * from estado_portafolio where idestado_portafolio="'. $estado_portafolio[$clave+1]["idestado_portafolio"].'"');
		 }else{

 		$estado_portafolio = $this->db->query('select * from estado_portafolio where idestado_portafolio="'. $id.'"');
		 }
		 	
 		return $estado_portafolio;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$estado_portafolio = $this->db->select("idestado_portafolio")->order_by("idestado_portafolio")->get('estado_portafolio')->result_array();
		$arr=array("idestado_portafolio"=>$id);
		$clave=array_search($arr,$estado_portafolio);
	   if(array_key_exists($clave-1,$estado_portafolio))
		 {

 		$estado_portafolio = $this->db->query('select * from estado_portafolio where idestado_portafolio="'. $estado_portafolio[$clave-1]["idestado_portafolio"].'"');
		 }else{

 		$estado_portafolio = $this->db->query('select * from estado_portafolio where idestado_portafolio="'. $id.'"');
		 }
		 	
 		return $estado_portafolio;
 	}






 

}
