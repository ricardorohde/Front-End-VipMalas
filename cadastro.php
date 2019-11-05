<?/*

session_start();
include 'cms/config/config.php';
require 'cms/classes/class.conndatabase.php';
require 'cms/classes/functions.php';

if (is_numeric($_GET['ref'])) {
   $resServ = mysql_query("SELECT * FROM site_tb_servicos WHERE id_serv = '" . $_GET['ref'] . "' ");
   if (mysql_num_rows($resServ)) {
      $rowServ = mysql_fetch_array($resServ);

      $resFotos = mysql_query("SELECT * FROM site_tb_servicos_fotos WHERE ref = '" . $rowServ['id_serv'] . "' ORDER BY id_foto DESC");

      $resMaisServ = mysql_query("SELECT * FROM site_tb_servicos WHERE id_serv <> '" . $rowServ['id_serv'] . "'  ORDER BY titulo_serv ASC LIMIT 2 ");

      $count_hit = $rowServ['hit_serv'];
      $count_hit = $count_hit + 1;
      mysql_query("UPDATE site_tb_servicos SET hit_serv='" . $count_hit . "' WHERE id_serv = '" . $rowServ['id_serv'] . "'");
   } else {
      Redir('/#cliente');
   }
} else {
   Redir('/#cliente');
}

*/ ?>
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
<html class="no-js" lang="pt-br" itemscope itemtype="http://schema.org/WebPage">
<!--<![endif]-->
<? include('includes/metas.php'); ?>
<? include('includes/css.php'); ?>
</head>

<body>
   <!-- ____________________ HEADER ____________________-->
   <? include('includes/header2.php'); ?>

   <main class="cadastro">
      
      <!-- ____________________ TITTLE ____________________-->
      <? include('includes/title.php'); ?>

      <? include('includes/whatsapp-window.php'); ?>

      <section class="top-page">
            <div class="row">
               <div class="col-md-12 text-center">
                  <h2>Novo cadastro</h2>
               </div>
            </div>
      </section>

      <section class="cadastro-page">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <form class="form-style form-panel" name="formCadastro" id="formCadastro" action="processa_dados.php?act=NovoCadastro" enctype="multipart/form-data" method="post" onsubmit="return validaFormCadastro();">
                     <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                              <span class="input input--chisato">
                                 <input required="" class="input__field input__field--chisato" type="text" name="nome" id="nome">
                                 <label class="input__label input__label--chisato">
                                    <span class="input__label-content input__label-content--chisato" data-content="NOME:">NOME:</span>
                                 </label>
                              </span>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <span class="input input--chisato">
                                 <input required="" class="input__field input__field--chisato" type="text" name="email" id="email">
                                 <label class="input__label input__label--chisato">
                                    <span class="input__label-content input__label-content--chisato" data-content="EMAIL:">EMAIL:</span>
                                 </label>
                              </span>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="form-group">
                              <span class="input input--chisato">
                                 <input required="" class="input__field input__field--chisato mask_cpf" type="text" name="cpf" id="cpf">
                                 <label class="input__label input__label--chisato">
                                    <span class="input__label-content input__label-content--chisato" data-content="CPF:">CPF:</span>
                                 </label>
                              </span>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <span class="input input--chisato">
                                 <input required="" class="input__field input__field--chisato mask_date" type="text" name="datanascimento" id="datanascimento">
                                 <label class="input__label input__label--chisato">
                                    <span class="input__label-content input__label-content--chisato" data-content="DATA DE NASCIMENTO:">DATA DE NASCIMENTO:</span>
                                 </label>
                              </span>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <span class="input input--chisato">
                                 <input required="" class="input__field input__field--chisato mask_phone" type="text" name="telefone" id="telefone">
                                 <label class="input__label input__label--chisato">
                                    <span class="input__label-content input__label-content--chisato" data-content="TELEFONE:">TELEFONE:</span>
                                 </label>
                              </span>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <span class="input input--chisato">
                                 <input required="" class="input__field input__field--chisato mask_phone" type="text" name="celular" id="celular">
                                 <label class="input__label input__label--chisato">
                                    <span class="input__label-content input__label-content--chisato" data-content="CELULAR:">CELULAR:</span>
                                 </label>
                              </span>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <span class="input input--chisato">
                                 <input required="" class="input__field input__field--chisato" type="password" name="senha" id="senha">
                                 <label class="input__label input__label--chisato">
                                    <span class="input__label-content input__label-content--chisato" data-content="SENHA:">SENHA:</span>
                                 </label>
                              </span>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <span class="input input--chisato">
                                 <input required="" class="input__field input__field--chisato" type="password" name="confirmacaosenha" id="confirmacaosenha">
                                 <label class="input__label input__label--chisato">
                                    <span class="input__label-content input__label-content--chisato" data-content="REPITA A SENHA:">REPITA A SENHA:</span>
                                 </label>
                              </span>
                           </div>
                        </div>
                        <div class="col-md-4 button-align mt-3">
                           <div class="button-area">
                              <button class="btn link-style hvr-wobble-horizontal">Finalizar cadastro</button>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </section>

      <script type="text/javascript" language="javascript">
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

            if (d.senha.value == "") {
               alert("O campo SENHA deve ser preenchido!");
               d.senha.focus();
               return false;
            }

            //validar mensagem
            if (d.confirmacaosenha.value != d.senha.value) {
               alert("Senhas digitadas não conferem!");
               d.senha.focus();
               return false;
            }

         }

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
      </script>

      <? include('includes/footer.php'); ?>
      <? include('includes/js.php'); ?>
      <? include('includes/analytics.php'); ?>

</body>

</html>