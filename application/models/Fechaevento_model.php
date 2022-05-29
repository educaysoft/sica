<?php
class Fechaevento_model extends CI_model {

	function listar_fechaevento(){
		 $fechaevento= $this->db->get('fechaevento');
		 return $fechaevento;
	}

	function listar_fechaevento1(){
		 $fechaevento= $this->db->get('fechaevento1');
		 return $fechaevento;
	}

 	function fechaevento( $id){
 		$fechaevento = $this->db->query('select * from fechaevento where idfechaevento="'. $id.'"');
 		return $fechaevento;
 	}



 	function fechaeventos( $id){
 		$fechaevento = $this->db->query('select * from fechaevento where idevento="'. $id.'" order by fecha');
 		return $fechaevento;
 	}

	function fechaevento_activo($id){
 		$fechaevento = $this->db->query('select * from fechaevento where idevento='. $id.' and fecha in (select fecha from participacion p where  p.idevento='.$id.' and p.idtipoparticipacion=1) order by fecha');
 		return $fechaevento;
 	}


	function fechaevento_activo2($id){
 		$fechaevento = $this->db->query('select * from fechaevento where idevento='. $id.' and fecha in (select fecha from participacion p where  p.idevento='.$id.' and p.idtipoparticipacion!=1) order by fecha');
 		return $fechaevento;
 	}





	function fechaevento_asistencia($id){
 		$fechaevento = $this->db->query('select * from fechaevento where idevento='. $id.' and fecha in (select fecha from asistencia a where  a.idevento='.$id.') order by fecha');
 		return $fechaevento;
 	}





 	function save($array)
	{	
		$condition ="idevento="."'". $array['idevento']."' and  fecha=". "'".$array['fecha']."'";
		$this->db->select('*');
		$this->db->from('fechaevento');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows()==0)
		{	
			$this->db->insert("fechaevento", $array);
			if($this->db->affected_rows()>0)
			{
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idfechaevento',$id);
 		$this->db->update('fechaevento',$array_item);
	}
 



  public function delete($id)
	{
 		$this->db->where('idfechaevento',$id);
		$this->db->delete('fechaevento');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idfechaevento")->get('fechaevento');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idfechaevento")->get('fechaevento');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$fechaevento = $this->db->select("idfechaevento")->order_by("idfechaevento")->get('fechaevento')->result_array();
		$arr=array("idfechaevento"=>$id);
		$clave=array_search($arr,$fechaevento);
	   if(array_key_exists($clave+1,$fechaevento))
		 {

 		$fechaevento = $this->db->query('select * from fechaevento where idfechaevento="'. $fechaevento[$clave+1]["idfechaevento"].'"');
		 }else{

 		$fechaevento = $this->db->query('select * from fechaevento where idfechaevento="'. $id.'"');
		 }
		 	
 		return $fechaevento;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$fechaevento = $this->db->select("idfechaevento")->order_by("idfechaevento")->get('fechaevento')->result_array();
		$arr=array("idfechaevento"=>$id);
		$clave=array_search($arr,$fechaevento);
	   if(array_key_exists($clave-1,$fechaevento))
		 {

 		$fechaevento = $this->db->query('select * from fechaevento where idfechaevento="'. $fechaevento[$clave-1]["idfechaevento"].'"');
		 }else{

 		$fechaevento = $this->db->query('select * from fechaevento where idfechaevento="'. $id.'"');
		 }
		 	
 		return $fechaevento;
 	}














}
