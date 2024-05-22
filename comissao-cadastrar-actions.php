<?php
//conectando a base de dados...
include "Connections/conecta_banco.php";

//Pegando os valores digitados no formulario de cadastro de clientes e armazenando em arrays super globais
$ID_COMISSAO 				= isset($_POST['ID_COMISSAO']) ? $_POST['ID_COMISSAO'] : '';
$COMISSAO_USER				= isset($_POST['COMISSAO_USER']) ? $_POST['COMISSAO_USER'] : '';
$COMISSAO_STATUS 			= isset($_POST['COMISSAO_STATUS']) ? $_POST['COMISSAO_STATUS'] : '';
$COMISSAO_VALOR_VENDIDO 	= isset($_POST['COMISSAO_VALOR_VENDIDO']) ? $_POST['COMISSAO_VALOR_VENDIDO'] : '';
$COMISSAO_PORCENTAGEM 		= isset($_POST['COMISSAO_PORCENTAGEM']) ? $_POST['COMISSAO_PORCENTAGEM'] : '';

$COMISSAO_VALOR 			= isset($_POST['COMISSAO_VALOR']) ? $_POST['COMISSAO_VALOR'] : '';
$COMISSAO_OBS 				= isset($_POST['COMISSAO_OBS']) ? $_POST['COMISSAO_OBS'] : '';

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
mysqli_query ($conexao,"INSERT INTO tb_comissao (ID_COMISSAO, COMISSAO_USER, COMISSAO_STATUS, COMISSAO_VALOR_VENDIDO, COMISSAO_PORCENTAGEM, COMISSAO_VALOR, COMISSAO_OBS, F_USER_REGISTRO, DATA_CADATRO, HORA_CADASTRO, IP_CADASTRO, F_USER_ULT_ALTERACAO, DATA_ULT_ALTERACAO, HORA_ULT_ALTERACAO, IP_ULT_ALTERACAO) VALUES (null, '$COMISSAO_USER', '$COMISSAO_STATUS', '$COMISSAO_VALOR_VENDIDO', '$COMISSAO_PORCENTAGEM', '$COMISSAO_VALOR', '$COMISSAO_OBS', '$F_USER_REGISTRO', '$DATA_CADATRO', '$HORA_CADASTRO', '$IP_CADASTRO', '$F_USER_ULT_ALTERACAO', '$DATA_ULT_ALTERACAO', '$HORA_ULT_ALTERACAO', '$IP_ULT_ALTERACAO')");
if (mysqli_affected_rows ($conexao)>0);

?>
<script language="javascript">
<!-- Caso a condição acima seja verdadeira o script abaiso será execultado-->
//alert ('Dados cadastrado com sucesso!');
location.href = 'principal-comissao.php';
</script>