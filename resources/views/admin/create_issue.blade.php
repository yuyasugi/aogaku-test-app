@extends('adminLayouts.auth')

@section('content')
    <form class="create_issue" action="{{ route('admin.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <p>教科</p>
            <select class="form-control" name="subject">
                @foreach ($createSubjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                @endforeach
            </select>
            <p>参考書</p>
            <select class="form-control" name="referenceBook">
                @foreach ($createReferenceBooks as $reference_book)
                    <option value="{{ $reference_book->id }}">{{ $reference_book->name }}</option>
                @endforeach
            </select>
            <p>単元</p>
            <select class="form-control" name="unit">
                @foreach ($createUnits as $unit)
                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                @endforeach
            </select>
            <h2>問題</h2>
            <p>問題文</p>
            <textarea class="form-control w-50" name="problem" rows="3"></textarea>
            <p>解答</p>
            <input class="form-control w-50" type="text" name="anser">
            <p>解説</p>
            <textarea class="form-control mb-3" name="commentary" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-success">保存</button>
    </form>
@endsection
