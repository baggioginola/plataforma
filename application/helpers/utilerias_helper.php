<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	function fecha_formato($fecha, $opcion = 0, $separador = ".")
	{
		if ($opcion == 0) { return fecha_organizada_mes_completo($fecha, $separador);}
		
		if ($opcion == 1) { return fecha_organizada_mes_truncado($fecha, $separador);}
		
		if ($opcion == 3) { return fecha_organizada_mes_completo_hora($fecha, $separador);}
		
		if ($opcion == 4) { return fecha_organizada_mes_truncado_hora($fecha, $separador);}
		
		if ($opcion == 5) { return fecha_organizada_mes_numerico($fecha, $separador);}
		
		if ($opcion == 6) { return fecha_organizada_mes_numerico($fecha, $separador);}
		
		if ($opcion == 7) { return fecha_organizada_mes_completo_sin_dia($fecha, $separador);}
		
		if ($opcion == 8)
		{
			return fecha_organizada_dia($fecha,$separador);
		} 
	}
	
	function fecha_organizada_mes_completo($fecha, $separador)
	{
		$arreglo_fecha = explode(" ", $fecha);
		$arreglo_fecha = explode("-", $arreglo_fecha[0]);
		
		$mes  = "";
		$dia  = $arreglo_fecha[2];
		$anio = $arreglo_fecha[0];
		
		if ($arreglo_fecha[1] == "01") $mes = "Enero";
		if ($arreglo_fecha[1] == "02") $mes = "Febrero";
		if ($arreglo_fecha[1] == "03") $mes = "Marzo";
		if ($arreglo_fecha[1] == "04") $mes = "Abril";
		if ($arreglo_fecha[1] == "05") $mes = "Mayo";
		if ($arreglo_fecha[1] == "06") $mes = "Junio";
		if ($arreglo_fecha[1] == "07") $mes = "Julio";
		if ($arreglo_fecha[1] == "08") $mes = "Agosto";
		if ($arreglo_fecha[1] == "09") $mes = "Septiembre";
		if ($arreglo_fecha[1] == "10") $mes = "Octubre";
		if ($arreglo_fecha[1] == "11") $mes = "Noviembre";
		if ($arreglo_fecha[1] == "12") $mes = "Diciembre";
		
		return $dia.$separador.$mes.$separador.$anio;
	}
	
	function fecha_organizada_mes_truncado($fecha, $separador)
	{
		$arreglo_fecha = explode(" ", $fecha);
		$arreglo_fecha = explode("-", $arreglo_fecha[0]);
		
		$mes  = "";
		$dia  = $arreglo_fecha[2];
		$anio = $arreglo_fecha[0];
		
		if ($arreglo_fecha[1] == "01") $mes = "Ene";
		if ($arreglo_fecha[1] == "02") $mes = "Feb";
		if ($arreglo_fecha[1] == "03") $mes = "Mar";
		if ($arreglo_fecha[1] == "04") $mes = "Abr";
		if ($arreglo_fecha[1] == "05") $mes = "May";
		if ($arreglo_fecha[1] == "06") $mes = "Jun";
		if ($arreglo_fecha[1] == "07") $mes = "Jul";
		if ($arreglo_fecha[1] == "08") $mes = "Ago";
		if ($arreglo_fecha[1] == "09") $mes = "Sep";
		if ($arreglo_fecha[1] == "10") $mes = "Oct";
		if ($arreglo_fecha[1] == "11") $mes = "Nov";
		if ($arreglo_fecha[1] == "12") $mes = "Dic";
		
		return $dia.$separador.$mes.$separador.$anio;
	}
	
	function fecha_organizada_mes_completo_hora($fecha, $separador)
	{
		$arreglo_temp  = explode(" ", $fecha);		
		
		$fecha = fecha_organizada_mes_completo($fecha, $separador);
		
		return $fecha." ".$arreglo_temp[1]." hrs";
	}
	
	function fecha_organizada_mes_truncado_hora($fecha, $separador)
	{
		$arreglo_temp  = explode(" ", $fecha);		
		
		$fecha = fecha_organizada_mes_truncado($fecha, $separador);
		
		return $fecha." ".$arreglo_temp[1]." hrs";
	}
	
	function fecha_organizada_mes_numerico($fecha, $separador)
	{
		$arreglo_temp  = explode("-", $fecha);		
		
		return $arreglo_temp[2].$separador.$arreglo_temp[1].$separador.$arreglo_temp[0];
	}
	
	function fecha_organizada_mes_numerico_original($fecha, $separador)
	{
		$arreglo_temp  = explode("-", $fecha);		
		
		return $arreglo_temp[2].$separador.$arreglo_temp[1].$separador.$arreglo_temp[0];
	}
	
	function truncar ($str, $length=10, $trailing='...') 
	{	
		// take off chars for the trailing
		$length -= strlen($trailing);
		
		if (strlen($str)> $length) 
		{
			return substr($str,0,$length).$trailing;
		} 
		else 
		{ 
			// string was already short enough, return the string
			$res = $str; 
		}
	  
		return $res;
	}
	
	function nulabilidad( $dato ) 
	{
		if ( empty( $dato ) ) $datoFinal='0';	
		else $datoFinal=$dato;
		
		return $datoFinal;
	}
	
	function fecha_organizada_mes_completo_sin_dia($fecha, $separador)
	{
		$arreglo_fecha = explode(" ", $fecha);
		$arreglo_fecha = explode("-", $arreglo_fecha[0]);
		
		$mes  = "";
		$dia  = $arreglo_fecha[2];
		$anio = $arreglo_fecha[0];
		
		if ($arreglo_fecha[1] == "01") $mes = "Enero";
		if ($arreglo_fecha[1] == "02") $mes = "Febrero";
		if ($arreglo_fecha[1] == "03") $mes = "Marzo";
		if ($arreglo_fecha[1] == "04") $mes = "Abril";
		if ($arreglo_fecha[1] == "05") $mes = "Mayo";
		if ($arreglo_fecha[1] == "06") $mes = "Junio";
		if ($arreglo_fecha[1] == "07") $mes = "Julio";
		if ($arreglo_fecha[1] == "08") $mes = "Agosto";
		if ($arreglo_fecha[1] == "09") $mes = "Septiembre";
		if ($arreglo_fecha[1] == "10") $mes = "Octubre";
		if ($arreglo_fecha[1] == "11") $mes = "Noviembre";
		if ($arreglo_fecha[1] == "12") $mes = "Diciembre";
		
		return $mes.$separador.$anio;
	}
	
	
	function fecha_organizada_dia($fecha, $separador)
	{
		$arreglo_fecha = explode(" ", $fecha);
		$arreglo_fecha = explode("-", $arreglo_fecha[0]);
		
		$mes  = "";
		$dia  = $arreglo_fecha[2];
		$anio = $arreglo_fecha[0];
		
		if ($arreglo_fecha[1] == "01") $mes = "Ene";
		if ($arreglo_fecha[1] == "02") $mes = "Feb";
		if ($arreglo_fecha[1] == "03") $mes = "Mar";
		if ($arreglo_fecha[1] == "04") $mes = "Abr";
		if ($arreglo_fecha[1] == "05") $mes = "May";
		if ($arreglo_fecha[1] == "06") $mes = "Jun";
		if ($arreglo_fecha[1] == "07") $mes = "Jul";
		if ($arreglo_fecha[1] == "08") $mes = "Ago";
		if ($arreglo_fecha[1] == "09") $mes = "Sep";
		if ($arreglo_fecha[1] == "10") $mes = "Oct";
		if ($arreglo_fecha[1] == "11") $mes = "Nov";
		if ($arreglo_fecha[1] == "12") $mes = "Dic";
		
		//return $dia.$separador.$mes.$separador.$anio;
		
		$i = strtotime($fecha); 
		$semana_dia = jddayofweek(cal_to_jd(CAL_GREGORIAN, date("m",$i),date("d",$i), date("Y",$i)) , 0 );
		
		if($semana_dia == 0)
		{
			return "Domingo ".$dia.$separador.$mes.$separador.$anio;
		}
		else if($semana_dia == 1)
		{
			return "Lunes ".$dia.$separador.$mes.$separador.$anio;
		}
		else if($semana_dia == 2)
		{
			return "Martes ".$dia.$separador.$mes.$separador.$anio;
		}
		else if($semana_dia == 3)
		{
			return "Miércoles ".$dia.$separador.$mes.$separador.$anio;
		}
		else if($semana_dia == 4)
		{
			return "Jueves ".$dia.$separador.$mes.$separador.$anio;
		}
		else if($semana_dia == 5)
		{
			return "Viernes ".$dia.$separador.$mes.$separador.$anio;
		}
		else if($semana_dia == 6)
		{
			return "Sábado ".$dia.$separador.$mes.$separador.$anio;
		}
	}
	
	function hora($dato)
	{
		$arreglo = explode(":",$dato);
		
		return $arreglo[0].":".$arreglo[1];
	}
	
	
?>