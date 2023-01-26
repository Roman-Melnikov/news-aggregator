@extends('layouts.main')
@section('content')
    <div>
        <h2>Категории</h2>
    </div>
    <div class="row mb-2">
        @forelse($categories as $item)
            <div class="col-md-6">
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <h3 class="mb-0">
                            <a class="text-dark"
                               href="{{ route('categories.one', $item['id']) }}">{{ $item['name'] }}</a>
                        </h3>
                        <p class="card-text mb-auto">{!! $item['description'] !!}</p>
                        <a href="{{ route('categories.one', $item['id']) }}">Смотреть новости категории</a>
                    </div>
                    <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb"
                         alt="Card image cap">
                </div>
            </div>
        @empty
            <h2>Категорий нет</h2>
        @endforelse
    </div>
@endsection
