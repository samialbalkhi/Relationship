<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <h3>Hospital</h3>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">addres</th>
            <th scope="col">action</th>
          </tr>
        </thead>
       
        <tbody>
            @foreach ($hospital as $host )
            
            <tr>
                <th scope="row">{{$host->id}}</th>
                <td>{{$host->name}}</td>
                <td>{{$host->address}}</td>
                <td><a href="{{route('get_doctor',$host->id)}}" class="btn btn-success">Doctors</a></td>
                <td><a href="{{route('deleteHospitals',$host->id)}}" class="btn btn-danger">delete hospital</a></td>
            </tr>
            @endforeach
        </tbody>
      </table>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>