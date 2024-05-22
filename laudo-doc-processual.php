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
$val_leads = mysqli_fetch_object($sql_result);  
///////////////////////////////////////////////////////
$ID_LEADS 					= isset($val_leads->ID_LEADS) ? $val_leads->ID_LEADS : '';
$LEADS_USER 				= isset($val_leads->LEADS_USER) ? $val_leads->LEADS_USER : '';	
$LEADS_STATUS 				= isset($val_leads->LEADS_STATUS) ? $val_leads->LEADS_STATUS : '';	
$LEADS_TIPO					= isset($val_leads->LEADS_TIPO) ? $val_leads->LEADS_TIPO : '';	
$LEADS_NOME 				= isset($val_leads->LEADS_NOME) ? $val_leads->LEADS_NOME : '';	

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sql_leads_val = mysqli_query($conexao,"select * from tb_ficha_intermediacao WHERE FICHA_INTER_LEADS = '$ID_LEADS' ");
$val_leads_val = mysqli_fetch_object($sql_leads_val);  
///////////////////////////////////////////////////////
$FICHA_INTER_TIPO			= isset($val_leads_val->FICHA_INTER_TIPO) ? $val_leads_val->FICHA_INTER_TIPO : '';
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
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sql_laudo_result = mysqli_query($conexao,"select * from tb_laudo WHERE LAUDO_LEADS = '$ID_LEADS' ");
$val_laudo_proc = mysqli_fetch_object($sql_laudo_result);  
///////////////////////////////////////////////////////
$ID_LAUDO						= isset($val_laudo_proc->ID_LAUDO) ? $val_laudo_proc->ID_LAUDO : '';
$LAUDO_STATUS					= isset($val_laudo_proc->LAUDO_STATUS) ? $val_laudo_proc->LAUDO_STATUS : '';
$LAUDO_LEADS					= isset($val_laudo_proc->LAUDO_LEADS) ? $val_laudo_proc->LAUDO_LEADS : '';
$LAUDO_PROCESSUAL_DOC			= isset($val_laudo_proc->LAUDO_PROCESSUAL_DOC) ? $val_laudo_proc->LAUDO_PROCESSUAL_DOC : '';

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

$ID_DOC_PROCESSUAL = isset($_GET['ID_DOC_PROCESSUAL']) ? $_GET['ID_DOC_PROCESSUAL'] : '';

///////////////////////////////////////////////////////
$sql_result_doc = mysqli_query($conexao,"select * from tb_docs_processual WHERE ID_DOC_PROCESSUAL = '$ID_DOC_PROCESSUAL' ");
$val_processual_doc = mysqli_fetch_object($sql_result_doc);  
///////////////////////////////////////////////////////
$ID_DOC_PROCESSUAL 			= isset($val_processual_doc->ID_DOC_PROCESSUAL) ? $val_processual_doc->ID_DOC_PROCESSUAL : '';
$DOC_PROCESSUAL_USER 		= isset($val_processual_doc->DOC_PROCESSUAL_USER) ? $val_processual_doc->DOC_PROCESSUAL_USER : '';
$DOC_PROCESSUAL_STATUS		= isset($val_processual_doc->DOC_PROCESSUAL_STATUS) ? $val_processual_doc->DOC_PROCESSUAL_STATUS : '';
$DOC_PROCESSUAL_LEADS		= isset($val_processual_doc->DOC_PROCESSUAL_LEADS) ? $val_processual_doc->DOC_PROCESSUAL_LEADS : '';
$DOC_PROCESSUAL_TIPO		= isset($val_processual_doc->DOC_PROCESSUAL_TIPO) ? $val_processual_doc->DOC_PROCESSUAL_TIPO : '';
$DOC_PROCESSUAL_ARQUIVO		= isset($val_processual_doc->DOC_PROCESSUAL_ARQUIVO) ? $val_processual_doc->DOC_PROCESSUAL_ARQUIVO : '';
$DOC_PROCESSUAL_OBS 		= isset($val_processual_doc->DOC_PROCESSUAL_OBS) ? $val_processual_doc->DOC_PROCESSUAL_OBS : '';

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
        Doc's para o Proccessual
        <small>painel de controle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Doc's para o Proccessual</a></li>
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
<!--
              <strong><?php 
			  IF($ID_LEADS == '')
			  echo "INCLUIR - "; 
			  ELSEIF($ID_LEADS > '')
			  echo "ALTERAR - "; 
			  ?></strong>
-->
               Doc's para o Proccessual </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->




<form 
<?php 
//IF($ID_LEADS_JURIDICO == '')
//echo "action='juridico-leads-pendente-cadastrar-actions.php'"; 
//ELSEIF($ID_LEADS_JURIDICO > '')
echo "action='laudo-doc-status-alterar-actions.php'"; 
?> method='post' enctype="multipart/form-data" name="formulario" >
<input type="hidden" id="ID_LAUDO" name="ID_LAUDO" value="<?php echo $ID_LAUDO; ?>">
<input type="hidden" id="LAUDO_USER" name="LAUDO_USER" value="<?php echo $ID_USER; ?>">
<input type="hidden" id="LAUDO_LEADS" name="LAUDO_LEADS" value="<?php echo $ID_LEADS; ?>">
<input type="hidden" id="F_USER_REGISTRO" name="F_USER_REGISTRO" value="<?php echo $USER_NOME; ?>">

<div class="box-body">
<div class="row">
<div class="col-lg-3">
<label for="exampleInputEmail1">Nome:</label>
<input type="text" class="form-control" value="<?php echo $LEADS_NOME; ?>" readonly >
</div>

<div class="col-lg-3">
<label for="exampleInputEmail1">Serviço Cotratado:</label>
<?php
if($FICHA_INTER_TIPO == '1')
$VAL_FICHA_INTER_TIPO = "FINANCIAMENTO PARCELAS EM DIA";
elseif($FICHA_INTER_TIPO == '2')
$VAL_FICHA_INTER_TIPO = "FINANCIAMENTO PARCELAS EM ATRASO";
elseif($FICHA_INTER_TIPO == '3')
$VAL_FICHA_INTER_TIPO = "EMPRESTIMO PARCELAS EM DIA";
elseif($FICHA_INTER_TIPO == '4')
$VAL_FICHA_INTER_TIPO = "EMPRESTIMO PARCELAS EM ATRASO";
elseif($FICHA_INTER_TIPO == '5')
$VAL_FICHA_INTER_TIPO = "CONTRATOS QUITADOS";
?>
<input type="text" class="form-control" value="<?php echo $VAL_FICHA_INTER_TIPO; ?>" readonly >
</div>


<div class="col-lg-2">
<label for="exampleInputPassword1">Doc Processual:</label>
<select id="LAUDO_PROCESSUAL_DOC" name="LAUDO_PROCESSUAL_DOC" class="form-control" required />
<?php 
if($LAUDO_PROCESSUAL_DOC == '1')
echo "<option value='1'> Doc. OK </option>";
elseif($LAUDO_PROCESSUAL_DOC == '2')
echo "<option value='2'> Doc. Pendente </option>";
?>
<option value=""></option>
<option value="1"> Doc. OK </option>
<option value="2"> Doc. Pendente </option>
</select>
</div>

</div>
<br>

<div class="box-footer">
<button type="submit" class="btn btn-danger">Salvar Status Doc.</button>
</div>
</form>



<div class="box box-danger">
</div>
<form 
<?php 
if($ID_DOC_PROCESSUAL == '')
echo "action='laudo-doc-processual-cadastrar-actions.php'"; 
elseif($ID_DOC_PROCESSUAL > '')
echo "action='laudo-doc-processual-alterar-actions.php'"; 
?> method='post' enctype="multipart/form-data" name="formulario" >
<input type="hidden" id="ID_DOC_PROCESSUAL" name="ID_DOC_PROCESSUAL" value="<?php echo $ID_DOC_PROCESSUAL; ?>">
<input type="hidden" id="DOC_PROCESSUAL_USER" name="DOC_PROCESSUAL_USER" value="<?php echo $ID_USER; ?>">
<input type="hidden" id="DOC_PROCESSUAL_LEADS" name="DOC_PROCESSUAL_LEADS" value="<?php echo $ID_LEADS; ?>">
<input type="hidden" id="F_USER_REGISTRO" name="F_USER_REGISTRO" value="<?php echo $USER_NOME; ?>">


<div class="row">
<div class="col-lg-5">
<label for="exampleInputPassword1">Nome Doc's:</label>
<select id="DOC_PROCESSUAL_TIPO" name="DOC_PROCESSUAL_TIPO" class="form-control" required />
<?php 
if($DOC_PROCESSUAL_TIPO == '1')
echo "<option value='1'> Procuração Judicial </option>";
elseif($DOC_PROCESSUAL_TIPO == '2')
echo "<option value='2'> Declaração de Hipossuficiência </option>";
elseif($DOC_PROCESSUAL_TIPO == '3')
echo "<option value='3'> Carteira de Trabalho </option>";
elseif($DOC_PROCESSUAL_TIPO == '4')
echo "<option value='4'> Extrato Bancário </option>";
elseif($DOC_PROCESSUAL_TIPO == '5')
echo "<option value='5'> Declaração de Imposto de Renda </option>";
elseif($DOC_PROCESSUAL_TIPO == '6')
echo "<option value='6'> Planilha Decon/ Bacem/ Contabilidade </option>";
elseif($DOC_PROCESSUAL_TIPO == '7')
echo "<option value='7'> Outros... </option>";
?>
<option value=""></option>
<option value="1"> Procuração Judicial </option>
<option value="2"> Declaração de Hipossuficiência  </option>
<option value="3"> Carteira de Trabalho </option>
<option value="4"> Extrato Bancário </option>
<option value="5"> Declaração de Imposto de Renda </option>
<option value="6"> Planilha Decon/ Bacem/ Contabilidade </option>
<option value="7"> Outros... </option>
</select>
</div>


<div class="col-lg-5">
<label for="exampleInputEmail1">Arquivo/ Doc's:</label>
<input type="file" name="DOC_PROCESSUAL_ARQUIVO" id="DOC_PROCESSUAL_ARQUIVO" />
<input type="hidden" id="VALIDA_DOC_PROCESSUAL_ARQUIVO" name="VALIDA_DOC_PROCESSUAL_ARQUIVO" value="<?php echo $DOC_PROCESSUAL_ARQUIVO; ?>">
</div>

</div>
<br>


<div class="form-group">
<label for="exampleInputEmail1">Observação:</label>
<textarea rows="4" class="form-control" id="DOC_PROCESSUAL_OBS" name="DOC_PROCESSUAL_OBS" placeholder="insira a observação"><?php echo $DOC_PROCESSUAL_OBS; ?></textarea>
</div>

</div>
<!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-danger">Salvar</button>
              </div>
            </form>
          </div>
          <!-- /.box -->





<div class="box box-danger">
<div class="box-header with-border">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="78%"><h3 class="box-title"><strong>Doc's</strong></h3></td>
    <td width="22%">&nbsp;</td>
    </tr>
</table>
</div>
<!-- /.box-header -->

<div class="box-body">
<table id="example2" class="table table-bordered table-hover">
<thead>
<tr>
<th width="60"><div align="center">ID</div></th>
<th>TIPO DOC'S</th>
<th width="30"><div align="center">VIS</div></th>
<th width="30"><div align="center">ALT</div></th>
<th width="30"><div align="center">EXC</div></th>
</tr>
</thead>

<tbody>
<?php
// do { 
$c = 2;

$sql_c_doc = mysqli_query($conexao,"SELECT * FROM tb_docs_processual WHERE DOC_PROCESSUAL_LEADS = '$ID_LEADS' AND DOC_PROCESSUAL_STATUS < '3' ORDER BY ID_DOC_PROCESSUAL DESC ");
while($val_c_doc = mysqli_fetch_object($sql_c_doc)):      

$ID_DOC_PROCESSUAL			= isset($val_c_doc->ID_DOC_PROCESSUAL) ? $val_c_doc->ID_DOC_PROCESSUAL : '';
$DOC_PROCESSUAL_STATUS		= isset($val_c_doc->DOC_PROCESSUAL_STATUS) ? $val_c_doc->DOC_PROCESSUAL_STATUS : '';
$DOC_PROCESSUAL_LEADS			= isset($val_c_doc->DOC_PROCESSUAL_LEADS) ? $val_c_doc->DOC_PROCESSUAL_LEADS : '';
$DOC_PROCESSUAL_TIPO			= isset($val_c_doc->DOC_PROCESSUAL_TIPO) ? $val_c_doc->DOC_PROCESSUAL_TIPO : '';
$DOC_PROCESSUAL_ARQUIVO		= isset($val_c_doc->DOC_PROCESSUAL_ARQUIVO) ? $val_c_doc->DOC_PROCESSUAL_ARQUIVO : '';
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////

$index = $c % 2;
$c++;
//$cor = $cores[$index];
$IETM = $c - 2 ;
?>
<tr>
<td ><div align="center"><?php echo $ID_DOC_PROCESSUAL; ?></div></td>
<td >
<?php 
if($DOC_PROCESSUAL_TIPO == '1')
echo " Procuração Judicial ";
elseif($DOC_PROCESSUAL_TIPO == '2')
echo " Declaração de Hipossuficiência ";
elseif($DOC_PROCESSUAL_TIPO == '3')
echo " Carteira de Trabalho ";
elseif($DOC_PROCESSUAL_TIPO == '4')
echo " Extrato Bancário ";
elseif($DOC_PROCESSUAL_TIPO == '5')
echo " Declaração de Imposto de Renda ";
elseif($DOC_PROCESSUAL_TIPO == '6')
echo " Planilha Decon/ Bacem/ Contabilidade ";
elseif($DOC_PROCESSUAL_TIPO == '7')
echo " Outros... ";
?>
</td>
<td><div align="center"><a href="processual-docs/<?php echo $DOC_PROCESSUAL_ARQUIVO; ?>" target="_blank"><i class="fa fa-download" style="color:#006600"></i></a></div></td>
<td><div align="center"><a href="laudo-doc-processual.php?ID_LEADS=<?php echo $ID_LEADS; ?>&&ID_DOC_PROCESSUAL=<?php echo $ID_DOC_PROCESSUAL; ?>"><i class="fa fa-refresh"></i></a></div></td>
<td><div align="center"><a href="excluir-laudo-doc-processual-doc.php?ID_LEADS=<?php echo $ID_LEADS; ?>&&ID_DOC_PROCESSUAL=<?php echo $ID_DOC_PROCESSUAL; ?>"><i class="fa fa-close" style="color:#FF0000"></i></a></div></td>
</tr>
<?php
 endwhile;
?>


</tbody>
</table>
            </div>

</div>



          
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
