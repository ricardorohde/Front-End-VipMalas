<?
$resPages = mysql_query("SELECT * FROM site_tb_pages ORDER BY ord_page");
if (mysql_num_rows($resPages)) {
?>
<aside class="sidebar sidebar-pages">
    <div class="sidebar-holder">
        <ul class="menu-bar">
        	<? while($rowPages = mysql_fetch_array($resPages)){?>
            <li><a href="informacoes/<?=$rowPages['slug_page']?>" class="<?=(strpos($_SERVER['REQUEST_URI'], $rowPages['slug_page']))?'sidebar-active':''?>"><?=$rowPages['nome_page']?></a></li>
            <? } ?>
        </ul>
    </div>
</aside>
<? } ?>