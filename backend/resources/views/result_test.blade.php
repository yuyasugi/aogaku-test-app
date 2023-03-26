@extends('layouts.auth')

@section('content')
<p>{{ $score . '/' . $issue_count . '点'}}</p>
@foreach($issue_result as $Issue)
<p>{{$Issue->problem}}</p>
<p>{{$Issue->anser}}</p>
<p>{{$Issue->commentary}}</p>
@endforeach
@endsection
