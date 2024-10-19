<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">
  </head>
  <body>



    <div style="padding: 10px ,align-content:center">

        <h1 style="text-align: center">Get data from database</h1>
        <form action="{{ url("search") }}" method="GET" style="align-content: center">
            @csrf
            <input type="text" name="search" id="">
            <input type="submit" name="submit" id="">

        </form>
        <a href="{{ url("/") }}"><button type="button" class="btn" aria-label="delete">Add student</button></a>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">image</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as  $student)
                <tr>
                    <th scope="row">{{ $student->id }}</th>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td><img src="student/{{$student->image}}" alt="Girl in a jacket" width="100" height="100"></td>
                    <td>
                        <a href="{{ url("delete",$student->id) }}"><button type="button" class="btn" aria-label="delete">Delete</button></a>
                        <a href="{{ url("singleview",$student->id) }}"><button type="button" class="btn" aria-label="edit">Update</button></a>

                    </td>
                  </tr>
                @endforeach

            </tbody>
          </table>

    </div>



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
