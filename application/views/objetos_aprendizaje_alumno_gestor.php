<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
      integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
      crossorigin="anonymous">
<link href="<?php echo base_url() . "assets/css/datatable.css" ?>" rel="stylesheet">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

<script type="text/javascript" src="<?php echo base_url() . "assets/js/datatable.js" ?>"></script>
<script src="<?php echo base_url() . "assets/js/custom/objetos_aprendizaje_alumno.js" ?>"></script>

<header>
    <div class="main">
        <div class="content-box">
            <div class="container_16">
                <div class="grid_16">
                    <div class="header-pannel" style="padding-left:0px;">
                        <?php
                        echo 'Bienvenido: ' . utf8_encode($_SESSION["nombre"]);
                        ?>
                        <label style="float:right;">
                            <a href="<?php echo site_url() . "?c=logout" ?>">
                                Salir
                            </a>
                        </label>

                        <div class="clear"></div>
                    </div>
                    <div class="navigation">
                        <!--======================== menu ============================-->

                        <?php
                        $this->load->view('menu_alumno');
                        ?>
                        <div class="clear"></div>
                    </div>
                    <!--=================== slider ==================-->
                    <div id="slides">
                        <div class="slides_container"
                             style="height:auto; padding-top:30px; padding-bottom:50px; padding-left:10px; padding-right:10px;">


                            <div class="titulo_contenido">
                                <h1 style="margin-bottom:10px; text-transform:capitalize; font-size:24px">Objetos
                                    Aprendizaje</h1>
                            </div>

                            <div style="float:right;  margin-right:50px; clear: both;">

                                <a href="<?php echo site_url() . "?c=objetos_aprendizaje&m=agregar" ?>"
                                   style="text-decoration:none; color:#000000; ">

                                    <img border="0" align="absmiddle" hspace="2"
                                         src="<?php echo base_url() . "assets/imagenes/archivo.png" ?>"
                                         style="width:25px">
                                    <br/>
                                    Agregar Objeto Aprendizaje</a>
                            </div>

                            <div style="clear: both"><br></div>
                            <table id="datatable" class="table table-striped table-bordered" cellspacing="0"
                                   width="100%">
                                <thead>
                                <tr>
                                    <th>Curso</th>
                                    <th>Nombre</th>
                                    <th>Tipo</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                            </table>
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
            </div>
        </div>
    </div>
</footer>