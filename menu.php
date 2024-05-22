<?php
//echo $ID_USER;
$user = mysqli_query($conexao,"select * from tb_administrador WHERE ID_ADMINISTRADOR = '$ID_USER' ");
$valida_user = mysqli_fetch_object($user);  
$DEPARTAMENO_USER = isset($valida_user->ADMINISTRADOR_DEPARTAMENTO) ? $valida_user->ADMINISTRADOR_DEPARTAMENTO : '';
///////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
  <!-- Sidebar user panel -->
  <div class="user-panel">
    <div class="pull-left image">
<!--
      <img src="dist/img/icone-user.png" class="img-circle" alt="User Image">
-->
      <img src="fotos-operador/<?php echo $USER_FOTO;?>" class="img-circle" alt="User Image" width="45" height="45">
    </div>
    <div class="pull-left info">
      <p><?php echo utf8_encode($USER_NOME);?></p>
      
<?php 
if($USER_TIPO == '1')
echo " Administrador ";
elseif($USER_TIPO == '2')
echo " Operador ADM ";
elseif($USER_TIPO == '3')
echo " Supervisor ";
elseif($USER_TIPO == '4')
echo " Operador ";
elseif($USER_TIPO == '5')
echo " Jur&iacute;dico Supervisor";
elseif($USER_TIPO == '6')
echo " Jur&iacute;dico Operador ";
elseif($USER_TIPO == '7')
echo utf8_encode(" Jur&iacute;dico Consumidor ");
elseif($USER_TIPO == '8')
echo utf8_encode(" Jur&iacute;dico Laudo ");
elseif($USER_TIPO == '9')
echo " Processual ";
//elseif($USER_TIPO == '10')
//echo " Financeiro ";
elseif($USER_TIPO == '11')
echo " Reten&ccedil;&atilde;o ";
?>
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>

  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">MENU</li>

    <li><a href="principal.php"><i class="fa fa-dashboard"></i> <span>Home</span></a></li>


<?php
IF($USER_TIPO == '1')	{
?> 
	<li class="active treeview menu-open">
	<a href="#">
	<i class="fa fa-folder"></i> <span>ADMINISTRADOR</span>
	<span class="pull-right-container">
	<i class="fa fa-angle-left pull-right"></i>	</span>	</a>
	<ul class="treeview-menu">
    <li><a href="principal-user.php"><i class="fa fa-user-secret"></i> Usu&aacute;rios</a></li>
    <li><a href="principal-supervisor-user.php"><i class="fa fa-users"></i>Supervisor/ Usu&aacute;rios</a></li>
    <li><a href="principal-bancos.php"><i class="fa fa-bank"></i>Bancos</a></li>
    <li><a href="principal-comissao.php"><i class="fa fa-money"></i>Comiss&atilde;o</a></li>
    <li><a href="mensagem-dia.php"><i class="fa fa-commenting-o"></i>Mensagem do Dia</a></li>
    <li><a href="script-texto.php"><i class="fa fa-edit"></i>Script Operador</a></li>
<br />
    <li><a href="principal-leads.php"><i class="fa fa-table"></i> Leads</a></li>
    <li><a href="principal-leads-distribuir.php"><i class="fa fa-user-secret"></i> Distribuir Leads</a></li>
    <li><a href="pesquisa-leads.php"><i class="fa fa-search"></i> Pesquisa Leads</a></li>
    <li><a href="principal-leads-troca-operador.php"><i class="fa fa-paper-plane"></i> Trocar Leads de Operador</a></li>
<br />
<!--
    <li><a href="#"><i class="fa fa-users"></i> Clientes</a></li>
    <li><a href="#"><i class="fa fa-automobile"></i> Ve&iacute;culos</a></li>
<br />
-->
    <li><a href="principal-meta.php"><i class="fa fa-line-chart"></i> Meta </a></li>
    <li><a href="principal-meta-grafico.php"><i class="fa fa-bar-chart"></i> Meta Gr&aacute;fico</a></li>
    <li><a href="principal-pgto-aberto-supervisor.php"><i class="fa fa-dollar"></i> Pagamentos em Aberto</a></li>
<br />
    <li><a href="relatorio.php"><i class="fa fa-file-text"></i> Relat&oacute;rio </a></li>
    <li><a href="user-relatorio.php"><i class="fa fa-file-text"></i> Relat&oacute;rio User</a></li>
    <li><a href="relatorio-marketing-fornecedor.php"><i class="fa fa-file-text"></i> Relat&oacute;rio Leads</a></li>
    <li><a href="relatorio-prioridade.php"><i class="fa fa-file-text"></i> Relat&oacute;rio Prioridade</a></li>
    <li><a href="relatorio-pgto-operador.php"><i class="fa fa-file-text"></i> Relat&oacute;rio de Pagamentos</a></li>
    <br />
<!--
    <li><a href="principal-atendimentos.php"><i class="fa fa-commenting"></i> Atendimentos</a></li>
    <li><a href="atendimentos-pesquisa.php"><i class="fa fa-search"></i> Pesquisa Atendimentos</a></li>
    <li><a href="principal-contratos.php"><i class="fa fa-file-text"></i> Contratos</a></li>

<br />
    <li><a href="#"><i class="fa fa-random"></i> N&iacute;vel de Acesso</a></li>
-->
	</ul>
	</li>
<?php
	}
?> 





<?php
IF(($USER_TIPO == '1') or ($USER_TIPO == '2'))	{
?> 
	<li class="active treeview menu-open">
	<a href="#">
	<i class="fa fa-folder"></i> <span>OPERADOR ADM</span>
	<span class="pull-right-container">
	<i class="fa fa-angle-left pull-right"></i>	</span>	</a>
	<ul class="treeview-menu">

    <li><a href="principal-leads.php"><i class="fa fa-table"></i> Leads</a></li>
    <li><a href="principal-leads-distribuir.php"><i class="fa fa-user-secret"></i>Distribuir Leads Supervisor</a></li>
<!--
    <li><a href="pesquisa-leads.php"><i class="fa fa-search"></i> Pesquisa Leads</a></li>
-->
<br />
    <li><a href="principal-leads-op-adm.php"><i class="fa fa-clipboard"></i> Fechado Revis&atilde;o</a></li>
    <li><a href="principal-leads-op-adm-enviados.php"><i class="fa fa-paper-plane-o"></i> Enviados para o Jur&iacute;dico</a></li>
<br />
    <li><a href=""><i class="fa fa-file-text"></i> Relat&oacute;rio Leads</a></li>
<br />
	</ul>
	</li>
<?php
	}
?> 





<?php
IF(($USER_TIPO == '1') or ($USER_TIPO == '3'))	{
?> 
	<li class="active treeview menu-open">
	<a href="#">
	<i class="fa fa-folder"></i> <span>SUPERVISOR</span>
	<span class="pull-right-container">
	<i class="fa fa-angle-left pull-right"></i>	</span>	</a>
	<ul class="treeview-menu">

    <li><a href="principal-leads-supervisor.php"><i class="fa fa-table"></i>Leads Supervisor</a></li>
    <li><a href="principal-leads-distribuir-operador.php"><i class="fa fa-user-secret"></i>Distribuir Leads Operador</a></li>
    <li><a href="pesquisa-leads.php"><i class="fa fa-search"></i> Pesquisa Leads</a></li>
    <li><a href="principal-leads-troca-operador.php"><i class="fa fa-paper-plane"></i> Trocar Leads de Operador</a></li>
<br />
    <li><a href="principal-leads-operador-sup.php?STATUS=7"><i class="fa fa-chain-broken"></i> Em Negocia&ccedil;&atilde;o/ Retorno</a></li>
    <li><a href="principal-leads-operador-follow-up-sup.php"><i class="fa fa-phone-square"></i> Aguardando Dados</a></li>
    <li><a href="principal-leads-operador-n-atende-sup.php"><i class="fa fa-phone-square"></i> N&atilde;o Atende</a></li>
    <li><a href="principal-leads-operador-acordo-sup.php"><i class="fa fa-clipboard"></i> Fechado Revis&atilde;o</a></li>
<br />
    <li><a href="principal-bancos.php"><i class="fa fa-bank"></i>Bancos</a></li>
    <li><a href="principal-comissao.php"><i class="fa fa-money"></i>Comiss&atilde;o</a></li>
    <li><a href="mensagem-dia.php"><i class="fa fa-commenting-o"></i>Mensagem do Dia</a></li>
    <li><a href="script-texto.php"><i class="fa fa-edit"></i>Script Operador</a></li>
    <li><a href="principal-meta.php"><i class="fa fa-line-chart"></i> Meta </a></li>
    <li><a href="principal-meta-grafico.php"><i class="fa fa-bar-chart"></i> Meta Gr&aacute;fico</a></li>
    <li><a href="principal-pgto-aberto-supervisor.php"><i class="fa fa-dollar"></i> Pagamentos em Aberto</a></li>
<br />
    <li><a href="relatorio.php"><i class="fa fa-file-text"></i> Relat&oacute;rio </a></li>
    <li><a href="user-relatorio.php"><i class="fa fa-file-text"></i> Relat&oacute;rio User</a></li>
    <li><a href="relatorio-prioridade.php"><i class="fa fa-file-text"></i> Relat&oacute;rio Prioridade</a></li>
    <li><a href="relatorio-pgto-operador.php"><i class="fa fa-file-text"></i> Relat&oacute;rio de Pagamentos</a></li>
<br />
	</ul>
	</li>
<?php
	}
?> 





<?php
if(($USER_TIPO == '1') or ($USER_TIPO == '4'))	{
?> 
	<li class="active treeview menu-open">
	<a href="#">
	<i class="fa fa-folder"></i> <span>OPERADOR</span>
	<span class="pull-right-container">
	<i class="fa fa-angle-left pull-right"></i>	</span>	</a>
	<ul class="treeview-menu">

    <li><a href="principal-leads-operador.php"><i class="fa fa-table"></i> Leads</a></li>

    <li><a href="principal-leads-operador.php?STATUS=7"><i class="fa fa-chain-broken"></i> Em Negocia&ccedil;&atilde;o/ Retorno</a></li>
    <li><a href="principal-leads-operador-follow-up.php"><i class="fa fa-phone-square"></i> Aguardando Dados</a></li>
    <li><a href="principal-leads-operador-n-atende.php"><i class="fa fa-phone-square"></i> N&atilde;o Atende</a></li>
    <li><a href="principal-leads-operador-acordo.php"><i class="fa fa-clipboard"></i> Fechado Revis&atilde;o</a></li>

<br />
    <li><a href="principal-pgto-aberto-operador.php"><i class="fa fa-dollar"></i> Pagamentos em Aberto</a></li>
    <li><a href="principal-meta-operador-grafico.php"><i class="fa fa-bar-chart"></i> Meta Operador</a></li>
    <li><a href="principal-comissao-operador.php"><i class="fa fa-money"></i> Comiss&atilde;o</a></li>
<!--
    <li><a href="#"><i class="fa fa-search"></i> Pesquisa Atendimentos</a></li>
    <li><a href="principal-revisao-prospeccao.php"><i class="fa fa-phone"></i> Prospec&ccedil;&atilde;o</a></li>
    <li><a href="principal-revisao-prospeccao.php?STATUS=7"><i class="fa fa-chain-broken"></i> Em Negocia&ccedil;&atilde;o</a></li>
    <li><a href="principal-revisao-prospeccao-follow-up.php"><i class="fa fa-phone-square"></i> Follow Up</a></li>
    <li><a href="principal-revisao-prospeccao.php?STATUS=1"><i class="fa fa-clipboard"></i> Acordo/ Revis&atilde;o</a></li>
    <li><a href="principal-revisao-prospeccao.php?STATUS=4"><i class="fa fa-history"></i> Devolu&ccedil;&atilde;o Carro</a></li>
    <li><a href="revisao-prospeccao-pesquisa.php"><i class="fa fa-search"></i> Pesquisa Atendimentos</a></li>
-->
<br />
	</ul>
	</li>
<?php
	}
?> 




<?php
if(($USER_TIPO == '1') or ($USER_TIPO == '5'))	{
?> 
	<li class="active treeview menu-open">
	<a href="#">
	<i class="fa fa-folder"></i> <span>JUR&Iacute;DICO SUPERVISOR</span>
	<span class="pull-right-container">
	<i class="fa fa-angle-left pull-right"></i>	</span>	</a>
	<ul class="treeview-menu">

    <li><a href="principal-juridico-leads-distribuir.php"><i class="fa fa-table"></i> Distribuir Pasta</a></li>
    <li><a href="principal-pasta.php"><i class="fa fa-table"></i>Pasta</a></li>
<br />
    <li><a href="principal-juridico-troca-operador.php"><i class="fa fa-paper-plane"></i> Trocar Pasta de Operador</a></li>
<br />
    <li><a href=""><i class="fa fa-file-text"></i> Relat&oacute;rio de Pasta</a></li>
<br />

	</ul>
	</li>
<?php
	}
?> 




<?php
if(($USER_TIPO == '1') or ($USER_TIPO == '6'))	{
?> 
	<li class="active treeview menu-open">
	<a href="#">
	<i class="fa fa-folder"></i> <span>JUR&Iacute;DICO OPERADOR</span>
	<span class="pull-right-container">
	<i class="fa fa-angle-left pull-right"></i>	</span>	</a>
	<ul class="treeview-menu">

    <li><a href="principal-juridico-leads-pendente-doc.php"><i class="fa fa-table"></i>Pasta Pendente</a></li>
    <li><a href="principal-juridico-leads-aguardando-consumidor.php"><i class="fa fa-hourglass-2"></i>Aguardando N&ordm; Consumidor</a></li>
<br />

    <li><a href="principal-juridico-laudo.php"><i class="fa fa-table"></i> Laudo</a></li>
    <li><a href="principal-juridico-laudo.php?STATUS=7"><i class="fa fa-chain-broken"></i> Em Negocia&ccedil;&atilde;o</a></li>
    <li><a href="principal-juridico-laudo-follow.php"><i class="fa fa-phone-square"></i> Follow Up</a></li>
    <li><a href="principal-juridico-laudo-fechado.php"><i class="fa fa-clipboard"></i> Laudo Fechado</a></li>

<br />
    <li><a href="#"><s><i class="fa fa-dollar"></i> Pagamentos em Aberto</s></a></li>
    <li><a href="#"><s><i class="fa fa-bar-chart"></i> Meta Operador</s></a></li>
<br />


	</ul>
	</li>
<?php
	}
?> 




<?php
if(($USER_TIPO == '1') or ($USER_TIPO == '7'))	{
?> 
	<li class="active treeview menu-open">
	<a href="#">
	<i class="fa fa-folder"></i> <span>JUR&Iacute;DICO CONSUMIDOR</span>
	<span class="pull-right-container">
	<i class="fa fa-angle-left pull-right"></i>	</span>	</a>
	<ul class="treeview-menu">

    <li><a href="principal-consumidor-aguardando-consumidor.php"><i class="fa fa-hourglass-2"></i>Aguardando N&ordm; Consumidor</a></li>
    <li><a href="principal-consumidor-finalizado.php"><i class="fa fa-table"></i>Consumidor Finalizado</a></li>
<br />
    <li><a href=""><i class="fa fa-file-text"></i> Relat&oacute;rio</a></li>
<br />

	</ul>
	</li>
<?php
	}
?> 

    <li><a href="logout_administrador.php"><i class="fa fa-circle-o text-red"></i> <span>Sair</span></a></li>
  </ul>
</section>
<!-- /.sidebar -->
</aside>
