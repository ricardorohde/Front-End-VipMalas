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
    <? include('includes/banner.php'); ?>

    <!-- ____________________ COMO FUNCIONA ____________________-->
  <? include('includes/como-funciona-div.php'); ?>

    <!-- ____________________ CASOS DIV ____________________-->
    <section id="casos-div">
        <div class="bg-yellow">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="row col-12 title-section">
                            <h2>Casos de sucesso</h2>
                        </div>
                        <div id="depoimentosCarousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#depoimentosCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#depoimentosCarousel" data-slide-to="1"></li>
                                <li data-target="#depoimentosCarousel" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <? include('includes/depoimento.php'); ?>
                                </div>
                                <div class="carousel-item">
                                    <? include('includes/depoimento.php'); ?>
                                </div>
                                <div class="carousel-item">
                                    <? include('includes/depoimento.php'); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xs-12">
                        <img src="http://placehold.it/1000x500" alt="Foto depoimento">
                    </div>

                </div>
            </div>
        </div>
    </section>

    <? include('includes/footer.php'); ?>
    <? include('includes/js.php'); ?>
    <? include('includes/analytics.php'); ?>

</body>

</html>