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
$LEADS_FORNECEDOR 			= isset($val_leads->LEADS_FORNECEDOR) ? $val_leads->LEADS_FORNECEDOR : '';	
$LEADS_PRIORIDADE 			= isset($val_leads->LEADS_PRIORIDADE) ? $val_leads->LEADS_PRIORIDADE : '';	
$LEADS_NOME 				= isset($val_leads->LEADS_NOME) ? $val_leads->LEADS_NOME : '';	
$LEADS_EMAIL	 			= isset($val_leads->LEADS_EMAIL) ? $val_leads->LEADS_EMAIL : '';	
$LEADS_TEL1		 			= isset($val_leads->LEADS_TEL1) ? $val_leads->LEADS_TEL1 : '';	
$LEADS_TEL2				 	= isset($val_leads->LEADS_TEL2) ? $val_leads->LEADS_TEL2 : '';	

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
$sql_leads_juri_result = mysqli_query($conexao,"select * from tb_leads_op_adm WHERE OP_ADM_LEADS = '$ID_LEADS' ");
$val_leads_juri = mysqli_fetch_object($sql_leads_juri_result);  
///////////////////////////////////////////////////////
$ID_OP_ADM				= isset($val_leads_juri->ID_OP_ADM) ? $val_leads_juri->ID_OP_ADM : '';
$OP_ADM_STATUS			= isset($val_leads_juri->OP_ADM_STATUS) ? $val_leads_juri->OP_ADM_STATUS : '';
$OP_ADM_LEADS			= isset($val_leads_juri->OP_ADM_LEADS) ? $val_leads_juri->OP_ADM_LEADS : '';
$OP_ADM_FATURAMENTO		= isset($val_leads_juri->OP_ADM_FATURAMENTO) ? $val_leads_juri->OP_ADM_FATURAMENTO : '';

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

$ID_LEADS_OP_ADM_DOC = isset($_GET['ID_LEADS_OP_ADM_DOC']) ? $_GET['ID_LEADS_OP_ADM_DOC'] : '';

///////////////////////////////////////////////////////
$sql_result_doc = mysqli_query($conexao,"select * from tb_leads_op_adm_doc WHERE ID_LEADS_OP_ADM_DOC = '$ID_LEADS_OP_ADM_DOC' ");
$val_juridico_doc = mysqli_fetch_object($sql_result_doc);  
///////////////////////////////////////////////////////
$ID_LEADS_OP_ADM_DOC 			= isset($val_juridico_doc->ID_LEADS_OP_ADM_DOC) ? $val_juridico_doc->ID_LEADS_OP_ADM_DOC : '';
$LEADS_OP_ADM_DOC_USER 			= isset($val_juridico_doc->LEADS_OP_ADM_DOC_USER) ? $val_juridico_doc->LEADS_OP_ADM_DOC_USER : '';
$LEADS_OP_ADM_DOC_STATUS		= isset($val_juridico_doc->LEADS_OP_ADM_DOC_STATUS) ? $val_juridico_doc->LEADS_OP_ADM_DOC_STATUS : '';
$LEADS_OP_ADM_DOC_LEADS			= isset($val_juridico_doc->LEADS_OP_ADM_DOC_LEADS) ? $val_juridico_doc->LEADS_OP_ADM_DOC_LEADS : '';
$LEADS_OP_ADM_DOC_TIPO			= isset($val_juridico_doc->LEADS_OP_ADM_DOC_TIPO) ? $val_juridico_doc->LEADS_OP_ADM_DOC_TIPO : '';
$LEADS_OP_ADM_DOC_ARQUIVO		= isset($val_juridico_doc->LEADS_OP_ADM_DOC_ARQUIVO) ? $val_juridico_doc->LEADS_OP_ADM_DOC_ARQUIVO : '';
$LEADS_OP_ADM_DOC_OBS 			= isset($val_juridico_doc->LEADS_OP_ADM_DOC_OBS) ? $val_juridico_doc->LEADS_OP_ADM_DOC_OBS : '';

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
        Operador ADM | Doc.
        <small>painel de controle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Operador ADM Doc.</a></li>
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
               Operador ADM | Doc. </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
<form 
<?php 
if($ID_OP_ADM == '')
echo "action='op-adm-faturamento-cadastrar-actions.php'"; 
elseif($ID_OP_ADM > '')
echo "action='op-adm-faturamento-alterar-actions.php'"; 
?> method='post' enctype="multipart/form-data" name="formulario" >
<input type="hidden" id="ID_OP_ADM" name="ID_OP_ADM" value="<?php echo $ID_OP_ADM; ?>">
<input type="hidden" id="OP_ADM_USER" name="OP_ADM_USER" value="<?php echo $ID_USER; ?>">
<input type="hidden" id="OP_ADM_LEADS" name="OP_ADM_LEADS" value="<?php echo $ID_LEADS; ?>">
<input type="hidden" id="F_USER_REGISTRO" name="F_USER_REGISTRO" value="<?php echo $USER_NOME; ?>">



<div class="box-body">
<div class="row">
<div class="col-lg-4">
<label for="exampleInputEmail1">Nome:</label>
<input type="text" class="form-control" value="<?php echo $LEADS_NOME; ?>" readonly >
</div>

<div class="col-lg-6">
<label for="exampleInputEmail1">Serviço Cotratado:</label>
<?php
if($FICHA_INTER_TIPO == '1')
$VAL_FICHA_INTER_TIPO = "REVISÃO DE CONTRATO - FINANCIAMENTO PARCELAS EM DIA";
elseif($FICHA_INTER_TIPO == '2')
$VAL_FICHA_INTER_TIPO = "REVISÃO DE CONTRATO - FINANCIAMENTO PARCELAS EM ATRASO";
elseif($FICHA_INTER_TIPO == '3')
$VAL_FICHA_INTER_TIPO = "REVISÃO DE CONTRATO - EMPRESTIMO PARCELAS EM DIA";
elseif($FICHA_INTER_TIPO == '4')
$VAL_FICHA_INTER_TIPO = "REVISÃO DE CONTRATO - EMPRESTIMO PARCELAS EM ATRASO";
elseif($FICHA_INTER_TIPO == '5')
$VAL_FICHA_INTER_TIPO = "REVISÃO DE CONTRATO - CONTRATOS QUITADOS";
?>
<input type="text" class="form-control" value="<?php echo $VAL_FICHA_INTER_TIPO; ?>" readonly >
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Tipo Faturamento:</label>
<select id="OP_ADM_FATURAMENTO" name="OP_ADM_FATURAMENTO" class="form-control" required />
<?php 
if($OP_ADM_FATURAMENTO == '1')
echo "<option value='1'> À Vista </option>";
elseif($OP_ADM_FATURAMENTO == '2')
echo "<option value='2'> Parcelado </option>";
?>
<option value=""></option>
<option value="1"> À Vista </option>
<option value="2"> Parcelado </option>
</select>
</div>

</div>
<br>

<div class="box-footer">
<button type="submit" class="btn btn-danger">Salvar Faturamento</button>
</div>
</form>



<div class="box box-danger">
</div>
<form 
<?php 
if($ID_LEADS_OP_ADM_DOC == '')
echo "action='op-adm-doc-cadastrar-actions.php'"; 
elseif($ID_LEADS_OP_ADM_DOC > '')
echo "action='op-adm-doc-alterar-actions.php'"; 
?> method='post' enctype="multipart/form-data" name="formulario" >
<input type="hidden" id="ID_LEADS_OP_ADM_DOC" name="ID_LEADS_OP_ADM_DOC" value="<?php echo $ID_LEADS_OP_ADM_DOC; ?>">
<input type="hidden" id="LEADS_OP_ADM_DOC_USER" name="LEADS_OP_ADM_DOC_USER" value="<?php echo $ID_USER; ?>">
<input type="hidden" id="LEADS_OP_ADM_DOC_LEADS" name="LEADS_OP_ADM_DOC_LEADS" value="<?php echo $ID_LEADS; ?>">
<input type="hidden" id="F_USER_REGISTRO" name="F_USER_REGISTRO" value="<?php echo $USER_NOME; ?>">


<div class="row">
<div class="col-lg-2">
<label for="exampleInputPassword1">Status do Doc.:</label>
<select id="LEADS_OP_ADM_DOC_STATUS" name="LEADS_OP_ADM_DOC_STATUS" class="form-control" required />
<?php 
if($LEADS_OP_ADM_DOC_STATUS == '1')
echo "<option value='1'> OK </option>";
elseif($LEADS_OP_ADM_DOC_STATUS == '2')
echo "<option value='2'> PENDENTE </option>";
?>
<option value=""></option>
<option value="1"> OK </option>
<option value="2"> PENDENTE </option>
</select>
</div>

<div class="col-lg-5">
<label for="exampleInputPassword1">Nome Doc's:</label>
<select id="LEADS_OP_ADM_DOC_TIPO" name="LEADS_OP_ADM_DOC_TIPO" class="form-control" required />
<?php 
if($LEADS_OP_ADM_DOC_TIPO == '1')
echo "<option value='1'> Contrato Assinado </option>";
elseif($LEADS_OP_ADM_DOC_TIPO == '2')
echo "<option value='2'> CNH </option>";
elseif($LEADS_OP_ADM_DOC_TIPO == '3')
echo "<option value='3'> RG </option>";
elseif($LEADS_OP_ADM_DOC_TIPO == '4')
echo "<option value='4'> CPF </option>";
elseif($LEADS_OP_ADM_DOC_TIPO == '5')
echo "<option value='5'> Contrato Financiamento </option>";
elseif($LEADS_OP_ADM_DOC_TIPO == '6')
echo "<option value='6'> Doc. do Veículo </option>";
elseif($LEADS_OP_ADM_DOC_TIPO == '7')
echo "<option value='7'> Ultima Parcela Paga </option>";
elseif($LEADS_OP_ADM_DOC_TIPO == '8')
echo "<option value='8'> Comprovante de Endereço </option>";
elseif($LEADS_OP_ADM_DOC_TIPO == '9')
echo "<option value='9'> Outros... </option>";
?>
<option value=""></option>
<option value="1"> Contrato Assinado </option>
<option value="2"> CNH </option>
<option value="3"> RG </option>
<option value="4"> CPF </option>
<option value="5"> Contrato Financiamento </option>
<option value="6"> Doc. do Veículo </option>
<option value="7"> Ultima Parcela Paga </option>
<option value="8"> Comprovante de Endereço </option>
<option value="9"> Outros... </option>
</select>
</div>


<div class="col-lg-5">
<label for="exampleInputEmail1">Arquivo/ Doc's:</label>
<input type="file" name="LEADS_OP_ADM_DOC_ARQUIVO" id="LEADS_OP_ADM_DOC_ARQUIVO" />
<input type="hidden" id="VALIDA_LEADS_OP_ADM_DOC_ARQUIVO" name="VALIDA_LEADS_OP_ADM_DOC_ARQUIVO" value="<?php echo $LEADS_OP_ADM_DOC_ARQUIVO; ?>">
</div>

</div>
<br>


<div class="form-group">
<label for="exampleInputEmail1">Observação:</label>
<textarea rows="4" class="form-control" id="LEADS_OP_ADM_DOC_OBS" name="LEADS_OP_ADM_DOC_OBS" placeholder="insira a observação"><?php echo $LEADS_OP_ADM_DOC_OBS; ?></textarea>
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

$sql_c_doc = mysqli_query($conexao,"SELECT * FROM tb_leads_op_adm_doc WHERE LEADS_OP_ADM_DOC_LEADS = '$ID_LEADS' AND LEADS_OP_ADM_DOC_STATUS < '3' ORDER BY ID_LEADS_OP_ADM_DOC DESC ");
while($val_c_doc = mysqli_fetch_object($sql_c_doc)):      

$ID_LEADS_OP_ADM_DOC			= isset($val_c_doc->ID_LEADS_OP_ADM_DOC) ? $val_c_doc->ID_LEADS_OP_ADM_DOC : '';
$LEADS_OP_ADM_DOC_STATUS		= isset($val_c_doc->LEADS_OP_ADM_DOC_STATUS) ? $val_c_doc->LEADS_OP_ADM_DOC_STATUS : '';
$LEADS_OP_ADM_DOC_LEADS			= isset($val_c_doc->LEADS_OP_ADM_DOC_LEADS) ? $val_c_doc->LEADS_OP_ADM_DOC_LEADS : '';
$LEADS_OP_ADM_DOC_TIPO			= isset($val_c_doc->LEADS_OP_ADM_DOC_TIPO) ? $val_c_doc->LEADS_OP_ADM_DOC_TIPO : '';
$LEADS_OP_ADM_DOC_ARQUIVO		= isset($val_c_doc->LEADS_OP_ADM_DOC_ARQUIVO) ? $val_c_doc->LEADS_OP_ADM_DOC_ARQUIVO : '';
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////

$index = $c % 2;
$c++;
//$cor = $cores[$index];
$IETM = $c - 2 ;
?>
<tr>
<td ><div align="center"><?php echo $ID_LEADS_OP_ADM_DOC; ?></div></td>
<td >
<?php 
if($LEADS_OP_ADM_DOC_TIPO == '1')
echo " Contrato Assinado ";
elseif($LEADS_OP_ADM_DOC_TIPO == '2')
echo " CNH ";
elseif($LEADS_OP_ADM_DOC_TIPO == '3')
echo " RG ";
elseif($LEADS_OP_ADM_DOC_TIPO == '4')
echo " CPF ";
elseif($LEADS_OP_ADM_DOC_TIPO == '5')
echo " Contrato Financiamento ";
elseif($LEADS_OP_ADM_DOC_TIPO == '6')
echo " Doc. do Veículo ";
elseif($LEADS_OP_ADM_DOC_TIPO == '7')
echo " Ultima Parcela Paga ";
elseif($LEADS_OP_ADM_DOC_TIPO == '8')
echo " Comprovante de Endereço ";
elseif($LEADS_OP_ADM_DOC_TIPO == '9')
echo " Outros... ";
?>
</td>
<td><div align="center"><a href="op-adm-docs/<?php echo $LEADS_OP_ADM_DOC_ARQUIVO; ?>" target="_blank"><i class="fa fa-download" style="color:#006600"></i></a></div></td>
<td><div align="center"><a href="op-adm-doc.php?ID_LEADS=<?php echo $ID_LEADS; ?>&&ID_LEADS_OP_ADM_DOC=<?php echo $ID_LEADS_OP_ADM_DOC; ?>"><i class="fa fa-refresh"></i></a></div></td>
<td><div align="center"><a href="excluir-op-adm-doc.php?ID_LEADS=<?php echo $ID_LEADS; ?>&&ID_LEADS_OP_ADM_DOC=<?php echo $ID_LEADS_OP_ADM_DOC; ?>"><i class="fa fa-close" style="color:#FF0000"></i></a></div></td>
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
