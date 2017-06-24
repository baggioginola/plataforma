<script src="<?php echo base_url()."assets/js/custom/administracion.js" ?>" type="text/javascript"></script>
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
                        $this->load->view($menu);
                        ?>

                        <div class="clear"></div>
                    </div>
                    <!--=================== slider ==================-->
                    <?php
                    $this->load->view('templates/slider');
                    ?>
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