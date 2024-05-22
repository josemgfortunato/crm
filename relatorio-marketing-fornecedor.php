<?php
$ID_USER 		= isset($_COOKIE["ID_USER"]) ? $_COOKIE["ID_USER"] : '';
if($ID_USER == ''){	
include "sessao-expirou.php";
}

//include "Connections/conecta_banco.php";
include "valida_cookie_admin.php";


$F_MES 		= isset($_POST["F_MES"]) ? $_POST["F_MES"] : '';
if($F_MES == '')
$F_MES 	= date('m');

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
if($F_ANO == '')
$F_ANO 	= date('Y');


//if($F_MES > '')
//$val_bd_mes = " MONTH(LEADS_DATA) = '$F_MES' AND ";

//if($F_ANO > '')
//$val_bd_ano = " YEAR(LEADS_DATA) = '$F_ANO' AND ";
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
        MARKETING RELATÓRIO | LEADS POR MÊS - "<?php echo $nome_mes; ?>"
      <small>painel de controle</small>      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Marketing Relatório</li>
      </ol>
    </section>

<br>
  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">




<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">
              <strong>RELATÓRIO DE PAGAMENTOS | USUÁRIO POR MÊS - "<?php echo $nome_mes; ?>"</strong>
              </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

<form action='relatorio-marketing-fornecedor.php' method='post' name="formulario" >


<div class="box-body">
<div class="row">
<div class="col-lg-2">
<label for="exampleInputPassword1">Mês:</label>
<select id="F_MES" name="F_MES" class="form-control" required="required">
<?php
if($F_MES > '')
echo "<option value='$F_MES'> $nome_mes </option>";
?>
<option value="">  </option>
<option value="1"> Janeiro </option>
<option value="2"> Fevereiro </option>
<option value="3"> Março </option>
<option value="4"> Abril </option>
<option value="5"> Maio </option>
<option value="6"> Junho </option>
<option value="7"> Julho </option>
<option value="8"> Agosto </option>
<option value="9"> Setembro </option>
<option value="10"> Outubro </option>
<option value="11"> Novembro </option>
<option value="12"> Dezembro </option>
</select>
</div>


<div class="col-lg-2">
<label for="exampleInputPassword1">Ano:</label>
<select id="F_ANO" name="F_ANO" class="form-control" required="required">
<?php
if($F_ANO > '')
echo "<option value='$F_ANO'> $F_ANO </option>";
?>
<option value="">  </option>
<option value="2022"> 2022 </option>
<option value="2023"> 2023 </option>
</select>
</div>


</div>
<br>

</div>
<div class="box-footer">
<button type="submit" id="USINAGEM_ENTER" class="btn btn-primary">GERAR RELATÓRIO</button>
</div>
</form>
            
            
            
            
<br>            
            
            





<div class="box box-primary">
</div>



<br>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  <tr>
    <td bgcolor="#FFFFFF"><table width="800" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#333333">
      <tr>
        <td height="50" bgcolor="#FFFF00"><strong>&nbsp;FORNECEDOR</strong></td>
        <td bgcolor="#FFFF00"><div align="center"><strong>LEADS ENTRADA</strong></div></td>
        <td bgcolor="#FFFF00"><div align="center"><strong>LEADS CONVERSÃO</strong></div></td>
        <td bgcolor="#FFFF00"><div align="center"><strong>TAXA DE CONVERSÃO %</strong></div></td>
      </tr>
      <tr>
        <td width="200" height="30">&nbsp;DANIEL</td>
        <td width="196"><div align="center">
            <?php
$f_1_entrada = mysqli_query($conexao,"select count(*) as total FROM tb_leads WHERE MONTH(LEADS_DATA) = '$F_MES' AND YEAR(LEADS_DATA) = '$F_ANO' AND LEADS_FORNECEDOR = '1' ");
$f_1_entrada = mysqli_fetch_array($f_1_entrada);
echo $f_1_entrada = $f_1_entrada[0];
?>
        </div></td>
        <td width="196"><div align="center">
            <?php
$f_1_conversao = mysqli_query($conexao,"select count(*) as total FROM tb_leads WHERE MONTH(LEADS_DATA) = '$F_MES' AND YEAR(LEADS_DATA) = '$F_ANO' AND LEADS_FORNECEDOR = '1' AND LEADS_STATUS = '1' ");
$f_1_conversao = mysqli_fetch_array($f_1_conversao);
echo $f_1_conversao = $f_1_conversao[0];
?>
        </div></td>
        <td width="196"><div align="center">
            <?php
$porcentagem_1 = ($f_1_conversao / $f_1_entrada) * 100;
echo round($porcentagem_1, 1);
?>
          % </div></td>
      </tr>
      <tr>
        <td height="30">&nbsp;JULIO MKT NOVO</td>
        <td><div align="center">
            <?php
$f_2_entrada = mysqli_query($conexao,"select count(*) as total FROM tb_leads WHERE MONTH(LEADS_DATA) = '$F_MES' AND YEAR(LEADS_DATA) = '$F_ANO' AND LEADS_FORNECEDOR = '2' ");
$f_2_entrada = mysqli_fetch_array($f_2_entrada);
echo $f_2_entrada = $f_2_entrada[0];
?>
        </div></td>
        <td><div align="center">
            <?php
$f_2_conversao = mysqli_query($conexao,"select count(*) as total FROM tb_leads WHERE MONTH(LEADS_DATA) = '$F_MES' AND YEAR(LEADS_DATA) = '$F_ANO' AND LEADS_FORNECEDOR = '2' AND LEADS_STATUS = '1' ");
$f_2_conversao = mysqli_fetch_array($f_2_conversao);
echo $f_2_conversao = $f_2_conversao[0];
?>
        </div></td>
        <td><div align="center">
            <?php
$porcentagem_2 = ($f_2_conversao / $f_2_entrada) * 100;
echo round($porcentagem_2, 1);
?>
          % </div></td>
      </tr>
      <tr>
        <td height="30">&nbsp;SITE</td>
        <td><div align="center">
            <?php
$f_3_entrada = mysqli_query($conexao,"select count(*) as total FROM tb_leads WHERE MONTH(LEADS_DATA) = '$F_MES' AND YEAR(LEADS_DATA) = '$F_ANO' AND LEADS_FORNECEDOR = '3' ");
$f_3_entrada = mysqli_fetch_array($f_3_entrada);
echo $f_3_entrada = $f_3_entrada[0];
?>
        </div></td>
        <td><div align="center">
            <?php
$f_3_conversao = mysqli_query($conexao,"select count(*) as total FROM tb_leads WHERE MONTH(LEADS_DATA) = '$F_MES' AND YEAR(LEADS_DATA) = '$F_ANO' AND LEADS_FORNECEDOR = '3' AND LEADS_STATUS = '1' ");
$f_3_conversao = mysqli_fetch_array($f_3_conversao);
echo $f_3_conversao = $f_3_conversao[0];
?>
        </div></td>
        <td><div align="center">
            <?php
$porcentagem_3 = ($f_3_conversao / $f_3_entrada) * 100;
echo round($porcentagem_3, 1);
?>
          % </div></td>
      </tr>
      <tr>
        <td height="30">&nbsp;GOOGLE</td>
        <td><div align="center">
            <?php
$f_4_entrada = mysqli_query($conexao,"select count(*) as total FROM tb_leads WHERE MONTH(LEADS_DATA) = '$F_MES' AND YEAR(LEADS_DATA) = '$F_ANO' AND LEADS_FORNECEDOR = '4' ");
$f_4_entrada = mysqli_fetch_array($f_4_entrada);
echo $f_4_entrada = $f_4_entrada[0];
?>
        </div></td>
        <td><div align="center">
            <?php
$f_4_conversao = mysqli_query($conexao,"select count(*) as total FROM tb_leads WHERE MONTH(LEADS_DATA) = '$F_MES' AND YEAR(LEADS_DATA) = '$F_ANO' AND LEADS_FORNECEDOR = '4' AND LEADS_STATUS = '1' ");
$f_4_conversao = mysqli_fetch_array($f_4_conversao);
echo $f_4_conversao = $f_4_conversao[0];
?>
        </div></td>
        <td><div align="center">
            <?php
$porcentagem_4 = ($f_4_conversao / $f_4_entrada) * 100;
echo round($porcentagem_4, 1);
?>
          % </div></td>
      </tr>
      <tr>
        <td height="30">&nbsp;INSTAGRAM</td>
        <td><div align="center">
            <?php
$f_5_entrada = mysqli_query($conexao,"select count(*) as total FROM tb_leads WHERE MONTH(LEADS_DATA) = '$F_MES' AND YEAR(LEADS_DATA) = '$F_ANO' AND LEADS_FORNECEDOR = '5' ");
$f_5_entrada = mysqli_fetch_array($f_5_entrada);
echo $f_5_entrada = $f_5_entrada[0];
?>
        </div></td>
        <td><div align="center">
            <?php
$f_5_conversao = mysqli_query($conexao,"select count(*) as total FROM tb_leads WHERE MONTH(LEADS_DATA) = '$F_MES' AND YEAR(LEADS_DATA) = '$F_ANO' AND LEADS_FORNECEDOR = '5' AND LEADS_STATUS = '1' ");
$f_5_conversao = mysqli_fetch_array($f_5_conversao);
echo $f_5_conversao = $f_5_conversao[0];
?>
        </div></td>
        <td><div align="center">
            <?php
$porcentagem_5 = ($f_5_conversao / $f_5_entrada) * 100;
echo round($porcentagem_5, 1);
?>
          % </div></td>
      </tr>
      <tr>
        <td height="30">&nbsp;FACEBOOK</td>
        <td><div align="center">
            <?php
$f_6_entrada = mysqli_query($conexao,"select count(*) as total FROM tb_leads WHERE MONTH(LEADS_DATA) = '$F_MES' AND YEAR(LEADS_DATA) = '$F_ANO' AND LEADS_FORNECEDOR = '6' ");
$f_6_entrada = mysqli_fetch_array($f_6_entrada);
echo $f_6_entrada = $f_6_entrada[0];
?>
        </div></td>
        <td><div align="center">
            <?php
$f_6_conversao = mysqli_query($conexao,"select count(*) as total FROM tb_leads WHERE MONTH(LEADS_DATA) = '$F_MES' AND YEAR(LEADS_DATA) = '$F_ANO' AND LEADS_FORNECEDOR = '6' AND LEADS_STATUS = '1' ");
$f_6_conversao = mysqli_fetch_array($f_6_conversao);
echo $f_6_conversao = $f_6_conversao[0];
?>
        </div></td>
        <td><div align="center">
            <?php
$porcentagem_6 = ($f_6_conversao / $f_6_entrada) * 100;
echo round($porcentagem_6, 1);
?>
          % </div></td>
      </tr>
      <tr>
        <td height="30">&nbsp;INDICAÇÃO</td>
        <td><div align="center">
            <?php
$f_7_entrada = mysqli_query($conexao,"select count(*) as total FROM tb_leads WHERE MONTH(LEADS_DATA) = '$F_MES' AND YEAR(LEADS_DATA) = '$F_ANO' AND LEADS_FORNECEDOR = '7' ");
$f_7_entrada = mysqli_fetch_array($f_7_entrada);
echo $f_7_entrada = $f_7_entrada[0];
?>
        </div></td>
        <td><div align="center">
            <?php
$f_7_conversao = mysqli_query($conexao,"select count(*) as total FROM tb_leads WHERE MONTH(LEADS_DATA) = '$F_MES' AND YEAR(LEADS_DATA) = '$F_ANO' AND LEADS_FORNECEDOR = '7' AND LEADS_STATUS = '1' ");
$f_7_conversao = mysqli_fetch_array($f_7_conversao);
echo $f_7_conversao = $f_7_conversao[0];
?>
        </div></td>
        <td><div align="center">
            <?php
$porcentagem_7 = ($f_7_conversao / $f_7_entrada) * 100;
echo round($porcentagem_7, 1);
?>
          % </div></td>
      </tr>
      <tr>
        <td height="30">&nbsp;OUTROS</td>
        <td><div align="center">
            <?php
$f_8_entrada = mysqli_query($conexao,"select count(*) as total FROM tb_leads WHERE MONTH(LEADS_DATA) = '$F_MES' AND YEAR(LEADS_DATA) = '$F_ANO' AND LEADS_FORNECEDOR = '8' ");
$f_8_entrada = mysqli_fetch_array($f_8_entrada);
echo $f_8_entrada = $f_8_entrada[0];
?>
        </div></td>
        <td><div align="center">
            <?php
$f_8_conversao = mysqli_query($conexao,"select count(*) as total FROM tb_leads WHERE MONTH(LEADS_DATA) = '$F_MES' AND YEAR(LEADS_DATA) = '$F_ANO' AND LEADS_FORNECEDOR = '8' AND LEADS_STATUS = '1' ");
$f_8_conversao = mysqli_fetch_array($f_8_conversao);
echo $f_8_conversao = $f_8_conversao[0];
?>
        </div></td>
        <td><div align="center">
            <?php
$porcentagem_8 = ($f_8_conversao / $f_8_entrada) * 100;
echo round($porcentagem_8, 1);
?>
          % </div></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
</table>

















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
