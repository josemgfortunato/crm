<?php
//conectando a base de dados...
include "Connections/conecta_banco.php";


if(isset($_FILES['DOC_PROCESSUAL_ARQUIVO'])){
$extensao_1 = strtolower(substr($_FILES['DOC_PROCESSUAL_ARQUIVO']['name'], -4)); //pega a extensao do arquivo
}

//Pegando os valores das variaveis
$ID_DOC_PROCESSUAL 			= isset($_POST['ID_DOC_PROCESSUAL']) ? $_POST['ID_DOC_PROCESSUAL'] : '';
$DOC_PROCESSUAL_USER 		= isset($_POST['DOC_PROCESSUAL_USER']) ? $_POST['DOC_PROCESSUAL_USER'] : '';	
$DOC_PROCESSUAL_STATUS 		= isset($_POST['DOC_PROCESSUAL_STATUS']) ? $_POST['DOC_PROCESSUAL_STATUS'] : '';	
//$DOC_PROCESSUAL_STATUS = '1';	
$DOC_PROCESSUAL_LEADS	 	= isset($_POST['DOC_PROCESSUAL_LEADS']) ? $_POST['DOC_PROCESSUAL_LEADS'] : '';	
$DOC_PROCESSUAL_DATA	= date("Y/m/d");;
$DOC_PROCESSUAL_TIPO 			= isset($_POST['DOC_PROCESSUAL_TIPO']) ? $_POST['DOC_PROCESSUAL_TIPO'] : '';	
//$DOC_PROCESSUAL_ARQUIVO		= isset($_POST['DOC_PROCESSUAL_ARQUIVO']) ? $_POST['DOC_PROCESSUAL_ARQUIVO'] : '';	

if($extensao_1 > '')	{
$DOC_PROCESSUAL_ARQUIVO = md5(time()) .'_1'. $extensao_1; //define o nome do arquivo
}	else	{
$DOC_PROCESSUAL_ARQUIVO 		= isset($_POST['DOC_PROCESSUAL_ARQUIVO']) ? $_POST['DOC_PROCESSUAL_ARQUIVO'] : '';
}

$F_EXC_1 		= isset($_POST['F_EXC_1']) ? $_POST['F_EXC_1'] : '';
if($F_EXC_1 == '1')
$DOC_PROCESSUAL_ARQUIVO = '';



$DOC_PROCESSUAL_OBS 			= isset($_POST['DOC_PROCESSUAL_OBS']) ? $_POST['DOC_PROCESSUAL_OBS'] : '';	

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


///////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
//define o diretorio para onde enviaremos o arquivo
//$diretorio1 = "../demo.startcondominio.com.br/foto-obraseprovidencias/"; 
$diretorio1 = "processual-docs/"; //define o diretorio para onde enviaremos o arquivo
move_uploaded_file($_FILES['DOC_PROCESSUAL_ARQUIVO']['tmp_name'], $diretorio1.$DOC_PROCESSUAL_ARQUIVO); //efetua o upload


////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
mysqli_query ($conexao,"INSERT INTO tb_docs_processual (ID_DOC_PROCESSUAL, DOC_PROCESSUAL_USER, DOC_PROCESSUAL_STATUS, DOC_PROCESSUAL_LEADS, DOC_PROCESSUAL_DATA, DOC_PROCESSUAL_TIPO, DOC_PROCESSUAL_ARQUIVO, DOC_PROCESSUAL_OBS, F_USER_REGISTRO, DATA_CADATRO, HORA_CADASTRO, IP_CADASTRO, F_USER_ULT_ALTERACAO, DATA_ULT_ALTERACAO, HORA_ULT_ALTERACAO, IP_ULT_ALTERACAO) VALUES (null, '$DOC_PROCESSUAL_USER', '$DOC_PROCESSUAL_STATUS', '$DOC_PROCESSUAL_LEADS', '$DOC_PROCESSUAL_DATA', '$DOC_PROCESSUAL_TIPO', '$DOC_PROCESSUAL_ARQUIVO', '$DOC_PROCESSUAL_OBS', '$F_USER_REGISTRO', '$DATA_CADATRO', '$HORA_CADASTRO', '$IP_CADASTRO', '$F_USER_ULT_ALTERACAO', '$DATA_ULT_ALTERACAO', '$HORA_ULT_ALTERACAO', '$IP_ULT_ALTERACAO')");
if (mysqli_affected_rows ($conexao)>0);

?>
<script language="javascript">
<!-- Caso a condição acima seja verdadeira o script abaiso será execultado-->
//alert ('Dados cadastrado com sucesso!');
location.href = 'laudo-doc-processual.php?ID_LEADS=<?php echo $DOC_PROCESSUAL_LEADS; ?>';
</script>