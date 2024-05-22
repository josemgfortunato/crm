<?php

$sql_calculo = mysqli_query($conexao,"select * from tb_calculo_financeiro WHERE CALCULO_LEADS = '$ID_LEADS' ORDER BY ID_CALCULO DESC ");
$val_calculo = mysqli_fetch_object($sql_calculo);  

$ID_CALCULO 								= isset($val_calculo->ID_CALCULO) ? $val_calculo->ID_CALCULO : '';	
$CALCULO_USER 								= isset($val_calculo->CALCULO_USER) ? $val_calculo->CALCULO_USER : '';	
$CALCULO_STATUS 							= isset($val_calculo->CALCULO_STATUS) ? $val_calculo->CALCULO_STATUS : '';	
$CALCULO_TIPO 								= isset($val_calculo->CALCULO_TIPO) ? $val_calculo->CALCULO_TIPO : '';	
$CALCULO_LEADS 								= isset($val_calculo->CALCULO_LEADS) ? $val_calculo->CALCULO_LEADS : '';	
$CALCULO_FINANCEIRA							= isset($val_calculo->CALCULO_FINANCEIRA) ? $val_calculo->CALCULO_FINANCEIRA : '';	
$CALCULO_VEICULO							= isset($val_calculo->CALCULO_VEICULO) ? $val_calculo->CALCULO_VEICULO : '';	
$CALCULO_CORRECAO_N							= isset($val_calculo->CALCULO_CORRECAO_N) ? $val_calculo->CALCULO_CORRECAO_N : '';	
$CALCULO_VALOR_VISTA 						= isset($val_calculo->CALCULO_VALOR_VISTA) ? $val_calculo->CALCULO_VALOR_VISTA : '';	
$CALCULO_ENTRADA 							= isset($val_calculo->CALCULO_ENTRADA) ? $val_calculo->CALCULO_ENTRADA : '';	
$CALCULO_QTDE_PARCELAS 						= isset($val_calculo->CALCULO_QTDE_PARCELAS) ? $val_calculo->CALCULO_QTDE_PARCELAS : '';	
$CALCULO_VALOR_ATUAL_PARCELA 				= isset($val_calculo->CALCULO_VALOR_ATUAL_PARCELA) ? $val_calculo->CALCULO_VALOR_ATUAL_PARCELA : '';	
$CALCULO_PARCELAS_PAGAS 					= isset($val_calculo->CALCULO_PARCELAS_PAGAS) ? $val_calculo->CALCULO_PARCELAS_PAGAS : '';	
$CALCULO_PARCELAS_ATRASO 					= isset($val_calculo->CALCULO_PARCELAS_ATRASO) ? $val_calculo->CALCULO_PARCELAS_ATRASO : '';	
$CALCULO_VALOR_FINANCIADO 					= isset($val_calculo->CALCULO_VALOR_FINANCIADO) ? $val_calculo->CALCULO_VALOR_FINANCIADO : '';	
$CALCULO_PARCELAS_A_PAGAR 					= isset($val_calculo->CALCULO_PARCELAS_A_PAGAR) ? $val_calculo->CALCULO_PARCELAS_A_PAGAR : '';	
$CALCULO_VALOR_PARCELAS_CORRIGIDA 			= isset($val_calculo->CALCULO_VALOR_PARCELAS_CORRIGIDA) ? $val_calculo->CALCULO_VALOR_PARCELAS_CORRIGIDA : '';	
$CALCULO_VALOR_TOTAL_FINANCIAMENTO_ATUAL	= isset($val_calculo->CALCULO_VALOR_TOTAL_FINANCIAMENTO_ATUAL) ? $val_calculo->CALCULO_VALOR_TOTAL_FINANCIAMENTO_ATUAL : '';	
$CALCULO_VALOR_CORRETO_FINANCIAMENTO 		= isset($val_calculo->CALCULO_VALOR_CORRETO_FINANCIAMENTO) ? $val_calculo->CALCULO_VALOR_CORRETO_FINANCIAMENTO : '';	
$CALCULO_JUROS_ABUSIVOS_PARCELA 			= isset($val_calculo->CALCULO_JUROS_ABUSIVOS_PARCELA) ? $val_calculo->CALCULO_JUROS_ABUSIVOS_PARCELA : '';	
$CALCULO_VALOR_PAGO_DATA_ATUAL 				= isset($val_calculo->CALCULO_VALOR_PAGO_DATA_ATUAL) ? $val_calculo->CALCULO_VALOR_PAGO_DATA_ATUAL : '';	
$CALCULO_JUROS_ABUSIVOS_PAGO 				= isset($val_calculo->CALCULO_JUROS_ABUSIVOS_PAGO) ? $val_calculo->CALCULO_JUROS_ABUSIVOS_PAGO : '';	
$CALCULO_FALTA_PAGAR 						= isset($val_calculo->CALCULO_FALTA_PAGAR) ? $val_calculo->CALCULO_FALTA_PAGAR : '';	
$CALCULO_DIVIDA 							= isset($val_calculo->CALCULO_DIVIDA) ? $val_calculo->CALCULO_DIVIDA : '';	
$CALCULO_ECONOMIA 							= isset($val_calculo->CALCULO_ECONOMIA) ? $val_calculo->CALCULO_ECONOMIA : '';	
$CALCULO_VALOR_DERRUBADO_PARCELA 			= isset($val_calculo->CALCULO_VALOR_DERRUBADO_PARCELA) ? $val_calculo->CALCULO_VALOR_DERRUBADO_PARCELA : '';	
$CALCULO_OBS 								= isset($val_calculo->CALCULO_OBS) ? $val_calculo->CALCULO_OBS : '';	

//session_start();
?>
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-warning">
VISUALIZAR CALCULO
</button>


<div class="modal modal-danger fade" id="modal-warning">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" style="font-size:24px"><strong>CALCULO</strong></h4>
</div>
<div class="modal-body">

<!--
<p style="font-size:16px">1° Preparação (espiritual com seu poder superior)</p>


<div class="box-body">
-->


<div class="row">
<div class="col-lg-5">
<label for="exampleInputEmail1">Financeira:</label>
<input type="text" class="form-control" id="CALCULO_FINANCEIRA" name="CALCULO_FINANCEIRA" value="<?php echo $CALCULO_FINANCEIRA; ?>" readonly="readonly" />
</div>

<div class="col-lg-4">
<label for="exampleInputEmail1">Modelo do Veículo:</label>
<input type="text" class="form-control" id="CALCULO_VEICULO" name="CALCULO_VEICULO" value="<?php echo $CALCULO_VEICULO; ?>" readonly="readonly" />
</div>

<div class="col-lg-3">
<label for="exampleInputEmail1">Correção Nº:</label>
<input type="text" class="form-control" id="CALCULO_CORRECAO_N" name="CALCULO_CORRECAO_N" value="<?php echo $CALCULO_CORRECAO_N; ?>" readonly="readonly" />
</div>
</div>
<br>


<div class="row">

<div class="col-lg-4">
<label for="exampleInputEmail1">Valor do Veículo a Vista:</label>
<input type="text" class="form-control" id="CALCULO_VALOR_VISTA" name="CALCULO_VALOR_VISTA" value="<?php echo $CALCULO_VALOR_VISTA; ?>" readonly="readonly" />
</div>

<div class="col-lg-3">
<label for="exampleInputPassword1">Entrada:</label>
<input type="text" class="form-control" id="CALCULO_ENTRADA" name="CALCULO_ENTRADA" value="<?php echo $CALCULO_ENTRADA; ?>" readonly="readonly" />
</div>

<div class="col-lg-3">
<label for="exampleInputPassword1">Qtde. de Parcelas:</label>
<input type="text" class="form-control" id="CALCULO_QTDE_PARCELAS" name="CALCULO_QTDE_PARCELAS" value="<?php echo $CALCULO_QTDE_PARCELAS; ?>" readonly="readonly" />
</div>

</div>
<br>


<div class="row">

<div class="col-lg-4">
<label for="exampleInputPassword1">Valor Atual da Parcela:</label>
    <input type="text" class="form-control" id="CALCULO_VALOR_ATUAL_PARCELA" name="CALCULO_VALOR_ATUAL_PARCELA" value="<?php echo $CALCULO_VALOR_ATUAL_PARCELA; ?>" readonly="readonly" />
</div>

<div class="col-lg-3">
<label for="exampleInputPassword1">Parcelas Pagas:</label>
<input type="text" class="form-control" id="CALCULO_PARCELAS_PAGAS" name="CALCULO_PARCELAS_PAGAS" value="<?php echo $CALCULO_PARCELAS_PAGAS; ?>" readonly="readonly" />
</div>

<div class="col-lg-4">
<label for="exampleInputPassword1">Parcelas em Atraso:</label>
<input type="text" class="form-control" id="CALCULO_PARCELAS_ATRASO" name="CALCULO_PARCELAS_ATRASO" value="<?php echo $CALCULO_PARCELAS_ATRASO; ?>" readonly="readonly" />
</div>

</div>
<br>


<div class="row">
<div class="col-lg-3">
<label for="exampleInputEmail1">Valor Financiado:</label>
<input type="text" class="form-control" id="CALCULO_VALOR_FINANCIADO" name="CALCULO_VALOR_FINANCIADO" value="<?php echo $CALCULO_VALOR_FINANCIADO; ?>" readonly />
</div>

<div class="col-lg-3">
<label for="exampleInputPassword1">Parcelas a Pagar:</label>
<input type="text" class="form-control" id="CALCULO_PARCELAS_A_PAGAR" name="CALCULO_PARCELAS_A_PAGAR" value="<?php echo $CALCULO_PARCELAS_A_PAGAR; ?>" readonly />
</div>

</div>
<br>

<br>

<div class="row">
<div class="col-lg-6">
<label for="exampleInputEmail1">Valor da parcela corrigido:</label>
<input type="text" class="form-control" id="CALCULO_VALOR_PARCELAS_CORRIGIDA" name="CALCULO_VALOR_PARCELAS_CORRIGIDA" value="<?php echo $CALCULO_VALOR_PARCELAS_CORRIGIDA; ?>" readonly />
</div>

<div class="col-lg-6">
<label for="exampleInputPassword1">Valor total do financiamento atual:</label>
<input type="text" class="form-control" id="CALCULO_VALOR_TOTAL_FINANCIAMENTO_ATUAL" name="CALCULO_VALOR_TOTAL_FINANCIAMENTO_ATUAL" value="<?php echo $CALCULO_VALOR_TOTAL_FINANCIAMENTO_ATUAL; ?>" readonly />
</div>

</div>
<br>


<div class="row">
<div class="col-lg-6">
<label for="exampleInputPassword1">Valor correto do financiamento:</label>
<input type="text" class="form-control" id="CALCULO_VALOR_CORRETO_FINANCIAMENTO" name="CALCULO_VALOR_CORRETO_FINANCIAMENTO" value="<?php echo $CALCULO_VALOR_CORRETO_FINANCIAMENTO; ?>" readonly />
</div>

<div class="col-lg-6">
<label for="exampleInputPassword1">Juros abusivos por parcelas:</label>
<input type="text" class="form-control" id="CALCULO_JUROS_ABUSIVOS_PARCELA" name="CALCULO_JUROS_ABUSIVOS_PARCELA" value="<?php echo $CALCULO_JUROS_ABUSIVOS_PARCELA; ?>" readonly />
</div>

</div>
<br>


<div class="row">
<div class="col-lg-6">
<label for="exampleInputPassword1">Valor pago no carnê até a data atual:</label>
<input type="text" class="form-control" id="CALCULO_VALOR_PAGO_DATA_ATUAL" name="CALCULO_VALOR_PAGO_DATA_ATUAL" value="<?php echo $CALCULO_VALOR_PAGO_DATA_ATUAL; ?>" readonly />
</div>

<div class="col-lg-6">
<label for="exampleInputPassword1">Juros abusivos pago:</label>
<input type="text" class="form-control" id="CALCULO_JUROS_ABUSIVOS_PAGO" name="CALCULO_JUROS_ABUSIVOS_PAGO" value="<?php echo $CALCULO_JUROS_ABUSIVOS_PAGO; ?>" readonly />
</div>

</div>
<br>


<div class="row">
<div class="col-lg-6">
<label for="exampleInputPassword1">Falta pagar para a financeira:</label>
<input type="text" class="form-control" id="CALCULO_FALTA_PAGAR" name="CALCULO_FALTA_PAGAR" value="<?php echo $CALCULO_FALTA_PAGAR; ?>" readonly />
</div>

<div class="col-lg-6">
<label for="exampleInputPassword1">Divida real:</label>
<input type="text" class="form-control" id="CALCULO_DIVIDA" name="CALCULO_DIVIDA" value="<?php echo $CALCULO_DIVIDA; ?>" readonly />
</div>

</div>
<br>


<div class="row">
<div class="col-lg-6">
<label for="exampleInputPassword1">Economia:</label>
<input type="text" class="form-control" id="CALCULO_ECONOMIA" name="CALCULO_ECONOMIA" value="<?php echo $CALCULO_ECONOMIA; ?>" readonly />
</div>

<div class="col-lg-6">
<label for="exampleInputPassword1">Valor a ser derrubado da parcela:</label>
<input type="text" class="form-control" id="CALCULO_VALOR_DERRUBADO_PARCELA" name="CALCULO_VALOR_DERRUBADO_PARCELA" value="<?php echo $CALCULO_VALOR_DERRUBADO_PARCELA; ?>" readonly />
</div>

</div>
<br>

</div>
<!-- /.box-body -->



</div>
<div class="modal-footer">
<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
<!--
<button type="button" class="btn btn-outline">Save changes</button>
-->
</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
