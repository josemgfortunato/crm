<?php
$ID_LEADS 				= isset($_GET['ID_LEADS']) ? $_GET['ID_LEADS'] : '';
$ID_LEADS_JURIDICO_DOC 	= isset($_GET['ID_LEADS_JURIDICO_DOC']) ? $_GET['ID_LEADS_JURIDICO_DOC'] : '';
?>
<script>
window.onload = function() {

var r;
var r=confirm("Voc\u00ea deseja excluir essa Doc?");
if (r==true)
  {
  location.href = 'excluir-juridico-doc-confirma.php?ID_LEADS=<?php echo $ID_LEADS; ?>&&ID_LEADS_JURIDICO_DOC=<?php echo $ID_LEADS_JURIDICO_DOC; ?>';
  }
else
  {
  location.href = 'juridico-leads-pendente-doc.php?ID_LEADS=<?php echo $ID_LEADS; ?>';
  }
document.getElementById("demo").innerHTML=x;

	// códigos JavaScript a serem executados quando a página carregar
}
</script>
