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
            if ($pagina == 'cursos_alumno_gestor') {
                ?>
                class="current"
            <?php
            }
            ?>><a href="<?php echo site_url() . "?c=cursos_alumno" ?>">Cursos</a></li>


        <li <?php
        if ($pagina == 'objetos_aprendizaje_alumno_gestor') {
            ?>
            class="current"
        <?php
        }
        ?>>
            <a href="<?php echo site_url() . "?c=objetos_aprendizaje_alumno" ?>">Objetos Aprendizaje</a></li>


        <li class="last-item"><a href="#">Informaci&oacute;n Personal</a></li>

    </ul>
</nav>