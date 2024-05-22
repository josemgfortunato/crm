<?php
//conectando a base de dados...
include "Connections/conecta_banco.php";


if(isset($_FILES['ADMINISTRADOR_FOTO'])){
$extensao_1 = strtolower(substr($_FILES['ADMINISTRADOR_FOTO']['name'], -4)); //pega a extensao do arquivo
}

//Pegando os valores das variaveis
$ID_ADMINISTRADOR 				= isset($_POST['ID_ADMINISTRADOR']) ? $_POST['ID_ADMINISTRADOR'] : '';

$ADMINISTRADOR_STATUS		 	= isset($_POST['ADMINISTRADOR_STATUS']) ? $_POST['ADMINISTRADOR_STATUS'] : '';
$ADMINISTRADOR_TIPO 			= isset($_POST['ADMINISTRADOR_TIPO']) ? $_POST['ADMINISTRADOR_TIPO'] : '';
$ADMINISTRADOR_DEPARTAMENTO 	= isset($_POST['ADMINISTRADOR_DEPARTAMENTO']) ? $_POST['ADMINISTRADOR_DEPARTAMENTO'] : '';
$ADMINISTRADOR_NOME 			= isset($_POST['ADMINISTRADOR_NOME']) ? $_POST['ADMINISTRADOR_NOME'] : '';
$ADMINISTRADOR_EMAIL 			= isset($_POST['ADMINISTRADOR_EMAIL']) ? $_POST['ADMINISTRADOR_EMAIL'] : '';
$ADMINISTRADOR_SENHA 			= isset($_POST['ADMINISTRADOR_SENHA']) ? $_POST['ADMINISTRADOR_SENHA'] : '';
$ADMINISTRADOR_SENHA = md5($ADMINISTRADOR_SENHA);


if($extensao_1 > '')	{
$ADMINISTRADOR_FOTO = md5(time()) .'_1'. $extensao_1; //define o nome do arquivo
}	else	{
$ADMINISTRADOR_FOTO 		= isset($_POST['VALIDA_FOTO_1']) ? $_POST['VALIDA_FOTO_1'] : '';
}

$F_EXC_1 		= isset($_POST['F_EXC_1']) ? $_POST['F_EXC_1'] : '';
if($F_EXC_1 == '1')
$ADMINISTRADOR_FOTO = '';

$ADMINISTRADOR_OBS 				= isset($_POST['ADMINISTRADOR_OBS']) ? $_POST['ADMINISTRADOR_OBS'] : '';

//$F_USER_REGISTRO = $_POST['F_USER_REGISTRO'];
//$DATA_CADATRO = date("d/m/Y");
//$HORA_CADASTRO = date("H:i");
//$IP_CADASTRO = $_SERVER['REMOTE_ADDR'];

$F_USER_ULT_ALTERACAO = $_POST['F_USER_REGISTRO'];
$DATA_ULT_ALTERACAO = date("d/m/Y");
$HORA_ULT_ALTERACAO = date("H:i");
$IP_ULT_ALTERACAO = $_SERVER['REMOTE_ADDR'];


////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
//define o diretorio para onde enviaremos o arquivo
//$diretorio1 = "../demo.startcondominio.com.br/foto-obraseprovidencias/"; 
$diretorio1 = "fotos-operador/"; //define o diretorio para onde enviaremos o arquivo
move_uploaded_file($_FILES['ADMINISTRADOR_FOTO']['tmp_name'], $diretorio1.$ADMINISTRADOR_FOTO); //efetua o upload

////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
$sql = "UPDATE tb_administrador SET
ADMINISTRADOR_FOTO='$ADMINISTRADOR_FOTO',
F_USER_ULT_ALTERACAO='$F_USER_ULT_ALTERACAO',
DATA_ULT_ALTERACAO='$DATA_ULT_ALTERACAO', 
HORA_ULT_ALTERACAO='$HORA_ULT_ALTERACAO', 
IP_ULT_ALTERACAO='$IP_ULT_ALTERACAO' 
WHERE ID_ADMINISTRADOR='$ID_ADMINISTRADOR';";
$res = mysqli_query ($conexao, $sql);

?>
<script language="javascript">
<!-- Caso a condição acima seja verdadeira o script abaiso será execultado-->
alert ('Foto alterado com sucesso! Fa\u00e7a o login novamente!');
//location.href = 'configuracao-user.php';
location.href = 'logout_administrador.php';
</script>