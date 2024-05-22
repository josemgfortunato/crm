<?php
$ID_USER 		= isset($_COOKIE["ID_USER"]) ? $_COOKIE["ID_USER"] : '';
if($ID_USER == ''){	
include "sessao-expirou.php";
}

//include "Connections/conecta_banco.php";
include "valida_cookie_admin.php";



$F_USUARIO 	= isset($_POST["F_USUARIO"]) ? $_POST["F_USUARIO"] : '';

$F_MES 		= isset($_POST["F_MES"]) ? $_POST["F_MES"] : '';
if($F_MES == '1')
$nome_mes = 'JANEIRO';
elseif($F_MES == '2')
$nome_mes = 'FEVEREIRO';
elseif($F_MES == '3')
$nome_mes = 'MARÇO';
elseif($F_MES == '4')
$nome_mes = 'ABRIL';
elseif($F_MES == '5')
$nome_mes = 'MAIO';
elseif($F_MES == '6')
$nome_mes = 'JUNHO';
elseif($F_MES == '7')
$nome_mes = 'JULHO';
elseif($F_MES == '8')
$nome_mes = 'AGOSTO';
elseif($F_MES == '9')
$nome_mes = 'SETEMBRO';
elseif($F_MES == '10')
$nome_mes = 'OUTUBRO';
elseif($F_MES == '11')
$nome_mes = 'NOVEMBRO';
elseif($F_MES == '12')
$nome_mes = 'DEZEMBRO';

$F_ANO 		= isset($_POST["F_ANO"]) ? $_POST["F_ANO"] : '';

$F_DATA		= isset($_POST["F_DATA"]) ? $_POST["F_DATA"] : '';
$VAL_DATA_DIA = substr($F_DATA, 0, 2);
$VAL_DATA_MES = substr($F_DATA, 3, 2);
$VAL_DATA_ANO = substr($F_DATA, 6, 4);
$VAL_DATA = $VAL_DATA_ANO.'/'.$VAL_DATA_MES.'/'.$VAL_DATA_DIA;

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
        Relatórios User |
      <small>painel de controle</small>      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Painel de Controle</li>
      </ol>
    </section>

<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
  </div>
  <!-- /.row -->



<div class="callout callout-danger">

<?php
if(($F_MES > '') and ($F_ANO > ''))	{
?>
<h4>PESQUISA POR MÊS:  <strong>" <?php echo $nome_mes; ?> | <?php echo $F_ANO; ?> "</strong></h4>
<?php
}
if($F_DATA > '')	{
?>
<h4>PESQUISA POR DATA:  <strong>" <?php echo $F_DATA; ?> "</strong></h4>
<?php
}
?>

</div>

<?php
// do {  
//$sql_user = mysqli_query($conexao,"select * from tb_administrador WHERE ID_ADMINISTRADOR > '1' AND ADMINISTRADOR_STATUS < '3' AND ADMINISTRADOR_TIPO = '3' ");
if($F_USUARIO > '')
$val_bd_user = " ID_ADMINISTRADOR = '$F_USUARIO' AND ";
else
$val_bd_user = '';

if($F_MES > '')
$val_bd_mes = " MONTH(LEADS_DISTRIBUIDO_DATA) = '$F_MES' AND ";
else
$val_bd_mes = '';

if($F_ANO > '')
$val_bd_ano = " YEAR(LEADS_DISTRIBUIDO_DATA) = '$F_ANO' AND ";
else
$val_bd_ano;

if($F_DATA > '')
$val_bd_data = " DATE(LEADS_DISTRIBUIDO_DATA) = '$VAL_DATA' AND ";
else
$val_bd_data = '';

$sql_user = mysqli_query($conexao,"select * from tb_administrador WHERE $val_bd_user ID_ADMINISTRADOR > '1' AND ADMINISTRADOR_STATUS < '3' AND ADMINISTRADOR_TIPO = '4' ");
while($val_user = mysqli_fetch_object($sql_user)):      

$ID_ADMINISTRADOR		 		= isset($val_user->ID_ADMINISTRADOR) ? $val_user->ID_ADMINISTRADOR : '';
$ADMINISTRADOR_NOME		 		= isset($val_user->ADMINISTRADOR_NOME) ? $val_user->ADMINISTRADOR_NOME : '';
$ADMINISTRADOR_EMAIL		  	= isset($val_user->ADMINISTRADOR_EMAIL) ? $val_user->ADMINISTRADOR_EMAIL : '';
$ADMINISTRADOR_STATUS	 		= isset($val_user->ADMINISTRADOR_STATUS) ? $val_user->ADMINISTRADOR_STATUS : '';
$ADMINISTRADOR_TIPO		 		= isset($val_user->ADMINISTRADOR_TIPO) ? $val_user->ADMINISTRADOR_TIPO : '';
?>
<div class="callout callout-info">
<h4>OPERADOR:  <strong>" <?php echo $ADMINISTRADOR_NOME; ?> "</strong></h4>
</div>
<div class="row">

<div class="col-lg-3 col-xs-6">
<div class="small-box bg-aqua">
<div class="inner">
<h3>
<?php
$t_leads = mysqli_query($conexao,"select count(*) as total FROM tb_leads WHERE $val_bd_mes $val_bd_ano $val_bd_data LEADS_USER = '$ID_ADMINISTRADOR' ");
$t_leads = mysqli_fetch_array($t_leads);
echo $t_leads = $t_leads[0];
?>
</h3>
<p>Lead's recebidos</p>
</div>
<div class="icon">
<i class="fa fa-table"></i>             
</div>
<a href="principal-leads-relatorio-user.php?val_user=<?php echo $ID_ADMINISTRADOR; ?>&&val_data=<?php echo $F_DATA; ?>&&val_mes=<?php echo $F_MES; ?>&&val_ano=<?php echo $F_ANO; ?> " class="small-box-footer"> saiba mais... </a>
</div>
</div>

<div class="col-lg-3 col-xs-6">
<div class="small-box bg-green">
<div class="inner">
<h3>
<?php
$t_leads1 = mysqli_query($conexao,"select count(*) as total FROM tb_leads WHERE $val_bd_mes $val_bd_ano $val_bd_data LEADS_USER = '$ID_ADMINISTRADOR' AND LEADS_STATUS = '1' ");
$t_leads1 = mysqli_fetch_array($t_leads1);
echo $t_leads1 = $t_leads1[0];
?>
</h3>
<p>Fechado Revisão</p>
</div>
<div class="icon">
<i class="fa fa-clipboard"></i>             
</div>
<a href="principal-leads-relatorio-user.php?val_status=1&&val_user=<?php echo $ID_ADMINISTRADOR; ?>&&val_data=<?php echo $F_DATA; ?>&&val_mes=<?php echo $F_MES; ?>&&val_ano=<?php echo $F_ANO; ?> " class="small-box-footer"> saiba mais... </a>
</div>
</div>



<div class="col-lg-3 col-xs-6">
<div class="small-box bg-red">
<div class="inner">
<h3>
<?php
$t_leads7 = mysqli_query($conexao,"select count(*) as total FROM tb_leads WHERE $val_bd_mes $val_bd_ano $val_bd_data LEADS_USER = '$ID_ADMINISTRADOR' AND LEADS_STATUS = '7' ");
$t_leads7 = mysqli_fetch_array($t_leads7);
echo $t_leads7 = $t_leads7[0];
?>
</h3>
<p>Em Negociação/ Retorno </p>
</div>
<div class="icon">
<i class="fa fa-chain-broken"></i>             
</div>
<a href="principal-leads-relatorio-user.php?val_status=7&&val_user=<?php echo $ID_ADMINISTRADOR; ?>&&val_data=<?php echo $F_DATA; ?>&&val_mes=<?php echo $F_MES; ?>&&val_ano=<?php echo $F_ANO; ?> " class="small-box-footer"> saiba mais... </a>
</div>
</div>



<div class="col-lg-3 col-xs-6">
<div class="small-box bg-yellow">
<div class="inner">
<h3>
<?php
$t_leads6 = mysqli_query($conexao,"select count(*) as total FROM tb_leads WHERE $val_bd_mes $val_bd_ano $val_bd_data LEADS_USER = '$ID_ADMINISTRADOR' AND LEADS_STATUS = '6' ");
$t_leads6 = mysqli_fetch_array($t_leads6);
echo $t_leads6 = $t_leads6[0];
?>
</h3>
<p>Aguardando Dados</p>
</div>
<div class="icon">
<i class="fa fa-phone-square"></i>             
</div>
<a href="principal-leads-relatorio-user.php?val_status=6&&val_user=<?php echo $ID_ADMINISTRADOR; ?>&&val_data=<?php echo $F_DATA; ?>&&val_mes=<?php echo $F_MES; ?>&&val_ano=<?php echo $F_ANO; ?> " class="small-box-footer"> saiba mais... </a>
</div>
</div>

</div>
<br>
<?php
 endwhile;
?>






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
