<html>
<head>
<title>Papeleria el clip</title>
<script type="text/javascript">
  function confirmar(){
    return confirm('¿Estas seguro? Se eleminarán los datos')
  }
</script>
<link rel="stylesheet" type="text/css" href="Styles\Estilos.css">
</head>
<body>
  <?php
  include("Conexion.php");
  $sql="select*from materiales";
  $resultado=mysqli_query($conexion,$sql);
   ?>
  <h1>Papeleria el clip (inventario)</h1>
  <a href="Agregar.php">Agregar al inventario</a><br><br>
  <table>
    <thead>
      <tr>
          <th>Id material</th>
          <th>Nom. Material</th>
          <th>Codigo de barras</th>
          <th>Precio</th>
          <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while ($filas=mysqli_fetch_assoc($resultado)) {
       ?>
      <tr>
          <th><?php echo $filas['id']; ?></th>
          <th><?php echo $filas['nombre']; ?></th>
          <th><?php echo $filas['codigo']; ?></th>
          <th><?php echo $filas['precio']; ?></th>
          <th>
            <?php echo "<a href='Editar.php?id=".$filas['id']."'>Editar</a>"?>
            <?php echo "<a href='Eliminar.php?id=".$filas['id']."' onclick='return confirmar()'>Eliminar</a>"?></th>
      </tr>
    <?php
         }
        ?>
    </tbody>
  </table>
  <?php
  mysqli_close($conexion);
   ?>
</body>
</html>
