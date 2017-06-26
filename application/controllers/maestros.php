<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Maestros extends CI_Controller
{
    private $parameters = array();

    public function __construct()
    {
        parent::__construct();

        session_start();

        if (!$this->Seguridad_modelo->validar_sesion()) {
            redirect(site_url(), "refresh");
        }

        $this->load->model('maestros_modelo', '', TRUE);
    }

    public function index()
    {
        $where = 'and nivel = 1';
        $data['pagina'] = 'maestros_gestor';
        $result = $this->maestros_modelo->buscar($where);
        $data['result'] = $result;

        $this->load->view('_template', $data);
    }

    public function getAll()
    {
        if (!$result = $this->maestros_modelo->getAll()) {
            echo json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
            return;
        }
        foreach ($result as $key => $value) {
            $sello = $this->Seguridad_modelo->generar_sello($value['id_maestro']);
            $result[$key]['sello'] = $sello;
        }
        echo json_encode($this->UTF8Converter($result));
    }

    public function agregar()
    {
        $this->Seguridad_modelo->generar_token();

        $data['pagina'] = 'maestros_agregar';

        $this->load->view('_template', $data);
    }

    public function agregar_datos()
    {
        if (!$this->_setParameters()) {
            echo json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
            return;
        }

        $this->parameters['fecha_alta'] = date('Y-m-d');
        $this->parameters['fecha_modifica'] = date('Y-m-d');
        $this->parameters['status'] = 1;
        $this->parameters['nivel'] = 1;

        $token = $this->parameters['token'];

        if (!$this->Seguridad_modelo->verificar_token($token)) {
            echo json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, "No puedes agregar el maestro"));
            return;
        } else {

            unset($this->parameters['token']);

            $this->maestros_modelo->agregar($this->parameters);

            $id = $this->db->insert_id();

            $info2['no_control'] = "M-" . date("Y") . "-" . $id;

            $this->maestros_modelo->editar($id, $info2);

            echo json_encode($this->getResponse(STATUS_SUCCESS, "El maestro " . utf8_encode($this->parameters['nombre']) . " " . utf8_encode($this->parameters['apellido_paterno']) . " " . utf8_encode($this->parameters['apellido_materno']) . " ha sido registrado"));
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

        $data['resultado'] = $this->maestros_modelo->leer_registro($id);
        $data['pagina'] = 'maestros_editar';

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
            echo json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, "No puedes editar el maestro"));
            return;
        } else {
            $this->Seguridad_modelo->generar_token();
            $password = $this->parameters['password_oculto'];

            if ($password != $this->parameters['password']) {
                $this->parameters['password'] = md5($this->parameters['password']);
            }

            $id = $this->parameters['id_oculto'];

            unset($this->parameters['token']);
            unset($this->parameters['password_oculto']);
            unset($this->parameters['id_oculto']);

            $this->parameters['fecha_modifica'] = date('Y-m-d');
            $this->parameters['status'] = 1;
            $this->parameters['nivel'] = 1;

            $this->maestros_modelo->editar($id, $this->parameters);

            echo json_encode($this->getResponse(STATUS_SUCCESS, "El maestro " . utf8_encode($this->parameters['nombre']) . " " . utf8_encode($this->parameters['apellido_paterno']) . " " . utf8_encode($this->parameters['apellido_materno']) . " ha sido editado"));
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

        $this->maestros_modelo->eliminar($id, $info);

        header("Location: " . site_url() . "?c=maestros");
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