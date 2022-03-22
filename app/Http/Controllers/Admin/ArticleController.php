<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;
use phpDocumentor\Reflection\DocBlock\Tags\Version;
use  Illuminate\Database\Eloquent\Builder;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return View('admin.articles.index' , [
          'articles' => Article::orderBy('created_at','desc')->paginate(5)
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.articles.create',[
            'article'=>[],
        'categories' =>Category::with('children',)->where('parent_id',0)->get(),
'delimiter' =>''
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $article= Article::create($request->all());

       if ($request->input('categories')):
$article->categories()->attach(($request->input('categories')));
endif;
return redirect()->route('admin.article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('admin.articles.edit',[
            'article' =>$article,
            'categories' =>Category::with('children',)->where('parent_id',0)->get(),
            'delimiter' =>''

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article->update($request->except('slug'));
        $article->categories()->detach();

        if ($request->input('categories')):
            $article->categories()->attach(($request->input('categories')));
        endif;
        return redirect()->route('admin.article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
       $article->categories()->detach();
       $article->delete();
       return  redirect()->route('admin.article.index');
    }
}
