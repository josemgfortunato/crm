<?php
$ID_ADMINISTRADOR 			= isset($_GET['ID_ADMINISTRADOR']) ? $_GET['ID_ADMINISTRADOR'] : '';
?>
<script>
window.onload = function() {

var r;
var r=confirm("Voc\u00ea deseja excluir esse Usuário?");
if (r==true)
  {
  location.href = 'excluir-user-confirma.php?ID_ADMINISTRADOR=<?php echo $ID_ADMINISTRADOR ; ?>';
  }
else
  {
  location.href = 'principal-user.php';
  }
document.getElementById("demo").innerHTML=x;

	// códigos JavaScript a serem executados quando a página carregar
}
</script>
