<?php
$ID_BANCO 			= isset($_GET['ID_BANCO']) ? $_GET['ID_BANCO'] : '';
?>
<script>
window.onload = function() {

var r;
var r=confirm("Voc\u00ea deseja excluir esse Banco?");
if (r==true)
  {
  location.href = 'excluir-bancos-confirma.php?ID_BANCO=<?php echo $ID_BANCO ; ?>';
  }
else
  {
  location.href = 'principal-bancos.php';
  }
document.getElementById("demo").innerHTML=x;

	// códigos JavaScript a serem executados quando a página carregar
}
</script>
