@extends('admin.layouts.app_admin')
@section('content')
    <div class="container">
        <div class="row">
            <dib class="col-sm-3">
                <div class="jumbotron">
                    <h1></h1>
                    <p><span class="label label-primary">Категорий {{$count_categories}}</span></p>
                </div>
            </dib>

            <dib class="col-sm-3">
                <div class="jumbotron">
                    <h1></h1>
                    <p><span class="label label-primary">Метериалов {{$count_articles}} </span></p>
                </div>
            </dib>

            <dib class="col-sm-3">
                <div class="jumbotron">
                    <h1></h1>
                    <p><span class="label label-primary">Посетителей  0</span></p>
                </div>
            </dib>

            <dib class="col-sm-3">
                <div class="jumbotron">
                    <h1></h1>
                    <p><span class="label label-primary">Сегодня 0</span></p>
                </div>
            </dib>

        </div>
        <dib class="row">
            <div class="col-sm-6">
                <a href="{{route('admin.category.create')}}"class="btn btn-primary btn-lg disabled" tabindex="-1" role="button" aria-disabled="true">Создать
                    категорию</a>
                @foreach($categories as $category)
                    <a class="list-group-item" href="{{route('admin.category.edit', $category)}}">
                        <h4 class="list-group-item-heading">{{$category->title}}</h4>
                        <p class="list-group-item-text">
                            {{$category->articles()->count()}}
                        </p>
                    </a>
                @endforeach

            </div>
            <div class="col-sm-6">
                <a href="#" class="btn btn-primary btn-lg disabled" tabindex="-1" role="button" aria-disabled="true">Создать
                    материал</a>
                @foreach($articles as $article)

                    <a class="list-group-item" href="{{route('admin.article.edit', $article)}}">
                    <h4 class="list-group-item-heading">{{$article->title}} </h4>

                    <p class="list-group-item-text">
                      {{$article->categories()->pluck('title')->implode(', ')}}
                    </p>
                </a>
                @endforeach
            </div>


        </dib>
    </div>
@endsection
