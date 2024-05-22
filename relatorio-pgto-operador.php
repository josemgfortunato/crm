<?php
$ID_USER 		= isset($_COOKIE["ID_USER"]) ? $_COOKIE["ID_USER"] : '';
if($ID_USER == ''){	
include "sessao-expirou.php";
}

//include "Connections/conecta_banco.php";
include "valida_cookie_admin.php";



//$F_USUARIO 	= isset($_POST["F_USUARIO"]) ? $_POST["F_USUARIO"] : '';

$F_MES 		= isset($_POST["F_MES"]) ? $_POST["F_MES"] : '';
if($F_MES == '')
$F_MES 	= date('m');

if($F_MES == '1')
$nome_mes = 'JANEIRO';
elseif($F_MES == '2')
$nome_mes = 'FEVEREIRO';
elseif($F_MES == '3')
$nome_mes = 'MARÇO';
elseif($F_MES == '4')
$nome_mes = 'ABRIL';
elseif($F_MES == '5')
$nome_mes = 'MAIO';
elseif($F_MES == '6')
$nome_mes = 'JUNHO';
elseif($F_MES == '7')
$nome_mes = 'JULHO';
elseif($F_MES == '8')
$nome_mes = 'AGOSTO';
elseif($F_MES == '9')
$nome_mes = 'SETEMBRO';
elseif($F_MES == '10')
$nome_mes = 'OUTUBRO';
elseif($F_MES == '11')
$nome_mes = 'NOVEMBRO';
elseif($F_MES == '12')
$nome_mes = 'DEZEMBRO';


$F_ANO 		= isset($_POST["F_ANO"]) ? $_POST["F_ANO"] : '';
if($F_ANO == '')
$F_ANO 	= date('Y');

//$F_DATA		= isset($_POST["F_DATA"]) ? $_POST["F_DATA"] : '';
//$VAL_DATA_DIA = substr($F_DATA, 0, 2);
//$VAL_DATA_MES = substr($F_DATA, 3, 2);
//$VAL_DATA_ANO = substr($F_DATA, 6, 4);
//$VAL_DATA = $VAL_DATA_ANO.'/'.$VAL_DATA_MES.'/'.$VAL_DATA_DIA;

//$F_USUARIO 	= isset($_POST["F_USUARIO"]) ? $_POST["F_USUARIO"] : '';

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
        Relatórios de Pagamentos |
        <small>painel de controle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Relatórios de Pagamentos</a></li>
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
              <strong>RELATÓRIO DE PAGAMENTOS | USUÁRIO POR MÊS</strong>
              </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

<form action='relatorio-pgto-operador.php' method='post' name="formulario" >


<div class="box-body">
<div class="row">
<div class="col-lg-2">
<label for="exampleInputPassword1">Mês:</label>
<select id="F_MES" name="F_MES" class="form-control" required="required">
<?php
if($F_MES > '')
echo "<option value='$F_MES'> $nome_mes </option>";
?>
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
<select id="F_ANO" name="F_ANO" class="form-control" required="required">
<?php
if($F_ANO > '')
echo "<option value='$F_ANO'> $F_ANO </option>";
?>
<option value="">  </option>
<option value="2022"> 2022 </option>
<option value="2023"> 2023 </option>
</select>
</div>


</div>
<br>

</div>
<div class="box-footer">
<button type="submit" id="USINAGEM_ENTER" class="btn btn-primary">GERAR RELATÓRIO</button>
</div>
</form>
            
            
            
            
<br>            
            
            





<div class="box box-primary">
</div>

<br>
<table width="80%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#333333">
<tr>
<td height="50" bgcolor="#FFFF00"><strong>&nbsp;OPERADOR</strong></td>
<td bgcolor="#FFFF00"><div align="center"><strong>ACORDO REVISÃO</strong></div></td>
<td bgcolor="#FFFF00"><div align="center"><strong>PAGO</strong></div></td>
<td bgcolor="#FFFF00"><div align="center"><strong>PROJEÇÃO</strong></div></td>
</tr>


<?php

//if($F_USUARIO > '')
//$val_bd_user = " ID_ADMINISTRADOR = '$F_USUARIO' AND ";

if($F_MES > '')
$val_bd_mes = " MONTH(LEADS_DISTRIBUIDO_DATA) = '$F_MES' AND ";

if($F_ANO > '')
$val_bd_ano = " YEAR(LEADS_DISTRIBUIDO_DATA) = '$F_ANO' AND ";

//if($F_DATA > '')
//$val_bd_data = " DATE(LEADS_DISTRIBUIDO_DATA) = '$VAL_DATA' AND ";


$sql_user = mysqli_query($conexao,"select * from tb_administrador WHERE ID_ADMINISTRADOR > '1' AND ADMINISTRADOR_STATUS < '3' AND ADMINISTRADOR_TIPO = '4' ");
while($val_user = mysqli_fetch_object($sql_user)):      


$ID_ADMINISTRADOR		 		= isset($val_user->ID_ADMINISTRADOR) ? $val_user->ID_ADMINISTRADOR : '';
$ADMINISTRADOR_NOME		 		= isset($val_user->ADMINISTRADOR_NOME) ? $val_user->ADMINISTRADOR_NOME : '';
$ADMINISTRADOR_EMAIL		  	= isset($val_user->ADMINISTRADOR_EMAIL) ? $val_user->ADMINISTRADOR_EMAIL : '';
$ADMINISTRADOR_STATUS	 		= isset($val_user->ADMINISTRADOR_STATUS) ? $val_user->ADMINISTRADOR_STATUS : '';
$ADMINISTRADOR_TIPO		 		= isset($val_user->ADMINISTRADOR_TIPO) ? $val_user->ADMINISTRADOR_TIPO : '';


$ID_SUPERVISOR_USER = '99';

if($USER_TIPO == '4')	{
//$valida_supervisor = " SUPERVISOR_USER_SUPERVISOR = '$ID_USER' ";
//else
//$valida_supervisor = "";

///////////////////////////////////////////////////////
$sql_sup_user = mysqli_query($conexao,"select * from tb_supervisor_user WHERE SUPERVISOR_USER_SUPERVISOR = '$ID_USER' AND SUPERVISOR_USER_OPERADOR = '$ID_ADMINISTRADOR' ");
$val_sup_user = mysqli_fetch_object($sql_sup_user);  
///////////////////////////////////////////////////////
$ID_SUPERVISOR_USER 				= isset($val_sup_user->ID_SUPERVISOR_USER) ? $val_sup_user->ID_SUPERVISOR_USER : '';
//$SUPERVISOR_USER_STATUS 			= isset($val_sup_user->SUPERVISOR_USER_STATUS) ? $val_sup_user->SUPERVISOR_USER_STATUS : '';	
//$SUPERVISOR_USER_SUPERVISOR			= isset($val_sup_user->SUPERVISOR_USER_SUPERVISOR) ? $val_sup_user->SUPERVISOR_USER_SUPERVISOR : '';	
//$SUPERVISOR_USER_OPERADOR			= isset($val_sup_user->SUPERVISOR_USER_OPERADOR) ? $val_sup_user->SUPERVISOR_USER_OPERADOR : '';	
//$SUPERVISOR_USER_EQUIPE				= isset($val_sup_user->SUPERVISOR_USER_EQUIPE) ? $val_sup_user->SUPERVISOR_USER_EQUIPE : '';	
}
?>

<?php
if($ID_SUPERVISOR_USER > '')	{
?>
<tr>
<td width="30%" height="30">&nbsp;<?php echo $ADMINISTRADOR_NOME; ?></td>
<td width="10%"><div align="center">
<?php
$t_leads1 = mysqli_query($conexao,"select count(*) as total FROM tb_leads WHERE $val_bd_mes $val_bd_ano LEADS_USER = '$ID_ADMINISTRADOR' AND LEADS_STATUS = '1' ");
$t_leads1 = mysqli_fetch_array($t_leads1);
echo $t_leads1 = $t_leads1[0];
?>
</div></td>
<td width="10%"><div align="center">
R$ <?php
$sql_total = mysqli_query($conexao,"select sum(cast(replace(replace(VALOR_CONTR_VALOR, '.', ''), ',', '.') as decimal(10,2))) FROM tb_valor_contratacao WHERE VALOR_CONTR_STATUS = '1' AND MONTH(VALOR_CONTR_DATA_PGTO) = '$F_MES' AND YEAR(VALOR_CONTR_DATA_PGTO) = '$F_ANO' AND VALOR_CONTR_USER = '$ID_ADMINISTRADOR' ");
$sql_total = mysqli_fetch_array($sql_total);
echo $VALOR_REALIZADO =  number_format($sql_total[0], 2, ',', '.');
?>
</div></td>
<td width="10%"><div align="center">
R$ <?php
$sql_persp = mysqli_query($conexao,"select sum(cast(replace(replace(VALOR_CONTR_VALOR, '.', ''), ',', '.') as decimal(10,2))) FROM tb_valor_contratacao WHERE VALOR_CONTR_STATUS = '2' AND MONTH(VALOR_CONTR_DATA_PGTO) = '$F_MES' AND YEAR(VALOR_CONTR_DATA_PGTO) = '$F_ANO' AND VALOR_CONTR_USER = '$ID_ADMINISTRADOR' ");
$sql_persp = mysqli_fetch_array($sql_persp);
echo $VALOR_PERSPECTIVA =  number_format($sql_persp[0], 2, ',', '.');
?>
</div></td>
</tr>
<?php
	}
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
