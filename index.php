<?php 
include('connection.php'); // trayendo el archivo en el cual se realizo la coneccion a la BD

$con = connection(); // pasando la coneccion a una variable

$sql = "SELECT * FROM users"; // pasando consulta de la BD a una variable

$query = mysqli_query($con, $sql); // uniendo las dos vaiables en una sola en formato de consulta(query)
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Crud PHP</title>
</head>
<body>
  <div class="users-form">
    <form action="insert_user.php" method="POST"> <!-- archivo referencia para crear usuarios -->
      <h1>Crear Usuario</h1>

      <input type="text" name="name" placeholder="Nombre">
      <input type="text" name="lastname" placeholder="Apellido">
      <input type="text" name="username" placeholder="Usuario">
      <input type="text" name="password" placeholder="Contraseña">
      <input type="text" name="email" placeholder="Email">

      <input type="submit" value="Añadir +">
    </form>
  </div>

  <div class="users-table">
    <h2>Usuarios Registrados</h2>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Usuario</th>
          <th>Contraseña</th>
          <th>Email</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = mysqli_fetch_array($query)): ?> <!-- while para recorrer la tabla  -->
        <tr>
          <th> <?= $row['id'] ?> </th> <!-- insertando los datos en html  -->
          <th> <?= $row['name'] ?></th>
          <th> <?= $row['lastname'] ?></th>
          <th> <?= $row['username'] ?></th>
          <th> <?= $row['password'] ?></th>
          <th> <?= $row['email'] ?></th>

          <th><a href="update.php?id=<?= $row['id'] ?>" class="users-table--edit">Editar</a></th> <!-- se le pasa el row para pasar como -->
          <th><a href="delete_user.php?id=<?= $row['id'] ?>" class="users-table--delete">Eliminar</a></th> <!-- parametro la id -->
        </tr>
        <?php endwhile; ?>  <!-- finalizar el recorrido  -->
      </tbody>
    </table>
  </div>
</body>
</html>