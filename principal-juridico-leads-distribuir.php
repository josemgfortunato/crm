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
<script language=javascript>
<!--
cont = 0;
function CheckAll() { 
   for (var i=0;i<document.formulario.elements.length;i++) {
     var x = document.formulario.elements[i];
     if (x.id == 'ID_LEADS') { 
x.checked = document.formulario.selall.checked;
} 
}
if (cont == 0){    
var elem = document.getElementById("checar");
elem.innerHTML = "Desmarcar todos";
cont = 1;
} else {
var elem = document.getElementById("checar");
elem.innerHTML = "Marcar todos";
cont = 0;
}

} 
//-->
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
        Jurídico Supervisor - Distribuir Pasta |
        <small>painel de controle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Jurídico Supervisor - Distribuir Leads</a></li>
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
    <td width="78%"><h3 class="box-title">Tabela Jurídico Supervisor - Distribuição de Pasta</h3></td>
<!--
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
            <form action="#" >
				<button type="submit" class="btn btn-danger">+ Incluir Leads em Massa</button>
               </form> 
               </div> 
       </td>
-->
    </tr>
</table>
            </div>




<div class="box-body">
<form name="formulario" action="juridico-leads-distribui-actions.php" method="GET">
<input type="hidden" id="F_USER_REGISTRO" name="F_USER_REGISTRO" value="<?php echo $USER_NOME; ?>">

<div class="row">
<div class="col-lg-5">
<label for="exampleInputPassword1">Jurídico Operador:</label>
<select id="F_OPERADOR" name="F_OPERADOR" class="form-control" required="required" >
<option value=""></option>
<?php 
$sql_user = mysqli_query($conexao,"select * from tb_administrador WHERE ADMINISTRADOR_STATUS = '1' AND ADMINISTRADOR_TIPO = '6' ORDER BY ADMINISTRADOR_NOME ASC");
while($val_user = mysqli_fetch_object($sql_user)):  

$VAL_ID_ADMINISTRADOR	= isset($val_user->ID_ADMINISTRADOR) ? $val_user->ID_ADMINISTRADOR : '';
$VAL_ADMINISTRADOR_NOME	= isset($val_user->ADMINISTRADOR_NOME) ? $val_user->ADMINISTRADOR_NOME : '';
?>
<option value="<?php echo $VAL_ID_ADMINISTRADOR; ?>"> <?php echo $VAL_ADMINISTRADOR_NOME; ?> </option>
<?php
 endwhile;
?>
</select>
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Marcar todos:</label>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type=checkbox id="selall" onClick="CheckAll()">
</div>

</div>
<br>


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
<th><div align="center">FATURAMENTO</div></th>
<!--
<th><div align="center">OPERADOR</div></th>
-->
<th width="30"><div align="center">SELECT</div></th>
<th width="30"><div align="center">EXC</div></th>
</tr>
</thead>


<tbody>
<?php
// do { 
//$sql_prospeccao = mysqli_query($conexao,"select * from tb_prospeccao WHERE PROSPECCAO_STATUS = '' or PROSPECCAO_STATUS = '2' LIMIT 500 ");
$sql_leads = mysqli_query($conexao,"select * from tb_leads_juridico WHERE LEADS_JURIDICO_STATUS = '' AND LEADS_JURIDICO_DISTRIBUIDO = '' ORDER BY ID_LEADS_JURIDICO ASC ");
$cont = 0;
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

$LEADS_JURIDICO_FATURAMENTO		= isset($val_leads->LEADS_JURIDICO_FATURAMENTO) ? $val_leads->LEADS_JURIDICO_FATURAMENTO : '';
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


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//$sql_operador = mysqli_query($conexao,"select * from tb_administrador WHERE ID_ADMINISTRADOR = '$LEADS_USER' ");
//$val_operador = mysqli_fetch_object($sql_operador);  
///////////////////////////////////////////////////////

//$val_operador 					= isset($val_operador->ADMINISTRADOR_NOME) ? $val_operador->ADMINISTRADOR_NOME : '';
?>

<td><div align="center"><?php echo $LEADS_JURIDICO_LEADS; ?></div></td>
<td><?php echo $LEADS_NOME; ?> </td>
<td><div align="center"> 
<?php 
if($FICHA_INTER_TIPO == '1')
echo "REVISÃO DE CONTRATO - FINANCIAMENTO PARCELAS EM DIA";
elseif($FICHA_INTER_TIPO == '2')
echo "REVISÃO DE CONTRATO - FINANCIAMENTO PARCELAS EM ATRASO";
elseif($FICHA_INTER_TIPO == '3')
echo "REVISÃO DE CONTRATO - EMPRESTIMO PARCELAS EM DIA";
elseif($FICHA_INTER_TIPO == '4')
echo "REVISÃO DE CONTRATO - EMPRESTIMO PARCELAS EM ATRASO";
elseif($FICHA_INTER_TIPO == '5')
echo "REVISÃO DE CONTRATO - CONTRATOS QUITADOS";
?> </div></td>
<td><div align="center"> <?php echo $FICHA_INTER_DATA; ?> </div></td>
<td><div align="center"> <?php echo $OP_ADM_DATA; ?> </div></td>
<td><div align="center"> <?php echo $LEADS_JURIDICO_ENVIO_DATA; ?> </div></td>
<td><div align="center"> 
<?php 
if($LEADS_JURIDICO_FATURAMENTO == '1')
echo " A Vista ";
elseif($LEADS_JURIDICO_FATURAMENTO == '2')
echo " Parcelado ";
 ?> </div></td>
<!--
<td><div align="center"> <?php echo $val_operador; ?> </div></td>
-->
<td><p align="center">
<?php //echo $cont; ?>
<input name="ID_LEADS[<?php echo $cont; ?>]" type="checkbox" id="ID_LEADS" value="<?php echo $ID_LEADS ; ?>" />
<label for="ENVIA_EMAIL"></label>
</p></td>

<td><div align="center"><a href="excluir-pasta.php?ID_LEADS=<?php echo $ID_LEADS; ?>&&ID_LEADS_JURIDICO=<?php echo $ID_LEADS_JURIDICO; ?>"><i class="fa fa-close" style="color:#FF0000"></i></a></div></td>
</tr>
<?php
	$cont++;

 endwhile;
?>
</tbody>
</table>




<div align="center">
<input type="submit" class="btn btn-danger" value="ENVIAR PASTA" />
</div>
<br>
<br>
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
	  'order'		: [0, 'asc'],
	  'scrollX'		: true,
    })
  })
</script>
</body>
</html>
