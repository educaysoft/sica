<?php
class Maestrante_estado_model extends CI_model {

	function lista_maestrante_estado(){
		 $maestrante_estado= $this->db->get('maestrante_estado');
		 return $maestrante_estado;
	}

 	function maestrante_estado($id){
 		$maestrante_estado = $this->db->query('select * from maestrante_estado where idmaestrante_estado="'. $id.'"');
 		return $maestrante_estado;
 	}

 	function save($array)
 	{
		$this->db->insert("maestrante_estado", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idmaestrante_estado',$id);
 		$this->db->update('maestrante_estado',$array_item);
	}
 

}
