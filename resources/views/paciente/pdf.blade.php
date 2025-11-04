<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
</head>
<body>
    <h1>Uusarios</h1>
    <table class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th scope="col">Codigo paciente</th>
            <th scope="col">Nombre</th>
            <th scope="col">apellido paterno</th>
            <th scope="col">CI</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($pacientes as $paciente)
          
          <tr>
            
            <th >
                {{$paciente->codpaciente}}
              </th>
              <td>
                {{$paciente->nombre}}
              </td>
              <td>
                {{$paciente->apPaterno}}
              </td>
              <td>
                {{$paciente->celula}}
              </td>
            
            
          </tr>
          
          @endforeach
        </tbody>
      </table>
</body>
</html>