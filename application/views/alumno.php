<script type="text/javascript" src="<?php echo base_url() . "assets/js/custom/alumno.js" ?>"></script>

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

                    <div class="navigation">
                        <!--======================== menu ============================-->
                        <?php
                        $this->load->view('menu_alumno');
                        ?>

                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</header>

<!--======================== content ===========================-->
<section id="content">
    <div class="wrapper">
        <div class="main">
            <div class="content-box">
                <div class="container_16">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12 col-md-5 col-lg-5">
                            <img src="<?php echo base_url() . "assets/imagenes/logo.png" ?>" class="img-responsive"/>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <form class="form-horizontal" role="form" id="form_register" data-toggle="validator">
                                        <h3 class="sub-header">Registro</h3>

                                        <div class="form-group has-feedback">
                                            <label for="id_nombre" class="col-lg-12">Nombre<span
                                                    style="color:#C10000;">*</span></label>

                                            <div class="col-lg-12">
                                                <input type="text" class="form-control" id="id_nombre"
                                                       placeholder="Nombre"
                                                       required autocomplete="off" name="nombre">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

                                            </div>
                                        </div>

                                        <div class="form-group has-feedback">
                                            <label for="id_apellido_paterno" class="col-lg-12">Apellido
                                                Paterno<span style="color:#C10000;">*</span></label>

                                            <div class="col-lg-12">
                                                <input type="text" class="form-control" id="id_apellido_paterno"
                                                       placeholder="Apellido Paterno"
                                                       required autocomplete="off" name="apellido_paterno">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

                                            </div>
                                        </div>

                                        <div class="form-group has-feedback">
                                            <label for="id_apellido_materno" class="col-lg-12">Apellido
                                                Materno<span style="color:#C10000;">*</span></label>

                                            <div class="col-lg-12">
                                                <input type="text" class="form-control" id="id_apellido_materno"
                                                       placeholder="Apellido Materno"
                                                       required autocomplete="off" name="apellido_materno">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

                                            </div>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <label for="id_email" class="col-lg-12">Email<span
                                                    style="color:#C10000;">*</span></label>

                                            <div class="col-lg-12">
                                                <input type="email" class="form-control" id="id_email" required
                                                       name="e_mail" placeholder="Email" autocomplete="off">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

                                            </div>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <label for="id_matricula"
                                                   class="col-lg-12">Matrícula<span
                                                    style="color:#C10000;">*</span></label>

                                            <div class="col-lg-12">
                                                <input type="text" class="form-control" id="id_matricula" required
                                                       placeholder="Matrícula" autocomplete="off" name="matricula">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div>
                                        </div>
                                        <input type="hidden" value="<?php echo $_SESSION['id']; ?>" id="id_alumno">
                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
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