@extends('admin.layouts.app_admin')

@section('content')

    <div class="container-fluid">

        @component('admin.components.breadcrumb')
            @slot('title') Список пользователей @endslot
            @slot('parent') Главная @endslot
            @slot('active') Пользователи @endslot
        @endcomponent


        <a href="{{route('admin.user_managment.user.create')}}" type="button" class="btn btn-primary" role="button" aria-disabled="true">Создать
            пользователя</a>
        <table class="table table-striped">
            <thead>
            <th>Имф</th>
            <th>Email</th>
            <th class="text-right">Действие</th>
            </thead>
            <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td class="text-right">
                        <form onsubmit="if(confirm('Удалить?')){ return true }else{ return false }"
                              action="{{route('admin.user_managment.user.destroy', $user)}}" method="post">
                            {{method_field('DELETE')}}
                            {{ csrf_field() }}

                            <a  type="button" class="btn btn-primary"href="{{route('admin.user_managment.user.edit', $user)}}">Изменить<i
                                    class="fa fa-edit"></i></a>

                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o">Удалить</i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center"><h2>Данные отсутствуют</h2></td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td colspan="4">
                    <ul class="pagination pull-right">
                        {{$users->links()}}
                    </ul>
                </td>
            </tr>
            </tfoot>

        </table>
    </div>
@endsection
