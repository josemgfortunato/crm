<?php
$ID_META 			= isset($_GET['ID_META']) ? $_GET['ID_META'] : '';
?>
<script>
window.onload = function() {

var r;
var r=confirm("Voc\u00ea deseja excluir essa Meta?");
if (r==true)
  {
  location.href = 'excluir-meta-confirma.php?ID_META=<?php echo $ID_META ; ?>';
  }
else
  {
  location.href = 'principal-meta.php';
  }
document.getElementById("demo").innerHTML=x;

	// c�digos JavaScript a serem executados quando a p�gina carregar
}
</script>
