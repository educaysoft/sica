<?php

class Portafoliotipo extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('portafoliotipo_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['portafoliotipo']=$this->portafoliotipo_model->portafoliotipo(1)->row_array();
		$data['title']="Lista de portafoliotipoes";
		$this->load->view('template/page_header');
		$this->load->view('portafoliotipo_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva portafoliotipo";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('portafoliotipo_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idportafoliotipo' => $this->input->post('idportafoliotipo'),
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->portafoliotipo_model->save($array_item);
	 	redirect('portafoliotipo');
 	}



public function edit()
{
	 	$data['portafoliotipo'] = $this->portafoliotipo_model->portafoliotipo($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar portafoliotipo";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('portafoliotipo_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idportafoliotipo');
	 	$array_item=array(
		 	
		 	'idportafoliotipo' => $this->input->post('idportafoliotipo'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->portafoliotipo_model->update($id,$array_item);
	 	redirect('portafoliotipo');
 	}


 	public function delete()
 	{
 		$data=$this->portafoliotipo_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('portafoliotipo/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Portafoliotipo";
	$this->load->view('template/page_header');		
  $this->load->view('portafoliotipo_list',$data);
	$this->load->view('template/page_footer');
}



function portafoliotipo_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->portafoliotipo_model->lista_portafoliotipos();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idportafoliotipo,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idportafoliotipo="'.$r->idportafoliotipo.'">Ver</a>');
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
	$data['portafoliotipo'] = $this->portafoliotipo_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Portafoliotipo";
    $this->load->view('template/page_header');		
    $this->load->view('portafoliotipo_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['portafoliotipo'] = $this->portafoliotipo_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Portafoliotipo";
  
    $this->load->view('template/page_header');		
    $this->load->view('portafoliotipo_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['portafoliotipo_list']=$this->portafoliotipo_model->lista_portafoliotipo()->result();
	$data['portafoliotipo'] = $this->portafoliotipo_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Portafoliotipo";
	$this->load->view('template/page_header');		
  $this->load->view('portafoliotipo_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['portafoliotipo_list']=$this->portafoliotipo_model->lista_portafoliotipo()->result();
	$data['portafoliotipo'] = $this->portafoliotipo_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Portafoliotipo";
	$this->load->view('template/page_header');		
  $this->load->view('portafoliotipo_record',$data);
	$this->load->view('template/page_footer');
}

}
