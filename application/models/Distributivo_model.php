<?php
class Distributivo_model extends CI_model {

	function lista_distributivos(){
		 $distributivo= $this->db->get('distributivo');
		 return $distributivo;
	}


function lista_distributivos1($idperiodoacademico){
	if($idperiodoacademico>0)
	{
	$this->db->where('idperiodoacademico='.$idperiodoacademico);
	}
	$query=$this->db->order_by("idperiodoacademico","iddistributivo")->get('distributivo1');
	 return $query;
	}

function lista_distributivos1_open($idperiodoacademico){
	if($idperiodoacademico>0)
	{
	$this->db->where('idperiodoacademico='.$idperiodoacademico);
	}
	$this->db->where('idestadodistributivoo=1');
	$query=$this->db->order_by("idperiodoacademico","iddistributivo")->get('distributivo1');
	 return $query;
	}

function lista_distributivos1_close($idperiodoacademico){
	if($idperiodoacademico>0)
	{
	$this->db->where('idperiodoacademico='.$idperiodoacademico);
	}
	$this->db->where('idestadodistributivoo=2');
	$query=$this->db->order_by("idperiodoacademico","iddistributivo")->get('distributivo1');
	 return $query;
	}







 	function distributivos( $idperiodoacademico){
 		$distributivo = $this->db->query('select * from distributivo where idperiodoacademico="'. $idperiodoacademico.'" order by fechaimpartida');
 		return $distributivo;
 	}


 	function distributivo( $id){
 		$distributivo = $this->db->query('select * from distributivo where iddistributivo="'. $id.'"');
 		return $distributivo;
 	}


 	function distributivo1( $id){
 		$distributivo = $this->db->query('select * from distributivo1 where iddistributivo="'. $id.'"');
 		return $distributivo;
 	}


 	function save($array)
 	{

		$condition1 = "idperiodoacademico =" . "'" . $array['idperiodoacademico'] . "'";
		$condition2 = "iddepartamento =" . "'" . $array['iddepartamento'] . "'";
		$this->db->select('*');
		$this->db->from('distributivo');
		$this->db->where($condition1);
		$this->db->where($condition2);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			$this->db->insert("distributivo", $array);
			return true;
		}else{
			return false;
		}


 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('iddistributivo',$id);
 		$this->db->update('distributivo',$array_item);
	}
 


 	public function delete($id)
	{

		$idusuario=$this->session->userdata['logged_in']['idusuario'];
		if($idusuario==413) //SOLO PUEDE STALIN FRANCIS educaysoft@hotmail.com
		{	
 		$this->db->where('iddistributivo',$id);
		$this->db->delete('distributivo');
    			if($this->db->affected_rows()==1){
				$result=true;

			}else{
				$result=false;
			}
		}else{
			$result=false;
		}
		return $result;
 	}


public function get_distributivo($id){
	$condition = "iddistributivo =" .  $id ;
	$this->db->select('*');
	$this->db->from('distributivo');
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
		$query=$this->db->order_by("iddistributivo")->get('distributivo');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("iddistributivo")->get('distributivo');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$distributivo = $this->db->select("iddistributivo")->order_by("iddistributivo")->get('distributivo')->result_array();
		$arr=array("iddistributivo"=>$id);
		$clave=array_search($arr,$distributivo);
	   if(array_key_exists($clave+1,$distributivo))
		 {

 		$distributivo = $this->db->query('select * from distributivo where iddistributivo="'. $distributivo[$clave+1]["iddistributivo"].'"');
		 }else{

 		$distributivo = $this->db->query('select * from distributivo where iddistributivo="'. $id.'"');
		 }
		 	
 		return $distributivo;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$distributivo = $this->db->select("iddistributivo")->order_by("iddistributivo")->get('distributivo')->result_array();
		$arr=array("iddistributivo"=>$id);
		$clave=array_search($arr,$distributivo);
	   if(array_key_exists($clave-1,$distributivo))
		 {

 		$distributivo = $this->db->query('select * from distributivo where iddistributivo="'. $distributivo[$clave-1]["iddistributivo"].'"');
		 }else{

 		$distributivo = $this->db->query('select * from distributivo where iddistributivo="'. $id.'"');
		 }
		 	
 		return $distributivo;
 	}



	function lista_distributivoes_con_inscripciones(){
		 $this->db->select('distributivo.*');
		 $this->db->from('distributivo,evento');
		 $this->db->where('evento.iddistributivo=distributivo.iddistributivo and evento.idevento_estado=2');
		 $distributivo= $this->db->get();
		 return $distributivo;
	}




}
