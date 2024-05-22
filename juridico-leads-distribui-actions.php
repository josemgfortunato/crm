<?php
//conectando a base de dados...
include "Connections/conecta_banco.php";

$ID_USER 		= isset($_COOKIE["ID_USER"]) ? $_COOKIE["ID_USER"] : '';
$F_OPERADOR		= isset($_GET['F_OPERADOR']) ? $_GET['F_OPERADOR'] : '';

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////	SELECIONA o LOG		/////////////////////
$sql_log = mysqli_query($conexao,"select * from tb_log_dist_leads_juridico ORDER BY LOG_DIST_JUR_COD DESC");
$val_log = mysqli_fetch_object($sql_log);  
///////////////////////////////////////////////////////
$LOG_DIST_JUR_COD 	= isset($val_log->LOG_DIST_JUR_COD) ? $val_log->LOG_DIST_JUR_COD : '';
if($LOG_DIST_JUR_COD == '')
$LOG_DIST_JUR_COD = '1';
else
$LOG_DIST_JUR_COD = $LOG_DIST_JUR_COD + 1;



while ($id = current($_GET['ID_LEADS'])) {
   next($_GET['ID_LEADS']);
//   echo $id;

//echo $id;
//echo "<br>";

$sql_result = mysqli_query($conexao,"select * from tb_leads WHERE ID_LEADS = '$id' ");
$val_leads = mysqli_fetch_object($sql_result);  
///////////////////////////////////////////////////////

$ID_LEADS 			= isset($val_leads->ID_LEADS) ? $val_leads->ID_LEADS : '';
//$LEADS_USER 			= isset($val_leads->LEADS_USER) ? $val_leads->LEADS_USER : '';
//$LEADS_STATUS 		= isset($val_leads->LEADS_STATUS) ? $val_leads->LEADS_STATUS : '';
//$LEADS_TIPO 			= isset($val_leads->LEADS_TIPO) ? $val_leads->LEADS_TIPO : '';
//$LEADS_FORNECEDOR 	= isset($val_leads->LEADS_FORNECEDOR) ? $val_leads->LEADS_FORNECEDOR : '';
//$LEADS_PRIORIDADE 	= isset($val_leads->LEADS_PRIORIDADE) ? $val_leads->LEADS_PRIORIDADE : '';
//$LEADS_DISTRIBUIDO 	= isset($val_leads->LEADS_DISTRIBUIDO) ? $val_leads->LEADS_DISTRIBUIDO : '';
//$LEADS_DISTRIBUIDO_DATA 	= isset($val_leads->LEADS_DISTRIBUIDO_DATA) ? $val_leads->LEADS_DISTRIBUIDO_DATA : '';
//$LEADS_DATA 			= isset($val_leads->LEADS_DATA) ? $val_leads->LEADS_DATA : '';
//$LEADS_NOME		 	= isset($val_leads->LEADS_NOME) ? $val_leads->LEADS_NOME : '';
//$LEADS_EMAIL 			= isset($val_leads->LEADS_EMAIL) ? $val_leads->LEADS_EMAIL : '';
//$LEADS_TEL1		 	= isset($val_leads->LEADS_TEL1) ? $val_leads->LEADS_TEL1 : '';
//$LEADS_TEL2		 	= isset($val_leads->LEADS_TEL2) ? $val_leads->LEADS_TEL2 : '';
//$LEADS_OBS 			= isset($val_leads->LEADS_OBS) ? $val_leads->LEADS_OBS : '';

$LEADS_JURIDICO_DISTRIBUIDO_DATA = date("Y/m/d");

$F_USER_ULT_ALTERACAO	= isset($_GET['F_USER_REGISTRO']) ? $_GET['F_USER_REGISTRO'] : '';
$DATA_ULT_ALTERACAO 	= date("d/m/Y");
$HORA_ULT_ALTERACAO 	= date("H:i");
$IP_ULT_ALTERACAO 		= $_SERVER['REMOTE_ADDR'];

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////	UPATE NA TABELA LEADS		/////////////////////

$sql = "UPDATE tb_leads_juridico SET
LEADS_JURIDICO_USER='$F_OPERADOR',
LEADS_JURIDICO_DISTRIBUIDO='1',
LEADS_JURIDICO_DISTRIBUIDO_DATA='$LEADS_JURIDICO_DISTRIBUIDO_DATA',
F_USER_ULT_ALTERACAO='$F_USER_ULT_ALTERACAO',
DATA_ULT_ALTERACAO='$DATA_ULT_ALTERACAO',
HORA_ULT_ALTERACAO='$HORA_ULT_ALTERACAO',
IP_ULT_ALTERACAO='$IP_ULT_ALTERACAO'
WHERE LEADS_JURIDICO_LEADS='$ID_LEADS';";
$res = mysqli_query ($conexao, $sql);




$F_USER_REGISTRO	= isset($_GET['F_USER_REGISTRO']) ? $_GET['F_USER_REGISTRO'] : '';
$DATA_CADATRO = date("d/m/Y");
$HORA_CADASTRO = date("H:i");
$IP_CADASTRO = $_SERVER['REMOTE_ADDR'];

$F_USER_ULT_ALTERACAO = '';
$DATA_ULT_ALTERACAO = '';
$HORA_ULT_ALTERACAO = '';
$IP_ULT_ALTERACAO = '';
//inserindo informoçoes na base...
mysqli_query ($conexao,"INSERT INTO tb_log_dist_leads_juridico (ID_LOG_DIST_JUR, LOG_DIST_JUR_USER, LOG_DIST_JUR_OPERADOR, LOG_DIST_JUR_COD, LOG_DIST_JUR_LEADS, F_USER_REGISTRO, DATA_CADATRO, HORA_CADASTRO, IP_CADASTRO, F_USER_ULT_ALTERACAO, DATA_ULT_ALTERACAO, HORA_ULT_ALTERACAO, IP_ULT_ALTERACAO) VALUES (null, '$ID_USER', '$F_OPERADOR', '$LOG_DIST_JUR_COD', '$ID_LEADS', '$F_USER_REGISTRO', '$DATA_CADATRO', '$HORA_CADASTRO', '$IP_CADASTRO', '$F_USER_ULT_ALTERACAO', '$DATA_ULT_ALTERACAO', '$HORA_ULT_ALTERACAO', '$IP_ULT_ALTERACAO')");
if (mysqli_affected_rows ($conexao)>0);
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
}




$t_leads = mysqli_query($conexao,"select count(*) as total FROM tb_log_dist_leads_juridico WHERE LOG_DIST_JUR_COD = '$LOG_DIST_JUR_COD' ");
$t_leads = mysqli_fetch_array($t_leads);
$t_leads = $t_leads[0];


$sql_operador = mysqli_query($conexao,"select * from tb_administrador WHERE ID_ADMINISTRADOR = '$F_OPERADOR' ");
$val_operador = mysqli_fetch_object($sql_operador);  
///////////////////////////////////////////////////////
$ADMINISTRADOR_NOME 	= isset($val_operador->ADMINISTRADOR_NOME) ? $val_operador->ADMINISTRADOR_NOME : '';
?>
<script language="javascript">
<!-- Caso a condição acima seja verdadeira o script abaiso será execultado-->
alert ('(<?php echo $t_leads; ?> LEADS) enviados para (<?php echo $ADMINISTRADOR_NOME; ?>)!');
location.href = 'principal-juridico-leads-distribuir.php';
</script>