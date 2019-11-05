<?php
if (is_numeric($_GET['id_duv'])) {
	$id_duv = $_GET['id_duv'];
	$res = mysql_query("SELECT * FROM site_tb_duvidas WHERE id_duv = $id_duv");
	if (mysql_num_rows($res)) {
		$row = mysql_fetch_array($res);
	} else {
		Redir($config_prCliente.'duvidas');
	}
} else {
	Redir($config_prCliente.'duvidas');
}
?>
<section>

<p>Modifique os campos a seguir e pressione "SALVAR" para alterar os dados.</p>

<?php ShowErros(); ?>

<form action="action_duvidas.php?do=AlteraDuvida&id_duv=<?=$row['id_duv']?>" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label class="control-label col-sm-2" for="pergunta">Pergunta:</label>
    <div class="col-sm-10">
    <input type="text" name="pergunta" id="pergunta" class="form-control grande" value="<?=mostraChar($row['titulo_duv'])?>" /><br />
	</div>
</div>
<div class="form-group">
	<label class="control-label col-sm-2" for="resposta">Resposta:</label>
    <div class="col-sm-10">
    <textarea name="resposta" id="resposta" class="form-control grande" /><?=mostraChar($row['texto_duv'])?></textarea><br />
	</div>
</div>
<div class="form-group">
	<button type="submit" class="btn">SALVAR <i class="fa fa-check" aria-hidden="true"></i></button>
    <a href="index.php?p=duvidas" class="btn btn-gray pull-right">Voltar <i class="fa fa-chevron-left" aria-hidden="true"></i></a>
</div>

</form>
</section>