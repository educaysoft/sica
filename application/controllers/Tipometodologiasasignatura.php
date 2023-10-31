<?php

class Tipometodologiasasignatura extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('tipometodologiasasignatura_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['tipometodologiasasignatura']=$this->tipometodologiasasignatura_model->tipometodologiasasignatura(1)->row_array();
		$data['title']="Lista de tipometodologiasasignaturaes";
		$this->load->view('template/page_header');
		$this->load->view('tipometodologiasasignatura_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva tipometodologiasasignatura";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('tipometodologiasasignatura_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idtipometodologiasasignatura' => $this->input->post('idtipometodologiasasignatura'),
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->tipometodologiasasignatura_model->save($array_item);
	 	redirect('tipometodologiasasignatura');
 	}



public function edit()
{
	 	$data['tipometodologiasasignatura'] = $this->tipometodologiasasignatura_model->tipometodologiasasignatura($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar tipometodologiasasignatura";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('tipometodologiasasignatura_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idtipometodologiasasignatura');
	 	$array_item=array(
		 	
		 	'idtipometodologiasasignatura' => $this->input->post('idtipometodologiasasignatura'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->tipometodologiasasignatura_model->update($id,$array_item);
	 	redirect('tipometodologiasasignatura');
 	}


 	public function delete()
 	{
 		$data=$this->tipometodologiasasignatura_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('tipometodologiasasignatura/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Tipometodologiasasignatura";
	$this->load->view('template/page_header');		
  $this->load->view('tipometodologiasasignatura_list',$data);
	$this->load->view('template/page_footer');
}



function tipometodologiasasignatura_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->tipometodologiasasignatura_model->lista_tipometodologiasasignaturas();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idtipometodologiasasignatura,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idtipometodologiasasignatura="'.$r->idtipometodologiasasignatura.'">Ver</a>');
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
	$data['tipometodologiasasignatura'] = $this->tipometodologiasasignatura_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Tipometodologiasasignatura";
    $this->load->view('template/page_header');		
    $this->load->view('tipometodologiasasignatura_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['tipometodologiasasignatura'] = $this->tipometodologiasasignatura_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Tipometodologiasasignatura";
  
    $this->load->view('template/page_header');		
    $this->load->view('tipometodologiasasignatura_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['tipometodologiasasignatura_list']=$this->tipometodologiasasignatura_model->lista_tipometodologiasasignatura()->result();
	$data['tipometodologiasasignatura'] = $this->tipometodologiasasignatura_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Tipometodologiasasignatura";
	$this->load->view('template/page_header');		
  $this->load->view('tipometodologiasasignatura_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['tipometodologiasasignatura_list']=$this->tipometodologiasasignatura_model->lista_tipometodologiasasignatura()->result();
	$data['tipometodologiasasignatura'] = $this->tipometodologiasasignatura_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Tipometodologiasasignatura";
	$this->load->view('template/page_header');		
  $this->load->view('tipometodologiasasignatura_record',$data);
	$this->load->view('template/page_footer');
}

}
