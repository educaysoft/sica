<?php
class Categoriadocente_model extends CI_model {

	function lista_categoriadocentes(){
		 $categoriadocente= $this->db->get('categoriadocente0');
		 return $categoriadocente;
	}

	function lista_categoriadocentesA(){
		 $categoriadocente= $this->db->get('categoriadocente1');
		 return $categoriadocente;
	}




 	function categoriadocente( $id){
 		$categoriadocente = $this->db->query('select * from categoriadocente0 where idcategoriadocente="'. $id.'"');
 		return $categoriadocente;
 	}

 	function save($array)
 	{
		$condition = "idcategoriadocente =" . "'" . $array['idcategoriadocente'] . "'";
		$this->db->select('*');
		$this->db->from('categoriadocente');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
		   $this->db->insert("categoriadocente", $array);
		   if( $this->db->affected_rows()>0){
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
 		$this->db->where('idcategoriadocente',$id);
 		$this->db->update('categoriadocente',$array_item);
	}
 

 	 function delete($id)
	{
 		$this->db->where('idcategoriadocente',$id);
		$this->db->delete('categoriadocente');
    	if($this->db->affected_rows()==1){
			$result=true;
        }else{
			$result=false;
    }
		return $result;
 	}



 	function quitar($id)
	{

        $this->db->select('*');
		$this->db->from('categoriadocente0');
 		$this->db->where('idcategoriadocente',$id);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() != 0) {
	 	  	$this->db->where('idcategoriadocente',$id);
			$this->db->update('categoriadocente', array('eliminado'=>1));
			$result=true;
        }else{
            $result=false;
        }
		return $result;
 	}






	function elprimero()
	{
		$query=$this->db->order_by("idcategoriadocente")->get('categoriadocente');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idcategoriadocente")->get('categoriadocente');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$categoriadocente = $this->db->select("idcategoriadocente")->order_by("idcategoriadocente")->get('categoriadocente')->result_array();
		$arr=array("idcategoriadocente"=>$id);
		$clave=array_search($arr,$categoriadocente);
	   if(array_key_exists($clave+1,$categoriadocente))
		 {

 		$categoriadocente = $this->db->query('select * from categoriadocente where idcategoriadocente="'. $categoriadocente[$clave+1]["idcategoriadocente"].'"');
		 }else{

 		$categoriadocente = $this->db->query('select * from categoriadocente where idcategoriadocente="'. $id.'"');
		 }
		 	
 		return $categoriadocente;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$categoriadocente = $this->db->select("idcategoriadocente")->order_by("idcategoriadocente")->get('categoriadocente')->result_array();
		$arr=array("idcategoriadocente"=>$id);
		$clave=array_search($arr,$categoriadocente);
	   if(array_key_exists($clave-1,$categoriadocente))
		 {

 		$categoriadocente = $this->db->query('select * from categoriadocente where idcategoriadocente="'. $categoriadocente[$clave-1]["idcategoriadocente"].'"');
		 }else{

 		$categoriadocente = $this->db->query('select * from categoriadocente where idcategoriadocente="'. $id.'"');
		 }
		 	
 		return $categoriadocente;
 	}








}
