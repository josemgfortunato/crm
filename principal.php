<?php
$ID_USER 		= isset($_COOKIE["ID_USER"]) ? $_COOKIE["ID_USER"] : '';
if($ID_USER == ''){	
include "sessao-expirou.php";
}

//include "Connections/conecta_banco.php";
include "valida_cookie_admin.php";
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
.style5 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
  </style>
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
        AVT Prime Assessoria |
      <small>painel de controle</small>      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Painel de Controle</li>
            <?php
//	include "modal.php";
	?>

      </ol>
    </section>

<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
  </div>
  <!-- /.row -->




<?php
$sql_msg = mysqli_query($conexao,"select * from tb_msg WHERE MSG_STATUS = '1' ");
$val_msg = mysqli_fetch_object($sql_msg);  
///////////////////////////////////////////////////////
$ID_MSG 	= isset($val_msg->ID_MSG) ? $val_msg->ID_MSG : '';
$MSG_TEXTO 	= isset($val_msg->MSG_TEXTO) ? $val_msg->MSG_TEXTO : '';

if($ID_MSG > '')	{
?>
<br>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#999999">
  <tr>
    <td height="30" align="center" bgcolor="#555299"><span class="style5">MENSAGEM DO DIA</span></td>
  </tr>
  <tr>
    <td bgcolor="#ffffff">&nbsp;<?php echo $MSG_TEXTO; ?></td>
    </tr>
</table>
<br>
<?php	}	?>



<?php
if($USER_TIPO == '1')	{
?>
<div class="callout callout-info">
<h4>ADMINISTRADOR</h4>
</div>
<div class="row">


<div class="col-lg-3 col-xs-6">
<div class="small-box bg-aqua">
<div class="inner">
<h3>
<?php
$t_user = mysqli_query($conexao,"select count(*) as total FROM tb_administrador WHERE ADMINISTRADOR_STATUS = '1' ");
$t_user = mysqli_fetch_array($t_user);
echo $t_user = $t_user[0];
?>
</h3>
<p>Usuários</p>
</div>
<div class="icon">
<i class="fa fa-user-secret"></i>             
</div>
<a href="principal-user.php" class="small-box-footer">saiba mais <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>


<!--
<div class="col-lg-3 col-xs-6">
<div class="small-box bg-aqua">
<div class="inner">
<h3>
<?php
$t_cliente = mysqli_query($conexao,"select count(*) as total FROM tb_clientes WHERE CLIENTE_STATUS = '1' ");
$t_cliente = mysqli_fetch_array($t_cliente);
echo $t_cliente = $t_cliente[0];
?>
</h3>
<p>Clientes</p>
</div>
<div class="icon">
<i class="fa fa-users"></i>             
</div>
<a href="#" class="small-box-footer">saiba mais <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>



<div class="col-lg-3 col-xs-6">
<div class="small-box bg-aqua">
<div class="inner">
<h3>
<?php
$t_veiculo = mysqli_query($conexao,"select count(*) as total FROM tb_veiculos WHERE VEICULO_STATUS = '1' ");
$t_veiculo = mysqli_fetch_array($t_veiculo);
echo $t_veiculo = $t_veiculo[0];
?>
</h3>
<p>Veículos</p>
</div>
<div class="icon">
<i class="fa fa-automobile"></i>             
</div>
<a href="#" class="small-box-footer">saiba mais <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>
-->

</div>












<div class="callout callout-danger">
<h4>LEADS</h4>
</div>
<div class="row">


<div class="col-lg-3 col-xs-6">
<div class="small-box bg-red">
<div class="inner">
<h3>
<?php
$t_leads = mysqli_query($conexao,"select count(*) as total FROM tb_leads ");
$t_leads = mysqli_fetch_array($t_leads);
echo $t_leads = $t_leads[0];
?>
</h3>
<p>Total de Lead's</p>
</div>
<div class="icon">
<i class="fa fa-table"></i>             
</div>
</div>
</div>



<div class="col-lg-3 col-xs-6">
<div class="small-box bg-red">
<div class="inner">
<h3>
<?php
$t_leads1 = mysqli_query($conexao,"select count(*) as total FROM tb_leads WHERE LEADS_USER > '' ");
$t_leads1 = mysqli_fetch_array($t_leads1);
echo $t_leads1 = $t_leads1[0];
?>
</h3>
<p>Total de Lead's Distribuidos</p>
</div>
<div class="icon">
<i class="fa fa-table"></i>             
</div>
</div>
</div>



<div class="col-lg-3 col-xs-6">
<div class="small-box bg-red">
<div class="inner">
<h3>
<?php
$t_leads2 = mysqli_query($conexao,"select count(*) as total FROM tb_leads WHERE LEADS_USER = '' AND LEADS_STATUS = '' ");
$t_leads2 = mysqli_fetch_array($t_leads2);
echo $t_leads2 = $t_leads2[0];
?>
</h3>
<p>Total de Lead's para Distribuir</p>
</div>
<div class="icon">
<i class="fa fa-table"></i>             
</div>
</div>
</div>



<div class="col-lg-3 col-xs-6">
<div class="small-box bg-red">
<div class="inner">
<h3>
<?php
$t_leads3 = mysqli_query($conexao,"select count(*) as total FROM tb_leads WHERE LEADS_STATUS = '1' ");
$t_leads3 = mysqli_fetch_array($t_leads3);
echo $t_leads3 = $t_leads3[0];
?>
</h3>
<p>Total de Lead's Convertido</p>
</div>
<div class="icon">
<i class="fa fa-table"></i>             
</div>
</div>
</div>

</div>
<?php	}	?>










<?php
if($USER_TIPO == '2')	{
?>
<div class="callout callout-danger">
<h4>LEADS</h4>
</div>
<div class="row">


<div class="col-lg-3 col-xs-6">
<div class="small-box bg-red">
<div class="inner">
<h3>
<?php
$t_leads = mysqli_query($conexao,"select count(*) as total FROM tb_leads ");
$t_leads = mysqli_fetch_array($t_leads);
echo $t_leads = $t_leads[0];
?>
</h3>
<p>Total de Lead's</p>
</div>
<div class="icon">
<i class="fa fa-table"></i>             
</div>
</div>
</div>



<div class="col-lg-3 col-xs-6">
<div class="small-box bg-red">
<div class="inner">
<h3>
<?php
$t_leads1 = mysqli_query($conexao,"select count(*) as total FROM tb_leads WHERE LEADS_USER > '' ");
$t_leads1 = mysqli_fetch_array($t_leads1);
echo $t_leads1 = $t_leads1[0];
?>
</h3>
<p>Total de Lead's Distribuidos</p>
</div>
<div class="icon">
<i class="fa fa-table"></i>             
</div>
</div>
</div>



<div class="col-lg-3 col-xs-6">
<div class="small-box bg-red">
<div class="inner">
<h3>
<?php
$t_leads2 = mysqli_query($conexao,"select count(*) as total FROM tb_leads WHERE LEADS_USER = '' ");
$t_leads2 = mysqli_fetch_array($t_leads2);
echo $t_leads2 = $t_leads2[0];
?>
</h3>
<p>Total de Lead's para Distribuir</p>
</div>
<div class="icon">
<i class="fa fa-table"></i>             
</div>
</div>
</div>



<!--
<div class="col-lg-3 col-xs-6">
<div class="small-box bg-red">
<div class="inner">
<h3>
<?php
$t_leads3 = mysqli_query($conexao,"select count(*) as total FROM tb_leads WHERE LEADS_STATUS = '1' ");
$t_leads3 = mysqli_fetch_array($t_leads3);
echo $t_leads3 = $t_leads3[0];
?>
</h3>
<p>Total de Lead's Convertido</p>
</div>
<div class="icon">
<i class="fa fa-table"></i>             
</div>
</div>
</div>
-->

</div>
<br>



<div class="callout callout-warning">
<h4>LEADS POR FORNECEDOR</h4>
</div>
<div class="row">


<div class="col-lg-3 col-xs-6">
<div class="small-box bg-yellow">
<div class="inner">
<h3>
<?php
$t_leads = mysqli_query($conexao,"select count(*) as total FROM tb_leads WHERE LEADS_FORNECEDOR = '1' ");
$t_leads = mysqli_fetch_array($t_leads);
echo $t_leads = $t_leads[0];
?>
</h3>
<p>DANIEL</p>
</div>
<div class="icon">
<i class="fa fa-table"></i>             
</div>
</div>
</div>



<div class="col-lg-3 col-xs-6">
<div class="small-box bg-yellow">
<div class="inner">
<h3>
<?php
$t_leads1 = mysqli_query($conexao,"select count(*) as total FROM tb_leads WHERE LEADS_FORNECEDOR = '2' ");
$t_leads1 = mysqli_fetch_array($t_leads1);
echo $t_leads1 = $t_leads1[0];
?>
</h3>
<p>JULIO</p>
</div>
<div class="icon">
<i class="fa fa-table"></i>             
</div>
</div>
</div>



</div>
<?php	}	?>








<?php
///////////////		SUPERVISOR
if($USER_TIPO == '3')	{
?>
<div class="callout callout-info">
<h4>SUPERVISOR</h4>
</div>
<div class="row">

<div class="col-lg-3 col-xs-6">
<div class="small-box bg-aqua">
<div class="inner">
<h3>
<?php
$t_user = mysqli_query($conexao,"select count(*) as total FROM tb_supervisor_user WHERE SUPERVISOR_USER_SUPERVISOR = '$ID_USER' AND SUPERVISOR_USER_STATUS = '1' ");
$t_user = mysqli_fetch_array($t_user);
echo $t_user = $t_user[0];
?>
</h3>
<p>OPERADORES</p>
</div>
<div class="icon">
<i class="fa fa-users"></i>             
</div>
<a href="#" class="small-box-footer">saiba mais <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>

</div>




<div class="callout callout-danger">
<h4>SUPERVISOR | LEADS</h4>
</div>
<div class="row">

<div class="col-lg-3 col-xs-6">
<div class="small-box bg-red">
<div class="inner">
<h3>
<?php
$t_leads = mysqli_query($conexao,"select count(*) as total FROM tb_leads WHERE LEADS_SUPERVISOR = '$ID_USER' ");
$t_leads = mysqli_fetch_array($t_leads);
echo $t_leads = $t_leads[0];
?>
</h3>
<p>Total de Lead's</p>
</div>
<div class="icon">
<i class="fa fa-table"></i>             
</div>
<a href="#" class="small-box-footer">saiba mais <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>


<div class="col-lg-3 col-xs-6">
<div class="small-box bg-red">
<div class="inner">
<h3>
<?php
$t_leads = mysqli_query($conexao,"select count(*) as total FROM tb_leads WHERE LEADS_SUPERVISOR = '$ID_USER' AND LEADS_DISTRIBUIDO = '1' ");
$t_leads = mysqli_fetch_array($t_leads);
echo $t_leads = $t_leads[0];
?>
</h3>
<p>Total de Lead's Distribuidos</p>
</div>
<div class="icon">
<i class="fa fa-table"></i>             
</div>
<a href="#" class="small-box-footer">saiba mais <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>


<div class="col-lg-3 col-xs-6">
<div class="small-box bg-red">
<div class="inner">
<h3>
<?php
$t_leads = mysqli_query($conexao,"select count(*) as total FROM tb_leads WHERE LEADS_SUPERVISOR = '$ID_USER' AND LEADS_DISTRIBUIDO = '' ");
$t_leads = mysqli_fetch_array($t_leads);
echo $t_leads = $t_leads[0];
?>
</h3>
<p>Total de Lead's para Distribuidos</p>
</div>
<div class="icon">
<i class="fa fa-table"></i>             
</div>
<a href="#" class="small-box-footer">saiba mais <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>


<?php	}	?>







<?php
if($USER_TIPO == '4')	{
?>
<div class="callout callout-warning">
<h4>OPERADOR</h4>
</div>
<div class="row">

<div class="col-lg-3 col-xs-6">
<div class="small-box bg-yellow">
<div class="inner">
<h3>
<?php
$t_leads = mysqli_query($conexao,"select count(*) as total FROM tb_leads WHERE LEADS_USER = '$ID_USER' ");
$t_leads = mysqli_fetch_array($t_leads);
echo $t_leads = $t_leads[0];
?>
</h3>
<p>Lead's recebidos</p>
</div>
<div class="icon">
<i class="fa fa-table"></i>             
</div>
<a href="principal-leads-operador.php" class="small-box-footer">saiba mais <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-xs-6">
<div class="small-box bg-yellow">
<div class="inner">
<h3>
<?php
$t_leads1 = mysqli_query($conexao,"select count(*) as total FROM tb_leads WHERE LEADS_USER = '$ID_USER' AND LEADS_STATUS = '1' ");
$t_leads1 = mysqli_fetch_array($t_leads1);
echo $t_leads1 = $t_leads1[0];
?>
</h3>
<p>Acordo/ Revisão</p>
</div>
<div class="icon">
<i class="fa fa-clipboard"></i>             
</div>
<a href="principal-leads-operador-acordo.php" class="small-box-footer">saiba mais <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>



<div class="col-lg-3 col-xs-6">
<div class="small-box bg-yellow">
<div class="inner">
<h3>
<?php
$t_leads7 = mysqli_query($conexao,"select count(*) as total FROM tb_leads WHERE LEADS_USER = '$ID_USER' AND LEADS_STATUS = '7' ");
$t_leads7 = mysqli_fetch_array($t_leads7);
echo $t_leads7 = $t_leads7[0];
?>
</h3>
<p>Em Negociação Up</p>
</div>
<div class="icon">
<i class="fa fa-chain-broken"></i>             
</div>
<a href="principal-leads-operador.php?STATUS=7" class="small-box-footer">saiba mais <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>



<div class="col-lg-3 col-xs-6">
<div class="small-box bg-yellow">
<div class="inner">
<h3>
<?php
$t_leads6 = mysqli_query($conexao,"select count(*) as total FROM tb_leads WHERE LEADS_USER = '$ID_USER' AND LEADS_STATUS = '6' ");
$t_leads6 = mysqli_fetch_array($t_leads6);
echo $t_leads6 = $t_leads6[0];
?>
</h3>
<p>Follow Up</p>
</div>
<div class="icon">
<i class="fa fa-phone-square"></i>             
</div>
<a href="principal-leads-operador-follow-up.php" class="small-box-footer">saiba mais <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>

</div>
<?php	}	?>







<?php
if($USER_TIPO == '5')	{
?>
<div class="callout callout-danger">
<h4>JUR&Iacute;DICO SUPERVISOR</h4>
</div>
<div class="row">

<div class="col-lg-3 col-xs-6">
<div class="small-box bg-red">
<div class="inner">
<h3>
<?php
$t_leads = mysqli_query($conexao,"select count(*) as total FROM tb_leads_juridico ");
$t_leads = mysqli_fetch_array($t_leads);
echo $t_leads = $t_leads[0];
?>
</h3>
<p>Total de Pasta</p>
</div>
<div class="icon">
<i class="fa fa-table"></i>             
</div>
<a href="#" class="small-box-footer">saiba mais <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>


<div class="col-lg-3 col-xs-6">
<div class="small-box bg-red">
<div class="inner">
<h3>
<?php
$t_leads = mysqli_query($conexao,"select count(*) as total FROM tb_leads_juridico WHERE LEADS_JURIDICO_DISTRIBUIDO = '' ");
$t_leads = mysqli_fetch_array($t_leads);
echo $t_leads = $t_leads[0];
?>
</h3>
<p>Total de Pasta para Distribuir</p>
</div>
<div class="icon">
<i class="fa fa-table"></i>             
</div>
<a href="#" class="small-box-footer">saiba mais <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>


<div class="col-lg-3 col-xs-6">
<div class="small-box bg-red">
<div class="inner">
<h3>
<?php
$t_leads = mysqli_query($conexao,"select count(*) as total FROM tb_leads_juridico WHERE LEADS_JURIDICO_DISTRIBUIDO = '1' ");
$t_leads = mysqli_fetch_array($t_leads);
echo $t_leads = $t_leads[0];
?>
</h3>
<p>Total de Pasta Distribuidas</p>
</div>
<div class="icon">
<i class="fa fa-table"></i>             
</div>
<a href="#" class="small-box-footer">saiba mais <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>

<?php	}	?>
























<?php
if($USER_TIPO == '7')	{
?>
<div class="callout callout-danger">
<h4>JUR&Iacute;DICO CONSUMIDOR</h4>
</div>
<div class="row">

<div class="col-lg-3 col-xs-6">
<div class="small-box bg-red">
<div class="inner">
<h3>
<?php
$t_leads = mysqli_query($conexao,"select count(*) as total FROM tb_leads_juridico WHERE LEADS_JURIDICO_STATUS_DOC = '1' AND LEADS_JURIDICO_CONSUMIDOR_ENVIADO = '1' ");
$t_leads = mysqli_fetch_array($t_leads);
echo $t_leads = $t_leads[0];
?>
</h3>
<p>Total de Pasta</p>
</div>
<div class="icon">
<i class="fa fa-table"></i>             
</div>
<a href="#" class="small-box-footer">saiba mais <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>


<div class="col-lg-3 col-xs-6">
<div class="small-box bg-red">
<div class="inner">
<h3>
<?php
$t_leads = mysqli_query($conexao,"select count(*) as total FROM tb_leads_juridico WHERE LEADS_JURIDICO_STATUS_DOC = '1' AND LEADS_JURIDICO_CONSUMIDOR_ENVIADO = '1' AND LEADS_JURIDICO_CONSUMIDOR_RECEBIDO = '' ");
$t_leads = mysqli_fetch_array($t_leads);
echo $t_leads = $t_leads[0];
?>
</h3>
<p>Total de Pasta em aberto</p>
</div>
<div class="icon">
<i class="fa fa-table"></i>             
</div>
<a href="#" class="small-box-footer">saiba mais <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>


<div class="col-lg-3 col-xs-6">
<div class="small-box bg-red">
<div class="inner">
<h3>
<?php
$t_leads = mysqli_query($conexao,"select count(*) as total FROM tb_leads_juridico WHERE LEADS_JURIDICO_STATUS_DOC = '1' AND LEADS_JURIDICO_CONSUMIDOR_ENVIADO = '1' AND LEADS_JURIDICO_CONSUMIDOR_RECEBIDO = '1' ");
$t_leads = mysqli_fetch_array($t_leads);
echo $t_leads = $t_leads[0];
?>
</h3>
<p>Total de Pasta Finalizadas</p>
</div>
<div class="icon">
<i class="fa fa-table"></i>             
</div>
<a href="#" class="small-box-footer">saiba mais <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>

<?php	}	?>
































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
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
