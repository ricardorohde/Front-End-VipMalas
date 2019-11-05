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
    <? include('includes/header2.php'); ?>
    <script type="text/javascript">
        function validaCPF(cpf) {
            cpf = cpf.replace(/[^\d]+/g, '');
            if (cpf == '') return false;
            // Elimina CPFs invalidos conhecidos  
            if (cpf.length != 11 ||
                cpf == "00000000000" ||
                cpf == "11111111111" ||
                cpf == "22222222222" ||
                cpf == "33333333333" ||
                cpf == "44444444444" ||
                cpf == "55555555555" ||
                cpf == "66666666666" ||
                cpf == "77777777777" ||
                cpf == "88888888888" ||
                cpf == "99999999999")
                return false;
            // Valida 1o digito 
            add = 0;
            for (i = 0; i < 9; i++)
                add += parseInt(cpf.charAt(i)) * (10 - i);
            rev = 11 - (add % 11);
            if (rev == 10 || rev == 11)
                rev = 0;
            if (rev != parseInt(cpf.charAt(9)))
                return false;
            // Valida 2o digito 
            add = 0;
            for (i = 0; i < 10; i++)
                add += parseInt(cpf.charAt(i)) * (11 - i);
            rev = 11 - (add % 11);
            if (rev == 10 || rev == 11)
                rev = 0;
            if (rev != parseInt(cpf.charAt(10)))
                return false;
            return true;
        }

        function validaFormCadastro() {

            d = document.formCadastro;

            //validar nome
            if (d.nome.value == "") {
                alert("O campo NOME deve ser preenchido!");
                d.nome.focus();
                return false;
            } else {
                var str = d.nome.value;
                var count = str.trim().split(/[\s\.,;]+/).length;
                if (count < 2) {
                    alert("Preencha seu NOME COMPLETO!");
                    d.nome.focus();
                    return false;
                }
            }

            //validar email
            if (d.email.value == "") {
                alert("O campo E-MAIL deve ser preenchido!");
                d.email.focus();
                return false;
            } else {
                var email = d.email.value;
                var exclude = /[^@\-\.\w]|^[_@\.\-]|[\._\-]{2}|[@\.]{2}|(@)[^@]*\1/;
                var check = /@[\w\-]+\./;
                var checkend = /\.[a-zA-Z]{2,3}$/;
                if (((email.search(exclude) != -1) || (email.search(check)) == -1) || (email.search(checkend) == -1)) {
                    alert("O campo E-MAIL deve ser um endereço válido!");
                    d.email.focus();
                    return false;
                }

            }

            //validar cpf
            if (!validaCPF(d.cpf.value)) {
                alert('O campo CPF deve ser preenchido corretamente!');
                d.cpf.focus();
                return false;
            }

            //validar datanascimento
            if (d.datanascimento.value.length < 10) {
                alert("O campo DATA DE NASCIMENTO deve ser preenchido corretamente!");
                d.datanascimento.focus();
                return false;
            }

            //validar telefone
            if (d.telefone.value.length < 14) {
                alert("O campo TELEFONE deve ser preenchido corretamente!");
                d.telefone.focus();
                return false;
            }

            //validar celular
            if (d.celular.value.length < 15) {
                alert("O campo CELULAR deve ser preenchido corretamente!");
                d.celular.focus();
                return false;
            }

        }
    </script>
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
                        <p><a href="./">Home</a> / <b>Área do cliente - Editar dados</b></p>
                    </div>
                    <? ShowErros(); ?>
                </div>
                <div class="col-md-3">
                    <? include('includes/sidebar-painel.php'); ?>
                </div>
                <div class="col-md-9">
                    <h2 class="title-page">Editar dados</h2>
                    <form class="form-style form-panel" name="formCadastro" id="formCadastro" action="processa_dados.php?act=AlteraDados" enctype="multipart/form-data" method="post" onsubmit="return validaFormCadastro();">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <span class="input input--chisato">
                                        <input required="" class="input__field input__field--chisato" type="text" name="nome" id="nome" value="<?= $authRow['nome_cli'] ?>">
                                        <label class="input__label input__label--chisato">
                                            <span class="input__label-content input__label-content--chisato" data-content="NOME:">NOME:</span>
                                        </label>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <span class="input input--chisato">
                                        <input required="" class="input__field input__field--chisato" type="text" name="email" id="email" value="<?= $authRow['email_cli'] ?>">
                                        <label class="input__label input__label--chisato">
                                            <span class="input__label-content input__label-content--chisato" data-content="EMAIL:">EMAIL:</span>
                                        </label>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <span class="input input--chisato">
                                        <input required="" class="input__field input__field--chisato mask_cpf" type="text" name="cpf" id="cpf" value="<?= $authRow['cpf_cli'] ?>">
                                        <label class="input__label input__label--chisato">
                                            <span class="input__label-content input__label-content--chisato" data-content="CPF:">CPF:</span>
                                        </label>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <span class="input input--chisato">
                                        <input required="" class="input__field input__field--chisato mask_date" type="text" name="datanascimento" id="datanascimento" value="<?= mostraData($authRow['nascimento_cli']) ?>">
                                        <label class="input__label input__label--chisato">
                                            <span class="input__label-content input__label-content--chisato" data-content="DATA DE NASCIMENTO:">DATA DE NASCIMENTO:</span>
                                        </label>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <span class="input input--chisato">
                                        <input required="" class="input__field input__field--chisato mask_phone" type="text" name="telefone" id="telefone" value="<?= $authRow['tel_cli'] ?>">
                                        <label class="input__label input__label--chisato">
                                            <span class="input__label-content input__label-content--chisato" data-content="TELEFONE:">TELEFONE:</span>
                                        </label>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <span class="input input--chisato">
                                        <input required="" class="input__field input__field--chisato mask_phone" type="text" name="celular" id="celular" value="<?= $authRow['cel_cli'] ?>">
                                        <label class="input__label input__label--chisato">
                                            <span class="input__label-content input__label-content--chisato" data-content="CELULAR:">CELULAR:</span>
                                        </label>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="button-area">
                                    <button class="btn link-style hvr-wobble-horizontal">Atualizar dados</button>
                                </div>
                            </div>
                        </div>
                    </form>
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