@extends('layouts.auth')

@section('content')
<form class="issue-box pt-3" action="{{ route('result') }}" method="POST">
    @csrf
    @foreach($UnitIssue as $Issue)
    <p>{{$Issue->problem}}</p>
    <input class="form-control mb-3" name="{{$Issue->id}}" type="text" placeholder="解答を入力" aria-label="default input example">
    @endforeach
    <input type="hidden" name="unit_id" value="{{$UnitId}}">
    <input type="hidden" name="user_id" value="{{$UserId}}">
    <button type="submit" class="btn btn-success">解答</button>
</form>
@endsection
