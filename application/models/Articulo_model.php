<?php
class Articulo_model extends CI_model {

	function lista_articulos(){
		 $articulo= $this->db->get('articulo');
		 return $articulo;
	}


	function lista_articulosA(){
		 $articulo= $this->db->get('articulo1');
		 return $articulo;
	}




 	function articulo( $id){
 		$articulo = $this->db->query('select * from articulo where idarticulo="'. $id.'"');
 		return $articulo;
 	}

 	function save($array)
 	{
		$this->db->insert("articulo", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idarticulo',$id);
 		$this->db->update('articulo',$array_item);
	}


 	public function delete($id)
	{
 		$this->db->where('idarticulo',$id);
		$this->db->delete('articulo');
    if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idarticulo")->get('articulo');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idarticulo")->get('articulo');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$articulo = $this->db->select("idarticulo")->order_by("idarticulo")->get('articulo')->result_array();
		$arr=array("idarticulo"=>$id);
		$clave=array_search($arr,$articulo);
	   if(array_key_exists($clave+1,$articulo))
		 {

 		$articulo = $this->db->query('select * from articulo where idarticulo="'. $articulo[$clave+1]["idarticulo"].'"');
		 }else{

 		$articulo = $this->db->query('select * from articulo where idarticulo="'. $id.'"');
		 }
		 	
 		return $articulo;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$articulo = $this->db->select("idarticulo")->order_by("idarticulo")->get('articulo')->result_array();
		$arr=array("idarticulo"=>$id);
		$clave=array_search($arr,$articulo);
	   if(array_key_exists($clave-1,$articulo))
		 {

 		$articulo = $this->db->query('select * from articulo where idarticulo="'. $articulo[$clave-1]["idarticulo"].'"');
		 }else{

 		$articulo = $this->db->query('select * from articulo where idarticulo="'. $id.'"');
		 }
		 	
 		return $articulo;
 	}






 

}
