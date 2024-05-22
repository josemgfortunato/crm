<?php
//conectando a base de dados...
include "Connections/conecta_banco.php";

//Pegando os valores digitados no formulario de cadastro de clientes e armazenando em arrays super globais
$ID_MSG 		= isset($_POST['ID_MSG']) ? $_POST['ID_MSG'] : '';
$MSG_USER		= isset($_POST['MSG_USER']) ? $_POST['MSG_USER'] : '';
$MSG_STATUS 	= isset($_POST['MSG_STATUS']) ? $_POST['MSG_STATUS'] : '';
$MSG_DATA 		= date("Y/m/d");
$MSG_TEXTO 	= isset($_POST['MSG_TEXTO']) ? $_POST['MSG_TEXTO'] : '';
$MSG_OBS 		= isset($_POST['MSG_OBS']) ? $_POST['MSG_OBS'] : '';

//$F_USER_REGISTRO = $_POST['F_USER_REGISTRO'];
//$DATA_CADATRO = date("d/m/Y");
//$HORA_CADASTRO = date("H:i");
//$IP_CADASTRO = $_SERVER['REMOTE_ADDR'];

$F_USER_ULT_ALTERACAO = $_POST['F_USER_REGISTRO'];
$DATA_ULT_ALTERACAO = date("d/m/Y");
$HORA_ULT_ALTERACAO = date("H:i");
$IP_ULT_ALTERACAO = $_SERVER['REMOTE_ADDR'];



//inserindo informoçoes na base...
$sql = "UPDATE tb_msg SET
MSG_USER='$MSG_USER',
MSG_STATUS='$MSG_STATUS',
MSG_DATA='$MSG_DATA',
MSG_TEXTO='$MSG_TEXTO',
MSG_OBS='$MSG_OBS',
F_USER_ULT_ALTERACAO='$F_USER_ULT_ALTERACAO',
DATA_ULT_ALTERACAO='$DATA_ULT_ALTERACAO', 
HORA_ULT_ALTERACAO='$HORA_ULT_ALTERACAO', 
IP_ULT_ALTERACAO='$IP_ULT_ALTERACAO' 
WHERE ID_MSG='$ID_MSG';";

$res = mysqli_query ($conexao, $sql);

?>
<script language="javascript">
<!-- Caso a condição acima seja verdadeira o script abaiso será execultado-->
alert ('Mensagem alterada com sucesso!');
location.href = 'mensagem-dia.php';
</script>