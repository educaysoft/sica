<?php
class Telefono_estado_model extends CI_model {

	function lista_telefono_estado(){
		 $telefono_estado= $this->db->get('telefono_estado');
		 return $telefono_estado;
	}

 	function telefono_estado($id){
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
 

}
