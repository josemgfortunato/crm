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
        Pasta |
        <small>painel de controle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Pasta</a></li>
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
    <td width="78%"><h3 class="box-title">Tabela de Pasta</h3></td>
    <td width="22%">&nbsp;</td>
<td width="5%">&nbsp;&nbsp;</td>
    <td width="22%">&nbsp;</td>
    </tr>
</table>
            </div>
            <!-- /.box-header -->

<div class="box-body">
<table id="example2" class="table table-bordered table-hover">
<thead>
<tr>
<th width="40"><div align="center">ID</div></th>
<th>NOME</th>
<th><div align="center">TIPO DE REVISÃO</div></th>
<th><div align="center">DATA FECHAMENTO</div></th>
<th><div align="center">DATA ENV. OP. ADM</div></th>
<th><div align="center">DATA ENVIO JUR.</div></th>
<th><div align="center">DATA DISTRIBUIDO</div></th>
<th><div align="center">OPERADOR</div></th>
<!--
<th width="30"><div align="center">ALT</div></th>
<th width="30"><div align="center">EXC</div></th>
-->
</tr>
</thead>


<tbody>
<?php
// do { 
//$sql_prospeccao = mysqli_query($conexao,"select * from tb_prospeccao WHERE PROSPECCAO_STATUS = '' or PROSPECCAO_STATUS = '2' LIMIT 500 ");
$sql_leads = mysqli_query($conexao,"select * from tb_leads_juridico WHERE LEADS_JURIDICO_STATUS = '' ORDER BY ID_LEADS_JURIDICO DESC LIMIT 500 ");
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

$LEADS_JURIDICO_DISTRIBUIDO_DATA		= isset($val_leads->LEADS_JURIDICO_DISTRIBUIDO_DATA) ? $val_leads->LEADS_JURIDICO_DISTRIBUIDO_DATA : '';
$LEADS_JURIDICO_DISTRIBUIDO_DATA_DIA = substr($LEADS_JURIDICO_DISTRIBUIDO_DATA, 8, 4);
$LEADS_JURIDICO_DISTRIBUIDO_DATA_MES = substr($LEADS_JURIDICO_DISTRIBUIDO_DATA, 5, 2);
$LEADS_JURIDICO_DISTRIBUIDO_DATA_ANO = substr($LEADS_JURIDICO_DISTRIBUIDO_DATA, 0, 4);
$LEADS_JURIDICO_DISTRIBUIDO_DATA = $LEADS_JURIDICO_DISTRIBUIDO_DATA_DIA.'/'.$LEADS_JURIDICO_DISTRIBUIDO_DATA_MES.'/'.$LEADS_JURIDICO_DISTRIBUIDO_DATA_ANO;

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

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sql_op_adm = mysqli_query($conexao,"select * from tb_leads_op_adm WHERE OP_ADM_LEADS = '$LEADS_JURIDICO_LEADS' ");
$val_op_adm = mysqli_fetch_object($sql_op_adm);  
///////////////////////////////////////////////////////
$ID_OP_ADM		 		= isset($val_op_adm->ID_OP_ADM) ? $val_op_adm->ID_OP_ADM : '';
$OP_ADM_DATA		= isset($val_op_adm->OP_ADM_DATA) ? $val_op_adm->OP_ADM_DATA : '';
$OP_ADM_DATA_DIA = substr($OP_ADM_DATA, 8, 4);
$OP_ADM_DATA_MES = substr($OP_ADM_DATA, 5, 2);
$OP_ADM_DATA_ANO = substr($OP_ADM_DATA, 0, 4);
$OP_ADM_DATA = $OP_ADM_DATA_DIA.'/'.$OP_ADM_DATA_MES.'/'.$OP_ADM_DATA_ANO;


if($LEADS_JURIDICO_USER == '')
$f_color = "bgcolor='##00FF00'";
//elseif(($LEADS_USER == '') and ($LEADS_SUPERVISOR > ''))
//$f_color = "bgcolor='#FFFF00'";
else
$f_color = "bgcolor='##FF0000'";
//$f_color = "";
?>

<td <?php echo $f_color; ?>><div align="center"><?php echo $LEADS_JURIDICO_LEADS; ?></div></td>
<td <?php echo $f_color; ?>><?php echo $LEADS_NOME; ?> </td>
<td <?php echo $f_color; ?>><div align="center"> 
<?php 
if($FICHA_INTER_TIPO == '1')
echo "FINANCIAMENTO PARCELAS EM DIA";
elseif($FICHA_INTER_TIPO == '2')
echo "FINANCIAMENTO PARCELAS EM ATRASO";
elseif($FICHA_INTER_TIPO == '3')
echo "EMPRESTIMO PARCELAS EM DIA";
elseif($FICHA_INTER_TIPO == '4')
echo "EMPRESTIMO PARCELAS EM ATRASO";
elseif($FICHA_INTER_TIPO == '5')
echo "CONTRATOS QUITADOS";
?> </div></td>
<td <?php echo $f_color; ?>><div align="center"> <?php echo $FICHA_INTER_DATA; ?> </div></td>
<td <?php echo $f_color; ?>><div align="center"> <?php echo $OP_ADM_DATA; ?> </div></td>
<td <?php echo $f_color; ?>><div align="center"> <?php echo $LEADS_JURIDICO_ENVIO_DATA; ?> </div></td>
<td <?php echo $f_color; ?>><div align="center"> <?php echo $LEADS_JURIDICO_DISTRIBUIDO_DATA; ?> </div></td>
<td <?php echo $f_color; ?>><div align="center">
<?php 
$sql_operador = mysqli_query($conexao,"select * from tb_administrador WHERE ID_ADMINISTRADOR = '$LEADS_JURIDICO_USER' ");
$val_operador = mysqli_fetch_object($sql_operador);  
///////////////////////////////////////////////////////
echo $VAL_OPERADOR 	= isset($val_operador->ADMINISTRADOR_NOME) ? $val_operador->ADMINISTRADOR_NOME : '';
?></div></td>

<!--
<td <?php echo $f_color; ?>><div align="center"><a href="leads.php?ID_LEADS=<?php echo $ID_LEADS; ?>"><i class="fa fa-refresh"></i></a></div></td>
<td <?php echo $f_color; ?>><div align="center"><a href="excluir-leads.php?ID_LEADS=<?php echo $ID_LEADS; ?>"><i class="fa fa-close" style="color:#FF0000"></i></a></div></td>
-->
</tr>
<?php
 endwhile;
?>
</tbody>

<tfoot>
<tr>
<th>&nbsp;</th>
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
