<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
class Movie extends Model
{
    protected $fillable = ['name', 'description', 'path', 'rating', 'year', 'poster', 'image', 'percent'];
    protected $appends = ['poster_path','image_path','is_favored'];
     
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
    
     public function scopeWhenFavorite($query, $favorite)
     {
         return $query->when($favorite, function ($q) {
 
             return $q->whereHas('users', function ($qu) {
 
                 return $qu->where('user_id', auth()->user()->id);
             });
 
         });
 
     }// end of scopeWhenFavorite


     public function scopeWhenCategory($query , $category){

        return $query->when($category, function ($q) use( $category){
         
            return $q->whereHas('categories',function($q) use( $category){

               return $q->whereIn('category_id',(array)$category)->orWhereIn('name',(array)$category);
        
            });

        });
     }


    public function getIsFavoredAttribute(){
        if (auth()->user()) {
            return (bool)$this->users()->where('user_id',auth()->user()->id)->count();
        }
        return false;
    }

        //relations ------------------------------------

    
        public function users()
        {
            return $this->belongsToMany(User::class, 'user_movie');
    
        }// end of users

}

