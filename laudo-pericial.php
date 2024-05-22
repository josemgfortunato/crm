<?php
$ID_USER 		= isset($_COOKIE["ID_USER"]) ? $_COOKIE["ID_USER"] : '';
if($ID_USER == ''){	
include "sessao-expirou.php";
}


//include "Connections/conecta_banco.php";
include "valida_cookie_admin.php";


$ID_LEADS = isset($_GET['ID_LEADS']) ? $_GET['ID_LEADS'] : '';
///////////////////////////////////////////////////////
$sql_leads_val = mysqli_query($conexao,"select * from tb_ficha_intermediacao WHERE FICHA_INTER_LEADS = '$ID_LEADS' ");
$val_leads_val = mysqli_fetch_object($sql_leads_val);  
///////////////////////////////////////////////////////
//$val_ficaha_inter			= isset($val_leads_val->ID_FICHA_INTER) ? $val_leads_val->ID_FICHA_INTER : '';

$ID_FICHA_INTER 			= isset($val_leads_val->ID_FICHA_INTER) ? $val_leads_val->ID_FICHA_INTER : '';
$FICHA_INTER_USER 			= isset($val_leads_val->FICHA_INTER_USER) ? $val_leads_val->FICHA_INTER_USER : '';
$FICHA_INTER_TIPO			= isset($val_leads_val->FICHA_INTER_TIPO) ? $val_leads_val->FICHA_INTER_TIPO : '';
$FICHA_INTER_LEADS			= isset($val_leads_val->FICHA_INTER_LEADS) ? $val_leads_val->FICHA_INTER_LEADS : '';
$FICHA_INTER_CLIENTE		= isset($val_leads_val->FICHA_INTER_CLIENTE) ? $val_leads_val->FICHA_INTER_CLIENTE : '';

$FICHA_INTER_BANCO			= isset($val_leads_val->FICHA_INTER_BANCO) ? $val_leads_val->FICHA_INTER_BANCO : '';
$FICHA_INTER_VEICULO		= isset($val_leads_val->FICHA_INTER_VEICULO) ? $val_leads_val->FICHA_INTER_VEICULO : '';
$FICHA_INTER_VALOR_FIN		= isset($val_leads_val->FICHA_INTER_VALOR_FIN) ? $val_leads_val->FICHA_INTER_VALOR_FIN : '';
$FICHA_INTER_VALOR_PARC		= isset($val_leads_val->FICHA_INTER_VALOR_PARC) ? $val_leads_val->FICHA_INTER_VALOR_PARC : '';
$FICHA_INTER_PAGA			= isset($val_leads_val->FICHA_INTER_PAGA) ? $val_leads_val->FICHA_INTER_PAGA : '';
///////////////////////////////////////////////////////
///////////////////////////////////////////////////////

//if($ID_FICHA_INTER > '')	{
//$ID_FICHA_INTER = $val_ficaha_inter;

///////////////////////////////////////////////////////
$sql_clientes = mysqli_query($conexao,"select * from tb_clientes WHERE ID_CLIENTE = '$FICHA_INTER_CLIENTE' ");
$val_clientes = mysqli_fetch_object($sql_clientes);  
///////////////////////////////////////////////////////
$ID_CLIENTE 				= isset($val_clientes->ID_CLIENTE) ? $val_clientes->ID_CLIENTE : '';
$CLIENTE_NOME 				= isset($val_clientes->CLIENTE_NOME) ? $val_clientes->CLIENTE_NOME : '';
//}

//session_start();
 

///////////////////////////////////////////////////////
$sql_laudo = mysqli_query($conexao,"select * from tb_laudo WHERE LAUDO_LEADS = '$ID_LEADS' ");
$val_laudo = mysqli_fetch_object($sql_laudo);  
///////////////////////////////////////////////////////
$ID_LAUDO 						= isset($val_laudo->ID_LAUDO) ? $val_laudo->ID_LAUDO : '';
$LAUDO_LEADS 					= isset($val_laudo->LAUDO_LEADS) ? $val_laudo->LAUDO_LEADS : '';
$LAUDO_JURIDICO 				= isset($val_laudo->LAUDO_JURIDICO) ? $val_laudo->LAUDO_JURIDICO : '';

$LAUDO_DATA 					= isset($val_laudo->LAUDO_DATA) ? $val_laudo->LAUDO_DATA : '';
if($LAUDO_DATA == '0000-00-00')	{
$LAUDO_DATA = date("d/m/Y");
} else {
$LAUDO_DATA_DIA = substr($LAUDO_DATA, 8, 4);
$LAUDO_DATA_MES = substr($LAUDO_DATA, 5, 2);
$LAUDO_DATA_ANO = substr($LAUDO_DATA, 0, 4);
$LAUDO_DATA = $LAUDO_DATA_DIA.'/'.$LAUDO_DATA_MES.'/'.$LAUDO_DATA_ANO;
}

$LAUDO_N_CONTRATO 				= isset($val_laudo->LAUDO_N_CONTRATO) ? $val_laudo->LAUDO_N_CONTRATO : '';
$LAUDO_DATA_CONTRATO 			= isset($val_laudo->LAUDO_DATA_CONTRATO) ? $val_laudo->LAUDO_DATA_CONTRATO : '';
if($LAUDO_DATA_CONTRATO == '0000-00-00')	{
$LAUDO_DATA_CONTRATO = "";
} else {
$LAUDO_DATA_CONTRATO_DIA = substr($LAUDO_DATA_CONTRATO, 8, 4);
$LAUDO_DATA_CONTRATO_MES = substr($LAUDO_DATA_CONTRATO, 5, 2);
$LAUDO_DATA_CONTRATO_ANO = substr($LAUDO_DATA_CONTRATO, 0, 4);
$LAUDO_DATA_CONTRATO = $LAUDO_DATA_CONTRATO_DIA.'/'.$LAUDO_DATA_CONTRATO_MES.'/'.$LAUDO_DATA_CONTRATO_ANO;
}

$LAUDO_PARCELA_CONTROVERSA 		= isset($val_laudo->LAUDO_PARCELA_CONTROVERSA) ? $val_laudo->LAUDO_PARCELA_CONTROVERSA : '';
if($LAUDO_PARCELA_CONTROVERSA == '')	{
$LAUDO_PARCELA_CONTROVERSA = $FICHA_INTER_VALOR_PARC;
} 

$LAUDO_PARCELA_INCONTROVERSA 	= isset($val_laudo->LAUDO_PARCELA_INCONTROVERSA) ? $val_laudo->LAUDO_PARCELA_INCONTROVERSA : '';

$LAUDO_VALOR_VEICULO 			= isset($val_laudo->LAUDO_VALOR_VEICULO) ? $val_laudo->LAUDO_VALOR_VEICULO : '';
$LAUDO_VALOR_ENTRADA 			= isset($val_laudo->LAUDO_VALOR_ENTRADA) ? $val_laudo->LAUDO_VALOR_ENTRADA : '';
$LAUDO_IOF 						= isset($val_laudo->LAUDO_IOF) ? $val_laudo->LAUDO_IOF : '';
$LAUDO_IOF_ADICIONAL 			= isset($val_laudo->LAUDO_IOF_ADICIONAL) ? $val_laudo->LAUDO_IOF_ADICIONAL : '';

$LAUDO_VALOR_FINANCIADO 		= isset($val_laudo->LAUDO_VALOR_FINANCIADO) ? $val_laudo->LAUDO_VALOR_FINANCIADO : '';
if($LAUDO_VALOR_FINANCIADO == '')	{
$LAUDO_VALOR_FINANCIADO = $FICHA_INTER_VALOR_FIN;
} 

$LAUDO_TAXA_JUROS_CONTRATO 		= isset($val_laudo->LAUDO_TAXA_JUROS_CONTRATO) ? $val_laudo->LAUDO_TAXA_JUROS_CONTRATO : '';
$LAUDO_TAXA_APLICADA_FINANCEIRA = isset($val_laudo->LAUDO_TAXA_APLICADA_FINANCEIRA) ? $val_laudo->LAUDO_TAXA_APLICADA_FINANCEIRA : '';
$LAUDO_TARIFA_CADASTRO 			= isset($val_laudo->LAUDO_TARIFA_CADASTRO) ? $val_laudo->LAUDO_TARIFA_CADASTRO : '';
$LAUDO_TARIFA_AVALIACAO 		= isset($val_laudo->LAUDO_TARIFA_AVALIACAO) ? $val_laudo->LAUDO_TARIFA_AVALIACAO : '';
$LAUDO_REGISTRO_CONTRATO 		= isset($val_laudo->LAUDO_REGISTRO_CONTRATO) ? $val_laudo->LAUDO_REGISTRO_CONTRATO : '';
$LAUDO_SEGURO 					= isset($val_laudo->LAUDO_SEGURO) ? $val_laudo->LAUDO_SEGURO : '';
$LAUDO_TOTAL 					= isset($val_laudo->LAUDO_TOTAL) ? $val_laudo->LAUDO_TOTAL : '';
$LAUDO_AMORTIZACAO 				= isset($val_laudo->LAUDO_AMORTIZACAO) ? $val_laudo->LAUDO_AMORTIZACAO : '';
$LAUDO_RECALCULO 				= isset($val_laudo->LAUDO_RECALCULO) ? $val_laudo->LAUDO_RECALCULO : '';
$LAUDO_PRESTACAO_CONTRATUAL 	= isset($val_laudo->LAUDO_PRESTACAO_CONTRATUAL) ? $val_laudo->LAUDO_PRESTACAO_CONTRATUAL : '';
$LAUDO_N_PRESTACAO 				= isset($val_laudo->LAUDO_N_PRESTACAO) ? $val_laudo->LAUDO_N_PRESTACAO : '';
$LAUDO_PRESTACAO_RECALCULADA 	= isset($val_laudo->LAUDO_PRESTACAO_RECALCULADA) ? $val_laudo->LAUDO_PRESTACAO_RECALCULADA : '';
$LAUDO_DIFERENCA_PRESTACAO 		= isset($val_laudo->LAUDO_DIFERENCA_PRESTACAO) ? $val_laudo->LAUDO_DIFERENCA_PRESTACAO : '';
$LAUDO_DIFERENCA_FINANCIAMENTO 	= isset($val_laudo->LAUDO_DIFERENCA_FINANCIAMENTO) ? $val_laudo->LAUDO_DIFERENCA_FINANCIAMENTO : '';
$LAUDO_TARIFAS_DEVOLVER 		= isset($val_laudo->LAUDO_TARIFAS_DEVOLVER) ? $val_laudo->LAUDO_TARIFAS_DEVOLVER : '';
$LAUDO_RECALCULO_DEVOLUCAO 		= isset($val_laudo->LAUDO_RECALCULO_DEVOLUCAO) ? $val_laudo->LAUDO_RECALCULO_DEVOLUCAO : '';
$LAUDO_TOTAL_FINAL 				= isset($val_laudo->LAUDO_TOTAL_FINAL) ? $val_laudo->LAUDO_TOTAL_FINAL : '';
$LAUDO_OBS 						= isset($val_laudo->LAUDO_OBS) ? $val_laudo->LAUDO_OBS : '';

?>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>SISTEMA | AVT PRIME</title>

<link rel="icon" type="image/png" href="favicon.ico">
<style type="text/css">
<!--
td img {display: block;}body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
}
a:active {
	text-decoration: none;
}

#tabela-final{
	margin-right:auto; 
	margin-left:auto;
}
-->
</style>

<link rel="stylesheet" href="styles.css" />

<style type="text/css">
<!--
.style15 {
	font-size: 18
}
.style28 {
	font-size: 22px;
	font-weight: bold;
	font-family: calibri;
}
.style30 {font-size: 18px; font-weight: bold; font-family: calibri; }
.style31 {font-family: calibri}
.style21 {	font-family: calibri;
	font-size: 16px;
}
.style36 {
	font-size: 22px;
	font-weight: bold;
}
.style38 {
	font-size: 26px;
	font-weight: bold;
	font-family: calibri;
}
.style39 {font-size: 22px}
.style40 {font-size: 20px}
.style41 {font-size: 18px}
-->
</style>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="style85"><img src="imagens/base-invisivel.png" width="400" height="8" /></td>
  </tr>
</table>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#e2e2e2">
  <tr>
    <td height="1370" align="center" valign="top" background="dist/img/background-laudo.jpg"><table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="30" class="style30"><div align="center" class="style36">RESPONSAVEL TÉCNICO</div></td>
      </tr>
    </table>
        <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td bgcolor="#000000" class="style85"><img src="imagens/base-invisivel.png" width="400" height="2" /></td>
          </tr>
        </table>
      <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="325" height="30">&nbsp;</td>
            <td width="310"><div align="center"><span class="style38">IVANI BATISTA RODRIGUES</span></div></td>
            <td width="325"><img src="dist/img/icone-justica.png" width="26" height="26" /></td>
        </tr>
        </table>
      <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td bgcolor="#000000" class="style85"><img src="imagens/base-invisivel.png" width="400" height="2" /></td>
          </tr>
        </table>
      <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="28" class="style15 style31"><div align="justify">
                <p align="center">CRC 1SP259492O-2 <br />
                </p>
            </div></td>
          </tr>
        </table>
      <p><br />
        </p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p><br />
            <br />
        </p>
      <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><div align="center"><span class="style28">PARECER TÉCNICO</span></div></td>
          </tr>
        </table>
      <br />
        <br />
        <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="28" class="style15 style31"><div align="justify">
                <p align="center" class="style39">CÁLCULOS REVISIONAIS BANCÁRIOS</p>
            </div></td>
          </tr>
        </table>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="28" class="style15 style31"><div align="justify">
                <p align="center" class="style39">Cálculos não são apenas números ... <br />
                  “LAUDOS TÉCNICOS SÃO A MATERIALIZAÇÃO DA MELHOR ESTRATÉGIA <br />
                  PROCESSUAL, ATRAVÉS DA CRIAÇÃO DE DIVERSOS CENÁRIOS E <br />
                  POSSIBILIDADES.”</p>
            </div></td>
          </tr>
        </table>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="28" class="style15 style31"><div align="justify">
                <p align="center" class="style40">São  Paulo/SP <br />
                  2023</p>
            </div></td>
          </tr>
        </table>
      <p><br />
      </p></td>
  </tr>
  <tr>
    <td height="80" align="center" valign="top" background="dist/img/background-laudo-2.jpg"><table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><div align="center"><img src="dist/img/base-rodape-layout.png" width="830" height="10" /></div></td>
      </tr>
      <tr>
        <td width="910" height="30"><div align="center">
          <p class="style21">1</p>
        </div></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="style85"><img src="imagens/base-invisivel.png" width="400" height="8" /></td>
  </tr>
</table>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#e2e2e2">
  <tr>
    <td height="1370" align="center" valign="top" background="dist/img/background-laudo.jpg"><table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="30" class="style30"><div align="center" class="style36">RESPONSAVEL TÉCNICO</div></td>
      </tr>
    </table>
        <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td bgcolor="#000000" class="style85"><img src="imagens/base-invisivel.png" width="400" height="2" /></td>
          </tr>
        </table>
        <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="325" height="30">&nbsp;</td>
            <td width="310"><div align="center"><span class="style38">IVANI BATISTA RODRIGUES</span></div></td>
            <td width="325"><img src="dist/img/icone-justica.png" width="26" height="26" /></td>
          </tr>
        </table>
        <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td bgcolor="#000000" class="style85"><img src="imagens/base-invisivel.png" width="400" height="2" /></td>
          </tr>
        </table>
        <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="28" class="style15 style31"><div align="justify">
                <p align="center">CRC 1SP259492O-2 <br />
                </p>
            </div></td>
          </tr>
        </table>
      <p><br />
        </p>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td height="28" class="style15 style31"><div align="justify">
<p><span class="style41"><span class="style39"><strong>CONTRATANTE: </strong><?php echo $CLIENTE_NOME; ?></span></span></p>
<p class="style39"><strong>CONTRATADO:</strong> 
<?php 
if($FICHA_INTER_BANCO > '')	{
$v_bancos = mysqli_query($conexao,"select * from tb_bancos WHERE ID_BANCO = '$FICHA_INTER_BANCO' ");
$v_bco = mysqli_fetch_object($v_bancos);  

echo $BANCO_NOME = isset($v_bco->BANCO_NOME) ? $v_bco->BANCO_NOME : '';
} 
?>
</p>
<p class="style39"><strong>OBJETO DO CONTRATO: </strong>
<?php
if(($FICHA_INTER_TIPO == '1') or ($FICHA_INTER_TIPO == '2'))
echo $valida_tipo = "FINANCIAMENTO DE VEICULO";
elseif(($FICHA_INTER_TIPO == '3') or ($FICHA_INTER_TIPO == '4'))
echo $valida_tipo = "EMPRÉSTIMO";
elseif($FICHA_INTER_TIPO == '5')
echo $valida_tipo = "CONTRATOS QUITADOS";
else
echo $valida_tipo = "";
?>
</p>
<p class="style39"><strong>NÚMERO DO CONTRATO: </strong><?php echo $LAUDO_N_CONTRATO; ?> <br />
<br />
<strong>DATA DO CONTRATO: </strong><?php echo $LAUDO_DATA_CONTRATO; ?> </p>
<p class="style39">

<?php
if(($FICHA_INTER_TIPO == '1') or ($FICHA_INTER_TIPO == '2'))	{
?>
<strong>VEÍCULO/ MARCA:</strong><?php echo $FICHA_INTER_VEICULO; ?>
<?php
}
?>
</p>
<p align="center" class="style39">&nbsp;</p>
</div></td>
</tr>
</table>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="28" class="style15 style31"><div align="justify">
                <p align="center" class="style40">São  Paulo/SP <br />
                  2023</p>
            </div></td>
          </tr>
        </table>
      <p><br />
      </p></td>
  </tr>
  <tr>
    <td height="80" align="center" valign="top" background="dist/img/background-laudo-2.jpg"><table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><div align="center"><img src="dist/img/base-rodape-layout.png" width="830" height="10" /></div></td>
      </tr>
      <tr>
        <td width="910" height="30"><div align="center">
          <p class="style21">2</p>
        </div></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="style85"><img src="imagens/base-invisivel.png" width="400" height="8" /></td>
  </tr>
</table>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#e2e2e2">
  <tr>
    <td height="1370" align="center" valign="top" background="dist/img/background-laudo.jpg"><table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="30" class="style30"><div align="center" class="style36">RESPONSAVEL TÉCNICO</div></td>
      </tr>
    </table>
        <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td bgcolor="#000000" class="style85"><img src="imagens/base-invisivel.png" width="400" height="2" /></td>
          </tr>
        </table>
        <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="325" height="30">&nbsp;</td>
            <td width="310"><div align="center"><span class="style38">IVANI BATISTA RODRIGUES</span></div></td>
            <td width="325"><img src="dist/img/icone-justica.png" width="26" height="26" /></td>
          </tr>
        </table>
        <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td bgcolor="#000000" class="style85"><img src="imagens/base-invisivel.png" width="400" height="2" /></td>
          </tr>
        </table>
        <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="28" class="style15 style31"><div align="justify">
                <p align="center">CRC 1SP259492O-2 <br />
                </p>
            </div></td>
          </tr>
        </table>
      <p><br />
        </p>
      <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="28" class="style15 style31"><div align="justify">
                <p><span class="style39"><strong>1. PRELIMINARES<br />
                <br />
              </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;O presente cálculo pericial  tem como finalidade verificar as condições  de financiamento entabulados  entre as partes, visando conhecer o comportamento da movimentação financeira e a evolução  do saldo devedor  contratual, indagado pelas  assessorias jurídicas.</span></p>
                <p class="style39"><br />
                  <br />
                  <strong>2. DA NATUREZA  DOS CÁLCULOS<br />
                  <br />
              </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;O trabalho apresentado tem como objetivo  verificar as condições  financeiras do CONTRATANTE na operação financeira, juros e taxas  aplicadas em consonância com o ordenamento jurídico  pátrio.</p>
                <p class="style39"><br />
                  <br />
                  <strong>3. CRÉDITO DIRETO  AO CONSUMIDOR<br />
                  <br />
                </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;O CRÉDITO  DIRETO AO CONSUMIDOR usados frequentemente para estimular uma compra rápida,  é uma modalidade de financiamento e empréstimo muito comum nos bancos, lojas e instituições de crédito. Também  conhecido por CDC, o modelo  oferece um valor  em crédito ao consumidor. A quantia varia com o caso, alguns fatores podem influenciar  na hora de obter ou não, como por exemplo:<br />
                <br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-                 Renda e tempo de trabalho;</p>
                <p class="style39">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-  Finalidade do crédito;</p>
                <p class="style39">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Histórico, capacidade e situação financeira;</p>
                <p class="style39">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Quantidade e valor de bens em nome próprio.</p>
                <p class="style39"><br />
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;O CREDITO  DIRETO AO CONSUMIDOR é tão difundido que em algum momento  você já deve ter usado. O crediário em lojas, por exemplo, é uma das formas mais comuns. Quando uma empresa  oferece uma quantia em crédito para  você e o pagamento pode ser parcelado, é um CDC. E como muitas instituições podem oferecer essa forma de  empréstimo, ela pode ter algumas diferenças em cada  local.</p>
                </div></td>
          </tr>
        </table>
      <p>&nbsp;</p>
      <p><br />
      </p></td>
  </tr>
  <tr>
    <td height="80" align="center" valign="top" background="dist/img/background-laudo-2.jpg"><table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><div align="center"><img src="dist/img/base-rodape-layout.png" width="830" height="10" /></div></td>
      </tr>
      <tr>
        <td width="910" height="30"><div align="center">
          <p class="style21">3</p>
        </div></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="style85"><img src="imagens/base-invisivel.png" width="400" height="8" /></td>
  </tr>
</table>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#e2e2e2">
  <tr>
    <td height="1370" align="center" valign="top" background="dist/img/background-laudo.jpg"><table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="30" class="style30"><div align="center" class="style36">RESPONSAVEL TÉCNICO</div></td>
      </tr>
    </table>
        <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td bgcolor="#000000" class="style85"><img src="imagens/base-invisivel.png" width="400" height="2" /></td>
          </tr>
        </table>
        <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="325" height="30">&nbsp;</td>
            <td width="310"><div align="center"><span class="style38">IVANI BATISTA RODRIGUES</span></div></td>
            <td width="325"><img src="dist/img/icone-justica.png" width="26" height="26" /></td>
          </tr>
        </table>
        <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td bgcolor="#000000" class="style85"><img src="imagens/base-invisivel.png" width="400" height="2" /></td>
          </tr>
        </table>
        <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="28" class="style15 style31"><div align="justify">
                <p align="center">CRC 1SP259492O-2 <br />
                </p>
            </div></td>
          </tr>
        </table>
      <p><br />
        </p>
      <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="28" class="style15 style31"><div align="justify">
                <p><span class="style39"><strong>4. ELEMENTOS DA PERICIA<br />
                <br />
                </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Esclarecer os resultados encontrados com as diligencias realizadas. Em análise  do contrato de financiamento de veículo temos os seguintes  elementos:<br />
                <br />
                </span></p>
                <table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="40"><span class="style39">A. Valor do veiculo</span></td>
                  </tr>
                  <tr>
                    <td height="40"><span class="style39">B. Valor da entrada</span></td>
                  </tr>
                  <tr>
                    <td height="40"><span class="style39">C. Valor líquido liberado</span></td>
                  </tr>
                  <tr>
                    <td height="40"><span class="style39">D. Valor Financiado</span></td>
                  </tr>
                  <tr>
                    <td height="40"><span class="style39">E. Tarifas</span></td>
                  </tr>
                  <tr>
                    <td height="40"><span class="style39">F. Produtos e Serviços</span></td>
                  </tr>
                  <tr>
                    <td height="40"><span class="style39">G. IOF (Se informado)</span></td>
                  </tr>
                  <tr>
                    <td height="40"><span class="style39">H. Sistema de amortização</span></td>
                  </tr>
                  <tr>
                    <td height="40"><span class="style39">I. Taxa de Juros</span></td>
                  </tr>
                  <tr>
                    <td height="40"><span class="style39">J. CET (custo efetivo total)</span></td>
                  </tr>
                  <tr>
                    <td height="40"><span class="style39">K. Valor incontroverso</span></td>
                  </tr>
                  <tr>
                    <td height="40"><span class="style39">L. Valor controverso</span></td>
                  </tr>
                </table>
                <p class="style39">&nbsp;<br />
                ONDE:<br />
                  <br />
                </p>
                <table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="40"><span class="style39">A. Valor do veículo = valor do bem, valor da compra;</span></td>
                  </tr>
                  <tr>
                    <td height="40"><span class="style39">B. Valor da entrada  = Valor dado como parte de pagamento no ato da compra;</span></td>
                  </tr>
                  <tr>
                    <td height="40"><span class="style39">C. Valor líquido liberado = valor do bem menos o valor  da entrada;</span></td>
                  </tr>
                  <tr>
                    <td height="40"><span class="style39">D. Valor financiado contratual = (valor líquido  + tarifas + produtos e serviços + IOF);</span></td>
                  </tr>
                  <tr>
                    <td height="40"><span class="style39">E. Tarifas (cadastro, avaliação do bem, registro, gravame, etc);</span></td>
                  </tr>
                  <tr>
                    <td height="40"><span class="style39">F. Produtos e serviços  (seguros, garantia mecânica,  título de capitalização, promotora de venda, serviços de terceiros, despachante, etc)</span></td>
                  </tr>
                  <tr>
                    <td height="40"><span class="style39">G. IOF = Imposto sobre Operação Financeira;</span></td>
                  </tr>
                  <tr>
                    <td height="40"><span class="style39">H. Sistema de amortização = redução da dívida;</span></td>
                  </tr>
                  <tr>
                    <td height="40"><span class="style39">I. Taxa de Juros remuneratórios = remuneração do capital financiado;</span></td>
                  </tr>
                  <tr>
                    <td height="40"><span class="style39">J. Taxa de juros moratórios = remuneração do capital no período de mora.</span></td>
                  </tr>
                </table>
              </div></td>
          </tr>
        </table>
      <p><br />
      </p></td>
  </tr>
  <tr>
    <td height="80" align="center" valign="top" background="dist/img/background-laudo-2.jpg"><table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><div align="center"><img src="dist/img/base-rodape-layout.png" width="830" height="10" /></div></td>
      </tr>
      <tr>
        <td width="910" height="30"><div align="center">
          <p class="style21">4</p>
        </div></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="style85"><img src="imagens/base-invisivel.png" width="400" height="8" /></td>
  </tr>
</table>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#e2e2e2">
  <tr>
    <td height="1370" align="center" valign="top" background="dist/img/background-laudo.jpg"><table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="30" class="style30"><div align="center" class="style36">RESPONSAVEL TÉCNICO</div></td>
      </tr>
    </table>
        <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td bgcolor="#000000" class="style85"><img src="imagens/base-invisivel.png" width="400" height="2" /></td>
          </tr>
        </table>
        <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="325" height="30">&nbsp;</td>
            <td width="310"><div align="center"><span class="style38">IVANI BATISTA RODRIGUES</span></div></td>
            <td width="325"><img src="dist/img/icone-justica.png" width="26" height="26" /></td>
          </tr>
        </table>
        <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td bgcolor="#000000" class="style85"><img src="imagens/base-invisivel.png" width="400" height="2" /></td>
          </tr>
        </table>
        <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="28" class="style15 style31"><div align="justify">
                <p align="center">CRC 1SP259492O-2 <br />
                </p>
            </div></td>
          </tr>
        </table>
      <p><br />
        </p>
      <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="28" class="style15 style31"><div align="justify">
                <p><span class="style39"><strong>5. DIFERENÇA ENTRE O JUROS SIMPLES E JUROS COMPOSTO<br />
                        <br />
                </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A taxa de juros é simples,  quando incide a cada período  sempre sobre o valor  originalmente emprestado (principal). De forma diversa, a taxa de juros composta  incide sobre todo o saldo devedor (principal + juros), atualizado a cada período de incidência dos juros, ou  seja, quando há capitalização periódica dos  juros.</span></p>
              <p class="style39"><br />
                    <br />
                    <strong>6. METODOLOGIA DO FINANCIAMENTO COM PRESTAÇÕES FIXAS<br />
                    <br />
                  </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Utilizamos a mesma  metodologia do BCB Banco Central do Brasil para efetuar o cálculo  das prestações fixas. Cálculo com juros compostos  e capitalização mensal:</p>
              <p align="center" class="style39"><br />
                <br />
                    <br />
                    <strong><img src="dist/img/laudo-formula.png" width="35%" /></strong></p>
              <p class="style39">&nbsp;</p>
              <p class="style39">                    Onde:

                    <br />
                    <br />
                N = Número de meses</p>
              <p class="style39">J = Taxa de juros mensal                </p>
              <p class="style39">P = Valor de prestação                </p>
              <p class="style39">q0 = Valor financiado</p>
              <p class="style39">&nbsp;</p>
              <p class="style39"><strong>7. FORMULA PARA CALCULO  DA PARCELA<br />
                  <br />
              </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Base do cálculo (c + e +  f + g) + sistema de amortização + taxa de juros contratual</p>
              <p class="style39"><br />
              Parcela Controversa – <strong>R$ <?php echo $LAUDO_PARCELA_CONTROVERSA; ?></strong></p>
              </div></td>
          </tr>
        </table>
      <p>&nbsp;</p>
      <p><br />
      </p></td>
  </tr>
  <tr>
    <td height="80" align="center" valign="top" background="dist/img/background-laudo-2.jpg"><table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><div align="center"><img src="dist/img/base-rodape-layout.png" width="830" height="10" /></div></td>
      </tr>
      <tr>
        <td width="910" height="30"><div align="center">
          <p class="style21">5</p>
        </div></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="style85"><img src="imagens/base-invisivel.png" width="400" height="8" /></td>
  </tr>
</table>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#e2e2e2">
  <tr>
    <td height="1370" align="center" valign="top" background="dist/img/background-laudo.jpg"><table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="30" class="style30"><div align="center" class="style36">RESPONSAVEL TÉCNICO</div></td>
      </tr>
    </table>
        <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td bgcolor="#000000" class="style85"><img src="imagens/base-invisivel.png" width="400" height="2" /></td>
          </tr>
        </table>
        <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="325" height="30">&nbsp;</td>
            <td width="310"><div align="center"><span class="style38">IVANI BATISTA RODRIGUES</span></div></td>
            <td width="325"><img src="dist/img/icone-justica.png" width="26" height="26" /></td>
          </tr>
        </table>
        <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td bgcolor="#000000" class="style85"><img src="imagens/base-invisivel.png" width="400" height="2" /></td>
          </tr>
        </table>
        <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="28" class="style15 style31"><div align="justify">
                <p align="center">CRC 1SP259492O-2 <br />
                </p>
            </div></td>
          </tr>
        </table>
      <p><br />
        </p>
      <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="28" class="style15 style31"><div align="justify">
                <p><span class="style39"><strong>8. FORMULA PARA CALCULO DA PARCELA RECALCULADA<br />
                        <br />
                </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Base de cálculo (c + g)  + sistema de amortização + taxa de juros compatível ou (c +  g – e – f)</span></p>
                <p><span class="style39"><br />
                Parcela Incontroversa – <strong>R$ <?php echo $LAUDO_PARCELA_INCONTROVERSA; ?></strong></span></p>
                <p class="style39"><br />
                    <br />
                    <strong>9. DADOS DO FINANCIAMENTO<br />
                    <br />
                  </strong></p>
<?php
if(($FICHA_INTER_TIPO == '1') or ($FICHA_INTER_TIPO == '2'))	{
?>
<table width="600" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#333333">
<tr>
<td width="150" height="40" bgcolor="#CCCCCC"><div align="center"><strong>VALOR DO VEÍCULO</strong></div></td>
<td width="150" bgcolor="#CCCCCC"><div align="center"><strong>VALOR DA ENTRADA</strong></div></td>
<td width="150" bgcolor="#CCCCCC"><div align="center"><strong>IOF</strong></div></td>
<td width="150" bgcolor="#CCCCCC"><div align="center"><strong>IOF ADICIONAL</strong></div></td>
</tr>
<tr>
<td height="40"><div align="center">R$ <?php echo $LAUDO_VALOR_VEICULO; ?></div></td>
<td><div align="center">R$ <?php echo $LAUDO_VALOR_ENTRADA; ?></div></td>
<td><div align="center">R$ <?php echo $LAUDO_IOF; ?></div></td>
<td><div align="center">R$ <?php echo $LAUDO_IOF_ADICIONAL; ?></div></td>
</tr>
</table>
<?php
}	elseif(($FICHA_INTER_TIPO == '1') or ($FICHA_INTER_TIPO == '2'))	{
?>
<table width="600" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#333333">
<tr>
<td width="300" height="40" bgcolor="#CCCCCC"><div align="center"><strong>VALOR DO EMPRÉSTIMO</strong></div></td>
<td width="300" bgcolor="#CCCCCC"><div align="center"><strong>IOF</strong></div></td>
</tr>
<tr>
<td height="40"><div align="center">R$ <?php echo $LAUDO_VALOR_VEICULO; ?></div></td>
<td><div align="center">R$ <?php echo $LAUDO_IOF; ?></div></td>
</tr>
</table>
<?php
}
?>
              <p>&nbsp;</p>
                <table width="700" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#333333">
                  <tr>
                    <td width="150" height="40" bgcolor="#CCCCCC"><div align="center"><strong>VALOR FINANCIADO</strong></div></td>
                    <td width="271" bgcolor="#CCCCCC"><div align="center"><strong>TAXA DE JUROS DO CONTRATO</strong></div></td>
                    <td width="271" bgcolor="#CCCCCC"><div align="center"><strong>TAXA APLICADA PELA INSTITUIÇÃO FINANCEIRA</strong></div></td>
                  </tr>
                  <tr>
                    <td height="40"><div align="center">R$ <?php echo $LAUDO_VALOR_FINANCIADO; ?></div></td>
                    <td><div align="center"><?php echo $LAUDO_TAXA_JUROS_CONTRATO; ?></div></td>
                    <td><div align="center"><?php echo $LAUDO_TAXA_APLICADA_FINANCEIRA; ?></div></td>
                  </tr>
                </table>
                <p class="style39">&nbsp;</p>
              <p class="style39"><strong>10. ENCARGOS INDEVIDOS<br />
                      <br />
                </strong></p>




<?php
if(($FICHA_INTER_TIPO == '1') or ($FICHA_INTER_TIPO == '2'))	{
?>
<table width="800" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#333333">
<tr>
<td width="197" height="40" bgcolor="#CCCCCC"><div align="center"><strong>TARIFA DE AVALIAÇÃO</strong></div></td>
<td width="197" bgcolor="#CCCCCC"><div align="center"><strong>REGISTRO DE CONTRATO</strong></div></td>
<td width="198" bgcolor="#CCCCCC"><div align="center"><strong>SEGURO</strong></div></td>
<td width="198" bgcolor="#CCCCCC"><div align="center"><strong>TOTAL</strong></div></td>
</tr>
<tr>
<td height="40"><div align="center">R$ <?php echo $LAUDO_TARIFA_AVALIACAO; ?></div></td>
<td><div align="center">R$ <?php echo $LAUDO_REGISTRO_CONTRATO; ?></div></td>
<td><div align="center">R$ <?php echo $LAUDO_SEGURO; ?></div></td>
<td><div align="center">R$ <?php echo $LAUDO_TOTAL; ?></div></td>
</tr>
</table>
<?php
}	elseif(($FICHA_INTER_TIPO == '1') or ($FICHA_INTER_TIPO == '2'))	{
?>
<table width="800" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#333333">
<tr>
<td width="400" height="40" bgcolor="#CCCCCC"><div align="center"><strong>SEGURO</strong></div></td>
<td width="400" bgcolor="#CCCCCC"><div align="center"><strong>TOTAL</strong></div></td>
</tr>
<tr>
<td height="40"><div align="center">R$ <?php echo $LAUDO_SEGURO; ?></div></td>
<td><div align="center">R$ <?php echo $LAUDO_TOTAL; ?></div></td>
</tr>
</table>
<?php
}
?>
              <p>&nbsp;</p>
              <p class="style39"><strong>11. DADOS DO RECALCULO<br />
                  <br />
              </strong></p>
              <table width="800" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#333333" bgcolor="#adaaaa">
                <tr>
                  <td width="397" height="40"><div align="center"><strong>SISTEMA DE AMORTIZAÇÃO</strong></div></td>
                  <td width="397"><div align="center"><strong>SISTEMA AMORTIZAÇÃO RECALCULO</strong></div></td>
                </tr>
                <tr>
                  <td height="40"><div align="center"><?php echo $LAUDO_AMORTIZACAO; ?></div></td>
                  <td><div align="center"><?php echo $LAUDO_RECALCULO; ?></div></td>
                </tr>
              </table>
              <p><br />
              </p>
              <table width="880" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#333333">
                <tr>
                  <td width="198" height="40" bgcolor="#CCCCCC"><div align="center"><strong>PRESTAÇÃO CONTRATUAL</strong></div></td>
                  <td width="197" bgcolor="#CCCCCC"><div align="center"><strong>Nº DE PRESTAÇÃO</strong></div></td>
                  <td width="197" bgcolor="#CCCCCC"><div align="center"><strong>PRESTAÇÃO RECALCULADA</strong></div></td>
                  <td width="198" bgcolor="#CCCCCC"><div align="center"><strong>DIFERENÇA ENTRE PRESTAÇÃO</strong></div></td>
                  <td width="198" bgcolor="#CCCCCC"><div align="center"><strong>DIFERENÇA A MAIS NO FINANCIAMENTO</strong></div></td>
                </tr>
                <tr>
                  <td height="40"><div align="center">R$ <?php echo $LAUDO_PRESTACAO_CONTRATUAL; ?></div></td>
                  <td><div align="center"><?php echo $LAUDO_N_PRESTACAO; ?></div></td>
                  <td><div align="center">R$ <?php echo $LAUDO_PRESTACAO_RECALCULADA; ?></div></td>
                  <td><div align="center">R$ <?php echo $LAUDO_DIFERENCA_PRESTACAO; ?></div></td>
                  <td><div align="center">R$ <?php echo $LAUDO_DIFERENCA_FINANCIAMENTO; ?></div></td>
                </tr>
              </table>
              <p class="style39">&nbsp;</p>
              </div></td>
          </tr>
        </table>
      <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td height="80" align="center" valign="top" background="dist/img/background-laudo-2.jpg"><table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><div align="center"><img src="dist/img/base-rodape-layout.png" width="830" height="10" /></div></td>
      </tr>
      <tr>
        <td width="910" height="30"><div align="center">
          <p class="style21">6</p>
        </div></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="style85"><img src="imagens/base-invisivel.png" width="400" height="8" /></td>
  </tr>
</table>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#e2e2e2">
  <tr>
    <td height="1370" align="center" valign="top" background="dist/img/background-laudo.jpg"><table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="30" class="style30"><div align="center" class="style36">RESPONSAVEL TÉCNICO</div></td>
      </tr>
    </table>
        <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td bgcolor="#000000" class="style85"><img src="imagens/base-invisivel.png" width="400" height="2" /></td>
          </tr>
        </table>
        <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="325" height="30">&nbsp;</td>
            <td width="310"><div align="center"><span class="style38">IVANI BATISTA RODRIGUES</span></div></td>
            <td width="325"><img src="dist/img/icone-justica.png" width="26" height="26" /></td>
          </tr>
        </table>
        <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td bgcolor="#000000" class="style85"><img src="imagens/base-invisivel.png" width="400" height="2" /></td>
          </tr>
        </table>
        <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="28" class="style15 style31"><div align="justify">
                <p align="center">CRC 1SP259492O-2 <br />
                </p>
            </div></td>
          </tr>
        </table>
      <p><br />
        </p>
      <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="28" class="style15 style31"><div align="justify">
                <p><span class="style39"><strong>12. CONCLUSÃO:<br />
              </strong></span></p>
                <p>&nbsp;</p>
              <table width="800" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#333333">
                  <tr>
                    <td width="263" height="40" bgcolor="#CCCCCC"><div align="center"><strong>TARIFAS A DEVOLVER EM DOBRO</strong></div></td>
                    <td width="266" bgcolor="#CCCCCC"><div align="center"><strong>A MAIS NO RECALCULO <br />
                    DEVOLUÇÃO / COMPENSAÇÃO</strong></div></td>
                    <td width="263" bgcolor="#CCCCCC"><div align="center"><strong>TOTAL FINAL <br />
                    (PROVEITO ECONOMICO)</strong></div></td>
                </tr>
                  <tr>
                    <td height="40"><div align="center">R$ <?php echo $LAUDO_TARIFAS_DEVOLVER; ?></div></td>
                    <td><div align="center">R$ <?php echo $LAUDO_RECALCULO_DEVOLUCAO; ?></div></td>
                    <td><div align="center">R$ <?php echo $LAUDO_TOTAL_FINAL; ?></div></td>
                  </tr>
                </table>
              <p class="style39">&nbsp;</p>
              <p class="style39">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Como exemplificado na  tabela acima, fora realizado o recalculo do contrato de financiamento, aplicando  a taxa real do contrato, e ainda, constando  a exclusão das abusividades inseridas no Custo Efetivo Total, resultado  na diminuição do valor mensal da  parcela.</p>
              <p class="style39">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A diferença entre a parcela contratual e a parcela  recalculada, multiplicada pelo número de parcelas contratuais dá se o valor novo do contrato  de <strong>R$ <?php echo $LAUDO_DIFERENCA_FINANCIAMENTO; ?></strong>.</p>
              <p class="style39">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Trazendo assim o  proveito econômico no valor de <strong>R$ <?php echo $LAUDO_TOTAL_FINAL; ?> </strong>a título de devolução, compensação ou abatimento do saldo  devedor.</p>
            </div></td>
          </tr>
        </table>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p align="center"><img src="dist/img/assinatura-laudo-ivani.png" width="40%" /></p>
      <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td height="80" align="center" valign="top" background="dist/img/background-laudo-2.jpg"><table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><div align="center"><img src="dist/img/base-rodape-layout.png" width="830" height="10" /></div></td>
      </tr>
      <tr>
        <td width="910" height="30"><div align="center">
          <p class="style21">7</p>
        </div></td>
      </tr>
    </table></td>
  </tr>
</table>
