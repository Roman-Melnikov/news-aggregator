@extends('layouts.main')
@section('content')
    <div>
        <h2>Все новости</h2>
    </div>
    <div class="row mb-2">
        @forelse($news as $item)
            <div class="col-md-6">
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <strong class="d-inline-block mb-2 text-primary">{{ $item->author }}</strong>
                        <h3 class="mb-0">
                            <a class="text-dark" href="{{ route('news.show', $item->id) }}">{{ $item->title }}</a>
                        </h3>
                        <div class="mb-1 text-muted">{{ $item->created_at }}</div>
                        <p class="card-text mb-auto">{!! $item->description !!}</p>
                        <a href="{{ route('news.show', $item->id) }}">Читать далее</a>
                    </div>
                    <img src="{{Storage::disk('public')->url($item->image)}}"
                         class="card-img-right flex-auto d-none d-md-block"
                         style="width: 250px;height: 250px"
                         data-src="holder.js/200x250?theme=thumb"
                         alt="Card image cap">
                </div>
            </div>
        @empty
            <h2>Новостей нет</h2>
        @endforelse
    </div>
    {{$news->links()}}
@endsection
