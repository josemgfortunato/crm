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
        Meta |
        <small>painel de controle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Meta</a></li>
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
    <td width="78%"><h3 class="box-title">Tabela de Metas</h3></td>
    <td width="22%">
            <div align="right">
            <form action="meta.php" >
				<button type="submit" class="btn btn-primary">Incluir Meta</button>
               </form> 
               </div> 
       </td>
    </tr>
</table>
            </div>
            <!-- /.box-header -->

<div class="box-body">
<table id="example2" width="100%" class="table table-bordered table-hover">
<thead>
<tr>
<th width="40"><div align="center">ID</div></th>
<th><div align="center">MÊS</div></th>
<th><div align="center">ANO</div></th>
<th><div align="center">META DO MÊS</div></th>
<th><div align="center">META EQUIPE 1</div></th>
<th><div align="center">META OPE. EQUIPE 1</div></th>
<th><div align="center">META EQUIPE 2</div></th>
<th><div align="center">META OPE. EQUIPE 3</div></th>
<th><div align="center">META EQUIPE 3</div></th>
<th><div align="center">META OPE. EQUIPE 3</div></th>
<th><div align="center">STATUS</div></th>
<th width="30"><div align="center">ALT</div></th>
<th width="30"><div align="center">EXC</div></th>
</tr>
</thead>


<tbody>
<?php
// do { 
$sql_meta = mysqli_query($conexao,"select * from tb_metas WHERE META_STATUS < '3' ");
while($val_meta = mysqli_fetch_object($sql_meta)):      


$ID_META		 		= isset($val_meta->ID_META) ? $val_meta->ID_META : '';
$META_STATUS		 	= isset($val_meta->META_STATUS) ? $val_meta->META_STATUS : '';
$META_DATA		 		= isset($val_meta->META_DATA) ? $val_meta->META_DATA : '';
$META_MES			  	= isset($val_meta->META_MES) ? $val_meta->META_MES : '';
$META_ANO		 		= isset($val_meta->META_ANO) ? $val_meta->META_ANO : '';
$META_VALOR		 		= isset($val_meta->META_VALOR) ? $val_meta->META_VALOR : '';
$META_VALOR_EQUIPE1		= isset($val_meta->META_VALOR_EQUIPE1) ? $val_meta->META_VALOR_EQUIPE1 : '';
$META_VALOR_OPERADOR1	= isset($val_meta->META_VALOR_OPERADOR1) ? $val_meta->META_VALOR_OPERADOR1 : '';
$META_VALOR_EQUIPE2		= isset($val_meta->META_VALOR_EQUIPE2) ? $val_meta->META_VALOR_EQUIPE2 : '';
$META_VALOR_OPERADOR2	= isset($val_meta->META_VALOR_OPERADOR2) ? $val_meta->META_VALOR_OPERADOR2 : '';
$META_VALOR_EQUIPE3		= isset($val_meta->META_VALOR_EQUIPE3) ? $val_meta->META_VALOR_EQUIPE3 : '';
$META_VALOR_OPERADOR3	= isset($val_meta->META_VALOR_OPERADOR3) ? $val_meta->META_VALOR_OPERADOR3 : '';
$META_VALOR_EQUIPE4		= isset($val_meta->META_VALOR_EQUIPE4) ? $val_meta->META_VALOR_EQUIPE4 : '';
$META_VALOR_OPERADOR4	= isset($val_meta->META_VALOR_OPERADOR4) ? $val_meta->META_VALOR_OPERADOR4 : '';


if($META_MES == '1')
$VAL_META_MES = 'Janeiro';
elseif($META_MES == '2')
$VAL_META_MES = 'Fevereiro';
elseif($META_MES == '3')
$VAL_META_MES = 'Março';
elseif($META_MES == '4')
$VAL_META_MES = 'Abril';
elseif($META_MES == '5')
$VAL_META_MES = 'Maio';
elseif($META_MES == '6')
$VAL_META_MES = 'Junho';
elseif($META_MES == '7')
$VAL_META_MES = 'Julho';
elseif($META_MES == '8')
$VAL_META_MES = 'Agosto';
elseif($META_MES == '9')
$VAL_META_MES = 'Setembro';
elseif($META_MES == '10')
$VAL_META_MES = 'Outubro';
elseif($META_MES == '11')
$VAL_META_MES = 'Novembro';
elseif($META_MES == '12')
$VAL_META_MES = 'Dezembro';
else
$VAL_META_MES = '';


?>
<tr>
<td><div align="center"><?php echo $ID_META; ?></div></td>
<td><div align="center"><?php echo $VAL_META_MES; ?></div></td>
<td><div align="center"><?php echo $META_ANO; ?></div></td>
<td><div align="center">R$ <?php echo $META_VALOR; ?></div></td>
<td><div align="center">R$ <?php echo $META_VALOR_EQUIPE1; ?></div></td>
<td><div align="center">R$ <?php echo $META_VALOR_OPERADOR1; ?></div></td>
<td><div align="center">R$ <?php echo $META_VALOR_EQUIPE2; ?></div></td>
<td><div align="center">R$ <?php echo $META_VALOR_OPERADOR2; ?></div></td>
<td><div align="center">R$ <?php echo $META_VALOR_EQUIPE3; ?></div></td>
<td><div align="center">R$ <?php echo $META_VALOR_OPERADOR3; ?></div></td>
<td><div align="center">
<?php 
IF($META_STATUS == '1')
echo "Ativo";
ELSEIF($META_STATUS == '2')
echo "Inativo";
?></div></td>
<td><div align="center"><a href="meta.php?ID_META=<?php echo $ID_META; ?>"><i class="fa fa-refresh"></i></a></div></td>
<td><div align="center"><a href="excluir-meta.php?ID_META=<?php echo $ID_META; ?>"><i class="fa fa-close" style="color:#FF0000"></i></a></div></td>
</tr>
<?php
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
