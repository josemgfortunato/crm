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
        Supervisor |
        <small>painel de controle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Supervisor</a></li>
      </ol>
    </section>


<br>
  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="78%"><h3 class="box-title">Tabela de Supervisores</h3></td>
<!--
    <td width="22%">
            <div align="right">
            <form action="user.php" >
				<button type="submit" class="btn btn-primary">Incluir Usuários</button>
               </form> 
               </div> 
       </td>
-->
    </tr>
</table>
            </div>
            <!-- /.box-header -->

<div class="box-body">
<table id="example2" width="100%" class="table table-bordered table-hover">
<thead>
<tr>
<th width="40"><div align="center">ID</div></th>
<th>NOME</th>
<th>E-MAIL</th>
<th><div align="center">STATUS</div></th>
<th><div align="center">TIPO</div></th>
<th width="100"><div align="center">QTDE. OPERADOR</div></th>
<th width="40"><div align="center">OPE.</div></th>
</tr>
</thead>


<tbody>
<?php
// do { 
$sql_user = mysqli_query($conexao,"select * from tb_administrador WHERE ID_ADMINISTRADOR > '1' AND ADMINISTRADOR_STATUS < '3' AND (ADMINISTRADOR_TIPO = '3' OR ADMINISTRADOR_TIPO = '5') ");
while($val_user = mysqli_fetch_object($sql_user)):      


$ID_ADMINISTRADOR		 		= isset($val_user->ID_ADMINISTRADOR) ? $val_user->ID_ADMINISTRADOR : '';
$ADMINISTRADOR_NOME		 		= isset($val_user->ADMINISTRADOR_NOME) ? $val_user->ADMINISTRADOR_NOME : '';
$ADMINISTRADOR_EMAIL		  	= isset($val_user->ADMINISTRADOR_EMAIL) ? $val_user->ADMINISTRADOR_EMAIL : '';
$ADMINISTRADOR_STATUS	 		= isset($val_user->ADMINISTRADOR_STATUS) ? $val_user->ADMINISTRADOR_STATUS : '';
$ADMINISTRADOR_TIPO		 		= isset($val_user->ADMINISTRADOR_TIPO) ? $val_user->ADMINISTRADOR_TIPO : '';
?>
<tr>
<td><div align="center"><?php echo $ID_ADMINISTRADOR; ?></div></td>
<td><?php echo $ADMINISTRADOR_NOME; ?></td>
<td><?php echo $ADMINISTRADOR_EMAIL; ?></td>
<td><div align="center">
<?php 
IF($ADMINISTRADOR_STATUS == '1')
echo "Ativo";
ELSEIF($ADMINISTRADOR_STATUS == '2')
echo "Inativo";
?></div></td>
<td><div align="center">
<?php 
if($ADMINISTRADOR_TIPO == '1')
echo " Administrador ";
elseif($ADMINISTRADOR_TIPO == '2')
echo " Operador ADM ";
elseif($ADMINISTRADOR_TIPO == '3')
echo " Supervisor ";
elseif($ADMINISTRADOR_TIPO == '4')
echo " Operador ";
elseif($ADMINISTRADOR_TIPO == '5')
echo " Jurídico Supervisor ";
elseif($ADMINISTRADOR_TIPO == '6')
echo " Jurídico Operador ";
elseif($ADMINISTRADOR_TIPO == '7')
echo " Jurídico Laudo ";
elseif($ADMINISTRADOR_TIPO == '8')
echo " Contabilidade ";
elseif($ADMINISTRADOR_TIPO == '9')
echo " Processual ";
?>
</div></td>
<td><div align="center">
<?php 
$t_operador = mysqli_query($conexao,"select count(*) as total FROM tb_supervisor_user WHERE SUPERVISOR_USER_STATUS = '1' AND SUPERVISOR_USER_SUPERVISOR = '$ID_ADMINISTRADOR' ");
$t_operador = mysqli_fetch_array($t_operador);
echo $t_operador = $t_operador[0];
?>
</div></td>
<td><div align="center"><a href="supervisor-user.php?ID_ADMINISTRADOR=<?php echo $ID_ADMINISTRADOR; ?>"><i class="fa fa-sitemap" style="color:#009900"></i></a></div></td>
</tr>
<?php

//	} while($row_Recordset1 = mysql_fetch_assoc($Recordset1));
 endwhile;

?>
</tbody>

<tfoot>
<tr>
<th></th>
<th></th>
<th></th>
<th></th>
<th></th>
<th></th>
<th></th>
</tr>
</tfoot>
<!--
<tfoot>
<tr>
<th>Rendering engine</th>
<th>Browser</th>
<th>Platform(s)</th>
<th>Engine version</th>
<th>CSS grade</th>
</tr>
</tfoot>
-->
</table>
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
      'autoWidth'   : true,
	  'order'		: [0, 'asc'],
	  'scrollX'		: true
    })
  })
</script>
</body>
</html>
