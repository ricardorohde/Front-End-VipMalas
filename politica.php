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
<!--[if gt IE 8]><!--> <html class="no-js" lang="pt-br" itemscope itemtype="http://schema.org/WebPage"> <!--<![endif]-->
<head>
    <? include('includes/metas.php');?>
    <? include('includes/css.php');?>
</head>

<body>

<? include('includes/header.php');?>
<? include('includes/whatsapp-window.php');?>

<section class="top-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Política de privacidade</h1>
            </div>
        </div>
    </div>
</section>
<section class="paginas-informativas">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-site">
                    <p><a href="./">Home</a> / <b>Política de privacidade</b></p>
                </div>
            </div>
            <div class="col-md-3">
                <? include('includes/sidebar-pages.php');?>
            </div>
            <div class="col-md-9">
                <h2>Política de privacidade leve light</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et incidunt magnam qui repellat sapiente,
                    sint unde! Nobis obcaecati officia ratione temporibus voluptatum? Ad eius enim, explicabo quas saepe
                    sed unde.
                </p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aspernatur assumenda blanditiis corporis,
                    eaque eum expedita hic iste laboriosam maiores natus nisi numquam provident rem repudiandae saepe
                    suscipit ullam unde! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, cum debitis
                    dolores ea explicabo harum.
                </p>
                <p>Laboriosam magnam, magni perspiciatis quibusdam sint sit totam! Consequuntur enim facere
                    laboriosam omnis sit voluptas.
                </p>
            </div>
        </div>
    </div>
</section>
<? include('includes/newsletter.php');?>

<? include('includes/footer.php');?>
<? include('includes/js.php');?>
<? include('includes/analytics.php');?>

</body>
</html>