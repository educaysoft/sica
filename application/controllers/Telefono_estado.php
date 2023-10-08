<?php

class Telefono_estado extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('telefono_estado_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['telefono_estado']=$this->telefono_estado_model->telefono_estado(1)->row_array();
		$data['title']="Lista de telefono_estadoes";
		$this->load->view('template/page_header');
		$this->load->view('telefono_estado_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva telefono_estado";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('telefono_estado_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idtelefono_estado' => $this->input->post('idtelefono_estado'),
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->telefono_estado_model->save($array_item);
	 	redirect('telefono_estado');
 	}



public function edit()
{
	 	$data['telefono_estado'] = $this->telefono_estado_model->telefono_estado($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar telefono_estado";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('telefono_estado_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idtelefono_estado');
	 	$array_item=array(
		 	
		 	'idtelefono_estado' => $this->input->post('idtelefono_estado'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->telefono_estado_model->update($id,$array_item);
	 	redirect('telefono_estado');
 	}


 	public function delete()
 	{
 		$data=$this->telefono_estado_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('telefono_estado/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Telefono_estado";
	$this->load->view('template/page_header');		
  $this->load->view('telefono_estado_list',$data);
	$this->load->view('template/page_footer');
}



function telefono_estado_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->telefono_estado_model->lista_telefono_estados();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idtelefono_estado,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idtelefono_estado="'.$r->idtelefono_estado.'">Ver</a>');
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
	$data['telefono_estado'] = $this->telefono_estado_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Telefono_estado";
    $this->load->view('template/page_header');		
    $this->load->view('telefono_estado_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['telefono_estado'] = $this->telefono_estado_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Telefono_estado";
  
    $this->load->view('template/page_header');		
    $this->load->view('telefono_estado_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['telefono_estado_list']=$this->telefono_estado_model->lista_telefono_estado()->result();
	$data['telefono_estado'] = $this->telefono_estado_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Telefono_estado";
	$this->load->view('template/page_header');		
  $this->load->view('telefono_estado_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['telefono_estado_list']=$this->telefono_estado_model->lista_telefono_estado()->result();
	$data['telefono_estado'] = $this->telefono_estado_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Telefono_estado";
	$this->load->view('template/page_header');		
  $this->load->view('telefono_estado_record',$data);
	$this->load->view('template/page_footer');
}

}
