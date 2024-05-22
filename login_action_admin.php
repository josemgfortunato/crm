<?php
// obtem os valores digitados]
$nome_administrador = $_POST ['nome_administrador'];
$senha_administrador = md5($_POST['senha_administrador']);

// acesso a base de daos
include "Connections/conecta_banco.php";

//fazendo o select
$resultado = mysqli_query ($conexao,"SELECT * FROM tb_administrador where ADMINISTRADOR_EMAIL = '$nome_administrador' AND ADMINISTRADOR_SENHA ='$senha_administrador' AND ADMINISTRADOR_STATUS < '3' ");
$linhas = mysqli_num_rows ($resultado);

if($linhas==0) // testa se a consulta retornou algum registro
{
?>
<script language="javascript">
alert ('Login/ Senha invalidos!');
location.href ='index.php';
</script>
<?php
}
else // usuario e senha encontrador. vamos criar os cookies
{
setcookie ("nome_administrador", $nome_administrador);
setcookie ("senha_administrador", $senha_administrador);



$select_dados = mysqli_query ($conexao,"SELECT * FROM tb_administrador WHERE ADMINISTRADOR_EMAIL = '$nome_administrador' AND ADMINISTRADOR_SENHA = '$senha_administrador' AND ADMINISTRADOR_STATUS < '3' ");
$x = mysqli_fetch_assoc($select_dados);
//Exibe o resultado
$ID_USER = $x['ID_ADMINISTRADOR'];
$USER_TIPO = $x['ADMINISTRADOR_TIPO'];
$USER_NOME = $x['ADMINISTRADOR_NOME'];
$USER_FOTO = $x['ADMINISTRADOR_FOTO'];

setcookie ("ID_USER", $ID_USER);
setcookie ("USER_TIPO", $USER_TIPO);
setcookie ("USER_NOME", $USER_NOME);
setcookie ("USER_FOTO", $USER_FOTO);


$ID_ACESSO = '';
$ACESSO_USER = $ID_USER;
$ACESSO_NOME = $USER_NOME;

$DATA = date("d/m/Y");
$HORA = date("H:i");
$IP = $_SERVER['REMOTE_ADDR'];

/*
mysqli_query($conexao,"INSERT INTO tb_acesso VALUES(
'$ID_ACESSO',
'$ACESSO_USER',
'$ACESSO_NOME',
'$DATA',
'$HORA',
'$IP')");
*/

mysqli_query ($conexao,"INSERT INTO tb_acesso (ID_ACESSO, ACESSO_USER, ACESSO_NOME, DATA, HORA, IP) VALUES (null, '$ACESSO_USER', '$ACESSO_NOME', '$DATA', '$HORA', '$IP')");
if (mysqli_affected_rows ($conexao)>0);




header ("location: principal.php");
}
?>