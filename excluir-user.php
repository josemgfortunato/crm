<?php
$ID_ADMINISTRADOR 			= isset($_GET['ID_ADMINISTRADOR']) ? $_GET['ID_ADMINISTRADOR'] : '';
?>
<script>
window.onload = function() {

var r;
var r=confirm("Voc\u00ea deseja excluir esse Usu�rio?");
if (r==true)
  {
  location.href = 'excluir-user-confirma.php?ID_ADMINISTRADOR=<?php echo $ID_ADMINISTRADOR ; ?>';
  }
else
  {
  location.href = 'principal-user.php';
  }
document.getElementById("demo").innerHTML=x;

	// c�digos JavaScript a serem executados quando a p�gina carregar
}
</script>
