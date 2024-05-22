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
$sql_leads_val = mysqli_query($conexao,"select * from tb_ficha_intermediacao WHERE FICHA_INTER_LEADS = '$ID_LEADS' ");
$val_leads_val = mysqli_fetch_object($sql_leads_val);  
///////////////////////////////////////////////////////
//$val_ficaha_inter			= isset($val_leads_val->ID_FICHA_INTER) ? $val_leads_val->ID_FICHA_INTER : '';

$ID_FICHA_INTER 			= isset($val_leads_val->ID_FICHA_INTER) ? $val_leads_val->ID_FICHA_INTER : '';
$FICHA_INTER_USER 			= isset($val_leads_val->FICHA_INTER_USER) ? $val_leads_val->FICHA_INTER_USER : '';
$FICHA_INTER_TIPO			= isset($val_leads_val->FICHA_INTER_TIPO) ? $val_leads_val->FICHA_INTER_TIPO : '';
$FICHA_INTER_LEADS			= isset($val_leads_val->FICHA_INTER_LEADS) ? $val_leads_val->FICHA_INTER_LEADS : '';
$FICHA_INTER_CLIENTE		= isset($val_leads_val->FICHA_INTER_CLIENTE) ? $val_leads_val->FICHA_INTER_CLIENTE : '';

$FICHA_INTER_BANCO			= isset($val_leads_val->FICHA_INTER_BANCO) ? $val_leads_val->FICHA_INTER_BANCO : '';
$FICHA_INTER_VEICULO		= isset($val_leads_val->FICHA_INTER_VEICULO) ? $val_leads_val->FICHA_INTER_VEICULO : '';
$FICHA_INTER_VALOR_FIN		= isset($val_leads_val->FICHA_INTER_VALOR_FIN) ? $val_leads_val->FICHA_INTER_VALOR_FIN : '';
$FICHA_INTER_VALOR_PARC		= isset($val_leads_val->FICHA_INTER_VALOR_PARC) ? $val_leads_val->FICHA_INTER_VALOR_PARC : '';
$FICHA_INTER_PAGA			= isset($val_leads_val->FICHA_INTER_PAGA) ? $val_leads_val->FICHA_INTER_PAGA : '';
///////////////////////////////////////////////////////
///////////////////////////////////////////////////////

if($ID_FICHA_INTER > '')	{
//$ID_FICHA_INTER = $val_ficaha_inter;

///////////////////////////////////////////////////////
$sql_clientes = mysqli_query($conexao,"select * from tb_clientes WHERE ID_CLIENTE = '$FICHA_INTER_CLIENTE' ");
$val_clientes = mysqli_fetch_object($sql_clientes);  
///////////////////////////////////////////////////////
$ID_CLIENTE 				= isset($val_clientes->ID_CLIENTE) ? $val_clientes->ID_CLIENTE : '';
$CLIENTE_NOME 				= isset($val_clientes->CLIENTE_NOME) ? $val_clientes->CLIENTE_NOME : '';
}

//session_start();
 

///////////////////////////////////////////////////////
$sql_laudo = mysqli_query($conexao,"select * from tb_laudo WHERE LAUDO_LEADS = '$ID_LEADS' ");
$val_laudo = mysqli_fetch_object($sql_laudo);  
///////////////////////////////////////////////////////
$ID_LAUDO 						= isset($val_laudo->ID_LAUDO) ? $val_laudo->ID_LAUDO : '';
$LAUDO_TIPO 					= isset($val_laudo->LAUDO_TIPO) ? $val_laudo->LAUDO_TIPO : '';
$LAUDO_LEADS 					= isset($val_laudo->LAUDO_LEADS) ? $val_laudo->LAUDO_LEADS : '';
$LAUDO_JURIDICO 				= isset($val_laudo->LAUDO_JURIDICO) ? $val_laudo->LAUDO_JURIDICO : '';

$LAUDO_DATA 					= isset($val_laudo->LAUDO_DATA) ? $val_laudo->LAUDO_DATA : '';
if($LAUDO_DATA == '0000-00-00')	{
$LAUDO_DATA = date("d/m/Y");
} else {
$LAUDO_DATA_DIA = substr($LAUDO_DATA, 8, 4);
$LAUDO_DATA_MES = substr($LAUDO_DATA, 5, 2);
$LAUDO_DATA_ANO = substr($LAUDO_DATA, 0, 4);
$LAUDO_DATA = $LAUDO_DATA_DIA.'/'.$LAUDO_DATA_MES.'/'.$LAUDO_DATA_ANO;
}

$LAUDO_N_CONTRATO 				= isset($val_laudo->LAUDO_N_CONTRATO) ? $val_laudo->LAUDO_N_CONTRATO : '';
$LAUDO_DATA_CONTRATO 			= isset($val_laudo->LAUDO_DATA_CONTRATO) ? $val_laudo->LAUDO_DATA_CONTRATO : '';
if($LAUDO_DATA_CONTRATO == '0000-00-00')	{
$LAUDO_DATA_CONTRATO = "";
} else {
$LAUDO_DATA_CONTRATO_DIA = substr($LAUDO_DATA_CONTRATO, 8, 4);
$LAUDO_DATA_CONTRATO_MES = substr($LAUDO_DATA_CONTRATO, 5, 2);
$LAUDO_DATA_CONTRATO_ANO = substr($LAUDO_DATA_CONTRATO, 0, 4);
$LAUDO_DATA_CONTRATO = $LAUDO_DATA_CONTRATO_DIA.'/'.$LAUDO_DATA_CONTRATO_MES.'/'.$LAUDO_DATA_CONTRATO_ANO;
}

$LAUDO_PARCELA_CONTROVERSA 		= isset($val_laudo->LAUDO_PARCELA_CONTROVERSA) ? $val_laudo->LAUDO_PARCELA_CONTROVERSA : '';
if($LAUDO_PARCELA_CONTROVERSA == '')	{
$LAUDO_PARCELA_CONTROVERSA = $FICHA_INTER_VALOR_PARC;
} 

$LAUDO_PARCELA_INCONTROVERSA 	= isset($val_laudo->LAUDO_PARCELA_INCONTROVERSA) ? $val_laudo->LAUDO_PARCELA_INCONTROVERSA : '';

$LAUDO_VALOR_VEICULO 			= isset($val_laudo->LAUDO_VALOR_VEICULO) ? $val_laudo->LAUDO_VALOR_VEICULO : '';
$LAUDO_VALOR_ENTRADA 			= isset($val_laudo->LAUDO_VALOR_ENTRADA) ? $val_laudo->LAUDO_VALOR_ENTRADA : '';
$LAUDO_IOF 						= isset($val_laudo->LAUDO_IOF) ? $val_laudo->LAUDO_IOF : '';
$LAUDO_IOF_ADICIONAL 			= isset($val_laudo->LAUDO_IOF_ADICIONAL) ? $val_laudo->LAUDO_IOF_ADICIONAL : '';

$LAUDO_VALOR_FINANCIADO 		= isset($val_laudo->LAUDO_VALOR_FINANCIADO) ? $val_laudo->LAUDO_VALOR_FINANCIADO : '';
if($LAUDO_VALOR_FINANCIADO == '')	{
$LAUDO_VALOR_FINANCIADO = $FICHA_INTER_VALOR_FIN;
} 

$LAUDO_TAXA_JUROS_CONTRATO 		= isset($val_laudo->LAUDO_TAXA_JUROS_CONTRATO) ? $val_laudo->LAUDO_TAXA_JUROS_CONTRATO : '';
$LAUDO_TAXA_APLICADA_FINANCEIRA = isset($val_laudo->LAUDO_TAXA_APLICADA_FINANCEIRA) ? $val_laudo->LAUDO_TAXA_APLICADA_FINANCEIRA : '';
$LAUDO_TARIFA_CADASTRO 			= isset($val_laudo->LAUDO_TARIFA_CADASTRO) ? $val_laudo->LAUDO_TARIFA_CADASTRO : '';
$LAUDO_TARIFA_AVALIACAO 		= isset($val_laudo->LAUDO_TARIFA_AVALIACAO) ? $val_laudo->LAUDO_TARIFA_AVALIACAO : '';
$LAUDO_REGISTRO_CONTRATO 		= isset($val_laudo->LAUDO_REGISTRO_CONTRATO) ? $val_laudo->LAUDO_REGISTRO_CONTRATO : '';
$LAUDO_SEGURO 					= isset($val_laudo->LAUDO_SEGURO) ? $val_laudo->LAUDO_SEGURO : '';
$LAUDO_TOTAL 					= isset($val_laudo->LAUDO_TOTAL) ? $val_laudo->LAUDO_TOTAL : '';
$LAUDO_AMORTIZACAO 				= isset($val_laudo->LAUDO_AMORTIZACAO) ? $val_laudo->LAUDO_AMORTIZACAO : '';
$LAUDO_RECALCULO 				= isset($val_laudo->LAUDO_RECALCULO) ? $val_laudo->LAUDO_RECALCULO : '';
$LAUDO_PRESTACAO_CONTRATUAL 	= isset($val_laudo->LAUDO_PRESTACAO_CONTRATUAL) ? $val_laudo->LAUDO_PRESTACAO_CONTRATUAL : '';
$LAUDO_N_PRESTACAO 				= isset($val_laudo->LAUDO_N_PRESTACAO) ? $val_laudo->LAUDO_N_PRESTACAO : '';
$LAUDO_PRESTACAO_RECALCULADA 	= isset($val_laudo->LAUDO_PRESTACAO_RECALCULADA) ? $val_laudo->LAUDO_PRESTACAO_RECALCULADA : '';
$LAUDO_DIFERENCA_PRESTACAO 		= isset($val_laudo->LAUDO_DIFERENCA_PRESTACAO) ? $val_laudo->LAUDO_DIFERENCA_PRESTACAO : '';
$LAUDO_DIFERENCA_FINANCIAMENTO 	= isset($val_laudo->LAUDO_DIFERENCA_FINANCIAMENTO) ? $val_laudo->LAUDO_DIFERENCA_FINANCIAMENTO : '';
$LAUDO_TARIFAS_DEVOLVER 		= isset($val_laudo->LAUDO_TARIFAS_DEVOLVER) ? $val_laudo->LAUDO_TARIFAS_DEVOLVER : '';
$LAUDO_RECALCULO_DEVOLUCAO 		= isset($val_laudo->LAUDO_RECALCULO_DEVOLUCAO) ? $val_laudo->LAUDO_RECALCULO_DEVOLUCAO : '';
$LAUDO_TOTAL_FINAL 				= isset($val_laudo->LAUDO_TOTAL_FINAL) ? $val_laudo->LAUDO_TOTAL_FINAL : '';
$LAUDO_NOME_CONTABILIDADE		= isset($val_laudo->LAUDO_NOME_CONTABILIDADE) ? $val_laudo->LAUDO_NOME_CONTABILIDADE : '';
$LAUDO_ARQUIVO					= isset($val_laudo->LAUDO_ARQUIVO) ? $val_laudo->LAUDO_ARQUIVO : '';
$LAUDO_OBS 						= isset($val_laudo->LAUDO_OBS) ? $val_laudo->LAUDO_OBS : '';

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
    $("#LAUDO_DATA").mask("99/99/9999");    // Máscara para DATA
    $("#LAUDO_DATA_CONTRATO").mask("99/99/9999");    // Máscara para DATA
}); 
 
</script>

<!--
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
-->
<script src="js/jquery.maskMoney.min.js" type="text/javascript"></script>
<script>
	$(document).ready(function(e) {
		$("#LAUDO_PARCELA_CONTROVERSA").maskMoney({symbol:"R$",decimal:",",thousands:"."});
		$("#LAUDO_PARCELA_INCONTROVERSA").maskMoney({symbol:"R$",decimal:",",thousands:"."});
		$("#LAUDO_VALOR_VEICULO").maskMoney({symbol:"R$",decimal:",",thousands:"."});
		$("#LAUDO_VALOR_ENTRADA").maskMoney({symbol:"R$",decimal:",",thousands:"."});
		$("#LAUDO_IOF").maskMoney({symbol:"R$",decimal:",",thousands:"."});
		$("#LAUDO_IOF_ADICIONAL").maskMoney({symbol:"R$",decimal:",",thousands:"."});
		$("#LAUDO_VALOR_FINANCIADO").maskMoney({symbol:"R$",decimal:",",thousands:"."});
		$("#LAUDO_TARIFA_CADASTRO").maskMoney({symbol:"R$",decimal:",",thousands:"."});
		$("#LAUDO_TARIFA_AVALIACAO").maskMoney({symbol:"R$",decimal:",",thousands:"."});
		$("#LAUDO_REGISTRO_CONTRATO").maskMoney({symbol:"R$",decimal:",",thousands:"."});
		$("#LAUDO_SEGURO").maskMoney({symbol:"R$",decimal:",",thousands:"."});
		$("#LAUDO_TOTAL").maskMoney({symbol:"R$",decimal:",",thousands:"."});
		$("#LAUDO_PRESTACAO_CONTRATUAL").maskMoney({symbol:"R$",decimal:",",thousands:"."});
		$("#LAUDO_PRESTACAO_RECALCULADA").maskMoney({symbol:"R$",decimal:",",thousands:"."});
		$("#LAUDO_DIFERENCA_PRESTACAO").maskMoney({symbol:"R$",decimal:",",thousands:"."});
		$("#LAUDO_DIFERENCA_FINANCIAMENTO").maskMoney({symbol:"R$",decimal:",",thousands:"."});
		$("#LAUDO_TARIFAS_DEVOLVER").maskMoney({symbol:"R$",decimal:",",thousands:"."});
		$("#LAUDO_RECALCULO_DEVOLUCAO").maskMoney({symbol:"R$",decimal:",",thousands:"."});
		$("#LAUDO_TOTAL_FINAL").maskMoney({symbol:"R$",decimal:",",thousands:"."});
	});
</script>


<script  type="text/javascript">
function bloqueio() 
{
	if (document.getElementById("divprincipal_padrao").style.display == "block") 
	  { 
		  document.getElementById("divprincipal_padrao").style.display = "block";
	  }
	else
	  {
		  document.getElementById("divprincipal_padrao").style.display = "block";	  
	  }  



	if (document.getElementById("divprincipal_contabilidade").style.display == "none") 
	  { 
		  document.getElementById("divprincipal_contabilidade").style.display = "none";
	  }
	else
	  {
		  document.getElementById("divprincipal_contabilidade").style.display = "none";	  
	  }  

}
</script>
<script  type="text/javascript">
function bloqueio_1() 
{
	if (document.getElementById("divprincipal_contabilidade").style.display == "block") 
	  { 
		  document.getElementById("divprincipal_contabilidade").style.display = "block";
	  }
	else
	  {
		  document.getElementById("divprincipal_contabilidade").style.display = "block";	  
	  }  


	if (document.getElementById("divprincipal_padrao").style.display == "none") 
	  { 
		  document.getElementById("divprincipal_padrao").style.display = "none";
	  }
	else
	  {
		  document.getElementById("divprincipal_padrao").style.display = "none";	  
	  }  

}
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
        Laudo |
        <small>painel de controle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Laudo</a></li>
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
<strong>LAUDO</strong>
 </h3>

</td>
    <td>&nbsp;</td>

<td width="5%">
<?php
include "modal-prospeccao.php";
?>
</td>
            
  </tr>
</table>
            <!-- /.box-header -->
            <!-- form start -->


          
<form 
<?php 
//IF($ID_FICHA_INTER == '')
//echo "action='operador-ficha-intermediacao-cadastrar-actions.php'"; 
//ELSEIF($ID_FICHA_INTER > '')
echo "action='laudo-alterar-actions.php'"; 
?> method='post' enctype="multipart/form-data" name="formulario" onSubmit="return valida_dados(this)">



<input type="hidden" id="ID_LAUDO" name="ID_LAUDO" value="<?php echo $ID_LAUDO; ?>">
<input type="hidden" id="LAUDO_LEADS" name="LAUDO_LEADS" value="<?php echo $ID_LEADS; ?>">
<input type="hidden" id="LAUDO_JURIDICO" name="LAUDO_JURIDICO" value="<?php echo $LAUDO_JURIDICO; ?>">
<input type="hidden" id="LAUDO_USER" name="LAUDO_USER" value="<?php echo $ID_USER; ?>">
<input type="hidden" id="F_USER_REGISTRO" name="F_USER_REGISTRO" value="<?php echo $USER_NOME; ?>">

<div class="box-body">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30" bgcolor="#FFFF00"><div align="center"><strong>HUNTING ASSESSORIA | LAUDO</strong></div></td>
  </tr>
</table>
<br>

<div class="row">
<div class="col-lg-2">
<label for="exampleInputPassword1">Data Laudo:</label>
<input type="text" class="form-control" id="LAUDO_DATA" name="LAUDO_DATA" placeholder="insira a data" value="<?php echo $LAUDO_DATA; ?>" required>
</div>

<div class="col-lg-4">
<label for="exampleInputPassword1">Contratante:</label>
<input type="text" class="form-control" value="<?php echo $CLIENTE_NOME; ?>" readonly >
</div>

<div class="col-lg-3">
<label for="exampleInputPassword1">Contratado:</label>
<?php 
if($FICHA_INTER_BANCO > '')	{
$v_bancos = mysqli_query($conexao,"select * from tb_bancos WHERE ID_BANCO = '$FICHA_INTER_BANCO' ");
$v_bco = mysqli_fetch_object($v_bancos);  

$BANCO_NOME = isset($v_bco->BANCO_NOME) ? $v_bco->BANCO_NOME : '';
} 
?>
<input type="text" class="form-control" value="<?php echo $BANCO_NOME; ?>" readonly >
</div>

<div class="col-lg-3">
<label for="exampleInputPassword1">Consultor/ Operador:</label>
<input type="text" class="form-control" value="<?php echo $USER_NOME; ?>" readonly >
</div>

</div>
<br>



<div class="row">
<div class="col-lg-4">
<label for="exampleInputPassword1" style="color:#FF0000"><strong>TIPO DE LAUDO:</strong></label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<label for="exampleInputPassword1">LAUDO PADRÃO:</label> 
(	
<?php
if($LAUDO_TIPO == '1')
echo "<input type='radio' id='LAUDO_TIPO' name='LAUDO_TIPO' onclick='bloqueio()' value='1' checked required />";
else
echo "<input type='radio' id='LAUDO_TIPO' name='LAUDO_TIPO' onclick='bloqueio()' value='1'  required />";
?>
 ) </div>

<div class="col-lg-4">
<label for="exampleInputPassword1">LAUDO CONTABILIDADE:</label> 
(	
<?php
if($LAUDO_TIPO == '2')
echo "<input type='radio' id='LAUDO_TIPO' name='LAUDO_TIPO' value='2' onclick='bloqueio_1()' checked required />";
else
echo "<input type='radio' id='LAUDO_TIPO' name='LAUDO_TIPO' value='2' onclick='bloqueio_1()' required />";
?>
 )</div>

</div>
<br>



<!-- DIV LAUDO PADRÃO -->
<?php
if($LAUDO_TIPO == '1')
echo "<div id='divprincipal_padrao' align='Left' style='width:100%; display: block'>";
else
echo "<div id='divprincipal_padrao' align='Left' style='width:100%; display: none'>";
?>
<div class="row">
<div class="col-lg-3">
<label for="exampleInputPassword1">Objeto do Contrato:</label>
<?php
if(($FICHA_INTER_TIPO == '1') or ($FICHA_INTER_TIPO == '2'))
$valida_tipo = "FINANCIAMENTO DE VEICULO";
elseif(($FICHA_INTER_TIPO == '3') or ($FICHA_INTER_TIPO == '4'))
$valida_tipo = "EMPRÉSTIMO";
elseif($FICHA_INTER_TIPO == '5')
$valida_tipo = "CONTRATOS QUITADOS";
else
$valida_tipo = "";
?>
<input type="text" class="form-control" value="<?php echo $valida_tipo; ?>" readonly >
</div>

<div class="col-lg-3">
<label for="exampleInputPassword1">Nº do Contrato:</label>
<input type="text" class="form-control" id="LAUDO_N_CONTRATO" name="LAUDO_N_CONTRATO" placeholder="insira o nº do contrato " value="<?php echo $LAUDO_N_CONTRATO; ?>" >
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Data do Contrato:</label>
<input type="text" class="form-control" id="LAUDO_DATA_CONTRATO" name="LAUDO_DATA_CONTRATO" value="<?php echo $LAUDO_DATA_CONTRATO; ?>" >
</div>

<div class="col-lg-4">
<label for="exampleInputPassword1">Veículo/ Marca:</label>
<input type="text" class="form-control" value="<?php echo $FICHA_INTER_VEICULO; ?>" readonly>
</div>

</div>
<br>



<div class="row">
<div class="col-lg-2">
<label for="exampleInputPassword1">Parcela Controversa:</label>
<?php 
//if($FICHA_INTER_VALOR_PARC == '')
//$FICHA_INTER_VALOR_PARC = $CALCULO_VALOR_ATUAL_PARCELA;
?>
<input type="text" class="form-control" id="LAUDO_PARCELA_CONTROVERSA" name="LAUDO_PARCELA_CONTROVERSA" value="<?php echo $LAUDO_PARCELA_CONTROVERSA; ?>" >
</div>


<div class="col-lg-2">
<label for="exampleInputPassword1">Parcela Incontroversa:</label>
<?php 
//if($FICHA_INTER_VALOR_PARC == '')
//$FICHA_INTER_VALOR_PARC = $CALCULO_VALOR_ATUAL_PARCELA;
?>
<input type="text" class="form-control" id="LAUDO_PARCELA_INCONTROVERSA" name="LAUDO_PARCELA_INCONTROVERSA" value="<?php echo $LAUDO_PARCELA_INCONTROVERSA; ?>" >
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Valor do Veículo:</label>
<input type="text" class="form-control" id="LAUDO_VALOR_VEICULO" name="LAUDO_VALOR_VEICULO" value="<?php echo $LAUDO_VALOR_VEICULO; ?>" >
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Valor da Entrada:</label>
<input type="text" class="form-control" id="LAUDO_VALOR_ENTRADA" name="LAUDO_VALOR_ENTRADA" value="<?php echo $LAUDO_VALOR_ENTRADA; ?>" >
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">IOF:</label>
<input type="text" class="form-control" id="LAUDO_IOF" name="LAUDO_IOF" value="<?php echo $LAUDO_IOF; ?>" >
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">IOF Adicional:</label>
<input type="text" class="form-control" id="LAUDO_IOF_ADICIONAL" name="LAUDO_IOF_ADICIONAL" value="<?php echo $LAUDO_IOF_ADICIONAL; ?>" >
</div>

</div>
<br>



<div class="row">
<div class="col-lg-3">
<label for="exampleInputPassword1">Valor Financiado:</label>
<input type="text" class="form-control" id="LAUDO_VALOR_FINANCIADO" name="LAUDO_VALOR_FINANCIADO" value="<?php echo $LAUDO_VALOR_FINANCIADO; ?>" >
</div>

<div class="col-lg-4">
<label for="exampleInputPassword1">Taxa de Juros do Contrato:</label>
<input type="text" class="form-control" id="LAUDO_TAXA_JUROS_CONTRATO" name="LAUDO_TAXA_JUROS_CONTRATO" value="<?php echo $LAUDO_TAXA_JUROS_CONTRATO; ?>" >
</div>

<div class="col-lg-4">
<label for="exampleInputPassword1">Taxa Apliada pela Instituição Financeira:</label>
<input type="text" class="form-control" id="LAUDO_TAXA_APLICADA_FINANCEIRA" name="LAUDO_TAXA_APLICADA_FINANCEIRA" value="<?php echo $LAUDO_TAXA_APLICADA_FINANCEIRA; ?>" >
</div>

</div>
<br>



<div class="row">
<div class="col-lg-2">
<label for="exampleInputPassword1">Tarifa de Cadastro:</label>
<input type="text" class="form-control" id="LAUDO_TARIFA_CADASTRO" name="LAUDO_TARIFA_CADASTRO" value="<?php echo $LAUDO_TARIFA_CADASTRO; ?>" >
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Tarifa de Avaliação:</label>
<input type="text" class="form-control" id="LAUDO_TARIFA_AVALIACAO" name="LAUDO_TARIFA_AVALIACAO" value="<?php echo $LAUDO_TARIFA_AVALIACAO; ?>" >
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Registro de Contrato:</label>
<input type="text" class="form-control" id="LAUDO_REGISTRO_CONTRATO" name="LAUDO_REGISTRO_CONTRATO" value="<?php echo $LAUDO_REGISTRO_CONTRATO; ?>" >
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Seguro:</label>
<input type="text" class="form-control" id="LAUDO_SEGURO" name="LAUDO_SEGURO" value="<?php echo $LAUDO_SEGURO; ?>" >
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Total:</label>
<input type="text" class="form-control" id="LAUDO_TOTAL" name="LAUDO_TOTAL" value="<?php echo $LAUDO_TOTAL; ?>" readonly>
</div>

</div>
<br>



<div class="row">
<div class="col-lg-3">
<label for="exampleInputPassword1">Sistema de Amortização:</label>
<input type="text" class="form-control" id="LAUDO_AMORTIZACAO" name="LAUDO_AMORTIZACAO" value="<?php echo $LAUDO_AMORTIZACAO; ?>" >
</div>

<div class="col-lg-3">
<label for="exampleInputPassword1">Sistema Amortização Recalculo:</label>
<input type="text" class="form-control" id="LAUDO_RECALCULO" name="LAUDO_RECALCULO" value="<?php echo $LAUDO_RECALCULO; ?>" >
</div>

</div>
<br>



<div class="row">
<div class="col-lg-2">
<label for="exampleInputPassword1">Prestação Contratual:</label>
<input type="text" class="form-control" id="LAUDO_PRESTACAO_CONTRATUAL" name="LAUDO_PRESTACAO_CONTRATUAL" value="<?php echo $LAUDO_PRESTACAO_CONTRATUAL; ?>" >
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Nº de Prestação:</label>
<input type="text" class="form-control" id="LAUDO_N_PRESTACAO" name="LAUDO_N_PRESTACAO" value="<?php echo $LAUDO_N_PRESTACAO; ?>" >
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Prestação Recalculada:</label>
<input type="text" class="form-control" id="LAUDO_PRESTACAO_RECALCULADA" name="LAUDO_PRESTACAO_RECALCULADA" value="<?php echo $LAUDO_PRESTACAO_RECALCULADA; ?>" >
</div>

<div class="col-lg-3">
<label for="exampleInputPassword1">Diferença Entre Prestação:</label>
<input type="text" class="form-control" id="LAUDO_DIFERENCA_PRESTACAO" name="LAUDO_DIFERENCA_PRESTACAO" value="<?php echo $LAUDO_DIFERENCA_PRESTACAO; ?>" readonly>
</div>

<div class="col-lg-3">
<label for="exampleInputPassword1">Diferença a Mais no Financiamento:</label>
<input type="text" class="form-control" id="LAUDO_DIFERENCA_FINANCIAMENTO" name="LAUDO_DIFERENCA_FINANCIAMENTO" value="<?php echo $LAUDO_DIFERENCA_FINANCIAMENTO; ?>" readonly>
</div>

</div>
<br>



<div class="row">
<div class="col-lg-4">
<label for="exampleInputPassword1">Tarifa a Devolver em Dobro:</label>
<input type="text" class="form-control" id="LAUDO_TARIFAS_DEVOLVER" name="LAUDO_TARIFAS_DEVOLVER" value="<?php echo $LAUDO_TARIFAS_DEVOLVER; ?>" readonly>
</div>

<div class="col-lg-4">
<label for="exampleInputPassword1">A Mais no Recalculo Devolução/ Compensação:</label>
<input type="text" class="form-control" id="LAUDO_RECALCULO_DEVOLUCAO" name="LAUDO_RECALCULO_DEVOLUCAO" value="<?php echo $LAUDO_RECALCULO_DEVOLUCAO; ?>" readonly>
</div>

<div class="col-lg-4">
<label for="exampleInputPassword1">Total Final (Proveito Economico):</label>
<input type="text" class="form-control" id="LAUDO_TOTAL_FINAL" name="LAUDO_TOTAL_FINAL" value="<?php echo $LAUDO_TOTAL_FINAL; ?>" readonly>
</div>

</div>
<br>

</div>
<!-- FIM DIV LAUDO PADRÃO -->




<!-- DIV LAUDO CONTABILIDADE -->
<?php
if($LAUDO_TIPO == '2')
echo "<div id='divprincipal_contabilidade' align='Left' style='width:100%; display: block'>";
else
echo "<div id='divprincipal_contabilidade' align='Left' style='width:100%; display: none'>";
?>
<div class="row">
<div class="col-lg-5">
<label for="exampleInputPassword1">Nome Laudo Contabilidade:</label>
<input type="text" class="form-control" id="LAUDO_NOME_CONTABILIDADE" name="LAUDO_NOME_CONTABILIDADE" value="<?php echo $LAUDO_NOME_CONTABILIDADE; ?>" >
</div>


<div class="col-lg-5">
<label for="exampleInputEmail1">Arquivo/ Doc's:</label>
<input type="file" name="LAUDO_ARQUIVO" id="LAUDO_ARQUIVO" />
<input type="hidden" id="VALIDA_LAUDO_ARQUIVO" name="VALIDA_LAUDO_ARQUIVO" value="<?php echo $LAUDO_ARQUIVO; ?>">
</div>

<?php
if($LAUDO_TIPO == '2') {
?>
<div class="col-lg-2">
<label for="exampleInputEmail1">Visualiza Laudo:</label>&nbsp;
<a href="laudo-docs/<?php echo $LAUDO_ARQUIVO; ?>" target="_blank">
<i class="fa fa-print" style="color:#ff0000"></i>
</a>
</div>
<?php
}
?>
</div>
<br>

</div>
<!-- FIM DIV LAUDO CONTABILIDADE -->
                    









<div class="form-group">
<label for="exampleInputEmail1">Observações:</label>
<textarea rows="4" class="form-control" id="LAUDO_OBS" name="LAUDO_OBS" placeholder="insira a observação"><?php echo $LAUDO_OBS ; ?></textarea>
</div>




</div>
<!-- /.box-body -->



      <div class="box-footer">
        <button type="submit" class="btn btn-danger">Salvar</button>
      </div>
    </form>
  </div>
  <!-- /.box -->

          



          <!-- /.box -->
        </div>
        <!-- /.col -->




          
            
            







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
