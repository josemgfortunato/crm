<?php
//conectando a base de dados...
include "Connections/conecta_banco.php";

//Pegando os valores digitados no formulario de cadastro de clientes e armazenando em arrays super globais
$ID_BANCO 		= isset($_POST['ID_BANCO']) ? $_POST['ID_BANCO'] : '';
$BANCO_USER		= isset($_POST['BANCO_USER']) ? $_POST['BANCO_USER'] : '';
$BANCO_STATUS 	= isset($_POST['BANCO_STATUS']) ? $_POST['BANCO_STATUS'] : '';
$BANCO_NOME 	= isset($_POST['BANCO_NOME']) ? $_POST['BANCO_NOME'] : '';
$BANCO_OBS 		= isset($_POST['BANCO_OBS']) ? $_POST['BANCO_OBS'] : '';

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
mysqli_query ($conexao,"INSERT INTO tb_bancos (ID_BANCO, BANCO_USER, BANCO_STATUS, BANCO_NOME, BANCO_OBS, F_USER_REGISTRO, DATA_CADATRO, HORA_CADASTRO, IP_CADASTRO, F_USER_ULT_ALTERACAO, DATA_ULT_ALTERACAO, HORA_ULT_ALTERACAO, IP_ULT_ALTERACAO) VALUES (null, '$BANCO_USER', '$BANCO_STATUS', '$BANCO_NOME', '$BANCO_OBS', '$F_USER_REGISTRO', '$DATA_CADATRO', '$HORA_CADASTRO', '$IP_CADASTRO', '$F_USER_ULT_ALTERACAO', '$DATA_ULT_ALTERACAO', '$HORA_ULT_ALTERACAO', '$IP_ULT_ALTERACAO')");
if (mysqli_affected_rows ($conexao)>0);

?>
<script language="javascript">
<!-- Caso a condição acima seja verdadeira o script abaiso será execultado-->
//alert ('Dados cadastrado com sucesso!');
location.href = 'principal-bancos.php';
</script>