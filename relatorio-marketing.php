<?php
$ID_USER 		= isset($_COOKIE["ID_USER"]) ? $_COOKIE["ID_USER"] : '';
if($ID_USER == ''){	
include "sessao-expirou.php";
}

//include "Connections/conecta_banco.php";
include "valida_cookie_admin.php";


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



<script src="js/jquery-1.3.2.js" type="text/javascript"></script>
<script src="js/jquery.maskedinput-1.2.2.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
//	$("#CLIENTE_NOME").focus();
// MASCARA 1º 16433122000101
    $("#F_DATA").mask("99/99/9999");    // Máscara para CPF

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
        Marketing Relatórios |
        <small>painel de controle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Marketing Relatórios </a></li>
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
              <strong>RELATÓRIO | LEADS POR MÊS</strong>
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
<option value="">  </option>
<option value="2022"> 2022 </option>
</select>
</div>


</div>
<br>

</div>
<!-- /.box-body -->
<div class="box-footer">
<button type="submit" id="USINAGEM_ENTER" class="btn btn-primary">GERAR RELATÓRIO</button>
</div>
</form>
            
            
            
            
            
<br>            
            
            




<!--
<div class="box box-primary">
<div class="box-header with-border">
<h3 class="box-title">
<strong>RELATÓRIO | USUÁRIO POR DIA</strong>
</h3>
</div>
<form action='relatorio-user.php' method='post' name="formulario" >
<div class="box-body">
<div class="row">
<div class="col-lg-6">
<label for="exampleInputPassword1">Usuários:</label>
<select id="F_USUARIO" name="F_USUARIO" class="form-control" >
<option value="">  </option>
<?php 
$sql_user = mysqli_query($conexao,"select * from tb_administrador WHERE ID_ADMINISTRADOR > '1' AND ADMINISTRADOR_STATUS < '3' AND ADMINISTRADOR_TIPO = '3' ORDER BY ADMINISTRADOR_NOME ASC ");
while($val_user = mysqli_fetch_object($sql_user)):  

$VAL_ID_ADMINISTRADOR		 		= isset($val_user->ID_ADMINISTRADOR) ? $val_user->ID_ADMINISTRADOR : '';
$VAL_ADMINISTRADOR_NOME		 		= isset($val_user->ADMINISTRADOR_NOME) ? $val_user->ADMINISTRADOR_NOME : '';
?>
<option value="<?php echo $VAL_ID_ADMINISTRADOR; ?>"> <?php echo utf8_encode($VAL_ADMINISTRADOR_NOME); ?> </option>
<?php
 endwhile;
?>
</select>
</div>


<div class="col-lg-2">
<label for="exampleInputPassword1">DATA:</label>
<input name="F_DATA" type="text" class="form-control" id="F_DATA" placeholder="insira a data" required>
</div>


</div>
<br>




</div>










<div class="box-footer">
<button type="submit" id="USINAGEM_ENTER" class="btn btn-primary">GERAR RELATÓRIO</button>
</div>
<br>
<br>
</form>            
            
            
            
<br>
-->            
            
            






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
</body>
</html>
