@extends('adminLayouts.auth')

@section('content')
    @foreach($UnitIssue as $Issue)
    <div class="form-group">
        <a href="{{ route('admin.edit', $Issue->id) }}"><p>{{$Issue->problem}}</p>
    </div>
    @endforeach
@endsection
