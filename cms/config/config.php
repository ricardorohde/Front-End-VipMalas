<?php 
	function is_localhost() {
		$whitelist = array( "127.0.0.1", "::1" );
		return in_array( $_SERVER["REMOTE_ADDR"], $whitelist);
	}
	
	if(is_localhost()){
		$config_hostBD 			= "localhost"; //host de conexao com BD
		$config_nomeBD 			= "aprovajob_roubex"; //banco de dados de conexao com BD
		$config_userBD 			= "root"; //usuario de conexao com BD
		$config_senhaBD			= ""; //senha de conexao com BD
		$config_urlCliente 		= "http://localhost/padrao/"; //URL Do site
	} else {
		$config_hostBD 			= "localhost"; //host de conexao com BD
		$config_nomeBD 			= "aprovajob_roubex"; //banco de dados de conexao com BD
		$config_userBD 			= "aprovajob_roubex"; //usuario de conexao com BD
		$config_senhaBD			= "kombidesign19"; //senha de conexao com BD
		$config_urlCliente 		= "https://www.aprovajob.com/padrao/"; //URL Do site
	}
	
	
	
	$config_nomeCliente 	= "Roubex"; //nome do cliente
	$config_corCliente 		= "FF6634"; //cor tema (hex) do cliente
	$config_pastaCmsCliente = "cms";
	$config_urlCmsCliente	= $config_urlCliente.$config_pastaCmsCliente."/";
	$config_prCliente		= $config_urlCmsCliente.'index.php?p='; // URL Painel Root

	$config_BannerHomeW		= "1366";
	$config_BannerHomeH		= "408";

	$configSMTP_host 		= "mail.aprovajob.com"; //host do SMTP para envio de e-mail
	$configSMTP_usuario 	= "noreply@aprovajob.com"; //usuario do SMTP para envio de e-mail
	$configSMTP_senha 		= "NlIp6ZgvnmkZ"; //senha do SMTP para envio de e-mail
	
?>