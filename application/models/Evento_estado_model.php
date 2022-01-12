<?php
class Evento_estado_model extends CI_model {

	function lista_evento_estado(){
		 $evento_estado= $this->db->get('evento_estado');
		 return $evento_estado;
	}

 	function evento_estado( $id){
 		$evento_estado = $this->db->query('select * from evento_estado where idevento_estado="'. $id.'"');
 		return $evento_estado;
 	}

 	function save($array)
 	{
		$this->db->insert("evento_estado", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idevento_estado',$id);
 		$this->db->update('evento_estado',$array_item);
	}
 

}
