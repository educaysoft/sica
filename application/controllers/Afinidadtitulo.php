<?php

class Afinidadtitulo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('afinidadtitulo_model');
    }

    // Método para mostrar la página principal
    public function index() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['afinidadtitulo'] = $this->afinidadtitulo_model->elultimo();
            $data['title'] = "Afinidadtitulo";
            $this->load->view('template/page_header');
            $this->load->view('afinidadtitulo_record', $data);
            $this->load->view('template/page_footer');
        } else {
            $this->load->view('template/page_header.php');
            $this->load->view('login_form');
            $this->load->view('template/page_footer.php');
        }
    }

    // Método para mostrar el formulario de agregar nuevo afinidadtitulo
    public function add() {
        $data['title'] = "Nuevo afinidadtitulo";
        $this->load->view('template/page_header');
        $this->load->view('afinidadtitulo_form', $data);
        $this->load->view('template/page_footer');
    }

    // Método para guardar un nuevo afinidadtitulo
    public function save() {
        $array_item = array(
            'idafinidadtitulo' => $this->input->post('idafinidadtitulo'),
            'nombre' => $this->input->post('nombre'),
        );
        $result=$this->afinidadtitulo_model->save($array_item);

	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('Afinidadtitulo ya existe'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}


    }

    // Método para mostrar el formulario de edición de afinidadtitulo
    public function edit() {
        $data['afinidadtitulo'] = $this->afinidadtitulo_model->afinidadtitulo($this->uri->segment(3))->row_array();
        $data['title'] = "Actualizar afinidadtitulo";
        $this->load->view('template/page_header');
        $this->load->view('afinidadtitulo_edit', $data);
        $this->load->view('template/page_footer');
    }

    // Método para guardar los cambios realizados en la edición de afinidadtitulo
    public function save_edit() {
        $id = $this->input->post('idafinidadtitulo');
        $array_item = array(
            'idafinidadtitulo' => $this->input->post('idafinidadtitulo'),
            'nombre' => $this->input->post('nombre'),
        );
        $this->afinidadtitulo_model->update($id, $array_item);
        redirect('afinidadtitulo');
    }

    // Método para eliminar un afinidadtitulo
    public function delete() {
        $data = $this->afinidadtitulo_model->delete($this->uri->segment(3));
        echo json_encode($data);
        redirect('afinidadtitulo/elprimero');
        // $db['default']['db_debug'] = FALSE;
    }


 	public function quitar()
 	{
 		$result=$this->afinidadtitulo_model->quitar($this->uri->segment(3));
	 	if(!$result)
		{
			echo "<script language='JavaScript'> alert('El afinidadtitulo no pudo eliminarse revise permisos'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 	}






    // Método para listar todos los afinidadtitulos
    public function listar() {
        $data['afinidadtitulo_list'] = $this->afinidadtitulo_model->lista_afinidadtitulosA()->result();
        $data['title'] = "Tipo documento";
        $this->load->view('template/page_header');
        $this->load->view('afinidadtitulo_list', $data);
        $this->load->view('template/page_footer');
    }

    // Método para obtener datos de afinidadtitulo en formato JSON
    public function afinidadtitulo_data() {
        $draw = intval($this->input->get("draw"));
        $draw = intval($this->input->get("start"));
        $draw = intval($this->input->get("length"));

        $data0 = $this->afinidadtitulo_model->lista_afinidadtitulosA();
        $data = array();
        foreach ($data0->result() as $r) {
            $data[] = array($r->idafinidadtitulo, $r->nombre,
                $r->href = '<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('afinidadtitulo/actual').'"   data-idafinidadtitulo="' . $r->idafinidadtitulo . '">Ver</a>');
        }
        $output = array("draw" => $draw,
            "recordsTotal" => $data0->num_rows(),
            "recordsFiltered" => $data0->num_rows(),
            "data" => $data
        );
        echo json_encode($output);
        exit();
    }

    // Método para mostrar el primer registro de afinidadtitulo
    public function elprimero() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['afinidadtitulo'] = $this->afinidadtitulo_model->elprimero();
            if (!empty($data)) {
                $data['title'] = "Tipo documento";
                $this->load->view('template/page_header');
                $this->load->view('afinidadtitulo_record', $data);
                $this->load->view('template/page_footer');
            } else {
                $this->load->view('template/page_header');
                $this->load->view('registro_vacio');
                $this->load->view('template/page_footer');
            }
        } else {
            $this->load->view('template/page_header.php');
            $this->load->view('login_form');
            $this->load->view('template/page_footer.php');
        }
    }

    // Método para mostrar el último registro de afinidadtitulo
    public function elultimo() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['afinidadtitulo'] = $this->afinidadtitulo_model->elultimo();
            if (!empty($data)) {
                $data['title'] = "Tipo documento";
                $this->load->view('template/page_header');
                $this->load->view('afinidadtitulo_record', $data);
                $this->load->view('template/page_footer');
            } else {
                $this->load->view('template/page_header');
                $this->load->view('registro_vacio');
                $this->load->view('template/page_footer');
            }
        } else {
            $this->load->view('template/page_header.php');
            $this->load->view('login_form');
            $this->load->view('template/page_footer.php');
        }
    }

    // Método para mostrar el siguiente registro de afinidadtitulo
    public function siguiente() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['afinidadtitulo'] = $this->afinidadtitulo_model->siguiente($this->uri->segment(3))->row_array();
            $data['title'] = "Tipo documento";
            $this->load->view('template/page_header');
            $this->load->view('afinidadtitulo_record', $data);
            $this->load->view('template/page_footer');
        } else {
            $this->load->view('template/page_header.php');
            $this->load->view('login_form');
            $this->load->view('template/page_footer.php');
        }
    }

    // Método para mostrar el  registro previo del actual en  afinidadtitulo
    public function anterior(){
  	    if(isset($this->session->userdata['logged_in'])){
            $data['afinidadtitulo'] = $this->afinidadtitulo_model->anterior($this->uri->segment(3))->row_array();
            $data['title']="Tipo documento";
            $this->load->view('template/page_header');		
            $this->load->view('afinidadtitulo_record',$data);
            $this->load->view('template/page_footer');
        } else{
	 	    $this->load->view('template/page_header.php');
		    $this->load->view('login_form');
	 	    $this->load->view('template/page_footer.php');
        } 
    }



public function get_afinidadtitulo() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idafinidadtitulo')) {
        $this->db->select('*');
        $this->db->where(array('idafinidadtitulo' => $this->input->post('idafinidadtitulo')));
        $query = $this->db->get('documento');
	$data=$query->result();
	echo json_encode($data);
	}

}









}
