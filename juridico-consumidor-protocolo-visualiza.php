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
$val_leads = mysqli_fetch_object($sql_result);  
///////////////////////////////////////////////////////
$ID_LEADS 					= isset($val_leads->ID_LEADS) ? $val_leads->ID_LEADS : '';
$LEADS_USER 				= isset($val_leads->LEADS_USER) ? $val_leads->LEADS_USER : '';	
$LEADS_STATUS 				= isset($val_leads->LEADS_STATUS) ? $val_leads->LEADS_STATUS : '';	
$LEADS_TIPO					= isset($val_leads->LEADS_TIPO) ? $val_leads->LEADS_TIPO : '';	
$LEADS_NOME 				= isset($val_leads->LEADS_NOME) ? $val_leads->LEADS_NOME : '';	

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sql_leads_val = mysqli_query($conexao,"select * from tb_ficha_intermediacao WHERE FICHA_INTER_LEADS = '$ID_LEADS' ");
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

if($val_cliente_nome > '')
$LEADS_NOME = $val_cliente_nome;

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sql_leads_juri_result = mysqli_query($conexao,"select * from tb_leads_juridico WHERE LEADS_JURIDICO_LEADS = '$ID_LEADS' ");
$val_leads_juri = mysqli_fetch_object($sql_leads_juri_result);  
///////////////////////////////////////////////////////
$ID_LEADS_JURIDICO				= isset($val_leads_juri->ID_LEADS_JURIDICO) ? $val_leads_juri->ID_LEADS_JURIDICO : '';
$LEADS_JURIDICO_STATUS			= isset($val_leads_juri->LEADS_JURIDICO_STATUS) ? $val_leads_juri->LEADS_JURIDICO_STATUS : '';
$LEADS_JURIDICO_LEADS			= isset($val_leads_juri->LEADS_JURIDICO_LEADS) ? $val_leads_juri->LEADS_JURIDICO_LEADS : '';
$LEADS_JURIDICO_FATURAMENTO		= isset($val_leads_juri->LEADS_JURIDICO_FATURAMENTO) ? $val_leads_juri->LEADS_JURIDICO_FATURAMENTO : '';
$LEADS_JURIDICO_STATUS_DOC		= isset($val_leads_juri->LEADS_JURIDICO_STATUS_DOC) ? $val_leads_juri->LEADS_JURIDICO_STATUS_DOC : '';

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

$ID_CONSUMIDOR_PROTOCOLO = isset($_GET['ID_CONSUMIDOR_PROTOCOLO']) ? $_GET['ID_CONSUMIDOR_PROTOCOLO'] : '';

///////////////////////////////////////////////////////
$sql_result_consumidor = mysqli_query($conexao,"select * from tb_consumidor_protocolo WHERE ID_CONSUMIDOR_PROTOCOLO = '$ID_CONSUMIDOR_PROTOCOLO' ");
$val_consumidor = mysqli_fetch_object($sql_result_consumidor);  
///////////////////////////////////////////////////////
$ID_CONSUMIDOR_PROTOCOLO 			= isset($val_consumidor->ID_CONSUMIDOR_PROTOCOLO) ? $val_consumidor->ID_CONSUMIDOR_PROTOCOLO : '';
$CONSUMIDOR_PROTOCOLO_USER 			= isset($val_consumidor->CONSUMIDOR_PROTOCOLO_USER) ? $val_consumidor->CONSUMIDOR_PROTOCOLO_USER : '';
$CONSUMIDOR_PROTOCOLO_STATUS		= isset($val_consumidor->CONSUMIDOR_PROTOCOLO_STATUS) ? $val_consumidor->CONSUMIDOR_PROTOCOLO_STATUS : '';
$CONSUMIDOR_PROTOCOLO_TIPO			= isset($val_consumidor->CONSUMIDOR_PROTOCOLO_TIPO) ? $val_consumidor->CONSUMIDOR_PROTOCOLO_TIPO : '';
$CONSUMIDOR_PROTOCOLO_LEADS			= isset($val_consumidor->CONSUMIDOR_PROTOCOLO_LEADS) ? $val_consumidor->CONSUMIDOR_PROTOCOLO_LEADS : '';
//$CONSUMIDOR_PROTOCOLO_DATA			= isset($val_consumidor->CONSUMIDOR_PROTOCOLO_DATA) ? $val_consumidor->CONSUMIDOR_PROTOCOLO_DATA : '';
$CONSUMIDOR_PROTOCOLO_N			= isset($val_consumidor->CONSUMIDOR_PROTOCOLO_N) ? $val_consumidor->CONSUMIDOR_PROTOCOLO_N : '';
$CONSUMIDOR_PROTOCOLO_ARQUIVO		= isset($val_consumidor->CONSUMIDOR_PROTOCOLO_ARQUIVO) ? $val_consumidor->CONSUMIDOR_PROTOCOLO_ARQUIVO : '';
$CONSUMIDOR_PROTOCOLO_OBS 			= isset($val_consumidor->CONSUMIDOR_PROTOCOLO_OBS) ? $val_consumidor->CONSUMIDOR_PROTOCOLO_OBS : '';

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
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

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
        Nº Consumidor
        <small>painel de controle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Nº Consumidor</a></li>
      </ol>
    </section>


<br>



  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">




<div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">
<!--
              <strong><?php 
			  IF($ID_LEADS == '')
			  echo "INCLUIR - "; 
			  ELSEIF($ID_LEADS > '')
			  echo "ALTERAR - "; 
			  ?></strong>
-->
               Nº Consumidor </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->




<div class="box-body">
<div class="row">
<div class="col-lg-4">
<label for="exampleInputEmail1">Nome:</label>
<input type="text" class="form-control" value="<?php echo $LEADS_NOME; ?>" readonly >
</div>

<div class="col-lg-4">
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

<div class="col-lg-2">
<label for="exampleInputPassword1">Tipo Faturamento:</label>
<?php 
if($LEADS_JURIDICO_FATURAMENTO == '1')
$VAL_LEADS_JURIDICO_FATURAMENTO = " À Vista ";
elseif($LEADS_JURIDICO_FATURAMENTO == '2')
$VAL_LEADS_JURIDICO_FATURAMENTO = " Parcelado ";
else
$VAL_LEADS_JURIDICO_FATURAMENTO = " ";
?>
<input type="text" class="form-control" value="<?php echo $VAL_LEADS_JURIDICO_FATURAMENTO; ?>" readonly >
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Status Doc:</label>
<?php 
if($LEADS_JURIDICO_STATUS_DOC == '1')
$VAL_LEADS_JURIDICO_STATUS_DOC = " Doc. OK ";
elseif($LEADS_JURIDICO_STATUS_DOC == '2')
$VAL_LEADS_JURIDICO_STATUS_DOC = " Doc. Pendente ";
else
$VAL_LEADS_JURIDICO_STATUS_DOC = " ";
?>
<input type="text" class="form-control" value="<?php echo $VAL_LEADS_JURIDICO_STATUS_DOC; ?>" readonly >
</div>

</div>
<br>


          </div>
          <!-- /.box -->





<div class="box box-danger">
<div class="box-header with-border">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="78%"><h3 class="box-title"><strong>Nº Consumidor/ Protocolo</strong></h3></td>
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
<th>Nº CONSUMIDOR/ PROTOCOLO</th>
<th width="150"><div align="center">DATA DO PROTOCOLO</div></th>
<th width="30"><div align="center">VIS</div></th>
<!--
<th width="30"><div align="center">ALT</div></th>
<th width="30"><div align="center">EXC</div></th>
-->
</tr>
</thead>

<tbody>
<?php
// do { 
$c = 2;

$sql_c_protocolo = mysqli_query($conexao,"SELECT * FROM tb_consumidor_protocolo WHERE CONSUMIDOR_PROTOCOLO_LEADS = '$ID_LEADS' AND CONSUMIDOR_PROTOCOLO_STATUS < '3' ORDER BY ID_CONSUMIDOR_PROTOCOLO DESC ");
while($val_c_protocolo = mysqli_fetch_object($sql_c_protocolo)):      

$ID_CONSUMIDOR_PROTOCOLO			= isset($val_c_protocolo->ID_CONSUMIDOR_PROTOCOLO) ? $val_c_protocolo->ID_CONSUMIDOR_PROTOCOLO : '';
$CONSUMIDOR_PROTOCOLO_STATUS		= isset($val_c_protocolo->CONSUMIDOR_PROTOCOLO_STATUS) ? $val_c_protocolo->CONSUMIDOR_PROTOCOLO_STATUS : '';
$CONSUMIDOR_PROTOCOLO_TIPO			= isset($val_c_protocolo->CONSUMIDOR_PROTOCOLO_TIPO) ? $val_c_protocolo->CONSUMIDOR_PROTOCOLO_TIPO : '';
$CONSUMIDOR_PROTOCOLO_LEADS			= isset($val_c_protocolo->CONSUMIDOR_PROTOCOLO_LEADS) ? $val_c_protocolo->CONSUMIDOR_PROTOCOLO_LEADS : '';

$CONSUMIDOR_PROTOCOLO_DATA			= isset($val_c_protocolo->CONSUMIDOR_PROTOCOLO_DATA) ? $val_c_protocolo->CONSUMIDOR_PROTOCOLO_DATA : '';
if($CONSUMIDOR_PROTOCOLO_DATA > '')	{
$CONSUMIDOR_PROTOCOLO_DATA_DIA = substr($CONSUMIDOR_PROTOCOLO_DATA, 8, 4);
$CONSUMIDOR_PROTOCOLO_DATA_MES = substr($CONSUMIDOR_PROTOCOLO_DATA, 5, 2);
$CONSUMIDOR_PROTOCOLO_DATA_ANO = substr($CONSUMIDOR_PROTOCOLO_DATA, 0, 4);
$CONSUMIDOR_PROTOCOLO_DATA = $CONSUMIDOR_PROTOCOLO_DATA_DIA.'/'.$CONSUMIDOR_PROTOCOLO_DATA_MES.'/'.$CONSUMIDOR_PROTOCOLO_DATA_ANO;
}

$CONSUMIDOR_PROTOCOLO_N				= isset($val_c_protocolo->CONSUMIDOR_PROTOCOLO_N) ? $val_c_protocolo->CONSUMIDOR_PROTOCOLO_N : '';
$CONSUMIDOR_PROTOCOLO_ARQUIVO		= isset($val_c_protocolo->CONSUMIDOR_PROTOCOLO_ARQUIVO) ? $val_c_protocolo->CONSUMIDOR_PROTOCOLO_ARQUIVO : '';
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////

$index = $c % 2;
$c++;
//$cor = $cores[$index];
$IETM = $c - 2 ;
?>
<tr>
<td ><div align="center"><?php echo $ID_CONSUMIDOR_PROTOCOLO; ?></div></td>
<td >&nbsp;<?php echo $CONSUMIDOR_PROTOCOLO_N; ?></td>
<td ><div align="center"><?php echo $CONSUMIDOR_PROTOCOLO_DATA; ?></div></td>
<td><div align="center"><a href="consumidor-docs/<?php echo $CONSUMIDOR_PROTOCOLO_ARQUIVO; ?>" target="_blank"><i class="fa fa-download" style="color:#006600"></i></a></div></td>
<!--
<td><div align="center"><a href="juridico-consumidor-protocolo.php?ID_LEADS=<?php echo $ID_LEADS; ?>&&ID_CONSUMIDOR_PROTOCOLO=<?php echo $ID_CONSUMIDOR_PROTOCOLO; ?>"><i class="fa fa-refresh"></i></a></div></td>
<td><div align="center"><a href="excluir-consumidor-protocolo.php?ID_LEADS=<?php echo $ID_LEADS; ?>&&ID_CONSUMIDOR_PROTOCOLO=<?php echo $ID_CONSUMIDOR_PROTOCOLO; ?>"><i class="fa fa-close" style="color:#FF0000"></i></a></div></td>
-->
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
</body>
</html>
