@extends('layouts.auth')

@section('content')
<form class="issue-box pt-3" action="{{ route('result') }}" method="POST">
    @csrf
    @foreach($Issue as $Issue)
    <p>{{$Issue->problem}}</p>
    <input class="form-control mb-3" name="anser" type="text" placeholder="解答を入力" aria-label="default input example">
    @endforeach
    <button type="submit" class="btn btn-success">解答</button>
</form>
@endsection