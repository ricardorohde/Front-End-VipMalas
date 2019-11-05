<span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
<? if($Header_Endereco){?><meta itemprop="streetAddress" content="<?=$Header_Endereco?>"><? } ?>
<? if($Header_Cidade){?><meta itemprop="addressLocality" content="<?=$Header_Cidade?>"><? } ?>
<? if($Header_UF){?><meta itemprop="addressRegion" content="<?=$Header_UF?>"><? } ?>
<? if($Header_Pais){?><meta itemprop="addressCountry" content="<?=$Header_Pais?>"><? } ?></span>
<? if($Header_NomeEmpresa){?><meta itemprop="name" content="<?=$Header_NomeEmpresa?>"><? } ?>
<? if($Header_Site){?><meta itemprop="url" content="<?=$Header_Site?>"><? } ?>
<? if($Header_Telefone){?><meta itemprop="telephone" content="<?=$Header_Telefone?>"><? } ?>
<? if($Header_Email){?><meta itemprop="email" content="<?=$Header_Email?>"><? } ?>

<!-- ____________________ NAVBAR ____________________-->
<header class="navbar2">

  <nav id="menu" class="navbar navbar-expand-sm navbar-light fixed-top bg-light expand">
    <div class="container">
      <a class="navbar-brand" href="#"> <img src="assets/images/logo2.png" alt="Logo - Vip Malas"></a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span> 
      </button>
    </div>
  </nav>
</header>