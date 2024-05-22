<?php
//conectando a base de dados...
//include "Connections/conecta_banco.php";
include "valida_cookie_admin.php";

//Pegando os valores digitados no formulario de cadastro de clientes e armazenando em arrays super globais
$ID_PROCESSUAL 							= isset($_GET['ID_PROCESSUAL']) ? $_GET['ID_PROCESSUAL'] : '';
$PROCESSUAL_USER							= isset($_GET['PROCESSUAL_USER']) ? $_GET['PROCESSUAL_USER'] : '';
$PROCESSUAL_STATUS 						= isset($_GET['PROCESSUAL_STATUS']) ? $_GET['PROCESSUAL_STATUS'] : '';
//$PROCESSUAL_TIPO 						= isset($_GET['PROCESSUAL_TIPO']) ? $_GET['PROCESSUAL_TIPO'] : '';
$PROCESSUAL_TIPO = '1';
$PROCESSUAL_LEADS 						= isset($_GET['ID_LEADS']) ? $_GET['ID_LEADS'] : '';

$PROCESSUAL_ENVIO_USER	= $ID_USER;
$PROCESSUAL_ENVIO_DATA = date('Y/m/d');

$PROCESSUAL_PROCESSO	= "";
$PROCESSUAL_PROCESSO_USER = "";
$PROCESSUAL_PROCESSO_DATA = '0000/00/00';

$PROCESSUAL_OBS 					= isset($_GET['PROCESSUAL_OBS']) ? $_GET['PROCESSUAL_OBS'] : '';

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
mysqli_query ($conexao,"INSERT INTO tb_processual (ID_PROCESSUAL, PROCESSUAL_USER, PROCESSUAL_STATUS, PROCESSUAL_TIPO, PROCESSUAL_LEADS, PROCESSUAL_ENVIO_USER, PROCESSUAL_ENVIO_DATA, PROCESSUAL_PROCESSO, PROCESSUAL_PROCESSO_USER, PROCESSUAL_PROCESSO_DATA, PROCESSUAL_OBS, F_USER_REGISTRO, DATA_CADATRO, HORA_CADASTRO, IP_CADASTRO, F_USER_ULT_ALTERACAO, DATA_ULT_ALTERACAO, HORA_ULT_ALTERACAO, IP_ULT_ALTERACAO) VALUES (null, '$PROCESSUAL_USER', '$PROCESSUAL_STATUS', '$PROCESSUAL_TIPO', '$PROCESSUAL_LEADS', '$PROCESSUAL_ENVIO_USER', '$PROCESSUAL_ENVIO_DATA', '$PROCESSUAL_PROCESSO', '$PROCESSUAL_PROCESSO_USER', '$PROCESSUAL_PROCESSO_DATA', '$PROCESSUAL_OBS', '$F_USER_REGISTRO', '$DATA_CADATRO', '$HORA_CADASTRO', '$IP_CADASTRO', '$F_USER_ULT_ALTERACAO', '$DATA_ULT_ALTERACAO', '$HORA_ULT_ALTERACAO', '$IP_ULT_ALTERACAO')");
if (mysqli_affected_rows ($conexao)>0);




/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
$ID_LAUDO 						= isset($_GET['ID_LAUDO']) ? $_GET['ID_LAUDO'] : '';
$LAUDO_ENVIO_PROCESSUAL			= '1';
$LAUDO_ENVIO_PROCESSUAL_USER	= $ID_USER;
$LAUDO_ENVIO_PROCESSUAL_DATA  	= date('Y/m/d');

//inserindo informoçoes na base...
$sql = "UPDATE tb_laudo SET
LAUDO_ENVIO_PROCESSUAL='$LAUDO_ENVIO_PROCESSUAL',
LAUDO_ENVIO_PROCESSUAL_USER='$LAUDO_ENVIO_PROCESSUAL_USER',
LAUDO_ENVIO_PROCESSUAL_DATA='$LAUDO_ENVIO_PROCESSUAL_DATA',
F_USER_ULT_ALTERACAO='$F_USER_ULT_ALTERACAO',
DATA_ULT_ALTERACAO='$DATA_ULT_ALTERACAO', 
HORA_ULT_ALTERACAO='$HORA_ULT_ALTERACAO', 
IP_ULT_ALTERACAO='$IP_ULT_ALTERACAO' 
WHERE ID_LAUDO='$ID_LAUDO';";
$res = mysqli_query ($conexao, $sql);


?>
<script language="javascript">
<!-- Caso a condição acima seja verdadeira o script abaiso será execultado-->
alert ('PASTA enviado com sucesso!');
location.href = 'principal-laudo-gerado.php';
S</script>