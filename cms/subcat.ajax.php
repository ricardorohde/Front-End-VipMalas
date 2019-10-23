<?
header( 'Cache-Control: no-cache' );
include 'config/config.php';
require 'classes/class.conndatabase.php';

$ref_cat = mysql_real_escape_string( $_GET['ref_cat'] );

$retornoAJAX = array();

$sqlAJAX = "SELECT id_subcat, nome_subcat FROM site_tb_subcategorias WHERE ref_cat= '".$ref_cat."' ORDER BY nome_subcat ASC";

$resAJAX = mysql_query( $sqlAJAX );
while ( $rowAJAX = mysql_fetch_assoc( $resAJAX ) ) {
	$retornoAJAX[] = array(
		'id_subcat'		=> $rowAJAX['id_subcat'],
		'nome_subcat'	=> $rowAJAX['nome_subcat'],
	);
}

echo( json_encode( $retornoAJAX ) );

?>