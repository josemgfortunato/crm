<?php
//conectando a base de dados...
include "Connections/conecta_banco.php";

//Pegando os valores digitados no formulario de cadastro de clientes e armazenando em arrays super globais
$ID_ADMINISTRADOR 				= isset($_POST['ID_ADMINISTRADOR']) ? $_POST['ID_ADMINISTRADOR'] : '';

$ADMINISTRADOR_STATUS		 	= isset($_POST['ADMINISTRADOR_STATUS']) ? $_POST['ADMINISTRADOR_STATUS'] : '';
$ADMINISTRADOR_TIPO 			= isset($_POST['ADMINISTRADOR_TIPO']) ? $_POST['ADMINISTRADOR_TIPO'] : '';
$ADMINISTRADOR_DEPARTAMENTO 	= isset($_POST['ADMINISTRADOR_DEPARTAMENTO']) ? $_POST['ADMINISTRADOR_DEPARTAMENTO'] : '';
$ADMINISTRADOR_NOME 			= isset($_POST['ADMINISTRADOR_NOME']) ? $_POST['ADMINISTRADOR_NOME'] : '';
$ADMINISTRADOR_EMAIL 			= isset($_POST['ADMINISTRADOR_EMAIL']) ? $_POST['ADMINISTRADOR_EMAIL'] : '';
$ADMINISTRADOR_SENHA 			= isset($_POST['ADMINISTRADOR_SENHA']) ? $_POST['ADMINISTRADOR_SENHA'] : '';
$ADMINISTRADOR_SENHA = md5($ADMINISTRADOR_SENHA);

$ADMINISTRADOR_FOTO				= isset($_POST['ADMINISTRADOR_FOTO']) ? $_POST['ADMINISTRADOR_FOTO'] : '';
$ADMINISTRADOR_OBS 				= isset($_POST['ADMINISTRADOR_OBS']) ? $_POST['ADMINISTRADOR_OBS'] : '';

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


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$sql_result = mysqli_query($conexao,"select * from tb_administrador WHERE ADMINISTRADOR_EMAIL = '$ADMINISTRADOR_EMAIL' AND ADMINISTRADOR_STATUS < '3' ");
$val_user = mysqli_fetch_object($sql_result);  
///////////////////////////////////////////////////////

$VAL_EMAIL 				= isset($val_user->ID_ADMINISTRADOR) ? $val_user->ID_ADMINISTRADOR : '';
/////////////////////
IF($VAL_EMAIL > '')	{
//header("Location:register.php");
?>
<script language="javascript">
<!-- Caso a condição acima seja verdadeira o script abaiso será execultado-->
alert ('Já existe um Usuario cadastrado com este E-MAIL!');
location.href = 'principal-user.php';
</script>
<?php
exit();
}

//inserindo informoçoes na base...
mysqli_query ($conexao,"INSERT INTO tb_administrador (ID_ADMINISTRADOR, ADMINISTRADOR_STATUS, ADMINISTRADOR_TIPO, ADMINISTRADOR_DEPARTAMENTO, ADMINISTRADOR_NOME, ADMINISTRADOR_EMAIL, ADMINISTRADOR_SENHA, ADMINISTRADOR_FOTO, ADMINISTRADOR_OBS, F_USER_REGISTRO, DATA_CADATRO, HORA_CADASTRO, IP_CADASTRO, F_USER_ULT_ALTERACAO, DATA_ULT_ALTERACAO, HORA_ULT_ALTERACAO, IP_ULT_ALTERACAO) VALUES (null, '$ADMINISTRADOR_STATUS', '$ADMINISTRADOR_TIPO', '$ADMINISTRADOR_DEPARTAMENTO', '$ADMINISTRADOR_NOME', '$ADMINISTRADOR_EMAIL', '$ADMINISTRADOR_SENHA', '$ADMINISTRADOR_FOTO', '$ADMINISTRADOR_OBS', '$F_USER_REGISTRO', '$DATA_CADATRO', '$HORA_CADASTRO', '$IP_CADASTRO', '$F_USER_ULT_ALTERACAO', '$DATA_ULT_ALTERACAO', '$HORA_ULT_ALTERACAO', '$IP_ULT_ALTERACAO')");
if (mysqli_affected_rows ($conexao)>0);

?>
<script language="javascript">
<!-- Caso a condição acima seja verdadeira o script abaiso será execultado-->
//alert ('Dados cadastrado com sucesso!');
location.href = 'principal-user.php';
</script>