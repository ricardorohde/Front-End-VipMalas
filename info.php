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

    <? include('includes/header.php'); ?>
    <? include('includes/whatsapp-window.php'); ?>

    <?

    if ($_GET['slug']) {
        $resPage = mysql_query("SELECT * FROM site_tb_pages WHERE slug_page = '" . $_GET['slug'] . "'");
        if (mysql_num_rows($resPage)) {
            $rowPage = mysql_fetch_array($resPage);

            $count_hit = $rowPage['hit_page'];
            $count_hit = $count_hit + 1;
            mysql_query("UPDATE site_tb_pages SET hit_page='" . $count_hit . "' WHERE id_page = '" . $rowPage['id_page'] . "'");
        } else {
            Redir('/');
        }
    } else {
        Redir('/');
    }

    ?>

    <section class="top-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1><?= $rowPage['nome_page'] ?></h1>
                </div>
            </div>
        </div>
    </section>
    <section class="paginas-informativas">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-site">
                        <p><a href="./">Home</a> / <b><?= $rowPage['nome_page'] ?></b></p>
                    </div>
                </div>
                <div class="col-md-3">
                    <? include('includes/sidebar-pages.php'); ?>
                </div>
                <div class="col-md-9">
                    <h2><?= $rowPage['nome_page'] ?></h2>
                    <?= $rowPage['texto_page'] ?>
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