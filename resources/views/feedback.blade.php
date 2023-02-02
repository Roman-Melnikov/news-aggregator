@extends('layouts.main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Оставьте свой отзыв о работе проекта</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <div>
        <form method="post" action="{{ route('feedback.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Ваше имя</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="comment">Комментарий</label>
                <textarea class="form-control" id="comment" name="comment">{{ old('comment') }}</textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Отправить</button>
        </form>
    </div>
@endsection
