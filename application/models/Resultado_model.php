<?php
class Resultado_model extends CI_model {

	function lista_resultados(){
		 $resultado= $this->db->get('resultado');
		 return $resultado;
	}


	function lista_resultadosA(){
		 $resultado= $this->db->get('resultado1');
		 return $resultado;
	}



 	function resultado( $id){
 		$resultado = $this->db->query('select * from resultado where idresultado="'. $id.'"');
 		return $resultado;
 	}


 	function resultadospersona( $id){
 		$resultado = $this->db->query('select * from resultado where idpersona="'. $id.'"');
 		return $resultado;
 	}



 	function save($array)
 	{
		$this->db->insert("resultado", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idresultado',$id);
 		$this->db->update('resultado',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idresultado',$id);
		$this->db->delete('resultado');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idresultado")->get('resultado');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idresultado")->get('resultado');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$resultado = $this->db->select("idresultado")->order_by("idresultado")->get('resultado')->result_array();
		$arr=array("idresultado"=>$id);
		$clave=array_search($arr,$resultado);
	   if(array_key_exists($clave+1,$resultado))
		 {

 		$resultado = $this->db->query('select * from resultado where idresultado="'. $resultado[$clave+1]["idresultado"].'"');
		 }else{

 		$resultado = $this->db->query('select * from resultado where idresultado="'. $id.'"');
		 }
		 	
 		return $resultado;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$resultado = $this->db->select("idresultado")->order_by("idresultado")->get('resultado')->result_array();
		$arr=array("idresultado"=>$id);
		$clave=array_search($arr,$resultado);
	   if(array_key_exists($clave-1,$resultado))
		 {

 		$resultado = $this->db->query('select * from resultado where idresultado="'. $resultado[$clave-1]["idresultado"].'"');
		 }else{

 		$resultado = $this->db->query('select * from resultado where idresultado="'. $id.'"');
		 }
		 	
 		return $resultado;
 	}






}
