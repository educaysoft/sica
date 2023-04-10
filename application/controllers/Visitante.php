<?php
class Visitante extends CI_Controller{

	public function __construct(){
      		parent::__construct();
      		$this->load->model('visitante_model');
      		$this->load->model('documento_model');
      		$this->load->model('persona_model');
      		$this->load->model('departamento_model');
      		$this->load->model('tipoparticipacion_model');
	}

	public function index(){
  		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  		$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['documentos']= $this->documento_model->lista_documentos()->result();
		$data['visitante'] = $this->visitante_model->elultimo();
		$data['departamento'] = $this->departamento_model->departamento($data['visitante']['iddepartamento'])->row_array();
  		$data['tipoparticipacions']= $this->tipoparticipacion_model->lista_tipoparticipacions()->result();

 		// print_r($data['visitante_list']);
  		$data['title']="Lista de Visitantees";
		$this->load->view('template/page_header');		
  		$this->load->view('visitante_record',$data);
		$this->load->view('template/page_footer');
	}


public function actual(){
 if(isset($this->session->userdata['logged_in'])){
 
   	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
	$data['tipoparticipacion']= $this->tipoparticipacion_model->lista_tipoparticipacions()->result();
	$data['personas']= $this->persona_model->lista_personas()->result();
 
 
   	$data['visitante']=$this->visitante_model->visitante($this->uri->segment(3))->row_array();
	$data['departamento'] = $this->departamento_model->departamento($data['visitante']['iddepartamento'])->row_array();
	$data['title']="Esta viendo el Visitante # :";
	$this->load->view('template/page_header');		
	$this->load->view('visitante_record',$data);
	$this->load->view('template/page_footer');
   }else{
	$this->load->view('template/page_header.php');
	$this->load->view('login_form');
	$this->load->view('template/page_footer.php');
   }
}




	public function add()
	{

		if($this->uri->segment(3)){
			$data['departamentos']= $this->departamento_model->lista_departamentos($this->uri->segment(3))->result();
		}else{
			$data['departamentos']= $this->departamento_model->lista_departamentos(0)->result();
		}



		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['title']="Nuevo Visitante";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('visitante_form',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save()
	{


   			date_default_timezone_set('America/Guayaquil');
    			$fecha = date("Y-m-d");
    			$hora= date("H:i:s");
			$idusuario=$this->session->userdata['logged_in']['idusuario'];

	 	$array_item=array(
		 	'idpersona' => $this->input->post('idpersona'),
		 	'iddepartamento' => $this->input->post('iddepartamento'),
		 	'fecha' => $this->input->post('fecha'),
		 	'hora' => $this->input->post('hora'),
		 	'motivo' => $this->input->post('motivo'),
		 	'rutafirma' => $this->input->post('rutafirma'),
	                'idusuario'=>$idusuario,
			'fechacreacion'=>$fecha,
			'horacreacion'=>$hora
	 	);
	 	$result=$this->visitante_model->save($array_item);
	 	if(!$result)
		{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> alert('Visitante ya existe'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 	}



	public function edit()
	{
	 	$data['visitante'] = $this->visitante_model->visitante($this->uri->segment(3))->row_array();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['documentos']= $this->documento_model->lista_documentos()->result();
 	 	$data['title'] = "Actualizar Visitante";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('visitante_edit',$data);
	 	$this->load->view('template/page_footer');
	}

	public function firmar()
	{

		$idvisitante=$this->input->post('idvisitante');
			$idpersona = $this->input->post('idpersona');
		 	$motivo = $this->input->post('motivo');
		 	$fecha = $this->input->post('fecha');
	 	
	
		header ("Location: https://repositorioutlvte.org/firmadigital.php?idpersona=".$idpersona."&motivo=".$motivo."&fecha=".$fecha."&idvisitante=".$idvisitante);

	}

	public function  save_edit()
	{
		$id=$this->input->get('idvisitante');
	 	$array_item=array(
		 	'rutafirma' => $this->input->get('rutafirma'),
		 	'motivo' => $this->input->get('motivo'),
	 	);
	 	$result=$this->visitante_model->update($id,$array_item);
	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('Persona ya existe'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}

 	}

	public function  save_edit2()
	{
		$id=$this->input->post('idvisitante');
	 	$array_item=array(
		 	'iddepartamento' => $this->input->post('iddepartamento'),
		 	'idpersona' => $this->input->post('idpersona'),
		 	'iddocumento' => $this->input->post('iddocumento'),
		 	'grupoletra' => $this->input->post('grupoletra'),
	 	);
	 	echo $this->visitante_model->update($id,$array_item);
 	}



 	public function delete()
 	{
    $idvisitante=$_GET['idvisitante'];
    $iddepartamento=$_GET['iddepartamento'];

 		$data=$this->visitante_model->delete($idvisitante,$iddepartamento);
 		echo json_encode($data);
	 	redirect('visitante/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


 	public function quitar()
 	{
	       $idvisitante=0;	
		if($this->uri->segment(3))
		{
   		 $idvisitante= $this->uri->segment(3);  
		}

 		$result=$this->visitante_model->quitar($idvisitante);
	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('No se eliminio'); </script>";
			echo "<script language='JavaScript'> window.history.go(-1);</script>";
		}else{
			echo "<script language='JavaScript'> alert('Se quito con existo este visitante'); </script>";
				echo "<script language='JavaScript'> window.history.go(-1);</script>";
		}
}








public function listar()
{
	
  $data['visitante'] = $this->visitante_model->listar_visitante1()->result();
  $data['title']="visitantes";
  $data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  $data['personas']= $this->persona_model->lista_personas()->result();
	$this->load->view('template/page_header');		
  $this->load->view('visitante_list',$data);
	$this->load->view('template/page_footer');
}



function visitante_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->visitante_model->listar_visitante1();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idvisitante,$r->eldepartamento,$r->motivo,$r->fecha,$r->hora,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('visitante/actual').'"    data-idvisitante="'.$r->idvisitante.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
	
			

}





public function listarxdepartamento()
{
	
  $data['visitante'] = $this->visitante_model->listar_visitante1()->result();
  $data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  $data['title']="visitantes";
   $data['filtro']= $this->uri->segment(3);
	$this->load->view('template/page_header');		
  $this->load->view('visitante_listxdepartamento',$data);
	$this->load->view('template/page_footer');
}



function visitante_dataxpersona()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));
		$id=$this->input->get('idpersona');


	 	$data0 = $this->visitante_model->listar_visitanteP($id);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idvisitante,$r->eldepartamento,$r->lapersona,$r->nombres,$r->grupoletra,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('visitante/actual').'"    data-idvisitante="'.$r->idvisitante.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
	
			

}










public function elprimero()
{
  $data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['visitante'] = $this->visitante_model->elprimero();
	$data['departamento'] = $this->departamento_model->departamento($data['visitante']['iddepartamento'])->row_array();
  if(!empty($data))
  {
  		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();

  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Visitante del documento";
    $this->load->view('template/page_header');		
    $this->load->view('visitante_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
  $data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['visitante'] = $this->visitante_model->elultimo();
	$data['departamento'] = $this->departamento_model->departamento($data['visitante']['iddepartamento'])->row_array();
  if(!empty($data))
  {
  		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Visitante del documento";
  
    $this->load->view('template/page_header');		
    $this->load->view('visitante_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['visitante_list']=$this->visitante_model->lista_visitante()->result();
  $data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['visitante'] = $this->visitante_model->siguiente($this->uri->segment(3))->row_array();
	$data['departamento'] = $this->departamento_model->departamento($data['visitante']['iddepartamento'])->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
    $data['title']="Visitante del documento";
 // $data['title']="Correo";
	$this->load->view('template/page_header');		
  $this->load->view('visitante_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['visitante_list']=$this->visitante_model->lista_visitante()->result();
  $data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['visitante'] = $this->visitante_model->anterior($this->uri->segment(3))->row_array();
	$data['departamento'] = $this->departamento_model->departamento($data['visitante']['iddepartamento'])->row_array();
 	$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
 // $data['title']="Correo";
    $data['title']="Visitante del documento";
	$this->load->view('template/page_header');		
  $this->load->view('visitante_record',$data);
	$this->load->view('template/page_footer');
}




public function get_visitante() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idpersona')) {
        $this->db->select('*');
        $this->db->where('idpersona',  $this->input->post('idpersona'));
        $this->db->where('iddepartamento', $this->input->post('iddepartamento'));
        $query = $this->db->get('visitante');
	$data=$query->result();
	echo json_encode($data);
	}
}












}
