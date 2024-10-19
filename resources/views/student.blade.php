<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>create student</h1>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    @if (session('failed'))
    <div class="alert alert-success">
        {{ session('failed') }}
    </div>
@endif

    <a href="{{ url("/view") }}"><button type="submit" class="btn">All Student</button></a>
    <form action="{{ url("upload") }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3" style="padding: 20px;">
            <label for="exampleFormControlInput1" class="form-label">Email </label>
            <input type="email" class="form-control" name="email" placeholder="name@example.com">
          </div>
        <div class="mb-3" style="padding: 20px;">
            <label for="exampleFormControlInput1" class="form-label">name</label>
            <input type="text" class="form-control" name="name" placeholder="name">
          </div>
          <div class="mb-3" style="padding: 20px;">
            <label for="exampleFormControlInput1" class="form-label">image</label>
            <input type="file" class="form-control" name="image">
          </div>

          <button type="submit" class="btn">submit</button>
    </form>

</body>
</html>
