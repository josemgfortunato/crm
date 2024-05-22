<?php
$ID_LEADS 			= isset($_POST['ID_LEADS']) ? $_POST['ID_LEADS'] : '';
$LEADS_USER		 	= isset($_POST['LEADS_USER']) ? $_POST['LEADS_USER'] : '';
$LEADS_STATUS 		= isset($_POST['LEADS_STATUS']) ? $_POST['LEADS_STATUS'] : '';
$LEADS_TIPO 		= isset($_POST['LEADS_TIPO']) ? $_POST['LEADS_TIPO'] : '';
$LEADS_FORNECEDOR 	= isset($_POST['LEADS_FORNECEDOR']) ? $_POST['LEADS_FORNECEDOR'] : '';

$LEADS_SUPERVISOR 				= isset($_POST['LEADS_SUPERVISOR']) ? $_POST['LEADS_SUPERVISOR'] : '';
$LEADS_DISTRIBUIDO_SUP 			= isset($_POST['LEADS_DISTRIBUIDO_SUP']) ? $_POST['LEADS_DISTRIBUIDO_SUP'] : '';
$LEADS_DISTRIBUIDO_SUP_DATA 	= isset($_POST['LEADS_DISTRIBUIDO_SUP_DATA']) ? $_POST['LEADS_DISTRIBUIDO_SUP_DATA'] : '';
IF($LEADS_DISTRIBUIDO_SUP_DATA > '')	{
$LEADS_DISTRIBUIDO_SUP_DATA_DIA = substr($LEADS_DISTRIBUIDO_SUP_DATA, 0, 2);
$LEADS_DISTRIBUIDO_SUP_DATA_MES = substr($LEADS_DISTRIBUIDO_SUP_DATA, 3, 2);
$LEADS_DISTRIBUIDO_SUP_DATA_ANO = substr($LEADS_DISTRIBUIDO_SUP_DATA, 6, 4);
$LEADS_DISTRIBUIDO_SUP_DATA = $LEADS_DISTRIBUIDO_SUP_DATA_ANO.'/'.$LEADS_DISTRIBUIDO_SUP_DATA_MES.'/'.$LEADS_DISTRIBUIDO_SUP_DATA_DIA;
} else	{
	$LEADS_DISTRIBUIDO_SUP_DATA = '0000/00/00';
}

//$LEADS_PRIORIDADE 	= isset($_POST['LEADS_PRIORIDADE']) ? $_POST['LEADS_PRIORIDADE'] : '';
$LEADS_PRIORIDADE 	= '1';
$LEADS_DISTRIBUIDO 	= isset($_POST['LEADS_DISTRIBUIDO']) ? $_POST['LEADS_DISTRIBUIDO'] : '';
$LEADS_DISTRIBUIDO_DATA 		= isset($_POST['LEADS_DISTRIBUIDO_DATA']) ? $_POST['LEADS_DISTRIBUIDO_DATA'] : '';
IF($LEADS_DISTRIBUIDO_DATA > '')	{
$LEADS_DISTRIBUIDO_DATA_DIA = substr($LEADS_DISTRIBUIDO_DATA, 0, 2);
$LEADS_DISTRIBUIDO_DATA_MES = substr($LEADS_DISTRIBUIDO_DATA, 3, 2);
$LEADS_DISTRIBUIDO_DATA_ANO = substr($LEADS_DISTRIBUIDO_DATA, 6, 4);
$LEADS_DISTRIBUIDO_DATA = $LEADS_DISTRIBUIDO_DATA_ANO.'/'.$LEADS_DISTRIBUIDO_DATA_MES.'/'.$LEADS_DISTRIBUIDO_DATA_DIA;
} else	{
	$LEADS_DISTRIBUIDO_DATA = '0000/00/00';
}

$LEADS_DATA 		= isset($_POST['LEADS_DATA']) ? $_POST['LEADS_DATA'] : '';
IF($LEADS_DATA > '')	{
$LEADS_DATA_DIA = substr($LEADS_DATA, 0, 2);
$LEADS_DATA_MES = substr($LEADS_DATA, 3, 2);
$LEADS_DATA_ANO = substr($LEADS_DATA, 6, 4);
$LEADS_DATA = $LEADS_DATA_ANO.'/'.$LEADS_DATA_MES.'/'.$LEADS_DATA_DIA;
} else	{
	$LEADS_DATA = '0000/00/00';
}

//$LEADS_NOME 		= isset($_POST['LEADS_NOME']) ? $_POST['LEADS_NOME'] : '';
//$LEADS_EMAIL		= isset($_POST['LEADS_EMAIL']) ? $_POST['LEADS_EMAIL'] : '';
//$LEADS_TEL1			= isset($_POST['LEADS_TEL1']) ? $_POST['LEADS_TEL1'] : '';
//$LEADS_TEL2			= isset($_POST['LEADS_TEL2']) ? $_POST['LEADS_TEL2'] : '';
$LEADS_OBS 			= isset($_POST['LEADS_OBS']) ? $_POST['LEADS_OBS'] : '';

echo $F_LEADS		= isset($_POST['F_LEADS']) ? $_POST['F_LEADS'] : '';
echo "<br>";
echo "<br>";
echo "<br>";

$LEADS_TIPO_FINANCIAMENTO = "";
$LEADS_VALOR = "";
$LEADS_QTDE_PARCELAS = "";


$F_USER_REGISTRO = $_POST['F_USER_REGISTRO'];
$DATA_CADATRO = date("d/m/Y");
$HORA_CADASTRO = date("H:i");
$IP_CADASTRO = $_SERVER['REMOTE_ADDR'];

//$F_USER_ULT_ALTERACAO = $_POST['F_USER_REGISTRO'];
//$DATA_ULT_ALTERACAO = date("d/m/Y");
//$HORA_ULT_ALTERACAO = date("H:i");
//$IP_ULT_ALTERACAO = $_SERVER['REMOTE_ADDR'];

$F_USER_ULT_ALTERACAO = '';
$DATA_ULT_ALTERACAO = '';
$HORA_ULT_ALTERACAO = '';
$IP_ULT_ALTERACAO = '';
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



////// FORNECEDOR DANIEL
if($LEADS_FORNECEDOR == '1')
include "leads-supervisor-massa-cadastrar-actions.php";

////// FORNECEDOR JULIO
elseif($LEADS_FORNECEDOR == '2')
include "leads-supervisor-massa-cadastrar-actions.php";

////// FORNECEDOR SITE
elseif($LEADS_FORNECEDOR == '3')
include "leads-supervisor-massa-cadastrar-actions.php";

////// FORNECEDOR GOOGLE
elseif($LEADS_FORNECEDOR == '4')
include "leads-supervisor-massa-cadastrar-actions.php";

////// FORNECEDOR INSTAGRAM
elseif($LEADS_FORNECEDOR == '5')
include "leads-supervisor-massa-cadastrar-actions.php";

////// FORNECEDOR FACEBOOK
elseif($LEADS_FORNECEDOR == '6')
include "leads-supervisor-massa-cadastrar-actions.php";

////// FORNECEDOR INDICAÇÃO
elseif($LEADS_FORNECEDOR == '7')
include "leads-supervisor-massa-cadastrar-actions.php";

////// FORNECEDOR OUTROS
elseif($LEADS_FORNECEDOR == '8')
include "leads-supervisor-massa-cadastrar-actions.php";

////// FORNECEDOR FACEBOOK
//elseif($LEADS_FORNECEDOR == '6')
//include "leads-massa-facebook-cadastrar-actions.php";

?>