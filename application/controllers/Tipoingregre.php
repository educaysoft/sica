<?php

class Tipoingregre extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('tipoingregre_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['tipoingregre']=$this->tipoingregre_model->elultimo();
		$data['title']="Lista de tipoingregrees";
		$this->load->view('template/page_header');
		$this->load->view('tipoingregre_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva tipoingregre";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('tipoingregre_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->tipoingregre_model->save($array_item);
	 	redirect('tipoingregre');
 	}



public function edit()
{
	 	$data['tipoingregre'] = $this->tipoingregre_model->tipoingregre($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar tipoingregre";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('tipoingregre_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idtipoingregre');
	 	$array_item=array(
		 	
		 	'idtipoingregre' => $this->input->post('idtipoingregre'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->tipoingregre_model->update($id,$array_item);
	 	redirect('tipoingregre');
 	}


 	public function delete()
 	{
 		$this->tipoingregre_model->delete($this->uri->segment(3));
	 	redirect('tipoingregre/elultimo');
 	}


public function listar()
{
	
  $data['title']="Tipoingregre";
	$this->load->view('template/page_header');		
  $this->load->view('tipoingregre_list',$data);
	$this->load->view('template/page_footer');
}



function tipoingregre_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->tipoingregre_model->lista_tipoingregrees();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idtipoingregre,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idtipoingregre="'.$r->idtipoingregre.'">Ver</a>');
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
	$data['tipoingregre'] = $this->tipoingregre_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Tipoingregre";
    $this->load->view('template/page_header');		
    $this->load->view('tipoingregre_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['tipoingregre'] = $this->tipoingregre_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Tipoingregre";
  
    $this->load->view('template/page_header');		
    $this->load->view('tipoingregre_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['tipoingregre_list']=$this->tipoingregre_model->lista_tipoingregre()->result();
	$data['tipoingregre'] = $this->tipoingregre_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Tipoingregre";
	$this->load->view('template/page_header');		
  $this->load->view('tipoingregre_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['tipoingregre_list']=$this->tipoingregre_model->lista_tipoingregre()->result();
	$data['tipoingregre'] = $this->tipoingregre_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Tipoingregre";
	$this->load->view('template/page_header');		
  $this->load->view('tipoingregre_record',$data);
	$this->load->view('template/page_footer');
}

}
