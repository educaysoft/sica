<?php
class Prestamoarticulo extends CI_Controller{

	public function __construct(){
      		parent::__construct();
      		$this->load->model('prestamoarticulo_model');
      		$this->load->model('documento_model');
      		$this->load->model('persona_model');
      		$this->load->model('evento_model');
      		$this->load->model('articulo_model');
      		$this->load->model('fechacalendario_model');
      		$this->load->model('modoevaluacion_model');
	}

	public function index(){
		$data['articulos']= $this->articulo_model->lista_articulos()->result();
  		$data['personas']= $this->persona_model->lista_personas()->result();

 		// print_r($data['prestamoarticulo_list']);
  		$data['title']="Lista de Prestamoarticuloes";
		$this->load->view('template/page_header');		
  		$this->load->view('prestamoarticulo_record',$data);
		$this->load->view('template/page_footer');
	}



	public function actual(){
	 if(isset($this->session->userdata['logged_in'])){

		$data['prestamoarticulo'] = $this->prestamoarticulo_model->prestamoarticulo($this->uri->segment(3))->row_array();

		$data['documentos']= $this->documento_model->lista_documentos()->result();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
		$data['eventos']= $this->evento_model->lista_eventos()->result();

		$data['evento'] = $this->evento_model->evento($data['prestamoarticulo']['idevento'])->row_array();
  		$data['temas']= $this->tema_model->lista_temass($data['evento']['idsilabo'])->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['title']="Prestamoarticulo del documento";
	 
		$data['title']="Modulo de sesiones del evento";
		$this->load->view('template/page_header');		
		$this->load->view('prestamoarticulo_record',$data);
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
	 	$this->load->view('prestamoarticulo_form',$data);
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
	 	$result=$this->prestamoarticulo_model->save($array_item);
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
	 	$data['prestamoarticulo'] = $this->prestamoarticulo_model->prestamoarticulo($this->uri->segment(3))->row_array();
		$data['evento'] = $this->evento_model->evento($data['prestamoarticulo']['idevento'])->row_array();

		$data['eventos']= $this->evento_model->lista_eventos()->result();
  		$data['temas']= $this->tema_model->lista_temass($data['evento']['idsilabo'])->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
  		$data['documentos']= $this->documento_model->lista_documentos()->result();
 	 	$data['title'] = "Actualizar Prestamoarticulo";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('prestamoarticulo_edit',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save_edit()
	{
		$id=$this->input->post('idprestamoarticulo');
	 	$array_item=array(
		 	'idprestamoarticulo' => $this->input->post('idprestamoarticulo'),
		 	'idarticulo' => $this->input->post('idarticulo'),
		 	'idpersona' => $this->input->post('idpersona'),
		 	'fechaprestamo' => $this->input->post('fechaprestamo'),
		 	'fechadevolucion' => $this->input->post('fechadevolucion'),
		 	'detalle' => $this->input->post('detalle'),
		 	'horaprestamo' => $this->input->post('horaprestamo'),
		 	'horadevolucion' => $this->input->post('horadevolucion'),
	 	);
	 	$this->prestamoarticulo_model->update($id,$array_item);
	 	redirect('prestamoarticulo/actual/'.$id);
 	}



 	public function delete()
 	{
 		$data=$this->prestamoarticulo_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('prestamoarticulo/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}



public function listar()
{
	
	$data['eventos']= $this->evento_model->lista_eventos()->result();
  $data['title']="Sesiones de evento";
	$this->load->view('template/page_header');		
  $this->load->view('prestamoarticulo_list',$data);
	$this->load->view('template/page_footer');
}



function prestamoarticulo_data()
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

	 	$data0 = $this->prestamoarticulo_model->prestamoarticulosA($idevento);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idprestamoarticulo,$r->elevento,$r->fecha,$r->tema,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('prestamoarticulo/actual').'"   data-idprestamoarticulo="'.$r->idprestamoarticulo.'">Ver</a>');
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
		

	 	$data['prestamoarticulos']= $this->prestamoarticulo_model->prestamoarticulosA($this->uri->segment(3))->result();

		$data['title']="Evento";
	//	$this->load->view('template/page_header');		
		$this->load->view('prestamoarticulo_list_pdf',$data);
//		$this->load->view('template/page_footer');
	}





public function elprimero()
{
  	$data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['prestamoarticulo'] = $this->prestamoarticulo_model->elprimero();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
  if(!empty($data))
  {
  		$data['eventos']= $this->evento_model->lista_eventos()->result();

  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Prestamoarticulo del documento";
    $this->load->view('template/page_header');		
    $this->load->view('prestamoarticulo_record',$data);
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
	$data['prestamoarticulo'] = $this->prestamoarticulo_model->elultimo();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
  if(!empty($data))
  {
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Prestamoarticulo del documento";
  
    $this->load->view('template/page_header');		
    $this->load->view('prestamoarticulo_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['prestamoarticulo_list']=$this->prestamoarticulo_model->lista_prestamoarticulo()->result();
	$data['documentos']= $this->documento_model->lista_documentos()->result();
  		$data['temas']= $this->tema_model->lista_temas()->result();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
	$data['prestamoarticulo'] = $this->prestamoarticulo_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['eventos']= $this->evento_model->lista_eventos()->result();
    $data['title']="Prestamoarticulo del documento";
 // $data['title']="Correo";
	$this->load->view('template/page_header');		
  $this->load->view('prestamoarticulo_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['prestamoarticulo_list']=$this->prestamoarticulo_model->lista_prestamoarticulo()->result();
  $data['documentos']= $this->documento_model->lista_documentos()->result();
  		$data['temas']= $this->tema_model->lista_temas()->result();
	$data['prestamoarticulo'] = $this->prestamoarticulo_model->anterior($this->uri->segment(3))->row_array();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
 	$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
 // $data['title']="Correo";
    $data['title']="Prestamoarticulo del documento";
	$this->load->view('template/page_header');		
  $this->load->view('prestamoarticulo_record',$data);
	$this->load->view('template/page_footer');
}







public function get_prestamoarticulo() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->get('idprestamoarticulo')) 
    {
        $this->db->select('*');
    	$this->db->order_by("fecha","asc");
        $this->db->where(array('idprestamoarticulo' => $this->input->get('idprestamoarticulo')));
        $query = $this->db->get('prestamoarticulo');
	$data=$query->result();
	echo json_encode($data);
	}
}











}
