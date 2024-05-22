<?php
//conectando a base de dados...
include "Connections/conecta_banco.php";


if(isset($_FILES['LAUDO_ARQUIVO'])){
$extensao_1 = strtolower(substr($_FILES['LAUDO_ARQUIVO']['name'], -4)); //pega a extensao do arquivo
}

//Pegando os valores digitados no formulario de cadastro de clientes e armazenando em arrays super globais
$ID_LAUDO 							= isset($_POST['ID_LAUDO']) ? $_POST['ID_LAUDO'] : '';
$LAUDO_USER							= isset($_POST['LAUDO_USER']) ? $_POST['LAUDO_USER'] : '';
//$LAUDO_STATUS 						= isset($_POST['LAUDO_STATUS']) ? $_POST['LAUDO_STATUS'] : '';
$LAUDO_STATUS = '1';
$LAUDO_TIPO 						= isset($_POST['LAUDO_TIPO']) ? $_POST['LAUDO_TIPO'] : '';

$LAUDO_LEADS 						= isset($_POST['LAUDO_LEADS']) ? $_POST['LAUDO_LEADS'] : '';
$LAUDO_JURIDICO 					= isset($_POST['LAUDO_JURIDICO']) ? $_POST['LAUDO_JURIDICO'] : '';

//$LAUDO_ENVIO_USER	= $ID_USER;
//$LAUDO_ENVIO_DATA = date('Y/m/d');

$LAUDO_DATA 					= isset($_POST['LAUDO_DATA']) ? $_POST['LAUDO_DATA'] : '';
if($LAUDO_DATA > '')	{
$LAUDO_DATA_DIA = substr($LAUDO_DATA, 0, 2);
$LAUDO_DATA_MES = substr($LAUDO_DATA, 3, 2);
$LAUDO_DATA_ANO = substr($LAUDO_DATA, 6, 4);
$LAUDO_DATA = $LAUDO_DATA_ANO.'/'.$LAUDO_DATA_MES.'/'.$LAUDO_DATA_DIA;
} else	{
	$LAUDO_DATA = '0000/00/00';
}

$LAUDO_N_CONTRATO 					= isset($_POST['LAUDO_N_CONTRATO']) ? $_POST['LAUDO_N_CONTRATO'] : '';

$LAUDO_DATA_CONTRATO 				= isset($_POST['LAUDO_DATA_CONTRATO']) ? $_POST['LAUDO_DATA_CONTRATO'] : '';
if($LAUDO_DATA_CONTRATO > '')	{
$LAUDO_DATA_CONTRATO_DIA = substr($LAUDO_DATA_CONTRATO, 0, 2);
$LAUDO_DATA_CONTRATO_MES = substr($LAUDO_DATA_CONTRATO, 3, 2);
$LAUDO_DATA_CONTRATO_ANO = substr($LAUDO_DATA_CONTRATO, 6, 4);
$LAUDO_DATA_CONTRATO = $LAUDO_DATA_CONTRATO_ANO.'/'.$LAUDO_DATA_CONTRATO_MES.'/'.$LAUDO_DATA_CONTRATO_DIA;
} else	{
	$LAUDO_DATA_CONTRATO = '0000/00/00';
}

$LAUDO_PARCELA_CONTROVERSA 			= isset($_POST['LAUDO_PARCELA_CONTROVERSA']) ? $_POST['LAUDO_PARCELA_CONTROVERSA'] : '';
$LAUDO_PARCELA_INCONTROVERSA 		= isset($_POST['LAUDO_PARCELA_INCONTROVERSA']) ? $_POST['LAUDO_PARCELA_INCONTROVERSA'] : '';
$LAUDO_VALOR_VEICULO 				= isset($_POST['LAUDO_VALOR_VEICULO']) ? $_POST['LAUDO_VALOR_VEICULO'] : '';
$LAUDO_VALOR_ENTRADA 				= isset($_POST['LAUDO_VALOR_ENTRADA']) ? $_POST['LAUDO_VALOR_ENTRADA'] : '';
$LAUDO_IOF 							= isset($_POST['LAUDO_IOF']) ? $_POST['LAUDO_IOF'] : '';
$LAUDO_IOF_ADICIONAL 				= isset($_POST['LAUDO_IOF_ADICIONAL']) ? $_POST['LAUDO_IOF_ADICIONAL'] : '';
$LAUDO_VALOR_FINANCIADO 			= isset($_POST['LAUDO_VALOR_FINANCIADO']) ? $_POST['LAUDO_VALOR_FINANCIADO'] : '';
$LAUDO_TAXA_JUROS_CONTRATO 			= isset($_POST['LAUDO_TAXA_JUROS_CONTRATO']) ? $_POST['LAUDO_TAXA_JUROS_CONTRATO'] : '';
$LAUDO_TAXA_APLICADA_FINANCEIRA 	= isset($_POST['LAUDO_TAXA_APLICADA_FINANCEIRA']) ? $_POST['LAUDO_TAXA_APLICADA_FINANCEIRA'] : '';

$LAUDO_TARIFA_CADASTRO 				= isset($_POST['LAUDO_TARIFA_CADASTRO']) ? $_POST['LAUDO_TARIFA_CADASTRO'] : '';
if($LAUDO_TARIFA_CADASTRO == '')	{
$val_tarifa_cadastro = 00.00;
}	else	{
$val_tarifa_cadastro = str_replace(".","", $LAUDO_TARIFA_CADASTRO);
$val_tarifa_cadastro = str_replace(",",".", $val_tarifa_cadastro);
}

$LAUDO_TARIFA_AVALIACAO 			= isset($_POST['LAUDO_TARIFA_AVALIACAO']) ? $_POST['LAUDO_TARIFA_AVALIACAO'] : '';
if($LAUDO_TARIFA_AVALIACAO == '')	{
$val_tarifa_avaliacao = 00.00;
}	else	{
$val_tarifa_avaliacao = str_replace(".","", $LAUDO_TARIFA_AVALIACAO);
$val_tarifa_avaliacao = str_replace(",",".", $val_tarifa_avaliacao);
}

$LAUDO_REGISTRO_CONTRATO 			= isset($_POST['LAUDO_REGISTRO_CONTRATO']) ? $_POST['LAUDO_REGISTRO_CONTRATO'] : '';
if($LAUDO_REGISTRO_CONTRATO == '')	{
$val_registro_contrato = 00.00;
}	else	{
$val_registro_contrato = str_replace(".","", $LAUDO_REGISTRO_CONTRATO);
$val_registro_contrato = str_replace(",",".", $val_registro_contrato);
}

$LAUDO_SEGURO 						= isset($_POST['LAUDO_SEGURO']) ? $_POST['LAUDO_SEGURO'] : '';
if($LAUDO_SEGURO == '')	{
$val_seguro = 00.00;
}	else	{
$val_seguro = str_replace(".","", $LAUDO_SEGURO);
$val_seguro = str_replace(",",".", $val_seguro);
}

//$LAUDO_TOTAL 						= isset($_POST['LAUDO_TOTAL']) ? $_POST['LAUDO_TOTAL'] : '';
$val_total = $val_tarifa_cadastro + $val_tarifa_avaliacao + $val_registro_contrato + $val_seguro;
$LAUDO_TOTAL = number_format($val_total, 2, ',', '.');

$LAUDO_AMORTIZACAO 					= isset($_POST['LAUDO_AMORTIZACAO']) ? $_POST['LAUDO_AMORTIZACAO'] : '';
$LAUDO_RECALCULO 					= isset($_POST['LAUDO_RECALCULO']) ? $_POST['LAUDO_RECALCULO'] : '';


$LAUDO_PRESTACAO_CONTRATUAL 		= isset($_POST['LAUDO_PRESTACAO_CONTRATUAL']) ? $_POST['LAUDO_PRESTACAO_CONTRATUAL'] : '';
if($LAUDO_PRESTACAO_CONTRATUAL == '')	{
$val_prestacao_contratual = 00.00;
}	else	{
$val_prestacao_contratual = str_replace(".","", $LAUDO_PRESTACAO_CONTRATUAL);
$val_prestacao_contratual = str_replace(",",".", $val_prestacao_contratual);
}

$LAUDO_N_PRESTACAO 					= isset($_POST['LAUDO_N_PRESTACAO']) ? $_POST['LAUDO_N_PRESTACAO'] : '';

$LAUDO_PRESTACAO_RECALCULADA 		= isset($_POST['LAUDO_PRESTACAO_RECALCULADA']) ? $_POST['LAUDO_PRESTACAO_RECALCULADA'] : '';
if($LAUDO_PRESTACAO_RECALCULADA == '')	{
$val_prestacao_recalculada = 00.00;
}	else	{
$val_prestacao_recalculada = str_replace(".","", $LAUDO_PRESTACAO_RECALCULADA);
$val_prestacao_recalculada = str_replace(",",".", $val_prestacao_recalculada);
}

//$LAUDO_DIFERENCA_PRESTACAO 			= isset($_POST['LAUDO_DIFERENCA_PRESTACAO']) ? $_POST['LAUDO_DIFERENCA_PRESTACAO'] : '';
$val_diferenca_prestacao = $val_prestacao_contratual - $val_prestacao_recalculada;
$LAUDO_DIFERENCA_PRESTACAO = number_format($val_diferenca_prestacao, 2, ',', '.');

//$LAUDO_DIFERENCA_FINANCIAMENTO 		= isset($_POST['LAUDO_DIFERENCA_FINANCIAMENTO']) ? $_POST['LAUDO_DIFERENCA_FINANCIAMENTO'] : '';

$val_diferenca_financiamento = $val_diferenca_prestacao * $LAUDO_N_PRESTACAO;
$LAUDO_DIFERENCA_FINANCIAMENTO = number_format($val_diferenca_financiamento, 2, ',', '.');

///$LAUDO_TARIFAS_DEVOLVER 			= isset($_POST['LAUDO_TARIFAS_DEVOLVER']) ? $_POST['LAUDO_TARIFAS_DEVOLVER'] : '';
$val_tarifas_devolver = $val_total * 2;
$LAUDO_TARIFAS_DEVOLVER = number_format($val_tarifas_devolver, 2, ',', '.');

//$LAUDO_RECALCULO_DEVOLUCAO 			= isset($_POST['LAUDO_RECALCULO_DEVOLUCAO']) ? $_POST['LAUDO_RECALCULO_DEVOLUCAO'] : '';
$val_recalculo_devolucao = $val_diferenca_financiamento * 2;
$LAUDO_RECALCULO_DEVOLUCAO = number_format($val_recalculo_devolucao, 2, ',', '.');

//$LAUDO_TOTAL_FINAL 					= isset($_POST['LAUDO_TOTAL_FINAL']) ? $_POST['LAUDO_TOTAL_FINAL'] : '';
$LAUDO_TOTAL_FINAL = $val_recalculo_devolucao + $val_tarifas_devolver;
$LAUDO_TOTAL_FINAL = number_format($LAUDO_TOTAL_FINAL, 2, ',', '.');


$LAUDO_NOME_CONTABILIDADE 			= isset($_POST['LAUDO_NOME_CONTABILIDADE']) ? $_POST['LAUDO_NOME_CONTABILIDADE'] : '';	
//$LAUDO_ARQUIVO		= isset($_POST['LAUDO_ARQUIVO']) ? $_POST['LAUDO_ARQUIVO'] : '';	

if($extensao_1 > '')	{
$LAUDO_ARQUIVO = md5(time()) .'_1'. $extensao_1; //define o nome do arquivo
}	else	{
$LAUDO_ARQUIVO 		= isset($_POST['LAUDO_ARQUIVO']) ? $_POST['LAUDO_ARQUIVO'] : '';
}

$F_EXC_1 		= isset($_POST['F_EXC_1']) ? $_POST['F_EXC_1'] : '';
if($F_EXC_1 == '1')
$LAUDO_ARQUIVO = '';

$LAUDO_OBS 							= isset($_POST['LAUDO_OBS']) ? $_POST['LAUDO_OBS'] : '';



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
$diretorio1 = "laudo-docs/"; //define o diretorio para onde enviaremos o arquivo
move_uploaded_file($_FILES['LAUDO_ARQUIVO']['tmp_name'], $diretorio1.$LAUDO_ARQUIVO); //efetua o upload


//inserindo informoçoes na base...
$sql = "UPDATE tb_laudo SET
LAUDO_STATUS='$LAUDO_STATUS',
LAUDO_TIPO='$LAUDO_TIPO',
LAUDO_DATA='$LAUDO_DATA',
LAUDO_N_CONTRATO='$LAUDO_N_CONTRATO',
LAUDO_DATA_CONTRATO='$LAUDO_DATA_CONTRATO',
LAUDO_PARCELA_CONTROVERSA='$LAUDO_PARCELA_CONTROVERSA',
LAUDO_PARCELA_INCONTROVERSA='$LAUDO_PARCELA_INCONTROVERSA',
LAUDO_VALOR_VEICULO='$LAUDO_VALOR_VEICULO',
LAUDO_VALOR_ENTRADA='$LAUDO_VALOR_ENTRADA',
LAUDO_IOF='$LAUDO_IOF',
LAUDO_IOF_ADICIONAL='$LAUDO_IOF_ADICIONAL',
LAUDO_VALOR_FINANCIADO='$LAUDO_VALOR_FINANCIADO',
LAUDO_TAXA_JUROS_CONTRATO='$LAUDO_TAXA_JUROS_CONTRATO',
LAUDO_TAXA_APLICADA_FINANCEIRA='$LAUDO_TAXA_APLICADA_FINANCEIRA',
LAUDO_TARIFA_CADASTRO='$LAUDO_TARIFA_CADASTRO',
LAUDO_TARIFA_AVALIACAO='$LAUDO_TARIFA_AVALIACAO',
LAUDO_REGISTRO_CONTRATO='$LAUDO_REGISTRO_CONTRATO',
LAUDO_SEGURO='$LAUDO_SEGURO',
LAUDO_TOTAL='$LAUDO_TOTAL',
LAUDO_AMORTIZACAO='$LAUDO_AMORTIZACAO',
LAUDO_RECALCULO='$LAUDO_RECALCULO',
LAUDO_PRESTACAO_CONTRATUAL='$LAUDO_PRESTACAO_CONTRATUAL',
LAUDO_N_PRESTACAO='$LAUDO_N_PRESTACAO',
LAUDO_PRESTACAO_RECALCULADA='$LAUDO_PRESTACAO_RECALCULADA',
LAUDO_DIFERENCA_PRESTACAO='$LAUDO_DIFERENCA_PRESTACAO',
LAUDO_DIFERENCA_FINANCIAMENTO='$LAUDO_DIFERENCA_FINANCIAMENTO',
LAUDO_TARIFAS_DEVOLVER='$LAUDO_TARIFAS_DEVOLVER',
LAUDO_RECALCULO_DEVOLUCAO='$LAUDO_RECALCULO_DEVOLUCAO',
LAUDO_TOTAL_FINAL='$LAUDO_TOTAL_FINAL',
LAUDO_NOME_CONTABILIDADE='$LAUDO_NOME_CONTABILIDADE',
LAUDO_ARQUIVO='$LAUDO_ARQUIVO',
LAUDO_OBS='$LAUDO_OBS',
F_USER_ULT_ALTERACAO='$F_USER_ULT_ALTERACAO',
DATA_ULT_ALTERACAO='$DATA_ULT_ALTERACAO', 
HORA_ULT_ALTERACAO='$HORA_ULT_ALTERACAO', 
IP_ULT_ALTERACAO='$IP_ULT_ALTERACAO' 
WHERE ID_LAUDO='$ID_LAUDO';";
$res = mysqli_query ($conexao, $sql);

?>
<script language="javascript">
<!-- Caso a condição acima seja verdadeira o script abaiso será execultado-->
alert ('Laudo Criado com sucesso!');
location.href = 'laudo.php?ID_LEADS=<?php echo $LAUDO_LEADS; ?>&&LAUDO_JURIDICO=<?php echo $LAUDO_JURIDICO; ?>&&ID_LAUDO=<?php echo $ID_LAUDO; ?>';
</script>