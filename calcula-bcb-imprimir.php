<?php
$ID_USER 		= isset($_COOKIE["ID_USER"]) ? $_COOKIE["ID_USER"] : '';
if($ID_USER == ''){	
include "sessao-expirou.php";
}


//include "Connections/conecta_banco.php";
include "valida_cookie_admin.php";


$ID_CALCULO = isset($_POST['ID_CALCULO']) ? $_POST['ID_CALCULO'] : '';
$CALCULO_LEADS = isset($_POST['CALCULO_LEADS']) ? $_POST['CALCULO_LEADS'] : '';


//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sql_result = mysqli_query($conexao,"select * from tb_calculo_financeiro WHERE ID_CALCULO = '$ID_CALCULO' AND CALCULO_LEADS = '$CALCULO_LEADS' ORDER BY ID_CALCULO DESC ");
$val_calculo = mysqli_fetch_object($sql_result);  
///////////////////////////////////////////////////////

$ID_CALCULO 								= isset($val_calculo->ID_CALCULO) ? $val_calculo->ID_CALCULO : '';
$CALCULO_USER 								= isset($val_calculo->CALCULO_USER) ? $val_calculo->CALCULO_USER : '';
$CALCULO_STATUS 							= isset($val_calculo->CALCULO_STATUS) ? $val_calculo->CALCULO_STATUS : '';
$CALCULO_TIPO 								= isset($val_calculo->CALCULO_TIPO) ? $val_calculo->CALCULO_TIPO : '';
$CALCULO_LEADS 								= isset($val_calculo->CALCULO_LEADS) ? $val_calculo->CALCULO_LEADS : '';

$CALCULO_DATA 								= isset($val_calculo->CALCULO_DATA) ? $val_calculo->CALCULO_DATA : '';
$CALCULO_DATA_DIA = substr($CALCULO_DATA, 8, 4);
$CALCULO_DATA_MES = substr($CALCULO_DATA, 5, 2);
$CALCULO_DATA_ANO = substr($CALCULO_DATA, 0, 4);
$CALCULO_DATA = $CALCULO_DATA_DIA.'/'.$CALCULO_DATA_MES.'/'.$CALCULO_DATA_ANO;

$CALCULO_FINANCEIRA						 	= isset($val_calculo->CALCULO_FINANCEIRA) ? $val_calculo->CALCULO_FINANCEIRA : '';
$CALCULO_VEICULO						 	= isset($val_calculo->CALCULO_VEICULO) ? $val_calculo->CALCULO_VEICULO : '';
$CALCULO_CORRECAO_N						 	= isset($val_calculo->CALCULO_CORRECAO_N) ? $val_calculo->CALCULO_CORRECAO_N : '';
$CALCULO_NOME_CLIENTE					 	= isset($val_calculo->CALCULO_NOME_CLIENTE) ? $val_calculo->CALCULO_NOME_CLIENTE : '';
$CALCULO_CPF							 	= isset($val_calculo->CALCULO_CPF) ? $val_calculo->CALCULO_CPF : '';

$CALCULO_VALOR_VISTA					 	= isset($val_calculo->CALCULO_VALOR_VISTA) ? $val_calculo->CALCULO_VALOR_VISTA : '';
$CALCULO_ENTRADA 							= isset($val_calculo->CALCULO_ENTRADA) ? $val_calculo->CALCULO_ENTRADA : '';
$CALCULO_QTDE_PARCELAS 						= isset($val_calculo->CALCULO_QTDE_PARCELAS) ? $val_calculo->CALCULO_QTDE_PARCELAS : '';
$CALCULO_VALOR_ATUAL_PARCELA 				= isset($val_calculo->CALCULO_VALOR_ATUAL_PARCELA) ? $val_calculo->CALCULO_VALOR_ATUAL_PARCELA : '';
$CALCULO_PARCELAS_PAGAS 					= isset($val_calculo->CALCULO_PARCELAS_PAGAS) ? $val_calculo->CALCULO_PARCELAS_PAGAS : '';
$CALCULO_PARCELAS_ATRASO				 	= isset($val_calculo->CALCULO_PARCELAS_ATRASO) ? $val_calculo->CALCULO_PARCELAS_ATRASO : '';
$CALCULO_VALOR_FINANCIADO 					= isset($val_calculo->CALCULO_VALOR_FINANCIADO) ? $val_calculo->CALCULO_VALOR_FINANCIADO : '';
$CALCULO_PARCELAS_A_PAGAR 					= isset($val_calculo->CALCULO_PARCELAS_A_PAGAR) ? $val_calculo->CALCULO_PARCELAS_A_PAGAR : '';
$CALCULO_VALOR_PARCELAS_CORRIGIDA 			= isset($val_calculo->CALCULO_VALOR_PARCELAS_CORRIGIDA) ? $val_calculo->CALCULO_VALOR_PARCELAS_CORRIGIDA : '';
$CALCULO_VALOR_TOTAL_FINANCIAMENTO_ATUAL 	= isset($val_calculo->CALCULO_VALOR_TOTAL_FINANCIAMENTO_ATUAL) ? $val_calculo->CALCULO_VALOR_TOTAL_FINANCIAMENTO_ATUAL : '';
$CALCULO_VALOR_CORRETO_FINANCIAMENTO 		= isset($val_calculo->CALCULO_VALOR_CORRETO_FINANCIAMENTO) ? $val_calculo->CALCULO_VALOR_CORRETO_FINANCIAMENTO : '';
$CALCULO_JUROS_ABUSIVOS_PARCELA 			= isset($val_calculo->CALCULO_JUROS_ABUSIVOS_PARCELA) ? $val_calculo->CALCULO_JUROS_ABUSIVOS_PARCELA : '';
$CALCULO_VALOR_PAGO_DATA_ATUAL 				= isset($val_calculo->CALCULO_VALOR_PAGO_DATA_ATUAL) ? $val_calculo->CALCULO_VALOR_PAGO_DATA_ATUAL : '';
$CALCULO_JUROS_ABUSIVOS_PAGO 				= isset($val_calculo->CALCULO_JUROS_ABUSIVOS_PAGO) ? $val_calculo->CALCULO_JUROS_ABUSIVOS_PAGO : '';
$CALCULO_FALTA_PAGAR 						= isset($val_calculo->CALCULO_FALTA_PAGAR) ? $val_calculo->CALCULO_FALTA_PAGAR : '';
$CALCULO_DIVIDA 							= isset($val_calculo->CALCULO_DIVIDA) ? $val_calculo->CALCULO_DIVIDA : '';
$CALCULO_ECONOMIA 							= isset($val_calculo->CALCULO_ECONOMIA) ? $val_calculo->CALCULO_ECONOMIA : '';
$CALCULO_VALOR_DERRUBADO_PARCELA 			= isset($val_calculo->CALCULO_VALOR_DERRUBADO_PARCELA) ? $val_calculo->CALCULO_VALOR_DERRUBADO_PARCELA : '';






//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sql_user = mysqli_query($conexao,"select * from tb_administrador WHERE ID_ADMINISTRADOR = '$ID_USER' ");
$val_user = mysqli_fetch_object($sql_user);  
///////////////////////////////////////////////////////
$CAL_ADMINISTRADOR_NOME 				= isset($val_user->ADMINISTRADOR_NOME) ? $val_user->ADMINISTRADOR_NOME : '';




//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sql_cli = mysqli_query($conexao,"select * from tb_leads WHERE ID_LEADS = '$CALCULO_LEADS' ");
$val_cli = mysqli_fetch_object($sql_cli);  
///////////////////////////////////////////////////////
$LEADS_NOME 				= isset($val_cli->LEADS_NOME) ? $val_cli->LEADS_NOME : '';


/*
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sql_result = mysqli_query($conexao,"select * from tb_clientes WHERE ID_CLIENTE = '$ID_CONDOMINIO' ");
$val_clientes = mysqli_fetch_object($sql_result);  
///////////////////////////////////////////////////////

$ID_CLIENTE 				= isset($val_clientes->ID_CLIENTE) ? $val_clientes->ID_CLIENTE : '';
$CLIENTE_STATUS 			= isset($val_clientes->CLIENTE_STATUS) ? $val_clientes->CLIENTE_STATUS : '';
$CLIENTE_NOME 				= isset($val_clientes->CLIENTE_NOME) ? $val_clientes->CLIENTE_NOME : '';
$CLIENTE_RESPONSAVEL		= isset($val_clientes->CLIENTE_RESPONSAVEL) ? $val_clientes->CLIENTE_RESPONSAVEL : '';
*/
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
.style10 {
	font-family: calibri;
	font-size: 18px;
	font-weight: bold;
	color: #FFFFFF;
}
.style11 {
	font-family: calibri;
	font-size: 14px;
	color: #FFFFFF;
}
.style12 {
	font-family: calibri;
	font-size: 12px;
	color: #000;
}
.style13 {
	font-family: calibri;
	font-size: 14px;
	color: #000;
	font-weight: bold;
}
.style14 {
	font-family: calibri;
	font-size: 14x;
	color: #000;
}
.style15 {font-size: 14px}
-->
</style>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="style85"><img src="imagens/base-invisivel.png" width="400" height="8" /></td>
  </tr>
</table>
<table width="1000" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#e2e2e2">
  <tr>
    <td align="center" background="dist/img/marca-dagua.jpg" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="26%" height="64" bgcolor="#002060"> <div align="left"><img src="dist/img/logo-bcb-1.jpg" width="260" height="70" /></div>          </td>
        <td width="36%" bgcolor="#002060"><div align="center" class="style10">
          <div align="left" class="style15">&nbsp; Nome: 
		  <?php 
		  if($CALCULO_NOME_CLIENTE > '')
		  echo $CALCULO_NOME_CLIENTE; 
		  else
		  echo $LEADS_NOME; ?>
           </div>
        </div></td>
        <td width="18%" bgcolor="#002060"><div align="center" class="style10">
          <div align="left" class="style15">CPF/ CNPJ: <?php echo $CALCULO_CPF; ?></div>
        </div></td>
        <td width="25%" bgcolor="#002060"><div align="right"><span class="style11"><br />
  Assessoria: AVT Prime&nbsp;<br />
  Consultor(a): <?php echo $CAL_ADMINISTRADOR_NOME; ?>&nbsp;</span><br />
        </div></td>
      </tr>
      
    </table>
      <table width="960" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="780" class="style12"><!-- Início&gt; Calculadora &gt; Financiamento com prestações fixas --> &nbsp;</td>
          <td width="180">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td class="style12">Expira em 12 horas<br />
          <?php echo $CALCULO_DATA; ?>  <!--17:28:00--></td>
          <td>&nbsp;</td>
        </tr>
      </table>
      <br />
      <br />
      <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="80">&nbsp;</td>
          <td height="30" colspan="2" bgcolor="#002060"><div align="center" class="style10">Financiamento atual com parcelas fixas</div></td>
          <td width="100">&nbsp;</td>
          <td colspan="2" bgcolor="#002060"><div align="center" class="style10">Financiamento corrigido com parcelas fixas</div></td>
          <td width="80">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2">&nbsp;</td>
          <td>&nbsp;</td>
          <td colspan="2">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="30">&nbsp;</td>
          <td width="120" class="style12">Financeira</td>
          <td width="230" class="style14"><?php echo $CALCULO_FINANCEIRA; ?></td>
          <td>&nbsp;</td>
          <td width="120"><span class="style12">Correção nº </span></td>
          <td width="230" class="style14"><?php echo $CALCULO_CORRECAO_N; ?></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="30">&nbsp;</td>
          <td><span class="style12">Modelo do veículo</span></td>
          <td class="style14"><?php echo $CALCULO_VEICULO; ?></td>
          <td>&nbsp;</td>
          <td><span class="style12">Situação</span></td>
          <td class="style14">APROVADA</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="30">&nbsp;</td>
          <td class="style12">Valor financiado</td>
          <td class="style14">R$ <?php echo $CALCULO_VALOR_FINANCIADO; ?></td>
          <td>&nbsp;</td>
          <td><span class="style12">Nº de meses</span></td>
          <td class="style14"><?php echo $CALCULO_PARCELAS_A_PAGAR; ?></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="30">&nbsp;</td>
          <td><span class="style12">Nº de meses </span></td>
          <td class="style14"><?php echo $CALCULO_QTDE_PARCELAS; ?></td>
          <td>&nbsp;</td>
          <td><span class="style12">Valor da parcela</span></td>
          <td class="style14">R$ <?php echo $CALCULO_VALOR_PARCELAS_CORRIGIDA; ?></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="30">&nbsp;</td>
          <td><span class="style12">Valor da parcela</span></td>
          <td class="style14">R$ <?php echo $CALCULO_VALOR_ATUAL_PARCELA; ?></td>
          <td>&nbsp;</td>
          <td><span class="style12">Redução por parcela</span></td>
          <td class="style14">R$ <?php echo $CALCULO_JUROS_ABUSIVOS_PARCELA; ?></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="30">&nbsp;</td>
          <td><span class="style12">Qt. Pagas</span></td>
          <td class="style14"><?php echo $CALCULO_PARCELAS_PAGAS; ?></td>
          <td>&nbsp;</td>
          <td><span class="style12">Estorno</span></td>
          <td class="style14">R$ <?php echo $CALCULO_JUROS_ABUSIVOS_PAGO; ?></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="30">&nbsp;</td>
          <td><span class="style12">Qt. Atrasadas</span></td>
          <td class="style14"><?php echo $CALCULO_PARCELAS_ATRASO; ?></td>
          <td>&nbsp;</td>
          <td><span class="style12">Redução Total</span></td>
          <td class="style14">R$ <?php echo $CALCULO_ECONOMIA; ?></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      <p><br />
      </p>
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><div align="center" class="style13">Artigo 51 da Lei nº 8.078 de 11 de Setembro de 1990</div></td>
        </tr>
        <tr>
          <td><div align="center" class="style12">Requisição de diminuição de parcelas e quitação de dívidas sobre juros abusivos.</div></td>
        </tr>
      </table>
      <br />
      <br /></td>
  </tr>
</table>
