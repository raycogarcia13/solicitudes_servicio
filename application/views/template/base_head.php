<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>
        Solicitudes | ENPA
    </title>
    <meta name="description" content="Sistema para la gestión de solicitudes informáticas ENPAIJ">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link href="assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" /> -->
    <link href="<?= base_url() ?>resources/template/css/vendors.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>resources/template/css/style.bundle.css" rel="stylesheet" type="text/css" />
    
    <?php
    if(isset($css))
        foreach($css as $item)
            echo "<link href='".base_url()."resources/".$item."' rel='stylesheet' type='text/css'>\n";
    ?>

    <link rel="shortcut icon" href="<?=base_url()?>resources/images/iconoEnpa.ico" />
    <script>
        var http="<?=base_url()?>";
    </script>
</head> 