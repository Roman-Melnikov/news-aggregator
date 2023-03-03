@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Список пользователей</h1>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered text-center">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Тип</th>
                <th>Имя</th>
                <th>Email</th>
                <th>Подтверждение Email</th>
                <th>Дата добавления</th>
                <th>Дата обновления</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>
                        @if($user->is_admin === true)
                            Администратор
                        @else
                            Пользователь
                        @endif
                    </td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @if(empty($user->email_verified_at))
                            Нет
                        @else
                            Да
                        @endif
                    </td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->updated_at}}</td>
                    <td>
                        <a href="{{route('admin.users.edit', ['user' => $user])}}">Изм.</a>
                        <a href="javascript:;" class="delete" rel="{{$user->id}}" style="color: red" > Уд.</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', () => {
            let elements = document.querySelectorAll('.delete');
            elements.forEach((el) => {
                const id = el.getAttribute('rel');
                el.addEventListener('click', () => {
                    if (confirm(`Подтверждаете удаление пользователя с #ID = ${id}`)) {
                        send(`/admin/users/${id}`).then(() => {
                            location.reload();
                        });
                    } else {
                        alert(`Удаление пользователя с #ID = ${id} отменено`);
                    }
                });
            })
        })

        async function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
            })

            let result = await response.json();
            return result.ok;
        }
    </script>
@endpush
