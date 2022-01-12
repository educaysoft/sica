<?php
class Departamento_model extends CI_model {

	function lista_departamento(){
		 $departamento= $this->db->get('departamento');
		 return $departamento;
	}

 	function departamento( $id){
 		$departamento = $this->db->query('select * from departamento where iddepartamento="'. $id.'"');
 		return $departamento;
 	}

 	function save($array)
 	{
		$this->db->insert("departamento", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('iddepartamento',$id);
 		$this->db->update('departamento',$array_item);
	}
 

}
