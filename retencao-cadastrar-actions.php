<?php
//conectando a base de dados...
include "Connections/conecta_banco.php";

//Pegando os valores digitados no formulario de cadastro de clientes e armazenando em arrays super globais
$ID_RETENCAO 			= isset($_POST['ID_RETENCAO']) ? $_POST['ID_RETENCAO'] : '';

$RETENCAO_USER			= isset($_POST['RETENCAO_USER']) ? $_POST['RETENCAO_USER'] : '';
$RETENCAO_STATUS 		= isset($_POST['RETENCAO_STATUS']) ? $_POST['RETENCAO_STATUS'] : '';
$RETENCAO_LEADS 		= isset($_POST['RETENCAO_LEADS']) ? $_POST['RETENCAO_LEADS'] : '';
$RETENCAO_DATA 			= isset($_POST['RETENCAO_DATA']) ? $_POST['RETENCAO_DATA'] : '';
if($RETENCAO_DATA > '')	{
$RETENCAO_DATA_DIA = substr($RETENCAO_DATA, 0, 2);
$RETENCAO_DATA_MES = substr($RETENCAO_DATA, 3, 2);
$RETENCAO_DATA_ANO = substr($RETENCAO_DATA, 6, 4);
$RETENCAO_DATA = $RETENCAO_DATA_ANO.'/'.$RETENCAO_DATA_MES.'/'.$RETENCAO_DATA_DIA;
} else	{
	$RETENCAO_DATA = '0000/00/00';
}

$RETENCAO_NOME 			= isset($_POST['RETENCAO_NOME']) ? $_POST['RETENCAO_NOME'] : '';
$RETENCAO_CPF 			= isset($_POST['RETENCAO_CPF']) ? $_POST['RETENCAO_CPF'] : '';
$RETENCAO_TEL			= isset($_POST['RETENCAO_TEL']) ? $_POST['RETENCAO_TEL'] : '';
$RETENCAO_ASSUNTO	 	= isset($_POST['RETENCAO_ASSUNTO']) ? $_POST['RETENCAO_ASSUNTO'] : '';
$RETENCAO_DESCRICAO 	= isset($_POST['RETENCAO_DESCRICAO']) ? $_POST['RETENCAO_DESCRICAO'] : '';

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
mysqli_query ($conexao,"INSERT INTO tb_retencao (ID_RETENCAO, RETENCAO_USER, RETENCAO_STATUS, RETENCAO_LEADS, RETENCAO_DATA, RETENCAO_NOME, RETENCAO_CPF, RETENCAO_TEL, RETENCAO_ASSUNTO, RETENCAO_DESCRICAO, F_USER_REGISTRO, DATA_CADATRO, HORA_CADASTRO, IP_CADASTRO, F_USER_ULT_ALTERACAO, DATA_ULT_ALTERACAO, HORA_ULT_ALTERACAO, IP_ULT_ALTERACAO) VALUES (null, '$RETENCAO_USER', '$RETENCAO_STATUS', '$RETENCAO_LEADS', '$RETENCAO_DATA', '$RETENCAO_NOME', '$RETENCAO_CPF', '$RETENCAO_TEL', '$RETENCAO_ASSUNTO', '$RETENCAO_DESCRICAO', '$F_USER_REGISTRO', '$DATA_CADATRO', '$HORA_CADASTRO', '$IP_CADASTRO', '$F_USER_ULT_ALTERACAO', '$DATA_ULT_ALTERACAO', '$HORA_ULT_ALTERACAO', '$IP_ULT_ALTERACAO')");
if (mysqli_affected_rows ($conexao)>0);

?>
<script language="javascript">
<!-- Caso a condição acima seja verdadeira o script abaiso será execultado-->
//alert ('Dados cadastrado com sucesso!');
location.href = 'principal-protocolo-historico.php?ID_LEADS=<?php echo $RETENCAO_LEADS; ?>';
</script>