<?
session_start();
include 'cms/config/config.php';
require 'cms/classes/class.conndatabase.php';
require 'cms/classes/functions.php';

if ($_SESSION['Comprador']['ID']) {
    $ResSession = mysql_query("SELECT * FROM site_tb_clientes WHERE id_cli = '" . $_SESSION['Comprador']['ID'] . "'");
    if (mysql_num_rows($ResSession)) {
        $sessionUser = mysql_fetch_array($ResSession);
        Redir('painel/');
    }
}

$referer = explode($config_urlCliente, $_SERVER['HTTP_REFERER']);
$caminhoReferer = $referer[1];
$referer = substr($referer[1], 0, 8);

if ($referer == 'checkout') {
    $expireCookie = time() + 3600;
    $_SESSION['ua-referer'] = $caminhoReferer;
}
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

    <!-- ____________________ HEADER ____________________-->
    <? include('includes/header2.php'); ?>

    <!-- ____________________ TITTLE ____________________-->
    <? include('includes/title.php'); ?>

    <section class="login-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="p-cadastro">Ainda não possui um cadastro? <a href="cadastro.php">Clique aqui para se cadastrar.</a></p>
                    <? ShowErros(); ?>
                    <form class="form-style form-panel" id="form-clients" enctype="multipart/form-data" method="post" action="processa_dados.php?act=CliLogin">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <span class="input input--chisato">
                                        <input required="" class="input__field input__field--chisato" type="text" name="email" id="email">
                                        <label class="input__label input__label--chisato">
                                            <span class="input__label-content input__label-content--chisato" data-content="EMAIL:">EMAIL:</span>
                                        </label>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <span class="input input--chisato">
                                        <input required="" class="input__field input__field--chisato" type="password" name="senha" id="senha">
                                        <label class="input__label input__label--chisato">
                                            <span class="input__label-content input__label-content--chisato" data-content="SENHA:">SENHA:</span>
                                        </label>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4 btn-align">
                                <div class="button-area">
                                    <button class="btn link-style hvr-wobble-horizontal">Entrar</button>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="link-reset-password">
                                    <a href="javascript:" class="esqueceu-senha" id="btn_esquecisenha">Esqueceu sua senha?</a>
                                </div>
                            </div>
                        </div>
                        <? if ($referer == 'checkout') { ?>
                            <input name="redirect" type="hidden" value="<?= $caminhoReferer ?>" />
                        <? } ?>
                    </form>
                    <form class="form-style form-panel" name="redefinir_senha" id="redefinir_senha" action="javascript:" method="post" onsubmit="">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <span class="input input--chisato">
                                        <input required="" class="input__field input__field--chisato" type="text" name="email" id="email">
                                        <label class="input__label input__label--chisato">
                                            <span class="input__label-content input__label-content--chisato" data-content="EMAIL CADASTRADO:">EMAIL CADASTRADO:</span>
                                        </label>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4 btn-align">
                                <div class="button-area">
                                    <button class="btn link-style hvr-wobble-horizontal" id="rec_senha_submit">Redefinir senha</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <? include('includes/footer.php'); ?>
    <? include('includes/js.php'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#btn_esquecisenha").click(function() {
                $("#redefinir_senha").slideToggle();
            });
        });

        function ChecaEmailDisp() {

            var email_check = $('#cadastro_email').val();

            if (email_check != '') {

                $.post("./ajax.php", {
                        act: 'VerificaEmailExistente',
                        email: email_check
                    },
                    function(result) {
                        //alert(result);
                        var existente = result;
                        if (existente == 'sim') {
                            $('#cadastro_email').val('');
                            alert('O e-mail ' + email_check + ' já está sendo utilizado em outra conta');
                            return false;
                        } else {
                            $('#form_cadastro').attr("action", 'cadastro');
                            $('#form_cadastro').submit();

                        }
                    });

            } else {
                alert('Digite o E-Mail');
            }

        }


        $('#rec_senha_submit').click(function() {
            var rec_senha = $('#rec_senha_email').val();
            if (rec_senha != '') {

                $.post("./ajax.php", {
                        act: 'RecSenha',
                        email: rec_senha
                    },
                    function(result) {
                        alert(result);
                        $('#rec_senha_email').val('');
                    });
            } else {
                alert('Digite seu E-Mail');
            }
        });
    </script>
    <? include('includes/analytics.php'); ?>

</body>

</html>