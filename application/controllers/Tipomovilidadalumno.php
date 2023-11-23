<?php

class Tipomovilidadalumno extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('tipomovilidadalumno_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['tipomovilidadalumno']=$this->tipomovilidadalumno_model->tipomovilidadalumno(1)->row_array();
		$data['title']="Lista de tipomovilidadalumnoes";
		$this->load->view('template/page_header');
		$this->load->view('tipomovilidadalumno_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva tipomovilidadalumno";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('tipomovilidadalumno_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idtipomovilidadalumno' => $this->input->post('idtipomovilidadalumno'),
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->tipomovilidadalumno_model->save($array_item);
	 	redirect('tipomovilidadalumno');
 	}



public function edit()
{
	 	$data['tipomovilidadalumno'] = $this->tipomovilidadalumno_model->tipomovilidadalumno($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar tipomovilidadalumno";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('tipomovilidadalumno_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idtipomovilidadalumno');
	 	$array_item=array(
		 	
		 	'idtipomovilidadalumno' => $this->input->post('idtipomovilidadalumno'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->tipomovilidadalumno_model->update($id,$array_item);
	 	redirect('tipomovilidadalumno');
 	}


 	public function delete()
 	{
 		$data=$this->tipomovilidadalumno_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('tipomovilidadalumno/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Tipomovilidadalumno";
	$this->load->view('template/page_header');		
  $this->load->view('tipomovilidadalumno_list',$data);
	$this->load->view('template/page_footer');
}



function tipomovilidadalumno_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->tipomovilidadalumno_model->lista_tipomovilidadalumnos();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idtipomovilidadalumno,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('tipomovilidadalumno/actual').'" data-idtipomovilidadalumno="'.$r->idtipomovilidadalumno.'">Ver</a>');
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
	$data['tipomovilidadalumno'] = $this->tipomovilidadalumno_model->tipomovilidadalumno($this->uri->segment(3))->row_array();
  	if(!empty($data))
  	{
    		$data['title']="Tipomovilidadalumno";
    		$this->load->view('template/page_header');		
    		$this->load->view('tipomovilidadalumno_record',$data);
    		$this->load->view('template/page_footer');
  	}else{
    		$this->load->view('template/page_header');		
    		$this->load->view('registro_vacio');
    		$this->load->view('template/page_footer');
  	}
 }










public function elprimero()
{
	$data['tipomovilidadalumno'] = $this->tipomovilidadalumno_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Tipomovilidadalumno";
    $this->load->view('template/page_header');		
    $this->load->view('tipomovilidadalumno_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['tipomovilidadalumno'] = $this->tipomovilidadalumno_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Tipomovilidadalumno";
  
    $this->load->view('template/page_header');		
    $this->load->view('tipomovilidadalumno_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['tipomovilidadalumno_list']=$this->tipomovilidadalumno_model->lista_tipomovilidadalumno()->result();
	$data['tipomovilidadalumno'] = $this->tipomovilidadalumno_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Tipomovilidadalumno";
	$this->load->view('template/page_header');		
  $this->load->view('tipomovilidadalumno_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['tipomovilidadalumno_list']=$this->tipomovilidadalumno_model->lista_tipomovilidadalumno()->result();
	$data['tipomovilidadalumno'] = $this->tipomovilidadalumno_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Tipomovilidadalumno";
	$this->load->view('template/page_header');		
  $this->load->view('tipomovilidadalumno_record',$data);
	$this->load->view('template/page_footer');
}

}
