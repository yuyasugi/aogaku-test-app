<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<nav class="navbar navbar-light bg-success">
    <div class="container-fluid">
      <a class="navbar-brand text-white">青学コーチング</a>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-warning" type="submit">Search</button>
      </form>
    </div>
  </nav>
@foreach ($Users as $User)
<ul class="list-group" style="width: 15%">
    <li class="list-group-item text-center">{{$User->name}}</li>
    <li class="list-group-item text-center">{{$User->name}}</li>
    <li class="list-group-item text-center">{{$User->name}}</li>
    <li class="list-group-item text-center">{{$User->name}}</li>
    <li class="list-group-item text-center">{{$User->name}}</li>
  </ul>
@endforeach