<!DOCTYPE html>
<?php
include("Conexion.php");
 ?>
<html>
  <head>
    <title>Editar material</title>
    <link rel="stylesheet" type="text/css" href="Styles\Estilos.css">
  </head>
  <body>
    <?php
    if (isset($_POST['enviar'])) {
      $id=$_POST['id'];
      $nombre=$_POST['nombre'];
      $codigo=$_POST['codigo'];
      $precio=$_POST['precio'];

      $sql="update materiales set nombre='".$nombre."', codigo='".$codigo."',
            precio='".$precio."' where id='".$id."'";
     $resultado= mysqli_query($conexion,$sql);
     if ($resultado) {
       echo "<script language='JavaScript'>
              alert('Los datos fueron acutlizados correctamente');
              location.assign('Index.php');</script>";
     }else {
       echo "<script language='JavaScript'>
              alert('ERROR los datos no fueron actualizados');
              location.assign('Index.php');</script>";
     }
     mysqli_close($conexion);
    }else {
      $id=$_GET['id'];
      $sql="select*from materiales where id='".$id."'";
      $resultado=mysqli_query($conexion,$sql);
      $filas=mysqli_fetch_assoc($resultado);
      $nombre=$filas['nombre'];
      $codigo=$filas['codigo'];
      $precio=$filas['precio'];

      mysqli_close($conexion);
     ?>
    <h1>Editar material</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>"method="post">
      <label>Nombre:</label>
      <input type="text" name="nombre" value="<?php echo "$nombre" ?>"><br>

      <label>Codigo de barras:</label>
      <input type="text" name="codigo"value="<?php echo "$codigo" ?>"><br>

      <label>Precio:</label>
      <input type="text" name="precio"value="<?php echo "$precio" ?>"><br>

      <input type="hidden" name="id"value="<?php echo "$id" ?>"><br>

      <input type="submit" name="enviar" value="Actualizar"><br>
      <a href="Index.php">Regresar</a>
    </form>
    <?php
  }
     ?>
  </body>
</html>
