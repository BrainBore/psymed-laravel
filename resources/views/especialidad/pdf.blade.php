<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf especilidad</title>
</head>
<body>
    <h1>tabla especialdiad</h1>
    <table class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th scope="col">codigo especialidad</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($especialidad as $especialidad)
          
          <tr>
            <td>
              {{$especialidad->codespecialidad}}
            </td>
            <td>
              {{$especialidad->nombre}}
            </td>
            <td>
              {{$especialidad->descripcion}}
            </td>
            
            
          </tr>
             
          @endforeach
        </tbody>
      
      </table>
</body>
</html>