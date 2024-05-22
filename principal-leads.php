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
        Leads |
        <small>painel de controle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Prospecção</a></li>
      </ol>
    </section>
<br>
  <!-- Main content -->




    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-danger">
            <div class="box-header">
              
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="78%"><h3 class="box-title">Tabela de Leads</h3></td>
    <td width="22%">
            <div align="right">
            <form action="leads.php" >
				<button type="submit" class="btn btn-danger">+ Incluir Leads</button>
               </form> 
               </div> 
       </td>
<td width="5%">&nbsp;&nbsp;</td>
    <td width="22%">
            <div align="right">
            <form action="leads-massa.php" >
				<button type="submit" class="btn btn-danger">+ Incluir Leads em Massa</button>
               </form> 
               </div> 
       </td>
    </tr>
</table>
            </div>
            <!-- /.box-header -->

<div class="box-body">
<table id="example2" class="table table-bordered table-hover">
<thead>
<tr>
<th><div align="center">ID</div></th>
<th>NOME</th>
<th><div align="center">EMAIL</div></th>
<!--
<th><div align="center">TEL - 1</div></th>
<th><div align="center">TEL - 2</div></th>
-->
<th><div align="center">FORNECEDOR</div></th>
<th><div align="center">SUPERVISOR</div></th>
<th><div align="center">OPERADOR</div></th>
<th width="30"><div align="center">ALT</div></th>
<th width="30"><div align="center">EXC</div></th>
</tr>
</thead>


<tbody>
<?php
// do { 
//$sql_prospeccao = mysqli_query($conexao,"select * from tb_prospeccao WHERE PROSPECCAO_STATUS = '' or PROSPECCAO_STATUS = '2' LIMIT 500 ");
$sql_leads = mysqli_query($conexao,"select * from tb_leads WHERE LEADS_STATUS = '' LIMIT 500 ");
while($val_leads = mysqli_fetch_object($sql_leads)):      

$ID_LEADS		 		= isset($val_leads->ID_LEADS) ? $val_leads->ID_LEADS : '';
$LEADS_USER		 		= isset($val_leads->LEADS_USER) ? $val_leads->LEADS_USER : '';
$LEADS_STATUS		 	= isset($val_leads->LEADS_STATUS) ? $val_leads->LEADS_STATUS : '';
$LEADS_FORNECEDOR		= isset($val_leads->LEADS_FORNECEDOR) ? $val_leads->LEADS_FORNECEDOR : '';
$LEADS_DATA		 		= isset($val_leads->LEADS_DATA) ? $val_leads->LEADS_DATA : '';
$LEADS_NOME		 		= isset($val_leads->LEADS_NOME) ? $val_leads->LEADS_NOME : '';
$LEADS_EMAIL		 	= isset($val_leads->LEADS_EMAIL) ? $val_leads->LEADS_EMAIL : '';
$LEADS_TEL1		 		= isset($val_leads->LEADS_TEL1) ? $val_leads->LEADS_TEL1 : '';
$LEADS_TEL2		 		= isset($val_leads->LEADS_TEL2) ? $val_leads->LEADS_TEL2 : '';

$LEADS_SUPERVISOR		= isset($val_leads->LEADS_SUPERVISOR) ? $val_leads->LEADS_SUPERVISOR : '';

if(($LEADS_USER == '') and ($LEADS_SUPERVISOR == ''))
$f_color = "bgcolor='##00FF00'";
elseif(($LEADS_USER == '') and ($LEADS_SUPERVISOR > ''))
$f_color = "bgcolor='#FFFF00'";
else
$f_color = "bgcolor='##FF0000'";
//$f_color = "";
?>

<td <?php echo $f_color; ?>><div align="center"><?php echo $ID_LEADS; ?></div></td>
<td <?php echo $f_color; ?> width="200"><?php echo utf8_encode($LEADS_NOME); ?> </td>
<td <?php echo $f_color; ?>><div align="center"><?php echo $LEADS_EMAIL; ?></div></td>
<!--
<td <?php echo $f_color; ?>><div align="center"><?php echo $LEADS_TEL1; ?></div></td>
<td <?php echo $f_color; ?>><div align="center"><?php echo $LEADS_TEL2; ?></div></td>
-->
<td <?php echo $f_color; ?>><div align="center">
<?php 
if($LEADS_FORNECEDOR == '1')
echo "DANIEL";
elseif($LEADS_FORNECEDOR == '2')
echo "JULIO MKT NOVO";
elseif($LEADS_FORNECEDOR == '3')
echo "SITE";
elseif($LEADS_FORNECEDOR == '4')
echo "GOOGLE";
elseif($LEADS_FORNECEDOR == '5')
echo "INSTAGRAM";
elseif($LEADS_FORNECEDOR == '6')
echo "FACEBOOK";
elseif($LEADS_FORNECEDOR == '7')
echo "INDICAÇÃO";
elseif($LEADS_FORNECEDOR == '8')
echo "OUTROS";
elseif($LEADS_FORNECEDOR == '9')
echo "TIKTOK";
elseif($LEADS_FORNECEDOR == '10')
echo "REPIQUE";
elseif($LEADS_FORNECEDOR == '11')
echo "DISCADOR";
elseif($LEADS_FORNECEDOR == '12')
echo "INFLUENCER";
?></div></td>
<td <?php echo $f_color; ?>><div align="center">
<?php 
$sql_supervisor = mysqli_query($conexao,"select * from tb_administrador WHERE ID_ADMINISTRADOR = '$LEADS_SUPERVISOR' ");
$val_supervisor = mysqli_fetch_object($sql_supervisor);  
///////////////////////////////////////////////////////
echo $VAL_SUPERVISOR 	= isset($val_supervisor->ADMINISTRADOR_NOME) ? $val_supervisor->ADMINISTRADOR_NOME : '';
?></div></td>

<td <?php echo $f_color; ?>><div align="center">
<?php 
$sql_operador = mysqli_query($conexao,"select * from tb_administrador WHERE ID_ADMINISTRADOR = '$LEADS_USER' ");
$val_operador = mysqli_fetch_object($sql_operador);  
///////////////////////////////////////////////////////
echo $VAL_OPERADOR 	= isset($val_operador->ADMINISTRADOR_NOME) ? $val_operador->ADMINISTRADOR_NOME : '';
?></div></td>

<td <?php echo $f_color; ?>><div align="center"><a href="leads.php?ID_LEADS=<?php echo $ID_LEADS; ?>"><i class="fa fa-refresh"></i></a></div></td>
<td <?php echo $f_color; ?>><div align="center"><a href="excluir-leads.php?ID_LEADS=<?php echo $ID_LEADS; ?>"><i class="fa fa-close" style="color:#FF0000"></i></a></div></td>
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
</tr>
</tfoot>
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
      'autoWidth'   : false,
	  'order'		: [0, 'desc'],
	  'scrollX'		: true,
    })
  })
</script>
</body>
</html>
