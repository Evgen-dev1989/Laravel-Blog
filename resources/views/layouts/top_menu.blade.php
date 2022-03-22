@foreach($categories as $category)

    @if($category->children->where('published',1)->count())


        <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown link
            </a>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="{{url("/blog/category/$category->slug")}}">{{$category->title}}</a></li>
            </ul>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                @include('layouts.top_menu',['$categories'=>$category->children])
            </ul>
        </div>
    @else

        <li>
            <a href="{{url("/blog/category/$category->slug")}}">{{$category->title}}</a>
            @endif
        </li>



@endforeach
