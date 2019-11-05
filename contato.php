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

    <main class="como-funciona">
        <!-- ____________________ TITTLE ____________________-->
        <? include('includes/title.php'); ?>

        <!-- ____________________ CONTATO ____________________-->
        <section id="contato">
            <div class="page fale-conosco">
                <!--Elemento de formatação-->
                <div class="container my-5">
                    <div class="row">
                        <div class="col-md-6">
                            <form class="formulario" name="formulario" id="formulario" action="javascript:" method="post" onsubmit="enviaContato();">
                                <div class="row">
                                    <div class="field form-group col-md-6">
                                        <label>Nome</label>
                                        <input required type="text" name="nome" id="nome" class="form-control" placeholder="Nome">
                                    </div>
                                    <div class="field form-group col-md-6">
                                        <label>E-mail</label>
                                        <input required type="email" name="email" id="email" class="form-control">
                                    </div>
                                    <div class="field form-group col-md-6">
                                        <label>Telefone</label>
                                        <input required type="text" name="telefone" id="telefone" onKeyPress="return txtBoxFormat(this, '(99)99999-9999', event);" maxlength="16" class="form-control">
                                    </div>
                                    <div class="field form-group col-md-6">
                                        <label>Celular</label>
                                        <input required type="text" name="celular" id="celular" onKeyPress="return txtBoxFormat(this, '(99)99999-9999', event);" maxlength="16" class="form-control">
                                    </div>
                                    <div class="field form-group col-md-8">
                                        <label>Cidade</label>
                                        <input required type="text" name="cidade" id="cidade" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <!-- 
									<input required type="text" name="cidade" id="cidade" class="form-control"> -->
                                    <label>UF</label>
                                        <select required="" class="form-control" name="estado" id="estado">
                                            <option value="" disabled="" selected=""><label>UF</label></option>
                                            <option value="AC">AC</option>
                                            <option value="AL">AL</option>
                                            <option value="AP">AP</option>
                                            <option value="AM">AM</option>
                                            <option value="BA">BA</option>
                                            <option value="CE">CE</option>
                                            <option value="DF">DF</option>
                                            <option value="ES">ES</option>
                                            <option value="GO">GO</option>
                                            <option value="MA">MA</option>
                                            <option value="MS">MS</option>
                                            <option value="MT">MT</option>
                                            <option value="MG">MG</option>
                                            <option value="PA">PA</option>
                                            <option value="PB">PB</option>
                                            <option value="PR">PR</option>
                                            <option value="PE">PE</option>
                                            <option value="PI">PI</option>
                                            <option value="RJ">RJ</option>
                                            <option value="RN">RN</option>
                                            <option value="RS">RS</option>
                                            <option value="RO">RO</option>
                                            <option value="RR">RR</option>
                                            <option value="SC">SC</option>
                                            <option value="SP">SP</option>
                                            <option value="SE">SE</option>
                                            <option value="TO">TO</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">

                                        <input required type="text" name="assunto" id="assunto" class="form-control">
                                        <label>Assunto</label>
                                    </div>

                                    <div class="form-group col-md-12 mt-1">

                                        <textarea required name="mensagem" id="mensagem" rows="4" class="form-control"></textarea>
                                        <label>Mensagem</label>
                                    </div>

                                    <div class="form-group col-md-12 text-right">
                                        <button type="submit" class="btn btn1">Enviar</button>
                                    </div>
                                </div>

                            </form>
                        </div>

                        <div class="col-md-6 text-right">
                            <div class="mapa embed-responsive embed-responsive-16by9">
                                <iframe name="mapframe" class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3659.075281590816!2d-47.45983878502353!3d-23.493797784716428!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c58aa55e545999%3A0xcd7c4afccd01ce66!2sAg%C3%AAncia+Kombi+Design!5e0!3m2!1spt-BR!2sbr!4v1487678317611" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                            <div class="bg-gray mt-3">
                                <p>
                                    Rua Comendador Hermelino Matarazzo, 204, Vila Santa Rita<br>CEP: 18080-000, Sorocaba/SP<br>
                                    <span class="fone">Tel: (15) 3033.8668</span>
                                </p>
                            </div>
                            <div class="col-md-12 text-right my-3 pr-0">
                                <button type="submit" class="btn">Traçar rota</button>
                            </div>
                        </div>

                        <div class="col-md-12" id="retorno_msg_contato"></div>
                    </div>
                </div>

            </div>
        </section>
    </main>

    <? include('includes/footer.php'); ?>
    <? include('includes/js.php'); ?>
    <? include('includes/analytics.php'); ?>

</body>

</html>