<?php 
require_once('Connections/conecta_banco.php'); 
///


$ID_ADMINISTRADOR 			= isset($_GET['ID_ADMINISTRADOR']) ? $_GET['ID_ADMINISTRADOR'] : '';
$ID_SUPERVISOR_USER 		= isset($_GET['ID_SUPERVISOR_USER']) ? $_GET['ID_SUPERVISOR_USER'] : '';

$F_USER_ULT_ALTERACAO = isset($_COOKIE["USER_NOME"]) ? $_COOKIE["USER_NOME"] : '';
$DATA_ULT_ALTERACAO = date("d/m/Y");
$HORA_ULT_ALTERACAO = date("H:i");
$IP_ULT_ALTERACAO = $_SERVER['REMOTE_ADDR'];


//////////////////////////
$sql = "UPDATE tb_supervisor_user SET
SUPERVISOR_USER_STATUS='3',
F_USER_ULT_ALTERACAO='$F_USER_ULT_ALTERACAO', 
DATA_ULT_ALTERACAO='$DATA_ULT_ALTERACAO', 
HORA_ULT_ALTERACAO='$HORA_ULT_ALTERACAO', 
IP_ULT_ALTERACAO='$IP_ULT_ALTERACAO'
WHERE ID_SUPERVISOR_USER='$ID_SUPERVISOR_USER';";
$res = mysqli_query ($conexao, $sql);

?>
<script language="javascript">
//alert ('Cadastro apagado com sucesso!');
location.href = 'supervisor-user.php?ID_ADMINISTRADOR=<?php echo $ID_ADMINISTRADOR ; ?>';
</script>
