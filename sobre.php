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

    <main class="sobre.php">

        <!-- ____________________ TITTLE ____________________-->
        <? include('includes/title.php'); ?>

        <!-- ____________________ NOSSA HISTÓRIA ____________________-->
        <section class="historia">
            <div class="container">
                <h2>Nossa História</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt repellat provident qui tempore, maxime doloribus nemo ea totam voluptatibus recusandae vel nisi sed quis architecto fugiat illo nihil, blanditiis quo! Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia iusto nobis dolore deleniti, minus earum asperiores accusantium. Ipsam, accusamus repellendus corrupti repellat fuga deserunt dolorum, perferendis, impedit earum sapiente laudantium.</p>
                <br>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequatur quis suscipit sed rerum dicta! Esse perferendis repellendus, nihil eaque quibusdam repudiandae quo hic dicta qui, rerum ipsam, nobis et tempore!</p>
            </div>
        </section>

        <!-- ____________________ MISSAO VISAO VALORES ____________________-->
        <section class="valores">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <h3>Missão</h3>
                        <p>
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloremque sed veniam magni, mollitia consequatur similique vero architecto at explicabo iusto, expedita, laborum illo voluptate earum dolor possimus eaque eum! Exercitationem!
                        </p>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <h3>Visão</h3>
                        <p>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos quia, deserunt repellat dolor in ea blanditiis, rerum quasi magni beatae iusto fugiat, est dolores corporis sapiente! Dolore nobis placeat perspiciatis!
                        </p>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <h3>Valores</h3>
                        <p>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Architecto, aperiam inventore. Aspernatur porro, cum quidem neque doloribus tempora. Dignissimos ducimus exercitationem animi harum distinctio neque minima cumque vero, delectus officiis!
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ____________________ VANTAGENS E BENEFICIOS ____________________ -->
        <? include('includes/vantagens.php'); ?>

    </main>

    <? include('includes/footer.php'); ?>
    <? include('includes/js.php'); ?>
    <? include('includes/analytics.php'); ?>

</body>

</html>