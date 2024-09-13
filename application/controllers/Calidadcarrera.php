<?php

class Calidadcarrera extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('calidadcarrera_model');
  	  $this->load->model('departamento_model');
     $this->load->model('criteriocalidad_model');
     $this->load->model('subcriteriocalidad_model');
     $this->load->model('indicadorcalidad_model');
     $this->load->model('tipocalidad_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
	  	$data['calidadcarrera']=$this->calidadcarrera_model->elultimo();
  		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		$data['criteriocalidads']= $this->criteriocalidad_model->lista_criteriocalidads()->result();
		$data['subcriteriocalidads']= $this->subcriteriocalidad_model->lista_subcriteriocalidads()->result();
		$data['indicadorcalidads']= $this->indicadorcalidad_model->lista_indicadorcalidads()->result();
		$data['tipocalidads']= $this->tipocalidad_model->lista_tipocalidads()->result();
  		$data['title']="Lista de evidencia Calidad";
			$this->load->view('template/page_header');		
  		$this->load->view('calidadcarrera_record',$data);
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
		$data['tipocalidads']= $this->tipocalidad_model->lista_tipocalidads()->result();
		$data['title']="Nuevo Criterio de calidad";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('calidadcarrera_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idcalidadcarrera' => $this->input->post('idcalidadcarrera'),
	 	'nombre' => $this->input->post('nombre'),
	 	'detalle' => $this->input->post('detalle'),
	 	'archivo' => $this->input->post('archivo'),
		'idcriteriocalidad' => $this->input->post('idcriteriocalidad'),
		'idsubcriteriocalidad' => $this->input->post('idsubcriteriocalidad'),
		'idindicadorcalidad' => $this->input->post('idindicadorcalidad'),
        'idtipocalidad'=> $this->input->post('idtipocalidad'),
	 	'codigo' => $this->input->post('codigo'),
	 	'iddepartamento' => $this->input->post('iddepartamento'),
	 	);
	 	$result=$this->calidadcarrera_model->save($array_item);
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
	 	$data['calidadcarrera'] = $this->calidadcarrera_model->calidadcarrera($this->uri->segment(3))->row_array();
  		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		$data['criteriocalidads']= $this->criteriocalidad_model->lista_criteriocalidads()->result();
		$data['subcriteriocalidads']= $this->subcriteriocalidad_model->lista_subcriteriocalidads()->result();
		$data['indicadorcalidads']= $this->indicadorcalidad_model->lista_indicadorcalidads()->result();
		$data['tipocalidads']= $this->tipocalidad_model->lista_tipocalidads()->result();
 	 	$data['title'] = "Actualizar Calidadcarrera";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('calidadcarrera_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idcalidadcarrera');
	 	$array_item=array(
		 	
		 	'idcalidadcarrera' => $this->input->post('idcalidadcarrera'),
		 	'nombre' => $this->input->post('nombre'),
		 	'detalle' => $this->input->post('detalle'),
	 	'archivo' => $this->input->post('archivo'),
		'idcriteriocalidad' => $this->input->post('idcriteriocalidad'),
		'idsubcriteriocalidad' => $this->input->post('idsubcriteriocalidad'),
		'idindicadorcalidad' => $this->input->post('idindicadorcalidad'),
        'idtipocalidad'=> $this->input->post('idtipocalidad'),
	 	'codigo' => $this->input->post('codigo'),
	 		'iddepartamento' => $this->input->post('iddepartamento'),
	 	);
	 	$this->calidadcarrera_model->update($id,$array_item);
	 	redirect('calidadcarrera/actual/'.$id);
 	}



public function listar()
{
	
  $data['title']="Calidadcarrera";
	$this->load->view('template/page_header');		
  $this->load->view('calidadcarrera_list',$data);
	$this->load->view('template/page_footer');
}

function calidadcarrera_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->calidadcarrera_model->lista_calidadcarrerasA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idcalidadcarrera,$r->codigo,$r->elcriteriocalidad,$r->elsubcriteriocalidad,$r->elindicadorcalidad,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('calidadcarrera/actual').'"  data-idcalidadcarrera="'.$r->idcalidadcarrera.'">Ver</a>');
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

			$idcalidadcarrera=$this->input->get('idcalidadcarrera');
			$data0 =$this->ubicacioncalidadcarrera_model->ubicacioncalidadcarrerasA($idcalidadcarrera);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idubicacioncalidadcarrera,$r->idcalidadcarrera,$r->launidad,$r->lapersona,$r->fecha,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('ubicacioncalidadcarrera/actual').'"    data-idubicacioncalidadcarrera="'.$r->idubicacioncalidadcarrera.'">Ver</a><a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('ubicacioncalidadcarrera/edit').'"    data-idubicacioncalidadcarrera="'.$r->idubicacioncalidadcarrera.'">edit</a>');
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

			$idcalidadcarrera=$this->input->get('idcalidadcarrera');
			$data0 =$this->prestamocalidadcarrera_model->prestamocalidadcarrerasA($idcalidadcarrera);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idprestamocalidadcarrera,$r->idcalidadcarrera,$r->lapersona,$r->fechaprestamo,$r->horaprestamo,$r->fechadevolucion,$r->horadevolucion,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('prestamocalidadcarrera/actual').'"    data-idprestamocalidadcarrera="'.$r->idprestamocalidadcarrera.'">Ver</a><a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('prestamocalidadcarrera/edit').'"    data-idprestamocalidadcarrera="'.$r->idprestamocalidadcarrera.'">edit</a>');
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
	 	$data['calidadcarreras']= $this->calidadcarrera_model->calidadcarreraA($iddistributivo)->result();
		$arreglo=array();
		$i=0;
//		foreach($data['calidadcarreras'] as $row){
//		$idcalidadcarrera=$row->idcalidadcarrera;

//		$xx=array($this->prestamocalidadcarrera_model->prestamocalidadcarrerasA($idcalidadcarrera)->result_array());
//		if(count($xx[0]) > 0){
//		foreach($xx as $row2){
//			foreach($row2 as $row3)
//			 {
//				$arreglo+=array($i=>array($row->idcalidadcarrera=>$row3));
//				$i=$i+1;
//			}
///			}
//		}
//		}
		$data['prestamocalidadcarrera']=array();
//		$data['prestamocalidadcarrera']=$arreglo; 
		echo "<br> jornadadocnete<br>" ;

		$this->load->view('calidadcarrera_genpagina',$data);
	}
}










public function actual()
{
	$data['calidadcarrera'] = $this->calidadcarrera_model->calidadcarrera($this->uri->segment(3))->row_array();
 	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		$data['criteriocalidads']= $this->criteriocalidad_model->lista_criteriocalidads()->result();
		$data['subcriteriocalidads']= $this->subcriteriocalidad_model->lista_subcriteriocalidads()->result();
		$data['indicadorcalidads']= $this->indicadorcalidad_model->lista_indicadorcalidads()->result();
		$data['tipocalidads']= $this->tipocalidad_model->lista_tipocalidads()->result();
  if(!empty($data))
  {
    $data['title']="Calidadcarrera";
    $this->load->view('template/page_header');		
    $this->load->view('calidadcarrera_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }







public function elprimero()
{
	$data['calidadcarrera'] = $this->calidadcarrera_model->elprimero();
 	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		$data['criteriocalidads']= $this->criteriocalidad_model->lista_criteriocalidads()->result();
		$data['subcriteriocalidads']= $this->subcriteriocalidad_model->lista_subcriteriocalidads()->result();
		$data['indicadorcalidads']= $this->indicadorcalidad_model->lista_indicadorcalidads()->result();
		$data['tipocalidads']= $this->tipocalidad_model->lista_tipocalidads()->result();
  if(!empty($data))
  {
    $data['title']="Calidadcarrera";
    $this->load->view('template/page_header');		
    $this->load->view('calidadcarrera_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	  $data['calidadcarrera'] = $this->calidadcarrera_model->elultimo();
 	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		$data['criteriocalidads']= $this->criteriocalidad_model->lista_criteriocalidads()->result();
		$data['subcriteriocalidads']= $this->subcriteriocalidad_model->lista_subcriteriocalidads()->result();
		$data['indicadorcalidads']= $this->indicadorcalidad_model->lista_indicadorcalidads()->result();
		$data['tipocalidads']= $this->tipocalidad_model->lista_tipocalidads()->result();
  if(!empty($data))
  {
    $data['title']="Calidadcarrera";
  
    $this->load->view('template/page_header');		
    $this->load->view('calidadcarrera_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['calidadcarrera_list']=$this->calidadcarrera_model->lista_calidadcarrera()->result();
	$data['calidadcarrera'] = $this->calidadcarrera_model->siguiente($this->uri->segment(3))->row_array();
 	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		$data['criteriocalidads']= $this->criteriocalidad_model->lista_criteriocalidads()->result();
		$data['subcriteriocalidads']= $this->subcriteriocalidad_model->lista_subcriteriocalidads()->result();
		$data['indicadorcalidads']= $this->indicadorcalidad_model->lista_indicadorcalidads()->result();
		$data['tipocalidads']= $this->tipocalidad_model->lista_tipocalidads()->result();
  $data['title']="Calidadcarrera";
	$this->load->view('template/page_header');		
  $this->load->view('calidadcarrera_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['calidadcarrera_list']=$this->calidadcarrera_model->lista_calidadcarrera()->result();
	$data['calidadcarrera'] = $this->calidadcarrera_model->anterior($this->uri->segment(3))->row_array();
 	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		$data['criteriocalidads']= $this->criteriocalidad_model->lista_criteriocalidads()->result();
		$data['subcriteriocalidads']= $this->subcriteriocalidad_model->lista_subcriteriocalidads()->result();
		$data['indicadorcalidads']= $this->indicadorcalidad_model->lista_indicadorcalidads()->result();
		$data['tipocalidads']= $this->tipocalidad_model->lista_tipocalidads()->result();
  $data['title']="Calidadcarrera";
	$this->load->view('template/page_header');		
  $this->load->view('calidadcarrera_record',$data);
	$this->load->view('template/page_footer');
}



	public function reportepdf()
	{


		    $data['calidadcarreras'] = $this->calidadcarrera_model->calidadcarreraA($this->uri->segment(3))->result();



		$data['title']="Evento";
		$this->load->view('calidadcarrera_list_pdf',$data);
	
	}







	public function calidadcarrera_1()
	{
	  $this->load->view('calidadcarreras/calidadcarrera-1');
	}





}
