<?php
$ID_LEADS			= isset($_GET['ID_LEADS']) ? $_GET['ID_LEADS'] : '';
$ID_LEADS_JURIDICO	= isset($_GET['ID_LEADS_JURIDICO']) ? $_GET['ID_LEADS_JURIDICO'] : '';
?>
<script>
window.onload = function() {

var r;
var r=confirm("Você deseja enviar essa Pasta para o JUR\u00cdDICO CONSUMIDOR?");
if (r==true)
  {
  location.href = 'juridico-enviar-consumidor-actions.php?ID_LEADS=<?php echo $ID_LEADS ; ?>&&ID_LEADS_JURIDICO=<?php echo $ID_LEADS_JURIDICO; ?>';
  }
else
  {
  location.href = 'principal-juridico-leads-pendente-doc.php';
  }
document.getElementById("demo").innerHTML=x;

	// códigos JavaScript a serem executados quando a página carregar
}
</script>
