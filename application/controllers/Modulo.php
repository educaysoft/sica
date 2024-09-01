<?php

class Modulo extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('modulo_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
	  	$data['modulo']=$this->modulo_model->elmodulo(1)->row_array();
  		$data['title']="Modulo del sistema";
			$this->load->view('template/page_header');		
  		$this->load->view('modulo_record',$data);
			$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nuevo módulo";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('modulo_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idmodulo' => $this->input->post('idmodulo'),
	 	'nombre' => $this->input->post('nombre'),
	 	'modulo' => $this->input->post('modulo'),
	 	'icono' => $this->input->post('icono'),
	 	'funcion' => $this->input->post('funcion'),
	 	'inicial' => $this->input->post('inicial'),
	 	);
	 	$this->modulo_model->save($array_item);
	 	redirect('modulo');
 	}



public function edit()
{
	 	$data['modulo'] = $this->modulo_model->modulo($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar Modulo";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('modulo_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idmodulo');
	 	$array_item=array(
		 	
		 	'idmodulo' => $this->input->post('idmodulo'),
		 	'nombre' => $this->input->post('nombre'),
	 		'modulo' => $this->input->post('modulo'),
	 		'icono' => $this->input->post('icono'),
	 		'funcion' => $this->input->post('funcion'),
	 		'inicial' => $this->input->post('inicial'),
	 	);
	 	$this->modulo_model->update($id,$array_item);
	 	redirect('modulo');
 	}



 	public function delete()
 	{
 		$data=$this->modulo_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	if($result == true)
		{
			echo "<script language='JavaScript'> alert('modulo no fue eliminado'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> alert('modulo fue eliminado'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 	}




public function listar()
{
	
  $data['modulo'] = $this->modulo_model->lista_modulos()->result();
  $data['title']="Modulo";
	$this->load->view('template/page_header');		
  $this->load->view('modulo_list',$data);
	$this->load->view('template/page_footer');
}

function modulo_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->modulo_model->lista_modulos();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idmodulo,$r->nombre,$r->inicial,$r->icono,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('modulo/actual').'"   data-idmodulo="'.$r->idmodulo.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
}



public function actual()
{
  $data['modulo'] = $this->modulo_model->modulo($this->uri->segment(3))->row_array();
  if(!empty($data))
  {
    $data['title']="Modulo";
    $this->load->view('template/page_header');		
    $this->load->view('modulo_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }







public function elprimero()
{
	$data['modulo'] = $this->modulo_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Modulo";
    $this->load->view('template/page_header');		
    $this->load->view('modulo_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['modulo'] = $this->modulo_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Modulo";
  
    $this->load->view('template/page_header');		
    $this->load->view('modulo_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['modulo_list']=$this->modulo_model->lista_modulo()->result();
	$data['modulo'] = $this->modulo_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Modulo";
	$this->load->view('template/page_header');		
  $this->load->view('modulo_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['modulo_list']=$this->modulo_model->lista_modulo()->result();
	$data['modulo'] = $this->modulo_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Modulo";
	$this->load->view('template/page_header');		
  $this->load->view('modulo_record',$data);
	$this->load->view('template/page_footer');
}



public function generapaginaweb()
{
	$idcarrera=0;

	$ordenrpt=0;
//	if($this->uri->segment(3))
//	{
		$idcalendarioacademico=$this->uri->segment(3);
	 	$data['fechacalendarios']= $this->fechacalendario_model->fechacalendarios1($idcalendarioacademico)->result();
		$arreglo=array();
		$i=0;
		foreach($data['fechacalendarios'] as $row){
		$idcalendarioacademico=$row->idcalendarioacademico;

	//	$arreglo[$row->iddocente]=$this->fechacalendario_model->fechacalendariosA($iddocente)->row_array();
		$xx=array($this->calendarioacademico_model->calendarioacademico($idcalendarioacademico)->result_array());
		if(count($xx[0]) > 0){
		foreach($xx as $row2){
			foreach($row2 as $row3)
			 {
				$arreglo+=array($i=>array($row->idcalendarioacademico=>$row3));
				$i=$i+1;
			}
			}
		}
		}
		$data['calendarioacademico']=array();
	//	array_push($data['jornadadocente'],$glo); 
		$data['calendarioacademico']=$arreglo; 
		echo "<br> jornadadocnete<br>" ;
		$this->load->view('modulo_genpagina',$data);
//	}
}




	public function paginaweb()
	{
	  $this->load->view('web/modulossica');
	}






}
