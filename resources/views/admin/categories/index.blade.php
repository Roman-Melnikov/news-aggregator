@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Список категорий</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{route('admin.categories.create')}}">Добавить категорию</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered text-center">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Заголовок</th>
                <th>Описание</th>
                <th>Дата добавления</th>
                <th>Дата обновления</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categoriesList as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->title}}</td>
                    <td>{{$category->description}}</td>
                    <td>{{$category->created_at}}</td>
                    <td>{{$category->updated_at}}</td>
                    <td><a href="{{route('admin.categories.edit', ['category' => $category])}}">Изм.</a> &nbsp; <a
                            href="javascript:;" class="delete" rel="{{$category->id}}" style="color: red;">Уд.</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Записей нет</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        {{$categoriesList->links()}}
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', () => {
            let elements = document.querySelectorAll('.delete');
            elements.forEach((el) => {
                el.addEventListener('click', () => {
                    const id = el.getAttribute('rel');
                    if (confirm(`Подтверждаете удаление категории с #ID = ${id}`)) {
                        send(`/admin/categories/${id}`).then(() => {
                            location.reload();
                        });
                    } else {
                        alert('Удаление отменено');
                    }
                });
            });
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

