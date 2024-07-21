<?php
class Publicaciondocente_model extends CI_model {

	function lista_publicaciondocentes(){
		 $publicaciondocente= $this->db->get('publicaciondocente');
		 return $publicaciondocente;
	}


	function lista_publicaciondocentesA($id){
		if($id>0)
		{
			$this->db->where('idpublicacion',$id);
			$publicaciondocente= $this->db->order_by('fechapublicacion','desc')->get('publicaciondocente1');
		}else{
		 $publicaciondocente= $this->db->get('publicaciondocente1');
		}
		 return $publicaciondocente;
	}

	function publicaciondocente2($id){
        $lector = $this->db->query('SELECT p1.cedula, p1.eldocente, p1.iddocente, p1.fechapublicacion
    FROM publicaciondocente1 p1
    JOIN (
        SELECT cedula, eldocente, iddocente, MAX(fechapublicacion) AS max_fecha
        FROM publicaciondocente1
        GROUP BY cedula, eldocente, iddocente
    ) p2
    ON p1.cedula = p2.cedula
    AND p1.eldocente = p2.eldocente
    AND p1.iddocente = p2.iddocente
    AND p1.fechapublicacion = p2.max_fecha
    ORDER BY  p1.fechapublicacion DESC
');


 		return $lector;
 	}





 	function publicaciondocente( $id){
 		$publicaciondocente = $this->db->query('select * from publicaciondocente where idpublicaciondocente="'. $id.'"');
 		return $publicaciondocente;
 	}


	function publicaciondocentesA( $iddocente){
		if($iddocente>0)
		{
 			$publicaciondocente = $this->db->query('select * from publicaciondocente1 where iddocente="'. $iddocente.'" order by iddocente,fechapublicacion desc');
		}else{
 			$publicaciondocente = $this->db->query('select * from publicaciondocente1');
		}
 		return $publicaciondocente;
 	}



 	function save($array)
 	{
		$this->db->insert("publicaciondocente", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idpublicaciondocente',$id);
 		$this->db->update('publicaciondocente',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idpublicaciondocente',$id);
		$this->db->delete('publicaciondocente');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idpublicaciondocente")->get('publicaciondocente');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idpublicaciondocente")->get('publicaciondocente');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$publicaciondocente = $this->db->select("idpublicaciondocente")->order_by("idpublicaciondocente")->get('publicaciondocente')->result_array();
		$arr=array("idpublicaciondocente"=>$id);
		$clave=array_search($arr,$publicaciondocente);
	   if(array_key_exists($clave+1,$publicaciondocente))
		 {

 		$publicaciondocente = $this->db->query('select * from publicaciondocente where idpublicaciondocente="'. $publicaciondocente[$clave+1]["idpublicaciondocente"].'"');
		 }else{

 		$publicaciondocente = $this->db->query('select * from publicaciondocente where idpublicaciondocente="'. $id.'"');
		 }
		 	
 		return $publicaciondocente;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$publicaciondocente = $this->db->select("idpublicaciondocente")->order_by("idpublicaciondocente")->get('publicaciondocente')->result_array();
		$arr=array("idpublicaciondocente"=>$id);
		$clave=array_search($arr,$publicaciondocente);
	   if(array_key_exists($clave-1,$publicaciondocente))
		 {

 		$publicaciondocente = $this->db->query('select * from publicaciondocente where idpublicaciondocente="'. $publicaciondocente[$clave-1]["idpublicaciondocente"].'"');
		 }else{

 		$publicaciondocente = $this->db->query('select * from publicaciondocente where idpublicaciondocente="'. $id.'"');
		 }
		 	
 		return $publicaciondocente;
 	}






}
