<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Administracion extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        session_start();

        if (!$this->Seguridad_modelo->validar_sesion()) {
            redirect(site_url(), "refresh");
        }
    }

    public function index()
    {
        if ($_SESSION['tipo'] == 'maestro' && $_SESSION['nivel'] == 1) {
            $data['menu'] = 'menu';
        } else if ($_SESSION['tipo'] == 'alumno') {
            $data['menu'] = 'menu_alumno';
        }
        else{
            $data['menu'] = 'menu_administracion';
        }

        $data['pagina'] = 'administracion';

        $this->load->view('_template', $data);
    }


}

?>