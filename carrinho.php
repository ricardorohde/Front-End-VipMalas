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

    <main class="carrinho">
        <!-- ____________________ TITTLE ____________________-->
        <? include('includes/title.php'); ?>

        <!-- ____________________ TABELA DE COMPRAS ____________________-->
        <section class="tabela-compras">
            <div class="container my-5">

                <!-- ____________________ TABLEA DE COMPRAS - DIV ____________________-->
                <? include('includes/tabela-compras-div.php'); ?>

                <!-- ____________________ BOTÕES CARRINHO ____________________-->
                <div class="w-100 py-4">
                    <a class="btn continuar" href="alugar.php">Continuar Alugando</a>
                    <a class="btn finalizar" href="checkout.php">Finalizar Pedido</a>
                </div>

            </div>
        </section>

        <!-- ____________________ NEWSLETTER ____________________-->
        <? include('includes/newsletter.php'); ?>
    </main>

    <? include('includes/footer.php'); ?>
    <? include('includes/js.php'); ?>
    <? include('includes/analytics.php'); ?>

</body>

</html>