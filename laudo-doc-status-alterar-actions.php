<?php
//conectando a base de dados...
include "Connections/conecta_banco.php";

//Pegando os valores digitados no formulario de cadastro de clientes e armazenando em arrays super globais
$ID_LAUDO 				= isset($_POST['ID_LAUDO']) ? $_POST['ID_LAUDO'] : '';
$LAUDO_USER				= isset($_POST['LAUDO_USER']) ? $_POST['LAUDO_USER'] : '';
$LAUDO_PROCESSUAL_DOC 	= isset($_POST['LAUDO_PROCESSUAL_DOC']) ? $_POST['LAUDO_PROCESSUAL_DOC'] : '';
$LAUDO_LEADS 			= isset($_POST['LAUDO_LEADS']) ? $_POST['LAUDO_LEADS'] : '';

//$F_USER_REGISTRO = $_POST['F_USER_REGISTRO'];
//$DATA_CADATRO = date("d/m/Y");
//$HORA_CADASTRO = date("H:i");
//$IP_CADASTRO = $_SERVER['REMOTE_ADDR'];

$F_USER_ULT_ALTERACAO = $_POST['F_USER_REGISTRO'];
$DATA_ULT_ALTERACAO = date("d/m/Y");
$HORA_ULT_ALTERACAO = date("H:i");
$IP_ULT_ALTERACAO = $_SERVER['REMOTE_ADDR'];



//inserindo informoçoes na base...
$sql = "UPDATE tb_laudo SET
LAUDO_USER='$LAUDO_USER',
LAUDO_PROCESSUAL_DOC='$LAUDO_PROCESSUAL_DOC',
F_USER_ULT_ALTERACAO='$F_USER_ULT_ALTERACAO',
DATA_ULT_ALTERACAO='$DATA_ULT_ALTERACAO', 
HORA_ULT_ALTERACAO='$HORA_ULT_ALTERACAO', 
IP_ULT_ALTERACAO='$IP_ULT_ALTERACAO' 
WHERE ID_LAUDO='$ID_LAUDO';";
$res = mysqli_query ($conexao, $sql);

?>
<script language="javascript">
<!-- Caso a condição acima seja verdadeira o script abaiso será execultado-->
alert ('Status do Doc alterado com sucesso!');
location.href = 'laudo-doc-processual.php?ID_LEADS=<?php echo $LAUDO_LEADS; ?>';
</script>