<?php
class Evento extends CI_Controller{
  public function __construct(){
      parent::__construct();
      $this->load->model('evento_model');
      $this->load->model('evento_estado_model');
      $this->load->model('tipoevento_model');
      $this->load->model('participante_model');
      $this->load->model('docente_model');
      $this->load->model('sesionevento_model');
      $this->load->model('institucion_model');
      $this->load->model('tema_model');
      $this->load->model('pagina_model');
      $this->load->model('silabo_model');
      $this->load->model('asistencia_model');
      $this->load->model('participacion_model');
      $this->load->model('pagoevento_model');
      $this->load->model('modoevaluacion_model');
      $this->load->model('asignaturadocente_model');
      $this->load->model('calendarioacademico_model');
      $this->load->model('persona_model');
}

public function index(){
 if(isset($this->session->userdata['logged_in'])){
	$data['evento'] = $this->evento_model->elultimo();
	$data['eventos']= $this->evento_model->lista_eventos()->result();
	$data['certificados'] =$this->evento_model->certificados($data['evento']['idevento'])->result();
	$data['evento_estados']= $this->evento_estado_model->lista_evento_estados()->result();
	$data['tipoeventos']= $this->tipoevento_model->lista_tipoeventos()->result();
	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
	$data['paginas']= $this->pagina_model->lista_paginas()->result();
	$data['silabos']= $this->silabo_model->lista_silabos()->result();
	$data['participantes'] =$this->participante_model->participantes($data['evento']['idevento'])->result();
	$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
	$data['sesioneventos'] =$this->sesionevento_model->sesioneventos($data['evento']['idevento'])->result();
  	$data['temas']= $this->tema_model->lista_temass($data['evento']['idsilabo'])->result();
	$data['asignaturadocentes'] = $this->asignaturadocente_model->lista_asignaturadocentesA(0)->result();
	$data['calendarioacademicos'] = $this->calendarioacademico_model->lista_calendarioacademicosA(0)->result();
	$data['title']="Usted esta visualizando el Eventos  #";
	$this->load->view('template/page_header');		
	$this->load->view('evento_record',$data);
	$this->load->view('template/page_footer');
   }else{
	$this->load->view('template/page_header.php');
	$this->load->view('login_form');
	$this->load->view('template/page_footer.php');
   }
}

//==============================================
// Llamar al formulario para un nuevo evento.
// ==============================================

	public function add()
	{
	$data['title']="Usted esta Creando un nuevo Evento";
	$data['evento_estados']= $this->evento_estado_model->lista_evento_estados()->result();
	$data['tipoeventos']= $this->tipoevento_model->lista_tipoeventos()->result();
	$data['asignaturadocentes'] = $this->asignaturadocente_model->lista_asignaturadocentesA(0)->result();
	$data['calendarioacademicos'] = $this->calendarioacademico_model->lista_calendarioacademicosA(0)->result();
	$data['silabos']= $this->silabo_model->lista_silabos()->result();
	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
	$data['paginas']= $this->pagina_model->lista_paginas()->result();
	$this->load->view('template/page_header');		
	$this->load->view('evento_form',$data);
	$this->load->view('template/page_footer');
	}

//==============================================
// Guardar el nuevo evento.
// ==============================================
	public function  save()
	{
	 	$array_item=array(
		 	'idtipoevento' => $this->input->post('idtipoevento'),
		 	'idevento_estado' => $this->input->post('idevento_estado'),
		 	'idinstitucion' => $this->input->post('idinstitucion'),
		 	'titulo' => $this->input->post('titulo'),
			'fechainicia' => $this->input->post('fechainicia'),
			'fechafinaliza' => $this->input->post('fechafinaliza'),
			'detalle' => $this->input->post('detalle'),
			'idusuario' => $this->session->userdata['logged_in']['idusuario'],
			'fecha' =>  date('Y-m-d H:i:s'),
			'duracion' => $this->input->post('duracion'),
			'costo' => $this->input->post('costo'),
			'idsilabo' => $this->input->post('idsilabo'),
			'codigoclassroom' => $this->input->post('codigoclassroom'),
			'idasignaturadocente' => $this->input->post('idasignaturadocente'),
			'idcalendarioacademico' => $this->input->post('idcalendarioacademico'),
	 	);	 
	 	$this->evento_model->save($array_item);
	 	redirect('evento');
 	}




	public function  save_sesion()
	{
	 	$array_item=array(
		 	'idsesionevento' => $this->input->post('idsesionevento'),
		 	'idevento' => $this->input->post('idevento'),
		 	'fecha' => $this->input->post('fecha'),
		 	'idtema' => $this->input->post('idtema'),
		 	'temacorto' => $this->input->post('temacorto'),
		 	'ponderacion' => $this->input->post('ponderacion'),
		 	'horainicio' => $this->input->post('horainicio'),
		 	'horafin' => $this->input->post('horafin'),
		 	'idmodoevaluacion' => $this->input->post('idmodoevaluacion'),
	 	);
	 	$result=$this->sesionevento_model->save($array_item);
	 	if($result == FALSE)
		{
			$data=array('resultado'=>"FALSE");
		}else{
			$data=array('resultado'=>"TRUE");
		}
		echo json_encode($data);
  }	






	public function edit()
	{
			$data['evento'] = $this->evento_model->evento($this->uri->segment(3))->row_array();
			$data['paginas']= $this->pagina_model->lista_paginas()->result();
		  	$data['silabos']= $this->silabo_model->lista_silabosA()->result();
			$data['tipoeventos']= $this->tipoevento_model->lista_tipoeventos()->result();
			$data['asignaturadocentes'] = $this->asignaturadocente_model->lista_asignaturadocentesA(0)->result();
			$data['calendarioacademicos'] = $this->calendarioacademico_model->lista_calendarioacademicosA(0)->result();
			$data['evento_estados']= $this->evento_estado_model->lista_evento_estados()->result();
			$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
	    		$data['title'] = "Actualizar Evento";
			$this->load->view('template/page_header');		
			$this->load->view('evento_edit',$data);
			$this->load->view('template/page_footer');
	 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idevento');
	 	$array_item=array(

		 	'idevento_estado' => $this->input->post('idevento_estado'),
		 	'idtipoevento' => $this->input->post('idtipoevento'),
		 	'idinstitucion' => $this->input->post('idinstitucion'),
		 	'titulo' => $this->input->post('titulo'),
			'fechacreacion' => $this->input->post('fechacreacion'),
			'fechainicia' => $this->input->post('fechainicia'),
			'fechafinaliza' => $this->input->post('fechafinaliza'),
			'detalle' => $this->input->post('detalle'),
			'idpagina' => $this->input->post('idpagina'),
			'duracion' => $this->input->post('duracion'),
			'costo' => $this->input->post('costo'),
			'idsilabo' => $this->input->post('idsilabo'),
			'codigoclassroom' => $this->input->post('codigoclassroom'),
			'idasignaturadocente' => $this->input->post('idasignaturadocente'),
			'idcalendarioacademico' => $this->input->post('idcalendarioacademico'),
	 	);
	 	$this->evento_model->update($id,$array_item);
	 	redirect('evento/actual/'.$id);
 	}




 	public function delete()
 	{
 		$data=$this->evento_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('evento/elultimo');
	//	$db['default']['db_debug']=FALSE
 	}





	public function frontend(){

		$data['evento'] = $this->evento_model->evento($this->uri->segment(3))->row_array();
		$data['eventos']= $this->evento_model->lista_eventos()->result();
		$data['certificados'] =$this->evento_model->certificados($data['evento']['idevento'])->result();
		$data['tipoeventos']= $this->tipoevento_model->lista_tipoeventos()->result();
		$data['evento_estados']= $this->evento_estado_model->lista_evento_estados()->result();
	  	$data['silabos']= $this->silabo_model->lista_silabos()->result();
		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['participantes'] =$this->participante_model->participantes($data['evento']['idevento'])->result();
		$data['sesioneventos'] =$this->sesionevento_model->sesioneventos($data['evento']['idevento'])->result();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
  		$data['temas']= $this->tema_model->lista_temass($data['evento']['idsilabo'])->result();
		$data['paginas']= $this->pagina_model->lista_paginas()->result();
		$data['asignaturadocentes'] = $this->asignaturadocente_model->lista_asignaturadocentesA(0)->result();
		$data['calendarioacademicos'] = $this->calendarioacademico_model->lista_calendarioacademicosA(0)->result();
		$data['title']="Esta viendo el evento #: ";
		$this->load->view('template/page_header');		
		$this->load->view('evento_frontend',$data);
		$this->load->view('template/page_footer');
	}








	public function actual(){

		$data['evento'] = $this->evento_model->evento($this->uri->segment(3))->row_array();
		$data['eventos']= $this->evento_model->lista_eventos()->result();
		$data['certificados'] =$this->evento_model->certificados($data['evento']['idevento'])->result();
		$data['tipoeventos']= $this->tipoevento_model->lista_tipoeventos()->result();
		$data['evento_estados']= $this->evento_estado_model->lista_evento_estados()->result();
	  	$data['silabos']= $this->silabo_model->lista_silabos()->result();
		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['participantes'] =$this->participante_model->participantes($data['evento']['idevento'])->result();
		$data['sesioneventos'] =$this->sesionevento_model->sesioneventos($data['evento']['idevento'])->result();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
  		$data['temas']= $this->tema_model->lista_temass($data['evento']['idsilabo'])->result();
		$data['paginas']= $this->pagina_model->lista_paginas()->result();
		$data['asignaturadocentes'] = $this->asignaturadocente_model->lista_asignaturadocentesA(0)->result();
		$data['calendarioacademicos'] = $this->calendarioacademico_model->lista_calendarioacademicosA(0)->result();
		$data['title']="Esta viendo el evento #: ";
		$this->load->view('template/page_header');		
		$this->load->view('evento_record',$data);
		$this->load->view('template/page_footer');
	}


	public function listar()
	{
		$data['evento'] = $this->evento_model->evento(1)->row_array();
		$data['evento_estados']= $this->evento_estado_model->lista_evento_estados()->result();
		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['participantes'] =$this->participante_model->participantes($data['evento']['idevento'])->result();

   		$data['filtro']=0;
		if($this->uri->segment(3))
		{
			$idpersona=$this->uri->segment(3);

		$data['filtro']= $idpersona; //$data['participante']['idparticipante'];
		}

		$data['title']="Evento";
		$this->load->view('template/page_header');		
		$this->load->view('evento_list',$data);
		$this->load->view('template/page_footer');
	}

	function evento_data()
	{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));

		if($this->uri->segment(3))
		{
		$id= $this->uri->segment(3);
		}else{

		$id=$this->input->get('idevento_estado');
		}
		$data0 = $this->evento_model->lista_eventosTE($id);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idevento,$r->titulo,$r->fechainicia,$r->estado,$r->lainstitucion,
					$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('evento/actual').'"    data-idevento="'.$r->idevento.'">Edit</a><a href="javascript:void(0);" class="btn btn-info btn-sm item_ver2"  data-retorno2="'.site_url('evento/detalle').'"    data-idevento2="'.$r->idevento.'">Ver</a>');
			}	
			$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);
			echo json_encode($output);
			exit();

	}



	public function listarxp()
	{
		$data['evento'] = $this->evento_model->evento(1)->row_array();
		$data['evento_estados']= $this->evento_estado_model->lista_evento_estados()->result();
		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['participantes'] =$this->participante_model->participantes($data['evento']['idevento'])->result();

   		$data['filtro']=0;
		if($this->uri->segment(3))
		{
			$idpersona=$this->uri->segment(3);
			$data['persona']=$this->persona_model->persona($this->uri->segment(3))->result();

		$data['filtro']= $idpersona; //$data['participante']['idparticipante'];
		}

		$data['title']="Evento";
		$this->load->view('template/page_header');		
		$this->load->view('evento_xpersona',$data);
		$this->load->view('template/page_footer');
	}





	function persona_data()
	{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


		$id=$this->input->get('idpersona');


		$result = $this->docente_model->esdocente($id);
		if($result)
		{

			$data0 = $this->evento_model->lista_eventosP($id);
			$data=array();
			foreach($data0->result() as $r){
			$data[]=array($r->idevento,$r->titulo,$r->fechainicia,$r->estado,$r->lainstitucion,
					$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('evento/actual').'"    data-idevento="'.$r->idevento.'">Edit</a><a href="javascript:void(0);" class="btn btn-info btn-sm item_ver2"  data-retorno2="'.site_url('evento/detalle').'"    data-idevento2="'.$r->idevento.'">Ver</a>');
			}	
			$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);
		}else{


			$data0 = $this->evento_model->lista_eventosP($id);
			$data=array();
			foreach($data0->result() as $r){
			$data[]=array($r->idevento,$r->titulo,$r->fechainicia,$r->estado,$r->lainstitucion,
					$r->href='<a href="javascript:void(0);"  class="btn btn-info btn-sm item_ver2"  data-retorno2="'.site_url('evento/detalle').'"    data-idevento2="'.$r->idevento.'">Ver</a>');
			}	
			$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);








		}	
			echo json_encode($output);
			exit();

	}














	public function listar_participantes()
	{
		$data['evento'] = $this->evento_model->evento(1)->row_array();
		$data['evento_estados']= $this->evento_estado_model->lista_evento_estados()->result();
		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['participantes'] =$this->participante_model->participantes($data['evento']['idevento'])->result();
		

		$data['filtro']= $this->uri->segment(3);

		$data['title']="Evento";
		$this->load->view('template/page_header');		
		$this->load->view('evento_list_participantes',$data);
		$this->load->view('template/page_footer');
	}



	function evento_data_participantes()
	{

		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));

		$id=$this->input->get('idevento');
		$data0 = $this->evento_model->lista_eventoP($id);
		$data=array();
		foreach($data0->result() as $r)
		{
		if($r->iddocumento2==null || $r->iddocumento2==0){	
			$idtipodocu=14; //Cuando se genera el certificado
			$data[]=array($r->idevento,$r->iddocumento,$r->titulo,$r->elparticipante,$r->estado,$r->lainstitucion,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_gene" data-idtipodocu="'.$idtipodocu.'" data-titulo="'.$r->titulo.'" data-fechafinaliza="'.$r->fechafinaliza.'"  data-idordenador="'.$r->idordenador.'"    data-idevento="'.$r->idevento.'"     data-iddirectorio="'.$r->iddirectorio.'"  data-idpersona="'.$r->idpersona.'"  data-elordenador="'.$r->elordenador.'" data-idparticipante="'.$r->idparticipante.'"       data-elparticipante="'.$r->elparticipante.'" data-ruta="'.$r->ruta.'" data-iddocumento="'.$r->iddocumento.'"  data-iddocumento2="'.$r->iddocumento2.'"  data-size_nombre="'.$r->size_nombre.'"  data-posi_nomb_x="'.$r->posi_nomb_x.'"   data-posi_nomb_y="'.$r->posi_nomb_y.'"  data-ancho_x="'.$r->ancho_x.'"   data-alto_y="'.$r->alto_y.'" data-firma1_x="'.$r->firma1_x.'"   data-firma1_y="'.$r->firma1_y.'"  data-firma2_x="'.$r->firma2_x.'"   data-firma2_y="'.$r->firma2_y.'"    data-firma3_x="'.$r->firma3_x.'"   data-firma3_y="'.$r->firma3_y.'"     data-posi_fecha_x="'.$r->posi_fecha_x.'"   data-posi_fecha_y="'.$r->posi_fecha_y.'"   data-posi_codigo_x="'.$r->posi_codigo_x.'"   data-posi_codigo_y="'.$r->posi_codigo_y.'"   data-texto1="'.$r->texto1.'"   data-posi_texto1_x="'.$r->posi_texto1_x.'"   data-posi_texto1_y="'.$r->posi_texto1_y.'"  data-ancho_texto1="'.$r->ancho_texto1.'"    data-alto_texto1="'.$r->alto_texto1.'"    data-font_size_texto1="'.$r->font_size_texto1.'"           data-archivopdf="'.$r->archivopdf.'">gene</a>'.$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-iddocumento2="'.$r->iddocumento2.'"   data-ordenador="'.$r->elordenador.'"  data-ruta="'.$r->ruta.'" data-archivo="'.$r->archivopdf.'"  data-iddocumento="'.$r->iddocumento.'">download</a>');
		}else{
			$data[]=array($r->idevento,$r->iddocumento,$r->titulo,$r->elparticipante,$r->estado,$r->lainstitucion,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-iddocumento2="'.$r->iddocumento2.'"   data-ordenador="'.$r->elordenador.'"  data-ruta="'.$r->ruta.'" data-archivo="'.$r->archivopdf.'"  data-iddocumento="'.$r->iddocumento.'">download</a>'.$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_enviar" data-idtipodocu="'.$r->idtipodocu.'" data-titulo="'.$r->titulo.'" data-fechafinaliza="'.$r->fechafinaliza.'"  data-idordenador="'.$r->idordenador.'"    data-idevento="'.$r->idevento.'"     data-iddirectorio="'.$r->iddirectorio.'"  data-idpersona="'.$r->idpersona.'"  data-elordenador="'.$r->elordenador.'" data-idparticipante="'.$r->idparticipante.'"       data-elparticipante="'.$r->elparticipante.'" data-ruta="'.$r->ruta.'" data-iddocumento="'.$r->iddocumento.'"  data-iddocumento2="'.$r->iddocumento2.'"   data-ordenador="'.$r->elordenador.'"  data-ruta="'.$r->ruta.'"   data-archivopdf="'.$r->archivopdf.'"   data-correosubject="'.$r->correosubject.'"    data-correohead="'.$r->correohead.'"    data-correofoot="'.$r->correofoot.'">enviar</a>');		}


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
		$data['evento'] = $this->evento_model->evento($this->uri->segment(3))->row_array();
		$data['evento_estados']= $this->evento_estado_model->lista_evento_estados()->result();
		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		
		$data['participantes'] = $this->participante_model->participantes($data['evento']['idevento'])->result();


		$data['title']="Evento";
		$this->load->view('template/page_header');		
		$this->load->view('evento_list_pdf',$data);
		$this->load->view('template/page_footer');
	}





	function evento_fechas()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$idevento=$this->input->get('idevento');
			$idpersona=$this->input->get('idpersona');
			$data0 =$this->sesionevento_model->sesioneventosA($idevento);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->numerosesion,$r->idsesionevento,$r->fecha,$r->horainicio,$r->horafin,$r->idmodoevaluacion,$r->tema, 
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('sesionevento/edit').'"    data-idsesionevento="'.$r->idsesionevento.'">Cerrar</a>');
		//		$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('sesionevento/actual').'"    data-idsesionevento="'.$r->idsesionevento.'">Ver</a><a href="javascript:void(0);" class="btn btn-info btn-sm item_edit"  data-idsesionevento="'.$r->idsesionevento.'"  data-idevento="'.$r->idevento.'">edit</a>');
			}	
			$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);
			echo json_encode($output);
			exit();
	}



	function evento_fechasAsisPartPago()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$idevento=$this->input->get('idevento');
			$idpersona=$this->input->get('idpersona');
			$data0 =$this->sesionevento_model->sesioneventos_AsisPart($idevento,$idpersona);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idevento,$r->fecha,$r->tema,$r->asistencia,$r->longitud,$r->latitud,$r->participacion,$r->pagos,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('evento/actual').'"    data-idevento="'.$r->idevento.'"  data-fecha="'.$r->fecha.'"  data-participacion="'.$r->participacion.'"   >Part</a><a href="javascript:void(0);" class="btn btn-info btn-sm item_geo"  data-latitud="'.$r->latitud.'"  data-longitud="'.$r->longitud.'">geo</a>');
			}	
			$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);
			echo json_encode($output);
			exit();
	}








	function evento_participantes()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$id=$this->input->get('idevento');
			$data0 =$this->participante_model->participantes($id);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idparticipante,$r->nombres,$r->archivopdf,
					$r->href='<a href="javascript:void(0);" class="btn btn-info btn-outline-primary  item_grupo"  data-retorno="'.site_url('participante/edit').'"    data-idparticipante="'.$r->idparticipante.'">'.$r->grupoletra.'</a>',

$r->href='<a href="javascript:void(0);" class="btn btn-info btn-outline-primary  item_quitar"  data-retorno="'.site_url('participante/quitar').'"    data-idparticipante="'.$r->idparticipante.'">Quitar</a>',

				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('participante/actual').'"    data-idparticipante="'.$r->idparticipante.'">Ver</a><a href="javascript:void(0);" class="btn btn-success btn-sm item_ver"  data-retorno="'.site_url('persona/actual').'"    data-idparticipante="'.$r->idpersona.'">per</a><a href="javascript:void(0);" class="btn btn-primary btn-sm item_ver"  data-retorno="'.site_url('portafolio/listar').'"    data-idparticipante="'.$r->idpersona.'">port</a>');
			}	
			$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);
			echo json_encode($output);
			exit();

	}





	function evento_asistencia()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$id=$this->input->get('idevento');
			$data0 =$this->participante_model->participantes($id);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idparticipante,$r->nombres,$r->idparticipante,


				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('participante/actual').'"    data-idparticipante="'.$r->idparticipante.'">Ver</a><a href="javascript:void(0);" class="btn btn-success btn-sm item_ver"  data-retorno="'.site_url('persona/actual').'"    data-idparticipante="'.$r->idpersona.'">per</a><a href="javascript:void(0);" class="btn btn-primary btn-sm item_ver"  data-retorno="'.site_url('portafolio/listar').'"    data-idparticipante="'.$r->idpersona.'">port</a>');
			}	
			$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);
			echo json_encode($output);
			exit();

	}





	function evento_asistencia2()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$id=$this->input->get('idevento');
			$fecha=$this->input->get('fecha');
			$data0 =$this->participante_model->asistencias($id,$fecha);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idparticipante,$r->nombres,$r->eltipoasistencia,

				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_asit" date-idpersona="'.$idpersona.'"   data-idtipoasistencia="'.'1'.'">PU</a><a href="javascript:void(0);" class="btn btn-success btn-sm item_ver"  date-idpersona="'.$idpersona.'" data-idtipoasistencia="'.'2'.'">AT</a><a href="javascript:void(0);" class="btn btn-primary btn-sm item_asit"  date-idpersona="'.$idpersona.'"  data-idtipoasistencia="'.'3'.'">FJ</a><a href="javascript:void(0);" class="btn btn-primary btn-sm item_asit" date-idpersona="'.$idpersona.'"  data-idtipoasistencia="'.'4'.'">FI</a>');
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

		$data['evento'] = $this->evento_model->elprimero();
		  if(!empty($data))
		  {
			$data['eventos']= $this->evento_model->lista_eventos()->result();
			$data['certificados'] =$this->evento_model->certificados($data['evento']['idevento'])->result();
			$data['evento_estados']= $this->evento_estado_model->lista_evento_estados()->result();
			$data['tipoeventos']= $this->tipoevento_model->lista_tipoeventos()->result();
			$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
			$data['participantes'] =$this->participante_model->participantes($data['evento']['idevento'])->result();
			$data['silabos']= $this->silabo_model->lista_silabos()->result();
			$data['paginas']= $this->pagina_model->lista_paginas()->result();
			$data['sesioneventos'] =$this->sesionevento_model->sesioneventos($data['evento']['idevento'])->result();
			$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
		
  			$data['temas']= $this->tema_model->lista_temass($data['evento']['idsilabo'])->result();
			$data['title']="Evento";
			$this->load->view('template/page_header');		
			$this->load->view('evento_record',$data);
			$this->load->view('template/page_footer');
		  }else{
			$this->load->view('template/page_header');		
			$this->load->view('registro_vacio');
			$this->load->view('template/page_footer');
		  }
	  
	}


	public function elultimo()
	{
		$data['evento'] = $this->evento_model->elultimo();
		  if(!empty($data))
		  {
			$data['eventos']= $this->evento_model->lista_eventos()->result();
			$data['certificados'] =$this->evento_model->certificados($data['evento']['idevento'])->result();
			$data['evento_estados']= $this->evento_estado_model->lista_evento_estados()->result();
			$data['tipoeventos']= $this->tipoevento_model->lista_tipoeventos()->result();
			$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
	$data['silabos']= $this->silabo_model->lista_silabos()->result();
			$data['participantes'] =$this->participante_model->participantes($data['evento']['idevento'])->result();
			$data['paginas']= $this->pagina_model->lista_paginas()->result();
			$data['sesioneventos'] =$this->sesionevento_model->sesioneventos($data['evento']['idevento'])->result();
			$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
  			$data['temas']= $this->tema_model->lista_temass($data['evento']['idsilabo'])->result();
			$data['title']="Evento";
			$this->load->view('template/page_header');		
			$this->load->view('evento_record',$data);
			$this->load->view('template/page_footer');
		  }else{
			$this->load->view('template/page_header');		
			$this->load->view('registro_vacio');
			$this->load->view('template/page_footer');
		  }
	  }



	public function siguiente(){
	 // $data['evento_list']=$this->evento_model->lista_evento()->result();
		$data['evento'] = $this->evento_model->siguiente($this->uri->segment(3))->row_array();
		$data['eventos']= $this->evento_model->lista_eventos()->result();
		$data['certificados'] =$this->evento_model->certificados($data['evento']['idevento'])->result();
		$data['tipoeventos']= $this->tipoevento_model->lista_tipoeventos()->result();
		$data['evento_estados']= $this->evento_estado_model->lista_evento_estados()->result();
		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
	$data['silabos']= $this->silabo_model->lista_silabos()->result();
		$data['paginas']= $this->pagina_model->lista_paginas()->result();
		$data['sesioneventos'] =$this->sesionevento_model->sesioneventos($data['evento']['idevento'])->result();
	  	$data['participantes'] =$this->participante_model->participantes($data['evento']['idevento'])->result();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
		$data['asignaturadocentes'] = $this->asignaturadocente_model->lista_asignaturadocentesA(0)->result();
		$data['calendarioacademicos'] = $this->calendarioacademico_model->lista_calendarioacademicosA(0)->result();
  		$data['temas']= $this->tema_model->lista_temass($data['evento']['idsilabo'])->result();
	  	$data['title']="Evento";
		$this->load->view('template/page_header');		
	  	$this->load->view('evento_record',$data);
		$this->load->view('template/page_footer');
	}


	public function anterior(){
	 // $data['evento_list']=$this->evento_model->lista_evento()->result();
		$data['evento'] = $this->evento_model->anterior($this->uri->segment(3))->row_array();
		$data['eventos']= $this->evento_model->lista_eventos()->result();
		$data['tipoeventos']= $this->tipoevento_model->lista_tipoeventos()->result();
		$data['certificados'] =$this->evento_model->certificados($data['evento']['idevento'])->result();
		$data['evento_estados']= $this->evento_estado_model->lista_evento_estados()->result();
		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['paginas']= $this->pagina_model->lista_paginas()->result();
		$data['silabos']= $this->silabo_model->lista_silabos()->result();
		$data['participantes'] =$this->participante_model->participantes($data['evento']['idevento'])->result();
		$data['sesioneventos'] =$this->sesionevento_model->sesioneventos($data['evento']['idevento'])->result();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
		$data['asignaturadocentes'] = $this->asignaturadocente_model->lista_asignaturadocentesA(0)->result();
		$data['calendarioacademicos'] = $this->calendarioacademico_model->lista_calendarioacademicosA(0)->result();
  		$data['temas']= $this->tema_model->lista_temass($data['evento']['idsilabo'])->result();
		$data['title']="Evento";
		$this->load->view('template/page_header');		
		$this->load->view('evento_record',$data);
		$this->load->view('template/page_footer');
	}




	public function detalle()
	{
		$data['evento'] = $this->evento_model->evento($this->uri->segment(3))->row_array();
		$data['sesioneventos'] = $this->sesionevento_model->sesioneventos($this->uri->segment(3))->result();
		$data['asistencia'] = $this->asistencia_model->asistenciax( $data['evento']['idevento'] , $this->session->userdata['logged_in']['idpersona'])->result();
		$data['participacion'] = $this->participacion_model->participacionx($data['evento']['idevento'] , $this->session->userdata['logged_in']['idpersona'])->result();
		$data['pagoevento'] = $this->pagoevento_model->pagoeventox($data['evento']['idevento'] , $this->session->userdata['logged_in']['idpersona'])->result();
		$data['silabo']=$this->silabo_model->silabo($data['evento']['idsilabo'])->row_array();
	
//		$this->load->view('template/page_header');		
//		unset($this->session->userdata['logged_in']);
		$this->load->view('eventos/evento',$data);
	}



public function canvas(){
	$this->load->view('template/page_header');
	$this->load->view('canvas');
	$this->load->view('template/page_footer');
}

function show_pdf() {
	 	$data['evento'] = $this->evento_model->evento($this->uri->segment(3))->row_array();
 $this->load->view('template/page_header');
 $data['blog_text'] = "POSTULACION"; 
 $this->load->view('cargapdf',$data);
 $this->load->view('template/page_footer'); 
 }



function loadpdf2()
{
 /* Get the name of the uploaded file */
$filename = $_FILES['file']['name'];

/* Choose where to save the uploaded file */
$location = "uploads/".$filename;

/* Save the uploaded file to the local filesystem */
if ( move_uploaded_file($_FILES['file']['tmp_name'], $location) ) { 
  echo 'Success'; 
} else { 
  echo 'Failure'; 
}

}




 function loadpdf() {

//$filename = $_FILES['fileToUpload']['name'];
$filename = $_POST('archivopdf');

echo $filename;
die();
$target_dir =  $_SERVER["DOCUMENT_ROOT"]."/facae/pdfs/".$filename;
//$target_dir =  $_SERVER["DOCUMENT_ROOT"]."/facae/".trim($this->session->userdata['logged_in']['pdf']);  //"uploads/";
$target_file =$target_dir; // $target_dir . basename($_FILES["fileToUpload"]["name"]);
  echo $target_file.' - ';


//die();
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  echo "-".$imageFileType;
// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}
// Check file size
if ($_FILES["filepdf"]["size"] > 1000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "pdf" && $imageFileType != "pdf" && $imageFileType != "pdf"
&& $imageFileType != "pdf" ) {
  echo $imageFileType;
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
	echo "----".$_FILES["fileToUpload"]["tmp_name"];
  if (move_uploaded_file($_FILES["filepdf"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["filepdf"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
}



function loadpdf3()
{

// Count total files
$countfiles = count($_FILES['files']['name']);

$upload_location =  $_SERVER["DOCUMENT_ROOT"]."/facae/pdfs/";

// Upload directory
//$upload_location = "uploads/";

$count = 0;
for($i=0;$i < $countfiles;$i++){

   // File name
   $filename = $_FILES['files']['name'][$i];
   $filename = $_POST["archivopdf"];
   // File path
   $path = $upload_location.$filename;

   // file extension
   $file_extension = pathinfo($path, PATHINFO_EXTENSION);
   $file_extension = strtolower($file_extension);

   // Valid file extensions
   $valid_ext = array("pdf","doc","docx","jpg","png","jpeg");

   // Check extension
   if(in_array($file_extension,$valid_ext)){

      // Upload file
      if(move_uploaded_file($_FILES['files']['tmp_name'][$i],$path)){
        $count += 1;
      } 
   }

}

echo $count;
exit;


}




	public function get_evento() {
	    $this->load->database();
	    $this->load->helper('form');
	    if($this->input->post('idinstitucion')) {
		$this->db->select('*');
		$this->db->where(array('idinstitucion' => $this->input->post('idinstitucion'),'idevento_estado'=>2));  //SOLO ESTADO INSCRIPCION
		$query = $this->db->get('evento');
		$data=$query->result();
		echo json_encode($data);
		}

	}


	public function get_evento1() {
	    $this->load->database();
	    $this->load->helper('form');
	    if($this->input->post('idinstitucion')) {
		$this->db->select('*');
		$this->db->where(array('idinstitucion' => $this->input->post('idinstitucion')));  //SOLO ESTADO INSCRIPCION
		$query = $this->db->get('evento');
		$data=$query->result();
		echo json_encode($data);
		}

	}





	public function get_evento2() {
	    $this->load->database();
	    $this->load->helper('form');
	    if($this->input->post('idevento')) {
		$this->db->select('*');
		$this->db->where(array('idevento' => $this->input->post('idevento')));
		$query = $this->db->get('evento');
		$data=$query->result();
		echo json_encode($data);
		}
	}






}
