<?php

class Estadodistributivo extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('estadodistributivo_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['estadodistributivo']=$this->estadodistributivo_model->estadodistributivo(1)->row_array();
		$data['title']="Lista de estadodistributivoes";
		$this->load->view('template/page_header');
		$this->load->view('estadodistributivo_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva estadodistributivo";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('estadodistributivo_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idestadodistributivo' => $this->input->post('idestadodistributivo'),
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->estadodistributivo_model->save($array_item);
	 	redirect('estadodistributivo');
 	}



public function edit()
{
	 	$data['estadodistributivo'] = $this->estadodistributivo_model->estadodistributivo($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar estadodistributivo";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('estadodistributivo_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idestadodistributivo');
	 	$array_item=array(
		 	
		 	'idestadodistributivo' => $this->input->post('idestadodistributivo'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->estadodistributivo_model->update($id,$array_item);
	 	redirect('estadodistributivo');
 	}


 	public function delete()
 	{
 		$data=$this->estadodistributivo_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('estadodistributivo/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Estadodistributivo";
	$this->load->view('template/page_header');		
  $this->load->view('estadodistributivo_list',$data);
	$this->load->view('template/page_footer');
}



function estadodistributivo_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->estadodistributivo_model->lista_estadodistributivos();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idestadodistributivo,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idestadodistributivo="'.$r->idestadodistributivo.'">Ver</a>');
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
	$data['estadodistributivo'] = $this->estadodistributivo_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Estadodistributivo";
    $this->load->view('template/page_header');		
    $this->load->view('estadodistributivo_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['estadodistributivo'] = $this->estadodistributivo_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Estadodistributivo";
  
    $this->load->view('template/page_header');		
    $this->load->view('estadodistributivo_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['estadodistributivo_list']=$this->estadodistributivo_model->lista_estadodistributivo()->result();
	$data['estadodistributivo'] = $this->estadodistributivo_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Estadodistributivo";
	$this->load->view('template/page_header');		
  $this->load->view('estadodistributivo_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['estadodistributivo_list']=$this->estadodistributivo_model->lista_estadodistributivo()->result();
	$data['estadodistributivo'] = $this->estadodistributivo_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Estadodistributivo";
	$this->load->view('template/page_header');		
  $this->load->view('estadodistributivo_record',$data);
	$this->load->view('template/page_footer');
}

}
