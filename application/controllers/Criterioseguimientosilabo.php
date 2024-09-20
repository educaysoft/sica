<?php

class Criterioseguimientosilabo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('criterioseguimientosilabo_model');
    }

    // Método para mostrar la página principal
    public function index() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['criterioseguimientosilabo'] = $this->criterioseguimientosilabo_model->elultimo();
            $data['title'] = "Criterioseguimientosilabo";
            $this->load->view('template/page_header');
            $this->load->view('criterioseguimientosilabo_record', $data);
            $this->load->view('template/page_footer');
        } else {
            $this->load->view('template/page_header.php');
            $this->load->view('login_form');
            $this->load->view('template/page_footer.php');
        }
    }

    // Método para mostrar el formulario de agregar nuevo criterioseguimientosilabo
    public function add() {
        $data['title'] = "Nuevo criterioseguimientosilabo";
        $this->load->view('template/page_header');
        $this->load->view('criterioseguimientosilabo_form', $data);
        $this->load->view('template/page_footer');
    }

    // Método para guardar un nuevo criterioseguimientosilabo
    public function save() {
        $array_item = array(
            'idcriterioseguimientosilabo' => $this->input->post('idcriterioseguimientosilabo'),
            'nombre' => $this->input->post('nombre'),
        );
        $result=$this->criterioseguimientosilabo_model->save($array_item);

	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('Criterioseguimientosilabo ya existe'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}


    }

    // Método para mostrar el formulario de edición de criterioseguimientosilabo
    public function edit() {
        $data['criterioseguimientosilabo'] = $this->criterioseguimientosilabo_model->criterioseguimientosilabo($this->uri->segment(3))->row_array();
        $data['title'] = "Actualizar criterioseguimientosilabo";
        $this->load->view('template/page_header');
        $this->load->view('criterioseguimientosilabo_edit', $data);
        $this->load->view('template/page_footer');
    }

    // Método para guardar los cambios realizados en la edición de criterioseguimientosilabo
    public function save_edit() {
        $id = $this->input->post('idcriterioseguimientosilabo');
        $array_item = array(
            'idcriterioseguimientosilabo' => $this->input->post('idcriterioseguimientosilabo'),
            'nombre' => $this->input->post('nombre'),
        );
        $this->criterioseguimientosilabo_model->update($id, $array_item);
        redirect('criterioseguimientosilabo');
    }

    // Método para eliminar un criterioseguimientosilabo
    public function delete() {
        $data = $this->criterioseguimientosilabo_model->delete($this->uri->segment(3));
        echo json_encode($data);
        redirect('criterioseguimientosilabo/elprimero');
        // $db['default']['db_debug'] = FALSE;
    }


 	public function quitar()
 	{
 		$result=$this->criterioseguimientosilabo_model->quitar($this->uri->segment(3));
	 	if(!$result)
		{
			echo "<script language='JavaScript'> alert('El criterioseguimientosilabo no pudo eliminarse revise permisos'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 	}






    // Método para listar todos los criterioseguimientosilabos
    public function listar() {
        $data['criterioseguimientosilabo_list'] = $this->criterioseguimientosilabo_model->lista_criterioseguimientosilabosA()->result();
        $data['title'] = "Tipo documento";
        $this->load->view('template/page_header');
        $this->load->view('criterioseguimientosilabo_list', $data);
        $this->load->view('template/page_footer');
    }

    // Método para obtener datos de criterioseguimientosilabo en formato JSON
    public function criterioseguimientosilabo_data() {
        $draw = intval($this->input->get("draw"));
        $draw = intval($this->input->get("start"));
        $draw = intval($this->input->get("length"));

        $data0 = $this->criterioseguimientosilabo_model->lista_criterioseguimientosilabosA();
        $data = array();
        foreach ($data0->result() as $r) {
            $data[] = array($r->idcriterioseguimientosilabo, $r->nombre,
                $r->href = '<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('criterioseguimientosilabo/actual').'"   data-idcriterioseguimientosilabo="' . $r->idcriterioseguimientosilabo . '">Ver</a>');
        }
        $output = array("draw" => $draw,
            "recordsTotal" => $data0->num_rows(),
            "recordsFiltered" => $data0->num_rows(),
            "data" => $data
        );
        echo json_encode($output);
        exit();
    }

    // Método para mostrar el primer registro de criterioseguimientosilabo
    public function elprimero() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['criterioseguimientosilabo'] = $this->criterioseguimientosilabo_model->elprimero();
            if (!empty($data)) {
                $data['title'] = "Tipo documento";
                $this->load->view('template/page_header');
                $this->load->view('criterioseguimientosilabo_record', $data);
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

    // Método para mostrar el último registro de criterioseguimientosilabo
    public function elultimo() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['criterioseguimientosilabo'] = $this->criterioseguimientosilabo_model->elultimo();
            if (!empty($data)) {
                $data['title'] = "Tipo documento";
                $this->load->view('template/page_header');
                $this->load->view('criterioseguimientosilabo_record', $data);
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

    // Método para mostrar el siguiente registro de criterioseguimientosilabo
    public function siguiente() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['criterioseguimientosilabo'] = $this->criterioseguimientosilabo_model->siguiente($this->uri->segment(3))->row_array();
            $data['title'] = "Tipo documento";
            $this->load->view('template/page_header');
            $this->load->view('criterioseguimientosilabo_record', $data);
            $this->load->view('template/page_footer');
        } else {
            $this->load->view('template/page_header.php');
            $this->load->view('login_form');
            $this->load->view('template/page_footer.php');
        }
    }

    // Método para mostrar el  registro previo del actual en  criterioseguimientosilabo
    public function anterior(){
  	    if(isset($this->session->userdata['logged_in'])){
            $data['criterioseguimientosilabo'] = $this->criterioseguimientosilabo_model->anterior($this->uri->segment(3))->row_array();
            $data['title']="Tipo documento";
            $this->load->view('template/page_header');		
            $this->load->view('criterioseguimientosilabo_record',$data);
            $this->load->view('template/page_footer');
        } else{
	 	    $this->load->view('template/page_header.php');
		    $this->load->view('login_form');
	 	    $this->load->view('template/page_footer.php');
        } 
    }



public function get_criterioseguimientosilabo() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idcriterioseguimientosilabo')) {
        $this->db->select('*');
        $this->db->where(array('idcriterioseguimientosilabo' => $this->input->post('idcriterioseguimientosilabo')));
        $query = $this->db->get('documento');
	$data=$query->result();
	echo json_encode($data);
	}

}









}
