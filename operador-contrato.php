<?php
$ID_USER 		= isset($_COOKIE["ID_USER"]) ? $_COOKIE["ID_USER"] : '';
if($ID_USER == ''){	
include "sessao-expirou.php";
}


//include "Connections/conecta_banco.php";
include "valida_cookie_admin.php";


$ID_LEADS = isset($_GET['ID_LEADS']) ? $_GET['ID_LEADS'] : '';


//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sql_leads = mysqli_query($conexao,"select * from tb_leads WHERE ID_LEADS = '$ID_LEADS' AND LEADS_STATUS = '1' ");
$val_leads = mysqli_fetch_object($sql_leads);  
///////////////////////////////////////////////////////
$val_id_leads		= isset($val_leads->ID_LEADS) ? $val_leads->ID_LEADS : '';
$LEADS_USER		= isset($val_leads->LEADS_USER) ? $val_leads->LEADS_USER : '';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

$sql_hist_leads = mysqli_query($conexao,"select * from tb_leads_hist WHERE LEADS_HIST_LEADS = '$ID_LEADS' AND LEADS_HIST_STATUS = '1' ORDER BY ID_LEADS_HIST DESC ");
$val_hist_leads = mysqli_fetch_object($sql_hist_leads);  
///////////////////////////////////////////////////////
$val_id_hist_leads		= isset($val_hist_leads->ID_LEADS_HIST) ? $val_hist_leads->ID_LEADS_HIST : '';
$val_data_hist_leads	= isset($val_hist_leads->LEADS_HIST_DATA) ? $val_hist_leads->LEADS_HIST_DATA : '';
/*
$val_data_hist_leads_DIA = substr($val_data_hist_leads, 8, 4);
$val_data_hist_leads_MES = substr($val_data_hist_leads, 5, 2);
$val_data_hist_leads_ANO = substr($val_data_hist_leads, 0, 4);
$val_data_hist_leads = $val_data_hist_leads_DIA.'/'.$val_data_hist_leads_MES.'/'.$val_data_hist_leads_ANO;
*/
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////



$sql_ficha = mysqli_query($conexao,"select * from tb_ficha_intermediacao WHERE FICHA_INTER_LEADS = '$ID_LEADS' ");
$val_ficha = mysqli_fetch_object($sql_ficha);  
///////////////////////////////////////////////////////
$val_ficha_cliente 	= isset($val_ficha->FICHA_INTER_CLIENTE) ? $val_ficha->FICHA_INTER_CLIENTE : '';

$val_ficha_tipo	 	= isset($val_ficha->FICHA_INTER_TIPO) ? $val_ficha->FICHA_INTER_TIPO : '';

$val_ficha_banco	 	= isset($val_ficha->FICHA_INTER_BANCO) ? $val_ficha->FICHA_INTER_BANCO : '';
$val_ficha_veiculo	 	= isset($val_ficha->FICHA_INTER_VEICULO) ? $val_ficha->FICHA_INTER_VEICULO : '';
$val_ficha_valor_fin 	= isset($val_ficha->FICHA_INTER_VALOR_FIN) ? $val_ficha->FICHA_INTER_VALOR_FIN : '';
$val_ficha_valor_parc 	= isset($val_ficha->FICHA_INTER_VALOR_PARC) ? $val_ficha->FICHA_INTER_VALOR_PARC : '';
$val_ficha_paga 		= isset($val_ficha->FICHA_INTER_PAGA) ? $val_ficha->FICHA_INTER_PAGA : '';
$val_ficha_atraso 		= isset($val_ficha->FICHA_INTER_ATRASO) ? $val_ficha->FICHA_INTER_ATRASO : '';

$val_data_hist_leads	 = isset($val_ficha->FICHA_INTER_DATA) ? $val_ficha->FICHA_INTER_DATA : '';
$val_data_hist_leads_DIA = substr($val_data_hist_leads, 8, 4);
$val_data_hist_leads_MES = substr($val_data_hist_leads, 5, 2);
$val_data_hist_leads_ANO = substr($val_data_hist_leads, 0, 4);
$val_data_hist_leads = $val_data_hist_leads_DIA.'/'.$val_data_hist_leads_MES.'/'.$val_data_hist_leads_ANO;

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////



$sql_clientes = mysqli_query($conexao,"select * from tb_clientes WHERE ID_CLIENTE = '$val_ficha_cliente' ");
$val_clientes = mysqli_fetch_object($sql_clientes);  
///////////////////////////////////////////////////////

$val_id_cliente 				= isset($val_clientes->ID_CLIENTE) ? $val_clientes->ID_CLIENTE : '';
$val_cliente_status 			= isset($val_clientes->CLIENTE_STATUS) ? $val_clientes->CLIENTE_STATUS : '';
$val_cliente_nome 				= isset($val_clientes->CLIENTE_NOME) ? $val_clientes->CLIENTE_NOME : '';
$val_cliente_responsavel		= isset($val_clientes->CLIENTE_RESPONSAVEL) ? $val_clientes->CLIENTE_RESPONSAVEL : '';
$val_cliente_cnpj				= isset($val_clientes->CLIENTE_CNPJ) ? $val_clientes->CLIENTE_CNPJ : '';
$val_cliente_cpf				= isset($val_clientes->CLIENTE_CPF) ? $val_clientes->CLIENTE_CPF : '';
$val_cliente_rg					= isset($val_clientes->CLIENTE_RG) ? $val_clientes->CLIENTE_RG : '';
$val_cliente_data_nasc			= isset($val_clientes->CLIENTE_DATA_NASC) ? $val_clientes->CLIENTE_DATA_NASC : '';
$val_cliente_tel1				= isset($val_clientes->CLIENTE_TELEFONE_1) ? $val_clientes->CLIENTE_TELEFONE_1 : '';
$val_cliente_tel2				= isset($val_clientes->CLIENTE_TELEFONE_2) ? $val_clientes->CLIENTE_TELEFONE_2 : '';
$val_cliente_estado_civil		= isset($val_clientes->CLIENTE_ESTADO_CIVIL) ? $val_clientes->CLIENTE_ESTADO_CIVIL : '';
$val_cliente_profissao			= isset($val_clientes->CLIENTE_PROFISSAO) ? $val_clientes->CLIENTE_PROFISSAO : '';
$val_cliente_email				= isset($val_clientes->CLIENTE_EMAIL) ? $val_clientes->CLIENTE_EMAIL : '';
$val_cliente_endereco			= isset($val_clientes->CLIENTE_ENDERECO) ? $val_clientes->CLIENTE_ENDERECO : '';
$val_cliente_n					= isset($val_clientes->CLIENTE_N) ? $val_clientes->CLIENTE_N : '';
$val_cliente_complemento		= isset($val_clientes->CLIENTE_COMPLEMENTO) ? $val_clientes->CLIENTE_COMPLEMENTO : '';
$val_cliente_bairro				= isset($val_clientes->CLIENTE_BAIRRO) ? $val_clientes->CLIENTE_BAIRRO : '';
$val_cliente_cidade				= isset($val_clientes->CLIENTE_CIDADE) ? $val_clientes->CLIENTE_CIDADE : '';
$val_cliente_uf					= isset($val_clientes->CLIENTE_UF) ? $val_clientes->CLIENTE_UF : '';
$val_cliente_cep				= isset($val_clientes->CLIENTE_CEP) ? $val_clientes->CLIENTE_CEP : '';


if($val_cliente_cnpj > '')
$val_cliente_cpf = $val_cliente_cnpj;
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////


//////////////////////////// ENTRADA
$sql_valor = mysqli_query($conexao,"select * from tb_valor_contratacao WHERE VALOR_CONTR_LEADS = '$ID_LEADS' AND VALOR_CONTR_STATUS < '3' AND VALOR_CONTR_ENTR_PARC = '1' ");
$val_valor = mysqli_fetch_object($sql_valor);  
///////////////////////////////////////////////////////
$val_entrada_id_valor_contr			= isset($val_valor->ID_VALOR_CONTR) ? $val_valor->ID_VALOR_CONTR : '';
$val_entrada_valor_contr_tipo		= isset($val_valor->VALOR_CONTR_TIPO) ? $val_valor->VALOR_CONTR_TIPO : '';
$val_entrada_valor_contr			= isset($val_valor->VALOR_CONTR_VALOR) ? $val_valor->VALOR_CONTR_VALOR : '';
$val_entrada_valor_contr_qtde		= isset($val_valor->VALOR_CONTR_QTDE_VEZES) ? $val_valor->VALOR_CONTR_QTDE_VEZES : '';


//////////////////////////// PARCELA
$sql_valor = mysqli_query($conexao,"select * from tb_valor_contratacao WHERE VALOR_CONTR_LEADS = '$ID_LEADS' AND VALOR_CONTR_STATUS < '3' AND VALOR_CONTR_ENTR_PARC = '2' ORDER BY ID_VALOR_CONTR DESC ");
$val_valor = mysqli_fetch_object($sql_valor);  
///////////////////////////////////////////////////////
$val_id_valor_contr			= isset($val_valor->ID_VALOR_CONTR) ? $val_valor->ID_VALOR_CONTR : '';
$val_valor_contr_entr_parc	= isset($val_valor->VALOR_CONTR_ENTR_PARC) ? $val_valor->VALOR_CONTR_ENTR_PARC : '';
$val_valor_contr_tipo		= isset($val_valor->VALOR_CONTR_TIPO) ? $val_valor->VALOR_CONTR_TIPO : '';
$val_valor_contr			= isset($val_valor->VALOR_CONTR_VALOR_PARCELA) ? $val_valor->VALOR_CONTR_VALOR_PARCELA : '';
$val_valor_contr_qtde		= isset($val_valor->VALOR_CONTR_QTDE_VEZES) ? $val_valor->VALOR_CONTR_QTDE_VEZES : '';


if($val_id_valor_contr == '')	{
//////////////////////////// A VISTA
$sql_valor = mysqli_query($conexao,"select * from tb_valor_contratacao WHERE VALOR_CONTR_LEADS = '$ID_LEADS' AND VALOR_CONTR_STATUS < '3' AND VALOR_CONTR_ENTR_PARC = '3' ORDER BY ID_VALOR_CONTR DESC ");
$val_valor = mysqli_fetch_object($sql_valor);  
///////////////////////////////////////////////////////
$val_id_valor_contr			= isset($val_valor->ID_VALOR_CONTR) ? $val_valor->ID_VALOR_CONTR : '';
$val_valor_contr_entr_parc	= isset($val_valor->VALOR_CONTR_ENTR_PARC) ? $val_valor->VALOR_CONTR_ENTR_PARC : '';
$val_valor_contr_tipo		= isset($val_valor->VALOR_CONTR_TIPO) ? $val_valor->VALOR_CONTR_TIPO : '';
$val_valor_contr			= isset($val_valor->VALOR_CONTR_VALOR_PARCELA) ? $val_valor->VALOR_CONTR_VALOR_PARCELA : '';
$val_valor_contr_qtde		= isset($val_valor->VALOR_CONTR_QTDE_VEZES) ? $val_valor->VALOR_CONTR_QTDE_VEZES : '';
}


if($val_valor_contr_tipo == '')
$val_valor_contr_tipo = $val_entrada_valor_contr_tipo;
///////////////////////////////////////////////////////////////////////////////////////
$sql_operador = mysqli_query($conexao,"select * from tb_administrador WHERE ID_ADMINISTRADOR = '$LEADS_USER' ");
$val_operador = mysqli_fetch_object($sql_operador);  

$val_operador 					= isset($val_operador->ADMINISTRADOR_NOME) ? $val_operador->ADMINISTRADOR_NOME : '';
///////////////////////////////////////////////////////
/*
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
.style14 {
	font-family: calibri;
	font-size: 16x;
	color: #000;
}
.style15 {
	font-size: 18
}
.style18 {color: #000; font-family: calibri;}
.style24 {	font-size: 20px;
	color: #FFFFFF;
}
.style28 {font-size: 20px; font-weight: bold; font-family: calibri; }
.style30 {font-size: 18px; font-weight: bold; font-family: calibri; }
.style31 {font-family: calibri}
.style33 {color: #000; font-family: calibri; font-weight: bold; }
.style21 {	font-family: calibri;
	font-size: 16px;
}
.style22 {	font-family: calibri;
	font-size: 18px;
	color: #FFFFFF;
}
.style34 {font-size: 30px}
.style35 {font-family: calibri; font-size: 18px;}
-->
</style>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="style85"><img src="imagens/base-invisivel.png" width="400" height="8" /></td>
  </tr>
</table>
<table width="1000" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#e2e2e2">
  <tr>
    <td height="1405" align="center" valign="top" background="dist/img/marca-dagua.jpg"><table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td class="style85"><img src="imagens/base-invisivel.png" width="400" height="8" /></td>
      </tr>
    </table>
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="30%" height="64"><div align="center"><img src="dist/img/logo-avt-prime.png" width="260" height="96" /></div></td>
        </tr>
      </table>
      <br />
      <br />
      <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="960" height="30" bgcolor="#0B2232"><div align="center" class="style18 style24"><strong>CONTRATO DE PRESTAÇÃO DE SERVIÇOS DE REVISÃO DE CONTRATOS BANCÁRIOS</strong></div></td>
        </tr>
      </table>
      <br />
      <br />
      <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><span class="style28">CONTRATADA</span></td>
        </tr>
      </table>
      <table width="960" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#333333">
        <tr>
          <td height="50"><table width="940" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td><p align="justify" class="style18"><strong>PRIME ASSESSORIA E APOIO ADMINISTRATIVO LTDA</strong>, pessoa jurídica de Direito Privado,  regularmente Inscrita sob CNPJ nº 37.443.042/0001-07, com sede na Rua das Monções, 364 - Jardim, Santo André  - SP, 09090-521.</p></td>
              </tr>
          </table></td>
        </tr>
      </table>
      <br />
      <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="760"><span class="style30">CONTRATANTE</span></td>
          <td width="200"><span class="style30">DATA NASCIMENTO</span></td>
        </tr>
        <tr>
          <td><table width="750" border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#333333">
              <tr>
                <td height="30">&nbsp;<span class="style18"><?php echo $val_cliente_nome; ?></span></td>
              </tr>
          </table></td>
          <td><table width="200" border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#333333">
              <tr>
                <td height="30"><div align="center" class="style18"><?php echo $val_cliente_data_nasc; ?></div></td>
              </tr>
          </table></td>
        </tr>
      </table>
      <br />
      <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="210"><span class="style30">RG</span></td>
          <td width="210"><span class="style30">CPF/ CNPJ</span></td>
          <td width="275"><span class="style30">PROFISSÃO</span></td>
          <td width="265"><span class="style30">ESTADO CIVIL</span></td>
        </tr>
        <tr>
          <td><table width="200" border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#333333">
              <tr>
                <td height="30" class="style18">&nbsp;<?php echo $val_cliente_rg; ?></td>
              </tr>
          </table></td>
          <td><table width="200" border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#333333">
              <tr>
                <td height="30" class="style18">&nbsp;<?php echo $val_cliente_cpf; ?></td>
              </tr>
          </table></td>
          <td><table width="265" border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#333333">
              <tr>
                <td height="30" class="style18">&nbsp;<?php echo $val_cliente_profissao; ?></td>
              </tr>
          </table></td>
          <td><table width="265" border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#333333">
              <tr>
                <td height="30" class="style18">&nbsp;<?php echo $val_cliente_estado_civil; ?></td>
              </tr>
          </table></td>
        </tr>
      </table>
      <br />
      <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="420"><span class="style30">EMAIL</span></td>
          <td width="275"><span class="style30">TELEFONE 1 </span></td>
          <td width="265"><span class="style30">TELEFONE 2</span></td>
        </tr>
        <tr>
          <td><table width="410" border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#333333">
              <tr>
                <td height="30" class="style18">&nbsp;<?php echo $val_cliente_email; ?></td>
              </tr>
          </table></td>
          <td><table width="265" border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#333333">
              <tr>
                <td height="30" class="style18">&nbsp;<?php echo $val_cliente_tel1; ?></td>
              </tr>
          </table></td>
          <td><table width="265" border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#333333">
              <tr>
                <td height="30" class="style18">&nbsp;<?php echo $val_cliente_tel2; ?></td>
              </tr>
          </table></td>
        </tr>
      </table>
      <br />
      <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="760"><span class="style30">ENDEREÇO</span></td>
          <td width="200"><span class="style30">CEP</span></td>
        </tr>
        <tr>
          <td><table width="750" border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#333333">
              <tr>
                <td height="30">&nbsp;<span class="style18"><?php echo $val_cliente_endereco; ?>, <?php echo $val_cliente_n; ?> - <?php echo $val_cliente_bairro; ?> - <?php echo $val_cliente_cidade; ?> - <?php echo $val_cliente_uf; ?></span></td>
              </tr>
          </table></td>
          <td><table width="200" border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#333333">
              <tr>
                <td height="30"><span class="style18">&nbsp;<?php echo $val_cliente_cep; ?></span></td>
              </tr>
          </table></td>
        </tr>
      </table>
      <br />
      <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="380"><span class="style30">VALOR TOTAL DO CONTRATO</span></td>
          <td width="380"><span class="style30"><strong>VALOR  DE ENTRADA</strong></span></td>
          <td width="200"><span class="style30">DATA DO CONTRATO</span></td>
        </tr>
        <tr>
          <td><table width="370" border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#333333">
            <tr>
              <td height="30"><span class="style18">&nbsp;R$ 
<?php
$sql_total = mysqli_query($conexao,"select sum(cast(replace(replace(VALOR_CONTR_VALOR, '.', ''), ',', '.') as decimal(10,2))) FROM tb_valor_contratacao WHERE VALOR_CONTR_LEADS = '$ID_LEADS' AND VALOR_CONTR_STATUS < '3' ");
$sql_total = mysqli_fetch_array($sql_total);
echo $valor_total_contratado = number_format($sql_total[0], 2, ',', '.');
?>
</span></td>
            </tr>
          </table></td>
          <td><table width="370" border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#333333">
            <tr>
              <td height="30"><span class="style18">&nbsp;R$ 
<?php
$sql_total = mysqli_query($conexao,"select sum(cast(replace(replace(VALOR_CONTR_VALOR, '.', ''), ',', '.') as decimal(10,2))) FROM tb_valor_contratacao WHERE VALOR_CONTR_LEADS = '$ID_LEADS' AND VALOR_CONTR_STATUS < '3' AND VALOR_CONTR_ENTR_PARC = '1' ");
$sql_total = mysqli_fetch_array($sql_total);
echo $valor_total_contratado = number_format($sql_total[0], 2, ',', '.');
?>
</span></td>
            </tr>
          </table></td>
          <td><table width="200" border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#333333">
            <tr>
              <td height="30"><span class="style18">&nbsp;<?php echo $val_data_hist_leads; ?></span></td>
            </tr>
          </table></td>
        </tr>
      </table>
      <br />
      <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="209"><span class="style30">FORMA DE PAGAMENTO</span></td>
          <td width="210">&nbsp;</td>
          <td width="271">&nbsp;</td>
          <td width="270">&nbsp;</td>
        </tr>
        <tr>
          <td><table width="200" border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#333333">
              <tr>
                <td height="30"><span class="style18">&nbsp;&nbsp;&nbsp;(&nbsp;<strong>
<?php 
if($val_valor_contr_entr_parc == '3') 
echo "X";
else
echo " ";
?>
                </strong>&nbsp;) À VISTA</span></td>
              </tr>
          </table></td>
          <td><table width="200" border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#333333">
            <tr>
              <td height="30"><span class="style18">&nbsp;&nbsp;&nbsp;(&nbsp;<strong>
<?php 
if($val_valor_contr_entr_parc == '2') 
echo "X";
else
echo " ";
?>
              </strong>&nbsp;) PARCELADO</span></td>
            </tr>
          </table></td>
          <td><table width="260" border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#333333">
              <tr>
                <td height="30"><span class="style18">&nbsp;&nbsp;&nbsp;QUANTIDADE DE PARCELAS: <?php echo $val_valor_contr_qtde; ?></span></td>
              </tr>
          </table></td>
          <td><table width="270" border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#333333">
            <tr>
              <td height="30"><span class="style18">&nbsp;&nbsp;&nbsp;VALOR  DA PARCELA: R$ <?php echo $val_valor_contr; ?></span></td>
            </tr>
          </table></td>
        </tr>
      </table>
      <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="240">&nbsp;</td>
          <td width="240">&nbsp;</td>
          <td width="240">&nbsp;</td>
          <td width="240">&nbsp;</td>
        </tr>
        <tr>
          <td><table width="230" border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#333333">
              <tr>
                <td height="30"><span class="style18">&nbsp;&nbsp;&nbsp;(&nbsp;<strong>
<?php 
if(($val_valor_contr_tipo == '1') or ($val_valor_contr_tipo == '2')) 
echo "X";
else
echo " ";
?>
                </strong>&nbsp;) DINHEIRO OU DÉBITO</span></td>
              </tr>
          </table></td>
          <td><table width="230" border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#333333">
            <tr>
              <td height="30"><span class="style18">&nbsp;&nbsp;&nbsp;(&nbsp;<strong>
<?php 
if($val_valor_contr_tipo == '4') 
echo "X";
else
echo " ";
?>
              </strong>&nbsp;) BOLETO OU DEPÓSITO</span></td>
            </tr>
          </table></td>
          <td><table width="230" border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#333333">
            <tr>
              <td height="30"><span class="style18">&nbsp;&nbsp;&nbsp;(&nbsp;<strong>
<?php 
if($val_valor_contr_tipo == '6') 
echo "X";
else
echo " ";
?>
              </strong>&nbsp;) PIX OU TRANSFERÊNCIA</span></td>
            </tr>
          </table></td>
          <td><table width="240" border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#333333">
            <tr>
              <td height="30"><span class="style18">&nbsp;&nbsp;&nbsp;(&nbsp;<strong>
<?php 
if($val_valor_contr_tipo == '3') 
echo "X";
else
echo " ";
?>
              </strong>&nbsp;) CARTÃO DE CRÉDITO</span></td>
            </tr>
          </table></td>
        </tr>
      </table>
      <br />
      <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td class="style15 style31"><div align="justify">Decidem as partes, na melhor forma de direito,  celebrar o presente <strong>CONTRATO DE PRESTAÇÃO DE SERVIÇOS, </strong>que  reger-se-á mediante as  cláusulas e condições adiante estipuladas.<br />
                  <br />
                  <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="960" height="30" bgcolor="#0B2232"><div align="center" class="style18 style24">
                          <div align="left"><strong>&nbsp;CLÁUSULA 1ª – Do objeto.</strong></div>
                      </div></td>
                    </tr>
                  </table>
            <br />
            1.1.&nbsp;&nbsp;&nbsp;O  presente instrumento tem por objeto a prestação de serviços especializados em <strong><u>assessoria na revisão de contratos</u> <u>bancários de Financiamento de Veículo/Aliena</u>ç<u>ão Fiduciária/Empréstimos  pessoal e consignado,</u> </strong>tendo como objetivo principal a mediação  extrajudicial e/ou judicial entre as  partes do contrato bancário que o (a) <strong>CONTRATANTE </strong>pretende revisar. <strong></strong><br />
            <br />
            <table width="860" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#333333">
              <tr>
                <td height="30" colspan="2"><div align="center"><span class="style30">INFORMAÇÕES GERAIS SOBRE O CONTRATO OBJETO DESTE INSTRUMENTO</span></div></td>
              </tr>
              <?php
$v_bancos = mysqli_query($conexao,"select * from tb_bancos WHERE ID_BANCO = '$val_ficha_banco' ");
$v_bco = mysqli_fetch_object($v_bancos);  

$BANCO_NOME = isset($v_bco->BANCO_NOME) ? $v_bco->BANCO_NOME : '';
?>
              <tr>
                <td width="427" height="30"><strong>&nbsp;Banco  responsável:</strong> <?php echo $BANCO_NOME; ?></td>
                <td width="427"><strong>&nbsp;Valor  da parcela:</strong> R$ <?php echo $val_ficha_valor_parc; ?> </td>
              </tr>
              <tr>
                <td height="30"><strong>&nbsp;
<?php
if(($val_ficha_tipo == '3') or ($val_ficha_tipo == '5'))
echo "";
else
echo "Veículo: ";
?>
                </strong> <?php echo $val_ficha_veiculo; ?> </td>
                <td><strong>&nbsp;Parcelas  pagas:</strong> <?php echo $val_ficha_paga; ?> </td>
              </tr>
              <tr>
                <td height="30"><strong>&nbsp;Financiamento: </strong> R$ <?php echo $val_ficha_valor_fin; ?></td>
                <td><strong>&nbsp;Parcelas  atrasadas:</strong> <?php echo $val_ficha_atraso; ?> </td>
              </tr>
            </table>
            <p>              1.2.&nbsp;&nbsp;&nbsp;Entende-se  por <strong>Assessoria na revisão de contratos </strong>as  atividades de mediação extrajudicial com a Instituição Financeira, bem como, se necessário, o encaminhamento para  via judicial por meio da <em>Ação Revisional  de Contratos Bancários </em>através de escritórios parceiros. Utilizando para isto os documentos disponibilizados  pelo(a) <strong>CONTRATANTE</strong>, para dedicar-se  a <u>revisar</u> os itens do contrato objeto  da prestação de serviços.<br />
                <br />
              1.3.&nbsp;&nbsp;&nbsp;Os  serviços que serão prestados pela <strong>CONTRATADA </strong>terão total autonomia, liberdade de horário, sem pessoalidade e sem qualquer subordinação ao <strong>CONTRATANTE</strong>.</p>
            <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="960" height="30" bgcolor="#0B2232"><div align="center" class="style18 style24">
                    <div align="left"><strong>&nbsp;CLÁUSULA  2ª – Das obrigações da contratada.</strong></div>
                </div></td>
              </tr>
            </table>
            <p>              2.1.&nbsp;&nbsp;&nbsp;A <strong>CONTRATADA </strong>fica obrigada a promover o  serviço de assessoria visando assegurar  os interesses do(a) <strong>CONTRATANTE </strong>na esfera judicial, extrajudicial e/ou na esfera administrativa dependendo  de cada caso, com diligência  e dedicação.              </p>
            </div></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td align="center" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="2" bgcolor="#0B2232"><span class="style85"><img src="imagens/base-invisivel.png" width="400" height="8" /></span></td>
      </tr>
      <tr>
        <td width="910" height="30"><div align="center">
          <p class="style21">Rua das Monções, 364 - Jardim, Santo André - SP, 09090-521 - Telefone: (11) 93316-9272.</p>
          </div></td>
        <td width="50" bgcolor="#0B2232"><div align="center" class="style22">1</div></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="style85"><img src="imagens/base-invisivel.png" width="400" height="8" /></td>
  </tr>
</table>
<table width="1000" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#e2e2e2">
  <tr>
    <td height="1405" align="center" valign="top" background="dist/img/marca-dagua.jpg"><table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td class="style85"><img src="imagens/base-invisivel.png" width="400" height="8" /></td>
      </tr>
    </table>
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="30%" height="64"><div align="center"><img src="dist/img/logo-avt-prime.png" width="260" height="96" /></div></td>
        </tr>
      </table>
      <br />
      <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td class="style15 style31"><div align="justify">              2.2.&nbsp;&nbsp;&nbsp;Nos  termos da Lei nº 13.709/2018 (Lei Geral de Proteção de Dados), a <strong>CONTRATADA,  seus colaboradores, subcontratados, consultores e/ou prestadores de serviços </strong>ficam  obrigados a manter absoluto sigilo em relação  à prestação de serviços, principalmente de informações relacionadas  ao (a) <strong>CONTRATANTE</strong>, incluindo-se  dados pessoais que não sejam de conhecimento  público, que tenham sido obtidos por consequência da relação estabelecida, mesmo após a conclusão da prestação de serviços.
              <p>2.3.&nbsp;&nbsp;&nbsp;Compromete-se a <strong>CONTRATANTE </strong>a solicitar apenas as informações necessárias a execução  dos serviços objeto deste contrato  e a compartilhá-las apenas com quem for realizar a execução.<br />
                  <br />
                2.4.&nbsp;&nbsp;&nbsp;Fornecer todas as informações solicitadas pela <strong>CONTRATANTE </strong>e esclarecer quaisquer  dúvidas que possua sobre o procedimento, quantas  vezes forem necessárias, em tempo razoável,  pelos meios de comunicação estipulados nesse instrumento na cláusula 6ª.<br />
              </p>
              <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="960" height="30" bgcolor="#0B2232"><div align="center" class="style18 style24">
                  <div align="left"><strong>&nbsp;CLÁUSULA 3ª – Das obrigações do (a) contratante.</strong></div>
                </div></td>
              </tr>
            </table>
            <br />
            3.1.&nbsp;&nbsp;&nbsp;O (a) <strong>CONTRATANTE </strong>compromete-se a fornecer  toda documentação e informação necessárias ao início e ao desenvolvimento do objeto deste instrumento<strong>, </strong>qual seja a revisão  de contrato de financiamento na esfera judicial  e/ou extrajudicial, dentro de um tempo razoável  para evitar atrasos  ou interrupções dos procedimentos.<br />
            <br />
            3.2.&nbsp;&nbsp;&nbsp;O (a) <strong>CONTRATANTE </strong>compromete-se a pagar todas  as despesas derivadas da prestação de serviço, tais como laudo pericial, custas  processuais quando indeferida a  gratuidade, honorários de assistente técnico se for necessário à produção  de provas e/ou por determinação em juízo, honorários advocaticios da parte contrária em caso de sucumbência e despesas  com elaboração de conta de liquidação, viagens, certidões e averbações,  dentre outros.<br />
                        <br />
            3.3.&nbsp;&nbsp;&nbsp;O (a) <strong>CONTRATANTE </strong>deverá efetuar o pagamento  na forma e condições estabelecidas na cláusula quinta. Sendo iniciado o serviço pela <strong>CONTRATADA </strong>e não havendo a conclusão do pagamento por parte do (a) <strong>CONTRATANTE</strong>, este (a) assume o risco de  ter seu nome negativado pelos órgãos de proteção ao crédito, tais como SPC e SERASA.<br />
            <br />
            3.4.&nbsp;&nbsp;&nbsp;As informações prestadas pelo(a) <strong>CONTRATANTE </strong>à <strong>CONTRATADA </strong>para prestação de serviço serão de sua inteira responsabilidade, declarando desde já serem verdadeiras  sob as penas da lei.<br />
            <br />
            3.5.&nbsp;&nbsp;&nbsp;Fica  acordado que o (a) <strong>CONTRATANTE </strong>é  responsável pela <strong>entrega dos documentos  solicitados, </strong>estando ciente que, somente  após a disponibilização da documentação requerida à <strong>CONTRATADA</strong>,<strong> </strong>os procedimentos de assessoria serão iniciados.<br />
            <br />
            3.6.&nbsp;&nbsp;&nbsp;Em caso de acordo extrajudicial ou judicial, fica o(a) <strong>CONTRATANTE </strong>responsável pelo adimplemento do acordado, e em caso de  inadimplência da negociação avençada, fica a <strong>CONTRATADA </strong><u>desobr</u>ig<u>ada</u> de renegociar.<br />
            <br />
            3.7.&nbsp;&nbsp;&nbsp;O (a) <strong>CONTRATANTE </strong>fica obrigado(a) a, sempre que houver mudança  de endereço, telefone  ou e-mail, comunicar  imediatamente a <strong>CONTRATADA</strong>.<br />
            <br />
            3.8.&nbsp;&nbsp;&nbsp;A  inobservância por parte do(a<strong>)  CONTRATANTE</strong>, de qualquer cláusula deste instrumento acarretará na rescisão  do contrato, independentemente de notificações e avisos, ficando  sujeito ao pagamento  do serviço contratado.<br />
            <br />
            <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="960" height="30" bgcolor="#0B2232"><div align="center" class="style18 style24">
                  <div align="left"><strong>&nbsp;CLÁUSULA 4ª – Da prestação de serviço.</strong></div>
                </div></td>
              </tr>
            </table>
            <br />
            4.1.&nbsp;&nbsp;&nbsp;O (a) <strong>CONTRATANTE </strong>fica ciente que o presente instrumento de contrato tem por  objetivo a prestação de assessoria para revisão  de contratos bancários, não impedindo portanto a execução de outros  procedimentos como busca e apreensão, nome negativado,  protestos em cartório, dentre outros.<br />
            <br />
            4.2.&nbsp;&nbsp;&nbsp;O <strong>prazo </strong>para  prestação do serviço  é de 30 (trinta) a 90 (noventa)  dias na esfera extrajudicial, podendo  ser prorrogado.<br />
            <br />
            4.3.&nbsp;&nbsp;&nbsp;Não há  estimativa de prazo na esfera judicial, sendo este incalculável.<br />
            <br />
            4.4.&nbsp;&nbsp;&nbsp;A <strong>CONTRATADA </strong>se compromete a assessorar o (a) <strong>CONTRATANTE </strong>dentro dos limites do presente instrumento, com dedicação,  seriedade, ética e da forma e modo ajustados, seguindo as melhores e mais  atuais práticas do mercado, contudo,  sem garantia de êxito no feito.<br />
            <br />
          4.5.&nbsp;&nbsp;&nbsp;O  presente contrato não tem caráter personalíssimo, de modo que está a <strong>CONTRATADA </strong>autorizada a delegar  representação a outro(s) advogado(s) em qualquer ato processual ou extrajudicial em território nacional. </div></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td align="center" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="2" bgcolor="#0B2232"><span class="style85"><img src="imagens/base-invisivel.png" width="400" height="8" /></span></td>
      </tr>
      <tr>
        <td width="910" height="30"><div align="center"><span class="style21">Rua das Monções, 364 - Jardim, Santo André - SP, 09090-521 - Telefone: (11) 93316-9272.</span></div></td>
        <td width="50" bgcolor="#0B2232"><div align="center" class="style22">2</div></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="style85"><img src="imagens/base-invisivel.png" width="400" height="8" /></td>
  </tr>
</table>
<table width="1000" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#e2e2e2">
  <tr>
    <td height="1405" align="center" valign="top" background="dist/img/marca-dagua.jpg"><table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td class="style85"><img src="imagens/base-invisivel.png" width="400" height="8" /></td>
      </tr>
    </table>
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="30%" height="64"><div align="center"><img src="dist/img/logo-avt-prime.png" width="260" height="96" /></div></td>
        </tr>
      </table>
      <br />
      <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td class="style15 style31"><div align="justify">
              <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="960" height="30" bgcolor="#0B2232"><div align="center" class="style18 style24">
                      <div align="left"><strong>&nbsp;CLÁUSULA 5ª – Forma de pagamento,  reajuste e inadimplência.</strong></div>
                  </div></td>
                </tr>
              </table>
            <br />
            5.1.&nbsp;&nbsp;&nbsp;O  pagamento da prestação de serviço poderá ser realizado via PIX, boleto  bancário, cartão de crédito e/ou débito, desde que pago à empresa Prime Assessoria e Apoio Administrativo Ltda, portadora do CNPJ 37.443.042/0001-07.<br />
            <br />
            5.2.&nbsp;&nbsp;&nbsp;A <strong>CONTRATADA </strong>tem o direito de cobrar  multa de 2% (dois por cento) acrescido de correção monetária e juros de 1% ao  mês, caso venham a ocorrer atrasos no pagamento  do acordado, os quais serão cobrados no mês subsequente.<br />
            <br />
            5.3.&nbsp;&nbsp;&nbsp;Sendo  o atraso superior a 15 (quinze) dias corridos, tal fato desobrigará a <strong>CONTRATADA </strong>de dar continuidade aos  serviços, podendo, a seu critério,  desconsiderar o aviso prévio determinado neste instrumento e pausar imediatamente seus serviços, operando-se a rescisão automática, por insolvência do(a) <strong>CONTRATANTE</strong>.<br />
              <br />
              5.4.&nbsp;&nbsp;&nbsp;Os  valores avençados neste instrumento <strong>NÃO </strong>incluem  as despesas processuais, as quais, como estipulado na cláusula 3ª, deverão ser pagas à parte pelo(a) <strong>CONTRATANTE</strong>, caso necessárias ao bom  andamento do processo, das quais, todavia, serão pestadas contas pela <strong>CONTRATADA </strong>sempre que solicitado.<br />
              <br />
              5.5.&nbsp;&nbsp;&nbsp;O  cancelamento do presente contrato não contempla a restituição dos valores  pagos, salvo os casos em que o(a) CONTRATANTE estiver amparado(a) pelo disposto  no artigo 49 do CDC, hipótese na qual, tendo a CONTRATADA iniciado a prestação  de serviços, caberá multa por rescisão contratual ao CONTRATANTE no montante de  20% do valor do contrato.<br />
              <br />
              <!--
              5.6.   O (a) <strong>CONTRATANTE</strong> pode requerer o Chargeback, se,<u><strong> em até 90 dias</strong></u> após a assinatura do contrato e o primeiro pagamento, a prestação não for realizada no prazo e na forma acordadas.<br />
              <br />
-->
              <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="960" height="30" bgcolor="#0B2232"><div align="center" class="style18 style24">
                  <div align="left"><strong>&nbsp;CLÁUSULA 6ª – Da forma de comunicação.</strong></div>
                </div></td>
              </tr>
            </table>
            <p>6.1.&nbsp;&nbsp;&nbsp;Todas  as notificações, avisos ou comunicações deverão ser feitas por escrito e  deverão ser entregues por carta, correio eletrônico  (e-mail) ou whatsApp.</p>
            <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td><p>A <strong>CONTRATADA  deixa expresso estes dados para contato:</strong><br />
                  Endereço:  Rua das Monções, 364 - Jardim, Santo André - SP, 09090-521, <br />
                  E-mail: comercialavtprime@gmail.com / Tel.: (11) 93316-9272</p></td>
              </tr>
            </table>
            <p> 6.2.&nbsp;&nbsp;&nbsp;As comunicações serão consideradas entregues quando recebidas sob protocolo ou com “aviso de recebimento” expedido pela Empresa  Brasileira de Correios,  por telegrama, por e-mail nos endereços acima ou pela visualização no aplicativo de mensagem  WhatsApp.<br />
            </p>
            <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="960" height="30" bgcolor="#0B2232"><div align="center" class="style18 style24">
                  <div align="left"><strong>&nbsp;CLÁUSULA 7ª – Da duração do contrato e rescisões.</strong></div>
                </div></td>
              </tr>
            </table>
            <p> 7.1.&nbsp;&nbsp;&nbsp;Este contrato  perdurará enquanto houver  negociações pertinentes ao objeto elencado, sendo encerrado com a liquidação dos procedimentos ao caso concreto.  Fica estipulado que caso haja interferência direta ou indiretamente da parte <strong>CONTRATANTE </strong>nas negociações, a <strong>CONTRATADA </strong>poderá rescindir a prestação  de serviços desse instrumento imediatamente, isentando-se de qualquer responsabilidade superveniente.<br />
                <br />
                  <strong>Parágrafo único:</strong> Este contrato poderá ser rescindido a qualquer momento,  mediante justo motivo,  devendo as partes comunicar à outra por escrito, com prazo mínimo de  60 (sessenta) dias de antecedência.<br />
                    <br />
                  7.2.&nbsp;&nbsp;&nbsp;Na eventualidade do contrato ser rescindido pelo (a) <strong>CONTRATANTE </strong>durante a prestação do serviço, não implicará na devolução de qualquer valor pago. De modo diverso,  deverá o (a) <strong>CONTRATANTE </strong>efetuar o pagamento  dos valores já vencidos.<br />
                  </p>
            <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="960" height="30" bgcolor="#0B2232"><div align="center" class="style18 style24">
                    <div align="left"><strong>&nbsp;CLÁUSULA 8ª – Da cessão e transferência do contrato.</strong></div>
                </div></td>
              </tr>
            </table>
            <br />
8.1.&nbsp;&nbsp;&nbsp;É vedado  a qualquer das partes ceder ou transferir a terceiros os direitos e obrigações oriundas  do presente contrato  sem <u>prévio e expresso</u> consentimento de quaisquer das partes.<br />
<br />
8.2.&nbsp;&nbsp;&nbsp;Na eventualidade de ocorrer cessão ou transferência do contrato, obrigam-se os contratantes e seus sucessores(as).<br />
<br />
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="960" height="30" bgcolor="#0B2232"><div align="center" class="style18 style24">
                  <div align="left"><strong>&nbsp;CLÁUSULA 9ª – Da omissão contratual.</strong></div>
              </div></td>
            </tr>
          </table>
          <br />
9.1.&nbsp;&nbsp;&nbsp;Os casos omissos no presente contrato,  caso não dirimidos  por disposição legal, serão decididos  pelos representantes legais  das partes contratantes, e eventuais soluções  serão objeto de aditamento ao presente  contrato.</div></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td align="center" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="2" bgcolor="#0B2232"><span class="style85"><img src="imagens/base-invisivel.png" width="400" height="8" /></span></td>
      </tr>
      <tr>
        <td width="910" height="30"><div align="center"><span class="style21">Rua das Monções, 364 - Jardim, Santo André - SP, 09090-521 - Telefone: (11) 93316-9272.</span></div></td>
        <td width="50" bgcolor="#0B2232"><div align="center" class="style22">3</div></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="style85"><img src="imagens/base-invisivel.png" width="400" height="8" /></td>
  </tr>
</table>
<table width="1000" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#e2e2e2">
  <tr>
    <td height="1405" align="center" valign="top" background="dist/img/marca-dagua.jpg"><table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td class="style85"><img src="imagens/base-invisivel.png" width="400" height="8" /></td>
      </tr>
    </table>
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="30%" height="64"><div align="center"><img src="dist/img/logo-avt-prime.png" width="260" height="96" /></div></td>
        </tr>
      </table>
      <br />
      <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td class="style15 style31"><div align="justify">
            <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="960" height="30" bgcolor="#0B2232"><div align="center" class="style18 style24">
                  <div align="left"><strong>&nbsp;CLÁUSULA 10ª – Da extinção do contrato.</strong></div>
                </div></td>
              </tr>
            </table>
            <br />
            10.1.&nbsp;&nbsp;&nbsp;Será extinto o presente contrato quando ocorrer alguma das hipóteses  dispostas a seguir:&nbsp;
            <ul>
              <li>morte, em caso de o contrato ser firmado com  pessoa física; ou extinção,  caso o contrato tenha  sido  acordado entre pessoas jurídicas;<br />
              <br />
              </li>
              <li>Conclusão do serviço;<br />
              <br />
              </li>
              <li>Rescisão contratual em caso de falta de pagamento de qualquer uma das partes  ou caso haja alguma impossibilidade de o contrato ser continuado, por situações de força  maior ou de calamidade;</li>
            </ul>
            10.2.&nbsp;&nbsp;&nbsp;Quando o contrato for extinguido, deverá haver uma declaração do <strong>CONTRATANTE</strong> estabelecendo que o contrato  foi finalizado e extinto, para evitar problemas futuros.<br />
            <br />
            <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="960" height="30" bgcolor="#0B2232"><div align="center" class="style18 style24">
                  <div align="left"><strong>&nbsp;CLÁUSULA 11ª – Das disposições gerais.</strong></div>
                </div></td>
              </tr>
            </table>
            <br />
            11.1.&nbsp;&nbsp;&nbsp;O não  exercício, por qualquer da<u>s partes</u>, de qualquer dos direitos de que são  titulares por força deste instrumento, não configurará precedente  invocável pela outra nem tampouco  implicará novação ou alteração contratual. Fica esclarecido que todos os direitos contemplados neste instrumento são cumulativos, e não alternativos, quanto aos seus efeitos;<br />
            <br />
            11.2.&nbsp;&nbsp;&nbsp;Serão  consideradas nulas de pleno direito as declarações individuais de vontade das  partes contratantes emitidas de forma diversa  da pactuada neste contrato;<br />
            <br />
            11.3.&nbsp;&nbsp;&nbsp;As partes não poderão utilizar as informações ou os dados pessoais para fins distintos  da relação estabelecida, sendo vedada a transmissão dessa informação a terceiros.<br />
            <br />
            11.4.&nbsp;&nbsp;&nbsp;A invalidade ou não obrigatoriedade de qualquer termo ou disposição deste Contrato não afetará a validade ou obrigatoriedade  de quaisquer outros termos ou disposições aqui contidas.<br />
            <br />
            11.5.&nbsp;&nbsp;&nbsp;O (a) <strong>CONTRATANTE </strong>e a <strong>CONTRATADA</strong>, não serão responsáveis pelo cumprimento de suas respectivas obrigações, no caso de  evento que se caracterize caso fortuito ou força maior, previsto no Art. 393 do Código Civil Brasileiro.<br />
            <br />
            11.6.&nbsp;&nbsp;&nbsp;Fica  pactuado entre as partes <strong>CONTRATANTE</strong> e <strong>CONTRATADA</strong> que nenhuma das  partes poderá alegar teoria da imprevisão para  rediscutir este contrato pactuado entre as partes, bem como as partes assinarem este contrato por livre e espontânea vontade. <br />
            <br />
            <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="960" height="30" bgcolor="#0B2232"><div align="center" class="style18 style24">
                    <div align="left"><strong>&nbsp;CLÁUSULA 12ª: Do titulo executivo de crédito.</strong></div>
                </div></td>
              </tr>
            </table>
            <br />
12.1.&nbsp;&nbsp;&nbsp;O presente contrato tem a qualidade  de titulo executivo extrajudicial, nos termos  do artigo 784 III do Código de Processo Civil.<br />
          <br />
          <br />
          </div></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td align="center" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="2" bgcolor="#0B2232"><span class="style85"><img src="imagens/base-invisivel.png" width="400" height="8" /></span></td>
      </tr>
      <tr>
        <td width="910" height="30"><div align="center"><span class="style21">Rua das Monções, 364 - Jardim, Santo André - SP, 09090-521 - Telefone: (11) 93316-9272.</span></div></td>
        <td width="50" bgcolor="#0B2232"><div align="center" class="style22">4</div></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="style85"><img src="imagens/base-invisivel.png" width="400" height="8" /></td>
  </tr>
</table>
<table width="1000" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#e2e2e2">
  <tr>
    <td height="1405" align="center" valign="top" background="dist/img/marca-dagua.jpg"><table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td class="style85"><img src="imagens/base-invisivel.png" width="400" height="8" /></td>
      </tr>
    </table>
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="30%" height="64"><div align="center"><img src="dist/img/logo-avt-prime.png" width="260" height="96" /></div></td>
        </tr>
      </table>
      <br />
      <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td class="style15 style31"><div align="justify">
            <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="960" height="30" bgcolor="#0B2232"><div align="center" class="style18 style24">
                  <div align="left"><strong>&nbsp;CLÁUSULA 13ª – Do foro.</strong></div>
                </div></td>
              </tr>
            </table>
            <p>              13.1.&nbsp;&nbsp;&nbsp;Para dirimir os conﬂitos decorrentes deste contrato, fica eleito o foro da Comarca de São Paulo – SP, com expressa renúncia de qualquer outro, por mais privilegiado que  seja.<br />
              <br />
              13.2.&nbsp;&nbsp;&nbsp;Por estarem  de acordo com este contrato  em todas suas <strong>CLÁUSULAS </strong>e seu conteúdo,  as partes firmam o presente  em 02 (duas) vias de igual  teor, juntamente com duas Testemunhas a tudo presente.</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p align="center"> São Paulo, <?php echo $val_data_hist_leads_DIA; ?> de
              <?php 
if($val_data_hist_leads_MES == '1')
echo "Janeiro";
elseif($val_data_hist_leads_MES == '2')
echo "Fevereiro";
elseif($val_data_hist_leads_MES == '3')
echo "Março";
elseif($val_data_hist_leads_MES == '4')
echo "Abril";
elseif($val_data_hist_leads_MES == '5')
echo "Maio";
elseif($val_data_hist_leads_MES == '6')
echo "Junho";
elseif($val_data_hist_leads_MES == '7')
echo "Julho";
elseif($val_data_hist_leads_MES == '8')
echo "Agosto";
elseif($val_data_hist_leads_MES == '9')
echo "Setembro";
elseif($val_data_hist_leads_MES == '10')
echo "Outubro";
elseif($val_data_hist_leads_MES == '11')
echo "Novembro";
elseif($val_data_hist_leads_MES == '12')
echo "Dezembro";
?>
              de <?php echo $val_data_hist_leads_ANO; ?>. <br />
              <br />
              <br />
            </p>
            <br />
            <br />
            <br />
            <br />
            <br />
            <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="280"><div align="center" class="style14">
                  <p align="center"><br />
                    <br />
                    <br />
                    _________________________________</p>
                </div></td>
                <td width="340">&nbsp;</td>
                <td width="280" height="88" background="dist/img/assinatura-avt-prime-contrato.jpg"><div align="center" class="style14">
                  <p align="center"><br />
                    <br />
                    <br />
                    _________________________________</p>
                </div></td>
              </tr>
              <tr>
                <td class="style14"><div align="center">CONTRATANTE<br />
                    <span class="style33"><?php echo $val_cliente_nome; ?></span><br />
                </div></td>
                <td>&nbsp;</td>
                <td class="style14"><div align="center">CONTRATADA<br />
                    <strong>Prime Assessoria e Apoio 
                    Adm Ltda</strong></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="50">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><div align="center">_________________________________</div></td>
                <td>&nbsp;</td>
                <td><div align="left">_________________________________</div></td>
              </tr>
              <tr>
                <td><div align="center"><span class="style14">Testemunha</span></div></td>
                <td>&nbsp;</td>
                <td><div align="center"><span class="style14">Testemunha</span></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="50">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><div align="center">_________________________________</div></td>
                <td>&nbsp;</td>
                <td><div align="center">_________________________________</div></td>
              </tr>
              <tr>
                <td><div align="center"><span class="style14">CPF</span></div></td>
                <td>&nbsp;</td>
                <td><div align="center">CPF</div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="50">&nbsp;</td>
                <td>&nbsp;</td>
                <td><div align="center"><br />
                    <br />
                    <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $val_operador; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </u><br />
                </div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><div align="center">VENDEDOR</div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td height="88"><div align="center" class="style14"></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><div align="center"></div></td>
              </tr>
            </table>
            <br />
          </div></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td align="center" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="2" bgcolor="#0B2232"><span class="style85"><img src="imagens/base-invisivel.png" width="400" height="8" /></span></td>
      </tr>
      <tr>
        <td width="910" height="30"><div align="center"><span class="style21">Rua das Monções, 364 - Jardim, Santo André - SP, 09090-521 - Telefone: (11) 93316-9272.</span></div></td>
        <td width="50" bgcolor="#0B2232"><div align="center" class="style22">5</div></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="style85"><img src="imagens/base-invisivel.png" width="400" height="8" /></td>
  </tr>
</table>
<table width="1000" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#e2e2e2">
  <tr>
    <td height="1405" align="center" valign="top" background="dist/img/marca-dagua.jpg"><table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td class="style85"><img src="imagens/base-invisivel.png" width="400" height="8" /></td>
      </tr>
    </table>
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="30%" height="150" bgcolor="#0B2232"><div align="center" class="style18 style24">
                <div align="left"><strong>&nbsp;&nbsp;&nbsp;<span class="style34"><u>PROCURAÇÃO&nbsp;</u></span></strong></div>
            </div></td>
          </tr>
        </table>
      <br />
        <br />
        <br />
        <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><table width="960" border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#333333">
                <tr>
                  <td height="30"><span class="style30">&nbsp;<strong>OUTORGANTE</strong> <br />
                        <br />
                    </span><span class="style35">&nbsp;<strong>NOME:&nbsp;&nbsp;</strong>&nbsp;<span class="style18"><?php echo $val_cliente_nome; ?></span><br />
                      &nbsp;<strong>CPF/CNPJ:</strong>&nbsp;&nbsp;&nbsp;<span class="style18"><?php echo $val_cliente_cpf; ?></span><br />
                      &nbsp;<strong>RG:</strong> &nbsp;<span class="style18"><?php echo $val_cliente_rg; ?></span><br />
                      &nbsp;<strong>Endereço:</strong>&nbsp;&nbsp;<span class="style18"><?php echo $val_cliente_endereco; ?>, <?php echo $val_cliente_n; ?> - <?php echo $val_cliente_bairro; ?> - <?php echo $val_cliente_cidade; ?> - <?php echo $val_cliente_uf; ?></span> - <span class="style18"><?php echo $val_cliente_cep; ?></span><br />
                      &nbsp;<strong>E-mail:</strong>&nbsp;&nbsp;<span class="style18"><?php echo $val_cliente_email; ?></span></span></td>
                </tr>
            </table></td>
          </tr>
        </table>
      <br />
        <br />
        <br />
        <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><table width="960" border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#333333">
                <tr>
                  <td height="30"><span class="style30">&nbsp;<strong>OUTORGADO</strong><br />
                        <br />
                    </span><span class="style35">&nbsp;<strong>NOME:&nbsp;&nbsp;</strong>&nbsp;<span class="style18"><!-- Renato Príncipe Stevanin --></span><br />
                      &nbsp;<strong><span class="style30">OAB/SP Nº</span>:</strong>&nbsp;&nbsp;&nbsp;<span class="style18"><!-- 346.790 --></span><br />
                      &nbsp;<strong>Endereço:</strong>&nbsp;&nbsp;Rua das Monções, 364 - Jardim, Santo André - SP, 09090-521<br />
                      &nbsp;<strong>E-mail:</strong>&nbsp;&nbsp;comercialavtprime@gmail.com</span></td>
                </tr>
            </table></td>
          </tr>
        </table>
      <br />
        <br />
        <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td class="style15 style31"><div align="justify">
                <p>&nbsp;</p>
              <p><strong>PODERES</strong></p>
              <p>&nbsp; </p>
              <li>Poderes especiais para a defesa de seus direitos e  interesses referentes a reclamações administrativas, especialmente no site  consumidor.gov.br, podendo realizar reclamação, responder e solucionar  pendências, firmar acordos, juntar documentos, praticar enfim todos os atos  necessários ao bom e fiel cumprimento deste mandato.</li>
              </p>
                <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p align="center">São Paulo, <?php echo $val_data_hist_leads_DIA; ?> de
                <?php 
if($val_data_hist_leads_MES == '1')
echo "Janeiro";
elseif($val_data_hist_leads_MES == '2')
echo "Fevereiro";
elseif($val_data_hist_leads_MES == '3')
echo "Março";
elseif($val_data_hist_leads_MES == '4')
echo "Abril";
elseif($val_data_hist_leads_MES == '5')
echo "Maio";
elseif($val_data_hist_leads_MES == '6')
echo "Junho";
elseif($val_data_hist_leads_MES == '7')
echo "Julho";
elseif($val_data_hist_leads_MES == '8')
echo "Agosto";
elseif($val_data_hist_leads_MES == '9')
echo "Setembro";
elseif($val_data_hist_leads_MES == '10')
echo "Outubro";
elseif($val_data_hist_leads_MES == '11')
echo "Novembro";
elseif($val_data_hist_leads_MES == '12')
echo "Dezembro";
?>
                de <?php echo $val_data_hist_leads_ANO; ?>. <br />
                <br />
                <br />
                </p>
              <p><br />
                </p>
              <p><br />
                    <br />
                </p>
              <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="280" height="88"><div align="center" class="style14">
                        <p align="center"><br />
                            <br />
                            <br />
                          _________________________________________________</p>
                    </div></td>
                  </tr>
                  <tr>
                    <td class="style14"><div align="center"><span class="style33"><?php echo $val_cliente_nome; ?></span><br />
                    </div></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                </table>
              <p><br />
                </p>
            </div></td>
          </tr>
        </table>
      <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td align="center" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td bgcolor="#0B2232"><span class="style85"><img src="imagens/base-invisivel.png" width="400" height="8" /></span></td>
      </tr>
      <tr>
        <td height="30"><div align="center">
          <p class="style21">Rua das Monções, 364 - Jardim, Santo André - SP, 09090-521 - Telefone: (11) 93316-9272.</p>
        </div></td>
      </tr>
    </table></td>
  </tr>
</table>
