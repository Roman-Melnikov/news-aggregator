@extends('layouts.admin')
@section('title') Админпанель @parent @stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Админка</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="{{route('admin.parser')}}">Парсить новости</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <x-alert type="info" message="Это информационное сообщение"></x-alert>
        <x-alert type="danger" message="Это информационное сообщение"></x-alert>
        <x-alert type="warning" message="Это информационное сообщение"></x-alert>
        <x-alert type="success" message="Это информационное сообщение"></x-alert>
    </div>
@endsection
