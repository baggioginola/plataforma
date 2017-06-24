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
                    <div class="wrapper">
                        <div class="grid_11">
                            <div class="indent-bottom10 indent-top5">
                                <h2 class="p5"><span class="color-1">El sistema web</span> de gestión del conocimiento
                                    es una herramienta web disponible para la comunidad universitaria</h2>

                                <div class="wrapper" style="font-size:14px;">
                                    El sistema web de gestión del conocimiento incluye recursos educativos generados por
                                    miembros de la comunidad BUAP que permite la interacción entre el
                                    personal docente y alumnos, los recursos digitales serán un complemento a la
                                    enseñanza
                                    brindada dentro del aula, enriqueciendo el proceso de aprendizaje.

                                    <br>
                                    Permitirá los profesores gestionar el conocimiento a través de una plataforma de contenidos
                                    digitales proporcionando a los alumnos herramientas electrónicas las cuales faciliten el
                                    proceso de enseñanza-aprendizaje, de esta manera los alumnos contarán con más y
                                    mejor material y obtendrán mejores conocimientos.
                                </div>
                            </div>

                        </div>

                        <div class="grid_5 last-col">
                            <form id="user-login-form" class="p6-1">
                                <fieldset>
                                    <h3 class="p3-1">Acceso</h3>

                                    <div class="wrapper">
                                        <label class="login">
                                            <span>Usuario:</span>
                                            <input type="text" placeholder="Ingrese Usuario" id="id_usuario"
                                                   name="usuario" autocomplete="off"/>

                                            <div id="mensaje_usuario" class="campo_requerido"
                                                 style="display:none; margin-left:1px;"></div>
                                        </label>

                                        <div style="clear:both;">
                                        </div>
                                        <label class="password">
                                            <span>Password:</span>
                                            <input type="password" placeholder="Ingrese Password" autocomplete="off"
                                                   id="id_password" name="password">

                                            <div id="mensaje_password" class="campo_requerido"
                                                 style="display:none; margin-left:1px;"></div>
                                        </label>
                                    </div>
                                    <div class="wrapper p1-1">
                                        <a id="id_login" class="button">Ingresar</a>
                                    </div>
                                    <div id="mensaje_servidor" class="campo_requerido"
                                         style="display:none; margin-left:1px;"></div>

                                    <span></span>
                                    <a href="<?php echo site_url() . "?c=registro" ?>" class="link-2"
                                       style="float:left;">Registrarse</a>
                                </fieldset>
                            </form>

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