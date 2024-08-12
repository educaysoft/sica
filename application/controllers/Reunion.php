<?php

class Reunion extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('reunion_model');
  	  $this->load->model('institucion_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
	  	$data['reunion']=$this->reunion_model->elultimo();
  		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  		$data['title']="Lista de Artiulos";
			$this->load->view('template/page_header');		
  		$this->load->view('reunion_record',$data);
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
		$data['title']="Nuevo Artículo";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('reunion_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idreunion' => $this->input->post('idreunion'),
	 	'nombre' => $this->input->post('nombre'),
	 	'detalle' => $this->input->post('detalle'),
	 	'archivo' => $this->input->post('archivo'),
	 	'orden' => $this->input->post('orden'),
	 	'idinstitucion' => $this->input->post('idinstitucion'),
	 	);
	 	$result=$this->reunion_model->save($array_item);
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
	 	$data['reunion'] = $this->reunion_model->reunion($this->uri->segment(3))->row_array();
  		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
 	 	$data['title'] = "Actualizar Reunion";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('reunion_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idreunion');
	 	$array_item=array(
		 	
		 	'idreunion' => $this->input->post('idreunion'),
		 	'nombre' => $this->input->post('nombre'),
		 	'detalle' => $this->input->post('detalle'),
	 	'archivo' => $this->input->post('archivo'),
	 	'orden' => $this->input->post('orden'),
	 		'idinstitucion' => $this->input->post('idinstitucion'),
	 	);
	 	$this->reunion_model->update($id,$array_item);
	 	redirect('reunion/actual/'.$id);
 	}



public function listar()
{
	
  $data['title']="Reunion";
	$this->load->view('template/page_header');		
  $this->load->view('reunion_list',$data);
	$this->load->view('template/page_footer');
}

function reunion_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->reunion_model->lista_reunions();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idreunion,$r->nombre,$r->detalle,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('reunion/actual').'"  data-idreunion="'.$r->idreunion.'">Ver</a>');
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

			$idreunion=$this->input->get('idreunion');
			$data0 =$this->ubicacionreunion_model->ubicacionreunionsA($idreunion);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idubicacionreunion,$r->idreunion,$r->launidad,$r->lapersona,$r->fecha,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('ubicacionreunion/actual').'"    data-idubicacionreunion="'.$r->idubicacionreunion.'">Ver</a><a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('ubicacionreunion/edit').'"    data-idubicacionreunion="'.$r->idubicacionreunion.'">edit</a>');
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

			$idreunion=$this->input->get('idreunion');
			$data0 =$this->prestamoreunion_model->prestamoreunionsA($idreunion);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idprestamoreunion,$r->idreunion,$r->lapersona,$r->fechaprestamo,$r->horaprestamo,$r->fechadevolucion,$r->horadevolucion,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('prestamoreunion/actual').'"    data-idprestamoreunion="'.$r->idprestamoreunion.'">Ver</a><a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('prestamoreunion/edit').'"    data-idprestamoreunion="'.$r->idprestamoreunion.'">edit</a>');
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
	 	$data['reunions']= $this->reunion_model->reunionA($iddistributivo)->result();
		$arreglo=array();
		$i=0;
//		foreach($data['reunions'] as $row){
//		$idreunion=$row->idreunion;

//		$xx=array($this->prestamoreunion_model->prestamoreunionsA($idreunion)->result_array());
//		if(count($xx[0]) > 0){
//		foreach($xx as $row2){
//			foreach($row2 as $row3)
//			 {
//				$arreglo+=array($i=>array($row->idreunion=>$row3));
//				$i=$i+1;
//			}
///			}
//		}
//		}
		$data['prestamoreunion']=array();
//		$data['prestamoreunion']=$arreglo; 
		echo "<br> jornadadocnete<br>" ;

		$this->load->view('reunion_genpagina',$data);
	}
}










public function actual()
{
	$data['reunion'] = $this->reunion_model->reunion($this->uri->segment(3))->row_array();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  if(!empty($data))
  {
    $data['title']="Reunion";
    $this->load->view('template/page_header');		
    $this->load->view('reunion_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }







public function elprimero()
{
	$data['reunion'] = $this->reunion_model->elprimero();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  if(!empty($data))
  {
    $data['title']="Reunion";
    $this->load->view('template/page_header');		
    $this->load->view('reunion_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	  $data['reunion'] = $this->reunion_model->elultimo();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  if(!empty($data))
  {
    $data['title']="Reunion";
  
    $this->load->view('template/page_header');		
    $this->load->view('reunion_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['reunion_list']=$this->reunion_model->lista_reunion()->result();
	$data['reunion'] = $this->reunion_model->siguiente($this->uri->segment(3))->row_array();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  $data['title']="Reunion";
	$this->load->view('template/page_header');		
  $this->load->view('reunion_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['reunion_list']=$this->reunion_model->lista_reunion()->result();
	$data['reunion'] = $this->reunion_model->anterior($this->uri->segment(3))->row_array();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  $data['title']="Reunion";
	$this->load->view('template/page_header');		
  $this->load->view('reunion_record',$data);
	$this->load->view('template/page_footer');
}




	public function reunion_1()
	{
	  $this->load->view('reuniones/reunion-1');
	}





}
