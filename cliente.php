<?

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
      Redir('/#servicos');
   }
} else {
   Redir('/#servicos');
}

?>

<html>
<? include('includes/metas.php'); ?>
<? include('includes/css.php'); ?>
</head>

<body>

   <!-- Under Nav -->
   <? include('includes/undernav.php'); ?>

   <!-- Menu Nav -->
   <? include('includes/navbar.php'); ?>

   <!-- Siba Nav -->
<? include('includes/sidenav.php'); ?>

   <div class="set-red-line"></div>
   </div>
   </div>
   <!-- WhatsApp Window -->
   <? include('includes/whatsapp-window.php'); ?>
   <!--  botão ir para topo -->
   <div class="bg-1_scalex">
      <div class="reverse-scaleX">
         <div class="row py-4">
            <div class="container">
            <span class="font-path">Home / Serviço / <span class="rebrac-red-color">Assistência Técnica</span> </span>
                  <h2 class="text-uppercase font-weight-bold pt-4" data-aos="fade-right" data-aos-duration="1500">Rebrac</h2>
                  <h3 class="text-uppercase rebrac-red-color" data-aos="fade-left" data-aos-delay="50" data-aos-duration="1000"><?= $rowServ['titulo_serv'] ?></h3>
            </div>
         </div>

         <div class="container">
            <div class="row">
               <div class="col-12 col-sm-6 col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
                  <?= $rowServ['texto_serv'] ?>
               </div>
               <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-5 pb-5">
                  <img src="<?= $config_urlCliente ?>uploads/servicos/<?= $rowServ['foto_serv'] ?>"
                   class="rounded d-block mb-3 img-fluid" id="assistImage" alt="<?= $rowServ['titulo_serv'] ?>" 
                   title="<?= $rowServ['titulo_serv'] ?>">
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="overflow-hidden bg-4 py-5">
      <div class="container">
         <div class="row py-5">
            <div class="col-12 col-md-6 text-center" data-aos="zoom-in">
               <h3 class="text-white font-weight-bold text-uppercase pb-3">Solicite um orçamento</h3>
               <form class="set-form" id="formOrcamento" name="formOrcamento" action="javascript:" method="post" onsubmit="enviaOrcamento();">
                  <div class="row">
                     <div class="col-12 ">
                        <div class="py-1">
                           <input type="hidden" name="url" value="https://www.rebrac.com.br">
                           <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome" required>
                        </div>
                        <div class="py-1">
                           <input type="email" name="email" class="form-control" id="email" placeholder="E-mail" required>
                        </div>
                        <div class="py-1">
                           <input type="text" name="telefone" class="form-control" id="telefone" placeholder="Telefone" required>
                        </div>
                        <div class="py-3 text-right">
                           <input type="hidden" name="servico" id="servico" value="<?= $rowServ['titulo_serv'] ?>">
                           <button type="submit" class="btn rebrac-red-color bg-warning py-3 px-5 font-weight-bolder" role="button" aria-pressed="true">SOLICITAR</button>
                        </div>
                     </div>
                     <div class="col-md-12" id="retorno_msg_orcamento"></div>
                  </div>
               </form>
            </div>
            <div class="modal fade" id="sucessModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title text-uppercase" id="exampleModalLongTitle">Solicitação Enviada</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     <div class="modal-body">
                        <div class="row">
                           <div class="col-2 text-center">
                              <i class="far fa-check-circle fa-2x text-success" aria-hidden="true"></i>
                           </div>
                           <div class="col-10">
                              Obrigado sua solicitação foi enviada, e está sendo análisada.
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar ao site</button>
                        <a type="button" href="https://api.whatsapp.com/send?phone=5515998320028&amp;text=Olá, Solicitei um orçamento e estou com uma dúvida." class="btn set-under-nav-wapp text-white">Dúvidas ? entre em contato <i class="fab fa-whatsapp fa-lg" aria-hidden="true"> </i></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Carousel 2 -->
   <? include('includes/carousel2.php'); ?>

   <div class="container my-5 overflow-hidden">
      <div class="row">
         <div class="col-12 col-md-6">
            <h3 class="font-weight-bold text-uppercase">Veja Mais</h3>
         </div>
         <div class="col-12 col-md-6 text-right">
            <button type="button" href="#" class="btn text-white set-bg-blue py-3 px-3 text-uppercase " role="button" aria-pressed="true">Fale conosco</a></button>
         </div>
      </div>
      <div class="row mt-4 ">
         <? if (mysql_num_rows($resMaisServ)) {
            while ($rowMaisServ = mysql_fetch_array($resMaisServ)) {
               ?>
               <div class="col-12 col-md-6 " data-aos="flip-left" data-aos-duration="1000">
                  <a href="<?= $config_urlCliente ?>servicos/<?= cleanString($rowMaisServ['titulo_serv']) ?>-<?= $rowMaisServ['id_serv'] ?>"><img src="<?= $config_urlCliente ?>uploads/servicos/<?= $rowMaisServ['thumb_serv'] ?>" class="img-fluid over" alt="<?= $rowMaisServ['titulo_serv'] ?>" title="<?= $rowMaisServ['titulo_serv'] ?>" /></a>
                  <div class="col-12">
                     <a href="<?= $config_urlCliente ?>servicos/<?= cleanString($rowMaisServ['titulo_serv']) ?>-<?= $rowMaisServ['id_serv'] ?>">
                        <h6 class="rebrac-red-color font-weight-bolder my-2 mt-5"><?= $rowMaisServ['titulo_serv'] ?></h6>
                     </a>
                     <?= substr(strip_tags($rowMaisServ['texto_serv']), 0, 270) . '...' ?>
                  </div>
               </div>
         <? }
         } ?>
      </div>
   </div>
   <? include('includes/footer.php'); ?>
   <? include('includes/js.php'); ?>
   <script>
      function validaFormOrcamento() {

         d = document.formOrcamento;

         //validar nome
         if (d.nome.value == "") {
            alert("O campo Nome deve ser preenchido!");
            d.nome.focus();
            return false;
         }


         //validar email
         if (d.email.value == "") {
            alert("O campo E-mail deve ser preenchido!");
            d.email.focus();
            return false;
         } else {
            var email = d.email.value;
            var exclude = /[^@\-\.\w]|^[_@\.\-]|[\._\-]{2}|[@\.]{2}|(@)[^@]*\1/;
            var check = /@[\w\-]+\./;
            var checkend = /\.[a-zA-Z]{2,3}$/;
            if (((email.search(exclude) != -1) || (email.search(check)) == -1) || (email.search(checkend) == -1)) {
               alert("O campo E-mail deve ser um endereço válido!");
               d.email.focus();
               return false;
            }

         }

         //validar telefone
         if (d.telefone.value == "") {
            alert("O campo Telefone deve ser preenchido!");
            d.telefone.focus();
            return false;
         }

         //validar mensagem
         if (d.mensagem.value == "") {
            alert("O campo Mensagem deve ser preenchido!");
            d.mensagem.focus();
            return false;
         }
         return true;
      }

      function enviaOrcamento() {
         form_valido = validaFormOrcamento();

         if (form_valido) {
            var formdata = new FormData($("#formOrcamento")[0]);
            var linkAjax = "./ajax.php?act=sendOrcamento";

            formdata.append('session', '<?= session_id() ?>');
            $.ajax({
               type: 'POST',
               url: linkAjax,
               data: formdata,
               processData: false,
               contentType: false,
               success: function(data) {
                  console.log(data);
                  data = $.parseJSON(data);
                  if (!data.ErroEnvio) {
                     //sendLeadTrack('Orçamento', $('#formOrcamento #email').val());
                     var msg_retorno = data.nome + ', sua mensagem foi enviada com sucesso, retornaremos em breve!';
                     $('#retorno_msg_orcamento').html('<div class="alert alert-success">' + msg_retorno + '</div>');
                     $("#formOrcamento input, #formOrcamento textarea, #formOrcamento select").val('');
                     $('#formOrcamento input[type=checkbox]').prop('checked', false);

                  } else {
                     var msg_retorno = 'Erro: ' + data.ErroEnvio;
                     $('#retorno_msg_orcamento').html('<div class="alert alert-warning">' + msg_retorno + '</div>');

                  }
               },
            });
         }

      }
   </script>
   <? include('includes/analytics.php'); ?>
</body>

</html>