<?php

class Ciclo extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('ciclo_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['ciclo']=$this->ciclo_model->ciclo(1)->row_array();
		$data['title']="Lista de cicloes";
		$this->load->view('template/page_header');
		$this->load->view('ciclo_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva ciclo";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('ciclo_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idciclo' => $this->input->post('idciclo'),
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->ciclo_model->save($array_item);
	 	redirect('ciclo');
 	}



public function edit()
{
	 	$data['ciclo'] = $this->ciclo_model->ciclo($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar ciclo";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('ciclo_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idciclo');
	 	$array_item=array(
		 	
		 	'idciclo' => $this->input->post('idciclo'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->ciclo_model->update($id,$array_item);
	 	redirect('ciclo');
 	}


 	public function delete()
 	{
 		$data=$this->ciclo_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('ciclo/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Ciclo";
	$this->load->view('template/page_header');		
  $this->load->view('ciclo_list',$data);
	$this->load->view('template/page_footer');
}



function ciclo_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->ciclo_model->lista_ciclos();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idciclo,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idciclo="'.$r->idciclo.'">Ver</a>');
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
	$data['ciclo'] = $this->ciclo_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Ciclo";
    $this->load->view('template/page_header');		
    $this->load->view('ciclo_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['ciclo'] = $this->ciclo_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Ciclo";
  
    $this->load->view('template/page_header');		
    $this->load->view('ciclo_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['ciclo_list']=$this->ciclo_model->lista_ciclo()->result();
	$data['ciclo'] = $this->ciclo_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Ciclo";
	$this->load->view('template/page_header');		
  $this->load->view('ciclo_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['ciclo_list']=$this->ciclo_model->lista_ciclo()->result();
	$data['ciclo'] = $this->ciclo_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Ciclo";
	$this->load->view('template/page_header');		
  $this->load->view('ciclo_record',$data);
	$this->load->view('template/page_footer');
}

}
