<?php
class Unidadsilabo extends CI_Controller{

	public function __construct(){
      		parent::__construct();
      		$this->load->model('unidadsilabo_model');
      		$this->load->model('persona_model');
      		$this->load->model('silabo_model');
      		$this->load->model('tema_model');
	}

	public function index(){
  		$data['silabos']= $this->silabo_model->lista_silabos()->result();
  		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['unidadsilabo'] = $this->unidadsilabo_model->elultimo();

 		// print_r($data['unidadsilabo_list']);
  		$data['title']="Lista de Unidadsilaboes";
		$this->load->view('template/page_header');		
  		$this->load->view('unidadsilabo_record',$data);
		$this->load->view('template/page_footer');
	}


	public function add()
	{
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['silabos']= $this->silabo_model->lista_silabos()->result();
		$data['unidadsilabo'] = $this->unidadsilabo_model->elultimo();
		$data['title']="Nueva unidades del silabo";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('unidadsilabo_form',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	'idsilabo' => $this->input->post('idsilabo'),
		 	'nombre' => $this->input->post('nombre'),
		 	'unidad' => $this->input->post('unidad'),
	 	);
	 	$this->unidadsilabo_model->save($array_item);
	 	redirect('unidadsilabo');
 	}



	public function edit()
	{
	 	$data['unidadsilabo'] = $this->unidadsilabo_model->unidadsilabo($this->uri->segment(3))->row_array();
		$data['silabos']= $this->silabo_model->lista_silabos()->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
 	 	$data['title'] = "Actualizar Unidadsilabo";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('unidadsilabo_edit',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save_edit()
	{
		$id=$this->input->post('idunidadsilabo');
	 	$array_item=array(
		 	'nombre' => $this->input->post('nombre'),
		 	'unidad' => $this->input->post('unidad'),
		 	'idsilabo' => $this->input->post('idsilabo'),
	 	);
	 	$this->unidadsilabo_model->update($id,$array_item);
	 	redirect('unidadsilabo');
 	}

	public function  save_edit2()
	{
		$id=$this->input->post('idunidadsilabo');
	 	$array_item=array(
		 	'idsilabo' => $this->input->post('idsilabo'),
		 	'idpersona' => $this->input->post('idpersona'),
	 	);
	 	echo $this->unidadsilabo_model->update($id,$array_item);
 	}



 	public function delete()
 	{
 		$data=$this->unidadsilabo_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('unidadsilabo/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


	public function listar()
	{
		
		$data['title']="Unidades del silabo";
		$this->load->view('template/page_header');		
		$this->load->view('unidadsilabo_list',$data);
		$this->load->view('template/page_footer');
	}



	function unidadsilabo_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));


			$data0 = $this->unidadsilabo_model->listar_unidadsilabo1();
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idunidadsilabo,$r->idsilabo,$r->unidad,$r->launidad,$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idsilabo="'.$r->idunidadsilabo.'">Ver</a>');
			}	
			$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);
			echo json_encode($output);
			exit();
	}





	function tema_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$idunidadsilabo=$this->input->get('idunidadsilabo');
			$data0 =$this->tema_model->temas1($idunidadsilabo);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idunidadsilabo,$r->idtema,$r->unidad,$r->numerosesion,$r->nombrecorto,$r->duracionminutos,$r->idvideotutorial,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('tema/actual').'"    data-idtema="'.$r->idtema.'">Ver</a>');
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
		$data['unidadsilabo'] = $this->unidadsilabo_model->unidadsilabo($this->uri->segment(3))->row_array();
	  if(!empty($data))
	  {
			$data['silabos']= $this->silabo_model->lista_silabos()->result();

		$data['personas']= $this->persona_model->lista_personas()->result();
	    $data['title']="Unidadsilabo del videotutorial";
	    $this->load->view('template/page_header');		
	    $this->load->view('unidadsilabo_record',$data);
	    $this->load->view('template/page_footer');
	  }else{
	    $this->load->view('template/page_header');		
	    $this->load->view('registro_vacio');
	    $this->load->view('template/page_footer');
	  }
	}







	public function elprimero()
	{
		$data['unidadsilabo'] = $this->unidadsilabo_model->elprimero();
	  if(!empty($data))
	  {
			$data['silabos']= $this->silabo_model->lista_silabos()->result();

		$data['personas']= $this->persona_model->lista_personas()->result();
	    $data['title']="Unidadsilabo del videotutorial";
	    $this->load->view('template/page_header');		
	    $this->load->view('unidadsilabo_record',$data);
	    $this->load->view('template/page_footer');
	  }else{
	    $this->load->view('template/page_header');		
	    $this->load->view('registro_vacio');
	    $this->load->view('template/page_footer');
	  }
	}

	public function elultimo()
	{
		$data['unidadsilabo'] = $this->unidadsilabo_model->elultimo();
	  if(!empty($data))
	  {
			$data['silabos']= $this->silabo_model->lista_silabos()->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
	    $data['title']="Unidadsilabo del videotutorial";
	  
	    $this->load->view('template/page_header');		
	    $this->load->view('unidadsilabo_record',$data);
	    $this->load->view('template/page_footer');
	  }else{

	    $this->load->view('template/page_header');		
	    $this->load->view('registro_vacio');
	    $this->load->view('template/page_footer');
	  }
	}

	public function siguiente(){
	 // $data['unidadsilabo_list']=$this->unidadsilabo_model->lista_unidadsilabo()->result();
		$data['unidadsilabo'] = $this->unidadsilabo_model->siguiente($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['silabos']= $this->silabo_model->lista_silabos()->result();
	    $data['title']="Unidadsilabo del videotutorial";
	 // $data['title']="Correo";
		$this->load->view('template/page_header');		
	  $this->load->view('unidadsilabo_record',$data);
		$this->load->view('template/page_footer');
	}

	public function anterior(){
	 // $data['unidadsilabo_list']=$this->unidadsilabo_model->lista_unidadsilabo()->result();
	$data['unidadsilabo'] = $this->unidadsilabo_model->anterior($this->uri->segment(3))->row_array();
	$data['personas']= $this->persona_model->lista_personas()->result();
	$data['silabos']= $this->silabo_model->lista_silabos()->result();
	 // $data['title']="Correo";
	    $data['title']="Unidadsilabo del videotutorial";
		$this->load->view('template/page_header');		
	  $this->load->view('unidadsilabo_record',$data);
		$this->load->view('template/page_footer');
	}


}
