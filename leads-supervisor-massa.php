<?php
$ID_USER 		= isset($_COOKIE["ID_USER"]) ? $_COOKIE["ID_USER"] : '';
if($ID_USER == ''){	
include "sessao-expirou.php";
}

//include "Connections/conecta_banco.php";
include "valida_cookie_admin.php";
?>
<?php

$ID_LEADS = isset($_GET['ID_LEADS']) ? $_GET['ID_LEADS'] : '';

///////////////////////////////////////////////////////
$sql_result = mysqli_query($conexao,"select * from tb_leads WHERE ID_LEADS = '$ID_LEADS' ");
$val_result = mysqli_fetch_object($sql_result);  
///////////////////////////////////////////////////////

$ID_LEADS 				= isset($val_result->ID_LEADS) ? $val_result->ID_LEADS : '';
$LEADS_USER 			= isset($val_result->LEADS_USER) ? $val_result->LEADS_USER : '';
$LEADS_STATUS 			= isset($val_result->LEADS_STATUS) ? $val_result->LEADS_STATUS : '';
$LEADS_TIPO				= isset($val_result->LEADS_TIPO) ? $val_result->LEADS_TIPO : '';
$LEADS_FORNECEDOR		= isset($val_result->LEADS_FORNECEDOR) ? $val_result->LEADS_FORNECEDOR : '';

$LEADS_DATA 			= isset($val_result->LEADS_DATA) ? $val_result->LEADS_DATA : '';
if($LEADS_DATA > '')	{
$LEADS_DATA = $LEADS_DATA;
}	else	{
$LEADS_DATA = date("d/m/Y");
}

//$LEADS_NOME 			= isset($val_result->LEADS_NOME) ? $val_result->LEADS_NOME : '';
//$LEADS_EMAIL 			= isset($val_result->LEADS_EMAIL) ? $val_result->LEADS_EMAIL : '';
//$LEADS_TEL1 			= isset($val_result->LEADS_TEL1) ? $val_result->LEADS_TEL1 : '';
//$LEADS_TEL2 			= isset($val_result->LEADS_TEL2) ? $val_result->LEADS_TEL2 : '';
$LEADS_OBS		 		= isset($val_result->LEADS_OBS) ? $val_result->LEADS_OBS : '';
$F_LEADS		 		= isset($val_result->F_LEADS) ? $val_result->F_LEADS : '';

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
        Lead's |
        <small>painel de controle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Lead's</a></li>
      </ol>
    </section>


<br>



  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">




<div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">
              <strong><?php 
			  IF($ID_LEADS == '')
			  echo "INCLUIR - "; 
			  ELSEIF($ID_LEADS > '')
			  echo "ALTERAR - "; 
			  ?></strong>
               Lead's </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
<form 
<?php 
//IF($ID_LEADS == '')
echo "action='filtro-leads-supervisor-massa.php'"; 
//echo "action='filtro-leads-massa.php'"; 
//ELSEIF($ID_LEADS > '')
//echo "action='leads-alterar-actions.php'"; 
?> method='post' name="formulario" >
<input type="hidden" id="ID_LEADS" name="ID_LEADS" value="<?php echo $ID_LEADS; ?>">
<input type="hidden" id="F_USER_REGISTRO" name="F_USER_REGISTRO" value="<?php echo $USER_NOME; ?>">

<div class="box-body">

<div class="row">
<div class="col-lg-2">
<label for="exampleInputPassword1">Data:</label>
<input type="text" class="form-control" id="LEADS_DATA" name="LEADS_DATA" placeholder="insira a data" value="<?php echo $LEADS_DATA; ?>" required>
</div>

<div class="col-lg-3">
<label for="exampleInputPassword1">Fornecedor:</label>
<select id="LEADS_FORNECEDOR" name="LEADS_FORNECEDOR" class="form-control" required>
<?php 
if($LEADS_FORNECEDOR == '1')
echo "<option value='1'> DANIEL </option>";
elseif($LEADS_FORNECEDOR == '2')
echo "<option value='2'> JULIO MARKETING NOVO </option>";
elseif($LEADS_FORNECEDOR == '3')
echo "<option value='3'> SITE </option>";
elseif($LEADS_FORNECEDOR == '4')
echo "<option value='4'> GOOGLE </option>";
elseif($LEADS_FORNECEDOR == '5')
echo "<option value='5'> INSTAGRAM </option>";
elseif($LEADS_FORNECEDOR == '6')
echo "<option value='6'> FACEBOOK </option>";
elseif($LEADS_FORNECEDOR == '7')
echo "<option value='7'> INDICAÇÃO </option>";
elseif($LEADS_FORNECEDOR == '8')
echo "<option value='8'> OUTROS </option>";
elseif($LEADS_FORNECEDOR == '9')
echo "<option value='9'> TIKTOK </option>";
elseif($LEADS_FORNECEDOR == '10')
echo "<option value='10'> REPIQUE </option>";
elseif($LEADS_FORNECEDOR == '11')
echo "<option value='11'> DISCADOR </option>";
elseif($LEADS_FORNECEDOR == '12')
echo "<option value='12'> INFLUENCER </option>";
?>
<option value=""></option>
<option value="1"> DANIEL  </option>
<option value="2"> JULIO MARKETING NOVO</option>
<option value="3"> SITE </option>
<option value="4"> GOOGLE </option>
<option value="5"> INSTAGRAM </option>
<option value="6"> FACEBOOK </option>
<option value="7"> INDICAÇÃO </option>
<option value="8"> OUTROS </option>
<option value="9"> TIKTOK </option>
<option value="10"> REPIQUE </option>
<option value="11"> DISCADOR </option>
<option value="12"> INFLUENCER </option>
</select>
</div>

<div class="col-lg-3">
<label for="exampleInputPassword1">Supervisor:</label>
<!--
<input type="hidden" class="form-control" id="LEADS_SUPERVISOR" name="LEADS_SUPERVISOR" value="<?php echo $ID_USER; ?>" required>
<input type="text" class="form-control" value="<?php echo $USER_NOME; ?>" required readonly>
-->
<select id="LEADS_SUPERVISOR" name="LEADS_SUPERVISOR" class="form-control" required="required" >
<option value=""></option>
<?php 
$sql_user = mysqli_query($conexao,"select * from tb_administrador WHERE ADMINISTRADOR_STATUS = '1' AND ADMINISTRADOR_TIPO = '3' ORDER BY ADMINISTRADOR_NOME ASC");
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


<!--
<div class="col-lg-2">
<label for="exampleInputPassword1">Status:</label>
<select id="LEADS_STATUS" name="LEADS_STATUS" class="form-control">
<?php 
if($LEADS_STATUS == '1')
echo "<option value='1'> Ativo </option>";
elseif($LEADS_STATUS == '2')
echo "<option value='2'> Inativo </option>";
?>
<option value="1"> Ativo </option>
<option value="2"> Inativo </option>
</select>
</div>
-->
</div>
<br>


<!--
<div class="row">
<div class="col-lg-4">
<label for="exampleInputPassword1">Nome:</label>
<input type="text" class="form-control" id="LEADS_NOME" name="LEADS_NOME" placeholder="insira o nome" value="<?php echo $LEADS_NOME; ?>" required>
</div>

<div class="col-lg-4">
<label for="exampleInputPassword1">E-mail:</label>
<input type="email" class="form-control" id="LEADS_EMAIL" name="LEADS_EMAIL" placeholder="insira o e-mail" value="<?php echo $LEADS_EMAIL; ?>" >
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Tel - 1:</label>
<input type="text" class="form-control" id="LEADS_TEL1" name="LEADS_TEL1" placeholder="insira o tel 1" value="<?php echo $LEADS_TEL1; ?>" required>
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Tel - 2:</label>
<input type="text" class="form-control" id="LEADS_TEL2" name="LEADS_TEL2" placeholder="insira o tel 2" value="<?php echo $LEADS_TEL1; ?>" >
</div>

</div>
<br>
-->


<div class="form-group">
<label for="exampleInputEmail1">Lead's em Massa:</label>
<textarea rows="4" class="form-control" id="F_LEADS" name="F_LEADS" placeholder="insira os lead's em massa separador por (;)." required><?php echo $F_LEADS ; ?></textarea>
<?php
//include "textarea-produto.php";
?>
</div>


<table width="100%" border="1" bordercolor="#ff0000" >
  <tr>
    <td bgcolor="#FFFF00">&nbsp; Obs: Inserir leads em massa separado por (ponto e virgula ";").</td>
  </tr>
  <tr>
    <td bgcolor="#FFFF00">&nbsp; <strong>Ex: Nome; E-mail; Tel-1; Tel-2;</strong></td>
  </tr>
</table>


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
	mascaraTelefone( formulario.LEADS_TEL1 );
	mascaraTelefone( formulario.LEADS_TEL2 );
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
