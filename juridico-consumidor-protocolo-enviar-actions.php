<?php
//conectando a base de dados...
include "Connections/conecta_banco.php";
include "valida_cookie_admin.php";

//Pegando os valores digitados no formulario de cadastro de clientes e armazenando em arrays super globais
$ID_LEADS 				= isset($_GET['ID_LEADS']) ? $_GET['ID_LEADS'] : '';

$ID_LEADS_JURIDICO 			= isset($_GET['ID_LEADS_JURIDICO']) ? $_GET['ID_LEADS_JURIDICO'] : '';
$LEADS_JURIDICO_USER		= isset($_GET['LEADS_JURIDICO_USER']) ? $_GET['LEADS_JURIDICO_USER'] : '';
$LEADS_JURIDICO_LEADS 		= isset($_GET['LEADS_JURIDICO_LEADS']) ? $_GET['LEADS_JURIDICO_LEADS'] : '';
//$LEADS_JURIDICO_OBS 		= isset($_GET['LEADS_JURIDICO_OBS']) ? $_GET['LEADS_JURIDICO_OBS'] : '';

$LEADS_JURIDICO_CONSUMIDOR_USER = $ID_USER;
$LEADS_JURIDICO_CONSUMIDOR_RECEBIDO = '1';
$LEADS_JURIDICO_CONSUMIDOR_DATA_RECEBIDO = date("Y/m/d");

//$F_USER_REGISTRO = $_GET['F_USER_REGISTRO'];
//$DATA_CADATRO = date("d/m/Y");
//$HORA_CADASTRO = date("H:i");
//$IP_CADASTRO = $_SERVER['REMOTE_ADDR'];

$F_USER_ULT_ALTERACAO = $USER_NOME;
//$F_USER_ULT_ALTERACAO = $_GET['F_USER_REGISTRO'];
$DATA_ULT_ALTERACAO = date("d/m/Y");
$HORA_ULT_ALTERACAO = date("H:i");
$IP_ULT_ALTERACAO = $_SERVER['REMOTE_ADDR'];



//inserindo informoçoes na base...
$sql = "UPDATE tb_leads_juridico SET
LEADS_JURIDICO_CONSUMIDOR_USER='$LEADS_JURIDICO_CONSUMIDOR_USER',
LEADS_JURIDICO_CONSUMIDOR_RECEBIDO='$LEADS_JURIDICO_CONSUMIDOR_RECEBIDO',
LEADS_JURIDICO_CONSUMIDOR_DATA_RECEBIDO='$LEADS_JURIDICO_CONSUMIDOR_DATA_RECEBIDO',
F_USER_ULT_ALTERACAO='$F_USER_ULT_ALTERACAO',
DATA_ULT_ALTERACAO='$DATA_ULT_ALTERACAO', 
HORA_ULT_ALTERACAO='$HORA_ULT_ALTERACAO', 
IP_ULT_ALTERACAO='$IP_ULT_ALTERACAO' 
WHERE ID_LEADS_JURIDICO='$ID_LEADS_JURIDICO';";
$res = mysqli_query ($conexao, $sql);

?>
<script language="javascript">
<!-- Caso a condição acima seja verdadeira o script abaiso será execultado-->
//alert ('Status alterado com sucesso!');
//location.href = 'juridico-leads-pendente-doc.php?ID_LEADS=<?php echo $LEADS_JURIDICO_LEADS; ?>';
location.href = 'principal-consumidor-aguardando-consumidor.php';
</script>