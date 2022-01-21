<?php
class Categoria_model extends CI_model {

	function lista_categorias(){
		 $categoria= $this->db->get('categoria');
		 return $categoria;
	}

public function get_categoria($id){
	$condition = "idcategoria =" .  $id ;
	$this->db->select('*');
	$this->db->from('categoria');
	$this->db->where($condition);
	$this->db->limit(1);
	$query = $this->db->get();

	if ($query->num_rows() == 1) {
		return $query->result();
	} else {
		return false;
	}

}



 	function categoria( $id){
 		$categoria = $this->db->query('select * from categoria where idcategoria="'. $id.'"');
 		return $categoria;
 	}

 	function save($array)
 	{
		$this->db->insert("categoria", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idcategoria',$id);
 		$this->db->update('categoria',$array_item);
	}


 	public function delete($id)
	{
 		$this->db->where('idcategoria',$id);
		$this->db->delete('categoria');
    if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idcategoria")->get('categoria');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idcategoria")->get('categoria');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$categoria = $this->db->select("idcategoria")->order_by("idcategoria")->get('categoria')->result_array();
		$arr=array("idcategoria"=>$id);
		$clave=array_search($arr,$categoria);
	   if(array_key_exists($clave+1,$categoria))
		 {

 		$categoria = $this->db->query('select * from categoria where idcategoria="'. $categoria[$clave+1]["idcategoria"].'"');
		 }else{

 		$categoria = $this->db->query('select * from categoria where idcategoria="'. $id.'"');
		 }
		 	
 		return $categoria;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$categoria = $this->db->select("idcategoria")->order_by("idcategoria")->get('categoria')->result_array();
		$arr=array("idcategoria"=>$id);
		$clave=array_search($arr,$categoria);
	   if(array_key_exists($clave-1,$categoria))
		 {

 		$categoria = $this->db->query('select * from categoria where idcategoria="'. $categoria[$clave-1]["idcategoria"].'"');
		 }else{

 		$categoria = $this->db->query('select * from categoria where idcategoria="'. $id.'"');
		 }
		 	
 		return $categoria;
 	}






 

}
