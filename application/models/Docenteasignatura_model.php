<?php
class Docenteasignatura_model extends CI_model {

	function listar_docenteasignatura(){
		 $docenteasignatura= $this->db->get('docenteasignatura');
		 return $docenteasignatura;
	}

	function listar_docenteasignatura1($idsilabo){
		if($idsilabo==0)
		{
		$docenteasignatura=$this->db->order_by("asunto")->get('docenteasignatura1');
		}else{

		$this->db->where('idsilabo='.$idsilabo);
		$docenteasignatura=$this->db->order_by("asunto")->get('docenteasignatura1');
		}

		 return $docenteasignatura;
	}

 	function docenteasignatura( $id){
 		$docenteasignatura = $this->db->query('select * from docenteasignatura where iddocenteasignatura="'. $id.'"');
 		return $docenteasignatura;
 	}
 	function lista_unidades( $id){
		$docenteasignatura = $this->db->query('select * from docenteasignatura1 where idsilabo="'. $id.'"');
 		return $docenteasignatura;
 	}




 	function docenteasignaturas( $id){
 		$docenteasignatura = $this->db->query('select * from docenteasignatura1 where idevento="'. $id.'"');
 		return $docenteasignatura;
 	}

 	function save($array)
 	{
		$this->db->insert("docenteasignatura", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('iddocenteasignatura',$id);
 		$this->db->update('docenteasignatura',$array_item);
	}
 



  public function delete($id)
	{
 		$this->db->where('iddocenteasignatura',$id);
		$this->db->delete('docenteasignatura');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("iddocenteasignatura")->get('docenteasignatura');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("iddocenteasignatura")->get('docenteasignatura');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$docenteasignatura = $this->db->select("iddocenteasignatura")->order_by("iddocenteasignatura")->get('docenteasignatura')->result_array();
		$arr=array("iddocenteasignatura"=>$id);
		$clave=array_search($arr,$docenteasignatura);
	   if(array_key_exists($clave+1,$docenteasignatura))
		 {

 		$docenteasignatura = $this->db->query('select * from docenteasignatura where iddocenteasignatura="'. $docenteasignatura[$clave+1]["iddocenteasignatura"].'"');
		 }else{

 		$docenteasignatura = $this->db->query('select * from docenteasignatura where iddocenteasignatura="'. $id.'"');
		 }
		 	
 		return $docenteasignatura;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$docenteasignatura = $this->db->select("iddocenteasignatura")->order_by("iddocenteasignatura")->get('docenteasignatura')->result_array();
		$arr=array("iddocenteasignatura"=>$id);
		$clave=array_search($arr,$docenteasignatura);
	   if(array_key_exists($clave-1,$docenteasignatura))
		 {

 		$docenteasignatura = $this->db->query('select * from docenteasignatura where iddocenteasignatura="'. $docenteasignatura[$clave-1]["iddocenteasignatura"].'"');
		 }else{

 		$docenteasignatura = $this->db->query('select * from docenteasignatura where iddocenteasignatura="'. $id.'"');
		 }
		 	
 		return $docenteasignatura;
 	}














}
