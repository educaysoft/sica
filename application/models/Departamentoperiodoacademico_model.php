<?php
class Departamentoperiodoacademico_model extends CI_model {

	function listar_departamentoperiodoacademico(){
		 $departamentoperiodoacademico= $this->db->get('departamentoperiodoacademico');
		 return $departamentoperiodoacademico;
	}

	function listar_departamentoperiodoacademico1($idsilabo){
		if($idsilabo==0)
		{
		$departamentoperiodoacademico=$this->db->order_by("asunto")->get('departamentoperiodoacademico1');
		}else{

		$this->db->where('idsilabo='.$idsilabo);
		$departamentoperiodoacademico=$this->db->order_by("asunto")->get('departamentoperiodoacademico1');
		}

		 return $departamentoperiodoacademico;
	}

 	function departamentoperiodoacademico( $id){
 		$departamentoperiodoacademico = $this->db->query('select * from departamentoperiodoacademico where iddepartamentoperiodoacademico="'. $id.'"');
 		return $departamentoperiodoacademico;
 	}
 	function lista_unidades( $id){
		$departamentoperiodoacademico = $this->db->query('select * from departamentoperiodoacademico1 where idsilabo="'. $id.'"');
 		return $departamentoperiodoacademico;
 	}




 	function departamentoperiodoacademicos( $id){
 		$departamentoperiodoacademico = $this->db->query('select * from departamentoperiodoacademico1 where idevento="'. $id.'"');
 		return $departamentoperiodoacademico;
 	}

 	function save($array)
 	{
		$this->db->insert("departamentoperiodoacademico", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('iddepartamentoperiodoacademico',$id);
 		$this->db->update('departamentoperiodoacademico',$array_item);
	}
 



  public function delete($id)
	{
 		$this->db->where('iddepartamentoperiodoacademico',$id);
		$this->db->delete('departamentoperiodoacademico');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("iddepartamentoperiodoacademico")->get('departamentoperiodoacademico');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("iddepartamentoperiodoacademico")->get('departamentoperiodoacademico');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$departamentoperiodoacademico = $this->db->select("iddepartamentoperiodoacademico")->order_by("iddepartamentoperiodoacademico")->get('departamentoperiodoacademico')->result_array();
		$arr=array("iddepartamentoperiodoacademico"=>$id);
		$clave=array_search($arr,$departamentoperiodoacademico);
	   if(array_key_exists($clave+1,$departamentoperiodoacademico))
		 {

 		$departamentoperiodoacademico = $this->db->query('select * from departamentoperiodoacademico where iddepartamentoperiodoacademico="'. $departamentoperiodoacademico[$clave+1]["iddepartamentoperiodoacademico"].'"');
		 }else{

 		$departamentoperiodoacademico = $this->db->query('select * from departamentoperiodoacademico where iddepartamentoperiodoacademico="'. $id.'"');
		 }
		 	
 		return $departamentoperiodoacademico;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$departamentoperiodoacademico = $this->db->select("iddepartamentoperiodoacademico")->order_by("iddepartamentoperiodoacademico")->get('departamentoperiodoacademico')->result_array();
		$arr=array("iddepartamentoperiodoacademico"=>$id);
		$clave=array_search($arr,$departamentoperiodoacademico);
	   if(array_key_exists($clave-1,$departamentoperiodoacademico))
		 {

 		$departamentoperiodoacademico = $this->db->query('select * from departamentoperiodoacademico where iddepartamentoperiodoacademico="'. $departamentoperiodoacademico[$clave-1]["iddepartamentoperiodoacademico"].'"');
		 }else{

 		$departamentoperiodoacademico = $this->db->query('select * from departamentoperiodoacademico where iddepartamentoperiodoacademico="'. $id.'"');
		 }
		 	
 		return $departamentoperiodoacademico;
 	}














}
