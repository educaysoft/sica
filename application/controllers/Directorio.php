<?php

class Directorio extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('directorio_model');
	  $this->load->model('ordenador_model');
}

public function index(){
  $data['directorio']=$this->directorio_model->directorio(1)->row_array();
	$data['ordenadores']= $this->ordenador_model->lista_ordenadores()->result();
 // print_r($data['usuario_list']);
  $data['title']="Lista de directorios";
	$this->load->view('template/page_header');		
        if(isset($data['directorio'])){
  $this->load->view('directorio_record',$data);
        }else{
	echo "no hay registro";
	}
	$this->load->view('template/page_footer');
}


public function add()
{
		$data['ordenadores']= $this->ordenador_model->lista_ordenadores()->result();
		$data['title']="Nuevo directorio";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('directorio_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'iddirectorio' => $this->input->post('iddirectorio'),
		 	'nombre' => $this->input->post('nombre'),
			'idordenador' => $this->input->post('idordenador'),
			'ruta' => $this->input->post('ruta'),
			'descripcion' => $this->input->post('descripcion'),
	 	);
	 	$this->directorio_model->save($array_item);
	 	redirect('directorio');
 	}



public function edit()
{
	 	$data['directorio'] = $this->directorio_model->directorio($this->uri->segment(3))->row_array();
		$data['ordenadores']= $this->ordenador_model->lista_ordenadores()->result();
 	 	$data['title'] = "Actualizar directorio";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('directorio_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('iddirectorio');
	 	$array_item=array(
		 	
		 	'iddirectorio' => $this->input->post('iddirectorio'),
			'idordenador' => $this->input->post('idordenador'),
			'ruta' => $this->input->post('ruta'),
			'descripcion' => $this->input->post('descripcion'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->directorio_model->update($id,$array_item);
	 	redirect('directorio');
 	}


public function listar()
{
	
  $data['title']="Directorios";
	$this->load->view('template/page_header');		
  $this->load->view('directorio_list',$data);
	$this->load->view('template/page_footer');
}



function directorio_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->directorio_model->lista_directoriosA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->iddirectorio,$r->elordenador,$r->nombre,$r->ruta,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-iddirectorio="'.$r->iddirectorio.'">Ver</a>');
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
	$data['directorio'] = $this->directorio_model->elprimero();
  if(!empty($data))
  {
	$data['ordenadores']= $this->ordenador_model->lista_ordenadores()->result();
    	$data['title']="Directorio";
    	$this->load->view('template/page_header');		
    	$this->load->view('directorio_record',$data);
    	$this->load->view('template/page_footer');
  }else{
    	$this->load->view('template/page_header');		
    	$this->load->view('registro_vacio');
    	$this->load->view('template/page_footer');
  }
 }


public function elultimo()
{
	$data['directorio'] = $this->directorio_model->elultimo();
  if(!empty($data))
  {
	$data['ordenadores']= $this->ordenador_model->lista_ordenadores()->result();
    	$data['title']="Directorio";
    	$this->load->view('template/page_header');		
    	$this->load->view('directorio_record',$data);
    	$this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}




public function siguiente(){
 // $data['directorio_list']=$this->directorio_model->lista_directorio()->result();
	$data['directorio'] = $this->directorio_model->siguiente($this->uri->segment(3))->row_array();
  $data['ordenadores']= $this->ordenador_model->lista_ordenadores()->result();
  $data['title']="Documento";
	$this->load->view('template/page_header');		
  $this->load->view('directorio_record',$data);
	$this->load->view('template/page_footer');
}


public function anterior(){
 // $data['directorio_list']=$this->directorio_model->lista_directorio()->result();
	$data['directorio'] = $this->directorio_model->anterior($this->uri->segment(3))->row_array();
  $data['ordenadores']= $this->ordenador_model->lista_ordenador()->result();
  $data['title']="Documento";
	$this->load->view('template/page_header');		
  $this->load->view('directorio_record',$data);
	$this->load->view('template/page_footer');
}




}
