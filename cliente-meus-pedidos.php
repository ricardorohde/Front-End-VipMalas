<?
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
<html class="no-js" lang="pt-br" itemscope itemtype="http://schema.org/WebPage">
<!--<![endif]-->

<head>
    <? include('includes/metas.php'); ?>
    <? include('includes/css.php'); ?>
</head>

<body>
    <?
    ##### RESTRIÇÃO DE ACESSO #####
    include('authCliente.php');
    ###############################
    ?>
    <? include('includes/header.php'); ?>
    <? include('includes/whatsapp-window.php'); ?>

    <section class="top-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>Área do cliente</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="painel-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-site">
                        <p><a href="./">Home</a> / <b>Área do cliente - Meus pedidos</b></p>
                    </div>
                    <? ShowErros(); ?>
                </div>
                <div class="col-md-3">
                    <? include('includes/sidebar-painel.php'); ?>
                </div>
                <div class="col-md-9">
                    <h2 class="title-page">Meus pedidos</h2>
                    <div class="row">
                        <?
                        $resPed = mysql_query("SELECT * FROM site_tb_pedidos WHERE ref_cli = '" . $sessionComprador_id . "' AND processado_ped = 's' ORDER BY id_ped DESC");
                        if (mysql_num_rows($resPed)) {
                            while ($rowPed = mysql_fetch_array($resPed)) {
                                $InfoStatus = mysql_fetch_array(mysql_query("SELECT * FROM site_tb_pedidos_status WHERE id_status = '" . $rowPed['status_ped'] . "'"));
                                ?>
                                <div class="col-md-12">
                                    <div class="box-pedido">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <p>
                                                            <b>Nº Pedido</b><br>
                                                            <?= str_pad($rowPed['id_ped'], 7, "0", STR_PAD_LEFT) ?>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <p>
                                                            <b>Data</b><br>
                                                            <?= mostraData(substr($rowPed['data_ped'], 0, 10)) ?>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <p>
                                                            <b>Envio</b><br>
                                                            <?= $rowPed['tipoFrete_ped'] ?>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <p>
                                                            <b>Status</b><br>
                                                            <?= $InfoStatus['legenda_status'] ?>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="link-area-painel">
                                                            <a href="painel/pedido/<?= $rowPed['id_ped'] ?>" class="bg-blue-border hvr-wobble-vertical">Ver detalhes</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <? }
                            } else { ?>
                            <div class="col-md-12">
                                <div class="box-pedido">
                                    <div class="row">
                                        <p>Você ainda não efetuou uma compra, <a href="home">clique aqui</a> para realizar sua primeira compra.</p>
                                    </div>
                                </div>
                            </div>
                        <? } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <? include('includes/newsletter.php'); ?>

    <? include('includes/footer.php'); ?>
    <? include('includes/js.php'); ?>
    <? include('includes/analytics.php'); ?>

</body>

</html>