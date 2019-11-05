<?
if (isset($_SESSION['Comprador'])) {

	$sessionComprador_id = $_SESSION['Comprador']['ID'];
	$sessionComprador_nome = $_SESSION['Comprador']['Nome']; 
	$sessionComprador_email = $_SESSION['Comprador']['Email'];
//echo "SELECT * FROM site_tb_clientes WHERE email_cli = '".$sessionComprador_email."' AND id_cli = '".$sessionComprador_id."'";
	$authComprador_res = mysql_query("SELECT * FROM site_tb_clientes WHERE email_cli = '".$sessionComprador_email."' AND id_cli = '".$sessionComprador_id."'")or die(mysql_error());
	if(mysql_num_rows($authComprador_res)){
		$authRow = mysql_fetch_array($authComprador_res);
		$auth = true;

		$auth_EndPrincipal = mysql_query("SELECT * FROM site_tb_clientes_enderecos WHERE ref_cli = '".$authRow['id_cli']."' AND tipo_end = 'principal'");
		$authRow_EndPrincipal = mysql_fetch_array($auth_EndPrincipal);

		$auth_EndAlternativo = mysql_query("SELECT * FROM site_tb_clientes_enderecos WHERE ref_cli = '".$authRow['id_cli']."' AND tipo_end = 'alternativo' AND rua_end <> '' ");
		$authRow_EndAlternativo = mysql_fetch_array($auth_EndAlternativo);
	} else {
		Redir('login');
		exit;
	}
} else {Redir('login');} 
?>