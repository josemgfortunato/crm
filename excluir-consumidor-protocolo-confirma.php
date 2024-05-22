<?php 
require_once('Connections/conecta_banco.php'); 
///


$ID_LEADS 					= isset($_GET['ID_LEADS']) ? $_GET['ID_LEADS'] : '';
$ID_CONSUMIDOR_PROTOCOLO 	= isset($_GET['ID_CONSUMIDOR_PROTOCOLO']) ? $_GET['ID_CONSUMIDOR_PROTOCOLO'] : '';

$F_USER_ULT_ALTERACAO = isset($_COOKIE["USER_NOME"]) ? $_COOKIE["USER_NOME"] : '';
$DATA_ULT_ALTERACAO = date("d/m/Y");
$HORA_ULT_ALTERACAO = date("H:i");
$IP_ULT_ALTERACAO = $_SERVER['REMOTE_ADDR'];


//////////////////////////
$sql = "UPDATE tb_consumidor_protocolo SET
CONSUMIDOR_PROTOCOLO_STATUS='3',
F_USER_ULT_ALTERACAO='$F_USER_ULT_ALTERACAO', 
DATA_ULT_ALTERACAO='$DATA_ULT_ALTERACAO', 
HORA_ULT_ALTERACAO='$HORA_ULT_ALTERACAO', 
IP_ULT_ALTERACAO='$IP_ULT_ALTERACAO'
WHERE ID_CONSUMIDOR_PROTOCOLO='$ID_CONSUMIDOR_PROTOCOLO';";
$res = mysqli_query ($conexao, $sql);

?>
<script language="javascript">
//alert ('Cadastro apagado com sucesso!');
location.href = 'juridico-consumidor-protocolo.php?ID_LEADS=<?php echo $ID_LEADS; ?>&&ID_CONSUMIDOR_PROTOCOLO=<?php echo $ID_CONSUMIDOR_PROTOCOLO; ?>';
</script>
