@extends('layouts.auth')

@section('content')
<header style="background-color: rgb(6, 121, 56); height: 45px">
    <div class="header-text text-light">
        <p class="text-center fw-bold pt-3">ホーム</p>
    </div>
</header>
<div class="container pt-4">
    <div class="rule" style="background-color:rgb(222, 225, 225); height:55px; border-radius:30px">
        <p class="text-center fw-bold pt-3">分からない問題は解答しないこと！！</p>
    </div>
    <div class="button text-center mt-5">
        <a href="{{ route('user.subject_test') }}"><button type="button" class="btn btn-success" style="width: 45%; height:150px; margin-right:10px; border-radius:20px">確認テスト</button></a>
        <a href="{{ route('user.subject_practice') }}"><button type="button" class="btn btn-success" style="width: 45%; height:150px; border-radius:20px">練習問題</button></a>
    </div>
</div>
@endsection
