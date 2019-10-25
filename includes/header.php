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
<header>

  <nav id="menu" class="navbar navbar-expand-sm navbar-light fixed-top bg-light expand">
    <div class="container">
      <a class="navbar-brand" href="#"> <img src="assets/images/logo.png" alt="Logo - Vip Malas"></a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse pt-5" id="navbarCollapse">

        <ul class="navbar-nav mx-auto justify-content-center">
          <li class="nav-item active">
            <a class="nav-link" href="como-funciona.php">Como funciona?</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link nav-m2" href="regiao.php">Vip malas</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link nav-m2" href="blog.php">Dúvidas</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link mr-0" href="contato.php">Contato</a>
          </li>
        </ul>

        <a class="link-cliente" href="cliente.php">
          <img class="btn-icone mr-1" src="assets/images/icon-lock.png" alt="icon-chave"><span>Acessar área do cliente</span>
        </a>

        <a href="alugar.php" class="btn btn_alugar">
          <img class="btn-icone mr-2" src="assets/images/icon-mala.png" alt="icon-chave"><span>Quero alugar</span>
        </a>

        <a href="carrinho.php" class="btn btn_carrinho md-ml-3">
          <img class="icon-carrinho" src="assets/images/icon-carrinho.png" alt="icon carrinho de compras">
        </a>

        <a href="cliente.php" class="btn btn_cliente">
          <img class="icon-cliente" src="assets/images/icon-lock.png" alt="icon carrinho de compras">
        </a>

      </div>
    </div>
  </nav>
</header>