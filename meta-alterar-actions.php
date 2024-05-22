<?php
//conectando a base de dados...
include "Connections/conecta_banco.php";

//Pegando os valores digitados no formulario de cadastro de clientes e armazenando em arrays super globais
$ID_META 		= isset($_POST['ID_META']) ? $_POST['ID_META'] : '';
$META_USER		= isset($_POST['META_USER']) ? $_POST['META_USER'] : '';
$META_STATUS 	= isset($_POST['META_STATUS']) ? $_POST['META_STATUS'] : '';
//$META_DATA 		= isset($_POST['META_DATA']) ? $_POST['META_DATA'] : '';
$META_DATA 		= date("Y/m/d");
$META_MES 		= isset($_POST['META_MES']) ? $_POST['META_MES'] : '';
$META_ANO 		= isset($_POST['META_ANO']) ? $_POST['META_ANO'] : '';
$META_VALOR 	= isset($_POST['META_VALOR']) ? $_POST['META_VALOR'] : '';

$META_VALOR_EQUIPE1 	= isset($_POST['META_VALOR_EQUIPE1']) ? $_POST['META_VALOR_EQUIPE1'] : '';
$META_VALOR_OPERADOR1 	= isset($_POST['META_VALOR_OPERADOR1']) ? $_POST['META_VALOR_OPERADOR1'] : '';
$META_VALOR_EQUIPE2 	= isset($_POST['META_VALOR_EQUIPE2']) ? $_POST['META_VALOR_EQUIPE2'] : '';
$META_VALOR_OPERADOR2 	= isset($_POST['META_VALOR_OPERADOR2']) ? $_POST['META_VALOR_OPERADOR2'] : '';
$META_VALOR_EQUIPE3 	= isset($_POST['META_VALOR_EQUIPE3']) ? $_POST['META_VALOR_EQUIPE3'] : '';
$META_VALOR_OPERADOR3 	= isset($_POST['META_VALOR_OPERADOR3']) ? $_POST['META_VALOR_OPERADOR3'] : '';
$META_VALOR_EQUIPE4 	= isset($_POST['META_VALOR_EQUIPE4']) ? $_POST['META_VALOR_EQUIPE4'] : '';
$META_VALOR_OPERADOR4 	= isset($_POST['META_VALOR_OPERADOR4']) ? $_POST['META_VALOR_OPERADOR4'] : '';

$META_OBS		= isset($_POST['META_OBS']) ? $_POST['META_OBS'] : '';

//$F_USER_REGISTRO = $_POST['F_USER_REGISTRO'];
//$DATA_CADATRO = date("d/m/Y");
//$HORA_CADASTRO = date("H:i");
//$IP_CADASTRO = $_SERVER['REMOTE_ADDR'];

$F_USER_ULT_ALTERACAO = $_POST['F_USER_REGISTRO'];
$DATA_ULT_ALTERACAO = date("d/m/Y");
$HORA_ULT_ALTERACAO = date("H:i");
$IP_ULT_ALTERACAO = $_SERVER['REMOTE_ADDR'];



//inserindo informoçoes na base...
$sql = "UPDATE tb_metas SET
META_STATUS='$META_STATUS',
META_MES='$META_MES',
META_ANO='$META_ANO',
META_VALOR='$META_VALOR',
META_VALOR_EQUIPE1='$META_VALOR_EQUIPE1',
META_VALOR_OPERADOR1='$META_VALOR_OPERADOR1',
META_VALOR_EQUIPE2='$META_VALOR_EQUIPE2',
META_VALOR_OPERADOR2='$META_VALOR_OPERADOR2',
META_VALOR_EQUIPE3='$META_VALOR_EQUIPE3',
META_VALOR_OPERADOR3='$META_VALOR_OPERADOR3',
META_VALOR_EQUIPE4='$META_VALOR_EQUIPE4',
META_VALOR_OPERADOR4='$META_VALOR_OPERADOR4',
META_OBS='$META_OBS',
F_USER_ULT_ALTERACAO='$F_USER_ULT_ALTERACAO',
DATA_ULT_ALTERACAO='$DATA_ULT_ALTERACAO', 
HORA_ULT_ALTERACAO='$HORA_ULT_ALTERACAO', 
IP_ULT_ALTERACAO='$IP_ULT_ALTERACAO' 
WHERE ID_META='$ID_META';";
$res = mysqli_query ($conexao, $sql);

?>
<script language="javascript">
<!-- Caso a condição acima seja verdadeira o script abaiso será execultado-->
//alert ('Dados alterado com sucesso!');
location.href = 'principal-meta.php';
</script>