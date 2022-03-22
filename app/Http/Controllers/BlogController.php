<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
public function category($slug){
    $category =\App\Models\Category:: where('slug',$slug)->first();
    return view('blog.category',[
        'category'=>$category,
        'articles'=>$category->articles()->where ('published',1)->paginate(12)
    ]);
}
}
