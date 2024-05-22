<?php
//conectando a base de dados...
include "Connections/conecta_banco.php";

//Pegando os valores digitados no formulario de cadastro de clientes e armazenando em arrays super globais
$ID_LEADS_JURIDICO_HIST 			= isset($_POST['ID_LEADS_JURIDICO_HIST']) ? $_POST['ID_LEADS_JURIDICO_HIST'] : '';
$LEADS_JURIDICO_HIST_USER 			= isset($_POST['LEADS_JURIDICO_HIST_USER']) ? $_POST['LEADS_JURIDICO_HIST_USER'] : '';	
$LEADS_JURIDICO_HIST_STATUS 		= isset($_POST['LEADS_JURIDICO_HIST_STATUS']) ? $_POST['LEADS_JURIDICO_HIST_STATUS'] : '';	
$LEADS_JURIDICO_HIST_LEADS 	= isset($_POST['LEADS_JURIDICO_HIST_LEADS']) ? $_POST['LEADS_JURIDICO_HIST_LEADS'] : '';	

$LEADS_JURIDICO_HIST_DATA 			= isset($_POST['LEADS_JURIDICO_HIST_DATA']) ? $_POST['LEADS_JURIDICO_HIST_DATA'] : '';	
if($LEADS_JURIDICO_HIST_DATA > '')	{
$LEADS_JURIDICO_HIST_DATA_DIA = substr($_POST['LEADS_JURIDICO_HIST_DATA'], 0, 2);
$LEADS_JURIDICO_HIST_DATA_MES = substr($_POST['LEADS_JURIDICO_HIST_DATA'], 3, 2);
$LEADS_JURIDICO_HIST_DATA_ANO = substr($_POST['LEADS_JURIDICO_HIST_DATA'], 6, 4);
$LEADS_JURIDICO_HIST_DATA = $LEADS_JURIDICO_HIST_DATA_ANO.'/'.$LEADS_JURIDICO_HIST_DATA_MES.'/'.$LEADS_JURIDICO_HIST_DATA_DIA;
} else	{
	$LEADS_JURIDICO_HIST_DATA = '0000/00/00';
}

$LEADS_JURIDICO_HIST_ASSUNTO 		= isset($_POST['LEADS_JURIDICO_HIST_ASSUNTO']) ? $_POST['LEADS_JURIDICO_HIST_ASSUNTO'] : '';	

$LEADS_JURIDICO_HIST_DATA_FOLLOW 	= isset($_POST['LEADS_JURIDICO_HIST_DATA_FOLLOW']) ? $_POST['LEADS_JURIDICO_HIST_DATA_FOLLOW'] : '';	
if($LEADS_JURIDICO_HIST_DATA_FOLLOW > '')	{
$LEADS_JURIDICO_HIST_DATA_FOLLOW_DIA = substr($_POST['LEADS_JURIDICO_HIST_DATA_FOLLOW'], 0, 2);
$LEADS_JURIDICO_HIST_DATA_FOLLOW_MES = substr($_POST['LEADS_JURIDICO_HIST_DATA_FOLLOW'], 3, 2);
$LEADS_JURIDICO_HIST_DATA_FOLLOW_ANO = substr($_POST['LEADS_JURIDICO_HIST_DATA_FOLLOW'], 6, 4);
$LEADS_JURIDICO_HIST_DATA_FOLLOW = $LEADS_JURIDICO_HIST_DATA_FOLLOW_ANO.'/'.$LEADS_JURIDICO_HIST_DATA_FOLLOW_MES.'/'.$LEADS_JURIDICO_HIST_DATA_FOLLOW_DIA;
} else	{
	$LEADS_JURIDICO_HIST_DATA_FOLLOW = '0000/00/00';
}

$LEADS_JURIDICO_HIST_HORA_FOLLOW 	= isset($_POST['LEADS_JURIDICO_HIST_HORA_FOLLOW']) ? $_POST['LEADS_JURIDICO_HIST_HORA_FOLLOW'] : '';	
$LEADS_JURIDICO_HIST_DESCRICAO 		= isset($_POST['LEADS_JURIDICO_HIST_DESCRICAO']) ? $_POST['LEADS_JURIDICO_HIST_DESCRICAO'] : '';	

$F_USER_REGISTRO = $_POST['F_USER_REGISTRO'];
$DATA_CADATRO = date("d/m/Y");
$HORA_CADASTRO = date("H:i");
$IP_CADASTRO = $_SERVER['REMOTE_ADDR'];

//$F_USER_ULT_ALTERACAO = $_POST['F_USER_REGISTRO'];
//$DATA_ULT_ALTERACAO = date("d/m/Y");
//$HORA_ULT_ALTERACAO = date("H:i");
//$IP_ULT_ALTERACAO = $_SERVER['REMOTE_ADDR'];

$F_USER_ULT_ALTERACAO = '';
$DATA_ULT_ALTERACAO = '';
$HORA_ULT_ALTERACAO = '';
$IP_ULT_ALTERACAO = '';

//inserindo informoçoes na base...
mysqli_query ($conexao,"INSERT INTO tb_leads_juridico_hist (
ID_LEADS_JURIDICO_HIST, LEADS_JURIDICO_HIST_USER, LEADS_JURIDICO_HIST_STATUS, LEADS_JURIDICO_HIST_LEADS, LEADS_JURIDICO_HIST_DATA, LEADS_JURIDICO_HIST_ASSUNTO, LEADS_JURIDICO_HIST_DATA_FOLLOW, LEADS_JURIDICO_HIST_HORA_FOLLOW, LEADS_JURIDICO_HIST_DESCRICAO, F_USER_REGISTRO, DATA_CADATRO, HORA_CADASTRO, IP_CADASTRO, F_USER_ULT_ALTERACAO, DATA_ULT_ALTERACAO, HORA_ULT_ALTERACAO, IP_ULT_ALTERACAO) VALUES (null, '$LEADS_JURIDICO_HIST_USER', '$LEADS_JURIDICO_HIST_STATUS', '$LEADS_JURIDICO_HIST_LEADS', '$LEADS_JURIDICO_HIST_DATA', '$LEADS_JURIDICO_HIST_ASSUNTO', '$LEADS_JURIDICO_HIST_DATA_FOLLOW', '$LEADS_JURIDICO_HIST_HORA_FOLLOW', '$LEADS_JURIDICO_HIST_DESCRICAO', '$F_USER_REGISTRO', '$DATA_CADATRO', '$HORA_CADASTRO', '$IP_CADASTRO', '$F_USER_ULT_ALTERACAO', '$DATA_ULT_ALTERACAO', '$HORA_ULT_ALTERACAO', '$IP_ULT_ALTERACAO')");
if (mysqli_affected_rows ($conexao)>0);
$ATEN_ATENDIMENTO = mysqli_insert_id($conexao);
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//$LEADS_PRIORIDADE 	= isset($_POST['LEADS_PRIORIDADE']) ? $_POST['LEADS_PRIORIDADE'] : '';	
//if(($LEADS_HIST_STATUS == '2') or ($LEADS_HIST_STATUS == '3'))
//$LEADS_PRIORIDADE = $LEADS_PRIORIDADE + 1;

$F_USER_ULT_ALTERACAO = $_POST['F_USER_REGISTRO'];
$DATA_ULT_ALTERACAO = date("d/m/Y");
$HORA_ULT_ALTERACAO = date("H:i");
$IP_ULT_ALTERACAO = $_SERVER['REMOTE_ADDR'];

$sql = "UPDATE tb_leads_juridico SET
LEADS_JURIDICO_STATUS='$LEADS_JURIDICO_HIST_STATUS',
F_USER_ULT_ALTERACAO='$F_USER_ULT_ALTERACAO',
DATA_ULT_ALTERACAO='$DATA_ULT_ALTERACAO', 
HORA_ULT_ALTERACAO='$HORA_ULT_ALTERACAO', 
IP_ULT_ALTERACAO='$IP_ULT_ALTERACAO' 

WHERE LEADS_JURIDICO_LEADS='$LEADS_JURIDICO_HIST_LEADS';";

$res = mysqli_query ($conexao, $sql);
?>
<script language="javascript">
<!-- Caso a condição acima seja verdadeira o script abaiso será execultado-->
//alert ('Atendimento cadastrado com sucesso!');
//location.href = 'principal-atendimentos.php';
location.href = 'laudo-juridico.php?ID_LEADS=<?php echo $LEADS_JURIDICO_HIST_LEADS; ?>';
</script>