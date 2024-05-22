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
$FICHA_INTER_STATUS 		= isset($val_leads_val->FICHA_INTER_STATUS) ? $val_leads_val->FICHA_INTER_STATUS : '';
$FICHA_INTER_TIPO			= isset($val_leads_val->FICHA_INTER_TIPO) ? $val_leads_val->FICHA_INTER_TIPO : '';
$FICHA_INTER_LEADS			= isset($val_leads_val->FICHA_INTER_LEADS) ? $val_leads_val->FICHA_INTER_LEADS : '';
$FICHA_INTER_DATA			= isset($val_leads_val->FICHA_INTER_DATA) ? $val_leads_val->FICHA_INTER_DATA : '';
if($FICHA_INTER_DATA == '')	{
$FICHA_INTER_DATA = date("d/m/Y");
} else {
$FICHA_INTER_DATA_DIA = substr($FICHA_INTER_DATA, 8, 4);
$FICHA_INTER_DATA_MES = substr($FICHA_INTER_DATA, 5, 2);
$FICHA_INTER_DATA_ANO = substr($FICHA_INTER_DATA, 0, 4);
$FICHA_INTER_DATA = $FICHA_INTER_DATA_DIA.'/'.$FICHA_INTER_DATA_MES.'/'.$FICHA_INTER_DATA_ANO;
}

$FICHA_INTER_CLIENTE		= isset($val_leads_val->FICHA_INTER_CLIENTE) ? $val_leads_val->FICHA_INTER_CLIENTE : '';
$FICHA_INTER_ENVIO			= isset($val_leads_val->FICHA_INTER_ENVIO) ? $val_leads_val->FICHA_INTER_ENVIO : '';
$FICHA_INTER_ENVIO_HORARIO	= isset($val_leads_val->FICHA_INTER_ENVIO_HORARIO) ? $val_leads_val->FICHA_INTER_ENVIO_HORARIO : '';
$FICHA_INTER_ENVIO_ENDERECO	= isset($val_leads_val->FICHA_INTER_ENVIO_ENDERECO) ? $val_leads_val->FICHA_INTER_ENVIO_ENDERECO : '';
$FICHA_INTER_ENVIO_N		= isset($val_leads_val->FICHA_INTER_ENVIO_N) ? $val_leads_val->FICHA_INTER_ENVIO_N : '';
$FICHA_INTER_ENVIO_COMP		= isset($val_leads_val->FICHA_INTER_ENVIO_COMP) ? $val_leads_val->FICHA_INTER_ENVIO_COMP : '';
$FICHA_INTER_ENVIO_CEP		= isset($val_leads_val->FICHA_INTER_ENVIO_CEP) ? $val_leads_val->FICHA_INTER_ENVIO_CEP : '';
$FICHA_INTER_ENVIO_BAIRRO	= isset($val_leads_val->FICHA_INTER_ENVIO_BAIRRO) ? $val_leads_val->FICHA_INTER_ENVIO_BAIRRO : '';
$FICHA_INTER_ENVIO_CIDADE	= isset($val_leads_val->FICHA_INTER_ENVIO_CIDADE) ? $val_leads_val->FICHA_INTER_ENVIO_CIDADE : '';

$FICHA_INTER_BUSCA_APREENSAO		= isset($val_leads_val->FICHA_INTER_BUSCA_APREENSAO) ? $val_leads_val->FICHA_INTER_BUSCA_APREENSAO : '';

$FICHA_INTER_BANCO			= isset($val_leads_val->FICHA_INTER_BANCO) ? $val_leads_val->FICHA_INTER_BANCO : '';
$FICHA_INTER_VEICULO		= isset($val_leads_val->FICHA_INTER_VEICULO) ? $val_leads_val->FICHA_INTER_VEICULO : '';
$FICHA_INTER_VALOR_FIN		= isset($val_leads_val->FICHA_INTER_VALOR_FIN) ? $val_leads_val->FICHA_INTER_VALOR_FIN : '';
$FICHA_INTER_VALOR_PARC		= isset($val_leads_val->FICHA_INTER_VALOR_PARC) ? $val_leads_val->FICHA_INTER_VALOR_PARC : '';
$FICHA_INTER_PAGA			= isset($val_leads_val->FICHA_INTER_PAGA) ? $val_leads_val->FICHA_INTER_PAGA : '';
$FICHA_INTER_ATRASO			= isset($val_leads_val->FICHA_INTER_ATRASO) ? $val_leads_val->FICHA_INTER_ATRASO : '';
$FICHA_INTER_OBS			= isset($val_leads_val->FICHA_INTER_OBS) ? $val_leads_val->FICHA_INTER_OBS : '';
///////////////////////////////////////////////////////
///////////////////////////////////////////////////////

if($ID_FICHA_INTER > '')	{
//$ID_FICHA_INTER = $val_ficaha_inter;

///////////////////////////////////////////////////////
$sql_clientes = mysqli_query($conexao,"select * from tb_clientes WHERE ID_CLIENTE = '$FICHA_INTER_CLIENTE' ");
$val_clientes = mysqli_fetch_object($sql_clientes);  
///////////////////////////////////////////////////////
$ID_CLIENTE 				= isset($val_clientes->ID_CLIENTE) ? $val_clientes->ID_CLIENTE : '';
$CLIENTE_USER	 			= isset($val_clientes->CLIENTE_USER) ? $val_clientes->CLIENTE_USER : '';
$CLIENTE_STATUS 			= isset($val_clientes->CLIENTE_STATUS) ? $val_clientes->CLIENTE_STATUS : '';
$CLIENTE_TIPO 				= isset($val_clientes->CLIENTE_TIPO) ? $val_clientes->CLIENTE_TIPO : '';
$CLIENTE_NOME 				= isset($val_clientes->CLIENTE_NOME) ? $val_clientes->CLIENTE_NOME : '';
$CLIENTE_RESPONSAVEL		= isset($val_clientes->CLIENTE_RESPONSAVEL) ? $val_clientes->CLIENTE_RESPONSAVEL : '';
$CLIENTE_CNPJ		 		= isset($val_clientes->CLIENTE_CNPJ) ? $val_clientes->CLIENTE_CNPJ : '';
$CLIENTE_CPF		 		= isset($val_clientes->CLIENTE_CPF) ? $val_clientes->CLIENTE_CPF : '';
$CLIENTE_RG			 		= isset($val_clientes->CLIENTE_RG) ? $val_clientes->CLIENTE_RG : '';
$CLIENTE_DATA_NASC	 		= isset($val_clientes->CLIENTE_DATA_NASC) ? $val_clientes->CLIENTE_DATA_NASC : '';
$CLIENTE_TELEFONE_1 		= isset($val_clientes->CLIENTE_TELEFONE_1) ? $val_clientes->CLIENTE_TELEFONE_1 : '';
$CLIENTE_TELEFONE_2 		= isset($val_clientes->CLIENTE_TELEFONE_2) ? $val_clientes->CLIENTE_TELEFONE_2 : '';
$CLIENTE_ESTADO_CIVIL		= isset($val_clientes->CLIENTE_ESTADO_CIVIL) ? $val_clientes->CLIENTE_ESTADO_CIVIL : '';
$CLIENTE_PROFISSAO			= isset($val_clientes->CLIENTE_PROFISSAO) ? $val_clientes->CLIENTE_PROFISSAO : '';
$CLIENTE_EMAIL 				= isset($val_clientes->CLIENTE_EMAIL) ? $val_clientes->CLIENTE_EMAIL : '';
$CLIENTE_ENDERECO 			= isset($val_clientes->CLIENTE_ENDERECO) ? $val_clientes->CLIENTE_ENDERECO : '';
$CLIENTE_N 					= isset($val_clientes->CLIENTE_N) ? $val_clientes->CLIENTE_N : '';
$CLIENTE_COMPLEMENTO 		= isset($val_clientes->CLIENTE_COMPLEMENTO) ? $val_clientes->CLIENTE_COMPLEMENTO : '';
$CLIENTE_BAIRRO 			= isset($val_clientes->CLIENTE_BAIRRO) ? $val_clientes->CLIENTE_BAIRRO : '';
$CLIENTE_CIDADE 			= isset($val_clientes->CLIENTE_CIDADE) ? $val_clientes->CLIENTE_CIDADE : '';
$CLIENTE_UF 				= isset($val_clientes->CLIENTE_UF) ? $val_clientes->CLIENTE_UF : '';
$CLIENTE_CEP 				= isset($val_clientes->CLIENTE_CEP) ? $val_clientes->CLIENTE_CEP : '';
$CLIENTE_OBS	 			= isset($val_clientes->CLIENTE_OBS) ? $val_clientes->CLIENTE_OBS : '';


}	else	{
///////////////////////////////////////////////////////
$sql_leads = mysqli_query($conexao,"select * from tb_leads WHERE ID_LEADS = '$ID_LEADS' ");
$val_leads = mysqli_fetch_object($sql_leads);  
///////////////////////////////////////////////////////

$ID_LEADS 					= isset($val_leads->ID_LEADS) ? $val_leads->ID_LEADS : '';
$LEADS_USER 				= isset($val_leads->LEADS_USER) ? $val_leads->LEADS_USER : '';	
$LEADS_STATUS 				= isset($val_leads->LEADS_STATUS) ? $val_leads->LEADS_STATUS : '';	
$LEADS_TIPO					= isset($val_leads->LEADS_TIPO) ? $val_leads->LEADS_TIPO : '';	
$LEADS_FORNECEDOR 			= isset($val_leads->LEADS_FORNECEDOR) ? $val_leads->LEADS_FORNECEDOR : '';	
$LEADS_PRIORIDADE 			= isset($val_leads->LEADS_PRIORIDADE) ? $val_leads->LEADS_PRIORIDADE : '';	
$CLIENTE_NOME 				= isset($val_leads->LEADS_NOME) ? $val_leads->LEADS_NOME : '';	
$CLIENTE_EMAIL	 			= isset($val_leads->LEADS_EMAIL) ? $val_leads->LEADS_EMAIL : '';	
$CLIENTE_TELEFONE_1		 	= isset($val_leads->LEADS_TEL1) ? $val_leads->LEADS_TEL1 : '';	
$CLIENTE_TELEFONE_2		 	= isset($val_leads->LEADS_TEL2) ? $val_leads->LEADS_TEL2 : '';	


$CLIENTE_CNPJ		 		= isset($_GET['CLIENTE_CNPJ']) ? $_GET['CLIENTE_CNPJ'] : '';
$CLIENTE_CPF		 		= isset($_GET['CLIENTE_CPF']) ? $_GET['CLIENTE_CPF'] : '';
$CLIENTE_RG			 		= isset($_GET['CLIENTE_RG']) ? $_GET['CLIENTE_RG'] : '';
$CLIENTE_DATA_NASC	 		= isset($_GET['CLIENTE_DATA_NASC']) ? $_GET['CLIENTE_DATA_NASC'] : '';
$CLIENTE_ESTADO_CIVIL		= isset($_GET['CLIENTE_ESTADO_CIVIL']) ? $_GET['CLIENTE_ESTADO_CIVIL'] : '';
$CLIENTE_PROFISSAO			= isset($_GET['CLIENTE_PROFISSAO']) ? $_GET['CLIENTE_PROFISSAO'] : '';
$CLIENTE_ENDERECO 			= isset($_GET['CLIENTE_ENDERECO']) ? $_GET['CLIENTE_ENDERECO'] : '';
$CLIENTE_N 					= isset($_GET['CLIENTE_N']) ? $_GET['CLIENTE_N'] : '';
$CLIENTE_COMPLEMENTO 		= isset($_GET['CLIENTE_COMPLEMENTO']) ? $_GET['CLIENTE_COMPLEMENTO'] : '';
$CLIENTE_BAIRRO 			= isset($_GET['CLIENTE_BAIRRO']) ? $_GET['CLIENTE_BAIRRO'] : '';
$CLIENTE_CIDADE 			= isset($_GET['CLIENTE_CIDADE']) ? $_GET['CLIENTE_CIDADE'] : '';
$CLIENTE_UF 				= isset($_GET['CLIENTE_UF']) ? $_GET['CLIENTE_UF'] : '';
$CLIENTE_CEP 				= isset($_GET['CLIENTE_CEP']) ? $_GET['CLIENTE_CEP'] : '';
$CLIENTE_OBS	 			= isset($_GET['CLIENTE_OBS']) ? $_GET['CLIENTE_OBS'] : '';
}


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

    $("#VALOR_CONTR_DATA_PGTO").mask("99/99/9999");    // Máscara para DATA
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
		$("#FICHA_INTER_VALOR_FIN").maskMoney({symbol:"R$",decimal:",",thousands:"."});
		$("#FICHA_INTER_VALOR_PARC").maskMoney({symbol:"R$",decimal:",",thousands:"."});
		$("#VALOR_CONTR_VALOR").maskMoney({symbol:"R$",decimal:",",thousands:"."});
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
        Ficha de Intermediação |
        <small>painel de controle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Ficha de Intermediação</a></li>
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
			  IF($ID_FICHA_INTER == '')
			  echo "INCLUIR - "; 
			  ELSEIF($ID_FICHA_INTER > '')
			  echo "ALTERAR - "; 
			  ?></strong>
               Ficha de Intermediação: <strong>"
<?php
if($ID_FICHA_INTER > '' )	{
echo "$ID_FICHA_INTER"; 
}
?> "</strong>
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
IF($ID_FICHA_INTER == '')
echo "action='op-adm-intermediacao-cadastrar-actions.php'"; 
ELSEIF($ID_FICHA_INTER > '')
echo "action='op-adm-ficha-intermediacao-alterar-actions.php'"; 
?> method='post' name="formulario">
<input type="hidden" id="ID_FICHA_INTER" name="ID_FICHA_INTER" value="<?php echo $ID_FICHA_INTER; ?>">
<input type="hidden" id="FICHA_INTER_LEADS" name="FICHA_INTER_LEADS" value="<?php echo $ID_LEADS; ?>">
<!--
<input type="hidden" id="FICHA_INTER_USER" name="FICHA_INTER_USER" value="<?php echo $ID_USER; ?>">
-->
<input type="hidden" id="F_USER_REGISTRO" name="F_USER_REGISTRO" value="<?php echo $USER_NOME; ?>">

<div class="box-body">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30" bgcolor="#FFFF00"><div align="center"><strong>PRIME ASSESSORIA | DADOS BÁSICOS</strong></div></td>
  </tr>
</table>
<br>

<div class="row">
<div class="col-lg-2">
<label for="exampleInputPassword1">Data Fechamento:</label>
<input type="text" class="form-control" id="FICHA_INTER_DATA" name="FICHA_INTER_DATA" placeholder="insira a data" value="<?php echo $FICHA_INTER_DATA; ?>" required>
</div>

<div class="col-lg-6">
<label for="exampleInputPassword1">Cliente:</label>
<input type="text" class="form-control" id="CLIENTE_NOME" name="CLIENTE_NOME" placeholder="insira o cliente" value="<?php echo $CLIENTE_NOME; ?>" required>
</div>

<div class="col-lg-4">
<label for="exampleInputPassword1">Consultor/ Operador:</label>
<input type="text" class="form-control" value="<?php echo $USER_NOME; ?>" readonly >
</div>

</div>
<br>


<div class="row">
<!--
<div class="col-lg-6">
<label for="exampleInputPassword1">Responsável</label>
<input type="text" class="form-control" id="CLIENTE_RESPONSAVEL" name="CLIENTE_RESPONSAVEL" placeholder="Insira o Responsável" value="<?php echo $CLIENTE_RESPONSAVEL; ?>" >
</div>
-->
<div class="col-lg-2">
<label for="exampleInputPassword1">CNPJ:</label>
<input type="text" class="form-control" id="CLIENTE_CNPJ" name="CLIENTE_CNPJ" placeholder="00.000.000/0001-00 " value="<?php echo $CLIENTE_CNPJ; ?>" >
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">CPF:</label>
<input type="text" class="form-control" id="CLIENTE_CPF" name="CLIENTE_CPF" placeholder="000.000.000-00 " value="<?php echo $CLIENTE_CPF; ?>" required>
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">RG:</label>
<input type="text" class="form-control" id="CLIENTE_RG" name="CLIENTE_RG" placeholder="00.000.000-0 " value="<?php echo $CLIENTE_RG; ?>" >
</div>

<div class="col-lg-4">
<label for="exampleInputPassword1">E-mail:</label>
<input type="email" class="form-control" id="CLIENTE_EMAIL" name="CLIENTE_EMAIL" placeholder="insira o e-mail " value="<?php echo $CLIENTE_EMAIL; ?>" required>
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Data de Nasc.:</label>
<input type="text" class="form-control" id="CLIENTE_DATA_NASC" name="CLIENTE_DATA_NASC" placeholder="insira a data de nascimento " value="<?php echo $CLIENTE_DATA_NASC; ?>" required>
</div>

</div>
<br>



<div class="row">
<div class="col-lg-4">
<label for="exampleInputPassword1">Estado Civil:</label>
<input type="text" class="form-control" id="CLIENTE_ESTADO_CIVIL" name="CLIENTE_ESTADO_CIVIL" placeholder="insira o estado civel " value="<?php echo $CLIENTE_ESTADO_CIVIL; ?>" required>
</div>

<div class="col-lg-4">
<label for="exampleInputPassword1">Profissão:</label>
<input type="text" class="form-control" id="CLIENTE_PROFISSAO" name="CLIENTE_PROFISSAO" placeholder="insira a profissão " value="<?php echo $CLIENTE_PROFISSAO; ?>" required>
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Tel - 1:</label>
<input type="text" class="form-control" id="CLIENTE_TELEFONE_1" name="CLIENTE_TELEFONE_1" placeholder="(00) 0000-0000 " value="<?php echo $CLIENTE_TELEFONE_1; ?>" required>
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Tel -2:</label>
<input type="text" class="form-control" id="CLIENTE_TELEFONE_2" name="CLIENTE_TELEFONE_2" placeholder="(00) 0000-0000 " value="<?php echo $CLIENTE_TELEFONE_2; ?>" >
</div>

</div>
<br>


<div class="row">
<div class="col-lg-2">
<label for="exampleInputPassword1">CEP:</label>
<input type="text" class="form-control" id="CLIENTE_CEP" name="CLIENTE_CEP" placeholder="00000-000 " value="<?php echo $CLIENTE_CEP; ?>" required>
</div>

<div class="col-lg-9">
<label for="exampleInputPassword1">Endereço:</label>
<input type="text" class="form-control" id="CLIENTE_ENDERECO" name="CLIENTE_ENDERECO" placeholder="Insira o Endereço " value="<?php echo $CLIENTE_ENDERECO; ?>" required>
</div>

<div class="col-lg-1">
<label for="exampleInputPassword1">Nº:</label>
<input type="text" class="form-control" id="CLIENTE_N" name="CLIENTE_N" placeholder="Nº " value="<?php echo $CLIENTE_N; ?>" required>
</div>


</div>
<br>

<div class="row">
<div class="col-lg-4">
<label for="exampleInputPassword1">Complemento:</label>
<input type="text" class="form-control" id="CLIENTE_COMPLEMENTO" name="CLIENTE_COMPLEMENTO" placeholder="Insira o Complemento " value="<?php echo $CLIENTE_COMPLEMENTO; ?>" >
</div>

<div class="col-lg-4">
<label for="exampleInputPassword1">Bairro:</label>
<input type="text" class="form-control" id="CLIENTE_BAIRRO" name="CLIENTE_BAIRRO" placeholder="Insira o Bairro " value="<?php echo $CLIENTE_BAIRRO; ?>" required>
</div>

<div class="col-lg-3">
<label for="exampleInputPassword1">Cidade:</label>
<input type="text" class="form-control" id="CLIENTE_CIDADE" name="CLIENTE_CIDADE" placeholder="Insira a Cidade " value="<?php echo $CLIENTE_CIDADE; ?>" required>
</div>


<div class="col-lg-1">
<label for="exampleInputPassword1">UF:</label>
<select id="CLIENTE_UF" name="CLIENTE_UF" class="form-control" required>
    <option value="<?php print $CLIENTE_UF; ?>"><?php print $CLIENTE_UF; ?></option>
    <option value="AC">AC</option>
    <option value="AL">AL</option>
    <option value="AP">AP</option>
    <option value="AM">AM</option>
    <option value="BA">BA</option>
    <option value="CE">CE</option>
    <option value="DF">DF</option>
    <option value="ES">ES</option>
    <option value="GO">GO</option>
    <option value="MA">MA</option>
    <option value="MT">MT</option>
    <option value="MS">MS</option>
    <option value="MG">MG</option>
    <option value="PA">PA</option>
    <option value="PB">PB</option>
    <option value="PR">PR</option>
    <option value="PE">PE</option>
    <option value="PI">PI</option>
    <option value="RJ">RJ</option>
    <option value="RN">RN</option>
    <option value="RS">RS</option>
    <option value="RO">RO</option>
    <option value="RR">RR</option>
    <option value="SC">SC</option>
    <option value="SP">SP</option>
    <option value="SE">SE</option>
    <option value="TO">TO</option>
</select>
</div>

</div>
<br>



<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30" bgcolor="#FFFF00"><div align="center"><strong>FORMA DE ENVIO DE CONTRATO</strong></div></td>
  </tr>
</table>
<br>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td width="33%">
<label for="exampleInputPassword1">EMAIL:</label> 
(	
<?php
if($FICHA_INTER_ENVIO == '1')
echo "<input type='radio' id='FICHA_INTER_ENVIO' name='FICHA_INTER_ENVIO' value='1' checked required />";
else
echo "<input type='radio' id='FICHA_INTER_ENVIO' name='FICHA_INTER_ENVIO' value='1' required />";
?>	 )</td>
<td width="33%">
<label for="exampleInputPassword1">RECEPÇÃO:</label>
(	
<?php
if($FICHA_INTER_ENVIO == '2')
echo "<input type='radio' id='FICHA_INTER_ENVIO' name='FICHA_INTER_ENVIO' value='2' checked required />";
else
echo "<input type='radio' id='FICHA_INTER_ENVIO' name='FICHA_INTER_ENVIO' value='2' required />";
?>	 )</td>
<td width="33%">
<label for="exampleInputPassword1">MOTOBOY:</label>
(	
<?php
if($FICHA_INTER_ENVIO == '3')
echo "<input type='radio' id='FICHA_INTER_ENVIO' name='FICHA_INTER_ENVIO' value='3' checked required />";
else
echo "<input type='radio' id='FICHA_INTER_ENVIO' name='FICHA_INTER_ENVIO' value='3' required />";
?>	 )</td>
</tr>
</table>
<br>



<div class="row">
<div class="col-lg-2">
<label for="exampleInputPassword1">HORÁRIO:</label>
<input type="text" class="form-control" id="FICHA_INTER_ENVIO_HORARIO" name="FICHA_INTER_ENVIO_HORARIO" placeholder="00:00 " value="<?php echo $FICHA_INTER_ENVIO_HORARIO; ?>" >
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">CEP:</label>
<input type="text" class="form-control" id="FICHA_INTER_ENVIO_CEP" name="FICHA_INTER_ENVIO_CEP" placeholder="00000-000 " value="<?php echo $FICHA_INTER_ENVIO_CEP; ?>" >
</div>

<div class="col-lg-7">
<label for="exampleInputPassword1">Endereço:</label>
<input type="text" class="form-control" id="FICHA_INTER_ENVIO_ENDERECO" name="FICHA_INTER_ENVIO_ENDERECO" placeholder="insira o endereço " value="<?php echo $FICHA_INTER_ENVIO_ENDERECO; ?>" >
</div>

<div class="col-lg-1">
<label for="exampleInputPassword1">Nº:</label>
<input type="text" class="form-control" id="FICHA_INTER_ENVIO_N" name="FICHA_INTER_ENVIO_N" placeholder="Nº " value="<?php echo $FICHA_INTER_ENVIO_N; ?>" >
</div>


</div>
<br>

<div class="row">
<div class="col-lg-4">
<label for="exampleInputPassword1">Complemento:</label>
<input type="text" class="form-control" id="FICHA_INTER_ENVIO_COMP" name="FICHA_INTER_ENVIO_COMP" placeholder="insira o complemento " value="<?php echo $FICHA_INTER_ENVIO_COMP; ?>" >
</div>

<div class="col-lg-4">
<label for="exampleInputPassword1">Bairro:</label>
<input type="text" class="form-control" id="FICHA_INTER_ENVIO_BAIRRO" name="FICHA_INTER_ENVIO_BAIRRO" placeholder="insira o bairro " value="<?php echo $FICHA_INTER_ENVIO_BAIRRO; ?>" >
</div>

<div class="col-lg-4">
<label for="exampleInputPassword1">Cidade:</label>
<input type="text" class="form-control" id="FICHA_INTER_ENVIO_CIDADE" name="FICHA_INTER_ENVIO_CIDADE" placeholder="insira a cidade " value="<?php echo $FICHA_INTER_ENVIO_CIDADE; ?>" >
</div>


</div>
<br>




<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30" bgcolor="#FFFF00"><div align="center"><strong>SERVIÇO CONTRATADO</strong></div></td>
  </tr>
</table>
<br>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td width="50%" height="30">
<label for="exampleInputPassword1">REVISÃO DE CONTRATO - FINANCIAMENTO PARCELAS EM DIA:</label> 
(	
<?php
if($FICHA_INTER_TIPO == '1')
echo "<input type='radio' id='FICHA_INTER_TIPO' name='FICHA_INTER_TIPO' value='1' checked required />";
else
echo "<input type='radio' id='FICHA_INTER_TIPO' name='FICHA_INTER_TIPO' value='1' required />";
?>	 )</td>
<td width="50%">
<label for="exampleInputPassword1">REVISÃO DE CONTRATO - FINANCIAMENTO PARCELAS EM ATRASO:</label>
(	
<?php
if($FICHA_INTER_TIPO == '2')
echo "<input type='radio' id='FICHA_INTER_TIPO' name='FICHA_INTER_TIPO' value='2' checked required />";
else
echo "<input type='radio' id='FICHA_INTER_TIPO' name='FICHA_INTER_TIPO' value='2' required />";
?>	 )</td>
</tr>
<tr>
<td width="50%" height="30">
<label for="exampleInputPassword1">REVISÃO DE CONTRATO - EMPRESTIMO PARCELAS EM DIA:</label> 
(	
<?php
if($FICHA_INTER_TIPO == '3')
echo "<input type='radio' id='FICHA_INTER_TIPO' name='FICHA_INTER_TIPO' value='3' checked required />";
else
echo "<input type='radio' id='FICHA_INTER_TIPO' name='FICHA_INTER_TIPO' value='3' required />";
?>	 )</td>
<td width="50%">
<label for="exampleInputPassword1">REVISÃO DE CONTRATO - EMPRESTIMO PARCELAS EM ATRASO:</label>
(	
<?php
if($FICHA_INTER_TIPO == '4')
echo "<input type='radio' id='FICHA_INTER_TIPO' name='FICHA_INTER_TIPO' value='4' checked required />";
else
echo "<input type='radio' id='FICHA_INTER_TIPO' name='FICHA_INTER_TIPO' value='4' required />";
?>	 )</td>
</tr>
<tr>
<td width="50%" height="30">
<label for="exampleInputPassword1">REVISÃO DE CONTRATO - CONTRATOS QUITADOS:</label> 
(	
<?php
if($FICHA_INTER_TIPO == '5')
echo "<input type='radio' id='FICHA_INTER_TIPO' name='FICHA_INTER_TIPO' value='5' checked required />";
else
echo "<input type='radio' id='FICHA_INTER_TIPO' name='FICHA_INTER_TIPO' value='5' required />";
?>	 )</td>

<td width="50%" bgcolor="#ecf0f5">
<label for="exampleInputPassword1">&nbsp;BUSCA E APREENSÃO:</label>
&nbsp;&nbsp;&nbsp; SIM (
<?php
if($FICHA_INTER_BUSCA_APREENSAO == '1')
echo "<input type='radio' id='FICHA_INTER_BUSCA_APREENSAO' name='FICHA_INTER_BUSCA_APREENSAO' value='1' checked required />";
else
echo "<input type='radio' id='FICHA_INTER_BUSCA_APREENSAO' name='FICHA_INTER_BUSCA_APREENSAO' value='1' required />";
?> 
)

&nbsp;&nbsp;&nbsp; NÃO  (
<?php
if($FICHA_INTER_BUSCA_APREENSAO == '2')
echo "<input type='radio' id='FICHA_INTER_BUSCA_APREENSAO' name='FICHA_INTER_BUSCA_APREENSAO' value='2' checked required />";
else
echo "<input type='radio' id='FICHA_INTER_BUSCA_APREENSAO' name='FICHA_INTER_BUSCA_APREENSAO' value='2' required />";
?> 
)

</td>
</tr>
</table>
<br>





<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30" bgcolor="#FFFF00"><div align="center"><strong>INFORMAÇÕES IMPORTANTES</strong></div></td>
  </tr>
</table>
<br>

<div class="row">
<div class="col-lg-5">
<label for="exampleInputPassword1">Qual o Banco:</label>
<select id="FICHA_INTER_BANCO" name="FICHA_INTER_BANCO" class="form-control" required/>
<?php 
if($FICHA_INTER_BANCO > '')	{
$v_bancos = mysqli_query($conexao,"select * from tb_bancos WHERE ID_BANCO = '$FICHA_INTER_BANCO' ");
$v_bco = mysqli_fetch_object($v_bancos);  

$BANCO_NOME = isset($v_bco->BANCO_NOME) ? $v_bco->BANCO_NOME : '';
echo "<option value='$FICHA_INTER_BANCO'> $BANCO_NOME </option>";
} 
?>
<option value=""></option>
<?php 
$sql_banco = mysqli_query($conexao,"select * from tb_bancos WHERE BANCO_STATUS = '1' ORDER BY BANCO_NOME ASC ");
while($val_banco = mysqli_fetch_object($sql_banco)):  

$VAL_ID_BANCO 	= isset($val_banco->ID_BANCO) ? $val_banco->ID_BANCO : '';
$VAL_BANCO_NOME	= isset($val_banco->BANCO_NOME) ? $val_banco->BANCO_NOME : '';
//$VAL_BANCO_NOME = utf8_decode($VAL_BANCO_NOME);
?>
<option value="<?php echo $VAL_ID_BANCO; ?>"> <?php echo utf8_encode($VAL_BANCO_NOME); ?> </option>
<?php
 endwhile;
?>
</select>
</div>

<div class="col-lg-4">
<label for="exampleInputPassword1">Qual o Veículo:</label>
<?php 
if($FICHA_INTER_VEICULO == '')
$FICHA_INTER_VEICULO = $CALCULO_VEICULO;
?>
<input type="text" class="form-control" id="FICHA_INTER_VEICULO" name="FICHA_INTER_VEICULO" placeholder="insira o veículo " value="<?php echo $FICHA_INTER_VEICULO; ?>" required>
</div>

</div>
<br>


<div class="row">
<div class="col-lg-3">
<label for="exampleInputPassword1">Valor do Financiamento:</label>
<?php 
if($FICHA_INTER_VALOR_FIN == '')
$FICHA_INTER_VALOR_FIN = $CALCULO_VALOR_TOTAL_FINANCIAMENTO_ATUAL;
?>
<input type="text" class="form-control" id="FICHA_INTER_VALOR_FIN" name="FICHA_INTER_VALOR_FIN" placeholder="insira o valor do financiamento " value="<?php echo $FICHA_INTER_VALOR_FIN; ?>" required>
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Valor da Parcela:</label>
<?php 
if($FICHA_INTER_VALOR_PARC == '')
$FICHA_INTER_VALOR_PARC = $CALCULO_VALOR_ATUAL_PARCELA;
?>
<input type="text" class="form-control" id="FICHA_INTER_VALOR_PARC" name="FICHA_INTER_VALOR_PARC" placeholder="insira o valor da parcela " value="<?php echo $FICHA_INTER_VALOR_PARC; ?>" required>
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Quantas já Pagou:</label>
<?php 
if($FICHA_INTER_PAGA == '')
$FICHA_INTER_PAGA = $CALCULO_PARCELAS_PAGAS;
?>
<input type="text" class="form-control" id="FICHA_INTER_PAGA" name="FICHA_INTER_PAGA" placeholder="insira as parcelas pagas " value="<?php echo $FICHA_INTER_PAGA; ?>" required>
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Quantas em Atraso:</label>
<?php 
if($FICHA_INTER_ATRASO == '')
$FICHA_INTER_ATRASO = $CALCULO_PARCELAS_ATRASO;
?>
<input type="text" class="form-control" id="FICHA_INTER_ATRASO" name="FICHA_INTER_ATRASO" placeholder="insira as parcelas em atraso " value="<?php echo $FICHA_INTER_ATRASO; ?>" required>
</div>

</div>
<br>




<div class="form-group">
<label for="exampleInputEmail1">Observações:</label>
<textarea rows="4" class="form-control" id="FICHA_INTER_OBS" name="FICHA_INTER_OBS" placeholder="insira a observação"><?php echo $FICHA_INTER_OBS ; ?></textarea>
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




          
            
            



<?php
$ID_VALOR_CONTR = isset($_GET['ID_VALOR_CONTR']) ? $_GET['ID_VALOR_CONTR'] : '';

///////////////////////////////////////////////////////
$sql_valor = mysqli_query($conexao,"select * from tb_valor_contratacao WHERE ID_VALOR_CONTR = '$ID_VALOR_CONTR' ");
$val_valor = mysqli_fetch_object($sql_valor);  
///////////////////////////////////////////////////////

$ID_VALOR_CONTR 					= isset($val_valor->ID_VALOR_CONTR) ? $val_valor->ID_VALOR_CONTR : '';
$VALOR_CONTR_USER 					= isset($val_valor->VALOR_CONTR_USER) ? $val_valor->VALOR_CONTR_USER : '';	
$VALOR_CONTR_STATUS 				= isset($val_valor->VALOR_CONTR_STATUS) ? $val_valor->VALOR_CONTR_STATUS : '';	
$VALOR_CONTR_ENTR_PARC				= isset($val_valor->VALOR_CONTR_ENTR_PARC) ? $val_valor->VALOR_CONTR_ENTR_PARC : '';	
$VALOR_CONTR_TIPO					= isset($val_valor->VALOR_CONTR_TIPO) ? $val_valor->VALOR_CONTR_TIPO : '';	
$VALOR_CONTR_LEADS		 			= isset($val_valor->VALOR_CONTR_LEADS) ? $val_valor->VALOR_CONTR_LEADS : '';	
$VALOR_CONTR_FICHA		 			= isset($val_valor->VALOR_CONTR_FICHA) ? $val_valor->VALOR_CONTR_FICHA : '';	
$VALOR_CONTR_VALOR	 				= isset($val_valor->VALOR_CONTR_VALOR) ? $val_valor->VALOR_CONTR_VALOR : '';	
$VALOR_CONTR_QTDE_VEZES	 			= isset($val_valor->VALOR_CONTR_QTDE_VEZES) ? $val_valor->VALOR_CONTR_QTDE_VEZES : '';	
$VALOR_CONTR_PARCELA			 	= isset($val_valor->VALOR_CONTR_PARCELA) ? $val_valor->VALOR_CONTR_PARCELA : '';	

echo $VALOR_CONTR_DATA_PGTO			 	= isset($val_valor->VALOR_CONTR_DATA_PGTO) ? $val_valor->VALOR_CONTR_DATA_PGTO : '';	
if($VALOR_CONTR_DATA_PGTO > '')		{
$VALOR_CONTR_DATA_PGTO_DIA = substr($VALOR_CONTR_DATA_PGTO, 8, 4);
$VALOR_CONTR_DATA_PGTO_MES = substr($VALOR_CONTR_DATA_PGTO, 5, 2);
$VALOR_CONTR_DATA_PGTO_ANO = substr($VALOR_CONTR_DATA_PGTO, 0, 4);
$VALOR_CONTR_DATA_PGTO = $VALOR_CONTR_DATA_PGTO_DIA.'/'.$VALOR_CONTR_DATA_PGTO_MES.'/'.$VALOR_CONTR_DATA_PGTO_ANO;
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



<!--
<form 
<?php 
IF($ID_VALOR_CONTR == '')
echo "action='operador-ficha-intermediacao-pgto-cadastrar-actions.php'"; 
ELSEIF($ID_VALOR_CONTR > '')
echo "action='operador-ficha-intermediacao-pgto-alterar-actions.php'"; 
?> method='post' name="formulario">
<input type="hidden" id="ID_VALOR_CONTR" name="ID_VALOR_CONTR" value="<?php echo $ID_VALOR_CONTR; ?>">
<input type="hidden" id="VALOR_CONTR_LEADS" name="VALOR_CONTR_LEADS" value="<?php echo $ID_LEADS; ?>">
<input type="hidden" id="VALOR_CONTR_FICHA" name="VALOR_CONTR_FICHA" value="<?php echo $ID_FICHA_INTER; ?>">
<input type="hidden" id="VALOR_CONTR_USER" name="VALOR_CONTR_USER" value="<?php echo $ID_USER; ?>">
<input type="hidden" id="F_USER_REGISTRO" name="F_USER_REGISTRO" value="<?php echo $USER_NOME; ?>">


<div class="box-header with-border">
<div class="box-body">
<div class="row">
<div class="col-lg-2">
<label for="exampleInputPassword1">Status:</label>
<select id="VALOR_CONTR_STATUS" name="VALOR_CONTR_STATUS" class="form-control" required>
<?php 
if($VALOR_CONTR_STATUS == '1')
echo "<option value='1'> Pago </option>";
elseif($VALOR_CONTR_STATUS == '2')
echo "<option value='2'> Em Aberto </option>";
?>

<option value=""></option>
<option value="1"> Pago </option>
<option value="2"> Em Aberto </option>
</select>
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Tipo:</label>
<select id="VALOR_CONTR_ENTR_PARC" name="VALOR_CONTR_ENTR_PARC" class="form-control" required>
<?php 
if($VALOR_CONTR_ENTR_PARC == '1')
echo "<option value='1'> Entrada </option>";
elseif($VALOR_CONTR_ENTR_PARC == '2')
echo "<option value='2'> Parcela </option>";
?>

<option value=""></option>
<option value="1"> Entrada </option>
<option value="2"> Parcela </option>
</select>
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Tipo de Pagamento:</label>
<select id="VALOR_CONTR_TIPO" name="VALOR_CONTR_TIPO" class="form-control" required>
<?php 
if($VALOR_CONTR_TIPO == '1')
echo "<option value='1'> Dinheiro </option>";
elseif($VALOR_CONTR_TIPO == '2')
echo "<option value='2'> Cartão Débito </option>";
elseif($VALOR_CONTR_TIPO == '3')
echo "<option value='3'> Cartão Credito </option>";
elseif($VALOR_CONTR_TIPO == '4')
echo "<option value='4'> Depósito/ Transferência </option>";
elseif($VALOR_CONTR_TIPO == '5')
echo "<option value='5'> Boleto </option>";
elseif($VALOR_CONTR_TIPO == '6')
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
<input type="text" class="form-control" id="VALOR_CONTR_VALOR" name="VALOR_CONTR_VALOR" placeholder="insira o valor" value="<?php echo $VALOR_CONTR_VALOR; ?>" required>
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Quantas vezes(x):</label>
<input type="text" class="form-control" id="VALOR_CONTR_QTDE_VEZES" name="VALOR_CONTR_QTDE_VEZES" placeholder="insira qtde vezes " value="<?php echo $VALOR_CONTR_QTDE_VEZES; ?>" required>
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Parcela:</label>
<input type="text" class="form-control" id="VALOR_CONTR_PARCELA" name="VALOR_CONTR_PARCELA" placeholder="insira as parcelas " value="<?php echo $VALOR_CONTR_PARCELA; ?>" required>
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Data Pagamento:</label>
<?php
if($VALOR_CONTR_DATA_PGTO == '')
$VALOR_CONTR_DATA_PGTO = date('d/m/Y');
?>
<input type="text" class="form-control" id="VALOR_CONTR_DATA_PGTO" name="VALOR_CONTR_DATA_PGTO" placeholder="insira a data de fechamento " value="<?php echo $VALOR_CONTR_DATA_PGTO; ?>" required>
</div>

</div>

</div>



      <div class="box-footer">
        <button type="submit" class="btn btn-danger">Salvar</button>
      </div>
    </form>
  </div>
-->
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
<!--
<th width="40" ><div align="center">ALT</div></th>
<th width="40" ><div align="center">EXC</div></th>
-->
</tr>
</thead>

<tbody>
<?php
// do { 
$c = 2;

$sql_val_pgto = mysqli_query($conexao,"SELECT * FROM tb_valor_contratacao WHERE VALOR_CONTR_LEADS = '$ID_LEADS' AND VALOR_CONTR_STATUS <'3' ORDER BY ID_VALOR_CONTR DESC ");
while($val_val_pgto = mysqli_fetch_object($sql_val_pgto)):      

$ID_VALOR_CONTR				= isset($val_val_pgto->ID_VALOR_CONTR) ? $val_val_pgto->ID_VALOR_CONTR : '';
$VALOR_CONTR_USER			= isset($val_val_pgto->VALOR_CONTR_USER) ? $val_val_pgto->VALOR_CONTR_USER : '';
$VALOR_CONTR_STATUS			= isset($val_val_pgto->VALOR_CONTR_STATUS) ? $val_val_pgto->VALOR_CONTR_STATUS : '';
$VALOR_CONTR_TIPO			= isset($val_val_pgto->VALOR_CONTR_TIPO) ? $val_val_pgto->VALOR_CONTR_TIPO : '';
$VALOR_CONTR_LEADS			= isset($val_val_pgto->VALOR_CONTR_LEADS) ? $val_val_pgto->VALOR_CONTR_LEADS : '';
$VALOR_CONTR_FICHA			= isset($val_val_pgto->VALOR_CONTR_FICHA) ? $val_val_pgto->VALOR_CONTR_FICHA : '';
$VALOR_CONTR_VALOR			= isset($val_val_pgto->VALOR_CONTR_VALOR) ? $val_val_pgto->VALOR_CONTR_VALOR : '';
$VALOR_CONTR_VALOR_PARCELA	= isset($val_val_pgto->VALOR_CONTR_VALOR_PARCELA) ? $val_val_pgto->VALOR_CONTR_VALOR_PARCELA : '';
$VALOR_CONTR_QTDE_VEZES		= isset($val_val_pgto->VALOR_CONTR_QTDE_VEZES) ? $val_val_pgto->VALOR_CONTR_QTDE_VEZES : '';
$VALOR_CONTR_PARCELA		= isset($val_val_pgto->VALOR_CONTR_PARCELA) ? $val_val_pgto->VALOR_CONTR_PARCELA : '';

$VALOR_CONTR_DATA_PGTO			= isset($val_val_pgto->VALOR_CONTR_DATA_PGTO	) ? $val_val_pgto->VALOR_CONTR_DATA_PGTO	 : '';
$VALOR_CONTR_DATA_PGTO_DIA = substr($VALOR_CONTR_DATA_PGTO, 8, 4);
$VALOR_CONTR_DATA_PGTO_MES = substr($VALOR_CONTR_DATA_PGTO, 5, 2);
$VALOR_CONTR_DATA_PGTO_ANO = substr($VALOR_CONTR_DATA_PGTO, 0, 4);
$VALOR_CONTR_DATA_PGTO = $VALOR_CONTR_DATA_PGTO_DIA.'/'.$VALOR_CONTR_DATA_PGTO_MES.'/'.$VALOR_CONTR_DATA_PGTO_ANO;
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////

$index = $c % 2;
$c++;
//$cor = $cores[$index];
$IETM = $c - 2 ;
?>
<tr>
<td ><div align="center"><?php echo $ID_VALOR_CONTR; ?></div></td>
<td ><div align="center"><?php echo $VALOR_CONTR_DATA_PGTO; ?></div></td>
<td ><div align="center">
<?php 
if($VALOR_CONTR_STATUS == '1')
echo  "Pago";
elseif($VALOR_CONTR_STATUS == '2')
echo  "Em Aberto";
?></div></td>
<td ><div align="center">
<?php 
if($VALOR_CONTR_TIPO == '1')
echo "Dinheiro";
elseif($VALOR_CONTR_TIPO == '2')
echo "Cartão Débito";
elseif($VALOR_CONTR_TIPO == '3')
echo "Cartão Credito";
elseif($VALOR_CONTR_TIPO == '4')
echo "Depósito/ Transferência";
elseif($VALOR_CONTR_TIPO == '5')
echo "Boleto";
elseif($VALOR_CONTR_TIPO == '6')
echo "Pix";
?></div></td>
<td ><div align="center"><?php echo $VALOR_CONTR_VALOR_PARCELA; ?></div></td>
<td ><div align="center"><?php echo $VALOR_CONTR_QTDE_VEZES; ?></div></td>
<!--
<td ><div align="center"><?php echo $VALOR_CONTR_PARCELA; ?></div></td>
-->
<td ><div align="center"><?php echo $VALOR_CONTR_VALOR; ?></div></td>
<!--
<td><div align="center"><a href="operador-ficha-intermediacao.php?ID_VALOR_CONTR=<?php echo $ID_VALOR_CONTR; ?>&&ID_LEADS=<?php echo $ID_LEADS; ?>"><i class="fa fa-refresh"></i></a></div></td>
<td><div align="center"><a href="excluir-operador-ficha-intermediacao.php?ID_VALOR_CONTR=<?php echo $ID_VALOR_CONTR; ?>&&ID_LEADS=<?php echo $ID_LEADS; ?>"><i class="fa fa-close" style="color:#FF0000"></i></a></div></td>
-->
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
$sql_total = mysqli_query($conexao,"select sum(cast(replace(replace(VALOR_CONTR_VALOR, '.', ''), ',', '.') as decimal(10,2))) FROM tb_valor_contratacao WHERE VALOR_CONTR_LEADS = '$ID_LEADS' AND VALOR_CONTR_STATUS < '3' ");
$sql_total = mysqli_fetch_array($sql_total);
echo number_format($sql_total[0], 2, ',', '.');
?>
</strong></div></td>
<!--
<td ><div align="center">&nbsp;</div></td>
-->
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
