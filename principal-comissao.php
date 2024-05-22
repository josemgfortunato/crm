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
        Comissão |
        <small>painel de controle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Comissão</a></li>
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
    <td width="78%"><h3 class="box-title">Tabela de Comissão</h3></td>
    <td width="22%">
            <div align="right">
            <form action="comissao.php" >
				<button type="submit" class="btn btn-primary">Incluir Comissão</button>
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
<th><div align="center">VALOR VENDA</div></th>
<th><div align="center">%</div></th>
<th><div align="center">COMISSÃO</div></th>
<th><div align="center">STATUS</div></th>
<th width="30"><div align="center">ALT</div></th>
<th width="30"><div align="center">EXC</div></th>
</tr>
</thead>


<tbody>
<?php
$sql_comissao = mysqli_query($conexao,"select * from tb_comissao WHERE COMISSAO_STATUS < '3' ORDER BY COMISSAO_VALOR_VENDIDO ASC");
while($val_comissao = mysqli_fetch_object($sql_comissao)):      


$ID_COMISSAO		 		= isset($val_comissao->ID_COMISSAO) ? $val_comissao->ID_COMISSAO : '';
$COMISSAO_STATUS		 	= isset($val_comissao->COMISSAO_STATUS) ? $val_comissao->COMISSAO_STATUS : '';
$COMISSAO_VALOR_VENDIDO	 	= isset($val_comissao->COMISSAO_VALOR_VENDIDO) ? $val_comissao->COMISSAO_VALOR_VENDIDO : '';
$COMISSAO_PORCENTAGEM	 	= isset($val_comissao->COMISSAO_PORCENTAGEM) ? $val_comissao->COMISSAO_PORCENTAGEM : '';
$COMISSAO_VALOR	 			= isset($val_comissao->COMISSAO_VALOR) ? $val_comissao->COMISSAO_VALOR : '';
?>
<tr>
<td><div align="center">R$ <?php echo $COMISSAO_VALOR_VENDIDO; ?></div></td>
<td><div align="center"><?php echo $COMISSAO_PORCENTAGEM; ?></div></td>
<td><div align="center">R$ <?php echo $COMISSAO_VALOR; ?></div></td>
<td><div align="center">
<?php
if($COMISSAO_STATUS == '1')	{
$val_status = " Ativo ";
$VAL_COR_P = 'green';
}	elseif($COMISSAO_STATUS == '2')	{
$val_status = " Inativo ";
$VAL_COR_P = 'red';
}	else	{ 
$val_status = "";
$VAL_COR_P = '';
}
?> 
<span class="badge bg-<?php echo $VAL_COR_P; ?>"><?php echo $val_status; ?></span>
</div></td>
<td><div align="center"><a href="comissao.php?ID_COMISSAO=<?php echo $ID_COMISSAO; ?>"><i class="fa fa-refresh"></i></a></div></td>
<td><div align="center"><a href="excluir-comissao.php?ID_COMISSAO=<?php echo $ID_COMISSAO; ?>"><i class="fa fa-close" style="color:#FF0000"></i></a></div></td>
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
