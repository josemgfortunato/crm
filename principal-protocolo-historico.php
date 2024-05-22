<?php
$ID_USER 		= isset($_COOKIE["ID_USER"]) ? $_COOKIE["ID_USER"] : '';
if($ID_USER == ''){	
include "sessao-expirou.php";
}

//include "Connections/conecta_banco.php";
include "valida_cookie_admin.php";


$ID_LEADS = isset($_GET['ID_LEADS']) ? $_GET['ID_LEADS'] : '';
///////////////////////////////////////////////////////
$sql_leads_val = mysqli_query($conexao,"select * from tb_ficha_intermediacao WHERE FICHA_INTER_LEADS = '$ID_LEADS' ");
$val_leads_val = mysqli_fetch_object($sql_leads_val);  
///////////////////////////////////////////////////////
//$val_ficaha_inter			= isset($val_leads_val->ID_FICHA_INTER) ? $val_leads_val->ID_FICHA_INTER : '';

$ID_FICHA_INTER 			= isset($val_leads_val->ID_FICHA_INTER) ? $val_leads_val->ID_FICHA_INTER : '';
$FICHA_INTER_USER 			= isset($val_leads_val->FICHA_INTER_USER) ? $val_leads_val->FICHA_INTER_USER : '';
$FICHA_INTER_STATUS 		= isset($val_leads_val->FICHA_INTER_STATUS) ? $val_leads_val->FICHA_INTER_STATUS : '';
$FICHA_INTER_TIPO			= isset($val_leads_val->FICHA_INTER_TIPO) ? $val_leads_val->FICHA_INTER_TIPO : '';
$FICHA_INTER_LEADS			= isset($val_leads_val->FICHA_INTER_LEADS) ? $val_leads_val->FICHA_INTER_LEADS : '';
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
$FICHA_INTER_ENVIO			= isset($val_leads_val->FICHA_INTER_ENVIO) ? $val_leads_val->FICHA_INTER_ENVIO : '';
$FICHA_INTER_ENVIO_HORARIO	= isset($val_leads_val->FICHA_INTER_ENVIO_HORARIO) ? $val_leads_val->FICHA_INTER_ENVIO_HORARIO : '';
$FICHA_INTER_ENVIO_ENDERECO	= isset($val_leads_val->FICHA_INTER_ENVIO_ENDERECO) ? $val_leads_val->FICHA_INTER_ENVIO_ENDERECO : '';
$FICHA_INTER_ENVIO_N		= isset($val_leads_val->FICHA_INTER_ENVIO_N) ? $val_leads_val->FICHA_INTER_ENVIO_N : '';
$FICHA_INTER_ENVIO_COMP		= isset($val_leads_val->FICHA_INTER_ENVIO_COMP) ? $val_leads_val->FICHA_INTER_ENVIO_COMP : '';
$FICHA_INTER_ENVIO_CEP		= isset($val_leads_val->FICHA_INTER_ENVIO_CEP) ? $val_leads_val->FICHA_INTER_ENVIO_CEP : '';
$FICHA_INTER_ENVIO_BAIRRO	= isset($val_leads_val->FICHA_INTER_ENVIO_BAIRRO) ? $val_leads_val->FICHA_INTER_ENVIO_BAIRRO : '';
$FICHA_INTER_ENVIO_CIDADE	= isset($val_leads_val->FICHA_INTER_ENVIO_CIDADE) ? $val_leads_val->FICHA_INTER_ENVIO_CIDADE : '';

$FICHA_INTER_BUSCA_APREENSAO			= isset($val_leads_val->FICHA_INTER_BUSCA_APREENSAO) ? $val_leads_val->FICHA_INTER_BUSCA_APREENSAO : '';

$FICHA_INTER_BANCO			= isset($val_leads_val->FICHA_INTER_BANCO) ? $val_leads_val->FICHA_INTER_BANCO : '';
$FICHA_INTER_VEICULO		= isset($val_leads_val->FICHA_INTER_VEICULO) ? $val_leads_val->FICHA_INTER_VEICULO : '';
$FICHA_INTER_VALOR_FIN		= isset($val_leads_val->FICHA_INTER_VALOR_FIN) ? $val_leads_val->FICHA_INTER_VALOR_FIN : '';
$FICHA_INTER_VALOR_PARC		= isset($val_leads_val->FICHA_INTER_VALOR_PARC) ? $val_leads_val->FICHA_INTER_VALOR_PARC : '';
$FICHA_INTER_PAGA			= isset($val_leads_val->FICHA_INTER_PAGA) ? $val_leads_val->FICHA_INTER_PAGA : '';
$FICHA_INTER_ATRASO			= isset($val_leads_val->FICHA_INTER_ATRASO) ? $val_leads_val->FICHA_INTER_ATRASO : '';
$FICHA_INTER_OBS			= isset($val_leads_val->FICHA_INTER_OBS) ? $val_leads_val->FICHA_INTER_OBS : '';
///////////////////////////////////////////////////////
///////////////////////////////////////////////////////

if($ID_FICHA_INTER > '')	{
//$ID_FICHA_INTER = $val_ficaha_inter;

///////////////////////////////////////////////////////
$sql_clientes = mysqli_query($conexao,"select * from tb_clientes WHERE ID_CLIENTE = '$FICHA_INTER_CLIENTE' ");
$val_clientes = mysqli_fetch_object($sql_clientes);  
///////////////////////////////////////////////////////
$ID_CLIENTE 				= isset($val_clientes->ID_CLIENTE) ? $val_clientes->ID_CLIENTE : '';
$CLIENTE_USER	 			= isset($val_clientes->CLIENTE_USER) ? $val_clientes->CLIENTE_USER : '';
$CLIENTE_STATUS 			= isset($val_clientes->CLIENTE_STATUS) ? $val_clientes->CLIENTE_STATUS : '';
$CLIENTE_TIPO 				= isset($val_clientes->CLIENTE_TIPO) ? $val_clientes->CLIENTE_TIPO : '';
$CLIENTE_NOME 				= isset($val_clientes->CLIENTE_NOME) ? $val_clientes->CLIENTE_NOME : '';
$CLIENTE_RESPONSAVEL		= isset($val_clientes->CLIENTE_RESPONSAVEL) ? $val_clientes->CLIENTE_RESPONSAVEL : '';
$CLIENTE_CNPJ		 		= isset($val_clientes->CLIENTE_CNPJ) ? $val_clientes->CLIENTE_CNPJ : '';
$CLIENTE_CPF		 		= isset($val_clientes->CLIENTE_CPF) ? $val_clientes->CLIENTE_CPF : '';
$CLIENTE_RG			 		= isset($val_clientes->CLIENTE_RG) ? $val_clientes->CLIENTE_RG : '';
$CLIENTE_DATA_NASC	 		= isset($val_clientes->CLIENTE_DATA_NASC) ? $val_clientes->CLIENTE_DATA_NASC : '';
$CLIENTE_TELEFONE_1 		= isset($val_clientes->CLIENTE_TELEFONE_1) ? $val_clientes->CLIENTE_TELEFONE_1 : '';
$CLIENTE_TELEFONE_2 		= isset($val_clientes->CLIENTE_TELEFONE_2) ? $val_clientes->CLIENTE_TELEFONE_2 : '';
$CLIENTE_ESTADO_CIVIL		= isset($val_clientes->CLIENTE_ESTADO_CIVIL) ? $val_clientes->CLIENTE_ESTADO_CIVIL : '';
$CLIENTE_PROFISSAO			= isset($val_clientes->CLIENTE_PROFISSAO) ? $val_clientes->CLIENTE_PROFISSAO : '';
$CLIENTE_EMAIL 				= isset($val_clientes->CLIENTE_EMAIL) ? $val_clientes->CLIENTE_EMAIL : '';
$CLIENTE_ENDERECO 			= isset($val_clientes->CLIENTE_ENDERECO) ? $val_clientes->CLIENTE_ENDERECO : '';
$CLIENTE_N 					= isset($val_clientes->CLIENTE_N) ? $val_clientes->CLIENTE_N : '';
$CLIENTE_COMPLEMENTO 		= isset($val_clientes->CLIENTE_COMPLEMENTO) ? $val_clientes->CLIENTE_COMPLEMENTO : '';
$CLIENTE_BAIRRO 			= isset($val_clientes->CLIENTE_BAIRRO) ? $val_clientes->CLIENTE_BAIRRO : '';
$CLIENTE_CIDADE 			= isset($val_clientes->CLIENTE_CIDADE) ? $val_clientes->CLIENTE_CIDADE : '';
$CLIENTE_UF 				= isset($val_clientes->CLIENTE_UF) ? $val_clientes->CLIENTE_UF : '';
$CLIENTE_CEP 				= isset($val_clientes->CLIENTE_CEP) ? $val_clientes->CLIENTE_CEP : '';
$CLIENTE_OBS	 			= isset($val_clientes->CLIENTE_OBS) ? $val_clientes->CLIENTE_OBS : '';
}

///////////////////////////////////////////////////////
$sql_leads = mysqli_query($conexao,"select * from tb_leads WHERE ID_LEADS = '$ID_LEADS' ");
$val_leads = mysqli_fetch_object($sql_leads);  
///////////////////////////////////////////////////////

$ID_LEADS 					= isset($val_leads->ID_LEADS) ? $val_leads->ID_LEADS : '';
$LEADS_USER 				= isset($val_leads->LEADS_USER) ? $val_leads->LEADS_USER : '';	
$LEADS_STATUS 				= isset($val_leads->LEADS_STATUS) ? $val_leads->LEADS_STATUS : '';	
$LEADS_TIPO					= isset($val_leads->LEADS_TIPO) ? $val_leads->LEADS_TIPO : '';	

$LEADS_FORNECEDOR 			= isset($val_leads->LEADS_FORNECEDOR) ? $val_leads->LEADS_FORNECEDOR : '';	
$LEADS_SUPERVISOR 			= isset($val_leads->LEADS_SUPERVISOR) ? $val_leads->LEADS_SUPERVISOR : '';	

$LEADS_PRIORIDADE 			= isset($val_leads->LEADS_PRIORIDADE) ? $val_leads->LEADS_PRIORIDADE : '';	

$LEADS_DISTRIBUIDO_DATA		= isset($val_leads->LEADS_DISTRIBUIDO_DATA) ? $val_leads->LEADS_DISTRIBUIDO_DATA : '';	
$LEADS_DISTRIBUIDO_DATA_DIA = substr($LEADS_DISTRIBUIDO_DATA, 8, 4);
$LEADS_DISTRIBUIDO_DATA_MES = substr($LEADS_DISTRIBUIDO_DATA, 5, 2);
$LEADS_DISTRIBUIDO_DATA_ANO = substr($LEADS_DISTRIBUIDO_DATA, 0, 4);
$LEADS_DISTRIBUIDO_DATA = $LEADS_DISTRIBUIDO_DATA_DIA.'/'.$LEADS_DISTRIBUIDO_DATA_MES.'/'.$LEADS_DISTRIBUIDO_DATA_ANO;


$LEADS_DATA 				= isset($val_leads->LEADS_DATA) ? $val_leads->LEADS_DATA : '';	
$LEADS_DATA_DIA = substr($LEADS_DATA, 8, 4);
$LEADS_DATA_MES = substr($LEADS_DATA, 5, 2);
$LEADS_DATA_ANO = substr($LEADS_DATA, 0, 4);
$LEADS_DATA = $LEADS_DATA_DIA.'/'.$LEADS_DATA_MES.'/'.$LEADS_DATA_ANO;

$CLIENTE_NOME 				= isset($val_leads->LEADS_NOME) ? $val_leads->LEADS_NOME : '';	
$CLIENTE_EMAIL	 			= isset($val_leads->LEADS_EMAIL) ? $val_leads->LEADS_EMAIL : '';	
$CLIENTE_TELEFONE_1		 	= isset($val_leads->LEADS_TEL1) ? $val_leads->LEADS_TEL1 : '';	
$CLIENTE_TELEFONE_2		 	= isset($val_leads->LEADS_TEL2) ? $val_leads->LEADS_TEL2 : '';	


///////////////////////////////////////////////////////
$sql_op_adm = mysqli_query($conexao,"select * from tb_leads_op_adm WHERE OP_ADM_LEADS = '$ID_LEADS' ");
$val_op_adm = mysqli_fetch_object($sql_op_adm);  
///////////////////////////////////////////////////////

$ID_OP_ADM 				= isset($val_op_adm->ID_OP_ADM) ? $val_op_adm->ID_OP_ADM : '';

$OP_ADM_DATA 			= isset($val_op_adm->OP_ADM_DATA) ? $val_op_adm->OP_ADM_DATA : '';	
$OP_ADM_DATA_DIA = substr($OP_ADM_DATA, 8, 4);
$OP_ADM_DATA_MES = substr($OP_ADM_DATA, 5, 2);
$OP_ADM_DATA_ANO = substr($OP_ADM_DATA, 0, 4);
$OP_ADM_DATA = $OP_ADM_DATA_DIA.'/'.$OP_ADM_DATA_MES.'/'.$OP_ADM_DATA_ANO;

$OP_ADM_DATA_ENVIO_JUR 		= isset($val_op_adm->OP_ADM_DATA_ENVIO_JUR) ? $val_op_adm->OP_ADM_DATA_ENVIO_JUR : '';	
$OP_ADM_DATA_ENVIO_JUR_DIA = substr($OP_ADM_DATA_ENVIO_JUR, 8, 4);
$OP_ADM_DATA_ENVIO_JUR_MES = substr($OP_ADM_DATA_ENVIO_JUR, 5, 2);
$OP_ADM_DATA_ENVIO_JUR_ANO = substr($OP_ADM_DATA_ENVIO_JUR, 0, 4);
$OP_ADM_DATA_ENVIO_JUR = $OP_ADM_DATA_ENVIO_JUR_DIA.'/'.$OP_ADM_DATA_ENVIO_JUR_MES.'/'.$OP_ADM_DATA_ENVIO_JUR_ANO;


///////////////////////////////////////////////////////
//$sql_retencao = mysqli_query($conexao,"select * from tb_retencao WHERE RETENCAO_LEADS = '$ID_LEADS' ");
//$val_retencao = mysqli_fetch_object($sql_retencao);  
///////////////////////////////////////////////////////

//$ID_RETENCAO 				= isset($val_retencao->ID_RETENCAO) ? $val_retencao->ID_RETENCAO : '';
//$RETENCAO_LEADS 			= isset($val_retencao->RETENCAO_LEADS) ? $val_retencao->RETENCAO_LEADS : '';

//$RETENCAO_DATA 			= isset($val_op_adm->RETENCAO_DATA) ? $val_op_adm->RETENCAO_DATA : '';	
//$RETENCAO_DATA_DIA = substr($RETENCAO_DATA, 8, 4);
//$RETENCAO_DATA_MES = substr($RETENCAO_DATA, 5, 2);
//$RETENCAO_DATA_ANO = substr($RETENCAO_DATA, 0, 4);
//$RETENCAO_DATA = $RETENCAO_DATA_DIA.'/'.$RETENCAO_DATA_MES.'/'.$RETENCAO_DATA_ANO;

$RETENCAO_DATA = date("d/m/Y");


//$RETENCAO_NOME 			= isset($val_retencao->RETENCAO_NOME) ? $val_retencao->RETENCAO_NOME : '';
//$RETENCAO_CPF 			= isset($val_retencao->RETENCAO_CPF) ? $val_retencao->RETENCAO_CPF : '';
//$RETENCAO_TEL 			= isset($val_retencao->RETENCAO_TEL) ? $val_retencao->RETENCAO_TEL : '';

//$RETENCAO_ASSUNTO 			= isset($val_retencao->RETENCAO_ASSUNTO) ? $val_retencao->RETENCAO_ASSUNTO : '';
//$RETENCAO_DESCRICAO			= isset($val_retencao->RETENCAO_DESCRICAO) ? $val_retencao->RETENCAO_DESCRICAO : '';



//////////////////////////////////////////////////////////////////////////////////////////////////////////////
/// VALIDA USER
$sql_operador = mysqli_query($conexao,"select * from tb_administrador WHERE ID_ADMINISTRADOR = '$FICHA_INTER_USER' ");
$val_operador = mysqli_fetch_object($sql_operador);  
///////////////////////////////////////////////////////
$val_operador 					= isset($val_operador->ADMINISTRADOR_NOME) ? $val_operador->ADMINISTRADOR_NOME : '';

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
/// VALIDA SUPERVISOR
$sql_supervisor = mysqli_query($conexao,"select * from tb_administrador WHERE ID_ADMINISTRADOR = '$LEADS_SUPERVISOR' ");
$val_supervisor = mysqli_fetch_object($sql_supervisor);  
///////////////////////////////////////////////////////
$val_supervisor 					= isset($val_supervisor->ADMINISTRADOR_NOME) ? $val_supervisor->ADMINISTRADOR_NOME : '';

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
  <style>
    .color-palette {
      height: 35px;
      line-height: 35px;
      text-align: center;
    }

    .color-palette-set {
      margin-bottom: 15px;
    }

    .color-palette span {
      display: none;
      font-size: 12px;
    }

    .color-palette:hover span {
      display: block;
    }

    .color-palette-box h4 {
      position: absolute;
      top: 100%;
      left: 25px;
      margin-top: -40px;
      color: rgba(255, 255, 255, 0.8);
      font-size: 12px;
      display: block;
      z-index: 7;
    }
  .style1 {color: #0000FF}
  </style>
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
        Hunting Assessoria |
      <small>painel de controle</small>      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Painel de Controle</li>
      </ol>
    </section>





<!-- Main content -->
<section class="content">
 
<!-- START CUSTOM TABS -->
<div class="row">
<div class="col-md-12">
<!-- Custom Tabs -->

          <div class="box box-danger">
            <div class="box-header">
              
<!--
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="30%"><h3 class="box-title">Pesquisa Lead's
<strong>
<?php
//if($val_status == '1')
//echo ' - " Acordo/ Revisão " ';
//elseif($val_status == '7')
//echo ' - " Em Negociação " ';
//elseif($val_status == '8')
//echo ' - " Whatsapp " ';
?></strong>    </h3></td>

<td width="30%">
<div align="right">
<form action="pesquisa-leads.php" method="post" >
<div class="col-lg-3">
<input type="text" class="form-control" id="val_id_pesquisa" name="val_id_pesquisa" placeholder="insira o id" value="<?php echo $val_id_pesquisa; ?>" required />
</div>


<div align="left">
<button type="submit" class="btn btn-danger">Pesquisar por ID</button>
</div>
</form> 
</div> 
</td>



<td width="40%" align="right">
<form action="pesquisa-leads.php" method="post" >
<div class="col-lg-4">
<select id="val_status" name="val_status" class="form-control" required="required">
<option value=""> Selecione o STATUS: </option>
<?php 
if($val_status == '1')
echo "<option value='1' selected> Acordo/ Revisão </option>";
elseif($val_status == '2')
echo "<option value='2' selected> Não Atende </option>";
elseif($val_status == '3')
echo "<option value='3' selected> Recado </option>";
elseif($val_status == '4')
echo "<option value='4' selected> Devolução Carro </option>";
elseif($val_status == '5')
echo "<option value='5' selected> Recusa/ Ñ tem interesse </option>";
elseif($val_status == '6')
echo "<option value='6' selected> Follow Up </option>";
elseif($val_status == '7')
echo "<option value='7' selected> Em Negociação </option>";
elseif($val_status == '8')
echo "<option value='8' selected> Whatsapp </option>";
?>

<option value=""></option>
<option value="1"> Acordo/ Revisão </option>
<option value="2"> Não Atende </option>
<option value="3"> Recado </option>
<option value="4"> Devolução Carro </option>
<option value="5"> Recusa/ Ñ tem interesse </option>
<option value="6"> Follow Up </option>
<option value="7"> Em Negociação </option>
<option value="8"> Whatsapp </option>
</select>
</div>


<div align="left">
<button type="submit" class="btn btn-danger">Pesquisar</button>
</div>
</form> 
</div> 
</td>

</tr>
</table>
-->




<table width="500" border="0" cellpadding="0" cellspacing="0" >
  <tr>
    <td width="150" height="30">Pesquisar por Protocolo:</td>
    <td>
<form action="principal-protocolo-historico.php" method="get" >
<input type="text" class="form-control" id="ID_LEADS" name="ID_LEADS" placeholder="insira o protocolo" value="<?php echo $ID_LEADS; ?>" required />
    </td>
    <td>
<div align="right">
<button type="submit" class="btn btn-danger">Pesquisar Protocolo:</button>
</div>
</form> 
    </td>
  </tr>
</table>
            </div>
            <!-- /.box-header -->
<br>


<div class="nav-tabs-custom">
<ul class="nav nav-tabs">
<li class="active"><a href="#tab_1" data-toggle="tab">COMERCIAL</a></li>
<li><a href="#tab_2" data-toggle="tab">JURIDICO</a></li>
<li><a href="#tab_3" data-toggle="tab">RETENÇÃO</a></li>
<li><a href="#tab_4" data-toggle="tab">PROCESSUAL</a></li>

<!--
<li class="dropdown">
<a class="dropdown-toggle" data-toggle="dropdown" href="#">
Dropdown <span class="caret"></span>
</a>
<ul class="dropdown-menu">
<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
<li role="presentation" class="divider"></li>
<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
</ul>
</li>
-->



<?php
if($ID_LEADS > '')	{
?>
<li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
</ul>
<div class="tab-content">
<div class="tab-pane active" id="tab_1">
<!--
<b>How to use:</b>
-->
<div class="box-body">
<table id="example2" class="table table-bordered table-hover">
<thead>
<tr>
<th bgcolor="#ecf0f5"><div align="left">DATA LEADS<div align="center"></th>
<th ><div align="center" class="style1"><?php echo $LEADS_DATA; ?></div></th>
<th bgcolor="#ecf0f5"><div align="center">SUPERVISOR</div></th>
<th ><div align="center" class="style1"><?php echo $val_supervisor; ?></div></th>
<th bgcolor="#ecf0f5"><div align="center">FORNECEDOR</div></th>
<th ><div align="center" class="style1">
<?php 
if($LEADS_FORNECEDOR == '1')
echo "DANIEL";
elseif($LEADS_FORNECEDOR == '2')
echo "JULIO MKT NOVO";
elseif($LEADS_FORNECEDOR == '3')
echo "SITE";
elseif($LEADS_FORNECEDOR == '4')
echo "GOOGLE";
elseif($LEADS_FORNECEDOR == '5')
echo "INSTAGRAM";
elseif($LEADS_FORNECEDOR == '6')
echo "FACEBOOK";
elseif($LEADS_FORNECEDOR == '7')
echo "INDICAÇÃO";
elseif($LEADS_FORNECEDOR == '8')
echo "OUTROS";
elseif($LEADS_FORNECEDOR == '9')
echo "REPIQUE HEDGE";
elseif($LEADS_FORNECEDOR == '10')
echo "REPIQUE AVT PRIME";
elseif($LEADS_FORNECEDOR == '11')
echo "HEDGE NOVO";
elseif($LEADS_FORNECEDOR == '12')
echo "REPIQUE";
elseif($LEADS_FORNECEDOR == '13')
echo "TIKTOK DANIEL";
elseif($LEADS_FORNECEDOR == '14')
echo "REPIQUE INTERNO";
?></div></th>
</tr>
<tr>
  <th bgcolor="#ecf0f5"><div align="left">DATA DISTRIBUIDO</div></th>
  <th ><div align="center" class="style1"><?php echo $LEADS_DISTRIBUIDO_DATA; ?></div></th>
  <th bgcolor="#ecf0f5"><div align="center">OPERADOR</div></th>
  <th ><div align="center" class="style1"><?php echo $val_operador; ?></div></th>
  <th bgcolor="#ecf0f5"><div align="center">DATA FECHAMENTO</div></th>
  <th ><div align="center" class="style1"><?php echo $FICHA_INTER_DATA; ?></div></th>
</tr>
<tr>
  <th bgcolor="#ecf0f5"><div align="left">ENVIADO OPERADOR ADM</div></th>
  <th ><div align="center" class="style1"><?php echo $OP_ADM_DATA; ?></div></th>
  <th bgcolor="#ecf0f5"><div align="center">ENVIADO JURÍDICO<div align="center"></th>
  <th ><div align="center" class="style1"><?php echo $OP_ADM_DATA_ENVIO_JUR; ?></div></th>
  <th bgcolor="#ecf0f5">&nbsp;</th>
  <th bgcolor="#ecf0f5">&nbsp;</th>
</tr>
</thead>
</table>
<br>


<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30" bgcolor="#FFFF00"><div align="center"><strong>HUNTING ASSESSORIA | DADOS BÁSICOS</strong></div></td>
  </tr>
</table>
<br>

<div class="row">
<div class="col-lg-2">
<label for="exampleInputPassword1">Data Fechamento:</label>
<input type="text" class="form-control" id="FICHA_INTER_DATA" name="FICHA_INTER_DATA" placeholder="insira a data" value="<?php echo $FICHA_INTER_DATA; ?>" readonly >
</div>

<div class="col-lg-6">
<label for="exampleInputPassword1">Cliente:</label>
<input type="text" class="form-control" id="CLIENTE_NOME" name="CLIENTE_NOME" placeholder="insira o cliente" value="<?php echo $CLIENTE_NOME; ?>" readonly>
</div>

<div class="col-lg-4">
<label for="exampleInputPassword1">Consultor/ Operador:</label>
<input type="text" class="form-control" value="<?php echo $val_operador; //$USER_NOME; ?>" readonly >
</div>

</div>
<br>


<div class="row">
<div class="col-lg-2">
<label for="exampleInputPassword1">CNPJ:</label>
<input type="text" class="form-control" id="CLIENTE_CNPJ" name="CLIENTE_CNPJ" placeholder="00.000.000/0001-00 " value="<?php echo $CLIENTE_CNPJ; ?>" readonly />
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">CPF:</label>
<input type="text" class="form-control" id="CLIENTE_CPF" name="CLIENTE_CPF" placeholder="000.000.000-00 " value="<?php echo $CLIENTE_CPF; ?>" readonly />
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">RG:</label>
<input type="text" class="form-control" id="CLIENTE_RG" name="CLIENTE_RG" placeholder="00.000.000-0 " value="<?php echo $CLIENTE_RG; ?>" readonly />
</div>

<div class="col-lg-4">
<label for="exampleInputPassword1">E-mail:</label>
<input type="email" class="form-control" id="CLIENTE_EMAIL" name="CLIENTE_EMAIL" placeholder="insira o e-mail " value="<?php echo $CLIENTE_EMAIL; ?>" readonly />
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Data de Nasc.:</label>
<input type="text" class="form-control" id="CLIENTE_DATA_NASC" name="CLIENTE_DATA_NASC" placeholder="insira a data de nascimento " value="<?php echo $CLIENTE_DATA_NASC; ?>" readonly />
</div>

</div>
<br>



<div class="row">
<div class="col-lg-4">
<label for="exampleInputPassword1">Estado Civil:</label>
<input type="text" class="form-control" id="CLIENTE_ESTADO_CIVIL" name="CLIENTE_ESTADO_CIVIL" placeholder="insira o estado civel " value="<?php echo $CLIENTE_ESTADO_CIVIL; ?>" readonly />
</div>

<div class="col-lg-4">
<label for="exampleInputPassword1">Profissão:</label>
<input type="text" class="form-control" id="CLIENTE_PROFISSAO" name="CLIENTE_PROFISSAO" placeholder="insira a profissão " value="<?php echo $CLIENTE_PROFISSAO; ?>" readonly />
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Tel - 1:</label>
<input type="text" class="form-control" id="CLIENTE_TELEFONE_1" name="CLIENTE_TELEFONE_1" placeholder="(00) 0000-0000 " value="<?php echo $CLIENTE_TELEFONE_1; ?>" readonly />
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Tel -2:</label>
<input type="text" class="form-control" id="CLIENTE_TELEFONE_2" name="CLIENTE_TELEFONE_2" placeholder="(00) 0000-0000 " value="<?php echo $CLIENTE_TELEFONE_2; ?>" readonly />
</div>

</div>
<br>


<div class="row">
<div class="col-lg-2">
<label for="exampleInputPassword1">CEP:</label>
<input type="text" class="form-control" id="CLIENTE_CEP" name="CLIENTE_CEP" placeholder="00000-000 " value="<?php echo $CLIENTE_CEP; ?>" readonly />
</div>

<div class="col-lg-9">
<label for="exampleInputPassword1">Endereço:</label>
<input type="text" class="form-control" id="CLIENTE_ENDERECO" name="CLIENTE_ENDERECO" placeholder="Insira o Endereço " value="<?php echo $CLIENTE_ENDERECO; ?>" readonly />
</div>

<div class="col-lg-1">
<label for="exampleInputPassword1">Nº:</label>
<input type="text" class="form-control" id="CLIENTE_N" name="CLIENTE_N" placeholder="Nº " value="<?php echo $CLIENTE_N; ?>" readonly />
</div>


</div>
<br>

<div class="row">
<div class="col-lg-4">
<label for="exampleInputPassword1">Complemento:</label>
<input type="text" class="form-control" id="CLIENTE_COMPLEMENTO" name="CLIENTE_COMPLEMENTO" placeholder="Insira o Complemento " value="<?php echo $CLIENTE_COMPLEMENTO; ?>" readonly />
</div>

<div class="col-lg-4">
<label for="exampleInputPassword1">Bairro:</label>
<input type="text" class="form-control" id="CLIENTE_BAIRRO" name="CLIENTE_BAIRRO" placeholder="Insira o Bairro " value="<?php echo $CLIENTE_BAIRRO; ?>" readonly />
</div>

<div class="col-lg-3">
<label for="exampleInputPassword1">Cidade:</label>
<input type="text" class="form-control" id="CLIENTE_CIDADE" name="CLIENTE_CIDADE" placeholder="Insira a Cidade " value="<?php echo $CLIENTE_CIDADE; ?>" readonly />
</div>


<div class="col-lg-1">
<label for="exampleInputPassword1">UF:</label>
<input type="text" class="form-control" id="CLIENTE_UF" name="CLIENTE_UF" value="<?php echo $CLIENTE_UF; ?>" readonly />
</div>

</div>
<br>



<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30" bgcolor="#FFFF00"><div align="center"><strong>FORMA DE ENVIO DE CONTRATO</strong></div></td>
  </tr>
</table>
<br>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td width="33%">
<label for="exampleInputPassword1">EMAIL:</label> 
(	
<?php
if($FICHA_INTER_ENVIO == '1')
echo "<input type='radio' id='FICHA_INTER_ENVIO' name='FICHA_INTER_ENVIO' value='1' checked />";
//else
//echo "<input type='radio' id='FICHA_INTER_ENVIO' name='FICHA_INTER_ENVIO' value='1' />";
?>	 )</td>
<td width="33%">
<label for="exampleInputPassword1">RECEPÇÃO:</label>
(	
<?php
if($FICHA_INTER_ENVIO == '2')
echo "<input type='radio' id='FICHA_INTER_ENVIO' name='FICHA_INTER_ENVIO' value='2' checked />";
//else
//echo "<input type='radio' id='FICHA_INTER_ENVIO' name='FICHA_INTER_ENVIO' value='2' />";
?>	 )</td>
<td width="33%">
<label for="exampleInputPassword1">MOTOBOY:</label>
(	
<?php
if($FICHA_INTER_ENVIO == '3')
echo "<input type='radio' id='FICHA_INTER_ENVIO' name='FICHA_INTER_ENVIO' value='3' checked />";
//else
//echo "<input type='radio' id='FICHA_INTER_ENVIO' name='FICHA_INTER_ENVIO' value='3' />";
?>	 )</td>
</tr>
</table>
<br>



<div class="row">
<div class="col-lg-2">
<label for="exampleInputPassword1">HORÁRIO:</label>
<input type="text" class="form-control" id="FICHA_INTER_ENVIO_HORARIO" name="FICHA_INTER_ENVIO_HORARIO" placeholder="00:00 " value="<?php echo $FICHA_INTER_ENVIO_HORARIO; ?>" readonly />
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">CEP:</label>
<input type="text" class="form-control" id="FICHA_INTER_ENVIO_CEP" name="FICHA_INTER_ENVIO_CEP" placeholder="00000-000 " value="<?php echo $FICHA_INTER_ENVIO_CEP; ?>" readonly />
</div>

<div class="col-lg-7">
<label for="exampleInputPassword1">Endereço:</label>
<input type="text" class="form-control" id="FICHA_INTER_ENVIO_ENDERECO" name="FICHA_INTER_ENVIO_ENDERECO" placeholder="insira o endereço " value="<?php echo $FICHA_INTER_ENVIO_ENDERECO; ?>" readonly />
</div>

<div class="col-lg-1">
<label for="exampleInputPassword1">Nº:</label>
<input type="text" class="form-control" id="FICHA_INTER_ENVIO_N" name="FICHA_INTER_ENVIO_N" placeholder="Nº " value="<?php echo $FICHA_INTER_ENVIO_N; ?>" readonly />
</div>


</div>
<br>

<div class="row">
<div class="col-lg-4">
<label for="exampleInputPassword1">Complemento:</label>
<input type="text" class="form-control" id="FICHA_INTER_ENVIO_COMP" name="FICHA_INTER_ENVIO_COMP" placeholder="insira o complemento " value="<?php echo $FICHA_INTER_ENVIO_COMP; ?>" readonly />
</div>

<div class="col-lg-4">
<label for="exampleInputPassword1">Bairro:</label>
<input type="text" class="form-control" id="FICHA_INTER_ENVIO_BAIRRO" name="FICHA_INTER_ENVIO_BAIRRO" placeholder="insira o bairro " value="<?php echo $FICHA_INTER_ENVIO_BAIRRO; ?>" readonly />
</div>

<div class="col-lg-4">
<label for="exampleInputPassword1">Cidade:</label>
<input type="text" class="form-control" id="FICHA_INTER_ENVIO_CIDADE" name="FICHA_INTER_ENVIO_CIDADE" placeholder="insira a cidade " value="<?php echo $FICHA_INTER_ENVIO_CIDADE; ?>" readonly />
</div>


</div>
<br>




<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30" bgcolor="#FFFF00"><div align="center"><strong>SERVIÇO CONTRATADO</strong></div></td>
  </tr>
</table>
<br>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td width="50%" height="30">
<label for="exampleInputPassword1">REVISÃO DE CONTRATO - FINANCIAMENTO PARCELAS EM DIA:</label> 
(	
<?php
if($FICHA_INTER_TIPO == '1')
echo "<input type='radio' id='FICHA_INTER_TIPO' name='FICHA_INTER_TIPO' value='1' checked />";
//else
//echo "<input type='radio' id='FICHA_INTER_TIPO' name='FICHA_INTER_TIPO' value='1' />";
?>	 )</td>
<td width="50%">
<label for="exampleInputPassword1">REVISÃO DE CONTRATO - FINANCIAMENTO PARCELAS EM ATRASO:</label>
(	
<?php
if($FICHA_INTER_TIPO == '2')
echo "<input type='radio' id='FICHA_INTER_TIPO' name='FICHA_INTER_TIPO' value='2' checked />";
//else
//echo "<input type='radio' id='FICHA_INTER_TIPO' name='FICHA_INTER_TIPO' value='2' />";
?>	 )</td>
</tr>
<tr>
<td width="50%" height="30">
<label for="exampleInputPassword1">REVISÃO DE CONTRATO - EMPRESTIMO PARCELAS EM DIA:</label> 
(	
<?php
if($FICHA_INTER_TIPO == '3')
echo "<input type='radio' id='FICHA_INTER_TIPO' name='FICHA_INTER_TIPO' value='3' checked />";
//else
//echo "<input type='radio' id='FICHA_INTER_TIPO' name='FICHA_INTER_TIPO' value='3' />";
?>	 )</td>
<td width="50%">
<label for="exampleInputPassword1">REVISÃO DE CONTRATO - EMPRESTIMO PARCELAS EM ATRASO:</label>
(	
<?php
if($FICHA_INTER_TIPO == '4')
echo "<input type='radio' id='FICHA_INTER_TIPO' name='FICHA_INTER_TIPO' value='4' checked />";
//else
//echo "<input type='radio' id='FICHA_INTER_TIPO' name='FICHA_INTER_TIPO' value='4' />";
?>	 )</td>
</tr>
<tr>
<td width="50%" height="30">
<label for="exampleInputPassword1">REVISÃO DE CONTRATO - CONTRATOS QUITADOS:</label> 
(	
<?php
if($FICHA_INTER_TIPO == '5')
echo "<input type='radio' id='FICHA_INTER_TIPO' name='FICHA_INTER_TIPO' value='5' checked />";
//else
//echo "<input type='radio' id='FICHA_INTER_TIPO' name='FICHA_INTER_TIPO' value='5' />";
?>	 )</td>



<td width="50%" bgcolor="#ecf0f5">
<label for="exampleInputPassword1">&nbsp;BUSCA E APREENSÃO:</label>
&nbsp;&nbsp;&nbsp; SIM (
<?php
if($FICHA_INTER_BUSCA_APREENSAO == '1')
echo "<input type='radio' id='FICHA_INTER_BUSCA_APREENSAO' name='FICHA_INTER_BUSCA_APREENSAO' value='1' checked />";
//else
//echo "<input type='radio' id='FICHA_INTER_BUSCA_APREENSAO' name='FICHA_INTER_BUSCA_APREENSAO' value='1' required />";
?> 
)

&nbsp;&nbsp;&nbsp; NÃO  (
<?php
if($FICHA_INTER_BUSCA_APREENSAO == '2')
echo "<input type='radio' id='FICHA_INTER_BUSCA_APREENSAO' name='FICHA_INTER_BUSCA_APREENSAO' value='2' checked />";
//else
//echo "<input type='radio' id='FICHA_INTER_BUSCA_APREENSAO' name='FICHA_INTER_BUSCA_APREENSAO' value='2' required />";
?> 
)

</td>
</tr>
</table>
<br>





<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30" bgcolor="#FFFF00"><div align="center"><strong>INFORMAÇÕES IMPORTANTES</strong></div></td>
  </tr>
</table>
<br>

<div class="row">
<div class="col-lg-5">
<label for="exampleInputPassword1">Qual o Banco:</label>
<?php 
if($FICHA_INTER_BANCO > '')	{
$v_bancos = mysqli_query($conexao,"select * from tb_bancos WHERE ID_BANCO = '$FICHA_INTER_BANCO' ");
$v_bco = mysqli_fetch_object($v_bancos);  

$BANCO_NOME = isset($v_bco->BANCO_NOME) ? $v_bco->BANCO_NOME : '';
} else {
$BANCO_NOME = '';
} 
?>
<input type="text" class="form-control" id="FICHA_INTER_BANCO" name="FICHA_INTER_BANCO" value="<?php echo $BANCO_NOME; ?>" readonly />
<!--
<select id="FICHA_INTER_BANCO" name="FICHA_INTER_BANCO" class="form-control" />
<?php 
if($FICHA_INTER_BANCO > '')	{
$v_bancos = mysqli_query($conexao,"select * from tb_bancos WHERE ID_BANCO = '$FICHA_INTER_BANCO' ");
$v_bco = mysqli_fetch_object($v_bancos);  

$BANCO_NOME = isset($v_bco->BANCO_NOME) ? $v_bco->BANCO_NOME : '';
echo "<option value='$FICHA_INTER_BANCO'> $BANCO_NOME </option>";
} 
?>
<option value=""></option>
<?php 
$sql_banco = mysqli_query($conexao,"select * from tb_bancos WHERE BANCO_STATUS = '1' ORDER BY BANCO_NOME ASC ");
while($val_banco = mysqli_fetch_object($sql_banco)):  

$VAL_ID_BANCO 	= isset($val_banco->ID_BANCO) ? $val_banco->ID_BANCO : '';
$VAL_BANCO_NOME	= isset($val_banco->BANCO_NOME) ? $val_banco->BANCO_NOME : '';
//$VAL_BANCO_NOME = utf8_decode($VAL_BANCO_NOME);
?>
<option value="<?php echo $VAL_ID_BANCO; ?>"> <?php echo utf8_encode($VAL_BANCO_NOME); ?> </option>
<?php
 endwhile;
?>
</select>
-->
</div>

<div class="col-lg-4">
<label for="exampleInputPassword1">Qual o Veículo:</label>
<input type="text" class="form-control" id="FICHA_INTER_VEICULO" name="FICHA_INTER_VEICULO" placeholder="insira o veículo " value="<?php echo $FICHA_INTER_VEICULO; ?>" readonly />
</div>

</div>
<br>


<div class="row">
<div class="col-lg-3">
<label for="exampleInputPassword1">Valor do Financiamento:</label>
<input type="text" class="form-control" id="FICHA_INTER_VALOR_FIN" name="FICHA_INTER_VALOR_FIN" placeholder="insira o valor do financiamento " value="<?php echo $FICHA_INTER_VALOR_FIN; ?>" readonly />
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Valor da Parcela:</label>
<input type="text" class="form-control" id="FICHA_INTER_VALOR_PARC" name="FICHA_INTER_VALOR_PARC" placeholder="insira o valor da parcela " value="<?php echo $FICHA_INTER_VALOR_PARC; ?>" readonly />
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Quantas já Pagou:</label>
<input type="text" class="form-control" id="FICHA_INTER_PAGA" name="FICHA_INTER_PAGA" placeholder="insira as parcelas pagas " value="<?php echo $FICHA_INTER_PAGA; ?>" readonly />
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Quantas em Atraso:</label>
<input type="text" class="form-control" id="FICHA_INTER_ATRASO" name="FICHA_INTER_ATRASO" placeholder="insira as parcelas em atraso " value="<?php echo $FICHA_INTER_ATRASO; ?>" readonly />
</div>

</div>
<br>


<div class="form-group">
<label for="exampleInputEmail1">Observações:</label>
<textarea rows="4" class="form-control" id="FICHA_INTER_OBS" name="FICHA_INTER_OBS" placeholder="insira a observação" readonly /><?php echo $FICHA_INTER_OBS ; ?></textarea>
</div>
<br>


<table id="example2" class="table table-bordered table-hover">
<thead>
<tr>
<th bgcolor="#ecf0f5"><div align="center">DATA PGTO<div align="center"></th>
<th bgcolor="#ecf0f5"><div align="center">STATUS<div align="center"></th>
<th bgcolor="#ecf0f5"><div align="center">TIPO PAGAMENTO</div></th>
<th bgcolor="#ecf0f5"><div align="center">VALOR PARCELA</div></th>
<th bgcolor="#ecf0f5"><div align="center">QTDE VEZES</div></th>
<th bgcolor="#ecf0f5"><div align="center">VALOR TOTAL</div></th>
</tr>
</thead>

<tbody>
<?php
// do { 
$c = 2;

$sql_val_pgto = mysqli_query($conexao,"SELECT * FROM tb_valor_contratacao WHERE VALOR_CONTR_LEADS = '$ID_LEADS' AND VALOR_CONTR_STATUS <'3' ORDER BY ID_VALOR_CONTR DESC ");
while($val_val_pgto = mysqli_fetch_object($sql_val_pgto)):      

$ID_VALOR_CONTR				= isset($val_val_pgto->ID_VALOR_CONTR) ? $val_val_pgto->ID_VALOR_CONTR : '';
$VALOR_CONTR_USER			= isset($val_val_pgto->VALOR_CONTR_USER) ? $val_val_pgto->VALOR_CONTR_USER : '';
$VALOR_CONTR_STATUS			= isset($val_val_pgto->VALOR_CONTR_STATUS) ? $val_val_pgto->VALOR_CONTR_STATUS : '';
$VALOR_CONTR_TIPO			= isset($val_val_pgto->VALOR_CONTR_TIPO) ? $val_val_pgto->VALOR_CONTR_TIPO : '';
$VALOR_CONTR_LEADS			= isset($val_val_pgto->VALOR_CONTR_LEADS) ? $val_val_pgto->VALOR_CONTR_LEADS : '';
$VALOR_CONTR_FICHA			= isset($val_val_pgto->VALOR_CONTR_FICHA) ? $val_val_pgto->VALOR_CONTR_FICHA : '';
$VALOR_CONTR_VALOR			= isset($val_val_pgto->VALOR_CONTR_VALOR) ? $val_val_pgto->VALOR_CONTR_VALOR : '';
$VALOR_CONTR_VALOR_PARCELA	= isset($val_val_pgto->VALOR_CONTR_VALOR_PARCELA) ? $val_val_pgto->VALOR_CONTR_VALOR_PARCELA : '';
$VALOR_CONTR_QTDE_VEZES		= isset($val_val_pgto->VALOR_CONTR_QTDE_VEZES) ? $val_val_pgto->VALOR_CONTR_QTDE_VEZES : '';
$VALOR_CONTR_PARCELA		= isset($val_val_pgto->VALOR_CONTR_PARCELA) ? $val_val_pgto->VALOR_CONTR_PARCELA : '';

$VALOR_CONTR_DATA_PGTO			= isset($val_val_pgto->VALOR_CONTR_DATA_PGTO	) ? $val_val_pgto->VALOR_CONTR_DATA_PGTO	 : '';
$VALOR_CONTR_DATA_PGTO_DIA = substr($VALOR_CONTR_DATA_PGTO, 8, 4);
$VALOR_CONTR_DATA_PGTO_MES = substr($VALOR_CONTR_DATA_PGTO, 5, 2);
$VALOR_CONTR_DATA_PGTO_ANO = substr($VALOR_CONTR_DATA_PGTO, 0, 4);
$VALOR_CONTR_DATA_PGTO = $VALOR_CONTR_DATA_PGTO_DIA.'/'.$VALOR_CONTR_DATA_PGTO_MES.'/'.$VALOR_CONTR_DATA_PGTO_ANO;
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////

$index = $c % 2;
$c++;
//$cor = $cores[$index];
$IETM = $c - 2 ;
?>
<tr>
<td ><div align="center"><?php echo $VALOR_CONTR_DATA_PGTO; ?></div></td>
<td ><div align="center">
<?php 
if($VALOR_CONTR_STATUS == '1')
echo  "Pago";
elseif($VALOR_CONTR_STATUS == '2')
echo  "Em Aberto";
?></div></td>
<td ><div align="center">
<?php 
if($VALOR_CONTR_TIPO == '1')
echo "Dinheiro";
elseif($VALOR_CONTR_TIPO == '2')
echo "Cartão Débito";
elseif($VALOR_CONTR_TIPO == '3')
echo "Cartão Credito";
elseif($VALOR_CONTR_TIPO == '4')
echo "Depósito/ Transferência";
elseif($VALOR_CONTR_TIPO == '5')
echo "Boleto";
elseif($VALOR_CONTR_TIPO == '6')
echo "Pix";
?></div></td>
<td ><div align="center"><?php echo $VALOR_CONTR_VALOR_PARCELA; ?></div></td>
<td ><div align="center"><?php echo $VALOR_CONTR_QTDE_VEZES; ?></div></td>
<td ><div align="center"><?php echo $VALOR_CONTR_VALOR; ?></div></td>
<?php
 endwhile;
?>

<tr>
<td ><div align="center">&nbsp;</div></td>
<td ><div align="center">&nbsp;</div></td>
<td ><div align="center">&nbsp;</div></td>
<td ><div align="center">&nbsp;</div></td>
<td bgcolor="#FFFF00"><div align="right"><strong>TOTAL: &nbsp;</strong></div></td>
<td bgcolor="#FFFF00"><div align="center"><strong>R$ 
<?php
$sql_total = mysqli_query($conexao,"select sum(cast(replace(replace(VALOR_CONTR_VALOR, '.', ''), ',', '.') as decimal(10,2))) FROM tb_valor_contratacao WHERE VALOR_CONTR_LEADS = '$ID_LEADS' AND VALOR_CONTR_STATUS < '3' ");
$sql_total = mysqli_fetch_array($sql_total);
echo number_format($sql_total[0], 2, ',', '.');
?>
</strong></div></td>
</tr>
</tbody>

</table>
            </div>

<div class="box-body">
<table width="600" class="table table-bordered table-hover" id="example2">
<thead>
<tr>
<th bgcolor="#ecf0f5" width="90"><div align="center">DATA<div align="center"></th>
<th bgcolor="#ecf0f5" width="150"><div align="center">STATUS<div align="center"></th>
<th bgcolor="#ecf0f5" width="200"><div align="center">COMERCIAL OPERADOR</div></th>
</tr>
</thead>

<tbody>
<?php
// do { 
$c = 2;

$sql_hist = mysqli_query($conexao,"SELECT * FROM tb_leads_hist WHERE LEADS_HIST_LEADS = '$ID_LEADS' ORDER BY ID_LEADS_HIST DESC ");
while($val_hist = mysqli_fetch_object($sql_hist)):      

$ID_LEADS_HIST				= isset($val_hist->ID_LEADS_HIST) ? $val_hist->ID_LEADS_HIST : '';
$LEADS_HIST_USER			= isset($val_hist->LEADS_HIST_USER) ? $val_hist->LEADS_HIST_USER : '';
$LEADS_HIST_STATUS			= isset($val_hist->LEADS_HIST_STATUS) ? $val_hist->LEADS_HIST_STATUS : '';
$LEADS_HIST_LEADS			= isset($val_hist->LEADS_HIST_LEADS) ? $val_hist->LEADS_HIST_LEADS : '';

$LEADS_HIST_DATA			= isset($val_hist->LEADS_HIST_DATA	) ? $val_hist->LEADS_HIST_DATA	 : '';
$LEADS_HIST_DATA_DIA = substr($LEADS_HIST_DATA, 8, 4);
$LEADS_HIST_DATA_MES = substr($LEADS_HIST_DATA, 5, 2);
$LEADS_HIST_DATA_ANO = substr($LEADS_HIST_DATA, 0, 4);
$LEADS_HIST_DATA = $LEADS_HIST_DATA_DIA.'/'.$LEADS_HIST_DATA_MES.'/'.$LEADS_HIST_DATA_ANO;

$LEADS_HIST_ASSUNTO			= isset($val_hist->LEADS_HIST_ASSUNTO) ? $val_hist->LEADS_HIST_ASSUNTO : '';

$LEADS_HIST_DATA_FOLLOW		= isset($val_hist->LEADS_HIST_DATA_FOLLOW	) ? $val_hist->LEADS_HIST_DATA_FOLLOW	 : '';
$LEADS_HIST_DATA_FOLLOW_DIA = substr($LEADS_HIST_DATA_FOLLOW, 8, 4);
$LEADS_HIST_DATA_FOLLOW_MES = substr($LEADS_HIST_DATA_FOLLOW, 5, 2);
$LEADS_HIST_DATA_FOLLOW_ANO = substr($LEADS_HIST_DATA_FOLLOW, 0, 4);
$LEADS_HIST_DATA_FOLLOW = $LEADS_HIST_DATA_FOLLOW_DIA.'/'.$LEADS_HIST_DATA_FOLLOW_MES.'/'.$LEADS_HIST_DATA_FOLLOW_ANO;

$LEADS_HIST_HORA_FOLLOW		= isset($val_hist->LEADS_HIST_HORA_FOLLOW) ? $val_hist->LEADS_HIST_HORA_FOLLOW : '';
$LEADS_HIST_DESCRICAO		= isset($val_hist->LEADS_HIST_DESCRICAO) ? $val_hist->LEADS_HIST_DESCRICAO : '';

$F_USER_REGISTRO			= isset($val_hist->F_USER_REGISTRO) ? $val_hist->F_USER_REGISTRO : '';
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////

$index = $c % 2;
$c++;
//$cor = $cores[$index];
$IETM = $c - 2 ;
?>
<tr>
<td ><div align="center"><?php echo $LEADS_HIST_DATA; ?></div></td>
<td ><div align="center">
<?php 
if($LEADS_HIST_STATUS == '1')
echo  "Acordo/ Revisão";
elseif($LEADS_HIST_STATUS == '2')
echo  "Não Atende";
elseif($LEADS_HIST_STATUS == '3')
echo  "Recado";
elseif($LEADS_HIST_STATUS == '4')
echo  "Devolução Carro";
elseif($LEADS_HIST_STATUS == '5')
echo  "Recusa/ Ñ tem interesse";
elseif($LEADS_HIST_STATUS == '6')
echo  "Follow Up";
elseif($LEADS_HIST_STATUS == '7')
echo  "Em Negociação";
elseif($LEADS_HIST_STATUS == '8')
echo  "Whatsapp";
elseif($LEADS_HIST_STATUS == '9')
echo  "Não Existe";
elseif($LEADS_HIST_STATUS == '10')
echo  "Acordo Pendente";
?></div></td>
<td ><div align="center"><?php echo $F_USER_REGISTRO; ?></div></td>
</tr>

<tr>
<td colspan="3" bgcolor="#FFFF00"><strong>HISTÓRICO:</strong> <?php echo $LEADS_HIST_DESCRICAO; ?></td>
</tr>
<?php
 endwhile;
?>
</tbody>
</table>
  </div>

</div>










<!-- /.tab-pane -->
<div class="tab-pane" id="tab_2">
<div class="box-body">
<table id="example2" class="table table-bordered table-hover">
<thead>
<tr>
<th bgcolor="#ecf0f5"><div align="center">DATA PGTO<div align="center"></th>
<th bgcolor="#ecf0f5"><div align="center">STATUS<div align="center"></th>
<th bgcolor="#ecf0f5"><div align="center">TIPO PAGAMENTO</div></th>
<th bgcolor="#ecf0f5"><div align="center">VALOR PARCELA</div></th>
<th bgcolor="#ecf0f5"><div align="center">QTDE VEZES</div></th>
<th bgcolor="#ecf0f5"><div align="center">VALOR TOTAL</div></th>
</tr>
</thead>

<tbody>
<?php
// do { 
$c = 2;

$sql_val_pgto = mysqli_query($conexao,"SELECT * FROM tb_valor_juridico_laudo WHERE VALOR_JURIDICO_LEADS = '$ID_LEADS' AND VALOR_JURIDICO_STATUS <'3' ORDER BY ID_VALOR_JURIDICO DESC ");
while($val_val_pgto = mysqli_fetch_object($sql_val_pgto)):      

$ID_VALOR_JURIDICO				= isset($val_val_pgto->ID_VALOR_JURIDICO) ? $val_val_pgto->ID_VALOR_JURIDICO : '';
$VALOR_JURIDICO_USER			= isset($val_val_pgto->VALOR_JURIDICO_USER) ? $val_val_pgto->VALOR_JURIDICO_USER : '';
$VALOR_JURIDICO_STATUS			= isset($val_val_pgto->VALOR_JURIDICO_STATUS) ? $val_val_pgto->VALOR_JURIDICO_STATUS : '';
$VALOR_JURIDICO_TIPO			= isset($val_val_pgto->VALOR_JURIDICO_TIPO) ? $val_val_pgto->VALOR_JURIDICO_TIPO : '';
$VALOR_JURIDICO_LEADS			= isset($val_val_pgto->VALOR_JURIDICO_LEADS) ? $val_val_pgto->VALOR_JURIDICO_LEADS : '';
$VALOR_JURIDICO_FICHA			= isset($val_val_pgto->VALOR_JURIDICO_FICHA) ? $val_val_pgto->VALOR_JURIDICO_FICHA : '';
$VALOR_JURIDICO_VALOR			= isset($val_val_pgto->VALOR_JURIDICO_VALOR) ? $val_val_pgto->VALOR_JURIDICO_VALOR : '';
$VALOR_JURIDICO_VALOR_PARCELA	= isset($val_val_pgto->VALOR_JURIDICO_VALOR_PARCELA) ? $val_val_pgto->VALOR_JURIDICO_VALOR_PARCELA : '';
$VALOR_JURIDICO_QTDE_VEZES		= isset($val_val_pgto->VALOR_JURIDICO_QTDE_VEZES) ? $val_val_pgto->VALOR_JURIDICO_QTDE_VEZES : '';
$VALOR_JURIDICO_PARCELA		= isset($val_val_pgto->VALOR_JURIDICO_PARCELA) ? $val_val_pgto->VALOR_JURIDICO_PARCELA : '';

$VALOR_JURIDICO_DATA_PGTO			= isset($val_val_pgto->VALOR_JURIDICO_DATA_PGTO	) ? $val_val_pgto->VALOR_JURIDICO_DATA_PGTO	 : '';
$VALOR_JURIDICO_DATA_PGTO_DIA = substr($VALOR_JURIDICO_DATA_PGTO, 8, 4);
$VALOR_JURIDICO_DATA_PGTO_MES = substr($VALOR_JURIDICO_DATA_PGTO, 5, 2);
$VALOR_JURIDICO_DATA_PGTO_ANO = substr($VALOR_JURIDICO_DATA_PGTO, 0, 4);
$VALOR_JURIDICO_DATA_PGTO = $VALOR_JURIDICO_DATA_PGTO_DIA.'/'.$VALOR_JURIDICO_DATA_PGTO_MES.'/'.$VALOR_JURIDICO_DATA_PGTO_ANO;
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////

$index = $c % 2;
$c++;
//$cor = $cores[$index];
$IETM = $c - 2 ;
?>
<tr>
<td ><div align="center"><?php echo $VALOR_JURIDICO_DATA_PGTO; ?></div></td>
<td ><div align="center">
<?php 
if($VALOR_JURIDICO_STATUS == '1')
echo  "Pago";
elseif($VALOR_JURIDICO_STATUS == '2')
echo  "Em Aberto";
?></div></td>
<td ><div align="center">
<?php 
if($VALOR_JURIDICO_TIPO == '1')
echo "Dinheiro";
elseif($VALOR_JURIDICO_TIPO == '2')
echo "Cartão Débito";
elseif($VALOR_JURIDICO_TIPO == '3')
echo "Cartão Credito";
elseif($VALOR_JURIDICO_TIPO == '4')
echo "Depósito/ Transferência";
elseif($VALOR_JURIDICO_TIPO == '5')
echo "Boleto";
elseif($VALOR_JURIDICO_TIPO == '6')
echo "Pix";
?></div></td>
<td ><div align="center"><?php echo $VALOR_JURIDICO_VALOR_PARCELA; ?></div></td>
<td ><div align="center"><?php echo $VALOR_JURIDICO_QTDE_VEZES; ?></div></td>
<!--
<td ><div align="center"><?php echo $VALOR_JURIDICO_PARCELA; ?></div></td>
-->
<td ><div align="center"><?php echo $VALOR_JURIDICO_VALOR; ?></div></td>
<?php
 endwhile;
?>

<tr>
<td ><div align="center">&nbsp;</div></td>
<td ><div align="center">&nbsp;</div></td>
<td ><div align="center">&nbsp;</div></td>
<td ><div align="center">&nbsp;</div></td>
<td bgcolor="#FF9900"><div align="right"><strong>TOTAL: &nbsp;</strong></div></td>
<td bgcolor="#FF9900"><div align="center"><strong>R$ 
<?php
$sql_total = mysqli_query($conexao,"select sum(cast(replace(replace(VALOR_JURIDICO_VALOR, '.', ''), ',', '.') as decimal(10,2))) FROM tb_valor_juridico_laudo WHERE VALOR_JURIDICO_LEADS = '$ID_LEADS' AND VALOR_JURIDICO_STATUS < '3' ");
$sql_total = mysqli_fetch_array($sql_total);
echo number_format($sql_total[0], 2, ',', '.');
?>
</strong></div></td>
</tr>
</tbody>

</table>
</div>




<div class="box-body">
<table class="table table-bordered table-hover" id="example2">
<thead>
<tr>
<th bgcolor="#ecf0f5" width="90"><div align="center">DATA<div align="center"></th>
<th bgcolor="#ecf0f5" width="150"><div align="center">STATUS</div></th>
<th bgcolor="#ecf0f5" width="200"><div align="center">JURÍDICO OPERADOR</div></th>
</tr>
</thead>

<tbody>
<?php
// do { 
$c = 2;

$sql_hist = mysqli_query($conexao,"SELECT * FROM tb_leads_juridico_hist WHERE LEADS_JURIDICO_HIST_LEADS = '$ID_LEADS' ORDER BY ID_LEADS_JURIDICO_HIST DESC ");
while($val_hist = mysqli_fetch_object($sql_hist)):      

$ID_LEADS_JURIDICO_HIST				= isset($val_hist->ID_LEADS_JURIDICO_HIST) ? $val_hist->ID_LEADS_JURIDICO_HIST : '';
$LEADS_JURIDICO_HIST_USER			= isset($val_hist->LEADS_JURIDICO_HIST_USER) ? $val_hist->LEADS_JURIDICO_HIST_USER : '';
$LEADS_JURIDICO_HIST_STATUS			= isset($val_hist->LEADS_JURIDICO_HIST_STATUS) ? $val_hist->LEADS_JURIDICO_HIST_STATUS : '';
$LEADS_JURIDICO_HIST_LEADS			= isset($val_hist->LEADS_JURIDICO_HIST_LEADS) ? $val_hist->LEADS_JURIDICO_HIST_LEADS : '';

$LEADS_JURIDICO_HIST_DATA			= isset($val_hist->LEADS_JURIDICO_HIST_DATA	) ? $val_hist->LEADS_JURIDICO_HIST_DATA	 : '';
$LEADS_JURIDICO_HIST_DATA_DIA = substr($LEADS_JURIDICO_HIST_DATA, 8, 4);
$LEADS_JURIDICO_HIST_DATA_MES = substr($LEADS_JURIDICO_HIST_DATA, 5, 2);
$LEADS_JURIDICO_HIST_DATA_ANO = substr($LEADS_JURIDICO_HIST_DATA, 0, 4);
$LEADS_JURIDICO_HIST_DATA = $LEADS_JURIDICO_HIST_DATA_DIA.'/'.$LEADS_JURIDICO_HIST_DATA_MES.'/'.$LEADS_JURIDICO_HIST_DATA_ANO;

$LEADS_JURIDICO_HIST_ASSUNTO			= isset($val_hist->LEADS_JURIDICO_HIST_ASSUNTO) ? $val_hist->LEADS_JURIDICO_HIST_ASSUNTO : '';

$LEADS_JURIDICO_HIST_DATA_FOLLOW		= isset($val_hist->LEADS_JURIDICO_HIST_DATA_FOLLOW	) ? $val_hist->LEADS_JURIDICO_HIST_DATA_FOLLOW	 : '';
$LEADS_JURIDICO_HIST_DATA_FOLLOW_DIA = substr($LEADS_JURIDICO_HIST_DATA_FOLLOW, 8, 4);
$LEADS_JURIDICO_HIST_DATA_FOLLOW_MES = substr($LEADS_JURIDICO_HIST_DATA_FOLLOW, 5, 2);
$LEADS_JURIDICO_HIST_DATA_FOLLOW_ANO = substr($LEADS_JURIDICO_HIST_DATA_FOLLOW, 0, 4);
$LEADS_JURIDICO_HIST_DATA_FOLLOW = $LEADS_JURIDICO_HIST_DATA_FOLLOW_DIA.'/'.$LEADS_JURIDICO_HIST_DATA_FOLLOW_MES.'/'.$LEADS_JURIDICO_HIST_DATA_FOLLOW_ANO;

$LEADS_JURIDICO_HIST_HORA_FOLLOW		= isset($val_hist->LEADS_JURIDICO_HIST_HORA_FOLLOW) ? $val_hist->LEADS_JURIDICO_HIST_HORA_FOLLOW : '';
$LEADS_JURIDICO_HIST_DESCRICAO		= isset($val_hist->LEADS_JURIDICO_HIST_DESCRICAO) ? $val_hist->LEADS_JURIDICO_HIST_DESCRICAO : '';

$F_USER_REGISTRO			= isset($val_hist->F_USER_REGISTRO) ? $val_hist->F_USER_REGISTRO : '';
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////

$index = $c % 2;
$c++;
//$cor = $cores[$index];
$IETM = $c - 2 ;
?>
<tr>
<td ><div align="center"><?php echo $LEADS_JURIDICO_HIST_DATA; ?></div></td>
<td ><div align="center">
<?php 
if($LEADS_JURIDICO_HIST_STATUS == '1')
echo  "Laudo Fechado";
elseif($LEADS_JURIDICO_HIST_STATUS == '2')
echo  "Não Atende";
elseif($LEADS_JURIDICO_HIST_STATUS == '3')
echo  "Recado";
elseif($LEADS_JURIDICO_HIST_STATUS == '4')
echo  "Devolução Carro";
elseif($LEADS_JURIDICO_HIST_STATUS == '5')
echo  "Recusa/ Ñ tem interesse";
elseif($LEADS_JURIDICO_HIST_STATUS == '6')
echo  "Follow Up";
elseif($LEADS_JURIDICO_HIST_STATUS == '7')
echo  "Em Negociação";
?></div>
</td>
<td ><div align="center"><?php echo $F_USER_REGISTRO; ?></div></td>
</tr>

<tr>
<td colspan="3" bgcolor="#FF9900"><strong>HISTÓRICO:</strong> <?php echo $LEADS_JURIDICO_HIST_DESCRICAO; ?></td>
</tr>
<?php
 endwhile;
?>
</tbody>

</table>
  </div>
</div>
<!-- /.tab-pane -->




<div class="tab-pane" id="tab_3">

<div class="box-body">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td width="78%"><h3 class="box-title">Retenção</h3></td>
<td width="22%">
<div align="right">
<!--
<form action="retencao.php" >
<input type="hidden" class="form-control" id="ID_LEADS" name="ID_LEADS" value="<?php echo $ID_LEADS; ?>" />
<button type="submit" class="btn btn-danger">Incluir Retenção</button>
</form> 
-->
</div> 
</td>
</tr>
</table>

<br>

<form 
<?php 
//if($ID_ADMINISTRADOR == '')
echo "action='retencao-cadastrar-actions.php'"; 
//elseif($ID_ADMINISTRADOR > '')
//echo "action='retencao-alterar-actions.php'"; 
?> method='post' name="formulario" >
<input type="hidden" id="ID_RETENCAO" name="ID_RETENCAO" value="<?php echo $ID_RETENCAO; ?>">
<input type="hidden" id="RETENCAO_USER" name="RETENCAO_USER" value="<?php echo $ID_USER; ?>">
<input type="hidden" id="RETENCAO_LEADS" name="RETENCAO_LEADS" value="<?php echo $ID_LEADS; ?>">
<input type="hidden" id="F_USER_REGISTRO" name="F_USER_REGISTRO" value="<?php echo $USER_NOME; ?>">

<div class="box-body" style="background:#CCCCCC">
<div class="row">
<div class="col-lg-2">
<label for="exampleInputPassword1">Data:</label>
<input type="text" class="form-control" id="RETENCAO_DATA" name="RETENCAO_DATA" placeholder="Insira o Nome" value="<?php echo $RETENCAO_DATA; ?>" required>
</div>

<div class="col-lg-6">
<label for="exampleInputPassword1">Nome:</label>
<input type="text" class="form-control" id="RETENCAO_NOME" name="RETENCAO_NOME" placeholder="Insira o Nome" value="<?php echo $CLIENTE_NOME; ?>" required>
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">CPF:</label>
<input type="text" class="form-control" id="RETENCAO_CPF" name="RETENCAO_CPF" placeholder="Insira o CPF" value="<?php echo $CLIENTE_CPF; ?>" required>
</div>

<div class="col-lg-2">
<label for="exampleInputPassword1">Telefone:</label>
<input type="text" class="form-control" id="RETENCAO_TEL" name="RETENCAO_TEL" placeholder="Insira o Tel" value="<?php echo $CLIENTE_TELEFONE_1; ?>" required>
</div>

</div>
<br>


<div class="row">
<div class="col-lg-12">
<label for="exampleInputPassword1">Assunto:</label>
<input type="text" class="form-control" id="RETENCAO_ASSUNTO" name="RETENCAO_ASSUNTO" placeholder="Insira o Assunto" value="<?php //echo $RETENCAO_ASSUNTO; ?>" required>
</div>

</div>
<br>

<div class="form-group">
<label for="exampleInputEmail1">Observações:</label>
<textarea rows="4" class="form-control" id="RETENCAO_DESCRICAO" name="RETENCAO_DESCRICAO" placeholder="Insira a Descrição"><?php //echo $RETENCAO_DESCRICAO ; ?></textarea>
</div>

</div>
<!-- /.box-body -->

<div class="box-footer">
<button type="submit" class="btn btn-danger">Salvar</button>
</div>
</form>
<br>



<table width="600" class="table table-bordered table-hover" id="example2">
<thead>
<tr>
<th bgcolor="#ecf0f5" width="100"><div align="center">DATA</div></th>
<th bgcolor="#ecf0f5" width="300"><div align="left">&nbsp;NOME</div></th>
<th bgcolor="#ecf0f5" width="100"><div align="center">CPF</div></th>
<th bgcolor="#ecf0f5" width="100"><div align="center">TEL</div></th>
</tr>
</thead>

<tbody>
<?php
// do { 
$c = 2;

$sql_hist = mysqli_query($conexao,"SELECT * FROM tb_retencao WHERE RETENCAO_LEADS = '$ID_LEADS' ORDER BY ID_RETENCAO DESC ");
while($val_hist = mysqli_fetch_object($sql_hist)):      

$ID_RETENCAO			= isset($val_hist->ID_RETENCAO) ? $val_hist->ID_RETENCAO : '';
$RETENCAO_USER			= isset($val_hist->RETENCAO_USER) ? $val_hist->RETENCAO_USER : '';
$RETENCAO_STATUS		= isset($val_hist->RETENCAO_STATUS) ? $val_hist->RETENCAO_STATUS : '';
$RETENCAO_LEADS			= isset($val_hist->RETENCAO_LEADS) ? $val_hist->RETENCAO_LEADS : '';

$RETENCAO_DATA			= isset($val_hist->RETENCAO_DATA	) ? $val_hist->RETENCAO_DATA	 : '';
$RETENCAO_DATA_DIA = substr($RETENCAO_DATA, 8, 4);
$RETENCAO_DATA_MES = substr($RETENCAO_DATA, 5, 2);
$RETENCAO_DATA_ANO = substr($RETENCAO_DATA, 0, 4);
$RETENCAO_DATA = $RETENCAO_DATA_DIA.'/'.$RETENCAO_DATA_MES.'/'.$RETENCAO_DATA_ANO;

$RETENCAO_NOME			= isset($val_hist->RETENCAO_NOME) ? $val_hist->RETENCAO_NOME : '';
$RETENCAO_CPF			= isset($val_hist->RETENCAO_CPF) ? $val_hist->RETENCAO_CPF : '';
$RETENCAO_TEL			= isset($val_hist->RETENCAO_TEL) ? $val_hist->RETENCAO_TEL : '';
$RETENCAO_ASSUNTO		= isset($val_hist->RETENCAO_ASSUNTO) ? $val_hist->RETENCAO_ASSUNTO : '';
$RETENCAO_DESCRICAO		= isset($val_hist->RETENCAO_DESCRICAO) ? $val_hist->RETENCAO_DESCRICAO : '';
$F_USER_REGISTRO		= isset($val_hist->F_USER_REGISTRO) ? $val_hist->F_USER_REGISTRO : '';
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////

$index = $c % 2;
$c++;
//$cor = $cores[$index];
$IETM = $c - 2 ;
?>
<tr>
<td ><div align="center"><?php echo $RETENCAO_DATA; ?></div></td>
<td ><div align="left">&nbsp;<?php echo $RETENCAO_NOME; ?></div></td>
<td ><div align="center"><?php echo $RETENCAO_CPF; ?></div></td>
<td ><div align="center"><?php echo $RETENCAO_TEL; ?></div></td>
</tr>
<tr>
<td colspan="2" ><strong>ASSUNTO:</strong> <?php echo $RETENCAO_ASSUNTO; ?></td>
<td colspan="2" ><strong>OPERADOR:</strong> <?php echo $F_USER_REGISTRO; ?></td>
</tr>

<tr>
<td colspan="4" bgcolor="#FFFF00"><strong>DESCRIÇÃO:</strong> <?php echo $RETENCAO_DESCRICAO; ?></td>
</tr>
<?php
 endwhile;
?>
</tbody>
</table>
  </div>

</div>
<!-- /.tab-pane -->
</div>
<!-- /.tab-content -->
</div>
<!-- nav-tabs-custom -->
</div>
<!-- /.col -->
<!-- /.row -->
<!-- END CUSTOM TABS -->
<?php
	}
?>	


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
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
