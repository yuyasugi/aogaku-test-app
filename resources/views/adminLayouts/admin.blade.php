<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<nav class="navbar navbar-light bg-success">
    <div class="container-fluid">
      <a class="navbar-brand text-white">青学コーチング</a>
    </div>
</nav>
<div class="main d-flex">
    <div class="name-list" style="width: 15%">
        @foreach ($Users as $User)
        <ul class="list-group">
            <a href="http://localhost:8888/user_result/{{$User->id}}"><li class="list-group-item text-center">{{$User->name}}</li></a>
        </ul>
        @endforeach
    </div>
    <div class="test-result"style="width: 100%">
        @yield('content')
    </div>
</div>

