<?php

class Tipoactividadacademica extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('tipoactividadacademica_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['tipoactividadacademica']=$this->tipoactividadacademica_model->tipoactividadacademica(1)->row_array();
		$data['title']="Lista de tipoactividadacademicaes";
		$this->load->view('template/page_header');
		$this->load->view('tipoactividadacademica_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva tipoactividadacademica";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('tipoactividadacademica_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idtipoactividadacademica' => $this->input->post('idtipoactividadacademica'),
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->tipoactividadacademica_model->save($array_item);
	 	redirect('tipoactividadacademica');
 	}



public function edit()
{
	 	$data['tipoactividadacademica'] = $this->tipoactividadacademica_model->tipoactividadacademica($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar tipoactividadacademica";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('tipoactividadacademica_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idtipoactividadacademica');
	 	$array_item=array(
		 	
		 	'idtipoactividadacademica' => $this->input->post('idtipoactividadacademica'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->tipoactividadacademica_model->update($id,$array_item);
	 	redirect('tipoactividadacademica');
 	}


 	public function delete()
 	{
 		$data=$this->tipoactividadacademica_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('tipoactividadacademica/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Tipoactividadacademica";
	$this->load->view('template/page_header');		
  $this->load->view('tipoactividadacademica_list',$data);
	$this->load->view('template/page_footer');
}



function tipoactividadacademica_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->tipoactividadacademica_model->lista_tipoactividadacademicas();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idtipoactividadacademica,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idtipoactividadacademica="'.$r->idtipoactividadacademica.'">Ver</a>');
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
	$data['tipoactividadacademica'] = $this->tipoactividadacademica_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Tipoactividadacademica";
    $this->load->view('template/page_header');		
    $this->load->view('tipoactividadacademica_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['tipoactividadacademica'] = $this->tipoactividadacademica_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Tipoactividadacademica";
  
    $this->load->view('template/page_header');		
    $this->load->view('tipoactividadacademica_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['tipoactividadacademica_list']=$this->tipoactividadacademica_model->lista_tipoactividadacademica()->result();
	$data['tipoactividadacademica'] = $this->tipoactividadacademica_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Tipoactividadacademica";
	$this->load->view('template/page_header');		
  $this->load->view('tipoactividadacademica_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['tipoactividadacademica_list']=$this->tipoactividadacademica_model->lista_tipoactividadacademica()->result();
	$data['tipoactividadacademica'] = $this->tipoactividadacademica_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Tipoactividadacademica";
	$this->load->view('template/page_header');		
  $this->load->view('tipoactividadacademica_record',$data);
	$this->load->view('template/page_footer');
}

}
