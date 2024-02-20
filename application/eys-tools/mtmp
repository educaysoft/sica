<?php
class Destinatario_model extends CI_model {

	function listar_destinatario(){
		 $destinatario= $this->db->get('destinatario');
		 return $destinatario;
	}

	function listar_destinatario1(){
		 $destinatario= $this->db->get('destinatario1');
		 return $destinatario;
	}




 	function destinatario($id){
 		$destinatario = $this->db->query('select * from destinatario where iddestinatario="'. $id.'"');
 		return $destinatario;
 	}

 	function save($array)
 	{
		$condition1 = "iddocumento =" . "'" . $array['iddocumento'] . "'";
		$condition2 = "idpersona =" . "'" . $array['idpersona'] . "'";
		$this->db->select('*');
		$this->db->from('destinatario');
		$this->db->where($condition1);
		$this->db->where($condition2);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			$this->db->insert("destinatario", $array);
			return true;
		}else{
			return false;
		}


 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('iddestinatario',$id);
 		$this->db->update('destinatario',$array_item);
	}


  public function delete($id)
	{
 		$this->db->where('iddestinatario',$id);
		$this->db->delete('destinatario');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("iddestinatario")->get('destinatario');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("iddestinatario")->get('destinatario');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$destinatario = $this->db->select("iddestinatario")->order_by("iddestinatario")->get('destinatario')->result_array();
		$arr=array("iddestinatario"=>$id);
		$clave=array_search($arr,$destinatario);
	   if(array_key_exists($clave+1,$destinatario))
		 {

 		$destinatario = $this->db->query('select * from destinatario where iddestinatario="'. $destinatario[$clave+1]["iddestinatario"].'"');
		 }else{

 		$destinatario = $this->db->query('select * from destinatario where iddestinatario="'. $id.'"');
		 }
		 	
 		return $destinatario;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$destinatario = $this->db->select("iddestinatario")->order_by("iddestinatario")->get('destinatario')->result_array();
		$arr=array("iddestinatario"=>$id);
		$clave=array_search($arr,$destinatario);
	   if(array_key_exists($clave-1,$destinatario))
		 {

 		$destinatario = $this->db->query('select * from destinatario where iddestinatario="'. $destinatario[$clave-1]["iddestinatario"].'"');
		 }else{

 		$destinatario = $this->db->query('select * from destinatario where iddestinatario="'. $id.'"');
		 }
		 	
 		return $destinatario;
 	}






}
