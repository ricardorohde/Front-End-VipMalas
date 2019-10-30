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

<div>
    
</div>
    <!-- ____________________ HEADER ____________________-->
    <? include('includes/header.php'); ?>

    <!-- ____________________ COMO FUNCIONA ____________________-->
    <? include('includes/como-funciona-div.php'); ?>

    <!-- ____________________ VANTAGENS E BENEFICIOS ____________________ -->
    <? include('includes/vantagens.php'); ?>

    <!-- ____________________ ALUGAR DIV ____________________-->
    <? include('includes/alugar-div.php'); ?>

    <? include('includes/footer.php'); ?>
    <? include('includes/js.php'); ?>
    <? include('includes/analytics.php'); ?>

</body>

</html>