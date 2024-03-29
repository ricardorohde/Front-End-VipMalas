<?php
session_start();
include 'cms/config/config.php';
require 'cms/classes/class.conndatabase.php';
require 'cms/classes/functions.php';

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="pt-br" itemscope="" itemtype="http://schema.org/WebPage">
<!--<![endif]-->

<head>
    <? include('includes/metas.php'); ?>
    <? include('includes/css.php'); ?>
</head>

<body>
    <!-- ____________________ HEADER ____________________-->
    <? include('includes/header2.php'); ?>

    <main class="como-funciona">
        <!-- ____________________ TITTLE ____________________-->
        <? include('includes/title.php'); ?>

        <!-- ____________________ COMO FUNCIONA - DIV ETAPAS ____________________-->
        <? include('includes/como-funciona-div.php'); ?>

        <!-- ____________________ VANTAGENS E BENEFICIOS ____________________ -->
        <? include('includes/vantagens.php'); ?>

        <!-- ____________________ QUERO ALUGAR DIV ____________________-->
        <? include('includes/quero-alugar-div.php'); ?>
    </main>

    <? include('includes/footer.php'); ?>
    <? include('includes/js.php'); ?>
    <? include('includes/analytics.php'); ?>

</body>

</html>