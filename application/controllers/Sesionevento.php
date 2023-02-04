<?php
class Sesionevento extends CI_Controller{

	public function __construct(){
      		parent::__construct();
      		$this->load->model('sesionevento_model');
      		$this->load->model('documento_model');
      		$this->load->model('persona_model');
      		$this->load->model('evento_model');
      		$this->load->model('unidadsilabo_model');
      		$this->load->model('tema_model');
      		$this->load->model('fechacalendario_model');
      		$this->load->model('modoevaluacion_model');
	}

	public function index(){
		$data['sesionevento'] = $this->sesionevento_model->elultimo();
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
		$data['evento'] = $this->evento_model->evento($data['sesionevento']['idevento'])->row_array();
  		$data['temas']= $this->tema_model->lista_temass($data['evento']['idsilabo'])->result();
  		$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['documentos']= $this->documento_model->lista_documentos()->result();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();

 		// print_r($data['sesionevento_list']);
  		$data['title']="Lista de Sesioneventoes";
		$this->load->view('template/page_header');		
  		$this->load->view('sesionevento_record',$data);
		$this->load->view('template/page_footer');
	}



	public function actual(){
	 if(isset($this->session->userdata['logged_in'])){

		$data['sesionevento'] = $this->sesionevento_model->sesionevento($this->uri->segment(3))->row_array();

		$data['documentos']= $this->documento_model->lista_documentos()->result();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
		$data['eventos']= $this->evento_model->lista_eventos()->result();

		$data['evento'] = $this->evento_model->evento($data['sesionevento']['idevento'])->row_array();
  		$data['temas']= $this->tema_model->lista_temass($data['evento']['idsilabo'])->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['title']="Sesionevento del documento";
	 
		$data['title']="Modulo de sesiones del evento";
		$this->load->view('template/page_header');		
		$this->load->view('sesionevento_record',$data);
		$this->load->view('template/page_footer');
	   }else{
		$this->load->view('template/page_header.php');
		$this->load->view('login_form');
		$this->load->view('template/page_footer.php');
	   }
	}




	public function add()
	{



	     $idevento=$this->uri->segment(3);

	    if(!isset($idevento)){
	      $idevento=0;


		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['eventos']= $this->evento_model->lista_eventos()->result();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
  		$data['temas']= $this->tema_model->lista_temass($data['evento']['idsilabo'])->result();

	    }else{
	     	$data["idevento"]=$idevento;
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['evento']= $this->evento_model->evento($idevento)->first_row('array');
		$data['eventos']= $this->evento_model->evento($idevento)->result();

  		$data['temas']= $this->tema_model->lista_temass($data['evento']['idsilabo'])->result();
  		$data['unidadsilabos']= $this->unidadsilabo_model->unidadsilaboss($data['evento']['idsilabo'])->result();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
	   }
   		date_default_timezone_set('America/Guayaquil');
	     	$date = date("Y-m-d");
		$puede= $this->fechacalendario_model->existe($data['evento']['idsilabo'],$date);

	//	if($puede==false)
	//	{	
	//		return 0; 	
	//	}
		$data['sesionevento'] = $this->sesionevento_model->sesionevento_sesiones($idevento)->result();
		$data['title']="Nueva sesion de eventos";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('sesionevento_form',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save()
	{

	 	$array_item2=array(
	 		'nombrecorto' => $this->input->post('temacorto'),
			'idvideotutorial' => 0,
	 		'nombrelargo' => $this->input->post('tema'),
	 		'idunidadsilabo' => $this->input->post('idunidadsilabo'),
	 		'duracionminutos' => 120,
		 	'numerosesion' => $this->input->post('numerosesion'),
	 	);
	 	$idtema =$this->tema_model->save($array_item2);





	 	$array_item=array(
		 	'tema' => $this->input->post('tema'),
		 	'idtema' => $idtema,
		 	'temacorto' => $this->input->post('temacorto'),
		 	'fecha' => $this->input->post('fecha'),
		 	'idevento' => $this->input->post('idevento'),
		 	'ponderacion' => $this->input->post('ponderacion'),
		 	'horainicio' => $this->input->post('horainicio'),
		 	'horafin' => $this->input->post('horafin'),
	 	);
	 	$result=$this->sesionevento_model->save($array_item);

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
	 	$data['sesionevento'] = $this->sesionevento_model->sesionevento($this->uri->segment(3))->row_array();
		$data['evento'] = $this->evento_model->evento($data['sesionevento']['idevento'])->row_array();

		$data['eventos']= $this->evento_model->lista_eventos()->result();
  		$data['temas']= $this->tema_model->lista_temass($data['evento']['idsilabo'])->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
  		$data['documentos']= $this->documento_model->lista_documentos()->result();
 	 	$data['title'] = "Actualizar Sesionevento";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('sesionevento_edit',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save_edit()
	{
		$id=$this->input->post('idsesionevento');
	 	$array_item=array(
		 	'idevento' => $this->input->post('idevento'),
		 	'fecha' => $this->input->post('fecha'),
		 	'idtema' => $this->input->post('idtema'),
		 	'tema' => $this->input->post('tema'),
		 	'temacorto' => $this->input->post('temacorto'),
		 	'ponderacion' => $this->input->post('ponderacion'),
		 	'horainicio' => $this->input->post('horainicio'),
		 	'horafin' => $this->input->post('horafin'),
	 	);
	 	$this->sesionevento_model->update($id,$array_item);
	 	redirect('sesionevento/actual/'.$id);
 	}



 	public function delete()
 	{
 		$data=$this->sesionevento_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('sesionevento/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}



public function listar()
{
	
	$data['eventos']= $this->evento_model->lista_eventos()->result();
  $data['title']="Sesiones de evento";
	$this->load->view('template/page_header');		
  $this->load->view('sesionevento_list',$data);
	$this->load->view('template/page_footer');
}



function sesionevento_data()
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

	 	$data0 = $this->sesionevento_model->sesioneventosA($idevento);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idsesionevento,$r->elevento,$r->fecha,$r->tema,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('sesionevento/actual').'"   data-idsesionevento="'.$r->idsesionevento.'">Ver</a>');
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
		

	 	$data['sesioneventos']= $this->sesionevento_model->sesioneventosA($this->uri->segment(3))->result();

		$data['title']="Evento";
	//	$this->load->view('template/page_header');		
		$this->load->view('sesionevento_list_pdf',$data);
//		$this->load->view('template/page_footer');
	}





public function elprimero()
{
  	$data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['sesionevento'] = $this->sesionevento_model->elprimero();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
  if(!empty($data))
  {
  		$data['eventos']= $this->evento_model->lista_eventos()->result();

  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Sesionevento del documento";
    $this->load->view('template/page_header');		
    $this->load->view('sesionevento_record',$data);
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
	$data['sesionevento'] = $this->sesionevento_model->elultimo();
		$data['evento'] = $this->evento_model->evento($data['sesionevento']['idevento'])->row_array();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
  		$data['temas']= $this->tema_model->lista_temass($data['evento']['idsilabo'])->result();
  if(!empty($data))
  {
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Sesionevento del documento";
  
    $this->load->view('template/page_header');		
    $this->load->view('sesionevento_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['sesionevento_list']=$this->sesionevento_model->lista_sesionevento()->result();
	$data['documentos']= $this->documento_model->lista_documentos()->result();
  		$data['temas']= $this->tema_model->lista_temas()->result();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
	$data['sesionevento'] = $this->sesionevento_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['eventos']= $this->evento_model->lista_eventos()->result();
    $data['title']="Sesionevento del documento";
 // $data['title']="Correo";
	$this->load->view('template/page_header');		
  $this->load->view('sesionevento_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['sesionevento_list']=$this->sesionevento_model->lista_sesionevento()->result();
  $data['documentos']= $this->documento_model->lista_documentos()->result();
  		$data['temas']= $this->tema_model->lista_temas()->result();
	$data['sesionevento'] = $this->sesionevento_model->anterior($this->uri->segment(3))->row_array();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
 	$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
 // $data['title']="Correo";
    $data['title']="Sesionevento del documento";
	$this->load->view('template/page_header');		
  $this->load->view('sesionevento_record',$data);
	$this->load->view('template/page_footer');
}







public function get_sesionevento() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->get('idsesionevento')) 
    {
        $this->db->select('*');
    	$this->db->order_by("fecha","asc");
        $this->db->where(array('idsesionevento' => $this->input->get('idsesionevento')));
        $query = $this->db->get('sesionevento');
	$data=$query->result();
	echo json_encode($data);
	}
}











}
