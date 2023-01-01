@extends('layouts.auth')

@section('content')
@foreach($Issue as $TestIssue)
<p>{{$TestIssue->problem_statement}}</p>
<a href="#"><button type="button" class="btn btn-success" style="width: 90%; height:150px; margin-top:20px; border-radius:20px">次へ</button></a>
@endforeach
@endsection