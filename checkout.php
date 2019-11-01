<?php
session_start();
include 'cms/config/config.php';
require 'cms/classes/class.conndatabase.php';
require 'cms/classes/functions.php';

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="pt-br" itemscope="" itemtype="http://schema.org/WebPage">
<!--<![endif]-->

<head>
    <? include('includes/metas.php'); ?>
    <? include('includes/css.php'); ?>
</head>

<body>
    <? include('includes/header2.php'); ?>

    <main class="checkout">
        <? include('includes/title.php'); ?>

        <?/*
##### RESTRIÇÃO DE ACESSO #####
include('authCliente.php');
###############################
$resEnd = mysql_query("SELECT cep_ped, end_ped, num_ped, compl_ped, bairro_ped, cidade_ped, uf_ped FROM site_tb_pedidos WHERE ref_cli = '".$authRow['id_cli']."' AND processado_ped = 's' ORDER BY data_ped DESC LIMIT 1");
$rowEnd = mysql_fetch_array($resEnd);
?>
<? include('includes/header-checkout.php');?>
<? include('includes/whatsapp-window.php');?>

<? /*       INPUTS      */ ?>
        <?/* INPUT TEMP PARA CALCULAR O FRETE */ ?>
        <!-- <input name="tempRetirar" type="hidden" id="temporarioRetirar" />
<input name="tempFrete" type="hidden" id="temporarioFrete" />
<input name="tempRetirar" type="hidden" id="temporarioRetirar" /> -->
        <? /* INPUT TEMP PARA CALCULAR O FRETE */ ?>
        <? /*       INPUTS      */ ?>
        <section class="checkout-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <form name="formInfoPedido" id="formInfoPedido" class="form form-style" action="javascript:" enctype="multipart/form-data" method="post">
                            <h2>DADOS DO COMPRADOR:</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NOME:</label>
                                        <input required="" class="form-control" type="text" name="nome" id="nome" value="<?= $authRow['nome_cli'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>TELEFONE:</label>
                                        <input required="" class="form-control mask_phone" type="text" name="telefone" id="telefone" value="<?= $authRow['tel_cli'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>RG:</label>
                                        <input required="" class="form-control" type="text" name="rg" id="rg" value="<?= $authRow['rg_cli'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>CPF:</label>
                                        <input required="" class="form-control mask_cpf" type="text" name="cpf" id="cpf" value="<?= $authRow['cpf_cli'] ?>">
                                    </div>
                                </div>
                            </div>

                            <h3>ENDEREÇO DE CADASTRO</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>CEP:</label>
                                        <input required="" class="form-control mask_cep" type="text" name="cep" id="cep" value="<?= $rowEnd['cep_ped'] ?>" onblur="getEndereco(this.value); AtualizaFrete(this);">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>ENDEREÇO:</label>
                                        <input required="" class="form-control" type="text" name="endereco" id="endereco" value="<?= $rowEnd['end_ped'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NÚMERO:</label>
                                        <input required="" class="form-control" type="text" name="numero" id="numero" value="<?= $rowEnd['num_ped'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>COMPLEMENTO:</label>
                                        <input class="form-control" type="text" name="complemento" id="complemento" value="<?= $rowEnd['compl_ped'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>BAIRRO:</label>
                                        <input required="" class="form-control" type="text" name="bairro" id="bairro" value="<?= $rowEnd['bairro_ped'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>CIDADE:</label>
                                        <input required="" class="form-control" type="text" name="cidade" id="cidade" value="<? if ($rowEnd['cidade_ped']) {
                                                                                                                                    echo $rowEnd['cidade_ped'];
                                                                                                                                } else {
                                                                                                                                    echo $authRow['cidade_cli'];
                                                                                                                                } ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ESTADO:</label>
                                        <? if ($rowEnd['uf_ped']) {
                                            $currUF = $rowEnd['uf_ped'];
                                        } else {
                                            $currUF = $authRow['uf_cli'];
                                        } ?>
                                        <select required="" name="estado" id="estado" class="form-control">
                                            <option value="">selecione...</option>
                                            <option value="AC" <? if ($currUF == 'AC') {
                                                                    echo 'selected="selected"';
                                                                } ?>>Acre</option>
                                            <option value="AL" <? if ($currUF == 'AL') {
                                                                    echo 'selected="selected"';
                                                                } ?>>Alagoas</option>
                                            <option value="AM" <? if ($currUF == 'AM') {
                                                                    echo 'selected="selected"';
                                                                } ?>>Amazonas</option>
                                            <option value="AP" <? if ($currUF == 'AP') {
                                                                    echo 'selected="selected"';
                                                                } ?>>Amapá</option>
                                            <option value="BA" <? if ($currUF == 'BA') {
                                                                    echo 'selected="selected"';
                                                                } ?>>Bahia</option>
                                            <option value="CE" <? if ($currUF == 'CE') {
                                                                    echo 'selected="selected"';
                                                                } ?>>Ceará</option>
                                            <option value="DF" <? if ($currUF == 'DF') {
                                                                    echo 'selected="selected"';
                                                                } ?>>Distrito Federal</option>
                                            <option value="ES" <? if ($currUF == 'ES') {
                                                                    echo 'selected="selected"';
                                                                } ?>>Espírito Santo</option>
                                            <option value="GO" <? if ($currUF == 'GO') {
                                                                    echo 'selected="selected"';
                                                                } ?>>Goiás</option>
                                            <option value="MA" <? if ($currUF == 'MA') {
                                                                    echo 'selected="selected"';
                                                                } ?>>Maranhão</option>
                                            <option value="MT" <? if ($currUF == 'MT') {
                                                                    echo 'selected="selected"';
                                                                } ?>>Mato Grosso</option>
                                            <option value="MS" <? if ($currUF == 'MS') {
                                                                    echo 'selected="selected"';
                                                                } ?>>Mato Grosso do Sul</option>
                                            <option value="MG" <? if ($currUF == 'MG') {
                                                                    echo 'selected="selected"';
                                                                } ?>>Minas Gerais</option>
                                            <option value="PA" <? if ($currUF == 'PA') {
                                                                    echo 'selected="selected"';
                                                                } ?>>Pará</option>
                                            <option value="PB" <? if ($currUF == 'PB') {
                                                                    echo 'selected="selected"';
                                                                } ?>>Paraíba</option>
                                            <option value="PR" <? if ($currUF == 'PR') {
                                                                    echo 'selected="selected"';
                                                                } ?>>Paraná</option>
                                            <option value="PE" <? if ($currUF == 'PE') {
                                                                    echo 'selected="selected"';
                                                                } ?>>Pernambuco</option>
                                            <option value="PI" <? if ($currUF == 'PI') {
                                                                    echo 'selected="selected"';
                                                                } ?>>Piauí</option>
                                            <option value="RJ" <? if ($currUF == 'RJ') {
                                                                    echo 'selected="selected"';
                                                                } ?>>Rio de Janeiro</option>
                                            <option value="RN" <? if ($currUF == 'RN') {
                                                                    echo 'selected="selected"';
                                                                } ?>>Rio Grande do Norte</option>
                                            <option value="RO" <? if ($currUF == 'RO') {
                                                                    echo 'selected="selected"';
                                                                } ?>>Rondônia</option>
                                            <option value="RS" <? if ($currUF == 'RS') {
                                                                    echo 'selected="selected"';
                                                                } ?>>Rio Grande do Sul</option>
                                            <option value="RR" <? if ($currUF == 'RR') {
                                                                    echo 'selected="selected"';
                                                                } ?>>Roraima</option>
                                            <option value="SC" <? if ($currUF == 'SC') {
                                                                    echo 'selected="selected"';
                                                                } ?>>Santa Catarina</option>
                                            <option value="SE" <? if ($currUF == 'SE') {
                                                                    echo 'selected="selected"';
                                                                } ?>>Sergipe</option>
                                            <option value="SP" <? if ($currUF == 'SP') {
                                                                    echo 'selected="selected"';
                                                                } ?>>São Paulo</option>
                                            <option value="TO" <? if ($currUF == 'TO') {
                                                                    echo 'selected="selected"';
                                                                } ?>>Tocantins</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="radio-selection">
                                <h4>Selecione um modo de envio</h4>
                                <div id="entregaFrete"><input name="SelFrete" disabled type="radio" value="Frete" onclick="SelecionaFrete('Frete');" /><label for="Frete">Frete <span id="prazoFrete"></span> <span id="valorFrete"></span></label></div>
                                <div id="entregaRetirar"><input name="SelFrete" disabled type="radio" value="Retirar" onclick="SelecionaFrete('Retirar');" /><label for="Retirar">Retirar <span id="prazoRetirar"></span> <span id="valorRetirar"></span></label></div>
                            </div>


                            <input type="hidden" id="NomeFreteEscolhido" name="NomeFreteEscolhido" value="" />
                            <input type="hidden" id="ValFreteEscolhido" name="ValFreteEscolhido" value="0" />
                            <input type="hidden" id="ValTotalPedido" name="ValTotalPedido" value="<?= number_format($soma_carrinho, 2, '.', ''); ?>" />
                            <input type="hidden" id="ValDescontoCupom" name="ValDescontoCupom" value="" />
                            <input type="hidden" id="CodCupom" name="CodCupom" value="" />
                            <input name="local" type="hidden" value="payment" />
                            <input type="hidden" id="ValTotalPedidoSemFrete" name="ValTotalPedidoSemFrete" value="<?= getCartValTotal() ?>" />
                            <input name="postSession" type="hidden" id="postSession" value="<?= session_id() ?>" />
                        </form>
                    </div>
                    <div class="col-md-7">
                        <div class="cart-holder">
                            <div class="cart">
                                <div class="cart-header hidden-mobile">
                                    <div class="item-image"></div>
                                    <div class="item-prod">Produto</div>
                                    <div class="item-qtd">Quantidade</div>
                                    <div class="item-value">Valor</div>
                                </div>
                                <?php
                                $soma_carrinho = 0;
                                $peso_total = 0;
                                $qtd_total = 0;

                                while ($rowCartProd = mysql_fetch_array($resCartProd)) {

                                    $qtd_total += $rowCartProd['qtd'];
                                    $soma_carrinho += ($rowCartProd['preco'] * $rowCartProd['qtd']);


                                    $resInfoProd = mysql_query("SELECT * FROM site_tb_produtos WHERE id_prod = '" . $rowCartProd['id_prod'] . "'");
                                    $rowInfoProd = mysql_fetch_array($resInfoProd);

                                    $infoCat = mysql_fetch_array(mysql_query("SELECT nome_cat FROM site_tb_categorias WHERE id_cat = '" . $rowInfoProd['ref_cat'] . "'"));

                                    $resInfoProdTam = mysql_query("SELECT * FROM site_tb_produtos_tamanho WHERE id_tam = '" . $rowCartProd['ref_tam'] . "'");
                                    $rowInfoProdTam = mysql_fetch_array($resInfoProdTam);

                                    if ($rowInfoProd['peso_prod'] != 0 && $rowInfoProd['frete_gratis'] != 's') {
                                        $peso_total = $peso_total + ($rowInfoProd['peso_prod'] * $rowCartProd['qtd']);
                                    }

                                    // Variáveis
                                    $NomeItem = $rowInfoProd['nome_prod'];
                                    if ($rowInfoProd['thumb_prod'] != '') {
                                        $ThumbItem =  'uploads/produtos/thumb_' . $rowInfoProd['thumb_prod'];
                                    } else {
                                        $ThumbItem =  'assets/images/sem-foto.jpg';
                                    }
                                    if ($rowCartProd['ref_tam']) {
                                        $ModeloItem = 'Tamanho ' . $rowCartProd['ref_tam'] . ' - ';
                                    }
                                    if ($rowInfoProd['referencia_prod'] != '') {
                                        $ReferenciaItem = $rowInfoProd['referencia_prod'];
                                    } else {
                                        $ReferenciaItem = str_pad($rowInfoProd['id_prod'], 4, "0", STR_PAD_LEFT);
                                    }
                                    ?>
                                    <div class="cart-row">
                                        <div class="item-image">
                                            <div class="product-img">
                                                <img src="assets/images/prato1.png" alt="Nome do prato">
                                            </div>
                                        </div>
                                        <div class="item-prod">
                                            <p>
                                                <b><?= $NomeItem ?></b><?= $ModeloItem ?><br>
                                                Codígo de referência: <?= $ReferenciaItem ?>
                                            </p>
                                        </div>
                                        <div class="item-qtd">
                                            <span><?= $rowCartProd['qtd'] ?></span>
                                        </div>
                                        <div class="item-value">
                                            <h3><?= 'R$ ' . Moeda($rowCartProd['preco'] * $rowCartProd['qtd']) ?></h3>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="discount">
                            <div class="row">
                                <div class="col-md-8">
                                    <form class="form-style">
                                        <div class="form-group">
                                            <span class="input input--chisato">
                                                <input required="" class="input__field input__field--chisato" type="text" name="cupom" id="cupom">
                                                <label class="input__label input__label--chisato">
                                                    <span class="input__label-content input__label-content--chisato" data-content="CÓDIGO DE DESCONTO:">CÓDIGO DE DESCONTO:</span>
                                                </label>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-4">
                                    <div class="links-group">
                                        <a href="javascript:" id="ConsultaCod" onclick="ConsultaCupom($('#TxtCupom').val());" class="bg-green hvr-wobble-vertical link-aplicar-cupom">Aplicar cupom</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="final-values">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <div class="value">
                                        <p>Valor dos Produtos: <b>R$ <?= Moeda($soma_carrinho) ?></b></p>
                                    </div>
                                    <div class="value promo" id="ResultCupomDesconto" style="display:none">
                                        <p class="cupom-levelight">Cupom de desconto <span id="SpanPorcentoDesconto"></span>%: <b>R$ <span id="SpanValorDesconto"></span></b></p>
                                    </div>
                                    <input type="hidden" id="peso_total" value="<?= $peso_total ?>">
                                    <input type="hidden" id="sub_total" value="<?= str_replace(',', '.', $soma_carrinho) ?>">

                                    <div class="value">
                                        <p>Entrega <span id="resumoNomeFreteEscolhido"></span>: <b><span id="resumoValFreteEscolhido"></span></b></p>
                                    </div>
                                </div>
                                <div class="col-md-12 text-right">
                                    <div class="value-total">
                                        <p>Valor Total: <b>R$ <span id="SpanValTotalPedido"><?= Moeda($soma_carrinho) ?></span></b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <div class="links-group btn-avancar">
                                    <a href="javascript:" id="btn_PagSeguro" class="bg-brown hvr-wobble-vertical">Avançar</a>
                                </div>
                            </div>
                        </div>
                        <div class="text-center img-paseguro">
                            <img src="assets/images/pagseguro.gif" alt="Paseguro">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <? include('includes/footer-checkout.php'); ?>
        <? include('includes/js.php'); ?>
        <script>
            function verificarCPF(c) {

                var c = c.replace('-', ''); //retiro o traço
                c = c.replace(/\./g, ''); //retiro todos os pontos

                var i;
                s = c;
                var c = s.substr(0, 9);
                var dv = s.substr(9, 2);
                var d1 = 0;
                var v = false;

                for (i = 0; i < 9; i++) {
                    d1 += c.charAt(i) * (10 - i);
                }
                if (d1 == 0) {
                    alert("CPF Inválido")
                    v = true;
                    return false;
                }
                d1 = 11 - (d1 % 11);
                if (d1 > 9) d1 = 0;
                if (dv.charAt(0) != d1) {
                    alert("CPF Inválido")
                    v = true;
                    return false;
                }

                d1 *= 2;
                for (i = 0; i < 9; i++) {
                    d1 += c.charAt(i) * (11 - i);
                }
                d1 = 11 - (d1 % 11);
                if (d1 > 9) d1 = 0;
                if (dv.charAt(1) != d1) {
                    alert("CPF Inválido")
                    v = true;
                    return false;
                }

                return true;

            }

            function validaFormPedido() {
                d = document.formInfoPedido;

                if (d.rg.value == "") {
                    alert("O campo RG deve ser preenchido!");
                    d.rg.focus();
                    return false;
                }
                if (d.telefone.value == "") {
                    alert("O campo TELEFONE deve ser preenchido!");
                    d.telefone.focus();
                    return false;
                }
                if (d.cep.value == "") {
                    alert("O campo CEP deve ser preenchido!");
                    d.cep.focus();
                    return false;
                }
                var RadioEscolhio = '';
                $("input[name='SelFrete']").each(function() {
                    if ($(this).is(':checked')) {
                        RadioEscolhio = $(this).val();
                    }
                });
                /*for(i=0; i<radiosFrete.length; i++){
                    alert(d.SelFrete[i].value);
                    //if (d.SelFrete[i].checked == false && d.SelFrete[1].checked == false  && d.SelFrete[2].checked == false ){alert("Você deve selecionar uma opção de entrega!");d.estado.focus();return false;}
                }*/
                //if (d.SelFrete[0].checked == false && d.SelFrete[1].checked == false  && d.SelFrete[2].checked == false ){alert("Você deve selecionar uma opção de entrega!");d.estado.focus();return false;}

                if (RadioEscolhio == '') {
                    alert("Você deve selecionar uma opção de entrega!");
                    d.estado.focus();
                    return false;
                }
                if (d.estado.value == "") {
                    alert("O campo ESTADO deve ser preenchido!");
                    d.estado.focus();
                    return false;
                }
                if (d.cidade.value == "") {
                    alert("O campo CIDADE deve ser preenchido!");
                    d.cidade.focus();
                    return false;
                }
                if (d.endereco.value == "") {
                    alert("O campo ENDEREÇO deve ser preenchido!");
                    d.endereco.focus();
                    return false;
                }
                if (d.numero.value == "") {
                    alert("O campo NÚMERO deve ser preenchido!");
                    d.numero.focus();
                    return false;
                }
                if (d.bairro.value == "") {
                    alert("O campo BAIRRO deve ser preenchido!");
                    d.bairro.focus();
                    return false;
                }


                if (d.ValTotalPedido.value == "") {
                    alert("Você deve selecionar uma opção de entrega!");
                    return false;
                }
                if (d.NomeFreteEscolhido.value == "") {
                    alert("Você deve selecionar uma opção de entrega!");
                    return false;
                }
                if (d.ValFreteEscolhido.value == '') {
                    alert("Você deve selecionar uma opção de entrega!");
                    return false;
                }

                if (d.cpf.value == "") {
                    alert("O campo CPF deve ser preenchido!");
                    d.cpf.focus();
                    return false;
                } else {
                    return verificarCPF(d.cpf.value);
                }

                return true;
            }

            function formatReal(mixed) {
                var int = parseInt(mixed.toFixed(2).toString().replace(/[^\d]+/g, ''));
                var tmp = int + '';
                tmp = tmp.replace(/([0-9]{2})$/g, ",$1");
                if (tmp.length > 6)
                    tmp = tmp.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");

                return tmp;
            }

            function AtualizaValorTotal(tipo) {
                // total sem frete * % do desconto + total do frete = Total do pedido
                var valorTotalSemFrete = 0;
                var porcentagemDescontoCupom = 0;
                var valorTotalFrete = 0;

                if ($('#ValTotalPedidoSemFrete').val() != '') {
                    var valorTotalSemFrete = $('#ValTotalPedidoSemFrete').val();
                    var valorTotalSemFrete = valorTotalSemFrete.replace(/,/g, '.');
                    var valorTotalSemFrete = parseFloat(valorTotalSemFrete);
                }

                if (tipo != 'frete') {
                    if ($('#ValDescontoCupom').val() != '') {
                        var porcentagemDescontoCupom = $('#ValDescontoCupom').val();
                        var porcentagemDescontoCupom = porcentagemDescontoCupom.replace(/,/g, '.');
                        var porcentagemDescontoCupom = parseFloat(porcentagemDescontoCupom);
                    }
                }
                if ($('#ValFreteEscolhido').val() != '') {
                    var valorTotalFrete = $('#ValFreteEscolhido').val();
                    var valorTotalFrete = valorTotalFrete.replace(/,/g, '.');
                    var valorTotalFrete = parseFloat(valorTotalFrete);
                }

                var resultado = 0;
                if (tipo != 'frete') {
                    if (porcentagemDescontoCupom != 0) {
                        var resultado = (porcentagemDescontoCupom / 100) * valorTotalSemFrete;
                    }
                }
                var resultado = valorTotalSemFrete - resultado;

                var resultado_total = resultado;
                //  var resultado = resultado.toFixed(2);
                var resultado_total = resultado_total + valorTotalFrete;

                $('#SpanSubTotalPedido').html(formatReal(resultado));
                $('#ValTotalPedidoSemFrete').val(resultado.toFixed(2));

                $('#ValTotalPedido').val(resultado_total);
                $('#SpanValTotalPedido').html(formatReal(resultado_total));

            }

            function CalculaFrete(cep_loja, cep_destino, peso, tipo) {
                var InputTemp = '#temporario' + tipo;
                var SpanValor = '#preco' + tipo;
                var SpanEscolheValor = '#valor' + tipo;
                var SpanPrazo = '#prazo' + tipo;
                getLoading();
                $.post("./ajax.php", {
                        CepDestino: cep_destino,
                        Peso: peso,
                        CepOrigem: cep_loja,
                        act: 'Consulta' + tipo,
                        session: '<?= session_id() ?>'
                    },
                    function(result) {
                        if (result == '') {
                            $('#entrega' + tipo).hide();
                        } else if (result != 'erro') {
                            $('#entrega' + tipo).show();
                            $(InputTemp).val(result);
                            $(SpanValor).text(result);
                            if (parseInt(result, 10) == 0) {
                                $(SpanEscolheValor).text('- Grátis');
                            } else {
                                $(SpanEscolheValor).text('- R$ ' + result);
                            }
                            $("input[name='SelFrete']").removeAttr("disabled");
                        } else {
                            $(InputTemp).val('0')
                            $(SpanValor).text('0');
                        }
                        delLoading();
                    });
                getLoading();
                $.post("./ajax.php", {
                        CepDestino: cep_destino,
                        Peso: peso,
                        CepOrigem: cep_loja,
                        act: 'ConsultaPrazo' + tipo,
                        session: '<?= session_id() ?>'
                    },
                    function(result) {
                        if (result != 'erro') {
                            if (result == 1) {
                                palavra = 'dia útil';
                            } else {
                                palavra = 'dias úteis';
                            }
                            $(SpanPrazo).text(' - ' + result + ' ' + palavra);
                        } else {
                            $(SpanValor).text('');
                        }
                        delLoading();
                    });
            }

            // SelecionaFrete executa quando clica no radio
            function SelecionaFrete(frete) {
                var SpanValor = $('#temporario' + frete).val();

                if (SpanValor == '') {
                    SpanValor = 0;
                }
                var sub_total = $('#sub_total').val();

                var ValorDesconto = parseFloat($('#ValDescontoCupom').val() / 100);

                var ValTotalPedido = parseFloat(sub_total) + parseFloat(SpanValor);
                var TotalDesconto = parseFloat(ValTotalPedido * ValorDesconto);

                var ValTotalPedidoComDesconto = parseFloat(ValTotalPedido - TotalDesconto);
                $('#ValFreteEscolhido').val(SpanValor);
                $('#NomeFreteEscolhido').val(frete);

                $('#resumoNomeFreteEscolhido').html(frete);
                if (SpanValor == 0) {
                    $('#resumoValFreteEscolhido').html('Grátis');
                } else {
                    $('#resumoValFreteEscolhido').html('R$ ' + SpanValor);
                }

                AtualizaValorTotal('frete');
            }


            function getEndereco(cep) {
                var cep = cep.replace(/\D/g, '');
                if (cep != "") {
                    var validacep = /^[0-9]{8}$/;
                    if (validacep.test(cep)) {
                        //Consulta o webservice viacep.com.br/
                        $.getJSON("//viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {
                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#endereco").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#estado").val(dados.uf);
                                $("#numero").focus();
                            } else {
                                alert("Endereço não encontrado, insira um CEP válido");
                            }
                        });
                    } else {
                        alert("Formato de CEP inválido.");
                    }
                }
            }

            $(document).ready(function() {
                $("#btn_PagSeguro").click(function() {
                    if (validaFormPedido() == true) {
                        $("#formInfoPedido").attr('action', 'checkout/pagamento');
                        $("#formInfoPedido").submit();
                    }
                });
                if ($("#cep").val() == "") {
                    $("#InfoValorEntrega").hide();
                }

                <? if ($rowEnd['cep_ped'] != '') { ?>
                    var cep_cli = '<?= $rowEnd['cep_ped'] ?>';
                    var peso = $('#peso_total').val();
                    if (cep_cli != '') {
                        //alert(cep_cli+' e '+peso);
                        CalculaFrete('<?= $cep_loja ?>', cep_cli, peso, 'Retirar');
                        CalculaFrete('<?= $cep_loja ?>', cep_cli, peso, 'Frete');
                        $("input[name='SelFrete']").removeAttr("checked");
                        var span_subtotal = $('#SpanSubTotalPedido').html();
                        $('#SpanValTotalPedido').html(span_subtotal);
                        $('#InfoValorEntrega').show();
                    }
                <? } ?>

            });

            // Atualiza o frete quando digita o CEP
            function AtualizaFrete(cep) {
                var cep_cli = cep.value;
                var peso = $('#peso_total').val();
                if (cep_cli != '') {
                    CalculaFrete('<?= $cep_loja ?>', cep_cli, peso, 'Retirar');
                    CalculaFrete('<?= $cep_loja ?>', cep_cli, peso, 'Frete');
                    $("input[name='SelFrete']").removeAttr("checked");
                    var span_subtotal = $('#SpanSubTotalPedido').html();
                    $('#SpanValTotalPedido').html(span_subtotal);
                    $('#InfoValorEntrega').show();
                }

            }

            function ConsultaCupom() {
                var codigo = $('#TxtCupom').val();
                $.post("./ajax.php", {
                        codigo_cupom: codigo,
                        codigo_pedido: '',
                        codigo_cliente: '',
                        act: 'ConsultaCupom',
                        session: '<?= session_id() ?>'
                    },
                    function(result) {
                        if (result) {
                            if (isNaN(result)) {
                                $('#ValDescontoCupom').val('');
                                $('#SpanPorcentoDesconto').html('');
                                $('#SpanValorDesconto').html('');
                                $('.labelDesconto').hide()
                                $('#ResultCupomDesconto').hide();
                                AtualizaValorTotal();
                                alert(result);
                            } else {
                                var desconto = parseFloat(result);

                                var valorTotal = $('#ValTotalPedidoSemFrete').val();
                                var valorTotal = valorTotal.replace(/,/g, '.');

                                // FAZ O CALCULO E EXIBE O VALOR DO DESCONTO EM REAL
                                var valorDesconto = (desconto / 100) * valorTotal;

                                // SUBTRAI O VALOR DO DESCONTO EM REAL DO VALOR TOTAL DO PEDIDO
                                var valorTotalDesconto = valorTotal - valorDesconto;

                                //SUBSTITUI SPANS (%, Valor Desconto, Valor Total)
                                $('#SpanPorcentoDesconto').html(desconto);
                                $('#SpanValorDesconto').html(formatReal(valorDesconto));

                                //SUBSTITUI INPUTS (Valor Total)
                                $('#ValDescontoCupom').val(desconto);

                                $('.labelDesconto').show()
                                $('#ResultCupomDesconto').show();

                                AtualizaValorTotal();

                                $('.confirmaCod').show();
                                $('#TxtCupom').prop('readonly', true);
                                $('#CodCupom').val($('#TxtCupom').val());

                                //$('#ConsultaCod').remove();
                                $('#ConsultaCod').removeAttr('onClick').html("<i class='fas fa-check'></i> Aplicado");
                            }

                        }
                    });
            }
        </script>

    </main>

    <? include('includes/footer.php'); ?>
    <? include('includes/js.php'); ?>
    <? include('includes/analytics.php'); ?>
    

</body>

</html>