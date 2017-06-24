<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
	<title>Editar Curso</title>
    <link media="screen" href="<?php echo base_url()."assets/css/estilos_fancy.css"; ?>" rel="stylesheet"/>
	<link media="screen" href="<?php echo base_url()."assets/js/jqueryui/jquery-ui-1.8.16.custom.css"; ?>" rel="stylesheet"/>
	<script type="text/javascript" src="<?php echo base_url()."assets/js/jquery/jquery-1.7.1.min.js"; ?>"></script>
	<script type="text/javascript" src="<?php echo base_url()."assets/js/jqueryui/jquery-ui-1.8.16.custom.min.js"; ?>"></script>
	<script type="text/javascript" src="<?php echo base_url()."assets/js/jquery/utils.js"; ?>"></script>
          
       
</head>


<script  charset="utf-8"  type="text/javascript">
    $(document).ready(function(){
		
		$('#formulario').submit(function()
		{
			var id = $('#id_tipo').val();
			
			formulario_respuesta(id);
			return false;
		});
	});
	
	function formulario_respuesta(id)
	{		
		parent.recarga(id);
	}
	
	

</script>
<body>
<center>
<br />
<div class="titulo_contenido" style="margin-left:25px;">
	<h1>Generar Gr&aacute;fica</h1>
</div>

<form id="formulario">
<table width="200px" border="0">
  
 
  
  
  <tr>
    <td align="right" valign="top">Curso*</td>
    <td>
    <div class="alta_campo">
    
    <select id="id_tipo" name="tipo">
    <?php
	foreach($result as $resultado)
	{
	?>
    <option value="<?php echo $resultado->id_curso; ?>">
    <?php
	echo utf8_encode($resultado->nombre);
	?>
    </option>
    <?php
	}
	?>
    </select>
    <div class="cb"></div>
     <div id="nombre_mensaje" class="campo_requerido" style="display:none"></div>
    </div>
    </td>
  </tr>
  
  
  
  <tr>
    <td>&nbsp;</td>
    <td align="center">
    <input type="hidden" name="token" value="<?php echo $_SESSION["token"] ?>" />
   	
    <input type="submit" value="Aceptar" >
  
    </td>
  </tr>
  
</table>
</form>

 <div id="mensaje_servidor" style="display:none;"></div>
  </center>

  </body>
  </html>