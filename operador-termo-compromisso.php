<?php
$ID_USER 		= isset($_COOKIE["ID_USER"]) ? $_COOKIE["ID_USER"] : '';
if($ID_USER == ''){	
include "sessao-expirou.php";
}


//include "Connections/conecta_banco.php";
include "valida_cookie_admin.php";


$ID_LEADS = isset($_GET['ID_LEADS']) ? $_GET['ID_LEADS'] : '';


//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sql_leads = mysqli_query($conexao,"select * from tb_leads WHERE ID_LEADS = '$ID_LEADS' AND LEADS_STATUS = '1' ");
$val_leads = mysqli_fetch_object($sql_leads);  
///////////////////////////////////////////////////////
$val_id_leads		= isset($val_leads->ID_LEADS) ? $val_leads->ID_LEADS : '';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

$sql_hist_leads = mysqli_query($conexao,"select * from tb_leads_hist WHERE LEADS_HIST_LEADS = '$ID_LEADS' AND LEADS_HIST_STATUS = '1' ORDER BY ID_LEADS_HIST DESC ");
$val_hist_leads = mysqli_fetch_object($sql_hist_leads);  
///////////////////////////////////////////////////////
$val_id_hist_leads		= isset($val_hist_leads->ID_LEADS_HIST) ? $val_hist_leads->ID_LEADS_HIST : '';
$val_data_hist_leads	= isset($val_hist_leads->LEADS_HIST_DATA) ? $val_hist_leads->LEADS_HIST_DATA : '';
$val_data_hist_leads_DIA = substr($val_data_hist_leads, 8, 4);
$val_data_hist_leads_MES = substr($val_data_hist_leads, 5, 2);
$val_data_hist_leads_ANO = substr($val_data_hist_leads, 0, 4);
$val_data_hist_leads = $val_data_hist_leads_DIA.'/'.$val_data_hist_leads_MES.'/'.$val_data_hist_leads_ANO;


if($val_data_hist_leads_MES == '01')
$val_data_hist_leads_MES_val = " Janeiro ";
elseif($val_data_hist_leads_MES == '02')
$val_data_hist_leads_MES_val = " Fevereiro ";
elseif($val_data_hist_leads_MES == '03')
$val_data_hist_leads_MES_val = " Março ";
elseif($val_data_hist_leads_MES == '04')
$val_data_hist_leads_MES_val = " Abril ";
elseif($val_data_hist_leads_MES == '05')
$val_data_hist_leads_MES_val = " Maio";
elseif($val_data_hist_leads_MES == '06')
$val_data_hist_leads_MES_val = " Junho ";
elseif($val_data_hist_leads_MES == '07')
$val_data_hist_leads_MES_val = " Julho ";
elseif($val_data_hist_leads_MES == '08')
$val_data_hist_leads_MES_val = " Agosto ";
elseif($val_data_hist_leads_MES == '09')
$val_data_hist_leads_MES_val = " Setembro ";
elseif($val_data_hist_leads_MES == '10')
$val_data_hist_leads_MES_val = " Outubro ";
elseif($val_data_hist_leads_MES == '11')
$val_data_hist_leads_MES_val = " Novembro ";
elseif($val_data_hist_leads_MES == '12')
$val_data_hist_leads_MES_val = " Dezembro ";

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////



$sql_ficha = mysqli_query($conexao,"select * from tb_ficha_intermediacao WHERE FICHA_INTER_LEADS = '$ID_LEADS' ");
$val_ficha = mysqli_fetch_object($sql_ficha);  
///////////////////////////////////////////////////////
$val_ficha_cliente 	= isset($val_ficha->FICHA_INTER_CLIENTE) ? $val_ficha->FICHA_INTER_CLIENTE : '';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////



$sql_clientes = mysqli_query($conexao,"select * from tb_clientes WHERE ID_CLIENTE = '$val_ficha_cliente' ");
$val_clientes = mysqli_fetch_object($sql_clientes);  
///////////////////////////////////////////////////////

$val_id_cliente 				= isset($val_clientes->ID_CLIENTE) ? $val_clientes->ID_CLIENTE : '';
$val_cliente_status 			= isset($val_clientes->CLIENTE_STATUS) ? $val_clientes->CLIENTE_STATUS : '';
$val_cliente_nome 				= isset($val_clientes->CLIENTE_NOME) ? $val_clientes->CLIENTE_NOME : '';
$val_cliente_responsavel		= isset($val_clientes->CLIENTE_RESPONSAVEL) ? $val_clientes->CLIENTE_RESPONSAVEL : '';
$val_cliente_cnpj				= isset($val_clientes->CLIENTE_CNPJ) ? $val_clientes->CLIENTE_CNPJ : '';
$val_cliente_cpf				= isset($val_clientes->CLIENTE_CPF) ? $val_clientes->CLIENTE_CPF : '';
$val_cliente_rg					= isset($val_clientes->CLIENTE_RG) ? $val_clientes->CLIENTE_RG : '';
$val_cliente_data_nasc			= isset($val_clientes->CLIENTE_DATA_NASC) ? $val_clientes->CLIENTE_DATA_NASC : '';
$val_cliente_tel1				= isset($val_clientes->CLIENTE_TELEFONE_1) ? $val_clientes->CLIENTE_TELEFONE_1 : '';
$val_cliente_tel2				= isset($val_clientes->CLIENTE_TELEFONE_2) ? $val_clientes->CLIENTE_TELEFONE_2 : '';
$val_cliente_estado_civil		= isset($val_clientes->CLIENTE_ESTADO_CIVIL) ? $val_clientes->CLIENTE_ESTADO_CIVIL : '';
$val_cliente_profissao			= isset($val_clientes->CLIENTE_PROFISSAO) ? $val_clientes->CLIENTE_PROFISSAO : '';
$val_cliente_email				= isset($val_clientes->CLIENTE_EMAIL) ? $val_clientes->CLIENTE_EMAIL : '';
$val_cliente_endereco			= isset($val_clientes->CLIENTE_ENDERECO) ? $val_clientes->CLIENTE_ENDERECO : '';
$val_cliente_n					= isset($val_clientes->CLIENTE_N) ? $val_clientes->CLIENTE_N : '';
$val_cliente_complemento		= isset($val_clientes->CLIENTE_COMPLEMENTO) ? $val_clientes->CLIENTE_COMPLEMENTO : '';
$val_cliente_bairro				= isset($val_clientes->CLIENTE_BAIRRO) ? $val_clientes->CLIENTE_BAIRRO : '';
$val_cliente_cidade				= isset($val_clientes->CLIENTE_CIDADE) ? $val_clientes->CLIENTE_CIDADE : '';
$val_cliente_uf					= isset($val_clientes->CLIENTE_UF) ? $val_clientes->CLIENTE_UF : '';
$val_cliente_cep				= isset($val_clientes->CLIENTE_CEP) ? $val_clientes->CLIENTE_CEP : '';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////


?>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>SISTEMA | AVT PRIME</title>

<link rel="icon" type="image/png" href="favicon.ico">
<style type="text/css">
<!--
td img {display: block;}body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
}
a:active {
	text-decoration: none;
}

#tabela-final{
	margin-right:auto; 
	margin-left:auto;
}
-->
</style>

<link rel="stylesheet" href="styles.css" />

<style type="text/css">
<!--
.style14 {
	font-family: calibri;
	font-size: 16x;
	color: #000;
}
.style15 {
	font-size: 18
}
.style18 {color: #000; font-family: calibri;}
.style21 {
	font-size: 18px
}
.style23 {color: #000; font-family: calibri; font-weight: bold; }
.style24 {
	font-size: 20px;
	color: #FFFFFF;
}
-->
</style>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="style85"><img src="imagens/base-invisivel.png" width="400" height="8" /></td>
  </tr>
</table>
<table width="1000" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#e2e2e2">
  <tr>
    <td height="1403" align="center" valign="top" background="dist/img/marca-dagua.jpg"><table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td class="style85"><img src="imagens/base-invisivel.png" width="400" height="8" /></td>
      </tr>
    </table>
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="30%" height="64"> <div align="center"><img src="dist/img/logo-contrato.jpg" width="175" height="96" /></div></td>
        </tr>
    </table>
      <p><br />
      </p>
      <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="960" height="30" bgcolor="#001A31"><div align="center" class="style18 style24"><strong>TERMO DE  RESPONSABILIDADE E COMPROMISSO: PRESTAÇÃO DE SERVIÇOS</strong></div></td>
        </tr>
      </table>
      <br />
      <br />
      <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><div align="center" class="style14">
            <p align="justify" class="style15"><strong>Atividade</strong>:  REVISÃO DE CONTRATOS BANCÁRIOS - juros abusivos  (financiamento e empréstimo).<br />
                <br />
                <br />
              <strong>Contratada: </strong>Contratada PRIME ASSESSORIA E APOIO ADMINISTRATIVO EIRELI, pessoa jurídica de Direito Privado, regularmente Inscrita sob CNPJ nº 37.443.042/0001-07 , com sede na Rua das Monções 364 – Bairro Jardim – Santo André – SP – CEP 09090-521.<br />
                <br />
                <br />
              Pelo presente TERMO DE RESPONSABILIDADE E COMPROMISSO, eu <u><span class="style23"><?php echo $val_cliente_nome; ?></span></u>,  ocupante do cargo <u><strong><?php echo $val_cliente_profissao; ?></strong></u>,  inscrito no CPF sob o nº <u><strong><?php echo $val_cliente_cpf; ?></strong></u>  doravante denominado CONTRATANTE, informo estar ciente das normas e diretrizes para  prestação de serviço nesta instituição e assumo os seguintes compromissos:<br />
              <br />
            </p>
            <ul>
              <li>
                <div align="left">Pagar o importe de R$ <?php
$sql_total = mysqli_query($conexao,"select sum(cast(replace(replace(VALOR_CONTR_VALOR, '.', ''), ',', '.') as decimal(10,2))) FROM tb_valor_contratacao WHERE VALOR_CONTR_LEADS = '$ID_LEADS' AND VALOR_CONTR_STATUS < '3' ");
$sql_total = mysqli_fetch_array($sql_total);
echo $valor_total_contratado = number_format($sql_total[0], 2, ',', '.');
?>
<?php

$valor_total_contratado = str_replace(".","", $valor_total_contratado); // remove ponto
$valor_total_contratado = str_replace(",",".", $valor_total_contratado); // troca virgulapor ponto

$VALOR_CONTRATADO = valorPorExtenso1( $valor_total_contratado );

function valorPorExtenso1($valor=0) {
    $singular = array("Centavo", "Real", "Mil", "MilhÃ£o", "BilhÃ£o", "TrilhÃ£o", "QuatrilhÃ£o");
    $plural = array("Centavos", "Reais", "Mil", "MilhÃµes", "BilhÃµes", "TrilhÃµes","QuatrilhÃµes");

    $c = array("", "Cem", "Duzentos", "Trezentos", "Quatrocentos","Quinhentos", "Seiscentos", "Setecentos", "Oitocentos", "Novecentos");
    $d = array("", "Dez", "Vinte", "Trinta", "Quarenta", "Cinquenta","Sessenta", "Setenta", "Oitenta", "Noventa");
    $d10 = array("Dez", "Onze", "Doze", "treze", "Quatorze", "Quinze","Dezesseis", "Dezesete", "Dezoito", "Dezenove");
    $u = array("", "Um", "Dois", "TrÃªs", "Quatro", "Cinco", "Seis","Sete", "Oito", "Nove");

    $z=0;

    $valor = number_format($valor, 2, ".", ".");
    $inteiro = explode(".", $valor);
    for($i=0;$i<count($inteiro);$i++)
        for($ii=strlen($inteiro[$i]);$ii<3;$ii++)
            $inteiro[$i] = "0".$inteiro[$i];

    // $fim identifica onde que deve se dar junÃ§Ã£o de centenas por "e" ou por "," ðŸ˜‰
    $fim = count($inteiro) - ($inteiro[count($inteiro)-1] > 0 ? 1 : 2);
    for ($i=0;$i<count($inteiro);$i++) {
        $valor = $inteiro[$i];
        $rc = (($valor > 100) && ($valor < 200)) ? "cento" : $c[$valor[0]];
        $rd = ($valor[1] < 2) ? "" : $d[$valor[1]];
        $ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : "";

        $r = $rc.(($rc && ($rd || $ru)) ? " e " : "").$rd.(($rd && $ru) ? " e " : "").$ru;
        $t = count($inteiro)-1-$i;
        $r .= $r ? " ".($valor > 1 ? $plural[$t] : $singular[$t]) : "";
        if ($valor == "000")$z++; elseif ($z > 0) $z--;
        if (($t==1) && ($z>0) && ($inteiro[0] > 0)) $r .= (($z>1) ? " de " : "").$plural[$t]; 
        if ($r) $rt = $rt . ((($i > 0) && ($i <= $fim) && ($inteiro[0] > 0) && ($z < 1)) ? ( ($i < $fim) ? ", " : " e ") : " ") . $r;
    }

    return($rt ? $rt : "zero");
}


//echo $VALOR_CONTRATADO;
?>
 (<?php echo $VALOR_CONTRATADO; ?> ) referente a entrada  do procedimento revisional. </div>
              </li>
              <li>
<?php
//$sql_val_pgto = mysqli_query($conexao,"SELECT * FROM tb_valor_contratacao WHERE VALOR_CONTR_LEADS = '$ID_LEADS' AND VALOR_CONTR_STATUS <'3' ORDER BY ID_VALOR_CONTR DESC ");

$val_valor_sql = mysqli_query($conexao,"select * from tb_valor_contratacao WHERE VALOR_CONTR_LEADS = '$ID_LEADS' ORDER BY VALOR_CONTR_DATA_PGTO DESC ");
$sql_val = mysqli_fetch_object($val_valor_sql);  

//$ID_VALOR_CONTR = isset($sql_val->ID_VALOR_CONTR) ? $sql_val->ID_VALOR_CONTR : '';
$VALOR_CONTR_DATA_PGTO = isset($sql_val->VALOR_CONTR_DATA_PGTO) ? $sql_val->VALOR_CONTR_DATA_PGTO : '';
$VALOR_CONTR_DATA_PGTO_DIA = substr($VALOR_CONTR_DATA_PGTO, 8, 4);
$VALOR_CONTR_DATA_PGTO_MES = substr($VALOR_CONTR_DATA_PGTO, 5, 2);
$VALOR_CONTR_DATA_PGTO_ANO = substr($VALOR_CONTR_DATA_PGTO, 0, 4);
$VALOR_CONTR_DATA_PGTO = $VALOR_CONTR_DATA_PGTO_DIA.'/'.$VALOR_CONTR_DATA_PGTO_MES.'/'.$VALOR_CONTR_DATA_PGTO_ANO;
?>
                <div align="left">Realizar o pagamento total do serviço pendente até  a data <u><?php echo $VALOR_CONTR_DATA_PGTO; ?></u>. <!--___/___/_____.--> </div>
              </li>
            </ul>
            <p align="justify" class="style15"><br />
              O prazo  para início da revisão contratual na esfera administrativa será contado a  partir da data do pagamento total do valor acordado e da assinatura do  instrumento de prestação de serviço. <br />
              <br />
              <br />
              Sendo  o atraso superior a 20 (vinte) dias corridos, tal fato desobrigará a <strong>CONTRATADA</strong> de dar continuidade aos  serviços, podendo, a seu critério, desconsiderar o aviso prévio determinado  neste instrumento e pausar imediatamente seus serviços, operando-se a rescisão  automática, por insolvência do(a) <strong>CONTRATANTE.</strong></p>
            <p align="justify" class="style15">&nbsp;</p>
            <p align="justify" class="style15">&nbsp;</p>
            <p align="center" class="style15">ESTE DOCUMENTO PASSA  A TER VALIDADE COM A ASSINATURA DO CONTRATANTE.</p>
            <p align="center" class="style15"><span class="style21">
            Santo André, <?php echo $val_data_hist_leads_DIA; ?> de <?php echo $val_data_hist_leads_MES_val; ?> de <?php echo $val_data_hist_leads_ANO; ?>.
			<?php //echo $val_data_hist_leads; ?>
            </span></p>
            <p align="center" class="style15">&nbsp;</p>
            <p align="center" class="style15">&nbsp;</p>
            <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="94" background="assinatura-carimbo-termo-compromisso.jpg"><div align="center" class="style14"><br />
                      <p align="center"><br />
                        __________________________________________________________</p>
                </div></td>
              </tr>
              <tr>
                <td class="style14"><p align="center"><span class="style23"><?php echo $val_cliente_nome; ?></span><br />
                </p></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
            </table>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="95" background="dist/img/assinatura-carimbo-termo-compromisso.jpg"><div align="center" class="style14"><br />
                        <p align="center"><br />
                      __________________________________________________________</p>
                </div></td>
              </tr>
              <tr>
                <td class="style14"><p align="center">Prime Assessoria e Apoio 
                  Administrativo EIRELI <br />
                  <strong>CNPJ: </strong>37.443.042/0001-07<br />
                  </p>
                  </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
            </table>
            </div></td>
        </tr>
      </table>
      </td>
  </tr>
</table>
