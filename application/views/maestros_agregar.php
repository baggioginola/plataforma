<script src="<?php echo base_url() . "assets/js/md5.js"; ?>" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url() . "assets/js/custom/maestros_agregar.js" ?>"></script>

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
                        $this->load->view('menu_administracion');
                        ?>

                        <div class="clear"></div>
                    </div>
                    <!--=================== slider ==================-->
                    <div id="slides">
                        <div class="slides_container"
                             style="height:auto; padding-top:30px; padding-bottom:50px; padding-left:10px; padding-right:10px;">
                            <div class="titulo_contenido">
                                <h1>Agregar Maestro</h1>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <form class="form-horizontal" role="form" id="form_add" data-toggle="validator">
                                        <h3 class="sub-header">Información DE LA CUENTA</h3>

                                        <div class="form-group has-feedback">
                                            <label for="id_email" class="col-lg-2 control-label">Correo
                                                Electrónico</label>

                                            <div class="col-lg-10">
                                                <input type="email" class="form-control" id="id_email"
                                                       placeholder="E-mail" required
                                                       autocomplete="off" name="e_mail">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

                                            </div>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <label for="id_password" class="col-lg-2 control-label">Contraseña</label>

                                            <div class="col-lg-10">
                                                <input type="password" class="form-control" id="id_password"
                                                       name="password"
                                                       placeholder="Password" autocomplete="off" required>
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

                                            </div>
                                        </div>
                                        <h3 class="sub-header">Información Personal</h3>

                                        <div class="form-group has-feedback">
                                            <label for="id_nombre" class="col-lg-2 control-label">Nombre</label>

                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" id="id_nombre" required
                                                       name="nombre"
                                                       placeholder="Nombre"
                                                       autocomplete="off">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

                                            </div>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <label for="id_apellido_paterno" class="col-lg-2 control-label">Apellido
                                                Paterno</label>

                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" id="id_apellido_paterno"
                                                       required placeholder="Apellido Paterno"
                                                       autocomplete="off" name="apellido_paterno">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

                                            </div>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <label for="id_apellido_materno" class="col-lg-2 control-label">Apellido
                                                Materno</label>

                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" id="id_apellido_materno"
                                                       required placeholder="Apellido Materno"
                                                       autocomplete="off" name="apellido_materno">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
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