<?php 
require_once('Connections/conecta_banco.php'); 
///


$ID_LEADS 				= isset($_GET['ID_LEADS']) ? $_GET['ID_LEADS'] : '';
$ID_LEADS_JURIDICO_DOC 	= isset($_GET['ID_LEADS_JURIDICO_DOC']) ? $_GET['ID_LEADS_JURIDICO_DOC'] : '';

$F_USER_ULT_ALTERACAO = isset($_COOKIE["USER_NOME"]) ? $_COOKIE["USER_NOME"] : '';
$DATA_ULT_ALTERACAO = date("d/m/Y");
$HORA_ULT_ALTERACAO = date("H:i");
$IP_ULT_ALTERACAO = $_SERVER['REMOTE_ADDR'];


//////////////////////////
$sql = "UPDATE tb_leads_juridico_doc SET
LEADS_JURIDICO_DOC_STATUS='3',
F_USER_ULT_ALTERACAO='$F_USER_ULT_ALTERACAO', 
DATA_ULT_ALTERACAO='$DATA_ULT_ALTERACAO', 
HORA_ULT_ALTERACAO='$HORA_ULT_ALTERACAO', 
IP_ULT_ALTERACAO='$IP_ULT_ALTERACAO'
WHERE ID_LEADS_JURIDICO_DOC='$ID_LEADS_JURIDICO_DOC';";
$res = mysqli_query ($conexao, $sql);

?>
<script language="javascript">
//alert ('Cadastro apagado com sucesso!');
location.href = 'juridico-leads-pendente-doc.php?ID_LEADS=<?php echo $ID_LEADS; ?>';
</script>
