<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title ?></title>

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/style.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
</head>
<body>

<div class="nav-scroller py-1">
    <nav class="nav d-flex justify-content-center fixed-top bg-light">
        <a class="nav-link text-muted" href="<?php echo base_url('index.php/admin/register'); ?>">Register</a>
        <a class="nav-link text-muted" href="<?php echo base_url('index.php/admin/login'); ?>">Login</a>
    </nav>
</div>

<div class="container">
    <div class="middle-block">

