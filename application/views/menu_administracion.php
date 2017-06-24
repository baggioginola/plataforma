<nav>
    <ul class="sf-menu responsive-menu">
        <li <?php
        if ($pagina == 'administracion') {
            ?>
            class="current"
        <?php
        }
        ?>><a href="<?php echo site_url() . "?c=administracion" ?>">Inicio</a></li>


        <li
            <?php
            if ($pagina == 'maestros_gestor' || $pagina == 'maestros_agregar' || $pagina == 'maestros_editar') {
                ?>
                class="current"
            <?php
            }
            ?>><a href="<?php echo site_url() . "?c=maestros" ?>">Maestros</a></li>
    </ul>
</nav>