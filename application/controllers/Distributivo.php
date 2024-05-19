<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;



class Distributivo extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('distributivo_model');
      $this->load->model('distributivodocente_model');
      $this->load->model('periodoacademico_model');
      $this->load->model('departamento_model');
      $this->load->model('estadodistributivo_model');
      $this->load->model('fechacalendario_model');
      $this->load->model('asignaturadocente_model');

}

//=========================================================
// Es la primera función que se ejecuta cuando llamamos a
// http://educaysoft.org/sica/distributivo
// ========================================================
	public function index(){
		if(isset($this->session->userdata['logged_in'])){
			$data['distributivo']=$this->distributivo_model->elultimo();
			$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos1()->result();
  			$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  			$data['estadodistributivos']= $this->estadodistributivo_model->lista_estadodistributivos()->result();
			$data['title']="Lista de distributivoes";
			$this->load->view('template/page_header');
			$this->load->view('distributivo_record',$data);
			$this->load->view('template/page_footer');
		}else{
			$this->load->view('template/page_header.php');
			$this->load->view('login_form');
			$this->load->view('template/page_footer.php');
		}
	}


	public function add()
	{
			$data['title']="Nueva distributivo";
			$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos()->result();
  			$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  			$data['estadodistributivos']= $this->estadodistributivo_model->lista_estadodistributivos()->result();
			$this->load->view('template/page_header');		
			$this->load->view('distributivo_form',$data);
			$this->load->view('template/page_footer');
	}


	public function  save()
	{


   		date_default_timezone_set('America/Guayaquil');
    		$fecha = date("Y-m-d");
    		$hora= date("H:i:s");
		$idusuario=$this->session->userdata['logged_in']['idusuario'];

	 	$array_item=array(
		'iddepartamento' => $this->input->post('iddepartamento'),
		'idestadodistributivo' => $this->input->post('idestadodistributivo'),
	 	'idperiodoacademico' => $this->input->post('idperiodoacademico'),
	        'idusuario'=>$idusuario,
		'fechacreacion'=>$fecha,
		'horacreacion'=>$hora
	 	);
	 	$result=$this->distributivo_model->save($array_item);
	 	if($result == false)
		{
			echo "<script language='JavaScript'> alert('El distributivo ya fue creado'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 	}



	public function edit()
	{
			$data['distributivo'] = $this->distributivo_model->distributivo($this->uri->segment(3))->row_array();
  			$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  			$data['estadodistributivos']= $this->estadodistributivo_model->lista_estadodistributivos()->result();
			$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos1()->result();
			$data['title'] = "Actualizar distributivo";
			$this->load->view('template/page_header');		
			$this->load->view('distributivo_edit',$data);
			$this->load->view('template/page_footer');
	 
	}


	public function  save_edit()
	{
		$id=$this->input->post('iddistributivo');
	 	$array_item=array(
		 	
		 	'iddistributivo' => $this->input->post('iddistributivo'),
	 		'idperiodoacademico' => $this->input->post('idperiodoacademico'),
		 	'iddepartamento' => $this->input->post('iddepartamento'),
		 	'idestadodistributivo' => $this->input->post('idestadodistributivo'),
	 	);
	 	$this->distributivo_model->update($id,$array_item);
	 	redirect('distributivo/actual/'.$id);
 	}


 	public function delete()
 	{
 		$result->$this->distributivo_model->delete($this->uri->segment(3));
	 	if($result == false)
		{
			echo "<script language='JavaScript'> alert('El distributivo no pudo eliminarse revise permisos'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 //		echo json_encode($data);
	 //	redirect('distributivo/elultimo');
	//	$db['default']['db_debug']=FALSE
 	}










	public function listar()
	{
		
		$data['distributivos'] = $this->distributivo_model->lista_distributivos1(0)->result();
	  	$data['title']="Distributivo";
  		$data['filtro']= $this->uri->segment(3);
		$this->load->view('template/page_header');		
	  	$this->load->view('distributivo_list',$data);
		$this->load->view('template/page_footer');
	}



function distributivo_data_open()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));

		$idperiodoacademico=$this->input->get('idperiodoacademico');

	 	$data0 = $this->distributivo_model->lista_distributivos1_open($idperiodoacademico);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->iddistributivo,$r->elperiodoacademico,$r->eldepartamento,$r->eldistributivo,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"   data-retorno="'.site_url('distributivo/actual').'"    data-iddistributivo="'.$r->iddistributivo.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();

}

function distributivo_data_close()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));

		$idperiodoacademico=$this->input->get('idperiodoacademico');

	 	$data0 = $this->distributivo_model->lista_distributivos1_close($idperiodoacademico);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->iddistributivo,$r->elperiodoacademico,$r->eldepartamento,$r->eldistributivo,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"   data-retorno="'.site_url('distributivo/actual').'"    data-iddistributivo="'.$r->iddistributivo.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
	
			

}









function panel()
{
	
	$data['distributivos'] = $this->distributivo_model->lista_distributivos()->result();
  	$data['title']="Distributivo";
	$this->load->view('template/page_header');		
  	$this->load->view('distributivos/distributivos',$data);
	$this->load->view('template/page_footer');
}


public function iniciar()
{
  	$data['evento']=array('iddistributivo'=>$_GET['iddistributivo'],'idevento'=>$_GET['idevento']);	
	$data['distributivo'] = $this->distributivo_model->distributivo($_GET['iddistributivo'])->row_array();
	$data['periodoacademicos'] = $this->periodoacademico_model->lista_unidades($_GET['iddistributivo'])->result();
  	$data['title']="Distributivo";
	$this->load->view('template/page_header');		
 	$this->load->view('distributivos/FundamentosDeProgramacion_clases',$data);
	$this->load->view('template/page_footer');
}



	function docente_data()
	{

			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$iddistributivo=$this->input->get('iddistributivo');
			$data0 =$this->distributivodocente_model->distributivodocentes1($iddistributivo);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->iddistributivo,$r->iddistributivodocente,$r->iddocente,$r->eldocente,$r->numeasig,$r->horas,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('distributivodocente/actual').'"    data-iddistributivodocente="'.$r->iddistributivodocente.'">Ver</a>');
			}	
			$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);
			echo json_encode($output);
			exit();
	}



	function docente2_data()
	{

			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$iddocente=$this->input->get('iddocente');
			$data0 =$this->distributivodocente_model->distributivodocentes1xdocente($iddocente);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->iddocente,$r->iddistributivo,$r->iddistributivodocente,$r->elperiodoacademico,$r->eldepartamento,$r->numeasig,$r->horas,

				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('distributivodocente/actual').'"    data-iddistributivodocente="'.$r->iddistributivodocente.'">Ver</a>');
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
		$iddistributivo=$this->uri->segment(3);
		$tmp=explode("-",$this->uri->segment(3));
		$iddistributivo=$tmp[0];
		if(isset($tmp[1]))
		{
			$ordenrpt=$tmp[1];
		}else{
			$ordenrpt=0;
		}
	 	$data['asignaturadocentes']= $this->asignaturadocente_model->asignaturadocentexdistributivo5($iddistributivo,$ordenrpt)->result();
		$data['distributivo']=$this->distributivo_model->distributivo1($iddistributivo)->result();
		$data['title']="Evento";
		$this->load->view('distributivo_list_pdf',$data);
	}





	public function reportepdf2()
	{
		$iddistributivo=$this->uri->segment(3);
		$tmp=explode("-",$this->uri->segment(3));
		$iddistributivo=$tmp[0];
		if(isset($tmp[1]))
		{
			$ordenrpt=$tmp[1];
		}else{
			$ordenrpt=0;
		}
	 	$data['asignaturadocentes']= $this->asignaturadocente_model->asignaturadocentexdistributivo4($iddistributivo,$ordenrpt)->result();
		$data['distributivo']=$this->distributivo_model->distributivo1($iddistributivo)->result();
		$data['title']="Evento";
		$this->load->view('distributivo_list_pdf2',$data);
	}









//	public function reportepdf()
//	{
//		$iddistributivo=$this->uri->segment(3);
//	 	$data['fechacalendarios']= $this->fechacalendario_model->lista_fechacalendarios1($idperiodoacademico)->result();
//		$data['distributivodocentes'] =$this->distributivodocente_model->distributivodocentes1($iddistributivo)->result();
///
//		$data['title']="Evento";
//		$this->load->view('distributivo_list_pdf',$data);
//	}






public function actual()
{
	$data['distributivo'] = $this->distributivo_model->distributivo1($this->uri->segment(3))->row_array();
	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
	$data['estadodistributivos']= $this->estadodistributivo_model->lista_estadodistributivos()->result();
	$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos1()->result();
	$data['asignaturadocente'] = $this->asignaturadocente_model->asignaturadocentexdistributivo2($data['distributivo']['iddistributivo'],1)->row_array();
  if(!empty($data))
  {
    $data['title']="Distributivo";
    $this->load->view('template/page_header');		
    $this->load->view('distributivo_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }




public function elprimero()
{
	$data['distributivo'] = $this->distributivo_model->elprimero();
	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
	$data['estadodistributivos']= $this->estadodistributivo_model->lista_estadodistributivos()->result();
	$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos1()->result();
  if(!empty($data))
  {
    $data['title']="Distributivo";
    $this->load->view('template/page_header');		
    $this->load->view('distributivo_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
		$data['distributivo'] = $this->distributivo_model->elultimo();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		$data['estadodistributivos']= $this->estadodistributivo_model->lista_estadodistributivos()->result();
	$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos1()->result();
  if(!empty($data))
  {
    $data['title']="Distributivo";
  
    $this->load->view('template/page_header');		
    $this->load->view('distributivo_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['distributivo_list']=$this->distributivo_model->lista_distributivo()->result();
	$data['distributivo'] = $this->distributivo_model->siguiente($this->uri->segment(3))->row_array();
	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
	$data['estadodistributivos']= $this->estadodistributivo_model->lista_estadodistributivos()->result();
	$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos1()->result();
  	$data['title']="Distributivo";
	$this->load->view('template/page_header');		
  	$this->load->view('distributivo_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['distributivo_list']=$this->distributivo_model->lista_distributivo()->result();
	$data['distributivo'] = $this->distributivo_model->anterior($this->uri->segment(3))->row_array();
	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
	$data['estadodistributivos']= $this->estadodistributivo_model->lista_estadodistributivos()->result();
	$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos1()->result();
  	$data['title']="Distributivo";
	$this->load->view('template/page_header');		
  	$this->load->view('distributivo_record',$data);
	$this->load->view('template/page_footer');
}

public function get_periodoacademico() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idsilabo')) {
        $this->db->select('*');
        $this->db->where(array('idsilabo' => $this->input->post('idsilabo')));
        $query = $this->db->get('periodoacademico');
	$data=$query->result();
	echo json_encode($data);
	}

}

public function exportarxls()
{
$this->load->model('export_model');
$data = [
    ['Nombre', 'Edad', 'Correo'],
    ['Juan', 25, 'juan@example.com'],
    ['María', 30, 'maria@example.com'],
    ['Pedro', 28, 'pedro@example.com'],
];
$filename = 'reporte.xlsx';
$this->export_model->exportToExcel($data, $filename);
}


public function generahorario()
{


 $iddistributivo = $this->uri->segment(3);
    $data0 = $this->asignaturadocente_model->asignaturadocente1xdistributivo($iddistributivo);
    
    $jornada = array();
    $j = array();
    $jornadadocente = array();
    $iddocente = 0;
    $inicio = 0;

    // Horarios predefinidos
    $horainiciomatutino = "07:00:00";
    $horainiciovespertino = "13:00:00";
    $horafinalmatutino = "13:00:00";
    $horafinalvespertino = "16:00:00";
    
    foreach ($data0->result() as $r) {
        if ($inicio == 0) {
            $inicio = 1;
            $aula = $r->numeronivel . ' - ' . $r->paralelo;
        }

        // Inicializa el arreglo $jornada con los valores iniciales
        $jornada = array(
            'iddistributivodocente' => $r->eldistributivodocente,
            'idasignatura' => $r->idasignatura . ' - ' . $r->laasignatura,
            'horassemanales' => $r->horas,
            'nivel' => $r->numeronivel,
            'paralelo' => $r->paralelo,
            'aula' => $r->nivel . "-" . $r->paralelo,
            'iddiasemana' => "",
            'horainicio' => "",
            'horafin' => "",
            'duracionminutos' => 0
        );

        $aula = $r->nivel . "-" . $r->paralelo;

 if (!isset($j[$aula])) {
            $j[$aula] = array();
        }

        $j[$aula][] = $jornada;



        $iddiasemana = 1;
        $horainicio = $r->nivel <= 4 ? $horainiciomatutino : $horainiciovespertino;
        $horafinal = $r->nivel <= 4 ? $horafinalmatutino : $horafinalvespertino;

        while ($r->horas > 0) {
            $duracion = $r->horas >= 2 ? 120 : 60;
            $horainicioDatetime = new DateTime($horainicio);
            $horafinDatetime = clone $horainicioDatetime;
            $horafinDatetime->modify("+$duracion minutes");

            if (($r->nivel <= 4 && $horafinDatetime->format('H:i:s') <= $horafinal) || 
                ($r->nivel > 4 && $horainicio >= $horainiciovespertino && $horafinDatetime->format('H:i:s') <= $horafinal)) {

                // Verifica que no haya cruce de horarios para el docente
                $cruce = false;
                foreach ($jornadadocente as $jd) {
                    if ($jd['iddocente'] == $r->iddocente && $jd['iddiasemana'] == $iddiasemana) {
                        $inicioExistente = new DateTime($jd['horainicio']);
                        $finExistente = new DateTime($jd['horafin']);
                        if (($horainicioDatetime >= $inicioExistente && $horainicioDatetime < $finExistente) ||
                            ($horafinDatetime > $inicioExistente && $horafinDatetime <= $finExistente)) {
                            $cruce = true;
                            break;
                        }
                    }
                }

                if (!$cruce) {
                    $j[$aula]['iddiasemana'] = $iddiasemana;
                    $j[$aula]['horainicio'] = $horainicioDatetime->format('H:i:s');
                    $j[$aula]['horafin'] = $horafinDatetime->format('H:i:s');
                    $j[$aula]['duracionminutos'] = $duracion;

                    $jornadadocente[] = array(
                        'iddocente' => $r->iddocente,
                        'iddiasemana' => $iddiasemana,
                        'horainicio' => $horainicioDatetime->format('H:i:s'),
                        'horafin' => $horafinDatetime->format('H:i:s')
                    );

                    $r->horas -= $duracion / 60;
                    $horainicio = $horafinDatetime->format('H:i:s');
                } else {
                    // Si hay cruce, incrementar el día de la semana y reiniciar el horario
                    $iddiasemana++;
                    $horainicio = $r->nivel <= 4 ? $horainiciomatutino : $horainiciovespertino;
                }
            } else {
                // Si se sale del horario permitido, incrementar el día de la semana y reiniciar el horario
                $iddiasemana++;
                $horainicio = $r->nivel <= 4 ? $horainiciomatutino : $horainiciovespertino;
            }
        }
    }

// Aquí puedes guardar el arreglo $j en la base de datos o realizar alguna otra acción necesaria
    print_r($j);



// print_r($jornadadocente);
    $data['jornadadocente']=$j;
    $this->load->view('template/page_header');		
    $this->load->view('jornadadocente_lista2',$data);
    $this->load->view('template/page_footer');



}




}
