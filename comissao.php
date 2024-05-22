<?php
$ID_USER 		= isset($_COOKIE["ID_USER"]) ? $_COOKIE["ID_USER"] : '';
if($ID_USER == ''){	
include "sessao-expirou.php";
}

//include "Connections/conecta_banco.php";
include "valida_cookie_admin.php";
?>
<?php

$ID_COMISSAO = isset($_GET['ID_COMISSAO']) ? $_GET['ID_COMISSAO'] : '';

///////////////////////////////////////////////////////
$sql_result = mysqli_query($conexao,"select * from tb_comissao WHERE ID_COMISSAO = '$ID_COMISSAO' ");
$val_comissao = mysqli_fetch_object($sql_result);  
///////////////////////////////////////////////////////

$ID_COMISSAO 				= isset($val_comissao->ID_COMISSAO) ? $val_comissao->ID_COMISSAO : '';
$COMISSAO_USER 				= isset($val_comissao->COMISSAO_USER) ? $val_comissao->COMISSAO_USER : '';
$COMISSAO_STATUS			= isset($val_comissao->COMISSAO_STATUS) ? $val_comissao->COMISSAO_STATUS : '';
$COMISSAO_VALOR_VENDIDO		= isset($val_comissao->COMISSAO_VALOR_VENDIDO) ? $val_comissao->COMISSAO_VALOR_VENDIDO : '';
$COMISSAO_PORCENTAGEM		= isset($val_comissao->COMISSAO_PORCENTAGEM) ? $val_comissao->COMISSAO_PORCENTAGEM : '';
$COMISSAO_VALOR				= isset($val_comissao->COMISSAO_VALOR) ? $val_comissao->COMISSAO_VALOR : '';
$COMISSAO_OBS				= isset($val_comissao->COMISSAO_OBS) ? $val_comissao->COMISSAO_OBS : '';

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

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script src="js/jquery.maskMoney.min.js" type="text/javascript"></script>
<script>
	$(document).ready(function(e) {
		$("#COMISSAO_VALOR_VENDIDO").maskMoney({symbol:"R$",decimal:",",thousands:"."});
		$("#COMISSAO_VALOR").maskMoney({symbol:"R$",decimal:",",thousands:"."});
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
            <div class="box-header with-border">
              <h3 class="box-title">
              <strong><?php 
			  IF($ID_COMISSAO == '')
			  echo "INCLUIR - "; 
			  ELSEIF($ID_COMISSAO > '')
			  echo "ALTERAR - "; 
			  ?></strong>
               Comissão </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
<form 
<?php 
IF($ID_COMISSAO == '')
echo "action='comissao-cadastrar-actions.php'"; 
ELSEIF($ID_COMISSAO > '')
echo "action='comissao-alterar-actions.php'"; 
?> method='post' name="formulario" >
<input type="hidden" id="ID_COMISSAO" name="ID_COMISSAO" value="<?php echo $ID_COMISSAO; ?>">
<input type="hidden" id="COMISSAO_USER" name="COMISSAO_USER" value="<?php echo $ID_USER; ?>">
<input type="hidden" id="F_USER_REGISTRO" name="F_USER_REGISTRO" value="<?php echo $USER_NOME; ?>">

<div class="box-body">
<div class="row">
<div class="col-lg-2">
<label for="exampleInputPassword1">Valor de Venda:</label>
<input type="text" class="form-control" id="COMISSAO_VALOR_VENDIDO" name="COMISSAO_VALOR_VENDIDO" value="<?php echo $COMISSAO_VALOR_VENDIDO; ?>" required>
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">%:</label>
<input type="text" class="form-control" id="COMISSAO_PORCENTAGEM" name="COMISSAO_PORCENTAGEM" value="<?php echo $COMISSAO_PORCENTAGEM; ?>" required>
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Comissão:</label>
<input type="text" class="form-control" id="COMISSAO_VALOR" name="COMISSAO_VALOR" value="<?php echo $COMISSAO_VALOR; ?>" required>
</div>


<div class="col-lg-3">
<label for="exampleInputPassword1">Status:</label>
<select id="COMISSAO_STATUS" name="COMISSAO_STATUS" class="form-control">
<?php 
IF($COMISSAO_STATUS == '1')
echo "<option value='1'> Ativo </option>";
ELSEIF($COMISSAO_STATUS == '2')
echo "<option value='2'> Inativo </option>";
?>
<option value=""></option>
<option value="1"> Ativo </option>
<option value="2"> Inativo </option>
</select>
</div>

</div>
<br>




<div class="form-group">
<label for="exampleInputEmail1">Observações:</label>
<textarea rows="4" class="form-control" id="COMISSAO_OBS" name="COMISSAO_OBS" placeholder="insira a observação"><?php echo $COMISSAO_OBS ; ?></textarea>
</div>




</div>
<!-- /.box-body -->




       
          
          
          
          
          
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Salvar</button>
              </div>
            </form>
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
<!--
<script src="bower_components/jquery/dist/jquery.min.js"></script>
-->
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
