<?php

class Jornadadocente extends CI_Controller{

  public function __construct(){
      parent::__construct();
  	  $this->load->model('docente_model');
  	  $this->load->model('asignatura_model');
  	  $this->load->model('diasemana_model');
  	  $this->load->model('aula_model');
  	  $this->load->model('jornadadocente_model');
  	  $this->load->model('horariodocente_model');
  	  $this->load->model('asignaturadocente_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  		$data['jornadadocente']=$this->jornadadocente_model->elultimo();
  		$data['horariodocentes']=$this->horariodocente_model->lista_horariodocentesA()->result();
  		$data['asignaturadocentes']=$this->asignaturadocente_model->lista_asignaturadocentesA(0)->result();
  		$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
  		$data['diasemanas']= $this->diasemana_model->lista_diasemanas()->result();
  		$data['aulas']= $this->aula_model->lista_aulas()->result();
		$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
			
		$data['title']="Lista de jornadadocentes";
		$this->load->view('template/page_header');
		$this->load->view('jornadadocente_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}

 }


public function add()
{

	if($this->uri->segment(3)){
  		$data['asignaturadocentes']=$this->asignaturadocente_model->asignaturadocente1($this->uri->segment(3))->result();
	}else{
  		$data['asignaturadocentes']=$this->asignaturadocente_model->asignaturadocente1(0)->result();
	}

	$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
	$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
  	$data['horariodocentes']=$this->horariodocente_model->lista_horariodocentesA()->result();
  	$data['diasemanas']= $this->diasemana_model->lista_diasemanas()->result();
  	$data['aulas']= $this->aula_model->lista_aulas()->result();
	$data['title']="Nueva Jornadadocente";
 	$this->load->view('template/page_header');		
 	$this->load->view('jornadadocente_form',$data);
 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
			'idasignaturadocente' => $this->input->post('idasignaturadocente'),
			'iddiasemana' => $this->input->post('iddiasemana'),
			'idaula' => $this->input->post('idaula'),
			'horainicio' => $this->input->post('horainicio'),
			'duracionminutos' => $this->input->post('duracionminutos'),
	 	);
	         $result=$this->jornadadocente_model->save($array_item);

	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('Jornada ya esta asignada'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 	}



	public function edit()
	{
			$data['jornadadocente'] = $this->jornadadocente_model->jornadadocente($this->uri->segment(3))->row_array();
  	$data['aulas']= $this->aula_model->lista_aulas()->result();
  	$data['diasemanas']= $this->diasemana_model->lista_diasemanas()->result();
  	$data['asignaturadocentes']=$this->asignaturadocente_model->lista_asignaturadocentesA(0)->result();
			$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
			$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
			$data['title'] = "Actualizar Jornadadocente";
			$this->load->view('template/page_header');		
			$this->load->view('jornadadocente_edit',$data);
			$this->load->view('template/page_footer');
	 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idjornadadocente');
	 	$array_item=array(
			'idjornadadocente' => $this->input->post('idjornadadocente'),
			'idasignaturadocente' => $this->input->post('idasignaturadocente'),
			'iddiasemana' => $this->input->post('iddiasemana'),
			'idaula' => $this->input->post('idaula'),
			'horainicio' => $this->input->post('horainicio'),
			'duracionminutos' => $this->input->post('duracionminutos'),

	 	);
	 	$this->jornadadocente_model->update($id,$array_item);
	 	redirect('jornadadocente/actual/'.$id);
 	}


 	public function delete()
 	{
 		$data=$this->jornadadocente_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('jornadadocente/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


    public function listar()
    {
        
      $data['title']="Jornadadocentes";
        $this->load->view('template/page_header');		
      $this->load->view('jornadadocente_list',$data);
        $this->load->view('template/page_footer');
    }



    function jornadadocente_data()
    {
            $draw= intval($this->input->get("draw"));
            $draw= intval($this->input->get("start"));
            $draw= intval($this->input->get("length"));


            $data0 = $this->jornadadocente_model->lista_jornadadocentesA();
            $data=array();
            foreach($data0->result() as $r){
                $data[]=array($r->idjornadadocente,$r->eldistributivodocente,$r->laasignatura,$r->nivel,$r->paralelo,$r->elaula,$r->nombre,$r->horainicio,$r->duracionminutos,
                    $r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('jornadadocente/actual').'"  data-idjornadadocente="'.$r->idjornadadocente.'">Ver</a>');
            }	
            $output=array( "draw"=>$draw,
                "recordsTotal"=> $data0->num_rows(),
                "recordsFiltered"=> $data0->num_rows(),
                "data"=>$data
            );
            echo json_encode($output);
            exit();

    }



public function actual()
{
	$data['jornadadocente'] = $this->jornadadocente_model->jornadadocente($this->uri->segment(3))->row_array();
  	$data['docentes']= $this->docente_model->lista_docentes()->result();
  	$data['aulas']= $this->aula_model->lista_aulas()->result();
  	$data['horariodocentes']=$this->horariodocente_model->lista_horariodocentesA()->result();
  	$data['asignaturadocentes']=$this->asignaturadocente_model->lista_asignaturadocentesA(0)->result();
		$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
  	$data['diasemanas']= $this->diasemana_model->lista_diasemanas()->result();
	  if(!empty($data))
	  {
  	$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
    $data['title']="Jornadadocente";
    $this->load->view('template/page_header');		
    $this->load->view('jornadadocente_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }


public function generajornadas()
{
	 	$data0 = $this->jornadadocente_model->jornadadocentexdist2(19);
        $jornada= array();
        $j= array();
        $jornadadocente= array();
        $iddocente=0;
        $inicio=0;
		foreach($data0->result() as $r){
            if($inicio==0){
                $inicio=1;
              $iddocente=$r->iddistributivodocente;
                $iddistributivodocente=$r->iddistributivodocente;
                $eldistributivodocente=$r->eldistributivodocente;
            }

       if($iddocente == $r->iddistributivodocente){
             $jornada['idasignatura']=$r->idasignatura.' - '.$r->laasignatura;
             $jornada['nivel']=$r->nivel;
             $jornada['paralelo']=$r->paralelo;
             $jornada['aula']=$r->elaula;
             $jornada['dia']=$r->nombre;
             $jornada['horainicio']=$r->horainicio;
             $jornada['horafin']=$r->horainicio;
             $jornada['duracionminutos']=$r->duracionminutos;

            $horaInicial = new DateTime($r->horainicio); // Crear objeto DateTime con la hora inicial
            $duracionMinutos = $r->duracionminutos; // Obtener la duración en minutos
    
            // Agregar la duración en minutos a la hora inicial
            $horaFinal = clone $horaInicial; // Clonar la hora inicial para no modificarla directamente
            $horaFinal->add(new DateInterval('PT' . $duracionMinutos . 'M')); // Agregar duración en minutos
    
            // Obtener la hora final formateada
            $horaFinalFormateada = $horaFinal->format('H:i:s');
            $jornada['horafinal'] = $horaFinalFormateada; // Agregar la hora final al arreglo $jornada

            $j[$r->idjornadadocente]=$jornada;
       }else{
            //  if($iddocente != $r->iddistributivodocente){
              $jornadadocente[$iddistributivodocente." - ".$eldistributivodocente]=$j;
              $j= array();
              $iddocente=$r->iddistributivodocente;
                $iddistributivodocente=$r->iddistributivodocente;
                $eldistributivodocente=$r->eldistributivodocente;
   
              $jornada['idasignatura']=$r->idasignatura.' - '.$r->laasignatura;
             $jornada['nivel']=$r->nivel;
             $jornada['paralelo']=$r->paralelo;
             $jornada['aula']=$r->elaula;
             $jornada['dia']=$r->nombre;
             $jornada['horainicio']=$r->horainicio;
             $jornada['horafin']=$r->horainicio;
             $jornada['duracionminutos']=$r->duracionminutos;

            $horaInicial = new DateTime($r->horainicio); // Crear objeto DateTime con la hora inicial
            $duracionMinutos = $r->duracionminutos; // Obtener la duración en minutos
    
        // Agregar la duración en minutos a la hora inicial
        $horaFinal = clone $horaInicial; // Clonar la hora inicial para no modificarla directamente
        $horaFinal->add(new DateInterval('PT' . $duracionMinutos . 'M')); // Agregar duración en minutos
    
        // Obtener la hora final formateada
        $horaFinalFormateada = $horaFinal->format('H:i:s');
        $jornada['horafinal'] = $horaFinalFormateada; // Agregar la hora final al arreglo $jornada



            $j[$r->idjornadadocente]=$jornada;
   
   
   
   
   
   
       }
        }
// print_r($jornadadocente);
    $data['jornadadocente']=$jornadadocente;
    $this->load->view('template/page_header');		
    $this->load->view('jornadadocente_lista2',$data);
    $this->load->view('template/page_footer');
}


public function generajornadas2()
{
	 	$data0 = $this->jornadadocente_model->jornadadocentexdist3(19);
        $jornada= array();
        $j= array();
        $jornadadocente= array();
        $iddocente=0;
        $inicio=0;
		foreach($data0->result() as $r){
            if($inicio==0){
              $inicio=1;
             // $iddocente=$r->iddistributivodocente;
              $iddocente=$r->numeronivel.' - '.$r->paralelo;
              $iddistributivodocente=$r->numeronivel.' - '.$r->paralelo;
              $eldistributivodocente=$r->nivel.' - '.$r->paralelo;
            }

       if($iddocente == $r->numeronivel.' - '.$r->paralelo){
             $jornada['idasignatura']=$r->idasignatura.' - '.$r->laasignatura;
             $jornada['nivel']=$r->nivel;
             $jornada['paralelo']=$r->paralelo;
             $jornada['aula']=$r->elaula;
             $jornada['dia']=$r->nombre;
             $jornada['horainicio']=$r->horainicio;
             $jornada['horafin']=$r->horainicio;
             $jornada['duracionminutos']=$r->duracionminutos;

            $horaInicial = new DateTime($r->horainicio); // Crear objeto DateTime con la hora inicial
            $duracionMinutos = $r->duracionminutos; // Obtener la duración en minutos
    
            // Agregar la duración en minutos a la hora inicial
            $horaFinal = clone $horaInicial; // Clonar la hora inicial para no modificarla directamente
            $horaFinal->add(new DateInterval('PT' . $duracionMinutos . 'M')); // Agregar duración en minutos
    
            // Obtener la hora final formateada
            $horaFinalFormateada = $horaFinal->format('H:i:s');
            $jornada['horafinal'] = $horaFinalFormateada; // Agregar la hora final al arreglo $jornada

            $j[$r->idjornadadocente]=$jornada;
       }else{
            //  if($iddocente != $r->iddistributivodocente){
              $jornadadocente[$iddistributivodocente." - ".$eldistributivodocente]=$j;
              $j= array();

              $iddocente=$r->numeronivel.' - '.$r->paralelo;
              $iddistributivodocente=$r->numeronivel.' - '.$r->paralelo;
              $eldistributivodocente=$r->nivel.' - '.$r->paralelo;


   
              $jornada['idasignatura']=$r->idasignatura.' - '.$r->laasignatura;
             $jornada['nivel']=$r->nivel;
             $jornada['paralelo']=$r->paralelo;
             $jornada['aula']=$r->elaula;
             $jornada['dia']=$r->nombre;
             $jornada['horainicio']=$r->horainicio;
             $jornada['horafin']=$r->horainicio;
             $jornada['duracionminutos']=$r->duracionminutos;

            $horaInicial = new DateTime($r->horainicio); // Crear objeto DateTime con la hora inicial
            $duracionMinutos = $r->duracionminutos; // Obtener la duración en minutos
    
        // Agregar la duración en minutos a la hora inicial
        $horaFinal = clone $horaInicial; // Clonar la hora inicial para no modificarla directamente
        $horaFinal->add(new DateInterval('PT' . $duracionMinutos . 'M')); // Agregar duración en minutos
    
        // Obtener la hora final formateada
        $horaFinalFormateada = $horaFinal->format('H:i:s');
        $jornada['horafinal'] = $horaFinalFormateada; // Agregar la hora final al arreglo $jornada

            $j[$r->idjornadadocente]=$jornada;
   
       }
        }
// print_r($jornadadocente);
    $data['jornadadocente']=$jornadadocente;
    $this->load->view('template/page_header');		
    $this->load->view('jornadadocente_lista2',$data);
    $this->load->view('template/page_footer');
}








public function elprimero()
{
  	$data['docentes']= $this->docente_model->lista_docentes()->result();
	$data['jornadadocente'] = $this->jornadadocente_model->elprimero();
  	$data['horariodocentes']=$this->horariodocente_model->lista_horariodocentesA()->result();
  	$data['aulas']= $this->aula_model->lista_aulas()->result();
  	$data['diasemanas']= $this->diasemana_model->lista_diasemanas()->result();
  	$data['asignaturadocentes']=$this->asignaturadocente_model->lista_asignaturadocentesA(0)->result();
		$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
	  if(!empty($data))
	  {
  	$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
    $data['title']="Jornadadocente";
    $this->load->view('template/page_header');		
    $this->load->view('jornadadocente_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['jornadadocente'] = $this->jornadadocente_model->elultimo();
  	$data['docentes']= $this->docente_model->lista_docentes()->result();
  	$data['aulas']= $this->aula_model->lista_aulas()->result();
  	$data['asignaturadocentes']=$this->asignaturadocente_model->lista_asignaturadocentesA(0)->result();
  	$data['horariodocentes']=$this->horariodocente_model->lista_horariodocentesA()->result();
		$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
  	$data['diasemanas']= $this->diasemana_model->lista_diasemanas()->result();
  if(!empty($data))
  {
  	$data['docentes']= $this->docente_model->lista_docentes()->result();
    $data['title']="Jornadadocente";
  
    $this->load->view('template/page_header');		
    $this->load->view('jornadadocente_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['jornadadocente_list']=$this->jornadadocente_model->lista_jornadadocente()->result();
	$data['jornadadocente'] = $this->jornadadocente_model->siguiente($this->uri->segment(3))->row_array();
  	$data['aulas']= $this->aula_model->lista_aulas()->result();
  	$data['docentes']= $this->docente_model->lista_docentes()->result();
  	$data['asignaturadocentes']=$this->asignaturadocente_model->lista_asignaturadocentesA(0)->result();
  	$data['horariodocentes']=$this->horariodocente_model->lista_horariodocentesA()->result();
		$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
  	$data['diasemanas']= $this->diasemana_model->lista_diasemanas()->result();
  

$data['title']="Jornadadocente";
	$this->load->view('template/page_header');		
  $this->load->view('jornadadocente_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['jornadadocente_list']=$this->jornadadocente_model->lista_jornadadocente()->result();
	$data['jornadadocente'] = $this->jornadadocente_model->anterior($this->uri->segment(3))->row_array();
 	$data['docentes']= $this->docente_model->lista_docentes()->result();
  	$data['asignaturadocentes']=$this->asignaturadocente_model->lista_asignaturadocentesA(0)->result();
  	$data['aulas']= $this->aula_model->lista_aulas()->result();
  	$data['horariodocentes']=$this->horariodocente_model->lista_horariodocentesA()->result();
	$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
  	$data['diasemanas']= $this->diasemana_model->lista_diasemanas()->result();
  $data['title']="Jornadadocente";
	$this->load->view('template/page_header');		
  $this->load->view('jornadadocente_record',$data);
	$this->load->view('template/page_footer');
}




}
