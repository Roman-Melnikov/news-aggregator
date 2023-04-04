@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Список источников</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{route('admin.sources.create')}}">Добавить источник</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered text-center">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Наименование</th>
                <th>Url</th>
                <th>Дата добавления</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($sourcesList as $source)
                <tr>
                    <td>{{$source->id}}</td>
                    <td>{{$source->name}}</td>
                    <td class="text-left">{{$source->url}}</td>
                    <td>{{$source->created_at}}</td>
                    <td>
                        <a href="{{route('admin.sources.edit', ['source' => $source])}}">Изм.</a> &nbsp;
                        <a href="javascript:;"
                           class="delete"
                           rel="{{$source->id}}"
                           style="color: red;"
                        >
                            Уд.
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Записей нет</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        {{$sourcesList->links()}}
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            let elements = document.querySelectorAll('.delete');
            elements.forEach((el) => {
                el.addEventListener('click', function () {
                    const id = el.getAttribute('rel');
                    if (confirm(`Подтверждаете удаление источника с #ID = ${id}`)) {
                        send(`/admin/sources/${id}`).then(() => {
                            location.reload();
                        })
                    } else {
                        alert('Удаление отменено');
                    }

                })
            })
        })

        async function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });

            let result = await response.json();

            return result.ok;
        }
    </script>
@endpush


