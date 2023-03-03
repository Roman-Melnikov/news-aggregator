@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать пользователя</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif

        <form method="post" action="{{route('admin.users.update', ['user' => $user])}}">
            @csrf
            @method('put')
            <fieldset>
                <legend>Укажите тип пользователя</legend>
                <div class="form-group">
                    <input type="radio"
                           class="form-check-inline"
                           name="is_admin"
                           id="admin"
                           value="1"
                           @if($user->is_admin === true) checked @endif
                    >
                    <label for="admin" class="form-check-inline">Администратор</label>
                </div>
                <div class="form-group">
                    <input type="radio"
                           class="form-check-inline"
                           name="is_admin"
                           id="user"
                           value="0"
                           @if($user->is_admin === false) checked @endif
                    >
                    <label for="user" class="form-check-inline">Обычный пользователь</label>
                </div>
            </fieldset>
            <br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
