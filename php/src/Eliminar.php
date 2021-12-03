<?php
include("Conexion.php");

$id=$_GET['id'];
$sql="delete from materiales where id='".$id."'";
$resultado= mysqli_query($conexion,$sql);
if ($resultado) {
  echo "<script language='JavaScript'>
         alert('Los datos fueron borrados de la BD');
         location.assign('Index.php');
         </script>
         ";

}else {
  echo "<script language='JavaScript'>
         alert('ERROR los datos no borrados de la BD');
         location.assign('Index.php');
         </script>
         ";
}
 ?>
