<?php

namespace App\Http\Controllers\Admin;
use App\Models\Article;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'categories' => \App\Models\Category::paginate(5)
        ]);
    }
}

