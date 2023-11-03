<?php

class Tipoevento extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('tipoevento_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['tipoevento']=$this->tipoevento_model->tipoevento(1)->row_array();
		$data['title']="Lista de tipoeventoes";
		$this->load->view('template/page_header');
		$this->load->view('tipoevento_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva tipoevento";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('tipoevento_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idtipoevento' => $this->input->post('idtipoevento'),
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->tipoevento_model->save($array_item);
	 	redirect('tipoevento');
 	}



public function edit()
{
	 	$data['tipoevento'] = $this->tipoevento_model->tipoevento($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar tipoevento";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('tipoevento_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idtipoevento');
	 	$array_item=array(
		 	
		 	'idtipoevento' => $this->input->post('idtipoevento'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->tipoevento_model->update($id,$array_item);
	 	redirect('tipoevento');
 	}


 	public function delete()
 	{
 		$data=$this->tipoevento_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('tipoevento/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Tipoevento";
	$this->load->view('template/page_header');		
  $this->load->view('tipoevento_list',$data);
	$this->load->view('template/page_footer');
}



function tipoevento_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->tipoevento_model->lista_tipoeventos();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idtipoevento,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('tipoevento/actual').'" data-idtipoevento="'.$r->idtipoevento.'">Ver</a>');
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
	$data['tipoevento'] = $this->tipoevento_model->tipoevento($this->uri->segment(3))->row_array();
  	if(!empty($data))
  	{
    		$data['title']="Tipoevento";
    		$this->load->view('template/page_header');		
    		$this->load->view('tipoevento_record',$data);
    		$this->load->view('template/page_footer');
  	}else{
    		$this->load->view('template/page_header');		
    		$this->load->view('registro_vacio');
    		$this->load->view('template/page_footer');
  	}
 }










public function elprimero()
{
	$data['tipoevento'] = $this->tipoevento_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Tipoevento";
    $this->load->view('template/page_header');		
    $this->load->view('tipoevento_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['tipoevento'] = $this->tipoevento_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Tipoevento";
  
    $this->load->view('template/page_header');		
    $this->load->view('tipoevento_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['tipoevento_list']=$this->tipoevento_model->lista_tipoevento()->result();
	$data['tipoevento'] = $this->tipoevento_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Tipoevento";
	$this->load->view('template/page_header');		
  $this->load->view('tipoevento_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['tipoevento_list']=$this->tipoevento_model->lista_tipoevento()->result();
	$data['tipoevento'] = $this->tipoevento_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Tipoevento";
	$this->load->view('template/page_header');		
  $this->load->view('tipoevento_record',$data);
	$this->load->view('template/page_footer');
}

}
