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

    $IDPed = $_GET['ref'];
    $ResInfoPed = mysql_query("SELECT * FROM site_tb_pedidos WHERE ref_cli = '" . $_SESSION['Comprador']['ID'] . "' AND id_ped = '" . $IDPed . "' ");

    if (mysql_num_rows($ResInfoPed)) {
        $InfoPed = mysql_fetch_array($ResInfoPed);
        $InfoStatus = mysql_fetch_array(mysql_query("SELECT * FROM site_tb_pedidos_status WHERE id_status = '" . $InfoPed['status_ped'] . "'"));
    } else {
        Redir('painel');
    }

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
                        <p><a href="./">Home</a> / <b>Área do cliente - Pedido nº <?= str_pad($InfoPed['id_ped'], 7, "0", STR_PAD_LEFT) ?></b></p>
                    </div>
                    <? ShowErros(); ?>
                </div>
                <div class="col-md-3">
                    <? include('includes/sidebar-painel.php'); ?>
                </div>
                <div class="col-md-9">
                    <h2 class="title-page">Pedido nº <?= str_pad($InfoPed['id_ped'], 7, "0", STR_PAD_LEFT) ?></h2>
                    <div class="row info-pedido">
                        <div class="col-md-6">
                            <p><b>Data:</b> <?= mostraData(substr($InfoPed['data_ped'], 0, 10)) ?></p>
                            <p><b>Status:</b> <?= $InfoStatus['legenda_status'] ?></p>
                            <p><b>Código de rastreio:</b> <? if ($InfoPed['rastreio_ped'] == '') { ?>Não informado<? } else { ?><?= $InfoPed['rastreio_ped'] ?> (<a href="http://www.correios.com.br" target="_blank">clique aqui</a> para consultar no site do Correios)<? } ?></p>
                            <p><b>Seu IP no momento da compra:</b> <?= $InfoPed['ip_ped'] ?></p>
                        </div>
                        <div class="col-md-6">
                            <p><b>Endereço de entrega:</b><br>
                                <?= $InfoPed['end_ped'] ?>, <?= $InfoPed['num_ped'] ?><? if ($InfoPed['compl_ped']) {
                                                                                        echo ', ' . $InfoPed['compl_ped'];
                                                                                    } ?><br>
                                <?= $InfoPed['bairro_ped'] ?> - CEP: <?= $InfoPed['cep_ped'] ?><br>
                                <?= $InfoPed['cidade_ped'] ?> - <?= $InfoPed['uf_ped'] ?>
                            </p>
                        </div>
                    </div>
                    <div class="pedidos-table">
                        <table class="table table-hover tb-detalhepedido" cellspacing="0">
                            <tbody>
                                <tr class="tr-pedidos">
                                    <th>Produto</th>
                                    <th>Quantidade</th>
                                    <th>Valor unitário</th>
                                    <th>Total</th>
                                </tr>
                                <?php
                                $resItens = mysql_query("SELECT * FROM site_tb_pedidos_itens WHERE ref_ped = '" . $InfoPed['id_ped'] . "' ORDER BY desc_pi ASC");
                                while ($rowItens = mysql_fetch_array($resItens)) {
                                    $resInfoProd = mysql_query("SELECT * FROM site_tb_produtos WHERE id_prod = '" . $rowItens['id_prd_pi'] . "'");
                                    $rowInfoProd = mysql_fetch_array($resInfoProd);

                                    $tamanho = '';
                                    $cor = '';
                                    if ($rowItens['tam_prd_pi']) {
                                        $tamanho = ' - ' . $rowItens['tam_prd_pi'];
                                    }
                                    if ($rowItens['cor_prd_pi']) {
                                        $cor = ' - ' . $rowItens['cor_prd_pi'];
                                    }
                                    ?>
                                    <tr>
                                        <td><?= $rowItens['desc_pi'] . $tamanho . $cor ?></td>
                                        <td class="text-center"> <?= $rowItens['qtd_pi'] ?> </td>
                                        <td>R$ <?= Moeda($rowItens['vunit_pi']) ?></td>
                                        <td>R$ <?= Moeda($rowItens['vunit_pi'] * $rowItens['qtd_pi']) ?></td>
                                    </tr>
                                <? } ?>
                                <tr class="tr-pedidototal">
                                    <td colspan="2"></td>
                                    <td>
                                        <? if ($InfoPed['valorDescontoCupom_ped']) {
                                            echo 'Cupom de Desconto: <br>';
                                        } ?> Total de produtos: <br> Entrega <?= $InfoPed['tipoFrete_ped'] ?>: <br><b> Total: </b>
                                    </td>

                                    <td>
                                        <? if ($InfoPed['valorDescontoCupom_ped']) {
                                            echo 'R$ ' . Moeda($InfoPed['valorDescontoCupom_ped']) . ' <br>';
                                        } ?> R$ <?= Moeda($InfoPed['valorTotalPedido_ped'] - $InfoPed['valorFrete_ped']) ?>
                                        <br> <?= (($InfoPed['valorFrete_ped']) > 0) ? 'R$ ' . Moeda($InfoPed['valorFrete_ped']) : 'Grátis' ?>
                                        <br><b> R$ <?= Moeda($InfoPed['valorTotalPedido_ped']) ?></b>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="link-area">
                        <a href="painel/meus-pedidos" class="hvr-wobble-vertical">Voltar</a>
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