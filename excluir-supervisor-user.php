<?php
$ID_ADMINISTRADOR 			= isset($_GET['ID_ADMINISTRADOR']) ? $_GET['ID_ADMINISTRADOR'] : '';
$ID_SUPERVISOR_USER 		= isset($_GET['ID_SUPERVISOR_USER']) ? $_GET['ID_SUPERVISOR_USER'] : '';
?>
<script>
window.onload = function() {

var r;
var r=confirm("Voc\u00ea deseja remover esse Operador do Supervisor?");
if (r==true)
  {
  location.href = 'excluir-supervisor-user-confirma.php?ID_ADMINISTRADOR=<?php echo $ID_ADMINISTRADOR ; ?>&&ID_SUPERVISOR_USER=<?php echo $ID_SUPERVISOR_USER ; ?>';
  }
else
  {
  location.href = 'supervisor-user.php?ID_ADMINISTRADOR=<?php echo $ID_ADMINISTRADOR ; ?>';
  }
document.getElementById("demo").innerHTML=x;

	// códigos JavaScript a serem executados quando a página carregar
}
</script>
