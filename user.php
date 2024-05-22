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
$val_user = mysqli_fetch_object($sql_result);  
///////////////////////////////////////////////////////

$ID_ADMINISTRADOR 				= isset($val_user->ID_ADMINISTRADOR) ? $val_user->ID_ADMINISTRADOR : '';
$ADMINISTRADOR_STATUS 			= isset($val_user->ADMINISTRADOR_STATUS) ? $val_user->ADMINISTRADOR_STATUS : '';
$ADMINISTRADOR_TIPO 			= isset($val_user->ADMINISTRADOR_TIPO) ? $val_user->ADMINISTRADOR_TIPO : '';
$ADMINISTRADOR_DEPARTAMENTO		= isset($val_user->ADMINISTRADOR_DEPARTAMENTO) ? $val_user->ADMINISTRADOR_DEPARTAMENTO : '';
$ADMINISTRADOR_NOME 			= isset($val_user->ADMINISTRADOR_NOME) ? $val_user->ADMINISTRADOR_NOME : '';
$ADMINISTRADOR_EMAIL 			= isset($val_user->ADMINISTRADOR_EMAIL) ? $val_user->ADMINISTRADOR_EMAIL : '';
$ADMINISTRADOR_SENHA 			= isset($val_user->ADMINISTRADOR_SENHA) ? $val_user->ADMINISTRADOR_SENHA : '';
$ADMINISTRADOR_OBS		 		= isset($val_user->ADMINISTRADOR_OBS) ? $val_user->ADMINISTRADOR_OBS : '';

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
<script src="js/jquery-1.3.2.js" type="text/javascript"></script>
<script src="js/jquery.maskedinput-1.2.2.js" type="text/javascript"></script>
<script>
	function mascaraTelefone( campo ) {
	
		function trata( valor,  isOnBlur ) {
			
			valor = valor.replace(/\D/g,"");             			
			valor = valor.replace(/^(\d{2})(\d)/g,"($1)$2"); 		
			
			if( isOnBlur ) {
				
				valor = valor.replace(/(\d)(\d{4})$/,"$1-$2");   
			} else {

				valor = valor.replace(/(\d)(\d{3})$/,"$1-$2"); 
			}
			return valor;
		}
		
		campo.onkeypress = function (evt) {
			 
			var code = (window.event)? window.event.keyCode : evt.which;	
			var valor = this.value
			
			if(code > 57 || (code < 48 && code != 8 ))  {
				return false;
			} else {
				this.value = trata(valor, false);
			}
		}
		
		campo.onblur = function() {
			
			var valor = this.value;
			if( valor.length < 13 ) {
				this.value = ""
			}else {		
				this.value = trata( this.value, true );
			}
		}
		
		campo.maxLength = 14;
	}
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
        Usuários |
        <small>painel de controle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Usuários</a></li>
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
			  IF($ID_ADMINISTRADOR == '')
			  echo "INCLUIR - "; 
			  ELSEIF($ID_ADMINISTRADOR > '')
			  echo "ALTERAR - "; 
			  ?></strong>
               Usuários </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
<form 
<?php 
IF($ID_ADMINISTRADOR == '')
echo "action='user-cadastrar-actions.php'"; 
ELSEIF($ID_ADMINISTRADOR > '')
echo "action='user-alterar-actions.php'"; 
?> method='post' name="formulario" >
<input type="hidden" id="ID_ADMINISTRADOR" name="ID_ADMINISTRADOR" value="<?php echo $ID_ADMINISTRADOR; ?>">
<input type="hidden" id="F_USER_REGISTRO" name="F_USER_REGISTRO" value="<?php echo $USER_NOME; ?>">

<div class="box-body">
<div class="form-group">
<label for="exampleInputEmail1">Nome:</label>
<input type="text" class="form-control" id="ADMINISTRADOR_NOME" name="ADMINISTRADOR_NOME" placeholder="Insira o Nome" value="<?php echo $ADMINISTRADOR_NOME ; ?>" required>
</div>


<div class="row">
<div class="col-lg-6">
<label for="exampleInputPassword1">E-mail:</label>
<input type="email" class="form-control" id="ADMINISTRADOR_EMAIL" name="ADMINISTRADOR_EMAIL" placeholder="Insira o E-mail" value="<?php echo $ADMINISTRADOR_EMAIL; ?>" required>
</div>


<div class="col-lg-6">
<label for="exampleInputPassword1">Senha:</label>
<input type="password" class="form-control" id="ADMINISTRADOR_SENHA" name="ADMINISTRADOR_SENHA" placeholder="Insira a Senha" value="<?php echo $ADMINISTRADOR_SENHA; ?>">
</div>

</div>
<br>



<div class="row">
<div class="col-lg-3">
<label for="exampleInputPassword1">Status:</label>
<select id="ADMINISTRADOR_STATUS" name="ADMINISTRADOR_STATUS" class="form-control">
<?php 
IF($ADMINISTRADOR_STATUS == '1')
echo "<option value='1'> Ativo </option>";
ELSEIF($ADMINISTRADOR_STATUS == '2')
echo "<option value='2'> Inativo </option>";
?>
<option value=""></option>
<option value="1"> Ativo </option>
<option value="2"> Inativo </option>
</select>
</div>


<div class="col-lg-3">
<label for="exampleInputPassword1">Tipo:</label>
<select id="ADMINISTRADOR_TIPO" name="ADMINISTRADOR_TIPO" class="form-control">
<?php 
if($ADMINISTRADOR_TIPO == '1')
echo "<option value='1'> Administrador </option>";
elseif($ADMINISTRADOR_TIPO == '2')
echo "<option value='2'> Operador ADM </option>";
elseif($ADMINISTRADOR_TIPO == '3')
echo "<option value='3'> Supervisor </option>";
elseif($ADMINISTRADOR_TIPO == '4')
echo "<option value='4'> Operador </option>";
elseif($ADMINISTRADOR_TIPO == '5')
echo "<option value='5'> Jurídico Supervisor </option>";
elseif($ADMINISTRADOR_TIPO == '6')
echo "<option value='6'> Jurídico Operador </option>";
elseif($ADMINISTRADOR_TIPO == '7')
echo "<option value='7'> Jurídico Consumidor </option>";
elseif($ADMINISTRADOR_TIPO == '8')
echo "<option value='8'> Jurídico Laudo </option>";
//elseif($ADMINISTRADOR_TIPO == '9')
//echo "<option value='9'> Processual</option>";
elseif($ADMINISTRADOR_TIPO == '10')
echo "<option value='10'> Financeiro </option>";

elseif($ADMINISTRADOR_TIPO == '11')
echo "<option value='11'> Retenção </option>";
elseif($ADMINISTRADOR_TIPO == '12')
echo "<option value='12'> Processual </option>";

?>
<option value=""></option>
<option value="1"> Administrador </option>
<option value="2"> Operador ADM </option>
<option value="3"> Supervisor </option>
<option value="4"> Operador </option>
<option value="5"> Jurídico Supervisor </option>
<option value="6"> Jurídico Operador </option>
<option value="7"> Jurídico Consumidor </option>
<option value="8"> Jurídico Laudo </option>
<option value="10"> Financeiro </option>
<option value="11"> Retenção </option>

<option value="12"> Processual Supervisor</option>
<option value="13"> Processual Inicial</option>
<option value="14"> Processual Andamento</option>

<!--
<option value="12"> Processual Meio</option>
<option value="12"> Processual Recurso</option>
-->
</select>
</div>

</div>
<br>


<div class="form-group">
<label for="exampleInputEmail1">Observações:</label>
<textarea rows="4" class="form-control" id="ADMINISTRADOR_OBS" name="ADMINISTRADOR_OBS" placeholder="Insira a Observação"><?php echo $ADMINISTRADOR_OBS ; ?></textarea>
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


<script>
	mascaraTelefone( formulario.ADMINISTRADOR_TEL );
</script>

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
</body>
</html>
