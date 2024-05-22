<?php
//conectando a base de dados...
//include "Connections/conecta_banco.php";
include "valida_cookie_admin.php";

//Pegando os valores digitados no formulario de cadastro de clientes e armazenando em arrays super globais
$ID_OP_ADM 				= isset($_GET['ID_OP_ADM']) ? $_GET['ID_OP_ADM'] : '';
//$OP_ADM_USER			= isset($_GET['OP_ADM_USER']) ? $_GET['OP_ADM_USER'] : '';
$OP_ADM_USER			= $ID_USER;
$OP_ADM_STATUS 			= isset($_GET['OP_ADM_STATUS']) ? $_GET['OP_ADM_STATUS'] : '';

//$OP_ADM_DATA = '0000/00/00';
$OP_ADM_DATA = date('Y/m/d');
//$OP_ADM_OPRADOR 		= isset($_GET['OP_ADM_OPRADOR']) ? $_GET['OP_ADM_OPRADOR'] : '';
$OP_ADM_OPRADOR			= $ID_USER;

$OP_ADM_LEADS 			= isset($_GET['ID_LEADS']) ? $_GET['ID_LEADS'] : '';

//$OP_ADM_DATA_ENVIO_JUR 			= isset($_GET['OP_ADM_DATA_ENVIO_JUR']) ? $_GET['OP_ADM_DATA_ENVIO_JUR'] : '';
$OP_ADM_DATA_ENVIO_JUR 	= '0000/00/00';
$OP_ADM_USER_ENVIO_JUR 	= isset($_GET['OP_ADM_USER_ENVIO_JUR']) ? $_GET['OP_ADM_USER_ENVIO_JUR'] : '';
$OP_ADM_ENVIA_JUR 		= isset($_GET['OP_ADM_ENVIA_JUR']) ? $_GET['OP_ADM_ENVIA_JUR'] : '';
$OP_ADM_FATURAMENTO		= isset($_GET['OP_ADM_FATURAMENTO']) ? $_GET['OP_ADM_FATURAMENTO'] : '';

$OP_ADM_OBS 			= isset($_GET['OP_ADM_OBS']) ? $_GET['OP_ADM_OBS'] : '';


//$F_USER_REGISTRO = $_GET['F_USER_REGISTRO'];
$F_USER_REGISTRO = $USER_NOME;
$DATA_CADATRO = date("d/m/Y");
$HORA_CADASTRO = date("H:i");
$IP_CADASTRO = $_SERVER['REMOTE_ADDR'];

//$F_USER_ULT_ALTERACAO = $_GET['F_USER_REGISTRO'];
//$DATA_ULT_ALTERACAO = date("d/m/Y");
//$HORA_ULT_ALTERACAO = date("H:i");
//$IP_ULT_ALTERACAO = $_SERVER['REMOTE_ADDR'];

$F_USER_ULT_ALTERACAO = '';
$DATA_ULT_ALTERACAO = '';
$HORA_ULT_ALTERACAO = '';
$IP_ULT_ALTERACAO = '';


//inserindo informoçoes na base...
mysqli_query ($conexao,"INSERT INTO tb_leads_op_adm (ID_OP_ADM, OP_ADM_USER, OP_ADM_STATUS, OP_ADM_DATA, OP_ADM_OPRADOR, OP_ADM_LEADS, OP_ADM_DATA_ENVIO_JUR, OP_ADM_USER_ENVIO_JUR, OP_ADM_ENVIA_JUR, OP_ADM_FATURAMENTO, OP_ADM_OBS, F_USER_REGISTRO, DATA_CADATRO, HORA_CADASTRO, IP_CADASTRO, F_USER_ULT_ALTERACAO, DATA_ULT_ALTERACAO, HORA_ULT_ALTERACAO, IP_ULT_ALTERACAO) VALUES (null, '$OP_ADM_USER', '$OP_ADM_STATUS', '$OP_ADM_DATA', '$OP_ADM_OPRADOR', '$OP_ADM_LEADS', '$OP_ADM_DATA_ENVIO_JUR', '$OP_ADM_USER_ENVIO_JUR', '$OP_ADM_ENVIA_JUR', '$OP_ADM_FATURAMENTO', '$OP_ADM_OBS', '$F_USER_REGISTRO', '$DATA_CADATRO', '$HORA_CADASTRO', '$IP_CADASTRO', '$F_USER_ULT_ALTERACAO', '$DATA_ULT_ALTERACAO', '$HORA_ULT_ALTERACAO', '$IP_ULT_ALTERACAO')");
//if (mysqli_affected_rows ($conexao)>0);

?>
<script language="javascript">
<!-- Caso a condição acima seja verdadeira o script abaiso será execultado-->
alert ('LEADS enviado com sucesso!');
location.href = 'principal-leads-operador-acordo.php';
</script>