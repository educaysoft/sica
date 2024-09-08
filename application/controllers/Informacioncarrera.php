<?php

class Informacioncarrera extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('informacioncarrera_model');
  	  $this->load->model('departamento_model');
     $this->load->model('criteriocalidad_model');
     $this->load->model('subcriteriocalidad_model');
     $this->load->model('indicadorcalidad_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
	  	$data['informacioncarrera']=$this->informacioncarrera_model->elultimo();
  		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		$data['criteriocalidads']= $this->criteriocalidad_model->lista_criteriocalidads()->result();
		$data['subcriteriocalidads']= $this->subcriteriocalidad_model->lista_subcriteriocalidads()->result();
		$data['indicadorcalidads']= $this->indicadorcalidad_model->lista_indicadorcalidads()->result();
  		$data['title']="Lista de evidencia Calidad";
			$this->load->view('template/page_header');		
  		$this->load->view('informacioncarrera_record',$data);
			$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
  		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		$data['criteriocalidads']= $this->criteriocalidad_model->lista_criteriocalidads()->result();
		$data['subcriteriocalidads']= $this->subcriteriocalidad_model->lista_subcriteriocalidads()->result();
		$data['indicadorcalidads']= $this->indicadorcalidad_model->lista_indicadorcalidads()->result();
		$data['title']="Nuevo Criterio de calidad";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('informacioncarrera_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idinformacioncarrera' => $this->input->post('idinformacioncarrera'),
	 	'nombre' => $this->input->post('nombre'),
	 	'detalle' => $this->input->post('detalle'),
	 	'archivo' => $this->input->post('archivo'),
		'idcriteriocalidad' => $this->input->post('idcriteriocalidad'),
		'idsubcriteriocalidad' => $this->input->post('idsubcriteriocalidad'),
		'idindicadorcalidad' => $this->input->post('idindicadorcalidad'),
	 	'solicitante' => $this->input->post('solicitante'),
	 	'iddepartamento' => $this->input->post('iddepartamento'),
	 	);
	 	$result=$this->informacioncarrera_model->save($array_item);
	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('formato ya existe ya existe'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}

 	}



public function edit()
{
	 	$data['informacioncarrera'] = $this->informacioncarrera_model->informacioncarrera($this->uri->segment(3))->row_array();
  		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		$data['criteriocalidads']= $this->criteriocalidad_model->lista_criteriocalidads()->result();
		$data['subcriteriocalidads']= $this->subcriteriocalidad_model->lista_subcriteriocalidads()->result();
		$data['indicadorcalidads']= $this->indicadorcalidad_model->lista_indicadorcalidads()->result();
 	 	$data['title'] = "Actualizar Informacioncarrera";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('informacioncarrera_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idinformacioncarrera');
	 	$array_item=array(
		 	
		 	'idinformacioncarrera' => $this->input->post('idinformacioncarrera'),
		 	'nombre' => $this->input->post('nombre'),
		 	'detalle' => $this->input->post('detalle'),
	 	'archivo' => $this->input->post('archivo'),
		'idcriteriocalidad' => $this->input->post('idcriteriocalidad'),
		'idsubcriteriocalidad' => $this->input->post('idsubcriteriocalidad'),
		'idindicadorcalidad' => $this->input->post('idindicadorcalidad'),
	 	'solicitante' => $this->input->post('solicitante'),
	 		'iddepartamento' => $this->input->post('iddepartamento'),
	 	);
	 	$this->informacioncarrera_model->update($id,$array_item);
	 	redirect('informacioncarrera/actual/'.$id);
 	}



public function listar()
{
	
  $data['title']="Informacioncarrera";
	$this->load->view('template/page_header');		
  $this->load->view('informacioncarrera_list',$data);
	$this->load->view('template/page_footer');
}

function informacioncarrera_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->informacioncarrera_model->lista_informacioncarrerasA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idinformacioncarrera,$r->solicitante,$r->elcriteriocalidad,$r->elsubcriteriocalidad,$r->elindicadorcalidad,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('informacioncarrera/actual').'"  data-idinformacioncarrera="'.$r->idinformacioncarrera.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
}




	function ubicacion_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$idinformacioncarrera=$this->input->get('idinformacioncarrera');
			$data0 =$this->ubicacioninformacioncarrera_model->ubicacioninformacioncarrerasA($idinformacioncarrera);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idubicacioninformacioncarrera,$r->idinformacioncarrera,$r->launidad,$r->lapersona,$r->fecha,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('ubicacioninformacioncarrera/actual').'"    data-idubicacioninformacioncarrera="'.$r->idubicacioninformacioncarrera.'">Ver</a><a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('ubicacioninformacioncarrera/edit').'"    data-idubicacioninformacioncarrera="'.$r->idubicacioninformacioncarrera.'">edit</a>');
			}	
			$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);
			echo json_encode($output);
			exit();
	}








	function prestamo_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$idinformacioncarrera=$this->input->get('idinformacioncarrera');
			$data0 =$this->prestamoinformacioncarrera_model->prestamoinformacioncarrerasA($idinformacioncarrera);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idprestamoinformacioncarrera,$r->idinformacioncarrera,$r->lapersona,$r->fechaprestamo,$r->horaprestamo,$r->fechadevolucion,$r->horadevolucion,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('prestamoinformacioncarrera/actual').'"    data-idprestamoinformacioncarrera="'.$r->idprestamoinformacioncarrera.'">Ver</a><a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('prestamoinformacioncarrera/edit').'"    data-idprestamoinformacioncarrera="'.$r->idprestamoinformacioncarrera.'">edit</a>');
			}	
			$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);
			echo json_encode($output);
			exit();
	}




public function genpagina()
{
	$iddistributivo=0;

	$ordenrpt=0;
	if($this->uri->segment(3))
	{
		//$iddistributivo=$this->uri->segment(3);
		$iddistributivo=1;
	 	$data['informacioncarreras']= $this->informacioncarrera_model->informacioncarreraA($iddistributivo)->result();
		$arreglo=array();
		$i=0;
//		foreach($data['informacioncarreras'] as $row){
//		$idinformacioncarrera=$row->idinformacioncarrera;

//		$xx=array($this->prestamoinformacioncarrera_model->prestamoinformacioncarrerasA($idinformacioncarrera)->result_array());
//		if(count($xx[0]) > 0){
//		foreach($xx as $row2){
//			foreach($row2 as $row3)
//			 {
//				$arreglo+=array($i=>array($row->idinformacioncarrera=>$row3));
//				$i=$i+1;
//			}
///			}
//		}
//		}
		$data['prestamoinformacioncarrera']=array();
//		$data['prestamoinformacioncarrera']=$arreglo; 
		echo "<br> jornadadocnete<br>" ;

		$this->load->view('informacioncarrera_genpagina',$data);
	}
}










public function actual()
{
	$data['informacioncarrera'] = $this->informacioncarrera_model->informacioncarrera($this->uri->segment(3))->row_array();
 	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		$data['criteriocalidads']= $this->criteriocalidad_model->lista_criteriocalidads()->result();
		$data['subcriteriocalidads']= $this->subcriteriocalidad_model->lista_subcriteriocalidads()->result();
		$data['indicadorcalidads']= $this->indicadorcalidad_model->lista_indicadorcalidads()->result();
  if(!empty($data))
  {
    $data['title']="Informacioncarrera";
    $this->load->view('template/page_header');		
    $this->load->view('informacioncarrera_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }







public function elprimero()
{
	$data['informacioncarrera'] = $this->informacioncarrera_model->elprimero();
 	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		$data['criteriocalidads']= $this->criteriocalidad_model->lista_criteriocalidads()->result();
		$data['subcriteriocalidads']= $this->subcriteriocalidad_model->lista_subcriteriocalidads()->result();
		$data['indicadorcalidads']= $this->indicadorcalidad_model->lista_indicadorcalidads()->result();
  if(!empty($data))
  {
    $data['title']="Informacioncarrera";
    $this->load->view('template/page_header');		
    $this->load->view('informacioncarrera_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	  $data['informacioncarrera'] = $this->informacioncarrera_model->elultimo();
 	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		$data['criteriocalidads']= $this->criteriocalidad_model->lista_criteriocalidads()->result();
		$data['subcriteriocalidads']= $this->subcriteriocalidad_model->lista_subcriteriocalidads()->result();
		$data['indicadorcalidads']= $this->indicadorcalidad_model->lista_indicadorcalidads()->result();
  if(!empty($data))
  {
    $data['title']="Informacioncarrera";
  
    $this->load->view('template/page_header');		
    $this->load->view('informacioncarrera_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['informacioncarrera_list']=$this->informacioncarrera_model->lista_informacioncarrera()->result();
	$data['informacioncarrera'] = $this->informacioncarrera_model->siguiente($this->uri->segment(3))->row_array();
 	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		$data['criteriocalidads']= $this->criteriocalidad_model->lista_criteriocalidads()->result();
		$data['subcriteriocalidads']= $this->subcriteriocalidad_model->lista_subcriteriocalidads()->result();
		$data['indicadorcalidads']= $this->indicadorcalidad_model->lista_indicadorcalidads()->result();
  $data['title']="Informacioncarrera";
	$this->load->view('template/page_header');		
  $this->load->view('informacioncarrera_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['informacioncarrera_list']=$this->informacioncarrera_model->lista_informacioncarrera()->result();
	$data['informacioncarrera'] = $this->informacioncarrera_model->anterior($this->uri->segment(3))->row_array();
 	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		$data['criteriocalidads']= $this->criteriocalidad_model->lista_criteriocalidads()->result();
		$data['subcriteriocalidads']= $this->subcriteriocalidad_model->lista_subcriteriocalidads()->result();
		$data['indicadorcalidads']= $this->indicadorcalidad_model->lista_indicadorcalidads()->result();
  $data['title']="Informacioncarrera";
	$this->load->view('template/page_header');		
  $this->load->view('informacioncarrera_record',$data);
	$this->load->view('template/page_footer');
}



	public function reportepdf()
	{


		    $data['informacioncarreras'] = $this->informacioncarrera_model->informacioncarreraA($this->uri->segment(3))->result();



		$data['title']="Evento";
		$this->load->view('informacioncarrera_list_pdf',$data);
	
	}







	public function informacioncarrera_1()
	{
	  $this->load->view('informacioncarreras/informacioncarrera-1');
	}





}
