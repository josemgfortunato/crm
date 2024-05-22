<?php
$ID_USER 		= isset($_COOKIE["ID_USER"]) ? $_COOKIE["ID_USER"] : '';
if($ID_USER == ''){	
include "sessao-expirou.php";
}

//include "Connections/conecta_banco.php";
include "valida_cookie_admin.php";


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
        Tabela de Comissão |
        <small>painel de controle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tabela de Comissão </a></li>
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
              <strong>TABELA DE COMISSÃO | PRIME</strong>
              </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

<br>
<table width="70%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#333333">
  <tr>
    <td height="50" colspan="3" bgcolor="#367FA9"><div align="center"><img src="dist/img/logo-avt-prime.png" width="270" height="100"></div></td>
    </tr>
  <tr>
    <td height="30" colspan="3" bgcolor="#FFFF00"><div align="center"><strong>&nbsp;COMISSÃO</strong></div></td>
    </tr>
<tr>
<td width="30%" height="30" bgcolor="#FFFF00"><div align="center"><strong>&nbsp;VALOR VENDA</strong></div></td>
<td width="20%"bgcolor="#FFFF00"><div align="center"><strong>%</strong></div></td>
<td width="20%" bgcolor="#FFFF00"><div align="center"><strong>COMISSÃO</strong></div></td>
</tr>


<?php
//$sql_comissao = mysqli_query($conexao,"select * from tb_comissao ");
//while($val_comissao = mysqli_fetch_object($sql_comissao)):      

$sql_comissao = mysqli_query($conexao,"select * from tb_comissao WHERE COMISSAO_STATUS = '1' ORDER BY ID_COMISSAO ASC ");
while($val_comissao = mysqli_fetch_object($sql_comissao)):      

$ID_COMISSAO		 		= isset($val_comissao->ID_COMISSAO) ? $val_comissao->ID_COMISSAO : '';
$COMISSAO_VALOR_VENDIDO		= isset($val_comissao->COMISSAO_VALOR_VENDIDO) ? $val_comissao->COMISSAO_VALOR_VENDIDO : '';
$COMISSAO_PORCENTAGEM	  	= isset($val_comissao->COMISSAO_PORCENTAGEM) ? $val_comissao->COMISSAO_PORCENTAGEM : '';
$COMISSAO_VALOR	 			= isset($val_comissao->COMISSAO_VALOR) ? $val_comissao->COMISSAO_VALOR : '';
?>

<tr>
<td height="30"><div align="center">R$ <?php echo $COMISSAO_VALOR_VENDIDO; ?></div></td>
<td><div align="center"><?php echo $COMISSAO_PORCENTAGEM; ?></div></td>
<td><div align="center"><strong>R$ <?php echo $COMISSAO_VALOR; ?></strong></div></td>
</tr>
<?php
 endwhile;
?>
</table>
<br>
<br>
            
            
            

<!--


<div class="box box-success">
<div class="box-header with-border">
<h3 class="box-title">
<strong>RELATÓRIO GERAL</strong>
</h3>
</div>
<form action='exporta-excel/exportar-relatorio-geral-solda.php' method='post' name="formulario" >
<div class="box-body">
<div class="row">


<div class="col-lg-2">
<label for="exampleInputPassword1">Mês:</label>
<select id="MES" name="MES" class="form-control" required="required">
<option value="">  </option>
<option value="1"> Janeiro </option>
<option value="2"> Fevereiro </option>
<option value="3"> Março </option>
<option value="4"> Abril </option>
<option value="5"> Maio </option>
<option value="6"> Junho </option>
<option value="7"> Julho </option>
<option value="8"> Agosto </option>
<option value="9"> Setembro </option>
<option value="10"> Outubro </option>
<option value="11"> Novembro </option>
<option value="12"> Dezembro </option>
</select>
</div>


<div class="col-lg-2">
<label for="exampleInputPassword1">Ano:</label>
<select id="ANO" name="ANO" class="form-control" required="required">
<option value="">  </option>
<option value="2022"> 2022 </option>
<option value="2021"> 2021 </option>
<option value="2020"> 2020 </option>
</select>
</div>


<div class="col-lg-2">
<label for="exampleInputPassword1">Departamento:</label>
<select id="GERAL_DEPARTAMENTO" name="GERAL_DEPARTAMENTO" class="form-control" required="required" >
<?php 
$sql_dep = mysqli_query($conexao,"select * from tb_departamento WHERE ID_DEPARTAMENTO = '2' ");
while($val_dep = mysqli_fetch_object($sql_dep)):  

$GERAL_ID_DEPARTAMENTO 		= isset($val_dep->ID_DEPARTAMENTO) ? $val_dep->ID_DEPARTAMENTO : '';
$GERAL_DEPARTAMENTO_TEXTO		= isset($val_dep->DEPARTAMENTO_TEXTO) ? $val_dep->DEPARTAMENTO_TEXTO : '';
?>
<option value="<?php echo $GERAL_ID_DEPARTAMENTO; ?>"> <?php echo utf8_encode($GERAL_DEPARTAMENTO_TEXTO); ?> </option>
<?php
 endwhile;
?>
</select>
</div>


<div class="col-lg-2">
<label for="exampleInputPassword1">Sub-Departamento:</label>
<select id="GERAL_SUB_DEPARTAMENTO" name="GERAL_SUB_DEPARTAMENTO" class="form-control" >
<option value="">  </option>
<?php 
$sql_dep_sub = mysqli_query($conexao,"select * from tb_departamento_sub WHERE DEPARTAMENTO_COD = '2' AND DEPARTAMENTO_STATUS_SUB = '1' ");
while($valida_dep_sub = mysqli_fetch_object($sql_dep_sub)):  

$GERAL_ID_DEPARTAMENTO_SUB 		= isset($valida_dep_sub->ID_DEPARTAMENTO_SUB) ? $valida_dep_sub->ID_DEPARTAMENTO_SUB : '';
$GERAL_DEPARTAMENTO_TEXTO_SUB		= isset($valida_dep_sub->DEPARTAMENTO_TEXTO_SUB) ? $valida_dep_sub->DEPARTAMENTO_TEXTO_SUB : '';
?>
<option value="<?php echo $GERAL_ID_DEPARTAMENTO_SUB; ?>"> <?php echo $GERAL_DEPARTAMENTO_TEXTO_SUB; ?> </option>
<?php
 endwhile;
?>
</select>
</div>


</div>
<br>


</div>


<div class="box-footer">
<button type="submit" id="USINAGEM_ENTER" class="btn btn-success">GERAR RELATÓRIO</button>
</div>
<br>
<br>
</form>            
<br>
            
    -->        
            



<!--
<div class="box box-success">
<div class="box-header with-border">
<h3 class="box-title">
<strong>RELATÓRIO - RESUMO DA PRODUÇÃO</strong>
</h3>
</div>
<form action='exporta-excel/exportar-relatorio-resumo-producao-solda.php' method='post' name="formulario" >
<div class="box-body">
<div class="row">


<div class="col-lg-2">
<label for="exampleInputPassword1">Mês:</label>
<select id="MES" name="MES" class="form-control" required="required">
<option value="">  </option>
<option value="1"> Janeiro </option>
<option value="2"> Fevereiro </option>
<option value="3"> Março </option>
<option value="4"> Abril </option>
<option value="5"> Maio </option>
<option value="6"> Junho </option>
<option value="7"> Julho </option>
<option value="8"> Agosto </option>
<option value="9"> Setembro </option>
<option value="10"> Outubro </option>
<option value="11"> Novembro </option>
<option value="12"> Dezembro </option>
</select>
</div>


<div class="col-lg-2">
<label for="exampleInputPassword1">Ano:</label>
<select id="ANO" name="ANO" class="form-control" required="required">
<option value="">  </option>
<option value="2022"> 2022 </option>
<option value="2021"> 2021 </option>
<option value="2020"> 2020 </option>
</select>
</div>


<div class="col-lg-2">
<label for="exampleInputPassword1">Departamento:</label>
<select id="GERAL_DEPARTAMENTO" name="GERAL_DEPARTAMENTO" class="form-control" required="required" >
<?php 
$sql_dep = mysqli_query($conexao,"select * from tb_departamento WHERE ID_DEPARTAMENTO = '2' ");
while($val_dep = mysqli_fetch_object($sql_dep)):  

$GERAL_ID_DEPARTAMENTO 		= isset($val_dep->ID_DEPARTAMENTO) ? $val_dep->ID_DEPARTAMENTO : '';
$GERAL_DEPARTAMENTO_TEXTO		= isset($val_dep->DEPARTAMENTO_TEXTO) ? $val_dep->DEPARTAMENTO_TEXTO : '';
?>
<option value="<?php echo $GERAL_ID_DEPARTAMENTO; ?>"> <?php echo utf8_encode($GERAL_DEPARTAMENTO_TEXTO); ?> </option>
<?php
 endwhile;
?>
</select>
</div>


<div class="col-lg-2">
<label for="exampleInputPassword1">Sub-Departamento:</label>
<select id="GERAL_SUB_DEPARTAMENTO" name="GERAL_SUB_DEPARTAMENTO" class="form-control" >
<option value="">  </option>
<?php 
$sql_dep_sub = mysqli_query($conexao,"select * from tb_departamento_sub WHERE DEPARTAMENTO_COD = '2' AND DEPARTAMENTO_STATUS_SUB = '1' ");
while($valida_dep_sub = mysqli_fetch_object($sql_dep_sub)):  

$GERAL_ID_DEPARTAMENTO_SUB 		= isset($valida_dep_sub->ID_DEPARTAMENTO_SUB) ? $valida_dep_sub->ID_DEPARTAMENTO_SUB : '';
$GERAL_DEPARTAMENTO_TEXTO_SUB		= isset($valida_dep_sub->DEPARTAMENTO_TEXTO_SUB) ? $valida_dep_sub->DEPARTAMENTO_TEXTO_SUB : '';
?>
<option value="<?php echo $GERAL_ID_DEPARTAMENTO_SUB; ?>"> <?php echo $GERAL_DEPARTAMENTO_TEXTO_SUB; ?> </option>
<?php
 endwhile;
?>
</select>
</div>


</div>
<br>


</div>

<div class="box-footer">
<button type="submit" id="USINAGEM_ENTER" class="btn btn-success">GERAR RELATÓRIO</button>
</div>
<br>
<br>
</form>            
 -->           
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
</body>
</html>
