<?php
//conectando a base de dados...
include "Connections/conecta_banco.php";

//Pegando os valores digitados no formulario de cadastro de clientes e armazenando em arrays super globais
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

$LEADS_NOME 		= isset($_POST['LEADS_NOME']) ? $_POST['LEADS_NOME'] : '';
$LEADS_EMAIL		= isset($_POST['LEADS_EMAIL']) ? $_POST['LEADS_EMAIL'] : '';
$LEADS_TEL1			= isset($_POST['LEADS_TEL1']) ? $_POST['LEADS_TEL1'] : '';
$LEADS_TEL2			= isset($_POST['LEADS_TEL2']) ? $_POST['LEADS_TEL2'] : '';

$LEADS_TIPO_FINANCIAMENTO	= isset($_POST['LEADS_TIPO_FINANCIAMENTO']) ? $_POST['LEADS_TIPO_FINANCIAMENTO'] : '';
$LEADS_VALOR				= isset($_POST['LEADS_VALOR']) ? $_POST['LEADS_VALOR'] : '';
$LEADS_QTDE_PARCELAS		= isset($_POST['LEADS_QTDE_PARCELAS']) ? $_POST['LEADS_QTDE_PARCELAS'] : '';
$LEADS_VALOR_FINANCIAMENTO	= isset($_POST['LEADS_VALOR_FINANCIAMENTO']) ? $_POST['LEADS_VALOR_FINANCIAMENTO'] : '';

$LEADS_TEL3					= isset($_POST['LEADS_TEL3']) ? $_POST['LEADS_TEL3'] : '';
$LEADS_TEL4					= isset($_POST['LEADS_TEL4']) ? $_POST['LEADS_TEL4'] : '';

$LEADS_HORA					= isset($_POST['LEADS_HORA']) ? $_POST['LEADS_HORA'] : '';

$LEADS_OBS 			= isset($_POST['LEADS_OBS']) ? $_POST['LEADS_OBS'] : '';

//$F_USER_REGISTRO = $_POST['F_USER_REGISTRO'];
//$DATA_CADATRO = date("d/m/Y");
//$HORA_CADASTRO = date("H:i");
//$IP_CADASTRO = $_SERVER['REMOTE_ADDR'];

$F_USER_ULT_ALTERACAO = $_POST['F_USER_REGISTRO'];
$DATA_ULT_ALTERACAO = date("d/m/Y");
$HORA_ULT_ALTERACAO = date("H:i");
$IP_ULT_ALTERACAO = $_SERVER['REMOTE_ADDR'];



//inserindo informo�oes na base...
$sql = "UPDATE tb_leads SET
LEADS_STATUS='$LEADS_STATUS',
LEADS_TIPO='$LEADS_TIPO',
LEADS_FORNECEDOR='$LEADS_FORNECEDOR',
LEADS_DATA='$LEADS_DATA',
LEADS_NOME='$LEADS_NOME',
LEADS_EMAIL='$LEADS_EMAIL',
LEADS_TEL1='$LEADS_TEL1',
LEADS_TEL2='$LEADS_TEL2',
LEADS_TIPO_FINANCIAMENTO='$LEADS_TIPO_FINANCIAMENTO',
LEADS_VALOR='$LEADS_VALOR',
LEADS_QTDE_PARCELAS='$LEADS_QTDE_PARCELAS',
LEADS_VALOR_FINANCIAMENTO='$LEADS_VALOR_FINANCIAMENTO',
LEADS_OBS='$LEADS_OBS',
F_USER_ULT_ALTERACAO='$F_USER_ULT_ALTERACAO',
DATA_ULT_ALTERACAO='$DATA_ULT_ALTERACAO', 
HORA_ULT_ALTERACAO='$HORA_ULT_ALTERACAO', 
IP_ULT_ALTERACAO='$IP_ULT_ALTERACAO' 
WHERE ID_LEADS='$ID_LEADS';";
$res = mysqli_query ($conexao, $sql);

?>
<script language="javascript">
<!-- Caso a condi��o acima seja verdadeira o script abaiso ser� execultado-->
//alert ('Dados alterado com sucesso!');
location.href = 'principal-leads.php';
</script>