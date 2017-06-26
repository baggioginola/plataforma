<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cursos_alumno extends CI_Controller
{

    private $parameters = array();

    public function __construct()
    {
        parent::__construct();

        session_start();

        if (!$this->Seguridad_modelo->validar_sesion()) {
            redirect(site_url(), "refresh");
        }

        $this->load->model('cursos_modelo');

        $this->load->model('cursos_alumno_modelo');
        $this->load->model('maestros_modelo');
    }


    public function index()
    {
        $where = 'and alumno.id_alumno = "' . $_SESSION['id'] . '" ';
        $data['pagina'] = 'cursos_alumno_gestor';
        $result = $this->cursos_alumno_modelo->buscar($where);
        $data['result'] = $result;

        $this->load->view('_template', $data);
    }

    public function getAll()
    {
        if (!$result = $this->cursos_alumno_modelo->getAll()) {
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

        $result_maestros = $this->maestros_modelo->buscar_activos('and maestro.status = 1 and maestro.nivel = 1');

        $where = 'and curso.id_maestro = "' . $result_maestros[0]->id_maestro . '" and maestro.status = 1 ';

        $result_cursos = $this->cursos_modelo->buscar($where);

        $data['result_maestros'] = $result_maestros;
        $data['result_cursos'] = $result_cursos;

        $data['pagina'] = 'cursos_alumno_agregar';

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
        }else{
            unset($this->parameters['token']);
            unset($this->parameters['id_maestro']);
            $this->parameters['fecha_registro'] = date('Y-m-d H:i:s');
            $this->parameters['id_alumno'] = $_SESSION['id'];

            $this->cursos_alumno_modelo->agregar($this->parameters);
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
        $token = $this->input->post('token');

        if (!$this->Seguridad_modelo->verificar_token($token)) {
            $datos['tipo_mensaje'] = "error";
            $datos['mensaje'] = "No puedes editar el maestro";

            echo json_encode($datos);
            return;
        } else {
            $this->Seguridad_modelo->generar_token();

            $info['nombre'] = utf8_decode($this->input->post('nombre'));
            $info['tipo'] = utf8_decode($this->input->post('tipo'));
            $info['fecha_modifica'] = date('Y-m-d');

            $id = $this->input->post('id_oculto');

            $this->cursos_modelo->editar($id, $info);

            $datos['tipo_mensaje'] = "exito";
            $datos['mensaje'] = "El curso ha sido editado";

            echo json_encode($datos);
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

    public function buscar_cursos()
    {
        $id_maestro_aux = $this->input->post('id_maestro');

        $where = "and curso.id_maestro = '" . $id_maestro_aux . "' ";

        $result = $this->cursos_modelo->buscar($where);


        if (empty($result)) {
            $result['mensaje'] = "vacio";

            echo json_encode($result);
        } else {
            $i = 0;

            foreach ($result as $resultado) {
                $id_curso[$i]['id_curso'] = $resultado->id_curso;

                $nombre[$i]['nombre'] = utf8_encode($resultado->nombre);


                $data['id_curso'] = $id_curso;

                $data['nombre'] = $nombre;

                $i++;
            }

            echo json_encode($data);
        }
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

?>