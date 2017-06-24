<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

#Response codes
define('STATUS_SUCCESS', 200);
define('STATUS_FAILURE_CLIENT', 404);
define('STATUS_FAILURE_INTERNAL', 500);

define('MESSAGE_SUCCESS', 'La transaccion fue exitosa');
define('MESSAGE_ERROR', 'La transaccion fue fallida, intente mas tarde');

class Cursos extends CI_Controller
{
    private $parameters = array();

    public function __construct()
    {
        parent::__construct();

        session_start();

        if (!$this->Seguridad_modelo->validar_sesion()) {
            redirect(site_url(), "refresh");
        }

        $this->load->model('cursos_modelo', '', TRUE);
    }


    public function index()
    {
        if ($_SESSION['tipo'] == 'maestro') {
            $data['menu'] = 'menu';
        } else if ($_SESSION['tipo'] == 'alumno') {
            $data['menu'] = 'menu_alumno';
        }

        $data['pagina'] = 'cursos_gestor';

        $this->load->view('_template', $data);
    }

    public function getAll()
    {
        if (!$result = $this->cursos_modelo->getAll()) {
            echo json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
            return;
        }
        foreach ($result as $key => $value) {
            $sello = $this->Seguridad_modelo->generar_sello($value['id_curso']);
            $result[$key]['sello'] = $sello;
        }
        echo json_encode($this->UTF8Converter($result));
    }

    public function agregar()
    {
        $this->Seguridad_modelo->generar_token();

        if ($_SESSION['tipo'] == 'maestro') {
            $data['menu'] = 'menu';
        } else if ($_SESSION['tipo'] == 'alumno') {
            $data['menu'] = 'menu_alumno';
        }

        $data['pagina'] = 'cursos_agregar';

        $this->load->view('_template', $data);
    }

    public function agregar_datos()
    {
        if (!$this->_setParameters()) {
            echo json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
            return;
        }

        $token = $this->parameters['token'];

        if (!$this->Seguridad_modelo->verificar_token($token)) {
            echo json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, "No puedes agregar el curso"));
            return;
        } else {
            unset($this->parameters['token']);
            $this->parameters['status'] = 1;
            $this->parameters['fecha_alta'] = date('Y-m-d');
            $this->parameters['fecha_modifica'] = date('Y-m-d');
            $this->parameters['id_maestro'] = $_SESSION['id'];

            $this->cursos_modelo->agregar($this->parameters);

            echo json_encode($this->getResponse(STATUS_SUCCESS, MESSAGE_SUCCESS));
        }
    }

    public function editar()
    {
        $this->Seguridad_modelo->generar_token();

        $id = $this->input->get('id');
        $sello = $this->input->get('sello');

        if (!$this->Seguridad_modelo->verificar_sello($id, $sello)) {
            redirect(site_url() . "?c=administracion", "refresh");
            return;
        }

        $data['resultado'] = $this->cursos_modelo->leer_registro($id);
        $data['pagina'] = 'cursos_editar';

        $this->load->view('_template', $data);
    }

    public function editar_datos()
    {
        if (!$this->_setParameters()) {
            echo json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
            return;
        }

        $token = $this->parameters['token'];

        if (!$this->Seguridad_modelo->verificar_token($token)) {
            echo json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, "No puedes editar el curso"));
            return;
        } else {
            $this->parameters['fecha_modifica'] = date('Y-m-d');

            $id = $this->parameters['id_oculto'];

            unset($this->parameters['id_oculto']);
            unset($this->parameters['token']);

            $this->cursos_modelo->editar($id, $this->parameters);

            echo json_encode($this->getResponse(STATUS_SUCCESS, MESSAGE_SUCCESS));
        }
    }

    public function eliminar()
    {
        $id = $this->input->get('id');
        $sello = $this->input->get('sello');

        if (!$this->Seguridad_modelo->verificar_sello($id, $sello)) {
            redirect(site_url() . "?c=administracion", "refresh");
            return;
        }

        $id = $this->input->get('id');
        $info['status'] = 0;

        $this->cursos_modelo->eliminar($id, $info);

        header("Location: " . site_url() . "?c=cursos");
    }

    /**
     * @return bool
     */
    private function _setParameters()
    {
        if (!isset($_POST) || empty($_POST)) {
            return false;
        }

        foreach ($_POST as $key => $value) {
            $this->parameters[$key] = utf8_decode($value);
        }

        return true;
    }

    public function UTF8Converter($array)
    {
        array_walk_recursive($array, function (&$item, $key) {
            if (!mb_detect_encoding($item, 'utf-8', true)) {
                $item = utf8_encode($item);
            }
        });

        return $array;
    }

    protected function getResponse($status = STATUS_SUCCESS, $message = MESSAGE_SUCCESS, $data = array())
    {
        return array('status' => $status, 'message' => $message, 'data' => $data);
    }
}