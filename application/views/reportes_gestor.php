<script type="text/javascript">

function recarga()
	{
		location.href = "<?php echo site_url()."?c=cursos"; ?>";
	}
	
</script>
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
										<input type="text" class="validate[required]"  name="txt_buscar" autocomplete="off" id="id_buscar">
									</label>
                                    <!--
                                    <a id="id_search"></a>
                                    !-->
                                    <button type="submit"  class="link_editar" id="btn_buscar" style="cursor:pointer;"></button>
                                    
								</fieldset>
							</form>
							<div class="clear"></div>
						</div>
						<!--=================== slider ==================-->
						<div id="slides">
							<div class="slides_container" style="height:auto; padding-top:30px; padding-bottom:50px; padding-left:10px; padding-right:10px;">
								
                                
                                <div class="titulo_contenido">
                                <h1 style="margin-bottom:10px; text-transform:capitalize; font-size:24px">Reportes</h1>
                                </div>
                                
                               
                                
                                <div style="float:left;  margin-left:50px;">
                                
                                <a href="<?php echo site_url()."?c=reportes&m=cursos" ?>" style="text-decoration:none; color:#000000; " class="" target="_blank">
                                
                                <img border="0" align="absmiddle" hspace="2" src="<?php echo base_url()."assets/imagenes/cursos.png" ?>" style="width:100px">
                                <br/>
                                Reporte Cursos</a>
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