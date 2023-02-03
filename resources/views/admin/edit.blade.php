@extends('adminLayouts.auth')

@section('content')
<form class="issue-box pt-3" action="{{ route('admin.update') }}" method="POST">
    @csrf
    <div class="form-group">
        <p>問題</p>
        <textarea class="form-control mb-3" name="problem" type="text" cols="30" rows="1">{{$Issue->problem}}</textarea>
        <p>解答</p>
        <textarea class="form-control mb-3" name="anser" type="text" cols="30" rows="1">{{$Issue->anser}}</textarea>
        <p>解説</p>
        <textarea class="form-control mb-3" name="commentary" type="text" cols="30" rows="5">{{$Issue->commentary}}</textarea>
    </div>
    <input type="hidden" name="issue_id" value="{{ $Issue['id'] }}">
    <button type="submit" class="btn btn-success">更新</button>
</form>
@endsection
