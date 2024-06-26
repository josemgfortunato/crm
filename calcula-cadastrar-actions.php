<?php
//conectando a base de dados...
include "Connections/conecta_banco.php";

//Pegando os valores digitados no formulario de cadastro de clientes e armazenando em arrays super globais
$ID_CALCULO 								= isset($_POST['ID_CALCULO']) ? $_POST['ID_CALCULO'] : '';
$CALCULO_USER 								= isset($_POST['CALCULO_USER']) ? $_POST['CALCULO_USER'] : '';

//$CALCULO_STATUS 		= isset($_POST['CALCULO_STATUS']) ? $_POST['CALCULO_STATUS'] : '';
$CALCULO_STATUS = '1';

$CALCULO_TIPO 								= isset($_POST['CALCULO_TIPO']) ? $_POST['CALCULO_TIPO'] : '';
$CALCULO_LEADS 								= isset($_POST['CALCULO_LEADS']) ? $_POST['CALCULO_LEADS'] : '';

//$CALCULO_DATA 		= isset($_POST['CALCULO_DATA']) ? $_POST['CALCULO_DATA'] : '';
$CALCULO_DATA		= date("Y/m/d");

$CALCULO_FINANCEIRA 						= isset($_POST['CALCULO_FINANCEIRA']) ? $_POST['CALCULO_FINANCEIRA'] : '';
$CALCULO_VEICULO 							= isset($_POST['CALCULO_VEICULO']) ? $_POST['CALCULO_VEICULO'] : '';
$CALCULO_CORRECAO_N 						= isset($_POST['CALCULO_CORRECAO_N']) ? $_POST['CALCULO_CORRECAO_N'] : '';
$CALCULO_NOME_CLIENTE 						= isset($_POST['CALCULO_NOME_CLIENTE']) ? $_POST['CALCULO_NOME_CLIENTE'] : '';
$CALCULO_CPF		 						= isset($_POST['CALCULO_CPF']) ? $_POST['CALCULO_CPF'] : '';

$CALCULO_VALOR_VISTA 						= isset($_POST['CALCULO_VALOR_VISTA']) ? $_POST['CALCULO_VALOR_VISTA'] : '';
$val_valor_vista = str_replace(".","", $CALCULO_VALOR_VISTA);
$val_valor_vista = str_replace(",",".", $val_valor_vista);

$CALCULO_ENTRADA 							= isset($_POST['CALCULO_ENTRADA']) ? $_POST['CALCULO_ENTRADA'] : '';
$val_entrada= str_replace(".","", $CALCULO_ENTRADA);
$val_entrada = str_replace(",",".", $val_entrada);
if($CALCULO_ENTRADA == '')	{
$val_entrada = 00.00;
$CALCULO_ENTRADA = '0,00';
}

$CALCULO_QTDE_PARCELAS 						= isset($_POST['CALCULO_QTDE_PARCELAS']) ? $_POST['CALCULO_QTDE_PARCELAS'] : '';
$CALCULO_VALOR_ATUAL_PARCELA 				= isset($_POST['CALCULO_VALOR_ATUAL_PARCELA']) ? $_POST['CALCULO_VALOR_ATUAL_PARCELA'] : '';
$val_atual_parcela = str_replace(".","", $CALCULO_VALOR_ATUAL_PARCELA);
$val_atual_parcela = str_replace(",",".", $val_atual_parcela);

$CALCULO_PARCELAS_PAGAS 					= isset($_POST['CALCULO_PARCELAS_PAGAS']) ? $_POST['CALCULO_PARCELAS_PAGAS'] : '';
$CALCULO_PARCELAS_ATRASO 					= isset($_POST['CALCULO_PARCELAS_ATRASO']) ? $_POST['CALCULO_PARCELAS_ATRASO'] : '';


//$CALCULO_VALOR_FINANCIADO 					= isset($_POST['CALCULO_VALOR_FINANCIADO']) ? $_POST['CALCULO_VALOR_FINANCIADO'] : '';
$CALCULO_VALOR_FINANCIADO = $val_valor_vista - $val_entrada;
$CALCULO_VALOR_FINANCIADO = number_format($CALCULO_VALOR_FINANCIADO, 2, ',', '.');



//$CALCULO_PARCELAS_A_PAGAR 					= isset($_POST['CALCULO_PARCELAS_A_PAGAR']) ? $_POST['CALCULO_PARCELAS_A_PAGAR'] : '';
$CALCULO_PARCELAS_A_PAGAR = $CALCULO_QTDE_PARCELAS - $CALCULO_PARCELAS_PAGAS;

$CALCULO_VALOR_PARCELAS_CORRIGIDA 			= isset($_POST['CALCULO_VALOR_PARCELAS_CORRIGIDA']) ? $_POST['CALCULO_VALOR_PARCELAS_CORRIGIDA'] : '';
//$val_parcela_porc = $val_atual_parcela * (33.2 / 100);
$val_parcela_porc = $val_atual_parcela * (30 / 100);

$val_parcela_corrigida = $val_atual_parcela - $val_parcela_porc;
$CALCULO_VALOR_PARCELAS_CORRIGIDA = number_format($val_parcela_corrigida, 2, ',', '.');



//$CALCULO_VALOR_TOTAL_FINANCIAMENTO_ATUAL 	= isset($_POST['CALCULO_VALOR_TOTAL_FINANCIAMENTO_ATUAL']) ? $_POST['CALCULO_VALOR_TOTAL_FINANCIAMENTO_ATUAL'] : '';
$val_valor_total_financiamento_atual = $val_atual_parcela * $CALCULO_QTDE_PARCELAS;
$CALCULO_VALOR_TOTAL_FINANCIAMENTO_ATUAL = number_format($val_valor_total_financiamento_atual, 2, ',', '.');


//$CALCULO_VALOR_CORRETO_FINANCIAMENTO		= isset($_POST['CALCULO_VALOR_CORRETO_FINANCIAMENTO']) ? $_POST['CALCULO_VALOR_CORRETO_FINANCIAMENTO'] : '';
$val_correto_financiamento = $val_parcela_corrigida * $CALCULO_QTDE_PARCELAS;
$CALCULO_VALOR_CORRETO_FINANCIAMENTO = number_format($val_correto_financiamento, 2, ',', '.');



//$CALCULO_JUROS_ABUSIVOS_PARCELA  = isset($_POST['CALCULO_JUROS_ABUSIVOS_PARCELA']) ? $_POST['CALCULO_JUROS_ABUSIVOS_PARCELA'] : '';
$val_juros_abusivos_parcela  = $val_atual_parcela - $val_parcela_corrigida;
$CALCULO_JUROS_ABUSIVOS_PARCELA = number_format($val_juros_abusivos_parcela, 2, ',', '.');


//$CALCULO_VALOR_PAGO_DATA_ATUAL	 			= isset($_POST['CALCULO_VALOR_PAGO_DATA_ATUAL']) ? $_POST['CALCULO_VALOR_PAGO_DATA_ATUAL'] : '';
$val_valor_pago_data_atual = $val_atual_parcela * $CALCULO_PARCELAS_PAGAS;
$CALCULO_VALOR_PAGO_DATA_ATUAL = number_format($val_valor_pago_data_atual, 2, ',', '.');



//$CALCULO_JUROS_ABUSIVOS_PAGO	 			= isset($_POST['CALCULO_JUROS_ABUSIVOS_PAGO']) ? $_POST['CALCULO_JUROS_ABUSIVOS_PAGO'] : '';
$CALCULO_JUROS_ABUSIVOS_PAGO = $val_juros_abusivos_parcela * $CALCULO_PARCELAS_PAGAS;
$CALCULO_JUROS_ABUSIVOS_PAGO = number_format($CALCULO_JUROS_ABUSIVOS_PAGO, 2, ',', '.');




//$CALCULO_FALTA_PAGAR			 			= isset($_POST['CALCULO_FALTA_PAGAR']) ? $_POST['CALCULO_FALTA_PAGAR'] : '';
$CALCULO_FALTA_PAGAR = $CALCULO_PARCELAS_A_PAGAR * $val_atual_parcela;
$CALCULO_FALTA_PAGAR = number_format($CALCULO_FALTA_PAGAR, 2, ',', '.');


//$CALCULO_DIVIDA					 			= isset($_POST['CALCULO_DIVIDA']) ? $_POST['CALCULO_DIVIDA'] : '';
$val_calcula_divida = $val_correto_financiamento - $val_valor_pago_data_atual;
$CALCULO_DIVIDA = number_format($val_calcula_divida, 2, ',', '.');



//$CALCULO_ECONOMIA				 			= isset($_POST['CALCULO_ECONOMIA']) ? $_POST['CALCULO_ECONOMIA'] : '';
$val_calcula_economia =  $val_valor_total_financiamento_atual - $val_correto_financiamento;
$CALCULO_ECONOMIA = number_format($val_calcula_economia, 2, ',', '.');



//$CALCULO_VALOR_DERRUBADO_PARCELA			= isset($_POST['CALCULO_VALOR_DERRUBADO_PARCELA']) ? $_POST['CALCULO_VALOR_DERRUBADO_PARCELA'] : '';
//$CALCULO_VALOR_DERRUBADO_PARCELA = $val_calcula_divida / $CALCULO_PARCELAS_A_PAGAR;
if($CALCULO_PARCELAS_PAGAS == $CALCULO_PARCELAS_A_PAGAR)
$CALCULO_VALOR_DERRUBADO_PARCELA = $val_calcula_divida / $CALCULO_PARCELAS_A_PAGAR;
else
$CALCULO_VALOR_DERRUBADO_PARCELA = $val_calcula_divida;

$CALCULO_VALOR_DERRUBADO_PARCELA = number_format($CALCULO_VALOR_DERRUBADO_PARCELA, 2, ',', '.');



$CALCULO_OBS					 			= isset($_POST['CALCULO_OBS']) ? $_POST['CALCULO_OBS'] : '';

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

echo $CALCULO_MANUAL 								= isset($_POST['CALCULO_MANUAL']) ? $_POST['CALCULO_MANUAL'] : '';
if($CALCULO_MANUAL == '1')	{

$CALCULO_VALOR_FINANCIADO 					= isset($_POST['CALCULO_VALOR_FINANCIADO']) ? $_POST['CALCULO_VALOR_FINANCIADO'] : '';
$CALCULO_PARCELAS_A_PAGAR 					= isset($_POST['CALCULO_PARCELAS_A_PAGAR']) ? $_POST['CALCULO_PARCELAS_A_PAGAR'] : '';
$CALCULO_VALOR_PARCELAS_CORRIGIDA 			= isset($_POST['CALCULO_VALOR_PARCELAS_CORRIGIDA']) ? $_POST['CALCULO_VALOR_PARCELAS_CORRIGIDA'] : '';
$CALCULO_VALOR_TOTAL_FINANCIAMENTO_ATUAL	= isset($_POST['CALCULO_VALOR_TOTAL_FINANCIAMENTO_ATUAL']) ? $_POST['CALCULO_VALOR_TOTAL_FINANCIAMENTO_ATUAL'] : '';
$CALCULO_VALOR_CORRETO_FINANCIAMENTO		= isset($_POST['CALCULO_VALOR_CORRETO_FINANCIAMENTO']) ? $_POST['CALCULO_VALOR_CORRETO_FINANCIAMENTO'] : '';
$CALCULO_JUROS_ABUSIVOS_PARCELA				= isset($_POST['CALCULO_JUROS_ABUSIVOS_PARCELA']) ? $_POST['CALCULO_JUROS_ABUSIVOS_PARCELA'] : '';
$CALCULO_VALOR_PAGO_DATA_ATUAL				= isset($_POST['CALCULO_VALOR_PAGO_DATA_ATUAL']) ? $_POST['CALCULO_VALOR_PAGO_DATA_ATUAL'] : '';
$CALCULO_JUROS_ABUSIVOS_PAGO 				= isset($_POST['CALCULO_JUROS_ABUSIVOS_PAGO']) ? $_POST['CALCULO_JUROS_ABUSIVOS_PAGO'] : '';
$CALCULO_FALTA_PAGAR						= isset($_POST['CALCULO_FALTA_PAGAR']) ? $_POST['CALCULO_FALTA_PAGAR'] : '';
$CALCULO_DIVIDA 							= isset($_POST['CALCULO_DIVIDA']) ? $_POST['CALCULO_DIVIDA'] : '';
$CALCULO_ECONOMIA 							= isset($_POST['CALCULO_ECONOMIA']) ? $_POST['CALCULO_ECONOMIA'] : '';
$CALCULO_VALOR_DERRUBADO_PARCELA			= isset($_POST['CALCULO_VALOR_DERRUBADO_PARCELA']) ? $_POST['CALCULO_VALOR_DERRUBADO_PARCELA'] : '';

}

//inserindo informoçoes na base...
mysqli_query ($conexao,"INSERT INTO tb_calculo_financeiro (ID_CALCULO, CALCULO_USER, CALCULO_STATUS, CALCULO_TIPO, CALCULO_LEADS, CALCULO_DATA, CALCULO_FINANCEIRA, CALCULO_VEICULO, CALCULO_CORRECAO_N, CALCULO_NOME_CLIENTE, CALCULO_CPF, CALCULO_VALOR_VISTA, CALCULO_ENTRADA, CALCULO_QTDE_PARCELAS, CALCULO_VALOR_ATUAL_PARCELA, CALCULO_PARCELAS_PAGAS, CALCULO_PARCELAS_ATRASO, CALCULO_VALOR_FINANCIADO, CALCULO_PARCELAS_A_PAGAR, CALCULO_VALOR_PARCELAS_CORRIGIDA, CALCULO_VALOR_TOTAL_FINANCIAMENTO_ATUAL, CALCULO_VALOR_CORRETO_FINANCIAMENTO, CALCULO_JUROS_ABUSIVOS_PARCELA, CALCULO_VALOR_PAGO_DATA_ATUAL, CALCULO_JUROS_ABUSIVOS_PAGO, CALCULO_FALTA_PAGAR, CALCULO_DIVIDA, CALCULO_ECONOMIA, CALCULO_VALOR_DERRUBADO_PARCELA, CALCULO_OBS, F_USER_REGISTRO, DATA_CADATRO, HORA_CADASTRO, IP_CADASTRO, F_USER_ULT_ALTERACAO, DATA_ULT_ALTERACAO, HORA_ULT_ALTERACAO, IP_ULT_ALTERACAO) VALUES (null, '$CALCULO_USER', '$CALCULO_STATUS', '$CALCULO_TIPO', '$CALCULO_LEADS', '$CALCULO_DATA', '$CALCULO_FINANCEIRA', '$CALCULO_VEICULO', '$CALCULO_CORRECAO_N', '$CALCULO_NOME_CLIENTE', '$CALCULO_CPF', '$CALCULO_VALOR_VISTA', '$CALCULO_ENTRADA', '$CALCULO_QTDE_PARCELAS', '$CALCULO_VALOR_ATUAL_PARCELA', '$CALCULO_PARCELAS_PAGAS', '$CALCULO_PARCELAS_ATRASO', '$CALCULO_VALOR_FINANCIADO', '$CALCULO_PARCELAS_A_PAGAR', '$CALCULO_VALOR_PARCELAS_CORRIGIDA', '$CALCULO_VALOR_TOTAL_FINANCIAMENTO_ATUAL', '$CALCULO_VALOR_CORRETO_FINANCIAMENTO', '$CALCULO_JUROS_ABUSIVOS_PARCELA', '$CALCULO_VALOR_PAGO_DATA_ATUAL', '$CALCULO_JUROS_ABUSIVOS_PAGO', '$CALCULO_FALTA_PAGAR', '$CALCULO_DIVIDA', '$CALCULO_ECONOMIA', '$CALCULO_VALOR_DERRUBADO_PARCELA', '$CALCULO_OBS', '$F_USER_REGISTRO', '$DATA_CADATRO', '$HORA_CADASTRO', '$IP_CADASTRO', '$F_USER_ULT_ALTERACAO', '$DATA_ULT_ALTERACAO', '$HORA_ULT_ALTERACAO', '$IP_ULT_ALTERACAO')");
if (mysqli_affected_rows ($conexao)>0);

?>
<script language="javascript">
<!-- Caso a condição acima seja verdadeira o script abaiso será execultado-->
//alert ('Dados cadastrado com sucesso!');
location.href = 'leads-operador.php?ID_LEADS=<?php echo $CALCULO_LEADS; ?>';
</script>