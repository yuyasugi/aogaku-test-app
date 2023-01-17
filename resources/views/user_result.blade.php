@extends('layouts.admin')

@section('content')
<div class="test-result"style="width: 100%">
    <table border="1">
        <tr>
            <th>教科</th>
            <th>参考書</th>
            <th>単元</th>
            <th>点数</th>
        </tr>
        @foreach($TestResults as $TestResult)
            <tr>
                <th>{{$TestResult->subject_id}}</th>
                <th>{{$TestResult->reference_book_id}}</th>
                <th>{{$TestResult->unit_id}}</th>
                <th><p>{{ $score . '/' . $issue_count . '点'}}</p></th>
            </tr>
        @endforeach
    </table>
@endsection
