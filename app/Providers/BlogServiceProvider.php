<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
class BlogServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
public function topMenu(){
        View::composer('layouts.header',function ($view){
            $view->with('categories',\App\Models\Category::where('parent_Id',0)-> where('published',1)->get());
        });
}
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
       $this->topMenu();
    }
}
