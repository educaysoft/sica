<?php
class Vitacora_model extends CI_model {

	function lista_vitacoras(){
		 $vitacora= $this->db->get('vitacora');
		 return $vitacora;
	}


	function lista_vitacorasA($id){
		 if($id>0){
		 $this->db->where('idusuario',$id);
		 }
		 $vitacora= $this->db->get('vitacora1');
		 return $vitacora;
	}



 	function vitacora( $id){
 		$vitacora = $this->db->query('select * from vitacora where idvitacora="'. $id.'"');
 		return $vitacora;
 	}


 	function usuario($id){
 		$vitacora = $this->db->where('idusuario',$id)->get('vitacora');
 		return $vitacora;
 	}


 	function get_usuario($id){
 		$vitacora = $this->db->where('idusuario',$id)->get('vitacora');
 		return $vitacora->result();
 	}


 	function save($array)
 	{
		$this->db->insert("vitacora", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idvitacora',$id);
 		$this->db->update('vitacora',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idvitacora',$id);
		$this->db->delete('vitacora');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idvitacora")->get('vitacora');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idvitacora")->get('vitacora');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$vitacora = $this->db->select("idvitacora")->order_by("idvitacora")->get('vitacora')->result_array();
		$arr=array("idvitacora"=>$id);
		$clave=array_search($arr,$vitacora);
	   if(array_key_exists($clave+1,$vitacora))
		 {

 		$vitacora = $this->db->query('select * from vitacora where idvitacora="'. $vitacora[$clave+1]["idvitacora"].'"');
		 }else{

 		$vitacora = $this->db->query('select * from vitacora where idvitacora="'. $id.'"');
		 }
		 	
 		return $vitacora;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$vitacora = $this->db->select("idvitacora")->order_by("idvitacora")->get('vitacora')->result_array();
		$arr=array("idvitacora"=>$id);
		$clave=array_search($arr,$vitacora);
	   if(array_key_exists($clave-1,$vitacora))
		 {

 		$vitacora = $this->db->query('select * from vitacora where idvitacora="'. $vitacora[$clave-1]["idvitacora"].'"');
		 }else{

 		$vitacora = $this->db->query('select * from vitacora where idvitacora="'. $id.'"');
		 }
		 	
 		return $vitacora;
 	}






}
