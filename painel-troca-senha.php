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
<script type="text/javascript"> 
  function validaFormSenha(){

    d = document.formCadastroSenha;
    
    if (d.senha.value == ""){
        alert("Informe a nova senha!");
        d.senha.focus();
        return false;      
    }
    
    if (d.Conf_Senha.value != d.senha.value){
        alert("Senhas digitadas não conferem!");
        d.senha.focus();
        return false;
    } 
  }
</script>

<?
##### RESTRIÇÃO DE ACESSO #####
include('authCliente.php');
###############################
?>
<? include('includes/header.php');?>
<? include('includes/whatsapp-window.php');?>

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
                    <p><a href="./">Home</a> / <b>Área do cliente - Alterar senha</b></p>
                </div>
                <? ShowErros();?>
            </div>
            <div class="col-md-3">
                <? include('includes/sidebar-painel.php');?>
            </div>
            <div class="col-md-9">
                <h2 class="title-page">Alterar senha</h2>
                <form class="form-style form-panel" name="formCadastroSenha" id="formCadastroSenha" action="processa_dados.php?act=AlteraSenha" enctype="multipart/form-data" method="post" onsubmit="return validaFormSenha();">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <span class="input input--chisato">
                                    <input required="" class="input__field input__field--chisato" type="password" name="novasenha" id="novasenha">
                                    <label class="input__label input__label--chisato">
                                        <span class="input__label-content input__label-content--chisato" data-content="NOVA SENHA:">NOVA SENHA:</span>
                                    </label>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <span class="input input--chisato">
                                    <input required="" class="input__field input__field--chisato" type="password" name="comfirmacaonovasenha" id="comfirmacaonovasenha">
                                    <label class="input__label input__label--chisato">
                                        <span class="input__label-content input__label-content--chisato" data-content="CONFIRME SUA NOVA SENHA:">CONFIRME SUA NOVA SENHA:</span>
                                    </label>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="button-area">
                                <button class="btn link-style hvr-wobble-horizontal">Atualizar senha</button>
                            </div>
                        </div>
                    </div>
                </form>
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
