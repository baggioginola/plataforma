<script src="<?php echo base_url() . "assets/js/md5.js"; ?>" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url() . "assets/js/custom/cursos_alumno_agregar.js" ?>"></script>

<link media="screen" href="<?php echo base_url() . "assets/css/bootstrap.css"; ?>"
      rel="stylesheet"/>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

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
                                <h1>Agregar Curso</h1>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <form class="form-horizontal" role="form" id="form_add" data-toggle="validator">
                                        <div class="form-group has-feedback">
                                            <label for="id_tipo" class="col-lg-2 control-label">Maestro</label>

                                            <div class="col-lg-10">
                                                <select name="id_maestro" id="id_maestro" aria-controls="datatable"
                                                        class="form-control input-sm">
                                                    <?php
                                                    foreach($result_maestros as $resultado_maestros)
                                                    {
                                                        ?>
                                                        <option value="<?php echo $resultado_maestros->id_maestro; ?>" >
                                                            <?php
                                                            echo utf8_encode($resultado_maestros->nombre." ".$resultado_maestros->apellido_paterno." ".$resultado_maestros->apellido_materno);
                                                            ?>
                                                        </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group has-feedback">
                                            <label for="id_curso" class="col-lg-2 control-label">Curso</label>

                                            <div class="col-lg-10">
                                                <select name="id_curso" id="id_curso" aria-controls="datatable"
                                                        class="form-control input-sm">
                                                    <?php
                                                    foreach($result_cursos as $resultado_cursos)
                                                    {
                                                        ?>
                                                        <option value="<?php echo $resultado_cursos->id_curso; ?>" >
                                                            <?php
                                                            echo utf8_encode($resultado_cursos->nombre);
                                                            ?>
                                                        </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group" style="text-align: right;">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button type="submit" class="btn btn-primary" id="id_submit">Aceptar
                                                </button>
                                                <button type="button" class="btn btn-primary" id="reset_button">
                                                    Limpiar
                                                </button>
                                            </div>
                                        </div>
                                        <input type="hidden" name="token" value="<?php echo $_SESSION["token"] ?>"/>
                                    </form>
                                </div>
                            </div>
                        </div>

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

<script type="text/javascript" src="<?php echo base_url() . "assets/js/validator.js" ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . "assets/js/bootbox.min.js" ?>"></script>