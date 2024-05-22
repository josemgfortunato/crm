<?php
$ID_VALOR_CONTR 	= isset($_GET['ID_VALOR_CONTR']) ? $_GET['ID_VALOR_CONTR'] : '';
$ID_LEADS 			= isset($_GET['ID_LEADS']) ? $_GET['ID_LEADS'] : '';
?>
<script>
window.onload = function() {

var r;
var r=confirm("Voc\u00ea deseja excluir esse Registro?");
if (r==true)
  {
  location.href = 'excluir-operador-ficha-intermediacao-confirma.php?ID_VALOR_CONTR=<?php echo $ID_VALOR_CONTR ; ?>&&ID_LEADS=<?php echo $ID_LEADS ; ?>';
  }
else
  {
  location.href = 'operador-ficha-intermediacao.php?ID_LEADS=<?php echo $ID_LEADS ; ?>';
  }
document.getElementById("demo").innerHTML=x;

	// códigos JavaScript a serem executados quando a página carregar
}
</script>
