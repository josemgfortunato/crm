<?php
/* Aqui eu coloco a seguinte condição:
se o usuario e a senha estiverem setadas ou seja se o administrador
colocou o login e a senha de acesso. Caso ele tenha o feito eu pego o que ele digitou
nos capos login e senha e os coloco em variaveis do tipo super globais $_COOKIE */
/*
if (isset($_COOKIE["nome_administrador"]))
$nome_administrador = $_COOKIE["nome_administrador"];
if (isset($_COOKIE["senha_administrador"]))
$senha_administrador = $_COOKIE["senha_administrador"];

if (isset($_COOKIE["ID_USER"]))
$ID_USER = $_COOKIE["ID_USER"];

if (isset($_COOKIE["TIPO_USER"]))
$TIPO_USER = $_COOKIE["TIPO_USER"];

if (isset($_COOKIE["USER_NOME"]))
$USER_NOME = $_COOKIE["USER_NOME"];

// se ambom existirem faço a comparação com o registro na base.. acompanhe...
if (!(empty ($nome_administrador) OR empty ($senha_administrador)))
{
include "Connections/conecta_banco.php";

$resultado = mysqli_query ($conexao,"SELECT * FROM tb_administrador WHERE ADMINISTRADOR_EMAIL = '$nome_administrador' AND ADMINISTRADOR_SENHA = '$senha_administrador' ");
if (mysqli_num_rows ($resultado)==1)
{
setcookie("nome_administrador");
setcookie("senha_administrador");
}
else	{
?>
<script language="javascript">
alert ('Por favor faça o Login!');
location.href = 'index.html';
</script>
<?php
exit;
}
}
*/
?>

<?php
/* Aqui eu coloco a seguinte condição:
se o usuario e a senha estiverem setadas ou seja se o administrador
colocou o login e a senha de acesso. Caso ele tenha o feito eu pego o que ele digitou
nos capos login e senha e os coloco em variaveis do tipo super globais $_COOKIE */
if (isset($_COOKIE["nome_administrador"]))
$nome_administrador = $_COOKIE["nome_administrador"];
if (isset($_COOKIE["senha_administrador"]))
$senha_administrador = $_COOKIE["senha_administrador"];


if (isset($_COOKIE["ID_USER"]))
$ID_USER = $_COOKIE["ID_USER"];

if (isset($_COOKIE["USER_TIPO"]))
$USER_TIPO = $_COOKIE["USER_TIPO"];

if (isset($_COOKIE["USER_NOME"]))
$USER_NOME = $_COOKIE["USER_NOME"];

if (isset($_COOKIE["USER_FOTO"]))
$USER_FOTO = $_COOKIE["USER_FOTO"];


$USER_FOTO				= isset($USER_FOTO) ? $USER_FOTO : '';
if($USER_FOTO == '')
$USER_FOTO = "icone-user.png";

// se ambom existirem faço a comparação com o registro na base.. acompanhe...
if (!(empty ($nome_administrador) OR empty ($senha_administrador)))
{
include "Connections/conecta_banco.php";
$resultado = mysqli_query ($conexao,"SELECT * FROM tb_administrador WHERE ADMINISTRADOR_EMAIL = '$nome_administrador' AND ADMINISTRADOR_SENHA = '$senha_administrador' AND ADMINISTRADOR_STATUS < '3' ");
if (mysqli_num_rows ($resultado)==1)
{


}
elseif (mysqli_num_rows ($resultado)==0)
{

setcookie("nome_administrador");
setcookie("senha_administrador");
?>
<script language="javascript">
alert ('Por favor faça o Login!');
location.href = 'index.php';
</script>
<?php
exit;
}
?>

<?php
}
?>