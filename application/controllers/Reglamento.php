<?php

class Reglamento extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('reglamento_model');
  	  $this->load->model('institucion_model');
     $this->load->model('proceso_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
	  	$data['reglamento']=$this->reglamento_model->elultimo();
  		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['procesos']= $this->proceso_model->lista_procesos()->result();
  		$data['title']="Lista de Artiulos";
			$this->load->view('template/page_header');		
  		$this->load->view('reglamento_record',$data);
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
	 	$this->load->view('reglamento_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idreglamento' => $this->input->post('idreglamento'),
	 	'nombre' => $this->input->post('nombre'),
	 	'detalle' => $this->input->post('detalle'),
	 	'archivo' => $this->input->post('archivo'),
		'idproceso' => $this->input->post('idproceso'),
	 	'orden' => $this->input->post('orden'),
	 	'idinstitucion' => $this->input->post('idinstitucion'),
	 	);
	 	$result=$this->reglamento_model->save($array_item);
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
	 	$data['reglamento'] = $this->reglamento_model->reglamento($this->uri->segment(3))->row_array();
  		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['procesos']= $this->proceso_model->lista_procesos()->result();
 	 	$data['title'] = "Actualizar Reglamento";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('reglamento_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idreglamento');
	 	$array_item=array(
		 	
		 	'idreglamento' => $this->input->post('idreglamento'),
		 	'nombre' => $this->input->post('nombre'),
		 	'detalle' => $this->input->post('detalle'),
	 	'archivo' => $this->input->post('archivo'),
		'idproceso' => $this->input->post('idproceso'),
	 	'orden' => $this->input->post('orden'),
	 		'idinstitucion' => $this->input->post('idinstitucion'),
	 	);
	 	$this->reglamento_model->update($id,$array_item);
	 	redirect('reglamento/actual/'.$id);
 	}



public function listar()
{
	
  $data['title']="Reglamento";
	$this->load->view('template/page_header');		
  $this->load->view('reglamento_list',$data);
	$this->load->view('template/page_footer');
}

function reglamento_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->reglamento_model->lista_reglamentos();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idreglamento,$r->nombre,$r->detalle,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('reglamento/actual').'"  data-idreglamento="'.$r->idreglamento.'">Ver</a>');
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

			$idreglamento=$this->input->get('idreglamento');
			$data0 =$this->ubicacionreglamento_model->ubicacionreglamentosA($idreglamento);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idubicacionreglamento,$r->idreglamento,$r->launidad,$r->lapersona,$r->fecha,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('ubicacionreglamento/actual').'"    data-idubicacionreglamento="'.$r->idubicacionreglamento.'">Ver</a><a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('ubicacionreglamento/edit').'"    data-idubicacionreglamento="'.$r->idubicacionreglamento.'">edit</a>');
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

			$idreglamento=$this->input->get('idreglamento');
			$data0 =$this->prestamoreglamento_model->prestamoreglamentosA($idreglamento);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idprestamoreglamento,$r->idreglamento,$r->lapersona,$r->fechaprestamo,$r->horaprestamo,$r->fechadevolucion,$r->horadevolucion,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('prestamoreglamento/actual').'"    data-idprestamoreglamento="'.$r->idprestamoreglamento.'">Ver</a><a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('prestamoreglamento/edit').'"    data-idprestamoreglamento="'.$r->idprestamoreglamento.'">edit</a>');
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
	 	$data['reglamentos']= $this->reglamento_model->reglamentoA($iddistributivo)->result();
		$arreglo=array();
		$i=0;
		$data['prestamoreglamento']=array();
		echo "<br> jornadadocnete<br>" ;

		$this->load->view('reglamento_genpagina',$data);
	}
}










public function actual()
{
	$data['reglamento'] = $this->reglamento_model->reglamento($this->uri->segment(3))->row_array();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['procesos']= $this->proceso_model->lista_procesos()->result();
  if(!empty($data))
  {
    $data['title']="Reglamento";
    $this->load->view('template/page_header');		
    $this->load->view('reglamento_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }







public function elprimero()
{
	$data['reglamento'] = $this->reglamento_model->elprimero();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['procesos']= $this->proceso_model->lista_procesos()->result();
  if(!empty($data))
  {
    $data['title']="Reglamento";
    $this->load->view('template/page_header');		
    $this->load->view('reglamento_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	  $data['reglamento'] = $this->reglamento_model->elultimo();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['procesos']= $this->proceso_model->lista_procesos()->result();
  if(!empty($data))
  {
    $data['title']="Reglamento";
  
    $this->load->view('template/page_header');		
    $this->load->view('reglamento_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['reglamento_list']=$this->reglamento_model->lista_reglamento()->result();
	$data['reglamento'] = $this->reglamento_model->siguiente($this->uri->segment(3))->row_array();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['procesos']= $this->proceso_model->lista_procesos()->result();
  $data['title']="Reglamento";
	$this->load->view('template/page_header');		
  $this->load->view('reglamento_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['reglamento_list']=$this->reglamento_model->lista_reglamento()->result();
	$data['reglamento'] = $this->reglamento_model->anterior($this->uri->segment(3))->row_array();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['procesos']= $this->proceso_model->lista_procesos()->result();
  $data['title']="Reglamento";
	$this->load->view('template/page_header');		
  $this->load->view('reglamento_record',$data);
	$this->load->view('template/page_footer');
}




	public function reglamento_1()
	{
	  $this->load->view('reglamentos/reglamento-1');
	}





}
