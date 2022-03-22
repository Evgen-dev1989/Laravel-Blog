@extends('admin.layouts.app_admin')

@section('content')

    <div class="container-fluid">

        @component('admin.components.breadcrumb')
            @slot('title') Список новостей @endslot
            @slot('parent') Главная @endslot
            @slot('active') Новости @endslot
        @endcomponent


        <a href="{{route('admin.article.create')}}" type="button" class="btn btn-primary" role="button" aria-disabled="true">Создать
            новость</a>
        <table class="table table-striped">
            <thead>
            <th>Наименование</th>
            <th>Публикация</th>
            <th class="text-right">Действие</th>
            </thead>
            <tbody>
            @forelse ($articles as $article)
                <tr>
                    <td>{{$article->title}}</td>
                    <td>{{$article->published}}</td>
                    <td class="text-right">
                        <form onsubmit="if(confirm('Удалить?')){ return true }else{ return false }"
                              action="{{route('admin.article.destroy', $article)}}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            {{ csrf_field() }}

                            <a  type="button" class="btn btn-primary"href="{{route('admin.article.edit', $article)}}">Изменить<i
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
                        {{$articles->links()}}
                    </ul>
                </td>
            </tr>
            </tfoot>

        </table>
    </div>
@endsection
