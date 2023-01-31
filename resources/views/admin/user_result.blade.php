@extends('adminlayouts.admin')

@section('content')
    <div class="test-result"style="width: 100%">
        <table border="1">
            <tr>
                <th>教科</th>
                <th>参考書</th>
                <th>単元</th>
                <th>点数</th>
            </tr>
            @foreach($results as $result)
                <tr>
                    <th>{{$result->subjectName}}</th>
                    <th>{{$result->referenceBookName}}</th>
                    <th>{{$result->unitName}}</th>
                    <th><p>{{ $result->score . '/' . $result->issueCount . '点'}}</p></th>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
