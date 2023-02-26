<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <h3>Hospital</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($srevice as $srevice)
                <tr>

                    <th scope="row">{{ $srevice->id }}</th>
                    <td>{{ $srevice->name }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>

    <form action="{{route('save_services_todoctor')}}" method="POST">
      @csrf
      <div class="container">
        
        
        <div class=" d-flex justify-content-center">
          
          
          <div class="row col-4 ">
            
            <label for="srevices">select srevices</label>
            <select name="srevices[]" class=" m-2 from-control" multiple>
              
                    @foreach ($srevices as $serve)
                        <option value="{{ $serve->id }}">{{ $serve->name }}</option>
                    @endforeach
                    
                  </select>
                  
                  <label for="doctor">select doctor</label>
                  <select name="doctor" class="m-2 from-control">
                    
                    @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                    @endforeach
                    
                  </select>
                  
                  <button type="submit" name="save" class="btn btn-primary">Primary</button>
                </div>
              </div>
              
            </div>
          </div>
        </form>
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>
</html>
