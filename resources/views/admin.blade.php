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
<div class="main d-flex">
    <div class="name-list" style="width: 15%">
        @foreach ($Users as $User)
        <ul class="list-group">
            <li class="list-group-item text-center">{{$User->name}}</li>
            <li class="list-group-item text-center">{{$User->name}}</li>
            <li class="list-group-item text-center">{{$User->name}}</li>
            <li class="list-group-item text-center">{{$User->name}}</li>
            <li class="list-group-item text-center">{{$User->name}}</li>
        </ul>
        @endforeach
    </div>
    <div class="test-result"style="width: 100%">
        <table border="1">
            <tr>
                <th>名前</th>
                <th>点数</th>
                <th>単元</th>
                <th>作成日時</th>
                <th>更新日時</th>
            </tr>
            @foreach($TestResults as $TestResult)
                <tr>
                    <th>{{$TestResult->user_id}}</th>
                    <th>{{$TestResult->score}}</th>
                    <th>{{$TestResult->unit_test_id}}</th>
                    <th>{{$TestResult->created_at}}</th>
                    <th>{{$TestResult->updated_at}}</th>
                </tr>
            @endforeach
        </table>
    </div>
</div>