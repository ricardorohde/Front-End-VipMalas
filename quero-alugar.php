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

    <main class="quero-alugar">
        <!-- ____________________ TITTLE ____________________-->
        <? include('includes/title.php'); ?>

        <!-- ____________________ COTAÇÃO ____________________-->
        <section class="alugar">
            <div class="container my-4">
                <div class="mt-5">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit Saepe minus temporibus totam soluta inventore, repellendus natus quidem veritatis beatae maxime voluptatem autem distinctio mollitia enim iste. Voluptatem sed dolorem quia.</p>
                </div>
                <div class="card my-5">
                    <form class="mt-5" method="post" action="processa_dados.php?act=CliLogin">
                        <div class="row mb-5">
                            <div class="col-md-3">
                                <label for="CEP">CEP</label>
                                <input required="" placeholder="Qual o seu CEP ?" class=" mask_cep" type="text" name="cep" id="cep" value="<?= $rowEnd['cep_ped'] ?>" onblur="getEndereco(this.value); AtualizaFrete(this);">
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="DATA">Partida</label>
                                    <input required="" placeholder="Quando vai viagem ?" class="mask_date" type="text" name="datanascimento" id="datanascimento">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="DATA">Volta</label>
                                    <input required="" placeholder="Quando vai voltar ?" class="mask_date" type="text" name="datanascimento" id="datanascimento">
                                </div>
                            </div>
                            <div class="col-md-3 col-xs-12 text-center">
                                <a class="btn py-2 mt-3" href="cliente.php">Fazer Cotação</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </section>

        <!-- ____________________ MALAS ____________________-->
        <section class="pricing pt-3 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 text-center">
                        <div class="card mb-5 mb-lg-0">
                            <div class="card-body">
                                <div class="card-img">
                                    <a href="alugar.php"><img class="img-fluid" src="assets/images/mala1.png" alt="Mala grande de cor azul"></a>
                                </div>
                                <h2>Mala 20 litros</h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus esse obcaecati</p>
                                <hr>
                                <h3>R$10,00<span class="card-por">/ dia</span></h3>
                                <p class="card-estoque">10 em estoque</p>
                                <hr>
                                <ul class="text-price">
                                    <h4>Pacotes Promocionais</h4>
                                    <li>7 dias__R$ 8,00/dia__R$ 56,00</li>
                                    <li>7 dias__R$ 8,00/dia__R$ 56,00</li>
                                    <li>7 dias__R$ 8,00/dia__R$ 56,00</li>
                                </ul>
                                <a href="alugar.php" data-toggle="modal" data-target="#myModal" class="btn text-uppercase">Alugar Mala</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 text-center">
                        <div class="card mb-5 mb-lg-0">
                            <div class="card-body">
                                <div class="card-img">
                                    <a href="quero-alugar.php"><img class="img-fluid" src="assets/images/mala2.png" alt="Mala grande de cor azul"></a>
                                </div>
                                <h2>Mala 20 litros</h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus esse obcaecati</p>
                                <hr>
                                <h3>R$10,00<span class="card-por">/ dia</span></h3>
                                <p class="card-estoque">10 em estoque</p>
                                <hr>
                                <ul class="text-price">
                                    <h4>Pacotes Promocionais</h4>
                                    <li>7 dias__R$ 8,00/dia__R$ 56,00</li>
                                    <li>7 dias__R$ 8,00/dia__R$ 56,00</li>
                                    <li>7 dias__R$ 8,00/dia__R$ 56,00</li>
                                </ul>
                                <a href="quero-alugar.php" data-toggle="modal" data-target="#myModal" class="btn text-uppercase">Alugar Mala</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 text-center">
                        <div class="card mb-5 mb-lg-0">
                            <div class="card-body">
                                <div class="card-img">
                                    <a href="quero-alugar.php"><img class="img-fluid" src="assets/images/mala3.png" alt="Mala grande de cor azul"></a>
                                </div>
                                <h2>Mala 20 litros</h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus esse obcaecati</p>
                                <hr>
                                <h3>R$10,00<span class="card-por">/ dia</span></h3>
                                <p class="card-estoque">10 em estoque</p>
                                <hr>
                                <ul class="text-price">
                                    <h4>Pacotes Promocionais</h4>
                                    <li>7 dias__R$ 8,00/dia__R$ 56,00</li>
                                    <li>7 dias__R$ 8,00/dia__R$ 56,00</li>
                                    <li>7 dias__R$ 8,00/dia__R$ 56,00</li>
                                </ul>
                                <a href="quero-alugar.php" data-toggle="modal" data-target="#myModal" class="btn text-uppercase">Alugar Mala</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 text-center">
                        <div class="card mb-5 mb-lg-0">
                            <div class="card-body">
                                <div class="card-img">
                                    <a href="quero-alugar.php"><img class="img-fluid" src="assets/images/mala4.png" alt="Mala grande de cor azul"></a>
                                </div>
                                <div>
                                    <h2>Mala 20 litros</h2>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus esse obcaecati</p>
                                    <hr>
                                    <h3>R$10,00<span class="card-por">/ dia</span></h3>
                                    <p class="card-estoque">10 em estoque</p>
                                    <hr>
                                    <ul class="text-price">
                                        <h4>Pacotes Promocionais</h4>
                                        <li>7 dias__R$ 8,00/dia__R$ 56,00</li>
                                        <li>7 dias__R$ 8,00/dia__R$ 56,00</li>
                                        <li>7 dias__R$ 8,00/dia__R$ 56,00</li>
                                    </ul>
                                    <a href="quero-alugar.php" data-toggle="modal" data-target="#myModal" class="btn text-uppercase">Alugar Mala</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ____________________ MODAL DETALHE MALA ____________________-->
        <section id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="col-xs-12 col-md-5">
                        <div id="carouselMala" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselMala" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselMala" data-slide-to="1"></li>
                                <li data-target="#carouselMala" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="assets/images/mala4.png" alt="Mala grande de cor azul">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="assets/images/mala2.png" alt="Mala grande de cor azul">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="assets/images/mala1.png" alt="Mala grande de cor azul">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="col-xs-12 col-md-7">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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