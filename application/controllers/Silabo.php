<?php

class Silabo extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('silabo_model');
      $this->load->model('unidadsilabo_model');
      $this->load->model('tema_model');
      $this->load->model('documentosilabo_model');
      $this->load->model('documento_model');
  	$this->load->model('asignatura_model');
  	$this->load->model('periodoacademico_model');
  	$this->load->model('evento_model');
  	$this->load->model('docente_model');
  	$this->load->model('malla_model');
  	$this->load->model('seguimientosilabo_model');
  	$this->load->model('departamento_model');
  	$this->load->model('calendarioacademico_model');
      $this->load->model('metodoaprendizajetema_model');
      $this->load->model('criterioseguimientosilabo_model');
  }

//=========================================================
// Es la primera función que se ejecuta cuando llamamos a
// http://educaysoft.org/sica/silabo
// ========================================================
	public function index(){
		if(isset($this->session->userdata['logged_in'])){
			$data['silabo']=$this->silabo_model->elultimo();
			$data['documentosilabos']= $this->documentosilabo_model->listar_documentosilabo1($data['silabo']['idsilabo'])->result();

    //print_r($data['silabo']);
//			die();
  			$data['asignaturas']= $this->asignatura_model->lista_asignaturasA()->result();
  			$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
 			$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
			$data['documentos']= $this->documento_model->lista_documentos()->result();
			$data['title']="Lista de silaboes";
			$this->load->view('template/page_header');
			$this->load->view('silabo_record',$data);
			$this->load->view('template/page_footer');
		}else{
			$this->load->view('template/page_header.php');
			$this->load->view('login_form');
			$this->load->view('template/page_footer.php');
		}
	}


	public function add()
	{
  		$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
		$data['documentos']= $this->documento_model->lista_documentosxdestino(0)->result();
  		$data['asignaturas']= $this->asignatura_model->lista_asignaturasA()->result();
  		$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
		$data['title']="Nueva silabo";
		$this->load->view('template/page_header');
		$this->load->view('silabo_form',$data);
		$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
	 	'nombre' => $this->input->post('nombre'),
	 	'descripcion' => $this->input->post('descripcion'),
	 	'duracion' => $this->input->post('duracion'),
	 	'idasignatura' => $this->input->post('idasignatura'),
	 	'iddocente' => $this->input->post('iddocente'),
	 	'iddocumento' => $this->input->post('iddocumento'),
	 	'idperiodoacademico' => $this->input->post('idperiodoacademico'),
	 	'linkdetalle' => $this->input->post('linkdetalle'),
	 	);
	 	$data=$this->silabo_model->save($array_item);
		header("Content-type: application/json; charset=utf-8");
		echo json_encode($data);
	 //	redirect('silabo');
 	}



	public function edit()
	{

			$tipodocumento=9;  //silabos\o
			$data['silabo'] = $this->silabo_model->silabo($this->uri->segment(3))->row_array();
  			$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
  			$data['docente']= $this->docente_model->lista_docentesA($data['silabo']['iddocente'])->row_array();
  			$data['asignaturas']= $this->asignatura_model->lista_asignaturasA(0)->result();
			$data['documentos']= $this->documento_model->lista_documentosxtipo($tipodocumento,$data['docente']['idpersona'])->result();
  			$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
			$data['title'] = "Actualizar silabo";
			$this->load->view('template/page_header');		
			$this->load->view('silabo_edit',$data);
			$this->load->view('template/page_footer');
	 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idsilabo');
	 	$array_item=array(
		 	
		 	'idsilabo' => $this->input->post('idsilabo'),
	 		'descripcion' => $this->input->post('descripcion'),
		 	'nombre' => $this->input->post('nombre'),
	 		'duracion' => $this->input->post('duracion'),
	 		'linkdetalle' => $this->input->post('linkdetalle'),
	 		'idasignatura' => $this->input->post('idasignatura'),
	 		'iddocente' => $this->input->post('iddocente'),
	 		'iddocumento' => $this->input->post('iddocumento'),
	 		'idperiodoacademico' => $this->input->post('idperiodoacademico'),
	 	);
	 	$this->silabo_model->update($id,$array_item);
	 	redirect('silabo/actual/'.$id);
 	}


 	public function delete()
 	{
 		$this->silabo_model->delete($this->uri->segment(3));
 //		echo json_encode($data);
	 	redirect('silabo/elultimo');
	//	$db['default']['db_debug']=FALSE
 	}










	public function listar()
	{
		
	  $data['title']="Silabo";
		$this->load->view('template/page_header');		
	  $this->load->view('silabo_list',$data);
		$this->load->view('template/page_footer');
	}



function silabo_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->silabo_model->lista_silabosA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idsilabo,$r->elperiodo,$r->malla,$r->laasignatura,$r->eldocente,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"   data-retorno="'.site_url('silabo/actual').'"    data-idsilabo="'.$r->idsilabo.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
	
			

}


	function unidadsilabo_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$idsilabo=$this->input->get('idsilabo');
			$data0 =$this->unidadsilabo_model->lista_unidades($idsilabo);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idsilabo,$r->idunidadsilabo,$r->unidad,$r->launidad,$r->sesiones,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('unidadsilabo/actual').'"    data-idunidadsilabo="'.$r->idunidadsilabo.'">Ver</a>');
			}	
			$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);
			echo json_encode($output);
			exit();
	}











	function evento_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$idsilabo=$this->input->get('idsilabo');
			$data0 =$this->evento_model->eventoss($idsilabo);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idsilabo,$r->idevento,$r->titulo,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('evento/actual').'"    data-idevento="'.$r->idevento.'">Ver</a>');
			}	
			$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);
			echo json_encode($output);
			exit();
	}






public function panel()
{
	
	$data['silabos'] = $this->silabo_model->lista_silabos()->result();
  	$data['title']="Silabo";
	$this->load->view('template/page_header');		
  	$this->load->view('silabos/silabos',$data);
	$this->load->view('template/page_footer');
}


public function iniciar()
{
  	$data['evento']=array('idsilabo'=>$_GET['idsilabo'],'idevento'=>$_GET['idevento']);	
	$data['silabo'] = $this->silabo_model->silabo($_GET['idsilabo'])->row_array();
	$data['unidadsilabos'] = $this->unidadsilabo_model->lista_unidades($_GET['idsilabo'])->result();
  	$data['title']="Silabo";
	$this->load->view('template/page_header');		
 	$this->load->view('silabos/FundamentosDeProgramacion_clases',$data);
	$this->load->view('template/page_footer');
}




public function actual()
{
	$data['silabo'] = $this->silabo_model->silabo($this->uri->segment(3))->row_array();
	$data['documentosilabos']= $this->documentosilabo_model->listar_documentosilabo1($data['silabo']['idsilabo'])->result();
	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['asignaturas']= $this->asignatura_model->lista_asignaturasA()->result();
 	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
  	$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
	  if(!empty($data))
	  {
	    $data['title']="Silabo";
	    $this->load->view('template/page_header');		
	    $this->load->view('silabo_record',$data);
	    $this->load->view('template/page_footer');
	  }else{
	    $this->load->view('template/page_header');		
	    $this->load->view('registro_vacio');
	    $this->load->view('template/page_footer');
	  }
 }



	public function reportepdf()
	{
		$tmp=explode("-",$this->uri->segment(3));
        	$idsilabo=$tmp[0];
        	if(isset($tmp[1]))
        	{
        		$mesnumero=$tmp[1];
        	}else{
        		$mesnumero=0;
        	}
		$data['unidadsilabo'] =$this->unidadsilabo_model->unidadsilaboss($idsilabo)->result();
		$data['silabo'] =$this->silabo_model->silabo1($idsilabo)->result();
	 	$data['temas']= $this->tema_model->lista_temass($idsilabo)->result();
		$data['asignatura']=$this->asignatura_model->asignatura($data['silabo'][0]->idasignatura)->result();
		$data['metodoaprendizajetema']=$this->metodoaprendizajetema_model->metodoaprendizajetemaxsilabo($data['silabo'][0]->idsilabo)->result();
		$data['malla']=$this->malla_model->malla($data['asignatura'][0]->idmalla)->result();
		$data['departamento']=$this->departamento_model->departamento($data['malla'][0]->iddepartamento)->result();
		$data['calendarioacademico'] = $this->calendarioacademico_model->lista_calendarioacademico2($data['silabo'][0]->idperiodoacademico,$data['malla'][0]->iddepartamento)->result();
		$data['title']="Silabo";
	//	$this->load->view('template/page_header');		
		$this->load->view('silabo_list_pdf',$data);
//		$this->load->view('template/page_footer');
	}



public function exportcsv()
{
	$tmp=explode("-",$this->uri->segment(3));
       	$idsilabo=$tmp[0];
       	if(isset($tmp[1]))
       	{
       		$mesnumero=$tmp[1];
       	}else{
       		$mesnumero=0;
       	}
	$filename='silabo.csv';
	header("Content-Description:File Transfer");
	header("Content-Disposition: attachment; filename=$filename");
	header("Content-Type: application/csv;");

	$data['temas']= $this->tema_model->lista_temassexport($idsilabo)->result_array();

	$file=fopen('php://output','w');
	$header=array("idtema","sesion","nombrecorto","nombrelargo");
	fputcsv($file,$header);
	foreach($data['temas'] as $key=>$value){

	fputcsv($file,$value);
	}
	fclose($file);
	exit;

}





public function elprimero()
{
	$data['silabo'] = $this->silabo_model->elprimero();
	$data['documentosilabos']= $this->documentosilabo_model->listar_documentosilabo1($data['silabo']['idsilabo'])->result();
	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['asignaturas']= $this->asignatura_model->lista_asignaturasA()->result();
 	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
  	$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
  if(!empty($data))
  {
    $data['title']="Silabo";
    $this->load->view('template/page_header');		
    $this->load->view('silabo_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
		$data['silabo'] = $this->silabo_model->elultimo();
			$data['documentosilabos']= $this->documentosilabo_model->listar_documentosilabo1($data['silabo']['idsilabo'])->result();
	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['asignaturas']= $this->asignatura_model->lista_asignaturasA()->result();
 	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
  		$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
  if(!empty($data))
  {
    $data['title']="Silabo";
  
    $this->load->view('template/page_header');		
    $this->load->view('silabo_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['silabo_list']=$this->silabo_model->lista_silabo()->result();
	$data['silabo'] = $this->silabo_model->siguiente($this->uri->segment(3))->row_array();
	$data['documentosilabos']= $this->documentosilabo_model->listar_documentosilabo1($data['silabo']['idsilabo'])->result();
	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['asignaturas']= $this->asignatura_model->lista_asignaturasA()->result();
 	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
  		$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
  	$data['title']="Silabo";
	$this->load->view('template/page_header');		
  	$this->load->view('silabo_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['silabo_list']=$this->silabo_model->lista_silabo()->result();
	$data['silabo'] = $this->silabo_model->anterior($this->uri->segment(3))->row_array();
	$data['documentosilabos']= $this->documentosilabo_model->listar_documentosilabo1($data['silabo']['idsilabo'])->result();
	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['asignaturas']= $this->asignatura_model->lista_asignaturasA()->result();
 	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
  		$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
  	$data['title']="Silabo";
	$this->load->view('template/page_header');		
  	$this->load->view('silabo_record',$data);
	$this->load->view('template/page_footer');
}




public function exportarxls()
{
    $this->load->model('export_model');


	$idperiodoacademico=$this->uri->segment(3);


  $eventos= $this->evento_model->eventosp($idperiodoacademico)->result();


  $silabos= $this->silabo_model->silabosp($idperiodoacademico)->result();
  $criterioseguimientosilabos= $this->criterioseguimientosilabo_model->lista_criterioseguimientosilabos()->result();
// Preparar los datos para exportar a Excel
    $data = array();
    //$data[] = ['No','ASIGNAGURA', 'CÓDIGO','FORMATO INSTITUCIONAL','ENTREGA A AUTORIDAD','PRESENTACION Y ACTUALIZACIÓN A ESTUDIANTE','ENTREGA DE PLANIFICACION', "PLANIFICACION Y ACTUALIZACION DE RESULTADOS DE APRENDIZAJE","No. H/CLASE PLANIFICADAS DE ASIGNATURA",'No. H/CLASE DESARROLLADAS DE ASIGNATURA' , 'CUMPLIMIENTO DE SILABO',"CUMPLIMIENTO DE SISTEMA DE EVALUACION DE ASIGNATURA", "CUMPLIMIENTO CONTRIBUCIÓN DE LOGROS DE APRENDIZAJE",'PRESENTACION DE PORTAFOLIO' ,"RETROALIMENTACION Y PLAN DE MEJORAS" ]; // Encabezados


    $data[] = ['No','ASIGNAGURA', 'CÓDIGO','Docente' ]; // Encabezados


    foreach ($criterioseguimientosilabos as $criterio) {
        $data[0][]=$criterio->nombre;


    }

    $i=1;
    foreach ($eventos as $evento) {
            $seguimientosilabos= $this->seguimientosilabo_model->seguimientosilabos($evento->idevento)->result();

            $data[] = [$i,$evento->laasignatura, $evento->codigo,$evento->eldocente];

            $criteriox=array();
            foreach ($seguimientosilabos as $seguimiento) {
                $criteriox[$seguimiento->idcriterioseguimientosilabo] =$seguimiento->elvalorcriterioseguimientosilabo ;
            }
        
            foreach ($criterioseguimientosilabos as $criterio) {
            if(isset($criteriox[$criterio->idcriterioseguimientosilabo])){
                $data[$i][]=$criteriox[$criterio->idcriterioseguimientosilabo];
            }else{
                $data[$i][]="--";

            }


    }




            $i++;
    }




$filename = 'seguimientosilabo.xlsx';
$this->silabo_model->exportToExcel($data, $filename);
}














}
