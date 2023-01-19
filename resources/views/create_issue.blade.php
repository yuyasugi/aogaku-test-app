<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<nav class="navbar navbar-light bg-success">
    <div class="container-fluid">
      <a class="navbar-brand text-white">青学コーチング</a>
    </div>
</nav>

<form class="create_issue" action="{{ route('store') }}" method="POST">
    @csrf
    <div class="form-group">
        <p>教科</p>
        <input class="form-control w-50" type="text" name="subject">
        <p>参考書</p>
        <input class="form-control w-50" type="text" name="referenceBook">
        <p>単元</p>
        <input class="form-control w-50" type="text" name="unit">
        <h2>問題</h2>
        <p>問題文</p>
        <textarea class="form-control w-50" name="problem" rows="3"></textarea>
        <p>解答</p>
        <input class="form-control w-50" type="text" name="anser">
        <p>解説</p>
        <textarea class="form-control mb-3" name="commentary" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-success">保存</button>
</form>
