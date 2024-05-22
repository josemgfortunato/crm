<?php
//conectando a base de dados...
include "Connections/conecta_banco.php";


if(isset($_FILES['LEADS_OP_ADM_DOC_ARQUIVO'])){
$extensao_1 = strtolower(substr($_FILES['LEADS_OP_ADM_DOC_ARQUIVO']['name'], -4)); //pega a extensao do arquivo
}

//Pegando os valores das variaveis
$ID_LEADS_OP_ADM_DOC 			= isset($_POST['ID_LEADS_OP_ADM_DOC']) ? $_POST['ID_LEADS_OP_ADM_DOC'] : '';
$LEADS_OP_ADM_DOC_USER 			= isset($_POST['LEADS_OP_ADM_DOC_USER']) ? $_POST['LEADS_OP_ADM_DOC_USER'] : '';	
$LEADS_OP_ADM_DOC_STATUS 		= isset($_POST['LEADS_OP_ADM_DOC_STATUS']) ? $_POST['LEADS_OP_ADM_DOC_STATUS'] : '';	
//$LEADS_OP_ADM_DOC_STATUS = '1';	
$LEADS_OP_ADM_DOC_LEADS	 	= isset($_POST['LEADS_OP_ADM_DOC_LEADS']) ? $_POST['LEADS_OP_ADM_DOC_LEADS'] : '';	
$LEADS_OP_ADM_DOC_DATA	= date("Y/m/d");;
$LEADS_OP_ADM_DOC_TIPO 			= isset($_POST['LEADS_OP_ADM_DOC_TIPO']) ? $_POST['LEADS_OP_ADM_DOC_TIPO'] : '';	
//$LEADS_OP_ADM_DOC_ARQUIVO		= isset($_POST['LEADS_OP_ADM_DOC_ARQUIVO']) ? $_POST['LEADS_OP_ADM_DOC_ARQUIVO'] : '';	

if($extensao_1 > '')	{
$LEADS_OP_ADM_DOC_ARQUIVO = md5(time()) .'_1'. $extensao_1; //define o nome do arquivo
}	else	{
$LEADS_OP_ADM_DOC_ARQUIVO 		= isset($_POST['LEADS_OP_ADM_DOC_ARQUIVO']) ? $_POST['LEADS_OP_ADM_DOC_ARQUIVO'] : '';
}

$F_EXC_1 		= isset($_POST['F_EXC_1']) ? $_POST['F_EXC_1'] : '';
if($F_EXC_1 == '1')
$LEADS_OP_ADM_DOC_ARQUIVO = '';



$LEADS_OP_ADM_DOC_OBS 			= isset($_POST['LEADS_OP_ADM_DOC_OBS']) ? $_POST['LEADS_OP_ADM_DOC_OBS'] : '';	

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
$diretorio1 = "op-adm-docs/"; //define o diretorio para onde enviaremos o arquivo
move_uploaded_file($_FILES['LEADS_OP_ADM_DOC_ARQUIVO']['tmp_name'], $diretorio1.$LEADS_OP_ADM_DOC_ARQUIVO); //efetua o upload


////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
mysqli_query ($conexao,"INSERT INTO tb_leads_op_adm_doc (ID_LEADS_OP_ADM_DOC, LEADS_OP_ADM_DOC_USER, LEADS_OP_ADM_DOC_STATUS, LEADS_OP_ADM_DOC_LEADS, LEADS_OP_ADM_DOC_DATA, LEADS_OP_ADM_DOC_TIPO, LEADS_OP_ADM_DOC_ARQUIVO, LEADS_OP_ADM_DOC_OBS, F_USER_REGISTRO, DATA_CADATRO, HORA_CADASTRO, IP_CADASTRO, F_USER_ULT_ALTERACAO, DATA_ULT_ALTERACAO, HORA_ULT_ALTERACAO, IP_ULT_ALTERACAO) VALUES (null, '$LEADS_OP_ADM_DOC_USER', '$LEADS_OP_ADM_DOC_STATUS', '$LEADS_OP_ADM_DOC_LEADS', '$LEADS_OP_ADM_DOC_DATA', '$LEADS_OP_ADM_DOC_TIPO', '$LEADS_OP_ADM_DOC_ARQUIVO', '$LEADS_OP_ADM_DOC_OBS', '$F_USER_REGISTRO', '$DATA_CADATRO', '$HORA_CADASTRO', '$IP_CADASTRO', '$F_USER_ULT_ALTERACAO', '$DATA_ULT_ALTERACAO', '$HORA_ULT_ALTERACAO', '$IP_ULT_ALTERACAO')");
if (mysqli_affected_rows ($conexao)>0);

?>
<script language="javascript">
<!-- Caso a condição acima seja verdadeira o script abaiso será execultado-->
//alert ('Dados cadastrado com sucesso!');
location.href = 'op-adm-doc.php?ID_LEADS=<?php echo $LEADS_OP_ADM_DOC_LEADS; ?>';
</script>