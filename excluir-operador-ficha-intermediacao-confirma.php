<?php 
require_once('Connections/conecta_banco.php'); 
///


$ID_VALOR_CONTR 	= isset($_GET['ID_VALOR_CONTR']) ? $_GET['ID_VALOR_CONTR'] : '';
$ID_LEADS 			= isset($_GET['ID_LEADS']) ? $_GET['ID_LEADS'] : '';

$F_USER_ULT_ALTERACAO = isset($_COOKIE["USER_NOME"]) ? $_COOKIE["USER_NOME"] : '';
$DATA_ULT_ALTERACAO = date("d/m/Y");
$HORA_ULT_ALTERACAO = date("H:i");
$IP_ULT_ALTERACAO = $_SERVER['REMOTE_ADDR'];


//////////////////////////
$sql = "UPDATE tb_valor_contratacao SET
VALOR_CONTR_STATUS='3',
F_USER_ULT_ALTERACAO='$F_USER_ULT_ALTERACAO', 
DATA_ULT_ALTERACAO='$DATA_ULT_ALTERACAO', 
HORA_ULT_ALTERACAO='$HORA_ULT_ALTERACAO', 
IP_ULT_ALTERACAO='$IP_ULT_ALTERACAO'
WHERE ID_VALOR_CONTR='$ID_VALOR_CONTR';";
$res = mysqli_query ($conexao, $sql);

?>
<script language="javascript">
//alert ('Cadastro apagado com sucesso!');
location.href = 'operador-ficha-intermediacao.php?ID_LEADS=<?php echo $ID_LEADS ; ?>';
</script>
