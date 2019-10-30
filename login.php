<?
session_start();
include 'cms/config/config.php';
require 'cms/classes/class.conndatabase.php';
require 'cms/classes/functions.php';
?>
<html>

<head>
    <? include('includes/metas.php'); ?>
    <? include('includes/css.php'); ?>
</head>

<body>
        <!-- Under Nav -->
        <? include('includes/undernav.php'); ?>

        <!-- Menu Nav -->
        <? include('includes/navbar.php'); ?>
    </div>
    
    <!-- WhatsApp Window -->
    <? include('includes/whatsapp-window.php');?>

    <div class="pa-40 set-bg-blue container-fluid">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 ">
            <h2 class="title_cliente text-uppercase">Área do Cliente - Login</h2>
        </div>
    </div>

    <div class="container mb-5">
    <form class="mt-5" method="post" action="processa_dados.php?act=CliLogin">
        <div class="row mb-5">
            <span class="mb-5 xs-margin-3">
                Caro cliente, para acessar sua área restrita, utilize as informações enviadas em seu e-mail.
            </span>
            <div class="col-md-12">
            <? ShowErros(); ?>
            </div>
            <div class="col-md-5 col-sm-6">
                <input type="email" class="form-control" autocomplete="email" id="email" name="email" aria-describedby="emailHelp" placeholder="E-MAIL" required>
            </div>
            <div class="col-md-5 col-sm-6 xs-mt-1">
                <input type="password" class="form-control" autocomplete="current-password" placeholder="SENHA" id="senha" name="senha">
            </div>
            <div class="col-md-2 col-sm-12">
            <button class="btn btn-login set-bg-blue text-uppercase" type="submit"> Entrar </button>
            </div>
        </div>
    </form>
</div>

        <!-- Carousel2 -->
        <? include('includes/carousel2.php'); ?>
        <!-- Footer -->
        <? include('includes/footer.php'); ?>
        <!-- Scripts -->
        
</body>
<? include('includes/js.php'); ?>
<? include('includes/analytics.php'); ?>

</html>