<?php
class Tiposeguimiento_model extends CI_model {

	function lista_tiposeguimientos(){
		 $tiposeguimiento= $this->db->get('tiposeguimiento');
		 return $tiposeguimiento;
	}

 	function tiposeguimiento( $id){
 		$tiposeguimiento = $this->db->query('select * from tiposeguimiento where idtiposeguimiento="'. $id.'"');
		 
 		return $tiposeguimiento;
 	}

 	function save($array)
 	{
		$this->db->insert("tiposeguimiento", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idtiposeguimiento',$id);
 		$this->db->update('tiposeguimiento',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idtiposeguimiento',$id);
		$this->db->delete('tiposeguimiento');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


public function get_tiposeguimiento($id){
	$condition = "idtiposeguimiento =" .  $id ;
	$this->db->select('*');
	$this->db->from('tiposeguimiento');
	$this->db->where($condition);
	$this->db->limit(1);
	$query = $this->db->get();

	if ($query->num_rows() == 1) {
		return $query->result();
	} else {
		return false;
	}

}





	function elprimero()
	{
		$query=$this->db->order_by("idtiposeguimiento")->get('tiposeguimiento');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idtiposeguimiento")->get('tiposeguimiento');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$tiposeguimiento = $this->db->select("idtiposeguimiento")->order_by("idtiposeguimiento")->get('tiposeguimiento')->result_array();
		$arr=array("idtiposeguimiento"=>$id);
		$clave=array_search($arr,$tiposeguimiento);
	   if(array_key_exists($clave+1,$tiposeguimiento))
		 {

 		$tiposeguimiento = $this->db->query('select * from tiposeguimiento where idtiposeguimiento="'. $tiposeguimiento[$clave+1]["idtiposeguimiento"].'"');
		 }else{

 		$tiposeguimiento = $this->db->query('select * from tiposeguimiento where idtiposeguimiento="'. $id.'"');
		 }
		 	
 		return $tiposeguimiento;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$tiposeguimiento = $this->db->select("idtiposeguimiento")->order_by("idtiposeguimiento")->get('tiposeguimiento')->result_array();
		$arr=array("idtiposeguimiento"=>$id);
		$clave=array_search($arr,$tiposeguimiento);
	   if(array_key_exists($clave-1,$tiposeguimiento))
		 {

 		$tiposeguimiento = $this->db->query('select * from tiposeguimiento where idtiposeguimiento="'. $tiposeguimiento[$clave-1]["idtiposeguimiento"].'"');
		 }else{

 		$tiposeguimiento = $this->db->query('select * from tiposeguimiento where idtiposeguimiento="'. $id.'"');
		 }
		 	
 		return $tiposeguimiento;
 	}



	function lista_tiposeguimientoes_con_inscripciones(){
		 $this->db->select('tiposeguimiento.*');
		 $this->db->from('tiposeguimiento,evento');
		 $this->db->where('evento.idtiposeguimiento=tiposeguimiento.idtiposeguimiento and evento.idevento_estado=2');
		 $tiposeguimiento= $this->db->get();
		 return $tiposeguimiento;
	}




}
