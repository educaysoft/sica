<?php

class Diasemana extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('diasemana_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['diasemana']=$this->diasemana_model->diasemana(1)->row_array();
		$data['title']="Lista de diasemanaes";
		$this->load->view('template/page_header');
		$this->load->view('diasemana_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva diasemana";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('diasemana_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'iddiasemana' => $this->input->post('iddiasemana'),
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->diasemana_model->save($array_item);
	 	redirect('diasemana');
 	}



public function edit()
{
	 	$data['diasemana'] = $this->diasemana_model->diasemana($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar diasemana";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('diasemana_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('iddiasemana');
	 	$array_item=array(
		 	
		 	'iddiasemana' => $this->input->post('iddiasemana'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->diasemana_model->update($id,$array_item);
	 	redirect('diasemana');
 	}


 	public function delete()
 	{
 		$data=$this->diasemana_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('diasemana/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Diasemana";
	$this->load->view('template/page_header');		
  $this->load->view('diasemana_list',$data);
	$this->load->view('template/page_footer');
}



function diasemana_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->diasemana_model->lista_diasemanas();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->iddiasemana,$r->numero,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('diasemana/actual').'"     data-iddiasemana="'.$r->iddiasemana.'">Ver</a>');
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
	$data['diasemana'] = $this->diasemana_model->diasemana($this->uri->segment(3))->row_array();
  if(!empty($data))
  {
    $data['title']="Diasemana";
    $this->load->view('template/page_header');		
    $this->load->view('diasemana_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }












public function elprimero()
{
	$data['diasemana'] = $this->diasemana_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Diasemana";
    $this->load->view('template/page_header');		
    $this->load->view('diasemana_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['diasemana'] = $this->diasemana_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Diasemana";
  
    $this->load->view('template/page_header');		
    $this->load->view('diasemana_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['diasemana_list']=$this->diasemana_model->lista_diasemana()->result();
	$data['diasemana'] = $this->diasemana_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Diasemana";
	$this->load->view('template/page_header');		
  $this->load->view('diasemana_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['diasemana_list']=$this->diasemana_model->lista_diasemana()->result();
	$data['diasemana'] = $this->diasemana_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Diasemana";
	$this->load->view('template/page_header');		
  $this->load->view('diasemana_record',$data);
	$this->load->view('template/page_footer');
}

}
