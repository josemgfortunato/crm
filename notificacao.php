<?php
//echo $ID_USER;
$user = mysqli_query($conexao,"select * from tb_administrador WHERE ID_ADMINISTRADOR = '$ID_USER' ");
$valida_user = mysqli_fetch_object($user);  
$DEPARTAMENO_USER = isset($valida_user->ADMINISTRADOR_DEPARTAMENTO) ? $valida_user->ADMINISTRADOR_DEPARTAMENTO : '';
///////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
<?php
if($USER_TIPO == '4') {
?> 

    <li class="dropdown messages-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	<i class="fa  fa-phone-square"></i>
    <span class="label label-danger">

<!--
    <?php
    $data_atual = date("d");
    $mes_atual = date("m");

    $data_novo_atual = date("Y/m/d");

/////	COUNTA OS FOLLOW UP DO DIA
    $c_leads_follow = mysqli_query($conexao,"SELECT COUNT(*) FROM tb_leads WHERE LEADS_STATUS = '6' AND LEADS_USER = '$ID_USER' ");
    $c_leads_follow = mysqli_fetch_array($c_leads_follow);
    $c_leads_follow = $c_leads_follow[0];

if($c_leads_follow > '0')	{
/////	COUNTA OS FOLLOW UP DO DIA
//    $count_leads_follow = mysqli_query($conexao,"SELECT COUNT(DISTINCT LEADS_HIST_LEADS) FROM tb_leads_hist WHERE DATE(LEADS_HIST_DATA_FOLLOW) <= '$data_novo_atual' AND LEADS_HIST_STATUS = '6' AND LEADS_HIST_USER = '$ID_USER' ");
    $count_leads_follow = mysqli_query($conexao,"SELECT COUNT(*) FROM tb_leads_hist WHERE DAY(LEADS_HIST_DATA_FOLLOW) <= '$data_atual' AND MONTH(LEADS_HIST_DATA_FOLLOW) <= '$mes_atual' AND LEADS_HIST_STATUS = '6' AND LEADS_HIST_USER = '$ID_USER' ");
    $count_leads_follow = mysqli_fetch_array($count_leads_follow);
    echo $count_leads_follow[0];
}	else	{
echo $c_leads_follow;
}
    ?>
-->
0
    </span>            </a>
    
    <ul class="dropdown-menu">
    <li class="header">Follow Up</li>
    <li>
    
<!--
    <?php
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    ////////	SELECIONA OS FOLLOW UP DO DIA 	/////////

/*
$sql_leads_follow = mysqli_query($conexao,"select * from tb_leads_hist WHERE DAY(LEADS_HIST_DATA) <= '$data_atual' AND MONTH(LEADS_HIST_DATA) <= '$mes_atual' AND LEADS_HIST_STATUS = '6' AND LEADS_HIST_USER = '$ID_USER' ");
while($val_leads_follow = mysqli_fetch_object($sql_leads_follow)):      

$val_not_id_leads	= isset($val_leads_follow->LEADS_HIST_LEADS) ? $val_leads_follow->LEADS_HIST_LEADS : '';
$data_follow		= isset($val_leads_follow->LEADS_HIST_DATA_FOLLOW) ? $val_leads_follow->LEADS_HIST_DATA_FOLLOW : '';
$hora_follow		= isset($val_leads_follow->LEADS_HIST_HORA_FOLLOW) ? $val_leads_follow->LEADS_HIST_HORA_FOLLOW : '';

if($data_follow > '')	{
$data_follow_DIA = substr($data_follow, 8, 4);
$data_follow_MES = substr($data_follow, 5, 2);
$data_follow_ANO = substr($data_follow, 0, 4);
$data_follow = $data_follow_DIA.'/'.$data_follow_MES.'/'.$data_follow_ANO;
}
*/

    
$sql_leads_follow = mysqli_query($conexao,"select * from tb_leads WHERE LEADS_STATUS = '6' AND LEADS_USER = '$ID_USER' ");
while($val_leads_follow = mysqli_fetch_object($sql_leads_follow)):      

$notificacao_id		= isset($val_leads_follow->ID_LEADS) ? $val_leads_follow->ID_LEADS : '';
$notificacao_nome	= isset($val_leads_follow->LEADS_NOME) ? $val_leads_follow->LEADS_NOME : '';


////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
$a_follow = mysqli_query($conexao,"select * from tb_leads_hist WHERE LEADS_HIST_LEADS = '$notificacao_id' ORDER BY ID_LEADS_HIST DESC ");
$a_leads_follow = mysqli_fetch_object($a_follow);  

$a_id_hist	= isset($a_leads_follow->ID_LEADS_HIST) ? $a_leads_follow->ID_LEADS_HIST : '';
$a_status_hist	= isset($a_leads_follow->LEADS_HIST_STATUS) ? $a_leads_follow->LEADS_HIST_STATUS : '';

////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
//$sql_follow = mysqli_query($conexao,"select * from tb_leads_hist WHERE DATE(LEADS_HIST_DATA_FOLLOW) <= '$data_novo_atual' AND LEADS_HIST_STATUS = '6' AND LEADS_HIST_USER = '$ID_USER' AND LEADS_HIST_LEADS = '$notificacao_id' AND ID_LEADS_HIST = '$a_id_hist' ORDER BY ID_LEADS_HIST DESC ");
$sql_follow = mysqli_query($conexao,"select * from tb_leads_hist WHERE DAY(LEADS_HIST_DATA_FOLLOW) <= '$data_atual' AND MONTH(LEADS_HIST_DATA_FOLLOW) <= '$mes_atual' AND LEADS_HIST_STATUS = '6' AND LEADS_HIST_USER = '$ID_USER' AND LEADS_HIST_LEADS = '$notificacao_id' AND ID_LEADS_HIST = '$a_id_hist' ORDER BY ID_LEADS_HIST DESC ");
$n_leads_follow = mysqli_fetch_object($sql_follow);  

$val_not_id_hist	= isset($n_leads_follow->ID_LEADS_HIST) ? $n_leads_follow->ID_LEADS_HIST : '';
$val_not_id_leads	= isset($n_leads_follow->LEADS_HIST_LEADS) ? $n_leads_follow->LEADS_HIST_LEADS : '';
$data_follow		= isset($n_leads_follow->LEADS_HIST_DATA_FOLLOW) ? $n_leads_follow->LEADS_HIST_DATA_FOLLOW : '';
$hora_follow		= isset($n_leads_follow->LEADS_HIST_HORA_FOLLOW) ? $n_leads_follow->LEADS_HIST_HORA_FOLLOW : '';

if($data_follow > '')	{
$data_follow_DIA = substr($data_follow, 8, 4);
$data_follow_MES = substr($data_follow, 5, 2);
$data_follow_ANO = substr($data_follow, 0, 4);
$data_follow = $data_follow_DIA.'/'.$data_follow_MES.'/'.$data_follow_ANO;
}



if($val_not_id_leads > '')	{
?>
    <ul class="menu">
      <li>
        <a href="leads-operador.php?ID_LEADS=<?php echo $notificacao_id; ?>">
          <div class="pull-left">
            <i class="fa fa-phone-square"></i>
          </div>
          <h4><?php echo $val_not_id_hist; ?> - <?php echo $notificacao_nome; ?> | <?php echo $data_follow; ?> - <?php echo $hora_follow; ?></h4>
        </a>
      </li>
    </ul>
<?php
}
 endwhile;
?>
    
-->
    </li>
    </ul>
    </li>








    <li class="dropdown messages-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
<!--
    <i class="fa fa-bell-o"></i>
-->
<i class="fa fa-dollar"></i>
<span class="label label-danger">
<?php
$data_atual = date("d");
$mes_atual = date("m");
$ano_atual = date("Y");

    $data_novo_atual = date("Y/m/d");

/////	SELECT O Nº DE PGAMENTO Q VENCE NO DIA
$count_pgto = mysqli_query($conexao,"SELECT COUNT(*) FROM tb_valor_contratacao WHERE DATE(VALOR_CONTR_DATA_PGTO) <= '$data_novo_atual' AND VALOR_CONTR_STATUS = '2' AND VALOR_CONTR_USER = '$ID_USER' ");
//$count_pgto = mysqli_query($conexao,"SELECT COUNT(*) FROM tb_valor_contratacao WHERE DAY(VALOR_CONTR_DATA_PGTO) <= '$data_atual' AND MONTH(VALOR_CONTR_DATA_PGTO) <= '$mes_atual' AND VALOR_CONTR_STATUS = '2' AND VALOR_CONTR_USER = '$ID_USER' ");
$count_pgto = mysqli_fetch_array($count_pgto);
echo $count_pgto[0];
?>
</span>            </a>
    
<ul class="dropdown-menu">
<li class="header">Notificação de Pagamento</li>
<li>

<?php
///////////////////////////////////////////////////////////////////////////////////////////////////
////////	SELECIONA OS PAGAMENTOS DO DIA e VENCIDAS 	/////////
$sql_pgto = mysqli_query($conexao,"select * from tb_valor_contratacao WHERE DATE(VALOR_CONTR_DATA_PGTO) <= '$data_novo_atual' AND VALOR_CONTR_STATUS = '2' AND VALOR_CONTR_USER = '$ID_USER' ");
while($val_pgto = mysqli_fetch_object($sql_pgto)):      


$pgto_id	 		= isset($val_pgto->ID_VALOR_CONTR) ? $val_pgto->ID_VALOR_CONTR : '';
$pgto_valor 		= isset($val_pgto->VALOR_CONTR_VALOR_PARCELA) ? $val_pgto->VALOR_CONTR_VALOR_PARCELA : '';
$pgto_leads			= isset($val_pgto->VALOR_CONTR_LEADS) ? $val_pgto->VALOR_CONTR_LEADS : '';
$pgto_leads_leads	= isset($val_pgto->VALOR_CONTR_LEADS) ? $val_pgto->VALOR_CONTR_LEADS : '';

$pgto_data				= isset($val_pgto->VALOR_CONTR_DATA_PGTO) ? $val_pgto->VALOR_CONTR_DATA_PGTO : '';
if($pgto_data > '')	{
$pgto_data_DIA = substr($pgto_data, 8, 4);
$pgto_data_MES = substr($pgto_data, 5, 2);
$pgto_data_ANO = substr($pgto_data, 0, 4);
$pgto_data = $pgto_data_DIA.'/'.$pgto_data_MES.'/'.$pgto_data_ANO;
}
?>
    <ul class="menu">
      <li>
        <a href="operador-ficha-intermediacao.php?ID_LEADS=<?php echo $pgto_leads_leads; ?>">
          <div class="pull-left">
            <i class="fa fa-dollar"></i>
          </div>
          <h4><?php echo $pgto_data; ?> - <?php echo $pgto_valor; ?> </h4>
    <!--                      <p>Why not buy a new awesome theme?</p>		-->
        </a>
      </li>
    </ul>
    <?php
     endwhile;
    ?>
    
    </li>
    </ul>
    </li>
<?php
}
?> 



<!-- Notifications: style can be found in dropdown.less -->
<!--
<li class="dropdown notifications-menu">

<a href="#" class="dropdown-toggle" data-toggle="dropdown">
<i class="fa fa-file-text-o"></i>
<span class="label label-warning">2</span>            </a>	
         
<ul class="dropdown-menu">
<li class="header">Contratos a vencer</li>
<li>
<ul class="menu">
  <li>
    <a href="#">
      <i class="fa fa-file-text-o text-yellow"></i> 
      29/04/2020 - Magno Leandro Santos
    </a>
  </li>

  <li>
    <a href="#">
      <i class="fa fa-file-text-o text-yellow"></i> 
      08/05/2020 - Pedro Anacleto
    </a>
  </li>

</ul>
</li>
</ul>
</li>
-->


<!-- Notifications: style can be found in dropdown.less -->
<!--
<li class="dropdown notifications-menu">

<a href="#" class="dropdown-toggle" data-toggle="dropdown">
<i class="fa fa-dollar"></i>
<span class="label label-danger">2</span>            </a>	
         
<ul class="dropdown-menu">
<li class="header">Contas a vencer/ vencidas</li>
<li>

<ul class="menu">
  <li>
    <a href="#">
      <i class="fa fa-dollar text-red"></i> 
      05/05/2020 - Conta de Luz - R$ 99,99
    </a>
  </li>

  <li>
    <a href="#">
      <i class="fa fa-dollar text-red"></i> 
      05/05/2020 - Conta de Internet - R$ 99,99
    </a>
  </li>

</ul>
</li>
</ul>
</li>
-->