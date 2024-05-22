<?php
$ID_USER 		= isset($_COOKIE["ID_USER"]) ? $_COOKIE["ID_USER"] : '';
if($ID_USER == ''){	
include "sessao-expirou.php";
}

//include "Connections/conecta_banco.php";
include "valida_cookie_admin.php";
?>
<?php

$ID_META = isset($_GET['ID_META']) ? $_GET['ID_META'] : '';

///////////////////////////////////////////////////////
$sql_result = mysqli_query($conexao,"select * from tb_metas WHERE ID_META = '$ID_META' ");
$val_meta = mysqli_fetch_object($sql_result);  
///////////////////////////////////////////////////////

$ID_META 				= isset($val_meta->ID_META) ? $val_meta->ID_META : '';
$META_USER 				= isset($val_meta->META_USER) ? $val_meta->META_USER : '';
$META_STATUS 			= isset($val_meta->META_STATUS) ? $val_meta->META_STATUS : '';
$META_DATA				= isset($val_meta->META_DATA) ? $val_meta->META_DATA : '';
$META_MES	 			= isset($val_meta->META_MES) ? $val_meta->META_MES : '';
$META_ANO	 			= isset($val_meta->META_ANO) ? $val_meta->META_ANO : '';
$META_VALOR	 			= isset($val_meta->META_VALOR) ? $val_meta->META_VALOR : '';

$META_VALOR_EQUIPE1		= isset($val_meta->META_VALOR_EQUIPE1) ? $val_meta->META_VALOR_EQUIPE1 : '';
$META_VALOR_OPERADOR1	= isset($val_meta->META_VALOR_OPERADOR1) ? $val_meta->META_VALOR_OPERADOR1 : '';
$META_VALOR_EQUIPE2		= isset($val_meta->META_VALOR_EQUIPE2) ? $val_meta->META_VALOR_EQUIPE2 : '';
$META_VALOR_OPERADOR2	= isset($val_meta->META_VALOR_OPERADOR2) ? $val_meta->META_VALOR_OPERADOR2 : '';
$META_VALOR_EQUIPE3		= isset($val_meta->META_VALOR_EQUIPE3) ? $val_meta->META_VALOR_EQUIPE3 : '';
$META_VALOR_OPERADOR3	= isset($val_meta->META_VALOR_OPERADOR3) ? $val_meta->META_VALOR_OPERADOR3 : '';
$META_VALOR_EQUIPE4		= isset($val_meta->META_VALOR_EQUIPE4) ? $val_meta->META_VALOR_EQUIPE4 : '';
$META_VALOR_OPERADOR4	= isset($val_meta->META_VALOR_OPERADOR4) ? $val_meta->META_VALOR_OPERADOR4 : '';

$META_OBS		 		= isset($val_meta->META_OBS) ? $val_meta->META_OBS : '';

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
		$("#META_VALOR").maskMoney({symbol:"R$",decimal:",",thousands:"."});
		$("#META_VALOR_EQUIPE1").maskMoney({symbol:"R$",decimal:",",thousands:"."});
		$("#META_VALOR_OPERADOR1").maskMoney({symbol:"R$",decimal:",",thousands:"."});
		$("#META_VALOR_EQUIPE2").maskMoney({symbol:"R$",decimal:",",thousands:"."});
		$("#META_VALOR_OPERADOR2").maskMoney({symbol:"R$",decimal:",",thousands:"."});
		$("#META_VALOR_EQUIPE3").maskMoney({symbol:"R$",decimal:",",thousands:"."});
		$("#META_VALOR_OPERADOR3").maskMoney({symbol:"R$",decimal:",",thousands:"."});
		$("#META_VALOR_EQUIPE4").maskMoney({symbol:"R$",decimal:",",thousands:"."});
		$("#META_VALOR_OPERADOR4").maskMoney({symbol:"R$",decimal:",",thousands:"."});
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
            <div class="box-header with-border">
              <h3 class="box-title">
              <strong><?php 
			  IF($ID_META == '')
			  echo "INCLUIR - "; 
			  ELSEIF($ID_META > '')
			  echo "ALTERAR - "; 
			  ?></strong>
               Meta </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
<form 
<?php 
IF($ID_META == '')
echo "action='meta-cadastrar-actions.php'"; 
ELSEIF($ID_META > '')
echo "action='meta-alterar-actions.php'"; 
?> method='post' name="formulario" >
<input type="hidden" id="ID_META" name="ID_META" value="<?php echo $ID_META; ?>">
<input type="hidden" id="META_USER" name="META_USER" value="<?php echo $ID_USER; ?>">
<input type="hidden" id="F_USER_REGISTRO" name="F_USER_REGISTRO" value="<?php echo $USER_NOME; ?>">

<div class="box-body">
<div class="row">

<div class="col-lg-2">
<label for="exampleInputPassword1">Mês:</label>
<select id="META_MES" name="META_MES" class="form-control" required/>
<?php 
if($META_MES == '1')
echo "<option value='01'> Janeiro </option>";
elseif($META_MES == '2')
echo "<option value='02'> Fevereiro </option>";
elseif($META_MES == '3')
echo "<option value='03'> Março </option>";
elseif($META_MES == '4')
echo "<option value='04'> Abril </option>";
elseif($META_MES == '5')
echo "<option value='05'> Maio </option>";
elseif($META_MES == '6')
echo "<option value='06'> Junho </option>";
elseif($META_MES == '7')
echo "<option value='07'> Julho </option>";
elseif($META_MES == '08')
echo "<option value='08'> Agosto </option>";
elseif($META_MES == '9')
echo "<option value='09'> Setembro </option>";
elseif($META_MES == '10')
echo "<option value='10'> Outubro </option>";
elseif($META_MES == '11')
echo "<option value='11'> Novembro </option>";
elseif($META_MES == '12')
echo "<option value='12'> Dezembro </option>";
?>
<option value=""></option>
<option value="01"> Janeiro </option>
<option value="02"> Fevereiro </option>
<option value="03"> Março </option>
<option value="04"> Abril </option>
<option value="05"> Maio </option>
<option value="06"> Junho </option>
<option value="07"> Julho </option>
<option value="08"> Agosto </option>
<option value="09"> Setembro </option>
<option value="10"> Outubro </option>
<option value="11"> Novembro </option>
<option value="12"> Dezembro </option>
</select>
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Ano:</label>
<select id="META_ANO" name="META_ANO" class="form-control" required/>
<?php 
if($META_ANO == '2022')
echo "<option value='2022'> 2022 </option>";
elseif($META_ANO == '2023')
echo "<option value='2023'> 2023 </option>";
?>
<option value=""></option>
<option value="2022"> 2022 </option>
<option value="2023"> 2023 </option>
</select>
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Status:</label>
<select id="META_STATUS" name="META_STATUS" class="form-control">
<?php 
IF($META_STATUS == '1')
echo "<option value='1'> Ativo </option>";
ELSEIF($META_STATUS == '2')
echo "<option value='2'> Inativo </option>";
?>
<option value=""></option>
<option value="1"> Ativo </option>
<option value="2"> Inativo </option>
</select>
</div>


<div class="col-lg-2">
<label for="exampleInputPassword1">Meta do Mês:</label>
<input type="text" class="form-control" id="META_VALOR" name="META_VALOR" placeholder="insira o meta do mês" value="<?php echo $META_VALOR; ?>" required />
</div>

</div>
<br>



<div class="row">
<div class="col-lg-2">
<label for="exampleInputPassword1">Meta da Equipe - 1:</label>
<input type="text" class="form-control" id="META_VALOR_EQUIPE1" name="META_VALOR_EQUIPE1" placeholder="insira a meta da equipe 1" value="<?php echo $META_VALOR_EQUIPE1; ?>"  />
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Meta Operador Equipe - 1:</label>
<input type="text" class="form-control" id="META_VALOR_OPERADOR1" name="META_VALOR_OPERADOR1" placeholder="insira a meta operador equipe 1" value="<?php echo $META_VALOR_OPERADOR1; ?>"  />
</div>


<div class="col-lg-2">
<label for="exampleInputPassword1">Meta da Equipe - 2:</label>
<input type="text" class="form-control" id="META_VALOR_EQUIPE2" name="META_VALOR_EQUIPE2" placeholder="insira a meta da equipe 2" value="<?php echo $META_VALOR_EQUIPE2; ?>"  />
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Meta Operador Equipe - 2:</label>
<input type="text" class="form-control" id="META_VALOR_OPERADOR2" name="META_VALOR_OPERADOR2" placeholder="insira a meta operador equipe 2" value="<?php echo $META_VALOR_OPERADOR2; ?>" required />
</div>


<div class="col-lg-2">
<label for="exampleInputPassword1">Meta da Equipe - 3:</label>
<input type="text" class="form-control" id="META_VALOR_EQUIPE3" name="META_VALOR_EQUIPE3" placeholder="insira a meta da equipe 3" value="<?php echo $META_VALOR_EQUIPE3; ?>"  />
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Meta Operador Equipe - 3:</label>
<input type="text" class="form-control" id="META_VALOR_OPERADOR3" name="META_VALOR_OPERADOR3" placeholder="insira a meta operador equipe 3" value="<?php echo $META_VALOR_OPERADOR3; ?>"  />
</div>

<!--
<div class="col-lg-2">
<label for="exampleInputPassword1">Meta do Equipe - 4:</label>
<input type="text" class="form-control" id="META_VALOR_EQUIPE4" name="META_VALOR_EQUIPE4" placeholder="insira a meta da equipe 4" value="<?php echo $META_VALOR_EQUIPE4; ?>"  />
</div>
-->

</div>
<br>


<div class="form-group">
<label for="exampleInputEmail1">Observações:</label>
<textarea rows="4" class="form-control" id="META_OBS" name="META_OBS" placeholder="insira a observação"><?php echo $META_OBS ; ?></textarea>
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
