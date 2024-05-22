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

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


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
    $("#LEADS_JURIDICO_HIST_DATA").mask("99/99/9999");    // Máscara para data
    $("#LEADS_JURIDICO_HIST_DATA_FOLLOW").mask("99/99/9999");    // Máscara para data
    $("#LEADS_JURIDICO_HIST_HORA_FOLLOW").mask("99:99");    // Máscara para hora

//    $("#CALCULO_CPF").mask("999.999.999-99");    // Máscara para hora
}); 
 
</script>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>


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
        Laudo / Prospecção |
        <small>painel de controle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Laudo / Prospecção</a></li>
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
       Laudo / Prospecção 
    </h3>
    </td>
    <td width="5%">&nbsp;</td>

<?php 
if($LEADS_JURIDICO_STATUS == '1')	{
?>
<td width="22%">
<div align="right">
<form action="laudo-juridico-pagamento.php" method='get' name="formulario" >
<input type="hidden" id="ID_LEADS" name="ID_LEADS" value="<?php echo $ID_LEADS; ?>">
<input type="hidden" id="ID_LEADS_JURIDICO" name="ID_LEADS_JURIDICO" value="<?php echo $ID_LEADS_JURIDICO; ?>">
<button type="submit" class="btn btn-danger"> Pgto Laudo </button>
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


<!--
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
-->
</div>
<br>












<br>
<div class="box box-danger">
</div>
<form 
<?php 
IF($ID_LEADS_JURIDICO_HIST == '')
echo "action='laudo-juridico-hist-cadastrar-actions.php'"; 
ELSEIF($ID_LEADS_JURIDICO_HIST > '')
echo "action='laudo-juridico-hist-alterar-actions.php'"; 
?> method='post' name="formulario" >
<input type="hidden" id="ID_LEADS_JURIDICO_HIST" name="ID_LEADS_JURIDICO_HIST" value="<?php echo $ID_LEADS_JURIDICO_HIST; ?>">
<input type="hidden" id="LEADS_JURIDICO_HIST_LEADS" name="LEADS_JURIDICO_HIST_LEADS" value="<?php echo $ID_LEADS; ?>">
<input type="hidden" id="LEADS_JURIDICO_HIST_USER" name="LEADS_JURIDICO_HIST_USER" value="<?php echo $ID_USER; ?>">
<input type="hidden" id="LEADS_PRIORIDADE" name="LEADS_PRIORIDADE" value="<?php echo $LEADS_PRIORIDADE; ?>">
<input type="hidden" id="F_USER_REGISTRO" name="F_USER_REGISTRO" value="<?php echo $USER_NOME; ?>">



<div class="row">
<div class="col-lg-2">
<label for="exampleInputPassword1">Data:</label>
<input type="text" class="form-control" id="LEADS_JURIDICO_HIST_DATA" name="LEADS_JURIDICO_HIST_DATA" placeholder="insira o data " value="<?php echo $LEADS_JURIDICO_HIST_DATA; ?>"  >
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Status:</label>
<select id="LEADS_JURIDICO_HIST_STATUS" name="LEADS_JURIDICO_HIST_STATUS" class="form-control" required />
<?php 
if($LEADS_JURIDICO_HIST_STATUS == '1')
echo "<option value='1'> Laudo Fechado </option>";
elseif($LEADS_JURIDICO_HIST_STATUS == '2')
echo "<option value='2'> Não Atende </option>";
elseif($LEADS_JURIDICO_HIST_STATUS == '3')
echo "<option value='3'> Recado </option>";
elseif($LEADS_JURIDICO_HIST_STATUS == '4')
echo "<option value='4'> Devolução Carro </option>";
elseif($LEADS_JURIDICO_HIST_STATUS == '5')
echo "<option value='5'> Recusa/ Ñ tem interesse </option>";
elseif($LEADS_JURIDICO_HIST_STATUS == '6')
echo "<option value='6'> Follow Up </option>";
elseif($LEADS_JURIDICO_HIST_STATUS == '7')
echo "<option value='7'> Em Negociação </option>";
?>

<option value=""></option>
<option value="1"> Laudo Fechado </option>
<option value="2"> Não Atende </option>
<option value="3"> Recado </option>
<!--
<option value="4"> Devolução Carro </option>
-->
<option value="5"> Recusa/ Ñ tem interesse </option>
<option value="6"> Follow Up </option>
<option value="7"> Em Negociação </option>
</select>
</div>

<div class="col-lg-4">
<label for="exampleInputPassword1">Assunto:</label>
<input type="text" class="form-control" id="LEADS_JURIDICO_HIST_ASSUNTO" name="LEADS_JURIDICO_HIST_ASSUNTO" placeholder="insira o assunto " value="<?php echo $LEADS_JURIDICO_HIST_ASSUNTO; ?>"  >
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Follow Up - Data:</label>
<input type="text" class="form-control" id="LEADS_JURIDICO_HIST_DATA_FOLLOW" name="LEADS_JURIDICO_HIST_DATA_FOLLOW" placeholder="insira a data do follow up " value="<?php echo $LEADS_JURIDICO_HIST_DATA_FOLLOW; ?>"  >
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Follow Up - Hora:</label>
<input type="text" class="form-control" id="LEADS_JURIDICO_HIST_HORA_FOLLOW" name="LEADS_JURIDICO_HIST_HORA_FOLLOW" placeholder="insira a hora do follow up " value="<?php echo $LEADS_JURIDICO_HIST_HORA_FOLLOW; ?>"  >
</div>

</div>
<br>

<div class="form-group">
<label for="exampleInputEmail1">Descrição:</label>
<textarea rows="4" class="form-control" id="LEADS_JURIDICO_HIST_DESCRICAO" name="LEADS_JURIDICO_HIST_DESCRICAO" placeholder="insira a descrição"><?php echo $LEADS_JURIDICO_HIST_DESCRICAO; ?></textarea>
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
    <td width="78%"><h3 class="box-title"><strong>HISTÓRICO LAUDO</strong></h3></td>
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

$sql_hist = mysqli_query($conexao,"SELECT * FROM tb_leads_juridico_hist WHERE LEADS_JURIDICO_HIST_LEADS = '$ID_LEADS' ORDER BY ID_LEADS_JURIDICO_HIST DESC ");
while($val_hist = mysqli_fetch_object($sql_hist)):      

$ID_LEADS_JURIDICO_HIST				= isset($val_hist->ID_LEADS_JURIDICO_HIST) ? $val_hist->ID_LEADS_JURIDICO_HIST : '';
$LEADS_JURIDICO_HIST_USER			= isset($val_hist->LEADS_JURIDICO_HIST_USER) ? $val_hist->LEADS_JURIDICO_HIST_USER : '';
$LEADS_JURIDICO_HIST_STATUS			= isset($val_hist->LEADS_JURIDICO_HIST_STATUS) ? $val_hist->LEADS_JURIDICO_HIST_STATUS : '';
$LEADS_JURIDICO_HIST_LEADS			= isset($val_hist->LEADS_JURIDICO_HIST_LEADS) ? $val_hist->LEADS_JURIDICO_HIST_LEADS : '';

$LEADS_JURIDICO_HIST_DATA			= isset($val_hist->LEADS_JURIDICO_HIST_DATA	) ? $val_hist->LEADS_JURIDICO_HIST_DATA	 : '';
$LEADS_JURIDICO_HIST_DATA_DIA = substr($LEADS_JURIDICO_HIST_DATA, 8, 4);
$LEADS_JURIDICO_HIST_DATA_MES = substr($LEADS_JURIDICO_HIST_DATA, 5, 2);
$LEADS_JURIDICO_HIST_DATA_ANO = substr($LEADS_JURIDICO_HIST_DATA, 0, 4);
$LEADS_JURIDICO_HIST_DATA = $LEADS_JURIDICO_HIST_DATA_DIA.'/'.$LEADS_JURIDICO_HIST_DATA_MES.'/'.$LEADS_JURIDICO_HIST_DATA_ANO;

$LEADS_JURIDICO_HIST_ASSUNTO			= isset($val_hist->LEADS_JURIDICO_HIST_ASSUNTO) ? $val_hist->LEADS_JURIDICO_HIST_ASSUNTO : '';

$LEADS_JURIDICO_HIST_DATA_FOLLOW		= isset($val_hist->LEADS_JURIDICO_HIST_DATA_FOLLOW	) ? $val_hist->LEADS_JURIDICO_HIST_DATA_FOLLOW	 : '';
$LEADS_JURIDICO_HIST_DATA_FOLLOW_DIA = substr($LEADS_JURIDICO_HIST_DATA_FOLLOW, 8, 4);
$LEADS_JURIDICO_HIST_DATA_FOLLOW_MES = substr($LEADS_JURIDICO_HIST_DATA_FOLLOW, 5, 2);
$LEADS_JURIDICO_HIST_DATA_FOLLOW_ANO = substr($LEADS_JURIDICO_HIST_DATA_FOLLOW, 0, 4);
$LEADS_JURIDICO_HIST_DATA_FOLLOW = $LEADS_JURIDICO_HIST_DATA_FOLLOW_DIA.'/'.$LEADS_JURIDICO_HIST_DATA_FOLLOW_MES.'/'.$LEADS_JURIDICO_HIST_DATA_FOLLOW_ANO;

$LEADS_JURIDICO_HIST_HORA_FOLLOW		= isset($val_hist->LEADS_JURIDICO_HIST_HORA_FOLLOW) ? $val_hist->LEADS_JURIDICO_HIST_HORA_FOLLOW : '';
$LEADS_JURIDICO_HIST_DESCRICAO		= isset($val_hist->LEADS_JURIDICO_HIST_DESCRICAO) ? $val_hist->LEADS_JURIDICO_HIST_DESCRICAO : '';

$F_USER_REGISTRO			= isset($val_hist->F_USER_REGISTRO) ? $val_hist->F_USER_REGISTRO : '';
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////

$index = $c % 2;
$c++;
//$cor = $cores[$index];
$IETM = $c - 2 ;
?>
<tr>
<td ><div align="center"><?php echo $ID_LEADS_JURIDICO_HIST; ?></div></td>
<td ><div align="center"><?php echo $LEADS_JURIDICO_HIST_DATA; ?></div></td>
<td ><div align="center">
<?php 
if($LEADS_JURIDICO_HIST_STATUS == '1')
echo  "Laudo Fechado";
elseif($LEADS_JURIDICO_HIST_STATUS == '2')
echo  "Não Atende";
elseif($LEADS_JURIDICO_HIST_STATUS == '3')
echo  "Recado";
elseif($LEADS_JURIDICO_HIST_STATUS == '4')
echo  "Devolução Carro";
elseif($LEADS_JURIDICO_HIST_STATUS == '5')
echo  "Recusa/ Ñ tem interesse";
elseif($LEADS_JURIDICO_HIST_STATUS == '6')
echo  "Follow Up";
elseif($LEADS_JURIDICO_HIST_STATUS == '7')
echo  "Em Negociação";
?></div>
</td>
<td ><?php echo $LEADS_JURIDICO_HIST_ASSUNTO; ?></td>
<td ><div align="center"><?php echo $LEADS_JURIDICO_HIST_DATA_FOLLOW; ?> - <?php echo $LEADS_JURIDICO_HIST_HORA_FOLLOW; ?></div></td>
<td ><?php echo $F_USER_REGISTRO; ?></td>
</tr>

<tr>
<td colspan="6" bgcolor="#CCCCCC"><strong>HISTÓRICO:</strong> <?php echo $LEADS_JURIDICO_HIST_DESCRICAO; ?></td>
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
