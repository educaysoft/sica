<?php

class Curso extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('curso_model');
      $this->load->model('cursounidad_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['curso']=$this->curso_model->elultimo();
		$data['title']="Lista de cursoes";
		$this->load->view('template/page_header');
		$this->load->view('curso_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


	public function add()
	{
			$data['title']="Nueva curso";
			$this->load->view('template/page_header');		
			$this->load->view('curso_form',$data);
			$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
	 	'nombre' => $this->input->post('nombre'),
	 	'duracion' => $this->input->post('duracion'),
	 	);
	 	$this->curso_model->save($array_item);
	 	redirect('curso');
 	}



	public function edit()
	{
			$data['curso'] = $this->curso_model->curso($this->uri->segment(3))->row_array();
			$data['title'] = "Actualizar curso";
			$this->load->view('template/page_header');		
			$this->load->view('curso_edit',$data);
			$this->load->view('template/page_footer');
	 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idcurso');
	 	$array_item=array(
		 	
		 	'idcurso' => $this->input->post('idcurso'),
		 	'nombre' => $this->input->post('nombre'),
	 		'duracion' => $this->input->post('duracion'),
	 	);
	 	$this->curso_model->update($id,$array_item);
	 	redirect('curso');
 	}


 	public function delete()
 	{
 		$this->curso_model->delete($this->uri->segment(3));
 //		echo json_encode($data);
	 	redirect('curso/elultimo');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Curso";
	$this->load->view('template/page_header');		
  $this->load->view('curso_list',$data);
	$this->load->view('template/page_footer');
}



function curso_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->curso_model->lista_cursoes();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idcurso,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idcurso="'.$r->idcurso.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
	
			

}



public function panel()
{
	
	$data['cursos'] = $this->curso_model->lista_cursos()->result();
  	$data['title']="Curso";
	$this->load->view('template/page_header');		
  	$this->load->view('cursos/cursos',$data);
	$this->load->view('template/page_footer');
}


public function iniciar()
{
  $data['evento']=array('idcurso'=>$_GET['idcurso'],'idevento'=>$_GET['idevento']);	
	$data['cursounidades'] = $this->cursounidad_model->lista_unidades($this->uri->segment(3))->result();
  	$data['title']="Curso";
	$this->load->view('template/page_header');		
 	$this->load->view('cursos/FundamentosDeProgramacion_clases',$data);
	$this->load->view('template/page_footer');
}



public function elprimero()
{
	$data['curso'] = $this->curso_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Curso";
    $this->load->view('template/page_header');		
    $this->load->view('curso_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['curso'] = $this->curso_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Curso";
  
    $this->load->view('template/page_header');		
    $this->load->view('curso_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['curso_list']=$this->curso_model->lista_curso()->result();
	$data['curso'] = $this->curso_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Curso";
	$this->load->view('template/page_header');		
  $this->load->view('curso_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['curso_list']=$this->curso_model->lista_curso()->result();
	$data['curso'] = $this->curso_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Curso";
	$this->load->view('template/page_header');		
  $this->load->view('curso_record',$data);
	$this->load->view('template/page_footer');
}

}
