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
$sql_result = mysqli_query($conexao,"select * from tb_leads_juridico WHERE LEADS_JURIDICO_LEADS = '$ID_LEADS' ");
$val_geral = mysqli_fetch_object($sql_result);  
///////////////////////////////////////////////////////

$ID_LEADS_JURIDICO 					= isset($val_geral->ID_LEADS_JURIDICO) ? $val_geral->ID_LEADS_JURIDICO : '';
$LEADS_JURIDICO_USER 				= isset($val_geral->LEADS_JURIDICO_USER) ? $val_geral->LEADS_JURIDICO_USER : '';	
$LEADS_JURIDICO_STATUS 				= isset($val_geral->LEADS_JURIDICO_STATUS) ? $val_geral->LEADS_JURIDICO_STATUS : '';	
$LEADS_JURIDICO_LEADS				= isset($val_geral->LEADS_JURIDICO_LEADS) ? $val_geral->LEADS_JURIDICO_LEADS : '';	

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sql_leads_val = mysqli_query($conexao,"select * from tb_ficha_intermediacao WHERE FICHA_INTER_LEADS = '$LEADS_JURIDICO_LEADS' ");
$val_leads_val = mysqli_fetch_object($sql_leads_val);  
///////////////////////////////////////////////////////
$FICHA_INTER_TIPO			= isset($val_leads_val->FICHA_INTER_TIPO) ? $val_leads_val->FICHA_INTER_TIPO : '';
$FICHA_INTER_CLIENTE		= isset($val_leads_val->FICHA_INTER_CLIENTE) ? $val_leads_val->FICHA_INTER_CLIENTE : '';

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sql_clientes = mysqli_query($conexao,"select * from tb_clientes WHERE ID_CLIENTE = '$FICHA_INTER_CLIENTE' ");
$val_clientes = mysqli_fetch_object($sql_clientes);  
///////////////////////////////////////////////////////

$val_id_cliente 				= isset($val_clientes->ID_CLIENTE) ? $val_clientes->ID_CLIENTE : '';
$val_cliente_status 			= isset($val_clientes->CLIENTE_STATUS) ? $val_clientes->CLIENTE_STATUS : '';
$val_cliente_nome 				= isset($val_clientes->CLIENTE_NOME) ? $val_clientes->CLIENTE_NOME : '';

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sql_result = mysqli_query($conexao,"select * from tb_leads WHERE ID_LEADS = '$ID_LEADS' ");
$val_leads = mysqli_fetch_object($sql_result);  
///////////////////////////////////////////////////////
$ID_LEADS 					= isset($val_leads->ID_LEADS) ? $val_leads->ID_LEADS : '';
$LEADS_USER 				= isset($val_leads->LEADS_USER) ? $val_leads->LEADS_USER : '';	
$LEADS_STATUS 				= isset($val_leads->LEADS_STATUS) ? $val_leads->LEADS_STATUS : '';	
$LEADS_TIPO					= isset($val_leads->LEADS_TIPO) ? $val_leads->LEADS_TIPO : '';	
$LEADS_FORNECEDOR 			= isset($val_leads->LEADS_FORNECEDOR) ? $val_leads->LEADS_FORNECEDOR : '';	
$LEADS_PRIORIDADE 			= isset($val_leads->LEADS_PRIORIDADE) ? $val_leads->LEADS_PRIORIDADE : '';	
$LEADS_NOME 				= isset($val_leads->LEADS_NOME) ? $val_leads->LEADS_NOME : '';	
$LEADS_EMAIL	 			= isset($val_leads->LEADS_EMAIL) ? $val_leads->LEADS_EMAIL : '';	
$LEADS_TEL1		 			= isset($val_leads->LEADS_TEL1) ? $val_leads->LEADS_TEL1 : '';	
$LEADS_TEL2		 			= isset($val_leads->LEADS_TEL2) ? $val_leads->LEADS_TEL2 : '';	

$LEADS_TIPO_FINANCIAMENTO	= isset($val_leads->LEADS_TIPO_FINANCIAMENTO) ? $val_leads->LEADS_TIPO_FINANCIAMENTO : '';	
$LEADS_VALOR	 			= isset($val_leads->LEADS_VALOR) ? $val_leads->LEADS_VALOR : '';	
$LEADS_QTDE_PARCELAS		= isset($val_leads->LEADS_QTDE_PARCELAS) ? $val_leads->LEADS_QTDE_PARCELAS : '';	
$LEADS_VALOR_FINANCIAMENTO	= isset($val_leads->LEADS_VALOR_FINANCIAMENTO) ? $val_leads->LEADS_VALOR_FINANCIAMENTO : '';	

if($val_cliente_nome > '')
$LEADS_NOME = $val_cliente_nome;

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$ID_LEADS_JURIDICO_HIST = isset($_GET['ID_LEADS_JURIDICO_HIST']) ? $_GET['ID_LEADS_JURIDICO_HIST'] : '';

///////////////////////////////////////////////////////
$sql_result_hist = mysqli_query($conexao,"select * from tb_leads_juridico_hist WHERE ID_LEADS_JURIDICO_HIST = '$ID_LEADS_JURIDICO_HIST' ");
$val_geral_hist = mysqli_fetch_object($sql_result_hist);  
///////////////////////////////////////////////////////

$ID_LEADS_JURIDICO_HIST 					= isset($val_geral_hist->ID_LEADS_JURIDICO_HIST) ? $val_geral_hist->ID_LEADS_JURIDICO_HIST : '';
$LEADS_JURIDICO_HIST_USER 				= isset($val_geral_hist->LEADS_JURIDICO_HIST_USER) ? $val_geral_hist->LEADS_JURIDICO_HIST_USER : '';	
$LEADS_JURIDICO_HIST_STATUS 				= isset($val_geral_hist->LEADS_JURIDICO_HIST_STATUS) ? $val_geral_hist->LEADS_JURIDICO_HIST_STATUS : '';	
$LEADS_JURIDICO_HIST_LEADS				= isset($val_geral_hist->LEADS_JURIDICO_HIST_LEADS) ? $val_geral_hist->LEADS_JURIDICO_HIST_LEADS : '';	
$LEADS_JURIDICO_HIST_DATA 				= isset($val_geral_hist->LEADS_JURIDICO_HIST_DATA) ? $val_geral_hist->LEADS_JURIDICO_HIST_DATA : '';	
if($LEADS_JURIDICO_HIST_DATA == '')	{
$LEADS_JURIDICO_HIST_DATA = date("d/m/Y");
} else {
$LEADS_JURIDICO_HIST_DATA_DIA = substr($LEADS_JURIDICO_HIST_DATA, 8, 4);
$LEADS_JURIDICO_HIST_DATA_MES = substr($LEADS_JURIDICO_HIST_DATA, 5, 2);
$LEADS_JURIDICO_HIST_DATA_ANO = substr($LEADS_JURIDICO_HIST_DATA, 0, 4);
$LEADS_JURIDICO_HIST_DATA = $LEADS_JURIDICO_HIST_DATA_DIA.'/'.$LEADS_JURIDICO_HIST_DATA_MES.'/'.$LEADS_JURIDICO_HIST_DATA_ANO;
}

$LEADS_JURIDICO_HIST_ASSUNTO 			= isset($val_geral_hist->LEADS_JURIDICO_HIST_ASSUNTO) ? $val_geral_hist->LEADS_JURIDICO_HIST_ASSUNTO : '';	
$LEADS_JURIDICO_HIST_DATA_FOLLOW	 		= isset($val_geral_hist->LEADS_JURIDICO_HIST_DATA_FOLLOW) ? $val_geral_hist->LEADLEADS_JURIDICO_HIST_DATA_FOLLOWS_EMAIL : '';	
$LEADS_JURIDICO_HIST_DATA_FOLLOW_DIA = substr($LEADS_JURIDICO_HIST_DATA_FOLLOW, 8, 4);
$LEADS_JURIDICO_HIST_DATA_FOLLOW_MES = substr($LEADS_JURIDICO_HIST_DATA_FOLLOW, 5, 2);
$LEADS_JURIDICO_HIST_DATA_FOLLOW_ANO = substr($LEADS_JURIDICO_HIST_DATA_FOLLOW, 0, 4);
$LEADS_JURIDICO_HIST_DATA_FOLLOW = $LEADS_JURIDICO_HIST_DATA_FOLLOW_DIA.'/'.$LEADS_JURIDICO_HIST_DATA_FOLLOW_MES.'/'.$LEADS_JURIDICO_HIST_DATA_FOLLOW_ANO;


$LEADS_JURIDICO_HIST_HORA_FOLLOW			= isset($val_geral_hist->LEADS_JURIDICO_HIST_HORA_FOLLOW) ? $val_geral_hist->LEADS_JURIDICO_HIST_HORA_FOLLOW : '';	
$LEADS_JURIDICO_HIST_DESCRICAO 			= isset($val_geral_hist->LEADS_JURIDICO_HIST_DESCRICAO) ? $val_geral_hist->LEADS_JURIDICO_HIST_DESCRICAO : '';	


//session_start();
 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SISTEMA | AVT PRIME</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <link rel="icon" type="image/png" href="favicon.ico">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
.style2 {color: #009900}
.style3 {color: #FF0000}
.style4 {color: #0000FF}
-->
  </style>
</head>



<script src="js/jquery-1.3.2.js" type="text/javascript"></script>
<script src="js/jquery.maskedinput-1.2.2.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
//	$("#CLIENTE_NOME").focus();
// MASCARA 1º 16433122000101
    $("#CLIENTE_CNPJ").mask("99.999.999/9999-99");    // Máscara para CNPJ
    $("#CLIENTE_CPF").mask("999.999.999-99");    // Máscara para CPF
    $("#FICHA_INTER_DATA").mask("99/99/9999");    // Máscara para DATA
    $("#CLIENTE_DATA_NASC").mask("99/99/9999");    // Máscara para DATA
    $("#CLIENTE_CEP").mask("99999-999");    // Máscara para DATA

    $("#FICHA_INTER_ENVIO_HORARIO").mask("99:99");    // Máscara para DATA
    $("#FICHA_INTER_ENVIO_CEP").mask("99999-999");    // Máscara para DATA

    $("#VALOR_JURIDICO_DATA_PGTO").mask("99/99/9999");    // Máscara para DATA
}); 
 
</script>


<script>
	function mascaraTelefone( campo ) {
	
		function trata( valor,  isOnBlur ) {
			
			valor = valor.replace(/\D/g,"");             			
			valor = valor.replace(/^(\d{2})(\d)/g,"($1)$2"); 		
			
			if( isOnBlur ) {
				
				valor = valor.replace(/(\d)(\d{4})$/,"$1-$2");   
			} else {

				valor = valor.replace(/(\d)(\d{3})$/,"$1-$2"); 
			}
			return valor;
		}
		
		campo.onkeypress = function (evt) {
			 
			var code = (window.event)? window.event.keyCode : evt.which;	
			var valor = this.value
			
			if(code > 57 || (code < 48 && code != 8 ))  {
				return false;
			} else {
				this.value = trata(valor, false);
			}
		}
		
		campo.onblur = function() {
			
			var valor = this.value;
			if( valor.length < 13 ) {
				this.value = ""
			}else {		
				this.value = trata( this.value, true );
			}
		}
		campo.maxLength = 14;
	}
</script>


<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script src="js/jquery.maskMoney.min.js" type="text/javascript"></script>
<script>
	$(document).ready(function(e) {
//		$("#FICHA_INTER_VALOR_FIN").maskMoney({symbol:"R$",decimal:",",thousands:"."});
//		$("#FICHA_INTER_VALOR_PARC").maskMoney({symbol:"R$",decimal:",",thousands:"."});
		$("#VALOR_JURIDICO_VALOR").maskMoney({symbol:"R$",decimal:",",thousands:"."});
	});
</script>

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
        Laudo Pagamento |
        <small>painel de controle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Laudo Pagamento</a></li>
      </ol>
    </section>


<br>



  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">




<div class="box box-danger">
<div class="box-header with-border">

<table width="100%">
  <tr>
    <td> 
<h3 class="box-title">
<strong><?php 
//IF($ID_FICHA_INTER == '')
//echo "INCLUIR - "; 
//ELSEIF($ID_FICHA_INTER > '')
//echo "ALTERAR - "; 
?></strong>
Laudo Pagamento: <strong>"
<?php
//if($ID_FICHA_INTER > '' )	{
//echo "$ID_FICHA_INTER"; 
//}
?> "</strong>
 </h3>

</td>
<td>&nbsp;</td>
<td width="5%">&nbsp;</td>
</tr>
</table>
            <!-- /.box-header -->
            <!-- form start -->



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

<div class="col-lg-2">
<label for="exampleInputPassword1">Telefone - 1:</label>
<input type="text" class="form-control" id="LEADS_TEL1" name="LEADS_TEL1" value="<?php echo $LEADS_TEL1; ?>" readonly >
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Telefone - 2:</label>
<input type="text" class="form-control" id="LEADS_TEL2" name="LEADS_TEL2" value="<?php echo $LEADS_TEL2; ?>" readonly >
</div>

</div>
<br>


<div class="row">
<div class="col-lg-6">
<label for="exampleInputEmail1">Serviço Cotratado:</label>
<?php
if($FICHA_INTER_TIPO == '1')
$VAL_FICHA_INTER_TIPO = "REVISÃO DE CONTRATO - FINANCIAMENTO PARCELAS EM DIA";
elseif($FICHA_INTER_TIPO == '2')
$VAL_FICHA_INTER_TIPO = "REVISÃO DE CONTRATO - FINANCIAMENTO PARCELAS EM ATRASO";
elseif($FICHA_INTER_TIPO == '3')
$VAL_FICHA_INTER_TIPO = "REVISÃO DE CONTRATO - EMPRESTIMO PARCELAS EM DIA";
elseif($FICHA_INTER_TIPO == '4')
$VAL_FICHA_INTER_TIPO = "REVISÃO DE CONTRATO - EMPRESTIMO PARCELAS EM ATRASO";
elseif($FICHA_INTER_TIPO == '5')
$VAL_FICHA_INTER_TIPO = "REVISÃO DE CONTRATO - CONTRATOS QUITADOS";
?>
<input type="text" class="form-control" value="<?php echo $VAL_FICHA_INTER_TIPO; ?>" readonly >
</div>

<div class="col-lg-1">
<br>
<a href="juridico-ficha-intermediacao.php?ID_LEADS=<?php echo $ID_LEADS; ?>&&ID_LEADS_JURIDICO=<?php echo $ID_LEADS_JURIDICO; ?>"><i class="fa fa-clipboard" style="color:#00FF00"></i></a>
</div>

<div class="col-lg-1">
<br>
<a href="juridico-leads-doc-aguardando-consumidor.php?ID_LEADS=<?php echo $ID_LEADS; ?>&&ID_LEADS_JURIDICO=<?php echo $ID_LEADS_JURIDICO; ?>"><i class="fa fa-folder-open" style="color:#990033"></i></a>
</div>

<div class="col-lg-1">
<br>
<a href="juridico-consumidor-protocolo-visualiza.php?ID_LEADS=<?php echo $ID_LEADS; ?>&&ID_LEADS_JURIDICO=<?php echo $ID_LEADS_JURIDICO; ?>"><i class="fa fa-clipboard" style="color:#003300"></i></a>
</div>

</div>
<br>







</div>


  </div>

          



          <!-- /.box -->
        </div>
        <!-- /.col -->




          
            
            



<?php
$ID_VALOR_JURIDICO = isset($_GET['ID_VALOR_JURIDICO']) ? $_GET['ID_VALOR_JURIDICO'] : '';

///////////////////////////////////////////////////////
$sql_valor = mysqli_query($conexao,"select * from tb_valor_juridico_laudo WHERE ID_VALOR_JURIDICO = '$ID_VALOR_JURIDICO' ");
$val_valor = mysqli_fetch_object($sql_valor);  
///////////////////////////////////////////////////////

$ID_VALOR_JURIDICO 					= isset($val_valor->ID_VALOR_JURIDICO) ? $val_valor->ID_VALOR_JURIDICO : '';
$VALOR_JURIDICO_USER 					= isset($val_valor->VALOR_JURIDICO_USER) ? $val_valor->VALOR_JURIDICO_USER : '';	
$VALOR_JURIDICO_STATUS 				= isset($val_valor->VALOR_JURIDICO_STATUS) ? $val_valor->VALOR_JURIDICO_STATUS : '';	
$VALOR_JURIDICO_ENTR_PARC				= isset($val_valor->VALOR_JURIDICO_ENTR_PARC) ? $val_valor->VALOR_JURIDICO_ENTR_PARC : '';	
$VALOR_JURIDICO_TIPO					= isset($val_valor->VALOR_JURIDICO_TIPO) ? $val_valor->VALOR_JURIDICO_TIPO : '';	
$VALOR_JURIDICO_LEADS		 			= isset($val_valor->VALOR_JURIDICO_LEADS) ? $val_valor->VALOR_JURIDICO_LEADS : '';	
$VALOR_JURIDICO_FICHA		 			= isset($val_valor->VALOR_JURIDICO_FICHA) ? $val_valor->VALOR_JURIDICO_FICHA : '';	
$VALOR_JURIDICO_VALOR	 				= isset($val_valor->VALOR_JURIDICO_VALOR) ? $val_valor->VALOR_JURIDICO_VALOR : '';	
$VALOR_JURIDICO_QTDE_VEZES	 			= isset($val_valor->VALOR_JURIDICO_QTDE_VEZES) ? $val_valor->VALOR_JURIDICO_QTDE_VEZES : '';	
$VALOR_JURIDICO_PARCELA			 	= isset($val_valor->VALOR_JURIDICO_PARCELA) ? $val_valor->VALOR_JURIDICO_PARCELA : '';	

$VALOR_JURIDICO_DATA_PGTO			 	= isset($val_valor->VALOR_JURIDICO_DATA_PGTO) ? $val_valor->VALOR_JURIDICO_DATA_PGTO : '';	
if($VALOR_JURIDICO_DATA_PGTO > '')		{
$VALOR_JURIDICO_DATA_PGTO_DIA = substr($VALOR_JURIDICO_DATA_PGTO, 8, 4);
$VALOR_JURIDICO_DATA_PGTO_MES = substr($VALOR_JURIDICO_DATA_PGTO, 5, 2);
$VALOR_JURIDICO_DATA_PGTO_ANO = substr($VALOR_JURIDICO_DATA_PGTO, 0, 4);
$VALOR_JURIDICO_DATA_PGTO = $VALOR_JURIDICO_DATA_PGTO_DIA.'/'.$VALOR_JURIDICO_DATA_PGTO_MES.'/'.$VALOR_JURIDICO_DATA_PGTO_ANO;
}
?>
<div class="box box-danger">
<div class="box-header with-border">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30" bgcolor="#FFFF00"><div align="center"><strong>VALOR DA CONTRATAÇÃO E FORMA DE PAGAMENTO</strong></div></td>
  </tr>
</table>
</div>
<form 
<?php 
IF($ID_VALOR_JURIDICO == '')
echo "action='laudo-juridico-pgto-cadastrar-actions.php'"; 
ELSEIF($ID_VALOR_JURIDICO > '')
echo "action='laudo-juridico-pgto-alterar-actions.php'"; 
?> method='post' name="formulario">
<input type="hidden" id="ID_VALOR_JURIDICO" name="ID_VALOR_JURIDICO" value="<?php echo $ID_VALOR_JURIDICO; ?>">
<input type="hidden" id="VALOR_JURIDICO_LEADS" name="VALOR_JURIDICO_LEADS" value="<?php echo $ID_LEADS; ?>">
<!--
<input type="text" id="VALOR_JURIDICO_FICHA" name="VALOR_JURIDICO_FICHA" value="<?php echo $ID_FICHA_INTER; ?>">
-->
<input type="hidden" id="VALOR_JURIDICO_USER" name="VALOR_JURIDICO_USER" value="<?php echo $ID_USER; ?>">
<input type="hidden" id="F_USER_REGISTRO" name="F_USER_REGISTRO" value="<?php echo $USER_NOME; ?>">


<div class="box-header with-border">
<div class="box-body">
<div class="row">
<div class="col-lg-2">
<label for="exampleInputPassword1">Status:</label>
<select id="VALOR_JURIDICO_STATUS" name="VALOR_JURIDICO_STATUS" class="form-control" required>
<?php 
if($VALOR_JURIDICO_STATUS == '1')
echo "<option value='1'> Pago </option>";
elseif($VALOR_JURIDICO_STATUS == '2')
echo "<option value='2'> Em Aberto </option>";
?>

<option value=""></option>
<option value="1"> Pago </option>
<option value="2"> Em Aberto </option>
</select>
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Tipo:</label>
<select id="VALOR_JURIDICO_ENTR_PARC" name="VALOR_JURIDICO_ENTR_PARC" class="form-control" required>
<?php 
if($VALOR_JURIDICO_ENTR_PARC == '1')
echo "<option value='1'> Entrada </option>";
elseif($VALOR_JURIDICO_ENTR_PARC == '2')
echo "<option value='2'> Parcela </option>";
?>

<option value=""></option>
<option value="1"> Entrada </option>
<option value="2"> Parcela </option>
</select>
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Tipo de Pagamento:</label>
<select id="VALOR_JURIDICO_TIPO" name="VALOR_JURIDICO_TIPO" class="form-control" required>
<?php 
if($VALOR_JURIDICO_TIPO == '1')
echo "<option value='1'> Dinheiro </option>";
elseif($VALOR_JURIDICO_TIPO == '2')
echo "<option value='2'> Cartão Débito </option>";
elseif($VALOR_JURIDICO_TIPO == '3')
echo "<option value='3'> Cartão Credito </option>";
elseif($VALOR_JURIDICO_TIPO == '4')
echo "<option value='4'> Depósito/ Transferência </option>";
elseif($VALOR_JURIDICO_TIPO == '5')
echo "<option value='5'> Boleto </option>";
elseif($VALOR_JURIDICO_TIPO == '6')
echo "<option value='6'> Pix </option>";
?>

<option value=""></option>
<option value="1"> Dinheiro </option>
<option value="2"> Cartão Débito </option>
<option value="3"> Cartão Credito </option>
<option value="4"> Depósito/ Transferência </option>
<option value="5"> Boleto </option>
<option value="6"> Pix </option>
</select>
</div>

</div>
<br>

<div class="row">
<div class="col-lg-2">
<label for="exampleInputPassword1">Valor:</label>
<input type="text" class="form-control" id="VALOR_JURIDICO_VALOR" name="VALOR_JURIDICO_VALOR" placeholder="insira o valor" value="<?php echo $VALOR_JURIDICO_VALOR; ?>" required>
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Quantas vezes(x):</label>
<input type="text" class="form-control" id="VALOR_JURIDICO_QTDE_VEZES" name="VALOR_JURIDICO_QTDE_VEZES" placeholder="insira qtde vezes " value="<?php echo $VALOR_JURIDICO_QTDE_VEZES; ?>" required>
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Parcela:</label>
<input type="text" class="form-control" id="VALOR_JURIDICO_PARCELA" name="VALOR_JURIDICO_PARCELA" placeholder="insira as parcelas " value="<?php echo $VALOR_JURIDICO_PARCELA; ?>" required>
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Data Pagamento:</label>
<?php
if($VALOR_JURIDICO_DATA_PGTO == '')
$VALOR_JURIDICO_DATA_PGTO = date('d/m/Y');
?>
<input type="text" class="form-control" id="VALOR_JURIDICO_DATA_PGTO" name="VALOR_JURIDICO_DATA_PGTO" placeholder="insira a data de fechamento " value="<?php echo $VALOR_JURIDICO_DATA_PGTO; ?>" required>
</div>

</div>

</div>
<!-- /.box-body -->



      <div class="box-footer">
        <button type="submit" class="btn btn-danger">Salvar</button>
      </div>
    </form>
  </div>
  <!-- /.box -->


<div class="box-body">
<table id="example2" class="table table-bordered table-hover">
<thead>
<tr>
<th width="40"><div align="center">ID</div></th>
<th ><div align="center">DATA PGTO<div align="center"></th>
<th ><div align="center">STATUS<div align="center"></th>
<th ><div align="center">TIPO PAGAMENTO</div></th>
<th ><div align="center">VALOR PARCELA</div></th>
<th ><div align="center">QTDE VEZES</div></th>
<!--
<th ><div align="center">PARCELA</div></th>
-->
<th ><div align="center">VALOR TOTAL</div></th>
<th width="40" ><div align="center">ALT</div></th>
<th width="40" ><div align="center">EXC</div></th>
</tr>
</thead>

<tbody>
<?php
// do { 
$c = 2;

$sql_val_pgto = mysqli_query($conexao,"SELECT * FROM tb_valor_juridico_laudo WHERE VALOR_JURIDICO_LEADS = '$ID_LEADS' AND VALOR_JURIDICO_STATUS <'3' ORDER BY ID_VALOR_JURIDICO DESC ");
while($val_val_pgto = mysqli_fetch_object($sql_val_pgto)):      

$ID_VALOR_JURIDICO				= isset($val_val_pgto->ID_VALOR_JURIDICO) ? $val_val_pgto->ID_VALOR_JURIDICO : '';
$VALOR_JURIDICO_USER			= isset($val_val_pgto->VALOR_JURIDICO_USER) ? $val_val_pgto->VALOR_JURIDICO_USER : '';
$VALOR_JURIDICO_STATUS			= isset($val_val_pgto->VALOR_JURIDICO_STATUS) ? $val_val_pgto->VALOR_JURIDICO_STATUS : '';
$VALOR_JURIDICO_TIPO			= isset($val_val_pgto->VALOR_JURIDICO_TIPO) ? $val_val_pgto->VALOR_JURIDICO_TIPO : '';
$VALOR_JURIDICO_LEADS			= isset($val_val_pgto->VALOR_JURIDICO_LEADS) ? $val_val_pgto->VALOR_JURIDICO_LEADS : '';
$VALOR_JURIDICO_FICHA			= isset($val_val_pgto->VALOR_JURIDICO_FICHA) ? $val_val_pgto->VALOR_JURIDICO_FICHA : '';
$VALOR_JURIDICO_VALOR			= isset($val_val_pgto->VALOR_JURIDICO_VALOR) ? $val_val_pgto->VALOR_JURIDICO_VALOR : '';
$VALOR_JURIDICO_VALOR_PARCELA	= isset($val_val_pgto->VALOR_JURIDICO_VALOR_PARCELA) ? $val_val_pgto->VALOR_JURIDICO_VALOR_PARCELA : '';
$VALOR_JURIDICO_QTDE_VEZES		= isset($val_val_pgto->VALOR_JURIDICO_QTDE_VEZES) ? $val_val_pgto->VALOR_JURIDICO_QTDE_VEZES : '';
$VALOR_JURIDICO_PARCELA		= isset($val_val_pgto->VALOR_JURIDICO_PARCELA) ? $val_val_pgto->VALOR_JURIDICO_PARCELA : '';

$VALOR_JURIDICO_DATA_PGTO			= isset($val_val_pgto->VALOR_JURIDICO_DATA_PGTO	) ? $val_val_pgto->VALOR_JURIDICO_DATA_PGTO	 : '';
$VALOR_JURIDICO_DATA_PGTO_DIA = substr($VALOR_JURIDICO_DATA_PGTO, 8, 4);
$VALOR_JURIDICO_DATA_PGTO_MES = substr($VALOR_JURIDICO_DATA_PGTO, 5, 2);
$VALOR_JURIDICO_DATA_PGTO_ANO = substr($VALOR_JURIDICO_DATA_PGTO, 0, 4);
$VALOR_JURIDICO_DATA_PGTO = $VALOR_JURIDICO_DATA_PGTO_DIA.'/'.$VALOR_JURIDICO_DATA_PGTO_MES.'/'.$VALOR_JURIDICO_DATA_PGTO_ANO;
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////

$index = $c % 2;
$c++;
//$cor = $cores[$index];
$IETM = $c - 2 ;
?>
<tr>
<td ><div align="center"><?php echo $ID_VALOR_JURIDICO; ?></div></td>
<td ><div align="center"><?php echo $VALOR_JURIDICO_DATA_PGTO; ?></div></td>
<td ><div align="center">
<?php 
if($VALOR_JURIDICO_STATUS == '1')
echo  "Pago";
elseif($VALOR_JURIDICO_STATUS == '2')
echo  "Em Aberto";
?></div></td>
<td ><div align="center">
<?php 
if($VALOR_JURIDICO_TIPO == '1')
echo "Dinheiro";
elseif($VALOR_JURIDICO_TIPO == '2')
echo "Cartão Débito";
elseif($VALOR_JURIDICO_TIPO == '3')
echo "Cartão Credito";
elseif($VALOR_JURIDICO_TIPO == '4')
echo "Depósito/ Transferência";
elseif($VALOR_JURIDICO_TIPO == '5')
echo "Boleto";
elseif($VALOR_JURIDICO_TIPO == '6')
echo "Pix";
?></div></td>
<td ><div align="center"><?php echo $VALOR_JURIDICO_VALOR_PARCELA; ?></div></td>
<td ><div align="center"><?php echo $VALOR_JURIDICO_QTDE_VEZES; ?></div></td>
<!--
<td ><div align="center"><?php echo $VALOR_JURIDICO_PARCELA; ?></div></td>
-->
<td ><div align="center"><?php echo $VALOR_JURIDICO_VALOR; ?></div></td>
<td><div align="center"><a href="laudo-juridico-pagamento.php?ID_VALOR_JURIDICO=<?php echo $ID_VALOR_JURIDICO; ?>&&ID_LEADS=<?php echo $ID_LEADS; ?>"><i class="fa fa-refresh"></i></a></div></td>
<td><div align="center"><a href="excluir-laudo-juridico-pagamento.php?ID_VALOR_JURIDICO=<?php echo $ID_VALOR_JURIDICO; ?>&&ID_LEADS=<?php echo $ID_LEADS; ?>"><i class="fa fa-close" style="color:#FF0000"></i></a></div></td>
</tr>
<?php
 endwhile;
?>

<tr>
<td ><div align="center">&nbsp;</div></td>
<td ><div align="center">&nbsp;</div></td>
<td ><div align="center">&nbsp;</div></td>
<td ><div align="center">&nbsp;</div></td>
<td ><div align="center">&nbsp;</div></td>
<td bgcolor="#FFFF00"><div align="right"><strong>TOTAL: &nbsp;</strong></div></td>
<td bgcolor="#FFFF00"><div align="center"><strong>R$ 
<?php
$sql_total = mysqli_query($conexao,"select sum(cast(replace(replace(VALOR_JURIDICO_VALOR, '.', ''), ',', '.') as decimal(10,2))) FROM tb_valor_juridico_laudo WHERE VALOR_JURIDICO_LEADS = '$ID_LEADS' AND VALOR_JURIDICO_STATUS < '3' ");
$sql_total = mysqli_fetch_array($sql_total);
echo number_format($sql_total[0], 2, ',', '.');
?>
</strong></div></td>
<td ><div align="center">&nbsp;</div></td>
</tr>
</tbody>

</table>
            </div>

</div>




      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
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
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
<script>
	mascaraTelefone( formulario.CLIENTE_TELEFONE_1 );
	mascaraTelefone( formulario.CLIENTE_TELEFONE_2 );
</script>
</body>
</html>
