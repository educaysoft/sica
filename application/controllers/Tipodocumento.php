<?php

class Tipodocumento extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('tipodocumento_model');
    }

    // Método para mostrar la página principal
    public function index() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['tipodocumento'] = $this->tipodocumento_model->elultimo();
            $data['title'] = "Tipodocumento";
            $this->load->view('template/page_header');
            $this->load->view('tipodocumento_record', $data);
            $this->load->view('template/page_footer');
        } else {
            $this->load->view('template/page_header.php');
            $this->load->view('login_form');
            $this->load->view('template/page_footer.php');
        }
    }

    // Método para mostrar el formulario de agregar nuevo tipodocumento
    public function add() {
        $data['title'] = "Nuevo tipodocumento";
        $this->load->view('template/page_header');
        $this->load->view('tipodocumento_form', $data);
        $this->load->view('template/page_footer');
    }

    // Método para guardar un nuevo tipodocumento
    public function save() {
        $array_item = array(
            'idtipodocumento' => $this->input->post('idtipodocumento'),
            'nombre' => $this->input->post('nombre'),
        );
        $result=$this->tipodocumento_model->save($array_item);

	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('Tipodocumento ya existe'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}


    }

    // Método para mostrar el formulario de edición de tipodocumento
    public function edit() {
        $data['tipodocumento'] = $this->tipodocumento_model->tipodocumento($this->uri->segment(3))->row_array();
        $data['title'] = "Actualizar tipodocumento";
        $this->load->view('template/page_header');
        $this->load->view('tipodocumento_edit', $data);
        $this->load->view('template/page_footer');
    }

    // Método para guardar los cambios realizados en la edición de tipodocumento
    public function save_edit() {
        $id = $this->input->post('idtipodocumento');
        $array_item = array(
            'idtipodocumento' => $this->input->post('idtipodocumento'),
            'nombre' => $this->input->post('nombre'),
        );
        $this->tipodocumento_model->update($id, $array_item);
        redirect('tipodocumento');
    }

    // Método para eliminar un tipodocumento
    public function delete() {
        $data = $this->tipodocumento_model->delete($this->uri->segment(3));
        echo json_encode($data);
        redirect('tipodocumento/elprimero');
        // $db['default']['db_debug'] = FALSE;
    }


 	public function quitar()
 	{
 		$result=$this->tipodocumento_model->quitar($this->uri->segment(3));
	 	if(!$result)
		{
			echo "<script language='JavaScript'> alert('El tipodocumento no pudo eliminarse revise permisos'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 	}






    // Método para listar todos los tipodocumentos
    public function listar() {
        $data['tipodocumento_list'] = $this->tipodocumento_model->lista_tipodocumentosA()->result();
        $data['title'] = "Tipo documento";
        $this->load->view('template/page_header');
        $this->load->view('tipodocumento_list', $data);
        $this->load->view('template/page_footer');
    }

    // Método para obtener datos de tipodocumento en formato JSON
    public function tipodocumento_data() {
        $draw = intval($this->input->get("draw"));
        $draw = intval($this->input->get("start"));
        $draw = intval($this->input->get("length"));

        $data0 = $this->tipodocumento_model->lista_tipodocumentosA();
        $data = array();
        foreach ($data0->result() as $r) {
            $data[] = array($r->idtipodocumento, $r->nombre,
                $r->href = '<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('tipodocumento/actual').'"   data-idtipodocumento="' . $r->idtipodocumento . '">Ver</a>');
        }
        $output = array("draw" => $draw,
            "recordsTotal" => $data0->num_rows(),
            "recordsFiltered" => $data0->num_rows(),
            "data" => $data
        );
        echo json_encode($output);
        exit();
    }

    // Método para mostrar el primer registro de tipodocumento
    public function elprimero() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['tipodocumento'] = $this->tipodocumento_model->elprimero();
            if (!empty($data)) {
                $data['title'] = "Tipo documento";
                $this->load->view('template/page_header');
                $this->load->view('tipodocumento_record', $data);
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

    // Método para mostrar el último registro de tipodocumento
    public function elultimo() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['tipodocumento'] = $this->tipodocumento_model->elultimo();
            if (!empty($data)) {
                $data['title'] = "Tipo documento";
                $this->load->view('template/page_header');
                $this->load->view('tipodocumento_record', $data);
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

    // Método para mostrar el siguiente registro de tipodocumento
    public function siguiente() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['tipodocumento'] = $this->tipodocumento_model->siguiente($this->uri->segment(3))->row_array();
            $data['title'] = "Tipo documento";
            $this->load->view('template/page_header');
            $this->load->view('tipodocumento_record', $data);
            $this->load->view('template/page_footer');
        } else {
            $this->load->view('template/page_header.php');
            $this->load->view('login_form');
            $this->load->view('template/page_footer.php');
        }
    }

    // Método para mostrar el  registro previo del actual en  tipodocumento
    public function anterior(){
  	    if(isset($this->session->userdata['logged_in'])){
            $data['tipodocumento'] = $this->tipodocumento_model->anterior($this->uri->segment(3))->row_array();
            $data['title']="Tipo documento";
            $this->load->view('template/page_header');		
            $this->load->view('tipodocumento_record',$data);
            $this->load->view('template/page_footer');
        } else{
	 	    $this->load->view('template/page_header.php');
		    $this->load->view('login_form');
	 	    $this->load->view('template/page_footer.php');
        } 
    }



public function get_tipodocumento() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idtipodocumento')) {
        $this->db->select('*');
        $this->db->where(array('idtipodocumento' => $this->input->post('idtipodocumento')));
        $query = $this->db->get('documento');
	$data=$query->result();
	echo json_encode($data);
	}

}









}
