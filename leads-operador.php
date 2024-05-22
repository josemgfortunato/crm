<?php
$ID_USER 		= isset($_COOKIE["ID_USER"]) ? $_COOKIE["ID_USER"] : '';
if($ID_USER == ''){	
include "sessao-expirou.php";
}

//include "Connections/conecta_banco.php";
include "valida_cookie_admin.php";
?>
<?php

$ID_LEADS = isset($_GET['ID_LEADS']) ? $_GET['ID_LEADS'] : '';

///////////////////////////////////////////////////////
$sql_result = mysqli_query($conexao,"select * from tb_leads WHERE ID_LEADS = '$ID_LEADS' ");
$val_geral = mysqli_fetch_object($sql_result);  
///////////////////////////////////////////////////////

$ID_LEADS 					= isset($val_geral->ID_LEADS) ? $val_geral->ID_LEADS : '';
$LEADS_USER 				= isset($val_geral->LEADS_USER) ? $val_geral->LEADS_USER : '';	
$LEADS_STATUS 				= isset($val_geral->LEADS_STATUS) ? $val_geral->LEADS_STATUS : '';	
$LEADS_TIPO					= isset($val_geral->LEADS_TIPO) ? $val_geral->LEADS_TIPO : '';	
$LEADS_FORNECEDOR 			= isset($val_geral->LEADS_FORNECEDOR) ? $val_geral->LEADS_FORNECEDOR : '';	
$LEADS_PRIORIDADE 			= isset($val_geral->LEADS_PRIORIDADE) ? $val_geral->LEADS_PRIORIDADE : '';	
$LEADS_NOME 				= isset($val_geral->LEADS_NOME) ? $val_geral->LEADS_NOME : '';	
$LEADS_EMAIL	 			= isset($val_geral->LEADS_EMAIL) ? $val_geral->LEADS_EMAIL : '';	
$LEADS_TEL1		 			= isset($val_geral->LEADS_TEL1) ? $val_geral->LEADS_TEL1 : '';	
$LEADS_TEL2		 			= isset($val_geral->LEADS_TEL2) ? $val_geral->LEADS_TEL2 : '';	

$LEADS_TIPO_FINANCIAMENTO	= isset($val_geral->LEADS_TIPO_FINANCIAMENTO) ? $val_geral->LEADS_TIPO_FINANCIAMENTO : '';	
$LEADS_VALOR	 			= isset($val_geral->LEADS_VALOR) ? $val_geral->LEADS_VALOR : '';	
$LEADS_QTDE_PARCELAS		= isset($val_geral->LEADS_QTDE_PARCELAS) ? $val_geral->LEADS_QTDE_PARCELAS : '';	
$LEADS_VALOR_FINANCIAMENTO	= isset($val_geral->LEADS_VALOR_FINANCIAMENTO) ? $val_geral->LEADS_VALOR_FINANCIAMENTO : '';	
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$ID_LEADS_HIST = isset($_GET['ID_LEADS_HIST']) ? $_GET['ID_LEADS_HIST'] : '';

///////////////////////////////////////////////////////
$sql_result_hist = mysqli_query($conexao,"select * from tb_leads_hist WHERE ID_LEADS_HIST = '$ID_LEADS_HIST' ");
$val_geral_hist = mysqli_fetch_object($sql_result_hist);  
///////////////////////////////////////////////////////

$ID_LEADS_HIST 					= isset($val_geral_hist->ID_LEADS_HIST) ? $val_geral_hist->ID_LEADS_HIST : '';
$LEADS_HIST_USER 				= isset($val_geral_hist->LEADS_HIST_USER) ? $val_geral_hist->LEADS_HIST_USER : '';	
$LEADS_HIST_STATUS 				= isset($val_geral_hist->LEADS_HIST_STATUS) ? $val_geral_hist->LEADS_HIST_STATUS : '';	
$LEADS_HIST_LEADS				= isset($val_geral_hist->LEADS_HIST_LEADS) ? $val_geral_hist->LEADS_HIST_LEADS : '';	
$LEADS_HIST_DATA 				= isset($val_geral_hist->LEADS_HIST_DATA) ? $val_geral_hist->LEADS_HIST_DATA : '';	
if($LEADS_HIST_DATA == '')	{
$LEADS_HIST_DATA = date("d/m/Y");
} else {
$LEADS_HIST_DATA_DIA = substr($LEADS_HIST_DATA, 8, 4);
$LEADS_HIST_DATA_MES = substr($LEADS_HIST_DATA, 5, 2);
$LEADS_HIST_DATA_ANO = substr($LEADS_HIST_DATA, 0, 4);
$LEADS_HIST_DATA = $LEADS_HIST_DATA_DIA.'/'.$LEADS_HIST_DATA_MES.'/'.$LEADS_HIST_DATA_ANO;
}

$LEADS_HIST_ASSUNTO 			= isset($val_geral_hist->LEADS_HIST_ASSUNTO) ? $val_geral_hist->LEADS_HIST_ASSUNTO : '';	
$LEADS_HIST_DATA_FOLLOW	 		= isset($val_geral_hist->LEADS_HIST_DATA_FOLLOW) ? $val_geral_hist->LEADLEADS_HIST_DATA_FOLLOWS_EMAIL : '';	
$LEADS_HIST_DATA_FOLLOW_DIA = substr($LEADS_HIST_DATA_FOLLOW, 8, 4);
$LEADS_HIST_DATA_FOLLOW_MES = substr($LEADS_HIST_DATA_FOLLOW, 5, 2);
$LEADS_HIST_DATA_FOLLOW_ANO = substr($LEADS_HIST_DATA_FOLLOW, 0, 4);
$LEADS_HIST_DATA_FOLLOW = $LEADS_HIST_DATA_FOLLOW_DIA.'/'.$LEADS_HIST_DATA_FOLLOW_MES.'/'.$LEADS_HIST_DATA_FOLLOW_ANO;


$LEADS_HIST_HORA_FOLLOW			= isset($val_geral_hist->LEADS_HIST_HORA_FOLLOW) ? $val_geral_hist->LEADS_HIST_HORA_FOLLOW : '';	
$LEADS_HIST_DESCRICAO 			= isset($val_geral_hist->LEADS_HIST_DESCRICAO) ? $val_geral_hist->LEADS_HIST_DESCRICAO : '';	

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


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

$CALCULO_NOME_CLIENTE						= isset($val_calculo->CALCULO_NOME_CLIENTE) ? $val_calculo->CALCULO_NOME_CLIENTE : '';	
$CALCULO_CPF								= isset($val_calculo->CALCULO_CPF) ? $val_calculo->CALCULO_CPF : '';	
$CALCULO_VALOR_VISTA 						= isset($val_calculo->CALCULO_VALOR_VISTA) ? $val_calculo->CALCULO_VALOR_VISTA : '';	
$CALCULO_ENTRADA 							= isset($val_calculo->CALCULO_ENTRADA) ? $val_calculo->CALCULO_ENTRADA : '';	
$CALCULO_QTDE_PARCELAS 						= isset($val_calculo->CALCULO_QTDE_PARCELAS) ? $val_calculo->CALCULO_QTDE_PARCELAS : '';	
$CALCULO_VALOR_ATUAL_PARCELA 				= isset($val_calculo->CALCULO_VALOR_ATUAL_PARCELA) ? $val_calculo->CALCULO_VALOR_ATUAL_PARCELA : '';	
$CALCULO_PARCELAS_PAGAS 					= isset($val_calculo->CALCULO_PARCELAS_PAGAS) ? $val_calculo->CALCULO_PARCELAS_PAGAS : '';	
$CALCULO_PARCELAS_ATRASO 					= isset($val_calculo->CALCULO_PARCELAS_ATRASO) ? $val_calculo->CALCULO_PARCELAS_ATRASO : '';	

$CALCULO_MANUAL			 					= isset($val_calculo->CALCULO_MANUAL) ? $val_calculo->CALCULO_MANUAL : '';	

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
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SISTEMA | AVT PRIME</title>
  <!-- Tell the browser to be responsive to screen width -->
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <link rel="icon" type="image/png" href="favicon.ico">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<script src="js/jquery-1.3.2.js" type="text/javascript"></script>
<script src="js/jquery.maskedinput-1.2.2.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
//	$("#CLIENTE_NOME").focus();
// MASCARA 1º 16433122000101
    $("#LEADS_HIST_DATA").mask("99/99/9999");    // Máscara para data
    $("#LEADS_HIST_DATA_FOLLOW").mask("99/99/9999");    // Máscara para data
    $("#LEADS_HIST_HORA_FOLLOW").mask("99:99");    // Máscara para hora

//    $("#CALCULO_CPF").mask("999.999.999-99");    // Máscara para hora
}); 
 
</script>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="js/jquery.maskMoney.min.js" type="text/javascript"></script>
<script>
	$(document).ready(function(e) {
		$("#CALCULO_VALOR_VISTA").maskMoney({symbol:"R$",decimal:",",thousands:"."});
		$("#CALCULO_ENTRADA").maskMoney({symbol:"R$",decimal:",",thousands:"."});
		$("#CALCULO_VALOR_ATUAL_PARCELA").maskMoney({symbol:"R$",decimal:",",thousands:"."});

		$("#CALCULO_VALOR_FINANCIADO").maskMoney({symbol:"R$",decimal:",",thousands:"."});
		$("#CALCULO_VALOR_PARCELAS_CORRIGIDA").maskMoney({symbol:"R$",decimal:",",thousands:"."});
		$("#CALCULO_VALOR_TOTAL_FINANCIAMENTO_ATUAL").maskMoney({symbol:"R$",decimal:",",thousands:"."});
		$("#CALCULO_VALOR_CORRETO_FINANCIAMENTO").maskMoney({symbol:"R$",decimal:",",thousands:"."});
		$("#CALCULO_JUROS_ABUSIVOS_PARCELA").maskMoney({symbol:"R$",decimal:",",thousands:"."});
		$("#CALCULO_VALOR_PAGO_DATA_ATUAL").maskMoney({symbol:"R$",decimal:",",thousands:"."});
		$("#CALCULO_JUROS_ABUSIVOS_PAGO").maskMoney({symbol:"R$",decimal:",",thousands:"."});
		$("#CALCULO_FALTA_PAGAR").maskMoney({symbol:"R$",decimal:",",thousands:"."});
		$("#CALCULO_DIVIDA").maskMoney({symbol:"R$",decimal:",",thousands:"."});
		$("#CALCULO_ECONOMIA").maskMoney({symbol:"R$",decimal:",",thousands:"."});
		$("#CALCULO_VALOR_DERRUBADO_PARCELA").maskMoney({symbol:"R$",decimal:",",thousands:"."});
	});
</script>


<!--
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="jquery.mask.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
//	 $('#txtTelefone').mask('(00) 0000-0000'); //Telefone
//	 $('#txtCep').mask('00000-000'); //CEP

	 $('#CALCULO_VALOR_VISTA').mask('000.000.000.000.000,00', {reverse: true}); //Dinheiro
	 $('#CALCULO_ENTRADA').mask('000.000.000.000.000,00', {reverse: true}); //Dinheiro
	 $('#CALCULO_VALOR_ATUAL_PARCELA').mask('000.000.000.000.000,00', {reverse: true}); //Dinheiro
});
</script>
-->


<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
<!--
      <span class="logo-mini"><b>ÁGUIA</b></span>
-->
      <span class="logo-mini"><img src="dist/img/logo-icone-avt-prime.png" width="40"></span>
      <!-- logo for regular state and mobile devices -->
<!--
      <span class="logo-lg"><b>PROTEÇÃO ÁGUIA</b></span>
-->
      <span class="logo-lg"><img src="dist/img/logo-avt-prime.png" width="120"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
<?php
include "notificacao.php";
?>
          <!-- Tasks: style can be found in dropdown.less -->
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="fotos-operador/<?php echo $USER_FOTO;?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo utf8_encode($USER_NOME);?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="fotos-operador/<?php echo $USER_FOTO;?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo utf8_encode($USER_NOME);?>
                </p>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="configuracao-user.php" class="btn btn-default btn-flat">Configurações</a>
                </div>
                <div class="pull-right">
                  <a href="logout_administrador.php" class="btn btn-default btn-flat">Logout</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
<!--          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
-->
        </ul>
      </div>
    </nav>
  </header>



<?php
include "menu.php";
?>



 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lead's / Prospecção |
        <small>painel de controle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Lead's / Prospecção</a></li>
      </ol>
    </section>


<br>



  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">




<div class="box box-danger">
            <div class="box-header with-border">

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>
    <h3 class="box-title">
      <strong><?php 
//      IF($ID_REVISAO_PROSPEC == '')
//      echo "INCLUIR - "; 
//      ELSEIF($ID_REVISAO_PROSPEC > '')
//      echo "ALTERAR - "; 
      ?></strong>
       Lead's / Prospecção 
    </h3>
    </td>

<td>
<?php
///////////////////////////////////////////////////////
$sql_result = mysqli_query($conexao,"select * from tb_script WHERE SCRIPT_STATUS = '1' ");
$val_script = mysqli_fetch_object($sql_result);  
///////////////////////////////////////////////////////
$ID_SCRIPT 			= isset($val_script->ID_SCRIPT) ? $val_script->ID_SCRIPT : '';
$SCRIPT_TEXTO 		= isset($val_script->SCRIPT_TEXTO) ? $val_script->SCRIPT_TEXTO : '';


if($ID_SCRIPT > '')	{
include "modal-script.php";
}
?>
</td>

    <td width="5%">&nbsp;</td>
<?php 
if(($LEADS_STATUS == '1') or ($LEADS_STATUS == '10'))	{
?>
<td width="22%">
<div align="right">
<form action="operador-ficha-intermediacao.php" method='get' name="formulario" >
<input type="hidden" id="ID_LEADS" name="ID_LEADS" value="<?php echo $ID_LEADS; ?>">
<button type="submit" class="btn btn-danger">Ficha Intermediação</button>
</form> 
</div> 
</td>
<?php	}	?>
  </tr>
</table>

              
            </div>
            <!-- /.box-header -->
            <!-- form start -->

<!--
<form 
<?php 
IF($ID_REVISAO_PROSPEC == '')
echo "action='#'"; 
ELSEIF($ID_REVISAO_PROSPEC > '')
echo "action='prospeccao-alterar-actions.php'"; 
?> method='post' name="formulario" >
<input type="hidden" id="ID_REVISAO_PROSPEC" name="ID_REVISAO_PROSPEC" value="<?php echo $ID_REVISAO_PROSPEC; ?>">
<input type="hidden" id="PROSPECCAO_USER" name="PROSPECCAO_USER" value="<?php echo $ID_USER; ?>">
<input type="hidden" id="F_USER_REGISTRO" name="F_USER_REGISTRO" value="<?php echo $USER_NOME; ?>">
-->
<div class="box-body">
<div class="row">
<div class="col-lg-4">
<label for="exampleInputEmail1">Nome:</label>
<input type="text" class="form-control" id="LEADS_NOME" name="LEADS_NOME" value="<?php echo $LEADS_NOME; ?>" readonly >
</div>


<div class="col-lg-4">
<label for="exampleInputPassword1">E-mail:</label>
<input type="text" class="form-control" id="LEADS_EMAIL" name="LEADS_EMAIL" value="<?php echo $LEADS_EMAIL; ?>" readonly >
</div>

<?php 
//$str = "(55) 123456 !?";
//echo preg_replace("/[^0-9]/", "", $str);

$N_LIMPO_TEL1 =  preg_replace("/[^0-9]/", "", $LEADS_TEL1);
$remove1_55 = substr($N_LIMPO_TEL1, 0, 2);

if($remove1_55 == '55')	{
$contato1 = substr($N_LIMPO_TEL1, 2, 15);
$VAL_LEADS_TEL1 = "0$contato1";
}	else	{
$VAL_LEADS_TEL1 = "0$LEADS_TEL1";
}
?>
<div class="col-lg-2">
<label for="exampleInputPassword1">Telefone - 1:&nbsp;&nbsp;&nbsp; <a href="tel:<?php echo $VAL_LEADS_TEL1; ?>"><i class="fa fa-phone-square" style="color:#FF0000"></i></a></label>
<input type="text" class="form-control" id="LEADS_TEL1" name="LEADS_TEL1" value="<?php echo $LEADS_TEL1; ?>" readonly >
</div>

<?php 
$N_LIMPO_TEL2 =  preg_replace("/[^0-9]/", "", $LEADS_TEL2);
$remove2_55 = substr($N_LIMPO_TEL2, 0, 2);

if($remove2_55 == '55')	{
$contato2 = substr($N_LIMPO_TEL2, 2, 15);
$VAL_LEADS_TEL2 = "0$contato2";
}	else	{
$VAL_LEADS_TEL2 = "0$LEADS_TEL2";
}
?>
<div class="col-lg-2">
<label for="exampleInputPassword1">Telefone - 2:&nbsp;&nbsp;&nbsp; <a href="tel:<?php echo $VAL_LEADS_TEL2; ?>"><i class="fa fa-phone-square" style="color:#FF0000"></i></a></label>
<input type="text" class="form-control" id="LEADS_TEL2" name="LEADS_TEL2" value="<?php echo $LEADS_TEL2; ?>" readonly >
</div>

</div>
<br>


<div class="row">
<div class="col-lg-4">
<label for="exampleInputEmail1">Tipo de Financiamento:</label>
<?php
if($LEADS_TIPO_FINANCIAMENTO == '1')
$VAL_LEADS_TIPO_FINANCIAMENTO = " Financiameno Carro ";
elseif($LEADS_TIPO_FINANCIAMENTO == '2')
$VAL_LEADS_TIPO_FINANCIAMENTO = " Financiameno Moto ";
elseif($LEADS_TIPO_FINANCIAMENTO == '3')
$VAL_LEADS_TIPO_FINANCIAMENTO = " Financiameno Caminhão ";
elseif($LEADS_TIPO_FINANCIAMENTO == '4')
$VAL_LEADS_TIPO_FINANCIAMENTO = " Emprestimo ";
else
$VAL_LEADS_TIPO_FINANCIAMENTO = " ";
?>
<input type="text" class="form-control" id="LEADS_TIPO_FINANCIAMENTO" name="LEADS_TIPO_FINANCIAMENTO" value="<?php echo $VAL_LEADS_TIPO_FINANCIAMENTO; ?>" readonly >
</div>


<div class="col-lg-4">

<label for="exampleInputPassword1">Valor da Parcela:</label>
<input type="text" class="form-control" id="LEADS_VALOR" name="LEADS_VALOR" value="<?php echo $LEADS_VALOR; ?>" readonly >
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Qtde. Parcelas:</label>
<input type="text" class="form-control" id="LEADS_QTDE_PARCELAS" name="LEADS_QTDE_PARCELAS" value="<?php echo $LEADS_QTDE_PARCELAS; ?>" readonly >
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Valor do Financiamento:</label>
<input type="text" class="form-control" id="LEADS_VALOR_FINANCIAMENTO" name="LEADS_VALOR_FINANCIAMENTO" value="<?php echo $LEADS_VALOR_FINANCIAMENTO; ?>" readonly >
</div>

</div>
<br>








<form action='calcula-cadastrar-actions.php' method='post' name="formulario" >
<!--
<input type="hidden" id="ID_CALCULO" name="ID_CALCULO" value="<?php echo $ID_CALCULO; ?>">
-->
<input type="hidden" id="CALCULO_LEADS" name="CALCULO_LEADS" value="<?php echo $ID_LEADS; ?>">
<input type="hidden" id="CALCULO_USER" name="CALCULO_USER" value="<?php echo $ID_USER; ?>">
<input type="hidden" id="F_USER_REGISTRO" name="F_USER_REGISTRO" value="<?php echo $USER_NOME; ?>">


<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" />
<tr>
<td bgcolor="#FFFF00" >
<div class="row">
<div class="col-lg-3">
<label for="exampleInputEmail1">Financeira:</label>
<input type="text" class="form-control" id="CALCULO_FINANCEIRA" name="CALCULO_FINANCEIRA" value="<?php echo $CALCULO_FINANCEIRA; ?>" required />
</div>

<div class="col-lg-2">
<label for="exampleInputEmail1">Modelo do Veículo:</label>
<input type="text" class="form-control" id="CALCULO_VEICULO" name="CALCULO_VEICULO" value="<?php echo $CALCULO_VEICULO; ?>" required />
</div>

<div class="col-lg-2">
<label for="exampleInputEmail1">Correção Nº:</label>
<input type="text" class="form-control" id="CALCULO_CORRECAO_N" name="CALCULO_CORRECAO_N" value="<?php echo $CALCULO_CORRECAO_N; ?>" required />
</div>

<div class="col-lg-3">
<label for="exampleInputEmail1">Nome do Cliente:</label>
<input type="text" class="form-control" id="CALCULO_NOME_CLIENTE" name="CALCULO_NOME_CLIENTE" value="<?php echo $CALCULO_NOME_CLIENTE; ?>" required />
</div>

<div class="col-lg-2">
<label for="exampleInputEmail1">CPF/CNPJ:</label>
<input type="text" class="form-control" id="CALCULO_CPF" name="CALCULO_CPF" value="<?php echo $CALCULO_CPF; ?>" required />
</div>

</div>
<br>

<div class="row">
<div class="col-lg-2">
<label for="exampleInputEmail1">Valor do Veículo a Vista:</label>
<input type="text" class="form-control" id="CALCULO_VALOR_VISTA" name="CALCULO_VALOR_VISTA" value="<?php echo $CALCULO_VALOR_VISTA; ?>" required />
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Entrada:</label>
<input type="text" class="form-control" id="CALCULO_ENTRADA" name="CALCULO_ENTRADA" value="<?php echo $CALCULO_ENTRADA; ?>" />
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Qtde. de Parcelas:</label>
<input type="text" class="form-control" id="CALCULO_QTDE_PARCELAS" name="CALCULO_QTDE_PARCELAS" value="<?php echo $CALCULO_QTDE_PARCELAS; ?>" required />
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Valor Atual da Parcela:</label>
    <input type="text" class="form-control" id="CALCULO_VALOR_ATUAL_PARCELA" name="CALCULO_VALOR_ATUAL_PARCELA" value="<?php echo $CALCULO_VALOR_ATUAL_PARCELA; ?>" required />
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Parcelas Pagas:</label>
<input type="text" class="form-control" id="CALCULO_PARCELAS_PAGAS" name="CALCULO_PARCELAS_PAGAS" value="<?php echo $CALCULO_PARCELAS_PAGAS; ?>" required />
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Parcelas em Atraso:</label>
<input type="text" class="form-control" id="CALCULO_PARCELAS_ATRASO" name="CALCULO_PARCELAS_ATRASO" value="<?php echo $CALCULO_PARCELAS_ATRASO; ?>" required />
</div>

</div>
<br>

<script type="text/javascript">
    function habilitar(){
        if(document.getElementById('CALCULO_MANUAL').checked){
            document.getElementById('CALCULO_VALOR_FINANCIADO').removeAttribute("disabled");
            document.getElementById('CALCULO_PARCELAS_A_PAGAR').removeAttribute("disabled");
            document.getElementById('CALCULO_VALOR_PARCELAS_CORRIGIDA').removeAttribute("disabled");
            document.getElementById('CALCULO_VALOR_TOTAL_FINANCIAMENTO_ATUAL').removeAttribute("disabled");
            document.getElementById('CALCULO_VALOR_CORRETO_FINANCIAMENTO').removeAttribute("disabled");
            document.getElementById('CALCULO_JUROS_ABUSIVOS_PARCELA').removeAttribute("disabled");
            document.getElementById('CALCULO_VALOR_PAGO_DATA_ATUAL').removeAttribute("disabled");
            document.getElementById('CALCULO_JUROS_ABUSIVOS_PAGO').removeAttribute("disabled");
            document.getElementById('CALCULO_FALTA_PAGAR').removeAttribute("disabled");
            document.getElementById('CALCULO_DIVIDA').removeAttribute("disabled");
            document.getElementById('CALCULO_ECONOMIA').removeAttribute("disabled");
            document.getElementById('CALCULO_VALOR_DERRUBADO_PARCELA').removeAttribute("disabled");
        }
        else {
            document.getElementById('CALCULO_MANUAL').value=''; //Evita que o usuário defina um texto e desabilite o campo após realiza-lo
            document.getElementById('CALCULO_VALOR_FINANCIADO').setAttribute("disabled", "disabled");
            document.getElementById('CALCULO_PARCELAS_A_PAGAR').setAttribute("disabled", "disabled");
            document.getElementById('CALCULO_VALOR_PARCELAS_CORRIGIDA').setAttribute("disabled", "disabled");
            document.getElementById('CALCULO_VALOR_TOTAL_FINANCIAMENTO_ATUAL').setAttribute("disabled", "disabled");
            document.getElementById('CALCULO_VALOR_CORRETO_FINANCIAMENTO').setAttribute("disabled", "disabled");
            document.getElementById('CALCULO_JUROS_ABUSIVOS_PARCELA').setAttribute("disabled", "disabled");
            document.getElementById('CALCULO_VALOR_PAGO_DATA_ATUAL').setAttribute("disabled", "disabled");
            document.getElementById('CALCULO_JUROS_ABUSIVOS_PAGO').setAttribute("disabled", "disabled");
            document.getElementById('CALCULO_FALTA_PAGAR').setAttribute("disabled", "disabled");
            document.getElementById('CALCULO_DIVIDA').setAttribute("disabled", "disabled");
            document.getElementById('CALCULO_ECONOMIA').setAttribute("disabled", "disabled");
            document.getElementById('CALCULO_VALOR_DERRUBADO_PARCELA').setAttribute("disabled", "disabled");
        }
    }
</script>

<div class="row">
<div class="col-lg-2">
<label for="exampleInputEmail1">Valor Financiado:</label>
<input type="text" class="form-control" id="CALCULO_VALOR_FINANCIADO" name="CALCULO_VALOR_FINANCIADO" value="<?php echo $CALCULO_VALOR_FINANCIADO; ?>" disabled />
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Parcelas a Pagar:</label>
<input type="text" class="form-control" id="CALCULO_PARCELAS_A_PAGAR" name="CALCULO_PARCELAS_A_PAGAR" value="<?php echo $CALCULO_PARCELAS_A_PAGAR; ?>" disabled />
</div>


<div class="col-lg-4">
<label for="exampleInputPassword1" style="color:#FF0000">Efetuar Calculo Manual:&nbsp;
<!--
<input type="checkbox" name="CALCULO_MANUAL" id="CALCULO_MANUAL" onchange="habilitar()" />
Motivo:
<input name="motivo" id="motivo" type="text" maxlength="255" disabled/>
-->

<?php
if($CALCULO_MANUAL == '')
echo "<input type='checkbox' id='CALCULO_MANUAL' name='CALCULO_MANUAL' onchange='habilitar()' value='1' />";
elseif($CALCULO_MANUAL == '1')
echo "<input type='checkbox' id='CALCULO_MANUAL' name='CALCULO_MANUAL' onchange='habilitar()' value='1' checked />";
?>
</div>
</label>

</div>
<br>
</td>
</tr>
</table>

<br>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td bgcolor="#FFFF00" >
<div class="row">
<div class="col-lg-3">
<label for="exampleInputEmail1">Valor da parcela corrigido:</label>
<input type="text" class="form-control" id="CALCULO_VALOR_PARCELAS_CORRIGIDA" name="CALCULO_VALOR_PARCELAS_CORRIGIDA" value="<?php echo $CALCULO_VALOR_PARCELAS_CORRIGIDA; ?>" disabled />
</div>

<div class="col-lg-3">
<label for="exampleInputPassword1">Valor total do financiamento atual:</label>
<input type="text" class="form-control" id="CALCULO_VALOR_TOTAL_FINANCIAMENTO_ATUAL" name="CALCULO_VALOR_TOTAL_FINANCIAMENTO_ATUAL" value="<?php echo $CALCULO_VALOR_TOTAL_FINANCIAMENTO_ATUAL; ?>" disabled />
</div>

<div class="col-lg-3">
<label for="exampleInputPassword1">Valor correto do financiamento:</label>
<input type="text" class="form-control" id="CALCULO_VALOR_CORRETO_FINANCIAMENTO" name="CALCULO_VALOR_CORRETO_FINANCIAMENTO" value="<?php echo $CALCULO_VALOR_CORRETO_FINANCIAMENTO; ?>" disabled />
</div>

<div class="col-lg-3">
<label for="exampleInputPassword1">Juros abusivos por parcelas:</label>
<input type="text" class="form-control" id="CALCULO_JUROS_ABUSIVOS_PARCELA" name="CALCULO_JUROS_ABUSIVOS_PARCELA" value="<?php echo $CALCULO_JUROS_ABUSIVOS_PARCELA; ?>" disabled />
</div>

</div>
<br>


<div class="row">
<div class="col-lg-3">
<label for="exampleInputPassword1">Valor pago no carnê até a data atual:</label>
<input type="text" class="form-control" id="CALCULO_VALOR_PAGO_DATA_ATUAL" name="CALCULO_VALOR_PAGO_DATA_ATUAL" value="<?php echo $CALCULO_VALOR_PAGO_DATA_ATUAL; ?>" disabled />
</div>

<div class="col-lg-3">
<label for="exampleInputPassword1">Juros abusivos pago:</label>
<input type="text" class="form-control" id="CALCULO_JUROS_ABUSIVOS_PAGO" name="CALCULO_JUROS_ABUSIVOS_PAGO" value="<?php echo $CALCULO_JUROS_ABUSIVOS_PAGO; ?>" disabled />
</div>

<div class="col-lg-3">
<label for="exampleInputPassword1">Falta pagar para a financeira:</label>
<input type="text" class="form-control" id="CALCULO_FALTA_PAGAR" name="CALCULO_FALTA_PAGAR" value="<?php echo $CALCULO_FALTA_PAGAR; ?>" disabled />
</div>

<div class="col-lg-3">
<label for="exampleInputPassword1">Divida real:</label>
<input type="text" class="form-control" id="CALCULO_DIVIDA" name="CALCULO_DIVIDA" value="<?php echo $CALCULO_DIVIDA; ?>" disabled />
</div>

</div>
<br>


<div class="row">
<div class="col-lg-3">
<label for="exampleInputPassword1">Economia:</label>
<input type="text" class="form-control" id="CALCULO_ECONOMIA" name="CALCULO_ECONOMIA" value="<?php echo $CALCULO_ECONOMIA; ?>" disabled />
</div>

<div class="col-lg-3">
<label for="exampleInputPassword1">Valor a ser derrubado da parcela:</label>
<input type="text" class="form-control" id="CALCULO_VALOR_DERRUBADO_PARCELA" name="CALCULO_VALOR_DERRUBADO_PARCELA" value="<?php echo $CALCULO_VALOR_DERRUBADO_PARCELA; ?>" disabled />
</div>

</div>
<br>
</td>
</tr>
</table>




<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left">
    <div class="box-footer">
        <button type="submit" class="btn btn-danger">Salvar</button>
      </div>
    </form>
</td>
    <td align="right">
<?php
if($ID_CALCULO > '')	{
?>
<td width="20%" align="right">
<form action='calcula-bcb-imprimir.php' method='post' name="formulario" >
<input type="hidden" id="ID_CALCULO" name="ID_CALCULO" value="<?php echo $ID_CALCULO; ?>">
<input type="hidden" id="CALCULO_LEADS" name="CALCULO_LEADS" value="<?php echo $ID_LEADS; ?>">

<div class="box-footer">
<button type="submit" class="btn btn-danger">Imprimir Calculo BCB -  FINANCIAMENTO</button>
</div>
</form>
</td>
<td width="5%">&nbsp;</td>

<td width="20%" align="right">
<form action='calcula-bcb-imprimir-emprestimo.php' method='post' name="formulario" >
<input type="hidden" id="ID_CALCULO" name="ID_CALCULO" value="<?php echo $ID_CALCULO; ?>">
<input type="hidden" id="CALCULO_LEADS" name="CALCULO_LEADS" value="<?php echo $ID_LEADS; ?>">

<div class="box-footer">
<button type="submit" class="btn btn-danger">Imprimir Calculo BCB - EMPRESTIMO</button>
</div>
</form>
</td>
<?php
	}
?>	
    </td>
    </tr>
</table>



<br>
<div class="box box-danger">
</div>
<form 
<?php 
IF($ID_LEADS_HIST == '')
echo "action='leads-operador-hist-cadastrar-actions.php'"; 
ELSEIF($ID_LEADS_HIST > '')
echo "action='leads-operador-hist-alterar-actions.php'"; 
?> method='post' name="formulario" >
<input type="hidden" id="ID_LEADS_HIST" name="ID_LEADS_HIST" value="<?php echo $ID_LEADS_HIST; ?>">
<input type="hidden" id="LEADS_HIST_LEADS" name="LEADS_HIST_LEADS" value="<?php echo $ID_LEADS; ?>">
<input type="hidden" id="LEADS_HIST_USER" name="LEADS_HIST_USER" value="<?php echo $ID_USER; ?>">
<input type="hidden" id="LEADS_PRIORIDADE" name="LEADS_PRIORIDADE" value="<?php echo $LEADS_PRIORIDADE; ?>">
<input type="hidden" id="F_USER_REGISTRO" name="F_USER_REGISTRO" value="<?php echo $USER_NOME; ?>">



<div class="row">
<div class="col-lg-2">
<label for="exampleInputPassword1">Data:</label>
<input type="text" class="form-control" id="LEADS_HIST_DATA" name="LEADS_HIST_DATA" placeholder="insira o data " value="<?php echo $LEADS_HIST_DATA; ?>"  >
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Status:</label>
<select id="LEADS_HIST_STATUS" name="LEADS_HIST_STATUS" class="form-control" required />
<?php 
if($LEADS_HIST_STATUS == '1')
echo "<option value='1'> Fechado Revisão </option>";
elseif($LEADS_HIST_STATUS == '2')
echo "<option value='2'> Não Atende </option>";
//elseif($LEADS_HIST_STATUS == '3')
//echo "<option value='3'> Recado </option>";
elseif($LEADS_HIST_STATUS == '4')
echo "<option value='4'> Sem Carro </option>";
elseif($LEADS_HIST_STATUS == '5')
echo "<option value='5'> Sem interesse </option>";
elseif($LEADS_HIST_STATUS == '6')
echo "<option value='6'> Aguardando Dados </option>";
elseif($LEADS_HIST_STATUS == '7')
echo "<option value='7'> Em Negociação/ Retorno </option>";
?>

<option value=""></option>
<option value="1"> Fechado Revisão </option>
<option value="2"> Não Atende </option>
<!--
<option value="3"> Recado </option>
-->
<option value="4"> Sem Carro </option>
<option value="5"> Sem interesse </option>
<option value="6"> Aguardando Dados </option>
<option value="7"> Em Negociação/ Retorno </option>
</select>
</div>

<div class="col-lg-4">
<label for="exampleInputPassword1">Assunto:</label>
<input type="text" class="form-control" id="LEADS_HIST_ASSUNTO" name="LEADS_HIST_ASSUNTO" placeholder="insira o assunto " value="<?php echo $LEADS_HIST_ASSUNTO; ?>"  >
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Follow Up - Data:</label>
<input type="text" class="form-control" id="LEADS_HIST_DATA_FOLLOW" name="LEADS_HIST_DATA_FOLLOW" placeholder="insira a data do follow up " value="<?php echo $LEADS_HIST_DATA_FOLLOW; ?>"  >
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Follow Up - Hora:</label>
<input type="text" class="form-control" id="LEADS_HIST_HORA_FOLLOW" name="LEADS_HIST_HORA_FOLLOW" placeholder="insira a hora do follow up " value="<?php echo $LEADS_HIST_HORA_FOLLOW; ?>"  >
</div>

</div>
<br>

<div class="form-group">
<label for="exampleInputEmail1">Descrição:</label>
<textarea rows="4" class="form-control" id="LEADS_HIST_DESCRICAO" name="LEADS_HIST_DESCRICAO" placeholder="insira a descrição"><?php echo $LEADS_HIST_DESCRICAO; ?></textarea>
</div>


</div>
<!-- /.box-body -->

          
              <div class="box-footer">
                <button type="submit" class="btn btn-danger">Salvar</button>
              </div>
            </form>
          </div>
          <!-- /.box -->




          
            
            




<div class="box box-danger">
<div class="box-header with-border">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="78%"><h3 class="box-title"><strong>HISTÓRICO PROSPECÇÃO</strong></h3></td>
    <td width="22%">&nbsp;</td>
    </tr>
</table>
</div>
<!-- /.box-header -->

<div class="box-body">
<table id="example2" class="table table-bordered table-hover">
<thead>
<tr>
<th width="60"><div align="center">ID</div></th>
<th width="90"><div align="center">DATA<div align="center"></th>
<th width="150"><div align="center">STATUS<div align="center"></th>
<th>ASSUNTO</th>
<th width="130"><div align="center">FOLLOW UP <br> DATA - HORA</div></th>
<th width="200">OPERADOR</th>
</tr>
</thead>

<tbody>
<?php
// do { 
$c = 2;

$sql_hist = mysqli_query($conexao,"SELECT * FROM tb_leads_hist WHERE LEADS_HIST_LEADS = '$ID_LEADS' ORDER BY ID_LEADS_HIST DESC ");
while($val_hist = mysqli_fetch_object($sql_hist)):      

$ID_LEADS_HIST				= isset($val_hist->ID_LEADS_HIST) ? $val_hist->ID_LEADS_HIST : '';
$LEADS_HIST_USER			= isset($val_hist->LEADS_HIST_USER) ? $val_hist->LEADS_HIST_USER : '';
$LEADS_HIST_STATUS			= isset($val_hist->LEADS_HIST_STATUS) ? $val_hist->LEADS_HIST_STATUS : '';
$LEADS_HIST_LEADS			= isset($val_hist->LEADS_HIST_LEADS) ? $val_hist->LEADS_HIST_LEADS : '';

$LEADS_HIST_DATA			= isset($val_hist->LEADS_HIST_DATA	) ? $val_hist->LEADS_HIST_DATA	 : '';
$LEADS_HIST_DATA_DIA = substr($LEADS_HIST_DATA, 8, 4);
$LEADS_HIST_DATA_MES = substr($LEADS_HIST_DATA, 5, 2);
$LEADS_HIST_DATA_ANO = substr($LEADS_HIST_DATA, 0, 4);
$LEADS_HIST_DATA = $LEADS_HIST_DATA_DIA.'/'.$LEADS_HIST_DATA_MES.'/'.$LEADS_HIST_DATA_ANO;

$LEADS_HIST_ASSUNTO			= isset($val_hist->LEADS_HIST_ASSUNTO) ? $val_hist->LEADS_HIST_ASSUNTO : '';

$LEADS_HIST_DATA_FOLLOW		= isset($val_hist->LEADS_HIST_DATA_FOLLOW	) ? $val_hist->LEADS_HIST_DATA_FOLLOW	 : '';
$LEADS_HIST_DATA_FOLLOW_DIA = substr($LEADS_HIST_DATA_FOLLOW, 8, 4);
$LEADS_HIST_DATA_FOLLOW_MES = substr($LEADS_HIST_DATA_FOLLOW, 5, 2);
$LEADS_HIST_DATA_FOLLOW_ANO = substr($LEADS_HIST_DATA_FOLLOW, 0, 4);
$LEADS_HIST_DATA_FOLLOW = $LEADS_HIST_DATA_FOLLOW_DIA.'/'.$LEADS_HIST_DATA_FOLLOW_MES.'/'.$LEADS_HIST_DATA_FOLLOW_ANO;

$LEADS_HIST_HORA_FOLLOW		= isset($val_hist->LEADS_HIST_HORA_FOLLOW) ? $val_hist->LEADS_HIST_HORA_FOLLOW : '';
$LEADS_HIST_DESCRICAO		= isset($val_hist->LEADS_HIST_DESCRICAO) ? $val_hist->LEADS_HIST_DESCRICAO : '';

$F_USER_REGISTRO			= isset($val_hist->F_USER_REGISTRO) ? $val_hist->F_USER_REGISTRO : '';
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////

$index = $c % 2;
$c++;
//$cor = $cores[$index];
$IETM = $c - 2 ;
?>
<tr>
<td ><div align="center"><?php echo $ID_LEADS_HIST; ?></div></td>
<td ><div align="center"><?php echo $LEADS_HIST_DATA; ?></div></td>
<td ><div align="center">
<?php 
if($LEADS_HIST_STATUS == '1')
echo  "Fechado Revisão";
elseif($LEADS_HIST_STATUS == '2')
echo  "Não Atende";
//elseif($LEADS_HIST_STATUS == '3')
//echo  "Recado";
elseif($LEADS_HIST_STATUS == '4')
echo  "Sem Carro";
elseif($LEADS_HIST_STATUS == '5')
echo  "Sem Interesse";
elseif($LEADS_HIST_STATUS == '6')
echo  "Aguardando Dados";
elseif($LEADS_HIST_STATUS == '7')
echo  "Em Negociação/ Retorno";
?></div>
</td>
<td ><?php echo $LEADS_HIST_ASSUNTO; ?></td>
<td ><div align="center"><?php echo $LEADS_HIST_DATA_FOLLOW; ?> - <?php echo $LEADS_HIST_HORA_FOLLOW; ?></div></td>
<td ><?php echo $F_USER_REGISTRO; ?></td>
</tr>

<tr>
<td colspan="6" bgcolor="#CCCCCC"><strong>HISTÓRICO:</strong> <?php echo $LEADS_HIST_DESCRICAO; ?></td>
</tr>
<?php
 endwhile;
?>
</tbody>

</table>
            </div>

</div>






          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<!-- RODAPÉ -->
<?php
include "rodape.php";
?>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->


<!-- jQuery 3 -->
<!--
<script src="bower_components/jquery/dist/jquery.min.js"></script>
-->
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
</body>
</html>
