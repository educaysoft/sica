<?php

class Tipohorasasignatura extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('tipohorasasignatura_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['tipohorasasignatura']=$this->tipohorasasignatura_model->tipohorasasignatura(1)->row_array();
		$data['title']="Lista de tipohorasasignaturaes";
		$this->load->view('template/page_header');
		$this->load->view('tipohorasasignatura_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva tipohorasasignatura";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('tipohorasasignatura_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idtipohorasasignatura' => $this->input->post('idtipohorasasignatura'),
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->tipohorasasignatura_model->save($array_item);
	 	redirect('tipohorasasignatura');
 	}



public function edit()
{
	 	$data['tipohorasasignatura'] = $this->tipohorasasignatura_model->tipohorasasignatura($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar tipohorasasignatura";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('tipohorasasignatura_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idtipohorasasignatura');
	 	$array_item=array(
		 	
		 	'idtipohorasasignatura' => $this->input->post('idtipohorasasignatura'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->tipohorasasignatura_model->update($id,$array_item);
	 	redirect('tipohorasasignatura');
 	}


 	public function delete()
 	{
 		$data=$this->tipohorasasignatura_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('tipohorasasignatura/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Tipohorasasignatura";
	$this->load->view('template/page_header');		
  $this->load->view('tipohorasasignatura_list',$data);
	$this->load->view('template/page_footer');
}



function tipohorasasignatura_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->tipohorasasignatura_model->lista_tipohorasasignaturas();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idtipohorasasignatura,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idtipohorasasignatura="'.$r->idtipohorasasignatura.'">Ver</a>');
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
	$data['tipohorasasignatura'] = $this->tipohorasasignatura_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Tipohorasasignatura";
    $this->load->view('template/page_header');		
    $this->load->view('tipohorasasignatura_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['tipohorasasignatura'] = $this->tipohorasasignatura_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Tipohorasasignatura";
  
    $this->load->view('template/page_header');		
    $this->load->view('tipohorasasignatura_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['tipohorasasignatura_list']=$this->tipohorasasignatura_model->lista_tipohorasasignatura()->result();
	$data['tipohorasasignatura'] = $this->tipohorasasignatura_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Tipohorasasignatura";
	$this->load->view('template/page_header');		
  $this->load->view('tipohorasasignatura_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['tipohorasasignatura_list']=$this->tipohorasasignatura_model->lista_tipohorasasignatura()->result();
	$data['tipohorasasignatura'] = $this->tipohorasasignatura_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Tipohorasasignatura";
	$this->load->view('template/page_header');		
  $this->load->view('tipohorasasignatura_record',$data);
	$this->load->view('template/page_footer');
}

}
