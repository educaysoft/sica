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
      		$this->load->model('silabo_model');
      		$this->load->model('distributivodocente_model');
      		$this->load->model('fechacalendario_model');
      		$this->load->model('modoevaluacion_model');
      		$this->load->model('participante_model');
      		$this->load->model('asignaturadocente_model');
      		$this->load->model('jornadadocente_model');
      		$this->load->model('calendarioacademico_model');
	}

	public function index(){
 	if(isset($this->session->userdata['logged_in'])){
		$data['sesionevento'] = $this->sesionevento_model->elultimo();
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
		$data['evento'] = $this->evento_model->evento($data['sesionevento']['idevento'])->row_array();
  		$data['temas']= $this->tema_model->lista_temass($data['evento']['idsilabo'])->result();
  		$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['documentos']= $this->documento_model->lista_documentos()->result();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();

 		// print_r($data['sesionevento_list']);
  		$data['title']="Esta viendo la  Sesión #: ";
		$this->load->view('template/page_header');		
  		$this->load->view('sesionevento_record',$data);
		$this->load->view('template/page_footer');

   		}else{
			$this->load->view('template/page_header.php');
			$this->load->view('login_form');
			$this->load->view('template/page_footer.php');
   		}
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
  		$data['silabo']= $this->silabo_model->silabo($data['evento']['idsilabo'])->first_row('array');
  		$data['silabos']= $this->silabo_model->silabosa($data['silabo']['idasignatura'])->result_array();
		if(count($data['silabos'])>1){
			$pidx=count($data['silabos'])-2;
  			$data['temasprevios']= $this->tema_model->lista_temass($data['silabos'][$pdix]['idsilabo'])->result();
		}

		$data['distributivodocente']=$this->distributivodocente_model->distributivodocente_pado($data['silabo']['idperiodoacademico'],$data['silabo']['iddocente'])->first_row('array');	
		$data['asignaturadocente']= $this->asignaturadocente_model->lista_asignaturadocentesA($data['distributivodocente']['iddistributivodocente'])->first_row('array');
		$data['jornadadocente']= $this->jornadadocente_model->jornadadocentes($data['evento']['idasignaturadocente'])->result();
	   }
   		date_default_timezone_set('America/Guayaquil');
	     	$date = date("Y-m-d");
		$puede= $this->fechacalendario_model->existe($data['evento']['idsilabo'],$date);
		$data['calendarioacademico'] = $this->calendarioacademico_model->lista_calendarioacademicosA($data['evento']['idcalendarioacademico'])->result();
		$data['sesionevento'] = $this->sesionevento_model->sesionevento_sesiones($idevento)->result();
		$data['title']="Nueva sesion de eventos";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('sesionevento_form',$data);
	 	$this->load->view('template/page_footer');
	}






	public function addx()
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
  		$data['silabo']= $this->silabo_model->silabo($data['evento']['idsilabo'])->first_row('array');
		$data['distributivodocente']=$this->distributivodocente_model->distributivodocente_pado($data['silabo']['idperiodoacademico'],$data['silabo']['iddocente'])->first_row('array');	
			$data['asignaturadocente']= $this->asignaturadocente_model->lista_asignaturadocentesA($data['distributivodocente']['iddistributivodocente'])->first_row('array');
			$data['jornadadocente']= $this->jornadadocente_model->jornadadocentes($data['evento']['idasignaturadocente'])->result();
	   }
   		date_default_timezone_set('America/Guayaquil');
	     	$date = date("Y-m-d");
		$puede= $this->fechacalendario_model->existe($data['evento']['idsilabo'],$date);

		$data['calendarioacademico'] = $this->calendarioacademico_model->lista_calendarioacademicosA($data['evento']['idcalendarioacademico'])->result();
		$data['sesionevento'] = $this->sesionevento_model->sesionevento_sesiones($idevento)->result();
		$data['title']="Nueva sesion de eventos";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('sesionevento_formx',$data);
	 	$this->load->view('template/page_footer');
	}











	public function  save()
	{
   			date_default_timezone_set('America/Guayaquil');
    			$fecha = date("Y-m-d");
    			$hora= date("H:i:s");
			$idusuario=$this->session->userdata['logged_in']['idusuario'];

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
		 	'horainicio' => $this->input->post('horainicio'),
		 	'horafin' => $this->input->post('horafin'),
		 	'idmodoevaluacion' => $this->input->post('idmodoevaluacion'),
	                'idusuario'=>$idusuario,
			'fechacreacion'=>$fecha,
			'horacreacion'=>$hora
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



	public function editx()
	{
		$idsesionevento=$this->uri->segment(3);
	 	$data['sesioneventos'] = $this->sesionevento_model->sesionevento($this->uri->segment(3))->result();
		$data['sesionevento'] = $this->sesionevento_model->sesionevento($idsesionevento)->row_array();
		$data['evento'] = $this->evento_model->evento($data['sesionevento']['idevento'])->row_array();
  		$data['unidadsilabos']= $this->unidadsilabo_model->unidadsilaboss($data['evento']['idsilabo'])->result();
		$data['jornadadocente']= $this->jornadadocente_model->jornadadocentes($data['evento']['idasignaturadocente'])->result();

	//	$data['eventos']= $this->evento_model->lista_eventos()->result();
		$data['eventos'] = $this->evento_model->evento($data['sesionevento']['idevento'])->result();
  		$data['temas']= $this->tema_model->lista_temass($data['evento']['idsilabo'])->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
		$data['calendarioacademico'] = $this->calendarioacademico_model->lista_calendarioacademicosA($data['evento']['idcalendarioacademico'])->result();
  		$data['documentos']= $this->documento_model->lista_documentos()->result();
 	 	$data['title'] = "Actualizar Sesionevento";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('sesionevento_editx',$data);
	 	$this->load->view('template/page_footer');
	}







	public function edit()
	{
		$idsesionevento=$this->uri->segment(3);
	 	$data['sesioneventos'] = $this->sesionevento_model->sesionevento($this->uri->segment(3))->result();
		$data['sesionevento'] = $this->sesionevento_model->sesionevento($idsesionevento)->row_array();
		$data['evento'] = $this->evento_model->evento($data['sesionevento']['idevento'])->row_array();
  		$data['unidadsilabos']= $this->unidadsilabo_model->unidadsilaboss($data['evento']['idsilabo'])->result();
		$data['jornadadocente']= $this->jornadadocente_model->jornadadocentes($data['evento']['idasignaturadocente'])->result();

	//	$data['eventos']= $this->evento_model->lista_eventos()->result();
		$data['eventos'] = $this->evento_model->evento($data['sesionevento']['idevento'])->result();
  		$data['temas']= $this->tema_model->lista_temass($data['evento']['idsilabo'])->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
		$data['calendarioacademico'] = $this->calendarioacademico_model->lista_calendarioacademicosA($data['evento']['idcalendarioacademico'])->result();
  		$data['documentos']= $this->documento_model->lista_documentos()->result();
 

	 	$data['title'] = "Actualizar Sesionevento";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('sesionevento_edit',$data);
	 	$this->load->view('template/page_footer');
	}





	public function  save_edit()
	{
		$id=$this->input->post('idsesionevento');
		$idtema=$this->input->post('idtema');


	if($this->input->post('temasilabo')==1)
	{

		if($idtema>0){
		$array_tema=array(
	 		'nombrecorto' => $this->input->post('temacorto'),
	 		'nombrelargo' => $this->input->post('tema'),
	 		'idunidadsilabo' => $this->input->post('idunidadsilabo'),
		 	'numerosesion' => $this->input->post('numerosesion'),
	 	);
	 	$idtema =$this->tema_model->update($idtema,$array_tema);
		}else{
	 	$array_item2=array(
	 		'nombrecorto' => $this->input->post('temacorto'),
			'idvideotutorial' => 0,
	 		'nombrelargo' => $this->input->post('tema'),
	 		'idunidadsilabo' => $this->input->post('idunidadsilabo'),
	 		'duracionminutos' => 120,
		 	'numerosesion' => $this->input->post('numerosesion'),
	 	);
	 	$idtema =$this->tema_model->save($array_item2);
		}



	 	$array_item=array(
		 	'idevento' => $this->input->post('idevento'),
		 	'fecha' => $this->input->post('fecha'),
		 	'idtema' => $idtema,
		 	'tema' => $this->input->post('tema'),
		 	'temacorto' => $this->input->post('temacorto'),
		 	'horainicio' => $this->input->post('horainicio'),
		 	'horafin' => $this->input->post('horafin'),
		 	'idmodoevaluacion' => $this->input->post('idmodoevaluacion'),
	 	);
	 	$result=$this->sesionevento_model->update($id,$array_item);
	}else{

	 	$array_item=array(
		 	'idevento' => $this->input->post('idevento'),
		 	'fecha' => $this->input->post('fecha'),
		 	'tema' => $this->input->post('tema'),
		 	'temacorto' => $this->input->post('temacorto'),
		 	'horainicio' => $this->input->post('horainicio'),
		 	'horafin' => $this->input->post('horafin'),
		 	'idmodoevaluacion' => $this->input->post('idmodoevaluacion'),
	 	);
	 	$result=$this->sesionevento_model->update($id,$array_item);



	}
	 	if($result==false)
		{
			echo "<script language='JavaScript'> alert('sesion no se pudo modificar'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 	}







 	public function delete()
 	{
 		$data=$this->sesionevento_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('sesionevento/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}




 	public function quitar()
 	{
	       $idsesionevento=0;	
		if($this->uri->segment(3))
		{
   		 $idsesionevento= $this->uri->segment(3);  
		}

 		$result=$this->sesionevento_model->quitar($idsesionevento);
	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('No se quito'); </script>";
			echo "<script language='JavaScript'> window.history.go(-1);</script>";
		}else{
			echo "<script language='JavaScript'> alert('Se quito con existo esta sesionvento'); </script>";
				echo "<script language='JavaScript'> window.history.go(-1);</script>";
		}
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

		$tmp=explode("-",$this->uri->segment(3));
        	$idevento=$tmp[0];
        	if(isset($tmp[1]))
        	{
        		$mesnumero=$tmp[1];
        	}else{
        		$mesnumero=0;
        	}


	 	$data['sesioneventos']= $this->sesionevento_model->sesioneventosA($idevento)->result();
		$data['instructor']=$this->participante_model->instructor($idevento)->result();
		$data['mesnumero']=$mesnumero;
		$data['mesletra'] = array(1 => 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
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
	$data['evento'] = $this->evento_model->evento($data['sesionevento']['idevento'])->row_array();
  	$data['temas']= $this->tema_model->lista_temass($data['evento']['idsilabo'])->result();

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
	$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
	$data['sesionevento'] = $this->sesionevento_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['eventos']= $this->evento_model->lista_eventos()->result();
	$data['evento'] = $this->evento_model->evento($data['sesionevento']['idevento'])->row_array();
  	$data['temas']= $this->tema_model->lista_temass($data['evento']['idsilabo'])->result();
    $data['title']="Sesionevento del documento";
 // $data['title']="Correo";
	$this->load->view('template/page_header');		
  $this->load->view('sesionevento_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['sesionevento_list']=$this->sesionevento_model->lista_sesionevento()->result();
  $data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['sesionevento'] = $this->sesionevento_model->anterior($this->uri->segment(3))->row_array();
	$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
 	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['eventos']= $this->evento_model->lista_eventos()->result();
	$data['evento'] = $this->evento_model->evento($data['sesionevento']['idevento'])->row_array();
  	$data['temas']= $this->tema_model->lista_temass($data['evento']['idsilabo'])->result();
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
