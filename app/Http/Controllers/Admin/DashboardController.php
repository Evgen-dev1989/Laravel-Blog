<?php

namespace App\Http\Controllers\Admin;
use App\Models\Article;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  Illuminate\Database\Eloquent\Builder;

class DashboardController extends Controller
{
    public  function dashboard(){
        return view('admin.dashboard', [
            'categories' => \App\Models\Category::LastCategories(5),
            'articles' => \App\Models\Article::LastArticles(5),
            'count_categories' => \App\Models\Category:: count(),
            'count_articles' => \App\Models\Article::count()
        ]);}}
