<!DOCTYPE html>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>Sistema Web de gestión del conocimiento</title>

    <link rel="stylesheet" href="<?php echo base_url() . "assets/css/reset.css" ?>" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url() . "assets/css/skeleton.css" ?>" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url() . "assets/css/superfish.css" ?>" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url() . "assets/css/estilos.css" ?>" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url() . "assets/css/forms.css" ?>" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url() . "assets/css/slider.css" ?>" type="text/css" media="screen">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>

    <script src="<?php echo base_url() . "assets/js/jquery.js" ?>"></script>

    <script src="<?php echo base_url() . "assets/js/slides.min.jquery.js" ?> "></script>
    <script src="<?php echo base_url() . "assets/js/bootbox.min.js" ?>"></script>
    <script src="<?php echo base_url() . "assets/js/custom/baseFunctions.js" ?>"></script>
    <script src="<?php echo base_url() . "assets/js/custom/config.js" ?>"></script>

</head>

<body>
<?php
$this->load->view($pagina);
?>
</body>

</html>