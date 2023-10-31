<?php

class Tipometodologiastema extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('tipometodologiastema_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['tipometodologiastema']=$this->tipometodologiastema_model->tipometodologiastema(1)->row_array();
		$data['title']="Lista de tipometodologiastemaes";
		$this->load->view('template/page_header');
		$this->load->view('tipometodologiastema_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva tipometodologiastema";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('tipometodologiastema_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idtipometodologiastema' => $this->input->post('idtipometodologiastema'),
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->tipometodologiastema_model->save($array_item);
	 	redirect('tipometodologiastema');
 	}



public function edit()
{
	 	$data['tipometodologiastema'] = $this->tipometodologiastema_model->tipometodologiastema($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar tipometodologiastema";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('tipometodologiastema_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idtipometodologiastema');
	 	$array_item=array(
		 	
		 	'idtipometodologiastema' => $this->input->post('idtipometodologiastema'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->tipometodologiastema_model->update($id,$array_item);
	 	redirect('tipometodologiastema');
 	}


 	public function delete()
 	{
 		$data=$this->tipometodologiastema_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('tipometodologiastema/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Tipometodologiastema";
	$this->load->view('template/page_header');		
  $this->load->view('tipometodologiastema_list',$data);
	$this->load->view('template/page_footer');
}



function tipometodologiastema_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->tipometodologiastema_model->lista_tipometodologiastemas();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idtipometodologiastema,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idtipometodologiastema="'.$r->idtipometodologiastema.'">Ver</a>');
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
	$data['tipometodologiastema'] = $this->tipometodologiastema_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Tipometodologiastema";
    $this->load->view('template/page_header');		
    $this->load->view('tipometodologiastema_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['tipometodologiastema'] = $this->tipometodologiastema_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Tipometodologiastema";
  
    $this->load->view('template/page_header');		
    $this->load->view('tipometodologiastema_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['tipometodologiastema_list']=$this->tipometodologiastema_model->lista_tipometodologiastema()->result();
	$data['tipometodologiastema'] = $this->tipometodologiastema_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Tipometodologiastema";
	$this->load->view('template/page_header');		
  $this->load->view('tipometodologiastema_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['tipometodologiastema_list']=$this->tipometodologiastema_model->lista_tipometodologiastema()->result();
	$data['tipometodologiastema'] = $this->tipometodologiastema_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Tipometodologiastema";
	$this->load->view('template/page_header');		
  $this->load->view('tipometodologiastema_record',$data);
	$this->load->view('template/page_footer');
}

}
