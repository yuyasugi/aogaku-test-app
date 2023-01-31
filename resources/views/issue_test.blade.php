@extends('layouts.auth')

@section('content')
<form class="issue-box pt-3" action="{{ route('user.result_test') }}" method="POST">
    @csrf
    @foreach($UnitIssue as $Issue)
    <p>{{$Issue->problem}}</p>
    <input class="form-control mb-3" name="{{$Issue->id}}" type="text" placeholder="解答を入力" aria-label="default input example">
    @endforeach
    <input type="hidden" name="unit_id" value="{{$UnitId}}">
    <button type="submit" class="btn btn-success">解答</button>
</form>
@endsection
