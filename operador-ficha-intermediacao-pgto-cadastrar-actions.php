<?php
//conectando a base de dados...
include "Connections/conecta_banco.php";

//Pegando os valores digitados no formulario de cadastro de clientes e armazenando em arrays super globais
$ID_VALOR_CONTR 				= isset($_POST['ID_VALOR_CONTR']) ? $_POST['ID_VALOR_CONTR'] : '';

$VALOR_CONTR_USER			 	= isset($_POST['VALOR_CONTR_USER']) ? $_POST['VALOR_CONTR_USER'] : '';
$VALOR_CONTR_STATUS 			= isset($_POST['VALOR_CONTR_STATUS']) ? $_POST['VALOR_CONTR_STATUS'] : '';
$VALOR_CONTR_ENTR_PARC 			= isset($_POST['VALOR_CONTR_ENTR_PARC']) ? $_POST['VALOR_CONTR_ENTR_PARC'] : '';
$VALOR_CONTR_TIPO 				= isset($_POST['VALOR_CONTR_TIPO']) ? $_POST['VALOR_CONTR_TIPO'] : '';
$VALOR_CONTR_LEADS 				= isset($_POST['VALOR_CONTR_LEADS']) ? $_POST['VALOR_CONTR_LEADS'] : '';
$VALOR_CONTR_FICHA 				= isset($_POST['VALOR_CONTR_FICHA']) ? $_POST['VALOR_CONTR_FICHA'] : '';

$VALOR_CONTR_VALOR 				= isset($_POST['VALOR_CONTR_VALOR']) ? $_POST['VALOR_CONTR_VALOR'] : '';
$val_valor_contr_valor = str_replace(".","", $VALOR_CONTR_VALOR);
$val_valor_contr_valor = str_replace(",",".", $val_valor_contr_valor);

$VALOR_CONTR_QTDE_VEZES			= isset($_POST['VALOR_CONTR_QTDE_VEZES']) ? $_POST['VALOR_CONTR_QTDE_VEZES'] : '';
$VALOR_CONTR_PARCELA 			= isset($_POST['VALOR_CONTR_PARCELA']) ? $_POST['VALOR_CONTR_PARCELA'] : '';

$VALOR_CONTR_DATA_PGTO 			= isset($_POST['VALOR_CONTR_DATA_PGTO']) ? $_POST['VALOR_CONTR_DATA_PGTO'] : '';
if($VALOR_CONTR_DATA_PGTO > '')	{
$VALOR_CONTR_DATA_PGTO_DIA = substr($VALOR_CONTR_DATA_PGTO, 0, 2);
$VALOR_CONTR_DATA_PGTO_MES = substr($VALOR_CONTR_DATA_PGTO, 3, 2);
$VALOR_CONTR_DATA_PGTO_ANO = substr($VALOR_CONTR_DATA_PGTO, 6, 4);
$VALOR_CONTR_DATA_PGTO = $VALOR_CONTR_DATA_PGTO_ANO.'/'.$VALOR_CONTR_DATA_PGTO_MES.'/'.$VALOR_CONTR_DATA_PGTO_DIA;
} else	{
	$VALOR_CONTR_DATA_PGTO = '0000/00/00';
}


$VALOR_CONTR_OBS 				= isset($_POST['VALOR_CONTR_OBS']) ? $_POST['VALOR_CONTR_OBS'] : '';

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




$val_valor_contr_valor = $val_valor_contr_valor / $VALOR_CONTR_QTDE_VEZES;
$VALOR_CONTR_VALOR_PARCELA = number_format($val_valor_contr_valor, 2, ',', '.');


//$primeira_data = $VALOR_CONTR_DATA_PGTO;
//$valores = range( 1 , $VALOR_CONTR_QTDE_VEZES);
//for ( $i = 0, $total = count( $valores ); $i < $total; $i++ )
//{

//echo $i;
//echo "<BR>";
//$VALOR_CONTR_DATA_PGTO = date('Y/m/d', strtotime('+'.$i.' months', strtotime($VALOR_CONTR_DATA_PGTO)));
//echo "<BR>";
//$VALOR_CONTR_PARCELA = ($i + 1).'/'.$VALOR_CONTR_QTDE_VEZES;
//echo "<BR>";


//inserindo informoçoes na base...
mysqli_query ($conexao,"INSERT INTO tb_valor_contratacao (ID_VALOR_CONTR, VALOR_CONTR_USER, VALOR_CONTR_STATUS, VALOR_CONTR_ENTR_PARC, VALOR_CONTR_TIPO, VALOR_CONTR_LEADS, VALOR_CONTR_FICHA, VALOR_CONTR_VALOR, VALOR_CONTR_QTDE_VEZES, VALOR_CONTR_PARCELA, VALOR_CONTR_DATA_PGTO, VALOR_CONTR_VALOR_PARCELA, VALOR_CONTR_OBS, F_USER_REGISTRO, DATA_CADATRO, HORA_CADASTRO, IP_CADASTRO, F_USER_ULT_ALTERACAO, DATA_ULT_ALTERACAO, HORA_ULT_ALTERACAO, IP_ULT_ALTERACAO) VALUES (null, '$VALOR_CONTR_USER', '$VALOR_CONTR_STATUS', '$VALOR_CONTR_ENTR_PARC', '$VALOR_CONTR_TIPO', '$VALOR_CONTR_LEADS', '$VALOR_CONTR_FICHA', '$VALOR_CONTR_VALOR', '$VALOR_CONTR_QTDE_VEZES', '$VALOR_CONTR_PARCELA', '$VALOR_CONTR_DATA_PGTO', '$VALOR_CONTR_VALOR_PARCELA', '$VALOR_CONTR_OBS', '$F_USER_REGISTRO', '$DATA_CADATRO', '$HORA_CADASTRO', '$IP_CADASTRO', '$F_USER_ULT_ALTERACAO', '$DATA_ULT_ALTERACAO', '$HORA_ULT_ALTERACAO', '$IP_ULT_ALTERACAO')");
//if (mysqli_affected_rows ($conexao)>0);



//$VALOR_CONTR_DATA_PGTO = $primeira_data;
//}



?>
<script language="javascript">
<!-- Caso a condição acima seja verdadeira o script abaiso será execultado-->
//alert ('Dados cadastrado com sucesso!');
location.href = 'operador-ficha-intermediacao.php?ID_LEADS=<?php echo $VALOR_CONTR_LEADS; ?>';
</script>