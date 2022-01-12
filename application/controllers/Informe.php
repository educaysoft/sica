<?php
class Informe extends  CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('informe_model');
	}



	public function index(){
	 $data['informe_list'] = $this->informe_model->list_informes()->result();
 	$data['title'] = "Listado de Genero";
 $this->load->view('template/page_header');		
 	$this->load->view('informe_list',$data);
	 $this->load->view('template/page_footer');
 	}

 public function add()
 {
 $data['title'] = "Nuevo  Genero";
 $this->load->view('template/page_header');		
	 $this->load->view('informe_form',$data);
	 $this->load->view('template/page_footer');
 }
 public function  save()
 {
	 $array_item=array(
		 'informes' => $this->input->post('informes'));
	 $this->informes_model->save($array_item);
	 redirect('informes');
 }

public function save_edit()
 {

 $id = $this->input->post('idinformes');

 $array_item = array(
 'informes' => $this->input->post('informes')
 );

 $this->informes_model->update($id,$array_item);
 redirect('informes');
 }

 public function edit(){
 $data['informes'] = $this->informes_model->informes($this->uri->segment(3))->row_array();
 $data['title'] = "Modificar  Genero";
 $this->load->view('template/page_header');		
 $this->load->view('informes_edit',$data);
	 $this->load->view('template/page_footer');
 }

 public function delete()
 {
 $id=$this->uri->segment(3);
 $this->load->model('informes_model');
 $this->informes_model->delete($id);
 redirect('informes');

 }

	public function imprimir(){
	 $data['maestrante_list'] = $this->informe_model->maestrantes()->result();
 	$data['title'] = "Reportes de maestrante y su estado";
 //$this->load->view('template/informes_header');		
 	$this->load->view('informe_maestrantes',$data);
//	 $this->load->view('template/page_footer');
 	}





}
