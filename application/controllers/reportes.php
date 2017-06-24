<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reportes extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		
		session_start();
		
		if(!$this->Seguridad_modelo->validar_sesion())
		{
			redirect(site_url(), "refresh");
		}
		
		$this->load->model('cursos_modelo', '', TRUE);
		
		$this->load->model('reportes_modelo');
	}
        
	
	public function index()
	{	
		/*
		$where 			= 'and curso.status = 1 and maestro.id_maestro = "'.$_SESSION['id'].'"';
		$data['pagina'] = 'cursos_gestor';
		$result 		= $this->cursos_modelo->buscar($where);
		$data['result'] = $result;
          */
		  
		
		
		$data['pagina'] = 'reportes_gestor';
	    $this->load->view('_template',$data);
    }
            
	public function cursos()
	{	
		$where = 'and curso.status = 1 and maestro.status = 1';
		
		$result = $this->reportes_modelo->buscar_cursos($where);
		
		
		$this->load->library('pdf');
		
		$this->pdf = new Pdf();
        // Agregamos una página
        $this->pdf->AddPage();
        // Define el alias para el número de página que se imprimirá en el pie
        $this->pdf->AliasNbPages();
		
		$this->pdf->SetTitle("Reporte");
        $this->pdf->SetLeftMargin(15);
        $this->pdf->SetRightMargin(15);
        $this->pdf->SetFillColor(200,200,200);
		
		
		$this->pdf->SetFont('Arial', 'B', 11);
        
		$this->pdf->SetXY(10,50);
		
		$simbolos 			= array('&nbsp;','&Aacute;','&aacute;','&Eacute;','&eacute;','&Iacute;','&iacute;','&Oacute;','&oacute;','&Uacute;','&uacute;','&Ntilde;','&ntilde;');
		$simbolos_replace 	= array('','Á','á','É','é','Í','í','Ó','ó','Ú','ú','Ñ','ñ');
		
		
		
		
		$renglon = 0;
		$tipo_anterior = '';
		
		for($z= 0; $z<count($result);$z++)
		{
		
			$tipo = utf8_encode($result[$z]->tipo);
				
			if($tipo != $tipo_anterior)
			{
				$this->pdf->SetXY(10,50 + $renglon);
				
				$this->pdf->Cell(50,5,($result[$z]->tipo),0,0,'L',false);
			
				$tipo_anterior = $tipo;	
				
				$this->pdf->Ln();
				
				$renglon = $renglon + 10;		
			}
			
			/*
			$this->pdf->MultiCell(0,7,strip_tags((str_replace($simbolos, $simbolos_replace, html_entity_decode($resultado->tipo)))),0,'L',false);
		
			$this->pdf->MultiCell(0,7,strip_tags((str_replace($simbolos, $simbolos_replace, html_entity_decode($resultado->curso)))),0,'L',false);
		*/
			$this->pdf->SetXY(20,50 + $renglon);
		
			
			//$this->pdf->SetXY(20,50);
			
			$this->pdf->Cell(50,5,($result[$z]->curso),0,0,'L',false);
			
			$this->pdf->Ln();
		
			$renglon = $renglon + 10;
		
		}
		
		
		$this->pdf->Output("Reporte.pdf", 'I');
	}
	
	/*
	
	public function imprimir()
	{
		$id = $this->input->get('id');
		
		$result					 	= $this->casas_modelo->leer_registro($id);
		$data['result_ciudades'] 	= $this->casas_modelo->ciudades('');
		$latitud 					= $result->latitud;
		$longitud 					= $result->longitud;
		$ubicacion 					= trim(utf8_encode($result->ubicacion));
		
		$gmap = new SplFileObject("adm/assets/mapas/google_map.png",'w');
		
		
	  	$image = file_get_contents("http://maps.googleapis.com/maps/api/staticmap?center=".$result->latitud.",".$result->longitud."&zoom=12&size=400x400&markers=color:red%7Clabel:A%7C11211%7C11206%7C11222|".$result->latitud.",".$result->longitud."&sensor=false");
		
		$gmap->fwrite($image);

		$this->load->library('pdf');
		
		$this->pdf = new Pdf();
        // Agregamos una página
        $this->pdf->AddPage();
        // Define el alias para el número de página que se imprimirá en el pie
        $this->pdf->AliasNbPages();
		
		$this->pdf->SetTitle("Detalle Propiedad");
        $this->pdf->SetLeftMargin(15);
        $this->pdf->SetRightMargin(15);
        $this->pdf->SetFillColor(200,200,200);
		
		
		$this->pdf->SetFont('Arial', 'B', 11);
        
        $this->pdf->Cell(170,5,strtoupper($result->titulo),0,0,'C',false);
		
		$this->pdf->Ln();
		
		$this->pdf->Cell(170,10,"Ubicación: ".($result->ubicacion),0,0,'C',false);
		
		$this->pdf->Ln();
		
		$this->pdf->Cell(170,10,"$ ".number_format($result->precio,2)." M.N.",0,0,'C',false);
        
		
		$this->pdf->Cell(50,10,$this->pdf->Image(base_url()."adm/assets/imagenes_casas/".$result->id_casa.".jpg",10,60,95),0,0,'C');
		
		$this->pdf->Cell(50,10,$this->pdf->Image("adm/assets/mapas/google_map.png",120,60,75),0,0,'C');
		
		
		$this->pdf->SetFont('Arial','IB',10);
		
		
		$this->pdf->SetFont('Arial','',10);
		
		
		$this->pdf->Ln(7);
		
		$this->pdf->SetXY(10,145);
		
		$simbolos 			= array('&nbsp;','&Aacute;','&aacute;','&Eacute;','&eacute;','&Iacute;','&iacute;','&Oacute;','&oacute;','&Uacute;','&uacute;','&Ntilde;','&ntilde;');
		$simbolos_replace 	= array('','Á','á','É','é','Í','í','Ó','ó','Ú','ú','Ñ','ñ');
		
		$this->pdf->MultiCell(0,7,strip_tags((str_replace($simbolos, $simbolos_replace, html_entity_decode($result->descripcion)))),0,'L',false);
		
        /*
         * Se manda el pdf al navegador
         *
         * $this->pdf->Output(nombredelarchivo, destino);
         *
         * I = Muestra el pdf en el navegador
         * D = Envia el pdf para descarga
         *
         
		 
		$this->pdf->Output("Propiedad.pdf", 'I');
	}	
	
	*/
	
}

?>