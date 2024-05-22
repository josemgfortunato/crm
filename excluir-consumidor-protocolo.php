<?php
$ID_LEADS 					= isset($_GET['ID_LEADS']) ? $_GET['ID_LEADS'] : '';
$ID_CONSUMIDOR_PROTOCOLO 	= isset($_GET['ID_CONSUMIDOR_PROTOCOLO']) ? $_GET['ID_CONSUMIDOR_PROTOCOLO'] : '';
?>
<script>
window.onload = function() {

var r;
var r=confirm("Voc\u00ea deseja excluir esse Consumidor/Protocolo?");
if (r==true)
  {
  location.href = 'excluir-consumidor-protocolo-confirma.php?ID_LEADS=<?php echo $ID_LEADS ; ?>&&ID_CONSUMIDOR_PROTOCOLO=<?php echo $ID_CONSUMIDOR_PROTOCOLO ; ?>';
  }
else
  {
  location.href = 'juridico-consumidor-protocolo.php?ID_LEADS=<?php echo $ID_LEADS; ?>&&ID_CONSUMIDOR_PROTOCOLO=<?php echo $ID_CONSUMIDOR_PROTOCOLO; ?>';
  }
document.getElementById("demo").innerHTML=x;

	// códigos JavaScript a serem executados quando a página carregar
}
</script>
