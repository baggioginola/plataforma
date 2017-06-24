<link media="screen" href="<?php echo base_url() . "assets/css/bootstrap.css"; ?>"
      rel="stylesheet"/>

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
<header>
    <div class="main">
        <!--======================== logo ============================-->
        <div class="content-box">
            <div class="container_16">
                <div class="grid_16">

                    <div class="navigation">
                        <!--======================== menu ============================-->
                        <?php
                        $this->load->view('menu_index');
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
                        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15089.319134829642!2d-98.2044187!3d19.0051844!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb517171394a5208b!2sFacultad+de+Ciencias+de+la+Computaci%C3%B3n+-+BUAP!5e0!3m2!1ses!2smx!4v1497665771488" width="90%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding-top: 25px;">
                                <form>
                                    <legend><span class="glyphicon glyphicon-globe" style="font-size: 65%; padding-right: 10px;"></span>Dirección</legend>
                                    <address>
                                        <strong>FCC BUAP</strong><br>
                                        Av. San Claudio y 14 Sur<br>
                                        Cd Universitaria<br>
                                        C.P. 72592 <br>
                                        Puebla, México.<br>
                                        <abbr title="Phone">
                                            Teléfono:</abbr><br>
                                        01 222 229 5500 ext. 7390<br>
                                    </address>

                                </form>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <form class="form-horizontal" role="form" id="form_contact" data-toggle="validator">
                                        <h3 class="sub-header">Información Personal</h3>
                                        <div class="form-group has-feedback">
                                            <label for="id_nombre" class="col-lg-2 control-label">Nombre<span style="color:#C10000;">*</span></label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" id="id_nombre" placeholder="Nombre"
                                                       required autocomplete="off" name="name">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

                                            </div>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <label for="id_email" class="col-lg-2 control-label">Email<span style="color:#C10000;">*</span></label>
                                            <div class="col-lg-10">
                                                <input type="email" class="form-control" id="id_email" required
                                                       name="e_mail" placeholder="Email" autocomplete="off">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

                                            </div>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <label for="id_telefono"
                                                   class="col-lg-2 control-label">Teléfono<span style="color:#C10000;">*</span></label>
                                            <div class="col-lg-10">
                                                <input type="tel" class="form-control" id="id_telefono" required
                                                       placeholder="Teléfono" autocomplete="off" name="phone" >
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <label for="id_message"
                                                   class="col-lg-2 control-label">Mensaje<span style="color:#C10000;">*</span></label>
                                            <div class="col-lg-10">
                                                <textarea class="form-control" placeholder="Mensaje" rows="6" cols="5" required="required" name="message" id="id_message"></textarea>
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div>
                                        </div>
                                        <div class="form-group" style="text-align: right;">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button type="submit" class="btn btn-primary" id="id_submit">Aceptar
                                                </button>
                                                <button type="button" class="btn btn-primary" id="reset_button">Limpiar
                                                </button>
                                            </div>
                                        </div>
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