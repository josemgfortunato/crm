<?php
$ID_USER 		= isset($_COOKIE["ID_USER"]) ? $_COOKIE["ID_USER"] : '';
if($ID_USER == ''){	
include "sessao-expirou.php";
}

//include "Connections/conecta_banco.php";
include "valida_cookie_admin.php";


$val_id_pesquisa 	= isset($_POST['val_id_pesquisa']) ? $_POST['val_id_pesquisa'] : '';
$val_status		 	= isset($_POST['val_status']) ? $_POST['val_status'] : '';
$val_operador	 	= isset($_POST['val_operador']) ? $_POST['val_operador'] : '';

$val_tel		 	= isset($_POST['val_tel']) ? $_POST['val_tel'] : '';
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
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<script language=javascript>
<!--
cont = 0;
function CheckAll() { 
   for (var i=0;i<document.formulario.elements.length;i++) {
     var x = document.formulario.elements[i];
     if (x.id == 'ID_LEADS') { 
x.checked = document.formulario.selall.checked;
} 
}
if (cont == 0){    
var elem = document.getElementById("checar");
elem.innerHTML = "Desmarcar todos";
cont = 1;
} else {
var elem = document.getElementById("checar");
elem.innerHTML = "Marcar todos";
cont = 0;
}

} 
//-->
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
        Troca Pasta de Operador |
        <small>painel de controle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Troca Leads Operador</a></li>
      </ol>
    </section>
<br>
  <!-- Main content -->




    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-danger">
            <div class="box-header">
              
<!--
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="30%"><h3 class="box-title">Tabela Troca Leads de Operador</h3></td>

<td width="70%">
<div align="right">
<form action="principal-leads-troca-operador.php" method="post" >

<div class="col-lg-3">
<select id="val_status" name="val_status" class="form-control" >
<option value=""> Selecione o STATUS: </option>
<?php 
if($val_status == '1')
echo "<option value='1' selected> Acordo/ Revisão </option>";
elseif($val_status == '2')
echo "<option value='2' selected> Não Atende </option>";
elseif($val_status == '3')
echo "<option value='3' selected> Recado </option>";
elseif($val_status == '4')
echo "<option value='4' selected> Devolução Carro </option>";
elseif($val_status == '5')
echo "<option value='5' selected> Recusa/ Ñ tem interesse </option>";
elseif($val_status == '6')
echo "<option value='6' selected> Follow Up </option>";
elseif($val_status == '7')
echo "<option value='7' selected> Em Negociação </option>";
elseif($val_status == '8')
echo "<option value='8' selected> Whatsapp </option>";
?>

<option value=""></option>
<option value="1"> Acordo/ Revisão </option>
<option value="2"> Não Atende </option>
<option value="3"> Recado </option>
<option value="4"> Devolução Carro </option>
<option value="5"> Recusa/ Ñ tem interesse </option>
<option value="6"> Follow Up </option>
<option value="7"> Em Negociação </option>
<option value="8"> Whatsapp </option>
</select>
</div>


<div class="col-lg-4">
<select id="val_operador" name="val_operador" class="form-control" required="required" >
<option value=""> Selecione o OPERADOR: </option>
<?php 
if($val_operador >'')	{
$sql_print_op = mysqli_query($conexao,"select * from tb_administrador WHERE ID_ADMINISTRADOR = '$val_operador' ");
$val_print_op = mysqli_fetch_object($sql_print_op);  

$PRINT_ID_ADMINISTRADOR		= isset($val_print_op->ID_ADMINISTRADOR) ? $val_print_op->ID_ADMINISTRADOR : '';
$PRINT_ADMINISTRADOR_NOME	= isset($val_print_op->ADMINISTRADOR_NOME) ? $val_print_op->ADMINISTRADOR_NOME : '';

echo "<option value='$val_operador' selected> $PRINT_ADMINISTRADOR_NOME </option>";
echo "<option value=''> </option>";
}

if($USER_TIPO == '1')
$sql_user = mysqli_query($conexao,"select * from tb_supervisor_user WHERE SUPERVISOR_USER_STATUS = '1' ");
else
$sql_user = mysqli_query($conexao,"select * from tb_supervisor_user WHERE SUPERVISOR_USER_STATUS = '1' AND SUPERVISOR_USER_SUPERVISOR = '$ID_USER' ");
while($val_user = mysqli_fetch_object($sql_user)):  

$VAL_SUPERVISOR_USER_OPERADOR	= isset($val_user->SUPERVISOR_USER_OPERADOR) ? $val_user->SUPERVISOR_USER_OPERADOR : '';


$print_user = mysqli_query($conexao,"select * from tb_administrador WHERE ID_ADMINISTRADOR = '$VAL_SUPERVISOR_USER_OPERADOR' AND ADMINISTRADOR_STATUS = '1' ");
$val_p_user = mysqli_fetch_object($print_user);  
///////////////////////////////////////////////////////

$VAL_ID_ADMINISTRADOR 				= isset($val_p_user->ID_ADMINISTRADOR) ? $val_p_user->ID_ADMINISTRADOR : '';
$VAL_ADMINISTRADOR_NOME				= isset($val_p_user->ADMINISTRADOR_NOME) ? $val_p_user->ADMINISTRADOR_NOME : '';
?>
<?php 
/*
$sql_user = mysqli_query($conexao,"select * from tb_administrador WHERE ADMINISTRADOR_STATUS = '1' AND ADMINISTRADOR_TIPO = '5' ORDER BY ADMINISTRADOR_NOME ASC");
while($val_user = mysqli_fetch_object($sql_user)):  

$VAL_ID_ADMINISTRADOR	= isset($val_user->ID_ADMINISTRADOR) ? $val_user->ID_ADMINISTRADOR : '';
$VAL_ADMINISTRADOR_NOME	= isset($val_user->ADMINISTRADOR_NOME) ? $val_user->ADMINISTRADOR_NOME : '';
*/
?>
<option value="<?php echo $VAL_ID_ADMINISTRADOR; ?>"> <?php echo $VAL_ADMINISTRADOR_NOME; ?> </option>
<?php
 endwhile;
?>
</select>
</div>


<div align="left">
<button type="submit" class="btn btn-danger">Pesquisar</button>
</div>
</form> 
</div> 
</td>
    </tr>
</table>
-->




<table width="600" border="0" cellpadding="0" cellspacing="0" >
  <tr>
    <td width="200" height="30">Pesquisar por ID:</td>
    <td>
<form action="principal-juridico-troca-operador.php" method="post" >
<input type="text" class="form-control" id="val_id_pesquisa" name="val_id_pesquisa" placeholder="insira o id" value="<?php echo $val_id_pesquisa; ?>" required />
    </td>
    <td>
<div align="right">
<button type="submit" class="btn btn-danger">Pesquisar por ID</button>
</div>
</form> 
    </td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td height="30">Pesquisar por OPERADOR:</td>
    <td>
<form action="principal-juridico-troca-operador.php" method="post" >

<select id="val_operador" name="val_operador" class="form-control" required="required" >
<option value=""> Selecione o OPERADOR: </option>
<?php 
if($val_operador >'')	{
$sql_print_op = mysqli_query($conexao,"select * from tb_administrador WHERE ID_ADMINISTRADOR = '$val_operador' ");
$val_print_op = mysqli_fetch_object($sql_print_op);  

$PRINT_ID_ADMINISTRADOR		= isset($val_print_op->ID_ADMINISTRADOR) ? $val_print_op->ID_ADMINISTRADOR : '';
$PRINT_ADMINISTRADOR_NOME	= isset($val_print_op->ADMINISTRADOR_NOME) ? $val_print_op->ADMINISTRADOR_NOME : '';

echo "<option value='$val_operador' selected> $PRINT_ADMINISTRADOR_NOME </option>";
echo "<option value=''> </option>";
}


$sql_user = mysqli_query($conexao,"select * from tb_administrador WHERE ADMINISTRADOR_STATUS = '1' AND ADMINISTRADOR_TIPO = '6' ORDER BY ADMINISTRADOR_NOME ASC");
//$sql_user = mysqli_query($conexao,"select * from tb_supervisor_user WHERE SUPERVISOR_USER_STATUS = '1' AND SUPERVISOR_USER_SUPERVISOR = '$ID_USER' ");
while($val_user = mysqli_fetch_object($sql_user)):  

$VAL_ID_ADMINISTRADOR	= isset($val_user->ID_ADMINISTRADOR) ? $val_user->ID_ADMINISTRADOR : '';
$VAL_ADMINISTRADOR_NOME	= isset($val_user->ADMINISTRADOR_NOME) ? $val_user->ADMINISTRADOR_NOME : '';
?>
<option value="<?php echo $VAL_ID_ADMINISTRADOR; ?>"> <?php echo $VAL_ADMINISTRADOR_NOME; ?> </option>
<?php
 endwhile;
?>
</select>

    </td>
    <td>
<div align="right">
<button type="submit" class="btn btn-danger">Pesquisar por Status</button>
</div>
</form> 
    </td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
<!--
<tr>
<td height="30">Pesquisar por TEL:</td>
<td>
<form action="principal-juridico-troca-operador.php" method="post" >
<input type="text" class="form-control" id="val_tel" name="val_tel" placeholder="insira o tel" value="<?php echo $val_tel; ?>" required />
</td>
<td>
<div align="right">
<button type="submit" class="btn btn-danger">Pesquisar por Tel</button>
</div>
</form> 
</td>
</tr>
-->
</table>
            </div>



<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#009900">&nbsp;</td>
  </tr>
</table>

<div class="box-body">
<form name="formulario" action="juridico-troca-operador-actions.php" method="GET">
<input type="hidden" id="val_operador" name="val_operador" value="<?php echo $val_operador; ?>">
<input type="hidden" id="F_USER_REGISTRO" name="F_USER_REGISTRO" value="<?php echo $USER_NOME; ?>">

<div class="row">
<div class="col-lg-5">
<label for="exampleInputPassword1">Jurídico Operador:</label>
<select id="F_OPERADOR" name="F_OPERADOR" class="form-control" required="required" >
<option value=""></option>
<?php 
/*
$sql_user = mysqli_query($conexao,"select * from tb_supervisor_user WHERE SUPERVISOR_USER_STATUS = '1' AND SUPERVISOR_USER_SUPERVISOR = '$ID_USER' ");
while($val_user = mysqli_fetch_object($sql_user)):  

$VAL_SUPERVISOR_USER_OPERADOR	= isset($val_user->SUPERVISOR_USER_OPERADOR) ? $val_user->SUPERVISOR_USER_OPERADOR : '';


$print_user = mysqli_query($conexao,"select * from tb_administrador WHERE ID_ADMINISTRADOR = '$VAL_SUPERVISOR_USER_OPERADOR' AND ADMINISTRADOR_STATUS = '1' ");
$val_p_user = mysqli_fetch_object($print_user);  
///////////////////////////////////////////////////////

$VAL_ID_ADMINISTRADOR 				= isset($val_p_user->ID_ADMINISTRADOR) ? $val_p_user->ID_ADMINISTRADOR : '';
$VAL_ADMINISTRADOR_NOME				= isset($val_p_user->ADMINISTRADOR_NOME) ? $val_p_user->ADMINISTRADOR_NOME : '';
*/
?>
<?php 
$sql_user = mysqli_query($conexao,"select * from tb_administrador WHERE ADMINISTRADOR_STATUS = '1' AND ADMINISTRADOR_TIPO = '6' ORDER BY ADMINISTRADOR_NOME ASC");
while($val_user = mysqli_fetch_object($sql_user)):  

$VAL_ID_ADMINISTRADOR	= isset($val_user->ID_ADMINISTRADOR) ? $val_user->ID_ADMINISTRADOR : '';
$VAL_ADMINISTRADOR_NOME	= isset($val_user->ADMINISTRADOR_NOME) ? $val_user->ADMINISTRADOR_NOME : '';
?>
<option value="<?php echo $VAL_ID_ADMINISTRADOR; ?>"> <?php echo $VAL_ADMINISTRADOR_NOME; ?> </option>
<?php
 endwhile;
?>
</select>
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Marcar todos:</label>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type=checkbox id="selall" onClick="CheckAll()">
</div>

</div>
<br>


            <!-- /.box-header -->

<div class="box-body">
<table id="example2" class="table table-bordered table-hover">
<thead>
<tr>
<th width="40"><div align="center">ID</div></th>
<th>NOME</th>
<!--
<th><div align="center">STATUS</div></th>
-->
<th width="100"><div align="center">DATA ENT.</div></th>
<th width="100"><div align="center">DATA ULT.</div></th>
<th width="150"><div align="center">JUR&Iacute;DICO OPERADOR</div></th>
<th width="30"><div align="center">SELECT</div></th>
</tr>
</thead>


<tbody>
<?php

/*
if($USER_TIPO == '4')
$val_user = "LEADS_SUPERVISOR = '$ID_USER' AND ";
else
$val_user = "";


if($val_id_pesquisa > '')
$bd_id_pesquisa = " ID_LEADS = '$val_id_pesquisa' AND ";
else
$bd_id_pesquisa = "";

if($val_status > '')
$bd_status = " LEADS_STATUS = '$val_status' AND ";
else
$bd_status = "";

if($val_operador > '')
$bd_operador = " LEADS_USER = '$val_operador' AND ";
else
$bd_operador = "";


if(($val_id_pesquisa > '') or ($val_status > '') or ($val_operador > ''))
$sql_leads = mysqli_query($conexao,"select * from tb_leads WHERE $bd_id_pesquisa $bd_status $bd_operador LEADS_DISTRIBUIDO = '1' ORDER BY ID_LEADS DESC  ");
else
$sql_leads = mysqli_query($conexao,"select * from tb_leads WHERE ID_LEADS = '0'  ");
//$sql_leads = mysqli_query($conexao,"select * from tb_leads WHERE $val_user LEADS_STATUS = '' AND LEADS_DISTRIBUIDO = '' AND LEADS_DISTRIBUIDO_SUP = '1' LIMIT 500 ");
$cont = 0;
while($val_leads = mysqli_fetch_object($sql_leads)):      

$ID_LEADS		 			= isset($val_leads->ID_LEADS) ? $val_leads->ID_LEADS : '';
$LEADS_USER		 			= isset($val_leads->LEADS_USER) ? $val_leads->LEADS_USER : '';
$LEADS_STATUS		 		= isset($val_leads->LEADS_STATUS) ? $val_leads->LEADS_STATUS : '';
$LEADS_NOME		 			= isset($val_leads->LEADS_NOME) ? $val_leads->LEADS_NOME : '';
$LEADS_PRIORIDADE 			= isset($val_leads->LEADS_PRIORIDADE) ? $val_leads->LEADS_PRIORIDADE : '';
$LEADS_DATA 				= isset($val_leads->LEADS_DATA) ? $val_leads->LEADS_DATA : '';
IF($LEADS_DATA > '')	{
$LEADS_DATA_DIA = substr($LEADS_DATA, 8, 4);
$LEADS_DATA_MES = substr($LEADS_DATA, 5, 2);
$LEADS_DATA_ANO = substr($LEADS_DATA, 0, 4);
$LEADS_DATA = $LEADS_DATA_DIA.'/'.$LEADS_DATA_MES.'/'.$LEADS_DATA_ANO;
}

///////////////////////////////////////////////////////////////////////////////////////
$sql_operador = mysqli_query($conexao,"select * from tb_administrador WHERE ID_ADMINISTRADOR = '$LEADS_USER' ");
$val_operador = mysqli_fetch_object($sql_operador);  
///////////////////////////////////////////////////////
$val_operador 					= isset($val_operador->ADMINISTRADOR_NOME) ? $val_operador->ADMINISTRADOR_NOME : '';


///////////////////////////////////////////////////////////////////////////////////////
$sql_result_hist = mysqli_query($conexao,"select * from tb_leads_hist WHERE LEADS_HIST_LEADS = '$ID_LEADS' ORDER BY ID_LEADS_HIST DESC ");
$val_geral_hist = mysqli_fetch_object($sql_result_hist);  
///////////////////////////////////////////////////////

$ID_LEADS_HIST 					= isset($val_geral_hist->ID_LEADS_HIST) ? $val_geral_hist->ID_LEADS_HIST : '';
$LEADS_HIST_DATA 				= isset($val_geral_hist->LEADS_HIST_DATA) ? $val_geral_hist->LEADS_HIST_DATA : '';	
IF($LEADS_HIST_DATA > '')	{
$LEADS_HIST_DATA_DIA = substr($LEADS_HIST_DATA, 8, 4);
$LEADS_HIST_DATA_MES = substr($LEADS_HIST_DATA, 5, 2);
$LEADS_HIST_DATA_ANO = substr($LEADS_HIST_DATA, 0, 4);
$LEADS_HIST_DATA = $LEADS_HIST_DATA_DIA.'/'.$LEADS_HIST_DATA_MES.'/'.$LEADS_HIST_DATA_ANO;
}	elseif($LEADS_HIST_DATA == '')	{
$LEADS_HIST_DATA = $LEADS_DATA;
}
*/



if($val_id_pesquisa > '')
$bd_id_pesquisa = " LEADS_JURIDICO_LEADS = '$val_id_pesquisa' ";
else
$bd_id_pesquisa = "";

if($val_operador > '')
$bd_operador = " LEADS_JURIDICO_USER = '$val_operador' ";
else
$bd_operador = "";


if(($val_id_pesquisa > '') or ($val_operador > ''))
$sql_leads = mysqli_query($conexao,"select * from tb_leads_juridico WHERE $bd_id_pesquisa $bd_operador ORDER BY ID_LEADS_JURIDICO DESC ");
else
$sql_leads = mysqli_query($conexao,"select * from tb_leads_juridico WHERE ID_LEADS_JURIDICO = '0' ");
//$sql_leads = mysqli_query($conexao,"select * from tb_leads_juridico WHERE LEADS_JURIDICO_STATUS = '' ORDER BY ID_LEADS_JURIDICO DESC LIMIT 800 ");
$cont = 0;
while($val_leads = mysqli_fetch_object($sql_leads)):      

$ID_LEADS_JURIDICO		 		= isset($val_leads->ID_LEADS_JURIDICO) ? $val_leads->ID_LEADS_JURIDICO : '';
$LEADS_JURIDICO_USER	 		= isset($val_leads->LEADS_JURIDICO_USER) ? $val_leads->LEADS_JURIDICO_USER : '';
$LEADS_JURIDICO_STATUS		 	= isset($val_leads->LEADS_JURIDICO_STATUS) ? $val_leads->LEADS_JURIDICO_STATUS : '';
$LEADS_JURIDICO_LEADS			= isset($val_leads->LEADS_JURIDICO_LEADS) ? $val_leads->LEADS_JURIDICO_LEADS : '';
$LEADS_JURIDICO_ENVIO_USER		= isset($val_leads->LEADS_JURIDICO_ENVIO_USER) ? $val_leads->LEADS_JURIDICO_ENVIO_USER : '';

$LEADS_JURIDICO_ENVIO_DATA		= isset($val_leads->LEADS_JURIDICO_ENVIO_DATA) ? $val_leads->LEADS_JURIDICO_ENVIO_DATA : '';
$LEADS_JURIDICO_ENVIO_DATA_DIA = substr($LEADS_JURIDICO_ENVIO_DATA, 8, 4);
$LEADS_JURIDICO_ENVIO_DATA_MES = substr($LEADS_JURIDICO_ENVIO_DATA, 5, 2);
$LEADS_JURIDICO_ENVIO_DATA_ANO = substr($LEADS_JURIDICO_ENVIO_DATA, 0, 4);
$LEADS_JURIDICO_ENVIO_DATA = $LEADS_JURIDICO_ENVIO_DATA_DIA.'/'.$LEADS_JURIDICO_ENVIO_DATA_MES.'/'.$LEADS_JURIDICO_ENVIO_DATA_ANO;

$LEADS_JURIDICO_FATURAMENTO			= isset($val_leads->LEADS_JURIDICO_FATURAMENTO) ? $val_leads->LEADS_JURIDICO_FATURAMENTO : '';

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sql_leads_val = mysqli_query($conexao,"select * from tb_leads WHERE ID_LEADS = '$LEADS_JURIDICO_LEADS' ");
$val_leads_val = mysqli_fetch_object($sql_leads_val);  
///////////////////////////////////////////////////////
$ID_LEADS		 		= isset($val_leads_val->ID_LEADS) ? $val_leads_val->ID_LEADS : '';
$LEADS_USER		 		= isset($val_leads_val->LEADS_USER) ? $val_leads_val->LEADS_USER : '';
$LEADS_STATUS		 	= isset($val_leads_val->LEADS_STATUS) ? $val_leads_val->LEADS_STATUS : '';
$LEADS_DATA		 		= isset($val_leads_val->LEADS_DATA) ? $val_leads_val->LEADS_DATA : '';
$LEADS_NOME		 		= isset($val_leads_val->LEADS_NOME) ? $val_leads_val->LEADS_NOME : '';


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sql_leads_val = mysqli_query($conexao,"select * from tb_ficha_intermediacao WHERE FICHA_INTER_LEADS = '$LEADS_JURIDICO_LEADS' ");
$val_leads_val = mysqli_fetch_object($sql_leads_val);  
///////////////////////////////////////////////////////
$ID_FICHA_INTER 			= isset($val_leads_val->ID_FICHA_INTER) ? $val_leads_val->ID_FICHA_INTER : '';
$FICHA_INTER_TIPO			= isset($val_leads_val->FICHA_INTER_TIPO) ? $val_leads_val->FICHA_INTER_TIPO : '';
$FICHA_INTER_DATA			= isset($val_leads_val->FICHA_INTER_DATA) ? $val_leads_val->FICHA_INTER_DATA : '';
$FICHA_INTER_DATA_DIA = substr($FICHA_INTER_DATA, 8, 4);
$FICHA_INTER_DATA_MES = substr($FICHA_INTER_DATA, 5, 2);
$FICHA_INTER_DATA_ANO = substr($FICHA_INTER_DATA, 0, 4);
$FICHA_INTER_DATA = $FICHA_INTER_DATA_DIA.'/'.$FICHA_INTER_DATA_MES.'/'.$FICHA_INTER_DATA_ANO;


$FICHA_INTER_CLIENTE		= isset($val_leads_val->FICHA_INTER_CLIENTE) ? $val_leads_val->FICHA_INTER_CLIENTE : '';


//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sql_clientes = mysqli_query($conexao,"select * from tb_clientes WHERE ID_CLIENTE = '$FICHA_INTER_CLIENTE' ");
$val_clientes = mysqli_fetch_object($sql_clientes);  
///////////////////////////////////////////////////////

$val_id_cliente 				= isset($val_clientes->ID_CLIENTE) ? $val_clientes->ID_CLIENTE : '';
$val_cliente_status 			= isset($val_clientes->CLIENTE_STATUS) ? $val_clientes->CLIENTE_STATUS : '';
$val_cliente_nome 				= isset($val_clientes->CLIENTE_NOME) ? $val_clientes->CLIENTE_NOME : '';

if($val_cliente_nome > '')
$LEADS_NOME = $val_cliente_nome;
?>

<td><div align="center"><?php echo $ID_LEADS; ?></div></td>
<td><?php echo utf8_encode($LEADS_NOME); ?> </td>
<td><div align='center'><?php echo $FICHA_INTER_DATA; ?></div></td>
<td><div align='center'><?php echo $LEADS_JURIDICO_ENVIO_DATA; ?></div></td>
<td><div align='center'>
<?php 
$sql_operador = mysqli_query($conexao,"select * from tb_administrador WHERE ID_ADMINISTRADOR = '$LEADS_JURIDICO_USER' ");
$val_operador = mysqli_fetch_object($sql_operador);  
///////////////////////////////////////////////////////
echo $VAL_OPERADOR 	= isset($val_operador->ADMINISTRADOR_NOME) ? $val_operador->ADMINISTRADOR_NOME : '';
?>
</div></td>
<td><p align="center">
<?php //echo $cont; ?>
<input name="ID_LEADS[<?php echo $cont; ?>]" type="checkbox" id="ID_LEADS" value="<?php echo $ID_LEADS ; ?>" />
<label for="ENVIA_EMAIL"></label>
</p></td>
</tr>
<?php
	$cont++;

 endwhile;
?>
</tbody>
</table>




<div align="center">
<input type="submit" class="btn btn-success" value="ENVIAR LEADS" />
</div>
<br>
<br>
            </div>
           <!-- /.box-body -->
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
  <!-- /.content-wrapper -->


<!-- RODAPÉ -->
<?php
include "rodape.php";
?>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->


<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
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
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
	  'order'		: [0, 'asc'],
	  'scrollX'		: true,
    })
  })
</script>
</body>
</html>
