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
    <? include('includes/header.php'); ?>

    <!-- ____________________ BANNER ____________________-->
    <div class="home-sliders hidden-mobile">
        <div class="sliders">
            <div class="sup-banner" style="height:800px; width:100%; background-image: url('uploads/destaques/banner1.png')" alt="Banner principal vip Malas - Viajar com vip malas nunca foi tão simples e barato">
                <div class="container prl-0">
                    <div class="text-banner d-flex align-items-end float-right">
                        <a href="quero-alugar.php" class="btn-banner">Ver preços</a>
                        <a href="quero-alugar.php" class="btn-banner">Quero alugar</a>
                    </div>
                </div>
            </div>
            <div class="sup-banner" style="height:800px; width:100%; background-image: url('uploads/destaques/banner1.png')" alt="Banner principal vip Malas">
            </div>
            <div class="sup-banner" style="height:800px; width:100%; background-image: url('uploads/destaques/banner1.png')" alt="Banner principal vip Malas">
            </div>
        </div>
    </div>
    <main class="home">
        <!-- ____________________ COMO FUNCIONA ____________________-->
        <? include('includes/como-funciona-div.php'); ?>

        <!-- ____________________ QUERO ALUGAR DIV ____________________-->
        <? include('includes/quero-alugar-div.php'); ?>

        <!-- ____________________ VANTAGENS E BENEFICIOS ____________________ -->
        <? include('includes/vantagens.php'); ?>

        <!-- ____________________ NEWSLETTER ____________________-->
        <? include('includes/newsletter.php'); ?>
    </main>

    <? include('includes/footer.php'); ?>
    <? include('includes/js.php'); ?>
    <? include('includes/analytics.php'); ?>

</body>

</html>