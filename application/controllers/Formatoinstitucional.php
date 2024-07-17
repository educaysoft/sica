<?php

class Formatoinstitucional extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('formatoinstitucional_model');
  	  $this->load->model('institucion_model');
     $this->load->model('proceso_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
	  	$data['formatoinstitucional']=$this->formatoinstitucional_model->elultimo();
  		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['procesos']= $this->proceso_model->lista_procesos()->result();
  		$data['title']="Lista de Artiulos";
			$this->load->view('template/page_header');		
  		$this->load->view('formatoinstitucional_record',$data);
			$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
  		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['procesos']= $this->proceso_model->lista_procesos()->result();
		$data['title']="Nuevo Artículo";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('formatoinstitucional_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idformatoinstitucional' => $this->input->post('idformatoinstitucional'),
	 	'nombre' => $this->input->post('nombre'),
	 	'detalle' => $this->input->post('detalle'),
	 	'archivo' => $this->input->post('archivo'),
		'idproceso' => $this->input->post('idproceso'),
	 	'orden' => $this->input->post('orden'),
	 	'idinstitucion' => $this->input->post('idinstitucion'),
	 	);
	 	$result=$this->formatoinstitucional_model->save($array_item);
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
	 	$data['formatoinstitucional'] = $this->formatoinstitucional_model->formatoinstitucional($this->uri->segment(3))->row_array();
  		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['procesos']= $this->proceso_model->lista_procesos()->result();
 	 	$data['title'] = "Actualizar Formatoinstitucional";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('formatoinstitucional_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idformatoinstitucional');
	 	$array_item=array(
		 	
		 	'idformatoinstitucional' => $this->input->post('idformatoinstitucional'),
		 	'nombre' => $this->input->post('nombre'),
		 	'detalle' => $this->input->post('detalle'),
	 	'archivo' => $this->input->post('archivo'),
		'idproceso' => $this->input->post('idproceso'),
	 	'orden' => $this->input->post('orden'),
	 		'idinstitucion' => $this->input->post('idinstitucion'),
	 	);
	 	$this->formatoinstitucional_model->update($id,$array_item);
	 	redirect('formatoinstitucional/actual/'.$id);
 	}



public function listar()
{
	
  $data['title']="Formatoinstitucional";
	$this->load->view('template/page_header');		
  $this->load->view('formatoinstitucional_list',$data);
	$this->load->view('template/page_footer');
}

function formatoinstitucional_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->formatoinstitucional_model->lista_formatoinstitucionals();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idformatoinstitucional,$r->nombre,$r->detalle,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('formatoinstitucional/actual').'"  data-idformatoinstitucional="'.$r->idformatoinstitucional.'">Ver</a>');
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

			$idformatoinstitucional=$this->input->get('idformatoinstitucional');
			$data0 =$this->ubicacionformatoinstitucional_model->ubicacionformatoinstitucionalsA($idformatoinstitucional);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idubicacionformatoinstitucional,$r->idformatoinstitucional,$r->launidad,$r->lapersona,$r->fecha,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('ubicacionformatoinstitucional/actual').'"    data-idubicacionformatoinstitucional="'.$r->idubicacionformatoinstitucional.'">Ver</a><a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('ubicacionformatoinstitucional/edit').'"    data-idubicacionformatoinstitucional="'.$r->idubicacionformatoinstitucional.'">edit</a>');
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

			$idformatoinstitucional=$this->input->get('idformatoinstitucional');
			$data0 =$this->prestamoformatoinstitucional_model->prestamoformatoinstitucionalsA($idformatoinstitucional);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idprestamoformatoinstitucional,$r->idformatoinstitucional,$r->lapersona,$r->fechaprestamo,$r->horaprestamo,$r->fechadevolucion,$r->horadevolucion,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('prestamoformatoinstitucional/actual').'"    data-idprestamoformatoinstitucional="'.$r->idprestamoformatoinstitucional.'">Ver</a><a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('prestamoformatoinstitucional/edit').'"    data-idprestamoformatoinstitucional="'.$r->idprestamoformatoinstitucional.'">edit</a>');
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
	 	$data['formatoinstitucionals']= $this->formatoinstitucional_model->formatoinstitucionalA($iddistributivo)->result();
		$arreglo=array();
		$i=0;
//		foreach($data['formatoinstitucionals'] as $row){
//		$idformatoinstitucional=$row->idformatoinstitucional;

//		$xx=array($this->prestamoformatoinstitucional_model->prestamoformatoinstitucionalsA($idformatoinstitucional)->result_array());
//		if(count($xx[0]) > 0){
//		foreach($xx as $row2){
//			foreach($row2 as $row3)
//			 {
//				$arreglo+=array($i=>array($row->idformatoinstitucional=>$row3));
//				$i=$i+1;
//			}
///			}
//		}
//		}
		$data['prestamoformatoinstitucional']=array();
//		$data['prestamoformatoinstitucional']=$arreglo; 
		echo "<br> jornadadocnete<br>" ;

		$this->load->view('formatoinstitucional_genpagina',$data);
	}
}










public function actual()
{
	$data['formatoinstitucional'] = $this->formatoinstitucional_model->formatoinstitucional($this->uri->segment(3))->row_array();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['procesos']= $this->proceso_model->lista_procesos()->result();
  if(!empty($data))
  {
    $data['title']="Formatoinstitucional";
    $this->load->view('template/page_header');		
    $this->load->view('formatoinstitucional_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }







public function elprimero()
{
	$data['formatoinstitucional'] = $this->formatoinstitucional_model->elprimero();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['procesos']= $this->proceso_model->lista_procesos()->result();
  if(!empty($data))
  {
    $data['title']="Formatoinstitucional";
    $this->load->view('template/page_header');		
    $this->load->view('formatoinstitucional_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	  $data['formatoinstitucional'] = $this->formatoinstitucional_model->elultimo();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['procesos']= $this->proceso_model->lista_procesos()->result();
  if(!empty($data))
  {
    $data['title']="Formatoinstitucional";
  
    $this->load->view('template/page_header');		
    $this->load->view('formatoinstitucional_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['formatoinstitucional_list']=$this->formatoinstitucional_model->lista_formatoinstitucional()->result();
	$data['formatoinstitucional'] = $this->formatoinstitucional_model->siguiente($this->uri->segment(3))->row_array();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['procesos']= $this->proceso_model->lista_procesos()->result();
  $data['title']="Formatoinstitucional";
	$this->load->view('template/page_header');		
  $this->load->view('formatoinstitucional_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['formatoinstitucional_list']=$this->formatoinstitucional_model->lista_formatoinstitucional()->result();
	$data['formatoinstitucional'] = $this->formatoinstitucional_model->anterior($this->uri->segment(3))->row_array();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['procesos']= $this->proceso_model->lista_procesos()->result();
  $data['title']="Formatoinstitucional";
	$this->load->view('template/page_header');		
  $this->load->view('formatoinstitucional_record',$data);
	$this->load->view('template/page_footer');
}




	public function formatoinstitucional_1()
	{
	  $this->load->view('formatoinstitucionals/formatoinstitucional-1');
	}





}
