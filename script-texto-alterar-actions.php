<?php
//conectando a base de dados...
include "Connections/conecta_banco.php";

//Pegando os valores digitados no formulario de cadastro de clientes e armazenando em arrays super globais
$ID_SCRIPT 			= isset($_POST['ID_SCRIPT']) ? $_POST['ID_SCRIPT'] : '';
$SCRIPT_USER		= isset($_POST['SCRIPT_USER']) ? $_POST['SCRIPT_USER'] : '';
$SCRIPT_STATUS 		= isset($_POST['SCRIPT_STATUS']) ? $_POST['SCRIPT_STATUS'] : '';
$SCRIPT_DATA 		= date("Y/m/d");
$SCRIPT_TEXTO	 	= isset($_POST['SCRIPT_TEXTO']) ? $_POST['SCRIPT_TEXTO'] : '';
$SCRIPT_OBS 		= isset($_POST['SCRIPT_OBS']) ? $_POST['SCRIPT_OBS'] : '';

//$F_USER_REGISTRO = $_POST['F_USER_REGISTRO'];
//$DATA_CADATRO = date("d/m/Y");
//$HORA_CADASTRO = date("H:i");
//$IP_CADASTRO = $_SERVER['REMOTE_ADDR'];

$F_USER_ULT_ALTERACAO = $_POST['F_USER_REGISTRO'];
$DATA_ULT_ALTERACAO = date("d/m/Y");
$HORA_ULT_ALTERACAO = date("H:i");
$IP_ULT_ALTERACAO = $_SERVER['REMOTE_ADDR'];



//inserindo informoçoes na base...
$sql = "UPDATE tb_script SET
SCRIPT_USER='$SCRIPT_USER',
SCRIPT_STATUS='$SCRIPT_STATUS',
SCRIPT_DATA='$SCRIPT_DATA',
SCRIPT_TEXTO='$SCRIPT_TEXTO',
SCRIPT_OBS='$SCRIPT_OBS',
F_USER_ULT_ALTERACAO='$F_USER_ULT_ALTERACAO',
DATA_ULT_ALTERACAO='$DATA_ULT_ALTERACAO', 
HORA_ULT_ALTERACAO='$HORA_ULT_ALTERACAO', 
IP_ULT_ALTERACAO='$IP_ULT_ALTERACAO' 
WHERE ID_SCRIPT='$ID_SCRIPT';";

$res = mysqli_query ($conexao, $sql);

?>
<script language="javascript">
<!-- Caso a condição acima seja verdadeira o script abaiso será execultado-->
alert ('Script alterado com sucesso!');
location.href = 'script-texto.php';
</script>