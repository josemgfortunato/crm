<?php
$ID_USER 		= isset($_COOKIE["ID_USER"]) ? $_COOKIE["ID_USER"] : '';
if($ID_USER == ''){	
include "sessao-expirou.php";
}


//include "Connections/conecta_banco.php";
include "valida_cookie_admin.php";



$val_status			= isset($_GET['val_status']) ? $_GET['val_status'] : '';

$val_user			= isset($_GET['val_user']) ? $_GET['val_user'] : '';
$op_operador = mysqli_query($conexao,"select * from tb_administrador WHERE ID_ADMINISTRADOR = '$val_user' ");
$opv_operador = mysqli_fetch_object($op_operador);  

$title_operador 	= isset($opv_operador->ADMINISTRADOR_NOME) ? $opv_operador->ADMINISTRADOR_NOME : '';
///////////////////////////////////////////////////////


$val_data			= isset($_GET["val_data"]) ? $_GET["val_data"] : '';
$VAL_DATA_DIA = substr($val_data, 0, 2);
$VAL_DATA_MES = substr($val_data, 3, 2);
$VAL_DATA_ANO = substr($val_data, 6, 4);
$VAL_DATA_FINAL = $VAL_DATA_ANO.'/'.$VAL_DATA_MES.'/'.$VAL_DATA_DIA;

$val_mes			= isset($_GET["val_mes"]) ? $_GET["val_mes"] : '';
$val_ano			= isset($_GET["val_ano"]) ? $_GET["val_ano"] : '';

if($val_mes == '1')
$nome_mes = 'JANEIRO';
elseif($val_mes == '2')
$nome_mes = 'FEVEREIRO';
elseif($val_mes == '3')
$nome_mes = 'MARÇO';
elseif($val_mes == '4')
$nome_mes = 'ABRIL';
elseif($val_mes == '5')
$nome_mes = 'MAIO';
elseif($val_mes == '6')
$nome_mes = 'JUNHO';
elseif($val_mes == '7')
$nome_mes = 'JULHO';
elseif($val_mes == '8')
$nome_mes = 'AGOSTO';
elseif($val_mes == '9')
$nome_mes = 'SETEMBRO';
elseif($val_mes == '10')
$nome_mes = 'OUTUBRO';
elseif($val_mes == '11')
$nome_mes = 'NOVEMBRO';
elseif($val_mes == '12')
$nome_mes = 'DEZEMBRO';
else
$nome_mes = '';

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
        Relatório User |
        <small>painel de controle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Relatório User</a></li>
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
    <td width="78%"><h3 class="box-title">Tabela de Lead's -   

Operador: 
<strong> <?php echo $title_operador; ?></strong> | 

Status: 
<strong>
<?php
if($val_status == '1')
echo " Acordo/ Revisão ";
elseif($val_status == '2')
echo " Não Atende ";
elseif($val_status == '3')
echo " Recado ";
elseif($val_status == '4')
echo " Devolução Carro ";
elseif($val_status == '5')
echo " Recusa/ Ñ tem interesse ";
elseif($val_status == '6')
echo " Follow Up ";
elseif($val_status == '7')
echo " Em Negociação ";
?></strong> | 

Data: 
<strong> <?php echo $val_data; ?></strong> 
<?php
if($val_mes > '')	{
?>
<strong> <?php echo $nome_mes; ?>/<?php echo $val_ano; ?></strong> 
<?php
	}
?>	


</h3></td>
<!--
<td width="22%">
	<div align="right">
	<form action="revisão-prospeccao-incluir.php" >
    <button type="submit" class="btn btn-danger">Incluir Prospecção</button>
   </form> 
   </div> 
   </td>
-->
</tr>
</table>
            </div>
            <!-- /.box-header -->

<div class="box-body">
<table id="example2" class="table table-bordered table-hover">
<thead>
<tr>
<th width="40"><div align="center">ID</div></th>
<th width="300">NOME</th>
<th><div align="center">DATA</div></th>
<th><div align="center">STATUS</div></th>
<th><div align="center">OPERADOR</div></th>
<th width="40"><div align="center">PRIORIDADE</div></th>
<th width="40"><div align="center">ABRIR</div></th>
</tr>
</thead>


<tbody>
<?php

//if($USER_TIPO == '3')
$val_user = "LEADS_USER = '$val_user' and ";
//else
//$val_user = "";
if($val_data > '')
$val_bd_data = " DATE(LEADS_DISTRIBUIDO_DATA) = '$VAL_DATA_FINAL' AND ";
else
$val_bd_data = '';

if($val_mes > '')
$val_bd_mes = " MONTH(LEADS_DISTRIBUIDO_DATA) = '$val_mes' AND ";
else
$val_bd_mes = '';

if($val_ano > '')
$val_bd_ano = " YEAR(LEADS_DISTRIBUIDO_DATA) = '$val_ano' AND ";
else
$val_bd_ano;


if($val_status == '1')	{
$sql_leads = mysqli_query($conexao,"select * from tb_leads WHERE $val_user $val_bd_data $val_bd_mes $val_bd_ano (LEADS_STATUS = '1') ORDER BY LEADS_PRIORIDADE DESC ");
}	elseif($val_status == '6')	{
$sql_leads = mysqli_query($conexao,"select * from tb_leads WHERE $val_user $val_bd_data $val_bd_mes $val_bd_ano (LEADS_STATUS = '6') ORDER BY LEADS_PRIORIDADE DESC ");
}	elseif($val_status == '7')	{
$sql_leads = mysqli_query($conexao,"select * from tb_leads WHERE $val_user $val_bd_data $val_bd_mes $val_bd_ano (LEADS_STATUS = '7') ORDER BY LEADS_PRIORIDADE DESC ");
}	else	{
$sql_leads = mysqli_query($conexao,"select * from tb_leads WHERE $val_user $val_bd_data $val_bd_mes $val_bd_ano (LEADS_DISTRIBUIDO > '' ) ORDER BY LEADS_PRIORIDADE DESC LIMIT 500 ");
//$sql_leads = mysqli_query($conexao,"select * from tb_leads WHERE $val_user $val_bd_data $val_bd_mes $val_bd_ano (LEADS_STATUS = '' OR LEADS_STATUS = '2' OR LEADS_STATUS = '3') ORDER BY LEADS_PRIORIDADE DESC LIMIT 500 ");
}
//$sql_leads = mysqli_query($conexao,"select * from tb_leads WHERE LEADS_USER = '$ID_USER' ORDER BY LEADS_PRIORIDADE DESC LIMIT 500 ");
while($val_leads = mysqli_fetch_object($sql_leads)):      

$ID_LEADS		 			= isset($val_leads->ID_LEADS) ? $val_leads->ID_LEADS : '';
$LEADS_USER	 				= isset($val_leads->LEADS_USER) ? $val_leads->LEADS_USER : '';
$LEADS_STATUS	 			= isset($val_leads->LEADS_STATUS) ? $val_leads->LEADS_STATUS : '';
$LEADS_TIPO	 				= isset($val_leads->LEADS_TIPO) ? $val_leads->LEADS_TIPO : '';
$LEADS_FORNECEDOR	 		= isset($val_leads->LEADS_FORNECEDOR) ? $val_leads->LEADS_FORNECEDOR : '';

$LEADS_PRIORIDADE			= isset($val_leads->LEADS_PRIORIDADE) ? $val_leads->LEADS_PRIORIDADE : '';
$LEADS_DISTRIBUIDO_DATA		= isset($val_leads->LEADS_DISTRIBUIDO_DATA) ? $val_leads->LEADS_DISTRIBUIDO_DATA : '';
IF($LEADS_DISTRIBUIDO_DATA > '')	{
$LEADS_DISTRIBUIDO_DATA_DIA = substr($LEADS_DISTRIBUIDO_DATA, 8, 4);
$LEADS_DISTRIBUIDO_DATA_MES = substr($LEADS_DISTRIBUIDO_DATA, 5, 2);
$LEADS_DISTRIBUIDO_DATA_ANO = substr($LEADS_DISTRIBUIDO_DATA, 0, 4);
$LEADS_DISTRIBUIDO_DATA = $LEADS_DISTRIBUIDO_DATA_DIA.'/'.$LEADS_DISTRIBUIDO_DATA_MES.'/'.$LEADS_DISTRIBUIDO_DATA_ANO;
}

$LEADS_DATA					= isset($val_leads->LEADS_DATA) ? $val_leads->LEADS_DATA : '';
$LEADS_NOME					= isset($val_leads->LEADS_NOME) ? $val_leads->LEADS_NOME : '';
$LEADS_EMAIL				= isset($val_leads->LEADS_EMAIL) ? $val_leads->LEADS_EMAIL : '';
$LEADS_TEL1					= isset($val_leads->LEADS_TEL1) ? $val_leads->LEADS_TEL1 : '';
$LEADS_TEL2					= isset($val_leads->LEADS_TEL2) ? $val_leads->LEADS_TEL2 : '';
?>

<td><div align="center"><?php echo $ID_LEADS; ?></div></td>
<td><?php echo $LEADS_NOME; ?> </td>
<td><div align="center"><?php echo $LEADS_DISTRIBUIDO_DATA; ?></div></td>
<td><div align="center">
<?php 
if($LEADS_STATUS == '1')
echo " Acordo/ Revisão ";
elseif($LEADS_STATUS == '2')
echo " Não Atende ";
elseif($LEADS_STATUS == '3')
echo " Recado ";
elseif($LEADS_STATUS == '4')
echo " Devolução Carro ";
elseif($LEADS_STATUS == '5')
echo " Recusa/ Ñ tem interesse ";
elseif($LEADS_STATUS == '6')
echo " Follow Up ";
elseif($LEADS_STATUS == '7')
echo " Em Negociação ";
?>
</div></td>
<td><div align="center">
<?php 

$sql_operador = mysqli_query($conexao,"select * from tb_administrador WHERE ID_ADMINISTRADOR = '$LEADS_USER' ");
$val_operador = mysqli_fetch_object($sql_operador);  
///////////////////////////////////////////////////////
echo $val_operador 	= isset($val_operador->ADMINISTRADOR_NOME) ? $val_operador->ADMINISTRADOR_NOME : '';
?>
</div></td>
<td><div align="center"><?php echo $LEADS_PRIORIDADE; ?></div></td>
<td><div align="center"><a href="leads-operador.php?ID_LEADS=<?php echo $ID_LEADS; ?>"><i class="fa fa-folder-open" style="color:#ff0000"></i></a></div></td>
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
	  'order'		: [4, 'asc'],
	  'scrollX'		: true,
    })
  })
</script>
</body>
</html>
