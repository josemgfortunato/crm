<?php
//conectando a base de dados...
include "Connections/conecta_banco.php";

//Pegando os valores digitados no formulario de cadastro de clientes e armazenando em arrays super globais
$ID_LEADS 					= isset($_POST['ID_LEADS']) ? $_POST['ID_LEADS'] : '';
//$LEADS_USER				 	= isset($_POST['LEADS_USER']) ? $_POST['LEADS_USER'] : '';
$LEADS_USER				 	= isset($_POST['LEADS_OPERADOR']) ? $_POST['LEADS_OPERADOR'] : '';
$LEADS_STATUS 				= isset($_POST['LEADS_STATUS']) ? $_POST['LEADS_STATUS'] : '';
$LEADS_TIPO 				= isset($_POST['LEADS_TIPO']) ? $_POST['LEADS_TIPO'] : '';
$LEADS_FORNECEDOR 			= isset($_POST['LEADS_FORNECEDOR']) ? $_POST['LEADS_FORNECEDOR'] : '';

$LEADS_SUPERVISOR 			= isset($_POST['LEADS_SUPERVISOR']) ? $_POST['LEADS_SUPERVISOR'] : '';
$LEADS_DISTRIBUIDO_SUP 		= '1';
$LEADS_DISTRIBUIDO_SUP_DATA = date("Y/m/d");

$LEADS_PRIORIDADE 			= '1';
$LEADS_DISTRIBUIDO 			= '1';
$LEADS_DISTRIBUIDO_DATA 	= date("Y/m/d");

$LEADS_DATA 				= isset($_POST['LEADS_DATA']) ? $_POST['LEADS_DATA'] : '';
IF($LEADS_DATA > '')	{
$LEADS_DATA_DIA = substr($LEADS_DATA, 0, 2);
$LEADS_DATA_MES = substr($LEADS_DATA, 3, 2);
$LEADS_DATA_ANO = substr($LEADS_DATA, 6, 4);
$LEADS_DATA = $LEADS_DATA_ANO.'/'.$LEADS_DATA_MES.'/'.$LEADS_DATA_DIA;
} else	{
	$LEADS_DATA = '0000/00/00';
}

$LEADS_NOME 				= isset($_POST['LEADS_NOME']) ? $_POST['LEADS_NOME'] : '';
$LEADS_EMAIL				= isset($_POST['LEADS_EMAIL']) ? $_POST['LEADS_EMAIL'] : '';
$LEADS_TEL1					= isset($_POST['LEADS_TEL1']) ? $_POST['LEADS_TEL1'] : '';
$LEADS_TEL2					= isset($_POST['LEADS_TEL2']) ? $_POST['LEADS_TEL2'] : '';

$LEADS_TIPO_FINANCIAMENTO	= isset($_POST['LEADS_TIPO_FINANCIAMENTO']) ? $_POST['LEADS_TIPO_FINANCIAMENTO'] : '';
$LEADS_VALOR				= isset($_POST['LEADS_VALOR']) ? $_POST['LEADS_VALOR'] : '';
$LEADS_QTDE_PARCELAS		= isset($_POST['LEADS_QTDE_PARCELAS']) ? $_POST['LEADS_QTDE_PARCELAS'] : '';
$LEADS_VALOR_FINANCIAMENTO	= isset($_POST['LEADS_VALOR_FINANCIAMENTO']) ? $_POST['LEADS_VALOR_FINANCIAMENTO'] : '';

$LEADS_TEL3					= isset($_POST['LEADS_TEL3']) ? $_POST['LEADS_TEL3'] : '';
$LEADS_TEL4					= isset($_POST['LEADS_TEL4']) ? $_POST['LEADS_TEL4'] : '';
$LEADS_HORA					= isset($_POST['LEADS_HORA']) ? $_POST['LEADS_HORA'] : '';
$LEADS_OBS 					= isset($_POST['LEADS_OBS']) ? $_POST['LEADS_OBS'] : '';

/*
//string que recebe os números
//$_string = "magno;2;3;teste;5;6";
$_string = $LEADS_OBS;
//O explode define qual vai ser o caractere a ser usado na divisão da string e a variável $converte_array recebe as substrings resultantes desta divisão.  
$converte_array = explode("	",$_string );
//como exibir esses resultados:
echo $converte_array[0]; //retorna 1
echo "<br>";
echo $converte_array[1]; //retorna 2
echo "<br>";
echo $converte_array[2]; //retorna 3
echo "<br>";
echo $converte_array[3]; //retorna 4
echo "<br>";
// sem se esquecer que arrays em php assim como em outras linguagens se iniciam em 0 e não em 1
*/

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
mysqli_query ($conexao,"INSERT INTO tb_leads (ID_LEADS, LEADS_USER, LEADS_STATUS, LEADS_TIPO, LEADS_FORNECEDOR, LEADS_SUPERVISOR, LEADS_DISTRIBUIDO_SUP, LEADS_DISTRIBUIDO_SUP_DATA, LEADS_PRIORIDADE, LEADS_DISTRIBUIDO, LEADS_DISTRIBUIDO_DATA, LEADS_DATA, LEADS_NOME, LEADS_EMAIL, LEADS_TEL1, LEADS_TEL2, LEADS_TIPO_FINANCIAMENTO, LEADS_VALOR, LEADS_QTDE_PARCELAS, LEADS_VALOR_FINANCIAMENTO, LEADS_TEL3, LEADS_TEL4, LEADS_HORA, LEADS_OBS, F_USER_REGISTRO, DATA_CADATRO, HORA_CADASTRO, IP_CADASTRO, F_USER_ULT_ALTERACAO, DATA_ULT_ALTERACAO, HORA_ULT_ALTERACAO, IP_ULT_ALTERACAO) VALUES (null, '$LEADS_USER', '$LEADS_STATUS', '$LEADS_TIPO', '$LEADS_FORNECEDOR', '$LEADS_SUPERVISOR', '$LEADS_DISTRIBUIDO_SUP', '$LEADS_DISTRIBUIDO_SUP_DATA', '$LEADS_PRIORIDADE', '$LEADS_DISTRIBUIDO', '$LEADS_DISTRIBUIDO_DATA', '$LEADS_DATA', '$LEADS_NOME', '$LEADS_EMAIL', '$LEADS_TEL1', '$LEADS_TEL2', '$LEADS_TIPO_FINANCIAMENTO', '$LEADS_VALOR', '$LEADS_QTDE_PARCELAS', '$LEADS_VALOR_FINANCIAMENTO', '$LEADS_TEL3', '$LEADS_TEL4', '$LEADS_HORA', '$LEADS_OBS', '$F_USER_REGISTRO', '$DATA_CADATRO', '$HORA_CADASTRO', '$IP_CADASTRO', '$F_USER_ULT_ALTERACAO', '$DATA_ULT_ALTERACAO', '$HORA_ULT_ALTERACAO', '$IP_ULT_ALTERACAO')");
if (mysqli_affected_rows ($conexao)>0);

?>
<script language="javascript">
<!-- Caso a condição acima seja verdadeira o script abaiso será execultado-->
//alert ('Dados cadastrado com sucesso!');
location.href = 'principal-leads-supervisor.php';
</script>