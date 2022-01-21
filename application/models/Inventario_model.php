<?php
class Inventario_model extends CI_model {

	function lista_inventario(){
		 $inventario= $this->db->get('inventario');
		 return $inventario;
	}


	function lista_inventarioesA(){
		 $inventario= $this->db->get('inventario1');
		 return $inventario;
	}



 	function inventario( $id){
 		$inventario = $this->db->query('select * from inventario where idinventario="'. $id.'"');
 		return $inventario;
 	}

 	function save($array)
 	{
		$this->db->insert("inventario", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idinventario',$id);
 		$this->db->update('inventario',$array_item);
	}



 	public function delete($id)
	{
 		$this->db->where('idinventario',$id);
		$this->db->delete('inventario');
    if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idinventario")->get('inventario');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idinventario")->get('inventario');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$inventario = $this->db->select("idinventario")->order_by("idinventario")->get('inventario')->result_array();
		$arr=array("idinventario"=>$id);
		$clave=array_search($arr,$inventario);
	   if(array_key_exists($clave+1,$inventario))
		 {

 		$inventario = $this->db->query('select * from inventario where idinventario="'. $inventario[$clave+1]["idinventario"].'"');
		 }else{

 		$inventario = $this->db->query('select * from inventario where idinventario="'. $id.'"');
		 }
		 	
 		return $inventario;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$inventario = $this->db->select("idinventario")->order_by("idinventario")->get('inventario')->result_array();
		$arr=array("idinventario"=>$id);
		$clave=array_search($arr,$inventario);
	   if(array_key_exists($clave-1,$inventario))
		 {

 		$inventario = $this->db->query('select * from inventario where idinventario="'. $inventario[$clave-1]["idinventario"].'"');
		 }else{

 		$inventario = $this->db->query('select * from inventario where idinventario="'. $id.'"');
		 }
		 	
 		return $inventario;
 	}








}
