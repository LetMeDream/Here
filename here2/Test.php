<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="test.css" />
    <script src="main.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
      <h1 style='text-align:center;'> Clientes registrados en base de datos</h1>
      <div>
        <div style='text-align:center; ' class='here'>
          
          <table role="table">
              <thead role="rowgroup">
                <tr role="row">
                  <th role="columnheader">Nombre completo</th>
                  <th role="columnheader">Edad</th>
                  <th role="columnheader">Teléfono</th>
                  <th role="columnheader">Correo</th>
                  <th role="columnheader">Website</th>
                  <th role="columnheader">Profesión</th>
                  <th role="columnheader">Estado</th>
                  <th role="columnheader">Ciudad</th>
                  <th role="columnheader">Sexo</th>
                  <th role="columnheader">País</th>
                  
                </tr>
              </thead>
              <tbody role="rowgroup">
              <?php
                $db = mysqli_connect('localhost', 'root', '', 'letsphp');
                $sql = 'SELECT * FROM clientes';
                $result = mysqli_query($db, $sql);
                // Now printing

                foreach($result as $x){
                  printf('<tr>
                  <td> %s %s </td>
                  <td> %s </td>
                  <td> %s </td>
                  <td> %s </td>
                  <td> %s </td>
                  <td> %s </td>
                  <td> %s </td>
                  <td> %s </td>
                  <td> %s </td>
                  <td> %s </td>
                  </tr>',
                    $x['nombre'],
                    $x['apellido'],
                    $x['edad'],
                    $x['telefono'],
                    $x['correo'],
                    $x['website'],
                    $x['profesion'],
                    $x['estado'],
                    $x['ciudad'],
                    $x['sexo'],
                    $x['country']);
                }

              ?>
              </tbody>
          </table>
        </div>  
      </div>
      <a href='here2.php'><button type="button" class="btn btn-dark">Agregar nuevo usuario</button></a>
</body>
</html>