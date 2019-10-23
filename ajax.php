<?php
if($_POST['session']!=''){
    session_id($_POST['session']);
}
session_start();

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-type: text/html; charset=utf-8');

include 'cms/config/config.php';
require 'cms/classes/class.conndatabase.php';
require 'cms/classes/functions.php';
require 'cms/classes/phpmailer/class.phpmailer.php';

$num_ip= $_SERVER['REMOTE_ADDR'];
$date_time= date("Y-m-d H:i:s");
$act = $_REQUEST['act'];
$session = $_REQUEST['session'];
$stamp = time();
$arrRetorno = array();
switch ($act) {
    // ===============================================================
    case 'sendContato':
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $celular = $_POST['celular'];
            $cnpj = $_POST['cnpj'];
            $assunto = $_POST['assunto'];
            $mensagem = $_POST['mensagem'];

            if($arrRetorno['ErroEnvio']==''){
                $body = '
                    <p>Olá '.$config_nomeCliente.', segue abaixo a mensagem recebida através do site:</p>
                    <p>
                      <b>Nome: </b>'.$nome.'<br>
                      <b>E-mail: </b>'.$email.'<br>
                      <b>Telefone: </b>'.$telefone.'<br>
                      <b>Celular: </b>'.$celular.'<br>
                      <b>CNPJ: </b>'.$cnpj.'<br>
                      <b>Assunto: </b>'.$assunto.'<br>
                    </p>
                    
                    <p style="text-align: center">
                      Mensagem recebida:<br>'.$mensagem.'
                    </p>
                    ';
                $body = TemaCorpoEmail('CONTATO RECEBIDO PELO SITE', $body);

                $destinatario = $config_emailCliente;

                $mail = new PHPMailer();
                if($configSMTP_host!='' && $configSMTP_usuario !='' && $configSMTP_senha!=''){
                    $mail->IsSMTP();
                    $mail->Host = $configSMTP_host;
                    $mail->Username = $configSMTP_usuario;
                    $mail->Password = $configSMTP_senha;
                    $mail->SMTPAuth = true;
                    $mail->Port = 587;
                    $mail->Sender = $configSMTP_usuario; // Seu e-mail
                } else {
                    $mail->SMTPAuth = false;
                }
                $mail->CharSet = 'utf-8';
                $mail->From = $configSMTP_usuario; // Seu e-mail
                $mail->FromName = $nome; // Seu nome
                $mail->AddReplyTo($email);
                $mail->AddAddress($destinatario);

                $mail->IsHTML(true); // Define que o e-mail será enviado como HTML
                $mail->Subject  = 'Mensagem recebida - Site '.$config_nomeCliente; // Assunto da mensagem
                $mail->Body = $body;

                $enviado = $mail->Send();

                // Limpa os destinatários e os anexos
                $mail->ClearAllRecipients();
                $mail->ClearAttachments();

                if($enviado){
                    GravaMailing($email, $nome, $telefone, '',  'Contato', $assunto, 'Celular: '.$celular.' CNPJ: '.$cnpj);
                    $arrRetorno['nome'] = $nome;
                } else {
                    $arrRetorno['ErroEnvio'] = 'Houve um erro durante o envio ( Erro: '. $mail->ErrorInfo.')';
                }
            }
            echo json_encode($arrRetorno);
        break;
    // ===============================================================
}
?>