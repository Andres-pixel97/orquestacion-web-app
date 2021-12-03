<!DOCTYPE html>
<html >
  <head>
    <title>Agregar</title>
    <link rel="stylesheet" type="text/css" href="Styles\Estilos.css">
  </head>
  <body>
    <?php
      if (isset($_POST['enviar'])) {
        $nombre=$_POST['nombre'];
        $codigo=$_POST['codigo'];
        $precio=$_POST['precio'];

        include("Conexion.php");
        $sql="insert into materiales(nombre,codigo,precio)
              values('".$nombre."', '".$codigo."', '".$precio."')";

        $resultado=mysqli_query($conexion,$sql);
        if ($resultado) {
          echo "<script language='JavaScript'>
                 alert('Los datos fueron agregados correctamente a la BD');
                 location.assign('Index.php');
                 </script>";
        }else {
          echo "<script language='JavaScript'>
                 alert('ERROR los datos no fueron agregados a la BD');
                 location.assign('Index.php');
                 </script>
                 ";
        }
        mysqli_close($conexion);
      }else {
     ?>
    <h1>Agregar nuevo material</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>"method="post">
      <label>Nombre:</label>
      <input type="text" name="nombre"><br>

      <label>Codigo de barras:</label>
      <input type="text" name="codigo"><br>

      <label>Precio:</label>
      <input type="text" name="precio"><br>
      <input type="submit" name="enviar" value="Agregar"><br>
      <a href="Index.php">Regresar</a>
    </form>
  <?php
}
   ?>
  </body>
</html>
