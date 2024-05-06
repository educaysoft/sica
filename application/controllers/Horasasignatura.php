<?php

class Horasasignatura extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('horasasignatura_model');
  	  $this->load->model('asignatura_model');
  	  $this->load->model('tipohorasasignatura_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  		$data['horasasignatura']=$this->horasasignatura_model->lista_horasasignaturas()->row_array();
  		$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
  		$data['tipohorasasignaturas']= $this->tipohorasasignatura_model->lista_tipohorasasignaturas()->result();
			
		$data['title']="Lista de horasasignaturas";
		$this->load->view('template/page_header');
		$this->load->view('horasasignatura_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}

 }


public function actual(){
 if(isset($this->session->userdata['logged_in'])){
        $data['horasasignatura'] = $this->horasasignatura_model->horasasignatura($this->uri->segment(3))->row_array();
        $data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
        $data['tipohorasasignaturas']= $this->tipohorasasignatura_model->lista_tipohorasasignaturas()->result();
        $data['title']="Modulo de Telefonos";
        $this->load->view('template/page_header');		
        $this->load->view('horasasignatura_record',$data);
        $this->load->view('template/page_footer');
   }else{
        $this->load->view('template/page_header.php');
        $this->load->view('login_form');
        $this->load->view('template/page_footer.php');
   }
}






public function add()
{

	if($this->uri->segment(3))
	{
		$data['asignaturas']= $this->asignatura_model->asignaturas1($this->uri->segment(3))->result();

	}else{

		$data['asignaturas']= $this->asignatura_model->lista_asignaturasA()->result();
	}


  	$data['tipohorasasignaturas']= $this->tipohorasasignatura_model->lista_tipohorasasignaturas()->result();
		$data['title']="Nueva Horasasignatura";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('horasasignatura_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idhorasasignatura' => $this->input->post('idhorasasignatura'),
		 	'cantidad' => $this->input->post('cantidad'),
			'idasignatura' => $this->input->post('idasignatura'),
			'idtipohorasasignatura' => $this->input->post('idtipohorasasignatura'),
	 	);
	 	$this->horasasignatura_model->save($array_item);
	 	//redirect('horasasignatura');
		echo "<script  language='JavaScript'>window.history.go(-2);</script>";
 	}



public function edit()
{
	 	$data['horasasignatura'] = $this->horasasignatura_model->horasasignatura($this->uri->segment(3))->row_array();
		$data['asignaturas']= $this->asignatura_model->lista_asignaturasA(0)->result();
  		$data['tipohorasasignaturas']= $this->tipohorasasignatura_model->lista_tipohorasasignaturas()->result();
 	 	$data['title'] = "Actualizar Horasasignatura";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('horasasignatura_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idhorasasignatura');
	 	$array_item=array(
		 	
		 	'idhorasasignatura' => $this->input->post('idhorasasignatura'),
		 	'cantidad' => $this->input->post('cantidad'),
			'idasignatura' => $this->input->post('idasignatura'),
			'idtipohorasasignatura' => $this->input->post('idtipohorasasignatura'),
	 	);
	 	$this->horasasignatura_model->update($id,$array_item);
	 	//redirect('horasasignatura');
		echo "<script  language='JavaScript'>window.history.go(-2);</script>";
 	}


 	public function delete()
 	{
 		$data=$this->horasasignatura_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('horasasignatura/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Horasasignaturas";
	$this->load->view('template/page_header');		
  $this->load->view('horasasignatura_list',$data);
	$this->load->view('template/page_footer');
}



function horasasignatura_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->horasasignatura_model->lista_horasasignaturasA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idhorasasignatura,$r->area,$r->malla,$r->laasignatura,$r->descripcion,$r->cantidad,
			$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('horasasignatura/actual').'"  data-idhorasasignatura="'.$r->idhorasasignatura.'">Ver</a>');
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
	$data['horasasignatura'] = $this->horasasignatura_model->elprimero();
  	$data['tipohorasasignaturas']= $this->tipohorasasignatura_model->lista_tipohorasasignaturas()->result();
  if(!empty($data))
  {
  	$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
    $data['title']="Horasasignatura";
    $this->load->view('template/page_header');		
    $this->load->view('horasasignatura_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['horasasignatura'] = $this->horasasignatura_model->elultimo();
  	$data['tipohorasasignaturas']= $this->tipohorasasignatura_model->lista_tipohorasasignaturas()->result();
  if(!empty($data))
  {
  	$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
    $data['title']="Horasasignatura";
  
    $this->load->view('template/page_header');		
    $this->load->view('horasasignatura_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['horasasignatura_list']=$this->horasasignatura_model->lista_horasasignatura()->result();
	$data['horasasignatura'] = $this->horasasignatura_model->siguiente($this->uri->segment(3))->row_array();
  	$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
  	$data['tipohorasasignaturas']= $this->tipohorasasignatura_model->lista_tipohorasasignaturas()->result();
  $data['title']="Horasasignatura";
	$this->load->view('template/page_header');		
  $this->load->view('horasasignatura_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['horasasignatura_list']=$this->horasasignatura_model->lista_horasasignatura()->result();
	$data['horasasignatura'] = $this->horasasignatura_model->anterior($this->uri->segment(3))->row_array();
 	$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
  	$data['tipohorasasignaturas']= $this->tipohorasasignatura_model->lista_tipohorasasignaturas()->result();
  $data['title']="Horasasignatura";
	$this->load->view('template/page_header');		
  $this->load->view('horasasignatura_record',$data);
	$this->load->view('template/page_footer');
}




}
