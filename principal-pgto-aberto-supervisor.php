<?php
$ID_USER 		= isset($_COOKIE["ID_USER"]) ? $_COOKIE["ID_USER"] : '';
if($ID_USER == ''){	
include "sessao-expirou.php";
}


//include "Connections/conecta_banco.php";
include "valida_cookie_admin.php";



$val_status			= isset($_GET['STATUS']) ? $_GET['STATUS'] : '';

/*
$F_CPF		= isset($_GET['PESQUISA_CPF']) ? $_GET['PESQUISA_CPF'] : '';
if($F_CPF > '')	{
$v_cpf = mysqli_query($conexao,"select * from tb_clientes WHERE CLIENTE_CPF = '$F_CPF' ");
$valida_cpf = mysqli_fetch_object($v_cpf);  
$ID_CLIENTE_CPF = isset($valida_cpf->ID_CLIENTE) ? $valida_cpf->ID_CLIENTE : '';
} else	{
$ID_CLIENTE_CPF = '';
}

$F_PLACA		= isset($_GET['PESQUISA_PLACA']) ? $_GET['PESQUISA_PLACA'] : '';
if($F_PLACA > '')	{
$v_placa = mysqli_query($conexao,"select * from tb_veiculos WHERE VEICULO_PLACA = '$F_PLACA' ");
$valida_placa = mysqli_fetch_object($v_placa);  
$ID_VEICULO_PLACA = isset($valida_placa->ID_VEICULO) ? $valida_placa->ID_VEICULO : '';
} else	{
$ID_VEICULO_PLACA = '';
}
*/
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
        Pagamentos em Aberto/ Vencidos |
        <small>painel de controle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Pagamentos em Aberto/ Vencidos</a></li>
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
    <td width="78%"><h3 class="box-title">Tabela de 
<strong>
<?php
//if($val_status == '1')
echo ' - " Pagamentos em Aberto/ Vencido " ';
//elseif($val_status == '7')
//echo ' - " Em Negociação " ';
?></strong>    </h3></td>
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
<th width="20"><div align="center">ID</div></th>
<th width="250">NOME</th>
<!--
<th><div align="center">TEL - 1</div></th>
-->
<th><div align="center">TIPO DE REVISÃO</div></th>
<th><div align="center">DATA PGTO</div></th>
<th><div align="center">VALOR</div></th>
<th width="40"><div align="center">FICHA</div></th>
<th><div align='center'>OPERADOR</div></th>
</tr>
</thead>


<tbody>
<?php

//if($USER_TIPO == '3')
//$val_user = "VALOR_CONTR_USER = '$ID_USER' and ";
//else
$val_user = "";

$sql_pgto_leads = mysqli_query($conexao,"select * from tb_valor_contratacao WHERE $val_user (VALOR_CONTR_STATUS = '2') ORDER BY VALOR_CONTR_DATA_PGTO DESC ");
while($val_pgto_leads = mysqli_fetch_object($sql_pgto_leads)):      

$ID_VALOR_CONTR		 		= isset($val_pgto_leads->ID_VALOR_CONTR) ? $val_pgto_leads->ID_VALOR_CONTR : '';
$VALOR_CONTR_USER			= isset($val_pgto_leads->VALOR_CONTR_USER) ? $val_pgto_leads->VALOR_CONTR_USER : '';
$VALOR_CONTR_STATUS			= isset($val_pgto_leads->VALOR_CONTR_STATUS) ? $val_pgto_leads->VALOR_CONTR_STATUS : '';
$VALOR_CONTR_TIPO			= isset($val_pgto_leads->VALOR_CONTR_TIPO) ? $val_pgto_leads->VALOR_CONTR_TIPO : '';
$VALOR_CONTR_LEADS	 		= isset($val_pgto_leads->VALOR_CONTR_LEADS) ? $val_pgto_leads->VALOR_CONTR_LEADS : '';

$VALOR_CONTR_FICHA			= isset($val_pgto_leads->VALOR_CONTR_FICHA) ? $val_pgto_leads->VALOR_CONTR_FICHA : '';
$VALOR_CONTR_VALOR			= isset($val_pgto_leads->VALOR_CONTR_VALOR) ? $val_pgto_leads->VALOR_CONTR_VALOR : '';
$VALOR_CONTR_QTDE_VEZES		= isset($val_pgto_leads->VALOR_CONTR_QTDE_VEZES) ? $val_pgto_leads->VALOR_CONTR_QTDE_VEZES : '';
$VALOR_CONTR_PARCELA		= isset($val_pgto_leads->VALOR_CONTR_PARCELA) ? $val_pgto_leads->VALOR_CONTR_PARCELA : '';

$VALOR_CONTR_DATA_PGTO		= isset($val_pgto_leads->VALOR_CONTR_DATA_PGTO) ? $val_pgto_leads->VALOR_CONTR_DATA_PGTO : '';
$VALOR_CONTR_DATA_PGTO_DIA = substr($VALOR_CONTR_DATA_PGTO, 8, 4);
$VALOR_CONTR_DATA_PGTO_MES = substr($VALOR_CONTR_DATA_PGTO, 5, 2);
$VALOR_CONTR_DATA_PGTO_ANO = substr($VALOR_CONTR_DATA_PGTO, 0, 4);
$VAL_VALOR_CONTR_DATA_PGTO = $VALOR_CONTR_DATA_PGTO_DIA.'/'.$VALOR_CONTR_DATA_PGTO_MES.'/'.$VALOR_CONTR_DATA_PGTO_ANO;

$VALOR_CONTR_VALOR_PARCELA	= isset($val_pgto_leads->VALOR_CONTR_VALOR_PARCELA) ? $val_pgto_leads->VALOR_CONTR_VALOR_PARCELA : '';


///////////////////////////////////////////////////////
$sql_leads = mysqli_query($conexao,"select * from tb_leads WHERE ID_LEADS = '$VALOR_CONTR_LEADS' ");
$val_leads = mysqli_fetch_object($sql_leads);  
///////////////////////////////////////////////////////
$ID_LEADS 			= isset($val_leads->ID_LEADS) ? $val_leads->ID_LEADS : '';
$LEADS_USER 		= isset($val_leads->LEADS_USER) ? $val_leads->LEADS_USER : '';
$LEADS_NOME 		= isset($val_leads->LEADS_NOME) ? $val_leads->LEADS_NOME : '';


///////////////////////////////////////////////////////
$sql_leads_val = mysqli_query($conexao,"select * from tb_ficha_intermediacao WHERE FICHA_INTER_LEADS = '$VALOR_CONTR_LEADS' ");
$val_leads_val = mysqli_fetch_object($sql_leads_val);  
///////////////////////////////////////////////////////
$ID_FICHA_INTER 			= isset($val_leads_val->ID_FICHA_INTER) ? $val_leads_val->ID_FICHA_INTER : '';
$FICHA_INTER_TIPO			= isset($val_leads_val->FICHA_INTER_TIPO) ? $val_leads_val->FICHA_INTER_TIPO : '';
$FICHA_INTER_DATA			= isset($val_leads_val->FICHA_INTER_DATA) ? $val_leads_val->FICHA_INTER_DATA : '';
if($FICHA_INTER_DATA == '')	{
$FICHA_INTER_DATA = date("d/m/Y");
} else {
$FICHA_INTER_DATA_DIA = substr($FICHA_INTER_DATA, 8, 4);
$FICHA_INTER_DATA_MES = substr($FICHA_INTER_DATA, 5, 2);
$FICHA_INTER_DATA_ANO = substr($FICHA_INTER_DATA, 0, 4);
$FICHA_INTER_DATA = $FICHA_INTER_DATA_DIA.'/'.$FICHA_INTER_DATA_MES.'/'.$FICHA_INTER_DATA_ANO;
}

$FICHA_INTER_CLIENTE		= isset($val_leads_val->FICHA_INTER_CLIENTE) ? $val_leads_val->FICHA_INTER_CLIENTE : '';
///////////////////////////////////////////////////////
///////////////////////////////////////////////////////
///////////////////////////////////////////////////////

//$sql_leads_val = mysqli_query($conexao,"select * from tb_clientes WHERE ID_CLIENTE = '$FICHA_INTER_CLIENTE' ");
//$val_leads_val = mysqli_fetch_object($sql_leads_val);  
///////////////////////////////////////////////////////
//$CLIENTE_NOME 			= isset($val_leads_val->CLIENTE_NOME) ? $val_leads_val->CLIENTE_NOME : '';


$valida_data_atual = date('Y/m/d');

if(strtotime($VALOR_CONTR_DATA_PGTO) <= strtotime($valida_data_atual))
$f_color = " bgcolor='#FF0000' ";
else
$f_color = " bgcolor='#FFFF00' ";

///////////////////////////////////////////////////////////////////////////////////////
$sql_operador = mysqli_query($conexao,"select * from tb_administrador WHERE ID_ADMINISTRADOR = '$LEADS_USER' ");
$val_operador = mysqli_fetch_object($sql_operador);  
///////////////////////////////////////////////////////
$val_operador 					= isset($val_operador->ADMINISTRADOR_NOME) ? $val_operador->ADMINISTRADOR_NOME : '';
?>
<td <?php echo $f_color; ?>><div align="center"><?php echo $VALOR_CONTR_LEADS; ?></div></td>
<td <?php echo $f_color; ?>><?php echo $LEADS_NOME; //$CLIENTE_NOME; ?> </td>
<td <?php echo $f_color; ?>><div align="center"> 
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
<td <?php echo $f_color; ?>><div align="center"> <?php echo $VAL_VALOR_CONTR_DATA_PGTO; ?> </div></td>
<td <?php echo $f_color; ?>><div align="center"> <?php echo $VALOR_CONTR_VALOR_PARCELA; ?> </div></td>
<td <?php echo $f_color; ?>><div align="center"><a href="operador-ficha-intermediacao.php?ID_LEADS=<?php echo $ID_LEADS; ?>"><i class="fa fa-clipboard" style="color:#003300"></i></a></div></td>
<td <?php echo $f_color; ?>><div align="center"> <?php echo $val_operador; ?> </div></td>
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
<?php
if($USER_TIPO == '1')
echo "<th></th>";
?>
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
