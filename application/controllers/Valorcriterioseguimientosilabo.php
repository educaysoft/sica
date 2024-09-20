<?php

class Valorcriterioseguimientosilabo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('valorcriterioseguimientosilabo_model');
    }

    // Método para mostrar la página principal
    public function index() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['valorcriterioseguimientosilabo'] = $this->valorcriterioseguimientosilabo_model->elultimo();
            $data['title'] = "Valorcriterioseguimientosilabo";
            $this->load->view('template/page_header');
            $this->load->view('valorcriterioseguimientosilabo_record', $data);
            $this->load->view('template/page_footer');
        } else {
            $this->load->view('template/page_header.php');
            $this->load->view('login_form');
            $this->load->view('template/page_footer.php');
        }
    }

    // Método para mostrar el formulario de agregar nuevo valorcriterioseguimientosilabo
    public function add() {
        $data['title'] = "Nuevo valorcriterioseguimientosilabo";
        $this->load->view('template/page_header');
        $this->load->view('valorcriterioseguimientosilabo_form', $data);
        $this->load->view('template/page_footer');
    }

    // Método para guardar un nuevo valorcriterioseguimientosilabo
    public function save() {
        $array_item = array(
            'idvalorcriterioseguimientosilabo' => $this->input->post('idvalorcriterioseguimientosilabo'),
            'nombre' => $this->input->post('nombre'),
        );
        $result=$this->valorcriterioseguimientosilabo_model->save($array_item);

	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('Valorcriterioseguimientosilabo ya existe'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}


    }

    // Método para mostrar el formulario de edición de valorcriterioseguimientosilabo
    public function edit() {
        $data['valorcriterioseguimientosilabo'] = $this->valorcriterioseguimientosilabo_model->valorcriterioseguimientosilabo($this->uri->segment(3))->row_array();
        $data['title'] = "Actualizar valorcriterioseguimientosilabo";
        $this->load->view('template/page_header');
        $this->load->view('valorcriterioseguimientosilabo_edit', $data);
        $this->load->view('template/page_footer');
    }

    // Método para guardar los cambios realizados en la edición de valorcriterioseguimientosilabo
    public function save_edit() {
        $id = $this->input->post('idvalorcriterioseguimientosilabo');
        $array_item = array(
            'idvalorcriterioseguimientosilabo' => $this->input->post('idvalorcriterioseguimientosilabo'),
            'nombre' => $this->input->post('nombre'),
        );
        $this->valorcriterioseguimientosilabo_model->update($id, $array_item);
        redirect('valorcriterioseguimientosilabo');
    }

    // Método para eliminar un valorcriterioseguimientosilabo
    public function delete() {
        $data = $this->valorcriterioseguimientosilabo_model->delete($this->uri->segment(3));
        echo json_encode($data);
        redirect('valorcriterioseguimientosilabo/elprimero');
        // $db['default']['db_debug'] = FALSE;
    }


 	public function quitar()
 	{
 		$result=$this->valorcriterioseguimientosilabo_model->quitar($this->uri->segment(3));
	 	if(!$result)
		{
			echo "<script language='JavaScript'> alert('El valorcriterioseguimientosilabo no pudo eliminarse revise permisos'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 	}






    // Método para listar todos los valorcriterioseguimientosilabos
    public function listar() {
        $data['valorcriterioseguimientosilabo_list'] = $this->valorcriterioseguimientosilabo_model->lista_valorcriterioseguimientosilabosA()->result();
        $data['title'] = "Tipo documento";
        $this->load->view('template/page_header');
        $this->load->view('valorcriterioseguimientosilabo_list', $data);
        $this->load->view('template/page_footer');
    }

    // Método para obtener datos de valorcriterioseguimientosilabo en formato JSON
    public function valorcriterioseguimientosilabo_data() {
        $draw = intval($this->input->get("draw"));
        $draw = intval($this->input->get("start"));
        $draw = intval($this->input->get("length"));

        $data0 = $this->valorcriterioseguimientosilabo_model->lista_valorcriterioseguimientosilabosA();
        $data = array();
        foreach ($data0->result() as $r) {
            $data[] = array($r->idvalorcriterioseguimientosilabo, $r->nombre,
                $r->href = '<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('valorcriterioseguimientosilabo/actual').'"   data-idvalorcriterioseguimientosilabo="' . $r->idvalorcriterioseguimientosilabo . '">Ver</a>');
        }
        $output = array("draw" => $draw,
            "recordsTotal" => $data0->num_rows(),
            "recordsFiltered" => $data0->num_rows(),
            "data" => $data
        );
        echo json_encode($output);
        exit();
    }

    // Método para mostrar el primer registro de valorcriterioseguimientosilabo
    public function elprimero() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['valorcriterioseguimientosilabo'] = $this->valorcriterioseguimientosilabo_model->elprimero();
            if (!empty($data)) {
                $data['title'] = "Tipo documento";
                $this->load->view('template/page_header');
                $this->load->view('valorcriterioseguimientosilabo_record', $data);
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

    // Método para mostrar el último registro de valorcriterioseguimientosilabo
    public function elultimo() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['valorcriterioseguimientosilabo'] = $this->valorcriterioseguimientosilabo_model->elultimo();
            if (!empty($data)) {
                $data['title'] = "Tipo documento";
                $this->load->view('template/page_header');
                $this->load->view('valorcriterioseguimientosilabo_record', $data);
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

    // Método para mostrar el siguiente registro de valorcriterioseguimientosilabo
    public function siguiente() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['valorcriterioseguimientosilabo'] = $this->valorcriterioseguimientosilabo_model->siguiente($this->uri->segment(3))->row_array();
            $data['title'] = "Tipo documento";
            $this->load->view('template/page_header');
            $this->load->view('valorcriterioseguimientosilabo_record', $data);
            $this->load->view('template/page_footer');
        } else {
            $this->load->view('template/page_header.php');
            $this->load->view('login_form');
            $this->load->view('template/page_footer.php');
        }
    }

    // Método para mostrar el  registro previo del actual en  valorcriterioseguimientosilabo
    public function anterior(){
  	    if(isset($this->session->userdata['logged_in'])){
            $data['valorcriterioseguimientosilabo'] = $this->valorcriterioseguimientosilabo_model->anterior($this->uri->segment(3))->row_array();
            $data['title']="Tipo documento";
            $this->load->view('template/page_header');		
            $this->load->view('valorcriterioseguimientosilabo_record',$data);
            $this->load->view('template/page_footer');
        } else{
	 	    $this->load->view('template/page_header.php');
		    $this->load->view('login_form');
	 	    $this->load->view('template/page_footer.php');
        } 
    }



public function get_valorcriterioseguimientosilabo() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idvalorcriterioseguimientosilabo')) {
        $this->db->select('*');
        $this->db->where(array('idvalorcriterioseguimientosilabo' => $this->input->post('idvalorcriterioseguimientosilabo')));
        $query = $this->db->get('documento');
	$data=$query->result();
	echo json_encode($data);
	}

}









}
