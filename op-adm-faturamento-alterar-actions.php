<?php
//conectando a base de dados...
include "Connections/conecta_banco.php";

//Pegando os valores digitados no formulario de cadastro de clientes e armazenando em arrays super globais
$ID_OP_ADM 			= isset($_POST['ID_OP_ADM']) ? $_POST['ID_OP_ADM'] : '';
$OP_ADM_USER		= isset($_POST['OP_ADM_USER']) ? $_POST['OP_ADM_USER'] : '';
$OP_ADM_STATUS 		= isset($_POST['OP_ADM_STATUS']) ? $_POST['OP_ADM_STATUS'] : '';

/*
$OP_ADM_DATA 		= isset($_POST['OP_ADM_DATA']) ? $_POST['OP_ADM_DATA'] : '';
IF($OP_ADM_DATA > '')	{
$OP_ADM_DATA_DIA = substr($OP_ADM_DATA, 0, 2);
$OP_ADM_DATA_MES = substr($OP_ADM_DATA, 3, 2);
$OP_ADM_DATA_ANO = substr($OP_ADM_DATA, 6, 4);
$OP_ADM_DATA = $OP_ADM_DATA_ANO.'/'.$OP_ADM_DATA_MES.'/'.$OP_ADM_DATA_DIA;
} else	{
	$OP_ADM_DATA = '0000/00/00';
}
*/
$OP_ADM_STATUS_DATA = date("Y/m/d");

$OP_ADM_LEADS 		= isset($_POST['OP_ADM_LEADS']) ? $_POST['OP_ADM_LEADS'] : '';
$OP_ADM_FATURAMENTO 		= isset($_POST['OP_ADM_FATURAMENTO']) ? $_POST['OP_ADM_FATURAMENTO'] : '';

$OP_ADM_OBS 		= isset($_POST['OP_ADM_OBS']) ? $_POST['OP_ADM_OBS'] : '';


//$F_USER_REGISTRO = $_POST['F_USER_REGISTRO'];
//$DATA_CADATRO = date("d/m/Y");
//$HORA_CADASTRO = date("H:i");
//$IP_CADASTRO = $_SERVER['REMOTE_ADDR'];

$F_USER_ULT_ALTERACAO = $_POST['F_USER_REGISTRO'];
$DATA_ULT_ALTERACAO = date("d/m/Y");
$HORA_ULT_ALTERACAO = date("H:i");
$IP_ULT_ALTERACAO = $_SERVER['REMOTE_ADDR'];



//inserindo informoçoes na base...
$sql = "UPDATE tb_leads_op_adm SET
OP_ADM_USER='$OP_ADM_USER',
OP_ADM_FATURAMENTO='$OP_ADM_FATURAMENTO',
F_USER_ULT_ALTERACAO='$F_USER_ULT_ALTERACAO',
DATA_ULT_ALTERACAO='$DATA_ULT_ALTERACAO', 
HORA_ULT_ALTERACAO='$HORA_ULT_ALTERACAO', 
IP_ULT_ALTERACAO='$IP_ULT_ALTERACAO' 
WHERE ID_OP_ADM='$ID_OP_ADM';";
$res = mysqli_query ($conexao, $sql);

?>
<script language="javascript">
<!-- Caso a condição acima seja verdadeira o script abaiso será execultado-->
alert ('Status alterado com sucesso!');
//location.href = 'juridico-leads-pendente-doc.php?ID_LEADS=<?php echo $OP_ADM_LEADS; ?>';
location.href = 'op-adm-doc.php?ID_LEADS=<?php echo $OP_ADM_LEADS; ?>';
</script>