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

    <main class="duvidas">
        <!-- ____________________ TITTLE ____________________-->
        <? include('includes/title.php'); ?>

        <!-- ____________________ DÚVIDAS ____________________-->
        <section class="duvidas-div">
            <div class="container">
                <div class="row col-12 pr-0">
                    <div class="col-md-4 offset-md-8">
                        <select class="form-control mb-5" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option selected disabled="disabled">Selecione o assunto:</option>
                            <option value="duvidas">Todos</option>
                            <? while ($infoTema = mysql_fetch_array($resAssunto)) { ?>
                                <option value="duvidas/assunto<?= $infoTema['id_assunto'] ?>/<?= cleanString($infoTema['nome_assunto']) ?>"><?= $infoTema['nome_assunto'] ?></option>
                            <? } ?>
                        </select>
                    </div>
                    <? while ($rowResult = mysql_fetch_array($resResult)) { ?>
                        <div class="col-md-4">
                            <span><?= date("d/m/Y", strtotime($rowResult['data_post'])) ?></span>
                            <h3><?= $rowResult['titulo_post'] ?></h3>
                            <p><?= substr($rowResult['texto_post'], 0, 150) . '...' ?></p>
                            <div class="duvidas-saibaMais">
                                <a href="duvidas/<?= cleanString($rowResult['titulo_post']); ?>-<?= $rowResult['id_post'] ?>">Leia mais</a>
                            </div>
                        </div>
                    <? } ?>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="paginacao">
                            <?= $paginacao ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ____________________ ALUGAR DIV ____________________-->
        <? include('includes/alugar-div.php'); ?>
    </main>

    <? include('includes/footer.php'); ?>
    <? include('includes/js.php'); ?>
    <? include('includes/analytics.php'); ?>

</body>

</html>