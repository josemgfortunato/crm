<?php
$ID_LEADS			= isset($_GET['ID_LEADS']) ? $_GET['ID_LEADS'] : '';
?>
<script>
window.onload = function() {

var r;
var r=confirm("Você deseja enviar esse LEADS para o ADM OPERADOR?");
if (r==true)
  {
  location.href = 'operador-envia-op-adm-actions.php?ID_LEADS=<?php echo $ID_LEADS ; ?>';
  }
else
  {
  location.href = 'principal-leads-operador-acordo.php';
  }
document.getElementById("demo").innerHTML=x;

	// códigos JavaScript a serem executados quando a página carregar
}
</script>
