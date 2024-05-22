<?php
$ID_LEADS			= isset($_GET['ID_LEADS']) ? $_GET['ID_LEADS'] : '';
$ID_LAUDO			= isset($_GET['ID_LAUDO']) ? $_GET['ID_LAUDO'] : '';
?>
<script>
window.onload = function() {

var r;
var r=confirm("Você deseja enviar esse PASTA para o PROCESSUAL?");
if (r==true)
  {
  location.href = 'laudo-enviar-processual-actions.php?ID_LEADS=<?php echo $ID_LEADS ; ?>&&ID_LAUDO=<?php echo $ID_LAUDO ; ?>';
  }
else
  {
  location.href = 'principal-laudo-gerado.php';
  }
document.getElementById("demo").innerHTML=x;

	// códigos JavaScript a serem executados quando a página carregar
}
</script>
