<?php
class Cliente_model extends CI_model {

	function lista_clientes(){
		 $cliente= $this->db->get('cliente');
		 return $cliente;
	}


	function lista_clientesA(){
		 $cliente= $this->db->get('cliente1');
		 return $cliente;
	}



 	function cliente( $id){
 		$cliente = $this->db->query('select * from cliente where idcliente="'. $id.'"');
 		return $cliente;
 	}


 	function clientespersona( $id){
 		$cliente = $this->db->query('select * from cliente where idpersona="'. $id.'"');
 		return $cliente;
 	}



 	function save($array)
 	{
		$this->db->insert("cliente", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idcliente',$id);
 		$this->db->update('cliente',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idcliente',$id);
		$this->db->delete('cliente');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idcliente")->get('cliente');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idcliente")->get('cliente');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$cliente = $this->db->select("idcliente")->order_by("idcliente")->get('cliente')->result_array();
		$arr=array("idcliente"=>$id);
		$clave=array_search($arr,$cliente);
	   if(array_key_exists($clave+1,$cliente))
		 {

 		$cliente = $this->db->query('select * from cliente where idcliente="'. $cliente[$clave+1]["idcliente"].'"');
		 }else{

 		$cliente = $this->db->query('select * from cliente where idcliente="'. $id.'"');
		 }
		 	
 		return $cliente;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$cliente = $this->db->select("idcliente")->order_by("idcliente")->get('cliente')->result_array();
		$arr=array("idcliente"=>$id);
		$clave=array_search($arr,$cliente);
	   if(array_key_exists($clave-1,$cliente))
		 {

 		$cliente = $this->db->query('select * from cliente where idcliente="'. $cliente[$clave-1]["idcliente"].'"');
		 }else{

 		$cliente = $this->db->query('select * from cliente where idcliente="'. $id.'"');
		 }
		 	
 		return $cliente;
 	}






}
