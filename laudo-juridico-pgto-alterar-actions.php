<?php
//conectando a base de dados...
include "Connections/conecta_banco.php";

//Pegando os valores digitados no formulario de cadastro de clientes e armazenando em arrays super globais
$ID_VALOR_JURIDICO 				= isset($_POST['ID_VALOR_JURIDICO']) ? $_POST['ID_VALOR_JURIDICO'] : '';

$VALOR_JURIDICO_USER			 	= isset($_POST['VALOR_JURIDICO_USER']) ? $_POST['VALOR_JURIDICO_USER'] : '';
$VALOR_JURIDICO_STATUS 			= isset($_POST['VALOR_JURIDICO_STATUS']) ? $_POST['VALOR_JURIDICO_STATUS'] : '';
$VALOR_JURIDICO_TIPO 				= isset($_POST['VALOR_JURIDICO_TIPO']) ? $_POST['VALOR_JURIDICO_TIPO'] : '';
$VALOR_JURIDICO_LEADS 				= isset($_POST['VALOR_JURIDICO_LEADS']) ? $_POST['VALOR_JURIDICO_LEADS'] : '';
$VALOR_JURIDICO_FICHA 				= isset($_POST['VALOR_JURIDICO_FICHA']) ? $_POST['VALOR_JURIDICO_FICHA'] : '';
$VALOR_JURIDICO_VALOR 				= isset($_POST['VALOR_JURIDICO_VALOR']) ? $_POST['VALOR_JURIDICO_VALOR'] : '';
$VALOR_JURIDICO_QTDE_VEZES			= isset($_POST['VALOR_JURIDICO_QTDE_VEZES']) ? $_POST['VALOR_JURIDICO_QTDE_VEZES'] : '';
$VALOR_JURIDICO_PARCELA 			= isset($_POST['VALOR_JURIDICO_PARCELA']) ? $_POST['VALOR_JURIDICO_PARCELA'] : '';

$VALOR_JURIDICO_DATA_PGTO 			= isset($_POST['VALOR_JURIDICO_DATA_PGTO']) ? $_POST['VALOR_JURIDICO_DATA_PGTO'] : '';
if($VALOR_JURIDICO_DATA_PGTO > '')	{
$VALOR_JURIDICO_DATA_PGTO_DIA = substr($VALOR_JURIDICO_DATA_PGTO, 0, 2);
$VALOR_JURIDICO_DATA_PGTO_MES = substr($VALOR_JURIDICO_DATA_PGTO, 3, 2);
$VALOR_JURIDICO_DATA_PGTO_ANO = substr($VALOR_JURIDICO_DATA_PGTO, 6, 4);
$VALOR_JURIDICO_DATA_PGTO = $VALOR_JURIDICO_DATA_PGTO_ANO.'/'.$VALOR_JURIDICO_DATA_PGTO_MES.'/'.$VALOR_JURIDICO_DATA_PGTO_DIA;
} else	{
	$VALOR_JURIDICO_DATA_PGTO = '0000/00/00';
}


$VALOR_JURIDICO_OBS 				= isset($_POST['VALOR_JURIDICO_OBS']) ? $_POST['VALOR_JURIDICO_OBS'] : '';

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
$sql = "UPDATE tb_valor_juridico_laudo SET
VALOR_JURIDICO_USER='$VALOR_JURIDICO_USER',
VALOR_JURIDICO_STATUS='$VALOR_JURIDICO_STATUS',
VALOR_JURIDICO_TIPO='$VALOR_JURIDICO_TIPO',
VALOR_JURIDICO_VALOR='$VALOR_JURIDICO_VALOR',
VALOR_JURIDICO_QTDE_VEZES='$VALOR_JURIDICO_QTDE_VEZES',
VALOR_JURIDICO_PARCELA='$VALOR_JURIDICO_PARCELA',
VALOR_JURIDICO_DATA_PGTO='$VALOR_JURIDICO_DATA_PGTO',
F_USER_ULT_ALTERACAO='$F_USER_ULT_ALTERACAO',
DATA_ULT_ALTERACAO='$DATA_ULT_ALTERACAO', 
HORA_ULT_ALTERACAO='$HORA_ULT_ALTERACAO', 
IP_ULT_ALTERACAO='$IP_ULT_ALTERACAO' 
WHERE ID_VALOR_JURIDICO='$ID_VALOR_JURIDICO';";
$res = mysqli_query ($conexao, $sql);

?>
<script language="javascript">
<!-- Caso a condição acima seja verdadeira o script abaiso será execultado-->
//alert ('Dados cadastrado com sucesso!');
location.href = 'laudo-juridico-pagamento.php?ID_LEADS=<?php echo $VALOR_JURIDICO_LEADS; ?>';
</script>