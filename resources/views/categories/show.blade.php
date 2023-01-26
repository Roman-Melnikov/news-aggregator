@extends('layouts.main')
@section('content')
    <div>
        <h2>{{$name}}</h2>
    </div>
    <div class="row mb-2">
        @forelse($categoryNews as $item)
            <div class="col-md-6">
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <strong class="d-inline-block mb-2 text-primary">{{ $item['author'] }}</strong>
                        <h3 class="mb-0">
                            <a class="text-dark" href="{{ route('news.one', $item['id']) }}">{{ $item['title'] }}</a>
                        </h3>
                        <div class="mb-1 text-muted">{{ $item['created_at'] }}</div>
                        <p class="card-text mb-auto">{!! $item['description'] !!}</p>
                        <a href="{{ route('news.one', $item['id']) }}">Читать далее</a>
                    </div>
                    <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb"
                         alt="Card image cap">
                </div>
            </div>
        @empty
            <h2>В категории новостей нет</h2>
        @endforelse
    </div>
@endsection
