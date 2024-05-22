<?php
$ID_LEADS 			= isset($_GET['ID_LEADS']) ? $_GET['ID_LEADS'] : '';
?>
<script>
window.onload = function() {

var r;
var r=confirm("Voc\u00ea deseja excluir esse Leads?");
if (r==true)
  {
  location.href = 'excluir-leads-confirma.php?ID_LEADS=<?php echo $ID_LEADS ; ?>';
  }
else
  {
  location.href = 'principal-leads.php';
  }
document.getElementById("demo").innerHTML=x;

	// códigos JavaScript a serem executados quando a página carregar
}
</script>
