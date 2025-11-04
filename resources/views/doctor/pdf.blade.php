<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf</title>
</head>
<body>
    <h1>tabla doctor</h1>
    <table class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th scope="col">Codigo doctor</th>
            <th scope="col">Nombre</th>
            <th scope="col">Celula</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($doctor as $doctor)
          
          <tr>
            
            <td>
              {{$doctor->coddoctor}}
            </td>
            <td>
              {{$doctor->nombre}}
            </td>
            <td>
              {{$doctor->celula}}
            </td>
            
           
          </tr>
          
          @endforeach
        </tbody>
      </table>
</body>
</html>