<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grafica extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		
		session_start();
		
		if(!$this->Seguridad_modelo->validar_sesion())
		{
			redirect(site_url(), "refresh");
		}
		
		$this->load->model('cursos_modelo');
		$this->load->model('grafica_modelo');
	}
	
	
	
	public function index()
	{
		$this->Seguridad_modelo->generar_token();
	
		$where 			= 'and curso.status = 1 and maestro.id_maestro = "'.$_SESSION['id'].'"';
		
		$result 		= $this->cursos_modelo->buscar($where);
		
		$data['result'] = $result;
		$data['pagina'] = 'grafica_gestor';
	
		$this->load->view('grafica_gestor',$data);
	}
	
	public function genera_grafica()
	{	
	
		$id = $this->input->get('id');
	
		$where = 'and objeto_aprendizaje.id_curso = "'.$id.'"  and objeto_aprendizaje.id_maestro = "'.$_SESSION['id'].'"';
		
		$result = $this->grafica_modelo->buscar($where);
		
		
		foreach($result as $resultado)
		{
			$valores[] = intval($resultado->descargas);
			$nombre[] = utf8_decode($resultado->nombre);
		}
		
		$this->load->library('highcharts');
		
		$this->highcharts->initialize('template'); // load template	
		
		$this->highcharts->set_title(utf8_decode('Numero de Descargas'), utf8_decode($result[0]->curso)); // set chart title: title, subtitle(optional)
		
		/*
		$data['users']['data'] = array(536564837, 444948013, 153309074, 99143700, 82548200);
		$data['users']['name'] = 'Users by Language';
		$data['popul']['data'] = array(1277528133, 1365524982, 420469703, 126804433, 250372925);
		$data['popul']['name'] = 'World Population';
		$data['axis']['categories'] = array('English', 'Chinese', 'Spanish', 'Japanese', 'Portuguese');
		
		
		//$this->highcharts->set_xAxis(array('English', 'Chinese', 'Spanish', 'Japanese', 'Portuguese')); // pushing categories for x axis labels
		//$this->highcharts->set_serie(array(536564837, 444948013, 153309074, 99143700, 82548200)); // the first serie
		
		//$this->highcharts->set_serie($graph_data['popul']); // second serie
		
		// some data series
		*/
		
		$serie['data'] = $valores;
		//$serie['data'] = array(20, 45, 60, 22, 6, 36);
		
		//$serie['categories'] = array('English', 'Chinese', 'Spanish', 'Japanese', 'Portuguese', 'Prueba');
		
		$serie['categories'] = $nombre;
		
		$this->highcharts->set_serie($serie,"Descargas"); // second serie
		
		$this->highcharts->set_xAxis($serie); // pushing categories for x axis labels
		
		$data['charts'] = $this->highcharts->render();
		$data['pagina']	= 'grafica';
		
	    $this->load->view('grafica',$data);
    }
    
	
	
	
	/*        
	public function agregar()
	{	
		$this->Seguridad_modelo->generar_token();
	
		$data['pagina'] = 'cursos_agregar';
	
		$this->load->view('cursos_agregar',$data);
	}
	
	public function agregar_datos()
	{
		$token = $this->input->post('token');
		
		if(!$this->Seguridad_modelo->verificar_token($token))
		{
			$datos['tipo_mensaje'] = "error";
			$datos['mensaje']      = "No puedes agregar el curso";
			
			echo json_encode($datos);
		}
		else
		{	
			$info['nombre']     	= utf8_decode($this->input->post('nombre'));
			$info['tipo']			= utf8_decode($this->input->post('tipo'));
			$info['status']			= 1;
			$info['fecha_alta'] 	= date('Y-m-d');
			$info['fecha_modifica']	= date('Y-m-d');
			$info['id_maestro']	= $_SESSION['id'];
			
			$this->cursos_modelo->agregar($info);
			
			
			$datos['tipo_mensaje'] = "exito";
			$datos['mensaje']      = "Ha sido registrado el curso";
			
			echo json_encode($datos);	
		}
	}
	
	public function editar()
	{	
		$this->Seguridad_modelo->generar_token();
		
		$id 	= $this->input->get('id');
		$sello 	= $this->input->get('sello');
		
		if(!$this->Seguridad_modelo->verificar_sello($id,$sello))
		{
			redirect(site_url()."?c=administracion", "refresh");
			return;
		}
		
		$data['resultado'] 	= $this->cursos_modelo->leer_registro($id);
		$data['pagina'] 	= 'cursos_editar';
		
		$this->load->view('_template',$data);
	}
	
	public function editar_datos()
	{	
		$token = $this->input->post('token');
		
		if(!$this->Seguridad_modelo->verificar_token($token))
		{
			$datos['tipo_mensaje'] = "error";
			$datos['mensaje'] 	   = "No puedes editar el maestro";
			
			echo json_encode($datos);
		}
		
		else
		{
			$this->Seguridad_modelo->generar_token();
			
			$info['nombre']     	= utf8_decode($this->input->post('nombre'));
			$info['tipo']			= utf8_decode($this->input->post('tipo'));
			$info['fecha_modifica']		= date('Y-m-d');
			
			$id = $this->input->post('id_oculto');
			
			$this->cursos_modelo->editar($id,$info);
			
			$datos['tipo_mensaje'] = "exito";
			$datos['mensaje']      = "El curso ha sido editado";
			
			echo json_encode($datos);	
		}
	}
	
	public function eliminar()
	{	
		$id 	= $this->input->get('id');
		$sello 	= $this->input->get('sello');
		
		if(!$this->Seguridad_modelo->verificar_sello($id,$sello))
		{
			redirect(site_url()."?c=administracion", "refresh");
			return;
		}
		
		$id 			= $this->input->get('id');
		$info['status'] = 0; 
		
		$this->cursos_modelo->eliminar($id,$info);
		
		header("Location: ".site_url()."?c=cursos");
	}
	
	public function buscar()
	{
		$where  = 'and curso.status = 1 and maestro.id_maestro = "'.$_SESSION['id'].'"';	
		$buscar = utf8_decode($this->input->post('txt_buscar'));
		
		if(!($buscar == '///c1@v3_v@c1@///'))
		{
			$where .= " AND  (curso.nombre LIKE  '%".$buscar."%' or tipo LIKE '%".$buscar."%') ";
		}
		
		$result = $this->cursos_modelo->buscar($where);
		
		if(empty($result))
		{
			$result['mensaje'] = "vacio";
			echo json_encode($result);
		}
		else
		{
			$i = 0;	 
			foreach($result as $resultado)
			{
				$id_curso[$i]['id_curso'] 	= $resultado->id_curso;

				$nombre[$i]['nombre']			= utf8_encode($resultado->nombre);
				
				$tipo[$i]['tipo'] = utf8_encode($resultado->tipo);
				
				
							
				$data['id_curso'] 			= $id_curso;		  
				 
				$data['nombre']					= $nombre;
				
				$data['tipo']		= $tipo;
				
				
				$i++;
			}
			
			echo json_encode($data);
		}					
	}
	
	*/	
}

?>