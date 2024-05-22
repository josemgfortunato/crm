<?php
$ID_USER 		= isset($_COOKIE["ID_USER"]) ? $_COOKIE["ID_USER"] : '';
if($ID_USER == ''){	
include "sessao-expirou.php";
}

//include "Connections/conecta_banco.php";
include "valida_cookie_admin.php";
?>
<?php

$ID_ADMINISTRADOR = isset($_GET['ID_ADMINISTRADOR']) ? $_GET['ID_ADMINISTRADOR'] : '';

///////////////////////////////////////////////////////
$sql_result = mysqli_query($conexao,"select * from tb_administrador WHERE ID_ADMINISTRADOR = '$ID_ADMINISTRADOR' ");
$val_geral = mysqli_fetch_object($sql_result);  
///////////////////////////////////////////////////////
$ID_ADMINISTRADOR 					= isset($val_geral->ID_ADMINISTRADOR) ? $val_geral->ID_ADMINISTRADOR : '';
$ADMINISTRADOR_STATUS 				= isset($val_geral->ADMINISTRADOR_STATUS) ? $val_geral->ADMINISTRADOR_STATUS : '';	
$ADMINISTRADOR_TIPO 				= isset($val_geral->ADMINISTRADOR_TIPO) ? $val_geral->ADMINISTRADOR_TIPO : '';	
$PRINT_ADMINISTRADOR_NOME					= isset($val_geral->ADMINISTRADOR_NOME) ? $val_geral->ADMINISTRADOR_NOME : '';	

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$ID_SUPERVISOR_USER = isset($_GET['ID_SUPERVISOR_USER']) ? $_GET['ID_SUPERVISOR_USER'] : '';

///////////////////////////////////////////////////////
$sql_sup_user = mysqli_query($conexao,"select * from tb_supervisor_user WHERE ID_SUPERVISOR_USER = '$ID_SUPERVISOR_USER' ");
$val_sup_user = mysqli_fetch_object($sql_sup_user);  
///////////////////////////////////////////////////////
$ID_SUPERVISOR_USER 				= isset($val_sup_user->ID_SUPERVISOR_USER) ? $val_sup_user->ID_SUPERVISOR_USER : '';
$SUPERVISOR_USER_STATUS 			= isset($val_sup_user->SUPERVISOR_USER_STATUS) ? $val_sup_user->SUPERVISOR_USER_STATUS : '';	
$SUPERVISOR_USER_SUPERVISOR			= isset($val_sup_user->SUPERVISOR_USER_SUPERVISOR) ? $val_sup_user->SUPERVISOR_USER_SUPERVISOR : '';	
$SUPERVISOR_USER_OPERADOR			= isset($val_sup_user->SUPERVISOR_USER_OPERADOR) ? $val_sup_user->SUPERVISOR_USER_OPERADOR : '';	
$SUPERVISOR_USER_EQUIPE				= isset($val_sup_user->SUPERVISOR_USER_EQUIPE) ? $val_sup_user->SUPERVISOR_USER_EQUIPE : '';	

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
        Supervisor - Operador |
        <small>painel de controle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Supervisor - Operador</a></li>
      </ol>
    </section>
<br>
  <!-- Main content -->




    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              
            <h3 class="box-title">
              <strong><?php 
			  if($ID_SUPERVISOR_USER == '')
			  echo "INCLUIR - "; 
			  elseif($ID_SUPERVISOR_USER > '')
			  echo "ALTERAR - "; 
			  ?></strong>
               Operadores para o Supervisor</h3>
            </div>




<div class="box-body">
<form 
<?php 
IF($ID_SUPERVISOR_USER == '')
echo "action='supervisor-user-cadastrar-actions.php'"; 
ELSEIF($ID_SUPERVISOR_USER > '')
echo "action='supervisor-user-alterar-actions.php'"; 
?> method='post' name="formulario" >
<input type="hidden" id="ID_SUPERVISOR_USER" name="ID_SUPERVISOR_USER" value="<?php echo $ID_SUPERVISOR_USER; ?>">
<input type="hidden" id="SUPERVISOR_USER_USER" name="SUPERVISOR_USER_USER" value="<?php echo $ID_USER; ?>">
<input type="hidden" id="SUPERVISOR_USER_SUPERVISOR" name="SUPERVISOR_USER_SUPERVISOR" value="<?php echo $ID_ADMINISTRADOR; ?>">
<input type="hidden" id="F_USER_REGISTRO" name="F_USER_REGISTRO" value="<?php echo $USER_NOME; ?>">

<div class="row">
<div class="col-lg-4">
<label for="exampleInputPassword1">Supervisor:</label>
<input type="text" id="F_SUPERVISOR" name="F_SUPERVISOR" class="form-control"  value="<?php echo $PRINT_ADMINISTRADOR_NOME; ?>" readonly>
</div>

<div class="col-lg-4">
<label for="exampleInputPassword1">Operador:</label>
<select id="SUPERVISOR_USER_OPERADOR" name="SUPERVISOR_USER_OPERADOR" class="form-control" required="required" >
<?php 
if($SUPERVISOR_USER_OPERADOR > '')	{
$s_op = mysqli_query($conexao,"select * from tb_administrador WHERE ID_ADMINISTRADOR = '$SUPERVISOR_USER_OPERADOR' ");
$v_op = mysqli_fetch_object($s_op);  

$valida_alt_operador = isset($v_op->ADMINISTRADOR_NOME) ? $v_op->ADMINISTRADOR_NOME : '';
echo "<option value='$SUPERVISOR_USER_OPERADOR'> $valida_alt_operador </option>";
} 
?>
<option value=""></option>
<?php 
$sql_user = mysqli_query($conexao,"select * from tb_administrador WHERE ADMINISTRADOR_STATUS = '1' AND ADMINISTRADOR_TIPO = '4' ORDER BY ADMINISTRADOR_NOME ASC");
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
<label for="exampleInputPassword1">Equipe:</label>
<select id="SUPERVISOR_USER_EQUIPE" name="SUPERVISOR_USER_EQUIPE" class="form-control" required="required"/>
<?php 
if($SUPERVISOR_USER_EQUIPE == '1')
echo "<option value='1'> Equipe 1 </option>";
elseif($SUPERVISOR_USER_EQUIPE == '2')
echo "<option value='2'> Equipe 2 </option>";
elseif($SUPERVISOR_USER_EQUIPE == '3')
echo "<option value='3'> Equipe 3 </option>";
elseif($SUPERVISOR_USER_EQUIPE == '4')
echo "<option value='3'> Equipe 4 </option>";
?>
<option value=""></option>
<option value="1"> Equipe 1 </option>
<option value="2"> Equipe 2 </option>
<option value="3"> Equipe 3 </option>
<option value="4"> Equipe 4 </option>
</select>
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Status:</label>
<select id="SUPERVISOR_USER_STATUS" name="SUPERVISOR_USER_STATUS" class="form-control" required="required"/>
<?php 
if($SUPERVISOR_USER_STATUS == '1')
echo "<option value='1'> Ativo </option>";
elseif($SUPERVISOR_USER_STATUS == '2')
echo "<option value='2'> Inativo </option>";
?>
<option value=""></option>
<option value="1"> Ativo </option>
<option value="2"> Inativo </option>
</select>
</div>

</div>
<br>


<div class="box-footer">
    <button type="submit" class="btn btn-primary">Salvar</button>
  </div>
</form>

            <!-- /.box-header -->
</div>
</div>
<br>
<div class="box box-primary">
<div class="box-header with-border">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="78%"><h3 class="box-title">Tabela de Operadores</h3></td>
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
<br>
<table id="example2" class="table table-bordered table-hover">
<thead>
<tr>
<!--
<th><div align="center">ID</div></th>
-->
<th width="250">OPERADOR</th>
<th><div align="center">E-MAIL</div></th>
<th><div align="center">SUPERVISOR</div></th>
<th><div align="center">EQUIPE</div></th>
<th><div align="center">STATUS</div></th>
<th width="30"><div align="center">ALT</div></th>
<th width="30"><div align="center">EXC</div></th>
</tr>
</thead>


<tbody>
<?php
$sql_sup = mysqli_query($conexao,"select * from tb_supervisor_user WHERE SUPERVISOR_USER_SUPERVISOR = '$ID_ADMINISTRADOR' AND SUPERVISOR_USER_STATUS < '3' ");
while($val_sup = mysqli_fetch_object($sql_sup)):      

$ID_SUPERVISOR_USER		 		= isset($val_sup->ID_SUPERVISOR_USER) ? $val_sup->ID_SUPERVISOR_USER : '';
$SUPERVISOR_USER_USER		 	= isset($val_sup->SUPERVISOR_USER_USER) ? $val_sup->SUPERVISOR_USER_USER : '';
$SUPERVISOR_USER_STATUS		 	= isset($val_sup->SUPERVISOR_USER_STATUS) ? $val_sup->SUPERVISOR_USER_STATUS : '';
$SUPERVISOR_USER_SUPERVISOR		= isset($val_sup->SUPERVISOR_USER_SUPERVISOR) ? $val_sup->SUPERVISOR_USER_SUPERVISOR : '';
$SUPERVISOR_USER_OPERADOR	 	= isset($val_sup->SUPERVISOR_USER_OPERADOR) ? $val_sup->SUPERVISOR_USER_OPERADOR : '';
$SUPERVISOR_USER_EQUIPE	 		= isset($val_sup->SUPERVISOR_USER_EQUIPE) ? $val_sup->SUPERVISOR_USER_EQUIPE : '';


//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sql_operador = mysqli_query($conexao,"select * from tb_administrador WHERE ID_ADMINISTRADOR = '$SUPERVISOR_USER_OPERADOR' ");
$val_operador = mysqli_fetch_object($sql_operador);  

$ID_ADMINISTRADOR		 		= isset($val_sup->ID_ADMINISTRADOR) ? $val_sup->ID_ADMINISTRADOR : '';
$ADMINISTRADOR_STATUS		 	= isset($val_operador->ADMINISTRADOR_STATUS) ? $val_operador->ADMINISTRADOR_STATUS : '';
$ADMINISTRADOR_TIPO		 		= isset($val_operador->ADMINISTRADOR_TIPO) ? $val_operador->ADMINISTRADOR_TIPO : '';
$ADMINISTRADOR_NOME		 		= isset($val_operador->ADMINISTRADOR_NOME) ? $val_operador->ADMINISTRADOR_NOME : '';
$ADMINISTRADOR_EMAIL	 		= isset($val_operador->ADMINISTRADOR_EMAIL) ? $val_operador->ADMINISTRADOR_EMAIL : '';
?>
<!--
<td><div align="center"><?php echo $ID_ADMINISTRADOR; ?></div></td>
-->
<td width="250"><?php echo $ADMINISTRADOR_NOME; ?> </td>
<td><div align="center"><?php echo $ADMINISTRADOR_EMAIL; ?></div></td>
<td><div align="center"><?php echo $PRINT_ADMINISTRADOR_NOME; ?></div></td>
<td><div align="center">
<?php
if($SUPERVISOR_USER_EQUIPE == '1')
echo " Equipe 1 ";
elseif($SUPERVISOR_USER_EQUIPE == '2')
echo " Equipe 2 ";
?></div></td>
<td><div align="center">
<?php 
IF($SUPERVISOR_USER_STATUS == '1')
echo "Ativo";
ELSEIF($SUPERVISOR_USER_STATUS == '2')
echo "Inativo";
?></div></td>
<td><div align="center"><a href="supervisor-user.php?ID_ADMINISTRADOR=<?php echo $SUPERVISOR_USER_SUPERVISOR; ?>&&ID_SUPERVISOR_USER=<?php echo $ID_SUPERVISOR_USER; ?>"><i class="fa fa-refresh"></i></a></div></td>
<td><div align="center"><a href="excluir-supervisor-user.php?ID_ADMINISTRADOR=<?php echo $SUPERVISOR_USER_SUPERVISOR; ?>&&ID_SUPERVISOR_USER=<?php echo $ID_SUPERVISOR_USER; ?>"><i class="fa fa-close" style="color:#FF0000"></i></a></div></td>
</tr>
<?php
 endwhile;
?>
</tbody>
</table>

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
