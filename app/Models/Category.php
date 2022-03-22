<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use  Illuminate\Database\Eloquent\Builder;

class Category extends Model
{
    protected $fillable=['title','slug','published','created_by','modified_by'];

    public function setSlugAttribute($value){
        $this->attributes['slug']= Str::slug(mb_substr($this->title,0,40) . "-" .\Carbon\Carbon::now()->format('dmHi') , '-');
    }
  public function children() {
      return $this->hasMany(self::class,'parent_id');
  }
    public function articles () {
        return $this->morphedByMany('App\Models\Article','categoryable');
    }

    public function scopeLastCategories($query, $count)
    {
        return $query->orderBy('created_at', 'desc')->take($count)->get();
    }
}


















