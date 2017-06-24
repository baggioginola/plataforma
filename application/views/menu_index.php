<nav>
    <ul class="sf-menu responsive-menu">
        <li <?php
        if ($pagina == 'plataforma') {
            ?> class="current"
        <?php
        }
        ?>><a href="<?php echo site_url() ?>">Inicio</a></li>
        <li
            <?php
            if ($pagina == 'acerca') {
                ?>
                class="current"
            <?php
            }
            ?>><a href="<?php echo site_url() . "?c=acerca" ?>">Acerca</a></li>
        <li
            <?php
            if ($pagina == 'registro') {
                ?>
                class="current"
            <?php
            }
            ?>><a href="<?php echo site_url() . "?c=registro" ?>">Registro</a></li>
        <li
            <?php
            if ($pagina == 'contacto') {
                ?>
                class="last-item current"
            <?php
            }
            ?>><a href="<?php echo site_url() . "?c=contacto" ?>">Contacto</a></li>
    </ul>
</nav>