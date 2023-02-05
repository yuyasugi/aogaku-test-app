@extends('adminLayouts.auth')

@section('content')
<header style="background-color: rgb(6, 121, 56); height: 45px">
    <div class="header-text text-light">
        <p class="text-center fw-bold pt-3">問題編集</p>
    </div>
</header>
<div class="button text-center">
    @foreach($EditSubject as $Subject)
    <a href="{{ route('admin.edit_reference_book', $Subject->id) }}"><button type="button" class="btn btn-success" style="width: 90%; height:150px; margin-top:20px; border-radius:20px">{{$Subject->name}}</button></a>
    @endforeach
</div>
@endsection
