<nav>
    <ul class="sf-menu responsive-menu">
        <li <?php
        if ($pagina == 'administracion') {
            ?>
            class="current"
        <?php
        }
        ?>><a href="<?php echo site_url() . "?c=administracion" ?>">Inicio</a></li>

        <li <?php
        if ($pagina == 'cursos_gestor' || $pagina == 'cursos_agregar' || $pagina == 'cursos_editar') {
            ?>
            class="current"
        <?php
        }
        ?>><a href="<?php echo site_url() . "?c=cursos" ?>">Cursos</a></li>

        <?php
        if ($_SESSION['tipo'] == "maestro" && $_SESSION['nivel'] == 1) {
            ?>


            <li <?php
            if ($pagina == 'objetos_aprendizaje_gestor' || $pagina == 'objetos_aprendizaje_agregar' || $pagina == 'objetos_aprendizaje_editar') {
                ?>
                class="current"
            <?php
            }
            ?>>
                <a href="<?php echo site_url() . "?c=objetos_aprendizaje" ?>">Objetos Aprendizaje</a></li>

        <?php
        }
        ?>

        <li class="last-item"><a href="#">Alumnos</a></li>

        <?php
        if ($_SESSION['tipo'] == "maestro" && $_SESSION['nivel'] == 0) {
            ?>
            <li class="last-item">
                <a href="<?php echo site_url() . "?c=reportes" ?>">Reportes</a>
            </li>
        <?php
        }
        ?>
    </ul>
</nav>