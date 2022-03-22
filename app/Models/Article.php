<?php

namespace App\Models;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use  Illuminate\Database\Eloquent\Builder;

class Article extends Model
{
    use HasFactory;
    protected $fillable=['title','slug','meta_description', 'meta_keyword',  'description_short', 'description','image','image_show','meta_title', 'published','created_by','modified_by'];

    public function setSlugAttribute($value){
        $this->attributes['slug']= Str::slug(mb_substr($this->title,0,40) . "-" .\Carbon\Carbon::now()->format('dmHi') , '-');
    }

    public function categories () {
        return $this->morphToMany('App\Models\Category','categoryable');
    }
    public function scopeLastArticles($query, $count)
    {
        return $query->orderBy('created_at', 'desc')->take($count)->get();
    }
}
