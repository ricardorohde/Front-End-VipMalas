<?php
$resSlider = mysql_query("SELECT * FROM site_tb_banner WHERE tipo_banner = 'H' ORDER BY RAND() ");
if (mysql_num_rows($resSlider)) {
?>
<div class="home-sliders hidden-mobile">
    <div class="sliders">
    <?php /*<?php while ($rowSlider = mysql_fetch_array($resSlider)) { ?>
            <a <? if ($rowSlider['link_banner'] != "") { echo 'href="'.$rowSlider['link_banner'].'"'; } ?>>
            	<img src="uploads/destaques/<?=$rowSlider['url_banner']?>" alt="<?=$rowSlider['tit_banner']?>">
            </a>
    <?php } ?>
    </div>*/ ?>
        <?php while ($rowSlider = mysql_fetch_array($resSlider)) { ?>
        <div class="sup-banner">
            <img class="img-banner" src="assets/images/banner.png" alt="<?=$rowSlider['tit_banner']?>">
            <div class="desc-banner">
                <h1><b><?=$rowSlider['tit_banner']?></b><? if($rowSlider['subtit_banner']){echo '<br>'.$rowSlider['subtit_banner'];}?></h1>
                <p><?=$rowSlider['leg_banner']?></p>
                <? if ($rowSlider['link_banner'] != ""){?>
                    <div class="link-area">
                        <a href="<?=$rowSlider['link_banner']?>" target="_blank" class="link-style hvr-shutter-out-vertical"><?=$rowSlider['txtBtn_banner']?></a>
                    </div>
                <? } ?>
            </div>
        </div>
        <? } ?>
    </div>
</div>     
<? } ?>
