<?php
//conectando a base de dados...
include "Connections/conecta_banco.php";


if(isset($_FILES['CONSUMIDOR_PROTOCOLO_ARQUIVO'])){
$extensao_1 = strtolower(substr($_FILES['CONSUMIDOR_PROTOCOLO_ARQUIVO']['name'], -4)); //pega a extensao do arquivo
}

//Pegando os valores das variaveis
$ID_CONSUMIDOR_PROTOCOLO 			= isset($_POST['ID_CONSUMIDOR_PROTOCOLO']) ? $_POST['ID_CONSUMIDOR_PROTOCOLO'] : '';
$CONSUMIDOR_PROTOCOLO_USER 			= isset($_POST['CONSUMIDOR_PROTOCOLO_USER']) ? $_POST['CONSUMIDOR_PROTOCOLO_USER'] : '';	
//$CONSUMIDOR_PROTOCOLO_STATUS 		= isset($_POST['CONSUMIDOR_PROTOCOLO_STATUS']) ? $_POST['CONSUMIDOR_PROTOCOLO_STATUS'] : '';	
$CONSUMIDOR_PROTOCOLO_STATUS = '1';	
$CONSUMIDOR_PROTOCOLO_TIPO 			= isset($_POST['CONSUMIDOR_PROTOCOLO_TIPO']) ? $_POST['CONSUMIDOR_PROTOCOLO_TIPO'] : '';	
$CONSUMIDOR_PROTOCOLO_LEADS	 		= isset($_POST['CONSUMIDOR_PROTOCOLO_LEADS']) ? $_POST['CONSUMIDOR_PROTOCOLO_LEADS'] : '';	
$CONSUMIDOR_PROTOCOLO_DATA	= date("Y/m/d");;
//$CONSUMIDOR_PROTOCOLO_ARQUIVO		= isset($_POST['CONSUMIDOR_PROTOCOLO_ARQUIVO']) ? $_POST['CONSUMIDOR_PROTOCOLO_ARQUIVO'] : '';	
$CONSUMIDOR_PROTOCOLO_N 			= isset($_POST['CONSUMIDOR_PROTOCOLO_N']) ? $_POST['CONSUMIDOR_PROTOCOLO_N'] : '';	
//$CONSUMIDOR_PROTOCOLO_ARQUIVO		= isset($_POST['CONSUMIDOR_PROTOCOLO_ARQUIVO']) ? $_POST['CONSUMIDOR_PROTOCOLO_ARQUIVO'] : '';	

if($extensao_1 > '')	{
$CONSUMIDOR_PROTOCOLO_ARQUIVO = md5(time()) .'_1'. $extensao_1; //define o nome do arquivo
}	else	{
$CONSUMIDOR_PROTOCOLO_ARQUIVO 		= isset($_POST['CONSUMIDOR_PROTOCOLO_ARQUIVO']) ? $_POST['CONSUMIDOR_PROTOCOLO_ARQUIVO'] : '';
}

$F_EXC_1 		= isset($_POST['F_EXC_1']) ? $_POST['F_EXC_1'] : '';
if($F_EXC_1 == '1')
$CONSUMIDOR_PROTOCOLO_ARQUIVO = '';



$CONSUMIDOR_PROTOCOLO_OBS 			= isset($_POST['CONSUMIDOR_PROTOCOLO_OBS']) ? $_POST['CONSUMIDOR_PROTOCOLO_OBS'] : '';	

//$F_USER_REGISTRO = $_POST['F_USER_REGISTRO'];
//$DATA_CADATRO = date("d/m/Y");
//$HORA_CADASTRO = date("H:i");
//$IP_CADASTRO = $_SERVER['REMOTE_ADDR'];

$F_USER_ULT_ALTERACAO = $_POST['F_USER_REGISTRO'];
$DATA_ULT_ALTERACAO = date("d/m/Y");
$HORA_ULT_ALTERACAO = date("H:i");
$IP_ULT_ALTERACAO = $_SERVER['REMOTE_ADDR'];




///////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
//define o diretorio para onde enviaremos o arquivo
//$diretorio1 = "../demo.startcondominio.com.br/foto-obraseprovidencias/"; 
$diretorio1 = "consumidor-docs/"; //define o diretorio para onde enviaremos o arquivo
move_uploaded_file($_FILES['CONSUMIDOR_PROTOCOLO_ARQUIVO']['tmp_name'], $diretorio1.$CONSUMIDOR_PROTOCOLO_ARQUIVO); //efetua o upload


////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
$sql = "UPDATE tb_consumidor_protocolo SET
CONSUMIDOR_PROTOCOLO_USER='$CONSUMIDOR_PROTOCOLO_USER',	
CONSUMIDOR_PROTOCOLO_STATUS='$CONSUMIDOR_PROTOCOLO_STATUS',	
CONSUMIDOR_PROTOCOLO_LEADS='$CONSUMIDOR_PROTOCOLO_LEADS',	
CONSUMIDOR_PROTOCOLO_DATA='$CONSUMIDOR_PROTOCOLO_DATA',	
CONSUMIDOR_PROTOCOLO_N='$CONSUMIDOR_PROTOCOLO_N',	
CONSUMIDOR_PROTOCOLO_ARQUIVO='$CONSUMIDOR_PROTOCOLO_ARQUIVO',	
CONSUMIDOR_PROTOCOLO_OBS='$CONSUMIDOR_PROTOCOLO_OBS',	
F_USER_ULT_ALTERACAO='$F_USER_ULT_ALTERACAO', 
DATA_ULT_ALTERACAO='$DATA_ULT_ALTERACAO', 
HORA_ULT_ALTERACAO='$HORA_ULT_ALTERACAO', 
IP_ULT_ALTERACAO='$IP_ULT_ALTERACAO'
WHERE ID_CONSUMIDOR_PROTOCOLO='$ID_CONSUMIDOR_PROTOCOLO';";

$res = mysqli_query ($conexao, $sql);

?>
<script language="javascript">
<!-- Caso a condição acima seja verdadeira o script abaiso será execultado-->
//alert ('Dados alterado com sucesso!');
location.href = 'juridico-consumidor-protocolo.php?ID_LEADS=<?php echo $CONSUMIDOR_PROTOCOLO_LEADS; ?>';
</script>