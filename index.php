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
    <!-- ____________________ NAVBAR ____________________-->
    <? include('includes/header.php'); ?>

    <!-- ____________________ BANNER ____________________-->
    <div class="home-sliders hidden-mobile">
        <div class="sliders">
            <div class="sup-banner" style="height:800px; width:100%; background-image: url('uploads/destaques/banner1.png')">
                <div class="container prl-0">
                    <div class="text-banner d-flex align-items-end float-right">
                        <a href="#" class="btn-banner">Ver preços</a>
                        <a href="#" class="btn-banner">Quero alugar</a>
                    </div>
                </div>
            </div>
            <div class="sup-banner" style="height:800px; width:100%; background-image: url('uploads/destaques/banner1.png')">
            </div>
            <div class="sup-banner" style="height:800px; width:100%; background-image: url('uploads/destaques/banner1.png')">
            </div>
        </div>
    </div>

    <!-- ____________________ COMO FUNCIONA ____________________-->
    <? include('includes/como-funciona-div.php'); ?>

    <!-- ____________________ ALUGAR DIV ____________________-->
    <? include('includes/alugar-div.php'); ?>

    <!-- ____________________ VANTAGENS E BENEFICIOS ____________________ -->
    <? include('includes/vantagens.php'); ?>

    <!-- ____________________ NEWSLETTER ____________________-->
    <? include('includes/newsletter.php'); ?>

    <? include('includes/footer.php'); ?>
    <? include('includes/js.php'); ?>
    <? include('includes/analytics.php'); ?>

</body>

</html>