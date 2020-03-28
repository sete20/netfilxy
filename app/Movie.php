<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
class Movie extends Model
{
    protected $fillable = ['name', 'description', 'path', 'rating', 'year', 'poster', 'image', 'percent'];
    protected $appends = ['poster_path','image_path'];
     
    //attributes ---------------------------------------
    public function getPosterPathAttribute()
    {
        return Storage::url('images/' . $this->poster);

    }// end of getPosterPathAttribute

    public function getImagePathAttribute()
    {
        return Storage::url('images/' . $this->image);

    }// end of getImagePathAttribute

    public function categories(){
            return $this->belongsToMany(category::class,'movie_category');
    }/////

    public function scopeWhenSearch($query , $search){
        return $query->when($search, function ($q) use( $search){
           return $q->where('name','like',"%$search%")
           ->orWhere('description','like',"%$search%")
           ->orWhere('rating','like',"%$search%")
           ->orWhere('year','like',"%$search%");
        });
     }

     public function scopeWhenCategory($query , $category){

        return $query->when($category, function ($q) use( $category){
         
            return $q->whereHas('categories',function($q){

               return $q->whereIn('category_id',(array)$category)->orWhereIn('name',(array)$category);
        
            });

        });
     }

}

