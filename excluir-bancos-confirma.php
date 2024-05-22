<?php 
require_once('Connections/conecta_banco.php'); 
///


$ID_BANCO 			= isset($_GET['ID_BANCO']) ? $_GET['ID_BANCO'] : '';

$F_USER_ULT_ALTERACAO = isset($_COOKIE["USER_NOME"]) ? $_COOKIE["USER_NOME"] : '';
$DATA_ULT_ALTERACAO = date("d/m/Y");
$HORA_ULT_ALTERACAO = date("H:i");
$IP_ULT_ALTERACAO = $_SERVER['REMOTE_ADDR'];


//////////////////////////
$sql = "UPDATE tb_bancos SET
BANCO_STATUS='3',
F_USER_ULT_ALTERACAO='$F_USER_ULT_ALTERACAO', 
DATA_ULT_ALTERACAO='$DATA_ULT_ALTERACAO', 
HORA_ULT_ALTERACAO='$HORA_ULT_ALTERACAO', 
IP_ULT_ALTERACAO='$IP_ULT_ALTERACAO'
WHERE ID_BANCO='$ID_BANCO';";
$res = mysqli_query ($conexao, $sql);

?>
<script language="javascript">
//alert ('Cadastro apagado com sucesso!');
location.href = 'principal-bancos.php';
</script>
