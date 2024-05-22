<?php
$ID_USER 		= isset($_COOKIE["ID_USER"]) ? $_COOKIE["ID_USER"] : '';
if($ID_USER == ''){	
include "sessao-expirou.php";
}

//include "Connections/conecta_banco.php";
include "valida_cookie_admin.php";


//session_start();


$F_MES 			= isset($_GET['F_MES']) ? $_GET['F_MES'] : '';

if($F_MES == '')
$F_MES = date('m');


if($F_MES == '1')
$VAL_MES = " Janeiro ";
elseif($F_MES == '2')
$VAL_MES = " Fevereiro ";
elseif($F_MES == '3')
$VAL_MES = " Março ";
elseif($F_MES == '4')
$VAL_MES = " Abril ";
elseif($F_MES == '5')
$VAL_MES = " Maio ";
elseif($F_MES == '6')
$VAL_MES = " Junho ";
elseif($F_MES == '7')
$VAL_MES = " Julho ";
elseif($F_MES == '8')
$VAL_MES = " Agosto ";
elseif($F_MES == '9')
$VAL_MES = " Setembro ";
elseif($F_MES == '10')
$VAL_MES = " Outubro ";
elseif($F_MES == '11')
$VAL_MES = " Novembro ";
elseif($F_MES == '12')
$VAL_MES = " Dezembro ";


$F_ANO 			= isset($_GET['F_ANO']) ? $_GET['F_ANO'] : '';
if($F_ANO == '')
$F_ANO = date('Y');


//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sql_result = mysqli_query($conexao,"select * from tb_metas WHERE META_MES = '$F_MES' AND META_ANO = '$F_ANO' AND META_STATUS = '1' ");
$val_meta = mysqli_fetch_object($sql_result);  
///////////////////////////////////////////////////////
$META_DATA				= isset($val_meta->META_DATA) ? $val_meta->META_DATA : '';
$META_MES	 			= isset($val_meta->META_MES) ? $val_meta->META_MES : '';
$META_ANO	 			= isset($val_meta->META_ANO) ? $val_meta->META_ANO : '';
$META_VALOR	 			= isset($val_meta->META_VALOR) ? $val_meta->META_VALOR : '';

if($META_VALOR == '')
$VAL_META_VALOR = '00,00';
else
$VAL_META_VALOR = $META_VALOR;

$VAL_META_VALOR = str_replace(".","", $VAL_META_VALOR);
$VAL_META_VALOR = str_replace(",","", $VAL_META_VALOR);




/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sql_total = mysqli_query($conexao,"select sum(cast(replace(replace(VALOR_CONTR_VALOR, '.', ''), ',', '.') as decimal(10,2))) FROM tb_valor_contratacao WHERE VALOR_CONTR_STATUS = '1' AND MONTH(VALOR_CONTR_DATA_PGTO) = '$F_MES' ");
$sql_total = mysqli_fetch_array($sql_total);
$VALOR_REALIZADO =  number_format($sql_total[0], 2, ',', '.');
//$VALOR_REALIZADO =  $sql_total[0];

if($VALOR_REALIZADO == '')
$VAL_VALOR_REALIZADO = '00,00';
else
$VAL_VALOR_REALIZADO = $VALOR_REALIZADO;

$VAL_VALOR_REALIZADO = str_replace(".","", $VAL_VALOR_REALIZADO);
$VAL_VALOR_REALIZADO = str_replace(",","", $VAL_VALOR_REALIZADO);


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sql_persp = mysqli_query($conexao,"select sum(cast(replace(replace(VALOR_CONTR_VALOR, '.', ''), ',', '.') as decimal(10,2))) FROM tb_valor_contratacao WHERE VALOR_CONTR_STATUS = '2' AND MONTH(VALOR_CONTR_DATA_PGTO) = '$F_MES' ");
$sql_persp = mysqli_fetch_array($sql_persp);
$VALOR_PERSPECTIVA =  number_format($sql_persp[0], 2, ',', '.');
//$VALOR_PERSPECTIVA =  $sql_total[0];

if($VALOR_PERSPECTIVA == '')
$VAL_VALOR_PERSPECTIVA = '00,00';
else
$VAL_VALOR_PERSPECTIVA = $VALOR_PERSPECTIVA;

$VAL_VALOR_PERSPECTIVA = str_replace(".","", $VAL_VALOR_PERSPECTIVA);
$VAL_VALOR_PERSPECTIVA = str_replace(",","", $VAL_VALOR_PERSPECTIVA);
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
  <style type="text/css">
<!--
.style1 {color: #FF0000}
.style2 {color: #0000FF}
.style3 {color: #4f98c3}
-->
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
        Meta Gráfico |
        <small>painel de controle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Meta Gráfico </a></li>
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
              <strong>GRÁFICO META DA OPERAÇÃO| POR MÊS</strong>
              </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
<form action='principal-meta-grafico.php' method='get' name="formulario" >


<div class="box-body">
<div class="row">

<div class="col-lg-2">
<label for="exampleInputPassword1">Mês:</label>
<select id="F_MES" name="F_MES" class="form-control" required="required">
<option value="">  </option>
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
<select id="F_ANO" name="F_ANO" class="form-control" required="required">
<option value="">  </option>
<option value="2023"> 2023 </option>
<option value="2022"> 2022 </option>
</select>
</div>


</div>
<br>

</div>
<!-- /.box-body -->
<div class="box-footer">
<button type="submit" id="USINAGEM_ENTER" class="btn btn-primary">GERAR GRÁFICO</button>
</div>
</form>
            
<br>         
            
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-md-12">
<!-- AREA CHART -->
<div class="box box-primary">
<div class="box-header with-border">
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="200"><div align="center"><span class="style1">META:<br><strong>&quot; 
R$ <?php echo $META_VALOR; ?> &quot;</strong></span></div></td>
    <td width="200"><div align="center"><span class="style2">REALIZADO<br><strong>&quot; 
R$ <?php echo $VALOR_REALIZADO; ?> &quot;</strong></span></div></td>
    <td width="200"><div align="center"><span class="style3">PROJEÇÃO<br><strong>&quot; 
R$ <?php echo $VALOR_PERSPECTIVA; ?> &quot;</strong></span></div></td>
    </tr>
</table>
<h3 class="box-title"><strong>OPERAÇÃO:</strong> MÊS - <strong>"<?php echo $VAL_MES; ?>"</strong> &nbsp;| &nbsp;ANO - <strong>"<?php echo $F_ANO; ?>"</strong></h3>

<div class="box-tools pull-right">
<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
</button>
<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
</div>
</div>
<div class="box-body">
<div class="chart">
<canvas id="barChart2" style="height:250px"></canvas>
</div>
</div>
<!-- /.box-body -->
</div>
<!-- /.box -->

</div>
<!-- /.col (LEFT) -->







<!--
<div class="col-md-12">

<div class="box box-danger">
<div class="box-header with-border">
<h3 class="box-title">ANO - "<?php echo $F_ANO; ?>"</h3>

<div class="box-tools pull-right">
<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
</button>
<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
</div>
</div>
<div class="box-body">
<div class="chart">
<canvas id="testeNovo" style="height:250px"></canvas>
</div>
</div>

</div>


</div>

-->

<!-- /.col (RIGHT) -->
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
<!-- ChartJS -->
<script src="bower_components/chart.js/Chart.js"></script>
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
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#barChart2').get(0).getContext('2d')
    // This will get the first returned node in the jQuery collection.
    var areaChart       = new Chart(areaChartCanvas)

    var areaChartData = {
      labels  : ['', '<?php echo $VAL_MES; ?>/ <?php echo $F_ANO; ?> ', ''],
      datasets: [
        {
          label               : 'Meta',
          fillColor           : '#ff0000',
          strokeColor         : '#ff0000',
          pointColor          : '#ff0000',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : ['', <?php echo $VAL_META_VALOR; ?>, '']
        },
        {
          label               : 'Realizado',
          fillColor           : '#ff0000',
          strokeColor         : '#ff0000',
          pointColor          : '#ff0000',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : ['', <?php echo $VAL_VALOR_REALIZADO; ?>, '']
        },
        {
          label               : 'Prespectiva',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : ['', <?php echo $VAL_VALOR_PERSPECTIVA; ?>, '']
        }
      ]
    }

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas                   = $('#barChart2').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = areaChartData
    barChartData.datasets[1].fillColor   = '#0033CC'
    barChartData.datasets[1].strokeColor = '#0033CC'
    barChartData.datasets[1].pointColor  = '#0033CC'
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)










    // Get context with jQuery - using jQuery's .get() method.
    var areaNovoCanvas = $('#barChart2').get(0).getContext('2d')
    // This will get the first returned node in the jQuery collection.
    var areaNovo       = new Chart(areaNovoCanvas)

    var areaNovoData = {
      labels  : ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
      datasets: [
        {
          label               : 'Electronics',
          fillColor           : '#0033CC',
          strokeColor         : '#0033CC',
          pointColor          : '#0033CC',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [10, 20.00, 30.00, 40.00, 50.00]
        },
        {
          label               : 'Digital Goods',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [5, 10, 15, 20, 25]
        }
      ]
    }
    //-------------
    //- BAR CHART -
    //-------------
    var testeNovoCanvas                   = $('#testeNovo').get(0).getContext('2d')
    var testeNovo                         = new Chart(testeNovoCanvas)
    var testeNovoData                     = areaNovoData
    testeNovoData.datasets[1].fillColor   = '#FF0000'
    testeNovoData.datasets[1].strokeColor = '#FF0000'
    testeNovoData.datasets[1].pointColor  = '#FF0000'
    var testeNovoOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    testeNovoOptions.datasetFill = false
    testeNovo.Bar(testeNovoData, testeNovoOptions)
  })
</script>
</body>
</html>
