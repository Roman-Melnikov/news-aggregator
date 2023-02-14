@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать источник</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <div>
        <form method="post" action="{{ route('admin.sources.update', ['source' => $source]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Наименование</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $source->name }}">
            </div>
            <div class="form-group">
                <label for="description">Url</label>
                <input type="text" id="url" name="url" class="form-control" value="{{ $source->url }}">
            </div>
            <br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection

