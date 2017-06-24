<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	
    <title>Plataforma</title>

    
    <link media="screen" href="<?php echo base_url()."assets/js/fancybox/jquery.fancybox-1.3.4.css"; ?>" rel="stylesheet"/>
	
    <link media="screen" href="<?php echo base_url()."assets/js/jqueryui/jquery-ui-1.8.16.custom.css"; ?>" rel="stylesheet"/>
	
    <link media="screen" href="<?php echo base_url()."assets/js/validation/validationEngine.jquery.css"; ?>" rel="stylesheet"/>
	
	<script type="text/javascript" src="<?php echo base_url()."assets/js/jquery/jquery-1.7.1.min.js"; ?>"></script>

    <script type="text/javascript" src="<?php echo base_url()."assets/js/jqueryui/jquery-ui-1.8.16.custom.min.js"; ?>"></script>


	<script type="text/javascript" src="<?php echo base_url()."assets/js/jquery.tools.min.js"; ?>"></script>
    
    <script type="text/javascript" src="<?php echo base_url()."assets/js/fancybox/jquery.fancybox-1.3.4.pack.js"; ?>"></script>
    
    
	
    
    
	<script type="text/javascript" src="<?php echo base_url()."assets/js/validation/jquery.validationEngine.js"; ?>"></script>
	<script type="text/javascript" src="<?php echo base_url()."assets/js/validation/jquery.validationEngine-es.js"; ?>"></script>
    
    <link rel="stylesheet" href="<?php echo base_url()."assets/css/reset.css" ?>" type="text/css" media="screen">
	<link rel="stylesheet" href="<?php echo base_url()."assets/css/skeleton.css" ?>" type="text/css" media="screen">
	<link rel="stylesheet" href="<?php echo base_url()."assets/css/superfish.css" ?>" type="text/css" media="screen">
	<link rel="stylesheet" href="<?php echo base_url()."assets/css/estilos.css" ?>" type="text/css" media="screen">
	<link rel="stylesheet" href="<?php echo base_url()."assets/css/forms.css" ?>" type="text/css" media="screen">
	<link rel="stylesheet" href="<?php echo base_url()."assets/css/slider.css" ?>" type="text/css" media="screen">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
	<script src="<?php echo base_url()."assets/js/superfish.js" ?>"></script>
	<script src="<?php echo base_url()."assets/js/responsive.js" ?>"></script>
	<!--
	<script src="js/jquery.hoverIntent.js"></script>
	!-->
    <script src="<?php echo base_url()."assets/js/slides.min.jquery.js" ?> "></script>
	
    <script src="<?php echo base_url()."assets/js/md5.js"; ?>" type="text/javascript"></script>
    
</head>

<body>

	

<script type="text/javascript" src="<?php echo base_url()."assets/js/highchart.js" ?>"></script>

<header>
		<div class="main">
			<!--======================== logo ============================-->
			<h1>
				<!--
                <a href="index.html">pre<span class="color-1">s</span><span class="color-2">t</span>ige</a>
				<span>professional online education</span>
                !-->
			</h1>
			<div class="content-box">
				<div class="container_16">
					<div class="grid_16">
						<div class="header-pannel" style="padding-left:0px;">
                        	<?php
							echo 'Bienvenido: '.utf8_encode($_SESSION["nombre"]); 
							?>
                            <label style="float:right;">
                            <a href="<?php echo site_url()."?c=logout" ?>">
                            Salir
                            </a>
                            </label>
							<div class="clear"></div>
						</div>
						<div class="navigation">
							<!--======================== menu ============================-->
							<?php
							$this->load->view('menu');
							?>
							<form id="search-form">
								<fieldset>
									<label class="keywords">
										<input type="text">
									</label>
									<a onClick="document.getElementById('search-form').submit()"></a>
								</fieldset>
							</form>
							<div class="clear"></div>
						</div>
						<!--=================== slider ==================-->
						<div id="slides">
							<div class="slides_container" style="height:auto; padding-top:30px; padding-bottom:50px; padding-left:10px; padding-right:10px;">
								
                                <div id="g_render"  class="left">
                                    <?php if (isset($charts)) echo $charts; ?>    
                                </div>
                                
							</div>
							<div class="slider-nav"></div>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</header>
    
	<!--======================== content ===========================-->
	<section id="content">
	
	</section>
	<!--======================== footer ============================-->
	<footer>
		<div class="main">
			<div class="container_16">
				<div class="wrapper">
					
					<div class="grid_9 last-col alignright">
						<div class="footer-text">Prestige &copy; 2012 | <a href="index-7.html">Privacy policy</a></div>
						<div class="footer-link"><!--{%FOOTER_LINK} --></div>
						<!--======================== footer menu ============================-->
						<!--======================== social icons ============================-->
						
					</div>
				</div>
			</div>
		</div>
	</footer>
    
    
    
</body>

</html>

