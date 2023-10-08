<?php
class Telefono_estado_model extends CI_model {

	function lista_telefono_estado(){
		 $telefono_estado= $this->db->get('telefono_estado');
		 return $telefono_estado;
	}

 	function telefono_estado( $id){
 		$telefono_estado = $this->db->query('select * from telefono_estado where idtelefono_estado="'. $id.'"');
 		return $telefono_estado;
 	}

 	function save($array)
 	{
		$this->db->insert("telefono_estado", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idtelefono_estado',$id);
 		$this->db->update('telefono_estado',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idtelefono_estado',$id);
		$this->db->delete('telefono_estado');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idtelefono_estado")->get('telefono_estado');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idtelefono_estado")->get('telefono_estado');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$telefono_estado = $this->db->select("idtelefono_estado")->order_by("idtelefono_estado")->get('telefono_estado')->result_array();
		$arr=array("idtelefono_estado"=>$id);
		$clave=array_search($arr,$telefono_estado);
	   if(array_key_exists($clave+1,$telefono_estado))
		 {

 		$telefono_estado = $this->db->query('select * from telefono_estado where idtelefono_estado="'. $telefono_estado[$clave+1]["idtelefono_estado"].'"');
		 }else{

 		$telefono_estado = $this->db->query('select * from telefono_estado where idtelefono_estado="'. $id.'"');
		 }
		 	
 		return $telefono_estado;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$telefono_estado = $this->db->select("idtelefono_estado")->order_by("idtelefono_estado")->get('telefono_estado')->result_array();
		$arr=array("idtelefono_estado"=>$id);
		$clave=array_search($arr,$telefono_estado);
	   if(array_key_exists($clave-1,$telefono_estado))
		 {

 		$telefono_estado = $this->db->query('select * from telefono_estado where idtelefono_estado="'. $telefono_estado[$clave-1]["idtelefono_estado"].'"');
		 }else{

 		$telefono_estado = $this->db->query('select * from telefono_estado where idtelefono_estado="'. $id.'"');
		 }
		 	
 		return $telefono_estado;
 	}






}
