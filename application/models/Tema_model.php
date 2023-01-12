<?php
class Tema_model extends CI_model {

	function lista_temas(){
		 $tema= $this->db->get('tema');
		 return $tema;
	}


function lista_temas1($idunidadsilabo){
	if($idunidadsilabo>0)
	{
	$this->db->where('idunidadsilabo='.$idunidadsilabo);
	}
	$query=$this->db->order_by("idsilabo","idunidadsilabo","idtema")->get('tema1');
	 return $query;
	}



function lista_temass($idsilabo){
	if($idsilabo>0)
	{
	$this->db->where('idsilabo='.$idsilabo);
	}
	$query=$this->db->order_by("idsilabo","unidad asc","numerosesion asc")->get('tema1');
	 return $query;
	}




 	function temas( $idunidadsilabo){
 		$tema = $this->db->query('select * from tema where idunidadsilabo="'. $idunidadsilabo.'" order by numerosesion');
 		return $tema;
 	}



 	function temas1( $idunidadsilabo){
 		$tema = $this->db->query('select * from tema1 where idunidadsilabo="'. $idunidadsilabo.'" order by numerosesion');
 		return $tema;
 	}



 	function tema( $id){
 		$tema = $this->db->query('select * from tema where idtema="'. $id.'"');
 		return $tema;
 	}

 	function save($array)
 	{
		$this->db->insert("tema", $array);
		if($this->db->affected_rows()>0)
		{
			return $this->db->insert_id();
		}else{
			return 0;
		}
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idtema',$id);
 		$this->db->update('tema',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idtema',$id);
		$this->db->delete('tema');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


public function get_tema($id){
	$condition = "idtema =" .  $id ;
	$this->db->select('*');
	$this->db->from('tema');
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
		$query=$this->db->order_by("idtema")->get('tema');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idtema")->get('tema');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$tema = $this->db->select("idtema")->order_by("idtema")->get('tema')->result_array();
		$arr=array("idtema"=>$id);
		$clave=array_search($arr,$tema);
	   if(array_key_exists($clave+1,$tema))
		 {

 		$tema = $this->db->query('select * from tema where idtema="'. $tema[$clave+1]["idtema"].'"');
		 }else{

 		$tema = $this->db->query('select * from tema where idtema="'. $id.'"');
		 }
		 	
 		return $tema;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$tema = $this->db->select("idtema")->order_by("idtema")->get('tema')->result_array();
		$arr=array("idtema"=>$id);
		$clave=array_search($arr,$tema);
	   if(array_key_exists($clave-1,$tema))
		 {

 		$tema = $this->db->query('select * from tema where idtema="'. $tema[$clave-1]["idtema"].'"');
		 }else{

 		$tema = $this->db->query('select * from tema where idtema="'. $id.'"');
		 }
		 	
 		return $tema;
 	}



	function lista_temaes_con_inscripciones(){
		 $this->db->select('tema.*');
		 $this->db->from('tema,evento');
		 $this->db->where('evento.idtema=tema.idtema and evento.idevento_estado=2');
		 $tema= $this->db->get();
		 return $tema;
	}




}
