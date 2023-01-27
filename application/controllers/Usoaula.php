<?php
class Usoaula extends CI_Controller{

	public function __construct(){
      		parent::__construct();
      		$this->load->model('usoaula_model');
      		$this->load->model('documento_model');
      		$this->load->model('persona_model');
      		$this->load->model('evento_model');
      		$this->load->model('articulo_model');
      		$this->load->model('fechacalendario_model');
      		$this->load->model('modoevaluacion_model');
	}

	public function index(){
		$data['usoaula'] = $this->usoaula_model->elultimo();
		$data['articulos']= $this->articulo_model->lista_articulos()->result();
  		$data['personas']= $this->persona_model->lista_personas()->result();

 		// print_r($data['usoaula_list']);
  		$data['title']="Lista de Usoaulaes";
		$this->load->view('template/page_header');		
  		$this->load->view('usoaula_record',$data);
		$this->load->view('template/page_footer');
	}



	public function actual(){
	 if(isset($this->session->userdata['logged_in'])){

		$data['usoaula'] = $this->usoaula_model->usoaula($this->uri->segment(3))->row_array();


		$data['articulos']= $this->articulo_model->lista_articulos()->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['title']="Usoaula del documento";
	 
		$data['title']="Modulo de sesiones del evento";
		$this->load->view('template/page_header');		
		$this->load->view('usoaula_record',$data);
		$this->load->view('template/page_footer');
	   }else{
		$this->load->view('template/page_header.php');
		$this->load->view('login_form');
		$this->load->view('template/page_footer.php');
	   }
	}




	public function add()
	{

		$data['articulos']= $this->articulo_model->lista_articulos()->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
   		date_default_timezone_set('America/Guayaquil');
	     	$date = date("Y-m-d");
		$data['title']="Nueva sesion de eventos";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('usoaula_form',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	'idarticulo' => $this->input->post('idarticulo'),
		 	'idpersona' => $this->input->post('idpersona'),
		 	'fechaprestamo' => $this->input->post('fechaprestamo'),
		 	'fechadevolucion' => $this->input->post('fechadevolucion'),
		 	'detalle' => $this->input->post('detalle'),
		 	'horaprestamo' => $this->input->post('horaprestamo'),
		 	'horadevolucion' => $this->input->post('horadevolucion'),
	 	);
	 	$result=$this->usoaula_model->save($array_item);
	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('Fecha para este evento ya fue asignado'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 
 	}



	public function edit()
	{
	 	$data['usoaula'] = $this->usoaula_model->usoaula($this->uri->segment(3))->row_array();
		$data['articulos']= $this->articulo_model->lista_articulos()->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
 	 	$data['title'] = "Actualizar Usoaula";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('usoaula_edit',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save_edit()
	{
		$id=$this->input->post('idusoaula');
	 	$array_item=array(
		 	'idusoaula' => $this->input->post('idusoaula'),
		 	'idarticulo' => $this->input->post('idarticulo'),
		 	'idpersona' => $this->input->post('idpersona'),
		 	'fechaprestamo' => $this->input->post('fechaprestamo'),
		 	'fechadevolucion' => $this->input->post('fechadevolucion'),
		 	'detalle' => $this->input->post('detalle'),
		 	'horaprestamo' => $this->input->post('horaprestamo'),
		 	'horadevolucion' => $this->input->post('horadevolucion'),
	 	);
	 	$this->usoaula_model->update($id,$array_item);
	 	redirect('usoaula/actual/'.$id);
 	}



 	public function delete()
 	{
 		$data=$this->usoaula_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('usoaula/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}



public function listar()
{
	
	$data['eventos']= $this->evento_model->lista_eventos()->result();
  $data['title']="Sesiones de evento";
	$this->load->view('template/page_header');		
  $this->load->view('usoaula_list',$data);
	$this->load->view('template/page_footer');
}



function usoaula_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));

		if($this->uri->segment(3))
		{
			$idevento=$this->uri->segment(3);
		}else{
			$idevento=$this->input->get('idevento');
		}

	 	$data0 = $this->usoaula_model->usoaulasA($idevento);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idusoaula,$r->elevento,$r->fecha,$r->tema,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('usoaula/actual').'"   data-idusoaula="'.$r->idusoaula.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();

}




	public function reportepdf()
	{
		

	 	$data['usoaulas']= $this->usoaula_model->usoaulasA($this->uri->segment(3))->result();

		$data['title']="Evento";
	//	$this->load->view('template/page_header');		
		$this->load->view('usoaula_list_pdf',$data);
//		$this->load->view('template/page_footer');
	}





public function elprimero()
{
  	$data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['usoaula'] = $this->usoaula_model->elprimero();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
  if(!empty($data))
  {
  		$data['eventos']= $this->evento_model->lista_eventos()->result();

  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Usoaula del documento";
    $this->load->view('template/page_header');		
    $this->load->view('usoaula_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
  $data['documentos']= $this->documento_model->lista_documentos()->result();
  		$data['temas']= $this->tema_model->lista_temas()->result();
	$data['usoaula'] = $this->usoaula_model->elultimo();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
  if(!empty($data))
  {
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Usoaula del documento";
  
    $this->load->view('template/page_header');		
    $this->load->view('usoaula_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['usoaula_list']=$this->usoaula_model->lista_usoaula()->result();
	$data['documentos']= $this->documento_model->lista_documentos()->result();
  		$data['temas']= $this->tema_model->lista_temas()->result();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
	$data['usoaula'] = $this->usoaula_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['eventos']= $this->evento_model->lista_eventos()->result();
    $data['title']="Usoaula del documento";
 // $data['title']="Correo";
	$this->load->view('template/page_header');		
  $this->load->view('usoaula_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['usoaula_list']=$this->usoaula_model->lista_usoaula()->result();
  $data['documentos']= $this->documento_model->lista_documentos()->result();
  		$data['temas']= $this->tema_model->lista_temas()->result();
	$data['usoaula'] = $this->usoaula_model->anterior($this->uri->segment(3))->row_array();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
 	$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
 // $data['title']="Correo";
    $data['title']="Usoaula del documento";
	$this->load->view('template/page_header');		
  $this->load->view('usoaula_record',$data);
	$this->load->view('template/page_footer');
}







public function get_usoaula() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->get('idusoaula')) 
    {
        $this->db->select('*');
    	$this->db->order_by("fecha","asc");
        $this->db->where(array('idusoaula' => $this->input->get('idusoaula')));
        $query = $this->db->get('usoaula');
	$data=$query->result();
	echo json_encode($data);
	}
}











}
