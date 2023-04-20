<?php
class Correo_estado_model extends CI_model {

	function lista_correo_estado(){
		 $correo_estado= $this->db->get('correo_estado');
		 return $correo_estado;
	}

 	function correo_estado($id){
 		$correo_estado = $this->db->query('select * from correo_estado where idcorreo_estado="'. $id.'"');
 		return $correo_estado;
 	}

 	function save($array)
 	{
		$this->db->insert("correo_estado", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idcorreo_estado',$id);
 		$this->db->update('correo_estado',$array_item);
	}
 

}
