@extends('layouts.app', ['authgroup'=>'admin'])

@section('content')
<div class="main d-flex">
    <div class="name-list" style="width: 15%">
        @foreach ($Users as $User)
        <ul class="list-group">
            <a href="{{ route('admin.user_result', $User->id) }}"><li class="list-group-item text-center">{{$User->name}}</li></a>
        </ul>
        @endforeach
    </div>
    <div class="test-result"style="width: 100%">
        @yield('content')
    </div>
</div>
@endsection
