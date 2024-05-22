<?php
//conectando a base de dados...
include "Connections/conecta_banco.php";

//Pegando os valores digitados no formulario de cadastro de clientes e armazenando em arrays super globais
$ID_LEADS_JURIDICO 			= isset($_POST['ID_LEADS_JURIDICO']) ? $_POST['ID_LEADS_JURIDICO'] : '';
$LEADS_JURIDICO_USER		= isset($_POST['LEADS_JURIDICO_USER']) ? $_POST['LEADS_JURIDICO_USER'] : '';
$LEADS_JURIDICO_SENHA_GOV 		= isset($_POST['LEADS_JURIDICO_SENHA_GOV']) ? $_POST['LEADS_JURIDICO_SENHA_GOV'] : '';
$LEADS_JURIDICO_STATUS_DOC 		= isset($_POST['LEADS_JURIDICO_STATUS_DOC']) ? $_POST['LEADS_JURIDICO_STATUS_DOC'] : '';

$LEADS_JURIDICO_LEADS 		= isset($_POST['LEADS_JURIDICO_LEADS']) ? $_POST['LEADS_JURIDICO_LEADS'] : '';
//$LEADS_JURIDICO_OBS 		= isset($_POST['LEADS_JURIDICO_OBS']) ? $_POST['LEADS_JURIDICO_OBS'] : '';


//$F_USER_REGISTRO = $_POST['F_USER_REGISTRO'];
//$DATA_CADATRO = date("d/m/Y");
//$HORA_CADASTRO = date("H:i");
//$IP_CADASTRO = $_SERVER['REMOTE_ADDR'];

$F_USER_ULT_ALTERACAO = $_POST['F_USER_REGISTRO'];
$DATA_ULT_ALTERACAO = date("d/m/Y");
$HORA_ULT_ALTERACAO = date("H:i");
$IP_ULT_ALTERACAO = $_SERVER['REMOTE_ADDR'];



//inserindo informoçoes na base...
$sql = "UPDATE tb_leads_juridico SET
LEADS_JURIDICO_USER='$LEADS_JURIDICO_USER',
LEADS_JURIDICO_SENHA_GOV='$LEADS_JURIDICO_SENHA_GOV',
LEADS_JURIDICO_STATUS_DOC='$LEADS_JURIDICO_STATUS_DOC',
F_USER_ULT_ALTERACAO='$F_USER_ULT_ALTERACAO',
DATA_ULT_ALTERACAO='$DATA_ULT_ALTERACAO', 
HORA_ULT_ALTERACAO='$HORA_ULT_ALTERACAO', 
IP_ULT_ALTERACAO='$IP_ULT_ALTERACAO' 
WHERE ID_LEADS_JURIDICO='$ID_LEADS_JURIDICO';";
$res = mysqli_query ($conexao, $sql);

?>
<script language="javascript">
<!-- Caso a condição acima seja verdadeira o script abaiso será execultado-->
alert ('Status alterado com sucesso!');
//location.href = 'juridico-leads-pendente-doc.php?ID_LEADS=<?php echo $LEADS_JURIDICO_LEADS; ?>';
location.href = 'juridico-leads-pendente-doc.php?ID_LEADS=<?php echo $LEADS_JURIDICO_LEADS; ?>';
</script>