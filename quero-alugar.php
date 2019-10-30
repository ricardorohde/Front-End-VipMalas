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

    <div class="blue-bg">

    </div>

    <!-- ____________________ QUERO ALUGAR ____________________-->
    <main>
        <div class="container">
    <!-- ____________________ TITTLE ____________________-->
    <? include('includes/tittle.php'); ?>

            <section class="pricing py-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 text-center">
                            <div class="card mb-5 mb-lg-0">
                                <div class="card-body">
                                    <a href="produto-detalhe"><img class="" src="assets/images/mala1.png" alt="Mala grande de cor azul"></a>
                                    <h2>Mala 20 litros</h2>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus esse obcaecati</p>
                                    <hr>
                                    <h3 class="card-price">R$10,00<span class="period">/dia</span></h3>
                                    <hr>
                                    <ul class="text-price">
                                        <h4>Pacotes Promocionais</h4>
                                        <li>7 dias__R$ 8,00/dia__R$ 56,00</li>
                                        <li>7 dias__R$ 8,00/dia__R$ 56,00</li>
                                        <li>7 dias__R$ 8,00/dia__R$ 56,00</li>
                                    </ul>
                                    <a href="produto-detalhe" class="btn text-uppercase">Alugar mala</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>
    </main>

    <!-- ____________________ ALUGAR DIV ____________________-->
    <? include('includes/alugar-div.php'); ?>

    <!-- ____________________ NEWSLETTER ____________________-->
    <? include('includes/newsletter.php'); ?>

    <? include('includes/footer.php'); ?>
    <? include('includes/js.php'); ?>
    <? include('includes/analytics.php'); ?>

</body>

</html>